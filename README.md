<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Práctica Laravel Exchange 

Esta práctica trata sobre el framework de PHP Laravel, implementando las convenciones y demás utillizades de Laravel.
Con esta práctica podrás ver en tiempo real los precios de las 20 criptomonedas más populares del momento y tendrás enlaces
de los exchange más populares.


## Requisitos para funcionar

Principalmente descargar y descomprimir el proyecto, ejecutar los comandos necesarios de laravel para poder ejecutar el proyecto e importante también, crear la base de datos antes de lanzar el proyecto. 
Por último ejecutar un artisan migrate --seed para migrar las tablas y ejecutar los seeder.


## Datos de prueba

Por defecto viene con dos usuarios, uno con rol usuario y otro administrador, los puedes encontrar en UserSeed.
Y en el seed de Cryptocurrency viene una petición a la API de CoinMarket para obtener las 20 primeras cryptocurrency.

## Tener en cuenta

No me funcionaron los updates con la funcion validate() y los dejé comentados.

