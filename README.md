<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/img/logo.png" width="400" alt="InnClod"></a></p>

## Prueba Tecnica Practica PHP Ingeniero de desarollo

Se realiza CRUD  en el  framework laravel, las instrucciones de despliegue son las siguientes:

- Clonar el repositorio (https://github.com/sebasbeltran95/InnClod_Prueba).
- Descomprimir los archivos vendor.rar y .rar.
- Realizar un composer update.
- Ejecutar la migracion.
- Entrar a base de datos en la tabla users puede crear el usuario con el que ingresara al aplicativo o puede ir a la siguiente  ruta dentro del proyecto (routes/web.php), dentro del archivo web encontrara la siguiente linea Auth::routes(['register' => false]);, lo que tiene que hacer es borrar lo quee sta dentro del parentesis Auth::routes(); y con esto se habilitara la ruta register, entrando a esta ruta puede crerar los accesos para poder ingresar al aplicativo.
- Dentro del proyecto se encuentra una carpeta llamada BD y dentro esta la base de datos con los accesos para entrar al aplicativo y con las pruebas que se realizaron, lo unico que tiene que hacer es crear la base de datos clod y importar las tablas, para ingresar al aplicativo debe ingresar las siguientes credenciales(admin@mail.com y su contraseña es 12345678).

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
