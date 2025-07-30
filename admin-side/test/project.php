<!-- Trigger Button -->
<button id="showFormButton"><span class="material-icons">add_photo_alternate</span>
Upload New Project</button>

<!-- Overlay and Form -->
<div id="formOverlay" class="overlay">
    <div class="form-container">
        <button id="closeFormButton" class="close-button">&times;</button>
        <form action="#" method="POST" enctype="multipart/form-data">
            <label for="category">Project Title (Category):</label>
            <input type="text" id="category" name="category" required><br><br>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea><br><br>

            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br><br>

            <input type="submit" name="submit" value="Upload Project">
        </form>
    </div>
</div>

<!-- CSS -->
<style>
/* Button Style */
#showFormButton {
    padding: 12px 20px;
    font-size: 16px;
    color: white;
    background-color: #007BFF;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#showFormButton:hover {
    background-color: #0056b3;
}

/* Overlay Style */
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: none; /* Hidden by default */
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

/* Form Container Style in Overlay */
.overlay .form-container {
    position: relative;
    background: #fff;
    padding: 20px 25px;
    border-radius: 10px;
    width: 90%;
    max-width: 400px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

/* Close Button Style */
.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    background: none;
    border: none;
    cursor: pointer;
    color: #333;
}

.close-button:hover {
    color: #007BFF;
}

/* Overlay Style */
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8); /* Darker background for better focus on the form */
    display: none; /* Hidden by default */
    justify-content: center;
    align-items: center;
    z-index: 1000;
    overflow: hidden; /* Prevent scrolling while overlay is active */
}

/* Form Container Style in Overlay */
.overlay .form-container {
    position: relative;
    background: #fff;
    padding: 30px; /* Add padding for breathing space */
    border-radius: 12px; /* Softer rounded edges */
    width: 90%;
    max-width: 450px; /* Increased max-width for better layout */
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3); /* Enhanced shadow for a lifted appearance */
    animation: fadeIn 0.3s ease-in-out; /* Smooth entry animation */
}

/* Close Button Style */
.close-button {
    position: absolute;
    top: 15px; /* Adjust for spacing */
    right: 15px; /* Align closer to the edge */
    font-size: 24px;
    background: none;
    border: none;
    cursor: pointer;
    color: #333;
    transition: color 0.3s ease;
}

.close-button:hover {
    color: #007BFF;
}

/* Fade-in Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

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


  
        button {
            font-size: 14px;
            line-height: 21px;
            cursor: pointer;
            padding: 0.5rem 1rem;
            color: #fff;
            background-color: transparent;
            border: none;
            display: flex;
        }
        
        button.active, button:hover{
            color: #999;
            border-color: #fff;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: #fff;
            display: flex;
        }


        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000; /* Ensures overlay is on top */
        }

        .form-container {
            position: relative;
            background-color: #fff;
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 90%;
            max-width: 400px;
            font-size: 14px;
        }

        .form-container label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }

        .form-container input,
        .form-container select,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            color: #555;
        }

        .form-container input:focus,
        .form-container select:focus,
        .form-container textarea:focus {
            border-color: #007BFF;
            outline: none;
            background-color: #fff;
        }

        .form-container input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .close-button {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #f44336;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        
        }

        .close-button:hover {
            background-color: #f44336;
            color: white;
            border-radius: 50%;
            width: 30px;
            height: 30px;
        }

        textarea {
            resize: none;
            font-family:Arial, Helvetica, sans-serif;
        }

        button .material-icons {
            font-size: 20px;
            margin-right: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
</style>

<!-- JavaScript -->
<script>
// Show the form overlay
document.getElementById('showFormButton').addEventListener('click', function () {
    document.getElementById('formOverlay').style.display = 'flex';
});

// Close the form overlay
document.getElementById('closeFormButton').addEventListener('click', function () {
    document.getElementById('formOverlay').style.display = 'none';
});

// Close overlay when clicking outside the form
document.getElementById('formOverlay').addEventListener('click', function (event) {
    if (event.target === this) {
        this.style.display = 'none';
    }
});
</script>
