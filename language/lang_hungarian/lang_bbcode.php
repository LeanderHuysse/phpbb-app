<?php
/***************************************************************************
 *                         lang_bbcode.php [Hungarian]
 *                            -------------------
 *   begin                : Wednesday Oct 3, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: lang_bbcode.php,v 1.3 2001/12/18 01:53:26 psotfx Exp $
 *
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
// Translation by Gergely EGERVARY 
// mauzi@expertlan.hu
//


$faq[] = array("--","Bevezet�s");
$faq[] = array("Mi az a BBCode?", "A BBCode egy speci�lis HTML v�ltozat. Az adminisztr�tor hat�rozza meg, haszn�lhat-e a hozz�sz�l�saiban BBCode tag-eket. (a BBCode hozz�sz�l�sonk�nt b�rki �ltal letilthat�) Szintaktikailag hasonl� a HTML k�dhoz, a tag-ek sz�gletes z�r�jelben vannak: [ �s ] a &lt; �s &gt; helyett, �s nagyobb fel�gyeletet biztos�t a megjelen�t�s felett.");

$faq[] = array("--","Sz�veg form�z�sa");
$faq[] = array("Hogyan �rhatok f�lk�v�r, d�lt, al�h�zott sz�veget?", "A BBCode lehet�s�get biztos�t arra, hogy gyorsan �s egyszer�en megv�ltoztassa a sz�veg st�lus�t. Az al�bbi lehet�s�gek vannak: <ul><li>F�lk�v�r megjelen�t�s�hez �rja a sz�veget <b>[b][/b]</b> tag-ek k�z�, pl. <br /><br /><b>[b]</b>Hell�<b>[/b]</b><br /><br />eredm�nye <b>Hell�</b></li><li>Al�h�z�shoz �rja a sz�veget a<b>[u][/u]</b> tag-ek k�z�, pl. <br /><br /><b>[u]</b>J� reggelt!<b>[/u]</b><br /><br />eredm�nye <u>J� reggelt!</u></li><li>D�lt megjelen�t�shez �rja a sz�veget <b>[i][/i]</b> tag-ek k�z�, pl.<br /><br />Ez <b>[i]</b>nagyszer�!<b>[/i]</b><br /><br />eredm�nye: Ez <i>nagyszer�!</i></li></ul>");
$faq[] = array("Hogyan v�ltoztathatom meg a bet� m�ret�t �s sz�n�t?", "Az al�bbiakban bemutatjuk a bet�sz�n �s m�ret megv�ltoztat�s�hoz sz�ks�ges tag-eket. Tartsa szem el�tt, hogy a form�z�s eredm�nye f�gg a b�ng�sz� szoftvert�l �s oper�ci�s rendszert�l. <ul><li>Bet�sz�n megv�ltoztat�sa: <b>[color=][/color]</b>. Megadhatja a sz�nt sz�veges form�ban, (pl. red, blue, yellow, stb.) vagy hexadecim�lis k�ddal, pl. #FFFFFF, #000000. P�ld�ul, a piros bet�sz�n kiv�laszt�s�hoz az al�bbit haszn�lja:<br /><br /><b>[color=red]</b>Hell�!<b>[/color]</b><br /><br />vagy<br /><br /><b>[color=#FF0000]</b>Hell�!<b>[/color]</b><br /><br />mindkett� eredm�nye <span style=\"color:red\">Hell�!</span></li><li>A sz�veg m�rete hasonl�k�ppen m�dos�that� a <b>[size=][/size]</b> seg�ts�g�vel. Az aj�nlott sz�vegm�ret pixelben 1-t�l (eg�szen apr�, olvashatatlan) 29-ig (nagyon nagy). P�ld�ul:<br /><br /><b>[size=9]</b>KICSI<b>[/size]</b><br /><br />eredm�nye <span style=\"font-size:9px\">KICSI</span><br /><br />am�g <br /><br /><b>[size=24]</b>�RI�SI!<b>[/size]</b><br /><br />eredm�nye <span style=\"font-size:24px\">�RI�SI!</span></li></ul>");
$faq[] = array("Haszn�lhatok t�bbf�le form�z�st egyszerre?", "Term�szetesen! P�ld�ul figyelem felh�v�sra haszn�lhatja az al�bbit: <br /><br /><b>[size=18][color=red][b]</b>Ide figyelj!<b>[/b][/color][/size]</b><br /><br />az eredm�nye <span style=\"color:red;font-size:18px\"><b>Ide figyelj!</b></span><br /><br />Mindemellett nem javasoljuk, hogy hossz� sz�vegeket form�zzon meg ehhez hasonl�an! �gyeljen a tag-ek helyes lez�r�s�ra. P�ld�ul a k�vetkez� egy hib�s form�z�s: <br /><br /><b>[b][u]</b>Ez �gy helytelen<b>[/b][/u]</b>");

$faq[] = array("--","Id�zetek �s k�dok megjelen�t�se");
$faq[] = array("Id�zetek hozz�sz�l�sokban", "K�tf�lek�ppen id�zhet sz�veget: hivatkoz�ssal vagy an�lk�l. <ul><li>Ha hozz�sz�l�sn�l az Id�zet gombra kattint, �szre fogja venni, hogy az id�zet sz�vege automatikusan megjelenik a <b>[quote=\"\"][/quote]</b> tag-ek k�z�tt. Ezzel a m�dszerrel id�zhet egy el�z� hozz�sz�l�st. P�ld�ul Bozzi �r hozz�sz�l�s�t a k�vetkez�k�ppen id�zheti:<br /><br /><b>[quote=\"Bozzi �r\"]</b>Ezt �rta Bozzi �r<b>[/quote]</b><br /><br />Az eredm�ny el�tt automatikusan megjelenik a Bozzi �r �rta: sor. �gyeljen arra, hogy az id�zett szem�ly nev�t id�z�jelbe <b>kell</b> z�rnia.</li><li>A m�sodik m�dszerrel tetsz�leges sz�veget id�zhet. Haszn�lja a <b>[quote][/quote]</b> tag-eket. A hozz�sz�l�s megjelen�t�s�n�l megjelenik az Id�zet: sor a sz�veg el�tt.</li></ul>");
$faq[] = array("K�dok megjelen�t�se", "Ha programk�dot, vagy hasonl�, fix bet�sz�less�get (pl. Courier bet�t�pust) ig�nyl� sz�veget k�v�n megjelen�teni, haszn�lja a <b>[code][/code]</b> tag-eket, pl.<br /><br /><b>[code]</b>echo \"Ez itt egy programsor\";<b>[/code]</b><br /><br />Az �sszes form�z� tag �rv�ny�t veszti, ha a <b>[code][/code]</b> tag-eken bel�l haszn�lja.");

$faq[] = array("--","List�k k�sz�t�se");
$faq[] = array("Sz�mozatlan lista k�sz�t�se", "A BBCode k�tf�le lista k�sz�t�s�t teszi lehet�v�: sz�mozott �s sz�mozatlant. Egy sz�mozatlan lista nem m�s, mint egy felsorol�s, minden sor el�tt egy bekezd�sjellel. L�trehoz�s�hoz haszn�lja a <b>[list][/list]</b> tag-eket, �s a lista elemeinek megad�s�hoz a <b>[*]</b> tag-et. P�ld�ul a kedvenc sz�nei felsorol�s�hoz az al�bbit haszn�lhatja:<br /><br /><b>[list]</b><br /><b>[*]</b>Piros<br /><b>[*]</b>K�k<br /><b>[*]</b>S�rga<br /><b>[/list]</b><br /><br />Eredm�nye a k�vetkez� lista:<ul><li>Piros</li><li>K�k</li><li>S�rga</li></ul>");
$faq[] = array("Sz�mozott lista k�sz�t�se", "A m�sodik t�pus, a sz�mozott lista lehet�s�get biztos�t tetsz�leges sz�m vagy jel megad�s�ra a lista elemei el�tt. L�trehoz�s�hoz haszn�lja a <b>[list=1][/list]</b> tag-eket, vagy a <b>[list=a][/list]</b> tag-eket alfabetikus list�hoz. Ak�r csak a sz�mozatlan list�n�l, a lista elemeit a <b>[*]</b> tag seg�ts�g�vel adhatja meg. P�ld�ul:<br /><br /><b>[list=1]</b><br /><b>[*]</b>Elmenni a boltba<br /><b>[*]</b>Venni egy �j sz�m�t�g�pet<br /><b>[*]</b>Beler�gni, ha nem m�k�dik<br /><b>[/list]</b><br /><br />eredm�nye a k�vetkez�:<ol type=\"1\"><li>Elmenni a boltba</li><li>Venni egy �j sz�m�t�g�pet</li><li>Beler�gni, ha nem m�k�dik</li></ol>Alfabetikus list�hoz:<br /><br /><b>[list=a]</b><br /><b>[*]</b>Az els� v�laszt�si lehet�s�g<br /><b>[*]</b>A m�sodik v�laszt�si lehet�s�g<br /><b>[*]</b>A harmadik v�laszt�si lehet�s�g<br /><b>[/list]</b><br /><br />eredm�nye<ol type=\"a\"><li>Az els� v�laszt�si lehet�s�g</li><li>A m�sodik v�laszt�si lehet�s�g</li><li>A harmadik v�laszt�si lehet�s�g</li></ol>");

$faq[] = array("--", "Hivatkoz�sok k�sz�t�se");
$faq[] = array("Hivatkoz�s m�sik oldalra", "A BBCode t�bbf�le lehet�s�get biztos�t URI (Uniform Resource Indicator) ismertebb nev�n URL hivatkoz�sok l�trehoz�s�ra.<ul><li>Az egyik lehet�s�g az <b>[url=][/url]</b> tag haszn�lata, amit az = jel ut�n �r, az lesz a hivatkoz�s t�rgya. P�ld�ul a phpBB.com weboldalra �gy hivatkozhat:<br /><br /><b>[url=http://www.phpbb.com/]</b>Itt lakik a phpBB!<b>[/url]</b><br /><br />Eredm�nye a k�vetkez� hivatkoz�s: <a href=\"http://www.phpbb.com/\" target=\"_blank\">Itt lakik a phpBB!</a> A hivatkoz�sok �j b�ng�sz�ablakban ny�lnak meg, hogy az olvas� zavartalanul folytathassa a f�rum b�ng�sz�s�t. </li><li>Ha mag�t az URL c�met szeretn� megjelen�teni a hivatkoz�sban, egyszer�en megteheti:<br /><br /><b>[url]</b>http://www.phpbb.com/<b>[/url]</b><br /><br />Eredm�nye a k�vetkez� hivatkoz�s: <a href=\"http://www.phpbb.com/\" target=\"_blank\">http://www.phpbb.com/</a></li><li>Mindemellett a phpBB tartogat egy remek lehet�s�get: b�rmilyen, szintaktikailag helyes URL automatikusan hivatkoz�ss� alakul, an�lk�l, hogy b�rmilyen tag-et haszn�lna. P�ld�ul a hozz�sz�l�sba �rt www.phpbb.com sz�veg automatikusan �talakul hivatkoz�ss�, amikor megtekinti a hozz�sz�l�st: <a href=\"http://www.phpbb.com/\" target=\"_blank\">www.phpbb.com</a></li><li>Ugyanez �rv�nyes az email c�mekre is, megadhat egy email c�met, p�ld�ul:<br /><br /><b>[email]</b>valaki@valahol.hu<b>[/email]</b><br /><br />eredm�nye <a href=\"mailto:valaki@valahol.hu\">valaki@valahol.hu</a> vagy csak egyszer�en �rja be a hozz�sz�l�sba a valaki@valahol.hu c�met, �s automatikusan hivatkoz�ss� alakul olvas�sn�l.</li></ul>Tetsz�legesen egym�sba �gyazhat t�bbf�le BBCode tag-et, p�ld�ul <b>[img][/img]</b> (l�sd: k�vetkez� p�lda), <b>[b][/b]</b>, stb. Ak�r csak a form�z�sn�l, �gyeljen a tag-ek helyes lez�r�s�ra, p�ld�ul:<br /><br /><b>[url=http://www.phpbb.com/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/url][/img]</b><br /><br />egy <u>helytelen</u> hivatkoz�s, ami�rt a moder�torok ak�r el is t�vol�thatj�k a hozz�sz�l�s�t.");

$faq[] = array("--", "K�pek megjelen�t�se");
$faq[] = array("K�p megjelen�t�se a hozz�sz�l�sokban", "A BBCode lehet�s�get biztos�t k�pek besz�r�s�ra. K�t dolgot tartson szem el�tt, ha haszn�lja ezt a lehet�s�get: a legt�bb felhaszn�l�t zavarja a sok k�p, m�sr�szr�l a megjelen�tend� k�pnek m�r el�rhet�nek kell lennie az Interneten (nem elegend� az, ha a saj�t sz�m�t�g�p�n el�rhet�, kiv�tel ha webszervert futtat a saj�t g�p�n!). Jelenleg nincs lehet�s�g arra, hogy k�zvetlen�l k�peket t�lts�n fel a f�rumra. (Ezt a szoftver k�s�bbi verzi�iban tervezz�k megval�s�tani.) K�p besz�r�s�hoz adja meg a k�p URL c�m�t az <b>[img][/img]</b> tag-ek k�z�tt. P�ld�ul:<br /><br /><b>[img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img]</b><br /><br />Amint azt a hivatkoz�sok t�mak�rben eml�tett�k, lehet�s�g van a tag-ek egym�sba �gyaz�s�ra, p�ld�ul: <br /><br /><b>[url=http://www.phpbb.com/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img][/url]</b><br /><br />eredm�nye:<br /><br /><a href=\"http://www.phpbb.com/\" target=\"_blank\"><img src=\"http://www.phpbb.com/images/phplogo.gif\" border=\"0\" alt=\"\" /></a><br />");

$faq[] = array("--", "Egy�b");
$faq[] = array("K�sz�thetek saj�t BBCode tag-eket?", "Nem, sajnos erre nincs lehet�s�g a phpBB 2.0 verzi�j�ban. K�s�bbiekben tervezz�k egy�ni, testreszabhat� BBCode tag-ek bevezet�s�t.");

//
// This ends the BBCode guide entries
//

?>
