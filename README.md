# Zappy Blog Management System
 This application is a BLOG MANAGEMENT SYSTEM which allows users to post and manage various kinds of blog content.
            Or you can say a simple blog CMS. It is built on a light-weight php backend with a beautiful bootstrap frontend
##Features

## Installation
 1.Download the zip file from this repository or fork this repository.

 2.Extract the contents of the zip file to the root file of your server: Linux opt/lampp/htdocs.

## Usage
#### 1.Create a database called "latest",or configure the connection.php file in the includes folder as follows:
```php
$conn = mysqli_connect("hostname","username","","database_name" ) or die ("error" . mysqli_error($conn));
```
#### 2.Import database file "zappy.sql" from the database file.
#### 3.Run the local server.

```bash
sudo /opt/lampp/lampp start
```
#### 2.Open a browser and run: localhost/Zappy.

##Features
  ####1.Multiple user access: allows multiple type of users to login <br>
  ####2.Functional Admin panel:  allows all admins to manage their content properly with admin panel  <br>
  ####3.CRUD functionalities:  allows all users to create,read,update and delete their content in a managed format <br>
  ####4.Profile update option: allows users to update their profile/account details <br>

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)

#HAPPY CODING

=======
