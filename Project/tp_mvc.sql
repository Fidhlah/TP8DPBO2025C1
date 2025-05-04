-- Membuat tabel students
CREATE TABLE students (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    nim VARCHAR(20) UNIQUE NOT NULL,
    phone VARCHAR(15),
    join_date DATE NOT NULL
);

-- Membuat tabel books
CREATE TABLE books (
    book_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    author VARCHAR(100) NOT NULL,
    publication_year INT,
    isbn VARCHAR(13) UNIQUE
);

-- Membuat tabel borrows
CREATE TABLE borrows (
    borrow_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    book_id INT NOT NULL,
    borrow_date DATE NOT NULL,
    return_date DATE,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE,
    FOREIGN KEY (book_id) REFERENCES books(book_id) ON DELETE CASCADE
);

-- Menambahkan data contoh ke tabel students
INSERT INTO students (name, nim, phone, join_date) VALUES
('Andi Pratama', '123456789', '081234567890', '2023-09-01'),
('Budi Santoso', '987654321', '082345678901', '2023-10-15'),
('Citra Lestari', '112233445', '083456789012', '2024-01-20');

-- Menambahkan data contoh ke tabel books
INSERT INTO books (title, author, publication_year, isbn) VALUES
('Pemrograman Python', 'John Doe', 2020, '9781234567890'),
('Data Structures', 'Jane Smith', 2019, '9780987654321'),
('Machine Learning Basics', 'Alex Brown', 2021, '9781122334455');

-- Menambahkan data contoh ke tabel borrows
INSERT INTO borrows (student_id, book_id, borrow_date, return_date) VALUES
(1, 1, '2025-04-01', NULL),
(2, 2, '2025-04-02', '2025-04-10'),
(3, 3, '2025-04-03', NULL);