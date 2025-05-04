<?php
class BorrowView
{
  public function render($data)
  {
    $no = 1;
    $dataBorrow = null;
    foreach ($data['borrow'] as $val) {
      list($id, $student_name, $nim, $book_title, $borrow_date, $return_date) = $val;
      $dataBorrow .= "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $student_name . "</td>
                  <td>" . $nim . "</td>
                  <td>" . $book_title . "</td>
                  <td>" . $borrow_date . "</td>
                  <td>" . ($return_date ? $return_date : 'Not returned') . "</td>
                  <td>";
      
      if (!$return_date) {
        $dataBorrow .= "<a href='borrow.php?id_return=" . $id .  "' class='btn btn-success btn-sm'>Return</a> ";
        $dataBorrow .= "<a href='borrow.php?id_edit=" . $id .  "' class='btn btn-warning btn-sm'>Edit</a> ";
      }
      
      $dataBorrow .= "<a href='borrow.php?id_hapus=" . $id . "' class='btn btn-danger btn-sm'>Delete</a>
                  </td>
                  </tr>";
    }

    $studentOptions = "";
    foreach ($data['student'] as $student) {
      list($id, $name, $nim, $phone, $join_date) = $student;
      $studentOptions .= "<option value='$id'>$name ($nim)</option>";
    }

    $bookOptions = "";
    foreach ($data['book'] as $book) {
      list($id, $title, $author, $publication_year, $isbn) = $book;
      $bookOptions .= "<option value='$id'>$title by $author</option>";
    }

    $tpl = new Template("templates/borrow.html");
    $tpl->replace("JUDUL", "Borrow Management");
    $tpl->replace("DATA_TABEL", $dataBorrow);
    
    // Default form for adding new borrow
    $tpl->replace("FORM_TITLE", "Add Borrow");
    $tpl->replace("FORM_ACTION", "borrow.php");
    $tpl->replace("ACTION_BUTTON", "Add");
    $tpl->replace("ACTION_TYPE", "add");
    $tpl->replace("ID_VALUE", "");
    $tpl->replace("STUDENT_OPTIONS", $studentOptions);
    $tpl->replace("BOOK_OPTIONS", $bookOptions);
    $tpl->replace("BORROW_DATE_VALUE", date('Y-m-d'));
    $tpl->replace("RETURN_DATE_FIELD", "");
    
    $tpl->write();
  }

  public function renderWithEditForm($data, $editData)
  {
    $no = 1;
    $dataBorrow = null;
    foreach ($data['borrow'] as $val) {
      list($id, $student_name, $nim, $book_title, $borrow_date, $return_date) = $val;
      $dataBorrow .= "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $student_name . "</td>
                  <td>" . $nim . "</td>
                  <td>" . $book_title . "</td>
                  <td>" . $borrow_date . "</td>
                  <td>" . ($return_date ? $return_date : 'Not returned') . "</td>
                  <td>";
      
      if (!$return_date) {
        $dataBorrow .= "<a href='borrow.php?id_return=" . $id .  "' class='btn btn-success btn-sm'>Return</a> ";
        $dataBorrow .= "<a href='borrow.php?id_edit=" . $id .  "' class='btn btn-warning btn-sm'>Edit</a> ";
      }
      
      $dataBorrow .= "<a href='borrow.php?id_hapus=" . $id . "' class='btn btn-danger btn-sm'>Delete</a>
                  </td>
                  </tr>";
    }

    list($id, $student_id, $book_id, $borrow_date, $return_date) = $editData;
    
    $studentOptions = "";
    foreach ($data['student'] as $student) {
      list($s_id, $name, $nim, $phone, $join_date) = $student;
      $selected = ($s_id == $student_id) ? "selected" : "";
      $studentOptions .= "<option value='$s_id' $selected>$name ($nim)</option>";
    }

    $bookOptions = "";
    foreach ($data['book'] as $book) {
      list($b_id, $title, $author, $publication_year, $isbn) = $book;
      $selected = ($b_id == $book_id) ? "selected" : "";
      $bookOptions .= "<option value='$b_id' $selected>$title by $author</option>";
    }

    $tpl = new Template("templates/borrow.html");
    $tpl->replace("JUDUL", "Borrow Management");
    $tpl->replace("DATA_TABEL", $dataBorrow);
    
    // Edit form
    $tpl->replace("FORM_TITLE", "Edit Borrow");
    $tpl->replace("FORM_ACTION", "borrow.php?id_update=$id");
    $tpl->replace("ACTION_BUTTON", "Update");
    $tpl->replace("ACTION_TYPE", "update");
    $tpl->replace("ID_VALUE", $id);
    $tpl->replace("STUDENT_OPTIONS", $studentOptions);
    $tpl->replace("BOOK_OPTIONS", $bookOptions);
    $tpl->replace("BORROW_DATE_VALUE", $borrow_date);
    $tpl->replace("RETURN_DATE_FIELD", ""); // Kosong untuk mode Edit
    
    $tpl->write();
  }
}