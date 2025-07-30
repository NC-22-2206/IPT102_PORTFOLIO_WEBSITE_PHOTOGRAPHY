<?php
// public/index.php

include_once '../controllers/ProjectController.php';




$controller = new ProjectController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'delete' && isset($_GET['projectId'])) {
        $controller->deleteProject($_GET['projectId']);
    } elseif ($action == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $category = $_POST['category'];
        $description = $_POST['description'];
        $imagePath = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../public/images/' . $imagePath);
        $controller->addProject($category, $description, $imagePath);
    }
} else {
    $controller->displayProjects();
}
?>

<link rel="stylesheet" href="stylesheet.css">

