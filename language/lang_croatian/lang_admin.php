<?php

/***************************************************************************
 *                            lang_admin.php [Croatian]
 *                              -------------------
 *     begin                : Monday Dec 01 2002 
 *     copyright            : (C) 2002 Hrvoje Stankov
 *     email                : hrvoje@spirit.hr
 *
 *     $Id$
 *
 ****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

//
// Format is same as lang_main
//

//
// Modules, this replaces the keys used
// in the modules[][] arrays in each module file
//
$lang['General'] = 'Op�enito';
$lang['Users'] = 'Korisnici';
$lang['Groups'] = 'Grupe';
$lang['Forums'] = 'Forumi';
$lang['Styles'] = 'Stilovi';

$lang['Configuration'] = 'Konfiguriranje';
$lang['Permissions'] = 'Dozvole';
$lang['Manage'] = 'Upravljanje';
$lang['Disallow'] = 'Zabranjena imena';
$lang['Prune'] = 'Pojednostavljenje';
$lang['Mass_Email'] = 'Masovni Email';
$lang['Ranks'] = 'Pozicije';
$lang['Smilies'] = 'Smiley';
$lang['Ban_Management'] = 'Kontrola zabrana';
$lang['Word_Censor'] = 'Cenzurirane rije�i';
$lang['Export'] = 'Iznesi';
$lang['Create_new'] = 'Napravi';
$lang['Add_new'] = 'Dodaj';
$lang['Backup_DB'] = 'Backup baze';
$lang['Restore_DB'] = 'Povrati bazu';


//
// Index
//
$lang['Admin'] = 'Admin';
$lang['Not_admin'] = 'Nemate ovla�tenja da administrirate forume';
$lang['Welcome_phpBB'] = 'Dobrodo�li na phpBB';
$lang['Admin_intro'] = 'Hvala vam �to ste izabrali phpBB kao rje�enje za va� forum. Na ovom ekranu imate brz pregled raznih statistika va�ih foruma. Na ovu stranicu se mo�ete vratiti klikom na <u>Admin Indeks</u> link na lijevom panelu. Za povratak na indeks foruma, kliknite na phpBB logo tako�er na lijevom panelu. Ostali linkovi na lijevom panelu dozvoli�e vam da kontrolirate svako obilje�je va�eg foruma, a svaki ekran ima uputstvo kako da koristite alate.';
$lang['Main_index'] = 'Indeks foruma';
$lang['Forum_stats'] = 'Statistike foruma';
$lang['Admin_Index'] = 'Admin index';
$lang['Preview_forum'] = 'Pregled foruma';

$lang['Click_return_admin_index'] = 'Kliknite %sovdje%s za povratak na Admin Indeks';

$lang['Statistic'] = 'Statistika';
$lang['Value'] = 'Vrijednost';
$lang['Number_posts'] = 'Broj poruka';
$lang['Posts_per_day'] = 'Broj poruka dnevno';
$lang['Number_topics'] = 'Broj tema';
$lang['Topics_per_day'] = 'Broj tema dnevno';
$lang['Number_users'] = 'Broj korisnika';
$lang['Users_per_day'] = 'Broj korisnika dnevno';
$lang['Board_started'] = 'Forum je po�eo';
$lang['Avatar_dir_size'] = 'Veli�ina direktorija Avatar';
$lang['Database_size'] = 'Veli�ina baze';
$lang['Gzip_compression'] ='Gzip kompresija';
$lang['Not_available'] = 'Nije dostupno';

$lang['ON'] = 'Uklju�eno'; // This is for GZip compression
$lang['OFF'] = 'Isklju�eno'; 


//
// DB Utils
//
$lang['Database_Utilities'] = 'Alati za bazu';

$lang['Restore'] = 'Povrati';
$lang['Backup'] = 'Backup';
$lang['Restore_explain'] = 'Ovim �ete izvr�iti potpuno vra�anje svih phpBB tabela iz snimljne datoteke. Ako to va� server podr�ava mo�ete poslati gzip zapakiranu tekst datoteku koja �e biti automatski otpakirana. <b>UPOZORENJE:</b> Ovim �ete prepisati postoje�e podatke. Proces mo�e potrajati dugo pa vas molimo da ostanete na ovoj stranici dok se operacija ne zavr�i.';
$lang['Backup_explain'] = 'Ovdje mo�ete napraviti backup za sve va�e phpBB podatke. Ako imate bilo kakve dodatne tabele u istoj bazi sa phpBB za koje biste �eljeli napraviti backup, molimo vas da unesete njihova imena odvojena zarezima u polje Dodatne tabele ispod. Ako to va� server podr�ava mo�ete koristiti gzip kompresiju da biste smanjili veli�inu datoteke prije downloada.';

$lang['Backup_options'] = 'Backup opcije';
$lang['Start_backup'] = 'Pokreni backup';
$lang['Full_backup'] = 'Potpuni backup';
$lang['Structure_backup'] = 'Backup samo strukture';
$lang['Data_backup'] = 'Backup svih podataka';
$lang['Additional_tables'] = 'Dodatne tabele';
$lang['Gzip_compress'] = 'Gzip zapakirana datoteka';
$lang['Select_file'] = 'Izaberite datoteku';
$lang['Start_Restore'] = 'Startaj povratak';

$lang['Restore_success'] = 'Baza je uspje�no vra�ena.<br /><br />Va� forum bi trebao biti u stanju u kakvom je bio kada je napravljen backup.';
$lang['Backup_download'] = 'Download �e po�eti brzo - molimo vas da sa�ekate po�etak';
$lang['Backups_not_supported'] = 'Ispri�avamo se ali backup baze trenutno nije podr�an za va� sistem baze.';

$lang['Restore_Error_uploading'] = 'Gre�ka pri slanju backup datoteke';
$lang['Restore_Error_filename'] = 'Problem sa imenom datoteke, probajte neku drugu';
$lang['Restore_Error_decompress'] = 'Ne mogu raspakirati gzip datoteku, molim vas po�aljite klasi�nu tekst verziju';
$lang['Restore_Error_no_file'] = 'Nijedna datoteka nije poslana';


//
// Auth pages
//
$lang['Select_a_User'] = 'Izaberi korisnika';
$lang['Select_a_Group'] = 'Izaberi grupu';
$lang['Select_a_Forum'] = 'Izaberi forum';
$lang['Auth_Control_User'] = 'Kontrola dozvola korisnika'; 
$lang['Auth_Control_Group'] = 'Kontrola dozvola grupa'; 
$lang['Auth_Control_Forum'] = 'Kontrola dozvola foruma'; 
$lang['Look_up_User'] = 'Potra�i korisnika'; 
$lang['Look_up_Group'] = 'Potra�i grupu'; 
$lang['Look_up_Forum'] = 'Potra�i forum'; 

$lang['Group_auth_explain'] = 'Ovdje mo�ete izmijeniti dozvole i ure�ivati status dodjeljen svakoj grupi. Ne zaboravite da kad mijenjate dozvole grupama individualne dozvole korisnika jo� uvijek omogu�avaju korisniku ulaz na forume itd. Ako se to desi biti �ete upozoreni u svakom slu�aju.';
$lang['User_auth_explain'] = 'Ovdje mo�ete izmijeniti dozvole i ure�ivati status dodjeljen svakom korisniku. Ne zaboravite da kad mijenjate dozvole korisnicima individualne dozvole grupama jo� uvijek omogu�avaju korisniku ulaz na forume itd. U tom slu�aju biti �ete upozoreni.';
$lang['Forum_auth_explain'] = 'Ovdje mo�ete izmijeniti nivoe pristupa svakom forumu. Imate i jednostavanu i pro�irenu metodu, s tim da pro�irena metoda nudi ve�u kontrolu svake operacije na forumu. Zapamtite da �ete promjenom nivoa pristupa forumima odrediti koji korisnici mogu izvr�avati razne operacije na njima.';

$lang['Simple_mode'] = 'Jednostavan na�in';
$lang['Advanced_mode'] = 'Napredni na�in';
$lang['Moderator_status'] = 'Status urednika';

$lang['Allowed_Access'] = 'Dozvoljen pristup';
$lang['Disallowed_Access'] = 'Zabranjen pristup';
$lang['Is_Moderator'] = 'Urednik';
$lang['Not_Moderator'] = 'Nije urednik';

$lang['Conflict_warning'] = 'Upozorenje o sukobu dozvola';
$lang['Conflict_access_userauth'] = 'Ovaj korisnik ima pristupna prava u ovom forumu preko �lanstva u grupi. Mo�da �ete �eljeti izmijeniti dozvole grupa ili izbaciti korisnika iz grupe da bi mu u potpunosti ukinuli prava na pristup. Garantirana prava grupe (uklju�uju�i i umije�ane forume) su prikazana ispod.';
$lang['Conflict_mod_userauth'] = 'Ovaj korisnik ima pristupna prava urednika u ovom forumu preko �lanstva u grupi. Mo�da �ete �eljeti izmijeniti dozvole grupa ili izbaciti korisnika iz grupe da bi mu u potpunosti ukinuli prava na uredni�ki pristup. Garantirana prava grupe (uklju�uju�i i umije�ane forume) su prikazana ispod.';

$lang['Conflict_access_groupauth'] = 'Sljede�i korisnik (ili korisnici) jo� uvijek imaju pravo pristupa na ovaj forum putem korisni�kih dozvola. Mo�da �ete �eljeti izmijeniti dozvole korisnika da bi mu u potpunosti ukinuli prava na pristup. Garantirana prava korisnika (uklju�uju�i i umije�ane forume) su prikazana ispod.';
$lang['Conflict_mod_groupauth'] = 'Sljede�i korisnik (ili korisnici) jo� uvijek imaju pravo uredni�kog pristupa na ovaj forum putem korisni�kih dozvola. Mo�da �ete �eleti izmijeniti dozvole korisnika da bi mu u potpunosti ukinuli uredni�ka prava. Garantovana prava korisnika (uklju�uju�i i umije�ane forume) su prikazana ispod.';

$lang['Public'] = 'Javni';
$lang['Private'] = 'Privatni';
$lang['Registered'] = 'Registrirani';
$lang['Administrators'] = 'Administratori';
$lang['Hidden'] = 'Skriveni';

// These are displayed in the drop down boxes for advanced
// mode forum auth, try and keep them short!
$lang['Forum_ALL'] = 'SVI';
$lang['Forum_REG'] = 'REGISTRIRANI';
$lang['Forum_PRIVATE'] = 'PRIVATNI';
$lang['Forum_MOD'] = 'MODERATORI';
$lang['Forum_ADMIN'] = 'ADMINISTRATORI';

$lang['View'] = 'Pogledaj';
$lang['Read'] = 'Pro�itaj';
$lang['Post'] = 'Po�alji';
$lang['Reply'] = 'Odgovori';
$lang['Edit'] = 'Izmijeni';
$lang['Delete'] = 'Obri�i';
$lang['Sticky'] = 'Ljepljiva';
$lang['Announce'] = 'Obavijesti'; 
$lang['Vote'] = 'Glasaj';
$lang['Pollcreate'] = 'Napravi glasanje';

$lang['Permissions'] = 'Dozvole';
$lang['Simple_Permission'] = 'Jednostavna dozvola';

$lang['User_Level'] = 'Nivo korisnika'; 
$lang['Auth_User'] = 'Korisnik';
$lang['Auth_Admin'] = 'Administrator';
$lang['Group_memberships'] = '�lanstvo u grupi';
$lang['Usergroup_members'] = 'Ova grupa ima sljede�e �lanove';

$lang['Forum_auth_updated'] = 'Dozvole foruma su izmijenjene';
$lang['User_auth_updated'] = 'Dozvole korisnika su izmijenjene';
$lang['Group_auth_updated'] = 'Dozvole grupa su izmijenjene';

$lang['Auth_updated'] = 'Dozvole su izmijenjene';
$lang['Click_return_userauth'] = 'Kliknite %sovdje%s za povratak na Dozvole korisnika';
$lang['Click_return_groupauth'] = 'Kliknite %sOvdje%s za povratak na Dozvole grupa';
$lang['Click_return_forumauth'] = 'Kliknite %sovdje%s za povratak na Dozvole foruma';


//
// Banning
//
$lang['Ban_control'] = 'Kontrola zabrane';
$lang['Ban_explain'] = 'Odavde mo�ete kontrolirati zabrane korisnicima. Mo�ete zabraniti pojedina�no ili zajedno pojedina�nog ili specifi�nog korisnika ili opseg IP adresa ili imena hostova. Ovi na�ini sprje�avaju korisnika da pristupi index stranici va�eg foruma. Da biste sprje�ili korisnika da se registrira koriste�i drugo korisni�ko ime mo�ete odrediti zabranu putem email adrese. Znajte da blokiranjem email adrese ne�e sprje�iti korisnika da se logira ili �alje poruke na va� forum, tako da bi trebali koristiti jednu od prve dvije metode.';
$lang['Ban_explain_warn'] = 'Znajte da �e uno�enjem opsega IP adresa sve adrese od po�etne do krajnje biti dodane na listu blokiranih adresa. Poku�ajte minimalizirati broj dodanih adresa u bazu unose�i jokera (*) gdje god je to mogu�e. Ako stvarno morate blokirati opseg adresa gledajte da bude �to manji.';

$lang['Select_username'] = 'Izaberite korisni�ko ime';
$lang['Select_ip'] = 'Izaberite IP';
$lang['Select_email'] = 'Izaberite email adresu';

$lang['Ban_username'] = 'Zabrani jednog ili vi�e korisnika';
$lang['Ban_username_explain'] = 'Mo�ete zabraniti vi�e korisnika u jednom prolazu koriste�i odgovaraju�u kombinaciju mi�a i tastature za va�e ra�unalo i internet preglednik.';

$lang['Ban_IP'] = 'Zabrani jednu ili vi�e IP adresa ili imena hostova';
$lang['IP_hostname'] = 'IP adrese ili ime hostova';
$lang['Ban_IP_explain'] = 'Da biste izabrali vi�e razli�itih IP-a ili imena hostova odvojite ih zarezima. Da bi ste odredili opseg IP adresa odvojite po�etnu i krajnju sa crticom (-), a za jokera koristite *';

$lang['Ban_email'] = 'Zabrani jednu ili vi�e email adresa';
$lang['Ban_email_explain'] = 'Da biste izbrali vi�e od jedne email adrese odvojite ih zarezom. Za jokera koristite *, na primjer *@hotmail.com';

$lang['Unban_username'] = 'Ukloni zabranu za jednog ili vi�e korisnika';
$lang['Unban_username_explain'] = 'Mo�ete ukloniti zabranu vi�e korisnika u jednom prolazu koriste�i odgovaraju�u kombinaciju mi�a i tastature za va�e ra�unalo i internet preglednik';

$lang['Unban_IP'] = 'Ukloni zabranu za jednu ili vi�e IP adresa';
$lang['Unban_IP_explain'] = 'Mo�ete ukloniti zabranu vi�e IP adresa u jednom prolazu koriste�i odgovaraju�u kombinaciju mi�a i tastature za va�e ra�unalo i internet preglednik';

$lang['Unban_email'] = 'Ukloni zabranu za jednu ili vi�e email adresa';
$lang['Unban_email_explain'] = 'Mo�ete ukloniti zabranu vi�e email adresa u jednom prolazu koriste�i odgovaraju�u kombinaciju mi�a i tastature za va�e ra�unalo i internet preglednik';

$lang['No_banned_users'] = 'Nema zabranjenih korisnika';
$lang['No_banned_ip'] = 'Nema zabranjenih  IP adresa';
$lang['No_banned_email'] = 'Nema zabranjenih email adresa';

$lang['Ban_update_sucessful'] = 'Lista zabrana je uspje�no osvje�ena';
$lang['Click_return_banadmin'] = 'Kliknite %sovdje%s za povratak na Kontrolu zabrana';


//
// Configuration
//
$lang['General_Config'] = 'Generalna konfiguracija';
$lang['Config_explain'] = 'Formular ispod omogu�it �e vam mijenjanje svih generalnih opcija foruma. Za konfiguracije korisnika i foruma koristite linkove na panelu sa lijeve strane.';

$lang['Click_return_config'] = 'Kliknite %sovdje%s za povratak na Generalnu konfiguraciju';

$lang['General_settings'] = 'Generalna pode�avanja foruma';
$lang['Server_name'] = 'Ime servera';
$lang['Server_name_explain'] = 'Ime servera(naziv domene) sa koje se forumi pokre�u';
$lang['Script_path'] = 'Put do skripte';
$lang['Script_path_explain'] = 'Put gdje je phpBB2 lociran u odnosu na ime servera';
$lang['Server_port'] = 'Port servera';
$lang['Server_port_explain'] = 'Port na kojemu radi va� server, obi�no 80, promjenite samo ako je druga�ije';
$lang['Site_name'] = 'Naziv site-a';
$lang['Site_desc'] = 'Opis site-a';
$lang['Board_disable'] = 'Isklju�i forum';
$lang['Board_disable_explain'] = 'Forum ne�e biti dostupan korisnicima. Nemojte se odjavljivati kada isklju�ujete forum, jer ne�ete biti u mogu�nosti da se ponovo prijavite!';
$lang['Acct_activation'] = 'Omogu�i aktivaciju naloga';
$lang['Acc_None'] = 'Bez aktivacije'; // These three entries are the type of activation
$lang['Acc_User'] = 'Korisnik';
$lang['Acc_Admin'] = 'Administrator';

$lang['Abilities_settings'] = 'Osnovna pode�avanja za korisnika i forum';
$lang['Max_poll_options'] = 'Maksimalni broj opcija za glasanje';
$lang['Flood_Interval'] = 'Interval za flood';
$lang['Flood_Interval_explain'] = 'Broj sekundi koje korisnik mora pri�ekati izme�u dvije poruke'; 
$lang['Board_email_form'] = 'Korisnik pi�e putem foruma';
$lang['Board_email_form_explain'] = 'Mogu�nost da korisnici jedni drugima �alju email putem foruma';
$lang['Topics_per_page'] = 'Tema po stranici';
$lang['Posts_per_page'] = 'Poruka po stranici';
$lang['Hot_threshold'] = 'Koliko poruka �uvati kao popularne';
$lang['Default_style'] = 'Podrazumijevani stil';
$lang['Override_style'] = 'Pregazi korisni�ki stil';
$lang['Override_style_explain'] = 'Zamjenjuje korisni�ki definiran stil sa podrazumijevanim';
$lang['Default_language'] = 'Podrazumijevani jezik';
$lang['Date_format'] = 'Format datuma';
$lang['System_timezone'] = 'Sistemska vremenska zona';
$lang['Enable_gzip'] = 'Omogu�i Gzip kompresiju';
$lang['Enable_prune'] = 'Omogu�i pojednostavljenje foruma';
$lang['Allow_HTML'] = 'Dozvoli HTML';
$lang['Allow_BBCode'] = 'Dozvoli BBCode';
$lang['Allowed_tags'] = 'Dozvoljeni HTML tagovi';
$lang['Allowed_tags_explain'] = 'Odvojite tagove zarezima';
$lang['Allow_smilies'] = 'Dozvoli smiley-e';
$lang['Smilies_path'] = 'Putanja za smje�tanje smiley-e';
$lang['Smilies_path_explain'] = 'Putanja ispod va�eg phpBB root direktorija, npr. images/smiles';
$lang['Allow_sig'] = 'Dozvoli potpise';
$lang['Max_sig_length'] = 'Maksimalna du�ina potpisa';
$lang['Max_sig_length_explain'] = 'Maksimalni broj slova u potpisu korisnika';
$lang['Allow_name_change'] = 'Dozvoli promjene korisni�kog imena';

$lang['Avatar_settings'] = 'Pode�avanje avatara';
$lang['Allow_local'] = 'Omogu�i galeriju avatara';
$lang['Allow_remote'] = 'Omogu�i udaljene avatare';
$lang['Allow_remote_explain'] = 'Avatari linkani na druge web stranice';
$lang['Allow_upload'] = 'Omogu�i slanje avatara';
$lang['Max_filesize'] = 'Maksimalna veli�ina datoteke za avatar';
$lang['Max_filesize_explain'] = 'Za poslane avatare';
$lang['Max_avatar_size'] = 'Maksimalne dimenzije avatara';
$lang['Max_avatar_size_explain'] = '(Visina x �irina u pikselima)';
$lang['Avatar_storage_path'] = 'Put za smje�tanje avatara';
$lang['Avatar_storage_path_explain'] = 'Put ispod va�eg phpBB root direktorija, npr. images/avatars';
$lang['Avatar_gallery_path'] = 'Put do avatar galerije';
$lang['Avatar_gallery_path_explain'] = 'Put ispod va�eg phpBB root direktorija za unaprijed u�itane slike, npr. images/avatars/gallery';

$lang['COPPA_settings'] = 'COPPA pode�avanja';
$lang['COPPA_fax'] = 'COPPA Broj faksa';
$lang['COPPA_mail'] = 'COPPA po�tanska adresa';
$lang['COPPA_mail_explain'] = 'Ovo je po�tanska adresa gde �e roditelji slati COPPA registracijske formulare';

$lang['Email_settings'] = 'Email pode�avanja';
$lang['Admin_email'] = 'Administratorova email adresa';
$lang['Email_sig'] = 'Email potpis';
$lang['Email_sig_explain'] = 'Ovaj tekst �e biti uklju�en u sve emailove koje forum po�alje';
$lang['Use_SMTP'] = 'Koristi SMTP server za email';
$lang['Use_SMTP_explain'] = 'Izaberite Da ukoliko �elite slati poruke putem odre�enog servera umjesto lokalne funkcije';
$lang['SMTP_server'] = 'Adresa SMTP servera';
$lang['SMTP_username'] = 'SMTP korisni�ko ime';
$lang['SMTP_username_explain'] = 'Korisni�ko ime unesite samo ako to va� SMTP server zahtjeva';
$lang['SMTP_password'] = 'SMTP lozinka';
$lang['SMTP_password_explain'] = 'Lozinku unesite samo ako to va� SMTP server zahtjeva';

$lang['Disable_privmsg'] = 'Privatne poruke';
$lang['Inbox_limits'] = 'Maksimalo poruka u Sandu�i�u';
$lang['Sentbox_limits'] = 'Maksimalno poruka u Sanduku za slanje';
$lang['Savebox_limits'] = 'Maksimalno poruka u Snimljeno';

$lang['Cookie_settings'] = 'Pode�avanje kola�i�a'; 
$lang['Cookie_settings_explain'] = 'Ovi detalji definiraju kako se kola�i�i �alju va�im korisnicima. Naj�e��e je podrazumjevana vrijednost dovoljna ali ako trebate ne�to mijenjati radite to pa�ljivo, jer pogre�no pode�avanje mo�e sprje�iti korisnike da se prijave';
$lang['Cookie_domain'] = 'Domena kola�i�a';
$lang['Cookie_name'] = 'Ime kola�i�a';
$lang['Cookie_path'] = 'Put kola�i�a';
$lang['Cookie_secure'] = 'Sigurnost kola�i�a';
$lang['Cookie_secure_explain'] = 'Ako va� server radi preko SSL-a podesite ovu opciju na Dozvoljeno a u suprotnom ostavite kao zabranjeno';
$lang['Session_length'] = 'Du�ina sessiona [ sekunde ]';


//
// Forum Management
//
$lang['Forum_admin'] = 'Administracija foruma';
$lang['Forum_admin_explain'] = 'Odavde mo�ete dodati, brisati, izmjeniti, preurediti i resinhronizirati kategorije i forume';
$lang['Edit_forum'] = 'Izmijeni forum';
$lang['Create_forum'] = 'Napravi nov forum';
$lang['Create_category'] = 'Napravi novu kategoriju';
$lang['Remove'] = 'Ukloni';
$lang['Action'] = 'Akcija';
$lang['Update_order'] = 'Osvje�i redosljed';
$lang['Config_updated'] = 'Konfiguracija foruma je uspje�no osvje�ena';
$lang['Edit'] = 'Izmijeni';
$lang['Delete'] = 'Izbri�i';
$lang['Move_up'] = 'Pomakni gore';
$lang['Move_down'] = 'Pomakni dole';
$lang['Resync'] = 'Ponovo sinhroniziraj';
$lang['No_mode'] = 'Nije odre�en na�in';
$lang['Forum_edit_delete_explain'] = 'Formular ispod �e vam omogu�iti da izmijenite sve generalne opcije foruma. Za konfiguracije korisnika i foruma koristite linkove na lijevom panelu';

$lang['Move_contents'] = 'Pomakni sav sadr�aj';
$lang['Forum_delete'] = 'Izbri�i forum';
$lang['Forum_delete_explain'] = 'Formular ispod �e vam omogu�iti da izbri�ete forum (ili kategoriju) i odlu�ite gdje ho�ete smjestiti sve teme (ili forume) koji su sadr�ani.';

$lang['Status_locked'] = 'Zaklju�an';
$lang['Status_unlocked'] = 'Otklju�an';
$lang['Forum_settings'] = 'Generalna pode�avanja foruma';
$lang['Forum_name'] = 'Naziv foruma';
$lang['Forum_desc'] = 'Opis';
$lang['Forum_status'] = 'Status foruma';
$lang['Forum_pruning'] = 'Automatsko smanjivanje';

$lang['prune_freq'] = 'Provjeri starost teme svakih';
$lang['prune_days'] = 'Pomakni teme u kojima nije pisano';
$lang['Set_prune_data'] = 'Uklju�ili ste automatsko smanjivanje za ovaj forum ali niste odredili u�estalost ili broj dana do smanjivanja. Molim vas da se vratite i to u�inite';

$lang['Move_and_Delete'] = 'Pomakni i izbri�i';

$lang['Delete_all_posts'] = 'Izbri�i sve poruke';
$lang['Nowhere_to_move'] = 'Tako�er se nemam kamo pomaknuti';

$lang['Edit_Category'] = 'Izmijeni kategoriju';
$lang['Edit_Category_explain'] = 'Koristite ovaj formular da biste izmjenili naziv kategorije.';

$lang['Forums_updated'] = 'Informacije o forumu i kategoriji su uspe�no osvje�ene';

$lang['Must_delete_forums'] = 'Morat �ete obrisati sve forume pre nego �to obri�ete kategoriju';

$lang['Click_return_forumadmin'] = 'Kliknite %sovdje%s za povratak na Administraciju foruma';


//
// Smiley Management
//
$lang['smiley_title'] = 'Ure�ivanje smailey-a';
$lang['smile_desc'] = 'Odavde mo�ete dodati, izbrisati i ure�ivati emotivne ikonice ili smajlije koje va�i korisnici mogu koristiti u porukama kao i privatnim porukama.';

$lang['smiley_config'] = 'Konfiguracija smiley-a';
$lang['smiley_code'] = 'Kod smiley-a';
$lang['smiley_url'] = 'Smiley datoteka';
$lang['smiley_emot'] = 'Smiley emocija';
$lang['smile_add'] = 'Dodaj novi smiley';
$lang['Smile'] = 'Smiley';
$lang['Emotion'] = 'Emocija';

$lang['Select_pak'] = 'Izaberite paket (.pak) datoteku';
$lang['replace_existing'] = 'Zamjeni postoje�i smiley';
$lang['keep_existing'] = 'Sa�uvaj postoje�i smiley';
$lang['smiley_import_inst'] = 'Trebalo bi raspakirati zapakirane smiley-e i poslati sve datoteke u odgovaraju�i smiley direktorij za va�u instalaciju. Onda izaberite to�nu informaciju u ovom formularu da bi ste ubacili pakiranje.';
$lang['smiley_import'] = 'Uvezi pakirane smiley-e';
$lang['choose_smile_pak'] = 'Izaberite smiley paket .pak datoteku';
$lang['import'] = 'Uvezi smiley-e';
$lang['smile_conflicts'] = '�ta bi trebalo u�initi u slu�aju sukoba';
$lang['del_existing_smileys'] = 'Obri�i postoje�e smiley-e prije uvoza';
$lang['import_smile_pack'] = 'Uvezi pakiranje smiley-a';
$lang['export_smile_pack'] = 'Napravi paket smiley-a';
$lang['export_smiles'] = 'Da bi ste napravili paket smiley-a od trenutno instaliranih, kliknite %sovdje%s za download smiles.pak datoteke. Ovoj datoteci dajte odgovaraju�e ime paze�i da sa�uvate .pak datote�nu ekstenziju.  Onda napravite zip datoteku koja sadr�i sve va�e smiley-e plus ovu .pak konfiguracijsku datoteku.';

$lang['smiley_add_success'] = 'Smiley je uspje�no dodan';
$lang['smiley_edit_success'] = 'Smiley je uspje�no osvje�en';
$lang['smiley_import_success'] = 'Smiley pakiranje je uspje�no uvezeno!';
$lang['smiley_del_success'] = 'Smiley je uspje�no izbrisan';
$lang['Click_return_smileadmin'] = 'Kliknite %sovdje%s za povratak na Administraciju smiley-a';


//
// User Management
//
$lang['User_admin'] = 'Administracija korisnika';
$lang['User_admin_explain'] = 'Ovde mo�ete izmjeniti informacije o korisnicima i odre�ene specifi�ne opcije. Da biste izmjenili dozvole korisnika i grupa koristite sistem dozvola za korisnike i grupe.';

$lang['Look_up_user'] = 'Prona�i korisnika';

$lang['Admin_user_fail'] = 'Ne mogu osvje�iti korisnikov-e profile.';
$lang['Admin_user_updated'] = 'Profil korisnika je uspje�no osvje�en.';
$lang['Click_return_useradmin'] = 'Kliknite %sovdje%s za povratak na Administraciju korisnika';

$lang['User_delete'] = 'Obri�i ovog korisnika';
$lang['User_delete_explain'] = 'Kliknite ovdje da obri�ete ovog korisnika, ova operacija je nepovratna.';
$lang['User_deleted'] = 'Korisnik je uspje�no obrisan.';

$lang['User_status'] = 'Korisnik je aktivan';
$lang['User_allowpm'] = 'Mo�e slati privatne poruke';
$lang['User_allowavatar'] = 'Mo�e prikazati avatar';

$lang['Admin_avatar_explain'] = 'Ovdje mo�ete pogledati i obrisati korisnikov trenutni avatar ili avatare.';

$lang['User_special'] = 'Specijalna polja samo za administratore';
$lang['User_special_explain'] = 'Ova polja ne mogu mijenjati korisnici. Ovdje mo�ete podesiti njihov status i druge opcije kojima korisnici nemaju pristup.';


//
// Group Management
//
$lang['Group_administration'] = 'Administracija grupa';
$lang['Group_admin_explain'] = 'Sa ovog panela mo�ete administrirati sve va�e korisni�ke grupe, mo�ete: brisati, dodavati i mijenjati postoje�e grupe. Mo�ete izabrati urednike, mijenjati status grupe (otvorena/zatvorena) i podesiti ime grupe i opis';
$lang['Error_updating_groups'] = 'Gre�ka pri osvje�ivanju grupa';
$lang['Updated_group'] = 'Grupa je uspje�no osvje�ena';
$lang['Added_new_group'] = 'Nova grupa je uspje�no kreirana';
$lang['Deleted_group'] = 'Grupa je uspje�no obrisana';
$lang['New_group'] = 'Napravi novu grupu';
$lang['Edit_group'] = 'Izmijeni grupu';
$lang['group_name'] = 'Naziv grupe';
$lang['group_description'] = 'Opis grupe';
$lang['group_moderator'] = 'Urednik grupe';
$lang['group_status'] = 'Status grupe';
$lang['group_open'] = 'Otvori grupu';
$lang['group_closed'] = 'Zatvorena grupa';
$lang['group_hidden'] = 'Skrivena grupa';
$lang['group_delete'] = 'Obri�i grupu';
$lang['group_delete_check'] = 'Obri�i ovu grupu';
$lang['submit_group_changes'] = 'Po�alji izmijene';
$lang['reset_group_changes'] = 'Resetiraj izmijene';
$lang['No_group_name'] = 'Morate odrediti ime za ovu grupu';
$lang['No_group_moderator'] = 'Morate odrediti urednika za ovu grupu';
$lang['No_group_mode'] = 'Morate odrediti mod za ovu grupu, otvorena ili zatvorena';
$lang['No_group_action'] = 'Nije odre�ena akcija';
$lang['delete_group_moderator'] = 'Obrisati starog moderatora grupe?';
$lang['delete_moderator_explain'] = 'Ukoliko mijenjate urednika grupe, ozna�ite ovdje da izbri�ete starog moderatora iz grupe. U suprotnom, nemojte ozna�iti, i korisnik �e postati regularni �lan grupe.';
$lang['Click_return_groupsadmin'] = 'Kliknite %sovdje%s za povratak na Administraciju grupa.';
$lang['Select_group'] = 'Izaberite grupu';
$lang['Look_up_group'] = 'Potra�i grupu';


//
// Prune Administration
//
$lang['Forum_Prune'] = 'Pojednostavljenje foruma';
$lang['Forum_Prune_explain'] = 'Ovim �ete izbrisati sve teme na koje nije odgovoreno za vrijeme (broj dana) koje ste izabrali. Ako ne izaberete broj sve teme �e biti izbrisane. Ne�e biti obrisane teme u kojima se glasa niti �e biti obrisane obavijesti. Ove teme �ete morati izbrisati ru�no.';
$lang['Do_Prune'] = 'Pokreni pojednostavljenje';
$lang['All_Forums'] = 'Svi forumi';
$lang['Prune_topics_not_posted'] = 'Pojednostavi teme na koje nije odgovoreno u ovoliko dana';
$lang['Topics_pruned'] = 'Pojednostavljene teme';
$lang['Posts_pruned'] = 'Pojednostavljene poruke';
$lang['Prune_success'] = 'Pojednostavljenje foruma je uspje�no izvr�eno';


//
// Word censor
//
$lang['Words_title'] = 'Cenzurirane rije�i';
$lang['Words_explain'] = 'Odavde mo�ete dodati, izmijeniti i izbrisati rije�i koje �e biti automatski cenzurirane na va�im forumima. Tako�er korisnici se ne�e mo�i registrirati sa korisni�kim imenom koje sadr�i ove rije�i. Jokeri (*) su prihvatljivi u polju re�i, npr. *test* �e se poklopiti sa atestirano, test* �e se poklopiti sa testirano, *test �e se poklopiti sa atest.';
$lang['Word'] = 'Rije�';
$lang['Edit_word_censor'] = 'Izmijeni cenzuru rije�i';
$lang['Replacement'] = 'Zamjena';
$lang['Add_new_word'] = 'Dodaj novu rije�';
$lang['Update_word'] = 'Osvje�i cenzuru rije�i';

$lang['Must_enter_word'] = 'Morate unjeti rije� i njenu zamijenu';
$lang['No_word_selected'] = 'Nije izabrana rije� za izmijenu';

$lang['Word_updated'] = 'Cenzura za izabranu rije� je uspje�no osvje�ena';
$lang['Word_added'] = 'Cenzura rije�i je uspje�no dodana';
$lang['Word_removed'] = 'Cenzura za izabranu rije� je uspje�no izbrisana';

$lang['Click_return_wordadmin'] = 'Kliknite %sovdje%s za povratak na Cenzurirane rije�i';


//
// Mass Email
//
$lang['Mass_email_explain'] = 'Odavde mo�ete poslati email svim korisnicima, ili korisnicima iz odre�ene grupe.  Da to u�inite, email �e biti poslan na prilo�enu administrativnu adresu, sa blind carbon copijom poslatom svim primateljima. Ako �aljete email velikoj grupi ljudi molimo vas da budete strpljivi poslje pritiska na gumb po�alji i nemojte zaustavljati stranicu na pola operacije. Normalno je da pri masovnom slanju emaila operacija traje dugo, i bit �ete obavije�teni kada se izvr�i kompletana skripta';
$lang['Compose'] = 'Napi�i'; 

$lang['Recipients'] = 'Primatelji'; 
$lang['All_users'] = 'Svi korisnici';

$lang['Email_successfull'] = 'Va�a poruka je poslana';
$lang['Click_return_massemail'] = 'Kliknite %sovdje%s za povratak na Masovni email';


//
// Ranks admin
//
$lang['Ranks_title'] = 'Administracija pozicija';
$lang['Ranks_explain'] = 'Koriste�i ovaj formular mo�ete dodati, izmijeniti, pregledati i brisati pozicije. Tako�er mo�ete kreirati proizvoljne pozicije koje mogu biti primjenjene na korisnika preko Administracije korisnika';

$lang['Add_new_rank'] = 'Dodaj novu poziciju';

$lang['Rank_title'] = 'Naziv pozicije';
$lang['Rank_special'] = 'Podesi specijalnu poziciju';
$lang['Rank_minimum'] = 'Minimum poruka';
$lang['Rank_maximum'] = 'Maksimum poruka';
$lang['Rank_image'] = 'Slika pozicije (relativna putanja od phpBB2 root-a)';
$lang['Rank_image_explain'] = 'Ovo koristite za definiranje sli�ice koja podsje�a na poziciju';

$lang['Must_select_rank'] = 'Morate izabrati poziciju';
$lang['No_assigned_rank'] = 'Nije dodjeljena specijalna pozicija';

$lang['Rank_updated'] = 'Pozicija je uspje�no osvje�ena';
$lang['Rank_added'] = 'Pozicija je uspje�no dodana';
$lang['Rank_removed'] = 'Pozicija je uspje�no izbrisana';
$lang['No_update_ranks'] = 'Pozicija je uspje�no obrisana, mada korisni�ki nalozi koji koriste ovu poziciju nisu osvje�eni. Morat �ete ru�no resetirati poziciju takvih naloga';

$lang['Click_return_rankadmin'] = 'Kliknite %sovdje%s za povratak na Administraciju pozicija';


//
// Disallow Username Admin
//
$lang['Disallow_control'] = 'Kontrola zabranjenih imena';
$lang['Disallow_explain'] = 'Odavde mo�ete kontrolirati korisni�ka imena koja se ne mogu koristiti. Zabranjena korisni�ka imena mogu da sadr�e djokere *. Znajte da vam ne�e biti dozvoljeno da odredite bilo koje korisni�ko ime koje je ve� registrirano, pa �ete morati prvo obrisati to ime a tek onda ga zabranite';

$lang['Delete_disallow'] = 'Izbri�i';
$lang['Delete_disallow_title'] = 'Izbri�i zabranjeno korisni�ko ime';
$lang['Delete_disallow_explain'] = 'Mo�ete izbrisati zabranjeno korisni�ko ime tako �to �ete izabrati korisni�ko ime sa ove liste i kliknuti na gumb Izbri�i';

$lang['Add_disallow'] = 'Dodaj';
$lang['Add_disallow_title'] = 'Dodaj zabranjeno korisni�ko ime';
$lang['Add_disallow_explain'] = 'Mo�ete zabraniti korisni�ko ime koriste�i jokera * kao zamjenu bilo kojeg slova';

$lang['No_disallowed'] = 'Nema zabranjenih korisni�kih imena';

$lang['Disallowed_deleted'] = 'Zabranjeno korisni�ko ime je uspje�no izbrisano';
$lang['Disallow_successful'] = 'Zabranjeno korisni�ko ime je uspje�no dodano';
$lang['Disallowed_already'] = 'Ime koje ste unijeli ne mo�e biti zabranjeno. Ve� postoji u listi, postoji u listi cenzuriranih rije�i, ili to korisni�ko ime ve� postoji';

$lang['Click_return_disallowadmin'] = 'Kliknite %sovdje%s za povratak na Kontrolu zabranjenih imena';


//
// Styles Admin
//
$lang['Styles_admin'] = 'Administracija stilova';
$lang['Styles_explain'] = 'Mo�ete dodati, izbrisati i upravljati stilovima (podlogama i temama) dostupnim va�im korisnicima';
$lang['Styles_addnew_explain'] = 'Sljede�a lista sadr�i sve teme koje su dostupne za podloge koje trenutno imate. Stavke u listi jo� uvijek nisu instalirane u phpBB bazu. Da biste instalirali temu jednostavno kliknite na link Install pored stavke';

$lang['Select_template'] = 'Izaberite podlogu';

$lang['Style'] = 'Stil';
$lang['Template'] = 'Podloga';
$lang['Install'] = 'Instaliraj';
$lang['Download'] = 'Preuzmi';

$lang['Edit_theme'] = 'Izmijeni temu';
$lang['Edit_theme_explain'] = 'U formularu ispod mo�ete izmijeniti pode�avanja za izabranu temu';

$lang['Create_theme'] = 'Napravi temu';
$lang['Create_theme_explain'] = 'Koristite donji formular da napravite novu temu za izabranu podlogu. Kada unosite boje (za koje koristite heksadecimalni oblik) ne smijete unijeti prefiks #, npr. CCCCCC je ispravno, a #CCCCCC nije';

$lang['Export_themes'] = 'Izvezi teme';
$lang['Export_explain'] = 'U ovom panelu mo�i �ete izvoziti podatke za izabranu podlogu. Izaberite podlogu iz liste ispod i skripta �e napraviti konfiguracijsku datoteku za temu i poku�ati ju snimiti u izabrani direktorij podloge. Ukoliko nije u mogu�nosti snimiti datoteku ponudit �e vam opciju da ga preuzmete. Da bi skript bio u mogu�nosti da snimi datoteku morate podesiti dozvole za pisanje webserveru za izabrani direktorij sa podlogama. Za vi�e informacija o ovome pogledajte phpBB 2 users guide.';

$lang['Theme_installed'] = 'Izabrana tema je uspje�no instalirana';
$lang['Style_removed'] = 'Izabrani stil je izbrisan iz baze. Da biste u potpunosti izbrisali stil sa va�eg sistema morate izbrisati odgovaraju�i stil iz va�eg direktorija sa podlogama.';
$lang['Theme_info_saved'] = 'Informacija o temi koju ste izabrali je snimljena. Sada bi trebali vratiti dozvolu datoteci theme_info.cfg (i ako je to mogu�e i izabranom direktoriju sa podlogama) na read-only';
$lang['Theme_updated'] = 'Izabrana tema je osvje�ena. Sada bi trebali izvesti pode�avanja za novu temu';
$lang['Theme_created'] = 'Tema je napravljena. Trebali bi izvesti temu u konfiguracijsku datoteku teme zbog sigurnog �uvanja ili upotrebe na nekom drugom mjestu';

$lang['Confirm_delete_style'] = 'Da li ste sigurni da �elite obrisati ovaj stil';

$lang['Download_theme_cfg'] = 'Izvoznik nije mogao snimiti informacijsku datoteku teme. Kliknite na gumb ispod da bi ste preuzeli datoteku sa va�im browserom. Kada ju preuzmete mo�ete ju prebaciti u direktorij koji sadr�i datoteke podloge. Tada mo�ete spakirati datoteke za distribuciju ili koristiti gdje god po�elite';
$lang['No_themes'] = 'Podloga koju ste izabrali nema prikva�enih tema. Da napravite novu temu kliknite na link Napravi na panelu sa lijeve strane';
$lang['No_template_dir'] = 'Ne mogu otvoriti direktorij sa temema. Mo�da je ne�itljiv web serveru ili ne postoji';
$lang['Cannot_remove_style'] = 'Ne mo�ete izbrisati izabrani stil jer je trenutno odre�en za forum. Molim vas da promijenite podrazumijevani stil i poku�ate ponovo.';
$lang['Style_exists'] = 'Ime stila koga ste izabrali ve� postoji, molim vas da se vratite i izaberete drugo ime.';

$lang['Click_return_styleadmin'] = 'Kliknite %sovdje%s za povratak na Administraciju stilova';

$lang['Theme_settings'] = 'Pode�avanje teme';
$lang['Theme_element'] = 'Element teme';
$lang['Simple_name'] = 'Jednostavan naziv';
$lang['Value'] = 'Vrijednost';
$lang['Save_Settings'] = 'Snimi pode�avanja';

$lang['Stylesheet'] = 'CSS Stylesheet';
$lang['Background_image'] = 'Pozadinska slika';
$lang['Background_color'] = 'Boja pozadine';
$lang['Theme_name'] = 'Naziv teme';
$lang['Link_color'] = 'Boja linka';
$lang['Text_color'] = 'Boja teksta';
$lang['VLink_color'] = 'Boja posje�enog linka';
$lang['ALink_color'] = 'Boja aktivnog linka';
$lang['HLink_color'] = 'Boja linka kada je mi� iznad';
$lang['Tr_color1'] = 'Prva boja reda tabele';
$lang['Tr_color2'] = 'Druga boja reda tabele';
$lang['Tr_color3'] = 'Tre�a boja reda tabele';
$lang['Tr_class1'] = 'Prva klasa reda tabele';
$lang['Tr_class2'] = 'Druga klasa reda tabele';
$lang['Tr_class3'] = 'Tre�a klasa reda tabele';
$lang['Th_color1'] = 'Prva boja zaglavlja tabele';
$lang['Th_color2'] = 'Druga boja zaglavlja tabele';
$lang['Th_color3'] = 'Tre�a boja zaglavlja tabele';
$lang['Th_class1'] = 'Prva klasa zaglavlja tabele';
$lang['Th_class2'] = 'Druga klasa zaglavlja tabele';
$lang['Th_class3'] = 'Tre�a klasa zaglavlja tabele';
$lang['Td_color1'] = 'Prva boja �elije tabele';
$lang['Td_color2'] = 'Druga boja �elije tabele';
$lang['Td_color3'] = 'Tre�a boja �elije tabele';
$lang['Td_class1'] = 'Prva klasa �elije tabele';
$lang['Td_class2'] = 'Druga klasa �elije tabele';
$lang['Td_class3'] = 'Tre�a klasa �elije tabele';
$lang['fontface1'] = 'Oblik fonta 1';
$lang['fontface2'] = 'Oblik fonta 2';
$lang['fontface3'] = 'Oblik fonta 3';
$lang['fontsize1'] = 'Veli�ina fonta 1';
$lang['fontsize2'] = 'Veli�ina fonta 2';
$lang['fontsize3'] = 'Veli�ina fonta 3';
$lang['fontcolor1'] = 'Boja fonta 1';
$lang['fontcolor2'] = 'Boja fonta 2';
$lang['fontcolor3'] = 'Boja fonta 3';
$lang['span_class1'] = '�irina klase 1';
$lang['span_class2'] = '�irina klase 2';
$lang['span_class3'] = '�irina klase 3';
$lang['img_poll_size'] = 'Veli�ina slike za glasanje [px]';
$lang['img_pm_size'] = 'Veli�ina statusa privatne poruke [px]';


//
// Install Process
//
$lang['Welcome_install'] = 'Dobrodo�li na phpBB 2 instalaciju';
$lang['Initial_config'] = 'Osnovna konfiguracija';
$lang['DB_config'] = 'Konfiguracija baze';
$lang['Admin_config'] = 'Konfiguracija administratora';
$lang['continue_upgrade'] = 'Kada preuzmete va�u konfiguracijsku datoteku na va�e ra�unalo mo�ete kliknuti na gumb \'Nastavi nadogradnju\' da biste nastavili procesom nadogradnje. Molimo vas da pri�ekate dok se ne zavr�i proces slanja konfiguracijske datoteke i ne zavr�i nadogradnja.';
$lang['upgrade_submit'] = 'Nastavi nadogradnju';

$lang['Installer_Error'] = 'Pojavila se gre�ka prilikom instalacije';
$lang['Previous_Install'] = 'Otkrivena je prethodna instalacija';
$lang['Install_db_error'] = 'Javila se gre�ka pri poku�aju osvje�avanja baze';

$lang['Re_install'] = 'Va�a prethodna instalacija je jo� uvijek aktivna. <br /><br />Ukoliko �elite reinstalirati phpBB 2 kliknite na Yes gumb ispod. Znajte da �ete time uni�titi sve postoje�e podatke, i ne�e biti napravljen povrat! Korisni�ko ime i �ifra administratora koje ste koristili za prijavljivanje na forum bit �e ponovno napravljeni poslje reinstalacije, nijedna druga pode�avanja ne�e biti sa�uvana. <br /><br /> Pa�ljivo razmislite prije nego kliknete na Yes!';

$lang['Inst_Step_0'] = 'Hvala vam �to ste izabrali phpBB 2. Da biste zavr�ili instalaciju molimo vas da popunite detalje ispod koji su obavezni. Znajte da bi baza koju ho�ete instalirati trebala postojati. Ako instalirate u bazu koja koristi ODBC, npr. MS Access trebalo bi prvo kreirate DSN za nju prije nego �to nastavite dalje.';

$lang['Start_Install'] = 'Po�ni instalaciju';
$lang['Finish_Install'] = 'Zavr�i instalaciju';

$lang['Default_lang'] = 'Podrazumijevani jezik na forumu';
$lang['DB_Host'] = 'Ime host servera sa bazom / DSN';
$lang['DB_Name'] = 'Ime va�e baze';
$lang['DB_Username'] = 'Korisni�ko ime baze';
$lang['DB_Password'] = 'Lozinka baze';
$lang['Database'] = 'Va�a baza';
$lang['Install_lang'] = 'Izaberite jezik za instalaciju';
$lang['dbms'] = 'Vrsta baze';
$lang['Table_Prefix'] = 'Prefiks za tabele u bazi';
$lang['Admin_Username'] = 'Korisni�ko ime administratora';
$lang['Admin_Password'] = '�ifra administratora';
$lang['Admin_Password_confirm'] = 'Potvrdite �ifru administratora [ Potvrdi ]';

$lang['Inst_Step_2'] = 'Korisni�ko ime administratora je napravljeno. U ovoj to�ki va�a osnovna instalacija je zavr�ena. Sada �emo vas odvesti na ekran koji �e vam omogu�iti administraciju va�e nove instalacije. Obavezno provjerite detalje u Generalnoj konfiguraciji i izvr�ite obavezne izmjene. Hvala vam �to se izabrali phpBB 2.';

$lang['Unwriteable_config'] = 'Va�u konfiguracijsku datoteku ne mogu presnimiti preko postoje�e. Kopija konfiguracijske datoteke �e biti preuzeta kada kliknete na gumb ispod. Po�aljite ovu datoteku u isti direktorij gdje se nalazi phpBB 2. Kada to napravit prijavite se koriste�i korisni�ko ime i �ifru administratora koje ste prilo�ili u prethodnom formularu i posjetite kontrolni centar (pojavit �e se link na dnu svakog ekrana kada se budete prijavili) da biste provjerili Generalnu konfiguraciju. Hvala vam �to ste izabrali phpBB 2.';
$lang['Download_config'] = 'Preuzmi konfiguraciju';

$lang['ftp_choose'] = 'Izaberite metodu preuzimanja';
$lang['ftp_option'] = '<br />Obzirom da su FTP ekstenzije podr�ane u ovoj verziji PHP bi�e vam dana opcija da prvo probam automatski putem ftp-a smjestit konfiguracijsku datoteku na svoje mjesto.';
$lang['ftp_instructs'] = 'Izabrali ste da po�aljete datoteku putem ftp-a na va� nalog na kome je phpBB 2 automatski. Molimo vas da unesete informacije ispod da biste olak�ali proces. Znajte da bi FTP putanja trebalo biti ista kao i putanja preko ftp-a do va�e phpBB2 instalacije kao da pristupate ftp-u koriste�i bilo koji normalni klijent.';
$lang['ftp_info'] = 'Unesite va�e FTP informacije';
$lang['Attempt_ftp'] = 'Poku�aj da preko ftp-a smjesti� konfiguracijsku datoteku na svoje mjesto';
$lang['Send_file'] = 'Samo po�aljite datoteku meni i ja �u ga ru�no poslati putem ftp-a';
$lang['ftp_path'] = 'FTP putanja do phpBB 2';
$lang['ftp_username'] = 'Va�e korisni�ko ime za FTP';
$lang['ftp_password'] = 'Va�a �ifra za FTP';
$lang['Transfer_config'] = 'Po�ni prenos';
$lang['NoFTP_config'] = 'Poku�aj postavljanja konfiguracijske datoteke putem ftp-a na svoje mjesto nije bio uspje�an. Molimo vas da preuzmete konfiguracijsku datoteku i putem ftp-a ju ru�no po�aljete i postavite na pravo mjesto.';

$lang['Install'] = 'Instaliraj';
$lang['Upgrade'] = 'Nadogradi';


$lang['Install_Method'] = 'Izaberite metodu instalacije';

$lang['Install_No_Ext'] = 'php konfiguracija na va�em serveru ne podr�ava tip baze koji ste izabrali';

$lang['Install_No_PCRE'] = 'phpBB2 zahtjeva Perl-kompatibilan modul regularnih ekstenzija za php koju va�a php konfiguracija izgleda ne podr�ava!';

//
// Toliko za sada ;=)
// -------------------------------------------------

?>