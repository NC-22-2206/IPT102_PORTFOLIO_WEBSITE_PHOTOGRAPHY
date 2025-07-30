<?php include 'header.php'; ?>

<h2>Add New Project</h2>
<form action="../controllers/ProjectController.php?action=add" method="post" enctype="multipart/form-data">
    <label for="category">Category:</label>
    <input type="text" name="category" id="category" required>
    <br>
    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea>
    <br>
    <label for="image">Image:</label>
    <input type="file" name="image" id="image" required>
    <br>
    <input type="submit" value="Add Project">
</form>

<?php include 'footer.php'; ?>
