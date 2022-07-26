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
	
	8- If you want to create fake user using cmd
		run php artisan tinker
		run User::factory()->count(20)->create()
		but before do that you must 
			if you need this users in mongodb
			1 - from .ENV file change DB_CONNECTION=mongodb
			2 - from App\Models\User Model - uncomment use Jenssegers\Mongodb\Auth\User as Authenticatable;
							-comment use Illuminate\Foundation\Auth\User as Authenticatable;
			
			if you need this users in mysql
			1 - from .ENV file change DB_CONNECTION=mysql
			2 - from App\Models\User Model - uncomment use Illuminate\Foundation\Auth\User as Authenticatable;
							-comment use Jenssegers\Mongodb\Auth\User as Authenticatable;
			
			remember to set mongodb with use Jenssegers\Mongodb\Auth\User as Authenticatable
				and mysql with use Illuminate\Foundation\Auth\User as Authenticatable; 
		
	
