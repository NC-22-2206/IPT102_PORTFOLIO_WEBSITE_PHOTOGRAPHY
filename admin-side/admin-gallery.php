<?php
include '../db_connection.php';

$query = "SELECT * FROM gallery";
$result = $conn->query($query);

// Define the upload directory
$uploadDir = '../gallery/';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $conn->real_escape_string($_POST['category']);
    $description = isset($_POST['description']) ? $conn->real_escape_string($_POST['description']) : null;
    $location = isset($_POST['location']) ? $conn->real_escape_string($_POST['location']) : null;

    // Handle the image upload as a file
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Generate a unique name for the uploaded file
        $fileName = uniqid() . "_" . basename($_FILES['image']['name']);
        $filePath = $uploadDir . $fileName;

        // Ensure the upload directory exists, create it if necessary
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move the uploaded file to the server directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
            // Prepare SQL query to store the file path in the database
            $stmt = $conn->prepare("INSERT INTO gallery (category, image, description, location) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $category, $filePath, $description, $location);

            if ($stmt->execute()) {
                echo "<script>alert('New gallery item added successfully.');</script>";
            } else {
                echo "<script>alert('Error: " . addslashes($stmt->error) . "');</script>";
            }            

            // Close the statement
            $stmt->close();
        } else {
            echo "Error saving the uploaded image.";
        }
    } else {
        echo "Error uploading the image.";
    }
}

// Close the connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
    <link rel="stylesheet" href="../client-side/header.css">
    <link rel="stylesheet" href="../client-side/about.css">
    <link rel="stylesheet" href="../client-side/style.css">

    <link rel="stylesheet" href="admin-stylesheet.css">
    </head>

    <style>
       
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo-wrapper">
                <a class="logo" href="home.php"><strong>CA</strong> Sean Aleta Photography</a>
            </div>
            <ul class="navbar-links">
                <li class="nav-item"><a class="nav-link" href="admin-home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="admin-home#about">About</a></li>
                <li class="nav-item"><a class="nav-link active" href="gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="admin-home.php#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Works Gallery -->
    <section class="gallery bg-dark" id="works">
        <div class="heading">
            <h2 class="title">Gallery</h2>
        </div>
        <div class="container">
            <ul class="filter-options">
                <li class="active" data-filter="*">All</li>
                <li data-filter=".landscapes">Landscapes</li>
                <li data-filter=".portraits">Portraits</li>
                <li data-filter=".travels">Travels</li>
                <li data-filter=".products">Products</li>
                <button id="openFormButton" style="margin-left: 670px;">
                    <span class="material-icons">add_photo_alternate</span>
                   Upload New Photo
                </button>
            </ul>
        </div>




        <!--Upload Photos in Gallery-->

<div class="overlay" id="overlay">
    <div class="form-container">
        <button class="close-button" id="closeFormButton">&times;</button>
        <form action="#" method="POST" enctype="multipart/form-data">
            <label for="category">Category:</label>
            <select name="category" id="category" required>
                <option>Choose category</option>
                <option value="landscapes">Landscapes</option>
                <option value="portraits">Portraits</option>
                <option value="travels">Travels</option>
                <option value="products">Products</option>
            </select><br>

            <label for="description">Description (Optional):</label>
            <textarea id="description" name="description" placeholder ="Write description here"></textarea><br>

            <label for="location">Location (Optional):</label>
            <input type="text" id="location" name="location" placeholder="Enter location here"><br>

            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br>

            <input type="submit" name="submit" value="Upload to Gallery">
        </form>
    </div>
</div>

    <script>
        const openFormButton = document.getElementById('openFormButton');
        const closeFormButton = document.getElementById('closeFormButton');
        const overlay = document.getElementById('overlay');

        openFormButton.addEventListener('click', () => {
            overlay.style.display = 'flex';
        });

        closeFormButton.addEventListener('click', () => {
            overlay.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === overlay) {
                overlay.style.display = 'none';
            }
        });
    </script>



        <div class="container">
            <div class="grid-wrapper" id="galleryGrid">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $category = htmlspecialchars($row['category']);
                        $image = htmlspecialchars($row['image']);
                        $description = htmlspecialchars($row['description']);
                        echo "
                        <div class='grid-item $category' data-category='$category'>
                            <img src='$image' alt='$description' />
                        </div>";
                    }
                } else {
                    echo "<p>No images found.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterOptions = document.querySelectorAll('.filter-options li');
            const grid = document.querySelector('#galleryGrid');

            // Initialize Masonry
            const masonryInstance = new Masonry(grid, {
                itemSelector: '.grid-item',
                columnWidth: '.grid-item',
                percentPosition: true,
                gutter: 16,
            });

            filterOptions.forEach(option => {
                option.addEventListener('click', () => {
                    // Remove active class from all options and add it to the clicked one
                    filterOptions.forEach(opt => opt.classList.remove('active'));
                    option.classList.add('active');

                    const filter = option.getAttribute('data-filter');

                    // Show/hide grid items based on the filter
                    const gridItems = document.querySelectorAll('.grid-item');
                    gridItems.forEach(item => {
                        if (filter === '*' || item.classList.contains(filter.substring(1))) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    // Layout the grid again after filtering
                    masonryInstance.layout();
                });
            });
        });
    </script>
</body>
</html>