# CowreanLogs
Installation:

1. Linuxinstallation - Sofern Ihr bereits ein Linuxsystem habt könnt Ihr diesen Abschnitt überspringen
  1.  Virtualbox downloaden
  2.  Ubuntu 14.4 LTS als iso-Datei herunterladen
  3.  Virtualbox installieren
  4.  Neue Virtuelle Maschine erstellen
  5.  "Ubuntu 14.4.iso" Datei als virtuelles Laufwerk einbinden
  6.  Virtuelle Maschine Starten
  7.  Installations-Tool durcharbeiten
  
2.  System aktualisieren
  [code]$ sudo apt-get update && sudo apt-get upgrade[/code]
  ggf. müsst ihr mit "y" oder "Enter" bestätigen
  
3.  Pakete installieren
  [code] $ sudo apt-get install mysql[/code]
  während der Installation werdet Ihr nach einem Root-Passwort gefragt. Hierbei handelt es sich um das administrative Passwort für eure Datenbank. Dieses solltet Ihr unter keinen Umständen vergessen!
  
  [code] $ sudo apt-get install php5 apache php5-mysql php5-gd[/code]

4.  Apachi-Konfiguration bearbeiten
    [code] $ sudo nano /etc/php5/apache2/php.ini[/code]
    
    Etwa in Zeile 806 editiert ihr Folgenden Eintrag:
    [code]upload_max_filesize = 20M[/code]
    Somit ermöglicht Ihr den Upload von Dateien bis zu einer Größe von 20 MB.
    
    Außerdem müsst Ihr noch den Wert in Zeile 674 anpassen:
    [code]post_max_size = 20M[/code]
    Dateien werden mittels Post hochgeladen, weshalb dieser Wert identisch mit der "upload_max_filesize" sein sollte.

5.  Apache neustarten
    [code] $ sudo /etc/init.d/apache2 restart[/code]
  
6.  Datenbankuser anlegen
    An der Datenbank einloggen:
    [code] $ mysql -u root -p[/code]
    Ihr werdet nach dem Passwort gefragt welches Ihr in Schritt 3 angegeben habt.
    
    neue Datenbank anlegen
    [code]create database if not exists CowreanLogs; [/code]
    
    neuen Datenbanknutzer erstellen:
    [code]
      create user 'cowreanlogs'@'localhost' identified by 'geheim';
      grant usage on *.* to 'cowreanlogs'@'localhost' identified by 'geheim'; [/code]

    Zugriffsrechte auf Datenbank gewähren
    [code]
      grant all privileges on CowreanLogs.* to 'cowreanlogs'@'localhost';
      flush privileges; [/code]
      
    Datenbank schließen
    [code]quit[/code]

6.  CowreanLogs herunterladen
  [code] $ wget http://cowrea.dlinkddns.com/public/cowreanLogs.tar.gz [/code]
  
7.  CowreanLogs entpacken
  [code] $tar xfz cowreanLogs.tar.gz[/code]
  
8.  CowreanLogs in Webserver verschieben
  [code] $ sudo mv cowreanLogs/* /var/www/[/code]
  
9.  Rechte anpassen
  [code] $ sudo chown -R www-data:www-date /var/www/[/code]
  
10. ggf. Variablen anpassen sofern sich Logindaten vom Standard unterscheiden
  [code] $ sudo nano /var/www/conf/conf.php[/code]
  
11. Datenbank mit Defaultwerten füllen
  [code] $ mysql -u cowreanlogs -p CowreanLogs < /var/www/database.sql[/code]
  
12. Database-Datei löschen
  [code] $ sudo rm /var/www/database.sql[/code]
  
  
  
Nun sollte "CowreanLogs" installiert sein und kann über die IP-Adresse aufgerufen und administriert werden. Solltet Ihr diese nicht kennen, so könnt Ihr sie über folgenden Befehl in Erfahrung brinden:
[code] ifconfig[/code]

In den Meisten fällen handelt es sich um die "eth0"-Schnittstelle.




Raid aufzeichnen:
Alte Log-Datei löschen sofern vorhanden. Sie befindet sich hier C:\\Pfad\zu\WoW\Log\WowCombatlog.txt

Ingame müsst ihr im Chatfenster folgenden Befehl am Anfang und ende des Raids eingeben:
[code]/combatlog[/code]

Sobald der Raid beendet ist müsst ihr euch kurz ausloggen damit alle noch im Buffer befindlichen Logeinträge in die Log-Datei niedergeschrieben werden.

Nun ruft Ihr im Browser euren CowreanLogs-Server auf und klickt auf Administration.
Die Default Login-Daten für das Webinterface lauten:
[code] 
  Accountname: cowreanlogs
  Passwort: geheim[/code]

Sobald das geschehen ist könnt ihr auf "Upload Log-File" klicken,dort das Formular ausfüllen und mit Submit bestätigen.
Nun könnt Ihr unter Administration auf den link "Write Log-File into Database" klicken und in der Dropdownlist euren Log auswählen. Seit Ihr nicht sicher um welchen es sich handelt könnt ihr Ihn kurz mit Show betrachten, andernfalls mit Execute einscannen.
Dieser Vorgang wird etwa 30 Minuten dauern. Der Begrenzte Faktor ist hierbei weniger die CPU als das Script selbst. Es ist aufgrund der diversen unterschiedlichen Logeinträge sehr aufwendig für den Rechner gestaltet.


Vergesst nie, dass das Tool NICHT zur Ausgrenzung einzelner Spieler genutzt werden soll und auch nicht alle Werte innerhalb des Raids aufzeichnet, da der Raid in vielen Situationen zu weit auseinander
