<?php
// controllers/ProjectController.php

include_once '../models/Project.php';

class ProjectController
{
    private $model;

    public function __construct()
    {
        $this->model = new Project();
    }

    public function displayProjects()
    {
        $projects = $this->model->getAllProjects();
        include '../views/project-list.php';
    }

    public function addProject($category, $description, $imagePath)
    {
        if ($this->model->addProject($category, $description, $imagePath)) {
            header('Location: ../public/index.php');
        } else {
            echo "Error adding project.";
        }
    }

    public function deleteProject($projectId)
    {
        if ($this->model->deleteProject($projectId)) {
            header('Location: ../public/index.php');
        } else {
            echo "Error deleting project.";
        }
    }
}
?>
