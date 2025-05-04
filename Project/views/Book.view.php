<?php
class BookView
{
  public function render($data)
  {
    $no = 1;
    $dataBook = null;
    foreach ($data as $val) {
      list($id, $title, $author, $publication_year, $isbn) = $val;
      $dataBook .= "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $title . "</td>
                  <td>" . $author . "</td>
                  <td>" . $publication_year . "</td>
                  <td>" . $isbn . "</td>
                  <td>
                  <a href='book.php?id_edit=" . $id .  "' class='btn btn-warning'>Edit</a>
                  <a href='book.php?id_hapus=" . $id . "' class='btn btn-danger'>Delete</a>
                  </td>
                  </tr>";
    }

    $tpl = new Template("templates/book.html");
    $tpl->replace("JUDUL", "Book Management");
    $tpl->replace("DATA_TABEL", $dataBook);
    
    // Default form for adding new book
    $tpl->replace("FORM_TITLE", "Add Book");
    $tpl->replace("FORM_ACTION", "book.php");
    $tpl->replace("ACTION_BUTTON", "Add");
    $tpl->replace("ACTION_TYPE", "add");
    $tpl->replace("ID_VALUE", "");
    $tpl->replace("TITLE_VALUE", "");
    $tpl->replace("AUTHOR_VALUE", "");
    $tpl->replace("PUBLICATION_YEAR_VALUE", "");
    $tpl->replace("ISBN_VALUE", "");
    
    $tpl->write();
  }

  public function renderWithEditForm($data, $editData)
  {
    $no = 1;
    $dataBook = null;
    foreach ($data as $val) {
      list($id, $title, $author, $publication_year, $isbn) = $val;
      $dataBook .= "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $title . "</td>
                  <td>" . $author . "</td>
                  <td>" . $publication_year . "</td>
                  <td>" . $isbn . "</td>
                  <td>
                  <a href='book.php?id_edit=" . $id .  "' class='btn btn-warning'>Edit</a>
                  <a href='book.php?id_hapus=" . $id . "' class='btn btn-danger'>Delete</a>
                  </td>
                  </tr>";
    }

    list($id, $title, $author, $publication_year, $isbn) = $editData;

    $tpl = new Template("templates/book.html");
    $tpl->replace("JUDUL", "Book Management");
    $tpl->replace("DATA_TABEL", $dataBook);
    
    // Edit form
    $tpl->replace("FORM_TITLE", "Edit Book");
    $tpl->replace("FORM_ACTION", "book.php?id_update=$id");
    $tpl->replace("ACTION_BUTTON", "Update");
    $tpl->replace("ACTION_TYPE", "update");
    $tpl->replace("ID_VALUE", $id);
    $tpl->replace("TITLE_VALUE", $title);
    $tpl->replace("AUTHOR_VALUE", $author);
    $tpl->replace("PUBLICATION_YEAR_VALUE", $publication_year);
    $tpl->replace("ISBN_VALUE", $isbn);
    
    $tpl->write();
  }
}