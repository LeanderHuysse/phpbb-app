<?php

/***************************************************************************
 *                            lang_admin.php [English]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_admin.php,v 1.25 2001/12/24 16:37:48 the_systech Exp $
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
$lang['General'] = "��ü��������";
$lang['Users'] = "ȸ������";
$lang['Groups'] = "�׷����";
$lang['Forums'] = "��������";
$lang['Styles'] = "��Ÿ�� ����";

$lang['Configuration'] = "����ȯ�漳��";
$lang['Permissions'] = "���Ѽ���";
$lang['Manage'] = "��ü����";
$lang['Disallow'] = "���ΰź� ȸ��";
$lang['Prune'] = "���� ����";
$lang['Mass_Email'] = "�׷����(���ϸ�)";
$lang['Ranks'] = "Level(��ŷ)����";
$lang['Smilies'] = "�����Ͼ�����";
$lang['Ban_Management'] = "��������ȸ��";
$lang['Word_Censor'] = "�ؽ�Ʈ ����";
$lang['Export'] = "�� ������";
$lang['Create_new'] = "�����";
$lang['Add_new'] = "�߰�";
$lang['Backup_DB'] = "����Ÿ���̽� ���";
$lang['Restore_DB'] = "����Ÿ���̽� ����";


//
// Index
//
$lang['Admin'] = "������������";
$lang['Not_admin'] = "����� �������� �����ڰ� �ƴմϴ�.";
$lang['Welcome_phpBB'] = "phpBB�� ���Ű��� ȯ���մϴ�.";
$lang['Admin_intro'] = "phpBB �� �������ֽ� ��ſ��� ����帳�ϴ�..�� ��ũ���� ������ ��� �پ��ѱ�ɰ� ��迡���ؼ� ���� ����� �����ݴϴ�.. <u>Admin Index</u> �� Ŭ���ϸ� ������������ �ǵ��ư��� ������ phpBB �ΰ� Ŭ���Ͻø� ������������ �̵��մϴ�.. �� ��ũ���� ���� ���鿡�ִ� ��ũ���� ����� ����� ��� ���������,������Ʈ�� �����ϵ��� �Ұ��Դϴ�..";
$lang['Main_index'] = "���� ����";
$lang['Forum_stats'] = "���ΰ��� ������";
$lang['Admin_Index'] = "���� ����������";
$lang['Preview_forum'] = "���� �̸�����";

$lang['Click_return_admin_index'] = "%s���� ������������%s ";

$lang['Statistic'] = "���ġ";
$lang['Value'] = "��ġ";
$lang['Number_posts'] = "��ü �Խù�";
$lang['Posts_per_day'] = "1�� �Խù� �� %";
$lang['Number_topics'] = "��ü ������";
$lang['Topics_per_day'] = "1�� ������ �� %";
$lang['Number_users'] = "�� ȸ�� ��";
$lang['Users_per_day'] = "1�� ���� �� %";
$lang['Board_started'] = "���� ��������";
$lang['Avatar_dir_size'] = "�ƹ�Ÿ ���丮 ������";
$lang['Database_size'] = "����Ÿ���̽� ������";
$lang['Gzip_compression'] ="Gzip ����";
$lang['Not_available'] = "����Ҽ� ����";

$lang['ON'] = "ON"; // This is for GZip compression
$lang['OFF'] = "OFF"; 


//
// DB Utils
//
$lang['Database_Utilities'] = "�����ͺ��̽� ��ƿ��Ƽ";

$lang['Restore'] = "����";
$lang['Backup'] = "���";
$lang['Restore_explain'] = "������ ���Ϸκ��� ��� phpBB�� ���̺���� �����Ͽ� �����մϴ�..������ GZIP�� �����ϸ� ����� GZIP �ؽ�Ʈ ������ ���ε� �Ҽ� ������ �ڵ����� �뷮�� �پ������Դϴ�..<b>���</b> : �̰��� ������ ��� ����ϴ�..���� �ð��� ��԰ɸ����� �𸣴°��� ������ �������������� �������� �������� �ʱ⶧���Դϴ�.";
$lang['Backup_explain'] = "���⼭ ����� phpBB�� �� ������� �����͸� ��� ó���Ҽ� �ֽ��ϴ�..";

$lang['Backup_options'] = "����ɼ�";
$lang['Start_backup'] = "�������";
$lang['Full_backup'] = "���� ���";
$lang['Structure_backup'] = "������ ���";
$lang['Data_backup'] = "����Ÿ�� ���";
$lang['Additional_tables'] = "���̺� �߰�";
$lang['Gzip_compress'] = "Gzip ���Ϸ� ����";
$lang['Select_file'] = "���ϼ���";
$lang['Start_Restore'] = "��������";

$lang['Restore_success'] = "�����ͺ��̽��� ���������� �����Ǿ����ϴ�..<br /><br />������� �ñ��� ������ �����ڸ��� �־�� �մϴ�..";
$lang['Backup_download'] = "�ٿ�ε尡 ���۵� ������ ��ٸ�����.";
$lang['Backups_not_supported'] = "�˼��մϴ�..���� ����� �����ͺ��̽� �ý����� �����ͺ��̽� ����� �������� �ʽ��ϴ�..";

$lang['Restore_Error_uploading'] = "������� ���ε� Error";
$lang['Restore_Error_filename'] = "�����̸��� ������ �ֽ��ϴ�..�����غ��ð� �ٽ� �õ����ּ���..";
$lang['Restore_Error_decompress'] = "gzip ������ ������ ���ϼ� �����ϴ�..���������� ���ε� �Ͽ��ּ���.";
$lang['Restore_Error_no_file'] = "������ ���ε���� �ʾҽ��ϴ�.";


//
// Auth pages
//
$lang['Select_a_User'] = "ȸ������";
$lang['Select_a_Group'] = "�׷켱��";
$lang['Select_a_Forum'] = "��������";
$lang['Auth_Control_User'] = "ȸ�����Ѽ���"; 
$lang['Auth_Control_Group'] = "�׷���Ѽ���"; 
$lang['Auth_Control_Forum'] = "�������Ѽ���"; 
$lang['Look_up_User'] = "ȸ�� ����"; 
$lang['Look_up_Group'] = "�׷� ����"; 
$lang['Look_up_Forum'] = "���� ����"; 

$lang['Group_auth_explain'] = "�������� �ٲܼ� �ֽ��ϴ�..�׸��� ��������ڰ� �����׷쿡 �����ڽź��� �絵�Ͽ����ϴ�.. ������ ��û�� �������� ���� �з�,���ε��� �ؾ������ �����ּ���..���� ������ �� ����̸� ����� ������ ���Դϴ�.";
$lang['User_auth_explain'] = "�������� �ٲܼ� �ֽ��ϴ�..�׸��� ��������ڰ� �����׷쿡 �����ڽź��� �絵�Ͽ����ϴ�.. ������ ��û�� �������� ���� �з�,���ε��� �ؾ������ �����ּ���..���� ������ �� ����̸� ����� ������ ���Դϴ�.";
$lang['Forum_auth_explain'] = "���⼭ �� ������ ������ �ٲܼ� �ֽ��ϴ�.. ";

$lang['Simple_mode'] = "���ܿɼǼ��� Mode";
$lang['Advanced_mode'] = "���οɼǼ��� Mode";
$lang['Moderator_status'] = "������ ���";

$lang['Allowed_Access'] = "�������";
$lang['Disallowed_Access'] = "��������";
$lang['Is_Moderator'] = "������ ����";
$lang['Not_Moderator'] = "������ ����";

$lang['Conflict_warning'] = "����մϴ�.";
$lang['Conflict_access_userauth'] = "�� ����ڴ� �������� �׷�ȸ���ڰݰ� ���ٱ����� ������ �ֽ��ϴ�..����� �� ������� �׷� �������� �ٲٰų� �����Ҽ� �ֽ��ϴ�.";
$lang['Conflict_mod_userauth'] = "�� ����ڴ� �������� �׷�ȸ���ڰݰ� ���ٱ����� ������ �ֽ��ϴ�..����� �� ������� �׷� �������� �ٲٰų� �����Ҽ� �ֽ��ϴ�.";

$lang['Conflict_access_groupauth'] = "�� ���� ����ڴ� ������� ������ȯ���� �����ϴ� �� �������� ���ٱ����� ������ ������ �ֽ��ϴ�..���� ������ �������ִ� ����ڵ��� ��ȣ�ϱ����� ���� ����� �������� �ٲܼ� �ֽ��ϴ�..�׸��� ����ڵ��� ������  ����Ǵ°��� �����Ͽ����ϴ�.";
$lang['Conflict_mod_groupauth'] = "�� ���� ����ڴ� ������� ������ȯ���� �����ϴ� �� �������� ���ٱ����� ������ ������ �ֽ��ϴ�..���� ������ �������ִ� ����ڵ��� ��ȣ�ϱ����� ���� ����� �������� �ٲܼ� �ֽ��ϴ�..�׸��� ����ڵ��� ������  ����Ǵ°��� �����Ͽ����ϴ�.";

$lang['Public'] = "��������";
$lang['Private'] = "�������";
$lang['Registered'] = "ȸ������";
$lang['Administrators'] = "������";
$lang['Hidden'] = "����";

$lang['View'] = "����";
$lang['Read'] = "�б�";
$lang['Post'] = "�ۼ�";
$lang['Reply'] = "����";
$lang['Edit'] = "����";
$lang['Delete'] = "����";
$lang['Sticky'] = "�о��";
$lang['Announce'] = "��������"; 
$lang['Vote'] = "��ǥ";
$lang['Pollcreate'] = "�������縸���";

$lang['Permissions'] = "���� ���Ѽ���";
$lang['Simple_Permission'] = "�ܼ� ������";

$lang['User_Level'] = "ȸ������"; 
$lang['Auth_User'] = "ȸ��";
$lang['Auth_Admin'] = "������";
$lang['Group_memberships'] = "�����׷� �����";
$lang['Usergroup_members'] = "����׷��� ȸ��";

$lang['Forum_auth_updated'] = "������ ���ٱ��� ������ ������Ʈ �Ͽ����ϴ�.";
$lang['User_auth_updated'] = "ȸ���� ���ٱ��� ������ ������Ʈ �Ͽ����ϴ�.";
$lang['Group_auth_updated'] = "�׷���� ������Ʈ";

$lang['Auth_updated'] = "���Ѽ��� ������Ʈ";
$lang['Click_return_userauth'] = "Click %sHere%s to return to User Permissions";
$lang['Click_return_groupauth'] = "Click %sHere%s to return to Group Permissions";
$lang['Click_return_forumauth'] = "Click %sHere%s to return to Forum Permissions";


//
// Banning
//
$lang['Ban_control'] = "�������� ����";
$lang['Ban_explain'] = "���⼭ ����� �������� ��� �Ҽ� �ֽ��ϴ�.. ��Ȯ�� IP Ȥ�� hostnames�� �̿��Ͽ� �����Ҽ� �ֽ��ϴ�. . �� ����� ���ܵ� ȸ���� ������ index �������� �������� ���ϰ� �մϴ�. ";
$lang['Ban_explain_warn'] = "���� ����Ʈ�� ���� IP �ּ��� �����ȿ� ���۰� �������� ��� �ּҵ鿡 �����ϴ°��� ���� �Ͻʽÿ�";

$lang['Select_username'] = "���̵� �����ϼ���";
$lang['Select_ip'] = "IP�� �����ϼ���";
$lang['Select_email'] = "Email�� �����ϼ���";

$lang['Ban_username'] = "1�� ����  or �� ���� Ư�� �����";
$lang['Ban_username_explain'] = "1���� ����ڿ���  ������ �����ϸ� �� �������� ���콺�� Ű������ �޺���̼��� �̷������ �ʽ��ϴ�.";

$lang['Ban_IP'] = "Ban one or more IP addresses or hostnames";
$lang['IP_hostname'] = "IP addresses or hostnames";
$lang['Ban_IP_explain'] = "To specify several different IP's or hostnames separate them with commas. To specify a range of IP addresses separate the start and end with a hyphen (-), to specify a wildcard use *";

$lang['Ban_email'] = "Ban one or more email addresses";
$lang['Ban_email_explain'] = "To specify more than one email address separate them with commas. To specify a wildcard username use *, for example *@hotmail.com";

$lang['Unban_username'] = "Un-ban one more specific users";
$lang['Unban_username_explain'] = "You can unban multiple users in one go using the appropriate combination of mouse and keyboard for your computer and browser";

$lang['Unban_IP'] = "Un-ban one or more IP addresses";
$lang['Unban_IP_explain'] = "You can unban multiple IP addresses in one go using the appropriate combination of mouse and keyboard for your computer and browser";

$lang['Unban_email'] = "Un-ban one or more email addresses";
$lang['Unban_email_explain'] = "You can unban multiple email addresses in one go using the appropriate combination of mouse and keyboard for your computer and browser";

$lang['No_banned_users'] = "No banned usernames";
$lang['No_banned_ip'] = "No banned IP addresses";
$lang['No_banned_email'] = "No banned email addresses";

$lang['Ban_update_sucessful'] = "The banlist has been updated successfully";
$lang['Click_return_banadmin'] = "Click %sHere%s to return to Ban Control";


//
// Configuration
//
$lang['General_Config'] = "���� ��ü ȯ�漳��";
$lang['Config_explain'] = "The form below will allow you to customize all the general board options. For User and Forum configurations use the related links on the left hand side.";

$lang['Click_return_config'] = "%s����ȯ�漳�� �������� �ǵ��ư���%s";

$lang['General_settings'] = "���� ��ü ȯ�漳��";
$lang['Site_name'] = "����Ʈ �̸�";
$lang['Site_desc'] = "����Ʈ �Ұ�";
$lang['Board_disable'] = "���� ��ױ�";
$lang['Board_disable_explain'] = "������ ������ �Ͻ÷� ��װų� ���� ���������� �̿ɼǿ� üũ�Ͻø� ��������� ������ �˴ϴ�..";
$lang['Acct_activation'] = "Enable account activation";
$lang['Acc_None'] = "None"; // These three entries are the type of activation
$lang['Acc_User'] = "User";
$lang['Acc_Admin'] = "Admin";

$lang['Abilities_settings'] = "����/ȸ�� �⺻���� ����";
$lang['Max_poll_options'] = "�����ɼ� �ִ� �� ����";
$lang['Flood_Interval'] = "�� �ۼ��ð� ����";
$lang['Flood_Interval_explain'] = "������ �ð����� �����̾��� �ڵ��α׾ƿ� "; 
$lang['Board_email_form'] = "�������� �̸��� ����ϱ�";
$lang['Board_email_form_explain'] = "ȸ�����̵�� ȸ������ ������ �����±��";
$lang['Topics_per_page'] = "���������� �̵� ������ ��";
$lang['Posts_per_page'] = "���������� �̵� ���� ��";
$lang['Hot_threshold'] = "������ǥ�� �α�Խù� ��";
$lang['Default_style'] = "�⺻��Ÿ��";
$lang['Override_style'] = "ȸ�� ��Ÿ�ϼ���";
$lang['Override_style_explain'] = "��Ÿ���� ȸ���� �����Ҽ��ֵ��� ����";
$lang['Default_language'] = "�⺻���";
$lang['Date_format'] = "��¥����";
$lang['System_timezone'] = "�ð�����";
$lang['Enable_gzip'] = "GZip ����";
$lang['Enable_prune'] = "�ڵ��������";
$lang['Allow_HTML'] = "HTML ���";
$lang['Allow_BBCode'] = "BBCode ���";
$lang['Allowed_tags'] = "HTML tags �Է�";
$lang['Allowed_tags_explain'] = "�±״� , �� �����մϴ�.";
$lang['Allow_smilies'] = "Smilies ���";
$lang['Smilies_path'] = "Smilies ���";
$lang['Smilies_path_explain'] = "FullPath �� �ƴ� phpbb ��Ʈ���丮��������(images/smilies)";
$lang['Allow_sig'] = "������";
$lang['Max_sig_length'] = "���� ���� ��";
$lang['Max_sig_length_explain'] = "ȸ�������� 255�ڸ� ������ �����ϴ�.";
$lang['Allow_name_change'] = "���̵� �ٲٱ�";

$lang['Avatar_settings'] = "�ƹ�Ÿ ����";
$lang['Allow_local'] = "�ƹ�Ÿ�ַ���";
$lang['Allow_remote'] = "�ƹ�Ÿ��ũ";
$lang['Allow_remote_explain'] = "�¶��λ� �ִ� �ƹ�Ÿ�� ��ũ�մϴ�.";
$lang['Allow_upload'] = "�ƹ�Ÿ���ε�";
$lang['Max_filesize'] = "�ƹ�Ÿ �ִ������";
$lang['Max_filesize_explain'] = "���ε��ϱ����� �ƹ�Ÿ ����";
$lang['Max_avatar_size'] = "�ƹ�Ÿ ũ��";
$lang['Max_avatar_size_explain'] = "(���� x ���� in pixels)";
$lang['Avatar_storage_path'] = "�ƹ�Ÿ ���";
$lang['Avatar_storage_path_explain'] = "FullPath �� �ƴ� phpbb ��Ʈ���丮��������(images/avatars)";
$lang['Avatar_gallery_path'] = "�ƹ�Ÿ Gallery Path";
$lang['Avatar_gallery_path_explain'] = "FullPath �� �ƴ� phpbb ��Ʈ���丮��������(images/avatars/gallery)";

$lang['COPPA_settings'] = "COPPA Settings";
$lang['COPPA_fax'] = "COPPA Fax Number";
$lang['COPPA_mail'] = "COPPA Mailing Address";
$lang['COPPA_mail_explain'] = "This is the mailing address where parents will send COPPA registration forms";

$lang['Email_settings'] = "Email ����";
$lang['Admin_email'] = "������ �� ����";
$lang['Email_sig'] = "�� ���� ����";
$lang['Email_sig_explain'] = "�������� ������ ������ ���� �����Դϴ�.";
$lang['Use_SMTP'] = "Use SMTP Server for email";
$lang['Use_SMTP_explain'] = "Say yes if you want or have to send email via a named server instead of the local mail function";
$lang['SMTP_server'] = "SMTP Server Address";

$lang['Disable_privmsg'] = "���� �ڽ�";
$lang['Inbox_limits'] = "���� ���� ��";
$lang['Sentbox_limits'] = "�������� ���� ��";
$lang['Savebox_limits'] = "����� ���� ���� ��";

$lang['Cookie_settings'] = "��Ű ����"; 
$lang['Cookie_settings_explain'] = "These control how the cookie sent to browsers is defined. In most cases the default should be sufficient. If you need to change these do so with care, incorrect settings can prevent users logging in.";
$lang['Cookie_name'] = "Cookie name";
$lang['Cookie_domain'] = "Cookie domain";
$lang['Cookie_path'] = "Cookie path";
$lang['Session_length'] = "Session length [ seconds ]";
$lang['Cookie_secure'] = "Cookie secure [ https ]";


//
// Forum Management
//
$lang['Forum_admin'] = "���������ڿ���";
$lang['Forum_admin_explain'] = "�����ڴ� ������ ������ ����,����,�����Ҽ������� ������ ����,��ũ���� �����Ҽ��ֽ��ϴ�.";
$lang['Edit_forum'] = "��������";
$lang['Create_forum'] = "������ �߰�";
$lang['Create_category'] = "����ī�װ� Ÿ��Ʋ";
$lang['Remove'] = "����";
$lang['Action'] = "����";
$lang['Update_order'] = "������Ʈ����";
$lang['Config_updated'] = "����ȯ�漳���� ���������� ������Ʈ �Ͽ����ϴ�.";
$lang['Edit'] = "����";
$lang['Delete'] = "����";
$lang['Move_up'] = "���� �̵�";
$lang['Move_down'] = "�������̵�";
$lang['Resync'] = "����Ÿ����(Resync)";
$lang['No_mode'] = "No mode was set";
$lang['Forum_edit_delete_explain'] = "The form below will allow you to customize all the general board options. For User and Forum configurations use the related links on the left hand side";

$lang['Move_contents'] = "������ �����̵� ";
$lang['Forum_delete'] = "���� ����";
$lang['Forum_delete_explain'] = "The form below will allow you to delete a forum (or category) and decide where you want to put all topics (or forums) it contained.";

$lang['Forum_settings'] = "��ü ��������";
$lang['Forum_name'] = "�����̸�";
$lang['Forum_desc'] = "�Ұ�";
$lang['Forum_status'] = "�������";
$lang['Forum_pruning'] = "�ڵ�����";

$lang['prune_freq'] = '������ ������ ��';
$lang['prune_days'] = "������ �����ۼ��� �ԽñⰣ";
$lang['Set_prune_data'] = "You have turned on auto-prune for this forum but did not set a frequency or number of days to prune. Please go back and do so";

$lang['Move_and_Delete'] = "�̵� or ����";

$lang['Delete_all_posts'] = "��ü�Խù� ����";
$lang['Nowhere_to_move'] = "�̵�ǥ�� ����������";

$lang['Edit_Category'] = "ī�װ� ����";
$lang['Edit_Category_explain'] = "�������� ī�װ� ����";

$lang['Forums_updated'] = "������ ī�װ������� ���������� ������Ʈ �Ͽ����ϴ�.";

$lang['Must_delete_forums'] = "You need to delete all forums before you can delete this category";

$lang['Click_return_forumadmin'] = "%s ���� �������� �ǵ��ư���%s";


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
$lang['User_admin'] = "ȸ����������";
$lang['User_admin_explain'] = "Here you can change your user's information and certain specific options. To modify the users permissions please use the user and group permissions system.";

$lang['Look_up_user'] = "���̵� ����";

$lang['Admin_user_fail'] = "Couldn't update the users profile.";
$lang['Admin_user_updated'] = "The user's profile was successfully updated.";
$lang['Click_return_useradmin'] = "Click %sHere%s to return to User Administration";

$lang['User_delete'] = "Delete this user";
$lang['User_delete_explain'] = "Click here to delete this user, this cannot be undone.";
$lang['User_deleted'] = "User was successfully deleted.";

$lang['User_status'] = "User is active";
$lang['User_allowpm'] = "Can send Private Messages";
$lang['User_allowavatar'] = "Can display avatar";

$lang['Admin_avatar_explain'] = "Here you can see and delete the user's current avatar.";

$lang['User_special'] = "Special admin-only fields";
$lang['User_special_explain'] = "These fields are not able to be modified by the users.  Here you can set their status and other options that are not given to users.";


//
// Group Management
//
$lang['Group_administration'] = "Group Administration";
$lang['Group_admin_explain'] = "From this panel you can administer all your usergroups, you can; delete, create and edit existing groups. You may choose moderators, toggle open/closed group status and set the group name and description";
$lang['Error_updating_groups'] = "There was an error while updating the groups";
$lang['Updated_group'] = "The group was successfully updated";
$lang['Added_new_group'] = "The new group was successfully created";
$lang['Deleted_group'] = "The group was successfully deleted";
$lang['New_group'] = "Create new group";
$lang['Edit_group'] = "Edit group";
$lang['group_name'] = "Group name";
$lang['group_description'] = "Group description";
$lang['group_moderator'] = "Group moderator";
$lang['group_status'] = "Group status";
$lang['group_open'] = "Open group";
$lang['group_closed'] = "Closed group";
$lang['group_hidden'] = "Hidden group";
$lang['group_delete'] = "Delete group";
$lang['group_delete_check'] = "Delete this group";
$lang['submit_group_changes'] = "Submit Changes";
$lang['reset_group_changes'] = "Reset Changes";
$lang['No_group_name'] = "You must specify a name for this group";
$lang['No_group_moderator'] = "You must specify a moderator for this group";
$lang['No_group_mode'] = "You must specify a mode for this group, open or closed";
$lang['delete_group_moderator'] = "Delete the old group moderator?";
$lang['delete_moderator_explain'] = "If you're changing the group moderator, check this box to remove the old moderator from the group.  Otherwise, do not check it, and the user will become a regular member of the group.";
$lang['Click_return_groupsadmin'] = "Click %sHere%s to return to Group Administration.";
$lang['Select_group'] = "Select a group";
$lang['Look_up_group'] = "Look up group";


//
// Prune Administration
//
$lang['Forum_Prune'] = "Forum Prune";
$lang['Forum_Prune_explain'] = "This will delete any topic which has not been posted to within the number of days you select. If you do not enter a number then all topics will be deleted. It will not remove topics in which polls are still running nor will it remove announcements. You will need to remove these topics manually.";
$lang['Do_Prune'] = "Do Prune";
$lang['All_Forums'] = "All Forums";
$lang['Prune_topics_not_posted'] = "Prune topics with no replies in this many days";
$lang['Topics_pruned'] = "Topics pruned";
$lang['Posts_pruned'] = "Posts pruned";
$lang['Prune_success'] = "Pruning of forums was successful";


//
// Word censor
//
$lang['Words_title'] = "Word Censoring";
$lang['Words_explain'] = "From this control panel you can add, edit, and remove words that will be automatically censored on your forums. In addition people will not be allowed to register with usernames containing these words. Wildcards (*) are accepted in the word field, eg. *test* will match detestable, test* would match testing, *test would match detest.";
$lang['Word'] = "Word";
$lang['Edit_word_censor'] = "Edit word censor";
$lang['Replacement'] = "Replacement";
$lang['Add_new_word'] = "Add new word";
$lang['Update_word'] = "Update word censor";

$lang['Must_enter_word'] = "You must enter a word and its replacement";
$lang['No_word_selected'] = "No word selected for editing";

$lang['Word_updated'] = "The selected word censor has been successfully updated";
$lang['Word_added'] = "The word censor has been successfully added";
$lang['Word_removed'] = "The selected word censor has been successfully removed";

$lang['Click_return_wordadmin'] = "Click %sHere%s to return to Word Censor Administration";


//
// Mass Email
//
$lang['Mass_email_explain'] = "Here you can email a message to either all of your users, or all users of a specific group.  To do this, an email will be sent out to the administrative email address supplied, with a blind carbon copy sent to all recipients. If you are emailing a large group of people please be patient after submitting and do not stop the page halfway through. It is normal for amass emailing to take a long time, you will be notified when the script has completed";
$lang['Compose'] = "Compose"; 

$lang['Recipients'] = "Recipients"; 
$lang['All_users'] = "All Users";

$lang['Email_successfull'] = "Your message has been sent";
$lang['Click_return_massemail'] = "Click %sHere%s to return to the Mass Email form";


//
// Ranks admin
//
$lang['Ranks_title'] = "Rank Administration";
$lang['Ranks_explain'] = "Using this form you can add, edit, view and delete ranks. You can also create custom ranks which can be applied to a user via the user management facility";

$lang['Add_new_rank'] = "Add new rank";

$lang['Rank_title'] = "Rank Title";
$lang['Rank_special'] = "Set as Special Rank";
$lang['Rank_minimum'] = "Minimum Posts";
$lang['Rank_maximum'] = "Maximum Posts";
$lang['Rank_image'] = "Rank Image (Relative to phpBB2 root path)";
$lang['Rank_image_explain'] = "Use this to define a small image associated with the rank";

$lang['Must_select_rank'] = "You must select a rank";
$lang['No_assigned_rank'] = "No special rank assigned";

$lang['Rank_updated'] = "The rank was successfully updated";
$lang['Rank_added'] = "The rank was successfully added";
$lang['Rank_removed'] = "The rank was successfully deleted";

$lang['Click_return_rankadmin'] = "Click %sHere%s to return to Rank Administration";


//
// Disallow Username Admin
//
$lang['Disallow_control'] = "Username Disallow Control";
$lang['Disallow_explain'] = "Here you can control usernames which will not be allowed to be used.  Disallowed usernames are allowed to contain a wildcard character of *.  Please note that you will not be allowed to specify any username that has already been registered, you must first delete that name then disallow it";

$lang['Delete_disallow'] = "Delete";
$lang['Delete_disallow_title'] = "Remove a Disallowed Username";
$lang['Delete_disallow_explain'] = "You can remove a disallowed username by selecting the username from this list and clicking submit";

$lang['Add_disallow'] = "Add";
$lang['Add_disallow_title'] = "Add a disallowed username";
$lang['Add_disallow_explain'] = "You can disallow a username using the wildcard character * to match any character";

$lang['No_disallowed'] = "No Disallowed Usernames";

$lang['Disallowed_deleted'] = "The disallowed username has been successfully removed";
$lang['Disallow_successful'] = "The disallowed username has ben successfully added";
$lang['Disallowed_already'] = "The name you entered could not be disallowed. It either already exists in the list, exists in the word censor list, or a matching username is present";

$lang['Click_return_disallowadmin'] = "Click %sHere%s to return to Disallow Username Administration";


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

$lang['Theme_settings'] = "Theme Settings";
$lang['Theme_element'] = "Theme Element";
$lang['Simple_name'] = "Simple Name";
$lang['Value'] = "Value";

$lang['Stylesheet'] = "CSS Stylesheet";
$lang['Background_image'] = "Background Image";
$lang['Background_color'] = "Background Colour";
$lang['Theme_name'] = "Theme Name";
$lang['Link_color'] = "Link Colour";
$lang['Text_color'] = "Text Colour";
$lang['VLink_color'] = "Visited Link Colour";
$lang['ALink_color'] = "Active Link Colour";
$lang['HLink_color'] = "Hover Link Colour";
$lang['Tr_color1'] = "Table Row Colour 1";
$lang['Tr_color2'] = "Table Row Colour 2";
$lang['Tr_color3'] = "Table Row Colour 3";
$lang['Tr_class1'] = "Table Row Class 1";
$lang['Tr_class2'] = "Table Row Class 2";
$lang['Tr_class3'] = "Table Row Class 3";
$lang['Th_color1'] = "Table Header Colour 1";
$lang['Th_color2'] = "Table Header Colour 2";
$lang['Th_color3'] = "Table Header Colour 3";
$lang['Th_class1'] = "Table Header Class 1";
$lang['Th_class2'] = "Table Header Class 2";
$lang['Th_class3'] = "Table Header Class 3";
$lang['Td_color1'] = "Table Cell Colour 1";
$lang['Td_color2'] = "Table Cell Colour 2";
$lang['Td_color3'] = "Table Cell Colour 3";
$lang['Td_class1'] = "Table Cell Class 1";
$lang['Td_class2'] = "Table Cell Class 2";
$lang['Td_class3'] = "Table Cell Class 3";
$lang['fontface1'] = "Font Face 1";
$lang['fontface2'] = "Font Face 2";
$lang['fontface3'] = "Font Face 3";
$lang['fontsize1'] = "Font Size 1";
$lang['fontsize2'] = "Font Size 2";
$lang['fontsize3'] = "Font Size 3";
$lang['fontcolor1'] = "Font Colour 1";
$lang['fontcolor2'] = "Font Colour 2";
$lang['fontcolor3'] = "Font Colour 3";
$lang['span_class1'] = "Span Class 1";
$lang['span_class2'] = "Span Class 2";
$lang['span_class3'] = "Span Class 3";
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

$lang['Start_Install'] = "Start Install";
$lang['Finish_Install'] = "Finish Installation";

$lang['Default_lang'] = "Default board language";
$lang['DB_Host'] = "Database Server Hostname / DSN";
$lang['DB_Name'] = "Your Database Name";
$lang['DB_Username'] = "Database Username";
$lang['DB_Password'] = "Database Password";
$lang['Database'] = "Your Database";
$lang['Install_lang'] = "Choose Language for Installation";
$lang['dbms'] = "Database Type";
$lang['Table_Prefix'] = "Prefix for tables in database";
$lang['Admin_Username'] = "Administrator Username";
$lang['Admin_Password'] = "Administrator Password";
$lang['Admin_Password_confirm'] = "Administrator Password [ Confirm ]";

$lang['Inst_Step_2'] = "Your admin username has been created.  At this point your basic installation is complete. You will now be taken to a screen which will allow you to administer your new installation. Please be sure to check the General Configuration details and make any required changes. Thank you for choosing phpBB 2.";

$lang['Unwriteable_config'] = "Your config file is un-writeable at present. A copy of the config file will be downloaded to your when you click the button below. You should upload this file to the same directory as phpBB 2. Once this is done you should log in using the administrator name and password you provided on the previous form and visit the admin control centre (a link will appear at the bottom of each screen once logged in) to check the general configuration. Thank you for choosing phpBB 2.";
$lang['Download_config'] = "Download Config";

$lang['ftp_choose'] = "Choose Download Method";
$lang['ftp_option'] = "<br />Since FTP extensions are enabled in this version of PHP you may also be given the option of first trying to automatically ftp the config file into place.";
$lang['ftp_instructs'] = "You have chosen to ftp the file to the account containing phpBB 2 automatically.  Please enter the information below to facilitate this process. Note that the FTP path should be the exact path via ftp to your phpBB2 installation as if you were ftping to it using any normal client.";
$lang['ftp_info'] = "Enter Your FTP Information";
$lang['Attempt_ftp'] = "Attempt to ftp config file into place";
$lang['Send_file'] = "Just send the file to me and I'll ftp it manually";
$lang['ftp_path'] = "FTP path to phpBB 2";
$lang['ftp_username'] = "Your FTP Username";
$lang['ftp_password'] = "Your FTP Password";
$lang['Transfer_config'] = "Start Transfer";
$lang['NoFTP_config'] = "The attempt to ftp the config file into place failed.  Please download the config file and ftp it into place manually.";

$lang['Install'] = "Install";
$lang['Upgrade'] = "Upgrade";


$lang['Install_Method'] = "Choose your installation method";

//
// That's all Folks!
// -------------------------------------------------

?>
