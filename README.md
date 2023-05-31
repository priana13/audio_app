
## About Audo App

DIbuat dengan Framework Laravel

- [Laravel](https://laravel.com/docs/routing).

## Cara instalasi

git clone https://github.com/priana13/audio_app.git

cd audio_app

composer install

cp .env-example .env

Buat database di mysql / phpmyadmin dengan nama audo_app kemudian pastikan .env sudah disesuaikan dengan setingan database yang anda buat.

kemudian: 

php artisan migrate:fresh --seed

php artisan serve

Dokumentasi API bisa dilihat di sini: 
- [Audio App - Postman](https://documenter.getpostman.com/view/12367169/2s93m1b5BJ)

Akses Halaman Admin/Dashboard
http://127.0.0.1:8000/admin
  user: admin@example.com
  pass: password

selamat mencoba. 

