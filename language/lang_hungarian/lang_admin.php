<?php

/***************************************************************************
 *                            lang_admin.php [Hungarian]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id$
 *
 *     translated by        : Szilard Andai
 *     email                : iranon@send.hu     
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
$lang['General'] = '�ltal�nos';
$lang['Users'] = 'Felhaszn�l�k';
$lang['Groups'] = 'Csoportok';
$lang['Forums'] = 'F�rumok kezel�se';
$lang['Styles'] = 'T�ma';

$lang['Configuration'] = 'Be�ll�t�s';
$lang['Permissions'] = 'Jogosults�g';
$lang['Manage'] = 'Be�ll�t�sok';
$lang['Disallow'] = 'Tiltott nevek';
$lang['Prune'] = 'Karbantart�s';
$lang['Mass_Email'] = 'Csoportos email';
$lang['Ranks'] = 'Rang';
$lang['Smilies'] = 'Emotikonok';
$lang['Ban_Management'] = 'Letilt�sok';
$lang['Word_Censor'] = 'Cenz�ra';
$lang['Export'] = 'Export�l�s';
$lang['Create_new'] = 'K�sz�t�s';
$lang['Add_new'] = 'Hozz�ad�s';
$lang['Backup_DB'] = 'Adatb�zis lement�se';
$lang['Restore_DB'] = 'Adatb�zis vissza�ll�t�sa';


//
// Index
//
$lang['Admin'] = 'Adminisztr�ci�';
$lang['Not_admin'] = 'Nincs jogosults�god az adminisztr�ci�hoz';
$lang['Welcome_phpBB'] = '�dv�zl�nk a phpBB-ben!';
$lang['Admin_intro'] = 'K�sz�nj�k, hogy a phpBB-t v�laszottad a F�rumod megval�s�t�s�hoz. Ebben az ablakban egy gyors �ttekint�st l�thatsz a F�rum n�h�ny adat�r�l. Erre az oldalra mindig visszat�rhetsz, ha a bal oldali men�pontban r�kattintasz az <i>Admin Kezd�lap</i> linkre. A F�rumba val� visszat�r�shez kattints a phpBB ikonra, mely szint�n a bal oldali men�b tetej�n tal�lhat� meg. A t�bbi hivatkoz�ssal a F�rum be�ll�t�sait v�ltoztathatod a legapr�bb r�szletig. Minden oldalhoz egy k�l�n kis le�r�s tartozik, hogy mivel mit lehet csin�lni.';

$lang['Main_index'] = 'F�rum Kezd�lap';
$lang['Forum_stats'] = 'F�rum Statisztika';
$lang['Admin_Index'] = 'Admin Kezd�lap';
$lang['Preview_forum'] = 'F�rum El�n�zet';

$lang['Click_return_admin_index'] = 'Kattints %side%s, hogy visszat�rj az Admin Kezd�lapra';

$lang['Statistic'] = 'Statisztika';
$lang['Value'] = '�rt�k';
$lang['Number_posts'] = 'Napi hozz�sz�l�sok sz�ma';
$lang['Posts_per_day'] = 'Hozz�sz�l�s naponta';
$lang['Number_topics'] = 'T�m�k sz�ma';
$lang['Topics_per_day'] = 'T�m�k naponta';
$lang['Number_users'] = 'Felhaszn�l�k sz�ma';
$lang['Users_per_day'] = 'Felhaszn�l�k naponta';
$lang['Board_started'] = 'F�rum indul�sa';
$lang['Avatar_dir_size'] = 'Avatar k�nyvt�r m�rete';
$lang['Database_size'] = 'Adatb�zis m�rete';
$lang['Gzip_compression'] ='Gzip t�m�r�t�s';
$lang['Not_available'] = 'Nem el�rhet�';

$lang['ON'] = 'Bekapcsolva'; // This is for GZip compression
$lang['OFF'] = 'Kikapcsolva'; 


//
// DB Utils
//
$lang['Database_Utilities'] = 'Adatb�zis eszk�z�k';

$lang['Restore'] = 'Vissza�ll�t�s';
$lang['Backup'] = 'Lement�s';
$lang['Restore_explain'] = 'Ezzel a funkci�val a phpBB t�bl�zat �sszes t�bl�j�t vissza lehet t�lteni egy kimentett fileb�l. Ha a szerver t�mogatja a kicsomagol�st, akkor egy GZIP-pel t�m�r�tett sz�veges fileb�l is be lehet t�lteni. <b>FIGYELEM!</b> Ez fel�l�rja az �ppen haszn�lt t�bl�zatot. Az adatb�zis vissza�ll�t�sa eltarthat egy darabig, ez�rt ne menj el addig err�l az oldalr�l, m�g nem jelzi, hogy k�sz van.';
$lang['Backup_explain'] = 'Ezzel a funkci�val a phpBB t�bl�zat �sszes t�bl�j�t ki lehet menteni. Ha van m�s, egy�ni phpBB-hez tartoz� t�bla is az adatb�zisban, akkor add meg azoknak a neveit is,  vessz�vel elv�lasztva - az al�bbi Egy�b T�bl�k kiment�se mez�be. Ha t�mogatja a szerver, akkor haszn�lhatsz GZIP t�m�r�t�st is, hogy kisebb legyen a let�ltend� file m�rete.';

$lang['Backup_options'] = 'KiMent�si be�ll�t�sok';
$lang['Start_backup'] = 'Kiment�s ind�t�sa';
$lang['Full_backup'] = 'Teljes kiment�s';
$lang['Structure_backup'] = 'Csak a fel�p�t�s kiment�se';
$lang['Data_backup'] = 'Csak az adatok kiment�se';
$lang['Additional_tables'] = 'Egy�b t�bl�k';
$lang['Gzip_compress'] = 'Gzip t�m�r�t�s';
$lang['Select_file'] = 'File kiv�laszt�sa';
$lang['Start_Restore'] = 'Vissza�ll�t�s ind�t�sa';

$lang['Restore_success'] = 'Az adatb�zis sikeresen helyre lett �ll�tva.<br /><br />A F�rum visszaker�lt a kiment�s el�tti �llapotba.';
$lang['Backup_download'] = 'A let�lt�s hamarosan elindul, v�rj a megkezd�s�ig';
$lang['Backups_not_supported'] = 'Az adatb�zis kiment�se nem lehets�ges, mivel ez nincsen t�mogatva ebben az adatb�zis rendszerben';

$lang['Restore_Error_uploading'] = 'Hiba a Kiment�s file visszat�lt�se k�zben';
$lang['Restore_Error_filename'] = 'Hib�s filen�v, v�lassz egy m�sik filet';
$lang['Restore_Error_decompress'] = 'A GZIP kit�m�r�t�s nem lehets�ges, adj meg egy sima sz�veges filet';
$lang['Restore_Error_no_file'] = 'Nem lett file felt�ltve';


//
// Auth pages
//
$lang['Select_a_User'] = 'V�lassz egy felhaszn�l�t';
$lang['Select_a_Group'] = 'V�lassz egy Csoportot';
$lang['Select_a_Forum'] = 'V�lassz egy f�rumot';
$lang['Auth_Control_User'] = 'Felhaszn�l�i enged�lyek be�ll�t�sa'; 
$lang['Auth_Control_Group'] = 'Csoportenged�lyek be�ll�t�sa'; 
$lang['Auth_Control_Forum'] = 'F�rum jogosults�gok be�ll�t�sa'; 
$lang['Look_up_User'] = 'Felhaszn�l� keres�se'; 
$lang['Look_up_Group'] = 'Csoport keres�se'; 
$lang['Look_up_Forum'] = 'F�rum keres�se'; 

$lang['Group_auth_explain'] = 'Itt �ll�thatsz be jogosults�gokat �s Moder�tor jogokat az egyes csoportokhoz. Ne felejtsd el, hogy a csoport jogosults�g megv�ltoztat�s�val egyes felhaszn�l�k m�g hozz�f�rhetnek a csoporthoz. Ebben az esetben egy figyelmezet� �zenetet fogsz kapni.';

$lang['User_auth_explain'] = 'Itt �ll�thatsz be jogosults�gokat �s Moder�tor jogokat az egyes felhaszn�l�khoz. Ne felejtsd el, hogy a felhaszn�l�i jogosults�g megv�ltoztat�s�val egyes felhaszn�l�k m�g hozz�f�rhetnek egyes f�rumokhoz, stb. Ebben az esetben egy figyelmezet� �zenetet fogsz kapni.';

$lang['Forum_auth_explain'] = 'Itt �ll�thatod be a hozz�f�r�si jogosults�gokat az egyes f�rumokhoz, az Egyszer� vagy B�v�tett lehet�s�get haszn�lva. Ne feledd, hogy a jogosults�gok megv�ltoztat�s�val a felhaszn�l�k �jabb opci�kat, �s v�ltoztat�si lehet�s�get �rhetnek el.';

$lang['Simple_mode'] = 'Egyszer� m�d';
$lang['Advanced_mode'] = 'B�v�tett m�d';
$lang['Moderator_status'] = 'Moder�tor st�tusz';

$lang['Allowed_Access'] = 'Enged�lyezett hozz�f�r�s';
$lang['Disallowed_Access'] = 'Nem enged�lyezett hozz�f�r�s';
$lang['Is_Moderator'] = 'Moder�tor';
$lang['Not_Moderator'] = 'Nem Moder�tor';

$lang['Conflict_warning'] = 'Jogosults�g-�tk�z�s';
$lang['Conflict_access_userauth'] = 'Ennek a felhaszn�l�nak m�r van f�rum jogosults�ga, a Csoporttags�gon kereszt�l. Ha ezt meg akarod sz�ntetni vagy meg akarod v�ltoztatni, akkor a felhaszn�l� Egy�ni jogosults�gaiban v�ltoztasd meg. A felhaszn�l�nak az al�bbi jogosults�gai vannak:';
$lang['Conflict_mod_userauth'] = 'Ennek a felhaszn�l�nak m�r van Moder�tori joga ehhez a f�rumhoz a Csoporttags�gon kereszt�l. Ha ezt meg akarod sz�ntetni, akkor a felhaszn�l� Egy�ni jogosults�gaiban v�ltoztasd meg. A felhaszn�l�nak az al�bbi jogosults�gai vannak:';
$lang['Conflict_access_groupauth'] = 'Az egy�ni jogosults�gok be�ll�t�s�ban ennek a felhaszn�l�nak m�r van jogosults�ga ehhez a f�rumhoz. Ha ezt meg akarod v�ltoztatni, akkor a felhaszn�l� Egy�ni jogosults�gaiban tedd meg. A felhaszn�l�nak az al�bbi jogosults�gai vannak:';
$lang['Conflict_mod_groupauth'] = 'Az egy�ni jogosults�gok be�ll�t�s�ban ennek a felhaszn�l�nak m�r van moder�tori joga ehhez a f�rumhoz. Ha ezt meg akarod sz�ntetni, akkor a felhaszn�l� Egy�ni jogosults�gaiban v�ltoztasd meg. A felhaszn�l�nak az al�bbi jogosults�gai vannak:';

$lang['Public'] = 'Nyilv�nos';
$lang['Private'] = 'Priv�t';
$lang['Registered'] = 'Regisztr�lt';
$lang['Administrators'] = 'Adminisztr�tor';
$lang['Hidden'] = 'Rejtett';

// These are displayed in the drop down boxes for advanced
// mode forum auth, try and keep them short!
$lang['Forum_ALL'] = 'MINDENKI';
$lang['Forum_REG'] = 'REGISZTR�LTAK';
$lang['Forum_PRIVATE'] = 'PRIV�T';
$lang['Forum_MOD'] = 'MODER�TOROK';
$lang['Forum_ADMIN'] = 'ADMIN';

$lang['View'] = 'Megtekint�s';
$lang['Read'] = 'Olvas�s';
$lang['Post'] = 'Hozz�sz�l�s';
$lang['Reply'] = 'V�laszk�ld�s';
$lang['Edit'] = 'Szerkeszt�s';
$lang['Delete'] = 'T�rl�s';
$lang['Sticky'] = 'Kiemelt';
$lang['Announce'] = 'K�zlem�ny'; 
$lang['Vote'] = 'Szavaz�s';
$lang['Pollcreate'] = 'Szava�zs k�sz�t�se';

$lang['Permissions'] = 'Jogosults�gok';
$lang['Simple_Permission'] = 'Egyszer� jogosults�g';

$lang['User_Level'] = 'Felhaszn�l�szint'; 
$lang['Auth_User'] = 'Felhaszn�l�';
$lang['Auth_Admin'] = 'Adminisztr�tor';
$lang['Group_memberships'] = 'Csoporttags�gok';
$lang['Usergroup_members'] = 'A k�vetkez� felhaszn�l�ka tartoznak ebbe a csoportba:';

$lang['Forum_auth_updated'] = 'F�rum enged�lyek friss�tve';
$lang['User_auth_updated'] = 'Felhaszn�l� enged�lyek friss�tve';
$lang['Group_auth_updated'] = 'Csoport-jogosults�gok friss�tve';

$lang['Auth_updated'] = 'A Jogosults�gok sikeresen megv�ltoztak!';
$lang['Click_return_userauth'] = 'Kattints %side%s, hogy visszat�rj a Felhaszn�l�i Jogosults�g be�ll�t�saihoz';
$lang['Click_return_groupauth'] = 'Kattints %side%s hogy visszat�rj a Csoport Jogosults�g be�ll�t�saihoz';
$lang['Click_return_forumauth'] = 'Kattints %side%s hogy visszat�rj a F�rum Jogosults�g be�ll�t�saihoz';


//
// Banning
//
$lang['Ban_control'] = 'Kitilt�s';
$lang['Ban_explain'] = 'Itt tudsz letiltani egyes vagy t�bb felhaszn�l�t, �gy azok nem tudj�k bet�lteni a F�rum kezd�oldal�t. Ezt vagy a felhaszn�l�n�v, vagy IP-c�m (vagy IP-tartom�ny), vagy hostn�v megad�s�val �rheted el. Az emailc�met is letilthatod, hogy az ne regisztr�lja mag�t egy �j n�ven. Figyelem, egy email c�m letilt�s�val m�g nem biztos, hogy a felhaszn�l� ki lett tiltva a F�rumr�l; ehhez a felhaszn�l�n�v �s az IP letilt�s�t haszn�ld.';

$lang['Ban_explain_warn'] = 'Figyelem, az IP-tartom�ny megad�s�val a kezd�, �s az utols� IP k�z�tt az �sszes c�m le lesz tiltva. Lehet�s�g szerint min�l kisebb tartom�nyt adj meg, hogy ne legyen t�l nagy az adatb�zis m�rete. Ha musz�j tartom�nyt megadni, akkor lehet�leg min�l kisebbet adj meg, de jobb, ha csak az IPc�met har�tozod meg.';

$lang['Select_username'] = 'Felhaszn�l�n�v kiv�laszt�sa';
$lang['Select_ip'] = 'IP-c�me kiv�laszt�sa';
$lang['Select_email'] = 'Emailc�m kiv�laszt�sa';

$lang['Ban_username'] = 'Egy vagy t�bb felhaszn�l� kitilt�sa';
$lang['Ban_username_explain'] = 'A haszn�lt oper�ci�s rendszert�l �s b�ng�sz�t�l f�gg�en egyszerre t�bb felhaszn�l�t is ki lehet tiltani.';

$lang['Ban_IP'] = 'Egy vagy t�bb IPc�m, vagy hostn�v letilt�sa';
$lang['IP_hostname'] = 'IPc�mek vagy hostnevek';
$lang['Ban_IP_explain'] = 'T�bb IPc�me vagy hostn�v megad�s�hoz vessz�vel v�laszd �ket. IP-tartom�ny megad�s�hoz az els� �s az utols� sz�m el� tegy�l egy k�t�jelet. Jokerkaraktert \(*\) is haszn�lhatsz.';

$lang['Ban_email'] = 'Egy vagy t�bb emailc�m kitilt�sa';
$lang['Ban_email_explain'] = 'T�bb emailc�m kitilt�s�hoz vessz�vel v�laszd el a c�meket. Jokerkaraktert \(*\) is haszn�lhatsz, pld. *@hotmail.com';

$lang['Unban_username'] = 'Egy vagy t�bb felhaszn�l� enged�lyez�se';
$lang['Unban_username_explain'] = 'A haszn�lt oper�ci�s rendszert�l �s b�ng�sz�t�l f�gg�en egyszerre t�bb felhaszn�l�t is lehet enged�lyezni.';

$lang['Unban_IP'] = 'Egy vagy t�bb IPc�m enged�lyez�se';
$lang['Unban_IP_explain'] = 'A haszn�lt oper�ci�s rendszert�l �s b�ng�sz�t�l f�gg�en egyszerre t�bb felhaszn�l�t is lehet enged�lyezni.';

$lang['Unban_email'] = 'Egy vagy t�bb emailc�m enged�lyez�se';
$lang['Unban_email_explain'] = 'A haszn�lt oper�ci�s rendszert�l �s b�ng�sz�t�l f�gg�en egyszerre t�bb felhaszn�l�t is lehet enged�lyezni.';

$lang['No_banned_users'] = 'Nincsen letiltott felhaszn�l�n�v';
$lang['No_banned_ip'] = 'Nincsen kitiltott IPc�m';
$lang['No_banned_email'] = 'Nincsen kitiltott emailc�m';

$lang['Ban_update_sucessful'] = 'A Kitilt�s list�ja sikeresen megv�ltozott!';
$lang['Click_return_banadmin'] = 'Kattints %side%s, hogy visszat�rj a Kitilt�s be�ll�t�saihoz';


//
// Configuration
//
$lang['General_Config'] = '�ltal�nos be�ll�t�sok';
$lang['Config_explain'] = 'A F�rum alapvet� be�ll�t�sait adhatod itt meg. A Felhaszn�l�k �s az egyes f�rumok be�ll�t�sait a bal oldali men�ben �rheted el.';

$lang['Click_return_config'] = 'Kattints %side%s, hogy visszat�rj az �ltal�nos Be�ll�t�sokhoz';

$lang['General_settings'] = '�ltal�nos be�ll�t�sok';
$lang['Server_name'] = 'Domain n�v';
$lang['Server_name_explain'] = 'A domainn�v, amelyen a F�rum fut';
$lang['Script_path'] = 'Script el�r�si �tvonal';
$lang['Script_path_explain'] = 'A phpBB relat�v el�r�si �tvonala, a domainn�vhez k�pest';
$lang['Server_port'] = 'Szerverport';
$lang['Server_port_explain'] = 'A haszn�lt port, �ltal�ban a 80-as.';
$lang['Site_name'] = 'Oldal neve';
$lang['Site_desc'] = 'Oldal le�r�sa';
$lang['Board_disable'] = 'F�rum kikapcsol�sa';
$lang['Board_disable_explain'] = 'A bekapcsol�s�val a felhaszn�l�k nem �rhetik el a f�rumot. Ne l�pj ki, ha kikapcsoltad, mert nem tudsz �jra bejelentkezni!';
$lang['Acct_activation'] = 'Azonos�t� aktiv�l�sa';
$lang['Acc_None'] = 'Nincs'; // These three entries are the type of activation
$lang['Acc_User'] = 'Felhaszn�l�i';
$lang['Acc_Admin'] = 'Adminisztr�tori';

$lang['Abilities_settings'] = 'Felhaszn�l� �s F�rum be�ll�t�sok';
$lang['Max_poll_options'] = 'A maximum v�laszt�si lehet�s�gek a szavaz�sban';
$lang['Flood_Interval'] = 'Flood id�k�z';
$lang['Flood_Interval_explain'] = 'Ennyi m�sodpercet kell v�rni a k�vetkez� hozz�sz�l�s elk�ld�s�ig'; 
$lang['Board_email_form'] = 'Felhasz�nl�i levelez�s az oldalon kereszt�l';
$lang['Board_email_form_explain'] = 'A felhaszn�l�k �zeneteket k�ldhetnek egym�snak az oldalon kereszt�l';
$lang['Topics_per_page'] = 'T�ma oldalak�nt';
$lang['Posts_per_page'] = 'T�ma naponta';
$lang['Hot_threshold'] = 'N�pszer� t�m�k';
$lang['Default_style'] = 'Alap-t�ma';
$lang['Override_style'] = 'Alap-t�ma fel�l�r�s�nak enged�lyez�se';
$lang['Override_style_explain'] = 'A felhaszn�l�k haszn�lhatnak egy�ni t�m�kat';
$lang['Default_language'] = 'Alapbe�ll�t�s� nyelv';
$lang['Date_format'] = 'D�tum form�tum';
$lang['System_timezone'] = 'Rendszer id�z�na';
$lang['Enable_gzip'] = 'GZIP t�m�r�t�s bekapcsol�sa';
$lang['Enable_prune'] = 'F�rum karbantart�s bekapcsol�sa';
$lang['Allow_HTML'] = 'HTML enged�lyez�se';
$lang['Allow_BBCode'] = 'BBCode enged�lyez�se';
$lang['Allowed_tags'] = 'Enged�lyezett HTML tagek';
$lang['Allowed_tags_explain'] = 'A tageket vessz�vel kell elv�lasztani';
$lang['Allow_smilies'] = 'Emotikonok enged�lyez�se';
$lang['Smilies_path'] = 'Emotikonok el�r�si �tvonala';
$lang['Smilies_path_explain'] = 'a phpBB-n bel�li el�r�si �t, �ltal�ban: images/smiles';
$lang['Allow_sig'] = 'al��r�s enged�lyez�se';
$lang['Max_sig_length'] = 'Al��r�s maximum hossza';
$lang['Max_sig_length_explain'] = 'Az al��r�sok maximum hossza karakterben';
$lang['Allow_name_change'] = 'Felhaszn�l�n�v v�lt�sa';

$lang['Avatar_settings'] = 'Avatar be�ll�t�sok';
$lang['Allow_local'] = 'Avatar gal�ria bekapcsol�sa';
$lang['Allow_remote'] = 'T�voli Avatar enged�lyez�se';
$lang['Allow_remote_explain'] = 'M�s weboldalr�l belinkelt Avatarok';
$lang['Allow_upload'] = 'M�s oldalr�l belinkelt k�pek';
$lang['Max_filesize'] = 'Maximum Avatar k�pm�ret';
$lang['Max_filesize_explain'] = 'A felt�l�tt k�pekhez';
$lang['Max_avatar_size'] = 'Az Avatar maximum m�rete';
$lang['Max_avatar_size_explain'] = '(Sz�less�g x Magass�g pixelben)';
$lang['Avatar_storage_path'] = 'Avatar t�rol�s�nak helye';
$lang['Avatar_storage_path_explain'] = 'A phpBB-n bel�li el�r�si �t, �ltal�ban: images/avatars';
$lang['Avatar_gallery_path'] = 'Avatar gal�ria helye';
$lang['Avatar_gallery_path_explain'] = 'A phpBB-n bel�li el�r�si �t, �ltal�ban: images/avatars/gallery';

$lang['COPPA_settings'] = 'COPPA be�ll�t�sok';
$lang['COPPA_fax'] = 'COPPA fax-sz�m';
$lang['COPPA_mail'] = 'COPPA levelez�si c�m';
$lang['COPPA_mail_explain'] = 'Az a lev�lc�m, ahova a sz�l�knek a COPPA regisztr�ci�s k�relmeket kell k�ldeni�k';

$lang['Email_settings'] = 'Email be�ll�t�sok';
$lang['Admin_email'] = 'Adminisztr�tor emailc�me';
$lang['Email_sig'] = 'Email al��r�s';
$lang['Email_sig_explain'] = 'Ez a sz�veg lesz a kik�ld�tt levelek v�g�hez csatolva, amit a F�rum k�ld ki';
$lang['Use_SMTP'] = 'SMTP szerever haszn�lata emailk�ld�shez';
$lang['Use_SMTP_explain'] = 'Kapcsold be, ha egy k�ls� emailk�ld� szervert akarsz haszn�lni';
$lang['SMTP_server'] = 'SMTP szerver c�me';
$lang['SMTP_username'] = 'SMTP felhaszn�l�n�v';
$lang['SMTP_username_explain'] = 'Csak akkor t�ltsd ki, ha sz�ks�ges';
$lang['SMTP_password'] = 'SMTP jelsz�';
$lang['SMTP_password_explain'] = 'Csak akkor t�ltsd ki, ha sz�ks�ges';

$lang['Disable_privmsg'] = 'Priv�t �zenetk�ld�s';
$lang['Inbox_limits'] = '�zenetek maxim�lis sz�ma az �rkezett fi�kban';
$lang['Sentbox_limits'] = '�zenetek maxim�lis sz�ma az Elk�ld�tt fi�kban';
$lang['Savebox_limits'] = '�zenetek maxim�lis sz�ma az Ment�s fi�kban';

$lang['Cookie_settings'] = 'Cookie be�ll�t�sa'; 
$lang['Cookie_settings_explain'] = 'A cookie-k be�ll�t�sai, hogyan k�ldi ki �ket a b�ng�sz�. A legt�bb esetben az alapbe�ll�t�sok elegend�ek, �gy csak �vatosan v�ltoztasd meg, mert el�fordulhat, hogy a felhaszn�l�k nem fognak tudni bel�pni';
$lang['Cookie_domain'] = 'Cookie domain';
$lang['Cookie_name'] = 'Cookie neve';
$lang['Cookie_path'] = 'Cookie el�r�si �t';
$lang['Cookie_secure'] = 'Cookie biztons�g';
$lang['Cookie_secure_explain'] = 'Ha a szerver SSL-en kereszt�l m�k�dik, akkor kapcsold be, k�l�nben hagyd kikapcsolva';
$lang['Session_length'] = 'Session hossz [ m�sodperc ]';


//
// Forum Management
//
$lang['Forum_admin'] = 'F�rum adminisztr�ci�';
$lang['Forum_admin_explain'] = 'Innen tudsz �j f�rumot nyitni, t�r�lni, szerkesztni, �trendezni, kategoriz�lni �s �jraszinkroniz�lni';
$lang['Edit_forum'] = 'F�rum szerkeszt�se';
$lang['Create_forum'] = '�j f�rum';
$lang['Create_category'] = '�j kateg�ria';
$lang['Remove'] = 'T�r�l';
$lang['Action'] = 'Utas�t�s';
$lang['Update_order'] = 'Friss�t�si sorrend';
$lang['Config_updated'] = 'A F�rum be�ll�t�sai sikeresen friss�ltek';
$lang['Edit'] = 'Szerkeszt';
$lang['Delete'] = 'T�r�l';
$lang['Move_up'] = 'Feljebb';
$lang['Move_down'] = 'Lejjebb';
$lang['Resync'] = 'Szinkroniz�l';
$lang['No_mode'] = 'Nem lett m�d kiv�lasztva';
$lang['Forum_edit_delete_explain'] = 'Az al�bbi oldallal be�ll�thatod a f�rum legfontosabb tulajdons�gait. A F�rum �s a Felhaszn�l�k be�ll�t�s�hoz haszn�ld a baloldali men�t.';

$lang['Move_contents'] = '�sszes tartalom �tmozgat�sa';
$lang['Forum_delete'] = 'F�rum t�rl�se';
$lang['Forum_delete_explain'] = 'Az al�bbi oldallal t�r�lhetsz egy f�rumot, vagy kateg�ri�t, megadva, hogy a tartalmazott f�rumok vagy t�m�k hova ker�ljenek �t.';

$lang['Status_locked'] = 'Z�rt';
$lang['Status_unlocked'] = 'Nyitott';
$lang['Forum_settings'] = '�ltal�nos F�rum be�ll�t�sok';
$lang['Forum_name'] = 'F�rum neve';
$lang['Forum_desc'] = 'Le�r�s';
$lang['Forum_status'] = 'F�rum st�tusz';
$lang['Forum_pruning'] = 'Automatikus karbantart�s';

$lang['prune_freq'] = 'T�ma kor�nak ellen�rz�se';
$lang['prune_days'] = 'T�m�k keres�se, melyekbe nem �rkezett hozz�sz�l�s';
$lang['Set_prune_data'] = 'Az automatikus karbantart�s be van kapcsolva, de ehhez a f�rumhoz nincsen megadva a karbantart�s gyakoris�ga. L�pj vissza, �s �ll�tsd be.';

$lang['Move_and_Delete'] = '�tmozgat�s �s T�rl�s';

$lang['Delete_all_posts'] = '�sszes hozz�sz�l�s t�rl�se';
$lang['Nowhere_to_move'] = 'Sehova sem lehet �thelyezni';

$lang['Edit_Category'] = 'Kateg�ria szerkeszt�se';
$lang['Edit_Category_explain'] = 'Ezzel a kateg�ria nev�t v�ltoztathatod meg.';

$lang['Forums_updated'] = 'A F�rum �s Kateg�ria be�ll�t�sai sikeresen friss�ltek!';

$lang['Must_delete_forums'] = 'El�bb az �sszes f�rumot t�r�ln�d kell, hogy t�r�lhesd ezt a kateg�ri�t.';

$lang['Click_return_forumadmin'] = 'Kattints %side%s, hogy visszat�rj a F�rum be�ll�t�saihoz.';


//
// Smiley Management
//
$lang['smiley_title'] = 'Emotikon';
$lang['smile_desc'] = 'Ezen az oldalon az Emotikonokat kezelheted; hozz�ad�s, t�rl�s, szerkeszt�s, melyeket a felhaszn�l�k a hozz�sz�l�sn�l, �s a priv�t �zenetekben haszn�lhatnak.';

$lang['smiley_config'] = 'Emotikonok be�ll�t�sa';
$lang['smiley_code'] = 'Emotikon k�d';
$lang['smiley_url'] = 'Emotikon k�pfile';
$lang['smiley_emot'] = 'Smiley Emotikon';
$lang['smile_add'] = '�j emotikon hozz�ad�sa';
$lang['Smile'] = 'Smiley';
$lang['Emotion'] = 'Emotikon';

$lang['Select_pak'] = 'Csomag file (.pak) kiv�laszt�sa';
$lang['replace_existing'] = 'Jelenlegi Emotikonok fel�l�r�sa';
$lang['keep_existing'] = 'Jelenlegi Emotikonok megtart�sa';
$lang['smiley_import_inst'] = 'T�ltsd fel a megfelel� k�nyvt�rba az Emotikonokat.  Ut�na a megfelel adatok megad�s�val import�lhat� az Emotikon csomag.';
$lang['smiley_import'] = 'Emotikonok import�l�sa';
$lang['choose_smile_pak'] = 'Emotikon csomag kiv�laszt�sa (.pak file)';
$lang['import'] = 'Emotikonok import�l�sa';
$lang['smile_conflicts'] = 'Mi a teend� konfliktus eset�n?';
$lang['del_existing_smileys'] = 'L�tez� emotikonok t�rl�se import�l�s el�tt';
$lang['import_smile_pack'] = 'Emotikon csomag import�l�sa';
$lang['export_smile_pack'] = 'Emotikon csomag k�sz�t�se';
$lang['export_smiles'] = 'Emotikon csomag export�l�s�hoz kattints %sIDE%s, hogy let�ltsd a smiles.pak filet. Ha �t akarod nevezni, akkor figyelj arra, hogy a .pak kiterjeszt�s megmaradjon.';

$lang['smiley_add_success'] = 'Az emotikon sikeresen beker�lt a list�ba!';
$lang['smiley_edit_success'] = 'Az emotikon be�ll�t�sai sikeresen megv�ltoztak!';
$lang['smiley_import_success'] = 'Az emotikon-csomag import�l�sa sikeres volt!';
$lang['smiley_del_success'] = 'Az emotikont sikeresen elt�vol�t�sa sikeres volt!';
$lang['Click_return_smileadmin'] = 'Kattints %side%s, hogy visszat�rj az Emotikonok be�ll�t�saihoz';


//
// User Management
//
$lang['User_admin'] = 'Felhaszn�l�i be�ll�t�sok';
$lang['User_admin_explain'] = 'Ezen az oldalon megadhatod, megv�ltoztathatod a felhaszn�l�k adatait, �s n�h�ny �ltal�nos tulajdons�got �ll�thatsz be. A jogosults�gok kioszt�s�hoz haszn�ld az Egy�ni �s Csoport jogosults�g-kezel� rendszert';
$lang['Look_up_user'] = 'Felhaszn�l� keres�se';

$lang['Admin_user_fail'] = 'A felhaszn�l� profilj�nak friss�t�se sikertelen';
$lang['Admin_user_updated'] = 'A felhaszn�l� profilja sikeresen m�dosult!';
$lang['Click_return_useradmin'] = 'Kattints %side%s, hogy visszat�rj a Felhaszn�l� be�ll�t�sokhoz';

$lang['User_delete'] = 'Felhaszn�l� t�rl�se';
$lang['User_delete_explain'] = 'Kattints ide, ha t�nyleg t�r�lni akarod a felhaszn�l�t; a t�rl�s ut�n nem lehet visszahozni!';
$lang['User_deleted'] = 'A felhaszn�l� sikeresen t�r�lve lett';

$lang['User_status'] = 'Akt�v felhaszn�l�';
$lang['User_allowpm'] = 'K�ldhet Mag�n�zenetet';
$lang['User_allowavatar'] = 'Be�ll�that Avatart';

$lang['Admin_avatar_explain'] = 'Itt n�zheted meg, �s t�r�lheted a felhaszn�l� Avatarj�t.';

$lang['User_special'] = 'Egy�b be�l�lt�sok';
$lang['User_special_explain'] = 'A felhaszn�l�k nem m�dos�thatj�k ezeket a be�l�lt�sokat. Itt adhatod meg a felhaszn�l� st�tusz�t, �s egy�b be�ll�t�sait.';


//
// Group Management
//
$lang['Group_administration'] = 'Csoportok be�ll�t�sa';
$lang['Group_admin_explain'] = 'Ezzel az oldallal kezelni tudod a Csoportokat, t�r�lheted, m�dos�thatod �ket, �s �jakat k�sz�thetsz. V�laszhatsz Moder�tort a csoporthoz, megadhatod, hogy ny�lt vagy z�rt csoport legyen-e, megadhatod a csoport nev�t �s le�r�s�t.';
$lang['Error_updating_groups'] = 'A friss�t�s k�zben hiba t�rt�nt.';
$lang['Updated_group'] = 'A Csoport sikeresen friss�lt!';
$lang['Added_new_group'] = 'A Csoport sikeresen elk�sz�lt!';
$lang['Deleted_group'] = 'A Csoport sikeresen t�r�lve lett!';
$lang['New_group'] = '�j csoport';
$lang['Edit_group'] = 'Csoport szerkeszt�se';
$lang['group_name'] = 'Csoport neve';
$lang['group_description'] = 'Csoport le�r�sa';
$lang['group_moderator'] = 'Csoport moder�tor';
$lang['group_status'] = 'Csoport st�tusz';
$lang['group_open'] = 'Nyitott csoport';
$lang['group_closed'] = 'Z�rt csoport';
$lang['group_hidden'] = 'Rejtett csoport';
$lang['group_delete'] = 'Csoport t�rl�se';
$lang['group_delete_check'] = 'Csoport t�rl�se';
$lang['submit_group_changes'] = 'V�ltoz�sok elk�ld�se';
$lang['reset_group_changes'] = 'V�ltoz�sok t�rl�se';
$lang['No_group_name'] = 'Meg kell adnod egy csoportnevet';
$lang['No_group_moderator'] = 'Meg kell adnond a csoportnak egy Moder�tort';
$lang['No_group_mode'] = 'Meg kell hat�roznod, hogy nyitott vagy z�rt csoport legyen-e';
$lang['No_group_action'] = 'Nem hat�rozt�l meg utas�t�st';
$lang['delete_group_moderator'] = 'R�gi moder�tor t�rl�se?';
$lang['delete_moderator_explain'] = 'Ha meg akarod v�ltoztatni a csoport Moder�tor�t, �s t�r�lni akarod a r�git, akkor jel�ld be ezt a n�gyzetet. Ha nem jel�l�d be, akkor a felhaszn�l� sima tag lesz a csoportban.';
$lang['Click_return_groupsadmin'] = 'Kattints %side%s, hogy visszat�rj a Csoportok be�ll�t�saihoz.';
$lang['Select_group'] = 'Csoport kiv�laszt�sa';
$lang['Look_up_group'] = 'Csoport keres�se';


//
// Prune Administration
//
$lang['Forum_Prune'] = 'F�rum karbantart�s';
$lang['Forum_Prune_explain'] = 'A F�rum karbantart�s minden olyan t�m�t automatikusan t�r�l, ahova a megadott id�n bel�l nem �rkezik hozz�sz�l�s. Ha nme adsz meg id�t. akkor az �sszes t�ma t�rl�dik. Ezzel nem lehet t�r�lni azokat a t�m�kat, ahol akt�v szavaz�s van �rv�nyben, vagy azokat, melyek K�zlem�nyek. Ezeket k�zzel kell t�r�ln�d.';
$lang['Do_Prune'] = 'Karbantart�s ind�t�sa';
$lang['All_Forums'] = '�sszes f�rum';
$lang['Prune_topics_not_posted'] = 'T�m�k karbantart�sa, ahova ennyi ideig nem �rkezett �j hozz�sz�l�s.';
$lang['Topics_pruned'] = 'A t�m�k karbantart�sa befejez�dtt.';
$lang['Posts_pruned'] = 'A hozz�sz�l�sok karbantart�sa befejez�dtt.';
$lang['Prune_success'] = 'A F�rumok karbantart�sa sikeres volt!';


//
// Word censor
//
$lang['Words_title'] = 'Cenz�ra';
$lang['Words_explain'] = 'Ezzel az oldallal olyan szavakat adhatsz meg (szerkeszthetsz, vehetsz el), melyeket automatikusan cenz�r�z a f�rum. Ezenk�v�l ezekkel a szavakkal (vagy ilyen szavakat tartalmaz� szavakkal) nem regisztr�lhatnak �j fehaszn�l�t. A * jokerkarakter haszn�lhat�, pld. az *lap*-ra az alaplap sz� is cenz�r�zva lesz, a lap*-ra a lapsz�m, �s a *lap-ra a f�lap szavak is.';
$lang['Word'] = 'Sz�';
$lang['Edit_word_censor'] = 'Cenz�ra szerkeszt�se';
$lang['Replacement'] = 'Helyette';
$lang['Add_new_word'] = '�j sz� hozz�ad�sa';
$lang['Update_word'] = 'Cenz�ra friss�t�se';

$lang['Must_enter_word'] = 'Meg kell adnod egy szavat �s a helyettes�t�s�t';
$lang['No_word_selected'] = 'Nem v�lasztott�l ki szavat';

$lang['Word_updated'] = 'A kiv�laszott cenz�ra sikeresen friss�lt!';
$lang['Word_added'] = 'Cenz�ra sikeresen hozz� lett adva!';
$lang['Word_removed'] = 'A kiv�lasztott cenz�ra sikeresen t�r�lve lett!';

$lang['Click_return_wordadmin'] = 'Kattints %side%s, hogy visszat�rj a Cenz�ra be�ll�t�saihoz';


//
// Mass Email
//
$lang['Mass_email_explain'] = 'A Csoportos lev�l opci�val egy emailt k�ldhetsz minden felhaszn�l�nak, vagy egy adott csoport �sszes felhaszn�l�j�nak. Az email az adminisztr�tori c�mre post�z�dik, �s egy titkos m�solatot kap az �sszes felhaszn�l�. Ha sok emberr�l van sz�, akkor a lev�lk�ld�s eltarthat egy darabig, ne szak�tsd meg k�zben. Amennyiben elk�sz�lt, akkor az oldal �rtes�t err�l.';
$lang['Compose'] = 'Lev�l�r�s'; 

$lang['Recipients'] = 'C�mzett'; 
$lang['All_users'] = '�sszes felhaszn�l�';

$lang['Email_successfull'] = '�zenetet elk�ldve';
$lang['Click_return_massemail'] = 'Kattints %side%s, hogy visszat�rj a Csoportos Email be�ll�t�saihoz';


//
// Ranks admin
//
$lang['Ranks_title'] = 'Rang be�ll�t�sa';
$lang['Ranks_explain'] = 'Itt be�ll�thatod a rangokat; hozz�ad�s, szerkeszt�s, megtekint�s �s t�rl�s. Ezenk�v�l saj�t rangsort is k�sz�thetsz, melyeket a Felhaszn�l�k be�ll�t�s�n�l hozz�rendelhetsz egyes felhaszn�l�khoz.';

$lang['Add_new_rank'] = '�j rang hozz�ad�sa';

$lang['Rank_title'] = 'Rang neve';
$lang['Rank_special'] = 'Speci�lis rang';
$lang['Rank_minimum'] = 'Minimum hozz�sz�l�s';
$lang['Rank_maximum'] = 'Maximum hozz�sz�l�s';
$lang['Rank_image'] = 'Rang k�p�nek el�r�si �tvonala (relat�v el�r�si �t, a phpBB gy�k�rk�nyvt�r�t�l)';
$lang['Rank_image_explain'] = 'A rangot reprezent�l� k�p';

$lang['Must_select_rank'] = 'Ki kell v�lasztanod egy rangot';
$lang['No_assigned_rank'] = 'Nem lett speci�lis rang kiv�lasztva';

$lang['Rank_updated'] = 'A Rang sikeresen megv�ltozott!';
$lang['Rank_added'] = 'A Rang sikeresen hozz� lett adva!';
$lang['Rank_removed'] = 'A Rang sikeresen t�r�lve lett!';
$lang['No_update_ranks'] = 'A Rang sikeresen t�r�lve lett, b�r a felhaszn�l�i azonos�t�k nem friss�ltek. Ezt k�zzel kell megtenned ezeken az azonos�t�kon';

$lang['Click_return_rankadmin'] = 'Kattints %side%s hogy vissza�rj a Rang be�ll�t�saihoz';


//
// Disallow Username Admin
//
$lang['Disallow_control'] = 'Nem enged�lyezett felhaszn�l�nevek be�ll�t�sa';
$lang['Disallow_explain'] = 'Itt be�ll�thatod azokat a felhaszn�l�neveket, melyeket nem regisztr�lhanak. Haszn�lhat� a * jokerkarakter. Nem adhatsz meg olyan sz�t, amelyet m�r haszn�l valaki, ehhez el�sz�r ki kell t�r�ln�d a felhaszn�l�t, �s ut�na tilthatod le.';

$lang['Delete_disallow'] = 'T�rl�s';
$lang['Delete_disallow_title'] = 'Tiltott felhaszn�l�n�v t�rl�se';
$lang['Delete_disallow_explain'] = 'Levehetsz a list�r�l egy tiltott felhaszn�l�nevet. Jel�ld ki �s kattints az T�rl�s gombra';

$lang['Add_disallow'] = 'Hozz�ad�s';
$lang['Add_disallow_title'] = 'Tiltott felhaszn�l�n�v hozz�ad�sa';
$lang['Add_disallow_explain'] = 'Haszn�lhatsz * jokerkaraktert';

$lang['No_disallowed'] = 'Nincsenek letiltott felhaszn�l�nevek';

$lang['Disallowed_deleted'] = 'A letiltott felhaszn�l�n�v sikeresen t�r�lve lett';
$lang['Disallow_successful'] = 'A letiltott felhaszn�l�n�v sikeresen hozz� lett adva';
$lang['Disallowed_already'] = 'A be�rt felhaszn�l�nevet nem lehet letiltani; vagy m�r l�tezik a list�ban, vagy l�tezik a cenz�r�zott szavak k�z�tt, esetleg van ilyen nev� felhaszn�l�.';

$lang['Click_return_disallowadmin'] = 'Kattints %side%s, hogy visszat�rj a Nem enged�lyezett Felhaszn�l�nevek be�ll�t�saihoz';


//
// Styles Admin
//
$lang['Styles_admin'] = 'St�lus be�ll�t�sa';
$lang['Styles_explain'] = 'Ezzel �j t�m�kat �s st�lusokat adhatsz hozz� a F�rumhoz, vagy t�r�lheted �s m�dos�thatod �ket';

$lang['Styles_addnew_explain'] = 'A k�vetkez� lista a telep�tett, �s el�rhet� t�m�kat tartalmazza. Az itt tal�lhat� t�m�k m�g nem ker�ltek be a phpBB adatb�zisba, ehhez kattints a t�ma melletti Telep�t�s gombra';

$lang['Select_template'] = 'V�lassz ki egy t�m�t';

$lang['Style'] = 'St�lus';
$lang['Template'] = 'T�ma';
$lang['Install'] = 'Telep�t�s';
$lang['Download'] = 'Let�lt�s';

$lang['Edit_theme'] = 'T�ma szerkeszt�se';
$lang['Edit_theme_explain'] = 'Ezzel a kiv�laszott t�ma be�ll�t�sait szerkesztheted';

$lang['Create_theme'] = 'T�ma k�sz�t�se';
$lang['Create_theme_explain'] = 'Az al�bbi mez�kkel �j t�m�kat k�sz�thetsz a jelenlegi t�m�b�l. A sz�n megad�s�n�l ne haszn�ld a # karaktert. A CCCCCC helyes, a #CCCCCC hib�s.';

$lang['Export_themes'] = 'T�m�k export�l�sa';
$lang['Export_explain'] = 'Ezzel az oldallal egy adott t�m�t menthetsz ki. V�lasztd ki a t�m�t az al�bbi list�b�l, �s az oldal elk�sz�ti a t�ma konfigur�ci�s filej�t. Ut�na mentsd el a kiv�lasztott t�ma k�nyvt�r�ba. Ha nem lehet elmenteni (nem �rhat� a k�nyvt�r), akkor t�ltsd le, �s k�zzel m�sold be.';

$lang['Theme_installed'] = 'A kiv�laszott t�ma sikeresen t�r�lve lett!';
$lang['Style_removed'] = 'A kiv�laszott t�ma sikeresen t�r�lve lett az adatb�zisb�l. A teljes t�rl�shez a phpBB k�nyvt�rb�l is t�vol�tsd el.';
$lang['Theme_info_saved'] = 'A kiv�lasztott t�m�hoz tartoz� konfigur�ci�s file el lett mentve. V�ltoztasd meg a jogosults�g�t csak-olvashat�ra';
$lang['Theme_updated'] = 'A kiv�laszott t�ma friss�lt. Most m�r export�lhatod az �j t�ma be�ll�t�sait';
$lang['Theme_created'] = 'A t�ma elk�sz�lt. Most m�r export�lhatod a konfigur�ci�s fileba, hogy biztons�gosan legyen t�rolva.';

$lang['Confirm_delete_style'] = 'Biztosan t�r�lni akarod ezt a t�m�t?';

$lang['Download_theme_cfg'] = 'A t�ma inform�ci�s filej�t nem lehet �rni. Kattints az al�bbi gombra, hogy let�ltsd, �s ut�na m�sold be abba a k�nyvt�rba, ahol a t�ma filek vannak.';
$lang['No_themes'] = 'A kiv�lasztott t�ma nem install�lhat�, mivel nem �rv�nyes. �j t�ma k�sz�t�s�hez kattints a bal oldali men� �j men�popntj�ra';
$lang['No_template_dir'] = 'Nem lehet megnyitni a T�m�k k�nyvt�r�t. Vagy nem olvashat�, vagy nem l�tezik.';
$lang['Cannot_remove_style'] = 'Nem t�r�lheted ezt a st�lust, mivel ez az alapbe�ll�t�s�. Menj vissza �s v�lassz egy m�sikat.';
$lang['Style_exists'] = 'A kiv�lasztott st�lus neve m�r l�tezik, menj vissza �s adj meg egy m�sik nevet.';

$lang['Click_return_styleadmin'] = 'Kattints %side%s, hogy visszat�rj a St�lus Be�ll�t�sokhoz';

$lang['Theme_settings'] = 'T�ma be�ll�t�s';
$lang['Theme_element'] = 'T�ma elem';
$lang['Simple_name'] = 'Egyszer� n�v';
$lang['Value'] = '�rt�k';
$lang['Save_Settings'] = 'Be�ll�t�sok ment�se';

$lang['Stylesheet'] = 'CSS st�luslap';
$lang['Background_image'] = 'H�tt�rk�p';
$lang['Background_color'] = 'h�tt�rsz�n';
$lang['Theme_name'] = 'T�ma neve';
$lang['Link_color'] = 'Link sz�ne';
$lang['Text_color'] = 'Sz�vegsz�n';
$lang['VLink_color'] = 'l�togatott link sz�ne';
$lang['ALink_color'] = 'Akt�v link sz�ne';
$lang['HLink_color'] = 'Link feletti sz�n';
$lang['Tr_color1'] = 'T�bl�zat sor els� sz�ne';
$lang['Tr_color2'] = 'T�bl�zat sor m�sodik sz�ne';
$lang['Tr_color3'] = 'T�bl�zat sor harmadik sz�ne';
$lang['Tr_class1'] = 'T�bl�zat sor els� oszt�lya';
$lang['Tr_class2'] = 'T�bl�zat sor m�sodik oszt�lya';
$lang['Tr_class3'] = 'T�bl�zat sor harmadik oszt�lya';
$lang['Th_color1'] = 'T�bl�zat fejl�c els� sz�ne';
$lang['Th_color2'] = 'T�bl�zat fejl�c m�sodik sz�ne';
$lang['Th_color3'] = 'T�bl�zat fejl�c harmadik sz�ne';
$lang['Th_class1'] = 'T�bl�zat fejl�c els� oszt�lya';
$lang['Th_class2'] = 'T�bl�zat fejl�c m�sodik oszt�lya';
$lang['Th_class3'] = 'T�bl�zat fejl�c harmadik oszt�lya';
$lang['Td_color1'] = 'Els� cellasz�n';
$lang['Td_color2'] = 'M�sodik cellasz�n';
$lang['Td_color3'] = 'Harmadik cellasz�n';
$lang['Td_class1'] = 'Els� cellaoszt�ly';
$lang['Td_class2'] = 'M�sodik cellaoszt�ly';
$lang['Td_class3'] = 'Harmadik cellaoszt�ly';
$lang['fontface1'] = 'Els� bet�t�pus';
$lang['fontface2'] = 'M�sodik bet�t�pus';
$lang['fontface3'] = 'Harmadik bet�t�pus';
$lang['fontsize1'] = 'Els� bet�m�ret';
$lang['fontsize2'] = 'm�sodik bet�m�ret';
$lang['fontsize3'] = 'Harmadik bet�m�ret';
$lang['fontcolor1'] = 'Els� bet�sz�n';
$lang['fontcolor2'] = 'M�sodik bet�sz�n';
$lang['fontcolor3'] = 'Harmadik bet�sz�n';
$lang['span_class1'] = 'Els� bekezd�s';
$lang['span_class2'] = 'M�sodik bekezd�s';
$lang['span_class3'] = 'Harmadik bekezd�s';
$lang['img_poll_size'] = 'Szavaz�s k�pe [px]';
$lang['img_pm_size'] = 'Priv�t �zenet st�tusz m�rete [px]';


//
// Install Process
//
$lang['Welcome_install'] = '�dv�z�lj�k a phpBB 2 Telep�t�j�ben!';
$lang['Initial_config'] = 'Alap konfigur�ci�';
$lang['DB_config'] = 'Adatb�zis konfigur�ci�';
$lang['Admin_config'] = 'Adminisztr�tor konfigur�ci�';
$lang['continue_upgrade'] = 'Miut�n let�lt�tted a konfigur�ci�s filet, kattints a \'Telep�t�s folytat�sa\' gombra, hogy tov�bbl�phess a friss�t�sben. A konfigur�ci�s file felt�lt�s�vel v�rj a friss�t�s befejez�s�ig.';
$lang['upgrade_submit'] = 'Friss�t�s folytat�sa';

$lang['Installer_Error'] = 'Hiba mer�lt fel a telep�t�skor';
$lang['Previous_Install'] = 'Egy el�z� verzi� m�r telep�tve van';
$lang['Install_db_error'] = 'Hiba t�rt�nt az adatb�zis friss�t�s�nek pr�b�l�sa k�zben';

$lang['Re_install'] = 'Egy r�gebben telep�tett phpBB f�rum m�g akt�v.<br /><br />Ha �jra akarod install�lni a phpBB 2-t, kattints az al�bbi gombra. Figyelem! Ezzel a jelenlegi adatb�zis elveszik, nem k�sz�l r�la m�solat. Az el�z� F�rumhoz tartoz� adminisztr�tori felhaszn�l�n�v �s jelsz� is elveszik!<br /><br />Gondold �t, miel�tt az Igen gombra kattintasz!';

$lang['Inst_Step_0'] = 'K�sz�nj�k, hogy a phpBB-t v�lasztottad. A telep�t�s befejez�s�hez t�ltsd ki az al�bbi mez�ket. Eml�keztet��l, figyelj arra, hogy a megadott adatb�zis m�r l�tezhet a szerveren. Ha ODBC-t vagy MS Access-t haszn�l� adatb�zist haszn�lsz, akkor el�bb k�sz�ts egy DSN-t, miel�tt folytatn�d.';

$lang['Start_Install'] = 'Telep�t�s megkezd�se';
$lang['Finish_Install'] = 'Telep�t�s befejez�se';

$lang['Default_lang'] = 'F�rum nyelve';
$lang['DB_Host'] = 'Adatb�zis szerver hostneve / DNS';
$lang['DB_Name'] = 'Adatb�zis neve';
$lang['DB_Username'] = 'Adatb�zis felhaszn�l�n�v';
$lang['DB_Password'] = 'Adatb�zis jelsz�';
$lang['Database'] = 'Az adatb�zis';
$lang['Install_lang'] = 'Telep�t�s nyelve';
$lang['dbms'] = 'Adatb�zis t�pusa';
$lang['Table_Prefix'] = 'A t�bl�k el�tagja';
$lang['Admin_Username'] = 'Adminisztr�tor felhaszn�l�n�v';
$lang['Admin_Password'] = 'Adminisztr�tor jelsz�';
$lang['Admin_Password_confirm'] = 'Administrator jelsz� [ Meger�s�t�s ]';

$lang['Inst_Step_2'] = 'Az Adminisztr�tor azonos�t� elk�sz�lt, ezzel az alap telep�t�s befejez�d�tt. Most menj a F�rum f�oldal�ra, ahol a bel�p�s ut�n az Adminisztr�ci�s fel�letre kattintva be�ll�thatod a F�rum t�bbi fontos elem�t, els�sorban az �ltal�nos be�ll�t�st. K�sz�nj�k, hogy a phpBB 2-t v�lasztottad.';

$lang['Unwriteable_config'] = 'A konfigur�ci�s filet jelenleg nem lehet �rni. Egy m�solatata let�lthet� az al�bbi linkre kattintva. Ezt k�zzel t�ltsd fel a phpbb 2 gy�k�rk�nyvt�r�ba. Ezut�n l�pj be az el�bb megadott Adminisztr�tor felhaszn�l�n�vvel �s jelsz�val a F�rumba, ahol az Adminisztr�ci�s fel�letre kattintva be�ll�thatod a F�rum t�bbi fontos elem�t, els�sorban az �ltal�nos be�ll�t�st. K�sz�nj�k, hogy a phpBB 2-t v�lasztottad..';
$lang['Download_config'] = 'Be�ll�t�s let�lt�se';

$lang['ftp_choose'] = 'V�lassz let�lt�si m�dot';
$lang['ftp_option'] = '<br />Mivel a PHP ezen verzi�ja m�r k�pes kezelni az FTP-ket, �gy lehet�s�g van a konfigur�ci�s file FTP-n kereszt�li felt�lt�s�re.';
$lang['ftp_instructs'] = 'FTP-n kereszt�li phpBB felt�lt�st v�lasztott�l. Ehhez add meg az al�bbi mez�kbe az FTP hozz�f�r�s�nek adatait.';

$lang['ftp_info'] = 'FTP inform�ci�k bevitele';
$lang['Attempt_ftp'] = 'Konfigur�ci� file FTP-n kereszt�li felt�lt�se';
$lang['Send_file'] = 'phpBB felt�lt�se k�zzel';
$lang['ftp_path'] = 'phpBB 2 FTP el�r�si �tja';
$lang['ftp_username'] = 'FTP felhaszn�l�n�v';
$lang['ftp_password'] = 'FTP jelsz�';
$lang['Transfer_config'] = 'Adat�tvitel megkezd�se';
$lang['NoFTP_config'] = 'A konfigur�ci�s file FTP-n kereszt�li �tvitele sikertelen volt. T�ltsd le innen a file-t, �s k�zzel kelyezd el az FTP-re.';

$lang['Install'] = 'Telep�t�s';
$lang['Upgrade'] = 'Friss�t�s';


$lang['Install_Method'] = 'V�lassz telep�t�si m�dot';

$lang['Install_No_Ext'] = 'A szerveren fut� PHP be�ll�t�s nem t�mogatja a kiv�lasztott adatb�zis t�pus�t.';

$lang['Install_No_PCRE'] = 'A phpBB2-h�z PCRE (Perl-Compatible Regular Expressions) modul sz�ks�ges, mely nem tal�lhat� meg a PHP ezen verzi�j�ban!';

//
// That's all Folks!
// -------------------------------------------------

?>