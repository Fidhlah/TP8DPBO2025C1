<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Student.controller.php");

$student = new StudentController();

if (isset($_POST['add'])) {
    // Add new student
    $student->add($_POST);
} else if (isset($_POST['update'])) {
    // Update student
    $id = $_GET['id_update'];
    $student->edit($id, $_POST);
} else if (!empty($_GET['id_hapus'])) {
    // Delete student
    $id = $_GET['id_hapus'];
    $student->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // Show edit form alongside table
    $id = $_GET['id_edit'];
    $student->showEditForm($id);
} else {
    // Show all students with add form
    $student->index();
}