# Sistem Pendukung Keputusan Menggunakan Metode SAW
- CodeIgniter 4
- Bootstrap 4
- JQuery

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible, and secure. 
More information can be found at the [official site](http://codeigniter.com).

## Server Requirements

PHP version 7.2 or higher is required, with the following extensions installed: 

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

## Bootstrap 4

the world’s most popular framework for building responsive, mobile-first sites, with BootstrapCDN.
[getbootstrap](http://getbootstrap.com)


# Sistem Pendukung Keputusan Menggunakan Metode SAW

Sistem Pendukung Keputusan ini dapat digunakan untuk berbagai macam studi kasus sesuai kebutuhan. Contohnya seperti seleksi calon karyawan atau rekomendasi handphone untuk dibeli.

Metode yang digunakan adalah SAW atau Simple Additive Weighting. Metode SAW sering juga dikenal istilah metode penjumlahan terbobot. Konsep dasarnya adalah mencari penjumlahan terbobot dari rating kinerja pada setiap alternatif pada semua atribut. Metode SAW membutuhkan proses normalisasi matriks keputusan (x) ke suatu skala yang dapat diperbandingkan dengan semua rating alternatif yang ada.

# How to Install
1. `git clone https://github.com/devryank/cispk.git`
2. Buat database di local dengan nama db_cispk atau yang lainnya.
3. setting .env sesuai kebutuhan
    `database.default.hostname = localhost`
	`database.default.database = db_cispk`
	`database.default.username = root`
	`database.default.password =`
	`database.default.DBDriver = MySQLi`
4. Buka terminal,`php spark migrate`
5. `php spark serve`

# How to Use
1. Registrasi user
2. Kasus -> Tambah Kasus
3. Kriteria -> Tambah Kriteria
4. Alternatif -> Tambah Alternatif
5. Hasil perhitungan berada di halaman hasil