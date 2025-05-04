<?php
include_once("conf.php");
include_once("models/Book.class.php");
include_once("views/Book.view.php");

class BookController
{
  // Properti kontroller
  private $book;

  // Konstruktor Controller Book
  function __construct()
  {
    $this->book = new Book(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  // Method yang mengarahkan ke halaman umum controller book
  public function index()
  {
    // Menyambungkan/membuka jalur ke database
    $this->book->open();

    // Meneruskan request umum dari views (mengambil data book) 
    $this->book->getBook();

    // Inisiasi variabel untuk menyimpan data book
    $data = array();

    // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
    while ($row = $this->book->getResult()) {
      array_push($data, $row);
    }

    // Menutup jalur ke database
    $this->book->close();

    // Meneruskannya ke view
    $view = new BookView();
    $view->render($data);
  }

  function add($data)
  {
    $this->book->open();
    $this->book->add($data);
    $this->book->close();

    header("location:book.php");
  }

  function edit($id, $data)
  {
    $this->book->open();
    $this->book->update($id, $data);
    $this->book->close();

    header("location:book.php");
  }

  function delete($id)
  {
    $this->book->open();
    $this->book->delete($id);
    $this->book->close();

    header("location:book.php");
  }

  function getBookById($id)
  {
    $this->book->open();
    $this->book->getBookById($id);
    $data = $this->book->getResult();
    $this->book->close();

    return $data;
  }

  function showEditForm($id)
  {
    // Get all books for the table
    $this->book->open();
    $this->book->getBook();
    $data = array();
    while ($row = $this->book->getResult()) {
      array_push($data, $row);
    }
    
    // Get the specific book for editing
    $this->book->getBookById($id);
    $editData = $this->book->getResult();
    $this->book->close();

    // Render the view with both datasets
    $view = new BookView();
    $view->renderWithEditForm($data, $editData);
  }
}