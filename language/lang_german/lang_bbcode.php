<?php
/***************************************************************************
*
* Translation by:
* Joel Ricardo Zick Rici) webmaster@forcena-inn.de || http://www.forcena-inn.de
* Hannes Minimair (Thunder) phpbb2@xinfo.net || http://www.breakzone.cc
*
* For questions use: :webmaster@forcena-inn.de
*
***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/
 
// 
// To add an entry to your BBCode guide simply add a line to this file in this format:
// $faq[] = array("question", "answer");
// If you want to separate a section enter $faq[] = array("--","Block heading goes here if wanted");
// Links will be created automatically
//
// DO NOT forget the ; at the end of the line.
// Do NOT put double quotes (") in your BBCode guide entries, if you absolutely must then escape them ie. \"something\"
//
// The BBCode guide items will appear on the BBCode guide page in the same order they are listed in this file
//
// If just translating this file please do not alter the actual HTML unless absolutely necessary, thanks :)
//
// In addition please do not translate the colours referenced in relation to BBCode any section, if you do
// users browsing in your language may be confused to find they're BBCode doesn't work :D You can change
// references which are 'in-line' within the text though.
//
  
$faq[] = array("--","Einf�hrung");
$faq[] = array("Was ist BBCode?", "BBCode ist eine spezielle Eigenart von HTML. Ob Du BBCode in Deinen Beitr�gen benutzen kannst, entscheidet allein der Systemadministrator. Zus�tzlich kannst Du den BBCode auch f�r einzelne Beitr�ge abschalten. BBCode ist dem HTML-Stil sehr �hnlich, Tags werden mit den Klammern [ und ] ge�ffnet und geschlossen und gibt Dir die M�glichkeit, das Aussehen dessen was Du geschrieben hast deutlich zu ver�ndern. Je nachdem, welchen Style Du benutzt, findest Du vielleicht eine Men�liste mit Instand-BBCode bei der Beitragserstellung. Aber auch dann wirst Du die folgende Liste interessant finden.");

$faq[] = array("--","Textformatierung");
$faq[] = array("Wie erstelle ich fetten, unterstrichenen oder kursiven Text?", "BBCode verwendet Tags, die Dir erlauben, das Aussehen Deines Textes recht einfach zu ver�ndern. Dies geschieht folgenderma�en: <ul><li>Um einen Text fett darzustellen,  umgib ihm mit <b>[b][/b]</b>, z.B. <br /><br /><b>[b]</b>Hallo<b>[/b]</b><br /><br /> wird zu <b>Hallo</b></li><li>Zum Unterstreichen benutzt Du <b>[u][/u]</b>, zum Beispiel:<br /><br /><b>[u]</b>Guten Morgen<b>[/u]</b><br /><br />wird zu <u>Guten Morgen</u></li><li>Um kursiv zu schreiben benutzt Du <b>[i][/i]</b>, z.B.<br /><br />Das ist <b>[i]</b>Toll!<b>[/i]</b><br /><br />w�rde so aussehen Das ist <i>Toll!</i></li></ul>");
$faq[] = array("Wie ver�ndere ich die Schriftfarbe oder Gr��e?", "Um die Farbe oder Gr��e Deines Textes zu �ndern, kannst Du die folgenden Tags benutzen. Bedenke jedoch, dass das Resultat auf den Browser des jeweiligen Benutzers ankommt: <ul><li>Um einen Text in einer bestimmten Farbe darzustellen, umgebe ihn mit <b>[color=][/color]</b>. Du kannst entweder einen allgemeinen Farbnamen angeben (z.B. red, blue, yellow, usw.) oder den Heximalcode, z.B. #FFFFFF, #000000. Um beispielsweise einen roten Text zu schreiben, k�nntest Du folgendes schreiben:<br /><br /><b>[color=red]</b>Hallo!<b>[/color]</b><br /><br />oder<br /><br /><b>[color=#FF0000]</b>Hallo!<b>[/color]</b><br /><br />, beides ergibt <span style=\"color:red\">Hallo!</span></li><li>Das �ndern der Textgr��e geschieht �hnlich, benutz dazu den Tag <b>[size=][/size]</b>. Dieser Tag h�ngt vom Style, das Du benutzt ab, aber f�r gew�hnlich wird die Textgr��e als Zahlenwert eingegeben, der die H�he in Pixel angibt, beginnend mit 1 (so klein, Du wirst es kaum sehen) bis zu 29 (riesengro�). Zum Beispiel:<br /><br /><b>[size=9]</b>KLEIN<b>[/size]</b><br /><br />wird grunds�tzlich <span style=\"font-size:9px\">KLEIN</span><br /><br />wohingegen:<br /><br /><b>[size=24]</b>RIESIG!<b>[/size]</b><br /><br />zu <span style=\"font-size:24px\">RIEISG!</span> wird</li></ul>");
$faq[] = array("Kann ich verschiedene Tags kombinieren?", "Nat�rlich geht das, ein Text, der gesehen werden soll, k�nnte beispielsweise so aussehen: <br /><br /><b>[size=18][color=red][b]</b>SCHAU MICH AN<b>[/b][/color][/size]</b><br /><br />ergibt <span style=\"color:red;font-size:18px\"><b>SCHAU MICH AN!</b></span><br /><br />Es ist nicht zu empfehlen, gr��ere Mengen Text so aussehen zu lassen! Denk daran, es ist Deine Aufgabe, daf�r zu sorgen, dass alle Tags auch wieder geschlossen werden. Das hier zum Beispiel geht nicht: <br /><br /><b>[b][u]</b>Das ist falsch<b>[/b][/u]</b>");

$faq[] = array("--","Zitate und Code-Angaben");
$faq[] = array("Zitate in Antworten verwenden", "Es gibt zwei M�glichkeiten, einen Text zu zitieren.<ul><li>Wenn Du die Zitatfunktion zum Antworten auf einen Beitrag verwendest, wirst Du merken, dass der zitierte Text in <b>[quote=\"\"][/quote]</b>-Tags steht. So ist es Dir m�glich, den Text des Benutzers, oder wo auch immer Du ihn her hast, wortgetreu nachzugeben! Ein Beispiel: Um einen Teil des Textes zu zitieren, den Herr Schr�der geschrieben hat, w�rdest Du schreiben:<br /><br /><b>[quote=\"Herr Schr�der\"]</b>Der Text von Herrn Schr�der w�rde hier erscheinen<b>[/quote]</b><br /><br />Der Text, Herr Schr�der schrieb: erscheint automatisch vor dem Zitat. Bedenke, dass Du die Zeichen \"\" um den Autorennamen schreiben <b>musst</b>, sie sind nicht nur zur Versch�nerung.</li><li>Mit der zweiten M�glichkeit erstellst ein blindes Zitat. Um dies durchzuf�hren, schlie�e den Text in <b>[quote][/quote]</b>-Tags ein. Wenn Du Dir den Beitrag dann anguckst, wird einfach nur ein Zitat: vor dem Beitrag angezeigt.</li></ul>");
$faq[] = array("Code-Angaben", "Wenn Du den Teil eines Codes oder etwas, was einfach eine gewisse L�nge hat, ausgeben m�chtest, solltest Du den Text in <b>[code][/code]</b>-Tags setzen, z.B <br /><br /><b>[code]</b>echo \"Dies ist ein Code\";<b>[/code]</b><br /><br />Alle Formatierungen, die in diesen <b>[code][/code]</b>-Tags verwendest, werden nachher nicht ausgef�hrt.");

$faq[] = array("--","Listenerstellung");
$faq[] = array("Eine ungeordnete Liste einf�gen", "BBCode unterst�tzt zwei Typen von Listen, geordnete und ungeordnete. Sie sind im wesentlichen die gleichen Listen wie ihre Genossen in der HTML-Umgebung. Eine ungeordnete Liste zeigt jedes Objekt in der Liste an, alle mit einem Bullet-Symbol davor. Um eine ungeordnete Liste zu erstellen, benutze die <b>[list][/list]</b>-Tags und gib jedes Objekt innerhalb der Liste an, indem Du einen <b>[*]</b> nutzt. Um zum Beispiel Deine Lieblinsfarben aufzuz�hlen, k�nntest Du schreiben:<br /><br /><b>[list]</b><br /><b>[*]</b>Rot<br /><b>[*]</b>Blau<br /><b>[*]</b>Gelb<br /><b>[/list]</b><br /><br />Das w�rde folgende Liste ergeben: <ul><li>Rot</li><li>Blau</li><li>Gelb</li></ul>");
$faq[] = array("Eine geordnete Liste einf�gen", "Die zweite Listenart, die geordnete Liste, gibt Dir die M�glichkeit, anzugeben, was f�r jedem Objekt steht. Um eine geordnete Liste zu erstellen, benutzt Du den <b>[list=1][/list]</b>-Tag, um eine nummierte Liste zu erstellen, oder alternativ <b>[list=a][/list]</b> f�r eine alphabetische Liste. Genau wie der bei ungeordneten Liste werden die Objekte mit dem <b>[*]</b> spezifiziert. Zum Beispiel:<br /><br /><b>[list=1]</b><br /><b>[*]</b>In den Laden gehen<br /><b>[*]</b>Einen neuen Computer kaufen<br /><b>[*]</b>Den Computer verfluchen, wenn er nicht mehr geht<br /><b>[/list]</b><br /><br />ergibt das folgende:<ol type=\"1\"><li>In den Laden gehen</li><li>Einen neuen Computer kaufen</li><li>Den Computer verfluchen, wenn er nicht mehr geht</li></ol>F�r eine alphabetische Liste widerum w�rdest Du das folgende eingeben:<br /><br /><b>[list=a]</b><br /><b>[*]</b>Die erste M�glichkeit<br /><b>[*]</b>Die zweite M�glickeit<br /><b>[*]</b>Die dritte M�glichkeit<br /><b>[/list]</b><br /><br />was<ol type=\"a\"><li>Die erste M�glichkei</li><li>Die zweite M�glichkei</li><li>Die dritte M�glichkei</li>ergibt</ol>");

$faq[] = array("--", "Links erstellen");
$faq[] = array("Das Linken zu einer Site", "phpBB BBCode unterst�tzt eine Menge verschiedener M�glichkeiten, wie man URLs einf�gen kann.<ul><li>Die erste M�glichkeit ist die Verwendung des<b>[url=][/url]</b>-Tag, was auch immer Du hinter das = Zeichen schreibst, wird als Inhalt der URL gewertet. Ein Beispiel, einen Link zu phpBB.de ertellst Du so:<br /><br /><b>[url=http://www.phpbb.de/]</b>Besucht phpBB!<b>[/url]</b><br /><br />Das w�rde den folgenden Link erstellen: <a href=\"http://www.phpbb.com/\" target=\"_blank\">Besucht phpBB!</a> Du wirst bemerken, dass sich der Link in einem neuen Fenster �ffnet, so dass der Benutzer weiter im Forum surfen kann, sofern er dies w�nscht.</li><li>Falls Du m�chtest, dass die URL automatisch als Link angezeigt wird, kannst Du folgenderma�en schreiben:<br /><br /><b>[url]</b>http://www.phpbb.de/<b>[/url]</b><br /><br />Dies wird den folgenden Link erzeugen: <a href=\"http://www.phpbb.com/\" target=\"_blank\">http://www.phpbb.de/</a></li><li>Zus�tzlich verf�gt phpBB �ber die sogenannten <i>Magic Links</i>, was automatisch korrekt angegebene URLs in Links umwandelt, ohne dass Du Tags schreiben musst. Wenn Du zum Beispiel www.phpbb.de in einen Beitrag schreibst, wird daraus automatisch <a href=\"http://www.phpbb.de/\" target=\"_blank\">www.phpbb.de</a> wenn jemand die Nachricht liest.</li><li>Dies funktioniert �brigens auch mit E Mail-Adressen, Du kannst entweder eine Adresse gesondert eingeben, z.B.:<br /><br /><b>[email]</b>webmaster@forcena-inn.de<b>[/email]</b><br /><br />was das Folgende ergibt <a href=\"emailto:webmaster@forcena-inn.de\">webmaster@forcena-inn.de</a> oder Du schreibst einfach webmaster@forcena-inn.de in Deinen Beitrag und es wird automatisch in einen Link umgewandelt.</li></ul>Wie die meisten anderen BBCode-Tags, kannst Du auch den URL-Tag mit anderen Tags kombinieren, z.B. <b>[img][/img]</b> (siehe n�chsten Punkt), <b>[b][/b]</b>, usw. Es ist wie immer Deine Aufgabe, dass alle ge�ffneten Tags auch wieder geschlossen werden, z.B.<br /><br /><b>[url=http://www.phpbb.de/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/url][/img]</b><br /><br />ist <u>nicht</u> richtig und wird einen Fehler in Deinem Post ausl�sen.");

$faq[] = array("--", "Bilder in Beitr�gen anzeigen");
$faq[] = array("Ein Bild einf�gen", "Der phpBB BBCode unterst�zt ebenfalls das Einf�gen von Bildern in Beitr�gen. Es gibt zwei wichtige Regeln, was das Anzeigen von Bildern betrifft; die meisten User finden es einfach furchtbar, wenn endlos Bilder in den Beitr�gen stehen, Stichwort Ladezeiten, und zum anderen muss das Bild bereits irgendwo im Internet hochgeladen sein (es bringt also nichts, wenn die Datei nur auf Deiner Festplatte liegt, sofern Du keinen Webserver hast!). Momentan gibt es noch keine M�glichkeit, Bilder mit Hilfe des phpBB lokal zu speichern (das k�nnte sich mit der n�chsten Version von phpBB2 nat�rlich noch �ndern). Um ein Bild anzuzeigen, musst die URL des Bildes mit den <b>[img][/img]</b>-Tags umgeben. Zum Beispiel:<br /><br /><b>[img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img]</b><br /><br />Wie bei der URL-Erkl�rung bereits erw�hnt, kannst Du Bilder in <b>[url][/url]</b>-Tags einschlie�en, wenn Du m�chtest, z.B. <br /><br /><b>[url=http://www.phpbb.de/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img][/url]</b><br /><br />w�rde folgendes ergeben:<br /><br /><a href=\"http://www.phpbb.de/\" target=\"_blank\"><img src=\"http://www.phpbb.com/images/phplogo.gif\" border=\"0\" alt=\"\" /></a><br />");

$faq[] = array("--", "Andere Codes");
$faq[] = array("Kann ich meine eigenen Tags benutzen?", "Nein, nicht mit phpBB2.0 direkt! Wir versuchen, eine M�glichkeit zu finden, dies zu unterst�zten und vielleicht gibt es die Funktion dann in einer der n�chsten Versionen");

//
// This ends the BBCode guide entries
//

?>