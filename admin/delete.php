<?php
// admin/delete.php
session_start();
require 'config.php';

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true){
    header("Location: login.php");
    exit();
}

if(isset($_GET['collection_id']) && is_numeric($_GET['collection_id'])){
    $collection_id = intval($_GET['collection_id']);

    // Fetch all images in the collection
    $images_sql = "SELECT image_path FROM images WHERE collection_id = ?";
    $stmt = $conn->prepare($images_sql);
    if($stmt){
        $stmt->bind_param("i", $collection_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while($image = $result->fetch_assoc()){
            $full_path = "../" . $image['image_path'];
            if(file_exists($full_path)){
                unlink($full_path);
            }
        }
        $stmt->close();
    }

    // Delete the collection (images will be deleted automatically due to ON DELETE CASCADE)
    $delete_sql = "DELETE FROM collections WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    if($stmt){
        $stmt->bind_param("i", $collection_id);
        if($stmt->execute()){
            $_SESSION['success'] = "Collection and its images deleted successfully.";
        } else {
            $_SESSION['error'] = "Error: Could not delete the collection.";
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "Error: Could not prepare the delete query.";
    }
} elseif(isset($_GET['image_id']) && is_numeric($_GET['image_id'])){
    $image_id = intval($_GET['image_id']);

    // Fetch image path
    $image_sql = "SELECT image_path FROM images WHERE id = ?";
    $stmt = $conn->prepare($image_sql);
    if($stmt){
        $stmt->bind_param("i", $image_id);
        $stmt->execute();
        $stmt->bind_result($image_path);
        if($stmt->fetch()){
            $stmt->close();

            // Delete the image file
            $full_path = "../" . $image_path;
            if(file_exists($full_path)){
                unlink($full_path);
            }

            // Delete from database
            $delete_sql = "DELETE FROM images WHERE id = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            if($delete_stmt){
                $delete_stmt->bind_param("i", $image_id);
                if($delete_stmt->execute()){
                    $_SESSION['success'] = "Image deleted successfully.";
                } else {
                    $_SESSION['error'] = "Error: Could not delete the image.";
                }
                $delete_stmt->close();
            } else {
                $_SESSION['error'] = "Error: Could not prepare the delete query.";
            }
        } else {
            $_SESSION['error'] = "Error: Image not found.";
            $stmt->close();
        }
    } else {
        $_SESSION['error'] = "Error: Could not prepare the select query.";
    }
} else {
    $_SESSION['error'] = "Invalid request.";
}

header("Location: dashboard.php");
exit();
?>
