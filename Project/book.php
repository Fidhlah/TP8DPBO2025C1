<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Book.controller.php");

$book = new BookController();

if (isset($_POST['add'])) {
    $book->add($_POST);
} else if (isset($_POST['update'])) {
    $id = $_GET['id_update'];
    $book->edit($id, $_POST);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $book->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $book->showEditForm($id);
} else {
    $book->index();
}