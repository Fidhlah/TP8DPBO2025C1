<?php

class Borrow extends DB
{
    function getBorrow()
    {
        $query = "SELECT b.borrow_id, s.name, s.nim, bk.title, b.borrow_date, b.return_date 
                 FROM borrows b
                 JOIN students s ON b.student_id = s.student_id
                 JOIN books bk ON b.book_id = bk.book_id";
        return $this->execute($query);
    }

    function getBorrowById($id)
    {
        $query = "SELECT * FROM borrows WHERE borrow_id = '$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $student_id = $data['student_id'];
        $book_id = $data['book_id'];
        $borrow_date = $data['borrow_date'];

        $query = "INSERT INTO borrows (student_id, book_id, borrow_date, return_date) 
                  VALUES ('$student_id', '$book_id', '$borrow_date', NULL)";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM borrows WHERE borrow_id = '$id'";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $student_id = $data['student_id'];
        $book_id = $data['book_id'];
        $borrow_date = $data['borrow_date'];

        $query = "UPDATE borrows SET student_id = '$student_id', book_id = '$book_id', 
                 borrow_date = '$borrow_date', return_date = NULL 
                 WHERE borrow_id = '$id'";
        return $this->execute($query);
    }

    function returnBook($id)
    {
        $today = date('Y-m-d');
        $query = "UPDATE borrows SET return_date = '$today' WHERE borrow_id = '$id'";
        return $this->execute($query);
    }
}