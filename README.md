<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# 📚 Laravel Sistem Inventaris Barang

## 🚀 Overview
Projek ini dibuat berdasarkan judul project UKK "Inventaris Barang", dan ERD yang telah diberikan.

Sistem Inventaris Barang adalah aplikasi berbasis web yang dirancang untuk mengelola Barang dengan fitur-fitur yang lengkap, mencakup pengelolaan kategori, sub-kategori, pengadaan, distribusi, lokasi, dan perhitungan depresiasi aset. Sistem ini membantu dalam mengoptimalkan pencatatan, pelacakan, dan pengelolaan aset perusahaan secara efisien.

## 🛠️ Features
1. **Manajemen Kategori Aset**

   - Pengelolaan kategori aset seperti penambahan, penghapusan, dan pengubahan data kategori.
   - Relasi dengan sub-kategori untuk pengelolaan yang lebih terstruktur.

2. **Manajemen Sub-Kategori Aset**

   - Mendukung pengelolaan sub-kategori yang terhubung langsung dengan kategori aset.

3. **Manajemen Distributor**

   - Data distributor mencakup informasi seperti nama, alamat, nomor telepon, dan email.

4. **Manajemen Merek (Brand)**

   - Mendukung penambahan dan pengelolaan data merek yang digunakan dalam pengadaan aset.

5. **Manajemen Satuan**

   - Pengelolaan satuan barang seperti unit, box, liter, dll.

6. **Manajemen Master Barang**

   - Pencatatan informasi detail barang seperti kode, nama barang, dan spesifikasi teknis.

7. **Manajemen Depresiasi**
   - Mengelola informasi depresiasi aset termasuk lama depresiasi dan keterangan tambahan.
8. **Manajemen Pengadaan Aset**

   - Mendukung pengadaan aset dengan data yang terintegrasi, seperti:
     - Kategori dan sub-kategori aset.
     - Merek, distributor, dan spesifikasi barang.
     - Informasi pengadaan (kode, tanggal, harga, dan nilai barang).
     - Flag barang (fb) untuk menandai status tertentu.

9. **Manajemen Lokasi**

   - Pengelolaan lokasi penyimpanan aset.

10. **Manajemen Mutasi Lokasi**

    - Mendukung mutasi aset antar lokasi dengan pelacakan flag lokasi dan flag pindah.

11. **Manajemen Opname**

    - Pencatatan opname aset untuk memonitor kondisi terkini.

12. **Perhitungan Depresiasi**

    - Menghitung depresiasi aset secara otomatis berdasarkan durasi dan nilai barang.

## 📋 Prerequisites
Ensure you have the following installed on your system:

- **PHP 8.2+**
- **Composer**
- **Laravel 11**
- **MySQL**
- **Node.js & npm**

## 🔧 Installation
Follow these steps to set up the project locally:

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/AxelMardiyo/UKK-Inventaris-Barang.git
```   
Move into the project directory:
    
```bash
cd UKK-Inventaris-Barang
```

### 2️⃣ Install Backend Dependencies
```bash
composer install
```

### 3️⃣ Configure Environment Variables
Duplicate the `.env.example` file and rename it to `.env`:
```bash
cp .env.example .env
```
Update the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4️⃣ Generate Application Key
```bash
php artisan key:generate
```

### 5️⃣ Migrate the Database
```bash
php artisan migrate
```

### 6️⃣ Compile Frontend Assets (Optional)
If the project uses custom CSS or JavaScript:
```bash
npm install
npm run dev
```

### 7️⃣ Start the Server
Run the Laravel development server:
```bash
php artisan serve
```
Access the application at `http://127.0.0.1:8000`.

## 🛡️ Default Admin Credentials
```text
Email: admin@gmail.com
Password: password
```

