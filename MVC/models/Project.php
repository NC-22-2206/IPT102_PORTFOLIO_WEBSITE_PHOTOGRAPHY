<?php
// models/Project.php

include_once '../db/db_connection.php';

class Project
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnection();
        $this->conn = $db->getConnection();
    }

    public function getAllProjects()
    {
        $query = "SELECT * FROM projects";
        return $this->conn->query($query);
    }

    public function addProject($category, $description, $imagePath)
    {
        $stmt = $this->conn->prepare("INSERT INTO projects (category, description, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $category, $description, $imagePath);
        return $stmt->execute();
    }

    public function deleteProject($projectId)
    {
        $stmt = $this->conn->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->bind_param("i", $projectId);
        return $stmt->execute();
    }
}
?>
