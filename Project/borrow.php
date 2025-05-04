<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Borrow.controller.php");

$borrow = new BorrowController();

if (isset($_POST['add'])) {
    // Add new borrow
    $borrow->add($_POST);
} elseif (isset($_POST['update']) && !empty($_GET['id_update'])) {
    // Update borrow
    $id = $_GET['id_update'];
    $borrow->edit($id, $_POST);
} elseif (!empty($_GET['id_hapus'])) {
    // Delete borrow
    $id = $_GET['id_hapus'];
    $borrow->delete($id);
} elseif (!empty($_GET['id_return'])) {
    // Return book
    $id = $_GET['id_return'];
    $borrow->returnBook($id);
} elseif (!empty($_GET['id_edit'])) {
    // Show edit form
    $id = $_GET['id_edit'];
    $borrow->showEditForm($id);
} else {
    $borrow->index();
}