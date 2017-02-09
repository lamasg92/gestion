# Sistema de Gestion - Proyecto de Habilitación Tecnicatura Superior en Tecnologías de Informacion
                    
<a name="Intro"></a>
## Introduccion
Sistema de Gestion de Factuas que permite la facturacion  de un producto, ademas de la gestion de Usuarios, Clientes y Roles de Usuario.
El sistema presenta la funcionalidad de acceso por logueo y Registro de nuevo Usuario como asi tambien permite la recuperacion de claves y reset de la misma


## Contenido

- [Introduccion](#Intro)
	- [Getting Started](#start)

- [Requerimientos](#Requerimientos)
- [Instalacion](#Instalacion)
- [Documentation](#Documentation)
	- [Menus del Administrador](#MenusADM)
		- [Usuarios](#UsersMain)
		    - [Roles](#Roles)
		    - [Usuarios](#Users)
		- [Articulos](#Articulos)
		- [Categorias](#Categorias)
        - [Reportes](#Reportes)	    
    - [Menus del Usuario](#MenusUSR)	    
		- [Facturas](#Facturas)
		- [Clientes](#Clientes)
- [Tools y FrameWorks](#Tools)

- [Issues](#Issues)

- [Laravel Oficial](#laravel)


<a name="start"></a>
## Getting Started

Es un sistema pensado para ejecutarse de forma local por lo que debera ser instalado en una pc, ademas debera contar conel software correspondiente (definidos en requerimientos) para poder interactuar con el mismo.
Los pasos para la instalacion no contemplan la instalacion del software base

<a name="Requerimientos"></a>
### Requerimientos

Se debera contar con lo siguiente instalado previamente
* PHP >= 5.6.4
* MySql
* Apache
* Composer


se puede instalar  XAMPP como alternativa para Windows 


<a name="Instalacion"></a>
### Instalacion

Como primer paso para la instalacion del Sistema se deberan configurar las siguientes opciones

##### Usando Apache

Se debera configurar el puerto y modulos habilitados para Apache

```
Listen 8081
...
LoadModule rewrite_module modules/mod_rewrite.so
```
**Nota**: se usa el puerto 8081 ya que suele generar conflicto con Skype el usar el puerto **80**.

Si la instalacion se realiza en Windows modificar el httpd-vhosts.conf en C:\xampp\apache\conf\extra

```
	<VirtualHost *:8081>
               DocumentRoot "C:/xampp/htdocs/"
               ServerName localhost
        </VirtualHost>
        <VirtualHost *:8081>
               DocumentRoot "C:/xampp/htdocs/gestion/public"
               ServerName gestion.app
               <Directory "C:/xampp/htdocs/gestion/public">
                   AllowOverride All
                   Require all Granted
                </Directory>      
	</VirtualHost>
```

en Windows agregar en C:\Windows\System32\drivers\etc en el host, si lo ejecuta en forma local
```
127.0.0.1      		gestion.app
```
para que la url sea gestion.app:8081 es decir, en el browser sera algo como 

```
http://gestion.app:8081
```
En la raiz del proyecto se puede encontrar un arch env.example, renombralo a .env y editar todos los parametros para la aplicacion)

#####configuracion de la BD (MySql)
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=DB_name
DB_USERNAME=user
DB_PASSWORD=secret
```

desde el raiz del proyecto abrir una ventana de comandos o bash y ejecutar

```
composer update 
```
este comando  descarga y actualiza todos los paquetes del proyecto luego

```
php artisan  key:generate 
```
agrega una clave en el arch env, neccesario para poder correr la aplicaion

una vez creada la bd en mysql ejecutar las migraciones para la creacion de tablas y carga de datos
 
 ```
 php artisan migrate  --seed
```

esto te genera las tablas y relaciones en la bd ademas carga con algunos datos 


<a name="Documentacion"></a>
## Documentacion
En la wed de Styde.net ()https://styde.net/) se puede hallar excelente documentacion 

* [Cómo instalar Composer y Laravel en Windows](https://styde.net/instalacion-de-composer-y-laravel-en-windows/) 
* [Cómo instalar Composer y Laravel en Linux](https://styde.net/como-instalar-lamp-en-ubuntu-linux/)

###Los Menues

<a name="MenusADM"></a>
####Del Administrador
<a name="UsersMain"></a>
#####Usuarios
Este menu visualiza las opciones para listar los Roles del sistema y visualizacion de los usuarions
<a name="Roles"></a>
#####Roles
Visualiza los roles definidos en el sistema


| Rol        | Descripcion      | 
| ------------- |:-------------:| 
| **admin**     | Administrador del sistema | 
| **user**      | Usuario del sistema      | 
 


<a name="Users"></a>
#####Usuarios
Permite la visualizacion de los usuarios definidos en el sistema , la edicion de ciertos valores y la eliminacion de mismo.    

<a name="Articulos"></a>
#####Articulos
ABM de articulos para usar en la Facturacion
<a name="Categorias"></a>
#####Categorias
Premite hacer un ABM de las Categorias
<a name="Reportes"></a>
#####Reportes
 * Venta Diaria	Lista las ventas en funcion de las fechas seleccionada(Inicio y fin)
 * Venta Por Clientes	Lista las ventas en funcion del Cliente seleccionado
 * Venta por Usuario	Lista las ventas del Usuario seleccionado

<a name="MenusUSR"></a>
####Del Usuario

<a name="Facturas"></a>
#####Facturas (comun para todos los usuarios)
Parmite realizar la carga de una factura, ingresandoo el cliente y el articulo a facturar como asi tambien el monto y la cantidad.
Ademas permite el ingreso del Medio de pago(el sistema maneja solo dos : Efectivo o Tarjeta)  , en el caso de Tarjeta se permite el ingreso del Cupon

<a name="Reportes"></a>
#####Clientes (comun para todos los usuarios)
ABM de la informacion correspondiente al cliente 

<a name="Tools"></a>
## Tools y FrameWorks

* [Laravel](https://laravel.com/) - The web framework used
* [Composer](https://getcomposer.org/) - Dependency Management
* [MySql](https://www.mysql.com/) - Database used
* [Apache](https://www.apache.org/) - WebServer used
* [XAMPP](https://www.apachefriends.org/es/index.html) - Package for development used
* [RiotJs](http://riotjs.com/) - Simple and elegant component-based UI library
* [JQuery](https://jquery.com/) - fast, small, and feature-rich JavaScript library.
* [Bootstrap](http://getbootstrap.com/) - Bootstrap is the most popular HTML, CSS, and JS framework
* [DatePicker](https://uxsolutions.github.io/bootstrap-datepicker/?markup=input&format=&weekStart=&startDate=&endDate=&startView=0&minViewMode=0&maxViewMode=4&todayBtn=false&clearBtn=false&language=en&orientation=auto&multidate=&multidateSeparator=&keyboardNavigation=on&forceParse=on#sandbox) 

<a name="Issues"></a>
## Issues
En la generacion de los pdf´s de los comprobantes se detecto un error  que aborta el sistema, si se tiene instalado PHP en su version 7.1
Este es el Link relacionado con ese issue
https://github.com/dompdf/dompdf/issues/1272

## Authors

* **Plechuc Valentin** - *profile* - [GitHub](https://github.com/veplechuc)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details


<a name="Laravel"></a>
# Laravel PHP Framework


Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
