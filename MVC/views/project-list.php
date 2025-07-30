<?php include 'header.php'; ?>

<h2>Projects</h2>
<table>
    <tr>
        <th>Category</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $projects->fetch_assoc()): ?>
    <tr>
        <td><?php echo htmlspecialchars($row['category']); ?></td>
        <td><?php echo htmlspecialchars($row['description']); ?></td>
        <td><img src="../public/images/<?php echo htmlspecialchars($row['image']); ?>" alt="Project Image"></td>
        <td><a href="../controllers/ProjectController.php?action=delete&projectId=<?php echo $row['id']; ?>">Delete</a></td>
    </tr>
    <?php endwhile; ?>
</table>

<?php include 'footer.php'; ?>
