<?php
/***************************************************************************
 *                            lang_main.php [Slovenian]
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
// CONTRIBUTORS:
//	 Add your details here if wanted, e.g. Nata�a Holy, natasa.holy@guest.arnes.si, www.uciteljska.net
// 2002-08-27  Philip M. White        - fixed many grammar problems
//  	Za�etni prevod v sloven��ino: Gregor Kokalj - Frizbi (frizbi@frizbinet.com) 28/03/2002
//	Popravek prevoda: Toma� Ko�tial (m5@cyberdude.com) 13/10/2002
//      Prevedel do konca Ladislav Golouh, www.Razmerje.com, info@razmerje.com in vzporedil s prevodom:
//      Nata�a Holy, natasa.holy@guest.arnes.si, www.uciteljska.net /19/2/2003


//
// The format of this file is ---> $lang['message'] = 'text';
//
// You should also try to set a locale and a character encoding (plus direction). The encoding and direction
// will be sent to the template. The locale may or may not work, it's dependent on OS support and the syntax
// varies ... give it your best guess!
//

$lang['ENCODING'] = 'windows-1250';
$lang['DIRECTION'] = 'ltr';
$lang['LEFT'] = 'LEFT';
$lang['RIGHT'] = 'RIGHT';
$lang['DATE_FORMAT'] = 'D M Y G:i'; // This should be changed to the default date format for your language, php date() format

// This is optional, if you would like a _SHORT_ message output
// along with our copyright message indicating you are the translator
// please add it here.
// $lang['TRANSLATION'] = '';

//
// Common, these terms are used
// extensively on several pages
//
$lang['Forum'] = 'Forum';
$lang['Category'] = 'Podro�je';
$lang['Topic'] = 'Tema';
$lang['Topics'] = 'Teme';
$lang['Replies'] = 'Odgovorov';
$lang['Views'] = 'Ogledov';
$lang['Post'] = 'Prispevek';
$lang['Posts'] = 'Prispevkov';
$lang['Posted'] = 'Objavljeno';
$lang['Username'] = 'Uporabni�ko ime';
$lang['Password'] = 'Geslo';
$lang['Email'] = 'E-po�ta';
$lang['Poster'] = 'Po�ilja';
$lang['Author'] = 'Avtor';
$lang['Time'] = '�as';
$lang['Hours'] = 'Ur';
$lang['Message'] = 'Sporo�ilo';

$lang['1_Day'] = '1 dan';
$lang['7_Days'] = '7 dni';
$lang['2_Weeks'] = '2 tedna';
$lang['1_Month'] = '1 mesec';
$lang['3_Months'] = '3 mesece';
$lang['6_Months'] = '6 mesecev';
$lang['1_Year'] = '1 leto';

$lang['Go'] = 'Pojdi';
$lang['Jump_to'] = 'Pojdi na';
$lang['Submit'] = 'Po�lji';
$lang['Reset'] = 'Izvorno';
$lang['Cancel'] = 'Prekli�i';
$lang['Preview'] = 'Predogled';
$lang['Confirm'] = 'Potrdi';
$lang['Spellcheck'] = '�rkovanje';
$lang['Yes'] = 'Da';
$lang['No'] = 'Ne';
$lang['Enabled'] = 'Omogo�eno';
$lang['Disabled'] = 'Ni omogo�eno';
$lang['Error'] = 'Napaka';

$lang['Next'] = 'Naslednja';
$lang['Previous'] = 'Prej�nja';
$lang['Goto_page'] = 'Pojdi na stran';
$lang['Joined'] = 'Pridru�en/-a';
$lang['IP_Address'] = 'IP naslov';

$lang['Select_forum'] = 'Izberi forum';
$lang['View_latest_post'] = 'Poglej zadnje objave';
$lang['View_newest_post'] = 'Poglej najnovej�e objave';
$lang['Page_of'] = 'Stran <b>%d</b> od <b>%d</b>'; // Replaces with: Page 1 of 2 for example

$lang['ICQ'] = 'ICQ �tevilka';
$lang['AIM'] = 'AIM - AOL Instant - naslov';
$lang['MSNM'] = 'MSN Messenger - naslov';
$lang['YIM'] = 'Yahoo Messenger - naslov';

$lang['Forum_Index'] = '%s Seznam forumov';  // eg. sitename Forum Index, %s can be removed if you prefer

$lang['Post_new_topic'] = 'Objavi novo temo';
$lang['Reply_to_topic'] = 'Odgovori na to temo';
$lang['Reply_with_quote'] = 'Odgovori s citatom';

$lang['Click_return_topic'] = 'Klikni %sTukaj%s za vrnitev na temo'; // %s's here are for uris, do not remove!
$lang['Click_return_login'] = 'Klikni %sTukaj%s in poskusi znova';
$lang['Click_return_forum'] = 'Klikni %sTukaj%s za vrnitev na forum';
$lang['Click_view_message'] = 'Klikni %sTukaj%s za pregled tvojega prispevka';
$lang['Click_return_modcp'] = 'Klikni %sTukaj%s za vrnitev na Moderatorjevo nadzorno plo��o';
$lang['Click_return_group'] = 'Klikni %sTukaj%s za vrnitev v informacije o skupini';

$lang['Admin_panel'] = 'Administrativni koti�ek';

$lang['Board_disable'] = 'Oprostite, forum trenutno ni dostopen, prosimo, poskusite pozneje.';

    
//
// Global Header strings
//
$lang['Registered_users'] = 'Registrirani uporabniki:';
$lang['Browsing_forum'] = 'Forum pregleduje/jo uporabnik/i:';
$lang['Online_users_zero_total'] = 'Na zvezi ni <b>0</b> uporabnikov :: ';
$lang['Online_users_total'] = 'Trenutno forum  pregleduje <b>%d</b> uporabnikov :: ';
$lang['Online_user_total'] = 'Trenutno forum  pregleduje <b>%d</b> uporabnik :: ';
$lang['Reg_users_zero_total'] = '0 registriranih, ';
$lang['Reg_users_total'] = '%d registriranih, ';
$lang['Reg_user_total'] = '%d registriranih, ';
$lang['Hidden_users_zero_total'] = '0 skritih in  ';
$lang['Hidden_user_total'] = '%d skrit in  ';
$lang['Hidden_users_total'] = '%d skriti in ';
$lang['Guest_users_zero_total'] = '0 gostov';
$lang['Guest_users_total'] = '%d gostov';
$lang['Guest_user_total'] = '%d gost';
$lang['Record_online_users'] = 'Najve� obiskovalcev na forumu je bilo: <b>%s</b>,  dne %s'; // first %s = number of users, second %s is the date.

$lang['Admin_online_color'] = '%sAdministrator%s';
$lang['Mod_online_color'] = '%sModerator%s';

$lang['You_last_visit'] = 'Tvoj zadnji obisk: %s'; // %s replaced by date/time
$lang['Current_time'] = 'Danes je %s'; // %s replaced by time

$lang['Search_new'] = 'Poglej nove objave od prej�njega obiska';
$lang['Search_your_posts'] = 'Poglej svoje prispevke';
$lang['Search_unanswered'] = 'Poglej neodgovorjena sporo�ila';

$lang['Register'] = 'Registriraj se';
$lang['Profile'] = 'Tvoj profil';
$lang['Edit_profile'] = 'Uredi svoj profil';
$lang['Search'] = 'I��i';
$lang['Memberlist'] = 'Seznam �lanov';
$lang['FAQ'] = 'Pomo� pogostih vpra�anj';
$lang['BBCode_guide'] = 'BBCode vodi�';
$lang['Usergroups'] = 'Skupine uporabnikov';
$lang['Last_Post'] = 'Zadnja objava';
$lang['Moderator'] = 'Moderator';
$lang['Moderators'] = 'Moderatorji';


//
// Stats block text
//
$lang['Posted_articles_zero_total'] = 'Uporabniki so objavili doslej <b>0</b> prispevkov '; // Number of posts
$lang['Posted_articles_total'] = 'Uporabniki so skupaj objavili �e <b>%d</b> prispevkov'; // Number of posts
$lang['Posted_article_total'] = 'Uporabniki so doslej objavili <b>%d</b> prispevek'; // Number of posts
$lang['Registered_users_zero_total'] = 'Imamo <b>0</b> prijavljenih uporabnikov'; // # registered users
$lang['Registered_users_total'] = 'Imamo �e <b>%d</b> prijavljenih uporabnikov'; // # registered users
$lang['Registered_user_total'] = 'Imamo <b>%d</b> prijavljenega uporabnika'; // # registered users
$lang['Newest_user'] = 'Dobrodo�lica! Novopridru�eni/-a uporabnik/-ca je <b>%s%s%s</b>'; // a href, username, /a 

$lang['No_new_posts_last_visit'] = 'Od tvojega zadnjega obiska �e ni novih objav';
$lang['No_new_posts'] = 'Ni novih objav';
$lang['New_posts'] = 'Nove objave';
$lang['New_post'] = 'Nova objava';
$lang['No_new_posts_hot'] = 'Ni novih objav [priljubljenih]';
$lang['New_posts_hot'] = 'Nove objave [priljubljene]';
$lang['No_new_posts_locked'] = 'Ni novih objav [zaklenjenih]';
$lang['New_posts_locked'] = 'Nove objave [zaklenjene]';
$lang['Forum_is_locked'] = 'Forum je zaklenjen';


//
// Login
//
$lang['Enter_password'] = 'Prosim, vnesi svoje uporabni�ko ime in geslo';
$lang['Login'] = 'Prijava';
$lang['Logout'] = 'Odjava';

$lang['Forgotten_password'] = 'Pozabil/a sem geslo';

$lang['Log_me_in'] = 'Avtomati�na prijava ob vsakem obisku (priporo�amo)';

$lang['Error_login'] = 'Vpisal si napa�no ali �e neaktivno uporabni�ko ime ali geslo';


//
// Index page
//
$lang['Index'] = 'Forum: seznam';
$lang['No_Posts'] = 'Ni objav';
$lang['No_forums'] = '�e ni forumov';

$lang['Private_Message'] = 'Zasebno sporo�ilo';
$lang['Private_Messages'] = 'Zasebna sporo�ila';
$lang['Who_is_Online'] = 'Kdo je z nami';

$lang['Mark_all_forums'] = 'Ozna�i forume kot prebrane';
$lang['Forums_marked_read'] = 'Vsi forumi so ozna�eni kot prebrani';


//
// Viewforum
//
$lang['View_forum'] = 'Preglej forum';

$lang['Forum_not_exist'] = 'Izbrani forum ne obstaja.';
$lang['Reached_on_error'] = 'Na tej strani se je pojavila napaka';

$lang['Display_topics'] = 'Prika�i prej�nje teme';
$lang['All_Topics'] = 'Vse teme';

$lang['Topic_Announcement'] = '<b>Obvestilo:</b>';
$lang['Topic_Sticky'] = '<b>Ne prezri:</b>';
$lang['Topic_Moved'] = '<b>Premaknjeno:</b>';
$lang['Topic_Poll'] = '<b>[Z anketo]</b>';

$lang['Mark_all_topics'] = 'Ozna�i vse teme kot prebrane';
$lang['Topics_marked_read'] = 'Teme tega foruma so ozna�ene kot prebrane';

$lang['Rules_post_can'] = 'Da, <b>lahko</b> dodaja� nove teme v tem forumu';
$lang['Rules_post_cannot'] ='Ne, <b>ne more�</b> dodajati novih tem v tem forumu';
$lang['Rules_reply_can'] = 'Da, <b>lahko</b> odgovarja� na teme v tem forumu';
$lang['Rules_reply_cannot'] ='Ne, <b>ne more�</b> odgovarjati na teme v tem forumu';
$lang['Rules_edit_can'] = 'Da, <b>lahko</b> ureja� svoje prispevke v tem forumu';
$lang['Rules_edit_cannot'] = 'Ne, <b>ne more�</b> urejati svojih prispevkov v tem forumu';
$lang['Rules_delete_can'] = 'Da, <b>lahko</b> bri�e� svoje prispevke v tem forumu';
$lang['Rules_delete_cannot'] = 'Ne, <b>ne more�</b> brisati svojih prispevkov v tem forumu';
$lang['Rules_vote_can'] = 'Da, <b>lahko</b> glasuje� v anketi v tem forumu';
$lang['Rules_vote_cannot'] = 'Ne <b>ne more�</b> glasovati v anketi v tem forumu';
$lang['Rules_moderate'] = 'Da, <b>lahko</b> %sureja� ta forum%s'; // %s replaced by a href links, do not remove! 

$lang['No_topics_post_one'] = 'V tem forumu �e ni prispevkov<br/>Klikni na povezavo <b>Nova tema</b>';


//
// Viewtopic
//
$lang['View_topic'] = 'Poglej temo';

$lang['Guest'] = 'Gost';
$lang['Post_subject'] = 'Naslov sporo�ila';
$lang['View_next_topic'] = 'Poglej naslednjo temo';
$lang['View_previous_topic'] = 'Poglej prej�njo temo';
$lang['Submit_vote'] = 'Glasuj';
$lang['View_results'] = 'Rezultati ankete';

$lang['No_newer_topics'] = 'V tem razdelku ni novej�ih tem';
$lang['No_older_topics'] = 'V tem razdelku ni starej�ih tem';
$lang['Topic_post_not_exist'] = 'Tema ali sporo�ilo ne obstaja';
$lang['No_posts_topic'] = 'V tej temi �e ni sporo�il';

$lang['Display_posts'] = 'Poka�i sporo�ila';
$lang['All_Posts'] = 'Vse objave';
$lang['Newest_First'] = 'Najprej najnovej�e';
$lang['Oldest_First'] = 'Najprej najstarej�e';

$lang['Back_to_top'] = 'Nazaj na vrh';

$lang['Read_profile'] = 'Poglej uporabnikov profil'; 
$lang['Send_email'] = 'Po�lji elektronsko po�to uporabniku';
$lang['Visit_website'] = 'Obi��i avtorjevo spletno stran';
$lang['ICQ_status'] = 'ICQ Status';
$lang['Edit_delete_post'] = 'Popravi/Izbri�i to sporo�ilo';
$lang['View_IP'] = 'Prika�i IP avtorja';
$lang['Delete_post'] = 'Izbri�i to sporo�ilo';

$lang['wrote'] = 'je napisal/a'; // proceeds the username and is followed by the quoted text
$lang['Quote'] = 'Citiram'; // comes before bbcode quote output.
$lang['Code'] = 'Koda'; // comes before bbcode code output.

$lang['Edited_time_total'] = 'Nazadnje urejal/a %s %s; skupaj popravljeno %d krat'; // Last edited by me on 12 Oct 2001; edited 1 time in total
$lang['Edited_times_total'] = 'Nazadnje urejal/a %s %s; skupaj popravljeno %d krat'; // Last edited by me on 12 Oct 2001; edited 2 times in total

$lang['Lock_topic'] = 'Zakleni temo';
$lang['Unlock_topic'] = 'Odkleni temo';
$lang['Move_topic'] = 'Premakni temo';
$lang['Delete_topic'] = 'Izbri�i temo';
$lang['Split_topic'] = 'Razdeli temo';

$lang['Stop_watching_topic'] = 'Nehaj slediti novim sporo�ilom na to temo';
$lang['Start_watching_topic'] = 'Za�ni slediti novim sporo�ilom na to temo';
$lang['No_longer_watching'] = 'Ne sledim ve� novim sporo�ilom na to temo';
$lang['You_are_watching'] = 'Sledim novim sporo�ilom na to temo';

$lang['Total_votes'] = 'Skupaj glasov';


//
// Posting/Replying (Not private messaging!)
//
$lang['Message_body'] = 'Telo sporo�ila';
$lang['Topic_review'] = 'Pregled teme';

$lang['No_post_mode'] = 'Nobeno sporo�ilo ni bilo pravilno izbrano'; // If posting.php is called without a mode (newtopic/reply/delete/etc, shouldn't be shown normaly)

$lang['Post_a_new_topic'] = 'Objavi novo temo'; 
$lang['Post_a_reply'] = 'Odgovori';
$lang['Post_topic_as'] = 'Objavi novo temo kot';
$lang['Edit_Post'] = 'Uredi sporo�ilo';
$lang['Options'] = 'Mo�nosti';

$lang['Post_Announcement'] = 'Obvestilo';
$lang['Post_Sticky'] = 'NE PREZRI!';
$lang['Post_Normal'] = 'Navadno';

$lang['Confirm_delete'] = 'Ali res �eli� izbrisati to sporo�ilo?';
$lang['Confirm_delete_poll'] = 'Ali res �eli� izbrisati to anketo?';

$lang['Flood_Error'] = 'Prosim, poskusi malce kasneje. Novega sporo�ila ne more� objaviti tako hitro za prej�njim.';
$lang['Empty_subject'] = 'Vpisati mora� naslov, ko objavlja� novo temo.';
$lang['Empty_message'] = 'Napisati mora� vsebino, predno po�lje�.';
$lang['Forum_locked'] = 'Ta forum je zaklenjen: ne more� urejati, po�iljati ali odgovarjati na sporo�ila.';
$lang['Topic_locked'] = 'Ta tema je zaklenjena: ne more� urejati sporo�il ali odgovarjati na objave.';
$lang['No_post_id'] = 'Izberi sporo�ilo, ki ga �eli� urejati';
$lang['No_topic_id'] = 'Izberi temo, v kateri �eli� odgovoriti';
$lang['No_valid_mode'] = 'Lahko samo objavlja�, odgovarja�, ureja� ali citira� sporo�ila. Prosim, vrni se in poskusi znova.';
$lang['No_such_post'] = 'Tako sporo�ilo (objava) ne obstaja. Prosim, vrni se in poskusi znova.';
$lang['Edit_own_posts'] = '�al, ureja� lahko le svoja sporo�ila.';
$lang['Delete_own_posts'] = '�al, bri�e� lahko le svoja sporo�ila.';
$lang['Cannot_delete_replied'] = '�al, toda sporo�il, na katera je nekdo odgovoril, ne more� brisati.';
$lang['Cannot_delete_poll'] = '�al, aktivne ankete ne more� izbrisati.';
$lang['Empty_poll_title'] = 'Za svojo anketo mora� vnesti naslov.';
$lang['To_few_poll_options'] = 'Vnesti mora� vsaj dve izbiri.';
$lang['To_many_poll_options'] = 'Posku�al si vnesti preve� izbir.';
$lang['Post_has_no_poll'] = 'To sporo�ilo ne vsebuje ankete.';
$lang['Already_voted'] = 'V tej anketi si �e glasoval/a.';
$lang['No_vote_option'] = 'Izberi eno mo�nost, ko glasuje�';

$lang['Add_poll'] = 'Dodaj anketo';
$lang['Add_poll_explain'] = '�e ankete temi ne �eli� dodati, pusti polja prazna.';
$lang['Poll_question'] = 'Anketno vpra�anje';
$lang['Poll_option'] = 'Anketna mo�nost';
$lang['Add_option'] = 'Dodaj mo�nost';
$lang['Update'] = 'Posodobi';
$lang['Delete'] = 'Izbri�i';
$lang['Poll_for'] = 'Anketa naj te�e';
$lang['Days'] = 'dni'; // This is used for the Run poll for ... Days + in admin_forums for pruning
$lang['Poll_for_explain'] = '[Vnesi 0 ali pusti prazno za anketo, ki �asovno ni omejena.]';
$lang['Delete_poll'] = 'Izbri�i anketo';

$lang['Disable_HTML_post'] = 'Izklopi HTML v tem sporo�ilu';
$lang['Disable_BBCode_post'] = 'Izklopi BBCode v tem sporo�ilu';
$lang['Disable_Smilies_post'] = 'Izklopi Sme�ke v tem sporo�ilu';

$lang['HTML_is_ON'] = 'HTML je <u>vklopljen</u>';
$lang['HTML_is_OFF'] = 'HTML je <u>izklopljen</u>';
$lang['BBCode_is_ON'] = '%s(Navodila) BBkoda%s je <u>vklopljena</u>'; // %s are replaced with URI pointing to FAQ
$lang['BBCode_is_OFF'] = '%s(Navodila) BBkoda%s je <u>izklopljena</u>';
$lang['Smilies_are_ON'] = 'Sme�ki so <u>vklopljeni</u>';
$lang['Smilies_are_OFF'] = 'Sme�ki so <u>izklopljeni</u>';

$lang['Attach_signature'] = 'Dodaj podpis (podpis lahko spremeni� v profilu)';
$lang['Notify'] = 'Obvesti me, ko bo prispelo novo sporo�ilo';
$lang['Delete_post'] = 'Izbri�i to sporo�ilo';

$lang['Stored'] = 'Sporo�ilo je uspe�no sprejeto.';
$lang['Deleted'] = 'Sporo�ilo je uspe�no izbrisano.';
$lang['Poll_delete'] = 'Anketa je uspe�no izbrisana.';
$lang['Vote_cast'] = 'Tvoj glas je pri�tet.';

$lang['Topic_reply_notification'] = 'Obve��anje o odgovorih na temo';

$lang['bbcode_b_help'] = 'Krepko: [b]besedilo[/b]  (alt+b)';
$lang['bbcode_i_help'] = 'Le�e�e: [i]besedilo[/i]  (alt+i)';
$lang['bbcode_u_help'] = 'Pod�rtano: [u]besedilo[/u]  (alt+u)';
$lang['bbcode_q_help'] = 'Citat: [quote]besedilo[/quote]  (alt+q)';
$lang['bbcode_c_help'] = 'Prikaz kode: [code]koda[/code]  (alt+c)';
$lang['bbcode_l_help'] = 'Seznam: [list]besedilo[/list] (alt+l)';
$lang['bbcode_o_help'] = 'Urejen seznam: [list=]besedilo[/list]  (alt+o)';
$lang['bbcode_p_help'] = 'Vstavi sliko: [img]http://image_url[/img]  (alt+p)';
$lang['bbcode_w_help'] = 'Vstavi URL povezavo: [url]http://url[/url] ali [url=http://url]URL besedilo[/url]  (alt+w)';
$lang['bbcode_a_help'] = 'Zaklju�ne ozna�be bbCode pri vseh odprtih ukazih';
$lang['bbcode_s_help'] = 'Barva besedila: [color=red]besedilo[/color]';
$lang['bbcode_f_help'] = 'Velikost pisave: [size=x-small]majhno besedilo[/size]';

$lang['Emoticons'] = 'Sme�ki';
$lang['More_emoticons'] = 'Ve� Sme�kov';

$lang['Font_color'] = 'Barva pisave';
$lang['color_default'] = 'Privzeto';
$lang['color_dark_red'] = 'Temno rde�a';
$lang['color_red'] = 'Rde�a';
$lang['color_orange'] = 'Oran�na';
$lang['color_brown'] = 'Rjava';
$lang['color_yellow'] = 'Rumena';
$lang['color_green'] = 'Zelena';
$lang['color_olive'] = 'Olivna';
$lang['color_cyan'] = 'Sinje modra';
$lang['color_blue'] = 'Modra';
$lang['color_dark_blue'] = 'Temno modra';
$lang['color_indigo'] = 'Indigo';
$lang['color_violet'] = 'Vijoli�na';
$lang['color_white'] = 'Bela';
$lang['color_black'] = '�rna';

$lang['Font_size'] = 'Velikost pisave';
$lang['font_tiny'] = 'Drobna';
$lang['font_small'] = 'Majhna';
$lang['font_normal'] = 'Normalna';
$lang['font_large'] = 'Velika';
$lang['font_huge'] = 'Ogromna';

$lang['Close_Tags'] = 'Zaklju�ne ozna�be odprtih ukazov';
$lang['Styles_tip'] = 'Namig: Oblike hitro dolo�i� prej ozna�enemu besedilu.';


//
// Private Messaging
//
$lang['Private_Messaging'] = 'Zasebna sporo�ila';

$lang['Login_check_pm'] = 'Prijava za pregled zasebnih sporo�il';
$lang['New_pms'] = 'Ima� %d novih sporo�il'; // You have 2 new messages
$lang['New_pm'] = 'Ima� %d novo sporo�ilo'; // You have 1 new message
$lang['No_new_pm'] = 'Nima� novih sporo�il';
$lang['Unread_pms'] = 'Ima� %d neprebranih sporo�il';
$lang['Unread_pm'] = 'Ima� %d neprebrano sporo�ilo';
$lang['No_unread_pm'] = 'Nima� neprebranih sporo�il';
$lang['You_new_pm'] = 'Ima� novo zasebno sporo�ilo v mapi Prejeto';
$lang['You_new_pms'] = 'Ima� nova zasebna sporo�ila v mapi Prejeto';
$lang['You_no_new_pm'] = 'Nima� novih zasebnih sporo�il';

$lang['Unread_message'] = 'Neprebrano sporo�ilo';
$lang['Read_message'] = 'Prebrano sporo�ilo';

$lang['Read_pm'] = 'Preberi sporo�ilo';
$lang['Post_new_pm'] = 'Po�lji sporo�ilo';
$lang['Post_reply_pm'] = 'Odgovori na sporo�ilo';
$lang['Post_quote_pm'] = 'Citiraj sporo�ilo';
$lang['Edit_pm'] = 'Uredi sporo�ilo';

$lang['Inbox'] = 'Prejeto';
$lang['Outbox'] = 'Odposlano';
$lang['Savebox'] = 'Shranjeno';
$lang['Sentbox'] = 'Poslano';
$lang['Flag'] = 'Zastavica';
$lang['Subject'] = 'Naslov sporo�ila';
$lang['From'] = 'Od';
$lang['To'] = 'Za';
$lang['Date'] = 'Datum';
$lang['Mark'] = 'Ozna�i';
$lang['Sent'] = 'Poslano';
$lang['Saved'] = 'Shranjeno';
$lang['Delete_marked'] = 'Izbri�i ozna�ene';
$lang['Delete_all'] = 'Izbri�i vse';
$lang['Save_marked'] = 'Shrani ozna�ene'; 
$lang['Save_message'] = 'Shrani sporo�ilo';
$lang['Delete_message'] = 'Izbri�i sporo�ilo';

$lang['Display_messages'] = 'Poka�i sporo�ila novej�a kot'; // Followed by number of days/weeks/months
$lang['All_Messages'] = 'Vsa sporo�ila';

$lang['No_messages_folder'] = 'V tej mapi nima� sporo�il';

$lang['PM_disabled'] = 'Na tej plo��i so zasebna sporo�ila onemogo�ena.';
$lang['Cannot_send_privmsg'] = '�al, po�iljanje zasebnih sporo�il je onemogo�eno.';
$lang['No_to_user'] = 'Dolo�i uporabnikovo ime.';
$lang['No_such_user'] = '�al, ta uporabnik ne obstaja.';

$lang['Disable_HTML_pm'] = 'Onemogo�i HTML v tem sporo�ilu';
$lang['Disable_BBCode_pm'] = 'Onemogo�i BBCode v tem sporo�ilu';
$lang['Disable_Smilies_pm'] = 'Onemogo�i Sme�ke v tem sporo�ilu';

$lang['Message_sent'] = 'Sporo�ilo je bilo poslano.';

$lang['Click_return_inbox'] = 'Klikni %sTukaj%s, za vrnitev v mapo Prejeto';
$lang['Click_return_index'] = 'Klikni %sTukaj%s za vrnitev na seznam';

$lang['Send_a_new_message'] = 'Po�lji novo zasebno sporo�ilo';
$lang['Send_a_reply'] = 'Odgovori na zasebno sporo�ilo';
$lang['Edit_message'] = 'Uredi zasebno sporo�ilo';

$lang['Notification_subject'] = 'Prispelo je novo zasebno sporo�ilo!'; 

$lang['Find_username'] = 'Najdi uporabnika';
$lang['Find'] = 'Najdi';
$lang['No_match'] = 'Ni zadetkov.';

$lang['No_post_id'] = 'ID sporo�ila ni dolo�en';
$lang['No_such_folder'] = 'Ta mapa ne obstaja';
$lang['No_folder'] = 'Nobena mapa ni izbrana';

$lang['Mark_all'] = 'Ozna�i vse';
$lang['Unmark_all'] = 'Od-zna�i vse';

$lang['Confirm_delete_pm'] = 'Ali res �eli� izbrisati to sporo�ilo?';
$lang['Confirm_delete_pms'] = 'Ali res �eli� izbrisati ta sporo�ila?';

$lang['Inbox_size'] = 'Mapa s prejeto po�to je %d%% zasedena'; // eg. Your Inbox is 50% full
$lang['Sentbox_size'] = 'Mapa s poslano po�to je %d%% zasedena'; 
$lang['Savebox_size'] = 'Mapa s shranjeno po�to je %d%% zasedena'; 

$lang['Click_view_privmsg'] = 'Klikni %sTukaj%s za pregled Prejete po�te';


//
// Profiles/Registration
//
$lang['Viewing_user_profile'] = 'Pregled profila - predstavitev :: %s'; // %s is username 
$lang['About_user'] = 'Vse o %s'; // %s is username

$lang['Preferences'] = 'Nastavitve';
$lang['Items_required'] = 'To�ke ozna�ene z *, je obvezno treba izpolniti.';
$lang['Registration_info'] = 'Podatki o registraciji';
$lang['Profile_info'] = 'Podatki o profilu - predstavitev';
$lang['Profile_info_warn'] = 'Te podatke bodo lahko videli vsi';
$lang['Avatar_panel'] = 'Nadzorna plo��a podob';
$lang['Avatar_gallery'] = 'Galerija podob';

$lang['Website'] = 'Spletna stran';
$lang['Location'] = 'Kraj';
$lang['Contact'] = 'Stiki';
$lang['Email_address'] = 'Elektronski naslov';
$lang['Email'] = 'E-po�ta';
$lang['Send_private_message'] = 'Po�lji zasebno sporo�ilo';
$lang['Hidden_email'] = '[ Skrito ]';
$lang['Search_user_posts'] = 'I��i sporo�ila tega uporabnika';
$lang['Interests'] = 'Zanima me';
$lang['Occupation'] = 'Poklic'; 
$lang['Poster_rank'] = 'Uporabni�ka Stopnja';

$lang['Total_posts'] = 'Vse objave';
$lang['User_post_pct_stats'] = '%.2f%% vseh objav'; // 1.25% of total
$lang['User_post_day_stats'] = '%.2f objav na dan'; // 1.5 posts per day
$lang['Search_user_posts'] = 'Najdi vse prispevke pod imenom %s'; // Find all posts by username

$lang['No_user_id_specified'] = '�al, tak uporabnik ne obstaja.';
$lang['Wrong_Profile'] = 'Profila, ki ni tvoj, ne more� spreminjati.';

$lang['Only_one_avatar'] = 'Izbere� lahko le eno podobo';
$lang['File_no_data'] = 'Datoteka na vne�enem URL naslovu ne vsebuje podatkov';
$lang['No_connection_URL'] = 'Povezava do vne�enega URL naslova ni uspela';
$lang['Incomplete_URL'] = 'URL naslov je nepopoln';
$lang['Wrong_remote_avatar_format'] = 'URL naslov oddaljene podobe ni veljaven';
$lang['No_send_account_inactive'] = '�al tvojega gesla ne morem obnoviti, ker je tvoj ra�un trenutno neaktiviran. Za ve� informacij se,prosim, pove�i z Administratorjem foruma.';

$lang['Always_smile'] = 'Vedno omogo�i Sme�ke';
$lang['Always_html'] = 'Vedno omogo�i HTML';
$lang['Always_bbcode'] = 'Vedno omogo�i BBCode';
$lang['Always_add_sig'] = 'Vedno dodaj moj podpis';
$lang['Always_notify'] = 'Vedno obve��aj o odgovorih';
$lang['Always_notify_explain'] = 'Vedno, ko nekdo odgovori na temo, ki ste jo zastavili, dobite obvestilo po e-po�ti. To lahko spremenite vedno, ko po�iljate sporo�ilo.';

$lang['Board_style'] = 'Izgled foruma';
$lang['Board_lang'] = 'Jezik';
$lang['No_themes'] = 'Ni �e tem v bazi podatkov';
$lang['Timezone'] = '�asovni pas';
$lang['Date_format'] = 'Oblika datuma';
$lang['Date_format_explain'] = 'Oblika zapisa je enaka kot pri PHP funkciji <a href=\'http://www.php.net/date\' target=\'_other\'>date()</a> function.';
$lang['Signature'] = 'Podpis';
$lang['Signature_explain'] = 'Podpis je besedilo, ki se samodejno doda na koncu vsake va�e objave. Dol�ina besedila je omejena na %d �rk';
$lang['Public_view_email'] = 'Vedno poka�i moj Elektronski naslov';

$lang['Current_password'] = 'Trenutno geslo';
$lang['New_password'] = 'Novo geslo';
$lang['Confirm_password'] = 'Potrdi geslo';
$lang['Confirm_password_explain'] = 'Potrdi z geslom vedno, kadar spreminja� geslo ali elektronski naslov.';
$lang['password_if_changed'] = 'Geslo lahko spremeni� le, ko vpi�e� tudi prej�nje geslo.';
$lang['password_confirm_if_changed'] = 'Geslo mora� tudi potrditi, ko ga zamenja�.';

$lang['Avatar'] = 'Moja podoba';
$lang['Avatar_explain'] = 'Prika�e se majhna slika med podatki na levi ob vsakem tvojem prispevku. Prika�e se lahko samo ena slika, in sicer ne sme biti �ir�a %d pikslov in ne vi�ja od %d pikslov, dol�ina datoteka pa ne sme biti ve�ja od %dkB.';
$lang['Upload_Avatar_file'] = 'Nalo�i podobo iz svojega ra�unalnika';
$lang['Upload_Avatar_URL'] = 'Nalo�i podobo iz URL naslova';
$lang['Upload_Avatar_URL_explain'] = 'Vnesi URL naslov, kjer je sli�ica tvoje podobe, preslikana bo na to stran.';
$lang['Pick_local_Avatar'] = 'Izberi podobo v na�i galeriji';
$lang['Link_remote_Avatar'] = 'Povezava do podobe na neki drugi spletni strani';
$lang['Link_remote_Avatar_explain'] = 'Vnesi URL naslov, kjer je podoba, na katero se �eli� povezati.';
$lang['Avatar_URL'] = 'URL naslov sli�ice - podobe';
$lang['Select_from_gallery'] = 'Izberi podobo iz na�e galerije';
$lang['View_avatar_gallery'] = 'Poka�i galerijo';

$lang['Select_avatar'] = 'Izberi podobo';
$lang['Return_profile'] = 'Prekli�i podobo';
$lang['Select_category'] = 'Izberi kategorijo (zvrst)';

$lang['Delete_Image'] = 'Izbri�i sli�ico';
$lang['Current_Image'] = 'Trenutna sli�ica';

$lang['Notify_on_privmsg'] = 'Obvesti me, ko prejmem novo zasebno sporo�ilo';
$lang['Popup_on_privmsg'] = 'Pojavi se okno ob novem zasebnem sporo�ilu'; 
$lang['Popup_on_privmsg_explain'] = 'Nekatere predloge odprejo novo okno, kot obvestilo o novem zasebnem sporo�ilu.';
$lang['Hide_user'] = 'Skrij me, da ne bom viden med pregledovanjem foruma';

$lang['Profile_updated'] = 'Tvoj profil je posodobljen';
$lang['Profile_updated_inactive'] = 'Tvoj profil je posodobljen. Ker so bili spremenjeni klju�ni podatki, je tvoj ra�un zdaj neaktiviran. V tvojem elektronskem predalu te �aka elektronska po�ta z navodili, kako ponovno aktivirati svoj ra�un. �e ga mora aktivirati Administrator, po�akaj, da ga bo aktiviral.';

$lang['Password_mismatch'] = 'Gesli se ne ujemata.';
$lang['Current_password_mismatch'] = 'Vpisano geslo se ne ujema s tistim v bazi podatkov.';
$lang['Password_long'] = 'Geslo ne sme biti dalj�e od 32 znakov.';
$lang['Username_taken'] = 'To uporabni�ko ime je �al �e zasedeno.';
$lang['Username_invalid'] = 'Vne�eno uporabni�ko ime vsebuje nedovoljen znak kot na primer \'.';
$lang['Username_disallowed'] = '�al, tako uporabni�ko ime ni dovoljeno.';
$lang['Email_taken'] = '�al, toda ta elektronski naslov je �e registriral drug uporabnik.';
$lang['Email_banned'] = '�al, toda ta elektronski naslov je blokiran.';
$lang['Email_invalid'] = 'Vne�eni elektronski naslov je neveljaven.';
$lang['Signature_too_long'] = 'Tvoj podpis je predolg.';
$lang['Fields_empty'] = 'Izpolniti mora� zahtevana polja.';
$lang['Avatar_filetype'] = 'Tip datoteke za podobo mora biti .jpg, .gif ali .png';
$lang['Avatar_filesize'] = 'Datoteka podobe mora biti manj�a od %d KB'; // The avatar image file size must be less than 6 KB
$lang['Avatar_imagesize'] = 'Podoba mora biti o�ja od %d pikslov in ni�ja od %d pikslov'; 

$lang['Welcome_subject'] = 'Dobrodo�li na  %s forumih'; // Welcome to my.com forums
$lang['New_account_subject'] = 'Nov uporabni�ki ra�un';
$lang['Account_activated_subject'] = 'Ra�un je aktiviran';

$lang['Account_added'] = 'Zahvaljujemo se ti za registracijo. Tvoj ra�un je ustvarjen. Sedaj se lahko prijavi� s svojim uporabni�kim imenom in geslom';
$lang['Account_inactive'] = 'Tvoj ra�un je ustvarjen. No, na tem forumu ga je potrebno aktivirati. Klju� za aktivacijo je bil poslan na tvoj e-po�tni naslov, ki si ga vnesel/-la. Preveri elektronsko po�to, v sporo�ilu so nadaljnje informacije';
$lang['Account_inactive_admin'] = 'Tvoj ra�un je ustvarjen. No, na tem forumu ga mora aktivirati administrator. Poslano je E-sporo�ilo administratorju. Obve��en/a bo�, ko bo ra�un aktiviran.';
$lang['Account_active'] = 'Tvoj ra�un sedaj aktiviran. Zahvaljujemo se ti za registracijo.';
$lang['Account_active_admin'] = 'Tvoj Ra�un je zdaj aktiviran.';
$lang['Reactivate'] = 'Ponovno aktiviraj svoj ra�un!';
$lang['Already_activated'] = 'Ta ra�un si �e aktiviral.';
$lang['COPPA'] = 'Tvoj ra�un je ustvarjen, vendar mora biti �e odobren. Prosim, preberi podrobnosti v E-pismu.';

$lang['Registration'] = 'Sprejmi naslednje postavke za registracijo';
$lang['Reg_agreement'] = '�eprav sku�ajo Administratorji in moderatorji tega foruma odstraniti ali popraviti neprimerna besedila tako hitro, kot je mogo�e, ni mogo�e preverjati vsakega sporo�ila. Zato vas obve��amo, da vsa sporo�ila, objavljena v tem forumu, izra�ajo mnenja in poglede avtorja sporo�ila in ne mnenja in pogleda upraviteljev, moderatorjev ali Administratorja (razen za njihova lastna sporo�ila) in zato za objavljena sporo�ila niso odgovorni.<br /><br />Zavezujete se, da ne boste objavljali sporo�il z zlonamerno, �aljivo, nespodobno, vulgarno, obrekljivo, sovra�no, groze�o, obsceno ali katerokoli vsebino, ki lahko prizadene druge uporabnike, �lane tega foruma. Upravitelj strani si pridr�uje pravico, da vam kadarkoli, trajno ali za�asno, delno ali popolno prepre�i dostop do forumov (lahko obvesti tudi va�ega ponudnika interneta). Zaradi tega so IP �tevilke vseh objavljenih sporo�il shranjene, da se uredijo sporni primeri. Strinjate se, da ima Administrator, upravitelj ali moderator tega foruma pravico odstraniti, popraviti, premakniti ali zapreti katerokoli temo, ko se mu zdi to potrebno. Kot uporabnik se strinjate, da se vsi podatki, ki ste jih vpisali shranijo v bazo podatkov. Podatki ne bodo posredovani tretji strani brez va�e privolitve upravitelju strani. Upravitelj, Administratorji in Moderatorji ne prevzemajo odgovornosti za morebitni poskus vdora v bazo, ki bi ogrozil te podatke.<br /><br /> Sistem na tem forumu uporablja pi�kotke (cookies), ki shranijo podatke na va� osebni ra�unalnik. Ti pi�kotki ne vsebujejo nobene informacije, ki ste jo vnesli zgoraj; slu�ijo samo za to, da olaj�ajo spremljanje foruma v va�e zadovoljstvo. Va� elektronski naslov bo uporabljen le za potrditev podrobnosti in gesla pri va�i registraciji, (ter za po�iljanje novega gesla, �e je pozabite obstoje�e geslo).<br /><br /> Klikni Registriraj se spodaj, �e se strinja� z omejitvami teh pogojev. �e si v dvomih, se posvetuj z upravljalci strani.';

$lang['Agree_under_13'] = 'Sprejemam pogoje in sem star(a) <b>manj</b>  kot 13 let.';
$lang['Agree_over_13'] = 'Sprejemam pogoje in sem star(a) <b>ve� kot</b> ali <b>to�no</b> 13 let.';
$lang['Agree_not'] = 'Ne strinjam se s temi pogoji.';

$lang['Wrong_activation'] = 'Aktivacijski klju� se ne ujema s tistim v na�i bazi podatkov.';
$lang['Send_password'] = 'Po�lji mi novo geslo'; 
$lang['Password_updated'] = 'Ustvarjeno je novo geslo; preveri elektronsko po�to, kjer najde� navodila za aktiviranje.';
$lang['No_email_match'] = 'Elektronski naslov se ne ujema s tistim, ki si ga vpisal/a ob uporabni�kem imenu.';
$lang['New_password_activation'] = 'Aktiviranje novega gesla';
$lang['Password_activated'] = 'Tvoj ra�un je ponovno aktiviran. Za prijavo uporabi novo geslo, ki si ga prejel/a po elektronski po�ti.';

$lang['Send_email_msg'] = 'Po�lji E-po�tno sporo�ilo';
$lang['No_user_specified'] = 'Nisi dolo�il Uporabnika';
$lang['User_prevent_email'] = 'Ta uporabnik ne �eli sprejemati elektronske po�te. Poskusi poslati zasebno sporo�ilo.';
$lang['User_not_exist'] = 'Ta uporabnik ne obstaja';
$lang['CC_email'] = 'Po�lji kopijo tega E-sporo�ila tudi na svoj E-po�tni naslov';
$lang['Email_message_desc'] = 'To sporo�ilo bo poslano kot navadno besedilo, zato ne vklju�uj HTML ali BBCode. Za odgovor na to sporo�ilo bo podan tvoj E-po�tni naslov.';
$lang['Flood_email_limit'] = 'Trenutno ne more� poslati �e enega E-sporo�ila. Poskusi ponovno kasneje.';
$lang['Recipient'] = 'Prejemnik';
$lang['Email_sent'] = 'E-sporo�ilo je bilo poslano.';
$lang['Send_email'] = 'Po�lji E-sporo�ilo';
$lang['Empty_subject_email'] = 'Dolo�iti mora� naslov E-sporo�ila.';
$lang['Empty_message_email'] = 'Vpisati mora� vsebino sporo�ila, ki ga po�ilja�.';

//
// Memberslist
//
$lang['Select_sort_method'] = 'Izberi na�in razvr��anja';
$lang['Sort'] = 'Razvrsti';
$lang['Sort_Top_Ten'] = '10 najbolj pridnih';
$lang['Sort_Joined'] = 'Po Datumu registracije';
$lang['Sort_Username'] = 'Po Uporabni�kem imenu';
$lang['Sort_Location'] = 'Po kraju';
$lang['Sort_Posts'] = 'Po �tevilu prispevkov';
$lang['Sort_Email'] = 'Po E-naslovu';
$lang['Sort_Website'] = 'Po spletni strani';
$lang['Sort_Ascending'] = 'Nara��ajo�e';
$lang['Sort_Descending'] = 'Padajo�e';
$lang['Order'] = 'Razporedi';


//
// Group control panel
//
$lang['Group_Control_Panel'] = 'Nadzorna plo��a za skupine';
$lang['Group_member_details'] = 'Podrobnosti o �lanih skupine';
$lang['Group_member_join'] = 'Pridru�i se skupini';

$lang['Group_Information'] = 'Informacije o skupini';
$lang['Group_name'] = 'Ime skupine';
$lang['Group_description'] = 'Opis skupine';
$lang['Group_membership'] = '�lanstvo skupine';
$lang['Group_Members'] = '�lani in �lanice skupine';
$lang['Group_Moderator'] = 'Moderator/ka skupine';
$lang['Pending_members'] = '�akajo�i �lani';

$lang['Group_type'] = 'Tip skupine';
$lang['Group_open'] = 'Odprta skupina';
$lang['Group_closed'] = 'Zaprta skupina';
$lang['Group_hidden'] = 'Skrita skupina';

$lang['Current_memberships'] = 'Trenutno �tevilo �lanov';
$lang['Non_member_groups'] = 'Skupine brez �lanov';
$lang['Memberships_pending'] = 'Neodlo�eni �lani';

$lang['No_groups_exist'] = 'Ni skupin';
$lang['Group_not_exist'] = 'Ta skupina ne obstaja';

$lang['Join_group'] = 'Pridru�i se skupini';
$lang['No_group_members'] = 'Ta skupina nima �lanov';
$lang['Group_hidden_members'] = 'Ta skupina je skrita; ne more� videti �lanstva';
$lang['No_pending_group_members'] = 'Ta skupina nima �akajo�ih �lanov';
$lang['Group_joined'] = 'Uspe�no si se pridru�il/a tej skupini.<br /> Obve��en/a bo�, ko bo� sprejet v skupino s strani moderatorja.';
$lang['Group_request'] = 'Zahteva za �lanstvo je bila posredovana.';
$lang['Group_approved'] = 'Tvoja zahteva je bila odobrena.';
$lang['Group_added'] = 'V�lanil si se v to skupino.'; 
$lang['Already_member_group'] = 'Si �e �lan te skupine';
$lang['User_is_member_group'] = 'Uporabnik je �e �lan te skupine';
$lang['Group_type_updated'] = 'Tip skupine je bil uspe�no spremenjen.';

$lang['Could_not_add_user'] = 'Izbrani uporabnik ne obstaja.';
$lang['Could_not_anon_user'] = '�e nisi registriran prej, ne more� postati �lan skupine.';

$lang['Confirm_unsub'] = 'Ali se res �eli� izpisati se iz te skupine?';
$lang['Confirm_unsub_pending'] = 'Tvoja zahteva za �lanstvo v tej skupini �e ni bila odobrena; se res �eli� izpisati?';

$lang['Unsub_success'] = 'Iz te skupine si izpisan.';

$lang['Approve_selected'] = 'Potrdi ozna�ene';
$lang['Deny_selected'] = 'Zavrni ozna�ene';
$lang['Not_logged_in'] = '�e se �eli� pridru�iti tej skupini, se mora� prijaviti.';
$lang['Remove_selected'] = 'Odstrani ozna�ene';
$lang['Add_member'] = 'Dodaj �lana';
$lang['Not_group_moderator'] = 'Nisi moderator skupine; to lahko napravi le moderator te skupine.';

$lang['Login_to_join'] = 'Prijavi se, �e se �eli� pridru�iti skupini ali voditi �lane.';
$lang['This_open_group'] = 'Ta skupina je odprta: klikni, �e �eli� postati �lan.';
$lang['This_closed_group'] = 'Ta skupina je zaprta: ne sprejemamo novih uporabnikov.';
$lang['This_hidden_group'] = 'Ta skupina je skrita: dodajanje uporabnikov ni omogo�eno.';
$lang['Member_this_group'] = 'Si �lan te skupine';
$lang['Pending_this_group'] = '�aka� na �lanstvo v tej skupini.';
$lang['Are_group_moderator'] = 'Si moderator skupine';
$lang['None'] = 'Noben';

$lang['Subscribe'] = 'Vpi�i se';
$lang['Unsubscribe'] = 'Izpi�i se';
$lang['View_Information'] = 'Poglej podatke';


//
// Search
//
$lang['Search_query'] = 'Vsebina iskanja';
$lang['Search_options'] = 'Mo�nosti iskanja';

$lang['Search_keywords'] = 'I��i po klju�nih besedah';
$lang['Search_keywords_explain'] = 'Za napredno iskanje lahko uporablja� <u>AND</u> za besede, ki morajo biti v zadetkih, <u>OR</u> za besede ki so lahko v zadetkih in <u>NOT</u> za besede, ki ne smejo biti v zadetkih iskanja. Uporabi * kot iskalno kartico, s katero i��e� razli�ice dela besede.';
$lang['Search_author'] = 'I��i po avtorju';
$lang['Search_author_explain'] = 'Uporabi * kot iskalno kartico, s katero i��e� razli�ice dela besede';

$lang['Search_for_any'] = 'I��i poljuben izraz ali uporabi vne�eno poizvedbo.';
$lang['Search_for_all'] = 'I��i po vseh izrazih';
$lang['Search_title_msg'] = 'I��i v naslovu tem in besedilu sporo�il.';
$lang['Search_msg_only'] = 'I��i samo v besedilu sporo�il.';

$lang['Return_first'] = 'Prika�i prvih '; // followed by xxx characters in a select box
$lang['characters_posts'] = 'znakov/�rk sporo�il';

$lang['Search_previous'] = 'I��i sporo�ila novej�a kot'; // followed by days, weeks, months, year, all in a select box

$lang['Sort_by'] = 'Razvrsti po';
$lang['Sort_Time'] = '�asu objave';
$lang['Sort_Post_Subject'] = 'naslovu objave';
$lang['Sort_Topic_Title'] = 'naslovu teme';
$lang['Sort_Author'] = 'avtorju';
$lang['Sort_Forum'] = 'forumu';

$lang['Display_results'] = 'Prika�i zadetke v obliki';
$lang['All_available'] = 'Vse ustrezne';
$lang['No_searchable_forums'] = 'Nima� dovoljenja za iskanje po forumih na tej strani.';

$lang['No_search_match'] = 'Nobena tema ali objava ne ustreza kriterijem iskanja';
$lang['Found_search_match'] = 'Najden %d zadetek'; // eg. Search found 1 match
$lang['Found_search_matches'] = 'Najdeno %d zadetkov'; // eg. Search found 24 matches

$lang['Close_window'] = 'Zapri okno';


//
// Auth related entries
//
// Note the %s will be replaced with one of the following 'user' arrays
$lang['Sorry_auth_announce'] = '�al, vendar v tem forumu lahko objavljajo <b>kot obvestilo</b> le %s.';
$lang['Sorry_auth_sticky'] = '�al, vendar v tem forumu lahko objavljajo <b>kot ne prezri</b> le %s.'; 
$lang['Sorry_auth_read'] = '�al, vendar v tem forumu lahko prebirajo teme le %s.'; 
$lang['Sorry_auth_post'] = '�al, vendar v tem forumu lahko objavljajo teme le %s.'; 
$lang['Sorry_auth_reply'] = '�al, vendar v tem forumu lahko odgovarjajo na sporo�ila le %s.';
$lang['Sorry_auth_edit'] = '�al, vendar v tem forumu lahko urejajo/popravljajo prispevke le %s.'; 
$lang['Sorry_auth_delete'] = '�al, vendar v tem forumu lahko bri�ejo prispevke le %s.';
$lang['Sorry_auth_vote'] = '�al, vendar v tem forumu lahko glasujejo v anketah le %s.';

// These replace the %s in the above strings
$lang['Auth_Anonymous_Users'] = '<b>Gosti</b>';
$lang['Auth_Registered_Users'] = '<b>Registrirani uporabniki</b>';
$lang['Auth_Users_granted_access'] = '<b>Uporabniki s posebnim dovoljenjem za dostop</b>';
$lang['Auth_Moderators'] = '<b>Moderatorji</b>';
$lang['Auth_Administrators'] = '<b>Administratorji</b>';

$lang['Not_Moderator'] = 'Nisi moderator v tem forumu.';
$lang['Not_Authorised'] = 'Nepoobla��eni';

$lang['You_been_banned'] = 'Iz tega foruma si bil izlo�en.<br />Za dodatne informacije se, prosim, pove�i z Administratorjem ali z upraviteljem foruma.';


//
// Viewonline
//
$lang['Reg_users_zero_online'] = 'Trenutno na zvezi ni registriranih uporabnikov in '; // There are 5 Registered and
$lang['Reg_users_online'] = 'Trenutno je na zvezi %d registriranih uporabnikov in '; // There are 5 Registered and
$lang['Reg_user_online'] = 'Trenutno je na zvezi %d registriran uporabnik in '; // There is 1 Registered and
$lang['Hidden_users_zero_online'] = 'Na zvezi ni skritih uporabnikov'; // 6 Hidden users online
$lang['Hidden_users_online'] = 'Na zvezi je %d skritih uporabnikov'; // 6 Hidden users online
$lang['Hidden_user_online'] = '%d skrit uporabnik na zvezi'; // 6 Hidden users online
$lang['Guest_users_online'] = 'Na zvezi je %d gostov'; // There are 10 Guest users online
$lang['Guest_users_zero_online'] = 'Na zvezi ni gostov'; // There are 10 Guest users online
$lang['Guest_user_online'] = 'Na zvezi je %d gost'; // There is 1 Guest user online
$lang['No_users_browsing'] = 'Trenutno foruma nih�e ne pregleduje priklju�en';

$lang['Online_explain'] = 'Podatki veljajo za uporabnike, ki so aktivni zadnjih pet minut.';

$lang['Forum_Location'] = 'Mesto na forumu';
$lang['Last_updated'] = 'Nazadnje osve�eno';

$lang['Forum_index'] = 'Seznam foruma';
$lang['Logging_on'] = 'Prijavljanje';
$lang['Posting_message'] = 'Po�ilja sporo�ilo';
$lang['Searching_forums'] = 'I��e po forumih';
$lang['Viewing_profile'] = 'Pregleduje profil';
$lang['Viewing_online'] = 'Pregleduje, kdo je na zvezi?';
$lang['Viewing_member_list'] = 'Pregleduje seznam �lanov';
$lang['Viewing_priv_msgs'] = 'Pregleduje zasebna sporo�ila';
$lang['Viewing_FAQ'] = 'Pregleduje Pomo� FAQ';
 
 
//
// Moderator Control Panel
//
$lang['Mod_CP'] = 'Moderatorjeva nadzorna plo��a';
$lang['Mod_CP_explain'] = 'S pomo�jo tega obrazca lahko izvr�ite mno�ico opravkov za ta forum. Lahko zaklenete, odklenete, premaknete ali izbri�ete poljubno �tevilo tem.';

$lang['Select'] = 'Izberi';
$lang['Delete'] = 'Izbri�i';
$lang['Move'] = 'Premakni';
$lang['Lock'] = 'Zakleni';
$lang['Unlock'] = 'Odkleni';

$lang['Topics_Removed'] = 'Izbrane teme so bile uspe�no odstranjene iz baze podatkov.';
$lang['Topics_Locked'] = 'Izbrane teme so zaklenjene.';
$lang['Topics_Moved'] = 'Izbrane teme so premaknjene.';
$lang['Topics_Unlocked'] = 'Izbrane teme so odklenjene.';
$lang['No_Topics_Moved'] = 'Nobena tema ni premaknjena.';

$lang['Confirm_delete_topic'] = 'Ali res �eli� odstraniti izbrane teme?';
$lang['Confirm_lock_topic'] = 'Ali res �eli� zakleniti izbrane teme?';
$lang['Confirm_unlock_topic'] = 'Ali res �eli� odkleniti izbrane teme?';
$lang['Confirm_move_topic'] = 'Ali res �eli� premakniti izbrane teme?';

$lang['Move_to_forum'] = 'Premakni v forum';
$lang['Leave_shadow_topic'] = 'Pusti sled teme v starem forumu.';

$lang['Split_Topic'] = 'Nadzorna plo��a za Razdelitev teme.';
$lang['Split_Topic_explain'] = 'Z uporabo spodnjega obrazca lahko temo razdeli� na dve; ali tako, da <b>ozna�i� posamezne objave</b> vsako posebej ali prelomi� <b>pri</b> ozna�eni objavi.';
$lang['Split_title'] = 'Naslov nove teme';
$lang['Split_forum'] = 'Forum, v katerem bo nova tema';
$lang['Split_posts'] = 'Od-razdeli SAMO OZNA�ENA sporo�ila';
$lang['Split_after'] = 'Prelomi in razdeli OD izbranega sporo�ila naprej';
$lang['Topic_split'] = 'Izbrana tema je bila uspe�no razdeljena.';

$lang['Too_many_error'] = 'Izbral si preve� objav. Za prelom in oddelitev lahko izbere� le eno!';

$lang['None_selected'] = 'Za ta opravek nisi izbral nobene teme. Vrni se in izberi vsaj eno.';
$lang['New_forum'] = 'Nov forum';

$lang['This_posts_IP'] = 'IP naslov za ta prispevek (post)';
$lang['Other_IP_this_user'] = 'Drugi IP naslovi, od koder ta uporabnik objavlja';
$lang['Users_this_IP'] = 'Uporabniki, ki objavljajo s tega IP naslova';
$lang['IP_info'] = 'Podatki iz IP naslova';
$lang['Lookup_IP'] = 'Prika�i IP naslov';


//
// Timezones ... for display on each page
//
$lang['All_times'] = '�asovni pas %s'; // eg. All times are GMT - 12 Hours (times from next block)

$lang['-12'] = 'GMT - 12 ur';
$lang['-11'] = 'GMT - 11 ur';
$lang['-10'] = 'GMT - 10 ur, HST (Hawaii)';
$lang['-9'] = 'GMT - 9 ur';
$lang['-8'] = 'GMT - 8 ur, PST (U.S./Canada)';
$lang['-7'] = 'GMT - 7 ur, MST (U.S./Canada)';
$lang['-6'] = 'GMT - 6 ur, CST (U.S./Canada)';
$lang['-5'] = 'GMT - 5 ur, EST (U.S./Canada)';
$lang['-4'] = 'GMT - 4 ur';
$lang['-3.5'] = 'GMT - 3.5 ure';
$lang['-3'] = 'GMT - 3 ure';
$lang['-2'] = 'GMT - 2 ure, Mid-Atlantic';
$lang['-1'] = 'GMT - 1 uro';
$lang['0'] = 'GMT';
$lang['1'] = 'GMT + 1 ura, srednjeevropski - zimski �as';
$lang['2'] = 'GMT + 2 uri, srednjeevropski - poletni �as';
$lang['3'] = 'GMT + 3 ure';
$lang['3.5'] = 'GMT + 3.5 ure';
$lang['4'] = 'GMT + 4 ure';
$lang['4.5'] = 'GMT + 4.5 ure';
$lang['5'] = 'GMT + 5 ur';
$lang['5.5'] = 'GMT + 5.5 ur';
$lang['6'] = 'GMT + 6 ur';
$lang['6.5'] = 'GMT + 6.5 ur';
$lang['7'] = 'GMT + 7 ur';
$lang['8'] = 'GMT + 8 ur, WST (Australia)';
$lang['9'] = 'GMT + 9 ur';
$lang['9.5'] = 'GMT + 9.5 ur, CST (Australia)';
$lang['10'] = 'GMT + 10 ur, EST (Australia)';
$lang['11'] = 'GMT + 11 ur';
$lang['12'] = 'GMT + 12 ur';

// These are displayed in the timezone select box
$lang['tz']['-12'] = 'GMT - 12 ur';
$lang['tz']['-11'] = 'GMT - 11 ur';
$lang['tz']['-10'] = 'GMT - 10 ur';
$lang['tz']['-9'] = 'GMT - 9 ur';
$lang['tz']['-8'] = 'GMT - 8 ur';
$lang['tz']['-7'] = 'GMT - 7 ur';
$lang['tz']['-6'] = 'GMT - 6 ur';
$lang['tz']['-5'] = 'GMT - 5 ur';
$lang['tz']['-4'] = 'GMT - 4 ure'; 
$lang['tz']['-3.5'] = 'GMT - 3.5 ure';
$lang['tz']['-3'] = 'GMT - 3 ure';
$lang['tz']['-2'] = 'GMT - 2 uri';
$lang['tz']['-1'] = 'GMT - 1 uro';
$lang['tz']['0'] = 'GMT';
$lang['tz']['1'] = '(GMT +1:00 ura) Slovenija, zimski �as';
$lang['tz']['2'] = '(GMT +2:00 uri) Slovenija, poletni �as';
$lang['tz']['3'] = 'GMT + 3 ure';
$lang['tz']['3.5'] = 'GMT + 3.5 ure';
$lang['tz']['4'] = 'GMT + 4 ure';
$lang['tz']['4.5'] = 'GMT + 4.5 ure';
$lang['tz']['5'] = 'GMT + 5 ur';
$lang['tz']['5.5'] = 'GMT + 5.5 ur';
$lang['tz']['6'] = 'GMT + 6 ur';
$lang['tz']['6.5'] = 'GMT + 6.5 ur';
$lang['tz']['7'] = 'GMT + 7 ur';
$lang['tz']['8'] = 'GMT + 8 ur';
$lang['tz']['9'] = 'GMT + 9 ur';
$lang['tz']['9.5'] = 'GMT + 9.5 ur';
$lang['tz']['10'] = 'GMT + 10 ur';
$lang['tz']['11'] = 'GMT + 11 ur';
$lang['tz']['12'] = 'GMT + 12 ur';
$lang['tz']['13'] = 'GMT + 13 ur';

$lang['datetime']['Sunday'] = 'Nedelja';
$lang['datetime']['Monday'] = 'Ponedeljek';
$lang['datetime']['Tuesday'] = 'Torek';
$lang['datetime']['Wednesday'] = 'Sreda';
$lang['datetime']['Thursday'] = '�etrtek';
$lang['datetime']['Friday'] = 'Petek';
$lang['datetime']['Saturday'] = 'Sobota';
$lang['datetime']['Sun'] = 'Ned';
$lang['datetime']['Mon'] = 'Pon';
$lang['datetime']['Tue'] = 'Tor';
$lang['datetime']['Wed'] = 'Sre';
$lang['datetime']['Thu'] = '�et';
$lang['datetime']['Fri'] = 'Pet';
$lang['datetime']['Sat'] = 'Sob';
$lang['datetime']['January'] = 'Januar';
$lang['datetime']['February'] = 'Februar';
$lang['datetime']['March'] = 'Marec';
$lang['datetime']['April'] = 'April';
$lang['datetime']['May'] = 'Maj';
$lang['datetime']['June'] = 'Junij';
$lang['datetime']['July'] = 'Julij';
$lang['datetime']['August'] = 'Avgust';
$lang['datetime']['September'] = 'September';
$lang['datetime']['October'] = 'Oktober';
$lang['datetime']['November'] = 'November';
$lang['datetime']['December'] = 'December';
$lang['datetime']['Jan'] = 'Jan';
$lang['datetime']['Feb'] = 'Feb';
$lang['datetime']['Mar'] = 'Mar';
$lang['datetime']['Apr'] = 'Apr';
$lang['datetime']['May'] = 'Maj';
$lang['datetime']['Jun'] = 'Jun';
$lang['datetime']['Jul'] = 'Jul';
$lang['datetime']['Aug'] = 'Avg';
$lang['datetime']['Sep'] = 'Sep';
$lang['datetime']['Oct'] = 'Okt';
$lang['datetime']['Nov'] = 'Nov';
$lang['datetime']['Dec'] = 'Dec';

//
// Errors (not related to a
// specific failure on a page)
//
$lang['Information'] = 'Obvestilo';
$lang['Critical_Information'] = 'Pomembno obvestilo';

$lang['General_Error'] = 'Splo�na napaka. Ojoj.';
$lang['Critical_Error'] = 'Kriti�na napaka. Ojoj.';
$lang['An_error_occured'] = 'Nastala je napaka. Ojoj.';
$lang['A_critical_error'] = 'Nastala je kriti�na napaka. Ojoj.';

//
// That's all, Folks!
// -------------------------------------------------

?>