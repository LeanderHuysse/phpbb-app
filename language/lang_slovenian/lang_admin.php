<?php

/***************************************************************************
 *                            lang_admin.php [Slovenian]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
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

/* CONTRIBUTORS
	2002-12-15	Philip M. White (pwhite@mailhaven.com)
		Fixed many minor grammatical mistakes
	Prevod: Nata�a Holy, natasa.holy@guest.arnes.si, www.uciteljska.net; Ladislav Golouh, info@razmerje.com, www.razmerje.com

*/

//
// Format is same as lang_main
//

//
// Modules, this replaces the keys used
// in the modules[][] arrays in each module file
//
$lang['General'] = 'Splo�na Administracija';
$lang['Users'] = 'Administracija uporabnikov';
$lang['Groups'] = 'Administracija skupine';
$lang['Forums'] = 'Administracija forumov';
$lang['Styles'] = 'Administracija za izgled';

$lang['Configuration'] = 'Nastavitve';
$lang['Permissions'] = 'Dovoljenja';
$lang['Manage'] = 'Upravljanje';
$lang['Disallow'] = 'Nedovoljena uporabni�ka imena';
$lang['Prune'] = '�i��enje';
$lang['Mass_Email'] = 'Mno�i�na po�ta';
$lang['Ranks'] = 'Stopnje';
$lang['Smilies'] = 'Sme�ki';
$lang['Ban_Management'] = 'Nadzor izlo�anja'; 
$lang['Word_Censor'] = 'Cenzura besed'; 
$lang['Export'] = 'Izvozi';
$lang['Create_new'] = 'Ustvari'; 
$lang['Add_new'] = 'Dodaj';
$lang['Backup_DB'] = 'Varnostno kopiraj bazo podatkov';
$lang['Restore_DB'] = 'Obnovi bazo podatkov';
 

//
// Index
//
$lang['Admin'] = 'Administracija';
$lang['Not_admin'] = 'Niste administrator tega foruma';
$lang['Welcome_phpBB'] = 'Dobrodo�li v PhpBB forum';
$lang['Admin_intro'] = 'Hvala, da ste izbrali PhpBB za svoj forum. Ta stran vam prika�e hitri pregled razno raznih statistik na tej plo��i. Na to stran se lahko vrnete s klikom na <u>Administratorjev seznam</u>, povezava je na levi strani zgoraj. Za vrnitev nazaj na za�etno stran, klikni seznam forumov, ali klikni logo PhpBB (ali svoj logo, �e si ga zamenjal-a) levo zgoraj. Z drugimi povezavami (linki) na levi strani se pove�e� na vse strani za nadzor foruma. Vsako okno zgoraj prika�e navodila za uporabo orodij.'; 
$lang['Main_index'] = 'Seznam Forumov';
$lang['Forum_stats'] = 'Statistika';
$lang['Admin_Index'] = 'Administratorjev seznam'; 
$lang['Preview_forum'] = 'Predogled Forumov'; 

$lang['Click_return_admin_index'] = 'Klikni %sTukaj%s za vrnitev v Administratorjev seznam';

$lang['Statistic'] = 'Statistika';
$lang['Value'] = 'Vrednost';
$lang['Number_posts'] = '�tevilo prispevkov';
$lang['Posts_per_day'] = '�tevilo prispevkov na dan';
$lang['Number_topics'] = '�tevilo tem';
$lang['Topics_per_day'] = '�tevilo tem na dan';
$lang['Number_users'] = '�tevilo uporabnikov';
$lang['Users_per_day'] = '�tevilo obiskovalcev na dan';
$lang['Board_started'] = 'Forum odprt od'; 
$lang['Avatar_dir_size'] = 'Velikost direktorija podob (sli�ic)'; 
$lang['Database_size'] = 'Velikost baze';
$lang['Gzip_compression'] ='Gzip stiskanje'; 
$lang['Not_available'] = 'Ni dostopno';

$lang['ON'] = 'Da'; // This is for GZip compression 
$lang['OFF'] = 'Ne'; 


//
// DB Utils
// 
$lang['Database_Utilities'] = 'Upravljanje baze podatkov'; 

$lang['Restore'] = 'Obnovi bazo'; 
$lang['Backup'] = 'Varnostna kopija baze'; 
$lang['Restore_explain'] = 'Tabele PhpBB bodo popolnoma obnovljene iz shranjene datoteke. �e va� server to podpira, lahko nalo�ite gzip-stisnjeno besedilno datoteko (text file), ki bo avtomati�no raz�irjena (dekompresirana). <b>OPOZORILO</b>: To dejanje bo prepisalo vse obstoje�e podatke. Obnovitev lahko traja dolgo �asa, zato se, prosimo, ne umikajte s te strani, dokler se ne zaklju�i.'; 
$lang['Backup_explain'] = 'Tu lahko varnostno shranite (back up) vse va�e podatke, ki se nana�ajo na PhpBB. �e imate �e kak�no dodatno tabelo v isti podatkovni bazi s PhpBB-jem, ki bi jo tudi radi varnostno shranili, prosim, vnesite imena tabel, lo�ena z vejicami, v okenca za vnos Dodatne tabele spodaj.  �e va� server podpira stiskanje (gzip-compression), lahko zmanj�ate velikost datoteke pred nalaganjem (download).'; 

$lang['Backup_options'] = 'Mo�nosti pri varnostnem kopiranju'; 
$lang['Start_backup'] = 'Za�ni varnostno kopirati (backup)'; 
$lang['Full_backup'] = 'Varnostno kopiraj VSE (full backup)'; 
$lang['Structure_backup'] = 'Varnostno kopiraj SAMO ogrodje (strukturo)'; 
$lang['Data_backup'] = 'Varnostno kopiraj SAMO podatke (vsebino)'; 
$lang['Additional_tables'] = 'Dodatne tabele';
$lang['Gzip_compress'] = 'Gzip stisnjenje datoteke'; 
$lang['Select_file'] = 'Izberi datoteko';
$lang['Start_Restore'] = 'Za�ni obnavljati (Restore)';

$lang['Restore_success'] = 'Datoteka je uspe�no obnovljena.<br /><br />Va�a plo��a (board) bo v enakem stanju kot je bila pred izvedbo varnostnega kopiranja.'; 
$lang['Backup_download'] = 'Nalaganje se bo za�elo; prosim, po�akajte, da se za�ne.'; 
$lang['Backups_not_supported'] = '�al, toda varnostno kopiranje baze podatkov trenutno ne podpira va�ega sistema baze.'; 

$lang['Restore_Error_uploading'] = 'Napaka pri nalaganju varnostne datoteke';
$lang['Restore_Error_filename'] = 'Te�ava z imenom datoteke; poskusite, prosim, z drugo datoteko.'; 
$lang['Restore_Error_decompress'] = 'Ne morem raz�iriti (decompress) gzip datoteke; nalo�ite, prosim, tekstno razli�ico (plain text version).'; 
$lang['Restore_Error_no_file'] = 'Nobena datoteka ni nalo�ena'; 


//
// Auth pages
//
$lang['Select_a_User'] = 'Izberi uporabnika';
$lang['Select_a_Group'] = 'Izberi skupino';
$lang['Select_a_Forum'] = 'Izberi forum';
$lang['Auth_Control_User'] = 'Dolo�anje pravic uporabnika'; 
$lang['Auth_Control_Group'] = 'Dolo�anje pravic skupine'; 
$lang['Auth_Control_Forum'] = 'Uravnavanje dovoljenj na forumu'; 
$lang['Look_up_User'] = 'Poka�i uporabnika'; 
$lang['Look_up_Group'] = 'Prika�i skupino'; 
$lang['Look_up_Forum'] = 'Prika�i forum'; 

$lang['Group_auth_explain'] = 'Tukaj lahko spreminjate dovoljenja in status moderatorja za vsako uporabni�ko skupino. Pri tem ne pozabite, da spreminjate pravice skupini, dovoljenja posameznega uporabnika lahko ostanejo druga�na, da (npr. odstranjeni moderator) �e vedno npr. lahko vstopa v forume, ipd. V primeru neskladnosti boste opozorjeni.'; 
$lang['User_auth_explain'] = 'Tukaj lahko spreminjate pravice uporabnika in status moderatorja lahko dolo�ite za kateregakoli uporabnika. Ne pozabite, ko spreminjate uporabnikove pravice, lahko pravice skupine �e vedno dovolijo uporabniku vstop v forume. V tem primeru boste opozorjeni.'; 
$lang['Forum_auth_explain'] = 'Tukaj lahko spreminjate nivo dovoljenj (avtorizacije) za posamezni forum. Na razpolago imate preprosto in napredno metodo, napredna vam nudi ve�jo kontrolo nad vsako operacijo foruma. Ne pozabite, da spreminjanje nivoja dovoljenj na forumih (po razdelkih) odlo�a o tem, kateri uporabniki lahko uporabljajo razli�ne funkcije znotraj foruma.'; 

$lang['Simple_mode'] = 'Preprosti na�in'; 
$lang['Advanced_mode'] = 'Napredni na�in'; 
$lang['Moderator_status'] = 'Status moderatorja';

$lang['Allowed_Access'] = 'Dostop dovoljen';
$lang['Disallowed_Access'] = 'Dostop zavrnjen';
$lang['Is_Moderator'] = 'Je Moderator';
$lang['Not_Moderator'] = 'Ni Moderator';

$lang['Conflict_warning'] = 'Opozorilo: neusklajenost dovoljenj (avtorizacij)'; 
$lang['Conflict_access_userauth'] = 'Ta uporabnik ima �e vedno pravice do dostopa za ta forum preko �lanstva v skupini. Lahko spremenite pravice skupine ali pa odstranite tega uporabnika iz skupine, tako mu popolnoma prepre�ite dostop in odvzamete pravice.  Pravice, ki se nana�ajo na skupine (vklju�eni so tudi forumi), so napisane spodaj.'; 
$lang['Conflict_mod_userauth'] = 'Ta uporabnik ima �e vedno moderatorske pravice za ta forum preko �lanstva v skupini. Lahko spremenite pravice skupine ali pa odstranite tega uporabnika iz skupine, tako mu popolnoma prepre�ite dostop in odvzamete pravice. Pravice, ki se nana�ajo na skupine (vklju�eni so tudi forumi), so napisane spodaj.'; 

$lang['Conflict_access_groupauth'] = 'Ta uporabnik (ali uporabniki) imajo �e vedno pravice za dostop na ta forum zaradi nastavljenih dovoljenj za uporabnika. Lahko spremenite dovoljenja za uporabnika, da mu (jim) popolnoma prepre�ite pravice do dostopa. Pravice, ki se nana�ajo na uporabnika (vklju�eni so forumi), so napisane spodaj.'; 
$lang['Conflict_mod_groupauth'] = 'Ta uporabnik (ali uporabniki) imajo �e vedno moderatorske pravice za ta forum zaradi nastavljenih dovoljenj za uporabnika. Lahko spremenite dovoljenja za uporabnika, da mu (jim) popolnoma prepre�ite moderatorske pravice. Pravice, ki se nana�ajo na uporabnika (vklju�eni so forumi), so napisane spodaj.'; 

$lang['Public'] = 'Javno';
$lang['Private'] = 'Zasebno';
$lang['Registered'] = 'Registriran';
$lang['Administrators'] = 'Administratorji';
$lang['Hidden'] = 'Skrito';

// These are displayed in the drop down boxes for advanced
// mode forum auth, try and keep them short!
$lang['Forum_ALL'] = 'VSI'; 
$lang['Forum_REG'] = 'REG';
$lang['Forum_PRIVATE'] = 'ZASEBNO';
$lang['Forum_MOD'] = 'MOD';
$lang['Forum_ADMIN'] = 'ADMIN';

$lang['View'] = 'Vidi'; 
$lang['Read'] = 'Bere'; 
$lang['Post'] = 'Objavlja'; 
$lang['Reply'] = 'Odgovarja'; 
$lang['Edit'] = 'Ureja'; 
$lang['Delete'] = 'Bri�e'; 
$lang['Sticky'] = 'Ne prezri'; 
$lang['Announce'] = 'Obvestilo'; 
$lang['Vote'] = 'Glasuje';
$lang['Pollcreate'] = 'Ustvari anketo'; 

$lang['Permissions'] = 'Dovoljenja'; 
$lang['Simple_Permission'] = 'Osnovna dovoljenja'; 

$lang['User_Level'] = 'Uporabnikov nivo'; 
$lang['Auth_User'] = 'Uporabnik';
$lang['Auth_Admin'] = 'Administrator';
$lang['Group_memberships'] = '�lanstvo skupin/e'; 
$lang['Usergroup_members'] = 'V tej skupini so �lani'; 

$lang['Forum_auth_updated'] = 'Dovoljenja Forumu so posodobljena'; 
$lang['User_auth_updated'] = 'Uporabnikove pravice so posodobljene';
$lang['Group_auth_updated'] = 'Pravice skupino so posodobljene'; 

$lang['Auth_updated'] = 'Dovoljenja so posodobljena'; 
$lang['Click_return_userauth'] = 'Klikni %sTukaj%s za vrnitev k dodeljevanju pravic uporabnika';
$lang['Click_return_groupauth'] = 'Klikni %sTukaj%s za vrnitev k dodeljevanju pravic skupine';
$lang['Click_return_forumauth'] = 'Klikni %sTukaj%s za vrnitev k dodeljevanju pravic za Forum';


//
// Banning
//
$lang['Ban_control'] = 'Nadzor prepovedi';
$lang['Ban_explain'] = 'Tukaj nadzorujete izlo�anje uporabnikov. Uporabnika lahko izlo�ite na enega ali ve� od naslednjih na�inov: da prepoveste dolo�enega uporabnika posamezno ali pa da prepoveste niz IP naslovov oz. ime(na) ponudnika gostitelja. Na tak na�in lahko prepre�ite uporabniku celo �e prihod na glavno stran (seznam forumov) va�e plo��e in ogled. Da bi prepre�ili uporabniku registracijo pod drugim uporabni�kim imenom, lahko dolo�ite prepovedan e-naslov. Vendar SAMO izlo�itev dolo�enega e-naslova ne prepre�i uporabniku prijavljanja in objavljanja. Uporabiti morate enega od prvih dveh na�inov.';
$lang['Ban_explain_warn'] = 'Upo�tevajte, da vnos niza IP naslovov od - do povzro�i pri vseh naslovih med za�etkom in koncem niza dodajanje na prepovedan seznam. Poskusi priklju�evanja bodo avtomati�no oblikovali iskalne kartice (wildcards), da se zmanj�a �tevilo naslovov, ki bodo dodani v bazo podatkov. �e morate zares vnesti niz od - do, poskusite s kratkim, �e bolje, posamezne naslove.';
                                                                 
$lang['Select_username'] = 'Izberi uporabnika';
$lang['Select_ip'] = 'Izberi IP naslov';
$lang['Select_email'] = 'Izberi elektronski naslov';

$lang['Ban_username'] = 'Prepovej enega ali ve� dolo�enih uporabnikov';
$lang['Ban_username_explain'] = 'Ve� uporabnikov naenkrat lahko prepoveste naenkrat tako, da uporabite kombinacijo mi�ke in tipkovnice, dr�ite pritisnjeno tipko SHIFT ali CTRL, ter hkrati z mi�ko ozna�ite uporabnike, za katere �elite, da so izob�eni.';

$lang['Ban_IP'] = 'Prepovej IP naslove ali imena_ra�unalnikov';
$lang['IP_hostname'] = 'IP naslovi ali imena_ra�unalnikov';
$lang['Ban_IP_explain'] = '�e �elite navesti ve� razli�nih IP naslovov ali imen_ra�unalnikov, jih lo�ite z vejicami. �e �elite navesti niz IP naslovov, lo�ite za�etek in konec s pomi�ljajem (-); �e �elite dolo�iti iskalno kartico (wildcard), uporabite zvezdico, (*). Primer: 192.168.1.*.';

$lang['Ban_email'] = 'Prepovej enega ali ve� elektronskih naslovov';
$lang['Ban_email_explain'] = '�e �elite navesti ve� razli�nih elektronskih naslovov, jih lo�ite z vejicami. �e �elite dolo�iti iskalno kartico (wildcard), uporabite *. Primer: *@hotmail.com';

$lang['Unban_username'] = 'Prekli�i prepoved enega ali ve� izbranih uporabnikov';
$lang['Unban_username_explain'] = 'Ve� uporabnikom prekli�ete prepoved naenkrat tako, da dr�ite pritisnjeno tipko SHIFT ali CTRL, ter hkrati z mi�ko ozna�ite uporabnike, za katere �elite, da so spet dovoljeni.';

$lang['Unban_IP'] = 'Prekli�i prepoved enega ali ve� IP naslovov';
$lang['Unban_IP_explain'] = 'Ve� IP naslovom prekli�ete prepoved naenkrat tako, da dr�ite pritisnjeno tipko SHIFT ali CTRL ter hkrati z mi�ko ozna�ite naslove, za katere �elite, da so spet dovoljeni';

$lang['Unban_email'] = 'Prekli�i prepoved enega ali ve� elektronskih naslovov';
$lang['Unban_email_explain'] = 'Ve� elektronskim naslovom prekli�ete prepoved naenkrat tako, da dr�ite pritisnjeno tipko SHIFT ali CTRL ter hkrati z mi�ko ozna�ite naslove, za katere �elite, da so spet dovoljeni';

$lang['No_banned_users'] = 'Ni izklju�enih uporabnikov';
$lang['No_banned_ip'] = 'Ni izklju�enih IP naslovov';
$lang['No_banned_email'] = 'Ni izklju�enih elektronskih naslovov';

$lang['Ban_update_sucessful'] = 'Seznam izklju�itev je uspe�no posodobljen';
$lang['Click_return_banadmin'] = 'Klikni %sTukaj%s za vrnitev na Nadzor prepovedi';


//
// Configuration
//
$lang['General_Config'] = 'Splo�no oblikovanje';
$lang['Config_explain'] = 'Spodnji obrazec vam omogo�a prilagoditi splo�ne nastavitve va�ega foruma. Za uporabnikove in forumove nastavitve uporabite povezave na levi strani zaslona.'; 

$lang['Click_return_config'] = 'Klikni %sTukaj%s za vrnitev na Splo�no oblikovanje';

$lang['General_settings'] = 'Splo�ne nastavitve nadzorne plo��e';
$lang['Server_name'] = 'Domena_ime';
$lang['Server_name_explain'] = 'Ime Domene, na kateri ta forum te�e';
$lang['Script_path'] = 'Pot do skript (datotek)';
$lang['Script_path_explain'] = 'Pot, kjer so datoteke PhpBB2 od domene naprej';
$lang['Server_port'] = 'Vrata na stre�niku';
$lang['Server_port_explain'] = 'Vrata, skozi katera prena�a va� stre�nik, obi�ajno 80. Spremeni samo, �e je druga�e';
$lang['Site_name'] = 'Ime strani';
$lang['Site_desc'] = 'Opis strani';
$lang['Board_disable'] = 'Izklju�i dostop';
$lang['Board_disable_explain'] = 'Tukaj forum za uporabnike zaprete. Ne odjavite se, dokler je nedostopen, ker se ne bi mogli spet prijaviti!';
$lang['Acct_activation'] = 'Ra�un uporabnika posebej aktivira';
$lang['Acc_None'] = 'Nih�e'; // These three entries are the type of activation
$lang['Acc_User'] = 'Uporabnik';
$lang['Acc_Admin'] = 'Administrator';

$lang['Abilities_settings'] = 'Osnovne nastavitve za uporabnika in za forum';
$lang['Max_poll_options'] = 'Najve�je �tevilo izbir za anketo';
$lang['Flood_Interval'] = 'Presledek po�iljanja';
$lang['Flood_Interval_explain'] = '�tevilo sekund, kolikor naj uporabnik po�aka med dvema objavama'; 
$lang['Board_email_form'] = 'E-po�ta uporabnikov preko plo��e';
$lang['Board_email_form_explain'] = 'Uporabniki si lahko po�iljajo elektronska sporo�ila (email) preko plo��e foruma';
$lang['Topics_per_page'] = '�tevilo tem na prikazani strani';
$lang['Posts_per_page'] = '�tevilo prispevkov na prikazani strani';
$lang['Hot_threshold'] = '�tevilo objav za prikaz priljubljena tema';
$lang['Default_style'] = 'Privzeta grafi�na podoba';
$lang['Override_style'] = 'Prekrij uporabnikovo nastavitev';
$lang['Override_style_explain'] = 'Zamenjava uporabnikove nastavitve s privzeto';
$lang['Default_language'] = 'Privzeti jezik';
$lang['Date_format'] = 'Oblika datuma';
$lang['System_timezone'] = '�asovni pas';
$lang['Enable_gzip'] = 'Omogo�i Gzip stiskanje';
$lang['Enable_prune'] = 'Omogo�i samodejno �i��enje foruma';
$lang['Allow_HTML'] = 'Dovoli HTML';
$lang['Allow_BBCode'] = 'Dovoli BBCode';
$lang['Allowed_tags'] = 'Dovoljene HTML oznake';
$lang['Allowed_tags_explain'] = 'Lo�ite oznake z vejicami';
$lang['Allow_smilies'] = 'Dovoli Sme�ke';
$lang['Smilies_path'] = 'Pot do Sme�kov';
$lang['Smilies_path_explain'] = 'Pot iz va�ega PhpBB korenskega imenika, npr. images/smiles';
$lang['Allow_sig'] = 'Dovoli podpise';
$lang['Max_sig_length'] = 'Najdalj�a dol�ina podpisa';
$lang['Max_sig_length_explain'] = 'Najve�je �tevilo �rk v podpisu';
$lang['Allow_name_change'] = 'Dovoli uporabnikove spremembe';

$lang['Avatar_settings'] = 'Nastavitve podob';
$lang['Allow_local'] = 'Omogo�i galerijo podob';
$lang['Allow_remote'] = 'Omogo�i oddaljene podobe';
$lang['Allow_remote_explain'] = 'Podobe so povezane z drugo spletno stranjo';
$lang['Allow_upload'] = 'Omogo�i nalaganje podob';
$lang['Max_filesize'] = 'Najve�ja velikost datoteke podobe';
$lang['Max_filesize_explain'] = 'Za nalo�ene datoteke podob';
$lang['Max_avatar_size'] = 'Najve�ja dimenzija podob';
$lang['Max_avatar_size_explain'] = '(Vi�ina x �irina v pikslih)';
$lang['Avatar_storage_path'] = 'Pot do shrambe podob';
$lang['Avatar_storage_path_explain'] = 'Pot od korenskega imenika PhpBB do shranjenih//////////////// podob, npr. images/avatars';
$lang['Avatar_gallery_path'] = 'Pot do galerije podob';
$lang['Avatar_gallery_path_explain'] = 'Pot od korenskega imenika PhpBB do prednalo�ene galerije podob, npr. images/avatars/gallery';

$lang['COPPA_settings'] = 'COPPA Nastavitve';
$lang['COPPA_fax'] = 'COPPA �t. faksa';
$lang['COPPA_mail'] = 'COPPA po�tni naslov';
$lang['COPPA_mail_explain'] = 'To je po�tni naslov, na katerega bodo star�i poslali COPPA obrazec za registracijo';

$lang['Email_settings'] = 'Nastavitve za elektronsko po�to';
$lang['Admin_email'] = 'Administratorjev elektronski naslov';
$lang['Email_sig'] = 'E-po�tni podpis';
$lang['Email_sig_explain'] = 'Besedilo bo pripeto na vsa poslana elektronska sporo�ila iz tega foruma';
$lang['Use_SMTP'] = 'Uporabi SMTP stre�nik za elektronsko po�to';
$lang['Use_SMTP_explain'] = 'Ozna�i Da, �e �eli� ali mora� poslati po�to preko imenovanega stre�nika namesto lokalne po�tne funkcije';
$lang['SMTP_server'] = 'Naslov SMTP stre�nika';
$lang['SMTP_username'] = 'SMTP Uporabni�ko ime';
$lang['SMTP_username_explain'] = 'Samo �e va� SMTP stre�nik to zahteva, vnesite uporabni�ko ime';
$lang['SMTP_password'] = 'SMTP geslo';
$lang['SMTP_password_explain'] = 'Samo �e va� SMTP stre�nik to zahteva, vnesite geslo';

$lang['Disable_privmsg'] = 'Zasebna sporo�ila';
$lang['Inbox_limits'] = 'Najve� sporo�il v mapi Prejeto';
$lang['Sentbox_limits'] = 'Najve� sporo�il v mapi Poslano';
$lang['Savebox_limits'] = 'Najve� sporo�il v mapi Shranjeno';

$lang['Cookie_settings'] = 'Nastavitve za pi�kotke'; 
$lang['Cookie_settings_explain'] = 'Te podrobnosti dolo�ajo, kako bodo pi�kotki poslani uporabnikovemu brskalniku. V ve�ini primerov bodo privzete vrednosti nastavitve za pi�kotke zadostovale, �e pa jih morate spreminjati, opravite to previdno -- nepravilne nastavitve prepre�ijo uporabnikom prijavljanje.';
$lang['Cookie_domain'] = 'Domena za pi�kotek';
$lang['Cookie_name'] = 'Ime pi�kotka';
$lang['Cookie_path'] = 'Pot pi�kotka';
$lang['Cookie_secure'] = 'Za��ita pi�kotka';
$lang['Cookie_secure_explain'] = '�e va� server te�e preko SSL, nastavi na Omogo�eno, druga�e pusti kot Ni omogo�eno';
$lang['Session_length'] = 'Dol�ina seje [ sekunde ]';


//
// Forum Management
//
$lang['Forum_admin'] = 'Administracija foruma';
$lang['Forum_admin_explain'] = 'S te plo��e lahko dodajate, bri�ete, urejate, preurejate in ponovno usklajujete zvrsti (kategorije) in forume';
$lang['Edit_forum'] = 'Uredi forum';
$lang['Create_forum'] = 'Ustvari nov forum';
$lang['Create_category'] = 'Ustvari novo zvrst (kategorijo)';
$lang['Remove'] = 'Odstrani';
$lang['Action'] = 'Dejanje';
$lang['Update_order'] = 'Posodobi zaporedje';
$lang['Config_updated'] = 'Oblika foruma je uspe�no posodobljena';
$lang['Edit'] = 'Uredi';
$lang['Delete'] = 'Izbri�i';
$lang['Move_up'] = 'Premakni GOR';
$lang['Move_down'] = 'Premakni DOL';
$lang['Resync'] = 'Znova uskladi';
$lang['No_mode'] = 'Noben na�in ni nastavljen';
$lang['Forum_edit_delete_explain'] = 'Obrazec spodaj vam omogo�a, da si priredite vse splo�ne mo�nosti plo��e. Za uporabnika in oblikovanje foruma uporabite ustrezne povezave na levi strani.';

$lang['Move_contents'] = 'Premakni vse vsebine';
$lang['Forum_delete'] = 'Izbri�i forum';
$lang['Forum_delete_explain'] = 'Obrazec spodaj vam omogo�a brisanje foruma (ali kategorije) in izberite, kam boste odlo�ili vse teme (ali forume), ki jih vsebujejo.';

$lang['Status_locked'] = 'Zaklenjeno';
$lang['Status_unlocked'] = 'Odklenjeno';
$lang['Forum_settings'] = 'Splo�ne nastavitve Foruma';
$lang['Forum_name'] = 'Ime Foruma';
$lang['Forum_desc'] = 'Opis';
$lang['Forum_status'] = 'Stanje Foruma';
$lang['Forum_pruning'] = 'Samodejno �i��enje, brisanje';

$lang['prune_freq'] = 'Preglej starost tem vsakih';
$lang['prune_days'] = 'Odstrani teme, v katere ni bilo �e ni� objavljeno v �asu';
$lang['Set_prune_data'] = 'Nastavili ste samodejno �i��enje za ta forum, vendar niste nastavili frekvence (pogostnosti) ali �tevila dni za �i��enje. Prosim, vrnite se in to naredite.';

$lang['Move_and_Delete'] = 'Premakni in odstrani';

$lang['Delete_all_posts'] = 'Izbri�i vse prispevke';
$lang['Nowhere_to_move'] = 'Nimam kam premakniti'; 

$lang['Edit_Category'] = 'Uredi kategorijo';
$lang['Edit_Category_explain'] = 'Uporabi ta obrazec za spremembo imena kategorije.';

$lang['Forums_updated'] = 'Forum in prispevki so bili uspe�no posodobljeni';

$lang['Must_delete_forums'] = 'Prej je treba odstraniti vse forume, �ele  potem lahko izbri�ete to kategorijo';

$lang['Click_return_forumadmin'] = 'Klikni %sTukaj%s za vrnitev na Administracijo foruma';


//
// Smiley Management
//
$lang['smiley_title'] = 'Pripomo�ki za urejanje Sme�kov';
$lang['smile_desc'] = 'Na tej strani lahko dodajate, odstranjujete ali urejate �ustvene ikone in Sme�ke, ki jih lahko va�i uporabniki uporabljajo v prispevkih in zasebnih sporo�ilih.';

$lang['smiley_config'] = 'Nastavitev Sme�kov';
$lang['smiley_code'] = 'Sme�kova koda';
$lang['smiley_url'] = 'Sme�kova datoteka';
$lang['smiley_emot'] = 'Sme�kovo �ustvo';
$lang['smile_add'] = 'Dodaj novega Sme�ka';
$lang['Smile'] = 'Nasmeh';
$lang['Emotion'] = '�ustvo';

$lang['Select_pak'] = 'Izberi paket (.pak) datoteko';
$lang['replace_existing'] = 'Zamenjaj tega Sme�ka';
$lang['keep_existing'] = 'Obdr�i tega Sme�ka';
$lang['smiley_import_inst'] = 'Odzipati morate datoteko in nalo�iti vse datoteke v ustrezni imenik Sme�kov, da jih boste namestili. Na tem obrazcu dolo�ite pravilne podatke, da boste uvozili paket Sme�kov.';
$lang['smiley_import'] = 'Uvoz paketa Sme�kov';
$lang['choose_smile_pak'] = 'Izberite paket Sme�kov v .pak datoteki';
$lang['import'] = 'Uvozi Sme�ke';
$lang['smile_conflicts'] = 'Kaj storiti v primeru spora?';
$lang['del_existing_smileys'] = 'Odstrani obstoje�e Sme�ke pred uvozom';
$lang['import_smile_pack'] = 'Uvozi paket Sme�kov';
$lang['export_smile_pack'] = 'Ustvari paket Sme�kov';
$lang['export_smiles'] = 'Da bi ustvarili paket Sme�kov iz trenutno name��enih sme�kov, kliknite %sTukaj%s za prenos .pak datoteke sme�kov. Tako ustvarjena datoteka zagotovo ustvari kon�nico .pak datoteke.  Nato ustvarite Zip datoteko, ki naj vsebuje vse va�e sli�ice Sme�kov plus to .pak oblikovano datoteko.';

$lang['smiley_add_success'] = 'Sme�ko je uspe�no dodan';
$lang['smiley_edit_success'] = 'Sme�ko je uspe�no posodobljen';
$lang['smiley_import_success'] = 'Paket Sme�kov je bil uspe�no uvo�en!';
$lang['smiley_del_success'] = 'Sme�ko je uspe�no odstranjen';
$lang['Click_return_smileadmin'] = 'Klikni %sTukaj%s za vrnitev na Nastavitev Sme�kov';


//
// User Management
//
$lang['User_admin'] = 'Administracija uporabnikov';
$lang['User_admin_explain'] = 'Tu lahko spreminjate podatke in nekatere mo�nosti o uporabnikih. Za spreminjanje uporabnikovih pravic uporabite sistem za dovoljenja uporabnika in skupine.';

$lang['Look_up_user'] = 'Prika�i uporabnika';

$lang['Admin_user_fail'] = 'Uporabnikov profil ni posodobljen.';
$lang['Admin_user_updated'] = 'Uporabnikov profil je uspe�no posodobljen.';
$lang['Click_return_useradmin'] = 'Klikni %sTukaj%s za vrnitev v Administracijo uporabnikov';

$lang['User_delete'] = 'Izbri�i tega uporabnika';
$lang['User_delete_explain'] = 'Klikni tukaj za odstranitev tega uporabnika; tega ne boste mogli preklicati.';
$lang['User_deleted'] = 'Uporabnik je uspe�no izbrisan.';

$lang['User_status'] = 'Je aktiven Uporabnik';
$lang['User_allowpm'] = 'Lahko po�ilja zasebna sporo�ila';
$lang['User_allowavatar'] = 'Lahko prika�e podobo';

$lang['Admin_avatar_explain'] = 'Tu lahko vidite in izbri�ete uporabnikovo trenutno podobo.';

$lang['User_special'] = 'Posebna - samo adminstratorjeva polja';
$lang['User_special_explain'] = 'Teh polj uporabniki ne morejo prirejati. Tu lahko nastavite njihov polo�aj in druge mo�nosti, ki jih ne morejo sami.';


//
// Group Management
//
$lang['Group_administration'] = 'Administracija skupin';
$lang['Group_admin_explain'] = 'Od tu lahko skrbite za vse uporabni�ke skupine. Lahko odstranjujete, ustvarjate in urejate obstoje�e skupine. Izbirate lahko moderatorje, povezujete status odprtih/zaprtih skupin in dolo�ite ime skupine ter opis.';
$lang['Error_updating_groups'] = 'Napaka med posodabljanjem skupin';
$lang['Updated_group'] = 'Skupina je uspe�no posodobljena';
$lang['Added_new_group'] = 'Nova skupina je uspe�no ustvarjena';
$lang['Deleted_group'] = 'Skupina je uspe�no izbrisana';
$lang['New_group'] = 'Ustvari novo skupino';
$lang['Edit_group'] = 'Uredi skupino';
$lang['group_name'] = 'Ime skupine';
$lang['group_description'] = 'Opis skupine';
$lang['group_moderator'] = 'Moderator skupine';
$lang['group_status'] = 'Status skupine';
$lang['group_open'] = 'Odprta skupina';
$lang['group_closed'] = 'Zaprta skupina';
$lang['group_hidden'] = 'Skrita skupina';
$lang['group_delete'] = 'Odstrani skupino';
$lang['group_delete_check'] = 'Odstrani to skupino';
$lang['submit_group_changes'] = 'Po�lji spremembe';
$lang['reset_group_changes'] = 'Razveljavi spremembe';
$lang['No_group_name'] = 'Za to skupino morate dolo�iti ime';
$lang['No_group_moderator'] = 'Za to skupino morate dolo�iti moderatorja';
$lang['No_group_mode'] = 'Dolo�ite na�in: naj bo odprta ali zaprta skupina?';
$lang['No_group_action'] = 'Ni�esar niste izbrali';
$lang['delete_group_moderator'] = 'Naj prej�njega moderatorja odstranim?';                                                                  
$lang['delete_moderator_explain'] = '�e spreminjate moderatorja skupine, v tem okencu ozna�ite odstranitev prej�njega moderatorja <b>iz skupine</b>.  �e ne ozna�ite, bo uporabnik postal obi�ajen �lan skupine.';
$lang['Click_return_groupsadmin'] = 'Klikni %sTukaj%s za vrnitev na Administracijo skupin.';
$lang['Select_group'] = 'Izberi skupino';
$lang['Look_up_group'] = 'Prika�i skupino';


//
// Prune Administration
//
$lang['Forum_Prune'] = '�i��enje foruma';
$lang['Forum_Prune_explain'] = 'S �i��enjem se bo odstranila katerakoli tema, za katero ni bilo nobenih prispevkov v �tevilu dni, ki jih dolo�ite. �e ne boste vstavili �tevilke, <b>bodo izbrisane vse teme</b>. Ne bodo pa odstranjene teme, v katerih te�e anketa; prav tako ne bodo odstranjena Obvestila. Te teme boste morali odstraniti ro�no.';
$lang['Do_Prune'] = 'O�isti';
$lang['All_Forums'] = 'Vse forume';
$lang['Prune_topics_not_posted'] = 'O�isti teme brez odgovorov v toliko dneh:';
$lang['Topics_pruned'] = 'Teme odstranjene';
$lang['Posts_pruned'] = 'Prispevki odstranjeni';
$lang['Prune_success'] = 'Forumi so o�i��eni';


//
// Word censor
//
$lang['Words_title'] = 'Cenzuriranje besed';
$lang['Words_explain'] = 'S te plo��e lahko dodajate, urejate in bri�ete besede, ki bodo avtomati�no nadzorovane na va�ih forumih. Poleg tega se ljudje ne bodo mogli registrirati z uporabni�kim imenom, ki bi vsebovalo te besede. Iskalne kartice (wildcards) (*) i��ejo tudi v besednem polju. Na primer: *mest* bo zadeval tudi neumesten, mest* prepove tudi mesten, *mest bo izlo�il pomest.';
$lang['Word'] = 'Beseda';
$lang['Edit_word_censor'] = 'Uredi cenzurirane besede';
$lang['Replacement'] = 'Zamenjaj';
$lang['Add_new_word'] = 'Dodaj novo besedo';
$lang['Update_word'] = 'Posodobi cenzurirane besede';

$lang['Must_enter_word'] = 'Vnesti morate besedo in njeno zamenjavo';
$lang['No_word_selected'] = 'Nobena beseda ni izbrana za urejanje';

$lang['Word_updated'] = 'Izbrana cenzurirana beseda je uspe�no posodobljena.';
$lang['Word_added'] = 'Cenzurirana beseda je uspe�no dodana';
$lang['Word_removed'] = 'Cenzurirana beseda je uspe�no odstranjena';

$lang['Click_return_wordadmin'] = 'Klini %sTukaj%s za vrnitev na Administracijo cenzure';


//
// Mass Email
//
$lang['Mass_email_explain'] = 'Tukaj lahko po�ljete sporo�ilo bodisi vsem uporabnikom, ali pa samo dolo�eni skupini uporabnikov. Sporo�ilo bo odposlano na shranjene elektronske naslove kot enaka kopija za vse prejemnike. �e po�iljate sporo�ilo veliki skupini ljudi, bodite prosim potrpe�ljivi potem, ko po�ljete. Nikar ne ustavljajte (ne spreminjajte) strani na pol poti. Normalno za mno�i�no po�to je, da traja dalj�i �as. Obve��eni boste, ko bo proces zaklju�en.';
$lang['Compose'] = 'Sestavi sporo�ilo'; 

$lang['Recipients'] = 'Prejemniki'; 
$lang['All_users'] = 'Vsi uporabniki';

$lang['Email_successfull'] = 'Va�e sporo�ilo je bilo poslano';
$lang['Click_return_massemail'] = 'Kliknite %sTukaj%s za vrnitev na obrazec za Mno�i�no po�to';


//
// Ranks admin
//
$lang['Ranks_title'] = 'Administracija zaslu�nosti';
$lang['Ranks_explain'] = 'S pomo�jo tega obrazca lahko dodajate, urejate, vidite ali bri�ete uporabni�ke stopnje. Lahko ustvarite poljubne stopnje, ki jih posvetite uporabniku in z lahkoto upravljate preko Administracije uporabnikov.';

$lang['Add_new_rank'] = 'Dodaj novo stopnjo';

$lang['Rank_title'] = 'Naziv stopnje';
$lang['Rank_special'] = 'Postavi kot posebno stopnjo';
$lang['Rank_minimum'] = 'Najmanj objav';
$lang['Rank_maximum'] = 'Najve� objav';
$lang['Rank_image'] = 'Slika za stopnjo (pot od PhpBB2 korenskega direktorija naprej)';
$lang['Rank_image_explain'] = 'Uporabi to, da dolo�i� majhno sli�ico, ki bo povezana za ozna�evanje stopnje';

$lang['Must_select_rank'] = 'Izbrati morate stopnjo';
$lang['No_assigned_rank'] = 'Nobena posebna stopnja ni ozna�ena';

$lang['Rank_updated'] = 'Stopnja je bila uspe�no posodobljena';
$lang['Rank_added'] = 'Stopnja je bila uspe�no dodana';
$lang['Rank_removed'] = 'Stopnja je bila uspe�no izbrisana';
$lang['No_update_ranks'] = 'Stopnja je bila uspe�no izbrisana. Pri uporabnikih, ki so to stopnjo imeli, se sprememba ne pozna. Tem uporabnikom morate stopnjo popraviti ro�no na njihovih ra�unih!';

$lang['Click_return_rankadmin'] = 'Klikni %sTukaj%s za vrnitev v Urejanje zaslu�nosti';

              
//
// Disallow Username Admin
//
$lang['Disallow_control'] = 'Nadzor nedovoljenih uporabni�kih imen';
$lang['Disallow_explain'] = 'Tukaj lahko preverjate uporabni�ka imena, ki ne bodo dovoljena. Nedovoljena imena lahko navedete kot iskalno kartico (wildcard), ki vsebuje zvezdico (*). Vedite, da �e registriranih uporabni�kih imen ne morete dolo�iti za prepoved. V takem primeru morate najprej izbrisati to ime uporabnika, �ele nato lahko ime prepoveste.';

$lang['Delete_disallow'] = 'Izbri�i';
$lang['Delete_disallow_title'] = 'Odstrani nedovoljeno uporabni�ko ime';
$lang['Delete_disallow_explain'] = 'Neza�eleno uporabni�ko ime lahko odstranite tako, da ga izberete iz seznama in kliknete Po�lji';

$lang['Add_disallow'] = 'Dodaj';
$lang['Add_disallow_title'] = 'Dodaj nedovoljeno uporabni�ko ime';
$lang['Add_disallow_explain'] = 'Uporabni�ko ime lahko prepoveste z uporabo iskalne kartice (wildcard) z zvezdico, ki nadomesti katerokoli �rko';

$lang['No_disallowed'] = 'Ni nedovoljenih uporabni�kih imen';

$lang['Disallowed_deleted'] = 'Nedovoljeno uporabni�ko ime je bilo uspe�no odstranjeno';
$lang['Disallow_successful'] = 'Nedovoljeno uporabni�ko ime je bilo uspe�no dodano';
$lang['Disallowed_already'] = 'Uporabni�kega imena, ki ste ga vnesli, ne morete prepovedati. Bodisi ime �e obstaja na tem seznamu, bodisi je �e navedeno na seznamu cenzuriranih besed ali pa je prisotno kot obstoje�e uporabni�ko ime.';

$lang['Click_return_disallowadmin'] = 'Klikni %sTukaj%s za vrnitev na urejanje Nedovoljenih Uporabni�kih imen';
                                                  

//
// Styles Admin
//
$lang['Styles_admin'] = 'Administracija izgleda';
$lang['Styles_explain'] = 'Na tej strani lahko dodajate, odstranjujete in urejate sloge (predloge in teme), ki so na voljo va�im uporabnikom.';
$lang['Styles_addnew_explain'] = 'Naslednji seznam vsebuje vse teme, ki ustrezajo kot predloge in jih imate trenutno na razpolago. Postavke na tem seznamu �e niso bile name��ene v PhpBB bazo podatkov. Za namestitev teme preprosto kliknite instalacijsko povezavo poleg vnosa.';

$lang['Select_template'] = 'Izberite Predlogo';

$lang['Style'] = 'Slog';
$lang['Template'] = 'Predloga';
$lang['Install'] = 'Namesti';
$lang['Download'] = 'Prenesi';

$lang['Edit_theme'] = 'Uredi temo';
$lang['Edit_theme_explain'] = 'V obrazcu spodaj lahko urejate nastavitve za izbrano temo';

$lang['Create_theme'] = 'Ustvari temo';
$lang['Create_theme_explain'] = 'Uporabi spodnji obrazec za ustvarjanje nove teme v izbrani predlogi. Ko vna�ate barve (vnos mora biti v �estmestnem zapisu), ne smete vklju�evati za�etnega znaka #, npr. CCCCCC je veljavno, #CCCCCC ni veljavno';

$lang['Export_themes'] = 'Izvozi Teme';
$lang['Export_explain'] = 'V tej plo��i lahko izvozite podatke za teme za neko izbrano predlogo. Izberite predlogo iz spodnjega seznama in skripte bodo ustvarile datoteko oblikovanja teme in poskusile shraniti v izbrani imenik za predloge. �e se datoteka tako ne shrani sama, se vam bo prikazala mo�nost, da jo prenesete (download). V zaporedju skript za shranjevanje datoteke morate napisati dostop na spletni stre�nik za izbrano predlogo dir. Za ve� informacij si poglejte v PhpBB2 uporabni�kih navodilih (phpBB 2 Users guide).';

$lang['Theme_installed'] = 'Izbrana tema je bila uspe�no name��ena';
$lang['Style_removed'] = 'Izbrani slog je bil odstranjen iz baze podatkov. Za popolno odstranitev tega sloga iz va�ega sistema morate izbrisati ustrezni slog iz va�ega direktorija predlog.';
$lang['Theme_info_saved'] = 'Informacije za izbrano temo kot predlogo so bile shranjene. Sedaj morate vrniti dovoljenja na samo-za-branje v datoteki theme__info.cfg (seveda morate pravilno izbrati imenik predlog, template directory)';
$lang['Theme_updated'] = 'Izbrana tema je bila posodobljena. Sedaj �e izvozite nove nastavitve'; 
$lang['Theme_created'] = 'Tema je bila ustvarjena. Sedaj �e izvozite temo in datoteko oblikovanja teme za varno shranjevanje ali za uporabo �e kje drugje.';  

$lang['Confirm_delete_style'] = 'Ali ste prepri�ani, da �elite izbrisati ta stil?'; 

$lang['Download_theme_cfg'] = 'Izvozni filter ne more ustvariti datoteke za informacijo teme. Kliknite na spodnji gumb, da prenesete datoteko z brskalnikom. Ko ste jo enkrat prenesli, jo lahko premaknete v imenik, ki vsebuje datoteke predloge. Potem lahko datoteke pakirate za distribucijo za uporabo kje drugje, �e boste to hoteli.';
$lang['No_themes'] = 'Predloga, ki ste jo izbrali, nima nobene prilepljene teme. Da bi ustvarili novo temo, kliknite na povezavo Ustvari novo na levi strani plo��e'; 
$lang['No_template_dir'] = 'Ne morem odpreti imenika s predlogami. Mogo�e ne obstaja, ali ni dosegljiv s spletnim stre�nikom'; 
$lang['Cannot_remove_style'] = 'Ne morete odstraniti izbranega sloga, �e je trenutno ozna�en kot privzeti slog foruma. Prosim, zamenjajte privzeti slog in poskusite znova.'; 
$lang['Style_exists'] = 'Ime sloga, ki ste ga izbrali, �e obstaja. Prosim, vrnite se nazaj in izberite drugo ime.'; 

$lang['Click_return_styleadmin'] = 'Kliknite %sTukaj% za vrnitev v Administracijo izgleda'; 

$lang['Theme_settings'] = 'Nastavitve tem'; 
$lang['Theme_element'] = 'Element teme';  
$lang['Simple_name'] = 'Preprosto ime'; 
$lang['Value'] = 'Vrednost'; 
$lang['Save_Settings'] = 'Shrani nastavitve';  

$lang['Stylesheet'] = 'CSS oblika sloga'; 
$lang['Background_image'] = 'Slika za ozadje'; 
$lang['Background_color'] = 'Barva ozadja'; 
$lang['Theme_name'] = 'Ime teme'; 
$lang['Link_color'] = 'Barva povezav (linkov)';  
$lang['Text_color'] = 'Barva pisave';  
$lang['VLink_color'] = 'Barva obiskanih povezav';  
$lang['ALink_color'] = 'Barva aktivne povezave';  
$lang['HLink_color'] = 'Barva lebde�e povezave';  
$lang['Tr_color1'] = 'Barva Vrstice tabele 1';  
$lang['Tr_color2'] = 'Barva Vrstice tabele 2';  
$lang['Tr_color3'] = 'Barva Vrstice tabele 3';  
$lang['Tr_class1'] = 'Razred Vrstice tabele 1'; 
$lang['Tr_class2'] = 'Razred Vrstice tabele 2'; 
$lang['Tr_class3'] = 'Razred Vrstice tabele 3';  
$lang['Th_color1'] = 'Barva glave tabele 1';  
$lang['Th_color2'] = 'Barva glave tabele 2';  
$lang['Th_color3'] = 'Barva glave tabele 3';  
$lang['Th_class1'] = 'Razred glave tabele 1';  
$lang['Th_class2'] = 'Razred glave tabele 2'; 
$lang['Th_class3'] = 'Razred glave tabele 3'; 
$lang['Td_color1'] = 'Barva celice tabele 1'; 
$lang['Td_color2'] = 'Barva celice tabele 2'; 
$lang['Td_color3'] = 'Barva celice tabele 3'; 
$lang['Td_class1'] = 'Razred celice tabele 1'; 
$lang['Td_class2'] = 'Razred celice tabele 2'; 
$lang['Td_class3'] = 'Razred celice tabele 3'; 
$lang['fontface1'] = 'Videz pisave 1';   
$lang['fontface2'] = 'Videz pisave 2';   
$lang['fontface3'] = 'Videz pisave 3';   
$lang['fontsize1'] = 'Velikost pisave 1'; 
$lang['fontsize2'] = 'Velikost pisave 2'; 
$lang['fontsize3'] = 'Velikost pisave 3'; 
$lang['fontcolor1'] = 'Barva pisave 1'; 
$lang['fontcolor2'] = 'Barva pisave 2'; 
$lang['fontcolor3'] = 'Barva pisave 3'; 
$lang['span_class1'] = 'Razmik razred 1';  
$lang['span_class2'] = 'Razmik razred 2';  
$lang['span_class3'] = 'Razmik razred 3';  
$lang['img_poll_size'] = 'Velikost glasovalne sli�ice [px]'; 
$lang['img_pm_size'] = 'Velikost stanja zasebnega sporo�ila [px]';  


//
// Install Process
//
$lang['Welcome_install'] = 'Dobrodo�li pri PhpBB 2 namestitvi';
$lang['Initial_config'] = 'Osnovna konfiguracija';
$lang['DB_config'] = 'Konfiguracija baze podatkov';
$lang['Admin_config'] = 'Konfiguracija glavnega administratorja';
$lang['continue_upgrade'] = 'Potem ko ste prenesli va�o config datoteko na va� lokalni ra�unalnik, lahko\'Nadaljuj nadgradnjo\' gumb spodaj za premik naprej procesa posodobitve.  Prosim po�akaj, da se nalo�i config datoteka, dokler ne bo proces zaklju�en.';
$lang['upgrade_submit'] = 'Nadaljuj nadgradnjo';

$lang['Installer_Error'] = 'Med name��anjem je pri�lo do napake';
$lang['Previous_Install'] = 'Najdena je bila prej�nja namestitev';
$lang['Install_db_error'] = 'Pri poskusu posodobitve baze podatkov je pri�lo do napake';

$lang['Re_install'] = 'Va�a prej�nja namestitev je �e vedno aktivna.<br /><br />�e �elite ponovno namestiti PhpBB 2, kliknite Da gumb spodaj. Prosim, bodite pozorni: to lahko uni�i vse obstoje�e podatke in varnostna kopija (backup) ne bo ustvarjena! Uporabni�ko ime administratorja in geslo, ki ste ga uporabljali za prijavo na plo��o, bo na novo ustvarjeno po ponovni namestitvi. Nobena druga nastavitev ne bo ostala.<br /><br />Skrbno premislite preden pritisnete Da!';

$lang['Inst_Step_0'] = 'Hvala da ste izbrali PhpBB 2. Med zaklju�evanjem namestitve je zdaj na vrsti, da, prosim, izpolnite vse podrobnosti, ki jih zahtevamo spodaj. Upo�tevajte, prosim, da mora �e obstajati baza podatkov, v katero name��ate. �e name��ate v bazo podatkov, ki uporablja ODBC, npr. MS Access, morate, predno nadaljujete, zanjo najprej ustvariti DSN.';

$lang['Start_Install'] = 'Za�eni namestitev';
$lang['Finish_Install'] = 'Zaklju�i namestitev';

$lang['Default_lang'] = 'Privzeti jezik plo��e';
$lang['DB_Host'] = 'Ime gostitelja stre�nika Baze podatkov / DSN';
$lang['DB_Name'] = 'Ime va�e Baze podatkov';
$lang['DB_Username'] = 'Uporabni�ko ime Baze podatkov';
$lang['DB_Password'] = 'Geslo Baze podatkov';
$lang['Database'] = 'Va�a Baza podatkov';
$lang['Install_lang'] = 'Izberite jezik za namestitev';
$lang['dbms'] = 'Tip baze podatkov';
$lang['Table_Prefix'] = 'Prefiks za tabele v bazi podatkov';
$lang['Admin_Username'] = 'Administratorjevo Uporabni�ko ime';
$lang['Admin_Password'] = 'Administratorjevo Geslo';
$lang['Admin_Password_confirm'] = 'Administratorjevo Geslo [ Potrdi ]';

$lang['Inst_Step_2'] = 'Va�e admin uporabni�ko ime je bilo ustvarjeno.  Pri tej to�ki je va�a osnovna namestitev zaklju�ena. Sedaj boste prestavljeni na zaslon, ki vam bo omogo�il urediti va�o novo namestitev. Prosim, skrbno preverite podrobnosti splo�ne nastavitve in spremenite, karkoli bi bilo potrebno. Hvala vam za izbiro PhpBB 2.';

$lang['Unwriteable_config'] = 'Va�a datoteka config je sedaj neprepisljiva. Kopija config datoteke bo prene�ena na va� ra�unalnik, ko boste kliknili spodnji gumb. To datoteko morate nalo�iti v isti imenik, kot je PhpBB 2. Ko je to enkrat narejeno, se morate prijaviti z uporabo administratorjevega imena in gesla, ki ste ju dolo�ili v prej�njem obrazcu. Obi��ite administratorjev nadzorni center (Administrativni koti�ek - povezava je vidna na dnu vsake strani potem ko ste prijavljeni), da preverite splo�ne nastavitve. Hvala, da ste izbrali PhpBB 2.';
$lang['Download_config'] = 'Prenos (Download) Config';

$lang['ftp_choose'] = 'Izberite na�in prenosa';
$lang['ftp_option'] = '<br />Odkar so FTP podalj�ki omogo�eni v tej verziji PHP, ste dele�ni tudi mo�nosti, da najprej poskusite avtomati�no FTP-prenesti config datoteko na svoje mesto.';
$lang['ftp_instructs'] = 'Izbrali ste  avtomati�ni FTP prenos datoteke na ra�un, ki vsebuje PhpBB 2. Prosim, vnesite podatke spodaj, da omogo�ite ta postopek. Pazite da bo FTP pot natan�na pot preko FTP do name��enega PhpBB2, kot ko ste tja obi�ajno FTP-irali kot odjemalec.';
$lang['ftp_info'] = 'Vnesite svoje FTP podatke';
$lang['Attempt_ftp'] = 'Poskus za FTP prenos config datoteko na svoje mesto';
$lang['Send_file'] = 'Samo po�lji datoteko meni in jaz jo (bom) FTP prenesel ro�no';
$lang['ftp_path'] = 'FTP pot do PhpBB 2';
$lang['ftp_username'] = 'Va�e FTP Uporabni�ko ime';
$lang['ftp_password'] = 'Va�e FTP Geslo';
$lang['Transfer_config'] = 'Za�ni prenos';
$lang['NoFTP_config'] = 'Poskus za FTP prenos config datoteke na svoje mesto je spodletel.  Prosim, prenesi (download) config datoteko in FTP-iraj jo na svoje mesto ro�no.';

$lang['Install'] = 'Namesti';
$lang['Upgrade'] = 'Posodobi';


$lang['Install_Method'] = 'Izberi namestitveni na�in';

$lang['Install_No_Ext'] = 'PHP konfiguracija na va�em stre�niku ne podpira tipa baze podatkov, ki ste jo izbrali';

$lang['Install_No_PCRE'] = 'PhpBB2 zahteva Perl-Compatible Regular Expressions Module za PHP, ki ga va�a PHP konfiguracija ne poka�e kot podprto!';

//
// That's all Folks!
// -------------------------------------------------

?>