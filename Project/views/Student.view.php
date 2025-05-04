<?php
class StudentView
{
  public function render($data)
  {
    $no = 1;
    $dataStudent = null;
    foreach ($data as $val) {
      list($id, $name, $nim, $phone, $join_date) = $val;
      $dataStudent .= "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $name . "</td>
                  <td>" . $nim . "</td>
                  <td>" . $phone . "</td>
                  <td>" . $join_date . "</td>
                  <td>
                  <a href='student.php?id_edit=" . $id .  "' class='btn btn-warning'>Edit</a>
                  <a href='student.php?id_hapus=" . $id . "' class='btn btn-danger'>Delete</a>
                  </td>
                  </tr>";
    }

    $tpl = new Template("templates/student.html");
    $tpl->replace("JUDUL", "Student Management");
    $tpl->replace("DATA_TABEL", $dataStudent);
    
    // Default form for adding new student
    $tpl->replace("FORM_TITLE", "Add Student");
    $tpl->replace("FORM_ACTION", "index.php");
    $tpl->replace("ACTION_BUTTON", "Add");
    $tpl->replace("ACTION_TYPE", "add");
    $tpl->replace("ID_VALUE", "");
    $tpl->replace("NAME_VALUE", "");
    $tpl->replace("NIM_VALUE", "");
    $tpl->replace("PHONE_VALUE", "");
    $tpl->replace("JOIN_DATE_VALUE", "");
    
    $tpl->write();
  }

  public function renderWithEditForm($data, $editData)
  {
    $no = 1;
    $dataStudent = null;
    foreach ($data as $val) {
      list($id, $name, $nim, $phone, $join_date) = $val;
      $dataStudent .= "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $name . "</td>
                  <td>" . $nim . "</td>
                  <td>" . $phone . "</td>
                  <td>" . $join_date . "</td>
                  <td>
                  <a href='index.php?id_edit=" . $id .  "' class='btn btn-warning'>Edit</a>
                  <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger'>Delete</a>
                  </td>
                  </tr>";
    }

    list($id, $name, $nim, $phone, $join_date) = $editData;

    $tpl = new Template("templates/student.html");
    $tpl->replace("JUDUL", "Student Management");
    $tpl->replace("DATA_TABEL", $dataStudent);
    
    // Edit form
    $tpl->replace("FORM_TITLE", "Edit Student");
    $tpl->replace("FORM_ACTION", "index.php?id_update=$id");
    $tpl->replace("ACTION_BUTTON", "Update");
    $tpl->replace("ACTION_TYPE", "update");
    $tpl->replace("ID_VALUE", $id);
    $tpl->replace("NAME_VALUE", $name);
    $tpl->replace("NIM_VALUE", $nim);
    $tpl->replace("PHONE_VALUE", $phone);
    $tpl->replace("JOIN_DATE_VALUE", $join_date);
    
    $tpl->write();
  }
}