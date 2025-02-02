<?php
// admin/dashboard.php
session_start();
require 'config.php';

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true){
    header("Location: login.php");
    exit();
}

// Handle success and error messages
$success_message = '';
$error_message = '';

if(isset($_SESSION['success'])){
    $success_message = $_SESSION['success'];
    unset($_SESSION['success']);
}

if(isset($_SESSION['error'])){
    $error_message = $_SESSION['error'];
    unset($_SESSION['error']);
}

// Fetch all collections
$collections_sql = "SELECT * FROM collections ORDER BY created_at DESC";
$collections_result = $conn->query($collections_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Sasen Migration</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gallery-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <div class="d-flex">
                <a href="logout.php" class="btn btn-outline-danger">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container my-5">
        <h2 class="mb-4">Manage Gallery Collections</h2>

        <!-- Display Success and Error Messages -->
        <?php if($success_message): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($success_message); ?></div>
        <?php endif; ?>
        <?php if($error_message): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <!-- Create New Collection -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Add New Collection
            </div>
            <div class="card-body">
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="collection_title" class="form-label">Collection Title</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="collection_title" 
                            name="collection_title" 
                            placeholder="Enter collection title" 
                            required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="collection_images" class="form-label">Upload Images</label>
                        <input 
                            type="file" 
                            class="form-control" 
                            id="collection_images" 
                            name="collection_images[]" 
                            accept="image/*" 
                            multiple 
                            required
                        >
                        <div class="form-text">You can select multiple images.</div>
                    </div>
                    <button type="submit" class="btn btn-success">Create Collection</button>
                </form>
            </div>
        </div>

        <!-- Existing Collections -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                Existing Collections
            </div>
            <div class="card-body">
                <?php if($collections_result->num_rows > 0): ?>
                    <?php while($collection = $collections_result->fetch_assoc()): ?>
                        <div class="mb-4">
                            <h5>
                                <?php echo htmlspecialchars($collection['title']); ?>
                                <a href="delete.php?collection_id=<?php echo $collection['id']; ?>" class="btn btn-danger btn-sm float-end" onclick="return confirm('Are you sure you want to delete this collection and all its images?');">Delete Collection</a>
                            </h5>
                            <?php
                                // Fetch images for this collection
                                $images_sql = "SELECT * FROM images WHERE collection_id = " . intval($collection['id']) . " ORDER BY created_at DESC";
                                $images_result = $conn->query($images_sql);
                                if($images_result->num_rows > 0){
                                    echo '<div class="row">';
                                    while($image = $images_result->fetch_assoc()){
                                        echo '
                                        <div class="col-3 col-md-2 mb-3">
                                            <img src="../' . htmlspecialchars($image['image_path']) . '" alt="' . htmlspecialchars($collection['title']) . '" class="gallery-img">
                                            <a href="delete.php?image_id=' . $image['id'] . '" class="btn btn-sm btn-danger mt-1" onclick="return confirm(\'Are you sure you want to delete this image?\');">Delete</a>
                                        </div>
                                        ';
                                    }
                                    echo '</div>';
                                } else {
                                    echo '<p>No images in this collection.</p>';
                                }
                            ?>
                        </div>
                        <hr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No collections found. Start by adding a new collection above.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
