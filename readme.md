# SIM Desa v1.0.0

Aplikasi Sim Desa adalah sebauh aplikasi managament desa per dusun sederhana.

# Menjalankan Proyek

Lakukan instalasi semua depedencies yang dibutuhkan dengan composer. Ketik
perintah berikut pada root direktori project.

```bash
composer install
```

Buat database di Phpmyadmin dan ubah konfigurasi database di `application/config/database.php`.

```php
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root', // <- sesuaikan dengan username mysql-mu
	'password' => '', // <- jika user mysql-mu menggunakan password, silahkan isi ini
	'database' => 'db_sim', //<- sesuaikan nama database dengan yang kamu buat
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```

Kemudian lakukan migrasi database dengan perintah:

```bash
composer migrate
```

Tidak perlu membuat tabel atau impor secara manual, karena semua sudah dilakukan
dengan migrasi database.
