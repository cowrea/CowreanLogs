# CowreanLogs

System Requirements:

- Ubuntu 14.4 LTS Server
- Apache2
- PHP5, PHP5-GD, PHP5-MySQL, PHP5-CLI
- MySQL-Server
- Git
- JpGraph
- Lynx

Installation:

1.  System update
    $ sudo apt-get update && sudo apt-get upgrade

  
2.  Install Packages
    $ sudo apt-get install mysql-server php5 apache2 php5-mysql php5-gd php5-cli git lynx


4.  Edit Apache Configuration
    $ sudo nano /etc/php5/apache2/php.ini
    
      search for following string, it will be found at Line 806:
      --------------------------
      upload_max_filesize = 20M
      --------------------------

    
      Also you have to edit Line 674:
      ---------------------
      post_max_size = 20M
      ---------------------
    

5.  Restart Apache
    $ sudo /etc/init.d/apache2 restart


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
    $ git clone https://github.com/cowrea/CowreanLogs/

  
7. modify CowreanLogs's-Config-File
    $ nano CowreanLogs/conf/conf.php


8. Datenbank mit Defaultwerten füllen
    $ mysql -u cowreanlogs -p CowreanLogs < CowreanLogs/database.sql

  
9. Database-Datei löschen
    $ rm CowreanLogs/database.sql


10. Download JpGraph
    $ lynx http://jpgraph.net/download/download.php?p=5
    if this link doesn't work visit http://jpgraph.net and download JpGraph yourself!


11. Extract JpGraph
    $ tar xfz jpgraph-3.5.0b1.tar.gz


12. Move JpGraph
    $ sudo mkdir /usr/share/jpgraph
    $ sudo mv jpgraph-3.5.0b1 /usr/share/jpgraph/


13. Delete JpGraph archiv
  $ rm jpgraph-3.5.0b1.tar.gz


14.  Move CowreanLogs into Webserver's-Root-Dir
  $ sudo mv cowreanLogs/* /var/www/
  

15.  Modify permissions
  $ sudo chown -R www-data:www-data /var/www/html/


16.  Delete default index-file
  $ sudo rm /var/www/index.html
