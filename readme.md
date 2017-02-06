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
		- [Usuarios](#Users)
		    - [Roles](#Roles)
		    - [Usuarios](#Users)
		- [Articulos](#Categorias)
		- [Categorias](#Categorias)
        - [Reportes](#MenusUSR)	    
    - [Menus del Usuario](#MenusUSR)	    
		- [Facturas](#Facturas)
		- [Clientes](#Clientes)
- [Tools](#Tools)
- [Help & Questions](#Help)


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


o bien  XAMPP 

Give examples

<a name="INstalacion"></a>
### Instalacion

A step by step series of examples that tell you have to get a development env running

configuracion del puerto y modulos habilitados para Apache

```
Listen 8081
...
LoadModule rewrite_module modules/mod_rewrite.so
```

modificar el httpd-vhosts.conf en C:\xampp\apache\conf\extra

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

en windows agregar en C:\Windows\System32\drivers\etc en el hots
```
127.0.0.1      		gestion.app
```
para la url sea gestion.app:8081 en el browser


En la raiz del codigo se puede encontrar un arch env.example, renombralo a .env y editar todos los parametros para la aplicacion)

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=DB_name
DB_USERNAME=user
DB_PASSWORD=secret
```

desde el raiz del proyecto abri una ventana de comandos o bash y ejecuta

```
composer update 
```
esto descarga y actualiza todos los paquetes del proyecto luego

```
php artisan  key:generate 
```
agrega una clave en el arch env

una vez creada la bd en mysql ejecutar las migraciones para la creacion de tablas y carga de datos
 
 ```
 php artisan migrate  --seed
```

esto te genera las tablas y relaciones en la bd ademas carga con algunos datos 


<a name="Documentacion"></a>
## Documentacion

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

<a name="Tools"></a>
## Tools

* [Laravel](https://laravel.com/) - The web framework used
* [Composer](https://getcomposer.org/) - Dependency Management
* [MySql](https://www.mysql.com/) - Database used
* [Apache](https://www.apache.org/) - WebServer used
* [XAMPP](https://www.apachefriends.org/es/index.html) - Package for development used



## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Plechuc Valentin** - *profile* - [GitHub](https://github.com/veplechuc)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* My family



# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

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
