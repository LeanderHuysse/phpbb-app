<?php

/***************************************************************************
 *                           lang_admin.php [Hungarian]
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

/***************************************************************************
 * Hungarian translation    : (C) 2002 Gergely EGERVARY
 * Email                    : mauzi@expertlan.hu
 *
 * COMMON TERMS USED:
 *
 * Permission -> Jogosults�g
 * Smiley -> Emotikon, Smiley
 * Theme -> S�ma
 * Style -> St�lus
 *
 * grep "XXX mauzi" for TODO's
 *
 ***************************************************************************/

//
// Modules, this replaces the keys used
// in the modules[][] arrays in each module file
//
$lang['General'] = "�ltal�nos";
$lang['Users'] = "Felhaszn�l�k";
$lang['Groups'] = "Csoportok";
$lang['Forums'] = "F�rumok";
$lang['Styles'] = "St�lusok";

$lang['Configuration'] = "Be�ll�t�sok";
$lang['Permissions'] = "Jogosults�gok";
$lang['Manage'] = "Menedzsment";
$lang['Disallow'] = "Foglalt nevek";
$lang['Prune'] = "Karbantart�s";
$lang['Mass_Email'] = "K�rlev�l";
$lang['Ranks'] = "Rangok";
$lang['Smilies'] = "Emotikonok";
$lang['Ban_Management'] = "Letilt�s";
$lang['Word_Censor'] = "Sz� cenzorok";
$lang['Export'] = "Export�l�s";
$lang['Create_new'] = "L�trehoz�s";
$lang['Add_new'] = "�j";
$lang['Backup_DB'] = "Adatb�zis archiv�l�sa";
$lang['Restore_DB'] = "Adatb�zis helyre�ll�t�sa";


//
// Index
//
$lang['Admin'] = "Adminisztr�ci�";
$lang['Not_admin'] = "Nincs joga adminisztr�lni ezt a f�rumot";
$lang['Welcome_phpBB'] = "�dv�zli a phpBB!";
$lang['Admin_intro'] = "K�sz�nj�k, hogy a phpBB-t v�lasztotta f�rum szoftver�nek. Ezen az oldalon megtekintheti a f�rum�nak k�l�nf�le statisztik�it. B�rmikor visszat�rhet erre az oldalra, ha az <u>Admin Index</u> linkre kattint a bal panelon. A f�rumhoz val� visszat�r�shet kattintson a phpBB log�ra, szint�n a bal panelon. A k�perny� bal oldal�n tal�lhat� linkek seg�ts�g�vel k�nnyed�n be�ll�thatja a f�rumot, minden egyes k�perny�n tal�l utas�t�sokat a haszn�lathoz.";
$lang['Main_index'] = "F�rum Tartalomjegyz�k";
$lang['Forum_stats'] = "F�rum Statisztik�k";
$lang['Admin_Index'] = "Admin Tartalomjegyz�k";
$lang['Preview_forum'] = "F�rum El�n�zet";

$lang['Click_return_admin_index'] = "Kattintson %side%s az Admin Tartalomjegyz�khez val� visszat�r�shez";

$lang['Statistic'] = "Statisztik�k";
$lang['Value'] = "�rt�k";
$lang['Number_posts'] = "Hozz�sz�l�sok sz�ma";
$lang['Posts_per_day'] = "Hozz�sz�l�sok naponta";
$lang['Number_topics'] = "T�m�k sz�ma";
$lang['Topics_per_day'] = "T�m�k naponta";
$lang['Number_users'] = "Felhaszn�l�k sz�ma";
$lang['Users_per_day'] = "Felhaszn�l�k naponta";
$lang['Board_started'] = "F�rum elind�tva";
$lang['Avatar_dir_size'] = "Avatar k�nyvt�r m�rete";
$lang['Database_size'] = "Adatb�zis m�rete";
$lang['Gzip_compression'] ="Gzip t�m�r�t�s";
$lang['Not_available'] = "Nem el�rhet�";

$lang['ON'] = "BE"; // This is for GZip compression
$lang['OFF'] = "KI"; 


//
// DB Utils
//
$lang['Database_Utilities'] = "Adatb�zis menedzsment";

$lang['Restore'] = "Helyre�ll�t�s";
$lang['Backup'] = "Archiv�l�s";
$lang['Restore_explain'] = "Helyre�ll�thatja az �sszes phpBB adatt�bl�t egy fileb�l. Ha a szerver t�mogatja, felt�lthet egy gzip t�m�r�tett filet, �s a rendszer automatikusan kicsomagolja. <b>FIGYELEM</b> Ezzel fel�l�rja az �sszes megl�v� adatot. A helyre�ll�t�s hossz� id�t vehet ig�nybe, am�g a folyamat el nem k�sz�l ne b�ng�sszen m�s oldalakat.";
$lang['Backup_explain'] = "Archiv�lhatja az �sszes phpBB adatt�bl�t. Ha vannak egy�ni adatt�bl�k a phpBB adatb�zis�ban, egy�ttal azokat is archiv�lhatja, adja az egy�ni adatt�bl�k nev�t az al�bbi mez�ben. Ha a szerver t�mogatja, t�m�r�theti az adatokat, hogy kevesebb adatot kelljen let�ltenie.";

$lang['Backup_options'] = "Archiv�l�s be�ll�t�sai";
$lang['Start_backup'] = "Archiv�l�s ind�t�sa";
$lang['Full_backup'] = "Teljes archiv�l�s";
$lang['Structure_backup'] = "Csak a strukt�ra archiv�l�sa";
$lang['Data_backup'] = "Csak az adatok archiv�l�sa";
$lang['Additional_tables'] = "Egy�b adatt�bl�k";
$lang['Gzip_compress'] = "Gzip t�m�r�t�s";
$lang['Select_file'] = "V�lasszon file-t";
$lang['Start_Restore'] = "Helyre�ll�t�s ind�t�sa";

$lang['Restore_success'] = "Az adatb�zis sikeresen helyre�ll�tva.<br /><br />A f�rum az archiv�l�s el�tti �llapot�ba ker�lt.";
$lang['Backup_download'] = "A let�lt�s hamarosan elkezd�dik. V�rjon t�relemmel";
$lang['Backups_not_supported'] = "Pardon, az adatb�zis archiv�l�s jelenleg nem t�mogatott az adatb�zis rendszer�n";

$lang['Restore_Error_uploading'] = "Hiba a file felt�lt�se sor�n";
$lang['Restore_Error_filename'] = "Filen�v hiba, pr�b�lja m�sik n�ven";
$lang['Restore_Error_decompress'] = "Nem lehet kit�m�r�teni a gzip file-t, pr�b�lja t�m�r�t�s n�lk�l";
$lang['Restore_Error_no_file'] = "Nem lett file felt�ltve";


//
// Auth pages
//
$lang['Select_a_User'] = "V�lasszon felhaszn�l�t";
$lang['Select_a_Group'] = "V�lasszon csoportot";
$lang['Select_a_Forum'] = "V�lasszon f�rumot";
$lang['Auth_Control_User'] = "Felhaszn�l�i jogosults�gok be�ll�t�sa"; 
$lang['Auth_Control_Group'] = "Csoport jogosults�gok be�ll�t�sa"; 
$lang['Auth_Control_Forum'] = "F�rum jogosults�gok be�ll�t�sa"; 
$lang['Look_up_User'] = "Felhaszn�l� megtekint�se"; 
$lang['Look_up_Group'] = "Csoport megtekint�se"; 
$lang['Look_up_Forum'] = "F�rum megtekint�se"; 

$lang['Group_auth_explain'] = "Be�ll�thatja a csoporthoz rendelt jogosults�gokat. Ne felejtse el, hogy a csoport be�ll�t�sokt�l f�ggetlen�l a felhaszn�l�k egy�ni jogosults�gai is �rv�nyben maradnak.";
$lang['User_auth_explain'] = "Be�ll�thatja a felhaszn�l�khoz rendelt jogosults�gokat. Ne felejtse el, hogy a felhaszn�l� egy�ni be�ll�t�sait�l f�ggetlen�l a csoportok jogosults�gai is �rv�nyben maradnak.";
$lang['Forum_auth_explain'] = "Be�ll�thatja az egyes f�rumok hozz�f�r�si lehet�s�geit. K�tf�le be�ll�t�si lehet�s�g k�z�l v�laszthat. Az Egyszer� m�dban sablonok alapj�n v�laszthat, a Halad� m�dban r�szletesen be�ll�thatja a hozz�f�r�si lehet�s�geket.";

$lang['Simple_mode'] = "Egyszer� m�d";
$lang['Advanced_mode'] = "Halad� m�d";
$lang['Moderator_status'] = "Moder�tor st�tusz";

$lang['Allowed_Access'] = "Hozz�f�r�s enged�lyezve";
$lang['Disallowed_Access'] = "Hozz�f�r�s tiltva";
$lang['Is_Moderator'] = "Moder�tor";
$lang['Not_Moderator'] = "Nem Moder�tor";

$lang['Conflict_warning'] = "Hozz�f�r�si jog �tk�z�s";
$lang['Conflict_access_userauth'] = "A felhaszn�l�nak a tov�bbiakban is van hozz�f�r�si joga a f�rumhoz a csoport tags�ga miatt. M�dos�tsa a csoport jogait vagy a felhaszn�l� csoport tags�g�t ha meg akarja vonni a hozz�f�r�st. Az �rintett csoportok (�s f�rumok) az al�bbiak:";
$lang['Conflict_mod_userauth'] = "A felhaszn�l�nak a tov�bbiakban is van moder�tori joga a f�rumhoz a csoport tags�ga miatt. M�dos�tsa a csoport jogait vagy a felhaszn�l� csoport tags�g�t ha meg akarja vonni moder�tori jogot. Az �rintett csoportok (�s f�rumok) az al�bbiak:";

$lang['Conflict_access_groupauth'] = "Az al�bbi felhaszn�l�nak (vagy felhaszn�l�knak) a tov�bbiakban is van hozz�f�r�si joga a f�rumhoz az egy�ni jogosults�gaik miatt. M�dos�tsa a felhaszn�l� (vagy felhaszn�l�k) jogosults�gait, ha meg akarja vonni a hozz�f�r�st. Az �rintett felhaszn�l�k (�s f�rumok) az al�bbiak:";
$lang['Conflict_mod_groupauth'] = "Az al�bbi felhaszn�l�nak (vagy felhaszn�l�knak) a tov�bbiakban is van moder�tori joga a f�rumhoz az egy�ni jogosults�gaik miatt. M�dos�tsa a felhaszn�l� (vagy felhaszn�l�k) jogosults�gait, ha meg akarja vonni a moder�tori jogokat. Az �rintett felhaszn�l�k (�s f�rumok) az al�bbiak:";

$lang['Public'] = "Publikus";
$lang['Private'] = "Priv�t";
$lang['Registered'] = "Regisztr�lt";
$lang['Administrators'] = "Adminisztr�torok";
$lang['Hidden'] = "Rejtett";

// These are displayed in the drop down boxes for advanced
// mode forum auth, try and keep them short!
$lang['Forum_ALL'] = "MIND";
$lang['Forum_REG'] = "REG";
$lang['Forum_PRIVATE'] = "PRIV�T";
$lang['Forum_MOD'] = "MOD";
$lang['Forum_ADMIN'] = "ADMIN";

$lang['View'] = "Megtekint�s";
$lang['Read'] = "Olvas�s";
$lang['Post'] = "Hozz�sz�l�s";
$lang['Reply'] = "V�laszol�s";
$lang['Edit'] = "Szerkeszt�s";
$lang['Delete'] = "T�rl�s";
$lang['Sticky'] = "Fontos";
$lang['Announce'] = "Hirdetm�ny"; 
$lang['Vote'] = "Szavaz�s";
$lang['Pollcreate'] = "Szavaz�s nyit�sa";

$lang['Permissions'] = "Jogosults�gok";
$lang['Simple_Permission'] = "Egyszer� jogosults�g";

$lang['User_Level'] = "Felhaszn�l�i szint"; 
$lang['Auth_User'] = "Felhaszn�l�";
$lang['Auth_Admin'] = "Adminisztr�tor";
$lang['Group_memberships'] = "Csoport tags�g";
$lang['Usergroup_members'] = "A csoport tagjai:";

$lang['Forum_auth_updated'] = "F�rum jogosults�gok friss�tve";
$lang['User_auth_updated'] = "Felhaszn�l� jogosults�gok friss�tve";
$lang['Group_auth_updated'] = "Csoport jogosults�gok friss�tve";

$lang['Auth_updated'] = "Jogosults�gok friss�tve";
$lang['Click_return_userauth'] = "Kattintson %side%s a Felhaszn�l�i Jogosults�gok val� visszat�r�shez";
$lang['Click_return_groupauth'] = "Kattintson %side%s a Csoport Jogosults�gok val� visszat�r�shez";
$lang['Click_return_forumauth'] = "Kattintson %side%s a F�rum Jogosults�gok val� visszat�r�shez";


//
// Banning
//
$lang['Ban_control'] = "Letilt�sok Be�ll�t�sa";
$lang['Ban_explain'] = "Letilthat felhaszn�l�i azonos�t�kat, IP c�m tartom�nyokat, g�pneveket. A letiltott g�pek a f�rum tartalomjegyz�k�t sem tudj�k el�rni. Ha meg akarja akad�lyozni, hogy a felhaszn�l� m�sik azonos�t�t regisztr�ljon, tiltsa le az email c�m�t. Ha csak az email c�met tiltja le, a felhaszn�l� a tov�bbiakban is tudja olvasni a f�rumot, valamint tud hozz�sz�l�sokat �rni.";
$lang['Ban_explain_warn'] = "Fontos: Lecs�kkentheti az adatb�zisba ker�l� IP c�mek mennyis�g�t, ha haszn�lja a Joker karaktereket. Ha mindenk�ppen fel kell sorolnia t�bb egyedi c�met, �gyeljen a lista egyszer�s�g�re �s �tl�that�s�g�ra.";

$lang['Select_username'] = "V�lasszon felhaszn�l�nevet";
$lang['Select_ip'] = "V�lasszon IP c�met";
$lang['Select_email'] = "V�lasszon Email c�met";

$lang['Ban_username'] = "Egy vagy t�bb felhaszn�l� letilt�sa";
$lang['Ban_username_explain'] = "T�bb felhaszn�l�t is letilthat egyszerre, ha t�bb nevet kijel�l a b�ng�sz�j�ben";

$lang['Ban_IP'] = "Egy vagy t�bb IP c�m vagy g�pn�v letilt�sa";
$lang['IP_hostname'] = "IP c�mek vagy g�pnevek";
$lang['Ban_IP_explain'] = "T�bb IP c�m vagy g�pn�v megad�sakor haszn�lja a vessz�t (,) elv�laszt�sra. IP c�mtartom�ny megad�s�hoz haszn�lja a k�t�jelet (-) az els� �s az utols� c�m elv�laszt�s�hoz. Haszn�lja a csillagot (*) mint Joker";

$lang['Ban_email'] = "Egy vagy t�bb Email c�m letilt�sa";
$lang['Ban_email_explain'] = "T�bb email c�m megad�sakor haszn�lja a vessz�t (,) elv�laszt�sra. Haszn�lja a csillagot (*) mint Joker. P�ld�ul: *@hotmail.com";

$lang['Unban_username'] = "Egy vagy t�bb felhaszn�l� letilt�s�nak felold�sa";
$lang['Unban_username_explain'] = "T�bb felhaszn�l� letilt�s�t is feloldhatja egyszerre, ha t�bb nevet kijel�l a b�ng�sz�j�ben";

$lang['Unban_IP'] = "Egy vagy t�bb IP c�m vagy g�pn�v letilt�s�nak felold�sa";
$lang['Unban_IP_explain'] = "T�bb IP c�m vagy g�pn�v letilt�s�t is feloldhatja egyszerre, ha t�bb IP c�met vagy g�pnevet kijel�l a b�ng�sz�j�ben";

$lang['Unban_email'] = "Egy vagy t�bb Email c�m letilt�s�nak felold�sa";
$lang['Unban_email_explain'] = "T�bb email c�m letilt�s�t is feloldhatja egyszerre, ha t�bb email c�met kijel�l a b�ng�sz�j�ben ";

$lang['No_banned_users'] = "Nincsenek letiltott felhaszn�l�k";
$lang['No_banned_ip'] = "Nincsenek letiltott IP c�mek";
$lang['No_banned_email'] = "Nincsenek letiltott Email c�mek";

$lang['Ban_update_sucessful'] = "A letilt�sok sikeresen friss�tve";
$lang['Click_return_banadmin'] = "Kattintson %side%s a Letilt�sok Be�ll�t�s�hoz val� visszat�r�shez";


//
// Configuration
//
$lang['General_Config'] = "�ltal�nos Be�ll�t�sok";
$lang['Config_explain'] = "Be�ll�thatja a f�rum alapvet� tulajdons�gait. A felhaszn�l�k, csoportok, �s a f�rum tov�bbi adminisztr�l�s�hoz haszn�lja a linkeket a bal panelon.";

$lang['Click_return_config'] = "Kattintson %side%s az �ltal�nos Be�ll�t�sokhoz val� visszat�r�shez";

$lang['General_settings'] = "�ltal�nos f�rum be�ll�t�sok";
$lang['Site_name'] = "F�rum neve";
$lang['Site_desc'] = "F�rum le�r�sa";
$lang['Board_disable'] = "F�rum letilt�sa";
$lang['Board_disable_explain'] = "A felhaszn�l�k nem �rik el a f�rumot. Ne jelentkezzen ki, am�g a f�rum le van tiltva, mert nem fog tudni vissza bejelentkezni!";
$lang['Acct_activation'] = "Azonos�t� aktiv�l�s";
$lang['Acc_None'] = "Nincs"; // These three entries are the type of activation
$lang['Acc_User'] = "Felhaszn�l�";
$lang['Acc_Admin'] = "Adminisztr�tor";

$lang['Abilities_settings'] = "Felhaszn�l� �s F�rum alapbe�ll�t�sok";
$lang['Max_poll_options'] = "V�laszt�si lehet�s�gek maxim�lis sz�ma szavaz�sn�l";
$lang['Flood_Interval'] = "Flood Peri�dus";
$lang['Flood_Interval_explain'] = "Id�tartam, aminek el kell telnie egy felhaszn�l� hozz�sz�l�sai k�z�tt"; 
$lang['Board_email_form'] = "Levelez�s a f�rumon kereszt�l";
$lang['Board_email_form_explain'] = "A felhaszn�l�k levelezhetnek a f�rumon kereszt�l";
$lang['Topics_per_page'] = "T�m�k oldalank�nt";
$lang['Posts_per_page'] = "Hozz�sz�l�sok oldalank�nt";
$lang['Hot_threshold'] = "Posts for Popular Threshold"; // XXX mauzi TODO
$lang['Default_style'] = "Alap�rtelmezett st�lus";
$lang['Override_style'] = "St�lus�nak fel�lb�r�l�sa";
$lang['Override_style_explain'] = "Fel�lb�r�lja a felhaszn�l�k st�lus be�ll�t�sait";
$lang['Default_language'] = "Alap�rtelmezett nyelv";
$lang['Date_format'] = "D�tum form�tum";
$lang['System_timezone'] = "Rendszer id�z�na";
$lang['Enable_gzip'] = "GZip t�m�r�t�s enged�lyez�se";
$lang['Enable_prune'] = "F�rum karbantart�s enged�lyez�se";
$lang['Allow_HTML'] = "HTML Enged�lyez�se";
$lang['Allow_BBCode'] = "BBCode Enged�lyez�se";
$lang['Allowed_tags'] = "Enged�lyezett HTML tag-ek";
$lang['Allowed_tags_explain'] = "Haszn�lja a vessz�t elv�laszt�sra";
$lang['Allow_smilies'] = "Emotikonok enged�lyez�se";
$lang['Smilies_path'] = "Emotikonok el�r�si �tja";
$lang['Smilies_path_explain'] = "El�r�si �t a phpBB f�k�nyvt�ra alatt, pl. images/smilies";
$lang['Allow_sig'] = "Al��r�sok enged�lyez�se";
$lang['Max_sig_length'] = "Al��r�sok maxim�lis hossza";
$lang['Max_sig_length_explain'] = "Maximum enged�lyezett karakterek az al��r�sban";
$lang['Allow_name_change'] = "Felhaszn�l�n�v m�dos�t�s enged�lyez�se";

$lang['Avatar_settings'] = "Avatar Be�ll�t�sok";
$lang['Allow_local'] = "Avatar gal�ria enged�lyez�se";
$lang['Allow_remote'] = "Avatar belinkel�se t�voli g�pr�l";
$lang['Allow_remote_explain'] = "M�s Weboldalakra felt�lt�tt k�pek enged�lyez�se";
$lang['Allow_upload'] = "Avatar felt�lt�s enged�lyez�se";
$lang['Max_filesize'] = "Avatar file maxim�lis m�rete";
$lang['Max_filesize_explain'] = "A felt�lt�tt avatar fileokra";
$lang['Max_avatar_size'] = "Avatar k�p maxim�lis m�rete";
$lang['Max_avatar_size_explain'] = "(Magass�g x Sz�less�g pixelben)";
$lang['Avatar_storage_path'] = "Avatar el�r�si �t";
$lang['Avatar_storage_path_explain'] = "El�r�si �t a phpBB f�k�nyvt�ra alatt, pl. images/avatars";
$lang['Avatar_gallery_path'] = "Avatar gal�ria el�r�si �t";
$lang['Avatar_gallery_path_explain'] = " El�r�si �t a phpBB f�k�nyvt�ra alatt, pl. images/avatars/gallery";

$lang['COPPA_settings'] = "COPPA Be�ll�t�sok";
$lang['COPPA_fax'] = "COPPA Fax sz�m";
$lang['COPPA_mail'] = "COPPA Postac�m";
$lang['COPPA_mail_explain'] = "Erre a postac�mre kell elk�ldeni a sz�l�knek a COPPA regisztr�ci�s k�rd��vet";

$lang['Email_settings'] = "Email Be�ll�t�sok";
$lang['Admin_email'] = "Adminisztr�tor Email c�me";
$lang['Email_sig'] = "Email Al��r�s";
$lang['Email_sig_explain'] = "Ez a sz�vegr�szlet minden lev�lhez csatolhat�, amit a f�rum k�ld a felhaszn�l�knak";
$lang['Use_SMTP'] = "SMTP szerver haszn�lata a levelez�shez";
$lang['Use_SMTP_explain'] = "V�lassza ezt a lehet�s�get, ha egy SMTP szerveren kereszt�l akarja k�ldeni a leveleket a helyi sendmail helyett";
$lang['SMTP_server'] = "SMTP szerver c�me";

$lang['Disable_privmsg'] = "Priv�t �zenetek";
$lang['Inbox_limits'] = "Maxim�lis �zenetek sz�ma a Be�rkezett �zenetek mapp�ban";
$lang['Sentbox_limits'] = "Maxim�lis �zenetek sz�ma az Elk�ld�tt �zenetek mapp�ban";
$lang['Savebox_limits'] = "Maxim�lis �zenetek sz�ma az Elmentett �zenetek mapp�ban";

$lang['Cookie_settings'] = "Cookie Be�ll�t�sok"; 
$lang['Cookie_settings_explain'] = "Be�ll�thatja a b�ng�sz�knek k�ld�tt cookie-kat. A legt�bb esetben az alapbe�ll�t�sok megfelel�ek. Legyen k�r�ltekint�, mert egy helytelen be�ll�t�s megakad�lyozhatja a felhaszn�l�k bel�p�s�t.";
$lang['Cookie_name'] = "Cookie neve";
$lang['Cookie_domain'] = "Cookie domain";
$lang['Cookie_path'] = "Cookie el�r�si �t";
$lang['Session_length'] = "Cookie �rv�nyess�ge [ m�sodperc ]";
$lang['Cookie_secure'] = "Cookie k�dol�sa [ https ]";


//
// Forum Management
//
$lang['Forum_admin'] = "F�rum Adminisztr�ci�";
$lang['Forum_admin_explain'] = "Hozz�adhat, t�r�lhet, szerkeszthet, �trendezhet f�rumokat �s t�mak�r�ket";
$lang['Edit_forum'] = "F�rum szerkeszt�se";
$lang['Create_forum'] = "�j f�rum l�trehoz�sa";
$lang['Create_category'] = "�j t�mak�r l�trehoz�sa";
$lang['Remove'] = "T�rl�s";
$lang['Action'] = "Action"; // XXX mauzi innetol
$lang['Update_order'] = "Update Order";
$lang['Config_updated'] = "F�rum be�ll�t�sok sikeresen friss�tve";
$lang['Edit'] = "Szerkeszt�s";
$lang['Delete'] = "T�rl�s";
$lang['Move_up'] = "Feljebb";
$lang['Move_down'] = "Lejjebb";
$lang['Resync'] = "Szinkroniz�l�s";
$lang['No_mode'] = "No mode was set";
$lang['Forum_edit_delete_explain'] = "The form below will allow you to customize all the general board options. For User and Forum configurations use the related links on the left hand side";

$lang['Move_contents'] = "Move all contents";
$lang['Forum_delete'] = "F�rum t�rl�se";
$lang['Forum_delete_explain'] = "The form below will allow you to delete a forum (or category) and decide where you want to put all topics (or forums) it contained.";

$lang['Forum_settings'] = "F�rum �ltal�nos be�ll�t�sai";
$lang['Forum_name'] = "F�rum neve";
$lang['Forum_desc'] = "Le�r�sa";
$lang['Forum_status'] = "F�rum st�tusza";
$lang['Forum_pruning'] = "Automatikus karbantart�s";

$lang['prune_freq'] = 'Check for topic age every';
$lang['prune_days'] = "T�rli azokat a t�m�kat, amelyekhez nem sz�ltak hozz�";
$lang['Set_prune_data'] = "You have turned on auto-prune for this forum but did not set a frequency or number of days to prune. Please go back and do so";

$lang['Move_and_Delete'] = "Mozgat�s �s T�rl�s";

$lang['Delete_all_posts'] = "�sszes hozz�sz�l�s t�rl�se";
$lang['Nowhere_to_move'] = "Nincs hova mozgatni";

$lang['Edit_Category'] = "T�mak�r szerkeszt�se";
$lang['Edit_Category_explain'] = "Haszn�lja ezt a mez�t a t�mak�r �tnevez�s�hez";

$lang['Forums_updated'] = "F�rum �s T�mak�r inform�ci�k sikeresen friss�tve";

$lang['Must_delete_forums'] = "T�r�lnie kell az �sszes f�rumot a t�mak�r t�rl�se el�tt";

$lang['Click_return_forumadmin'] = "Kattintson %side%s a F�rum Adminisztr�ci�hoz val� visszat�r�shez";


//
// Smiley Management
//
$lang['smiley_title'] = "Emotikonok szerkeszt�se";
$lang['smile_desc'] = "Az al�bbiakban megadhatja az emotikonokat, amit a felhaszn�l�k alkalmazhatnak a hozz�sz�l�saikban �s a Priv�t �zeneteikben.";

$lang['smiley_config'] = "Smiley Be�ll�t�sok";
$lang['smiley_code'] = "Smiley K�d";
$lang['smiley_url'] = "Smiley Image File";
$lang['smiley_emot'] = "Smiley Emotion";
$lang['smile_add'] = "�j emotikon";
$lang['Smile'] = "Smile";
$lang['Emotion'] = "Jelent�s";

$lang['Select_pak'] = "Select Pack (.pak) File";
$lang['replace_existing'] = "Jelenlegi Smiley lecser�l�se";
$lang['keep_existing'] = "Jelenlegi Smiley megtart�sa";
$lang['smiley_import_inst'] = "You should unzip the smiley package and upload all files to the appropriate Smiley directory for your installation.  Then select the correct information in this form to import the smiley pack.";
$lang['smiley_import'] = "Smiley Pack Import";
$lang['choose_smile_pak'] = "Choose a Smile Pack .pak file";
$lang['import'] = "Import Smileys";
$lang['smile_conflicts'] = "What should be done in case of conflicts";
$lang['del_existing_smileys'] = "Delete existing smileys before import";
$lang['import_smile_pack'] = "Smiley Csomag import�l�sa";
$lang['export_smile_pack'] = "Smiley Csomag export�l�sa";
$lang['export_smiles'] = "To create a smiley pack from your currently installed smileys, click %sHere%s to download the smiles.pak file. Name this file appropriately making sure to keep the .pak file extension.  Then create a zip file containing all of your smiley images plus this .pak configuration file.";

$lang['smiley_add_success'] = "A Smiley sikeresen hozz�adva";
$lang['smiley_edit_success'] = "A Smiley sikeresen friss�tve";
$lang['smiley_import_success'] = "A Smiley Csomag sikeresen import�lva!";
$lang['smiley_del_success'] = "A Smiley sikeresen elt�vol�tva";
$lang['Click_return_smileadmin'] = "Kattintson %side%s az Emotikonok szerkeszt�s�hez val� visszat�r�shez";


//
// User Management
//
$lang['User_admin'] = "Felhaszn�l� Adminisztr�ci�";
$lang['User_admin_explain'] = "Az al�bbiakban megv�ltoztathatja a felhaszn�l�k be�ll�t�sait. A jogosults�gok m�dos�t�s�hoz haszn�lja a Felhaszn�l� �s Csoport Jogosults�gok rendszer�t.";

$lang['Look_up_user'] = "Felhaszn�l� megtekint�se";

$lang['Admin_user_fail'] = "Nem lehet friss�teni a felhaszn�l� profilj�t.";
$lang['Admin_user_updated'] = "A felhaszn�l� profilja sikeresen friss�tve.";
$lang['Click_return_useradmin'] = "Kattintson %side%s a Felhaszn�l� Adminisztr�ci�hoz val� visszat�r�shez";

$lang['User_delete'] = "Felhaszn�l� t�rl�se";
$lang['User_delete_explain'] = "Kattintson ide a felhaszn�l� t�rl�s�hez. Ezt nem lehet vissza�ll�tani.";
$lang['User_deleted'] = "Felhaszn�l� sikeresen t�r�lve";

$lang['User_status'] = "A felhaszn�l� akt�v";
$lang['User_allowpm'] = "K�ldhet Priv�t �zenetet";
$lang['User_allowavatar'] = "Be�ll�that Avatar k�pet";

$lang['Admin_avatar_explain'] = "Megtekintheti �s t�r�lheti a felhaszn�l� jelenlegi avatarj�t.";

$lang['User_special'] = "Speci�lis adminisztr�tori mez�k";
$lang['User_special_explain'] = "Ezeket a be�ll�t�sokat a felhaszn�l�k nem tudj�k megv�ltoztatni.";


//
// Group Management
//
$lang['Group_administration'] = "Csoport Adminisztr�ci�";
$lang['Group_admin_explain'] = "Az al�bbiakban adminisztr�lhatja a felhaszn�l� csoportokat, l�trehozhat, szerkeszthet, t�r�lhet csoportokat. Megadhatja a csoport moder�tor�t, megv�ltoztathatja a csoport hozz�f�r�si m�dj�t.";
$lang['Error_updating_groups'] = "Hiba t�rt�nt a csoport friss�t�se k�zben";
$lang['Updated_group'] = "A csoport sikeresen friss�tve";
$lang['Added_new_group'] = "A csoport sikeresen l�trehozva";
$lang['Deleted_group'] = "A csoport sikeresen t�r�lve";
$lang['New_group'] = "�j csoport l�trehoz�sa";
$lang['Edit_group'] = "Csoport szerkeszt�se";
$lang['group_name'] = "Csoport neve";
$lang['group_description'] = "Csoport le�r�sa";
$lang['group_moderator'] = "Csoport moder�tor";
$lang['group_status'] = "Csoport st�tusz";
$lang['group_open'] = "Ny�lt csoport";
$lang['group_closed'] = "Z�rt csoport";
$lang['group_hidden'] = "Rejtett csoport";
$lang['group_delete'] = "Csoport t�rl�se";
$lang['group_delete_check'] = "T�rli ezt a csoportot?";
$lang['submit_group_changes'] = "V�ltoztat�sok �rv�nyes�t�se";
$lang['reset_group_changes'] = "V�ltoztat�sok visszavon�sa";
$lang['No_group_name'] = "Meg kell adnia egy csoportnevet";
$lang['No_group_moderator'] = "Meg kell adnia egy moder�tort ennek a csoportnak";
$lang['No_group_mode'] = "Meg kell adnia a csoport m�dj�t";
$lang['delete_group_moderator'] = "R�gi csoport moder�tor t�rl�se?";
$lang['delete_moderator_explain'] = "Ha megv�ltoztatja a csoport moder�tor�t, v�lassza ezt a lehet�s�get a r�gi moder�tor csoporttags�g�nak megsz�ntet�s�hez. Egy�bk�nt a r�gi moder�tor tagja marad a csoportnak.";
$lang['Click_return_groupsadmin'] = "Kattintson %side%s a Csoport Adminisztr�ci�hoz val� visszat�r�shez.";
$lang['Select_group'] = "V�lasszon csoportot";
$lang['Look_up_group'] = "Csoport megtekint�se";


//
// Prune Administration
//
$lang['Forum_Prune'] = "F�rum karbantart�s";
$lang['Forum_Prune_explain'] = "T�r�lheti azokat a t�m�kat, amelyekre egy megadott ideje nem �rkezett hozz�sz�l�s. Ha nem ad meg id�tartamot, az �sszes t�ma t�rl�dik. A rendszer nem t�rli azokat a t�m�kat, amelyekben m�g akt�v szavaz�sok folynak, valamint nem t�rli a h�rdetm�nyeket. Ezeket csak k�zzel lehet elt�vol�tani.";
$lang['Do_Prune'] = "Kezd�dhet a t�rl�s!";
$lang['All_Forums'] = "�sszes f�rum";
$lang['Prune_topics_not_posted'] = "T�ma t�rl�se, ha nem �rkezett hozz�sz�l�s ennyi ideig:";
$lang['Topics_pruned'] = "T�m�k t�r�lve";
$lang['Posts_pruned'] = "Hozz�sz�l�sok t�r�lve";
$lang['Prune_success'] = "A f�rum karbantart�sa sikeresen elk�sz�lt";


//
// Word censor
//
$lang['Words_title'] = "Sz� cenz�r�z�s";
$lang['Words_explain'] = "Az al�bbiakban megadhatja azokat a szavakat, amelyek automatikusan cenz�r�zva lesznek a f�rumon. Haszn�lja a Joker karaktert (*) sz�t�red�kek megad�s�hoz. P�ld�ul *pr�b�l* megfelelhet a kipr�b�lhat�, pr�b�l* megfelelhet a pr�b�lhat�, *pr�b�l megfelelhet a kipr�b�l szavaknak.";
$lang['Word'] = "Sz�";
$lang['Edit_word_censor'] = "Szerkeszt�s";
$lang['Replacement'] = "Helyettes�t�";
$lang['Add_new_word'] = "�j sz� hozz�ad�sa";
$lang['Update_word'] = "Friss�t�s";

$lang['Must_enter_word'] = "Meg kell adnia egy sz�t, �s egy helyettes�t� sz�t.";
$lang['No_word_selected'] = "Nem adott meg sz�t a szerkeszt�shez";

$lang['Word_updated'] = "A sz� sikeresen friss�tve";
$lang['Word_added'] = "A sz� sikeresen hozz�adva";
$lang['Word_removed'] = "A sz� sikeresen elt�vol�tva";

$lang['Click_return_wordadmin'] = "Kattintson %side%s a Sz� cenz�r�z�shoz val� visszat�r�shez";


//
// Mass Email
//
$lang['Mass_email_explain'] = "Az al�bbiakban levelet k�ldhet az �sszes felhaszn�l�nak, vagy egy csoport �sszes tagj�nak. Egy lev�l fog �rkezni a megadott adminisztr�tori email c�mre, ahol a Bcc: mez�ben fog szerepelni a felhaszn�l�k c�me. Ha sok felhaszn�l�nak k�ld levelet, legyen t�relemmel a k�ld�sn�l. A k�rlev�l k�ld�se hossz� id�t vehet ig�nybe, ne �ll�tsa le a folyamatot, a v�g�n kap �rtes�t�st, ha a rendszer elk�sz�lt.";
$lang['Compose'] = "Lev�l �r�sa"; 

$lang['Recipients'] = "C�mzettek"; 
$lang['All_users'] = "�sszes felhaszn�l�";

$lang['Email_successfull'] = "Az �zenet elk�ldve";
$lang['Click_return_massemail'] = "Kattintson %side%s a K�rlev�l k�ld�shez val� visszat�r�shez";


//
// Ranks admin
//
$lang['Ranks_title'] = "Rang Adminisztr�ci�";
$lang['Ranks_explain'] = "Az al�bbiakban megadhat felhaszn�l�i rangokat. A speci�lis rangok be�ll�t�s�hoz haszn�lja a Felhaszn�l� Menedzsment lehet�s�get";

$lang['Add_new_rank'] = "�j rang hozz�ad�sa";

$lang['Rank_title'] = "Rang c�me";
$lang['Rank_special'] = "Speci�lis rangk�nt be�ll�t�s";
$lang['Rank_minimum'] = "Minimum Hozz�sz�l�sok";
$lang['Rank_maximum'] = "Maximum Hozz�sz�l�sok";
$lang['Rank_image'] = "Rangjelz� k�p (El�r�si �t a phpBB f�k�nyvt�ra alatt)";
$lang['Rank_image_explain'] = "K�pet t�rs�that a ranghoz";

$lang['Must_select_rank'] = "Ki kell v�lasztania egy rangot";
$lang['No_assigned_rank'] = "Nincs rang hozz�rendelve";

$lang['Rank_updated'] = "Rang sikeresen friss�tve";
$lang['Rank_added'] = "Rang sikeresen hozz�adva";
$lang['Rank_removed'] = "Rang sikeresen t�r�lve";

$lang['Click_return_rankadmin'] = "Kattintson %side%s a Rang Adminisztr�ci�hoz val� visszat�r�shez";


//
// Disallow Username Admin
//
$lang['Disallow_control'] = "Foglalt felhaszn�l�nevek Be�ll�t�sa";
$lang['Disallow_explain'] = "Here you can control usernames which will not be allowed to be used.  Disallowed usernames are allowed to contain a wildcard character of *.  Please note that you will not be allowed to specify any username that has already been registered, you must first delete that name then disallow it";

$lang['Delete_disallow'] = "T�rl�s";
$lang['Delete_disallow_title'] = "Foglalt felhaszn�l�n�v t�rl�se";
$lang['Delete_disallow_explain'] = "You can remove a disallowed username by selecting the username from this list and clicking submit";

$lang['Add_disallow'] = "Hozz�ad�s";
$lang['Add_disallow_title'] = "Foglalt felhaszn�l�n�v hozz�ad�sa";
$lang['Add_disallow_explain'] = "Haszn�lja a * karaktert, mint Joker";

$lang['No_disallowed'] = "Nincsenek foglalt nevek";

$lang['Disallowed_deleted'] = "A foglalt felhaszn�l�n�v sikeresen t�r�lve";
$lang['Disallow_successful'] = "A foglalt felhaszn�l�n�v sikeresen hozz�adva";
$lang['Disallowed_already'] = "The name you entered could not be disallowed. It either already exists in the list, exists in the word censor list, or a matching username is present";

$lang['Click_return_disallowadmin'] = "Kattintson %side%s a Foglalt felhaszn�l�nevek adminisztr�ci�j�hoz val� visszat�r�shez";


//
// Styles Admin
//
$lang['Styles_admin'] = "St�lus Adminisztr�ci�";
$lang['Styles_explain'] = "Using this facility you can add, remove and manage styles (templates and themes) available to your users";
$lang['Styles_addnew_explain'] = "The following list contains all the themes that are available for the templates you currently have. The items on this list have not yet been installed into the phpBB database. To install a theme simply click the install link beside an entry";

$lang['Select_template'] = "V�lasszon Sablont";

$lang['Style'] = "St�lus";
$lang['Template'] = "Sablon";
$lang['Install'] = "Install�l�s";
$lang['Download'] = "Let�lt�s";

$lang['Edit_theme'] = "S�ma Szerkeszt�se";
$lang['Edit_theme_explain'] = "Az al�bbiakban szerkesztheti a s�ma be�ll�t�sait";

$lang['Create_theme'] = "S�ma L�trehoz�sa";
$lang['Create_theme_explain'] = "Az al�bbiakban l�trehozhat egy �j s�m�t. Ha sz�neket defini�l (�s hexadecim�lisan adja meg az �rt�keket) ne haszn�lja a # el�tagot, pl. CCCCCC egy �rv�nyes, #CCCCCC egy �rv�nytelen �rt�k";

$lang['Export_themes'] = "S�ma Export�l�sa";
$lang['Export_explain'] = "In this panel you will be able to export the theme data for a selected template. Select the template from the list below and the script will create the theme configuration file and attempt to save it to the selected template directory. If it cannot save the file itself it will give you the option to download it. In order for the script to save the file you must give write access to the webserver for the selected template dir. For more information on this see the phpBB 2 users guide.";

$lang['Theme_installed'] = "The selected theme has been installed successfully";
$lang['Style_removed'] = "The selected style has been removed from the database. To fully remove this style from your system you must delete the appropriate style from your templates directory.";
$lang['Theme_info_saved'] = "The theme information for the selected template has been saved. You should now return the permissions on the theme_info.cfg (and if applicable the selected template directory) to read-only";
$lang['Theme_updated'] = "The selected theme has been updated. You should now export the new theme settings";
$lang['Theme_created'] = "Theme created. You should now export the theme to the theme configuration file for safe keeping or use elsewhere"; // XXX mauzi idaig

$lang['Confirm_delete_style'] = "Biztos benne, hogy t�r�lni akarja ezt a st�lust?";

$lang['Download_theme_cfg'] = "Nem lehet export�lni a s�ma inform�ci�s filet. Kattintson a lenti gombra a file let�lt�s�hez. A let�lt�s ut�n bem�solhatja a megfelel� k�nyvt�rba, vagy felhaszn�lhatja m�s f�rumokon";
$lang['No_themes'] = "A megadott sablonhoz nem tartozik s�ma. �j s�ma l�trehoz�s�hoz kattintson az �j St�lus linkre a bal panelon";
$lang['No_template_dir'] = "Nem lehet megnyitni a sablon k�nyvt�rat. Lehet, hogy nem l�tezik, vagy a Web szervernek nincs hozz�f�r�si joga";
$lang['Cannot_remove_style'] = "Nem lehet elt�vol�tani a megadott st�lust, mert jelenleg ez a f�rum alap�rtelmezett st�lusa. �ll�tsa �t az alap�rtelmezett st�lust, �s pr�b�lja �jra.";
$lang['Style_exists'] = "A megadott st�lusn�v m�r l�tezik, v�lasszon m�sik nevet.";

$lang['Click_return_styleadmin'] = "Kattintson %side%s a St�lus Adminisztr�ci�hoz val� visszat�r�shez";

$lang['Theme_settings'] = "S�ma be�ll�t�sai";
$lang['Theme_element'] = "S�ma elem";
$lang['Simple_name'] = "Egyszer� n�v";
$lang['Value'] = "�rt�k";
$lang['Save_Settings'] = "Be�ll�t�sok ment�se";

$lang['Stylesheet'] = "CSS sablon";
$lang['Background_image'] = "H�tt�r k�p";
$lang['Background_color'] = "H�tt�r sz�n";
$lang['Theme_name'] = "S�ma neve";
$lang['Link_color'] = "Link sz�n";
$lang['Text_color'] = "Sz�veg sz�n";
$lang['VLink_color'] = "L�togatott link sz�n";
$lang['ALink_color'] = "Akt�v link sz�n";
$lang['HLink_color'] = "Hover link sz�n";
$lang['Tr_color1'] = "T�bl�zat sor sz�n 1";
$lang['Tr_color2'] = "T�bl�zat sor sz�n 2";
$lang['Tr_color3'] = "T�bl�zat sor sz�n 3";
$lang['Tr_class1'] = "T�bl�zat sor csoport 1";
$lang['Tr_class2'] = "T�bl�zat sor csoport 2";
$lang['Tr_class3'] = "T�bl�zat sor csoport 3";
$lang['Th_color1'] = "T�bl�zat fejl�c sz�n 1";
$lang['Th_color2'] = "T�bl�zat fejl�c sz�n 2";
$lang['Th_color3'] = "T�bl�zat fejl�c sz�n 3";
$lang['Th_class1'] = "T�bl�zat fejl�c csoport 1";
$lang['Th_class2'] = "T�bl�zat fejl�c csoport 2";
$lang['Th_class3'] = "T�bl�zat fejl�c csoport 3";
$lang['Td_color1'] = "T�bl�zat cella sz�n 1";
$lang['Td_color2'] = "T�bl�zat cella sz�n 2";
$lang['Td_color3'] = "T�bl�zat cella sz�n 3";
$lang['Td_class1'] = "T�bl�zat cella csoport 1";
$lang['Td_class2'] = "T�bl�zat cella csoport 2";
$lang['Td_class3'] = "T�bl�zat cella csoport 3";
$lang['fontface1'] = "Bet�t�pus 1";
$lang['fontface2'] = "Bet�t�pus 2";
$lang['fontface3'] = "Bet�t�pus 3";
$lang['fontsize1'] = "Bet�t�pus 1";
$lang['fontsize2'] = "Bet�t�pus 2";
$lang['fontsize3'] = "Bet�t�pus 3";
$lang['fontcolor1'] = "Bet�sz�n 1";
$lang['fontcolor2'] = "Bet�sz�n 2";
$lang['fontcolor3'] = "Bet�sz�n 3";
$lang['span_class1'] = "Bet�sz�n 1";
$lang['span_class2'] = "Bet�sz�n 2";
$lang['span_class3'] = "Bet�sz�n 3";
$lang['img_poll_size'] = "Szavaz�s k�p m�rete [pixel]";
$lang['img_pm_size'] = "Priv�t �zenet St�tusz k�p m�rete [pixel]";


//
// Install Process
//
$lang['Welcome_install'] = "�dv�zli a phpBB2 telep�t�!";
$lang['Initial_config'] = "�ltal�nos Be�ll�t�sok";
$lang['DB_config'] = "Adatb�zis Be�ll�t�sok";
$lang['Admin_config'] = "Adminisztr�tor Be�ll�t�sok";
$lang['continue_upgrade'] = "Miut�n let�lt�tte a konfigur�ci�s filet a g�p�re, kattintson a \"Friss�t�s\" gombra a folyamat elind�t�s�hoz. V�rjon a konfigur�ci�s file felt�lt�s�vel, am�g a friss�t�si folyamat befejez�dik.";
$lang['upgrade_submit'] = "Friss�t�s";

$lang['Installer_Error'] = "Hiba t�rt�nt a telep�t�s sor�n";
$lang['Previous_Install'] = "Kor�bbi telep�t�s";
$lang['Install_db_error'] = "Hiba t�rt�nt az adatb�zis friss�t�se sor�n";

$lang['Re_install'] = "Az el�z� telep�t�s m�g akt�v! <br /><br />Amennyiben �jra szeretn� telep�teni a f�rumot, kattintson az Igen gombra az al�bbiakban. Tartsa szem el�tt, hogy ezzel v�glegesen �s visszavonhatatlanul fel�l�rja az �sszes megl�v� adatot! Az adminisztr�tori azonos�t� amit eddig haszn�lt �jra l�trej�n az �jratelep�t�s ut�n, az �sszes t�bbi adat elv�sz. <br /><br />K�tszer gondolja meg, miel�tt az Igen gombra kattint!";

$lang['Inst_Step_0'] = "K�sz�nj�k, hogy a phpBB2 szoftvert v�lasztotta. A telep�t�shez t�ltse ki az al�bbi mez�ket. Fontos: a megadott c�l-adatb�zisnak m�r l�teznie kell. Amennyiben olyan adatb�zist haszn�l, ami ODBC illeszt�t haszn�l, (pl. MS Access) l�tre kell hoznia egy DSN-t, miel�tt tov�bbl�pne.";

$lang['Start_Install'] = "Telep�t�s Kezd�se";
$lang['Finish_Install'] = "Telep�t�s Befejez�se";

$lang['Default_lang'] = "Alap�rtelmezett nyelv";
$lang['DB_Host'] = "Adatb�zis szerver neve / DSN";
$lang['DB_Name'] = "Adatb�zis neve";
$lang['DB_Username'] = "Adatb�zis Felhaszn�l�n�v";
$lang['DB_Password'] = "Adatb�zis Jelsz�";
$lang['Database'] = "Az Adatb�zis adatai";
$lang['Install_lang'] = "V�lassza ki a telep�t�s nyelv�t";
$lang['dbms'] = "Adatb�zis t�pusa";
$lang['Table_Prefix'] = "Adatt�bla el�tag";
$lang['Admin_Username'] = "Adminisztr�tor Felhaszn�l�n�v";
$lang['Admin_Password'] = "Adminisztr�tor Jelsz�";
$lang['Admin_Password_confirm'] = "Adminisztr�tor Jelsz� [ �jra ]";

$lang['Inst_Step_2'] = "Az adminisztr�tori azonos�t�ja elk�sz�lt. Ezzel a telep�t�s els� l�p�se befejez�d�tt. A k�vetkez�kben eljut az Adminisztr�tori fel�letre, ahol megv�ltoztathatja a f�rum �sszes be�ll�t�s�t. Ne felejtse el leellen�rizni az �ltal�nos Be�ll�t�sok men�pont be�ll�t�sait, �s eszk�z�lni a sz�ks�ges v�ltoztat�sokat. K�sz�nj�k, hogy a phpBB2 szoftvert v�lasztotta.";

$lang['Unwriteable_config'] = "A konfigur�ci�s file jelenleg nem �rhat�. A file m�solat�t let�ltheti, ha a lenti gombra kattint. V�gezze el benne a sz�ks�ges be�ll�t�sokat, majd t�ltse fel abba a k�nyvt�rba, ahova a phpBB-t telep�tette. Amint ezzel elk�sz�lt, bejelentkezhet az el�bbiekben megadott adminisztr�tori azonos�t�val, �s bel�phet az Adminisztr�tori fel�letre. (a linket keresse bejelentkez�s ut�n a lap alj�n) K�sz�nj�k, hogy a phpBB2 szoftvert v�lasztotta.";
$lang['Download_config'] = "Be�ll�t�sok Let�lt�se";

$lang['ftp_choose'] = "V�lasszon konfigur�l�si m�dot";
$lang['ftp_option'] = "<br />Mivel a PHP verzi�ja t�mogatja a be�p�tett FTP-t, lehet�s�ge van a konfigur�ci�s filet automatikusan a megfelel� helyre felt�lteni.";
$lang['ftp_instructs'] = "Az automatikus felt�lt�st v�lasztotta. K�rem adja meg a sz�ks�ges inform�ci�kat az al�bbiakban. Fontos: a teljes el�r�si utat meg kell adnia, mintha egy tetsz�leges FTP klienssel pr�b�lkozna.";
$lang['ftp_info'] = "Az FTP kapcsolat be�ll�t�sai";
$lang['Attempt_ftp'] = "A konfigur�ci�s file automatikus felt�lt�se";
$lang['Send_file'] = "Csak let�lt�s, a felt�lt�st majd k�zzel csin�lja";
$lang['ftp_path'] = "FTP el�r�si �t";
$lang['ftp_username'] = "FTP felhaszn�l�n�v";
$lang['ftp_password'] = "FTP jelsz�";
$lang['Transfer_config'] = "Start";
$lang['NoFTP_config'] = "Az FTP �tvitel nem siker�lt. K�rem t�ltse le a konfigur�ci�s filet, m�dos�tsa, majd t�ltse fel a megfelel� helyre k�zzel.";

$lang['Install'] = "Install�l�s";
$lang['Upgrade'] = "Friss�t�s";


$lang['Install_Method'] = "V�lasszon telep�t�si m�dot";

$lang['Install_No_Ext'] = "A php telep�tett v�ltozata nem t�mogatja a haszn�lni k�v�nt adatb�zis t�pust";

$lang['Install_No_PCRE'] = "A phpBB2 ig�nyli a Perl-Compatible Regular Expressions Module jelenl�t�t!";

//
// That's all Folks!
// -------------------------------------------------

?>
