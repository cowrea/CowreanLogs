<p>Bei Cowrean Logs handelt es sich um ein Tool welches dem analysieren von Daten innerhalb von Vannilla WoW gelten soll.</p>

<p>Hierzu werden die Kampflogs in in einzelne Daten gegliedert und im Anschluss in eine Datenbank geschrieben. Da jedoch vor zu Zeiten von WoW 1.12.1 die Kampflogs ausschlie&szlig;lich aus Zeichenketten, ohne ID's bestanden ist die Umwandlung in eine Datenbankstruktur sehr rechenintensiv und somit zeitaufwendig. Alle Daten werden live aus der Datenbank gelesen, nichts ist statisch, die ganze Seite ist Modular aufgebaut!
</p>

<p>Anhand der URL kann eine Statistik gespeichert und verlinkt werden.</p>

<p>Aus Speicherplatzgr&uuml;nden behalte ich mir das Recht vor Datens&auml;tze jederzeit zu entfernen.</p>

<p>In erster Linie entstand das Projekt um detailierte Daten ausgeben zu können und somit die spielerischen F&auml;higkeiten eines jeden zu verbessern indem die Ausr&uuml;tung oder die Rotation abge&auml;ndert wird.</p>


<p>Wichtig ist jedoch, dass der Kampflog alles aufzeichnet, was innerhalb von etwa 50M  um den Ersteller herum geschieht. Bei einigen Encountern ist der Schlachtzug zu weit vom Ersteller enfernt weshalb nicht alles Aufgezeichnet werden kann!</p>

<p>Der Kampflog enth&auml;t noch einige weitere Daten welche ich bislang nicht ausreichend interpretieren konnte. Etwa 80% aller Datens&auml;tze werden von mir  verarbeitet und in einer Datenbank gespeichert. Ihr k&ouml;nnt diese frei einlesen.</p>


<p>Eine Logdatei lässt sich innerhalb von WoW über das Chatfenster erstellen. Hierzu muss man "combatlog" im Chatfenster eingeben. Daraufhin werden jegliche Aktionen innerhalb von ".../World of Warcraft/Logs/WoWCombatlog.txt" gespeichert sofern Schreibrechte vorhanden sind. Eine erneute Eingabe von "combatlog" oder das Ausloggen bzw. Schließen des Clients beendet die Aufzeichnung.</p>

<p>Die Aufgezeichneten Werte sehen etwa so aus:</p>
<code>
5/4 23:28:18.424  Minashira's Flash of Light heals Taxus for 640.<br /
5/4 23:28:18.425  Hakkar suffers 289 Shadow damage from Kasperll's Mind Flay.<br />
5/4 23:28:18.425  Kasperll's Vampiric Embrace critically heals Taxus for 85.<br />
5/4 23:28:18.426  Kasperll's Vampiric Embrace heals Kasperll for 57.<br />
5/4 23:28:18.426  Kasperll's Vampiric Embrace heals Imhothep for 57.<br />
5/4 23:28:18.426  Kasperll's Vampiric Embrace heals Braids for 57.<br />
5/4 23:28:18.426  Kasperll's Vampiric Embrace heals Minashira for 57.<br />
5/4 23:28:18.557  Inovatu crits Hakkar for 356.<br />
</code>


<p>Auf Winsch lasse ich euch den SourceCode zukommen. Er ist in PHP geschrieben und sollte sich recht einfach auf einem fremden System ausführen lassen.</p>

<p>Folgendes empfehle ich euch zur reibungslosen Ausf&uuml;hrung des Codes:<br />

  <ul>
    <li>Betriebssystem: Ubuntu 14.4 LTS</li>
    <li>PHP5</li>
    <li>MySQL-Datenbank-Server</li>
    <li>Webserver: Apache2</li>
  </ul>
