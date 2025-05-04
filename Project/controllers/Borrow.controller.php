<?php
include_once("conf.php");
include_once("models/Borrow.class.php");
include_once("models/Student.class.php");
include_once("models/Book.class.php");
include_once("views/Borrow.view.php");

class BorrowController
{
  // Properti kontroller
  private $borrow;
  private $student;
  private $book;

  // Konstruktor Controller Borrow
  function __construct()
  {
    $this->borrow = new Borrow(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->student = new Student(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->book = new Book(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  // Method yang mengarahkan ke halaman umum controller borrow
  public function index()
  {
    // Menyambungkan/membuka jalur ke database
    $this->borrow->open();
    $this->student->open();
    $this->book->open();

    // Meneruskan request umum dari views (mengambil data) 
    $this->borrow->getBorrow();
    $this->student->getStudent();
    $this->book->getBook();

    // Inisiasi variabel untuk menyimpan data
    $data = array(
      'borrow' => array(),
      'student' => array(),
      'book' => array()
    );

    // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam   dalam bentuk array
    while ($row = $this->borrow->getResult()) {
      array_push($data['borrow'], $row);
    }
    while ($row = $this->student->getResult()) {
      array_push($data['student'], $row);
    }
    while ($row = $this->book->getResult()) {
      array_push($data['book'], $row);
    }

    // Menutup jalur ke database
    $this->borrow->close();
    $this->student->close();
    $this->book->close();

    // Meneruskannya ke view
    $view = new BorrowView();
    $view->render($data);
  }

  function add($data)
  {
    $this->borrow->open();
    $this->borrow->add($data);
    $this->borrow->close();

    header("location:borrow.php");
  }

  function edit($id, $data)
  {
    $this->borrow->open();
    $this->borrow->update($id, $data);
    $this->borrow->close();

    header("location:borrow.php");
  }

  function delete($id)
  {
    $this->borrow->open();
    $this->borrow->delete($id);
    $this->borrow->close();

    header("location:borrow.php");
  }

  function returnBook($id)
  {
    $this->borrow->open();
    $this->borrow->returnBook($id);
    $this->borrow->close();

    header("location:borrow.php");
  }

  function getBorrowById($id)
  {
    $this->borrow->open();
    $this->borrow->getBorrowById($id);
    $data = $this->borrow->getResult();
    $this->borrow->close();

    return $data;
  }

  function showEditForm($id)
  {
    // Periksa apakah return_date sudah diisi
    $this->borrow->open();
    $this->borrow->getBorrowById($id);
    $editData = $this->borrow->getResult();
    $this->borrow->close();

    // Jika return_date tidak NULL, alihkan ke halaman utama
    if ($editData['return_date'] !== NULL) {
      header("location:borrow.php");
      exit();
    }

    // Get all data for the table and form options
    $this->borrow->open();
    $this->student->open();
    $this->book->open();

    $this->borrow->getBorrow();
    $this->student->getStudent();
    $this->book->getBook();

    $data = array(
      'borrow' => array(),
      'student' => array(),
      'book' => array()
    );

    while ($row = $this->borrow->getResult()) {
      array_push($data['borrow'], $row);
    }
    while ($row = $this->student->getResult()) {
      array_push($data['student'], $row);
    }
    while ($row = $this->book->getResult()) {
      array_push($data['book'], $row);
    }
    
    // Render the view with both datasets
    $this->borrow->close();
    $this->student->close();
    $this->book->close();

    $view = new BorrowView();
    $view->renderWithEditForm($data, $editData);
  }
}