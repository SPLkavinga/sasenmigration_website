<?php
// admin/upload.php
session_start();
require 'config.php';

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true){
    header("Location: login.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $collection_title = trim($_POST['collection_title']);

    // Check if title is empty
    if(empty($collection_title)){
        $_SESSION['error'] = "Collection title cannot be empty.";
        header("Location: dashboard.php");
        exit();
    }

    // Check if collection title already exists
    $check_sql = "SELECT * FROM collections WHERE title = ?";
    $stmt = $conn->prepare($check_sql);
    if($stmt){
        $stmt->bind_param("s", $collection_title);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $_SESSION['error'] = "A collection with this title already exists.";
            $stmt->close();
            header("Location: dashboard.php");
            exit();
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "Database error: Unable to prepare statement.";
        header("Location: dashboard.php");
        exit();
    }

    // Insert new collection
    $insert_collection_sql = "INSERT INTO collections (title) VALUES (?)";
    $stmt = $conn->prepare($insert_collection_sql);
    if($stmt){
        $stmt->bind_param("s", $collection_title);
        if($stmt->execute()){
            $collection_id = $stmt->insert_id;
            $stmt->close();

            // Handle image uploads
            if(isset($_FILES['collection_images']) && !empty($_FILES['collection_images']['name'][0])){
                $allowed = array("jpg" => "image/jpeg", "jpeg" => "image/jpeg", "png" => "image/png", "gif" => "image/gif");
                $upload_dir = "../uploads/collections/";

                // Create upload directory if not exists
                if(!is_dir($upload_dir)){
                    mkdir($upload_dir, 0755, true);
                }

                $files = $_FILES['collection_images'];
                $total_files = count($files['name']);
                $uploaded = 0;

                for($i = 0; $i < $total_files; $i++){
                    $filename = $files['name'][$i];
                    $filetype = $files['type'][$i];
                    $filesize = $files['size'][$i];
                    $tmp_name = $files['tmp_name'][$i];
                    $error = $files['error'][$i];

                    if($error === 0){
                        // Verify file extension
                        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                        if(!array_key_exists($ext, $allowed)){
                            $_SESSION['error'] = "Error: Please select a valid file format for " . htmlspecialchars($filename) . ".";
                            continue;
                        }

                        // Verify file type
                        if(!in_array($filetype, $allowed)){
                            $_SESSION['error'] = "Error: Please select a valid file format for " . htmlspecialchars($filename) . ".";
                            continue;
                        }

                        // Verify file size - 5MB maximum
                        $maxsize = 5 * 1024 * 1024;
                        if($filesize > $maxsize){
                            $_SESSION['error'] = "Error: File size of " . htmlspecialchars($filename) . " is larger than the allowed limit.";
                            continue;
                        }

                        // Generate a unique filename
                        $new_filename = uniqid() . "." . $ext;
                        $filepath = $upload_dir . $new_filename;

                        // Move the file
                        if(move_uploaded_file($tmp_name, $filepath)){
                            // Insert into images table
                            $image_path = "uploads/collections/" . $new_filename;
                            $insert_image_sql = "INSERT INTO images (collection_id, image_path) VALUES (?, ?)";
                            $image_stmt = $conn->prepare($insert_image_sql);
                            if($image_stmt){
                                $image_stmt->bind_param("is", $collection_id, $image_path);
                                if($image_stmt->execute()){
                                    $uploaded++;
                                }
                                $image_stmt->close();
                            }
                        }
                    }
                }

                if($uploaded > 0){
                    $_SESSION['success'] = "Collection created successfully with " . $uploaded . " image(s).";
                } else {
                    $_SESSION['success'] = "Collection created successfully, but no images were uploaded.";
                }
            } else {
                $_SESSION['success'] = "Collection created successfully, but no images were uploaded.";
            }
        } else {
            $_SESSION['error'] = "Error: Could not execute the query.";
        }
    } else {
        $_SESSION['error'] = "Error: Could not prepare the query.";
    }

    header("Location: dashboard.php");
    exit();
} else {
    header("Location: dashboard.php");
    exit();
}
?>
