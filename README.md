<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/img/logo.png" width="400" alt="InnClod"></a></p>

## Prueba Tecnica Practica PHP Ingeniero de desarollo

Se realiza CRUD  en el  framework laravel, las instrucciones de despliegue son las siguientes:

- Clonar el repositorio (https://github.com/sebasbeltran95/InnClod_Prueba).
- Descomprimir los archivos vendor.rar y .rar.
- Realizar un composer update.
- Ejecutar la migracion (php artisan migrate).
- Entrar a base de datos en la tabla users puede crear el usuario con el que ingresara al aplicativo o puede ir a la siguiente  ruta dentro del proyecto (routes/web.php), dentro del archivo web encontrara la siguiente linea Auth::routes(['register' => false]);, lo que tiene que hacer es borrar lo quee sta dentro del parentesis Auth::routes(); y con esto se habilitara la ruta register, entrando a esta ruta puede crerar los accesos para poder ingresar al aplicativo.
- Dentro del proyecto se encuentra una carpeta llamada BD y dentro esta la base de datos con los accesos para entrar al aplicativo y con las pruebas que se realizaron, lo unico que tiene que hacer es crear la base de datos clod y importar las tablas, para ingresar al aplicativo debe ingresar las siguientes credenciales(admin@mail.com y su contraseña es 1234).
- Para poder inicializar el servidor hacemos lo siguiente: abre el proyecto con visual studio code, luego se procede a abrir la terminar, se ingresa el comando php artisan serve, este comando arrojara la siguiente url http://127.0.0.1:8000, esta url se copia y se pega en el navegador de su preferencia, este paso se realiza despues de haber echo la migracion o de haberse importado la base de datos que se encuentra en el proyecto.

## Vistas

Para poder ingresar a la vista proceso lo hacemos a traves de la siguiente URL /proceso, en esta vista podemos encontrar un CRUD echo a traves de modales, en la tabla se evidenciara la siguiente informacion, nombre, prefijo y la fecha en la que se creo. 

Para poder ingresar a la vista tipó_doc lo hacemos a traves de la siguiente URL /tipo_doc,en esta vista podemos encontrar un CRUD echo a traves de modales, en la tabla se evidenciara la siguiente informacion, nombre, prefijo y la fecha en la que se creo.

Para poder acceder a la vista documento lo hacemos a traves de la siguiente URL /documento, en esta vista podemos encontrar un CRUD echo a traves de modales, en la tabla se evidenciara la siguiente informacion, nombre, codigo, contenido, tipo_doc, proceso y la fecha en la que se creo, el codigo es un valor unico.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
