<?php
/***************************************************************************
 *                            lang_main.php [Hungarian]
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
 * forum -> f�rum
 * category -> t�mak�r
 * topic -> t�ma
 * post (new topic) -> �j t�ma nyit�sa
 * post (a reply) -> hozz�sz�l�s
 * reply (in the forum) -> hozz�sz�l�s
 * reply (in the pm) -> v�lasz
 * message (in the forum) -> hozz�sz�l�s
 * message (in the pm) -> �zenet
 * theme -> s�ma
 * style -> st�lus
 *
 * grep "XXX mauzi" for TODO's
 *
 ***************************************************************************/


//setlocale(LC_ALL, "en");
$lang['TRANSLATION_INFO'] = 'Magyar ford�t�s &copy; 2002 <a class="copyright" href="mailto:mauzi@expertlan.hu">Egerv�ry Gergely</a>';
$lang['ENCODING'] = "iso-8859-2";
$lang['DIRECTION'] = "ltr";
$lang['LEFT'] = "left";
$lang['RIGHT'] = "right";
$lang['DATE_FORMAT'] =  "Y M d"; // This should be changed to the default date format for your language, php date() format

//
// Common, these terms are used
// extensively on several pages
//
$lang['Forum'] = "F�rum";
$lang['Category'] = "T�mak�r";
$lang['Topic'] = "T�ma";
$lang['Topics'] = "T�m�k";
$lang['Replies'] = "V�laszok";
$lang['Views'] = "Megtekintve";
$lang['Post'] = "Hozz�sz�l�s";
$lang['Posts'] = "Hozz�sz�l�sok";
$lang['Posted'] = "Elk�ldve";
$lang['Username'] = "Felhaszn�l�n�v";
$lang['Password'] = "Jelsz�";
$lang['Email'] = "Email";
$lang['Poster'] = "Hozz�sz�l�";
$lang['Author'] = "Szerz�";
$lang['Time'] = "Id�";
$lang['Hours'] = "�ra";
$lang['Message'] = "�zenet";

$lang['1_Day'] = "1 Nap";
$lang['7_Days'] = "7 Nap";
$lang['2_Weeks'] = "2 H�t";
$lang['1_Month'] = "1 H�nap";
$lang['3_Months'] = "3 H�nap";
$lang['6_Months'] = "6 H�nap";
$lang['1_Year'] = "1 �v";

$lang['Go'] = "Mehet";
$lang['Jump_to'] = "Ugr�s";
$lang['Submit'] = "Mehet";
$lang['Reset'] = "Reset";
$lang['Cancel'] = "M�gse";
$lang['Preview'] = "Megtekint";
$lang['Confirm'] = "Meger�s�t�s";
$lang['Spellcheck'] = "Helyes�r�s";
$lang['Yes'] = "Igen";
$lang['No'] = "Nem";
$lang['Enabled'] = "Enabled";
$lang['Disabled'] = "Disabled";
$lang['Error'] = "Hiba";

$lang['Next'] = "K�vetkez�";
$lang['Previous'] = "El�z�";
$lang['Goto_page'] = "Ugr�s oldalra";
$lang['Joined'] = "Csatlakozott";
$lang['IP_Address'] = "IP c�m";

$lang['Select_forum'] = "V�lasszon f�rumot";
$lang['View_latest_post'] = "Legfrissebb hozz�sz�l�s megtekint�se";
$lang['View_newest_post'] = "Leg�jabb hozz�sz�l�s megtekint�se ";
$lang['Page_of'] = "<b>%d</b> / <b>%d</b> oldal"; // Replaces with: Page 1 of 2 for example

$lang['ICQ'] = "ICQ";
$lang['AIM'] = "AIM";
$lang['MSNM'] = "MSN Messenger";
$lang['YIM'] = "Yahoo Messenger";

$lang['Forum_Index'] = "%s Tartalomjegyz�k";  // eg. sitename Forum Index, %s can be removed if you prefer

$lang['Post_new_topic'] = "�j t�ma nyit�sa";
$lang['Reply_to_topic'] = "Hozz�sz�l�s a t�m�hoz";
$lang['Reply_with_quote'] = "Hozz�sz�l�s az el�zm�nyek id�z�s�vel";

$lang['Click_return_topic'] = "Kattintson %side%s a t�m�hoz val� visszat�r�shez"; // %s's here are for uris, do not remove!
$lang['Click_return_login'] = "Kattintson %side%s az �jabb pr�b�lkoz�shoz";
$lang['Click_return_forum'] = "Kattintson %side%s a f�rumba val� visszat�r�shez";
$lang['Click_view_message'] = "Kattintson %side%s az �zenete megtekint�s�hez";
$lang['Click_return_modcp'] = "Kattintson %side%s a Moder�tor Vez�rl�pulthoz val� visszat�r�shez";
$lang['Click_return_group'] = "Kattintson %side%s a csoport inform�ci�khoz val� visszat�r�shez";

$lang['Admin_panel'] = "Bel�p�s az adminisztr�ci�s fel�letre";

$lang['Board_disable'] = "Pardon, ez a f�rum most nem hozz�f�rhet�, pr�b�lja k�s�bb";


//
// Global Header strings
//
$lang['Registered_users'] = "Regisztr�lt felhaszn�l�k:";
$lang['Browsing_forum'] = "A f�rumot �ppen b�ng�sz� felhaszn�l�:";
$lang['Online_users_zero_total'] = "�sszesen <b>0</b> felhaszn�l� van online :: ";
$lang['Online_users_total'] = "�sszesen <b>%d</b> felhaszn�l� van online - ";
$lang['Online_user_total'] = "�sszesen <b>%d</b> felhaszn�l� van online - ";
$lang['Reg_users_zero_total'] = "0 Regisztr�lt, ";
$lang['Reg_users_total'] = "%d Regisztr�lt, ";
$lang['Reg_user_total'] = "%d Regisztr�lt, ";
$lang['Hidden_users_zero_total'] = "0 Rejtett, ";
$lang['Hidden_user_total'] = "%d Rejtett, ";
$lang['Hidden_users_total'] = "%d Rejtett, ";
$lang['Guest_users_zero_total'] = "0 Vend�g";
$lang['Guest_users_total'] = "%d Vend�g";
$lang['Guest_user_total'] = "%d Vend�g";
$lang['Record_online_users'] = "A legt�bb felhaszn�l� egyszerre <b>%s</b> volt (%s)";

$lang['Admin_online_color'] = "%sAdminisztr�tor%s";
$lang['Mod_online_color'] = "%sModer�tor%s";

$lang['You_last_visit'] = "Utols� l�togat�s ideje: %s"; // %s replaced by date/time
$lang['Current_time'] = "A pontos id�: %s"; // %s replaced by time

$lang['Search_new'] = "�j hozz�sz�l�sok";
$lang['Search_your_posts'] = "Saj�t hozz�sz�l�sok";
$lang['Search_unanswered'] = "Megv�laszolatlan hozz�sz�l�sok";

$lang['Register'] = "Regisztr�ci�";
$lang['Profile'] = "Profil";
$lang['Edit_profile'] = "Profil szerkeszt�se";
$lang['Search'] = "Keres�s";
$lang['Memberlist'] = "Taglista";
$lang['FAQ'] = "GYIK";
$lang['BBCode_guide'] = "BBCode Kalauz";
$lang['Usergroups'] = "Csoportok";
$lang['Last_Post'] = "Utols� hozz�sz�l�s";
$lang['Moderator'] = "Moder�tor:";
$lang['Moderators'] = "Moder�torok:";


//
// Stats block text
//
$lang['Posted_articles_zero_total'] = " Felhaszn�l�ink �sszesen <b>%d</b> hozz�sz�l�st �rtak."; // Number of posts
$lang['Posted_articles_total'] = "Felhaszn�l�ink �sszesen <b>%d</b> hozz�sz�l�st �rtak."; // Number of posts
$lang['Posted_article_total'] = "Felhaszn�l�ink �sszesen <b>%d</b> hozz�sz�l�st �rtak."; // Number of posts
$lang['Registered_users_zero_total'] = " �sszesen <b>%d</b> regisztr�lt felhaszn�l�nk van."; // # registered users
$lang['Registered_users_total'] = "�sszesen <b>%d</b> regisztr�lt felhaszn�l�nk van."; // # registered users
$lang['Registered_user_total'] = "�sszesen <b>%d</b> regisztr�lt felhaszn�l�nk van."; // # registered users
$lang['Newest_user'] = "A leg�jabb felhaszn�l�nk: <b>%s%s%s</b>"; // a href, username, /a 

$lang['No_new_posts_last_visit'] = "Nincs �j hozz�sz�l�s a legutols� bel�p�s �ta.";
$lang['No_new_posts'] = "Nincs �j hozz�sz�l�s";
$lang['New_posts'] = "Van �j hozz�sz�l�s";
$lang['New_post'] = "�j hozz�sz�l�s";
$lang['No_new_posts_hot'] = "Nincs �j hozz�sz�l�s [ N�pszer� ]";
$lang['New_posts_hot'] = "Van �j hozz�sz�l�s [ N�pszer� ]";
$lang['No_new_posts_locked'] = "Nincs �j hozz�sz�l�s [ Lez�rva ]";
$lang['New_posts_locked'] = "Van �j hozz�sz�l�s [ Lez�rva ]";
$lang['Forum_is_locked'] = "F�rum lez�rva";


//
// Login
//
$lang['Enter_password'] = "�rjon be egy felhaszn�l�nevet �s egy jelsz�t a bel�p�shez";
$lang['Login'] = "Bel�p�s";
$lang['Logout'] = "Kil�p�s";

$lang['Forgotten_password'] = "Elfelejtettem a jelszavam";

$lang['Log_me_in'] = "Automatikus bel�p�s minden l�togat�sn�l";

$lang['Error_login'] = "Rossz felhaszn�l�n�v vagy jelsz�";


//
// Index page
//
$lang['Index'] = "Tartalomjegyz�k";
$lang['No_Posts'] = "Nincsenek hozz�sz�l�sok";
$lang['No_forums'] = "Nincsenek f�rumok";

$lang['Private_Message'] = "Priv�t �zenet";
$lang['Private_Messages'] = "Priv�t �zenetek";
$lang['Who_is_Online'] = "Online felhaszn�l�k";

$lang['Mark_all_forums'] = "�sszes f�rum olvasott� t�tele";
$lang['Forums_marked_read'] = "Az �sszes f�rum olvasott� t�ve";


//
// Viewforum
//
$lang['View_forum'] = "F�rum megtekint�se";

$lang['Forum_not_exist'] = "A k�rt f�rum nem l�tezik";
$lang['Reached_on_error'] = "Hiba: ezt az oldalt nem kellene el�rnie";

$lang['Display_topics'] = "T�m�k megjelen�t�se";
$lang['All_Topics'] = "�sszes t�ma";

$lang['Topic_Announcement'] = "<b>Hirdetm�ny:</b>";
$lang['Topic_Sticky'] = "<b>Fontos:</b>";
$lang['Topic_Moved'] = "<b>�thelyezve:</b>";
$lang['Topic_Poll'] = "<b>[ Szavaz�s ]</b>";

$lang['Mark_all_topics'] = "�sszes t�ma olvasott� t�tele";
$lang['Topics_marked_read'] = "Az �sszes t�ma olvasott� t�ve";

$lang['Rules_post_can'] = "<b>Tud</b> �j t�m�t nyitni ebben a f�rumban";
$lang['Rules_post_cannot'] = "<b>Nem tud</b> �j t�m�t nyitni ebben a f�rumban";
$lang['Rules_reply_can'] = "<b>Tud</b> hozz�sz�lni a t�m�hoz ebben a f�rumban";
$lang['Rules_reply_cannot'] = "<b>Nem tud</b> hozz�sz�lni a t�m�hoz ebben a f�rumban";
$lang['Rules_edit_can'] = "<b>Tudja</b> szerkeszteni a saj�t hozz�sz�l�sait ebben a f�rumban";
$lang['Rules_edit_cannot'] = "<b>Nem tudja</b> szerkeszteni a saj�t hozz�sz�l�sait ebben a f�rumban";
$lang['Rules_delete_can'] = "<b>Tudja</b> t�r�lni a saj�t hozz�sz�l�sait ebben a f�rumban";
$lang['Rules_delete_cannot'] = "<b>Nem tudja</b> t�r�lni a saj�t hozz�sz�l�sait ebben a f�rumban";
$lang['Rules_vote_can'] = "<b>Tud</b> szavazni ebben a f�rumban";
$lang['Rules_vote_cannot'] = "<b>Nem tud</b> szavazni ebben a f�rumban";
$lang['Rules_moderate'] = "<b>Tudja</b> %smoder�lni ezt a f�rumot%s"; // %s replaced by a href links, do not remove! 

$lang['No_topics_post_one'] = "Nincsenek t�m�k ebben a f�rumban. <br>Kattintson az <b>�j t�ma nyit�sa</b> linkre egy �j t�ma nyit�s�hoz";


//
// Viewtopic
//
$lang['View_topic'] = "T�ma megtekint�se";

$lang['Guest'] = 'Vend�g';
$lang['Post_subject'] = "Hozz�sz�l�s t�rgya";
$lang['View_next_topic'] = "K�vetkez� t�ma";
$lang['View_previous_topic'] = "El�z� t�ma";
$lang['Submit_vote'] = "Szavaz�s";
$lang['View_results'] = "Eredm�nyek";

$lang['No_newer_topics'] = "Nincsenek �jabb t�m�k ebben a f�rumban";
$lang['No_older_topics'] = "Nincsenek r�gebbi t�m�k ebben a f�rumban";
$lang['Topic_post_not_exist'] = "A k�rt t�ma vagy hozz�sz�l�s nem l�tezik";
$lang['No_posts_topic'] = "Nincsenek hozz�sz�l�sok ebben a t�m�ban";

$lang['Display_posts'] = "Hozz�sz�l�sok megjelen�t�se"; 
$lang['All_Posts'] = "�sszes hozz�sz�l�s";
$lang['Newest_First'] = "�jak el�l";
$lang['Oldest_First'] = "R�giek el�l";

$lang['Back_to_top'] = "Vissza a tetej�re";

$lang['Read_profile'] = "Felhaszn�l� profilja";
$lang['Send_email'] = "Email k�ld�se";
$lang['Visit_website'] = "Weboldal megtekint�se";
$lang['ICQ_status'] = "ICQ St�tusz";
$lang['Edit_delete_post'] = "Hozz�sz�l�s szerkeszt�se/t�rl�se";
$lang['View_IP'] = "Hozz�sz�l� IP c�me";
$lang['Delete_post'] = "Hozz�sz�l�s t�rl�se";

$lang['wrote'] = "�rta"; // proceeds the username and is followed by the quoted text
$lang['Quote'] = "Id�zet"; // comes before bbcode quote output.
$lang['Code'] = "K�d"; // comes before bbcode code output.

$lang['Edited_time_total'] = "Utolj�ra szerkesztette %s, %s, �sszesen %d alkalommal"; // Last edited by me on 12 Oct 2001, edited 1 time in total
$lang['Edited_times_total'] = " Utolj�ra szerkesztette %s, %s, �sszesen %d alkalommal"; // Last edited by me on 12 Oct 2001, edited 2 times in total

$lang['Lock_topic'] = "T�ma lez�r�sa";
$lang['Unlock_topic'] = "T�ma lez�r�s felold�sa";
$lang['Move_topic'] = "T�ma �thelyez�se";
$lang['Delete_topic'] = "T�ma t�rl�se";
$lang['Split_topic'] = "T�ma feloszt�sa";

$lang['Stop_watching_topic'] = "T�ma figyel�s megsz�ntet�se";
$lang['Start_watching_topic'] = "T�ma figyel�se �j hozz�sz�l�sokr�l";
$lang['No_longer_watching'] = "Mostant�l nem figyeli a t�ma hozz�sz�l�sait"; 
$lang['You_are_watching'] = "Mostant�l figyeli a t�ma hozz�sz�l�sait";

$lang['Total_votes'] = "Szavazatok sz�ma";

//
// Posting/Replying (Not private messaging!)
//
$lang['Message_body'] = "Hozz�sz�l�s";
$lang['Topic_review'] = "T�ma �ttekint�se";

$lang['No_post_mode'] = "Nem lett hozz�sz�l�si m�d megadva"; // If posting.php is called without a mode (newtopic/reply/delete/etc, shouldn't be shown normaly)
 
$lang['Post_a_new_topic'] = "�j t�ma nyit�sa";
$lang['Post_a_reply'] = "Hozz�sz�l�s a t�m�hoz";
$lang['Post_topic_as'] = "T�ma t�pusa";
$lang['Edit_Post'] = "Hozz�sz�l�s szerkeszt�se";
$lang['Options'] = "Be�ll�t�sok";

$lang['Post_Announcement'] = "Hirdetm�ny";
$lang['Post_Sticky'] = "Fontos";
$lang['Post_Normal'] = "Norm�l";

$lang['Confirm_delete'] = "Biztos benne, hogy t�r�lni akarja ezt a hozz�sz�l�st?";
$lang['Confirm_delete_poll'] = "Biztos benne, hogy t�r�lni akarja ezt a szavaz�st?";

$lang['Flood_Error'] = "Nem tud ilyen s�r�n hozz�sz�l�st �rni. Pr�b�lja �jra egy r�vid id� m�lva";
$lang['Empty_subject'] = "Meg kell adnia az �zenet t�rgy�t a hozz�sz�l�shoz";
$lang['Empty_message'] = "Meg kell adnia az �zenetet a hozz�sz�l�shoz";
$lang['Forum_locked'] = "Ez egy lez�rt f�rum, nem tud hozz�sz�lni, vagy szerkeszteni a hozz�sz�l�sokat";
$lang['Topic_locked'] = "Ez egy lez�rt t�ma, nem tud v�laszolni, vagy szerkeszteni a hozz�sz�l�sokat";
$lang['No_post_id'] = "Ki kell v�lasztania egy hozz�sz�l�st a szerkeszt�shez";
$lang['No_topic_id'] = "Ki kell v�lasztania egy t�m�t a hozz�sz�l�shoz";
$lang['No_valid_mode'] = "�rv�nyes hozz�sz�l�si m�dok: hozz�sz�l�s, v�laszol�s, szerkeszt�s, id�z�s. Pr�b�lja �jra";
$lang['No_such_post'] = "Nincs ilyen hozz�sz�l�s, pr�b�lja �jra";
$lang['Edit_own_posts'] = "Pardon, csak a saj�t hozz�sz�l�sait tudja szerkeszteni";
$lang['Delete_own_posts'] = "Pardon, csak a saj�t hozz�sz�l�sait tudja t�r�lni";
$lang['Cannot_delete_replied'] = "Pardon, nem tud t�r�lni olyan hozz�sz�l�st, amire v�laszoltak";
$lang['Cannot_delete_poll'] = "Pardon, nem tud t�r�lni akt�v szavaz�st";
$lang['Empty_poll_title'] = "Meg kell adnia egy c�met a szavaz�snak";
$lang['To_few_poll_options'] = "Legal�bb k�t v�laszt�si lehet�s�get kell megadnia";
$lang['To_many_poll_options'] = "T�l sok v�laszt�si lehet�s�get adott meg";
$lang['Post_has_no_poll'] = "Ehhez a hozz�sz�l�shoz nincs szavazat";

$lang['Add_poll'] = "�j szavaz�s";
$lang['Add_poll_explain'] = "Ha nem akar szavaz�st nyitni a t�m�ban, hagyja ezeket a mez�ket �resen";
$lang['Poll_question'] = "Szavaz�s k�rd�se";
$lang['Poll_option'] = "V�laszt�si lehet�s�g";
$lang['Add_option'] = "Hozz�ad�s";
$lang['Update'] = "Friss�t�s";
$lang['Delete'] = "T�rl�s";
$lang['Poll_for'] = "Szavaz�s id�tartama";
$lang['Days'] = "nap"; // This is used for the Run poll for ... Days + in admin_forums for pruning
$lang['Poll_for_explain'] = "[ �rjon be null�t a v�gtelen szavaz�shoz ]";
$lang['Delete_poll'] = "Szavaz�s t�rl�se";

$lang['Disable_HTML_post'] = "HTML letilt�sa ebben a hozz�sz�l�sban";
$lang['Disable_BBCode_post'] = "BBCode letilt�sa ebben a hozz�sz�l�sban";
$lang['Disable_Smilies_post'] = "Emotikonok letilt�sa ebben a hozz�sz�l�sban";

$lang['HTML_is_ON'] = "HTML <u>enged�lyezve</u>";
$lang['HTML_is_OFF'] = "HTML <u>tiltva</u>";
$lang['BBCode_is_ON'] = "%sBBCode%s <u>enged�lyezve</u>"; // %s are replaced with URI pointing to FAQ
$lang['BBCode_is_OFF'] = "%sBBCode%s <u>tiltva</u>";
$lang['Smilies_are_ON'] = "Emotikonok <u>enged�lyezve</u>";
$lang['Smilies_are_OFF'] = "Emotikonok <u>tiltva</u>";

$lang['Attach_signature'] = "Al��r�s csatol�sa (az al��r�s megv�ltoztathat� a \"profil\" men�ben)";
$lang['Notify'] = "�rtes�t�s, ha v�lasz �rkezik";
$lang['Delete_post'] = "�zenet t�rl�se";

$lang['Stored'] = "K�sz�nj�k a hozz�sz�l�st";
$lang['Deleted'] = "A hozz�sz�l�s sikeresen t�r�lve";
$lang['Poll_delete'] = "A szavaz�s sikeresen t�r�lve";
$lang['Vote_cast'] = "K�sz�nj�k a szavaz�st";

$lang['Topic_reply_notification'] = "T�ma hozz�sz�l�s-�rtes�t�s";

$lang['bbcode_b_help'] = "F�lk�v�r sz�veg: [b]sz�veg[/b]  (alt+b)";
$lang['bbcode_i_help'] = "D�lt sz�veg: [i]sz�veg[/i]  (alt+i)";
$lang['bbcode_u_help'] = "Al�h�zott sz�veg: [u]sz�veg[/u]  (alt+u)";
$lang['bbcode_q_help'] = "Id�zett sz�veg: [quote]id�zet[/quote]  (alt+q)";
$lang['bbcode_c_help'] = "K�d megjelen�t�se: [code]k�d[/code]  (alt+c)";
$lang['bbcode_l_help'] = "Lista: [list]sz�veg[/list] (alt+l)";
$lang['bbcode_o_help'] = "Sz�mozott lista: [list=]sz�veg[/list]  (alt+o)";
$lang['bbcode_p_help'] = "K�p besz�r�sa: [img]http://k�p_url[/img]  (alt+p)";
$lang['bbcode_w_help'] = "URL besz�r�sa: [url]http://url[/url] vagy [url=http://url]URL sz�veg[/url]  (alt+w)";
$lang['bbcode_a_help'] = "�sszes BBCode tag bez�r�sa";
$lang['bbcode_s_help'] = "Bet�sz�n: [color=red]sz�veg[/color]  Tipp: �gy is lehet: color=#FF0000";
$lang['bbcode_f_help'] = "Bet�m�ret: [size=x-small]apr�bet�s sz�veg[/size]";

$lang['Emoticons'] = "Emotikonok";
$lang['More_emoticons'] = "M�g t�bb Emotikon";

$lang['Font_color'] = "Bet�sz�n";
$lang['color_default'] = "Alap";
$lang['color_dark_red'] = "S�t�tpiros";
$lang['color_red'] = "Piros";
$lang['color_orange'] = "Narancs";
$lang['color_brown'] = "Barna";
$lang['color_yellow'] = "S�rga";
$lang['color_green'] = "Z�ld";
$lang['color_olive'] = "Oliva";
$lang['color_cyan'] = "Ci�n";
$lang['color_blue'] = "K�k";
$lang['color_dark_blue'] = "S�t�tk�k";
$lang['color_indigo'] = "Indig�";
$lang['color_violet'] = "Lila";
$lang['color_white'] = "Feh�r";
$lang['color_black'] = "Fekete";

$lang['Font_size'] = "Bet�m�ret";
$lang['font_tiny'] = "Apr�";
$lang['font_small'] = "Kicsi";
$lang['font_normal'] = "Norm�l";
$lang['font_large'] = "Nagy";
$lang['font_huge'] = "�ri�si";

$lang['Close_Tags'] = "Tag-ek bez�r�sa";
$lang['Styles_tip'] = "Tipp: A sz�veg kijel�l�s�vel gyorsan m�dos�thatja a form�tum�t";


//
// Private Messaging
//
$lang['Private_Messaging'] = "Priv�t �zenetek";

$lang['Login_check_pm'] = "Bel�p�s a priv�t �zenetek megtekint�s�hez";
$lang['New_pms'] = "Van %d �j �zenet"; // You have 2 new messages
$lang['New_pm'] = "Van %d �j �zenet"; // You have 1 new message
$lang['No_new_pm'] = "Nincs �j �zenet";
$lang['Unread_pms'] = "Van %d olvasatlan �zenet";
$lang['Unread_pm'] = "Van %d olvasatlan �zenet";
$lang['No_unread_pm'] = "Nincs olvasatlan �zenet";
$lang['You_new_pm'] = "Egy �j priv�t �zenet v�rja a Be�rkezett �zenetei k�z�tt";
$lang['You_new_pms'] = "�j priv�t �zenetek v�rj�k a Be�rkezett �zenetei k�z�tt";
$lang['You_no_new_pm'] = "Nincs �j priv�t �zenete";

$lang['Inbox'] = "Be�rkezett �zenetek";
$lang['Outbox'] = "Kimen� �zenetek";
$lang['Savebox'] = "Elmentett �zenetek ";
$lang['Sentbox'] = "Elk�ld�tt �zenetek";
$lang['Flag'] = "Jel";
$lang['Subject'] = "T�rgy";
$lang['From'] = "Felad�";
$lang['To'] = "C�mzett";
$lang['Date'] = "D�tum";
$lang['Mark'] = "Kijel�lve";
$lang['Sent'] = "Elk�ld�tt";
$lang['Saved'] = "Elmentett";
$lang['Delete_marked'] = "Kijel�ltek t�rl�se";
$lang['Delete_all'] = "�sszes t�rl�se";
$lang['Save_marked'] = "Kijel�ltek ment�se"; 
$lang['Save_message'] = "�zenet ment�se";
$lang['Delete_message'] = "�zenet t�rl�se";

$lang['Display_messages'] = "�zenetek megjelen�t�se"; // Followed by number of days/weeks/months
$lang['All_Messages'] = "�sszes �zenet";

$lang['No_messages_folder'] = "Nincs �j �zenet ebben a mapp�ban";

$lang['PM_disabled'] = "Priv�t �zenetek letiltva ezen a f�rumon";
$lang['Cannot_send_privmsg'] = "Pardon, az adminisztr�tor letiltotta a priv�t �zenetk�ld�s lehet�s�g�t";
$lang['No_to_user'] = "Meg kell adnia a c�mzett felhaszn�l� azonos�t�j�t";
$lang['No_such_user'] = "Pardon, ilyen felhaszn�l� nem l�tezik";

$lang['Disable_HTML_pm'] = "HTML letilt�sa ebben az �zenetben";
$lang['Disable_BBCode_pm'] = "BBCode letilt�sa ebben az �zenetben";
$lang['Disable_Smilies_pm'] = "Emotikonok letilt�sa ebben az �zenetben";

$lang['Message_sent'] = "Az �zenet elk�ldve.";

$lang['Click_return_inbox'] = "Kattintson %side%s a Bej�v� �zenetekhez val� visszat�r�shez";
$lang['Click_return_index'] = "Kattintson %side%s a Tartalomjegyz�khez val� visszat�r�shez";

$lang['Send_a_new_message'] = "�j priv�t �zenet k�ld�se";
$lang['Send_a_reply'] = "V�laszol�s priv�t �zenetre";
$lang['Edit_message'] = "Priv�t �zenet szerkeszt�se";

$lang['Notification_subject'] = "�j priv�t �zenete �rkezett";

$lang['Find_username'] = "Felhaszn�l� keres�se";
$lang['Find'] = "Keres";
$lang['No_match'] = "Nincs tal�lat";

$lang['No_post_id'] = "Nem lett �zenet ID megadva";
$lang['No_such_folder'] = "Ilyen mappa nem l�tezik";
$lang['No_folder'] = "Nem lett mappa megadva";

$lang['Mark_all'] = "Kijel�li mindet";
$lang['Unmark_all'] = "Egyiket sem";

$lang['Confirm_delete_pm'] = "Biztos benne, hogy le akarja t�r�lni ezt az �zenetet?";
$lang['Confirm_delete_pms'] = "Biztos benne, hogy le akarja t�r�lni ezeket az �zeneteket?";

$lang['Inbox_size'] = "A Be�rkezett �zenetek mappa %d%%-ban van tele"; // eg. Your Inbox is 50% full
$lang['Sentbox_size'] = "Az Elk�ld�tt �zenetek mappa %d%%-ban van tele"; 
$lang['Savebox_size'] = "Az Elmentett �zenetek mappa %d%%-ban van tele"; 

$lang['Click_view_privmsg'] = "Kattintson %side%s a be�rkezett �zenetek megtekint�s�hez";


//
// Profiles/Registration
//
$lang['Viewing_user_profile'] = "Profil megtekint�se - %s"; // %s is username 
$lang['About_user'] = "Inform�ci�k: %s"; // %s is username

$lang['Preferences'] = "Be�ll�t�sok";
$lang['Items_required'] = "A csillaggal jel�lt mez�ket felt�tlen�l ki kell t�lteni.";
$lang['Registration_info'] = "Regisztr�ci� Inform�ci�";
$lang['Profile_info'] = "Profil Inform�ci�";
$lang['Profile_info_warn'] = "Az al�bbi inform�ci�k publikusan megtekinthet�ek";
$lang['Avatar_panel'] = "Avatar Vez�rl�pult";
$lang['Avatar_gallery'] = "Avatar gal�ria";

$lang['Website'] = "Weboldal";
$lang['Location'] = "Hely";
$lang['Contact'] = "Kapcsolatfelv�tel:";
$lang['Email_address'] = "Email c�m";
$lang['Email'] = "Email";
$lang['Send_private_message'] = "Priv�t �zenet k�ld�se";
$lang['Hidden_email'] = "[ Rejtett ]";
$lang['Search_user_posts'] = "Keres�s: a felhaszn�l� hozz�sz�l�sai";
$lang['Interests'] = "�rdekl�d�si k�r";
$lang['Occupation'] = "Foglalkoz�s"; 
$lang['Poster_rank'] = "Rang";

$lang['Total_posts'] = "�sszes hozz�sz�l�sok";
$lang['User_post_pct_stats'] = "%.2f%% �sszesen"; // 1.25% of total
$lang['User_post_day_stats'] = "%.2f hozz�sz�l�s naponta"; // 1.5 posts per day
$lang['Search_user_posts'] = "Keres�s: %s �sszes hozz�sz�l�sa"; // Find all posts by username

$lang['No_user_id_specified'] = "Pardon, ilyen felhaszn�l� nem l�tezik";
$lang['Wrong_Profile'] = "Nem lehet m�s profilj�t m�dos�tani.";

$lang['Only_one_avatar'] = "Egyszerre csak egy avatar v�laszthat�";
$lang['File_no_data'] = "A megadott URL nem tartalmaz adatot";
$lang['No_connection_URL'] = "A megadott URL nem �rthet� el";
$lang['Incomplete_URL'] = "A megadott URL hi�nyos";
$lang['Wrong_remote_avatar_format'] = "A megadott URL �rv�nytelen";
$lang['No_send_account_inactive'] = "Pardon, a jelsz�t nem lehet elk�ldeni, mert az azonos�t� jelenleg inakt�v. Vegye fel a kapcsolatot a f�rum adminisztr�tor�val tov�bbi inform�ci��rt";

$lang['Always_smile'] = "Emotikonok enged�lyez�se";
$lang['Always_html'] = "HTML enged�lyez�se";
$lang['Always_bbcode'] = "BBCode enged�lyez�se";
$lang['Always_add_sig'] = "Al��r�s csatol�sa";
$lang['Always_notify'] = "�rtes�t�s a hozz�sz�l�sokr�l";
$lang['Always_notify_explain'] = "K�ld egy email-t, amennyiben valaki v�laszol valamelyik t�m�ban a hozz�sz�l�s�ra. Ez minden hozz�sz�l�sn�l be�ll�that�";

$lang['Board_style'] = "F�rum st�lusa";
$lang['Board_lang'] = "F�rum nyelve";
$lang['No_themes'] = "Nincsenek s�m�k az adatb�zisban";
$lang['Timezone'] = "Id�z�na";
$lang['Date_format'] = "D�tum form�tum";
$lang['Date_format_explain'] = "A szintakszis megegyezik a PHP <a href=\"http://www.php.net/date\" target=\"_other\">date()</a> funkci�j��val";
$lang['Signature'] = "Al��r�s";
$lang['Signature_explain'] = "Ez a sz�vegr�szlet minden hozz�sz�l�shoz csatolhat�. A maxim�lis hossza %d karakter";
$lang['Public_view_email'] = "Az email c�m m�sok �ltal megtekinthet�";

$lang['Current_password'] = "Jelenlegi jelsz�";
$lang['New_password'] = "�j jelsz�";
$lang['Confirm_password'] = "�j jelsz� m�gegyszer";
$lang['Confirm_password_explain'] = "Meg kell er�s�teni a jelsz�t, ha meg akarja v�ltoztatni, vagy megv�ltoztatta az email c�m�t";
$lang['password_if_changed'] = "Csak akkor kell megadni �j jelsz�t, ha meg akarja v�ltoztatni";
$lang['password_confirm_if_changed'] = "Csak akkor kell meger�s�teni az �j jelsz�t, ha meg akarja v�ltoztatni";

$lang['Avatar'] = "Avatar"; 
$lang['Avatar_explain'] = "Megjelen�t egy kis k�pet vagy grafik�t a hozz�sz�l�sain�l. Egyszerre csak egy k�p jelen�thet� meg, amelynek a maxim�lis m�rete 80x80 pixel, %dkB.";
$lang['Upload_Avatar_URL'] = "Avatar felt�lt�se megadott URL c�mr�l";
$lang['Upload_Avatar_URL_explain'] = "Adja meg a felt�lteni k�v�nt avatar URL c�m�t";
$lang['Pick_local_Avatar'] = "V�lasszon avatart a gal�ri�b�l";
$lang['Link_remote_Avatar'] = "Adja meg a haszn�lni k�v�nt avatar URL c�m�t";
$lang['Link_remote_Avatar_explain'] = "�rja be a haszn�lni k�v�nt avatar URL c�m�t.";
$lang['Avatar_URL'] = "Avatar URL c�me";
$lang['Select_from_gallery'] = "Avatar v�laszt�sa a gal�ri�b�l";
$lang['View_avatar_gallery'] = "Avatar gal�ria megtekint�se";

$lang['Select_avatar'] = "Avatar kiv�laszt�sa";
$lang['Return_profile'] = "M�gsem";
$lang['Select_category'] = "V�lasszon kateg�ri�t";

$lang['Delete_Image'] = "K�p t�rl�se";
$lang['Current_Image'] = "Jelenlegi k�p";

$lang['Notify_on_privmsg'] = "�rtes�tsen, ha �j priv�t �zenet �rkezik";
$lang['Popup_on_privmsg'] = "�rtes�t� ablak nyit�sa, ha �j priv�t �zenet �rkezik";
$lang['Popup_on_privmsg_explain'] = "N�h�ny s�ma �j ablakot nyit, ha �j priv�t �zenet �rkezik"; 
$lang['Hide_user'] = "Online st�tusz elrejt�se";

$lang['Profile_updated'] = "A profil friss�tve lett.";
$lang['Profile_updated_inactive'] = "A profil friss�tve lett, de olyan fontos adatok lettek benne megv�ltoztatva, hogy az azonos�t� inakt�v, �s �jra kell aktiv�lni. Tekintse meg a leveleit a tov�bbi inform�ci�k�rt, vagy v�rja meg, hogy az adminisztr�tor aktiv�lja az azonos�t�j�t, amennyiben az sz�ks�ges";

$lang['Password_mismatch'] = "A be�rt �j jelszavak nem egyeznek meg";
$lang['Current_password_mismatch'] = "A jelenlegi jelsz� nem egyezik meg az adatb�zisban l�v�vel";
$lang['Password_long'] = "A jelsz� nem lehet hosszabb 32 karaktern�l";
$lang['Username_taken'] = "Pardon, ez a felhaszn�l�n�v m�r foglalt";
$lang['Username_invalid'] = "Pardon, ez a felhaszn�l�n�v �rv�nytelen karaktert tartalmaz";
$lang['Username_disallowed'] = "Pardon, ez a felhaszn�l�n�v le van tiltva";
$lang['Email_taken'] = "Pardon, ezt az email c�met m�r egy m�sik felhaszn�l� haszn�lja";
$lang['Email_banned'] = "Pardon, ez az email c�m le van tiltva";
$lang['Email_invalid'] = "Pardon, ez az email c�m �rv�nytelen";
$lang['Signature_too_long'] = "Az al��r�s t�l hossz�";
$lang['Fields_empty'] = "Ki kell t�lteni a sz�ks�ges mez�ket";
$lang['Avatar_filetype'] = "Az avatar f�jlnak .jpg, .gif or .png form�tum�nak kell lennie";
$lang['Avatar_filesize'] = "Az avatar f�jlnak kisebbnek kell lennie, mint %d kB"; // The avatar image file size must be less than 6 kB
$lang['Avatar_imagesize'] = "Az avatar k�pnek kisebbnek kell lennie %dx%d pixeln�l";

$lang['Welcome_subject'] = "�dv�z�lj�k a %s f�rum�n"; // Welcome to my.com forums
$lang['New_account_subject'] = "�j felhaszn�l�i azonos�t�";
$lang['Account_activated_subject'] = "Azonos�t� aktiv�lva";

$lang['Account_added'] = "K�sz�nj�k a regisztr�l�st, az azonos�t� elk�sz�lt.";
$lang['Account_inactive'] = "Az azonos�t� elk�sz�lt. A f�rumba val� bel�p�s el�tt azonban az �j azonos�t�t aktiv�lni kell. Az aktiv�l�shoz sz�ks�ges kulcsot elk�ldt�k emailben. K�rj�k, tekintse meg a leveleit a tov�bbi inform�ci�k�rt.";
$lang['Account_inactive_admin'] = " Az azonos�t� elk�sz�lt. A f�rumba val� bel�p�s el�tt azonban az �j azonos�t�t aktiv�lnia kell egy adminisztr�tornak. Az aktiv�l�sr�l emailben kap majd �rtes�t�st.";
$lang['Account_active'] = "Az azonos�t� aktiv�lva lett. K�sz�nj�k a regisztr�l�st.";
$lang['Account_active_admin'] = " Az azonos�t� aktiv�lva lett.";
$lang['Reactivate'] = "Aktiv�lja �jra az azonos�t�j�t!";
$lang['COPPA'] = "Az azonos�t� elk�sz�lt, de enged�lyeztetni kell, tekintse meg a leveleit a tov�bbi inform�ci�k�rt."; 

$lang['Registration'] = "Regisztr�ci�s felt�telek";
$lang['Reg_agreement'] = "B�r az adminisztr�torok �s moder�torok mindent megtesznek, hogy elt�vol�ts�k a kifog�solhat� hozz�sz�l�sokat amilyen gyorsan csak lehets�ges, teljess�ggel lehetetlen minden egyes hozz�sz�l�st ellen�rizni. Ez�rt felh�vjuk a figyelm�t, hogy a f�rumon olvashat� hozz�sz�l�sok a f�rumon hozz�sz�l� n�zet�t �s v�lem�ny�t t�kr�zik, nem pedig az adminisztr�torok�t, moder�torok�t, valamint a webmester�t, (term�szetesen kiv�telt k�peznek ez al�l az el�bb megnevezett szem�lyek saj�t hozz�sz�l�sai) ez�rt a f�rum �zemeltet�i a f�rumon olvashat� tartalom�rt semmilyen felel�ss�get nem v�llalnak.<br /><br />A regisztr�l�ssal egyet�rt azzal, hogy nem post�z s�rt�, obszc�n, vulg�ris, r�galmaz�, gy�l�letkelt� valamint b�rmilyen m�s m�don jogs�rt� hozz�sz�l�sokat. A szab�ly megs�rt�se eset�n a f�rum �zemeltet�i azonnal �s v�glegesen kitiltj�k a f�rumr�l, valamint megteszik a sz�ks�ges l�p�seket a felel�ss�grevon�shoz. Minden hozz�sz�l� IP c�m�t r�gz�tj�k. Egyet�rt azzal, hogy a f�rum �zemeltet�i fenntartj�k maguknak a jogot, hogy t�r�lj�k, m�dos�ts�k, vagy lez�rj�k azokat a t�m�kat, amelyeket erre sz�ks�gesnek tartanak. Mint felhaszn�l�, egyet�rt azzal, hogy a be�rt szem�lyes adatait az adatb�zisunkban t�roljuk. Az adatait a beleegyez�se n�lk�l nem szolg�ltatjuk ki harmadik f�lnek. A f�rum �zemeltet�i a rendszert �r� t�mad�sb�l sz�rmaz� adatb�zis s�r�l�s�rt �s az adatok esetleges nyilv�noss�gra ker�l�s��rt felel�ss�get nem v�llalnak.<br /><br />Ez a f�rum cookie-kat haszn�l inform�ci�k t�rol�s�ra. Ezek a cookie-k nem tartalmaznak semmi inform�ci�t a fennt le�rtakb�l, kiz�r�lag a b�ng�sz�st seg�tik el�. A megadott email c�m a regisztr�ci� ellen�rz�s�re szolg�l (�s az �j jelsz� elk�ld�s�re, ha elfelejten� a jelenlegit).<br /><br />Amennyiben folytatni k�v�nja a regisztr�ci�t, el kell fogadnia ezeket a felt�teleket.";

$lang['Agree_under_13'] = "Egyet�rtek a felt�telekkel, �s 13 �v <b>alatt</b> vagyok";
$lang['Agree_over_13'] = "Egyet�rtek a felt�telekkel";
$lang['Agree_not'] = "Nem �rtek egyet a felt�telekkel";

$lang['Wrong_activation'] = "A megadott aktiv�l� kulcs nem egyezik az adatb�zisban szerepl�vel";
$lang['Send_password'] = "�j jelsz�t k�rek"; 
$lang['Password_updated'] = "Az �j jelsz� l�trehozva, tekintse meg a leveleit tov�bbi inform�ci�k�rt";
$lang['No_email_match'] = "A megadott email c�m nem egyezik meg az adatb�zisban szerepl�vel";
$lang['New_password_activation'] = "�j jelsz� aktiv�l�sa";
$lang['Password_activated'] = "Az azonos�t� �jra lett aktiv�lva. Bejelentkezhet azzal a felhaszn�l�n�vvel �s jelsz�val, amit a kor�bbiakban kapott lev�lben.";

$lang['Send_email_msg'] = "Email �zenet k�ld�se";
$lang['No_user_specified'] = "Nem lett felhaszn�l� meghat�rozva";
$lang['User_prevent_email'] = "Ez a felhaszn�l� nem fogad emailt. K�ldj�n ink�bb priv�t �zenetet";
$lang['User_not_exist'] = "Ilyen felhaszn�l� nem l�tezik";
$lang['CC_email'] = "M�solat k�ld�se saj�t c�mre"; 
$lang['Email_message_desc'] = "Az �zenet sima sz�vegk�nt lesz elk�lde, ne �rjon bele HTML vagy BBCode tag-eket. A v�laszc�m a megadott email c�m�re lesz be�ll�tva.";
$lang['Flood_email_limit'] = "Nem tud most levelet k�ldeni. Pr�b�lja k�s�bb";
$lang['Recipient'] = "C�mzett";
$lang['Email_sent'] = "Az email elk�ldve";
$lang['Send_email'] = "Email k�ld�se";
$lang['Empty_subject_email'] = "Meg kell adnia az �zenet t�rgy�t a lev�lk�ld�shez";
$lang['Empty_message_email'] = "Meg kell adnia az �zenetek a lev�lk�ld�shez";


//
// Memberslist
//
$lang['Select_sort_method'] = "Rendez�s m�dja";
$lang['Sort'] = "Rendez�s";
$lang['Sort_Top_Ten'] = "A t�z legakt�vabb felhaszn�l�";
$lang['Sort_Joined'] = "Csatlakoz�s ideje";
$lang['Sort_Username'] = "Felhaszn�l�n�v";
$lang['Sort_Location'] = "Hely";
$lang['Sort_Posts'] = "�zenetek sz�ma";
$lang['Sort_Email'] = "Email";
$lang['Sort_Website'] = "Weboldal";
$lang['Sort_Ascending'] = "N�vekv�";
$lang['Sort_Descending'] = "Cs�kken�";
$lang['Order'] = "Sorrend";


//
// Group control panel
//
$lang['Group_Control_Panel'] = "Csoport Vez�rl�pult";
$lang['Group_member_details'] = "Csoport tags�g r�szletei";
$lang['Group_member_join'] = "Csatlakoz�s a csoporthoz";

$lang['Group_Information'] = "Csoport Inform�ci�";
$lang['Group_name'] = "Csoportn�v";
$lang['Group_description'] = "Csoport le�r�sa";
$lang['Group_membership'] = "Csoport tags�g";
$lang['Group_Members'] = "Csoport Tag";
$lang['Group_Moderator'] = "Csoport Moder�tor";
$lang['Pending_members'] = "F�gg�ben l�v� Tag";

$lang['Group_type'] = "Csoport t�pusa";
$lang['Group_open'] = "Ny�lt csoport";
$lang['Group_closed'] = "Z�rt csoport";
$lang['Group_hidden'] = "Rejtett csoport";

$lang['Current_memberships'] = "Jelenlegi tags�g";
$lang['Non_member_groups'] = "Nincs tags�g";
$lang['Memberships_pending'] = "F�gg�ben l�v� tags�g";

$lang['No_groups_exist'] = "Nem l�teznek csoportok";
$lang['Group_not_exist'] = "Ilyen csoport nem l�tezik";

$lang['Join_group'] = "Csatlakoz�s csoporthoz";
$lang['No_group_members'] = "Ennek a csoportnak nincsenek tagjai";
$lang['Group_hidden_members'] = "Ez egy rejtett csoport, nem lehet megtekinteni a tagjait";
$lang['No_pending_group_members'] = "Ennek a csoportnak nincsenek f�gg�ben l�v� tagjai";
$lang["Group_joined"] = "Sikeresen fel�ratkozott a csoportba.<br />A k�s�bbiekben kap �rtes�t�st arr�l, ha a csoport moder�tor j�v�hagyja a feliratkoz�s�t";
$lang['Group_request'] = "A request to join your group has been made"; // XXX mauzi
$lang['Group_approved'] = "A k�r�se elfogadva";
$lang['Group_added'] = "Sikeresen csatlakozott a csoporthoz"; 
$lang['Already_member_group'] = "M�r tagja ennek a csoportnak";
$lang['User_is_member_group'] = "A felhaszn�l� m�r tagja ennek a csoportnak";
$lang['Group_type_updated'] = "Csoport t�pus sikeresen friss�tve";

$lang['Could_not_add_user'] = "A k�rt felhaszn�l� nem l�tezik";
$lang['Could_not_anon_user'] = "Vend�g nem csatlakozhat csoporthoz";

$lang['Confirm_unsub'] = "Biztos benne, hogy le akar iratkozni ebb�l a csoportb�l?";
$lang['Confirm_unsub_pending'] = "A fel�ratkoz�sa m�g nem lett j�v�hagyva. Biztos, hogy le�ratkozik?";

$lang['Unsub_success'] = "Sikeresen leiratkozott ebb�l a csoportb�l";

$lang['Approve_selected'] = "Kijel�ltek j�v�hagy�sa";
$lang['Deny_selected'] = "Kijel�ltek tilt�sa";
$lang['Not_logged_in'] = "El�sz�r be kell jelentkeznie, hogy csatlakozni tudjon ehhez a csoporthoz.";
$lang['Remove_selected'] = "Kijel�ltek t�rl�se";
$lang['Add_member'] = "Tag hozz�ad�sa";
$lang['Not_group_moderator'] = "Nem moder�tora ennek a csoportnak, ez�rt nem tudja v�grehajtani ezt a tev�kenys�get.";

$lang['Login_to_join'] = "Bejelentkez�s a csoport tags�gok m�dos�t�s�hoz";
$lang['This_open_group'] = "Ez egy nyitott csoport, kattintson a tags�g�rt";
$lang['This_closed_group'] = "Ez egy z�rt csoport, t�bb tag nem �ratkozhat fel";
$lang['This_hidden_group'] = "Ez egy rejtett csoport, az fel�ratkoz�s nem enged�lyezett";
$lang['Member_this_group'] = "Tagja ennek a csoportnak";
$lang['Pending_this_group'] = "A csoport tags�ga f�gg�ben van";
$lang['Are_group_moderator'] = "Csoport moder�tor";
$lang['None'] = "Nincs";

$lang['Subscribe'] = "Fel�ratkoz�s";
$lang['Unsubscribe'] = "Le�ratkoz�s";
$lang['View_Information'] = "Inform�ci� megtekint�se";


//
// Search
//
$lang['Search_query'] = "Keres�s";
$lang['Search_options'] = "Keres�s be�ll�t�sai";

$lang['Search_keywords'] = "Keres�s kulcssz�ra";
$lang['Search_keywords_explain'] = "Haszn�lja az <u>AND</u> jelet azokn�l a szavakn�l, amelyeknek benne kell lenni, az <u>OR</u> jelet azokn�l, amelyek benne lehetnek, �s a <u>NOT</u> jelet azokn�l, amelyek nem lehetnek benne a tal�latok k�z�tt. Haszn�lja a  * karaktert, mint Joker";
$lang['Search_author'] = "Keres�s szerz�re";
$lang['Search_author_explain'] = " Haszn�lja a  * karaktert, mint Joker";

$lang['Search_for_any'] = "Keres�s b�rmelyik kulcssz�ra, vagy a megadott felt�telek alapj�n";
$lang['Search_for_all'] = "Keres�s az �sszes kulcssz�ra";
$lang['Search_title_msg'] = "T�ma c�mekben �s hozz�sz�l�sok sz�veg�ben";
$lang['Search_msg_only'] = "Csak a hozz�sz�l�sok sz�veg�ben";

$lang['Return_first'] = "Hozz�sz�l�sok els�"; // followed by xxx characters in a select box
$lang['characters_posts'] = "karakter�nek megjelen�t�se";

$lang['Search_previous'] = "Keres�s"; // followed by days, weeks, months, year, all in a select box

$lang['Sort_by'] = "Rendez�s";
$lang['Sort_Time'] = "�zenetk�ld�s ideje";
$lang['Sort_Post_Subject'] = "�zenet t�rgya";
$lang['Sort_Topic_Title'] = "T�ma c�m";
$lang['Sort_Author'] = "Szerz�";
$lang['Sort_Forum'] = "F�rum";

$lang['Display_results'] = "Eredm�nyek megjelen�t�se";
$lang['All_available'] = "�sszes el�rhet�";
$lang['No_searchable_forums'] = "Nincs joga a f�rumokban keresni ezen az oldalon";

$lang['No_search_match'] = "Nincs t�ma vagy hozz�sz�l�s, amely megfelelne a keres�si felt�teleknek";
$lang['Found_search_match'] = "A keres�s eredm�nye %d tal�lat"; // eg. Search found 1 match
$lang['Found_search_matches'] = "A keres�s eredm�nye %d tal�lat"; // eg. Search found 24 matches

$lang['Close_window'] = "Ablak bez�r�sa";


//
// Auth related entries
//
// Note the %s will be replaced with one of the following 'user' arrays
$lang['Sorry_auth_announce'] = "Pardon, csak %s tud hirdetm�nyeket k�ldeni ezen a f�rumon";
$lang['Sorry_auth_sticky'] = "Pardon, csak %s tud fontos hozz�sz�l�sokat k�ldeni ezen a f�rumon"; 
$lang['Sorry_auth_read'] = "Pardon, csak %s tud beleolvasni a t�m�kba ezen a f�rumon"; 
$lang['Sorry_auth_post'] = "Pardon, csak %s tud �j t�m�t nyitni ezen a f�rumon"; 
$lang['Sorry_auth_reply'] = "Pardon, csak %s tud v�laszolni a hozz�sz�l�sokra ezen a f�rumon"; 
$lang['Sorry_auth_edit'] = "Pardon, csak %s tudja szerkeszteni a hozz�sz�l�sokat ezen a f�rumon"; 
$lang['Sorry_auth_delete'] = "Pardon, csak %s tud hozz�sz�l�sokat t�r�lni ezen a f�rumon"; 
$lang['Sorry_auth_vote'] = "Pardon, csak %s tud szavazni ezen a f�rumon"; 

// These replace the %s in the above strings
$lang['Auth_Anonymous_Users'] = "<b>n�vtelen felhaszn�l�</b>";
$lang['Auth_Registered_Users'] = "<b>regisztr�lt felhaszn�l�</b>";
$lang['Auth_Users_granted_access'] = "<b>kiemelt felhaszn�l�</b>";
$lang['Auth_Moderators'] = "<b>moder�tor</b>";
$lang['Auth_Administrators'] = "<b>adminisztr�tor</b>";

$lang['Not_Moderator'] = "Nem moder�tora ennek a f�rumnak";
$lang['Not_Authorised'] = "Nincs azonos�tva";

$lang['You_been_banned'] = "Ki lett tiltva err�l a f�rumr�l.<br />Vegye fel a kapcsolatot a f�rum adminisztr�tor�val tov�bbi inform�ci�k�rt";


//
// Viewonline
//
$lang['Reg_users_zero_online'] = "Nincs Regisztr�lt, �s "; // There ae 5 Registered and
$lang['Reg_users_online'] = "Van %d Regisztr�lt, �s "; // There ae 5 Registered and
$lang['Reg_user_online'] = "Van %d Regisztr�lt, �s "; // There ae 5 Registered and
$lang['Hidden_users_zero_online'] = "nincs Rejtett felhaszn�l� online"; // 6 Hidden users online
$lang['Hidden_users_online'] = "van %d Rejtett felhaszn�l� online"; // 6 Hidden users online
$lang['Hidden_user_online'] = "van %d Rejtett felhaszn�l� online"; // 6 Hidden users online
$lang['Guest_users_online'] = "Van %d Vend�g felhaszn�l� online"; // There are 10 Guest users online
$lang['Guest_users_zero_online'] = "Nincs Vend�g felhaszn�l� online"; // There are 10 Guest users online
$lang['Guest_user_online'] = "Van %d Vend�g felhaszn�l� online"; // There is 1 Guest user online
$lang['No_users_browsing'] = "Jelenleg senki sem b�ng�szi a f�rumot";

$lang['Online_explain'] = "Az adatok az elm�lt 5 perc akt�v felhaszn�l�it t�kr�zik";

$lang['Forum_Location'] = "B�ng�sz�s Helye";
$lang['Last_updated'] = "Utolj�ra friss�tve";

$lang['Forum_index'] = "F�rum tartalomjegyz�k";
$lang['Logging_on'] = "Bejelentkezik";
$lang['Posting_message'] = "�zenetet �r";
$lang['Searching_forums'] = "Keres a f�rumokban";
$lang['Viewing_profile'] = "Profilt �ll�t";
$lang['Viewing_online'] = "Megtekinti, hogy ki van online";
$lang['Viewing_member_list'] = "Megtekinti a taglist�t";
$lang['Viewing_priv_msgs'] = "Priv�t �zeneteket olvas";
$lang['Viewing_FAQ'] = "GYIK-ot olvas";


//
// Moderator Control Panel
//
$lang['Mod_CP'] = "Moder�tor Vez�rl�pult";
$lang['Mod_CP_explain'] = "Az al�bbiakban moder�lhatja a f�rumot. Lez�rhat t�m�kat, feloldhatja t�m�k lez�r�s�t, t�r�lhet t�m�kat, stb. ";

$lang['Select'] = "Kijel�l�s";
$lang['Delete'] = "T�rl�s";
$lang['Move'] = "�thelyez�s";
$lang['Lock'] = "Lez�r�s";
$lang['Unlock'] = "Lez�r�s felold�sa";

$lang['Topics_Removed'] = "A k�rt t�m�k sikeresen el lettek t�vol�tva az adatb�zisb�l.";
$lang['Topics_Locked'] = "A k�rt t�m�k le lettek z�rva";
$lang['Topics_Moved'] = "A k�rt t�m�k �t lettek helyezve";
$lang['Topics_Unlocked'] = "A k�rt t�m�k lez�r�sa fel lett oldva";
$lang['No_Topics_Moved'] = "Nem lett t�ma �thelyezve";

$lang['Confirm_delete_topic'] = "Biztos benne, hogy le akarja t�r�lni a kijel�lt t�m�t/t�m�kat?";
$lang['Confirm_lock_topic'] = " Biztos benne, hogy le akarja z�rni a kijel�lt t�m�t/t�m�kat?";
$lang['Confirm_unlock_topic'] = "Biztos benne, hogy fel akarja oldani a kijel�lt t�ma/t�m�k lez�r�s�t?";
$lang['Confirm_move_topic'] = " Biztos benne, hogy �t akarja helyezni a kijel�lt t�m�t/t�m�kat?";

$lang['Move_to_forum'] = "�thelyez�s";
$lang['Leave_shadow_topic'] = "A t�ma az eredeti hely�n is megmarad";

$lang['Split_Topic'] = "T�ma feloszt�sa Vez�rl�pult";
$lang['Split_Topic_explain'] = "Az al�bbiakban feloszthat egy t�m�t k�t �j t�m�ra, vagy a hozz�sz�l�sok kiv�laszt�s�val, vagy egy kiv�lasztott hozz�sz�l�sn�l";
$lang['Split_title'] = "�j t�ma c�me";
$lang['Split_forum'] = "�j t�ma helye";
$lang['Split_posts'] = "Feloszt�s kiv�lasztott hozz�sz�l�sok alapj�n";
$lang['Split_after'] = "Feloszt�s egy kiv�lasztott hozz�sz�l�sn�l";
$lang['Topic_split'] = "A kiv�lasztott t�ma sikeresen fel lett osztva";

$lang['Too_many_error'] = "T�l sok hozz�sz�l�st v�lasztott. Egy hozz�sz�l�st kell kiv�lasztania, amelyik ut�n akarja felosztani a t�m�t!";

$lang['None_selected'] = "Nem v�laszott ki t�m�t, amin v�grehajthatn� a k�v�nt m�veletet. V�lasszon ki legal�bb egyet.";
$lang['New_forum'] = "�j f�rum";

$lang['This_posts_IP'] = "Hozz�sz�l� IP c�me";
$lang['Other_IP_this_user'] = "Hozz�sz�l� eddig haszn�lt IP c�mei";
$lang['Users_this_IP'] = "Felhaszn�l�k err�l az IP c�mr�l"; 
$lang['IP_info'] = "IP Inform�ci�";
$lang['Lookup_IP'] = "IP felder�t�se";


//
// Timezones ... for display on each page
//
$lang['All_times'] = "Id�z�na: %s"; // eg. All times are GMT - 12 Hours (times from next block)

$lang['-12'] = "GMT - 12 �ra";
$lang['-11'] = "GMT - 11 �ra";
$lang['-10'] = "HST (Hawaii)";
$lang['-9'] = "GMT - 9 �ra";
$lang['-8'] = "PST (U.S./Canada)";
$lang['-7'] = "MST (U.S./Canada)";
$lang['-6'] = "CST (U.S./Canada)";
$lang['-5'] = "EST (U.S./Canada)";
$lang['-4'] = "GMT - 4 �ra";
$lang['-3.5'] = "GMT - 3.5 �ra";
$lang['-3'] = "GMT - 3 �ra";
$lang['-2'] = "Mid-Atlantic";
$lang['-1'] = "GMT - 1 �ra";
$lang['0'] = "GMT";
$lang['1'] = "CET (Eur�pa)";
$lang['2'] = "EET (Eur�pa)";
$lang['3'] = "GMT + 3 �ra";
$lang['3.5'] = "GMT + 3.5 �ra";
$lang['4'] = "GMT + 4 �ra";
$lang['4.5'] = "GMT + 4.5 �ra";
$lang['5'] = "GMT + 5 �ra";
$lang['5.5'] = "GMT + 5.5 �ra";
$lang['6'] = "GMT + 6 �ra";
$lang['7'] = "GMT + 7 �ra";
$lang['8'] = "WST (Ausztr�lia)";
$lang['9'] = "GMT + 9 �ra";
$lang['9.5'] = "CST (Ausztr�lia)";
$lang['10'] = "EST (Ausztr�lia)";
$lang['11'] = "GMT + 11 �ra";
$lang['12'] = "GMT + 12 �ra";

// These are displayed in the timezone select box
$lang['tz']['-12'] = "(GMT -12:00 �ra) Eniwetok, Kwajalein";
$lang['tz']['-11'] = "(GMT -11:00 �ra) Midway Island, Samoa";
$lang['tz']['-10'] = "(GMT -10:00 �ra) Hawaii";
$lang['tz']['-9'] = "(GMT -9:00 �ra) Alaska";
$lang['tz']['-8'] = "(GMT -8:00 �ra) Pacific Time (US &amp; Canada), Tijuana";
$lang['tz']['-7'] = "(GMT -7:00 �ra) Mountain Time (US &amp; Canada), Arizona";
$lang['tz']['-6'] = "(GMT -6:00 �ra) Central Time (US &amp; Canada), Mexico City";
$lang['tz']['-5'] = "(GMT -5:00 �ra) Eastern Time (US &amp; Canada), Bogota, Lima, Quito";
$lang['tz']['-4'] = "(GMT -4:00 �ra) Atlantic Time (Canada), Caracas, La Paz";
$lang['tz']['-3.5'] = "(GMT -3:30 �ra) Newfoundland";
$lang['tz']['-3'] = "(GMT -3:00 �ra) Brassila, Buenos Aires, Georgetown, Falkland Is";
$lang['tz']['-2'] = "(GMT -2:00 �ra) Mid-Atlantic, Ascension Is., St. Helena";
$lang['tz']['-1'] = "(GMT -1:00 �ra) Azores, Cape Verde Islands";
$lang['tz']['0'] = "(GMT) Casablanca, Dublin, Edinburgh, London, Lisbon, Monrovia";
$lang['tz']['1'] = "(GMT +1:00 �ra) Amsterdam, Berlin, Brussels, Budapest, Madrid, Paris, Rome";
$lang['tz']['2'] = "(GMT +2:00 �ra) Cairo, Helsinki, Kaliningrad, South Africa";
$lang['tz']['3'] = "(GMT +3:00 �ra) Baghdad, Riyadh, Moscow, Nairobi";
$lang['tz']['3.5'] = "(GMT +3:30 �ra) Tehran";
$lang['tz']['4'] = "(GMT +4:00 �ra) Abu Dhabi, Baku, Muscat, Tbilisi";
$lang['tz']['4.5'] = "(GMT +4:30 �ra) Kabul";
$lang['tz']['5'] = "(GMT +5:00 �ra) Ekaterinburg, Islamabad, Karachi, Tashkent";
$lang['tz']['5.5'] = "(GMT +5:30 �ra) Bombay, Calcutta, Madras, New Delhi";
$lang['tz']['6'] = "(GMT +6:00 �ra) Almaty, Colombo, Dhaka, Novosibirsk";
$lang['tz']['6.5'] = "(GMT +6:30 �ra) Rangoon";
$lang['tz']['7'] = "(GMT +7:00 �ra) Bangkok, Hanoi, Jakarta";
$lang['tz']['8'] = "(GMT +8:00 �ra) Beijing, Hong Kong, Perth, Singapore, Taipei";
$lang['tz']['9'] = "(GMT +9:00 �ra) Osaka, Sapporo, Seoul, Tokyo, Yakutsk";
$lang['tz']['9.5'] = "(GMT +9:30 �ra) Adelaide, Darwin";
$lang['tz']['10'] = "(GMT +10:00 �ra) Canberra, Guam, Melbourne, Sydney, Vladivostok";
$lang['tz']['11'] = "(GMT +11:00 �ra) Magadan, New Caledonia, Solomon Islands";
$lang['tz']['12'] = "(GMT +12:00 �ra) Auckland, Wellington, Fiji, Marshall Island";

$lang['days_long'][0] = "Vas�rnap";
$lang['days_long'][1] = "H�tf�";
$lang['days_long'][2] = "Kedd";
$lang['days_long'][3] = "Szerda";
$lang['days_long'][4] = "Cs�t�rt�k";
$lang['days_long'][5] = "P�ntek";
$lang['days_long'][6] = "Szombat";

$lang['days_short'][0] = "V";
$lang['days_short'][1] = "H";
$lang['days_short'][2] = "K";
$lang['days_short'][3] = "Sze";
$lang['days_short'][4] = "Cs";
$lang['days_short'][5] = "P";
$lang['days_short'][6] = "Szo";

$lang['months_long'][0] = "Janu�r";
$lang['months_long'][1] = "Febru�r";
$lang['months_long'][2] = "M�rcius";
$lang['months_long'][3] = "�prilis";
$lang['months_long'][4] = "M�jus";
$lang['months_long'][5] = "J�nius";
$lang['months_long'][6] = "J�lius";
$lang['months_long'][7] = "Augusztus";
$lang['months_long'][8] = "Szeptember";
$lang['months_long'][9] = "Okt�ber";
$lang['months_long'][10] = "November";
$lang['months_long'][11] = "December";

$lang['months_short'][0] = "Jan";
$lang['months_short'][1] = "Feb";
$lang['months_short'][2] = "M�r";
$lang['months_short'][3] = "�pr";
$lang['months_short'][4] = "M�j";
$lang['months_short'][5] = "J�n";
$lang['months_short'][6] = "J�l";
$lang['months_short'][7] = "Aug";
$lang['months_short'][8] = "Sze";
$lang['months_short'][9] = "Okt";
$lang['months_short'][10] = "Nov";
$lang['months_short'][11] = "Dec";

//
// Errors (not related to a
// specific failure on a page)
//
$lang['Information'] = "Inform�ci�";
$lang['Critical_Information'] = "Kritikus Inform�ci�";

$lang['General_Error'] = "�ltal�nos Hiba";
$lang['Critical_Error'] = "Kritikus Hiba";
$lang['An_error_occured'] = "Hiba t�rt�nt";
$lang['A_critical_error'] = "Kritikus hiba t�rt�nt";

//
// That's all Folks!
// -------------------------------------------------

?>
