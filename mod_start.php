<p>Bei Cowrean Logs handelt es sich um ein Tool welches dem analysieren von Daten innerhalb von Vannilla WoW gelten soll.</p>

<p>Hierzu werden die Kampflogs in in einzelne Daten gegliedert und im Anschluss in eine Datenbank geschrieben. Da jedoch vor zu Zeiten von WoW 1.12.1 die Kampflogs ausschlie&szlig;lich aus Zeichenketten, ohne ID's bestanden ist die Umwandlung in eine Datenbankstruktur sehr rechenintensiv und somit zeitaufwendig. Alle Daten werden live aus der Datenbank gelesen, nichts ist statisch, die ganze Seite ist Modular aufgebaut!
</p>

<p>Anhand der URL kann eine Statistik gespeichert und verlinkt werden.</p>

<p>Aus Speicherplatzgr&uuml;nden behalte ich mir das Recht vor Datens&auml;tze jederzeit zu entfernen.</p>

<p>In erster Linie entstand das Projekt um detailierte Daten ausgeben zu k&ouml;nnen und somit die spielerischen F&auml;higkeiten eines jeden zu verbessern indem die Ausr&uuml;tung oder die Rotation abge&auml;ndert wird.</p>


<p>Wichtig ist jedoch, dass der Kampflog alles aufzeichnet, was innerhalb von etwa 50M  um den Ersteller herum geschieht. Bei einigen Encountern ist der Schlachtzug zu weit vom Ersteller enfernt weshalb nicht alles Aufgezeichnet werden kann!</p>

<p>Der Kampflog enth&auml;t noch einige weitere Daten welche ich bislang nicht ausreichend interpretieren konnte. Etwa 85% aller Datens&auml;tze werden von mir  verarbeitet und in einer Datenbank gespeichert. Ihr k&ouml;nnt diese frei einlesen.</p>


<p>Eine Logdatei l&auml;sst sich innerhalb von WoW &uuml;ber das Chatfenster erstellen. Hierzu muss man "/combatlog" im Chatfenster eingeben. Daraufhin werden jegliche Aktionen innerhalb von ".../World of Warcraft/Logs/WoWCombatlog.txt" gespeichert sofern Schreibrechte vorhanden sind. Eine erneute Eingabe von "combatlog" oder das Ausloggen bzw. Schließen des Clients beendet die Aufzeichnung. Wichtig ist jedch, dass nach dem zweiten eingeben von "/combatlog" noch weitere Datens&auml;tze im Buffer sind und erst nach einem Logout in die Log-Datei geschrieben werden.</p>

<p>Die Aufgezeichneten Werte sehen etwa so aus:</p>
<code>
5/4 23:28:18.424  Paladin1's Flash of Light heals Warrior1 for 640.<br /
5/4 23:28:18.425  Hakkar suffers 289 Shadow damage from Priest1's Mind Flay.<br />
5/4 23:28:18.425  Priest1's Vampiric Embrace critically heals Warrior1 for 85.<br />
5/4 23:28:18.426  Priest1's Vampiric Embrace heals Priest1 for 57.<br />
5/4 23:28:18.426  Priest1's Vampiric Embrace heals Warlock1 for 57.<br />
5/4 23:28:18.426  Priest1's Vampiric Embrace heals Warrior2 for 57.<br />
5/4 23:28:18.426  Priest1's Vampiric Embrace heals Paladin1 for 57.<br />
5/4 23:28:18.557  Druid1 crits Hakkar for 356.<br />
</code>


<p>Der SourceCode kann <a href="https://github.com/cowrea/CowreanLogs/" target="blank" >hier</a> betrachtet werden. Er ist in PHP geschrieben und sollte sich recht einfach auf einem fremden System ausführen lassen.</p>

<p>Folgendes empfehle ich euch zur reibungslosen Ausf&uuml;hrung des Codes:<br />

  <ul>
    <li>Betriebssystem: Ubuntu 14.4 LTS</li>
    <li>PHP5, PHP5-CLI, PHP5-QD, PHP5-MySQL</li>
    <li>MySQL-Datenbank-Server</li>
    <li>Webserver: Apache2</li>
  </ul>
