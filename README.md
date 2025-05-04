# TP8DPBO2025C1
Saya Muhammad Hafidh Fadhilah dengan NIM 2305672 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program
![Screenshot 2025-05-04 210550](https://github.com/user-attachments/assets/69fd864a-11b3-4778-b63d-593cc159f36c)

### 1. `students`
Menyimpan data mahasiswa.

| Kolom        | Tipe         | Keterangan                  |
|--------------|--------------|-----------------------------|
| student_id   | INT (PK)     | ID unik mahasiswa (auto)    |
| name         | VARCHAR(100) | Nama lengkap mahasiswa      |
| nim          | VARCHAR(20)  | Nomor Induk Mahasiswa (unik)|
| phone        | VARCHAR(15)  | Nomor HP mahasiswa          |
| join_date    | DATE         | Tanggal bergabung           |

---

### 2. `books`
Menyimpan data buku.

| Kolom            | Tipe         | Keterangan                 |
|------------------|--------------|----------------------------|
| book_id          | INT (PK)     | ID unik buku (auto)        |
| title            | VARCHAR(200) | Judul buku                 |
| author           | VARCHAR(100) | Nama penulis               |
| publication_year | INT          | Tahun terbit               |
| isbn             | VARCHAR(13)  | ISBN unik buku             |

---

### 3. `borrows`
Mencatat peminjaman buku oleh mahasiswa. Relasi:
- `student_id` → `students(student_id)`
- `book_id` → `books(book_id)`

| Kolom        | Tipe      | Keterangan                         |
|--------------|-----------|------------------------------------|
| borrow_id    | INT (PK)  | ID unik peminjaman (auto)          |
| student_id   | INT (FK)  | ID mahasiswa yang meminjam buku    |
| book_id      | INT (FK)  | ID buku yang dipinjam              |
| borrow_date  | DATE      | Tanggal peminjaman                 |
| return_date  | DATE      | Tanggal pengembalian (nullable)    |

---

# Alur Penjelasan
1. **index.php**  
   - Merupakan **halaman utama website**.  
   - Menampilkan daftar data mahasiswa dari tabel `students` secara langsung.  
   - Berfungsi sebagai landing page dan mengarahkan pengguna ke fitur lain (buku & peminjaman).

2. **Controller** (`controllers/`)  
   - Menangani logika website untuk `students`, `books`, dan `borrows`.
   - Menerima input dari pengguna, memanggil model yang sesuai, dan meneruskan data ke view.

3. **Model** (`models/`)  
   - Mengelola interaksi langsung dengan database.
   - Berisi query untuk menambahkan, mengubah, menghapus, dan membaca data.

4. **View** (`views/`)  
   - Bertanggung jawab menampilkan data ke pengguna.
   - Menggunakan template HTML yang disesuaikan dengan data yang diterima dari controller.

5. **Template** (`templates/`)  
   - HTML murni sebagai kerangka tampilan.
   - Dipakai oleh view untuk membungkus data dengan antarmuka pengguna.

# Dokumentasi 
https://github.com/user-attachments/assets/4549facd-4183-46c5-9076-ae416646d202



