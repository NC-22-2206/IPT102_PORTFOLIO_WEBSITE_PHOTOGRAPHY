<?php
include '../db_connection.php';

$query = "SELECT category, description, image FROM projects";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWORKX GFX - Sean Aleta Photography</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../Chatbot/chatbot.css">
</head>

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


    /* ======= projects style ======= */

    .projects .container {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        justify-content: center;
        padding: 2rem 1rem;
    }

    .projects .box {
        width: 100%;
        max-width: 320px;
        box-sizing: border-box;
        border-radius: 12px;
        overflow: hidden;
        background-color: #1e1e1e;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .projects .box:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .projects .box .item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 1rem;
        gap: 0.75rem;
    }

    .projects .box .item img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s ease;
    }

    .projects .box:hover .item img {
        transform: scale(1.05);
    }

    .projects .box .item a {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
    }

    .projects .box .item h6 {
        font-size: 20px;
        color: #ffffff;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .projects .box .item p {
        font-size: 14px;
        line-height: 22px;
        color: #e0e0e0;
        transition: color 0.3s ease;
    }


    .projects .box:hover .item h6,
    .projects .box:hover .item p {
        color: #1e90ff;
    }

    .projects .box {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 100%;
        max-width: 300px;
        box-sizing: border-box;
        border-radius: 10px;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.8);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }


    .projects .btn-see-more {
        background-color: transparent;
        color: #1e90ff;
        border: 1px solid #1e90ff;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        transition: color 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
        margin-top: auto;
        margin-bottom: 1rem;
    }

    .projects .btn-see-more:hover {
        color: #007acc;
        border-color: #007acc;
    }

    header {
        background-image: url(../images/header.jpg);
    }
</style>

<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo-wrapper">
                <a class="logo" href="#"> <strong>CA</strong> Sean Aleta Photography</a>
            </div>

            <ul class="navbar-links">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="header">
        <div class="container">
            <div class="box">
                <h4 class="">Welcome!</h4>
                <h1 class="">I'm Sean Aleta</h1>
                <p class="">
                    Based in Quezon City, Philippines, I am a dedicated professional photographer specializing in capturing timeless moments and delivering exceptional visual storytelling.
                    My passion lies in turning your special memories into stunning, lasting images.
                </p>
                <a href="#projects" class="btn">My Projects</a>
                <a href="#contact" class="btn">Book Now</a>
            </div>

        </div>
    </div>


    <!-- About section -->
    <section class="about bg-light" id="about">
        <div class="container">

            <div class="box">
                <h2 class="section-title"><span>THE ONE BEHIND THE LENS</span></h2>
                <h2 class="title">
                    Christian Aleta, known as Sean Aleta, Senior Multimedia Artist at Sworkx GFX
                </h2>
                <p>
                    Behind every photograph lies a passion for storytelling and a dedication to
                    capturing life's most meaningful moments. With a blend of creativity, skill, and a
                    unique perspective, every frame reflects the emotions, details, and memories that
                    matter most. Discover the journey, inspiration, and vision that shape the artistry
                    behind the lens.
                </p>
                <ul>
                    <li>
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <span>Over 10 years of experience</span>
                    </li>
                    <li>
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <span>300+ successfully executed projects</span>
                    </li>
                    <li>
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <span>Exceptional creativity and quality</span>
                    </li>
                </ul>

                <!--<div class="about-bottom">
                    <img src="./images/" alt="Christian Aleta's Signature" class="signature">
                    <div class="about-name-wrapper">
                        <div class="about-name-dark">Sean Aleta</div>
                        <div class="about-rol">Senior Multimedia Artist</div>
                        <div class="about-company">Sworkx GFX</div>
                        <div class="about-location">Diliman, Quezon City</div>
                    </div>
                </div>-->
            </div>

            <div class="about-img">
                <div class="img">
                    <img src="..\images\header.jpg" alt="Christian Aleta">
                </div>
            </div>

        </div>
    </section>

    <!-- About section -->

    <!-- Projects section -->
    <section class="projects bg-dark" id="projects">
        <div class="heading">
            <h2 class="section-title"><span>My Projects</span></h2>
            <p class="section-title2">
                Explore my diverse photography projects that capture moments and stories from various perspectives.
                From landscapes to portraits, each project showcases unique creativity and skill.
            </p>
        </div>
        <div class="container">
            <?php
            if ($result->num_rows > 0) {
                // Loop through the results and display them
                while ($row = $result->fetch_assoc()) {
                    $category = htmlspecialchars($row['category']);
                    $description = htmlspecialchars($row['description']);
                    $imagePath = htmlspecialchars($row['image']);

                    // Display each project in a container
                    echo '<div class="box border-01">';
                    echo '<div class="item">';
                    echo '<img src="' . $imagePath . '" alt="' . $category . ' Photography">';
                    echo '<a href="gallery.php">';
                    echo '<h6>' . $category . '</h6>';
                    echo '<p>' . $description . '</p>';
                    echo '<button class="btn-see-more" onclick="window.location.href=\'gallery.php\'">View More</button>';
                    echo '</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No projects found.</p>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </section>

    <!-- Projects section -->




    <!-- Testimonial section -->

    <!-- Testimonial section -->





    <!-- Contact section -->
    <section class="contact bg-light" id="contact">
        <div class="container">

            <div class="box">
                <h2 class="title">
                    Need help with professional photography? Let's work together!
                </h2>
                <ul>
                    <li>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>+63 927-948-0279</span>
                    </li>
                    <li>
                        <i class="fa fa-at" aria-hidden="true"></i>
                        <span>
                            <a href="mailto:sworkxgfx@gmail.com">sworkxgfx@gmail.com</a>
                        </span>
                    </li>
                    <li>
                        <i class="fa fa-at" aria-hidden="true"></i>
                        <span>
                            <a href="mailto:seanaleta01@gmail.com">seanaleta01@gmail.com</a>
                        </span>
                    </li>
                    <li class="location-item" style="cursor: pointer;">
                        <i class="fa fa-location-pin" aria-hidden="true"></i>
                        <span>Diliman, Quezon City</span>
                        <div class="map-popup">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.7053195457556!2d121.05064831579877!3d14.653746488725865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7b340000001%3A0xb7b0d8c78efdd080!2sDiliman%2C%20Quezon%20City!5e0!3m2!1sen!2sph!4v1637160767691!5m2!1sen!2sph"
                                width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    </li>
                </ul>

            </div>

            <div class="box">
                <div class="box-r">
                    <div class="form-box">
                        <div class="form-title">
                            <h2>Get in touch</h2>
                        </div>
                        <form action="" method="post">
                            <div class="one-line">
                                <div class="box-input">
                                    <i class="far fa-user"></i>
                                    <input type="text" name="" id="" class="text" placeholder="Full Name..">
                                </div>
                                <div class="box-input">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" name="" id="" class="text" placeholder="your phone">
                                </div>
                            </div>

                            <div class="box-input">
                                <i class="fa fa-at"></i>
                                <input type="email" name="" id="" class="text" placeholder="email..">
                            </div>
                            <div class="box-input">
                                <label class="address"><i class="fa fa-location-pin"></i></label>
                                <textarea name="" id="" cols="30" rows="5" placeholder="your address.."></textarea>
                            </div>
                            <button class="btn-send">Contact us</button>
                        </form>
                    </div>


                </div>

            </div>

        </div>
    </section>
    <!-- Contact section -->






    <!-- Chatbot section -->
    <div class="chatbox">
        <div class="chatbox__support">
            <div class="chatbox__header">
                <div class="chatbox__image--header">
                    <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-5--v1.png" alt="image">
                </div>
                <div class="chatbox__content--header">
                    <h4 class="chatbox__heading--header">Chat support</h4>
                    <p class="chatbox__description--header">Hello! Welcome to Sean Aleta Photography. How can I assist you today?</p>
                </div>
            </div>
            <div class="chatbox__messages">
                <div></div>
            </div>
            <div class="chatbox__footer">
                <input type="text" placeholder="Write a message...">
                <button class="chatbox__send--footer send__button">Send</button>
            </div>
        </div>
        <div class="chatbox__button">
            <button><svg width="36" height="29" viewBox="0 0 36 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M28.2857 10.5714C28.2857 4.88616 21.9576 0.285714 14.1429 0.285714C6.32813 0.285714 0 4.88616 0 10.5714C0 13.8259 2.08929 16.7388 5.34375 18.6272C4.66071 20.2946 3.77679 21.0781 2.9933 21.9621C2.77232 22.2232 2.51116 22.4643 2.59152 22.846C2.65179 23.1875 2.93304 23.4286 3.23438 23.4286C3.25446 23.4286 3.27455 23.4286 3.29464 23.4286C3.89732 23.3482 4.47991 23.2478 5.02232 23.1071C7.05134 22.5848 8.93973 21.721 10.6071 20.5357C11.7321 20.7366 12.9174 20.8571 14.1429 20.8571C21.9576 20.8571 28.2857 16.2567 28.2857 10.5714ZM36 15.7143C36 12.3594 33.7902 9.38616 30.3951 7.51786C30.6964 8.50223 30.8571 9.52679 30.8571 10.5714C30.8571 14.1674 29.0089 17.4821 25.654 19.933C22.5402 22.183 18.4621 23.4286 14.1429 23.4286C13.5603 23.4286 12.9576 23.3884 12.375 23.3482C14.8862 24.9955 18.221 26 21.8571 26C23.0826 26 24.2679 25.8795 25.3929 25.6786C27.0603 26.8638 28.9487 27.7277 30.9777 28.25C31.5201 28.3906 32.1027 28.4911 32.7054 28.5714C33.0268 28.6116 33.3281 28.3504 33.4085 27.9888C33.4888 27.6071 33.2277 27.3661 33.0067 27.1049C32.2232 26.221 31.3393 25.4375 30.6563 23.7701C33.9107 21.8817 36 18.9888 36 15.7143Z" fill="#b506066b" />
                </svg>
            </button>
        </div>
    </div>
    </div>

    <script src="..\Chatbot\app.js"></script>
    <!-- Chatbot section-->


    

    <!-- Footer -->
    <footer class="footer">
        <div class="newsletter">
            <div class="container">
                <div class="box">
                    <!--<h2>Sign up to get latest update</h2>-->
                    <!--<p>Sign up for our monthly newsletter for the latest news &amp; articles</p>-->
                </div>
                <div class="form">
                    <!--<form>
                        <input type="email" name="email" placeholder="Enter Email Address" required="">
                        <button>Subscribe Now</button>
                    </form>-->
                </div>
            </div>
        </div>
        <div class="second-footer">
            <div class="container">
                <div class="box">
                    <div class="logo-wrapper">
                        <a class="logo" href="home.php"> <strong>CA</strong> Sean Aleta Photography </a>
                    </div>
                    <div class="text">
                        <p>Photography inila miss uman saten eliten finus vivera alacus miss the drudean seneice
                            miss notumane tonec a fermen.</p>
                    </div>
                </div>
                <div class="box">
                    <h3 class="title">Quick Links</h3>
                    <ul>
                        <li><a href="about.php">About</a></li>
                        <li><a href="projects.php">Projects</a></li>
                        <li><a href="works.php">Works</a></li>
                        <li><a href="blog.php">Blog</a></li>
                    </ul>
                </div>

                <div class="box">
                    <h3 class="title">Contact</h3>
                    <ul>
                        <li>
                            <i class="fa fa-phone"></i>
                            <span>
                                +63 927-948-0279
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-at"></i>
                            <span>
                                <a href="mailto:sworkxgfx@gmail.com" style="text-transform: none;">sworkxgfx@gmail.com</a>
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-at"></i>
                            <span>
                                <a href="mailto:seanaleta01@gmail.com" style="text-transform: none;">seanaleta01@gmail.com</a>
                            </span>
                        </li>
                        <li>
                            <span>
                                Diliman, Quezon City
                            </span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class=" copyright">
            <div class="box">
                <p class="">Copyright © 2024 by <a href="#">ChristianAleta</a>. All rights reserved.</p>
            </div>
            <div class="box">
                <ul class="social-icons">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
            </div>
        </div>
        </div>
    </footer>

</body>

</html>