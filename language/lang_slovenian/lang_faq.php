<?php
/***************************************************************************
 *                          lang_faq.php [slovenian]
 *                            -------------------
 *   begin                : Wednesday Oct 3, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id$
 *    Popravek in dodatni prevod prvega slovenskega prevoda: Toma� Ko�tial (m5@cyberdude.com) 13/10/2002
 *    Dodal prvo poglavje: Pozdravljeni v slovenski razli�ici (naslov in 4 alineje): Lado Golouh, www.razmerje.com
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
// To add an entry to your FAQ simply add a line to this file in this format:
// $faq[] = array("question", "answer");
// If you want to separate a section enter $faq[] = array("--","Block heading goes here if wanted");
// Links will be created automatically
//
// DO NOT forget the ; at the end of the line.
// Do NOT put double quotes (") in your FAQ entries, if you absolutely must then escape them ie. \"something\";
//
// The FAQ items will appear on the FAQ page in the same order they are listed in this file
//


$faq[] = array("--","Pozdravljeni v slovenski razli�ici foruma phpBB"); 
$faq[] = array("Kaj je uporabni�ko ime?", "To je ime, pod katerim boste prepoznavni. Lahko je va�e pravo ali izmi�ljeno ime, sestavljeno iz poljubnih �rk in �tevilk. Priporo�amo, da si izberete ime, ki vam je v�e�.");
$faq[] = array("Zakaj potrebujem geslo?", "Geslo si izbere�, potrebuje� pa ga kot klju� za varen vstop pod tvojim uporabni�kim imenom. Ko si prijavljen/-a lahko ne samo objavlja� pod svojim imenom, temve� pi�e� in bere� zasebna sporo�ila, spreminja� podatke o sebi v profilu, ipd. zato je prav, da je tvoja identiteta varovana.");
$faq[] = array("Kako se znajdem na forumu", "Najla�je tako, da s klikanjem preizku�a� in se pri tem u�i�. Pomo� poi��e� na dveh mestih: <b>a.</b> <i>Pogosta vpa�anja in odgovori</i> v menijski vrstici zgoraj na osnovni strani in <b>b.</b> levo ob oken�ku, ki se odpre za vpis sporo�ila, so navodila, kako oblikovati izgled sporo�ila: <i>(Navodila) BBkoda</i>. Ne pozabi: �e ute�eni �lani pove�ini zelo radi pomagajo za�etnikom.");
$faq[] = array("Ali lahko ostanem anonimen?", "Ima� dve mo�nosti: <b>a.</b> prikrita ideniteta, ker se prijavi� z izmi�ljenim uporabni�kim imenom. �e administrator dovoli, lahko sodeluje� le <b>b.</b>kot gost, namesto imena se izpi�e <i>gost</i>. Kljub temu odgovarja� za svoje objave, da so v okviru splo�nih norm, ob zlorabi lahko administrator onemogo�i dostop na stran. Objava pod imenom omogo�a ve�jo preglednost sporo�il.");
  
$faq[] = array("--","Vpra�anja v zvezi s prijavo in registracijo");
$faq[] = array("Zakaj se ne morem prijaviti?", "Ali si se registriral? Ne? To je povsem resno vpra�anje, saj se mora� za prijavo predhodno registrirati. Ti je bil mogo�e vstop onemogo�en (v tem primeru se ti bo prikazalo ustrezno obvestilo)? �e je bilo res tako, potem kontaktiraj administratorja, ki ti bo povedal vzrok prepovedi vstopa. �e pa ni ni� od navedenega,  natan�no preveri uporabni�ko ime in geslo, ki si ga vnesel pri prijavi. To so namre� najpogostej�i vzroki za nastali problem. �a pa �e kljub temu, da vstopa nima� onemogo�enega s strani administratorja, ne bo� uspel odpraviti problema, kontaktiraj administratorja foruma, saj je mo�no, da nastavitve le-tega niso ustrezne.");
$faq[] = array("Zakaj se moram registrirati?", "Registriranje ni 100% potrebno. Vse je odvisno od administratorja oz. od tega, kako je nastavil forum. Brez registracije bo� verjetno lahko objavljal in odgovarjal na objave v dolo�enih forumih, na dolo�ene (obi�ajno najve�krat) pa verjetno ne! Torej, z registracijo bo� pri�el do dodatnih opcij (izbira avatarja - podobe, po�iljanje zasebnih sporo�il, ...), katere ti kot gostu (neregistriranemu uporabniku) ne bodo na voljo! Ker ti bo registracija vzela le slabo minutko, ti priporo�amo, da le-to izvede�.");
$faq[] = array("�emu avtomatska odjava?", "�e ob prijavi ne odkljuka� polja <i>Samodejna prijava</i>, bo� ostal prijavljen le v �asu obiska strani. Ta (ne)nastavitev prepre�uje zlorabo tvojega uporabni�kega ra�una. �e �eli� ostati prijavljen, odkljukaj nastavitev <i>Samodejno prijava</i>, kar pa ni priporo�ljivo, �e <b>ne dostopa�</b> do strani preko svojega ra�unalnika ampak od drugod (knji�nice, cyber cafe, ...). Za vse uporabnike na doma�em, svojem ra�unalniku priporo�amo avtomatsko prijavljanje.");
$faq[] = array("Kako odstranim vidnost uporabni�kega imena z liste na zvezi (online) uporabnikov?", "V svojem profilu bo� na�el opcijo <i>Skrij prisotnost</i>. �e jo postavi� na <i>Da</i>, se bo prisotnost kazala le administratorju in tebi. Obravnavan bo� kot <i>skriti uporabnik</i>.");
$faq[] = array("Pozabil sem geslo!", "Ne zganjaj panike! Ker tvojega gesla ni mo� vpogledati, bo� dobil novega, in sicer tako, da na strani, kjer se prijavi�, klikne� na <u>Pozabil sem geslo</u>, ter sledi� navodilom, tako da bo� v trenutku zopet na zvezi, online!");
$faq[] = array("Registriral sem se, vendar se ne morem prijaviti!", "Preveri, �e vna�a� pravilno uporabni�ko ime in geslo. �e je temu tako, potem sta se lahko zgodili dve stvari, in sicer slede�i:<br>
- �e je vklju�ena opcija 'COPPA support' in si pri registraciji kliknil <u>Sem mlaj�i od 13 let</u>, potem bo� moral slediti navodilom, ki si jih tedaj prejel. �e pa temu ni tako, ...<br>
- potem je verjetno potrebno va� ra�un aktivirati. Nekateri forumi namre� pred prijavo zahtevajo aktivacijo ra�unov vseh novo registriranih uporabnikov, bodisi s strani administratorja ali samega uporabnika. To zahtevo si mogel opaziti pri sami prijavi. �e si prejel email-elektronsko sporo�ilo, potem sledi navodilom, �e pa sporo�ila nisi prejel, si verjetno vnesel napa�en e-mail naslov. Aktivacija ra�una je v ve�ini primerov uporabljena za za��ito forumov pred anonimno zlorabo le-teh. �e si popolnoma prepri�an, da si vnesel pravi e-mail naslov, sku�aj kontaktirati administratorja.");
$faq[] = array("Naenkrat se ne morem ve� prijaviti?!", "Najbolj pogosti razlogi za to so:<br>
- vnesel si napa�no uporabni�ko ime ali geslo (preveri elektronsko sporo�ilo, ki si ga prijel ob registraciji)<br>
- administrator je z dolo�enim razlogom odstranili tvoj ra�un. Pogosto so nastavitve forumov take, da se po dolo�enih dneh neobjavljanja slede�i ra�un odstrani in s tem zmanj�a velikost baze podatkov. Zatorej se ponovno registriraj in se vklju�i v debato!");


$faq[] = array("--","Uporabni�ke nastavitve");
$faq[] = array("Kako spremenim svoje nastavitve?", "Vse tvoje nastavitve (�e si registriran) so shranjene v bazi podatkov. V primeru, da si �eli� spremeniti le-te, klikni na povezavo Profil (ponavadi v zgornjem predelu strani, vendar ni nujno tako). V profilu lahko spreminja� vse svoje nastavitve.");
$faq[] = array("�as ni pravilen!", "�as ki ga vidi� je skoraj zagotovo pravilen. Tisto, kar ti vidi� je lahko �as iz drugega �asovnega pasu. �e je temu tako, potem bi bilo dobro, �e bi spremenil nastavitve �asovnega pasu v svojem profilu in sicer za Slovenijo je ustrezna nastavitev: (GMT + 1:00 ura) Ljubljana, Amsterdam, ... Te in ostale nastavitve pa lahko spreminjajo samo registrirani uporabniki. �e torej �e nisi registriran, je sedaj zadnji �as, da se registrira�!");
$faq[] = array("Spremenil sem �asovni pas, �as pa je �e vedno ni pravilen!", "�e si prepri�an, da si pravilno nastavil �asovni pas, �as pa �e vedno ni ustrezen, je najverjetneje vzrok v razliki letnih �asov (pomlad, poletje, jesen, zima). Ker forum nima vgrajene opcije za pretvorbo �asa zaradi letnih �asov, je mo�no, da bo le ta odstopal za 1 uro.");
$faq[] = array("Mojega materinega jezika ni na spisku!", "Razlog ti�i v tem, da je za privzeti jezik nastavljen slovenski, saj se v tem forumu uporablja sloven��ina.");
$faq[] = array("Kako dodam sliko poleg uporabni�kega imena?", "Poleg uporabni�kega imena ima� lahko dve slikici in sicer:<br>
- prva slikica je lahko povezana s tvojim rangom, ki se s pridnostjo in pogostostjo objavljanja postopoma zvi�uje,
- pod to pa je lahko ve�ja slikica, avatar, je podoba, ki je ponavadi edinstvena, pripada samo enemu uporabniku, razen �e je izbrana iz galerije. �e je izbira avatarja (podobe) onemogo�ena, je to pa� odlo�itev administratorja foruma, prepri�ani smo, da ima dober razlog za svojo odlo�itev. Sliko lahko prispeva� iz svojega arhiva ali nari�e�, ali se pove�e� z neko sli�ico na internetu.");
$faq[] = array("Kako spremenim rang?", "V splo�nem ni mo� spreminjati ranga (pojavi se nad uporabni�kim imenom). Ve�ina forumov uporablja range za identifikacijo mno�i�nosti objav posameznega uporabnika, ter posebne range za obele�itev posebnih uporabnikov. Prosim, ne zlorabi mno�i�nega objavljanja (brez vsebine) z namenom, da bi si pridobil vi�ji rang, saj bo moderator ali administrator v tem primeru zni�al �tevilo tvojih objav.");
$faq[] = array("Ob kliku na povezavo e-mail uporabnika sem pozvan k prijavi?", "Ja, tako je! Samo registrirani uporabniki lahko po�iljajo elektronska sporo�ila uporabnikom foruma. S tem je prepre�ena uporaba sistema po�iljanja elektronskih sporo�il anonimnim uporabnikom!");


$faq[] = array("--","Poglavje o objavljanju");
$faq[] = array("Kako objavim novo temo?", "Povsem preprosto! Klikni na ustrezen gumb (Nova tema) v forumu. Pred objavo pa se je v ve�ini primerov potrebno registrirati!");
$faq[] = array("Kako uredim ali izbri�em sporo�ilo?", "V primeru, da nisi administrator ali moderator foruma, lahko ureja� in bri�e� le svoja sporo�ila. Svoje sporo�ilo lahko uredi� (v�asih samo nekaj �asa po objavi) tako, da klikne� na gumb uredi, v desnem zgornjem kotu posameznega sporo�ila. V primeru, da je na tvoje sporo�ilo nekdo �e odgovoril, obi�ajni uporabnik ne more ve� izbrisati objave!");
$faq[] = array("Kako k objavi dodam podpis?", "Pred dodajanjem podpisa, je le-tega potrebno predhodno vpisati, to pa stori� v svojem Profilu. Ko ga enkrat ustvari�, ga enostavno vklju�i� v sporo�ilo s tem, da na obrazcu za oddajo sporo�ila, doda� kljukico pred <b>Dodaj podpis</b>. Dodajanje podpisa pa lahko nastavi� tudi kot privzeto (se pravi da se ta prilepi k vsaki objavi) in sicer tako, da v nastavitvah svojega Profila odkljuka� ustrezeno opcijo. Podpis lahko kasneje (pri vsaki objavi posebej) tudi izklju�i�.");
$faq[] = array("Kako ustvarim anketo?", "Povsem preprosto, �e ti seveda forum to dovoljuje. Ob objavi nove teme ali ob prvi objavi za neko temo se ti mora v obrazcu prikazati tudi del za izpolnitev podatkov za anketo. �e tega ne vidi�, je opcija za vstavitev ankete onemogo�ena! Podatke za anketo izpolni� tako, da najprej vnese� <i>Naslov ankete</i>, nato pa vsaj dve opciji za glasovanje. Prav tako lahko omeji� �as zbiranja glasov (0 pomeni neskon�no). Seveda pa obstaja tudi zgornja meja �tevila mo�nosti, ki pa jo nastavi administrator (npr. 10).");
$faq[] = array("Kako uredim ali izbri�em anketo?", "S tem je tako kot pri objavah. Se pravi da jih lahko ureja le lastnik - postavitelj, moderator ali administrator. Za urejanje ankete kliknite na gumb uredi pri prvi objavi v tej temi. Ko je bil enkrat sprejet glas, lahko uredi ali izbri�e anketo le moderator ali administrator.");
$faq[] = array("Zakaj ne morem dostopati do dolo�enega foruma?", "Dostop do nekaterih forumov (razdelkov) je dovoljen samo dolo�enim uporabnikom ali skupini uporabnikov. Za dostop (pregled, branje, objavo, ...) do teh potrebuje� posebno avtorizacijo, ki ti jo lahko omogo�i le moderator ali administrator tistega dela foruma.");
$faq[] = array("Zakaj ne morem glasovati v anketi?", "Glasovanje je omogo�eno le registriranim uporabnikom (s tem je prepre�eno masivno glasovanje enega uporabnika). �e si registriran in �e vedno ne more� glasovati, potem najbr� nima� ustreznih dostopnih pravic.");

$faq[] = array("--","Oblikovanje foruma in vrste tem");
$faq[] = array("Kaj je koda BBCode?", "BBCode je posebna izbolj�ava HTML-jezika, katerega uporabo omogo�i (ali ne) administrator (lahko jo tudi onemogo�i� v obrazcu za vnos sporo�ila, s tem da pred objavo odkljuka� ustrezno polje). BBCode je sama po sebi zelo podobna HTML-ju (ozna�be so v oglatih oklepajih [xyz] kar omogo�a bolj�i pregled nad tem kaj in kak�en bo izpis.Za ve� informacij o tej temi si oglejte dodatno razlago, do katere lahko dostopate tako, da v obrazcu za objavo kliknete na povezavo BBCode (ponavadi se nahaja v drugi vrstici na�tetih <b>Mo�nosti</b>) levo obokencu za vpis sporo�ila.");
$faq[] = array("Ali lahko uporabim HTML?", "Odvisno od tega ali to administrator dopu��a. �e je njegova uporaba omogo�ena, bo� kmalu spoznal da delujejo le dolo�ene ozna�be (tags). Prav tako lahko HTML tudi onemogo�i� in sicer tako, da pred objavo sporo�ila odkljuka� polje <i>Onemogo�i HTML</i>.");
$faq[] = array("Kaj so Sme�ki?", "Sme�ki (Angl.: Smileys, Emoticons) so majhne grafi�ne slike, ki omogo�ajo, da izrazi� dolo�ena �ustva (Primer>> :) pomeni da si sre�en, :( pomeni da si �alosten, ...). Celoten spisek Sme�kov lahko vidi� v obrazcu za po�iljanje sporo�ila.");
$faq[] = array("Ali lahko sporo�ilu dodam sliko?", "Slike so lahko dodane sporo�ilom, pri �emer pa ni omogo�en prenos slik direktno na stre�nik, ampak v objavo lahko vklju�i� le slike, ki so shranjene na javnosti dostopnih stre�nikih (Primer>> http://www.moj-naslov.net/moja-slikca.gif). Povezave do slik, shranjenih na tvojem ra�unalniku, razen �e ni javnosti dostopen stre�nik, niso mogo�e. Prav tako ni mogo�e vklju�evanje slik, ki so shranjene za avtorizacijskimi mehanizmi (Primer>> Hotmail-ov in Yahoo-jev po�tni predal, strani za��itene z geslom, ...). Za vklju�itev slike uporabi bodisi BBCode-ovo ozna�bo [img] ali ustrezno HTML ozna�bo, �e je uporaba le-tega omogo�ena.");
$faq[] = array("Kaj so Obvestila?", "Obvestila so sporo�ila, ki vsebujejo pomembne informacije, tako da bi jih moral prebrati �imprej. Pojavijo se na vrhu vsake strani foruma, kjer so bila objavljena. Od pravic, ki so zahtevane za objavljanje obvestil, je odvisno ali jih lahko objavi� tudi ti! Vse je zopet v rokah administratorja.");
$faq[] = array("Kaj predstavljajo NE PREZRI! (Vedno na vrhu, Sticky) teme?", "Pojavijo se na vrhu prve strani razdelka foruma, v katerem so bile objavljene, takoj pod zgoraj omenjenimi obvestili. To so ponavadi dokaj pomembne teme, tako da jih je priporo�ljivo prebrati. Prav tako tudi tu administrator dolo�i pravice, ki so potrebne za objavljanje teh tem v posameznih forumih!");
$faq[] = array("Kaj so Zaklenjene teme?", "Zaklenjene teme so teme, na katere ni mogo�e ve� odgovarjati. Ankete teh tem se avtomatsko kon�ajo. Zaklenjene so bodisi s strani administratorja bodisi s strani moderatorja, ponavadi zaradi razli�nih razlogov, zagotovo pa so vsi tehtni.");


$faq[] = array("--","Uporabni�ki nivoji in skupine");
$faq[] = array("Kaj so Administratorji?", "Administrator je uporabnik, ki ima najvi�jo stopnjo kontrole nad celotnim forumom (nastavitev pravic, nadzor nad uporabniki, kreiranje uporabni�kih skupin, dolo�anje moderatorjev, ...). Prav tako vklju�uje vse pravice moderatorjev posameznih forumov.");
$faq[] = array("Kaj so Moderatorji?", "Moderatorji so uporabniki, katerih naloga je, da dan za dnem bdijo nad dogajanjem v forumu, ki jim je dodeljen. Poleg tega imajo pravico urejanja in brisanja objav, zaklepanja, odklepanja, premikanja, brisanja in deljenja tem forumov, ki jih moderirajo. Poskrbeti morajo, da uporabniki z objavami ne zaidejo izven teme, zaradi katere je bil forum ustvarjen ter za to, da se objave z �aljivo in neustrezno vsebino �imprej odstranijo.");
$faq[] = array("Kaj so Uporabni�ke skupine?", "To so skupine, po katerih lahko administrator razvrsti uporabnike. Vsak uporabnik lahko pripada ve� skupinam (tu je razlika v primerjavi z ostalimi forumi), vsaki skupini pa se lahko priredijo dostopne pravice. S tem je olaj�ano delo administratorju, saj tako lahko hitreje dolo�i moderatorje foruma ali jim dodeli pravice za dostop do zasebnega foruma, ....");
$faq[] = array("Kako se pridru�im dolo�eni Uporabni�ki skupini?", "Za pristop k dolo�eni skupini klikni na povezavo Uporabni�ke skupine, ki se nahaja v glavi strani (ponavadi zgornji del strani), kjer lahko pregleda� tebi vidne skupine. Vpogled v vse obstoje�e skupine ponavadi ni mogo�, saj so nekatere zaprte , nekatere pa imajo celo zakrito �lanstvo. �e je skupina odprtega tipa, lahko zaprosi� za �lanstvo s klikom na ustrezen gumb. Za zavrnjene pro�nje se ne zna�ajte nad moderatorjem skupine, saj imajo gotovo dobre razloge za zavrnitev.");
$faq[] = array("Kako postanem moderator Uporabni�ke skupine?", "Uporabni�ke skupine ustvari administrator in so jim prav tako dodeljeni moderatorji. �e si zainteresiran za kreiranje Uporabni�ke skupine, o tem interesu obvesti admninistratorja, ponavadi je dovolj �e zasebno sporo�ilo.");


$faq[] = array("--","Po�iljanje zasebnih sporo�il");
$faq[] = array("Ne morem po�iljati zasebnih sporo�il!", "Za to obstajajo trije vzroki in sicer:<br> 
- nisi registriran/a in/ali prijavljen/a;<br>
- administrator je onemogo�il po�iljanje zasebnih sporo�il;<br>
- administrator ti je onemogo�il po�iljati zasebna sporo�ila.<br>
V zadnjem primeru kontaktiraj administratorja in ga prosi za pojasnilo!");
$faq[] = array("Nenehno dobivam neza�elena zasebna sporo�ila!", "V prihodnosti bo v sistem po�iljanja sporo�il vklju�ena tudi t.i. Ignore lista (seznam naslovov od katerih ne �elimo prejemati sporo�il), do takrat pa o problemu, s katerim se sre�uje�, obvesti administratorja foruma, ki lahko posamezniku onemogo�i po�iljanje zasebnih sporo�il.");
$faq[] = array("Od nekoga iz foruma sem prejel vsiljeno (spam) ali �aljivo elektronsko sporo�ilo!", "Za nastalo situacijo nam je zelo �al! Obrazec za po�iljanje elektronske po�te vsebuje varnostne to�ke, preko katerih posku�amo zaslediti uporabnike, ki izrabljajo to storitev. V tem primeru je zelo pomembno, da administratorju po�lje� celotno kopijo sporo�ila, �e posebej t.i. header (vsebuje podatke o uporabniku, ki ga je poslal). �ele tedaj bo mo� ukrepati proti storilcu.");

//
// These entries should remain in all languages and for all modifications
//
$faq[] = array("--","O programu phpBB 2");
$faq[] = array("Kdo je ustvaril ta forum?", "Ta program je (v nespremenjeni obliki) avtorsko delo <a href=\"http://www.phpbb.com/\" target=\"_blank\">phpBB Group</a>. Javnosti je na voljo pod pogoji GNU General Public Licence in se lahko prosto posreduje drugim uporabnikom. Za ve� informacij obi��ite povezavo.");
$faq[] = array("Zakaj v forumu ni na voljo funkcija X?", "Ta software je delo skupine phpBB Group, ki ima zanj tudi licenco. �e mislite, da bi bilo treba dodati kak�no dodatno funkcijo, potem obi��ite stran phpbb.com in si oglejte, kaj o tem pravi phpBB Group. Prosimo vas, da na forumu na strani phpbb.com ne objavljate pro�enj za nove funkcije. phpBB Group za te namene uporablja forume za izmenjavo mnenj (sourceforge). Prosimo, da preberete forume in si ogledate, kak�no je na�e mnenje glede posameznih funkcij in potem sledite navodilom, ki jih boste dobili tam.");
$faq[] = array("Koga lahko kontaktiram glede zlorabe in pravnih zadev povezanih s tem forumom?", "Obrnite se na administratorja tega foruma. �e ne najdete njegovega kontaktnega naslova, se obrnite na enega od moderatorjev in vpra�ajte koga morate kontaktirati. �e �e vedno ne dobite odziva, se obrnite na lastnika domene (do podatkov pridete preko <i>whois lookup</i>). �e forum gostuje na brezpla�nem serverju (npr. yahoo, free.fr, f2s.com, etc.), se obrnite na njihov oddelek za zlorabo storitev. Zavedati se morate, da phpBB Group nima popolnoma nobenega nadzora in zato ne more biti odgovorna za to, kdo uporablja njihov forum. Popolnoma nesmiselno je kontaktirati phpBB Group v zvezi s pravnimi zadevami, ki niso direktno povezane s stranjo phpbb.com ali z njihovim programom. �e boste vseeno poslali sporo�ilo phpBB Group o uporabi njihovega foruma, se zavedajte, da boste v najbolj�em primeru dobili le kratek odgovor, v ve�ini primerov pa sploh ne boste dobili odgovora.");

//
// This ends the FAQ entries
//

?>