<?php
/***************************************************************************
 *                            lang_main.php [Korean]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_main.php,v 1.72 2001/12/24 20:31:35 psotfx Exp $
 * ----------------------------------------------------------------------------
 *     korean Language Edited by donguook,ryu(������)
 *     E-Mail             : nexus@dreamwiz.com
 ****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/


setlocale(LC_ALL, "ko_KR.eucKR");
$lang['ENCODING'] = "euc-kr";
$lang['DIRECTION'] = "ltr";
$lang['LEFT'] = "left";
$lang['RIGHT'] = "right";
$lang['DATE_FORMAT'] =  "Y�� m�� d��"; // This should be changed to the default date format for your language, php date() format

//
// Common, these terms are used
// extensively on several pages
//
$lang['Forum'] = "����";
$lang['Category'] = "ī�װ�";
$lang['Topic'] = "Topic";
$lang['Topics'] = "������";
$lang['Replies'] = "����";
$lang['Views'] = "��ȸ";
$lang['Post'] = "�ۼ���";
$lang['Posts'] = "��б�";
$lang['Posted'] = "�� �ۼ��ð� ";
$lang['Username'] = "���̵�";
$lang['Password'] = "��й�ȣ";
$lang['Email'] = "Email";
$lang['Poster'] = "Poster";
$lang['Author'] = "�� ����";
$lang['Time'] = "��";
$lang['Hours'] = "�ð�";
$lang['Message'] = "�޼��� ����";

$lang['1_Day'] = "1�� ��";
$lang['7_Days'] = "7�� ��";
$lang['2_Weeks'] = "2�� �̳�";
$lang['1_Month'] = "1���� ��";
$lang['3_Months'] = "3���� ��";
$lang['6_Months'] = "6���� ��";
$lang['1_Year'] = "1�� ��";

$lang['Go'] = "�̵�";
$lang['Jump_to'] = "�̵�";
$lang['Submit'] = " �Է¿Ϸ� ";
$lang['Reset'] = " �� �� ";
$lang['Cancel'] = " �� �� ";
$lang['Preview'] = " �̸����� ";
$lang['Confirm'] = " Ȯ �� ";
$lang['Spellcheck'] = "����üũ";
$lang['Yes'] = "��";
$lang['No'] = "�ƴϿ�";
$lang['Enabled'] = "�����";
$lang['Disabled'] = "������";
$lang['Error'] = "Error";

$lang['Next'] = "����";
$lang['Previous'] = "����";
$lang['Goto_page'] = "�������̵�";
$lang['Joined'] = "������";
$lang['IP_Address'] = "IP Address";

$lang['Select_forum'] = "��������";
$lang['View_latest_post'] = "���������� ��ϵȱ� ����";
$lang['View_newest_post'] = "���� �ö�±� ����";
$lang['Page_of'] = "Page %d of %d Page"; // Replaces with: Page 1 of 2 for example

$lang['ICQ'] = "ICQ Number";
$lang['AIM'] = "AIM Address";
$lang['MSNM'] = "MSN �޽���";
$lang['YIM'] = "Yahoo �޽���";

$lang['Forum_Index'] = "%s";  // eg. sitename Forum Index, %s can be removed if you prefer

$lang['Post_new_topic'] = "�� �������� �ۼ��մϴ�.";
$lang['Reply_to_topic'] = "�亯���� �ۼ��մϴ�.";
$lang['Reply_with_quote'] = "���� �ο��Ͽ� �ۼ��մϴ�.";

$lang['Click_return_topic'] = "%s[�Խù� ����]%s"; // %s's here are for uris, do not remove!
$lang['Click_return_login'] = "%s[�ٽ� �õ��ϱ�]%s";
$lang['Click_return_forum'] = "%s[���� �������� �ǵ��ư���]%s ";
$lang['Click_view_message'] = "%s[�ۼ��� ���� ���ϴ�.]%s";
$lang['Click_return_modcp'] = "%s[�������� �ǵ��ư���]%s ";
$lang['Click_return_group'] = "%s[�׷� �������� �ǵ��� ����]%s <p>";

$lang['Admin_panel'] = "������ �α���";

$lang['Board_disable'] = "���� �̿��Ҽ� ���� �����Դϴ�..";


//
// Global Header strings
//
$lang['Registered_users'] = "�������� ����ȸ�� ";
$lang['Online_users_zero_total'] = "����  <b>0</b> ���� ���� ���Դϴ�. ";
$lang['Online_users_total'] = "���� <b>%d</b> ���� ���� ���Դϴ�. ";
$lang['Online_user_total'] = "���� �������� ����  <b>%d</b> �� &nbsp &nbsp  &nbsp  &nbsp  &nbsp ";
$lang['Reg_users_zero_total'] = "����ȸ��  <b>0</b> �� &nbsp &nbsp  &nbsp  &nbsp  &nbsp ";
$lang['Reg_users_total'] = "����ȸ��  <b>%d</b> �� &nbsp &nbsp  &nbsp  &nbsp  &nbsp ";
$lang['Reg_user_total'] = "����ȸ��  <b>%d</b> �� &nbsp &nbsp  &nbsp  &nbsp  &nbsp ";
$lang['Hidden_users_zero_total'] = "����� ȸ��  <b>0</b> �� &nbsp  &nbsp  &nbsp  &nbsp ";
$lang['Hidden_user_total'] = "����� ȸ��  <b>%d</b> ��  &nbsp  &nbsp  &nbsp  &nbsp ";
$lang['Hidden_user_total'] = "�� ����� ȸ��  <b>%d</b> �� ";
$lang['Guest_users_zero_total'] = "�մ�  <b>0</b> ��";
$lang['Guest_users_total'] = "�մ�  <b>%d</b> ��";
$lang['Guest_user_total'] = "�մ�  <b>%d</b> ��";

$lang['You_last_visit'] = "��ȸ ����  %s"; // %s replaced by date/time
$lang['Current_time'] = "���� �ð�  %s"; // %s replaced by time

$lang['Search_new'] = "���� ��ϵ� �� ����";
$lang['Search_your_posts'] = "���� �ۼ��� �Խù�";
$lang['Search_unanswered'] = "�亯���� �Խù� ����";

$lang['Register'] = "ȸ������";
$lang['Profile'] = "�������� ���� / ����";
$lang['Edit_profile'] = "�������� ����";
$lang['Search'] = " �� �� ";
$lang['Memberlist'] = "Memberlist";
$lang['FAQ'] = "FAQ";
$lang['BBCode_guide'] = "BBCode �ȳ�";
$lang['Usergroups'] = "���� �׷�";
$lang['Last_Post'] = "������ ��� ��";
$lang['Moderator'] = "���������� ";
$lang['Moderators'] = "���������� ";


//
// Stats block text
//
$lang['Posted_articles_zero_total'] = "���� �� ��� �Խù�  <b>0</b> ��"; // Number of posts
$lang['Posted_articles_total'] = "���� �� ��� �Խù�  <b>%d</b> ��"; // Number of posts
$lang['Posted_article_total'] = "���� �� ��� �Խù�   <b>%d</b> ����"; // Number of posts
$lang['Registered_users_zero_total'] = "���� �� ����ȸ��  <b>0</b> ��..."; // # registered users
$lang['Registered_users_total'] = "���� �� ����ȸ��  <b>%d</b> �� "; // # registered users
$lang['Registered_user_total'] = "���� �� ����ȸ��  <b>%d</b> �� "; // # registered users
$lang['Newest_user'] = "�ֱ� �űԵ����  <b>%s%s%s</b>"; // a href, username, /a 

$lang['No_new_posts_last_visit'] = "������ �������� ���� ���۵� �Խù� ����";
$lang['No_new_posts'] = "�������������� �� �Խù�����";
$lang['New_posts'] = "�������������� �� �Խù�����";
$lang['New_post'] = "�� ��б�";
$lang['No_new_posts_hot'] = "�������������� �� �Խù����� ";
$lang['New_posts_hot'] = "�������������� �� �Խù����� ";
$lang['No_new_posts_locked'] = "������ ����������";
$lang['New_posts_locked'] = "������ ����������";
$lang['Forum_is_locked'] = "������ �������";


//
// Login
//
$lang['Enter_password'] = "���̵�� ��й�ȣ�� �Է��Ͽ� �α� �� �Ͻʽÿ�";
$lang['Login'] = "�α� ��";
$lang['Logout'] = "";

$lang['Forgotten_password'] = "��й�ȣ �н�";

$lang['Log_me_in'] = "��й�ȣ ���";

$lang['Error_login'] = "���̵� �Ǵ� ��й�ȣ�� ���� �ʽ��ϴ�.";


//
// Index page
//
$lang['Index'] = "Index";
$lang['No_Posts'] = "��ϵ� �� ����";
$lang['No_forums'] = "�� ����� ������ ���� ���� �ʽ��ϴ�.";

$lang['Private_Message'] = "�� �� ";
$lang['Private_Messages'] = "�� �� �� ";
$lang['Who_is_Online'] = "���������� ��ġ����";

$lang['Mark_all_forums'] = "��ũ�� ������� �б�";
$lang['Forums_marked_read'] = "��������� ���� ��ũ�� ǥ�õ�";


//
// Viewforum
//
$lang['View_forum'] = "��������";

$lang['Forum_not_exist'] = "����� ������ �� ������ �������� �ʽ��ϴ�";
$lang['Reached_on_error'] = "����� ������ �� �������� �����Ͽ����ϴ�";

$lang['Display_topics'] = "���� �Խù� ����";
$lang['All_Topics'] = "��ü�Խù�";

$lang['Topic_Announcement'] = "<b>�������� - </b>";
$lang['Topic_Sticky'] = "<b>�о�� - </b>";
$lang['Topic_Moved'] = "<b>�̵� - </b>";
$lang['Topic_Poll'] = "��ǥ";

$lang['Mark_all_topics'] = "��ũ�� ��� ������ �б�";
$lang['Topics_marked_read'] = "�� ������ �������� ���� ��ũǥ�õǾ����ϴ�. ";

$lang['Rules_post_can'] = "���� �� �ۼ� ����";
$lang['Rules_post_cannot'] = "������ �ۼ� �Ұ�";
$lang['Rules_reply_can'] = "�亯 �� ���� ����";
$lang['Rules_reply_cannot'] = "�亯 �� ���� �Ұ�";
$lang['Rules_edit_can'] = "�� ���� ���� - ����";
$lang['Rules_edit_cannot'] = "�� ���� �Ұ�";
$lang['Rules_delete_can'] = "�� ���� ���� - ����";
$lang['Rules_delete_cannot'] = "�� ���� �Ұ�";
$lang['Rules_vote_can'] = "�������� ����� ����";
$lang['Rules_vote_cannot'] = "�������� ����� �Ұ� ";
$lang['Rules_moderate'] = " %s���ð���%s  "; // %s replaced by a href links, do not remove! 

$lang['No_topics_post_one'] = "���� �� �������� ���� ��ϵ� ���� �����ϴ�.";


//
// Viewtopic
//
$lang['View_topic'] = "���� ����";

$lang['Guest'] = 'Guest';
$lang['Post_subject'] = "����";
$lang['View_next_topic'] = "���� ��";
$lang['View_previous_topic'] = "���� ��";
$lang['Submit_vote'] = "��ǥ�ϱ�";
$lang['View_results'] = "��ǥ���";

$lang['No_newer_topics'] = "�� �̻� �Խù��� �����ϴ�.";
$lang['No_older_topics'] = "�� �̻� �Խù��� �����ϴ�.";
$lang['Topic_post_not_exist'] = "��û�Ͻ� ������ Ȥ�� ��б��� �������� �ʽ��ϴ�. ";
$lang['No_posts_topic'] = "�� �����ۿ� ���� ��б��� �������� �ʽ��ϴ�";

$lang['Display_posts'] = "���� �Խù�����";
$lang['All_Posts'] = "��ü �޼���";
$lang['Newest_First'] = "�������� �޼�������";
$lang['Oldest_First'] = "�����޼��� ����";

$lang['Back_to_top'] = "�� ���� ����";

$lang['Read_profile'] = "ȸ�� ������ ����"; 
$lang['Send_email'] = "E-Mail ������";
$lang['Visit_website'] = "������� Ȩ �������� �̵��ϱ�";
$lang['ICQ_status'] = "ICQ ����";
$lang['Edit_delete_post'] = "�� ���� ����/�����մϴ�.";
$lang['View_IP'] = "IP ����";
$lang['Delete_post'] = "�� ���� �����մϴ�.";

$lang['wrote'] = "�� �ۼ�"; // proceeds the username and is followed by the quoted text
$lang['Quote'] = "�ο�"; // comes before bbcode quote output.
$lang['Code'] = "Code"; // comes before bbcode code output.

$lang['Edited_time_total'] = "������ ���� - %s  %s, ���� %d �հ�ð�"; // Last edited by me on 12 Oct 2001, edited 1 time in total
$lang['Edited_times_total'] = "������ ���� - %s  %s, ���� %d �հ�ð�"; // Last edited by me on 12 Oct 2001, edited 2 times in total

$lang['Lock_topic'] = "�̱��� ��޴ϴ�.";
$lang['Unlock_topic'] = "�̱��� ��������մϴ�.";
$lang['Move_topic'] = "�� ���� �̵��մϴ�.";
$lang['Delete_topic'] = "�� ���� �����մϴ�.";
$lang['Split_topic'] = "�� ���� �ɰ��ϴ�.";

$lang['Stop_watching_topic'] = "�� ������ �����ϱ� ����";
$lang['Start_watching_topic'] = "���õɶ����� �� ������ �����ϱ�.";
$lang['No_longer_watching'] = "�� �������� �� �̻� �������� ����";
$lang['You_are_watching'] = "����� ���� ���� �� �������� �������Դϴ�";


//
// Posting/Replying (Not private messaging!)
//
$lang['Message_body'] = "��������";
$lang['Topic_review'] = "Topic review";

$lang['No_post_mode'] = "��ȿ���� ���� �ۼ����"; // If posting.php is called without a mode (newtopic/reply/delete/etc, shouldn't be shown normaly)

$lang['Post_a_new_topic'] = "�� ������ �ۼ��ϱ�";
$lang['Post_a_reply'] = "�亯�� �ۼ��ϱ�";
$lang['Post_topic_as'] = "�� ���� ����";
$lang['Edit_Post'] = "�� �����ϱ�";
$lang['Options'] = "�ɼ�";
$lang['Attach_File'] = "����÷��";

$lang['Post_Announcement'] = "��������";
$lang['Post_Sticky'] = "�о��";
$lang['Post_Normal'] = "���� ��";

$lang['Confirm_delete'] = "��¥�� �����Ͻðڽ��ϱ�..?";
$lang['Confirm_delete_poll'] = "�� ��ǥ�� ��¥�� �����Ͻðڽ��ϱ�..?";

$lang['Flood_Error'] = "������ �ۼ� �� �� �ٷ� �Ȱ��� �ݺ��ؼ� �� �ٸ� �Խù��� ���� �� �����ϴ� ..";
$lang['Empty_subject'] = "�� ������ �Է����� �����̽��ϴ�.";
$lang['Empty_message'] = "���� ������ �Է����� �����̽��ϴ�.";
$lang['Forum_locked'] = "�˼��մϴ�.. �ۼ��Ҽ� �ִ±����� �����ϴ�..";
$lang['Topic_locked'] = "�� �������� ��ݼ��� �Ǿ��־� ���� �����̳� ������ �޼��� �����ϴ�.";
$lang['No_post_id'] = "�����ϱ� ���� ���� �����ؾ��մϴ�.";
$lang['No_topic_id'] = "�亯�ϱ� ���� �������� �����ؾ� �մϴ�.";
$lang['No_valid_mode'] = "����� �� �ο�,�亯�� ������ �Ҽ� �ֽ��ϴ�.���ư��� �ٽ� �õ��� �ֽʽÿ�.";
$lang['No_such_post'] = "ã�� �Խù��� �����ϴ�..���ư��� �ٽ� �õ� ���ֽʽÿ�";
$lang['Edit_own_posts'] = "�˼��մϴ�..������ �ۼ��� �۸� ���� �Ҽ� �ֽ��ϴ�";
$lang['Delete_own_posts'] = "�˼��մϴ�..������ �ۼ��� �۸� �����Ҽ� �ֽ��ϴ�.";
$lang['Cannot_delete_replied'] = "�˼��մϴ�..�亯�ۿ� ���� �Խù��� ������ �� �����ϴ�.";
$lang['Cannot_delete_poll'] = "�˼��մϴ�..Ȱ������ ����,��ǥ�� �����Ҽ� �����ϴ�.";
$lang['Empty_poll_title'] = "�Բ��� ���� ��ǥ�� ���� ������ �Է��ؾ� �մϴ�.";
$lang['To_few_poll_options'] = "�ּ� 2�� �̻��� ���� �ɼ��� �Է��ؾ� �մϴ�. ";
$lang['To_many_poll_options'] = "�������� ������ �����ɼ� �� �̻��� �Է��ϽǼ� �����ϴ�.";
$lang['Post_has_no_poll'] = "�� �Խù��� �������簡 �����ϴ�.";

$lang['Disallowed_extension'] = "���� %s ������ �ʽ��ϴ�."; // replace %s with extension (e.g. .php) 
$lang['Disallowed_Mime_Type'] = "���� Mime Type�� �ƴ�: %s<p>���� Types:<br>%s"; // mime type, allowed types 
$lang['Attachement_too_big'] = "�ʹ� ū ÷������,<br>�ִ� Size: %d Bytes"; // replace %d with maximum file size 
$lang['General_Upload_Error'] = "���ε� Error: ÷�������� ���ε����� ������ ���� %s"; // replace %s with local path 


$lang['Add_poll'] = "�������� �����";
$lang['Add_poll_explain'] = " ���Ŀ� �°� �Ʒ� �ʵ带�Է��Ͻø� �������縦 ����� �ֽ��ϴ�.";
$lang['Poll_question'] = "���� ����";
$lang['Poll_option'] = "���� �ɼ�";
$lang['Add_option'] = "�߰�";
$lang['Update'] = "������Ʈ";
$lang['Delete'] = " ��  �� ";
$lang['Poll_for'] = "���� ������";
$lang['Poll_for_explain'] = "[ ��) 10�� �Ķ�� 10�� �����ø� �˴ϴ�..�������� 0�� ������. ]";
$lang['Delete_poll'] = "���� ����";

$lang['Disable_HTML_post'] = "�� �ۿ��� HTML ������� ����";
$lang['Disable_BBCode_post'] = "�� �ۿ���BBCode ������� ����";
$lang['Disable_Smilies_post'] = "�� �ۿ��� Smilies Icon ������� ����";

$lang['HTML_is_ON'] = "HTML is <u>ON</u>";
$lang['HTML_is_OFF'] = "HTML is <u>OFF</u>";
$lang['BBCode_is_ON'] = "%sBBCode%s is <u>ON</u>"; // %s are replaced with URI pointing to FAQ
$lang['BBCode_is_OFF'] = "%sBBCode%s is <u>OFF</u>";
$lang['Smilies_are_ON'] = "Smilies Icon <u>ON</u>";
$lang['Smilies_are_OFF'] = "Smilies Icon <u>OFF</u>";

$lang['Attach_signature'] = "���� ���� (������������ ������ �����Ҽ� �ֽ��ϴ�.)";
$lang['Notify'] = "�� �ۿ����� �亯���� ���Ϸ� �޾ƺ��ϴ�.";
$lang['Delete_post'] = " �� ���� �����մϴ� ";

$lang['Stored'] = "�Խù��� ����Ÿ���̽��� ��� �Ǿ����ϴ�.";
$lang['Deleted'] = "�Խù��� ���������� �����Ǿ����ϴ�.";
$lang['Poll_delete'] = "���� ���� ���������� �����Ǿ����ϴ�.";
$lang['Vote_cast'] = "���������� ��ǥ�� ����ϼ̽��ϴ�.. ^^";

$lang['Topic_reply_notification'] = "�亯���� ��ϵǾ����ϴ�.";

$lang['bbcode_b_help'] = "��������: [b]text[/b]  (alt+b)";
$lang['bbcode_i_help'] = "���Ÿ�ü: [i]text[/i]  (alt+i)";
$lang['bbcode_u_help'] = "�ۿ� ���ٺ���: [u]text[/u]  (alt+u)";
$lang['bbcode_q_help'] = "�� �ο�: [quote]text[/quote]  (alt+q)";
$lang['bbcode_c_help'] = "�ڵ�: [code]code[/code]  (alt+c)";
$lang['bbcode_l_help'] = "����Ʈ: [list]text[/list] (alt+l)";
$lang['bbcode_o_help'] = "���� ���: [list=]text[/list]  (alt+o)";
$lang['bbcode_p_help'] = "�̹�������: [img]http://image_url[/img]  (alt+p)";
$lang['bbcode_w_help'] = "URL ����: [url]http://url[/url] or [url=http://url]URL text[/url]  (alt+w)";
$lang['bbcode_a_help'] = "�±׸� �ݽ��ϴ�.";
$lang['bbcode_s_help'] = "��ƮĮ��: [color=red]text[/color]  ��: �� ���� ����Ҽ� ���� color=#FF0000";
$lang['bbcode_f_help'] = "��Ʈ������: [size=x-small]small text[/size]";

$lang['Emoticons'] = "���������ܵ�";
$lang['More_emoticons'] = "���������� �߰�";

$lang['Font_color'] = "��ƮĮ��";
$lang['color_default'] = "�⺻��";
$lang['color_dark_red'] = "��ο� ����";
$lang['color_red'] = "����";
$lang['color_orange'] = "������";
$lang['color_brown'] = "����";
$lang['color_yellow'] = "�����";
$lang['color_green'] = "�ʷϻ�";
$lang['color_olive'] = "�ø���";
$lang['color_cyan'] = "û��";
$lang['color_blue'] = "�Ķ�";
$lang['color_dark_blue'] = "��ο� �Ķ�";
$lang['color_indigo'] = "�� ��";
$lang['color_violet'] = "���̿÷�";
$lang['color_white'] = "���";
$lang['color_black'] = "����";

$lang['Font_size'] = "��Ʈ������";
$lang['font_tiny'] = "�����۰�";
$lang['font_small'] = "�۰�";
$lang['font_normal'] = "����";
$lang['font_large'] = "ũ��";
$lang['font_huge'] = "����ũ��";

$lang['Close_Tags'] = "�±� �ݱ�";
$lang['Styles_tip'] = "��: ��Ÿ���� ���õ� ������ ������ ����� �� �ֽ��ϴ�.";


//
// Private Messaging
//
$lang['Private_Messaging'] = "���� �޼���";

$lang['Login_check_pm'] = "���� �� Ȯ��";
$lang['New_pms'] = "�� ���� %d �� ���� "; // You have 2 new messages
$lang['New_pm'] = "�� ���� ���� -[ %d ]"; // You have 1 new message
$lang['No_new_pm'] = "������ ���� ����";
$lang['Unread_pms'] = "���� ���� �޽��� %d ";
$lang['Unread_pm'] = "���� ���� �޽��� %d ";
$lang['No_unread_pm'] = "�������� �޽����� �����ϴ�.";
$lang['You_new_pm'] = "�� ������ ���� �߽���....~~~~";
$lang['You_new_pms'] = "���ο� ������ �����Կ� ������ �ֽ��ϴ�.";
$lang['You_no_new_pm'] = "���� ������ ������ �����ϴ�.";

$lang['Inbox'] = "���� ������";
$lang['Outbox'] = "������ ������";
$lang['Savebox'] = "���� ������";
$lang['Sentbox'] = "���� ������";
$lang['Flag'] = "FLAG";
$lang['Subject'] = "����";
$lang['From'] = "������";
$lang['To'] = "�޴���";
$lang['Date'] = "����";
$lang['Mark'] = "��ũ";
$lang['Sent'] = "����";
$lang['Saved'] = "����";
$lang['Delete_marked'] = "��ũ�Ѱ� ����";
$lang['Delete_all'] = "���λ���";
$lang['Save_marked'] = "��ũ�Ѱ� ����"; 
$lang['Save_message'] = "��������";
$lang['Delete_message'] = "��������";

$lang['Display_messages'] = "������ ���� ���� ���κ���"; // Followed by number of days/weeks/months
$lang['All_Messages'] = "��ü �޼���";

$lang['No_messages_folder'] = "�������� ��� �ֽ��ϴ�.";

$lang['PM_disabled'] = "�� ���������� ���������Ⱑ �Ұ����ϰ� �����Ǿ���ϴ�.";
$lang['Cannot_send_privmsg'] = "�˼��մϴ�..�����ڰ� ���������⸦ ���� ���ҽ��ϴ�.";
$lang['No_to_user'] = "������ ������ ���ؼ��� ���̵� �Է��ؾ� �մϴ�.";
$lang['No_such_user'] = "�˼��մϴ�..�˻��Ͻ� ���̵�� �������� �ʽ��ϴ�.";

$lang['Message_sent'] = "������ ���������� ���������ϴ�.";

$lang['Click_return_inbox'] = "%s[���� �ڽ��� ���ư���]%s";
$lang['Click_return_index'] = " %s[���� ȭ������ ����]%s";

$lang['Send_a_new_message'] = "�� ���� ������";
$lang['Send_a_reply'] = "�亯 ���� ������";
$lang['Edit_message'] = "���� �����ϱ�";

$lang['Notification_subject'] = "�� ������ �����߽��ϴ�.";

$lang['Find_username'] = "���̵� ã��";
$lang['Find'] = " ã �� ";
$lang['No_match'] = "�´¾��̵� �����ϴ�";

$lang['No_post_id'] = "���� �������� ���� �Խù� ID ";
$lang['No_such_folder'] = "�������� �ʴ� �����Դϴ�.";
$lang['No_folder'] = "�������� ���� �����Դϴ�.";

$lang['Mark_all'] = "���� ��ũ�ϱ�";
$lang['Unmark_all'] = "��ũ ��������";

$lang['Confirm_delete_pm'] = "��¥�� ���� �Ͻðڽ��ϱ�..?";
$lang['Confirm_delete_pms'] = "��¥�� ���� �Ͻðڽ��ϱ�..?";

$lang['Inbox_size'] = "���� ������ �뷮 %d%% "; // eg. Your Inbox is 50% full
$lang['Sentbox_size'] = "���� ������ �뷮 %d%% "; 
$lang['Savebox_size'] = "���������� �뷮 %d%% "; 

$lang['Click_view_privmsg'] = "%s[ ������ ���� ]%s";


//
// Profiles/Registration
//
$lang['Viewing_user_profile'] = "������ ���� :: %s"; // %s is username 
$lang['About_user'] = " %s ���� �������Դϴ�."; // %s is username

$lang['Preferences'] = "Preferences";
$lang['Items_required'] = "�ʼ� �Է� ������ ��� �����ϼž� �մϴ�... ";
$lang['Registration_info'] = "�ʼ� �Է� �����Դϴ�.";
$lang['Profile_info'] = "���� �Է»����Դϴ�.";
$lang['Profile_info_warn'] = "���� ������ �ش��ϴ� ������ �����ø� �Է� ���ֽñ� �ٶ��ϴ�.";
$lang['Avatar_panel'] = "�ƹ�Ÿ ���";
$lang['Avatar_gallery'] = "�ƹ�Ÿ �ַ���";

$lang['Website'] = "Ȩ ������";
$lang['Location'] = "��°�";
$lang['Contact'] = "����";
$lang['Email_address'] = "E-mail �ּ�";
$lang['Email'] = "E-mail";
$lang['Send_private_message'] = "���� ������";
$lang['Hidden_email'] = "[ Hidden ]";
$lang['Search_user_posts'] = "�� ����ڰ� �ۼ��� �Խù� ã��.";
$lang['Interests'] = "���/����";
$lang['Occupation'] = "�� ��"; 
$lang['Poster_rank'] = "�� �ۼ�����";

$lang['Total_posts'] = "�� �ۼ���";
$lang['User_post_pct_stats'] = "%.2f%% �� &nbsp; ��"; // 1.25% of total
$lang['User_post_day_stats'] = "%.2f ��"; // 1.5 posts per day
$lang['Search_user_posts'] = "%s���� �ۼ��� �� ��κ���"; // Find all posts by username

$lang['No_user_id_specified'] = "ã��ȸ���� �����ϴ�.";
$lang['Wrong_Profile'] = "������ ������ �ܿ��� �����Ҽ� ������..~";
$lang['Sorry_banned_or_taken_email'] = "�߸��� �����̰ų� �ߺ��Ǵ� ������ �̹� ��� �Ǿ��ֽ��ϴ�..<br>Ȯ�� �� �ٽ� �ۼ��Ͻñ� �ٶ��ϴ�.";
$lang['Only_one_avatar'] = "1���� �ƹ�Ÿ�� �����ؾ� �մϴ�.";
$lang['File_no_data'] = "�Է��� URL���� ������ �������� �ʽ��ϴ�.";
$lang['No_connection_URL'] = "�Է��� URL�� �����Ҽ� �����ϴ�. ";
$lang['Incomplete_URL'] = "�Է��� URL�� �߸��� URL�̰ų� �ҿ����� URL�Դϴ�.";
$lang['Wrong_remote_avatar_format'] = "�Է��Ͻ� URL�� �߸��� URL�Դϴ�.";
$lang['No_send_account_inactive'] = "�˼��մϴ�..Ȱ������ ���� ��й�ȣ�̰ų� �������� ������ �߸��� ��й�ȣ�� �ݿ��� �����ʾҽ��ϴ�. .���������ڿ��� ������ �ּ���.";

$lang['Always_smile'] = "Smilies Icon�� ����մϴ�.";
$lang['Always_html'] = "HTML�� ����մϴ�.";
$lang['Always_bbcode'] = "BBCode�� ����մϴ�.";
$lang['Always_add_sig'] = "������ ���� ������ ÷���մϴ�.";
$lang['Always_notify'] = "�亯���� �ö���� ���Ϸ� �˷��ݴϴ�.";
$lang['Always_notify_explain'] = "(������ �ۼ��ѱۿ� ���� ��ϵǸ� ���Ϸ� �߼۵Ǵ� ���)";

$lang['Board_style'] = "���� ��Ÿ��";
$lang['Board_lang'] = "���� ���";
$lang['No_themes'] = "NO Themes";
$lang['Timezone'] = "�����ð� ���� - (KOREA ��� �⺻����)";
$lang['Date_format'] = "��¥ ����";
$lang['Date_format_explain'] = " (<a href=\"http://www.php.net/date\" target=\"_other\">��¥�Լ� ����</a>  - (KOREA ��� �⺻ ����) )";
$lang['Signature'] = "�����Է�";
$lang['Signature_explain'] = "(�Խù���Ͻ� �ϴܺο� �ڵ����ԵǸ� ����<br> %d �� �ѱ� 127�� ���� �����մϴ�.)";
$lang['Public_view_email'] = "���� E-Mail �ּҸ� �����մϴ�.";

$lang['Current_password'] = "���� ��й�ȣ";
$lang['New_password'] = "�� ��й�ȣ";
$lang['Confirm_password'] = "��й�ȣ Ȯ��";
$lang['password_if_changed'] = "(�����ϽǶ����� �Է��ϼ���.)";
$lang['password_confirm_if_changed'] = "(��й�ȣ Ȯ�λ���Դϴ�.)";

$lang['Avatar'] = "Avatar";
$lang['Avatar_explain'] = "�ƹ�Ÿ�̹����� %d X %d pixels �� ���ѵǸ� ������� %dKb �̻� ������ �����ϴ�"; $lang['Upload_Avatar_file'] = "�ƹ�Ÿ �̹����� ����ǻ�Ϳ��� ���� ���ε��մϴ�.";
$lang['Upload_Avatar_URL'] = "�¶��λ� �ƹ�Ÿ�̹����� ������� URL�� ��ũ�մϴ�.";
$lang['Upload_Avatar_URL_explain'] = "";
$lang['Pick_local_Avatar'] = "�غ�� �̰� �ƹ�Ÿ �ַ������� �����մϴ�.";
$lang['Link_remote_Avatar'] = "�ƹ�Ÿ�̹��� ��ũ";
$lang['Link_remote_Avatar_explain'] = "�ƹ�Ÿ�̹����� ������� ���� ��ũ.";
$lang['Avatar_URL'] = "URL of Avatar Image";
$lang['Select_from_gallery'] = "���⿡�ִ� �ƹ�Ÿ�ַ����� ���� ����մϴ�";
$lang['View_avatar_gallery'] = "�ַ��� ����";

$lang['Select_avatar'] = "�ƹ�Ÿ����";
$lang['Return_profile'] = "�ƹ�Ÿ ���þ���";
$lang['Select_category'] = "ī�װ� ����";

$lang['Delete_Image'] = "�̹��� ����";
$lang['Current_Image'] = "���� �̹���";

$lang['Notify_on_privmsg'] = "�� ������ ���� ���Ϸ� �˷� �ݴϴ�.";
$lang['Popup_on_privmsg'] = "������ ���� �˾� ����â���� ���ϴ�."; 
$lang['Popup_on_privmsg_explain'] = ""; 
$lang['Hide_user'] = "���� ������ �������� �ʽ��ϴ�.";

$lang['Profile_updated'] = "�����Ͻ� ������ ������Ʈ �Ǿ����ϴ�.";
$lang['Profile_updated_inactive'] = "ȯ�漳���� ������Ʈ �Ǿ����� �ٽɳ����� �ٲ۰� �����ϴ�..�׷��� ���� ������ ���� Ȱ������ �ʽ��ϴ�..�ٽ� ������ Ȱ��ȭ �ϽǷ��� �����ڿ��� ��û�Ͻñ� �ٶ��ϴ�.";

$lang['Password_mismatch'] = "��й�ȣ�� ��ġ���� �ʽ��ϴ�.";
$lang['Current_password_mismatch'] = "�����ͺ��̽��� ����� ��й�ȣ�� ��ġ���� �ʽ��ϴ�.";
$lang['Invalid_username'] = "�������� ������ ���Ұ� ���̵��̰ų� �ߺ��Ǵ� ���̵�� ����ϽǼ� �����ϴ�.";
$lang['Signature_too_long'] = "�ʹ� �� �����Դϴ�.";
$lang['Fields_empty'] = "�ʼ��Է� ������ �Է��������� �ʵ尡 �ִ°� �����ϴ�.";
$lang['Avatar_filetype'] = "�ƹ�Ÿ�̹��� Ÿ���� .jpg, .gif or .png �Դϴ�.";
$lang['Avatar_filesize'] = "�ƹ�Ÿ�̹��� ���� �������  %d kB �Դϴ�."; // The avatar image file size must be less than 6 kB
$lang['Avatar_imagesize'] = "�ƹ�Ÿ�̹��� ũ��� ������ %d pixels ������ %d pixels �Դϴ�."; 

$lang['Welcome_subject'] = "%s "; // Welcome to my.com forums
$lang['New_account_subject'] = "���ο� ����� ���̵�";
$lang['Account_activated_subject'] = "���̵� Ȱ��";

$lang['Account_added'] = "<b>���������� ��ϵǾ����ϴ�..�����մϴ�.</b><p>��������� ����Ÿ���̽��� ���� �Ǿ����ϴ�.<p>����ȭ������ ���ż� �ٽ� �α� �� �Ͻʽÿ�...!";
$lang['Account_inactive'] = "���̵� ����������ϴ�.. �׷��� �� ������ ���̵��� Ȱ���� ��û�մϴ�.. ���̵� ������ ���ڿ������� �߼۵Ǿ����ϴ�..�ڼ��� ������ ���ڿ����� Ȯ���ϼ���..";
$lang['Account_inactive_admin'] = "������ ����������ϴ�.. �׷��� �������� �����ڱ��� ���̵��� Ȱ���� ��û�մϴ�..���̵� Ȱ���� �� �� ���ڿ������� �˷������Դϴ�..";
$lang['Account_active'] = "���̵� ����������ϴ�.. �������ּż� �����մϴ�.";
$lang['Account_active_admin'] = "�� ���̵�� Ȱ��ȭ�Ǿ� �ֽ��ϴ�.";
$lang['Reactivate'] = "����� ���̵� Ȱ��ȭ �����ּ���!";
$lang['COPPA'] = "���̵� �����Ǿ�����, ���ϰ����� ������ �����ϴ�..üŷ�Ͽ� ������������ �α��� �ϽǼ� �����ϴ�.";

$lang['Registration'] = " �̿� ��� �Դϴ�.";
$lang['Reg_agreement'] = "<ul type=\"square\"><li> ȸ�������� ���ΰ����� ��Ģ���� �մϴ�.  <br /><br /><li> ���� �������� ���߽ô� ������ �������� ���� ó���˴ϴ�. ^.^ <br /><br /><li> �� ������ �������� �弳�� ������ �ø��� �ʽ��ϴ�.<br /><br />";

$lang['Agree_under_13'] = "<li>���� ����� �����Ͻô� 14�� <b>����</b> ����";
$lang['Agree_over_13'] = "<li>���� ����� �����Ͻô� 14�� <b>�̻�</b> ����";
$lang['Agree_not'] = "<li>���� ����� ���� ���� �ʽ��ϴ�.</ul>";

$lang['Wrong_activation'] = "����Ÿ���̽��� �ִ� E-Mail �� ��ġ�����ʰų� �������� �ʴ� E-Mail�Դϴ�. ";
$lang['Send_password'] = "���ο� ��й�ȣ �߱޹ޱ�"; 
$lang['Password_updated'] = "���ο� ��й�ȣ�� �̸��Ϸ� �߼۵Ǿ����ϴ�..Ȯ�� �غ��ñ� �ٶ��ϴ�.";
$lang['No_email_match'] = "�Է��Ͻ� �̸��� �ּҿ� ���̵𸮽�Ʈ �� ����Ǿ��ִ� �̸��� �ּҰ� ��ġ���� �ʽ��ϴ�.";
$lang['New_password_activation'] = "��û�Ͻ� �� ��й�ȣ �Դϴ�.";
$lang['Password_activated'] = "�α����� �� �� ���ڿ������� ��߼۹��� ��й�ȣ�� �α��� �ϼ���.";

$lang['Send_email_msg'] = "ȸ������ E-Mail ������..!";
$lang['No_user_specified'] = "���ǵ��� ���� ���� �Դϴ�.";
$lang['User_prevent_email'] = "�� ����ڴ� ���ڿ��� �ޱ⸦ �ٶ��� �ʽ��ϴ�..������ ���� ������..!";
$lang['User_not_exist'] = "�������� �ʴ� ����� �Դϴ�.";
$lang['CC_email'] = "���ݹ߼۵Ǵ� ������ ���θ��Ϸε� �߼۵ǰ��մϴ�. ";
$lang['Email_message_desc'] = "<br>���� �߼��Ͻô� E-Mail�� ������ȸ���Կ��� �������¸��Ϸμ� Html�±׳� BBcode�� ����Ҽ������ϴ�. .";
$lang['Flood_email_limit'] = "���� �ð����� �̸����� ������ �����ϴ�.. ���߿� �ٽ� ��������..!";
$lang['Recipient'] = "�޴»��";
$lang['Email_sent'] = "E-Mail�� ���������� �߼��Ͽ����ϴ�.";
$lang['Send_email'] = "E-Mail ������";
$lang['Empty_subject_email'] = "�� ���� ������ �Է��ϼ���.";
$lang['Empty_message_email'] = "�� ���� ������ �Է��ϼ���.";


//
// Memberslist
//
$lang['Select_sort_method'] = "�з���� ����";
$lang['Sort'] = "�з�";
$lang['Sort_Top_Ten'] = "TOP 10 �Խù�";
$lang['Sort_Joined'] = "��������";
$lang['Sort_Username'] = "���̵�";
$lang['Sort_Location'] = "��°�";
$lang['Sort_Posts'] = "�� �ۼ���";
$lang['Sort_Email'] = "E-mail";
$lang['Sort_Website'] = "Ȩ ������";
$lang['Sort_Ascending'] = "�� ��";
$lang['Sort_Descending'] = "�Ʒ���";
$lang['Order'] = "����";


//
// Group control panel
//
$lang['Group_Control_Panel'] = "�׷� ����";
$lang['Group_member_details'] = "���� �׷� ��Ȳ";
$lang['Group_member_join'] = "����� ����";

$lang['Group_Information'] = "�׷� ����";
$lang['Group_name'] = "�׷� �̸�";
$lang['Group_description'] = "�׷� �Ұ�";
$lang['Group_membership'] = "�׷� �����";
$lang['Group_Members'] = "�׷� ���";
$lang['Group_Moderator'] = "�׷� ������";
$lang['Pending_members'] = "�������";

$lang['Group_type'] = "�׷� Ÿ��";
$lang['Group_open'] = "�����׷�";
$lang['Group_closed'] = "�׷�ݱ�";
$lang['Group_hidden'] = "����� �׷�";

$lang['Current_memberships'] = "���� ���� �׷�";
$lang['Non_member_groups'] = "���� �������� ���� �׷�";
$lang['Memberships_pending'] = "���� �׷�������� ������ �����ʾ� ���� ���Դϴ�.";

$lang['No_groups_exist'] = "���� ������ �׷��� �����ϴ�.";
$lang['Group_not_exist'] = "�� �����׷��� �������� �ʽ��ϴ�.";

$lang['Join_group'] = "������";
$lang['No_group_members'] = "���� �� �׷쿡�� ���ȸ���� �����ϴ�.";
$lang['Group_hidden_members'] = "������׷����μ� �׷��������� �������� �ʽ��ϴ�.";
$lang['No_pending_group_members'] = "�� �׷��� ��������� �����ϴ�.";
$lang["Group_joined"] = "���������� �׷����� ��ϵǾ����ϴ�.<br /><br />�׷�������� ������ ��ٸ��ø� �˴ϴ�.";
$lang['Group_request'] = "���ο� �޹��Բ��� ��Ͻ�û�� �ϼ̽��ϴ�";
$lang['Group_approved'] = "��� ������ �Ǿ����� �˷��帳�ϴ�.";
$lang['Group_added'] = "�� �����׷쿡 �߰��Ǿ����ϴ�."; 
$lang['Already_member_group'] = "����� �̹� �� �׷쿡 ���ԵǾ��ִ� ����Դϴ�.";
$lang['User_is_member_group'] = "���� �̹� �� �׷��� ����� �Ǿ��ֽ��ϴ�.";
$lang['Group_type_updated'] = "�׷��� Ÿ�Ժ����� ���������� ����Ǿ����ϴ�.";

$lang['Could_not_add_user'] = "������ ����ڴ� �������� �ʽ��ϴ�..";
$lang['Could_not_anon_user'] = "���� ȸ���� �׷����� �ɼ� �����ϴ�.";

$lang['Confirm_unsub'] = "��¥�� Ż���Ͻðڽ��ϰ�..?";
$lang['Confirm_unsub_pending'] = "�� �׷쿡 ���� ���ε��� ���� ���������Դϴ�..�� �׷쿡�� Ż���Ͻðڽ��ϱ�..?";

$lang['Unsub_success'] = "�� �׷쿡�� ���������� Ż��Ǿ����ϴ�.";

$lang['Approve_selected'] = "��Ͻ���";
$lang['Deny_selected'] = "�������";
$lang['Not_logged_in'] = "�׷쿡 ���� ���ؼ��� �α� �� �ϼž� �մϴ�.";
$lang['Remove_selected'] = " �� �� �� ��";
$lang['Add_member'] = " ��� �߰��ϱ� ";
$lang['Not_group_moderator'] = "�����ڰ� �ƴϱ⶧���� �� ����� ����ϽǼ� �����ϴ�.";

$lang['Login_to_join'] = "�α� �� �Ͻø� ������� �����ϽǼ� �ֽ��ϴ�.";
$lang['This_open_group'] = "���� ���µǾ� �ִ� �̱׷쿡 ����� ��û�մϴ�.";
$lang['This_closed_group'] = "�̱׷��� �����־� ������ ������ �Ҽ� �����ϴ�. ";
$lang['This_hidden_group'] = "�����Ͻ� �׷��� ������׷��Դϴ�.... ���԰��û����� �׷�����ڿ��� �����Ͻñ� �ٶ��ϴ�. ";
$lang['Member_this_group'] = "���� �� �׷쿡�� Ż���մϴ�.";
$lang['Pending_this_group'] = "���� �� ��������� Ż���մϴ�.";
$lang['Are_group_moderator'] = "�� �׷��� ������ �Դϴ�.";
$lang['None'] = "None";

$lang['Subscribe'] = "��Ͻ�û";
$lang['Unsubscribe'] = "Ż���û";
$lang['View_Information'] = "�׷캸��";


//
// Search
//
$lang['Search_query'] = "�� �� �� �� ��";
$lang['Search_options'] = "�� �� �� �� ";

$lang['Search_keywords'] = "Ű���� �˻�";
$lang['Search_keywords_explain'] = "�ܾ��� ����� ���� <u>AND</u> ������ ����Ҽ� ������ �ܾ��� ���Ǹ� ���������� <u>OR</u> ������ ����Ҽ� �ֽ��ϴ�..�׸��� �� ���ڸ� ���� �˻��ϴ� wildcard (*.*) �� ����Ҽ� �ֽ��ϴ�.";
$lang['Search_author'] = "�۾��� �˻�";
$lang['Search_author_explain'] = "Use * as a Wildcard<BR>��)<BR> <B>*</B>A �� �Է��Ͻø� A �� ���Ե� ���̵� ���ã���ָ�<BR> A<b>*</b>�� �Է��Ͻø� A�� �����ϴ� ���̵� ��� ã���ݴϴ�.  ";

$lang['Search_for_any'] = "������ �ܾ� �� �ϳ��� ���ԵǾ �˻�";
$lang['Search_for_all'] = "������ �ܾ ��� ���ԵǴ� �Խù��� �˻�";

$lang['Return_first'] = "ó������ ����"; // followed by xxx characters in a select box
$lang['characters_posts'] = "��Ư�� ����˻�";

$lang['Search_previous'] = "�����Խù� �˻�"; // followed by days, weeks, months, year, all in a select box

$lang['Sort_by'] = "�з����";
$lang['Sort_Time'] = "�۾��ð�";
$lang['Sort_Post_Subject'] = "��������";
$lang['Sort_Topic_Title'] = "������ ����";
$lang['Sort_Author'] = "�۾���";
$lang['Sort_Forum'] = "����";

$lang['Display_results'] = "��� ���";
$lang['All_available'] = "��ü���� ";
$lang['No_searchable_forums'] = "�˻��Ͻ������� ������ ���ѵ� �����Դϴ�..";

$lang['No_search_match'] = "ã�� ������ ���ų� ȸ������ �޴��Դϴ�.";
$lang['Found_search_match'] = "��ġ�Ǵ� %d ���� ���� ã�ҽ��ϴ�."; // eg. Search found 1 match
$lang['Found_search_matches'] = "��ġ�Ǵ� %d ���� ���� ã�ҽ��ϴ�."; // eg. Search found 24 matches

$lang['Close_window'] = "������ â �ݱ�";


//
// Auth related entries
//
// Note the %s will be replaced with one of the following 'user' arrays
$lang['Sorry_auth_announce'] = "�˼��մϴ�. �� ������ %s�� �޽����� �����Ҽ� �ֽ��ϴ�.";
$lang['Sorry_auth_sticky'] = "�˼��մϴ�. �� ������ %s �� sticky�� �ۼ��Ҽ� �ֽ��ϴ�."; 
$lang['Sorry_auth_read'] = "�˼��մϴ�. �� ������ %s�� �бⰡ ������ �����Դϴ�.."; 
$lang['Sorry_auth_post'] = "�˼��մϴ�. �� ������ %s�� �������� �ۼ��Ҽ� �ֽ��ϴ�."; 
$lang['Sorry_auth_reply'] = "�˼��մϴ�. �� ������ %s�� ��бۿ� ���� �亯�Ҽ� �ֽ��ϴ�. "; 
$lang['Sorry_auth_edit'] = "�˼��մϴ�. �� ������ %s�� ��б��� �����Ҽ� �ֽ��ϴ�."; 
$lang['Sorry_auth_delete'] = "�˼��մϴ�. �� ������ %s�� ��б��� �����Ҽ� �ֽ��ϴ�. "; 
$lang['Sorry_auth_vote'] = "�˼��մϴ�. �� ������ %s��  ��ǥ�� �Ҽ� �ֽ��ϴ�."; 

// These replace the %s in the above strings
$lang['Auth_Anonymous_Users'] = "<b>��ϵ��� ���� �����</b>";
$lang['Auth_Registered_Users'] = "<b>����ȸ��</b>";
$lang['Auth_Users_granted_access'] = "<b>��ڰ� ������ ȸ��</b>";
$lang['Auth_Moderators'] = "<b>������</b>";
$lang['Auth_Administrators'] = "<b>���</b>";

$lang['Not_Moderator'] = "����� �� ������ �����ڰ� �ƴմϴ�.";
$lang['Not_Authorised'] = "�ۼ��ڰ� �ƴմϴ�.";

$lang['You_been_banned'] = "����� �� �������κ��� ������ �����Ǿ����ϴ�.<br />�ڼ��� ������ �����ڿ��� �������ּ���.";


//
// Viewonline
//
$lang['Reg_users_zero_online'] = "ȸ�� 0 �� / "; // There ae 5 Registered and
$lang['Reg_users_online'] = "ȸ�� %d �� / "; // There ae 5 Registered and
$lang['Reg_user_online'] = " ȸ�� %d �� / "; // There ae 5 Registered and
$lang['Hidden_users_zero_online'] = "����� ȸ�� 0 �� "; // 6 Hidden users online
$lang['Hidden_users_online'] = "����� %d ��"; // 6 Hidden users online
$lang['Hidden_user_online'] = "����� ȸ�� %d ��"; // 6 Hidden users online
$lang['Guest_users_online'] = "�մ� %d ��"; // There are 10 Guest users online
$lang['Guest_users_zero_online'] = "�մ� 0 ��..."; // There are 10 Guest users online
$lang['Guest_user_online'] = " �մ� %d ��"; // There is 1 Guest user online
$lang['No_users_browsing'] = "���� ������ ������ ������ �����ϴ�.";

$lang['Online_explain'] = "�� �ڷ�� 5���� ������ ȸ���鿡�� �����˴ϴ�.";

$lang['Forum_Location'] = "���� ��ġ";
$lang['Last_updated'] = "Last Updated";

$lang['Forum_index'] = "�������� ȭ��";
$lang['Logging_on'] = "�α� �� ��";
$lang['Posting_message'] = "�� �ۼ� ��";
$lang['Searching_forums'] = "���� �˻� ��";
$lang['Viewing_profile'] = "������ ����";
$lang['Viewing_online'] = "�¶��� ������ ����";
$lang['Viewing_member_list'] = "�������Ʈ";
$lang['Viewing_priv_msgs'] = "������";
$lang['Viewing_FAQ'] = "FAQ ����";


//
// Moderator Control Panel
//
$lang['Mod_CP'] = "������ �����Դϴ�.";
$lang['Mod_CP_explain'] = "�Խù��� �����Ͽ� ����,�̵� ,���,��������� �ϽǼ� �ֽ��ϴ�.";

$lang['Select'] = " �� �� ";
$lang['Delete'] = " �� �� ";
$lang['Move'] = " �� �� ";
$lang['Lock'] = " �� �� ";
$lang['Unlock'] = " �������";

$lang['Topics_Removed'] = "������ �Խù��� ���������� ����Ÿ���̽����� �����Ǿ����ϴ�..";
$lang['Topics_Locked'] = "������ �Խù��� ��ɽ��ϴ�.";
$lang['Topics_Moved'] = "������ �Խù��� ���������� �̵��Ͽ����ϴ�.";
$lang['Topics_Unlocked'] = "������ �Խù��� ��ݻ��¿��� �����Ͽ����ϴ�.";
$lang['No_Topics_Moved'] = "�̹� �̵��� �Խù��Դϴ�.";

$lang['Confirm_delete_topic'] = "�����ѰԽù��� ����Ÿ���̽����� �����Ͻðڽ��ϱ�..??";
$lang['Confirm_lock_topic'] = "������ �Խù��� ���������� ���ϵ��� ��׽ðڽ��ϱ�..??";
$lang['Confirm_unlock_topic'] = "�����ѰԽù��� ��ݻ��¿��� �����Ͻðڽ��ϱ�..??";
$lang['Confirm_move_topic'] = "������ �������� �Խù��� �ű�ðڽ��ϱ�..??";

$lang['Move_to_forum'] = "�̵��� ��������";
$lang['Leave_shadow_topic'] = "�����ִ� �������� �̵�ǥ���� ���ܵӴϴ�..";

$lang['Split_Topic'] = "������ �ڸ��� ����";
$lang['Split_Topic_explain'] = "�Ʒ� ���� ������ ����Ͽ� �������� 2(���õ� ��бۿ� ���������� ��б��� �����ϴ� �� ) �� ������ �ֽ��ϴ�.";
$lang['Split_title'] = "���ο� ������ ����";
$lang['Split_forum'] = "�� �����ۿ� ���� ����";
$lang['Split_posts'] = "�ڸ� ��б� ����";
$lang['Split_after'] = "���õ� ��б� �ڸ�";
$lang['Topic_split'] = "���õ� �����۷� ���������� �߶������ϴ�.";

$lang['Too_many_error'] = "�����۷� �ڸ������� 1 ���� ��б۸� �����Ҽ� �ֽ��ϴ�.";

$lang['None_selected'] = "�� ����� ���� � �����۵� �������� �����̽��ϴ�..���ư��� �ٽ� 1 ���� �����ϼ���.";
$lang['New_forum'] = "�� ����";

$lang['This_posts_IP'] = "�� �� �ۼ��� IP";
$lang['Other_IP_this_user'] = "�� ������� �ٸ� IP�� �����Ͽ����ϴ�.";
$lang['Users_this_IP'] = "�� IP�� �ۼ��� �����";
$lang['IP_info'] = "IP ����";
$lang['Lookup_IP'] = "Look up IP";


//
// Timezones ... for display on each page
//
$lang['All_times'] = "All times are %s"; // eg. All times are GMT - 12 Hours (times from next block)

$lang['-12'] = "GMT - 12 Hours";
$lang['-11'] = "GMT - 11 Hours";
$lang['-10'] = "HST (Hawaii)";
$lang['-9'] = "GMT - 9 Hours";
$lang['-8'] = "PST (U.S./Canada)";
$lang['-7'] = "MST (U.S./Canada)";
$lang['-6'] = "CST (U.S./Canada)";
$lang['-5'] = "EST (U.S./Canada)";
$lang['-4'] = "GMT - 4 Hours";
$lang['-3.5'] = "GMT - 3.5 Hours";
$lang['-3'] = "GMT - 3 Hours";
$lang['-2'] = "Mid-Atlantic";
$lang['-1'] = "GMT - 1 Hours";
$lang['0'] = "GMT";
$lang['1'] = "CET (Europe)";
$lang['2'] = "EET (Europe)";
$lang['3'] = "GMT + 3 Hours";
$lang['3.5'] = "GMT + 3.5 Hours";
$lang['4'] = "GMT + 4 Hours";
$lang['4.5'] = "GMT + 4.5 Hours";
$lang['5'] = "GMT + 5 Hours";
$lang['5.5'] = "GMT + 5.5 Hours";
$lang['6'] = "GMT + 6 Hours";
$lang['7'] = "GMT + 7 Hours";
$lang['8'] = "WST (Australia)";
$lang['9'] = "GMT + 9 Hours";
$lang['9.5'] = "CST (Australia)";
$lang['10'] = "EST (Australia)";
$lang['11'] = "GMT + 11 Hours";
$lang['12'] = "GMT + 12 Hours";

// These are displayed in the timezone select box
$lang['tz']['-12'] = "(GMT -12:00 hours) Eniwetok, Kwajalein";
$lang['tz']['-11'] = "(GMT -11:00 hours) Midway Island, Samoa";
$lang['tz']['-10'] = "(GMT -10:00 hours) Hawaii";
$lang['tz']['-9'] = "(GMT -9:00 hours) Alaska";
$lang['tz']['-8'] = "(GMT -8:00 hours) Pacific Time (US &amp; Canada), Tijuana";
$lang['tz']['-7'] = "(GMT -7:00 hours) Mountain Time (US &amp; Canada), Arizona";
$lang['tz']['-6'] = "(GMT -6:00 hours) Central Time (US &amp; Canada), Mexico City";
$lang['tz']['-5'] = "(GMT -5:00 hours) Eastern Time (US &amp; Canada), Bogota, Lima, Quito";
$lang['tz']['-4'] = "(GMT -4:00 hours) Atlantic Time (Canada), Caracas, La Paz";
$lang['tz']['-3.5'] = "(GMT -3:30 hours) Newfoundland";
$lang['tz']['-3'] = "(GMT -3:00 hours) Brassila, Buenos Aires, Georgetown, Falkland Is";
$lang['tz']['-2'] = "(GMT -2:00 hours) Mid-Atlantic, Ascension Is., St. Helena";
$lang['tz']['-1'] = "(GMT -1:00 hours) Azores, Cape Verde Islands";
$lang['tz']['0'] = "(GMT) Casablanca, Dublin, Edinburgh, London, Lisbon, Monrovia";
$lang['tz']['1'] = "(GMT +1:00 hours) Amsterdam, Berlin, Brussels, Madrid, Paris, Rome";
$lang['tz']['2'] = "(GMT +2:00 hours) Cairo, Helsinki, Kaliningrad, South Africa";
$lang['tz']['3'] = "(GMT +3:00 hours) Baghdad, Riyadh, Moscow, Nairobi";
$lang['tz']['3.5'] = "(GMT +3:30 hours) Tehran";
$lang['tz']['4'] = "(GMT +4:00 hours) Abu Dhabi, Baku, Muscat, Tbilisi";
$lang['tz']['4.5'] = "(GMT +4:30 hours) Kabul";
$lang['tz']['5'] = "(GMT +5:00 hours) Ekaterinburg, Islamabad, Karachi, Tashkent";
$lang['tz']['5.5'] = "(GMT +5:30 hours) Bombay, Calcutta, Madras, New Delhi";
$lang['tz']['6'] = "(GMT +6:00 hours) Almaty, Colombo, Dhaka, Novosibirsk";
$lang['tz']['6.5'] = "(GMT +6:30 hours) Rangoon";
$lang['tz']['7'] = "(GMT +7:00 hours) Bangkok, Hanoi, Jakarta";
$lang['tz']['8'] = "(GMT +8:00 hours) Beijing, Hong Kong, Perth, Singapore, Taipei";
$lang['tz']['9'] = "(GMT +9:00 hours) Osaka, Sapporo, Seoul, Tokyo, Yakutsk";
$lang['tz']['9.5'] = "(GMT +9:30 hours) Adelaide, Darwin";
$lang['tz']['10'] = "(GMT +10:00 hours) Canberra, Guam, Melbourne, Sydney, Vladivostok";
$lang['tz']['11'] = "(GMT +11:00 hours) Magadan, New Caledonia, Solomon Islands";
$lang['tz']['12'] = "(GMT +12:00 hours) Auckland, Wellington, Fiji, Marshall Island";

$lang['datetime']['Sunday'] = "�Ͽ���";
$lang['datetime']['Monday'] = "������";
$lang['datetime']['Tuesday'] = "ȭ����";
$lang['datetime']['Wednesday'] = "������";
$lang['datetime']['Thursday'] = "�����";
$lang['datetime']['Friday'] = "�ݿ���";
$lang['datetime']['Saturday'] = "�����";
$lang['datetime']['Sun'] = "��";
$lang['datetime']['Mon'] = "��";
$lang['datetime']['Tue'] = "ȭ";
$lang['datetime']['Wed'] = "��";
$lang['datetime']['Thu'] = "��";
$lang['datetime']['Fri'] = "��";
$lang['datetime']['Sat'] = "��";
$lang['datetime']['January'] = "1��";
$lang['datetime']['February'] = "2��";
$lang['datetime']['March'] = "3��";
$lang['datetime']['April'] = "4��";
$lang['datetime']['May'] = "5��";
$lang['datetime']['June'] = "6��";
$lang['datetime']['July'] = "7��";
$lang['datetime']['August'] = "8��";
$lang['datetime']['September'] = "9��";
$lang['datetime']['October'] = "10��";
$lang['datetime']['November'] = "11��";
$lang['datetime']['December'] = "12��";
$lang['datetime']['Jan'] = "1��";
$lang['datetime']['Feb'] = "2��";
$lang['datetime']['Mar'] = "3��";
$lang['datetime']['Apr'] = "4��";
$lang['datetime']['May'] = "5��";
$lang['datetime']['Jun'] = "6��";
$lang['datetime']['Jul'] = "7��";
$lang['datetime']['Aug'] = "8��";
$lang['datetime']['Sep'] = "9��";
$lang['datetime']['Oct'] = "10��";
$lang['datetime']['Nov'] = "11��";
$lang['datetime']['Dec'] = "12��";

//
// Errors (not related to a
// specific failure on a page)
//
$lang['Information'] = " �� �� ";
$lang['Critical_Information'] = "�߿��� ����";

$lang['General_Error'] = "�Ϲ�����  Error";
$lang['Critical_Error'] = "�ɰ��� Error";
$lang['An_error_occured'] = "Error�� �߻��߽��ϴ�.";
$lang['A_critical_error'] = "�ɰ��� Error�� �߻��߽��ϴ�.";

//
// That's all Folks!
// -------------------------------------------------

?>