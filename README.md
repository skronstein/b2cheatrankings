# Introduction
This website works with a MySQL database to store and display records for the game Burnout 2: Point of Impact.
![homepage](https://user-images.githubusercontent.com/34139270/122653096-5b2b5c80-d0f7-11eb-8657-4a798e1868f2.png)
![trackpage](https://user-images.githubusercontent.com/34139270/122653097-5bc3f300-d0f7-11eb-9d6b-daf4ea3425df.png)
# How to host the website
1. Copy the repository to a folder on a server running PHP and MySQL.
2. Copy the config.php file to the folder one above where the rest of the repo was cloned to.
3. Open the config.php file and replace insert_password_here with a password of your choice.
4. Create a database in mysql named "b2cr".
5. Restore that database using the b2cr_skeleton.sql backup. This will create a barebones database, which has the tables necessary for the website to function, but does not contain any records yet.
6. Compute the bcrypt hash of the password you chose. You can do this on a site like bcrypt-generator.com; enter the password in the "string to dencrypt" field and click on Hash. A long string beginning with $ should appear at the top of the page.
7. Open the database in phpMyAdmin or in a MySQL command line and enter a password_hash for the user in the 'users' table. Use the bcrypt hash you computed in the previous step.
8. The site should now be ready to use.
