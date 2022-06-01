
## Laravel Form Generator
[![Latest Version on Packagist](https://img.shields.io/packagist/v/djmitry/laravel-youtube-video.svg)](https://packagist.org/packages/djmitry/laravel-youtube-video)
[![Software License](https://img.shields.io/packagist/l/djmitry/laravel-youtube-video.svg)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/djmitry/laravel-youtube-video.svg)](https://packagist.org/packages/djmitry/laravel-youtube-video)

# Установка
```bash
composer require djmitry/laravel-youtube-video:dev-master
php artisan view:clear
```

# Использование
Добавить вызов blade директивы в вид
```bash
@youtube(U6M56xSvpnQ, 560, 312)
```
Параметры: 1. id видео, 2. ширина, 3. высота
