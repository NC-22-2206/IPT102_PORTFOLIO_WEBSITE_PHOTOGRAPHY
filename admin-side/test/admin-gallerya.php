<?php
include '../db_connection.php';

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

            // Execute the statement
            if ($stmt->execute()) {
                echo "New gallery item added successfully.";
            } else {
                echo "Error: " . $stmt->error;
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

<!-- HTML Form -->
<form action="#" method="POST" enctype="multipart/form-data">
<label for="category">Category:</label>
    <select name="category" id="category">
        <option value="landscapes">Landscapes</option>
        <option value="portraits">Portraits</option>
        <option value="travels">Travels</option>
        <option value="products">Products</option>
    </select><br><br>

    <label for="description">Description (Optional):</label>
    <textarea id="description" name="description"></textarea><br><br>

    <label for="location">Location (Optional):</label>
    <input type="text" id="location" name="location"><br><br>

    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="image" accept="image/*" required><br><br>

    <input type="submit" name="submit" value="Upload to Gallery">


</form>


<script>
    // Detect the 'Print Screen' key and clear the clipboard
    document.addEventListener("keyup", function(event) {
        if (event.key === "PrintScreen") {
            // Clear clipboard content to make screenshot blank
            navigator.clipboard.writeText("").then(function() {
                alert("Screenshots are not allowed on this website.");
            }).catch(function(err) {
                console.error("Clipboard write failed:", err);
            });
        }
    });

    // Disable right-click to prevent context menu for additional screen capturing
    document.addEventListener("contextmenu", function(event) {
        event.preventDefault();
        alert("Right-click is disabled on this website.");
    });

    // Detect attempts to open developer tools
    document.addEventListener("keydown", function(event) {
        if (event.ctrlKey && (event.key === "s" || event.key === "S")) {
            alert("Saving this page is disabled.");
            event.preventDefault();
        }

        if (event.ctrlKey && event.shiftKey && (event.key === "i" || event.key === "I")) {
            alert("Inspecting this page is disabled.");
            event.preventDefault();
        }

        if (event.key === "F12") {
            alert("Developer tools are disabled.");
            event.preventDefault();
        }
    });
</script>
