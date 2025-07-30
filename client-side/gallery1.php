<?php
include '../db_connection.php';

$query = "SELECT * FROM gallery";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');

        .logo-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .logo-wrapper a {
            display: inline-flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 20px;
            font-weight: 400;
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: -1px;
            transition: color 0.3s ease;
        }

        .logo-wrapper a strong {
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            font-weight: 500;
            color: #fff;
            margin-left: 5px;
            letter-spacing: -6px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            margin-right: 10px;
            transition: color 0.3s ease;
        }

        .logo-wrapper:hover a,
        .logo-wrapper:hover a strong {
            color: #f0c419;
        }

        .nav-link.active {
            font-weight: bold;
            transition: color 0.3s ease, border-bottom-color 0.3s ease, font-weight 0.3s ease;
            color: #fff;
            border-bottom: 1px solid #fff;
        }

        .gallery ul {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 1rem;
            list-style: none;
            padding: 0;
        }

        .gallery li {
            font-size: 14px;
            line-height: 21px;
            color: #999;
            cursor: pointer;
            padding: 0.5rem 1rem;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .gallery li.active,
        .gallery li:hover {
            color: #fff;
            border-color: #fff;
            background-color: #333;
        }

        .grid-wrapper {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Adjust min size as needed */
    gap: 16px;
}

.grid-item {
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    display: inline-block;
}

.grid-item img {
    display: block;
    width: 100%;
    height: auto;
    object-fit: cover;
}

/* Ensure Masonry-like staggered heights */
.grid-item {
    grid-row: span var(--span, 1); /* Variable span for heights */
}


        @media (max-width: 768px) {
            .grid-item {
                width: calc(50% - 16px);
            }
        }

        @media (max-width: 480px) {
            .grid-item {
                width: 100%;
            }
        }

        .hidden {
            display: none !important;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo-wrapper">
                <a class="logo" href="home.php"><strong>CA</strong> Sean Aleta Photography</a>
            </div>
            <ul class="navbar-links">
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link active" href="gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
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
        <li><button data-filter="all" class="filter-btn active">All</button></li>
        <li><button data-filter="landscapes" class="filter-btn">Landscapes</button></li>
        <li><button data-filter="portraits" class="filter-btn">Portraits</button></li>
        <li><button data-filter="travels" class="filter-btn">Travels</button></li>
        <li><button data-filter="products" class="filter-btn">Products</button></li>
    </ul>
</div>
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
    const filterButtons = document.querySelectorAll('.filter-btn');
    const gridItems = document.querySelectorAll('.grid-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Update active class
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const filter = button.dataset.filter;

            // Show/hide items
            gridItems.forEach(item => {
                if (filter === 'all' || item.classList.contains(filter)) {
                    item.style.display = 'block'; // Show
                } else {
                    item.style.display = 'none'; // Hide
                }
            });
        });
    });
});

    </script>
</body>

</html>