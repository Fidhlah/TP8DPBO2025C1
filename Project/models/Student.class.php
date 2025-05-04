<?php

class Student extends DB
{
    function getStudent()
    {
        $query = "SELECT * FROM students";
        return $this->execute($query);
    }

    function getStudentById($id)
    {
        $query = "SELECT * FROM students WHERE student_id = '$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $nim = $data['nim'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];

        $query = "INSERT INTO students VALUES (NULL, '$name', '$nim', '$phone', '$join_date')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM students WHERE student_id = '$id'";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $name = $data['name'];
        $nim = $data['nim'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];

        $query = "UPDATE students SET name = '$name', nim = '$nim', phone = '$phone', join_date = '$join_date' WHERE student_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}