<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overlay Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-container input, 
        .form-container select, 
        .form-container textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .close-button {
            position: absolute;
            top: -20px;
            right: -20px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-button:hover {
            background-color: #cc0000;
        }

        .filter-options {
            list-style-type: none;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .filter-options li {
            margin-right: 20px;
            cursor: pointer;
        }

        .filter-options button {
            display: flex;
            align-items: center;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .filter-options button:hover {
            background-color: #0056b3;
        }

        .filter-options button .material-icons {
            font-size: 20px;
            margin-right: 8px;
        }

        #openFormButton {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            margin-left: 300px;
        }

        #openFormButton span.material-icons {
            font-size: 20px;
            margin-right: 8px;
        }
    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="container">
        <ul class="filter-options">
            <li class="active" data-filter="*">All</li>
            <li data-filter=".landscapes">Landscapes</li>
            <li data-filter=".portraits">Portraits</li>
            <li data-filter=".travels">Travels</li>
            <li data-filter=".products">Products</li>
            <button id="openFormButton">
                <span class="material-icons">add_photo_alternate</span>
                Add New Photo
            </button>
        </ul>
    </div>

    <div class="overlay" id="overlay">
        <div class="form-container">
            <button class="close-button" id="closeFormButton">&times;</button>
            <form action="#" method="POST" enctype="multipart/form-data">
                <label for="category">Category:</label>
                <select name="category" id="category">
                    <option value="landscapes">Landscapes</option>
                    <option value="portraits">Portraits</option>
                    <option value="travels">Travels</option>
                    <option value="products">Products</option>
                </select><br>

                <label for="description">Description (Optional):</label>
                <textarea id="description" name="description"></textarea><br>

                <label for="location">Location (Optional):</label>
                <input type="text" id="location" name="location"><br>

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
</body>
</html>
