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

//
// Translation by Gergely EGERVARY (mauzi)
// mauzi@expertlan.hu
//

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
$lang['Permissions'] = "Jogk�r�k";
$lang['Manage'] = "Menedzsment";
$lang['Disallow'] = "Foglalt nevek";
$lang['Prune'] = "Karbantart�s";
$lang['Mass_Email'] = "K�rlev�l";
$lang['Ranks'] = "Rangok";
$lang['Smilies'] = "Smilie-k";
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
$lang['Restore_explain'] = "This will perform a full restore of all phpBB tables from a saved file. If your server supports it you may upload a gzip compressed text file and it will automatically be decompressed. <b>WARNING</b> This will overwrite any existing data. The restore may take a long time to process please do not move from this page till it is complete.";
$lang['Backup_explain'] = "Here you can backup all your phpBB related data. If you have any additional custom tables in the same database with phpBB that you would like to back up as well please enter their names separated by commas in the Additional Tables textbox below. If your server supports it you may also gzip compress the file to reduce its size before download.";

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
$lang['Auth_Control_User'] = "Felhaszn�l�i jogk�r�k be�ll�t�sa"; 
$lang['Auth_Control_Group'] = "Csoport jogk�r�k be�ll�t�sa"; 
$lang['Auth_Control_Forum'] = "F�rum jogk�r�k be�ll�t�sa"; 
$lang['Look_up_User'] = "Felhaszn�l� megtekint�se"; 
$lang['Look_up_Group'] = "Csoport megtekint�se"; 
$lang['Look_up_Forum'] = "F�rum megtekint�se"; 

$lang['Group_auth_explain'] = "Here you can alter the permissions and moderator status assigned to each user group. Do not forget when changing group permissions that individual user permissions may still allow the user entry to forums, etc. You will be warned if this is the case.";
$lang['User_auth_explain'] = "Here you can alter the permissions and moderator status assigned to each individual user. Do not forget when changing user permissions that group permissions may still allow the user entry to forums, etc. You will be warned if this is the case.";
$lang['Forum_auth_explain'] = "Here you can alter the authorisation levels of each forum. You will have both a simple and advanced method for doing this, advanced offers greater control of each forum operation. Remember that changing the permission level of forums will affect which users can carry out the various operations within them.";

$lang['Simple_mode'] = "Egyszer� m�d";
$lang['Advanced_mode'] = "Halad� m�d";
$lang['Moderator_status'] = "Moder�tor st�tusz";

$lang['Allowed_Access'] = "Hozz�f�r�s enged�lyezve";
$lang['Disallowed_Access'] = "Hozz�f�r�s tiltva";
$lang['Is_Moderator'] = "Moder�tor";
$lang['Not_Moderator'] = "Nem Moder�tor";

$lang['Conflict_warning'] = "Authorisation Conflict Warning";
$lang['Conflict_access_userauth'] = "This user still has access rights to this forum via group membership. You may want to alter the group permissions or remove this user the group to fully prevent them having access rights. The groups granting rights (and the forums involved) are noted below.";
$lang['Conflict_mod_userauth'] = "This user still has moderator rights to this forum via group membership. You may want to alter the group permissions or remove this user the group to fully prevent them having moderator rights. The groups granting rights (and the forums involved) are noted below.";

$lang['Conflict_access_groupauth'] = "The following user (or users) still have access rights to this forum via their user permission settings. You may want to alter the user permissions to fully prevent them having access rights. The users granted rights (and the forums involved) are noted below.";
$lang['Conflict_mod_groupauth'] = "The following user (or users) still have moderator rights to this forum via their user permissions settings. You may want to alter the user permissions to fully prevent them having moderator rights. The users granted rights (and the forums involved) are noted below.";

$lang['Public'] = "Publikus";
$lang['Private'] = "Priv�t";
$lang['Registered'] = "Regisztr�lt";
$lang['Administrators'] = "Adminisztr�torok";
$lang['Hidden'] = "Rejtett";

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

$lang['Permissions'] = "Jogk�r�k";
$lang['Simple_Permission'] = "Egyszer� j�gk�r";

$lang['User_Level'] = "Felhaszn�l�i szint"; 
$lang['Auth_User'] = "Felhaszn�l�";
$lang['Auth_Admin'] = "Adminisztr�tor";
$lang['Group_memberships'] = "Csoport tags�g";
$lang['Usergroup_members'] = "A csoport tagjai:";

$lang['Forum_auth_updated'] = "F�rum jogk�r�k friss�tve";
$lang['User_auth_updated'] = "Felhaszn�l� jogk�r�k friss�tve";
$lang['Group_auth_updated'] = "Csoport jogk�r�k friss�tve";

$lang['Auth_updated'] = "Jogk�r�k friss�tve";
$lang['Click_return_userauth'] = "Kattintson %side%s a Felhaszn�l�i Jogk�r�kh�z val� visszat�r�shez";
$lang['Click_return_groupauth'] = "Kattintson %side%s a Csoport Jogk�r�kh�z val� visszat�r�shez";
$lang['Click_return_forumauth'] = "Kattintson %side%s a F�rum Jogk�r�kh�z val� visszat�r�shez";


//
// Banning
//
$lang['Ban_control'] = "Letilt�sok Be�ll�t�sa";
$lang['Ban_explain'] = "Here you can control the banning of users. You can achieve this by banning either or both of a specific user or an individual or range of IP addresses or hostnames. These methods prevent a user from even reaching the index page of your board. To prevent a user from registering under a different username you can also specify a banned email address. Please note that banning an email address alone will not prevent that user from being able to logon or post to your board, you should use one of the first two methods to achieve this.";
$lang['Ban_explain_warn'] = "Please note that entering a range of IP addresses results in all the addresses between the start and end being added to the banlist. Attempts will be made to minimise the number of addresses added to the database by introducing wildcards automatically where appropriate. If you really must enter a range try to keep it small or better yet state specific addresses.";

$lang['Select_username'] = "V�lasszon felhaszn�l�nevet";
$lang['Select_ip'] = "V�lasszon IP c�met";
$lang['Select_email'] = "V�lasszon Email c�met";

$lang['Ban_username'] = "Egy vagy t�bb felhaszn�l� letilt�sa";
$lang['Ban_username_explain'] = "You can ban multiple users in one go using the appropriate combination of mouse and keyboard for your computer and browser";

$lang['Ban_IP'] = "Egy vagy t�bb IP c�m vagy g�pn�v letilt�sa";
$lang['IP_hostname'] = "IP addresses or hostnames";
$lang['Ban_IP_explain'] = "To specify several different IP's or hostnames separate them with commas. To specify a range of IP addresses separate the start and end with a hyphen (-), to specify a wildcard use *";

$lang['Ban_email'] = "Egy vagy t�bb Email c�m letilt�sa";
$lang['Ban_email_explain'] = "To specify more than one email address separate them with commas. To specify a wildcard username use *, for example *@hotmail.com";

$lang['Unban_username'] = "Un-ban one more specific users";
$lang['Unban_username_explain'] = "You can unban multiple users in one go using the appropriate combination of mouse and keyboard for your computer and browser";

$lang['Unban_IP'] = "Un-ban one or more IP addresses";
$lang['Unban_IP_explain'] = "You can unban multiple IP addresses in one go using the appropriate combination of mouse and keyboard for your computer and browser";

$lang['Unban_email'] = "Un-ban one or more email addresses";
$lang['Unban_email_explain'] = "You can unban multiple email addresses in one go using the appropriate combination of mouse and keyboard for your computer and browser";

$lang['No_banned_users'] = "Nincsenek letiltott felhaszn�l�k";
$lang['No_banned_ip'] = "Nincsenek letiltott IP c�mek";
$lang['No_banned_email'] = "Nincsenek letiltott Email c�mek";

$lang['Ban_update_sucessful'] = "A tilt�lista sikeresen friss�tve";
$lang['Click_return_banadmin'] = "Click %sHere%s to return to Ban Control";


//
// Configuration
//
$lang['General_Config'] = "�ltal�nos Be�ll�t�sok";
$lang['Config_explain'] = "The form below will allow you to customize all the general board options. For User and Forum configurations use the related links on the left hand side.";

$lang['Click_return_config'] = "Click %sHere%s to return to General Configuration";

$lang['General_settings'] = "�ltal�nos f�rum be�ll�t�sok";
$lang['Site_name'] = "F�rum neve";
$lang['Site_desc'] = "F�rum le�r�sa";
$lang['Board_disable'] = "F�rum letilt�sa";
$lang['Board_disable_explain'] = "This will make the board unavailable to users. Do not logout when you disable the board, you will not be able to log back in!";
$lang['Acct_activation'] = "Azonos�t� aktiv�l�s";
$lang['Acc_None'] = "Nincs"; // These three entries are the type of activation
$lang['Acc_User'] = "Felhaszn�l�";
$lang['Acc_Admin'] = "Adminisztr�tor";

$lang['Abilities_settings'] = "Felhaszn�l� �s F�rum alapbe�ll�t�sok";
$lang['Max_poll_options'] = "V�laszt�si lehet�s�gek maxim�lis sz�ma szavaz�sn�l";
$lang['Flood_Interval'] = "Flood Interval";
$lang['Flood_Interval_explain'] = "Number of seconds a user must wait between posts"; 
$lang['Board_email_form'] = "Levelez�s a f�rumon kereszt�l";
$lang['Board_email_form_explain'] = "Users send email to each other via this board";
$lang['Topics_per_page'] = "T�m�k oldalank�nt";
$lang['Posts_per_page'] = "Hozz�sz�l�sok oldalank�nt";
$lang['Hot_threshold'] = "Posts for Popular Threshold";
$lang['Default_style'] = "Alap�rtelmezett st�lus";
$lang['Override_style'] = "Override user style";
$lang['Override_style_explain'] = "Replaces users style with the default";
$lang['Default_language'] = "Alap�rtelmezett nyelv";
$lang['Date_format'] = "D�tum form�tum";
$lang['System_timezone'] = "Rendszer id�z�na";
$lang['Enable_gzip'] = "GZip t�m�r�t�s enged�lyez�se";
$lang['Enable_prune'] = "F�rum karbantart�s enged�lyez�se";
$lang['Allow_HTML'] = "HTML Enged�lyez�se";
$lang['Allow_BBCode'] = "BBCode Enged�lyez�se";
$lang['Allowed_tags'] = "Enged�lyezett HTML tag-ek";
$lang['Allowed_tags_explain'] = "Separate tags with commas";
$lang['Allow_smilies'] = "Smilie-k enged�lyez�se";
$lang['Smilies_path'] = "Smilies Storage Path";
$lang['Smilies_path_explain'] = "El�r�si �t a phpBB f�k�nyvt�ra alatt, pl. images/smilies";
$lang['Allow_sig'] = "Al��r�sok enged�lyez�se";
$lang['Max_sig_length'] = "Al��r�sok maxim�lis hossza";
$lang['Max_sig_length_explain'] = "Maximum number of characters in user signatures";
$lang['Allow_name_change'] = "Felhaszn�l�n�v m�dos�t�s enged�lyez�se";

$lang['Avatar_settings'] = "Avatar Be�ll�t�sok";
$lang['Allow_local'] = "Avatar gal�ria enged�lyez�se";
$lang['Allow_remote'] = "Enable remote avatars";
$lang['Allow_remote_explain'] = "Avatars linked to from another website";
$lang['Allow_upload'] = "Avatar felt�lt�s enged�lyez�se";
$lang['Max_filesize'] = "Maximum Avatar File Size";
$lang['Max_filesize_explain'] = "For uploaded avatar files";
$lang['Max_avatar_size'] = "Maximum Avatar Dimensions";
$lang['Max_avatar_size_explain'] = "(Height x Width in pixels)";
$lang['Avatar_storage_path'] = "Avatar Storage Path";
$lang['Avatar_storage_path_explain'] = "Path under your phpBB root dir, e.g. images/avatars";
$lang['Avatar_gallery_path'] = "Avatar Gallery Path";
$lang['Avatar_gallery_path_explain'] = "Path under your phpBB root dir for pre-loaded images, e.g. images/avatars/gallery";

$lang['COPPA_settings'] = "COPPA Be�ll�t�sok";
$lang['COPPA_fax'] = "COPPA Fax sz�m";
$lang['COPPA_mail'] = "COPPA Postac�m";
$lang['COPPA_mail_explain'] = "This is the mailing address where parents will send COPPA registration forms";

$lang['Email_settings'] = "Email Be�ll�t�sok";
$lang['Admin_email'] = "Adminisztr�tor Email c�me";
$lang['Email_sig'] = "Email Signature";
$lang['Email_sig_explain'] = "This text will be attached to all emails the board sends";
$lang['Use_SMTP'] = "Use SMTP Server for email";
$lang['Use_SMTP_explain'] = "Say yes if you want or have to send email via a named server instead of the local mail function";
$lang['SMTP_server'] = "SMTP szerver c�me";

$lang['Disable_privmsg'] = "Priv�t �zenetek";
$lang['Inbox_limits'] = "Max posts in Inbox";
$lang['Sentbox_limits'] = "Max posts in Sentbox";
$lang['Savebox_limits'] = "Max posts in Savebox";

$lang['Cookie_settings'] = "Cookie Be�ll�t�sok"; 
$lang['Cookie_settings_explain'] = "These control how the cookie sent to browsers is defined. In most cases the default should be sufficient. If you need to change these do so with care, incorrect settings can prevent users logging in.";
$lang['Cookie_name'] = "Cookie neve";
$lang['Cookie_domain'] = "Cookie domain";
$lang['Cookie_path'] = "Cookie path";
$lang['Session_length'] = "Session length [ seconds ]";
$lang['Cookie_secure'] = "Cookie secure [ https ]";


//
// Forum Management
//
$lang['Forum_admin'] = "F�rum Adminisztr�ci�";
$lang['Forum_admin_explain'] = "From this panel you can add, delete, edit, re-order and re-synchronise categories and forums";
$lang['Edit_forum'] = "F�rum szerkeszt�se";
$lang['Create_forum'] = "�j f�rum l�trehoz�sa";
$lang['Create_category'] = "�j t�mak�r l�trehoz�sa";
$lang['Remove'] = "T�rl�s";
$lang['Action'] = "Action";
$lang['Update_order'] = "Update Order";
$lang['Config_updated'] = "Forum Configuration Updated Successfully";
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

$lang['Forum_settings'] = "General Forum Settings";
$lang['Forum_name'] = "F�rum neve";
$lang['Forum_desc'] = "Le�r�sa";
$lang['Forum_status'] = "F�rum st�tusza";
$lang['Forum_pruning'] = "Auto-pruning";

$lang['prune_freq'] = 'Check for topic age every';
$lang['prune_days'] = "Remove topics that have not been posted to in";
$lang['Set_prune_data'] = "You have turned on auto-prune for this forum but did not set a frequency or number of days to prune. Please go back and do so";

$lang['Move_and_Delete'] = "Mozgat�s �s T�rl�s";

$lang['Delete_all_posts'] = "Delete all posts";
$lang['Nowhere_to_move'] = "Nowhere to move too";

$lang['Edit_Category'] = "T�mak�r szerkeszt�se";
$lang['Edit_Category_explain'] = "Use this form to modify a categories name.";

$lang['Forums_updated'] = "F�rum �s T�mak�r inform�ci�k sikeresen friss�tve";

$lang['Must_delete_forums'] = "You need to delete all forums before you can delete this category";

$lang['Click_return_forumadmin'] = "Kattintson %side%s a F�rum Adminisztr�ci�hoz val� visszat�r�shez";


//
// Smiley Management
//
$lang['smiley_title'] = "Smiles Editing Utility";
$lang['smile_desc'] = "From this page you can add, remove and edit the emoticons or smileys your users can use in their posts and private messages.";

$lang['smiley_config'] = "Smiley Configuration";
$lang['smiley_code'] = "Smiley Code";
$lang['smiley_url'] = "Smiley Image File";
$lang['smiley_emot'] = "Smiley Emotion";
$lang['smile_add'] = "Add a new Smiley";
$lang['Smile'] = "Smile";
$lang['Emotion'] = "Emotion";

$lang['Select_pak'] = "Select Pack (.pak) File";
$lang['replace_existing'] = "Replace Existing Smiley";
$lang['keep_existing'] = "Keep Existing Smiley";
$lang['smiley_import_inst'] = "You should unzip the smiley package and upload all files to the appropriate Smiley directory for your installation.  Then select the correct information in this form to import the smiley pack.";
$lang['smiley_import'] = "Smiley Pack Import";
$lang['choose_smile_pak'] = "Choose a Smile Pack .pak file";
$lang['import'] = "Import Smileys";
$lang['smile_conflicts'] = "What should be done in case of conflicts";
$lang['del_existing_smileys'] = "Delete existing smileys before import";
$lang['import_smile_pack'] = "Import Smiley Pack";
$lang['export_smile_pack'] = "Create Smiley Pack";
$lang['export_smiles'] = "To create a smiley pack from your currently installed smileys, click %sHere%s to download the smiles.pak file. Name this file appropriately making sure to keep the .pak file extension.  Then create a zip file containing all of your smiley images plus this .pak configuration file.";

$lang['smiley_add_success'] = "The Smiley was successfully added";
$lang['smiley_edit_success'] = "The Smiley was successfully updated";
$lang['smiley_import_success'] = "The Smiley Pack was imported successfully!";
$lang['smiley_del_success'] = "The Smiley was successfully removed";
$lang['Click_return_smileadmin'] = "Click %sHere%s to return to Smiley Administration";


//
// User Management
//
$lang['User_admin'] = "Felhaszn�l� Adminisztr�ci�";
$lang['User_admin_explain'] = "Here you can change your user's information and certain specific options. To modify the users permissions please use the user and group permissions system.";

$lang['Look_up_user'] = "Felhaszn�l� megtekint�se";

$lang['Admin_user_fail'] = "Couldn't update the users profile.";
$lang['Admin_user_updated'] = "The user's profile was successfully updated.";
$lang['Click_return_useradmin'] = "Kattintson %side%s a Felhaszn�l� Adminisztr�ci�hoz val� visszat�r�shez";

$lang['User_delete'] = "Felhaszn�l� t�rl�se";
$lang['User_delete_explain'] = "Kattintson ide a felhaszn�l� t�rl�s�hez. Ezt nem lehet vissza�ll�tani.";
$lang['User_deleted'] = "Felhaszn�l� sikeresen t�r�lve";

$lang['User_status'] = "User is active";
$lang['User_allowpm'] = "Can send Private Messages";
$lang['User_allowavatar'] = "Can display avatar";

$lang['Admin_avatar_explain'] = "Here you can see and delete the user's current avatar.";

$lang['User_special'] = "Special admin-only fields";
$lang['User_special_explain'] = "These fields are not able to be modified by the users.  Here you can set their status and other options that are not given to users.";


//
// Group Management
//
$lang['Group_administration'] = "Csoport Adminisztr�ci�";
$lang['Group_admin_explain'] = "From this panel you can administer all your usergroups, you can; delete, create and edit existing groups. You may choose moderators, toggle open/closed group status and set the group name and description";
$lang['Error_updating_groups'] = "There was an error while updating the groups";
$lang['Updated_group'] = "A csoport sikeresen friss�tve";
$lang['Added_new_group'] = "A csoport sikeresen l�trehozva";
$lang['Deleted_group'] = "A csoport sikeresen t�r�lve";
$lang['New_group'] = "Create new group";
$lang['Edit_group'] = "Edit group";
$lang['group_name'] = "Csoport neve";
$lang['group_description'] = "Csoport le�r�sa";
$lang['group_moderator'] = "Csoport moder�tor";
$lang['group_status'] = "Csoport st�tusz";
$lang['group_open'] = "Ny�lt csoport";
$lang['group_closed'] = "Z�rt csoport";
$lang['group_hidden'] = "Rejtett csoport";
$lang['group_delete'] = "Csoport t�rl�se";
$lang['group_delete_check'] = "T�rli ezt a csoportot?";
$lang['submit_group_changes'] = "Submit Changes";
$lang['reset_group_changes'] = "Reset Changes";
$lang['No_group_name'] = "Meg kell adnia egy csoportnevet";
$lang['No_group_moderator'] = "Meg kell adnia egy moder�tort ennek a csoportnak";
$lang['No_group_mode'] = "You must specify a mode for this group, open or closed";
$lang['delete_group_moderator'] = "Delete the old group moderator?";
$lang['delete_moderator_explain'] = "If you're changing the group moderator, check this box to remove the old moderator from the group.  Otherwise, do not check it, and the user will become a regular member of the group.";
$lang['Click_return_groupsadmin'] = "Kattintson %side%s a Csoport Adminisztr�ci�hoz val� visszat�r�shez.";
$lang['Select_group'] = "V�lasszon csoportot";
$lang['Look_up_group'] = "Csoport megtekint�se";


//
// Prune Administration
//
$lang['Forum_Prune'] = "F�rum karbantart�s";
$lang['Forum_Prune_explain'] = "This will delete any topic which has not been posted to within the number of days you select. If you do not enter a number then all topics will be deleted. It will not remove topics in which polls are still running nor will it remove announcements. You will need to remove these topics manually.";
$lang['Do_Prune'] = "Do Prune";
$lang['All_Forums'] = "�sszes f�rum";
$lang['Prune_topics_not_posted'] = "Prune topics with no replies in this many days";
$lang['Topics_pruned'] = "Topics pruned";
$lang['Posts_pruned'] = "Posts pruned";
$lang['Prune_success'] = "Pruning of forums was successful";


//
// Word censor
//
$lang['Words_title'] = "Sz� cenz�r�z�s";
$lang['Words_explain'] = "From this control panel you can add, edit, and remove words that will be automatically censored on your forums. In addition people will not be allowed to register with usernames containing these words. Wildcards (*) are accepted in the word field, eg. *test* will match detestable, test* would match testing, *test would match detest.";
$lang['Word'] = "Sz�";
$lang['Edit_word_censor'] = "Edit word censor";
$lang['Replacement'] = "Helyettes�t�";
$lang['Add_new_word'] = "�j sz� hozz�ad�sa";
$lang['Update_word'] = "Update word censor";

$lang['Must_enter_word'] = "You must enter a word and its replacement";
$lang['No_word_selected'] = "No word selected for editing";

$lang['Word_updated'] = "The selected word censor has been successfully updated";
$lang['Word_added'] = "The word censor has been successfully added";
$lang['Word_removed'] = "The selected word censor has been successfully removed";

$lang['Click_return_wordadmin'] = "Kattintson %side%s a Sz� cenz�r�z�shoz val� visszat�r�shez";


//
// Mass Email
//
$lang['Mass_email_explain'] = "Here you can email a message to either all of your users, or all users of a specific group.  To do this, an email will be sent out to the administrative email address supplied, with a blind carbon copy sent to all recipients. If you are emailing a large group of people please be patient after submitting and do not stop the page halfway through. It is normal for amass emailing to take a long time, you will be notified when the script has completed";
$lang['Compose'] = "Compose"; 

$lang['Recipients'] = "C�mzettek"; 
$lang['All_users'] = "�sszes felhaszn�l�";

$lang['Email_successfull'] = "Az �zenet elk�ldve";
$lang['Click_return_massemail'] = "Click %sHere%s to return to the Mass Email form";


//
// Ranks admin
//
$lang['Ranks_title'] = "Rang Adminisztr�ci�";
$lang['Ranks_explain'] = "Using this form you can add, edit, view and delete ranks. You can also create custom ranks which can be applied to a user via the user management facility";

$lang['Add_new_rank'] = "�j rang hozz�ad�sa";

$lang['Rank_title'] = "Rang c�me";
$lang['Rank_special'] = "Set as Special Rank";
$lang['Rank_minimum'] = "Minimum Hozz�sz�l�sok";
$lang['Rank_maximum'] = "Maximum Hozz�sz�l�sok";
$lang['Rank_image'] = "Rank Image (Relative to phpBB2 root path)";
$lang['Rank_image_explain'] = "Use this to define a small image associated with the rank";

$lang['Must_select_rank'] = "You must select a rank";
$lang['No_assigned_rank'] = "No special rank assigned";

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
$lang['Delete_disallow_title'] = "Remove a Disallowed Username";
$lang['Delete_disallow_explain'] = "You can remove a disallowed username by selecting the username from this list and clicking submit";

$lang['Add_disallow'] = "�j";
$lang['Add_disallow_title'] = "Add a disallowed username";
$lang['Add_disallow_explain'] = "You can disallow a username using the wildcard character * to match any character";

$lang['No_disallowed'] = "Nincsenek foglalt nevek";

$lang['Disallowed_deleted'] = "The disallowed username has been successfully removed";
$lang['Disallow_successful'] = "The disallowed username has been successfully added";
$lang['Disallowed_already'] = "The name you entered could not be disallowed. It either already exists in the list, exists in the word censor list, or a matching username is present";

$lang['Click_return_disallowadmin'] = "Click %sHere%s to return to Disallow Username Administration";


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

$lang['Edit_theme'] = "Edit Theme";
$lang['Edit_theme_explain'] = "In the form below you can edit the settings for the selected theme";

$lang['Create_theme'] = "Create Theme";
$lang['Create_theme_explain'] = "Use the form below to create a new theme for a selected template. When entering colours (for which you should use hexadecimal notation) you must not include the initial #, i.e.. CCCCCC is valid, #CCCCCC is not";

$lang['Export_themes'] = "Export Themes";
$lang['Export_explain'] = "In this panel you will be able to export the theme data for a selected template. Select the template from the list below and the script will create the theme configuration file and attempt to save it to the selected template directory. If it cannot save the file itself it will give you the option to download it. In order for the script to save the file you must give write access to the webserver for the selected template dir. For more information on this see the phpBB 2 users guide.";

$lang['Theme_installed'] = "The selected theme has been installed successfully";
$lang['Style_removed'] = "The selected style has been removed from the database. To fully remove this style from your system you must delete the appropriate style from your templates directory.";
$lang['Theme_info_saved'] = "The theme information for the selected template has been saved. You should now return the permissions on the theme_info.cfg (and if applicable the selected template directory) to read-only";
$lang['Theme_updated'] = "The selected theme has been updated. You should now export the new theme settings";
$lang['Theme_created'] = "Theme created. You should now export the theme to the theme configuration file for safe keeping or use elsewhere";

$lang['Confirm_delete_style'] = "Biztos benne, hogy t�r�lni akarja ezt a st�lust?";

$lang['Download_theme_cfg'] = "The exporter could not write the theme information file. Click the button below to download this file with your browser. Once you have downloaded it you can transfer it to the directory containing the template files. You can then package the files for distribution or use elsewhere if you desire";
$lang['No_themes'] = "The template you selected has no themes attached to it. To create a new theme click the Create New link on the left hand panel";
$lang['No_template_dir'] = "Could not open the template directory. It may be unreadable by the webserver or may not exist";
$lang['Cannot_remove_style'] = "You cannot remove the style selected since it is currently the forum default. Please change the default style and try again.";
$lang['Style_exists'] = "The style name to selected already exists, please go back and choose a different name.";

$lang['Click_return_styleadmin'] = "Click %sHere%s to return to Style Administration";

$lang['Theme_settings'] = "S�ma be�ll�t�sai";
$lang['Theme_element'] = "Theme Element";
$lang['Simple_name'] = "Egyszer� n�v";
$lang['Value'] = "�rt�k";
$lang['Save_Settings'] = "Be�ll�t�sok ment�se";

$lang['Stylesheet'] = "CSS Stylesheet";
$lang['Background_image'] = "Background Image";
$lang['Background_color'] = "Background Colour";
$lang['Theme_name'] = "S�ma neve";
$lang['Link_color'] = "Link sz�n";
$lang['Text_color'] = "Sz�veg sz�n";
$lang['VLink_color'] = "L�togatott link sz�n";
$lang['ALink_color'] = "Akt�v link sz�n";
$lang['HLink_color'] = "Hover Link Colour";
$lang['Tr_color1'] = "T�bl�zat sor sz�n 1";
$lang['Tr_color2'] = "T�bl�zat sor sz�n 2";
$lang['Tr_color3'] = "T�bl�zat sor sz�n 3";
$lang['Tr_class1'] = "Table Row Class 1";
$lang['Tr_class2'] = "Table Row Class 2";
$lang['Tr_class3'] = "Table Row Class 3";
$lang['Th_color1'] = "T�bl�zat fejl�c sz�n 1";
$lang['Th_color2'] = "T�bl�zat fejl�c sz�n 2";
$lang['Th_color3'] = "T�bl�zat fejl�c sz�n 3";
$lang['Th_class1'] = "Table Header Class 1";
$lang['Th_class2'] = "Table Header Class 2";
$lang['Th_class3'] = "Table Header Class 3";
$lang['Td_color1'] = "T�bl�zat cella sz�n 1";
$lang['Td_color2'] = "T�bl�zat cella sz�n 2";
$lang['Td_color3'] = "T�bl�zat cella sz�n 3";
$lang['Td_class1'] = "Table Cell Class 1";
$lang['Td_class2'] = "Table Cell Class 2";
$lang['Td_class3'] = "Table Cell Class 3";
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
$lang['img_poll_size'] = "Polling Image Size [px]";
$lang['img_pm_size'] = "Private Message Status size [px]";


//
// Install Process
//
$lang['Welcome_install'] = "Welcome to phpBB 2 Installation";
$lang['Initial_config'] = "Basic Configuration";
$lang['DB_config'] = "Database Configuration";
$lang['Admin_config'] = "Admin Configuration";
$lang['continue_upgrade'] = "Once you have downloaded your config file to your local machine you may\"Continue Upgrade\" button below to move forward with the upgrade process.  Please wait to upload the config file until the upgrade process is complete.";
$lang['upgrade_submit'] = "Continue Upgrade";

$lang['Installer_Error'] = "An error has occurred during installation";
$lang['Previous_Install'] = "A previous installation has been detected";
$lang['Install_db_error'] = "An error occurred trying to update the database";

$lang['Re_install'] = "Your previous installation is still active. <br /><br />If you would like to re-install phpBB 2 you should click the Yes button below. Please be aware that doing so will destroy all existing data, no backups will be made! The administrator username and password you have used to login in to the board will be re-created after the re-installation, no other settings will be retained. <br /><br />Think carefully before pressing Yes!";

$lang['Inst_Step_0'] = "Thank you for choosing phpBB 2. In order to complete this install please fill out the details requested below. Please note that the database you install into should already exist. If you are installing to a database that uses ODBC, e.g. MS Access you should first create a DSN for it before proceeding.";

$lang['Start_Install'] = "Telep�t�s Kezd�se";
$lang['Finish_Install'] = "Telep�t�s Befejez�se";

$lang['Default_lang'] = "Alap�rtelmezett nyelv";
$lang['DB_Host'] = "Adatb�zis szerver neve / DSN";
$lang['DB_Name'] = "Adatb�zis neve";
$lang['DB_Username'] = "Adatb�zis Felhaszn�l�n�v";
$lang['DB_Password'] = "Adatb�zis Jelsz�";
$lang['Database'] = "Az Adatb�zis adatai";
$lang['Install_lang'] = "Choose Language for Installation";
$lang['dbms'] = "Adatb�zis t�pusa";
$lang['Table_Prefix'] = "Adatt�bla el�tag";
$lang['Admin_Username'] = "Adminisztr�tor Felhaszn�l�n�v";
$lang['Admin_Password'] = "Adminisztr�tor Jelsz�";
$lang['Admin_Password_confirm'] = "Adminisztr�tor Jelsz� [ �jra ]";

$lang['Inst_Step_2'] = "Your admin username has been created.  At this point your basic installation is complete. You will now be taken to a screen which will allow you to administer your new installation. Please be sure to check the General Configuration details and make any required changes. Thank you for choosing phpBB 2.";

$lang['Unwriteable_config'] = "Your config file is un-writeable at present. A copy of the config file will be downloaded to your when you click the button below. You should upload this file to the same directory as phpBB 2. Once this is done you should log in using the administrator name and password you provided on the previous form and visit the admin control centre (a link will appear at the bottom of each screen once logged in) to check the general configuration. Thank you for choosing phpBB 2.";
$lang['Download_config'] = "Be�ll�t�sok Let�lt�se";

$lang['ftp_choose'] = "Choose Download Method";
$lang['ftp_option'] = "<br />Since FTP extensions are enabled in this version of PHP you may also be given the option of first trying to automatically ftp the config file into place.";
$lang['ftp_instructs'] = "You have chosen to ftp the file to the account containing phpBB 2 automatically.  Please enter the information below to facilitate this process. Note that the FTP path should be the exact path via ftp to your phpBB2 installation as if you were ftping to it using any normal client.";
$lang['ftp_info'] = "Az FTP kapcsolat be�ll�t�sai";
$lang['Attempt_ftp'] = "Attempt to ftp config file into place";
$lang['Send_file'] = "Just send the file to me and I'll ftp it manually";
$lang['ftp_path'] = "FTP el�r�si �t";
$lang['ftp_username'] = "FTP felhaszn�l�n�v";
$lang['ftp_password'] = "FTP jelsz�";
$lang['Transfer_config'] = "Start Transfer";
$lang['NoFTP_config'] = "The attempt to ftp the config file into place failed.  Please download the config file and ftp it into place manually.";

$lang['Install'] = "Install�l�s";
$lang['Upgrade'] = "Friss�t�s";


$lang['Install_Method'] = "Choose your installation method";

//
// That's all Folks!
// -------------------------------------------------

?>
