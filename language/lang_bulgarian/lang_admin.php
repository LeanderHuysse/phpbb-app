<?php

/***************************************************************************
 *                            lang_admin.php [Bulgarian]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_admin.php,v 1.27 2001/12/30 13:49:37 psotfx Exp $
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
*                     Bulgarian translation (��������� ������)
*                              ------------------- 
*     begin                : Thu Dec 06 2001
*     last update          : Fri Jan 15 2001  
*     by                   : Boby Dimitrov (���� ��������) 
*     email                : boby@azholding.com 
****************************************************************************/ 
//
// Format is same as lang_main
//

//
// Modules, this replaces the keys used
// in the modules[][] arrays in each module file
//
$lang['General'] = "��������";
$lang['Users'] = "�����������";
$lang['Groups'] = "�����";
$lang['Forums'] = "������";
$lang['Styles'] = "�������";

$lang['Configuration'] = "���� ������������";
$lang['Permissions'] = "�����";
$lang['Manage'] = "���������";
$lang['Disallow'] = "������� �� �����";
$lang['Prune'] = "����������";
$lang['Mass_Email'] = "����� ����";
$lang['Ranks'] = "�������";
$lang['Smilies'] = "Smilies";
$lang['Ban_Management'] = "��� �������";
$lang['Word_Censor'] = "����������� ����";
$lang['Export'] = "������������";
$lang['Create_new'] = "���������";
$lang['Add_new'] = "��������";
$lang['Backup_DB'] = "����������� �� ��";
$lang['Restore_DB'] = "�������������� �� ��";


//
// Index
//
$lang['Admin'] = "�������������";
$lang['Not_admin'] = "������ ����� �� �������������� ���� ������";
$lang['Welcome_phpBB'] = "����� ����� � phpBB";
$lang['Admin_intro'] = "Thank you for choosing phpBB as your forum solution. This screen will give you a quick overview of all the various statistics of your board. You can get back to this page by clicking on the <u>Admin Index</u> link in the left pane. To return to the index of your board, click the phpBB logo also in the left pane. The other links on the left hand side of this screen will allow you to control every aspect of your forum experience, each screen will have instructions on how to use the tools.";
$lang['Main_index'] = "������ �� ��������";
$lang['Forum_stats'] = "����� ����������";
$lang['Admin_Index'] = "�����-�����";
$lang['Preview_forum'] = "������� �� ������";

$lang['Click_return_admin_index'] = "�������� %s���%s �� �� �� ������� � �����-������";

$lang['Statistic'] = "����������";
$lang['Value'] = "��������";
$lang['Number_posts'] = "���� ������";
$lang['Posts_per_day'] = "������ �� ���";
$lang['Number_topics'] = "���� ����";
$lang['Topics_per_day'] = "���� �� ���";
$lang['Number_users'] = "���� �����������";
$lang['Users_per_day'] = "����������� �� ���";
$lang['Board_started'] = "����� �� �����";
$lang['Avatar_dir_size'] = "������ �� ������� � ���������";
$lang['Database_size'] = "������ �� ������ �����";
$lang['Gzip_compression'] ="Gzip ���������";
$lang['Not_available'] = "���� �����";

$lang['ON'] = "��������"; // This is for GZip compression
$lang['OFF'] = "���������"; 


//
// DB Utils
//
$lang['Database_Utilities'] = "������ � ������ �����";

$lang['Restore'] = "��������������";
$lang['Backup'] = "�����������";
$lang['Restore_explain'] = "This will perform a full restore of all phpBB tables from a saved file. If your server supports it you may upload a gzip compressed text file and it will automatically be decompressed. <b>WARNING</b> This will overwrite any existing data. The restore may take a long time to process please do not move from this page till it is complete.";
$lang['Backup_explain'] = "Here you can backup all your phpBB related data. If you have any additional custom tables in the same database with phpBB that you would like to back up as well please enter their names separated by commas in the Additional Tables textbox below. If your server supports it you may also gzip compress the file to reduce its size before download.";

$lang['Backup_options'] = "����� �� �����������";
$lang['Start_backup'] = "������� �������������";
$lang['Full_backup'] = "����� �����������";
$lang['Structure_backup'] = "����������� ���� �� �����������";
$lang['Data_backup'] = "����������� ���� �� �������";
$lang['Additional_tables'] = "������������ �������";
$lang['Gzip_compress'] = "������������ �� ����� � Gzip";
$lang['Select_file'] = "�������� ����";
$lang['Start_Restore'] = "������� ����������������";

$lang['Restore_success'] = "������ ����� ���� ������������ �������.<br /><br />�������� �� ������� � �����������, � ����� �� ���� ��� ���������� �����������.";
$lang['Backup_download'] = "��������� �� ������� ���� �����, ���� ���������!";
$lang['Backups_not_supported'] = "������������� �� � �������� ������ ����� �� ��������� ��� ������ ��-�������.";

$lang['Restore_Error_uploading'] = "������ ��� ��������� �� ����� � ������� �� ����������������.";
$lang['Restore_Error_filename'] = "������� � ����� �� �����, ���� �������� � ���� ����.";
$lang['Restore_Error_decompress'] = "Gzip-����� �� ���� �� ���� ��������������, ���� ������ �������������� ������ �� �����.";
$lang['Restore_Error_no_file'] = "���� ����� ����� ����";


//
// Auth pages
//
$lang['Select_a_User'] = "�������� ����������";
$lang['Select_a_Group'] = "�������� �����";
$lang['Select_a_Forum'] = "�������� �����";
$lang['Auth_Control_User'] = "������� �� ������� �� �������������"; 
$lang['Auth_Control_Group'] = "������� �� ������� �� �������"; 
$lang['Auth_Control_Forum'] = "������� �� ������� ��� ��������"; 
$lang['Look_up_User'] = "����� �����������"; 
$lang['Look_up_Group'] = "����� �������"; 
$lang['Look_up_Forum'] = "����� ������"; 

$lang['Group_auth_explain'] = "Here you can alter the permissions and moderator status assigned to each user group. Do not forget when changing group permissions that individual user permissions may still allow the user entry to forums, etc. You will be warned if this is the case.";
$lang['User_auth_explain'] = "Here you can alter the permissions and moderator status assigned to each individual user. Do not forget when changing user permissions that group permissions may still allow the user entry to forums, etc. You will be warned if this is the case.";
$lang['Forum_auth_explain'] = "Here you can alter the authorisation levels of each forum. You will have both a simple and advanced method for doing this, advanced offers greater control of each forum operation. Remember that changing the permission level of forums will affect which users can carry out the various operations within them.";

$lang['Simple_mode'] = "������ ���������";
$lang['Advanced_mode'] = "������ ���������";
$lang['Moderator_status'] = "������ �� ���������";

$lang['Allowed_Access'] = "������ ��������";
$lang['Disallowed_Access'] = "������ ��������";
$lang['Is_Moderator'] = "� ���������";
$lang['Not_Moderator'] = "�� � ���������";

$lang['Conflict_warning'] = "�������������� �� �������� � �������";
$lang['Conflict_access_userauth'] = "This user still has access rights to this forum via group membership. You may want to alter the group permissions or remove this user the group to fully prevent them having access rights. The groups granting rights (and the forums involved) are noted below.";
$lang['Conflict_mod_userauth'] = "This user still has moderator rights to this forum via group membership. You may want to alter the group permissions or remove this user the group to fully prevent them having moderator rights. The groups granting rights (and the forums involved) are noted below.";

$lang['Conflict_access_groupauth'] = "The following user (or users) still have access rights to this forum via their user permission settings. You may want to alter the user permissions to fully prevent them having access rights. The users granted rights (and the forums involved) are noted below.";
$lang['Conflict_mod_groupauth'] = "The following user (or users) still have moderator rights to this forum via their user permissions settings. You may want to alter the user permissions to fully prevent them having moderator rights. The users granted rights (and the forums involved) are noted below.";

$lang['Public'] = "��������";
$lang['Private'] = "������";
$lang['Registered'] = "�����������";
$lang['Administrators'] = "��������������";
$lang['Hidden'] = "�����";

$lang['View'] = "�������";
$lang['Read'] = "������";
$lang['Post'] = "������";
$lang['Reply'] = "����������";
$lang['Edit'] = "�������";
$lang['Delete'] = "���������";
$lang['Sticky'] = "����� ����";
$lang['Announce'] = "���������"; 
$lang['Vote'] = "���������";
$lang['Pollcreate'] = "������";

$lang['Permissions'] = "�����";
$lang['Simple_Permission'] = "������ �����";

$lang['User_Level'] = "������������� ����"; 
$lang['Auth_User'] = "����������";
$lang['Auth_Admin'] = "�������������";
$lang['Group_memberships'] = "�������� � ������������� �����";
$lang['Usergroup_members'] = "���� ����� ��� �������� �������";

$lang['Forum_auth_updated'] = "������� ��� ������ �� ��������";
$lang['User_auth_updated'] = "������� �� ����������� �� ��������";
$lang['Group_auth_updated'] = "������� �� ������� �� ��������";

$lang['Auth_updated'] = "������� �� ��������";
$lang['Click_return_userauth'] = "�������� %s���%s �� �� �� ������� � ������� �� ������� �� �������������";
$lang['Click_return_groupauth'] = "�������� %s���%s �� �� �� ������� � ������� �� ������� �� �������";
$lang['Click_return_forumauth'] = "�������� %s���%s �� �� �� ������� � ������� �� ������� ��� ��������";


//
// Banning
//
$lang['Ban_control'] = "��� �������";
$lang['Ban_explain'] = "Here you can control the banning of users. You can achieve this by banning either or both of a specific user or an individual or range of IP addresses or hostnames. These methods prevent a user from even reaching the index page of your board. To prevent a user from registering under a different username you can also specify a banned email address. Please note that banning an email address alone will not prevent that user from being able to logon or post to your board, you should use one of the first two methods to achieve this.";
$lang['Ban_explain_warn'] = "Please note that entering a range of IP addresses results in all the addresses between the start and end being added to the banlist. Attempts will be made to minimise the number of addresses added to the database by introducing wildcards automatically where appropriate. If you really must enter a range try to keep it small or better yet state specific addresses.";

$lang['Select_username'] = "�������� ����������";
$lang['Select_ip'] = "�������� IP";
$lang['Select_email'] = "�������� ���� �����";

$lang['Ban_username'] = "��� �� ������������� ���";
$lang['Ban_username_explain'] = "������ �� �������� ������� ����������� ������������ ���� �� ����������� �� �������.";

$lang['Ban_IP'] = "��� �� IP ����� ��� ������";
$lang['IP_hostname'] = "IP ����� ��� ������";
$lang['Ban_IP_explain'] = "�� �� �������� ������� �������� IP�� ��� �������, ��������� �� � �������. �� �� �������� ����� �� IP��, ��������� �������� � ������� � ���� (-). ������ �� �������� � * �� ����� �� ���� ��������.";

$lang['Ban_email'] = "��� �� ���� �����";
$lang['Ban_email_explain'] = "�� �� �������� ������ �� ���� ���� �����, ��������� �� � �������. ����������� *, �� �� �������� ����� �� ������, �������� *@hotmail.com ��� johnsmith@*.com";

$lang['Unban_username'] = "��-��� �� ������������� ���";
$lang['Unban_username_explain'] = "������ �� ��-������� ������� ����������� ������������ ���� �� ����������� �� �������.";

$lang['Unban_IP'] = "��-��� �� IP ����� ��� ������";
$lang['Unban_IP_explain'] = "������ �� ��-������� ������� ����������� ������������ ���� �� ����������� �� �������.";

$lang['Unban_email'] = "��-��� �� ���� �����";
$lang['Unban_email_explain'] = "������ ��-������� ������� ����������� ������������ ���� �� ����������� �� �������.";

$lang['No_banned_users'] = "���� �������� �����������";
$lang['No_banned_ip'] = "���� ��������� IP��";
$lang['No_banned_email'] = "���� ��������� ���� ������";

$lang['Ban_update_sucessful'] = "������� � ���������� � ������� �������";
$lang['Click_return_banadmin'] = "�������� %s���%s �� �� �� ������� � ��� ��������";


//
// Configuration
//
$lang['General_Config'] = "���� ������������";
$lang['Config_explain'] = "The form below will allow you to customize all the general board options. For User and Forum configurations use the related links on the left hand side.";

$lang['Click_return_config'] = "�������� %s���%s �� �� �� ������� � ������ ������������";

$lang['General_settings'] = "���� ��������� �� ��������";
$lang['Site_name'] = "��� �� �����";
$lang['Site_desc'] = "�������� �� �����";
$lang['Board_disable'] = "��������� ��������";
$lang['Board_disable_explain'] = "���� �� ������� �������� ���������� �� �������������. �� ��������� �� �������� ���� ���� ��� �� ���������, ���� �� ������ �� ������� �������!";
$lang['Acct_activation'] = "���������� �� �������������";
$lang['Acc_None'] = "�� � �����"; // These three entries are the type of activation
$lang['Acc_User'] = "�� ����������";
$lang['Acc_Admin'] = "�� �������������";

$lang['Abilities_settings'] = "������� ��������� �� ���������� � �����";
$lang['Max_poll_options'] = "�������� �������� �������� �� ������";
$lang['Flood_Interval'] = "�������� �� flood";
$lang['Flood_Interval_explain'] = "���� �������, ����� ����������� ������ �� ������ ����� ��������� ������."; 
$lang['Board_email_form'] = "������� �� ���� ���� ��������";
$lang['Board_email_form_explain'] = "������������� ����� �� �� ������ ���� ���� ��������";
$lang['Topics_per_page'] = "���� �� ��������";
$lang['Posts_per_page'] = "������ �� ��������";
$lang['Hot_threshold'] = "���� ������ �� ��������� ����";
$lang['Default_style'] = "������� ����";
$lang['Override_style'] = "�������� �� �������������� ����";
$lang['Override_style_explain'] = "������ �������� �� ����������� � ��������";
$lang['Default_language'] = "������� ����";
$lang['Date_format'] = "������ �� ������";
$lang['System_timezone'] = "������ ���� �� ���������";
$lang['Enable_gzip'] = "�������� GZip ���������";
$lang['Enable_prune'] = "�������o ����������";
$lang['Allow_HTML'] = "�������� HTML";
$lang['Allow_BBCode'] = "�������� BBCode";
$lang['Allowed_tags'] = "��������� HTML ������";
$lang['Allowed_tags_explain'] = "��������� �������� � �������";
$lang['Allow_smilies'] = "��������� Smilies";
$lang['Smilies_path'] = "��� ��� ������� ��� Smilies";
$lang['Smilies_path_explain'] = "���, ������ ��������� ����� �� phpBB, ����. images/smilies";
$lang['Allow_sig'] = "��������� �������";
$lang['Max_sig_length'] = "�������� �������";
$lang['Max_sig_length_explain'] = "���������� ���� �� ��������� � �����������";
$lang['Allow_name_change'] = "��������� ����� �� ��������������� ���";

$lang['Avatar_settings'] = "��������� �� ���������";
$lang['Allow_local'] = "��������� ������� �� ���������";
$lang['Allow_remote'] = "��������� ������ �������";
$lang['Allow_remote_explain'] = "�������, ������ �� ���� ���� � ��������� ��� � ������";
$lang['Allow_upload'] = "��������� ��������� �� �������";
$lang['Max_filesize'] = "�������� ���� �� �������";
$lang['Max_filesize_explain'] = "������ �� �� �������� �������";
$lang['Max_avatar_size'] = "�������� ������ �� �������";
$lang['Max_avatar_size_explain'] = "(�������� x ������ � �������)";
$lang['Avatar_storage_path'] = "����� �� ���������� �� ���������";
$lang['Avatar_storage_path_explain'] = "���, ������ ��������� ����� �� phpBB, ����. images/avatars";
$lang['Avatar_gallery_path'] = "����� �� ������� �� ���������";
$lang['Avatar_gallery_path_explain'] = "���, ������ ��������� ����� �� phpBB, ��� ����� � ����������� �� ��������� � �������";

$lang['COPPA_settings'] = "��������� �� COPPA";
$lang['COPPA_fax'] = "COPPA ���� �����";
$lang['COPPA_mail'] = "COPPA �������� �����";
$lang['COPPA_mail_explain'] = "���� � ��������� �����, �� ����� ���������� �� �������� COPPA ��������������";
$lang['Email_settings'] = "��������� �� �����";
$lang['Admin_email'] = "���� �� ��������������";
$lang['Email_sig'] = "���� ������";
$lang['Email_sig_explain'] = "���� ������ �� ���� �������� ��� ������ �����, ��������� �� ��������";
$lang['Use_SMTP'] = "���������� �� SMTP-������";
$lang['Use_SMTP_explain'] = "��� ������ �� ������� ����� ���� ������ SMTP-������, � �� ���� ��������� ����-�������.";
$lang['SMTP_server'] = "����� �� SMTP-�������";

$lang['Disable_privmsg'] = "������� �� ����� ���������";
$lang['Inbox_limits'] = "�������� ��������� ��� �������";
$lang['Sentbox_limits'] = "�������� ��������� � ��������";
$lang['Savebox_limits'] = "�������� ��������� � ���������";

$lang['Cookie_settings'] = "��������� �� Cookies"; 
$lang['Cookie_settings_explain'] = "These control how the cookie sent to browsers is defined. In most cases the default should be sufficient. If you need to change these do so with care, incorrect settings can prevent users logging in.";
$lang['Cookie_name'] = "��� �� Cookie";
$lang['Cookie_domain'] = "������ �� Cookie";
$lang['Cookie_path'] = "��� �� Cookie";
$lang['Session_length'] = "������� �� ������� (� �������)";
$lang['Cookie_secure'] = "Secure Cookie (�� https)";


//
// Forum Management
//
$lang['Forum_admin'] = "�������������� �� ��������";
$lang['Forum_admin_explain'] = "From this panel you can add, delete, edit, re-order and re-synchronise categories and forums";
$lang['Edit_forum'] = "������� �� �����";
$lang['Create_forum'] = "��������� �� ��� �����";
$lang['Create_category'] = "��������� �� ���� ���������";
$lang['Remove'] = "����������";
$lang['Action'] = "��������";
$lang['Update_order'] = "���������� �� ����";
$lang['Config_updated'] = "����������� �� ������ �� �������� �������";
$lang['Edit'] = "�������";
$lang['Delete'] = "���������";
$lang['Move_up'] = "������";
$lang['Move_down'] = "������";
$lang['Resync'] = "�������������";
$lang['No_mode'] = "�� � ������ �����";
$lang['Forum_edit_delete_explain'] = "The form below will allow you to customize all the general board options. For User and Forum configurations use the related links on the left hand side";

$lang['Move_contents'] = "����������� �� ������������";
$lang['Forum_delete'] = "��������� �� �����";
$lang['Forum_delete_explain'] = "The form below will allow you to delete a forum (or category) and decide where you want to put all topics (or forums) it contained.";

$lang['Forum_settings'] = "���� �������� �� �����";
$lang['Forum_name'] = "��� �� ������";
$lang['Forum_desc'] = "��������";
$lang['Forum_status'] = "������";
$lang['Forum_pruning'] = "��������������";

$lang['prune_freq'] = "�������� �� ��������� �� ������ �� �����";
$lang['prune_days'] = "�������� ����, � ����� �� � ���� ������ ��";
$lang['Set_prune_data'] = "You have turned on auto-prune for this forum but did not set a frequency or number of days to prune. Please go back and do so";

$lang['Move_and_Delete'] = "������� � ���������";

$lang['Delete_all_posts'] = "��������� �� ������ ������";
$lang['Nowhere_to_move'] = "�� ��� ������� ���� �� �� ��������� ������";

$lang['Edit_Category'] = "��������� �� ���������";
$lang['Edit_Category_explain'] = "��� ������ �� ��������� ����� �� �����������.";

$lang['Forums_updated'] = "������������ �� ������ � ����������� � �������� �������";

$lang['Must_delete_forums'] = "������ �� �������� ������ ������, ����� �� ������ �� ���������� �����������";

$lang['Click_return_forumadmin'] = "�������� %s���%s �� �� �� ������� � �������������� �� ��������";


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
$lang['User_admin'] = "�������������� �� �������������";
$lang['User_admin_explain'] = "Here you can change your user's information and certain specific options. To modify the users permissions please use the user and group permissions system.";

$lang['Look_up_user'] = "����� �����������";

$lang['Admin_user_fail'] = "������� �� ����������� �� ���� �������.";
$lang['Admin_user_updated'] = "������� �� ����������� � ������� �������.";
$lang['Click_return_useradmin'] = "�������� %s���%s �� �� �� ������� � �������������� �� �������������";

$lang['User_delete'] = "��������� �� �����������";
$lang['User_delete_explain'] = "�������� ���, �� �� �������� ���� ����������. ���� �������� �� � ��������!";
$lang['User_deleted'] = "����������� ���� ������ �������.";

$lang['User_status'] = "����������� � �������";
$lang['User_allowpm'] = "���� �� ����� ����� ���������";
$lang['User_allowavatar'] = "���� �� ��� ������";

$lang['Admin_avatar_explain'] = "��� ������ �� ������ � �������� ������� �� �����������.";

$lang['User_special'] = "��������� ������, ������� ���� �� ��������������";
$lang['User_special_explain'] = "These fields are not able to be modified by the users.  Here you can set their status and other options that are not given to users.";


//
// Group Management
//
$lang['Group_administration'] = "�������������� �� �������";
$lang['Group_admin_explain'] = "From this panel you can administer all your usergroups, you can; delete, create and edit existing groups. You may choose moderators, toggle open/closed group status and set the group name and description";
$lang['Error_updating_groups'] = "There was an error while updating the groups";
$lang['Updated_group'] = "������� � �������� �������";
$lang['Added_new_group'] = "������ ����� � ��������� �������";
$lang['Deleted_group'] = "������� � ������� �������";
$lang['New_group'] = "��������� �� ���� �����";
$lang['Edit_group'] = "�������";
$lang['group_name'] = "��� �� �������";
$lang['group_description'] = "�������� �� �������";
$lang['group_moderator'] = "��������� �� �������";
$lang['group_status'] = "������ �� �������";
$lang['group_open'] = "��������";
$lang['group_closed'] = "���������";
$lang['group_hidden'] = "������";
$lang['group_delete'] = "���������";
$lang['group_delete_check'] = "������ ���� �����";
$lang['submit_group_changes'] = "����� ���������";
$lang['reset_group_changes'] = "������� ���������";
$lang['No_group_name'] = "������ �� �������� ��� �� �������";
$lang['No_group_moderator'] = "������ �� �������� ��������� �� �������";
$lang['No_group_mode'] = "������ �� �������� ������ �� �������";
$lang['delete_group_moderator'] = "��������� �� ����������";
$lang['delete_moderator_explain'] = "If you're changing the group moderator, check this box to remove the old moderator from the group.  Otherwise, do not check it, and the user will become a regular member of the group.";
$lang['Click_return_groupsadmin'] = "�������� %s���%s �� �� �� ������� � �������������� �� �������";
$lang['Select_group'] = "�������� �����";
$lang['Look_up_group'] = "��� �������";


//
// Prune Administration
//
$lang['Forum_Prune'] = "���������� �� �����";
$lang['Forum_Prune_explain'] = "This will delete any topic which has not been posted to within the number of days you select. If you do not enter a number then all topics will be deleted. It will not remove topics in which polls are still running nor will it remove announcements. You will need to remove these topics manually.";
$lang['Do_Prune'] = "�������";
$lang['All_Forums'] = "������ ������";
$lang['Prune_topics_not_posted'] = "������� ���� ��� ������� �� ����������";
$lang['Topics_pruned'] = "������ �� ���������";
$lang['Posts_pruned'] = "�������� �� ���������";
$lang['Prune_success'] = "������������ �� �������� � �������";


//
// Word censor
//
$lang['Words_title'] = "����������� ����";
$lang['Words_explain'] = "From this control panel you can add, edit, and remove words that will be automatically censored on your forums. In addition people will not be allowed to register with usernames containing these words. Wildcards (*) are accepted in the word field, eg. *test* will match detestable, test* would match testing, *test would match detest.";
$lang['Word'] = "����";
$lang['Edit_word_censor'] = "������� �� ������������� ����";
$lang['Replacement'] = "����������";
$lang['Add_new_word'] = "�������� �� ���� ����";
$lang['Update_word'] = "���������� �� ������������� ����";

$lang['Must_enter_word'] = "������ �� �������� ���� � ����������";
$lang['No_word_selected'] = "�� � ������� ���� �� �������";

$lang['Word_updated'] = "������������� ���� � �������� �������";
$lang['Word_added'] = "������ ����������� ���� � �������� �������";
$lang['Word_removed'] = "������������� ���� � ���������� �������";

$lang['Click_return_wordadmin'] = "�������� %s���%s �� �� �� ������� � ������������� ����";


//
// Mass Email
//
$lang['Mass_email_explain'] = "Here you can email a message to either all of your users, or all users of a specific group.  To do this, an email will be sent out to the administrative email address supplied, with a blind carbon copy sent to all recipients. If you are emailing a large group of people please be patient after submitting and do not stop the page halfway through. It is normal for amass emailing to take a long time, you will be notified when the script has completed";
$lang['Compose'] = "������ �� �����"; 

$lang['Recipients'] = "����������"; 
$lang['All_users'] = "������ �����������";

$lang['Email_successfull'] = "������������ �� � ��������� �������";
$lang['Click_return_massemail'] = "�������� %s���%s �� �� �� ������� � ������� ����";


//
// Ranks admin
//
$lang['Ranks_title'] = "�������������� �� ���������";
$lang['Ranks_explain'] = "Using this form you can add, edit, view and delete ranks. You can also create custom ranks which can be applied to a user via the user management facility";

$lang['Add_new_rank'] = "�������� �� ��� ����";

$lang['Rank_title'] = "������� �����";
$lang['Rank_special'] = "������ �� ��������� ����";
$lang['Rank_minimum'] = "������� ������";
$lang['Rank_maximum'] = "�������� ������";
$lang['Rank_image'] = "������� ����������� (���, ������ ��������� ����� �� phpBB)";
$lang['Rank_image_explain'] = "���� � ����� �����������, �������� � ���������� ����";

$lang['Must_select_rank'] = "������ �� �������� ����";
$lang['No_assigned_rank'] = "���� �������� ��������� ����";

$lang['Rank_updated'] = "������ � ������� �������";
$lang['Rank_added'] = "������ � ������� �������";
$lang['Rank_removed'] = "������ � ������ �������";

$lang['Click_return_rankadmin'] = "�������� %s���%s �� �� �� ������� � �������������� �� ���������";


//
// Disallow Username Admin
//
$lang['Disallow_control'] = "������� �� ������������� �����";
$lang['Disallow_explain'] = "Here you can control usernames which will not be allowed to be used.  Disallowed usernames are allowed to contain a wildcard character of *.  Please note that you will not be allowed to specify any username that has already been registered, you must first delete that name then disallow it";

$lang['Delete_disallow'] = "������";
$lang['Delete_disallow_title'] = "���������� �� ��������� ������������� ���";
$lang['Delete_disallow_explain'] = "������ �� ���������� ��������� ������������� ��� ���� �� ����������� � ������� � �������� ���������";

$lang['Add_disallow'] = "������";
$lang['Add_disallow_title'] = "�������� �� ��������� ������������� ���";
$lang['Add_disallow_explain'] = "������ �� ���������� * ���� �����, �� �� ��������� ��������� ������������� ����� ������������";

$lang['No_disallowed'] = "���� ��������� ������������� �����";

$lang['Disallowed_deleted'] = "����������� ������������� ��� � ���������� �������";
$lang['Disallow_successful'] = "����������� ������������� ��� � �������� �������";
$lang['Disallowed_already'] = "�����, ����� ��� ������, ������ �� ���� ���������. �� ���� � ���������, ��� � ����������� ����, ��� � ������������.";

$lang['Click_return_disallowadmin'] = "�������� %s���%s �� �� �� ������� � ������� �� ������������� �����";


//
// Styles Admin
//
$lang['Styles_admin'] = "Styles Administration";
$lang['Styles_explain'] = "Using this facility you can add, remove and manage styles (templates and themes) available to your users";
$lang['Styles_addnew_explain'] = "The following list contains all the themes that are available for the templates you currently have. The items on this list have not yet been installed into the phpBB database. To install a theme simply click the install link beside an entry";

$lang['Select_template'] = "Select a Template";

$lang['Style'] = "Style";
$lang['Template'] = "Template";
$lang['Install'] = "Install";
$lang['Download'] = "Download";

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

$lang['Confirm_delete_style'] = "Are you sure you want to delete this style";

$lang['Download_theme_cfg'] = "The exporter could not write the theme information file. Click the button below to download this file with your browser. Once you have downloaded it you can transfer it to the directory containing the template files. You can then package the files for distribution or use elsewhere if you desire";
$lang['No_themes'] = "The template you selected has no themes attached to it. To create a new theme click the Create New link on the left hand panel";
$lang['No_template_dir'] = "Could not open the template directory. It may be unreadable by the webserver or may not exist";
$lang['Cannot_remove_style'] = "You cannot remove the style selected since it is currently the forum default. Please change the default style and try again.";
$lang['Style_exists'] = "The style name to selected already exists, please go back and choose a different name.";

$lang['Click_return_styleadmin'] = "Click %sHere%s to return to Style Administration";

$lang['Theme_settings'] = "��������� �� ������";
$lang['Theme_element'] = "������� �� ������";
$lang['Simple_name'] = "������ ���";
$lang['Value'] = "��������";
$lang['Save_Settings'] = "������ ����������";

$lang['Stylesheet'] = "CSS �������";
$lang['Background_image'] = "������ ��������";
$lang['Background_color'] = "����� ����";
$lang['Theme_name'] = "��� �� ������";
$lang['Link_color'] = "���� �� ��������";
$lang['Text_color'] = "���� �� ������";
$lang['VLink_color'] = "���� �� ���������� ������";
$lang['ALink_color'] = "���� �� ��������� ������";
$lang['HLink_color'] = "���� �� ���������� ������";
$lang['Tr_color1'] = "���� �� �������� ��� 1";
$lang['Tr_color2'] = "���� �� �������� ��� 2";
$lang['Tr_color3'] = "���� �� �������� ��� 3";
$lang['Tr_class1'] = "���� �� �������� ��� 1";
$lang['Tr_class2'] = "���� �� �������� ��� 2";
$lang['Tr_class3'] = "���� �� �������� ��� 3";
$lang['Th_color1'] = "���� �� �������� ����� 1";
$lang['Th_color2'] = "���� �� �������� ����� 2";
$lang['Th_color3'] = "���� �� �������� ����� 3";
$lang['Th_class1'] = "���� �� �������� ����� 1";
$lang['Th_class2'] = "���� �� �������� ����� 2";
$lang['Th_class3'] = "���� �� �������� ����� 3";
$lang['Td_color1'] = "���� �� �������� ������ 1";
$lang['Td_color2'] = "���� �� �������� ������ 2";
$lang['Td_color3'] = "���� �� �������� ������ 3";
$lang['Td_class1'] = "���� �� �������� ������ 1";
$lang['Td_class2'] = "���� �� �������� ������ 2";
$lang['Td_class3'] = "���� �� �������� ������ 3";
$lang['fontface1'] = "����� 1";
$lang['fontface2'] = "����� 2";
$lang['fontface3'] = "����� 3";
$lang['fontsize1'] = "������ �� ������ 1";
$lang['fontsize2'] = "������ �� ������ 2";
$lang['fontsize3'] = "������ �� ������ 3";
$lang['fontcolor1'] = "���� �� ������ 1";
$lang['fontcolor2'] = "���� �� ������ 2";
$lang['fontcolor3'] = "���� �� ������ 3";
$lang['span_class1'] = "���� <span> 1";
$lang['span_class2'] = "���� <span> 2";
$lang['span_class3'] = "���� <span> 3";
$lang['img_poll_size'] = "������ �� ������������� �� ��������� �� ����������� � �������";
$lang['img_pm_size'] = "������ �� ������-���� �� ������� ��������� � �������";


//
// Install Process
//
$lang['Welcome_install'] = "����� ����� � ������������ �� phpBB 2";
$lang['Initial_config'] = "���� ������������";
$lang['DB_config'] = "������������ �� ������ �����";
$lang['Admin_config'] = "������������ �� ��������������";
$lang['continue_upgrade'] = "Once you have downloaded your config file to your local machine you may\"Continue Upgrade\" button below to move forward with the upgrade process.  Please wait to upload the config file until the upgrade process is complete.";
$lang['upgrade_submit'] = "�������� ��������";

$lang['Installer_Error'] = "An error has occurred during installation";
$lang['Previous_Install'] = "A previous installation has been detected";
$lang['Install_db_error'] = "An error occurred trying to update the database";

$lang['Re_install'] = "Your previous installation is still active. <br /><br />If you would like to re-install phpBB 2 you should click the Yes button below. Please be aware that doing so will destroy all existing data, no backups will be made! The administrator username and password you have used to login in to the board will be re-created after the re-installation, no other settings will be retained. <br /><br />Think carefully before pressing Yes!";

$lang['Inst_Step_0'] = "Thank you for choosing phpBB 2. In order to complete this install please fill out the details requested below. Please note that the database you install into should already exist. If you are installing to a database that uses ODBC, e.g. MS Access you should first create a DSN for it before proceeding.";

$lang['Start_Install'] = "������� �������������";
$lang['Finish_Install'] = "������� �������������";

$lang['Default_lang'] = "������� ���� �� �������";
$lang['DB_Host'] = "������ �� ������ ����� / DSN";
$lang['DB_Name'] = "��� �� ������ �����";
$lang['DB_Username'] = "������������� ��� �� ������ �����"; 
$lang['DB_Password'] = "������ �� ������ �����"; 
$lang['Database'] = "������ ���� �����";
$lang['Install_lang'] = "�������� ���� �� ������������";
$lang['dbms'] = "��� �� ������ �����";
$lang['Table_Prefix'] = "���������� �� ��������� � ������ �����";
$lang['Admin_Username'] = "������������ ��� �� ��������������";
$lang['Admin_Password'] = "������ �� ��������������";
$lang['Admin_Password_confirm'] = "������ �� �������������� (����������)";

$lang['Inst_Step_2'] = "����������� ������������� � ��������. �� ��� ��������� ���������� � ���������. ���� �� ������ �� ��������� ����������������� �� ������. ���� �� ���������� �� ���������� � ���� ������������ � �� �������� ������������ �������. ���������� ��, �� �������� phpBB 2.";

$lang['Unwriteable_config'] = "Config-����� �� � ���������� �� ������. ����� �� config-����� �� ���� ������ �� ������ ������, ���� ���� �������� ������ ����. ������ �� ������ ���� ���� � ������� �� phpBB 2. ���� ���� ��������� ����, ������ �� ������� � ������������������ ��� � ������, ����� ��������� �� ��������� ����� � �� �������� ����������������� ����� (���� ����� ��� � ������ �� ������ �������� �� ��������), �� �� ��������� ������������. ���������� ��, �� �������� phpBB 2.";
$lang['Download_config'] = "������� Config-����";

$lang['ftp_choose'] = "�������� ����� �� �������";
$lang['ftp_option'] = "<br />Since FTP extensions are enabled in this version of PHP you may also be given the option of first trying to automatically ftp the config file into place.";
$lang['ftp_instructs'] = "You have chosen to ftp the file to the account containing phpBB 2 automatically.  Please enter the information below to facilitate this process. Note that the FTP path should be the exact path via ftp to your phpBB2 installation as if you were ftping to it using any normal client.";
$lang['ftp_info'] = "�������� ������ FTP ����������";
$lang['Attempt_ftp'] = "Attempt to ftp config file into place";
$lang['Send_file'] = "Just send the file to me and I'll ftp it manually";
$lang['ftp_path'] = "FTP path to phpBB 2";
$lang['ftp_username'] = "Your FTP Username";
$lang['ftp_password'] = "Your FTP Password";
$lang['Transfer_config'] = "Start Transfer";
$lang['NoFTP_config'] = "The attempt to ftp the config file into place failed.  Please download the config file and ftp it into place manually.";

$lang['Install'] = "����������";
$lang['Upgrade'] = "�������";

$lang['Install_Method'] = "�������� ������ �� �����������";

//
// That's all Folks!
// -------------------------------------------------

?>