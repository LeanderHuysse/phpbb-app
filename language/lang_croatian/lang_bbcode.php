<?php
/***************************************************************************
 *                         lang_bbcode.php [Croatian]
 *                            -------------------
 *     begin                : Monday Dec 01 2002
 *     copyright            : (C) 2002 Hrvoje Stankov
 *     email                : hrvoje@spirit.hr
 *
 *   $Id$
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

$faq[] = array("--","Uvod");
$faq[] = array("�to je BBCode?", "BBCode je posebna implementacija HTML-a. Da li mo�ete koristiti BBCode u va�im porukama na forumu odre�uje administrator. Mo�ete onemogu�iti BBCode na formularu za slanje poruka. BBCode sam po sebi je sli�an stilu u HTML, tagovi su umetnuti u viti�astim zagradama [ i ] ra�e nego &lt; i &gt; i nudi ve�u kontrolu kako je ne�to prikazano. U zavisnosti od podloge koju koristite vidjet �ete da je dodavanje BBCoda va�im porukama mnogo lak�e klikanjem mi�a na polja iznad poruke na formularu za unos poruka. �ak i sa tim mo�da �e vam ovaj vodi� biti od koristi.");

$faq[] = array("--","Formatiranje teksta");
$faq[] = array("Kako napisati podebljani, kosi i podvu�eni tekst", "BBCode sadr�i tagove koji vam omogu�avaju brzo mijenjanje osnovnog stila va�eg teksta. Ovo se posti�e na vi�e na�ina: <ul><li>Da bi ste napisali tekst podebljano umetnite ga u <b>[b][/b]</b>, npr. <br /><br /><b>[b]</b>Zdravo<b>[/b]</b><br /><br />�e postati <b>Zdravo</b></li><li>Za podvla�enje koristite <b>[u][/u]</b>, npr :<br /><br /><b>[u]</b>Dobro jutro<b>[/u]</b><br /><br />postaje <u>Dobro jutro</u></li><li>Da ukosite tekst koristite <b>[i][/i]</b>, npr.<br /><br />Ovo je <b>[i]</b>sjajno!<b>[/i]</b><br /><br />�e dati Ovo je <i>sjajno!</i></li></ul>");
$faq[] = array("Kako da promjenim boju teksta ili veli�inu", "Da bi ste izmjenili boju ili veli�inu teksta mo�ete koristiti sljede�e tagove. Zapamtite da �e krajnji rezultat zavisiti od browsera �ita�a i sistema: <ul><li>Mijenjanje boje teksta mogu�e je tako �to �ete ga umetnuti u <b>[color=][/color]</b>. Mo�ete odrediti prepoznatljiv naziv boje (npr. crvena, plava, �uta, itd.) ili u heksadecimalnom obliku, npr. #FFFFFF, #000000. Npr, za crveni tekst koristite:<br /><br /><b>[color=red]</b>Zdravo!<b>[/color]</b><br /><br />ili<br /><br /><b>[color=#FF0000]</b>Zdravo!<b>[/color]</b><br /><br />�e u oba slu�aja dati <span style=\"color:red\">Zdravo!</span></li><li>Mijenjanje veli�ine teksta je sli�no koriste�i <b>[size=][/size]</b>. Ovaj tag zavisi od podloge koju koristite ali preporu�eni format je numeri�ka vrijednost koja predstavlja veli�inu teksta u pikselima, po�ev�i od 1 (toliko malo da ga ne�ete ni vidjeti) pa sve do 29 (vrlo,vrlo veliko). Npr :<br /><br /><b>[size=9]</b>MALO<b>[/size]</b><br /><br />�e generalno biti <span style=\"font-size:9px\">MALO</span><br /><br />dok �e:<br /><br /><b>[size=24]</b>OGROMNO!<b>[/size]</b><br /><br />biti <span style=\"font-size:24px\">OGROMNO!</span></li></ul>");
$faq[] = array("Da li mogu kombinirati tagove za formatiranje?", "Da, naravno da mo�ete, na primjer da biste privukli pa�nju mo�ete pisati:<br /><br /><b>[size=18][color=red][b]</b>POGLEDAJ ME!<b>[/b][/color][/size]</b><br /><br />ovo �e dati <span style=\"color:red;font-size:18px\"><b>POGLEDAJ ME!</b></span><br /><br />Ne preporu�ujemo da pi�ete puno teksta koji izgleda ovako! Zapamtite da je na vama, tj, piscu da se pobrine da su tagovi pravilno zatvoreni. Na primjer ovo je neto�no:<br /><br /><b>[b][u]</b>Ovo je neta�no<b>[/b][/u]</b>");

$faq[] = array("--","Citiranje i dobijanje teksta fiksne �irine");
$faq[] = array("Citiranje teksta u odgovorima", "Postoje dva na�ina kojima mo�ete citirati tekst, sa ili bez reference.<ul><li>Kada koristite Quote funkciju za odgovor na poruku primjetit �ete da je tekst poruke dodan u prozoru poruke umetnut u <b>[quote=\"\"][/quote]</b> bloku. Ova metoda vam omogu�ava da citirate sa referencom na osobu ili bilo �ta drugo �to �elite stavite! Na primjer da biste citirali dio tekst Mr. Bloby upi�ite:<br /><br /><b>[quote=\"Mr. Blobby\"]</b>Tekst Mr. Blobby koji ste napisali �e oti�i ovdje<b>[/quote]</b><br /><br />Rezultiraju�a poruka �e automatski dodati, Mr. Blobby wrote: prije samog teksta. Zapamtite da <b>morate</b> ubaciti zagrade \"\" oko imena koga citirate, jer nisu opcijske.</li><li>Druga metoda vam omogu�ava da to�no citirate ne�to. Da biste ovo iskoristili umetnite tekst u <b>[quote][/quote]</b> tagove. Kada pogledate poruku jednostavno �e se prikazati, Quote: prije samog teksta.</li></ul>");
$faq[] = array("Dobijanje koda ili podatke fiksne �irine", "Ako �elite prikazati dio koda ili u stvari bilo �to �to zahtjeva fiksnu �irinu, npr. Courier font - treba umetnuti tekst u <b>[code][/code]</b> tagove, npr.<br /><br /><b>[code]</b>echo \"Ovo je neki kod\";<b>[/code]</b><br /><br />Sva formatiranja kori�tena izme�u <b>[code][/code]</b> tagova su zapam�ena kada ih kasnije pogledate.");

$faq[] = array("--","Generiranje lista");
$faq[] = array("Izrada nesre�ene liste", "BBCode podr�ava dva tipa lista, nesre�ene i sre�ene. One su bitne isto koliko i njihova HTML zamjena. Nesre�ena lista daje svaku stavku dosljedno jednu za drugom uvla�e�i svaku stavku. Da napravite nesre�enu lisu koristite <b>[list][/list]</b> i definirajte svaku stavku liste koriste�i <b>[*]</b>. Na primjer da izlistate va�e omiljene boje koristite:<br /><br /><b>[list]</b><br /><b>[*]</b>Crvena<br /><b>[*]</b>Plava<br /><b>[*]</b>�uta<br /><b>[/list]</b><br /><br />Ovim se dobija sljede�a lista:<ul><li>Crvena</li><li>Plava</li><li>�uta</li></ul>");
$faq[] = array("Izrada sre�ene liste", "Drugi tip liste, sre�ena lista daje vam kontrolu kakav �e biti rezultat prije svake stavke. Da biste napravili sre�enu listu koristite <b>[list=1][/list]</b> da napravite listu brojeva ili alternativno <b>[list=a][/list]</b> za abecednu listu. Kao i kod nesre�ene liste stavke se ozna�avaju sa <b>[*]</b>. Na prijmer:<br /><br /><b>[list=1]</b><br /><b>[*]</b>Oti�ite u du�an<br /><b>[*]</b>Kupite novo ra�unalo<br /><b>[*]</b>Zakunite se pred ra�unalom da kada se razbije<br /><b>[/list]</b><br /><br />�e dati sljede�e:<ol type=\"1\"><li>Oti�ite u du�an</li><li>Kupite novo ra�unalo</li><li>Zakunite se pred ra�unalom da kada se razbije</li></ol>Dok za abecednu listu koristite:<br /><br /><b>[list=a]</b><br /><b>[*]</b>Prvi mogu�i odgovor<br /><b>[*]</b>Drugi mogu�i odgovor<br /><b>[*]</b>Tre�i mogu�i odgovor<br /><b>[/list]</b><br /><br />daje<ol type=\"a\"><li>Prvi mogu�i odgovor</li><li>Drugi mogu�i odgovor</li><li>Tre�i mogu�i odgovor</li></ol>");

$faq[] = array("--", "Izrada linkova");
$faq[] = array("Link na drugi site", "phpBB BBCode ima vi�e na�ina da napravite URI-e, Uniform Resource Indicators poznatije kao URLs.<ul><li>Prvi od njih koristi <b>[url=][/url]</b> tag, �ta god ukucali poslje = znaka �e uzro�iti da se sadr�aj taga pona�a kao URL. Na primjer da linkate na phpBB.com koristite:<br /><br /><b>[url=http://www.phpbb.com/]</b>Posjetite phpBB!<b>[/url]</b><br /><br />Ovo �e generirati sljede�i link, <a href=\"http://www.phpbb.com/\" target=\"_blank\">Posjetite phpBB!</a> Primetit �ete da se link otvara u novom prozoru pa korisnik mo�e nastaviti rad na forumu ako �eli.</li><li>Ako �elite da se URL prika�e kao link mo�ete to jednostavno izvesti koriste�i:<br /><br /><b>[url]</b>http://www.phpbb.com/<b>[/url]</b><br /><br />Ovo �e generirati sljede�i link, <a href=\"http://www.phpbb.com/\" target=\"_blank\">http://www.phpbb.com/</a></li><li>Dodatne phpBB mogu�nosti zvane <i>Magi�ni linkovi</i>, �e pretvoriti svaki sintaksno to�an URL u link bez potrebe da definirate bilo kakav tag ili �ak i prefiks http://. Na primjer utipkavanjem www.phpbb.com u va�oj poruci automatski dobijate <a href=\"http://www.phpbb.com/\" target=\"_blank\">www.phpbb.com</a> kada pogledate poruku.</li><li>Isto se de�ava i sa email adresama, mo�ete ili odrediti adresu na primjer:<br /><br /><b>[email]</b>no.one@domain.adr<b>[/email]</b><br /><br />�to �e rezultirati <a href=\"emailto:no.one@domain.adr\">no.one@domain.adr</a> ili mo�ete jednostavno unjeti no.one@domain.adr u va�oj poruci i bit �e automatski pretvoreno kada pogledate poruku.</li></ul>Kao �to sa svim BBCode tagovima mo�ete umotati URLs oko bilo kojeg taga kao �to je <b>[img][/img]</b> (Vidi sljede�i odlomak), <b>[b][/b]</b>, itd. tako i sa tagovima za formatiranje morate paziti da se pravilno zatvore, na primjer:<br /><br /><b>[url=http://www.phpbb.com/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/url][/img]</b><br /><br /><u>nije</u> to�no �to mo�e dovesti da se va�a poruka izbri�e pa zato pazite.");

$faq[] = array("--", "Prikazivanje slika u porukama");
$faq[] = array("Dodavanje slike u poruku", "phpBB BBCode sadr�i tag za ubacivanje slika u va�e poruke. Dvije vrlo va�ne stvari koje trebate upamtiti prilikom kori�tenja ovog taga su; mnogi korisnici ne cijene puno slika u porukama i drugo slika koju prikazujete mora ve� biti dostupna na internetu (ne mo�e postojati na va�em ra�unalu na primjer, osim ako nemate web server!). Trenutno ne postoji na�in �uvanja slika lokalno sa phpBB (sva ova ograni�enja bi trebalo biti ugra�ena u sljede�u verziju phpBB). Da biste prikazali sliku morate omotati URL koji vodi do slike sa <b>[img][/img]</b> tagovima. Na primer:<br /><br /><b>[img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img]</b><br /><br />Kao �to ste primjetili u URL dijelu iznad mo�ete okru�iti sliku u <b>[url][/url]</b> tag ako �elite , npr.<br /><br /><b>[url=http://www.phpbb.com/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img][/url]</b><br /><br />�e dati:<br /><br /><a href=\"http://www.phpbb.com/\" target=\"_blank\"><img src=\"templates/subSilver/images/logo_phpBB_med.gif\" border=\"0\" alt=\"\" /></a><br />");

$faq[] = array("--", "Ostalo");
$faq[] = array("Mogu li da dodati vlastite tagove?", "Ne, bar ne direktno u verziji phpBB 2.0. Poku�at �emo ponuditi vlastite tagove u slede�oj verziji");

//
// This ends the BBCode guide entries
//

?>