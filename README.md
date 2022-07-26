# Laravel-MongoDB-Mysql
 Laravel sample app using MongoDB and Mysql
 
 
 
 
 
     This sample app use Two database drivers
	1 - Nosql: MongoDB
	1 - sql: Mysql
	
	Using 
	Php ^7.4
	Laravel ^8.75
	Laravel Dreeze ^1.10
	Jenssegers laravel-mongodb 
	
	
	Installation:
	
	1 - In phpmyadmin create database
	
	2 - Go to .ENV file and
	Change DB_CONNECTION=mysql to DB_CONNECTION=mongodb
	
	CMD run command php artisan migrate
	
	3 - Go to .ENV file again and
	Rechange DB_CONNECTION=mongodb to DB_CONNECTION=mysql
	
	CMD run command php artisan migrate
	
	That is all
