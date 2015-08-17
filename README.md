# CowreanLogs

System Requirements:

- Ubuntu 14.4 LTS Server
- Apache2
- PHP5, PHP5-GD, PHP5-MySQL, PHP5-CLI
- MySQL-Server
- Git

Installation:

1.  System update
  # apt-get update && sudo apt-get upgrade

  
2.  Install Packages
  # apt-get install mysql-server php5 apache php5-mysql php5-gd php5-cli git


4.  Edit Apache Configuration
    # nano /etc/php5/apache2/php.ini
    
    search for following string, it will be found at Line 806:
    --------------------------
    upload_max_filesize = 20M
    --------------------------

    
    Also you have to edit Line 674:
    ---------------------
    post_max_size = 20M
    ---------------------
    

5.  Restart Apache
    # /etc/init.d/apache2 restart


6.  Create DB-User
    Log into Database:
    $ mysql -u root -p
    
    Create databse:
    -------------------------------------------
    create database if not exists CowreanLogs;
    -------------------------------------------
    
    Create new DB-User:
    ---------------------------------------------------------------------------
    create user 'cowreanlogs'@'localhost' identified by 'geheim';
    grant usage on *.* to 'cowreanlogs'@'localhost' identified by 'geheim';
    ---------------------------------------------------------------------------

    Gain permissions
    ----------------------------------------------------------------------
    grant all privileges on CowreanLogs.* to 'cowreanlogs'@'localhost';
    flush privileges;
    ----------------------------------------------------------------------
      
    close DB
    -----
    quit
    -----


6.  Download CowreanLogs
  $ git clone https://github/cowrea/CowreanLogs/

  
7. modify CowreanLogs's-Config-File
  $ nano CowreanLogs/conf/conf.php


8. Datenbank mit Defaultwerten füllen
  $ mysql -u cowreanlogs -p CowreanLogs < /var/www/database.sql

  
9. Database-Datei löschen
  $ rm /var/www/database.sql


10.  Move CowreanLogs into Webserver's-Root-Dir
  # mv cowreanLogs/* /var/www/
  

11.  Modify permissions
  # chown -R www-data:www-date /var/www/

  

  


  
  
  
