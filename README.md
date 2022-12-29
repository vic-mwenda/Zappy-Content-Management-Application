<p align="center">
  <img src="assets/img/zappy-logo-1.png" style="width: 50px" align="center"/>
</p>

> Zappy is a PHP based Information Pool System (or simply a Social Media Website), consisting of a complete Login/Registration system, User Profile system and a blog management system.


# Table of Contents

* [Installation](#installation)
  * [Requirements](#requirements)
  * [Installation Steps](#installation-steps)
  * [Getting Started](#getting-started)
* [Features](#Features)
* [Components](#Components)
  * [Languages](#Languages)
  * [Development Environment](#Development-Environment)
  * [Database](#database)
  * [DBMS](#DBMS)
  * [API](#api)
  * [Frameworks and Libraries](#Frameworks-and-Libraries)
  * [Techniques](#techniques)
* [Details](#details)
* [Future Improvements](#future-improvements)


## Installation

#### Requirements
* PHP
* Apache server
* MySQL Database
* SQL
* phpMyAdmin

> All of these requirements can be completed at once by simply installing a server stack like `Wamp` or `Xampp` etc.

#### Installation Steps
1. Import the `zappy.sql` file in the `database` folder into phpMyAdmin. There is no need for any change in the .sql file. This will create the database required for the application to function.

2. Edit the `connection.php` file in the `includes` folder to create the database connection. Change the password and username to the ones being used within current installation of `phpMyAdmin`. There is no need to change anything else.

```php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "examplePassword";
$dBName = "exampleDatabase";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName, 3307);

if (!$conn)
{
    die("Connection failed: ". mysqli_connect_error());
}
```
> The port number does not need to be changed under normal circumstances, but if you are running into a problem or the server stack is installed on another port, feel free to change it, but do so carefully.



#### Getting started
The database file already contains a lot of sample data and users. Most users in the database have the same password as their usernames except for a few. You can always use your G-mail account to login.


## Features

* [Application Dashboard](#application-Dashboard)
* [Login/Registration and User Authentication](#Login-Registration-and-User-Authentication)
* [User Profile System](#user-profile-system)
* [Blog Management system](#management-systems)
* [Security](#security)


## Components

#### Languages
```
PHP 8.0
SQL 14.0
JavaScript ES 6
HTML5
CSS3
```

#### Development Environment
```
LampServer Stack 0.0.12
Linux mint
```

#### Database
```
MySQL Database 7.4.29
```

#### DBMS
```
phpMyAdmin 5.2.0
```

#### API
```
MySQLi APIs
```

#### Frameworks and Libraries
```
JQuery v3.3.1
BootStrap v4.2.1
```

#### Techniques
```
AJAX
```

#### External Plugins
```
[PHPMailer 6.0.6](https://github.com/PHPMailer/PHPMailer)
```
> This was used for creating a `mail server` on `Windows localhost`, since unlike in Linux, there isnt one already installed in windows. This plugin was used for the sending and receiving of emails on localhost, and is not needed on a live domain

## Details

> Details of important Features of the Application

### Application Dashboard

<p align='center'>
  <img src="assets/img/Readme%20Assets/ZappyDashboard.png" width="500" align="center"/>
</p>

The Dashboard provides a central interface to most features of the application. The User profile tab on the upper right corner of the screen provides a user drop-down, as well as a link to the profile and the profile-editing page.
The 4 tab interface on the left side provides access to main dashboard, post management section and user profile section.
The notification icon at the right of the screen provides a realtime interface for user realtime notification such as likes and updates on new products.

### Management Systems

* `Blog Management System`:
  * Blog creation
  * Choosing optional Blog cover image (there is a default image)
  * `Like` system on blogs (users can either like the blog or remove their like)
  * Deleting own blogs (admin can remove any)

### Login/Registration and User Authentication

<p>
  <img src="assets/img/Readme%20Assets/zappy-login-page.png" width="400" align="right"/>
</p>

Zappy supports a complete login/registration and User Profile system. On startup, the application requests authentication to access system features. Each user can make a unique username which cannot be changed later.
The user `passwords` are `hashed` before storing in database so even admins do not have access to the original passwords as well.
Additional User information include `Full Name`, `email`, `Profile Image` and `Bio`.

There is also a secure `Email-authentication-System` which ensures users use authentic emails.
The app generates temporary encrypted token-links with a certain expiry time which when used gives user full access to account.
 Since that also requires current password, the process is secure and has lesser chances of exploitation.

The app uses several authentication methods for signing up and logging in.
It checks for `empty fields`, `wrong username`, `wrong password`, `SQL errors`, `server errors`
and in case of signing up, `corrupted image` or `wrong image type` errors

### User Profile System

<p>
  <img src="assets/img/Readme%20Assets/ProfileManagement2.png" width="350" align="left"/>
</p>

Zappy has a complete `User profile system`. Each user is assigned a profile on signing up, with which the user can create Blogs, updates etc and interact with the app's features.
The user's full name, about/bio, as well as profile image are optional,
meaning that anyone can signup without setting those.
The `user profile` can be accessed through the option in the account menu on the navigation bar,
 The profile page shows the basic User information like username, full name, gender, headline and bio.
 Apart from that, it shows the different  `Blogs` the User has created along with the `likes` he/she has acquired.
 If in case the user has not done any of that or is new, the page shows an flashy zappy logo with a 'empty blogger'
 caption to remind you that you need to be more active :)

There is also a `Profile Editing System` which allows the User to edit his profile information. It can be accessed through the respective option in the settings menu in the navigation bar.
The system allows the user to change most of his information except for the user id, which cannot be changed.
All fields already have the current information, so the user does not have to type everything all over again if he only
wishes to slightly edit the current information.
The password can also be changed, however, only by providing the current password to retain a more secure interface.

**Possible Improvements**:
* `user search`: A search feature can be implemented in the user list to directly search for a particular user, thus saving time.

### Security

* `Password hashing` before storing in database.
* Email Confirmation done through individually created `encrypted tokens` sent via email as a form of a link.
 The tokens have a certain expiry date after which they cannot be used.
* Filtering of information obtained from `$_GET` and `$_POST` methods to prevent `header injection`.

## Future Improvements
* Optimization (in components like the like management feature)
* Integration of advanced frameworks like `Laravel`
* Continuous Bug fixes and improvements

> If you liked my work, please show support by starring the repository! It means a lot to me, and is all im asking for.

## Developer

* Developed by yours truly <a src="http//:devic.info"> Devic developer<a>
