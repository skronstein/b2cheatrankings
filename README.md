# Introduction
This website works with a MySQL database to store and display records for the game Burnout 2: Point of Impact.
![homepage](https://user-images.githubusercontent.com/34139270/122653096-5b2b5c80-d0f7-11eb-8657-4a798e1868f2.png)
![trackpage](https://user-images.githubusercontent.com/34139270/122653097-5bc3f300-d0f7-11eb-9d6b-daf4ea3425df.png)
# How to host the website
1. Copy the repository to a folder on a server running PHP and MySQL.
2. Copy the config.php file to the folder one above where the rest of the repo was cloned to.
3. Open the config.php file and ensure that the username and password specified there match those of a MySQL user with SELECT, INSERT, UPDATE and DELETE permissions.
4. Create a database in mysql named "b2cr".
5. Restore that database using the b2cr_skeleton.sql backup. This will create a barebones database, which has the tables necessary for the website to function, but does not contain any records yet.
# Admin access for admin/login.php
6. Find the bcrypt hash of the password you wish to use to log in to the admin panel at admin/login.php. You can do this on a site like bcrypt-generator.com. If using that site, enter the password in the "string to encrypt" field and click on Hash. A long string beginning with $ should appear at the top of the page. Copy it, without any spaces before or after the string.
7. Open the database in phpMyAdmin or in a MySQL command line and enter a password_hash for the user that is in the 'users' table. Use the bcrypt hash you found in the previous step.
8. The site should now be ready to use.
	To create, read, update and delete records, go to admin/login.php, input the admin username and password you chose, press Login, and you will be able to use the admin section of the website.
	To browse the site as a normal user, open home.php.
