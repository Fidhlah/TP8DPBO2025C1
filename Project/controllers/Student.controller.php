<?php
include_once("conf.php");
include_once("models/Student.class.php");
include_once("views/Student.view.php");

class StudentController
{
  // Properti kontroller
  private $student;

  // Konstruktor Controller Student
  function __construct()
  {
    $this->student = new Student(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  // Method yang mengarahkan ke halaman umum controller student
  public function index()
  {
    // Menyambungkan/membuka jalur ke database
    $this->student->open();

    // Meneruskan request umum dari views (mengambil data student) 
    $this->student->getStudent();

    // Inisiasi variabel untuk menyimpan data student
    $data = array();

    // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
    while ($row = $this->student->getResult()) {
      array_push($data, $row);
    }

    // Menutup jalur ke database
    $this->student->close();

    // Meneruskannya ke view
    $view = new StudentView();
    $view->render($data);
  }

  function add($data)
  {
    $this->student->open();
    $this->student->add($data);
    $this->student->close();

    header("location:index.php");
  }

  function edit($id, $data)
  {
    $this->student->open();
    $this->student->update($id, $data);
    $this->student->close();

    header("location:index.php");
  }

  function delete($id)
  {
    $this->student->open();
    $this->student->delete($id);
    $this->student->close();

    header("location:index.php");
  }

  function getStudentById($id)
  {
    $this->student->open();
    $this->student->getStudentById($id);
    $data = $this->student->getResult();
    $this->student->close();

    return $data;
  }

  function showEditForm($id)
  {
    // Get all students for the table
    $this->student->open();
    $this->student->getStudent();
    $data = array();
    while ($row = $this->student->getResult()) {
      array_push($data, $row);
    }
    
    // Get the specific student for editing
    $this->student->getStudentById($id);
    $editData = $this->student->getResult();
    $this->student->close();

    // Render the view with both datasets
    $view = new StudentView();
    $view->renderWithEditForm($data, $editData);
  }
}