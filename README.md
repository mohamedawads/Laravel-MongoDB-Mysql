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
	
	2 - Go to .ENV file and setup mysql database and mongodb database(no USERNAME no PASSWORD)
	
	3 - Go to .ENV file and
	    Change DB_CONNECTION=mysql to DB_CONNECTION=mongodb
	    CMD run command php artisan migrate
	
	4 - Go to .ENV file again and
	    Rechange DB_CONNECTION=mongodb to DB_CONNECTION=mysql
	    CMD run command php artisan migrate
	
	Using
	1 - Register new user
		application will create new user in two database mysql and mongodb
	2 - you have two tabs named mongodb , mysql
		each one display users in its database
	3 - In the top of table buttom "create new user"
		also create users in the two databases
	4 - Each user row has "friend", "unfriend" buttons
	
	5 - Friend button create friend relation between the login user(Authenticated user) and the user in this table row
	
	6 - UnFriend button delete the friend relation between this user and login user
	
	7 - Show button dispay info about user and all user friends
	
