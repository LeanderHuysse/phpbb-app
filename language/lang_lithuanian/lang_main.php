<?php
/***************************************************************************
 *                            lang_main.php [Lithuanian]
 *                              -------------------
 *     begin                : Mon April 08 2002
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
// The format of this file is:
//
// ---> $lang['message'] = "text";
//
// You should also try to set a locale and a character
// encoding (plus direction). The encoding and direction
// will be sent to the template. The locale may or may
// not work, it's dependent on OS support and the syntax
// varies ... give it your best guess!
//

//setlocale(LC_ALL, "en");
$lang['ENCODING'] = "windows-1257";
$lang['DIRECTION'] = "LTR";
$lang['LEFT'] = "LEFT";
$lang['RIGHT'] = "RIGHT";
$lang['DATE_FORMAT'] =  "d M Y"; // This should be changed to the default date format for your language, php date() format

//
// Common, these terms are used
// extensively on several pages
//
$lang['Forum'] = "Forumas";
$lang['Category'] = "Kategorija";
$lang['Topic'] = "Tema";
$lang['Topics'] = "Temos";
$lang['Replies'] = "Atsakymai";
$lang['Views'] = "Per�i�r�jo";
$lang['Post'] = "Prane�imas";
$lang['Posts'] = "Prane�imai";
$lang['Posted'] = "Para�yta";
$lang['Username'] = "Vartotojo vardas";
$lang['Password'] = "Slapta�odis";
$lang['Email'] = "El. pa�tas";
$lang['Poster'] = "Prane�imo autorius";
$lang['Author'] = "Autorius";
$lang['Time'] = "Laikas";
$lang['Hours'] = "Valanda(�)";
$lang['Message'] = "Prane�imas";

$lang['1_Day'] = "1 diena";
$lang['7_Days'] = "7 dienos";
$lang['2_Weeks'] = "2 savait�s";
$lang['1_Month'] = "1 m�nuo";
$lang['3_Months'] = "3 m�nesiai";
$lang['6_Months'] = "6 m�nesiai";
$lang['1_Year'] = "1 metai";

$lang['Go'] = "Pirmyn";
$lang['Jump_to'] = "Pereiti";
$lang['Submit'] = "I�si�sti";
$lang['Reset'] = "I�valyti";
$lang['Cancel'] = "At�aukti";
$lang['Preview'] = "Per�i�r�ti";
$lang['Confirm'] = "Patvirtinti";
$lang['Spellcheck'] = "Gramatika";
$lang['Yes'] = "Taip";
$lang['No'] = "Ne";
$lang['Enabled'] = "�jungta";
$lang['Disabled'] = "I�jungta";
$lang['Error'] = "Klaida";

$lang['Next'] = "Toliau";
$lang['Previous'] = "Atgal";
$lang['Goto_page'] = "Pereiti prie";
$lang['Joined'] = "Prisijung�";
$lang['IP_Address'] = "IP adresas";

$lang['Select_forum'] = "Pasirinkite forum�";
$lang['View_latest_post'] = "Per�i�r�ti seniausi� prane�im�";
$lang['View_newest_post'] = "Per�i�r�ti naujausi� prane�im�";
$lang['Page_of'] = "Puslapis <b>%d</b> i� <b>%d</b>"; // Replaces with: Page 1 of 2 for example

$lang['ICQ'] = "ICQ numeris";
$lang['AIM'] = "AIM adresas";
$lang['MSNM'] = "MSN Messenger";
$lang['YIM'] = "Yahoo Messenger";

$lang['Forum_Index'] = "Pagrindinis puslapis";  // eg. sitename Forum Index, %s can be removed if you prefer

$lang['Post_new_topic'] = "Ra�yti nauj� prane�im�";
$lang['Reply_to_topic'] = "Atsakyti � prane�im�";
$lang['Reply_with_quote'] = "Atsakyti su citata";

$lang['Click_return_topic'] = "Spauskite %s�ia%s, jei norite gr��ti prie prane�imo"; // %s's here are for uris, do not remove!
$lang['Click_return_login'] = "Spauskite %s�ia%s, jei norite pabandyti dar kart�";
$lang['Click_return_forum'] = "Spauskite %s�ia%s, jei norite gr��ti prie forumo";
$lang['Click_view_message'] = "Spauskite %s�ia%s, jei norite per�i�r�ti savo prane�im�";
$lang['Click_return_modcp'] = "Spauskite %s�ia%s, jei norite gr��ti prie moderatoriaus valdymo formos";
$lang['Click_return_group'] = "Spauskite %s�ia%s, jei norite gr��ti prie grup�s informacijos";

$lang['Admin_panel'] = "Eiti � administratoriaus valdymo meniu";

$lang['Board_disable'] = "Atsipra�ome, �is forumas panaikintas, pabandykite v�liau";


//
// Global Header strings
//
$lang['Registered_users'] = "Registruoti vartotojai:";
$lang['Browsing_forum'] = "Vartotojai, �i�rintys �� forum�:";
$lang['Online_users_zero_total'] = "In total there are <b>0</b> users online :: ";
$lang['Online_users_total'] = "I� viso dabar vartotoj� <b>%d</b>:: ";
$lang['Online_user_total'] = "I� viso dabar vartotoj� <b>%d</b>:: ";
$lang['Reg_users_zero_total'] = "0 Registruot�, ";
$lang['Reg_users_total'] = "%d Registruot�, ";
$lang['Reg_user_total'] = "%d Registruot�, ";
$lang['Hidden_users_zero_total'] = "0 Slapt� ir ";
$lang['Hidden_user_total'] = "%d Slapt� ir ";
$lang['Hidden_users_total'] = "%d Slapt� ir ";
$lang['Guest_users_zero_total'] = "0 Sve�i�";
$lang['Guest_users_total'] = "%d Sve�i�";
$lang['Guest_user_total'] = "%d Sve�i�";
$lang['Record_online_users'] = "Daugiausia vartotoj� buvo <b>%s</b>  %s"; // first %s = number of users, second %s is the date.

$lang['Admin_online_color'] = "%s<b>Administratorius</b>%s";
$lang['Mod_online_color'] = "%s<b>Moderatorius</b>%s";

$lang['You_last_visit'] = "Paskutin� kart� J�s lank�t�s %s"; // %s replaced by date/time
$lang['Current_time'] = "Data %s"; // %s replaced by time

$lang['Search_new'] = "Per�i�r�ti prane�imus nuo paskutinio apsilankymo";
$lang['Search_your_posts'] = "Per�i�r�ti j�s� prane�imus";
$lang['Search_unanswered'] = "Per�i�r�ti neatsakytus prane�imus";
$lang['View_last_24_hours'] = "View last 24 hours";

$lang['Register'] = "Registruotis";
$lang['Profile'] = "Apra�ymas";
$lang['Edit_profile'] = "Redaguoti j�s� apra�ym�";
$lang['Search'] = "Ie�koti";
$lang['Memberlist'] = "Nari� s�ra�as";
$lang['FAQ'] = "DUK";
$lang['BBCode_guide'] = "BBKodo apra�ymas";
$lang['Usergroups'] = "Vartotoj� grup�s";
$lang['Last_Post'] = "Paskutinis prane�imas";
$lang['Moderator'] = "Moderatorius";
$lang['Moderators'] = "Moderatoriai";


//
// Stats block text
//
$lang['Posted_articles_zero_total'] = "M�s� vartotojai i� viso para�� prane�im� <b>0</b>"; // Number of posts
$lang['Posted_articles_total'] = "M�s� vartotojai i� viso para�� prane�im� <b>%d</b>"; // Number of posts
$lang['Posted_article_total'] = "M�s� vartotojai i� viso para�� prane�im� <b>%d</b>"; // Number of posts
$lang['Registered_users_zero_total'] = "Mes turime registruot� vartotoj� <b>0</b>"; // # registered users
$lang['Registered_users_total'] = "Mes turime registruot� vartotoj� <b>%d</b>"; // # registered users
$lang['Registered_user_total'] = "Mes turime registruot� vartotoj� <b>%d</b>"; // # registered users
$lang['Newest_user'] = "Naujausias registruotas vartotojas yra %s%s%s"; // a href, username, /a

$lang['No_new_posts_last_visit'] = "N�ra nauj� prane�im� nuo j�s� paskutinio apsilankymo";
$lang['No_new_posts'] = "N�ra nauj� prane�im�";
$lang['New_posts'] = "Nauji prane�imai";
$lang['New_post'] = "Naujas prane�imas";
$lang['No_new_posts_hot'] = "N�ra nauj� prane�im� [ Populiaru ]";
$lang['New_posts_hot'] = "Nauji prane�imai [ Populiaru ]";
$lang['No_new_posts_locked'] = "N�ra nauj� prane�im� [ U�daryta ]";
$lang['New_posts_locked'] = "Nauji prane�imai [ U�daryta ]";
$lang['Forum_is_locked'] = "Forumas u�darytas";


//
// Login
//
$lang['Enter_password'] = "Pra�ome �ra�yti vartotojo vard� ir slapta�od�";
$lang['Login'] = "Prisijungti";
$lang['Logout'] = "Atsijungti";

$lang['Forgotten_password'] = "A� pamir�au savo slapta�od�";

$lang['Log_me_in'] = "Prijungti mane automati�kai kiekvieno apsilankymo metu";

$lang['Error_login'] = "J�s nurod�te neteising� ar neaktyv� vartotojo vard� arba neteising� slapta�od�";


//
// Index page
//
$lang['Index'] = "Pagrindinis";
$lang['No_Posts'] = "N�ra prane�im�";
$lang['No_forums'] = "�ia n�ra forum�";

$lang['Private_Message'] = "Asmeninis prane�imas";
$lang['Private_Messages'] = "Asmeniniai prane�imai";
$lang['Who_is_Online'] = "�iuo metu forume";

$lang['Mark_all_forums'] = "Pa�ym�ti visus forumus kaip perskaitytus";
$lang['Forums_marked_read'] = "Visi forumai buvo pa�ym�ti kaip perskaityti";


//
// Viewforum
//
$lang['View_forum'] = "Per�i�r�ti forum�";

$lang['Forum_not_exist'] = "J�s� pasirinktas forumas neegzistuoja";
$lang['Reached_on_error'] = "�vyko klaida";

$lang['Display_topics'] = "Rodyti ankstesnius prane�imus";
$lang['All_Topics'] = "Visi prane�imai";

$lang['Topic_Announcement'] = "<b>Anonsavimas :</b>";
$lang['Topic_Sticky'] = "<b>Lipnus:</b>";
$lang['Topic_Moved'] = "<b>Perne�tas:</b>";
$lang['Topic_Poll'] = "<b>Apklausa:</b>";

$lang['Mark_all_topics'] = "Pa�ym�ti visus forumus kaip perskaitytus";
$lang['Topics_marked_read'] = "Prane�imas �iam forumui dabar pa�ym�tas kaip skaitytas";

$lang['Rules_post_can'] = "J�s <b>galite</b> ra�yti naujus prane�imus � �� forum�";
$lang['Rules_post_cannot'] = "J�s <b>negalite</b> ra�yti nauj� prane�im� � �� forum�";
$lang['Rules_reply_can'] = "J�s <b>galite</b> atsakin�ti � prane�imus �iame forume";
$lang['Rules_reply_cannot'] = "J�s <b>negalite</b> atsakin�ti � prane�imus �iame forume";
$lang['Rules_edit_can'] = "J�s <b>galite</b> redaguoti savo prane�imus �iame forume";
$lang['Rules_edit_cannot'] = "J�s <b>negalite</b> redaguoti savo prane�im� �iame forume";
$lang['Rules_delete_can'] = "J�s <b>galite</b> i�trinti savo prane�imus �iame forume";
$lang['Rules_delete_cannot'] = "J�s <b>negalite</b> i�trinti savo prane�im� �iame forume";
$lang['Rules_vote_can'] = "J�s <b>galite</b> dalyvauti apklausose �iame forume";
$lang['Rules_vote_cannot'] = "J�s <b>negalite</b> dalyvauti apklausose �iame forume";
$lang['Rules_moderate'] = "J�s <b>galite</b> %smoderuoti �� forum�%s"; // %s replaced by a href links, do not remove!

$lang['No_topics_post_one'] = "�iame forume n�ra prane�im� <br />Spauskite <b>Para�yti nauj� prane�im�</b> �iame puslapyje";


//
// Viewtopic
//
$lang['View_topic'] = "Per�i�r�ti tem�";

$lang['Guest'] = "Sve�ias";
$lang['Post_subject'] = "Ra�yti tem�";
$lang['View_next_topic'] = "Rodyti kit� prane�im�";
$lang['View_previous_topic'] = "Rodyti ankstesn� prane�im�";
$lang['Submit_vote'] = "Balsuoti";
$lang['View_results'] = "Rodyti rezultatus";

$lang['No_newer_topics'] = "N�ra naujesni� prane�im� �iame forume";
$lang['No_older_topics'] = "N�ra senesni� prane�im� �iame forume";
$lang['Topic_post_not_exist'] = "Temos ar prane�imo, kurio ie�kote, n�ra";
$lang['No_posts_topic'] = "�ioje temoje n�ra prane�im�";

$lang['Display_posts'] = "Rodyti prane�imus nuo ankstesnio";
$lang['All_Posts'] = "Visi prane�imai";
$lang['Newest_First'] = "I� prad�i� naujesni";
$lang['Oldest_First'] = "I� prad�i� senesni";

$lang['Back_to_top'] = "Atgal � vir��";

$lang['Read_profile'] = "Per�i�r�ti vartotojo apra�ym�";
$lang['Send_email'] = "Nusi�sti vartotojui el. lai�k�";
$lang['Visit_website'] = "Apsilankyti vartotojo tinklapyje";
$lang['ICQ_status'] = "ICQ b�sena";
$lang['Edit_delete_post'] = "Redaguoti/I�trinti �� prane�im�";
$lang['View_IP'] = "Rodyti prane�imo ra�ytojo IP";
$lang['Delete_post'] = "I�trinti �� prane�im�";

$lang['wrote'] = "Ra�o"; // proceeds the username and is followed by the quoted text
$lang['Quote'] = "Citata"; // comes before bbcode quote output.
$lang['Code'] = "Kodas"; // comes before bbcode code output.

$lang['Edited_time_total'] = "Paskutin� kart� redagavo %s, %s, i� viso %d kart� redaguota"; // Last edited by me on 12 Oct 2001, edited 1 time in total
$lang['Edited_times_total'] = "Paskutin� kart� redagavo %s, %s, i� viso %d kart� redaguota"; // Last edited by me on 12 Oct 2001, edited 2 times in total

$lang['Lock_topic'] = "U�daryti �i� tem�";
$lang['Unlock_topic'] = "Atidaryti �i� tem�";
$lang['Move_topic'] = "Perkelti �i� tem�";
$lang['Delete_topic'] = "I�trinti �i� tem�";
$lang['Split_topic'] = "I�skirti �i� tem�";

$lang['Stop_watching_topic'] = "Nustoti sekti �i� tem�";
$lang['Start_watching_topic'] = "Sekti �ios temos atsakymus";
$lang['No_longer_watching'] = "J�s daugiau nesekate �ios temos";
$lang['You_are_watching'] = "J�s dabar sekate �i� tem�";

$lang['Total_votes'] = "I� viso balsavim�";

//
// Posting/Replying (Not private messaging!)
//
$lang['Message_body'] = "Prane�imo turinys";
$lang['Topic_review'] = "Temos ap�valga";

$lang['No_post_mode'] = "K� j�s darote?"; // If posting.php is called without a mode (newtopic/reply/delete/etc, shouldn't be shown normaly)

$lang['Post_a_new_topic'] = "Ra�yti nauj� tem�";
$lang['Post_a_reply'] = "Ra�yti atsakym�";
$lang['Post_topic_as'] = "Ra�yti tem� kaip";
$lang['Edit_Post'] = "Redaguoti prane�im�";
$lang['Options'] = "Nustatymai";

$lang['Post_Announcement'] = "Anonsas(ai)";
$lang['Post_Sticky'] = "Lipnus";
$lang['Post_Normal'] = "Normalus";

$lang['Confirm_delete'] = "Ar tikrai norite i�trinti �� prane�im� ar tem�?";
$lang['Confirm_delete_poll'] = "Ar tikrai norite i�trinti �i� apklaus�?";

$lang['Flood_Error'] = "J�s negalite ra�yti naujo prane�imo i� karto po paskutinio, pra�ome pabandyti �iek tiek v�liau";
$lang['Empty_subject'] = "J�s turite �vesti apra�ym�, jei norite para�yti nauj� tem� ar prane�im�";
$lang['Empty_message'] = "J�s turite ka�k� �ra�yti";
$lang['Forum_locked'] = "�is forumas u�darytas, J�s negalite ra�yti, atsakyti ir redaguoti temos";
$lang['Topic_locked'] = "�i tema u�daryta, J�s negalite redaguoti prane�im� ir ra�yti atsakym�";
$lang['No_post_id'] = "J�s turite pasirinkti prane�im� redagavimui";
$lang['No_topic_id'] = "J�s turite pasirinkti tem� atsakymui";
$lang['No_valid_mode'] = "J�s galite tik ra�yti, atsakyti, redaguoti arba cituoti prane�imus. Pra�ome gr��ti atgal ir pabandyti dar kart�";
$lang['No_such_post'] = "N�ra tokio prane�imo, pra�ome gr��ti atgal ir pabandyti dar kart�";
$lang['Edit_own_posts'] = "Atsipra�ome, bet J�s galite redaguoti tik savo prane�imus";
$lang['Delete_own_posts'] = "Atsipra�ome, bet J�s galite i�trinti tik savo prane�imus";
$lang['Cannot_delete_replied'] = "Atsipra�ome, bet J�s negalite i�trinti prane�im�, � kurios atsakote";
$lang['Cannot_delete_poll'] = "Atsipra�ome, bet J�s negalite i�trinti aktyvios apklausos";
$lang['Empty_poll_title'] = "J�s turite �vesti apklausos pavadinim�";
$lang['To_few_poll_options'] = "J�s turite �vesti nors du apklausos parametrus";
$lang['To_many_poll_options'] = "J�s nurod�te per daug apklausos parametr�";
$lang['Post_has_no_poll'] = "�is prane�imas neturi apklausos";
$lang['Already_voted'] = "J�s jau balsavote";
$lang['No_vote_option'] = "Prie� balduodami turite pasirinkti punkt� u� kur� balsuojate";


$lang['Add_poll'] = "Prid�ti apklaus�";
$lang['Add_poll_explain'] = "Jeigu J�s nenorite prijungti apklausos prie savo temos, palikite �iuos laukus neu�pildytus";
$lang['Poll_question'] = "Apklausos klausimas";
$lang['Poll_option'] = "Apklausos parametras";
$lang['Add_option'] = "Prid�ti parametr�";
$lang['Update'] = "Atnaujinti";
$lang['Delete'] = "I�trinti";
$lang['Poll_for'] = "Paleisti apklaus�";
$lang['Days'] = "Dien�"; // This is used for the Run poll for ... Days + in admin_forums for pruning
$lang['Poll_for_explain'] = "[ �veskite 0 arba palikite tu��ia niekada nesibaigian�iai apklausai ]";
$lang['Delete_poll'] = "I�trinti apklaus�";

$lang['Disable_HTML_post'] = "U�drausti HTML �iame prane�ime";
$lang['Disable_BBCode_post'] = "U�drausti BBKod� �iame prane�ime";
$lang['Disable_Smilies_post'] = "U�drausti �ypsen�les �iame prane�ime";

$lang['HTML_is_ON'] = "HTML yra <u>�JUNGTAS</u>";
$lang['HTML_is_OFF'] = "HTML yra <u>I�JUNGTAS</u>";
$lang['BBCode_is_ON'] = "BBKodas yra <u>�JUNGTAS</u>"; // %s are replaced with URI pointing to FAQ
$lang['BBCode_is_OFF'] = "BBKodas yra <u>I�JUNGTAS</u>";
$lang['Smilies_are_ON'] = "�ypsenel�s yra <u>�JUNGTI</u>";
$lang['Smilies_are_OFF'] = "�ypsenel�s yra <u>I�JUNGTI</u>";

$lang['Attach_signature'] = "Prid�ti para�� (para�ai redaguojami apra�yme)";
$lang['Notify'] = "Persp�ti, kai atsakymas bus para�ytas";
$lang['Delete_post'] = "I�trinti �� prane�im�";

$lang['Stored'] = "J�s� prane�imas buvo s�kmingai �d�tas";
$lang['Deleted'] = "J�s� prane�imas buvo s�kmingai i�trintas";
$lang['Poll_delete'] = "J�s� apklausa buvo s�kmingai i�trinta";
$lang['Vote_cast'] = "J�s� balsas �skai�iuotas";

$lang['Topic_reply_notification'] = "Atsakymo persp�jimas";

$lang['bbcode_b_help'] = "Pary�kintas (bold) tekstas: [b]tekstas[/b]  (alt+b)";
$lang['bbcode_i_help'] = "Pasvir�s (italic) tekstas: [i]tekstas[/i]  (alt+i)";
$lang['bbcode_u_help'] = "Pabrauktas (underline) tekstas: [u]tekstas[/u]  (alt+u)";
$lang['bbcode_q_help'] = "Cituotas tekstas: [quote]tekstas[/quote]  (alt+q)";
$lang['bbcode_c_help'] = "Kodo rodymas: [code]kodas[/code]  (alt+c)";
$lang['bbcode_l_help'] = "S�ra�as: [list]tekstas[/list] (alt+l)";
$lang['bbcode_o_help'] = "Sur��iuotas s�ra�as: [list=]tekstas[/list]  (alt+o)";
$lang['bbcode_p_help'] = "�d�ti paveiksliuk�: [img]http://www.vieta_iki_paveiksliuko[/img]  (alt+p)";
$lang['bbcode_w_help'] = "�d�ti URL: [url]http://url[/url] arba [url=http://url]URL tekstas[/url]  (alt+w)";
$lang['bbcode_a_help'] = "U�daryti visas atidarytas BBKodo �ymes (tag)";
$lang['bbcode_s_help'] = "Teksto spalva: [color=red]tekstas[/color]  Patarimas: j�s galite naudoti color=#FF0000";
$lang['bbcode_f_help'] = "Teksto dydis: [size=x-small]ma�as tekstas[/size]";

$lang['Emoticons'] = "�ypsen�l�s";
$lang['More_emoticons'] = "Rodyti daugiau �ypsen�li�";

$lang['Font_color'] = "�rifto spalva";
$lang['color_default'] = "Pradin�";
$lang['color_dark_red'] = "Tamsiai raudona";
$lang['color_red'] = "Raudona";
$lang['color_orange'] = "Oran�in�";
$lang['color_brown'] = "Ruda";
$lang['color_yellow'] = "Geltona";
$lang['color_green'] = "�alia";
$lang['color_olive'] = "Alyvin�";
$lang['color_cyan'] = "�viesiai m�lyna";
$lang['color_blue'] = "M�lyna";
$lang['color_dark_blue'] = "Tamsiai m�lyna";
$lang['color_indigo'] = "Indigo";
$lang['color_violet'] = "Violetin�";
$lang['color_white'] = "Balta";
$lang['color_black'] = "Juoda";

$lang['Font_size'] = "�rifto dydis";
$lang['font_tiny'] = "Smulkus";
$lang['font_small'] = "Ma�as";
$lang['font_normal'] = "Normalus";
$lang['font_large'] = "Didelis";
$lang['font_huge'] = "Mil�ini�kas";

$lang['Close_Tags'] = "U�daryti �ymenis (tags)";
$lang['Styles_tip'] = "Patarimas: stiliai gali b�ti greitai pritaikyti pa�ym�tam tekstui";


//
// Private Messaging
//
$lang['Private_Messaging'] = "Asmeninis susira�in�jimas";

$lang['Login_check_pm'] = "Tikrinti asmeninius prane�imus";
$lang['New_pms'] = "J�s turite nauj� prane�im� [ %d ]"; // You have 2 new messages
$lang['New_pm'] = "J�s turite nauj� prane�im� [ %d ]"; // You have 1 new message
$lang['No_new_pm'] = "J�s neturite nauj� prane�im�";
$lang['Unread_pms'] = "J�s turite neperskaityt� prane�im� %d";
$lang['Unread_pm'] = "J�s turite neperskaityt� prane�im� %d";
$lang['No_unread_pm'] = "J�s neturite neperskaityt� prane�im�";
$lang['You_new_pm'] = "Naujas asmeninis prane�imas laukia j�s� d��ut�je";
$lang['You_new_pms'] = "Nauji asmeniniai prane�imai laukia j�s� d��ut�je";
$lang['You_no_new_pm'] = "N�ra nauj� asmenini� prane�im�";

$lang['Unread_message'] = 'Neperskaityta �inut�';
$lang['Read_message'] = 'Perskaityta �inut�';

$lang['Read_pm'] = 'Skaityti �inut�';
$lang['Post_new_pm'] = 'Si�sti �inut�';
$lang['Post_reply_pm'] = 'Atsakyti � �inut�';
$lang['Post_quote_pm'] = 'Cituoti �inut�';
$lang['Edit_pm'] = 'Redaguoti �inut�';

$lang['Inbox'] = "Inbox";
$lang['Outbox'] = "Outbox";
$lang['Savebox'] = "Savebox";
$lang['Sentbox'] = "Sentbox";
$lang['Flag'] = "";
$lang['Subject'] = "Atsakymo tema";
$lang['From'] = "Nuo";
$lang['To'] = "Kam";
$lang['Date'] = "Data";
$lang['Mark'] = "Pa�ym�ti";
$lang['Sent'] = "I�si�sta";
$lang['Saved'] = "I�saugota";
$lang['Delete_marked'] = "I�trinti pa�ym�tus";
$lang['Delete_all'] = "I�trinti visus";
$lang['Save_marked'] = "I�saugoti pa�ym�tus";
$lang['Save_message'] = "I�saugoti prane�im�";
$lang['Delete_message'] = "I�trinti prane�im�";

$lang['Display_messages'] = "Rodyti prane�imus nuo ankstesnio"; // Followed by number of days/weeks/months
$lang['All_Messages'] = "Visi prane�imai";

$lang['No_messages_folder'] = "J�s neturite prane�im� �iame kataloge";

$lang['PM_disabled'] = "Asmeninis susira�in�jimas u�draustas �iame skyriuje";
$lang['Cannot_send_privmsg'] = "Atsipra�ome, bet administratorius u�draud� jums per�i�r�ti asmeninius prane�imus";
$lang['No_to_user'] = "J�s ne�ved�te vartotojo vardo, kuriam skirta �i �inut�";
$lang['No_such_user'] = "Atsipra�ome, bet toks vartotojas neegzistuoja";

$lang['Disable_HTML_pm'] = "U�drausti HTML �iam prane�imui";
$lang['Disable_BBCode_pm'] = "U�drausti BBKod� �iam prane�imui";
$lang['Disable_Smilies_pm'] = "U�drausti �ypsen�les �iam prane�imui";

$lang['Message_sent'] = "J�s� prane�imas i�si�stas";

$lang['Click_return_inbox'] = "Spauskite %s�ia%s, nor�dami gr��ti � d��ut�";
$lang['Click_return_index'] = "Spauskite %s�ia%s, nor�dami gr��ti � pagrindin� puslap�";

$lang['Send_a_new_message'] = "Si�sti nauj� asmenin� prane�im�";
$lang['Send_a_reply'] = "Atsakyti � asmenin� prane�im�";
$lang['Edit_message'] = "Redaguoti asmenin� prane�im�";

$lang['Notification_subject'] = "At�jo naujas asmeninis prane�imas";

$lang['Find_username'] = "Ie�koti vartotojo vardo";
$lang['Find'] = "Ie�koti";
$lang['No_match'] = "Nieko nerasta";

$lang['No_post_id'] = "Nebuvo nurodytas prane�imo ID";
$lang['No_such_folder'] = "Toks katalogas neegzistuoja";
$lang['No_folder'] = "Nenurodytas katalogas";

$lang['Mark_all'] = "Pa�ym�ti visk�";
$lang['Unmark_all'] = "Nepa�ym�ti nieko";

$lang['Confirm_delete_pm'] = "Ar tikrai norite i�trinti �� prane�im� ?";
$lang['Confirm_delete_pms'] = "Ar tikrai norite i�trinti �iuos prane�imus ?";

$lang['Inbox_size'] = "J�s� Inbox yra %d%% u�pildytas"; // eg. Your Inbox is 50% full
$lang['Sentbox_size'] = "J�s� Sentbox yra %d%% u�pildytas";
$lang['Savebox_size'] = "J�s� Savebox yra %d%% u�pildytas";

$lang['Click_view_privmsg'] = "Spauskite %s�ia%s, jei norite pereiti prie Inbox";


//
// Profiles/Registration
//
$lang['Viewing_user_profile'] = "Apra�ymo per�i�ra :: %s"; // %s is username
$lang['About_user'] = "Viskas apie %s"; // %s is username

$lang['Preferences'] = "Nustatymai";
$lang['Items_required'] = "Laukus pa�ym�tus * b�tina u�pildyti";
$lang['Registration_info'] = "Registracijos informacija";
$lang['Profile_info'] = "Apra�ymo informacija";
$lang['Profile_info_warn'] = "�i� informacij� galima per�i�r�ti";
$lang['Avatar_panel'] = "Avataro valdymo pultas";
$lang['Avatar_gallery'] = "Avataro galerija";

$lang['Website'] = "Interneto svetain�";
$lang['Location'] = "Miestas";
$lang['Contact'] = "Kontaktai";
$lang['Email_address'] = "El. pa�to adresas";
$lang['Email'] = "El. pa�tas";
$lang['Send_private_message'] = "Si�sti asmenin� prane�im�";
$lang['Hidden_email'] = "[ U�slaptinta ]";
$lang['Search_user_posts'] = "Ie�koti �io vartotojo prane�im�";
$lang['Interests'] = "Interesai";
$lang['Occupation'] = "Pareigos";
$lang['Poster_rank'] = "Vartotojo rangas";

$lang['Total_posts'] = "I� viso prane�im�";
$lang['User_post_pct_stats'] = "i� viso %.2f%%"; // 1.25% of total
$lang['User_post_day_stats'] = "%.2f prane�im� per dien�"; // 1.5 posts per day
$lang['Search_user_posts'] = "Ie�koti vis� vartotojo %s prane�im�"; // Find all posts by username

$lang['No_user_id_specified'] = "Atsipra�ome, bet toks vartotojo vardas neegzistuoja";
$lang['Wrong_Profile'] = "J�s negalite redaguoti svetimo apra�ymo";

$lang['Only_one_avatar'] = "Tik vienas avataro tipas gali b�ti nurodytas";
$lang['File_no_data'] = "Failas j�s� pateiktu URL adresu neturi joki� duomen�";
$lang['No_connection_URL'] = "Negalima prisijungti j�s� nurodytu URL adresu";
$lang['Incomplete_URL'] = "URL adresas, kur� j�s �ved�te, nebaigtas";
$lang['Wrong_remote_avatar_format'] = "URL avataro adresas, kur� j�s �ved�te, negalioja";
$lang['No_send_account_inactive'] = "Atsipra�ome, bet j�s� slapta�odis nerastas, nes j�s� apra�ymas neaktyvuotas. Pra�ome kreiptis � forumo administratori�.";

$lang['Always_smile'] = "Visada �jungti �ypsen�les";
$lang['Always_html'] = "Visada �jungti HTML";
$lang['Always_bbcode'] = "Visada �jungti BBKod�";
$lang['Always_add_sig'] = "Visada prid�ti mano para��";
$lang['Always_notify'] = "Visada persp�ti mane apie atsakymus";
$lang['Always_notify_explain'] = "Jeigu � j�s� prane�im� bus atsakyta, sistema i�si�s jums lai�k�. Tai galima keisti, kai ra�ote prane�im�";

$lang['Board_style'] = "Lentos stilius";
$lang['Board_lang'] = "Lentos kalba";
$lang['No_themes'] = "Duomen� baz�je nerasta joki� stili�.";
$lang['Timezone'] = "Laiko juosta";
$lang['Date_format'] = "Datos formatas";
$lang['Date_format_explain'] = "Naudojama sintaks� identi�ka PHP funkcijai <a href=\"http://www.php.net/date\" target=\"_other\">date()</a>";
$lang['Signature'] = "Para�as";
$lang['Signature_explain'] = "�� teksto blok� j�s galite prid�ti prie savo prane�im�. Yra %d simboli� limitas";
$lang['Public_view_email'] = "Visada rodyti mano el. pa�to adres�";

$lang['Current_password'] = "Dabartinis slapta�odis";
$lang['New_password'] = "Naujas slapta�odis";
$lang['Confirm_password'] = "Patvirtinti slapta�od�";
$lang['Confirm_password_explain'] = "J�s turite patvirtinti dabartin� slapta�od�, jei nor�site j� keisti arba keisti savo el. pa�to adres�";
$lang['password_if_changed'] = "Jums reikia nurodyti slapta�od�, jeigu norite j� pakeisti";
$lang['password_confirm_if_changed'] = "Jums reikia patvirtinti slapta�od�, jeigu j� pakeit�te vir�uje";

$lang['Avatar'] = "Avataras";
$lang['Avatar_explain'] = "Rodo nedidel� paveiksliuk� j�s� prane�im� apa�ioje. Tik vienas paveiksliukas gali b�ti rodomas vien� kart�, jo plotis negali vir�yti %d ta�k�, auk�tis negali vir�yti %d ta�k�. Failo dydis negali vir�yti %dkB."; $lang['Upload_Avatar_file'] = "Nusi�sti Avataro fail� i� savo kompiuterio";
$lang['Upload_Avatar_URL'] = "Nusi�sti Avataro fail� i� URL";
$lang['Upload_Avatar_URL_explain'] = "�veskite URL, kur yra j�s� Avataro paveiksliukas. Jis bus nukopijuotas �iame tinklapyje.";
$lang['Pick_local_Avatar'] = "Pasirinkti Avataro paveiksliuk� i� galerijos";
$lang['Link_remote_Avatar'] = "URL iki nutolusio Avataro";
$lang['Link_remote_Avatar_explain'] = "�veskite puslapio, kurio Avataro paveiksliuk� j�s norite susieti, URL adres�.";
$lang['Avatar_URL'] = "Avataro paveiksliuko URL";
$lang['Select_from_gallery'] = "Pasirinkti Avatar� i� galerijos";
$lang['View_avatar_gallery'] = "Rodyti galerij�";

$lang['Select_avatar'] = "Pasirinkti Avatar�";
$lang['Return_profile'] = "At�aukti Avatar�";
$lang['Select_category'] = "Pasirinkti kategorij�";

$lang['Delete_Image'] = "I�trinti paveiksliuk�";
$lang['Current_Image'] = "Dabartinis paveiksliukas";

$lang['Notify_on_privmsg'] = "Persp�ti apie nauj� asmenin� prane�im�";
$lang['Popup_on_privmsg'] = "I��okantis langas apie nauj� asmenin� prane�im�";
$lang['Popup_on_privmsg_explain'] = "Kai kurie trafaretai (templates) atidarys nauj� lang�, kad informuot� jus apie nauj� asmenin� prane�im�";
$lang['Hide_user'] = "Pasl�pti j�s� status�";

$lang['Profile_updated'] = "J�s� apra�ymas atnaujintas";
$lang['Profile_updated_inactive'] = "J�s� apra�ymas atnaujintas. J�s pakeit�te svarbius parametrus, tod�l j�s� apra�ymas dabar dezaktyvotas. Patikrinkite savo el. pa�to d��ut� su prane�imu apie aktyvavim�. Jeigu reikia administratoriaus aktyvavimo, laukite, kol administratorius aktyvuos.";

$lang['Password_mismatch'] = "J�s� �vesti slapta�od�iai nesutapo";
$lang['Current_password_mismatch'] = "Dabartinis j�s� �vestas slapta�odis nesutampa su slapta�od�iu i� duomen� baz�s";
$lang['Password_long'] = "J�s� slapta�od� turi sudaryti ne daugiau kaip 32 simboliai";
$lang['Username_taken'] = "Atsipra�ome, toks vartotojo vardas jau egzistuoja.";
$lang['Username_invalid'] = "Atsipra�ome, bet �iame vartotojo varde yra draud�iamas simbolis, pvz., \"";
$lang['Username_disallowed'] = "Atsipra�ome, bet toks vartotojo vardas buvo u�draustas";
$lang['Email_taken'] = "Atsipra�ome, bet toks el. pa�to adresas jau u�registruotas";
$lang['Email_banned'] = "Atsipra�ome, bet �is el. pa�to adresas buvo u�draustas (banned)";
$lang['Email_invalid'] = "Atsipra�ome, bet toks el. pa�to adresas neleistinas";
$lang['Signature_too_long'] = "J�s� para�as per ilgas";
$lang['Fields_empty'] = "J�s turite u�pildyti reikalaujamus laukus";
$lang['Avatar_filetype'] = "Avataro failo tipas turi b�ti .jpg, .gif arba .png";
$lang['Avatar_filesize'] = "Avataro paveiksliuko failo dydis turi b�ti ma�esnis negu %d kB"; // The avatar image file size must be less than 6 kB
$lang['Avatar_imagesize'] = "Avataras turi b�ti ma�esnis negu %d ta�k� plo�io ir %d ta�k� auk��io";

$lang['Welcome_subject'] = "Sveiki atvyk� � %s Forumus"; // Welcome to my.com forums
$lang['New_account_subject'] = "Naujo vartotojo apra�ymas";
$lang['Account_activated_subject'] = "Apra�ymas aktyvuotas";

$lang['Account_added'] = "A�i�, kad u�siregistravote. J�s� apra�ymas sukurtas. Dabar galite �eiti su savo vartotojo vardu ir slapta�od�iu";
$lang['Account_inactive'] = "J�s� apra�ymas sukurtas. �is forumas reikalauja apra�ymo aktyvavimo. Aktyvavimo raktas buvo i�si�stas el. pa�to adresu, kur� nurod�te. Pra�ome patikrinti savo el. pa�to d��ut�";
$lang['Account_inactive_admin'] = "J�s� apra�ymas sukurtas. �is forumas reikalauja apra�ym� aktyvuoti administratoriui. El. lai�kas jam buvo i�si�stas. J�s b�site informuotas, kada apra�ymas bus aktyvuotas";
$lang['Account_active'] = "J�s� apra�ymas aktyvuotas. A�i� u� registracij�";
$lang['Account_active_admin'] = "Apra�ymas aktyvuotas";
$lang['Reactivate'] = "Reaktyvuokite savo apra�ym�!";
$lang['Already_activated'] = "J�s jau aktyvavote savo apra�ym�";
$lang['COPPA'] = "J�s� apra�ymas aktyvuotas, bet turi b�ti dar patvirtintas. Daugiau informacijos rasite savo el. pa�to d��ut�je.";

$lang['Registration'] = "Registracijos s�lygos";
$lang['Reg_agreement'] = "�i� diskusij� administratoriai ir moderatoriai visais b�dais stengiasi pa�alinti netinkamas �inutes, ta�iau ne�manoma pa�alinti ir per�i�r�ti vis� �inu�i�, tod�l j�s turite suprasti, kad visos �inut�s �iuose forumuose yra j� autori�, o ne administratori� ar moderatori� nuomon� ir pa�i�ros (i�skyrus �i� �moni� �inutes). Taigi administratoriai ir/arba moderatoriai negali b�ti atsakingi u� j� turin�. <br /><br />J�s sutinkate nera�yti ��eid�ian�i�, ne�vanki�, vulgari�, �mei�ian�i�, grasinan�i� ir kitoki� vietinius �statymus pa�eid�ian�i� �inu�i�. Prie�ingu atveju tuojau pat b�site blokuotas (banned) ir apie tai prane�ta j�s� Interneto tiek�jui. Vis� �inu�i� IP adresas yra �ra�omas � duomen� baz�. J�s sutinkate, kad administratoriai ir/arba moderatoriai turi teis� i�trinti, redaguoti, perkelti arba u�daryti betkuri� tem�/�inut�, jeigu jie mato tai reikalinga. Kaip vartotojas sutinkate su tuo, kad bet kokia j�s� �vesta informacija b�t� saugoma duomen� baz�je. �i informacija nebus suteikta jokioms tre�ioms �alims, ta�iau administratoriai ir/arba moderatoriai negali u�tikrinti visi�ko informacijos saugumo.<br /><br />�i diskusij� lenta naudoja sausain�lius (cookies). Juose nesaugoma jokia j�s� �vesta informacija. Sausain�liai naudojami tik kaip pagalbin� dizaino ir strukt�ros priemon� suteikdami jums patogumo. J�s� el. pa�to adresas naudojamas tik patvirtinti j�s� registracijos detales (taip pat atsi�sti jums nauj� slapta�od�, jeigu kartais u�mir�ote esam�).";

$lang['Agree_under_13'] = "Sutinku su �iomis s�lygomis, man <b>ma�iau</b> nei 13 met�";
$lang['Agree_over_13'] = "Sutinku su �iomis s�lygomis, man <b>vir�</b> 13 met�";
$lang['Agree_not'] = "Nesutinku su s�lygomis";

$lang['Wrong_activation'] = "Aktyvavimo raktas, kur� j�s pateik�te, neatitinka jokio rakto m�s� duomen� baz�je";
$lang['Send_password'] = "I�si�sti nauj� slapta�od�";
$lang['Password_updated'] = "Naujas slapta�odis sukurtas, savo el. pa�to d��ut�je rasite lai�k� su informacija apie aktyvavim�";
$lang['No_email_match'] = "J�s� nurodytas el. pa�to adresas neatitinka �io vartotojo";
$lang['New_password_activation'] = "Naujo slapta�od�io aktyvavimas";
$lang['Password_activated'] = "J�s� apra�ymas buvo aktyvuotas. �eidami naudokit�s slapta�od�iu, kur� gavote el. pa�tu";

$lang['Send_email_msg'] = "Nusi�sti prane�im� el. pa�tu";
$lang['No_user_specified'] = "Nenurodytas vartotojas";
$lang['User_prevent_email'] = "�is vartotojas nenori gauti el. pa�to �inu�i�. Pabandykite nusi�sti jam asmenin� prane�im�";
$lang['User_not_exist'] = "Toks vartotojas neegzistuoja";
$lang['CC_email'] = "Nusi�sti sau �ios el. pa�to �inut�s kopij�";
$lang['Email_message_desc'] = "�is prane�imas bus i�si�stas kaip paprastas tekstas, nera�ykite jame joki� HTML ar BBKod�.";
$lang['Flood_email_limit'] = "J�s negalite �iuo metu i�si�sti dar vienos el. �inut�s, pabandykite v�liau";
$lang['Recipient'] = "Gav�jas";
$lang['Email_sent'] = "El. lai�kas i�si�stas";
$lang['Send_email'] = "Si�sti el. lai�k�";
$lang['Empty_subject_email'] = "Nurodykite lai�ko tem�";
$lang['Empty_message_email'] = "Para�ykite lai�k�";


//
// Memberslist
//
$lang['Select_sort_method'] = "Pasirinkite r��iavimo metod�";
$lang['Sort'] = "R��iuoti";
$lang['Sort_Top_Ten'] = "Aktyviausi�j� de�imtukas";
$lang['Sort_Joined'] = "�stojimo data";
$lang['Sort_Username'] = "Vartotojo vardas";
$lang['Sort_Location'] = "Vieta";
$lang['Sort_Posts'] = "Prane�im� skai�ius";
$lang['Sort_Email'] = "El. pa�tas";
$lang['Sort_Website'] = "Tinklapis";
$lang['Sort_Ascending'] = "Did�jimo tvarka";
$lang['Sort_Descending'] = "Ma��jimo tvarka";
$lang['Order'] = "Tvarka";


//
// Group control panel
//
$lang['Group_Control_Panel'] = "Grup�s valdymo forma";
$lang['Group_member_details'] = "Grup�s nari� detal�s";
$lang['Group_member_join'] = "Prisijungti prie grup�s";

$lang['Group_Information'] = "Grup�s informacija";
$lang['Group_name'] = "Grup�s pavadinimas";
$lang['Group_description'] = "Grup�s apra�ymas";
$lang['Group_membership'] = "Naryst� grup�je";
$lang['Group_Members'] = "Grup�s nariai";
$lang['Group_Moderator'] = "Grup�s moderatorius";
$lang['Pending_members'] = "Laukiami nariai";

$lang['Group_type'] = "Grup�s tipas";
$lang['Group_open'] = "Atidaryta grup�";
$lang['Group_closed'] = "U�daryta grup�";
$lang['Group_hidden'] = "Slapta grup�";

$lang['Current_memberships'] = "Dabartiniai nariai";
$lang['Non_member_groups'] = "Ne nariai";
$lang['Memberships_pending'] = "Naryst�s laukia";

$lang['No_groups_exist'] = "Grup�s neegzistuoja";
$lang['Group_not_exist'] = "Tokios vartotoj� grup�s neegzistuoja";

$lang['Join_group'] = "Prisijungti prie grup�s";
$lang['No_group_members'] = "�i grup� neturi nari�";
$lang['Group_hidden_members'] = "�i grup� yra slapta, j�s negalite matyti jos nari�";
$lang['No_pending_group_members'] = "�i grup� neturi laukian�i� nari�";
$lang["Group_joined"] = "J�s s�kmingai prisijung�te prie �ios grup�s<br />Jums bus prane�ta, kada j�s� �stojim� patvirtins grup�s moderatorius";
$lang['Group_request'] = "Gavome u�klaus� d�l prisijungimo prie j�s� grup�s";
$lang['Group_approved'] = "J�s� u�klausa buvo patvirtinta";
$lang['Group_added'] = "J�s buvote prijungtas prie �ios grup�s";
$lang['Already_member_group'] = "J�s jau esate �ios grup�s narys";
$lang['User_is_member_group'] = "Vartotojas jau yra �ios grup�s narys";
$lang['Group_type_updated'] = "Grup�s tipas s�kmingai atnaujintas";

$lang['Could_not_add_user'] = "J�s� pasirinktas vartotojas neegzistuoja";
$lang['Could_not_anon_user'] = "J�s negalite padaryti Anonimo grup�s nariu";

$lang['Confirm_unsub'] = "Ar tikrai norite anuliuoti savo �stojim�?";
$lang['Confirm_unsub_pending'] = "J�s� �stojimas � �i� grup� dar nebuvo patvirtintas. Ar tikrai norite anuliuoti savo �stojim�?";

$lang['Unsub_success'] = "J�s buvote i�brauktas i� �ios grup�s.";

$lang['Approve_selected'] = "Patvirtinimas pasirinktas";
$lang['Deny_selected'] = "U�draudimas pasirinktas";
$lang['Not_logged_in'] = "�ra�ykite savo vard� bei slapta�od�, jei norite prisijungti prie grup�s.";
$lang['Remove_selected'] = "I�trinti pasirinkt�";
$lang['Add_member'] = "Prid�ti nar�";
$lang['Not_group_moderator'] = "J�s nesate �ios grup�s moderatorius, tod�l negalite atlikti �io veiksmo.";

$lang['Login_to_join'] = "�ra�ykite savo vard� bei slapta�od�, kad gal�tum�te prijungti arba redaguoti grup�s narius";
$lang['This_open_group'] = "Tai atvira grup�. Tapkite nariu";
$lang['This_closed_group'] = "Tai u�dara grup�. Vartotojai nepriimami";
$lang['This_hidden_group'] = "Tai slapta grup�. Draud�iama automati�kai prisijungti vartotojams";
$lang['Member_this_group'] = "J�s esate �ios grup�s narys";
$lang['Pending_this_group'] = "Your membership of this group is pending";
$lang['Are_group_moderator'] = "J�s esate �ios grup�s moderatorius";
$lang['None'] = "None";

$lang['Subscribe'] = "Prisijungti";
$lang['Unsubscribe'] = "I�sijungti";
$lang['View_Information'] = "Rodyti informacij�";


//
// Search
//
$lang['Search_query'] = "Paie�kos u�klausa";
$lang['Search_options'] = "Paie�kos parametrai";

$lang['Search_keywords'] = "Ie�koti raktini� �od�i�";
$lang['Search_keywords_explain'] = "Galite naudoti <u>AND</u>, nor�dami apib�dinti �od�ius, kurie privalo b�ti rezultate. Taip pat galite naudoti <u>OR</u>, nor�dami apib�dinti �od�ius kurie gali b�ti rezultate. Galite naudoti ir <u>NOT</u>. Juo apib�dinsite �od�ius kuri� netur�t� b�ti paie�kos rezultatuose. Simboliu * galima apibr��ti dalines reik�mes.";
$lang['Search_author'] = "Ie�koti autoriaus";
$lang['Search_author_explain'] = "Naudokite * dalin�ms reik�m�ms rasti";

$lang['Search_for_any'] = "Ie�koti termin� arba naudoti u�klaus�";
$lang['Search_for_all'] = "Ie�koti vis� tem�";
$lang['Search_title_msg'] = "Ie�koti temos pavadinimo ir �inut�s teksto";
$lang['Search_msg_only'] = "Ie�koti �inut�s teksto";

$lang['Return_first'] = "Pirmiausia gr��kite"; // followed by xxx characters in a select box
$lang['characters_posts'] = "Prane�im� simboliai";

$lang['Search_previous'] = "Ie�koti ankstesnio"; // followed by days, weeks, months, year, all in a select box

$lang['Sort_by'] = "R��iuoti pagal";
$lang['Sort_Time'] = "Prane�imo laikas";
$lang['Sort_Post_Subject'] = "Prane�imo pavadinimas";
$lang['Sort_Topic_Title'] = "Temos pavadinimas";
$lang['Sort_Author'] = "Autorius";
$lang['Sort_Forum'] = "Forumas";

$lang['Display_results'] = "Rodyti rezultatus kaip";
$lang['All_available'] = "Visus leistinus";
$lang['No_searchable_forums'] = "J�s neturite teis�s ie�koti forum� �iame puslapyje";

$lang['No_search_match'] = "Joki� tem� arba prane�im� pagal j�s� u�klaus� nerasta";
$lang['Found_search_match'] = "Buvo rasta %d rezultatas"; // eg. Search found 1 match
$lang['Found_search_matches'] = "Buvo rasta %d rezultat�"; // eg. Search found 24 matches

$lang['Close_window'] = "U�daryti lang�";


//
// Auth related entries
//
// Note the %s will be replaced with one of the following 'user' arrays
$lang['Sorry_auth_announce'] = "Atsipra�ome, bet tik %s gali ra�yti anonsus �iame forume";
$lang['Sorry_auth_sticky'] = "Atsipra�ome, bet tik %s gali ra�yti lipnius prane�imus �iame forume";
$lang['Sorry_auth_read'] = "Atsipra�ome, bet tik %s gali skaityti temas �iame forume";
$lang['Sorry_auth_post'] = "Atsipra�ome, bet tik %s gali kurti temas �iame forume";
$lang['Sorry_auth_reply'] = "Atsipra�ome, bet tik %s gali atsakyti � prane�imus �iame forume";
$lang['Sorry_auth_edit'] = "Atsipra�ome, bet tik %s gali redaguoti prane�imus �iame forume";
$lang['Sorry_auth_delete'] = "Atsipra�ome, bet tik %s gali trinti prane�imus �iame forume";
$lang['Sorry_auth_vote'] = "Atsipra�ome, bet tik %s gali balsuoti apklausose �iame forume";

// These replace the %s in the above strings
$lang['Auth_Anonymous_Users'] = "<b>anonimi�ki vartotojai</b>";
$lang['Auth_Registered_Users'] = "<b>registruoti vartotojai</b>";
$lang['Auth_Users_granted_access'] = "<b>vartotojai, turintys special� pri�jim�</b>";
$lang['Auth_Moderators'] = "<b>moderatoriai</b>";
$lang['Auth_Administrators'] = "<b>administratoriai</b>";

$lang['Not_Moderator'] = "J�s nesate �io forumo moderatorius";
$lang['Not_Authorised'] = "Neautorizuota";

$lang['You_been_banned'] = "J�s buvote pa�alintas i� �io forumo<br /> Jeigu norite gauti daugiau informacijos, pra�ome kreiptis � administratori�.";


//
// Viewonline
//
$lang['Reg_users_zero_online'] = "Dabar yra 0 registruot� vartotoj� ir "; // There ae 5 Registered and
$lang['Reg_users_online'] = "Dabar yra %d registruot� vartotoj� ir "; // There ae 5 Registered and
$lang['Reg_user_online'] = "Dabar yra %d registruot� vartotoj� ir "; // There ae 5 Registered and
$lang['Hidden_users_zero_online'] = "0 slapt� vartotoj�"; // 6 Hidden users online
$lang['Hidden_users_online'] = "%d slapt� vartotoj�"; // 6 Hidden users online
$lang['Hidden_user_online'] = "%d slapt� vartotoj�"; // 6 Hidden users online
$lang['Guest_users_online'] = "Dabar yra %d sve�i�"; // There are 10 Guest users online
$lang['Guest_users_zero_online'] = "Dabar yra 0 sve�i�"; // There are 10 Guest users online
$lang['Guest_user_online'] = "Dabar yra %d sve�ias"; // There is 1 Guest user online
$lang['No_users_browsing'] = "�iuo metu n�ra aktyvi� vartotoj�";

$lang['Online_explain'] = "�ie duomenys pateikti pagal pastar�j� 5 minu�i� forum� aktyvum�";

$lang['Forum_Location'] = "Forumas yra";
$lang['Last_updated'] = "Paskutin� kart� atnaujinta";

$lang['Forum_index'] = "Forumo pagrindinis puslapis";
$lang['Logging_on'] = "�eiti";
$lang['Posting_message'] = "Ra�yti prane�im�";
$lang['Searching_forums'] = "Forum� paie�ka";
$lang['Viewing_profile'] = "Apra�ymo per�i�ra";
$lang['Viewing_online'] = "�iuo metu forume";
$lang['Viewing_member_list'] = "Nari� s�ra�o per�i�ra";
$lang['Viewing_priv_msgs'] = "Asmenini� prane�im� per�i�ra";
$lang['Viewing_FAQ'] = "DUK per�i�ra";


//
// Moderator Control Panel
//
$lang['Mod_CP'] = "Moderatoriaus valdymo pultas";
$lang['Mod_CP_explain'] = "Naudodamiesi �ia forma, galite moderuoti forum�. Galite u�daryti, atidaryti, perkelti arba i�trinti bet kok� prane�im� skai�i�.";

$lang['Select'] = "Pasirinkti";
$lang['Delete'] = "I�trinti";
$lang['Move'] = "Perkelti";
$lang['Lock'] = "U�daryti";
$lang['Unlock'] = "Atidaryti";

$lang['Topics_Removed'] = "Pasirinkti prane�imai buvo s�kmingai i�trinti i� duomen� baz�s.";
$lang['Topics_Locked'] = "Pasirinktas prane�imas buvo u�darytas";
$lang['Topics_Moved'] = "Pasirinktas prane�imas buvo perkeltas";
$lang['Topics_Unlocked'] = "Pasirinktas prane�imas buvo atidarytas";
$lang['No_Topics_Moved'] = "Prane�imai nebuvo perkelti";

$lang['Confirm_delete_topic'] = "Ar tikrai norite i�trinti pasirinktus(-�) prane�imus/�?";
$lang['Confirm_lock_topic'] = "Ar tikrai norite u�daryti pasirinktus(-�) prane�imus/�?";
$lang['Confirm_unlock_topic'] = "Ar tikrai norite atidaryti pasirinktus(-�) prane�imus/�?";
$lang['Confirm_move_topic'] = "Ar tikrai norite perkelti pasirinktus(-�) prane�imus/�?";

$lang['Move_to_forum'] = "Perkelti � forum�";
$lang['Leave_shadow_topic'] = "Palikti temos �e��l� sename forume.";

$lang['Split_Topic'] = "Temos i�skyrimo valdymo forma";
$lang['Split_Topic_explain'] = "Naudodamiesi �ia forma galite skirstyti prane�imus � dvi dalis: individualius arba bendrus";
$lang['Split_title'] = "Naujas temos pavadinimas";
$lang['Split_forum'] = "Forumas naujai temai";
$lang['Split_posts'] = "I�skirti pasirinktus prane�imus";
$lang['Split_after'] = "I�skirti i� pasirinkto prane�imo";
$lang['Topic_split'] = "Pasirinktas prane�imas buvo s�kmingai i�skirtas";

$lang['Too_many_error'] = "J�s pasirinkote per daug prane�im�. Paskui gal�site pasirinkti tik vien� prane�im� i�skyrimui!";

$lang['None_selected'] = "J�s nepasirinkote n� vieno prane�imo �iai operacijai. Pra�ome gr��ti atgal ir pasirinkti bent vien�.";
$lang['New_forum'] = "Naujas forumas";

$lang['This_posts_IP'] = "�i� prane�im� IP";
$lang['Other_IP_this_user'] = "Kiti IP, i� kuri� �is vartotojas ra��";
$lang['Users_this_IP'] = "Vartotojai ra�� i� �i� IP";
$lang['IP_info'] = "IP informacija";
$lang['Lookup_IP'] = "Pasi�i�r�ti IP";


//
// Timezones ... for display on each page
//
$lang['All_times'] = "Visos datos yra %s"; // eg. All times are GMT - 12 Hours (times from next block)

$lang['-12'] = "GMT - 12 valand�";
$lang['-11'] = "GMT - 11 valand�";
$lang['-10'] = "HST (Havajai)";
$lang['-9'] = "GMT - 9 valandos";
$lang['-8'] = "PST (JAV/Kanada)";
$lang['-7'] = "MST (JAV/Kanada)";
$lang['-6'] = "CST (JAV/Kanada)";
$lang['-5'] = "EST (JAV/Kanada)";
$lang['-4'] = "GMT - 4 valandos";
$lang['-3.5'] = "GMT - 3,5 valandos";
$lang['-3'] = "GMT - 3 valandos";
$lang['-2'] = "GMT - 2 valandos";
$lang['-1'] = "GMT - 1 valanda";
$lang['0'] = "GMT";
$lang['1'] = "CET (Europa)";
$lang['2'] = "GMT + 2 valandos";
$lang['3'] = "GMT + 3 valandos";
$lang['3.5'] = "GMT + 3,5 valandos";
$lang['4'] = "GMT + 4 valandos";
$lang['4.5'] = "GMT + 4,5 valandos";
$lang['5'] = "GMT + 5 valandos";
$lang['5.5'] = "GMT + 5,5 valandos";
$lang['6'] = "GMT + 6 valandos";
$lang['6.5'] = "GMT + 6,5 valandos";
$lang['7'] = "GMT + 7 valandos";
$lang['8'] = "WST (Australija)";
$lang['9'] = "GMT + 9 valandos";
$lang['9.5'] = "CST (Australija)";
$lang['10'] = "EST (Australija)";
$lang['11'] = "GMT + 11 valand�";
$lang['12'] = "GMT + 12 valand�";

// These are displayed in the timezone select box
$lang['tz']['-12'] = "(GMT -12:00 valand�) Eniwetok, Kwajalein";
$lang['tz']['-11'] = "(GMT -11:00 valand�) Ramiojo vandenyno salos, Samoa";
$lang['tz']['-10'] = "(GMT -10:00 valand�) Havajai";
$lang['tz']['-9'] = "(GMT -9:00 valandos) Aliaska";
$lang['tz']['-8'] = "(GMT -8:00 valandos) Ramiojo vandenyno laikas (JAV ir Kanada), Tijuana";
$lang['tz']['-7'] = "(GMT -7:00 valandos) Kaln� laikas (JAV ir Kanada), Arizona";
$lang['tz']['-6'] = "(GMT -6:00 valandos) Centrinis laikas (JAV ir Kanada), Meksikas";
$lang['tz']['-5'] = "(GMT -5:00 valandos) Ryt� laikas (JAV ir Kanada), Bogota, Lima";
$lang['tz']['-4'] = "(GMT -4:00 valandos) Atlantinis laikas (Kanada), Karakasas, La Pazas";
$lang['tz']['-3.5'] = "(GMT -3:30 valandos) Niufaundlendas";
$lang['tz']['-3'] = "(GMT -3:00 valandos) Buenos Aires, D�ord�taunas, Folklendo salos";
$lang['tz']['-2'] = "(GMT -2:00 valandos) Vidurio Atlantas, �ventoji Elena";
$lang['tz']['-1'] = "(GMT -1:00 valanda) Azorai, Verd�io salos";
$lang['tz']['0'] = "(GMT) Kasablanka, Dublinas, Edinburgas, Londonas, Lisabona";
$lang['tz']['1'] = "(GMT +1:00 valanda) Amsterdamas, Berlynas, Briuselis, Madridas, Pary�ius, Roma";
$lang['tz']['2'] = "(GMT +2:00 valandos) Kairas, Helsinkis, Kaliningradas, Piet� Afrika, Vilnius";
$lang['tz']['3'] = "(GMT +3:00 valandos) Bagdadas, Maskva, Nairobis";
$lang['tz']['3.5'] = "(GMT +3:30 valandos) Teheranas";
$lang['tz']['4'] = "(GMT +4:00 valandos) Abu Dabis, Baku, Tbilisis";
$lang['tz']['4.5'] = "(GMT +4:30 valandos) Kabulas";
$lang['tz']['5'] = "(GMT +5:00 valandos) Jekaterinburgas, Islamabadas, Ta�kentas";
$lang['tz']['5.5'] = "(GMT +5:30 valandos) Bomb�jus, Kalkuta, Naujasis Delis";
$lang['tz']['6'] = "(GMT +6:00 valandos) Alma Ata, Kolombas, D�aka, Novosibirskas";
$lang['tz']['6.5'] = "(GMT +6:30 valandos) Rang�nas";
$lang['tz']['7'] = "(GMT +7:00 valandos) Bankokas, Hanojus, D�akarta";
$lang['tz']['8'] = "(GMT +8:00 valandos) Hong Kongas, Pertas, Singap�ras, Taip�jus";
$lang['tz']['9'] = "(GMT +9:00 valandos) Osaka, Seulas, Tokijas, Jakutskas";
$lang['tz']['9.5'] = "(GMT +9:30 valandos) Adelaid�, Darvinas";
$lang['tz']['10'] = "(GMT +10:00 valand�) Kanbera, Guama, Melburnas, Sidn�jus, Vladivostokas";
$lang['tz']['11'] = "(GMT +11:00 valand�) Magadanas, Naujoji Kaledonija, Solomono salos";
$lang['tz']['12'] = "(GMT +12:00 valand�) Ouklendas, Velingtonas, Fid�i, Mar�alo salos";

$lang['datetime']['Sunday'] = "Sekmadienis";
$lang['datetime']['Monday'] = "Pirmadienis";
$lang['datetime']['Tuesday'] = "Antradienis";
$lang['datetime']['Wednesday'] = "Tre�iadienis";
$lang['datetime']['Thursday'] = "Ketvirtadienis";
$lang['datetime']['Friday'] = "Penktadienis";
$lang['datetime']['Saturday'] = "�e�tadienis";
$lang['datetime']['Sun'] = "Sk.";
$lang['datetime']['Mon'] = "Pir.";
$lang['datetime']['Tue'] = "Antr.";
$lang['datetime']['Wed'] = "Tr.";
$lang['datetime']['Thu'] = "Kv.";
$lang['datetime']['Fri'] = "Pen.";
$lang['datetime']['Sat'] = "�t.";
$lang['datetime']['January'] = "Sausis";
$lang['datetime']['February'] = "Vasaris";
$lang['datetime']['March'] = "Kovas";
$lang['datetime']['April'] = "Balandis";
$lang['datetime']['May'] = "Gegu��";
$lang['datetime']['June'] = "Bir�elis";
$lang['datetime']['July'] = "Liepa";
$lang['datetime']['August'] = "Rugpj�tis";
$lang['datetime']['September'] = "Rugs�jis";
$lang['datetime']['October'] = "Spalis";
$lang['datetime']['November'] = "Lapkritis";
$lang['datetime']['December'] = "Gruodis";
$lang['datetime']['Jan'] = "01";
$lang['datetime']['Feb'] = "02";
$lang['datetime']['Mar'] = "03";
$lang['datetime']['Apr'] = "04";
$lang['datetime']['May'] = "05";
$lang['datetime']['Jun'] = "06";
$lang['datetime']['Jul'] = "07";
$lang['datetime']['Aug'] = "08";
$lang['datetime']['Sep'] = "09";
$lang['datetime']['Oct'] = "10";
$lang['datetime']['Nov'] = "11";
$lang['datetime']['Dec'] = "12";

//
// Errors (not related to a
// specific failure on a page)
//
$lang['Information'] = "Informacija";
$lang['Critical_Information'] = "Kritin� informacija";

$lang['General_Error'] = "Pagrindin� klaida!";
$lang['Critical_Error'] = "Kritin� klaida!";
$lang['An_error_occured'] = "�vyko klaida!";
$lang['A_critical_error'] = "�vyko kritin� klaida!";

//
// That's all Folks!
// -------------------------------------------------
?>