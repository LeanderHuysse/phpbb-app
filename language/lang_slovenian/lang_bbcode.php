<?php
/***************************************************************************
 *                         lang_bbcode.php [english]
 *                            -------------------
 *   begin                : Wednesday Oct 3, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
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

/* CONTRIBUTORS
	2002-12-15	Philip M. White (pwhite@mailhaven.com)
Prevedel: Ladislav Golouh, www.Razmerje.com, Ladislavg@razmerje.com
Dodal sem alineji: Kaj so ozna�be in kako lahko napi�em ozna�be.
		Fixed many minor grammatical problems.
*/
 
// 
// To add an entry to your BBCode guide simply add a line to this file in this format:
// $faq[] = array("question", "answer");
// If you want to separate a section enter $faq[] = array("--","Block heading goes here if wanted");
// Links will be created automatically
//
// DO NOT forget the ; at the end of the line.
// Do NOT put double quotes (") in your BBCode guide entries, if you absolutely must then escape them ie. \"something\";
//
// The BBCode guide items will appear on the BBCode guide page in the same order they are listed in this file
//
// If just translating this file please do not alter the actual HTML unless absolutely necessary, thanks :)
//
// In addition please do not translate the colours referenced in relation to BBCode any section, if you do
// users browsing in your language may be confused to find they're BBCode doesn't work :D You can change
// references which are 'in-line' within the text though.
//
  
$faq[] = array("--","Navodila");
$faq[] = array("Kaj so kode BBCode?", "BBCode kode so oblika HTML jezika. Ali lahko uporablja� jezik BBCode v svojih objavah na forumu, odlo�i administrator. Poleg tega lahko sam onemogo�i� BBCode kode v dolo�eni objavi v obrazcu za po�iljanje sporo�ila. BBCode kode so preprostej�a oblika HTML: ozna�be (ukazi) so obdani z oglatimi oklepaji [ in ], kar je bolje kot &lt; in &gt; ob tem ponuja bolj�i nadzor nad tem, kaj in kako nekdo �eli nekaj prikazati. Odvisno od predloge, ki jo uporabljate, lahko najdete dodatke za BBCode kode, ki vam �e olaj�ajo oblikovanje va�ega sporo�ila preko gumbov za klikanje z mi�ko nad poljem za vpis sporo�ila v obrazcu za po�iljanje. Pri�ujo�i vodnik vam bo v pomo� tudi pri tem.");

$faq[] = array("Kaj so ozna�be", "Ozna�ba ali tag je ukaz, ki spremeni del besedila v �eleno obliko. Vsaka ozna�ba ima za�etek in zaklju�ek, ki se od za�etne ozna�be praviloma razlikuje s tem, da ima na za�etku znotraj oklepaja �e po�evnico /. Znotraj oklepajev ni presledkov! Z ozna�bami (tags) torej programirate besedilo za prikaz.");
$faq[] = array("Kako lahko napi�em ozna�be", " Podrobnosti preberite spodaj. Tukaj na splo�no. Lahko preprosto odtipkate oglati oklepaj (�e prestavite na angle�ko tipkovnico, npr. s ctrl+shift, ali si ga kopirate) [, sledi ukaz, npr. b, oglati zaklepaj ]. In zaklju�ni ukaz, ki vsebuje za prvim oklepajem [ po�evnico / pred ukazom b]. Znotraj oklepajev ne sme biti nobenega presledka! Najla�ji na�in je, da ozna�ite tekst in potem kliknete ustrezno ozna�bo, ki omeji tekst z za�etno in s kon�no ozna�bo. Ko pi�ete, se na koncu teksta doda oznaka, ki jo dobite s tipko alt in prvo �rko oznake (alt+b za krepko, alt+q za citiram). Ko naslednji� pritisnete alt+ prvo �rko oznake, se izpi�e zaklju�ni ukaz. Ali ko pritisnite vrstico z besedilom <u>Zaklju�ne oznake odprtih ukazov</u>, da se zaklju�ijo odprti ukazi na koncu teksta. Namig: ozna�bo lahko ozna�ite in jo z mi�ko prestavite ali kopirate na �eleno mesto v besedilu. Odve�ne ozna�be izbri�ite.");

$faq[] = array("--","Oblikovanje besedila");
$faq[] = array("Kako oblikujemo krepko, po�evno in pod�rtano besedilo", "BBCode kode vsebujejo ozna�be (ukaze), ki omogo�ajo hitre spremembe osnovnega sloga v va�em besedilu. To lahko dose�ete na naslednje na�ine: <ul><li>Da bi del besedila ozna�ili krepko,ga zaprete med ozna�bi <b>[b][/b]</b>, npr. <br /><br /><b>[b]</b>Zivijo<b>[/b]</b><br /><br />postane <b>Zivijo</b></li><li>Za pod�rtano besedilo uporabite <b>[u][/u]</b>, na primer:<br /><br /><b>[u]</b>Dobro jutro<b>[/u]</b><br /><br />postane <u>Dobro jutro</u></li><li>Za po�tevno besedilo uporabite <b>[i][/i]</b>, npr.<br /><br />Tukaj je <b>[i]</b>�udovito!<b>[/i]</b><br /><br /> in dobite Tukaj je <i>�udovito!</i></li></ul>");
$faq[] = array("Kako spremenimo barvo in velikost besedila", "Za spremembo barve ali velikosti besedila uporabite naslednje ozna�be. Vedite, da je odvisno od gledal�evega brskalnika in sistema to, kako bo potem izgledalo: <ul><li>Spremembo barve besedila dose�emo tako, da besedilo ogradimo, damo med oznaki <b>[color=][/color]</b>. Lahko dolo�ite bodisi znano ime barve (npr. red za rde�e, blue za modro, yellow za rumeno, itd.) bodisi vstavote heksadecimalni troj�ek za barve, npr. #FFFFFF, #000000. Za primer, da bi dobili rde�e besedilo, lahko uporabite:<br /><br /><b>[color=red]</b>Zivijo!<b>[/color]</b><br /><br />ali<br /><br /><b>[color=#FF0000]</b>Zivijo!<b>[/color]</b><br /><br />, oboje bo dalo <span style=\"color:red\">Zivijo!</span></li><li>Sprememba velikosti besedila dose�emo na preprost na�in z uporabo oznak <b>[size=][/size]</b>. Te ozna�be so odvisne od predloge, ki jo uporabaljate, toda zahtevani format je �tevil�na oblika, ki predstavlja velikost pisave v pikslih, za�ne se pri 1 (je tako drobna, da je ne boste videli) do 29 (zelo velika). Za primer:<br /><br /><b>[size=9]</b>MAJHNO<b>[/size]</b><br /><br />bo obi�ajno <span style=\"font-size:9px\">MAJHNO</span><br /><br />medtem ko:<br /><br /><b>[size=24]</b>OGROMNO!<b>[/size]</b><br /><br />bo <span style=\"font-size:24px\">OGROMNO!</span></li></ul>");
$faq[] = array("Ali lahko kombiniram oblikovne ozna�be?", "Ja, seveda lahko; na primer, da bi pritegnili pozornost nekoga, lahko napi�ete:<br /><br /><b>[size=18][color=red][b]</b>POGLEJ ME!<b>[/b][/color][/size]</b><br /><br />to se prika�e kot <span style=\"color:red;font-size:18px\"><b>POGLEJ ME!</b></span><br /><br />Kljub temu ne priporo�amo, da prikazani deli izgledajo kot to! Vedite, da je odvisno od vas, ki objavljate, da so ozna�be pravilno zaklju�ene. Na primer, tole ni pravilno:<br /><br /><b>[b][u]</b>Tole manjka<b>[/b][/u]</b>");

$faq[] = array("--","Citiranje in prikazovanje nespremenjenega besedila");
$faq[] = array("Citiranje besedila v odgovorih", "Dva na�ina sta, da lahko citirate besedilo: z imenom ali brez.<ul><li>Kadar uporabite funkcijo Citiraj za odgovor na sporo�ilo na plo��i, upo�tevajte, da je besedilo objave, na katero odgovarjate, v besedilnem oknu �e ograjeno z <b>[quote=\"\"][/quote]</b> ozna�bama. Ta na�in vam omogo�i, da citirate z imenom osebe ali karkoli �elite vnesti kot ime. Na primer, da bi citirali del besedila Gd. Debeljak je napisal, lahko vnesete:<br /><br /><b>[quote=\"Gd. Debeljak\"]</b>Besedilo Gd. Debeljaka bo tukaj<b>[/quote]</b><br /><br />V prikazenem besedilu bo avtomati�no dodano: Gd. Debeljak je napisal/-a: pred citiranim besedilom. Pomnite, da <b>morate</b> dati med narekovaje \"\" ime, ki ga citirate -- to ni samo mo�nost.</li><li>Drugi na�in omogo�a slepo citiranje ne�esa. Ko npr. ponavljate citate istega avtorja. Da bi uporabili ta na�in, ogradite besedilo med <b>[quote][/quote]</b> ozna�bi. Prikazano besedilo bo preprosto dodalo: Citiram: pred samim ozna�enim besedilom.</li></ul>");
$faq[] = array("Prikazovanje kode ali nespremenjenih podatkov", "�e �elite prikazati del kot kodo, pravzaprav karkoli �elite ohraniti kot Courier-tip pisave, morate ograditi besedilo med <b>[code][/code]</b> ozna�bi, npr.<br /><br /><b>[code]</b>echo \"To je del kode\";<b>[/code]</b><br /><br />Vse oblikovanje znotraj <b>[code][/code]</b> ozna�b ostane nespremenjeno, ko ga pozneje prika�ete.");

$faq[] = array("--","Ustvarjanje seznamov");
$faq[] = array("Ustvarjanje neurejenega seznama", "BBCode kode podpirajo dva tipa seznamov, neurejenega in urejenega. Oba sta v osnovi enaka kot HTML razli�ica. Neurejen seznam prika�e vsako to�ko na va�em seznamu zaporedno enega za drugim znakom krogca. Da ustvarili neurejen seznam, uporabite <b>[list][/list]</b> in dolo�ite vsako to�ko znotraj seznama z uporabo <b>[*]</b>. Na primer, za seznam va�ih najljub�ih barv, lahko uporabite:<br /><br /><b>[list]</b><br /><b>[*]</b>Rde�a<br /><b>[*]</b>Modra<br /><b>[*]</b>Rumena<br /><b>[/list]</b><br /><br />Tako boste izoblikovali naslednji seznam:<ul><li>Rde�a</li><li>Modra</li><li>Rumena</li></ul>");
$faq[] = array("Ustvarjanje urejenega seznama", "Drugi tip seznama, urejen seznam, vam omogo�a nadzor nad prikazom pred vsako to�ko. Da bi ustvarili urejen seznam uporabite <b>[list=1][/list]</b> , da bi dobili o�tevil�en seznam ali druga mo�nost <b>[list=a][/list]</b> za alfabeti�ni (�rkovni) seznam. Kot pri neurjenem seznamo to�ke dolo�ite z uporabo <b>[*]</b>. Na primer:<br /><br /><b>[list=1]</b><br /><b>[*]</b>Pojdi v trgovine<br /><b>[*]</b>Kupi nov ra�unalnik<br /><b>[*]</b>Preklinjaj ra�unalnik, ko se raztre��i<br /><b>[/list]</b><br /><br /> bo prikazano kot:<ol type=\"1\"><li>Pojdi v trgovine</li><li>Kupi nov ra�unalnik</li><li>Preklinjaj ra�unalnik, ko se raztre��i</li></ol>Medtem ko pri alfabeti�nem (�rkovnem) seznamu uporabite:<br /><br /><b>[list=a]</b><br /><b>[*]</b>Prvi mo�ni odgovor<br /><b>[*]</b>Drugi mo�ni odgovor<br /><b>[*]</b>Tretji mo�ni odgovor<br /><b>[/list]</b><br /><br />daje<ol type=\"a\"><li>Prvi mo�ni odgovor</li><li>Drugi mo�ni odgovor</li><li>Tretji mo�ni odgovor</li></ol>");

$faq[] = array("--", "Ustvarjanje povezav");
$faq[] = array("Povezava na neko drugo stran", "phpBB BBCode kode podpirajo �tevilne na�ine ustvarjanja URI-jev, Uniform Resource Indicators bolje znanih kot URL-ji.<ul><li>Prva mo�na uporaba je <b>[url=][/url]</b> ozna�ba; karkoli natipkate za znakom = bo prikazano kot vsebina te ozna�be kot URL. Na primer, povezavo do phpBB.com lahko uporabite za:<br /><br /><b>[url=http://www.phpbb.com/]</b>Obi��i phpBB!<b>[/url]</b><br /><br />To bo ustvarilo naslednjo povezavo, <a href=\"http://www.phpbb.com/\" target=\"_blank\">Obi��i phpBB!</a> Opazili boste, da povezava odpre novo okno, tako da uporabniki lahko nadaljujejo brskanje po forumu, �e �elijo.</li><li>�e �elite prikazati samoo URL kot povezavo, lahko preprosto uporabite:<br /><br /><b>[url]</b>http://www.phpbb.com/<b>[/url]</b><br /><br />To bo ustvarilo naslednjo povezavo: <a href=\"http://www.phpbb.com/\" target=\"_blank\">http://www.phpbb.com/</a></li><li>Poleg tega phpBB nekaj oblik naziva <i>Magi�ne Povezave</i>, ki bodo katerokoli sintakti�no pravilno URL v povezavo, ki ji ni treba dodati nobene posebne ozna�be ali celo za�etni http://. Na primer, ko natipkate www.phpbb.com v va�e sporo�ilo, se avtomati�no oblikuje v <a href=\"http://www.phpbb.com/\" target=\"_blank\">www.phpbb.com</a> ko prika�ete sporo�ilo.</li><li>Enako se zgodi pri E-po�tnjih naslovih; lahko dolo�ite naslov posebej, kot:<br /><br /><b>[email]</b>no.one@domain.adr<b>[/email]</b><br /><br />, ki prika�e <a href=\"emailto:no.one@domain.adr\">no.one@domain.adr</a> ali samo odtipkate no.one@domain.adr v va�e sporo�ilo in avtomati�no se bo preoblikovalo med prikazom.</li></ul>Tako kot vse BBCode ozna�be lahko ogradite URL-je s katerokoli drugo ozna�bo, kot npr. <b>[img][/img]</b> (Poglej nadaljnji vnos), <b>[b][/b]</b>, ipd. Kot pri oblikovnih ozna�bah, morate tudi tukaj sami zagotoviti pravilno zaklju�evanje odprtih ozna�b. Na primer:<br /><br /><b>[url=http://www.phpbb.com/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/url][/img]</b><br /><br /> <u>ni</u> pravilno, in lahko vodi do tega, da se va�e sporo�io izbri�e, torej bodite pazljivi.");

$faq[] = array("--", "Prikazovanje slik v sporo�ilih");
$faq[] = array("Dodajanje slik v objavo", "phpBB BBCode kode imajo vgrajeno ozna�bo za vklju�evanje slik v  va�e objave, sporo�ila. Dve zelo pomembni stvari si zapomnite,kadar uporabljate to ozna�bo: ve�ina uporanikov ne upo�teva omejitve koli�ine slik, ki naj bodo prikazane v prispevkih, in drugi�, prikazana slika, ki jo prikazujete na strani, mora biti �e nekje na internetu (ne more se nahajati samo v va�em ra�unalniku, na primer, razen �e je hkrati to spletni stre�nik!). Trenutno ni mo�no shranjevati slik lokalno s phpBB (vsa dosedanja pri�akovanja prelagajo to mo�nost na naslednjo izdano razli�ico phpBB). Za prikaz slike,morate obdati URL tako, da prika�e sliko, z <b>[img][/img]</b> ozna�bama. Na primer:<br /><br /><b>[img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img]</b><br /><br />Kot smo opozorili pri URL razdelku zgoraj, lahko ogradite sliko z <b>[url][/url]</b> ozna�bo, �e �elite, npr.<br /><br /><b>[url=http://www.phpbb.com/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img][/url]</b><br /><br />bo izoblikovalo:<br /><br /><a href=\"http://www.phpbb.com/\" target=\"_blank\"><img src=\"templates/subSilver/images/logo_phpBB_med.gif\" border=\"0\" alt=\"\" /></a><br />");

$faq[] = array("--", "Druge zadeve");
$faq[] = array("Ali lahko dodam svoje lastne ozna�be?", "Ne, bojimo se, da ne direktno v phpBB 2.0. I��emo na�in, ki bi omogo�al prilagodljive BBCode ozna�be pri naslednji ve�ji razli�ici izdaje programa phpBB.");

//
// This ends the BBCode guide entries
//

?>