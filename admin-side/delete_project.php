<?php
include '../db_connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch the image path to delete the file
    $query = "SELECT image FROM projects WHERE project_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imagePath);
    $stmt->fetch();
    $stmt->close();

    // Delete the image file from the server
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete the record from the database
    $query = "DELETE FROM projects WHERE project_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Project deleted successfully.');
                window.location.href = 'admin-home.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting the project.');
                window.location.href = 'admin-home.php';
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>
