<?php

class Book extends DB
{
    function getBook()
    {
        $query = "SELECT * FROM books";
        return $this->execute($query);
    }

    function getBookById($id)
    {
        $query = "SELECT * FROM books WHERE book_id = '$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $title = $data['title'];
        $author = $data['author'];
        $publication_year = $data['publication_year'];
        $isbn = $data['isbn'];

        $query = "INSERT INTO books VALUES (NULL, '$title', '$author', '$publication_year', '$isbn')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM books WHERE book_id = '$id'";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $title = $data['title'];
        $author = $data['author'];
        $publication_year = $data['publication_year'];
        $isbn = $data['isbn'];

        $query = "UPDATE books SET title = '$title', author = '$author', publication_year = '$publication_year', isbn = '$isbn' WHERE book_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}