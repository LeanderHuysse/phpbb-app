<?php
/***************************************************************************
 *			      lang_main.php [English]
 *				-------------------
 *     begin		    : Sat Dec 16 2000
 *     copyright	    : (C) 2001 The phpBB Group
 *     email		    : support@phpbb.com
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
$lang['ENCODING'] = "iso-8859-1";
$lang['DIRECTION'] = "LTR";
$lang['LEFT'] = "VENSTRE";
$lang['RIGHT'] = "H�YRE";
$lang['DATE_FORMAT'] =	"d M Y"; // This should be changed to the default date format for your language, php date() format

//
// Common, these terms are used
// extensively on several pages
//
$lang['Forum'] = "Forum";
$lang['Category'] = "Kategori";
$lang['Topic'] = "Emne";
$lang['Topics'] = "Emner";
$lang['Replies'] = "Svar";
$lang['Views'] = "Visninger";
$lang['Post'] = "Innlegg";
$lang['Posts'] = "Innlegg";
$lang['Posted'] = "Postet";
$lang['Username'] = "Brukernavn";
$lang['Password'] = "Passord";
$lang['Email'] = "Epost";
$lang['Poster'] = "Poster";
$lang['Author'] = "Av";
$lang['Time'] = "Tid";
$lang['Hours'] = "Timer";
$lang['Message'] = "Melding";

$lang['1_Day'] = "1 Dag";
$lang['7_Days'] = "7 Dager";
$lang['2_Weeks'] = "2 Uker";
$lang['1_Month'] = "1 M�ned";
$lang['3_Months'] = "3 M�neder";
$lang['6_Months'] = "6 M�neder";
$lang['1_Year'] = "1 �r";

$lang['Go'] = "G�";
$lang['Jump_to'] = "G� til";
$lang['Submit'] = "OK";
$lang['Reset'] = "Angre";
$lang['Cancel'] = "Avbryt";
$lang['Preview'] = "Forh�ndsvisning";
$lang['Confirm'] = "Bekreft";
$lang['Spellcheck'] = "Stavekontroll";
$lang['Yes'] = "Ja";
$lang['No'] = "Nei";
$lang['Enabled'] = "P�";
$lang['Disabled'] = "Av";
$lang['Error'] = "Feil";

$lang['Next'] = "Neste";
$lang['Previous'] = "Forrige";
$lang['Goto_page'] = "G� til side";
$lang['Joined'] = "Ble Medlem";
$lang['IP_Address'] = "IP Adresse";

$lang['Select_forum'] = "Velg Forum";
$lang['View_latest_post'] = "Vis Siste Innlegg";
$lang['View_newest_post'] = "Vis Nyeste Innlegg";
$lang['Page_of'] = "Side <b>%d</b> av <b>%d</b>"; // Replaces with: Page 1 of 2 for example

$lang['ICQ'] = "ICQ Nummer";
$lang['AIM'] = "AIM Adresse";
$lang['MSNM'] = "MSN Messenger";
$lang['YIM'] = "Yahoo Messenger";

$lang['Forum_Index'] = "%s Forum Hovedsiden";  // eg. sitename Forum Index, %s can be removed if you prefer

$lang['Post_new_topic'] = "Post Nytt Emne";
$lang['Reply_to_topic'] = "Svar p� Emne";
$lang['Reply_with_quote'] = "Svar med Sitat";

$lang['Click_return_topic'] = "Klikk %sHer%s for � g� tilbake til emnet"; // %s's here are for uris, do not remove!
$lang['Click_return_login'] = "Klikk %sHer%s for � pr�ve igjen";
$lang['Click_return_forum'] = "Klikk %sHer%s for � g� tilbake til forumet";
$lang['Click_view_message'] = "Klikk %sHer%s for � se ditt innlegg";
$lang['Click_return_modcp'] = "Klikk %sHer%s for � g� tilbake til moderator kontrollpanelet";
$lang['Click_return_group'] = "Klikk %sHer%s for � g� tilbake til gruppe-informasjonen";

$lang['Admin_panel'] = "Administrasjonspanel";

$lang['Board_disable'] = "Beklager, forumet er midlertidig nede, pr�v igjen senere";


//
// Global Header strings
//
$lang['Registered_users'] = "Registrerte brukere:";
$lang['Online_users_zero_total'] = "Det er <b>0</b> brukere i forumet :: ";
$lang['Online_users_total'] = "Det er <b>%d</b> brukere i forumet :: ";
$lang['Online_user_total'] = "Det er <b>%d</b> bruker i forumet :: ";
$lang['Reg_users_zero_total'] = "0 Registrerte, ";
$lang['Reg_users_total'] = "%d Registrerte, ";
$lang['Reg_user_total'] = "%d Registrert, ";
$lang['Hidden_users_zero_total'] = "0 Skjulte og ";
$lang['Hidden_users_total'] = "%d Skjulte og  ";
$lang['Hidden_user_total'] = "%d Skjult og ";
$lang['Guest_users_zero_total'] = "0 Gjester";
$lang['Guest_users_total'] = "%d Gjester";
$lang['Guest_user_total'] = "%d Gjest";

$lang['You_last_visit'] = "Du var her sist: %s"; // %s replaced by date/time
$lang['Current_time'] = "Klokken er: %s"; // %s replaced by time

$lang['Search_new'] = "Se innlegg siden du var her sist";
$lang['Search_your_posts'] = "Se dine egne innlegg";
$lang['Search_unanswered'] = "Se ubesvarte innlegg";

$lang['Register'] = "Registrer";
$lang['Profile'] = "Profil";
$lang['Edit_profile'] = "Endre din Profil";
$lang['Search'] = "S�k";
$lang['Memberlist'] = "Medlemsliste";
$lang['FAQ'] = "Hjelp";
$lang['BBCode_guide'] = "BBCode Veiledning";
$lang['Usergroups'] = "Grupper";
$lang['Last_Post'] = "Siste Innlegg";
$lang['Moderator'] = "Moderator";
$lang['Moderators'] = "Moderatorer";


//
// Stats block text
//
$lang['Posted_articles_zero_total'] = "V�re brukere har skrevet <b>0</b> innlegg";
$lang['Posted_article_total'] = "V�re brukere har skrevet <b>%d</b> innlegg"; // Number of posts
$lang['Posted_articles_total'] = "V�re brukere har skrevet <b>%d</b> innlegg"; // Number of posts
$lang['Registered_users_zero_total'] = "Vi har <b>0</b> registrerte brukere"; // # registered users 
$lang['Registered_user_total'] = "Vi har <b>%d</b> registrert bruker"; // # registered users
$lang['Registered_users_total'] = "Vi har <b>%d</b> registrerte brukere"; // # registered users
$lang['Newest_user'] = "Den siste registrerte brukeren er <b>%s%s%s</b>"; // a href, username, /a

$lang['No_new_posts_last_visit'] = "Det er ingen nye innlegg siden ditt siste bes�k";
$lang['No_new_posts'] = "Ingen nye Innlegg";
$lang['New_posts'] = "Nye Innlegg";
$lang['New_post'] = "Nytt Innlegg";
$lang['No_new_posts_hot'] = "Ingen nye Innlegg [ Popul�re ]";
$lang['New_posts_hot'] = "Nye Innlegg [ Popul�re ]";
$lang['No_new_posts_locked'] = "Ingen nye innlegg [ Stengte ]";
$lang['New_posts_locked'] = "Nye Innlegg [ Stengte ]";
$lang['Forum_is_locked'] = "Forumet er Stengt";


//
// Login
//
$lang['Enter_password'] = "Skriv brukernavn og passord for � logge deg p�.";
$lang['Login'] = "Logg Inn";
$lang['Logout'] = "Logg Ut";

$lang['Forgotten_password'] = "Jeg har glemt passordet";

$lang['Log_me_in'] = "Logg meg p� automatisk hver gang";

$lang['Error_login'] = "Du har angitt et feil eller ikke-eksisterende brukernavn, eller feil passord.";


//
// Index page
//
$lang['Index'] = "Hovedsiden";
$lang['No_Posts'] = "Ingen Innlegg";
$lang['No_forums'] = "Det er ingen Aktive forumer";

$lang['Private_Message'] = "Privat Melding";
$lang['Private_Messages'] = "Private Meldinger";
$lang['Who_is_Online'] = "Hvem er Online?";

$lang['Mark_all_forums'] = "Mark�r alle forumene som lest";
$lang['Forums_marked_read'] = "Alle forumene er markert som lest";


//
// Viewforum
//
$lang['View_forum'] = "Vis Forum";

$lang['Forum_not_exist'] = "Forumet du har valgt finnes ikke";
$lang['Reached_on_error'] = "Du har kommet til denne siden ved en feil";

$lang['Display_topics'] = "Vis Emner fra";
$lang['All_Topics'] = "Alle Emner";

$lang['Topic_Announcement'] = "<b>Annonsering :</b>";
$lang['Topic_Sticky'] = "<b>Prioritert :</b>";
$lang['Topic_Moved'] = "<b>Flyttet :</b>";
$lang['Topic_Poll'] = "<b>[ Avstemning ]</b>";

$lang['Mark_all_topics'] = "Marker alle emner som lest";
$lang['Topics_marked_read'] = "Emnene i dette forumet er markert som lest";

$lang['Rules_post_can'] = "Du <b>kan</b> starte nye emner i dette forumet";
$lang['Rules_post_cannot'] = "Du <b>kan ikke</b> starte nye emner i dette forumet";
$lang['Rules_reply_can'] = "Du <b>kan</b> svare i emner i dette forumet";
$lang['Rules_reply_cannot'] = "Du <b>kan ikke</b> du kan svare p� emner i dette forumet";
$lang['Rules_edit_can'] = "Du <b>kan</b> endre dine egne innlegg i dette forumet";
$lang['Rules_edit_cannot'] = "Du <b>kan ikke</b> endre dine egne innlegg i dette forumet";
$lang['Rules_delete_can'] = "Du <b>kan</b> slette dine egne innlegg i dette forumet";
$lang['Rules_delete_cannot'] = "Du <b>kan ikke</b> slette dine egne innlegg i dette forumet";
$lang['Rules_vote_can'] = "Du <b>kan</b> delta i avstemninger i dette forumet";
$lang['Rules_vote_cannot'] = "Du <b>kan ikke</b> delta i avstemninger i dette forumet";
$lang['Rules_moderate'] = "Du <b>kan</b> %smoderere dette forumet%s"; // %s replaced by a href links, do not remove!

$lang['No_topics_post_one'] = "Det er ingen innlegg i dette forumet<br />Klikk p� <b>Nytt Emne</b> linken p� denne siden for � postere det f�rste emnet";


//
// Viewtopic
//
$lang['View_topic'] = "Vis Emnet";

$lang['Guest'] = 'Gjest';
$lang['Post_subject'] = "Tittel";
$lang['View_next_topic'] = "Vis Neste Emne";
$lang['View_previous_topic'] = "Vis Forrige Emne";
$lang['Submit_vote'] = "Avgi Stemme";
$lang['View_results'] = "Vis Reslutater";

$lang['No_newer_topics'] = "Det er ingen nyere emner i dette forumet";
$lang['No_older_topics'] = "Det er ingen eldre emner i dette forumet";
$lang['Topic_post_not_exist'] = "Emnet eller innlegget finnes ikke";
$lang['No_posts_topic'] = "Det finnes ingen innlegg i dette emnet";

$lang['Display_posts'] = "Vis Innlegg fra";
$lang['All_Posts'] = "Alle Innlegg";
$lang['Newest_First'] = "Nyeste F�rst";
$lang['Oldest_First'] = "Eldste F�rst";

$lang['Back_to_top'] = "Til Toppen";

$lang['Read_profile'] = "Vis Medlemmets Profil";
$lang['Send_email'] = "Send Epost til Medlemmet";
$lang['Visit_website'] = "Bes�k Medelemmet Nettside";
$lang['ICQ_status'] = "ICQ Status";
$lang['Edit_delete_post'] = "Endre/Slett dette Innlegget";
$lang['View_IP'] = "Vis Medlemmets IP";
$lang['Delete_post'] = "Slett dette Innlegget";

$lang['wrote'] = "skrev"; // proceeds the username and is followed by the quoted text
$lang['Quote'] = "Sitat"; // comes before bbcode quote output.
$lang['Code'] = "Kode"; // comes before bbcode code output.

$lang['Edited_time_total'] = "Sist endret av %s den %s, endret %d gang"; // Last edited by me on 12 Oct 2001, edited 1 time in total
$lang['Edited_times_total'] = "Sist endret av %s den %s, endret %d ganger"; // Last edited by me on 12 Oct 2001, edited 2 times in total

$lang['Lock_topic'] = "Steng dette Emnet";
$lang['Unlock_topic'] = "�pne dette Emnet";
$lang['Move_topic'] = "Flytt dette Emnet";
$lang['Delete_topic'] = "Slett dette Emnet";
$lang['Split_topic'] = "Del dette Emnet";

$lang['Stop_watching_topic'] = "Avslutt abonnementet p� dette emnet";
$lang['Start_watching_topic'] = "Abonner p� dette emnet";
$lang['No_longer_watching'] = "Abonnementet p� dette emnet er avluttet";
$lang['You_are_watching'] = "Abonnementet p� dette emnet er opprettet";


//
// Posting/Replying (Not private messaging!)
//
$lang['Message_body'] = "Innhold";
$lang['Topic_review'] = "Emne";

$lang['No_post_mode'] = "Handlings modus er ikke spesifisert"; // If posting.php is called without a mode (newtopic/reply/delete/etc, shouldn't be shown normaly)

$lang['Post_a_new_topic'] = "Poster et nytt emne";
$lang['Post_a_reply'] = "Poster et svar";
$lang['Post_topic_as'] = "Poster emnet som";
$lang['Edit_Post'] = "Endre innlegget";
$lang['Options'] = "Valg";

$lang['Post_Announcement'] = "Annonsering";
$lang['Post_Sticky'] = "Prioritert";
$lang['Post_Normal'] = "Normal";

$lang['Confirm_delete'] = "Er du sikker p� at du �nsker � slette dette innlegget?";
$lang['Confirm_delete_poll'] = "Er du sikker p� at du �nsker � slette denne avstemningen?";

$lang['Flood_Error'] = "Du kan ikke legge til emner s� raskt etter hverandre, pr�v igjen om en liten stund";
$lang['Empty_subject'] = "Du m� angi en tittel n�r du starter et nytt emne";
$lang['Empty_message'] = "Du m� legge til innhold i emnefeltet";
$lang['Forum_locked'] = "Dette forumet er stengt, du kan ikke postere nye, svare p� eller endre emner";
$lang['Topic_locked'] = "Dette emnet er stengt, du kan ikke endre innlegget eller postere nye svar";
$lang['No_post_id'] = "Du m� angi hvilket innlegg du �nsker � endre.";
$lang['No_topic_id'] = "Du m� angi hvilket emne du skal svare p�.";
$lang['No_valid_mode'] = "Du har kun lov til � poste, svare, endre eller sitere innlegg, g� tilbake og fors�k p� nytt";
$lang['No_such_post'] = "Innlegget finnes ikke, g� tilbake og fors�k p� nytt";
$lang['Edit_own_posts'] = "Du kan bare endre dine egne innlegg";
$lang['Delete_own_posts'] = "Du kan bare slette dine egne innlegg";
$lang['Cannot_delete_replied'] = "Du kan ikke slette innlegg som allerede er besvart";
$lang['Cannot_delete_poll'] = "Du kan ikke slette en aktiv avstemning";
$lang['Empty_poll_title'] = "Du m� angi en tittel p� avstemningen";
$lang['To_few_poll_options'] = "Du m� angi minst 2 alternativer p� avstemningen";
$lang['To_many_poll_options'] = "Du har angitt for mange alternativer p� avstemningen";
$lang['Post_has_no_poll'] = "Dette innlegget har ingen avstemning";

$lang['Add_poll'] = "Legg til en avstemning";
$lang['Add_poll_explain'] = "La disse feltene v�re blanke dersom du ikke skal legge til en avstemning.";
$lang['Poll_question'] = "Avstemningens sp�rsm�l";
$lang['Poll_option'] = "Avstemningens alternativ";
$lang['Add_option'] = "Legg til alternativ";
$lang['Update'] = "Oppdater";
$lang['Delete'] = "Slett";
$lang['Poll_for'] = "Antall aktive dager";
$lang['Poll_for_explain'] = "[ Skriv 0 eller la feltet v�re tomt for � angi en avstemning uten sluttdato ]";
$lang['Delete_poll'] = "Slett avstemning";

$lang['Disable_HTML_post'] = "Deaktiver HTML i dette innlegget";
$lang['Disable_BBCode_post'] = "Deaktiver BBCode i dette innlegget";
$lang['Disable_Smilies_post'] = "Deaktiver Smil i dette innlegget";

$lang['HTML_is_ON'] = "HTML er <u>P�</u>";
$lang['HTML_is_OFF'] = "HTML er <u>AV</u>";
$lang['BBCode_is_ON'] = "%sBBCode%s er <u>P�</u>"; // %s are replaced with URI pointing to FAQ
$lang['BBCode_is_OFF'] = "%sBBCode%s is <u>AV</u>";
$lang['Smilies_are_ON'] = "Smil er <u>P�</u>";
$lang['Smilies_are_OFF'] = "Smil er <u>AV</u>";

$lang['Attach_signature'] = "Bruk signatur (endre signaturen i profilen)";
$lang['Notify'] = "Varsle svar p� dette emnet";
$lang['Delete_post'] = "Slett dette innlegget";

$lang['Stored'] = "Innlegget er lagt til";
$lang['Deleted'] = "Innlegget er slettet";
$lang['Poll_delete'] = "Avstemningen er slettet";
$lang['Vote_cast'] = "Din stemme er registert";

$lang['Topic_reply_notification'] = "Varsel om svar p� emne";

$lang['bbcode_b_help'] = "Fet tekst: [b]tekst[/b]  (alt+b)";
$lang['bbcode_i_help'] = "Kursiv tekst: [i]tekst[/i]  (alt+i)";
$lang['bbcode_u_help'] = "Understrek tekst: [u]tekst[/u]  (alt+u)";
$lang['bbcode_q_help'] = "Siter tekst: [quote]tekst[/quote]  (alt+q)";
$lang['bbcode_c_help'] = "Vis kode: [code]kode[/code]  (alt+c)";
$lang['bbcode_l_help'] = "Liste: [list]tekst[/list] (alt+l)";
$lang['bbcode_o_help'] = "Sortert liste: [list=]tekst[/list]  (alt+o)";
$lang['bbcode_p_help'] = "Legg til bilde: [img]http://bilde_url[/img]  (alt+p)";
$lang['bbcode_w_help'] = "Legg til URL: [url]http://url[/url] eller [url=http://url]URL tekst[/url]  (alt+w)";
$lang['bbcode_a_help'] = "Lukk alle �pne BBCode tagger";
$lang['bbcode_s_help'] = "Font farge: [color=red]tekst[/color]	Tips: du kan ogs� benytte color=#FF0000";
$lang['bbcode_f_help'] = "Font st�rrelse: [size=x-small]liten tekst[/size]";

$lang['Emoticons'] = "Smil";
$lang['More_emoticons'] = "Vis flere smil";

$lang['Font_color'] = "Font farge";
$lang['color_default'] = "Standard";
$lang['color_dark_red'] = "M�rk r�d";
$lang['color_red'] = "R�d";
$lang['color_orange'] = "Oransje";
$lang['color_brown'] = "Brun";
$lang['color_yellow'] = "Gul";
$lang['color_green'] = "Gr�nn";
$lang['color_olive'] = "Oliven";
$lang['color_cyan'] = "Cyan";
$lang['color_blue'] = "Bl�";
$lang['color_dark_blue'] = "M�rk bl�";
$lang['color_indigo'] = "Indigo";
$lang['color_violet'] = "Fiolet";
$lang['color_white'] = "Hvit";
$lang['color_black'] = "Sort";

$lang['Font_size'] = "Font st�rrelse";
$lang['font_tiny'] = "Ekstra liten";
$lang['font_small'] = "Liten";
$lang['font_normal'] = "Vanlig";
$lang['font_large'] = "Stor";
$lang['font_huge'] = "Ekstra stor";

$lang['Close_Tags'] = "Lukk tagger";
$lang['Styles_tip'] = "Tips: Du kan formatere merket tekst";


//
// Private Messaging
//
$lang['Private_Messaging'] = "Private meldinger";

$lang['Login_check_pm'] = "Sjekk private meldinger";
$lang['New_pms'] = "Du har %d ny melding"; // You have 2 new messages
$lang['New_pm'] = "Du har %d nye meldinger"; // You have 1 new message
$lang['No_new_pm'] = "Du har ingen nye meldinger";
$lang['Unread_pms'] = "Du har %d uleste meldinger";
$lang['Unread_pm'] = "Du har %d ulest melding";
$lang['No_unread_pm'] = "Du har ingen uleste meldinger";
$lang['You_new_pm'] = "Du har 1 ny melding i Innboksen";
$lang['You_new_pms'] = "Du har nye meldinger i Innboksen";
$lang['You_no_new_pm'] = "Du har ingen ny meldinger";

$lang['Inbox'] = "Innboks";
$lang['Outbox'] = "Utboks";
$lang['Savebox'] = "Lagrede meldinger";
$lang['Sentbox'] = "Sendte meldinger";
$lang['Flag'] = "Flag";
$lang['Subject'] = "Emne";
$lang['From'] = "Fra";
$lang['To'] = "Til";
$lang['Date'] = "Dato";
$lang['Mark'] = "Merk";
$lang['Sent'] = "Sendt";
$lang['Saved'] = "Lagret";
$lang['Delete_marked'] = "Slett merkede";
$lang['Delete_all'] = "Slett alle";
$lang['Save_marked'] = "Lagre merkede";
$lang['Save_message'] = "Lagre melding";
$lang['Delete_message'] = "Slett melding";

$lang['Display_messages'] = "Vis meldinger fra"; // Followed by number of days/weeks/months
$lang['All_Messages'] = "Alle meldinger";

$lang['No_messages_folder'] = "Du har ingen meldinger i denne katalogen";

$lang['PM_disabled'] = "Private meldinger er deaktivert p� dette forumet";
$lang['Cannot_send_privmsg'] = "Beklager, du har ikke n�dvendige rettigheteter til � sende private meldinger.";
$lang['No_to_user'] = "Du m� spesifisere brukernavnet meldingen skal sendes til.";
$lang['No_such_user'] = "Brukernavnet finnes ikke";

$lang['Message_sent'] = "Meldingen er sendt";

$lang['Click_return_inbox'] = "Klikk %sher%s for � g� tilbake til innboksen";
$lang['Click_return_index'] = "Klikk %sher%s for � g� tilbake til Forumenes hovedside";

$lang['Send_a_new_message'] = "Send en privat melding";
$lang['Send_a_reply'] = "Svar p� privat melding";
$lang['Edit_message'] = "Endre privat melding";

$lang['Notification_subject'] = "Du har mottatt en privat melding";

$lang['Find_username'] = "Finn brukernavn";
$lang['Find'] = "Finn";
$lang['No_match'] = "Ingen treff";

$lang['No_post_id'] = "Ingen meldings-id er spesifisert";
$lang['No_such_folder'] = "Katalogen finnes ikke";
$lang['No_folder'] = "Ingen katalog er spesifisert";

$lang['Mark_all'] = "Merk alle";
$lang['Unmark_all'] = "Fjern merking p� alle";

$lang['Confirm_delete_pm'] = "Er du sikker p� at du �nsker � slette denne meldingen?";
$lang['Confirm_delete_pms'] = "Er du sikker p� at du �nsker � slette disse meldingene?";

$lang['Inbox_size'] = "Innboksen bruker %d%% av tilgjengelig kapasitet"; // eg. Your Inbox is 50% full
$lang['Sentbox_size'] = "Sendte meldinger bruker %d%% av tilgjengelig kapasitet";
$lang['Savebox_size'] = "Lagrede meldinger bruker %d%% av tilgjengelig kapasitet";

$lang['Click_view_privmsg'] = "Klikk %sher%s for � g� til innboksen";


//
// Profiles/Registration
//
$lang['Viewing_user_profile'] = "Profil :: %s"; // %s is username
$lang['About_user'] = "Informasjon om %s"; // %s is username

$lang['Preferences'] = "Innstillinger";
$lang['Items_required'] = "Felter merket med * er obligatoriske om ikke annet er angit.";
$lang['Registration_info'] = "Medlemsinformasjon";
$lang['Profile_info'] = "Profil informasjon";
$lang['Profile_info_warn'] = "Denne informasjon er offentlig tilgjengelig";
$lang['Avatar_panel'] = "Avatar kontrollpanel";
$lang['Avatar_gallery'] = "Avatar galleri";

$lang['Website'] = "Nettside";
$lang['Location'] = "Bosted";
$lang['Contact'] = "Kontakt";
$lang['Email_address'] = "Epostadresse";
$lang['Email'] = "Epost";
$lang['Send_private_message'] = "Send privat melding";
$lang['Hidden_email'] = "[ Hidden ]";
$lang['Search_user_posts'] = "S�k etter denne brukerens innlegg";
$lang['Interests'] = "Interesser";
$lang['Occupation'] = "Yrke";
$lang['Poster_rank'] = "Rangering";

$lang['Total_posts'] = "Antall innlegg";
$lang['User_post_pct_stats'] = "%.2f%% av alle innlegg"; // 1.25% of total
$lang['User_post_day_stats'] = "%.2f av innlegg pr. dag"; // 1.5 posts per day
$lang['Search_user_posts'] = "Finn alle %s innlegg"; // Find all posts by username

$lang['No_user_id_specified'] = "Dette medlemmet finnes ikke";
$lang['Wrong_Profile'] = "Du kan ikke endre andre medlemmers profil.";
$lang['Sorry_banned_or_taken_email'] = "Epostadressen er utestengt eller allerede i bruk av en annen bruker. Fors�k med en annen adresse, be administrator om r�d hvis den ogs� er utestengt eller i bruk.";
$lang['Only_one_avatar'] = "Du kan bare angi en type avatar";
$lang['File_no_data'] = "Filen p� URL-en du oppgav innheloder ikke data";
$lang['No_connection_URL'] = "Det er ikke mulig � n� URL-en du oppgav";
$lang['Incomplete_URL'] = "URL-en du oppgav er ikke komplett";
$lang['Wrong_remote_avatar_format'] = "URL-en til avatar-en er ikke gyldig";
$lang['No_send_account_inactive'] = "Passord kan ikke sendes fordi brukerkontoen din er deaktivert, kontakt adminsitrator for mer informasjon.";

$lang['Always_smile'] = "Smil alltid tillat";
$lang['Always_html'] = "HTML alltid tillat";
$lang['Always_bbcode'] = "BBCode alltid tillat";
$lang['Always_add_sig'] = "Bruk alltid signatur";
$lang['Always_notify'] = "Varsle alle svar";
$lang['Always_notify_explain'] = "Sender en epost hver gang noen svarer i et emne du deltar i. Dette kan du endre for hvert enkelt innlegg.";

$lang['Board_style'] = "Forum stil";
$lang['Board_lang'] = "Forum spr�k";
$lang['No_themes'] = "Det er ingen tilgjengelige stiler";
$lang['Timezone'] = "Tidssone";
$lang['Date_format'] = "Dato format";
$lang['Date_format_explain'] = "Formatet er det samme som benyttes i PHP <a href=\"http://www.php.net/date\" target=\"_other\">date()</a>";
$lang['Signature'] = "Signatur";
$lang['Signature_explain'] = "Signaturen kan legges til i slutten p� alle dine innlegg. Signaturer er bregrenset oppad til %d tegn";
$lang['Public_view_email'] = "Vis alltid epostadressen";

$lang['Current_password'] = "Passord";
$lang['New_password'] = "Nytt passord";
$lang['Confirm_password'] = "Bekreft nytt passord";
$lang['password_if_changed'] = "Du skal kun skrive inn et nytt passord hvis du �nsker � endre det.";
$lang['password_confirm_if_changed'] = "Du skal kun bekrefte nytt passord hvis du �nsker � endre det.";

$lang['Avatar'] = "Avatar";
$lang['Avatar_explain'] = "Viser et ikon sammen med din brukerinformasjon i innleggene. Det er kun mulig � vise et ikon om gangen, som er maks %d piksler bredt og %d piksler h�yt, og hvor filst�rrelsen ikke overstiger %dkB."; 
$lang['Upload_Avatar_file'] = "Last opp en avatar fra din pc.";
$lang['Upload_Avatar_URL'] = "Hent avatar fra en URL";
$lang['Upload_Avatar_URL_explain'] = "Skriv in URL-en til bilde du �nsker � benytte som avatar, bilde vil bli kopiert hit.";
$lang['Pick_local_Avatar'] = "Velg avatar fra galleriet";
$lang['Link_remote_Avatar'] = "Link til en avatar p� en annen nettside";
$lang['Link_remote_Avatar_explain'] = "Skriv in URL-en til bilde du �nsker � benytte som avatar.";
$lang['Avatar_URL'] = "Avatar-ens URL";
$lang['Select_from_gallery'] = "Velg Avatar fra galleriet";
$lang['View_avatar_gallery'] = "Vis galleriet";

$lang['Select_avatar'] = "Velg avatar";
$lang['Return_profile'] = "Avbryt avatar";
$lang['Select_category'] = "Velg kategori";

$lang['Delete_Image'] = "Slett bilde";
$lang['Current_Image'] = "N�v�rende bilde";

$lang['Notify_on_privmsg'] = "Varsling ved ny(e) privat(e) melding(er)";
$lang['Popup_on_privmsg'] = "Pop-up varsling ved ny privat melding";
$lang['Popup_on_privmsg_explain'] = "Noen stiler kan �pne et nytt vindu for � varsle deg om nye private meldinger";
$lang['Hide_user'] = "Skjul at du er online";

$lang['Profile_updated'] = "Profilen din er oppdatert";
$lang['Profile_updated_inactive'] = "Profilen din er oppdatert, men siden du har endret s� viktige elementer er medlemskapet ditt deaktivert. Det er sendt en epost til deg med n�dvendig informasjon for � reaktivere medlemsskapet ditt. Hvis administrator m� re-aktivere medlemskapet ditt vil det skje i n�rmeste fremtid.";

$lang['Password_mismatch'] = "Passordene du oppgav er ikke like";
$lang['Current_password_mismatch'] = "Passordet du oppgav stemmer ikke med det som er lagret i databasen";
$lang['Invalid_username'] = "Brukernavnet du �nsker er opptatt, forbudt av administrator eller innholder ulovlige tegn som f.eks. \"";
$lang['Signature_too_long'] = "Signaturen er for lang";
$lang['Fields_empty'] = "Du m� fylle ut alle obligatoriske felt";
$lang['Avatar_filetype'] = "Avatar m� v�re .jpg, .gif eller .png filer";
$lang['Avatar_filesize'] = "Avatar-en m� v�re mindre enn %d kB"; // The avatar image file size must be less than 6 kB
$lang['Avatar_imagesize'] = "Avatar-en m� v�re mindre enn %d piksler bred og %d piksler h�y";

$lang['Welcome_subject'] = "Velkommen til forumene p� %s"; // Welcome to my.com forums
$lang['New_account_subject'] = "Ny brukerkonto";
$lang['Account_activated_subject'] = "Brukerkontoen er aktivert";

$lang['Account_added'] = "Takk for at du registerte deg som medlem, brukerkontoen din er aktivert. Du kan logge deg p� med brukernavnet og passordet ditt.";
$lang['Account_inactive'] = "Brukerkontoen din er opprettet. Bu m� bekrefte brukerkontoen, aktiviseringsn�kkelen er sendt til epostadressen du oppgav.";
$lang['Account_inactive_admin'] = "Brukerkontoen din er opprettet, og m� godkjennes av administrator. N�dvendig informasjon vil bli sendt til epostadressen du oppgav n�r brukerkontoen din er aktivert.";
$lang['Account_active'] = "Brukerkontoen din er n� aktivert";
$lang['Account_active_admin'] = "Medlemskapet ditt er n� re-aktivert";
$lang['Reactivate'] = "Re-aktiver medlemsskapet ditt!";
$lang['COPPA'] = "Brukerkontoen din er opprettet, men m� godkjennes, du har motatt en epost med n�dvendig informasjon.";

$lang['Registration'] = "Betingelser for Medlemskap";
$lang['Reg_agreement'] = "Administrator(ene) og moderator(ene) p� forumene fors�ker � fjerne eller redigere alle st�tende innlegg s� fort som mulig, men det er umulig � overv�ke alle emner og innlegg. Du m� annerkjenne at alle innlegg i forumene representerer  den enkelte brukers syn og holdninger, og vil ikke stille administrator(ene), moderator(ene), webmaster(ene) og/eller webredakt�r(ene) til ansvar for innholdet i innleggene, med unntak av deres egene innlegg.<br /><br />Du annerkjenner at du ikke har anledning til � skrive st�tende, uanstendig, vulg�rt, injurerende, hatsk, truende, pornografiske eller andre typer innlegg som kan v�re eller er i strid med gjelende lovverk. Om du skriver denne type innlegg vil du bli �yeblikkelig og permanent utestengt fra forumene, og din isp (internettleverand�r) vil bli varslet. IP-adressen i alle innleggene registreres og vil bli benyttet til � opprettholde disse betingelsene. Du godkjenner at webmaster(ene), administrator(ene) og moderator(ene) p� disse formuene har rett til � fjerne, redigere, flytte eller stenge et hvert emne n�r de anser det n�dvendig. Som bruker godtar du at all informasjon du oppgir blir lagret i en database. Denne informasjonen vil ikke bli utlevert til tredjepart uten din godkjenning, men webmaster(ene), administrator(ene) og moderator(ene) kan ikke stilles ansvarlig for hacking ol. som kan medf�re tap av eller innsyn i databasen.<br /><br />Disse forumene bruker cookies (informasjonskapsler) til � lagre informasjon lokalt p� din datamaskin. Cookiene inneholder ikke informasjonen du oppgir, men brukes for � tilby en best mulig brukeropplevelse p� forumene. Din epostadresse brukes bare i forbindelse med registeringsprosessen, og for � sende nytt passord dersom du �nsker/ber om det.<br /><br />Du godkjenner disse betingelsene ved � klikke p� registeringslinken under.";

$lang['Agree_under_13'] = "Jeg godtar disse betingelsene og er <b>under</b> 13 �r";
$lang['Agree_over_13'] = "Jeg godtar disse betingelsene og er <b>over</b> 13 �r.";
$lang['Agree_not'] = "Jeg godtar ikke disse betingelsene";

$lang['Wrong_activation'] = "Aktiveringsn�kkelen du oppgav stemmer ikke med aktiveringsn�kkelen i databasen.";
$lang['Send_password'] = "Send meg et nytt passord";
$lang['Password_updated'] = "Det nye passordet er generert, og du vil motta en epost med n�dvendig informasjon for � ta det i bruk";
$lang['No_email_match'] = "Epostadressen du oppgav stemmer ikke med epostadressen for dette brukernavnet.";
$lang['New_password_activation'] = "Aktiver nytt passord";
$lang['Password_activated'] = "Brukerkontoen din er re-aktivert, logg p� med passordet i eposten du mottok";

$lang['Send_email_msg'] = "Send en epost";
$lang['No_user_specified'] = "Du har ikke spesifisert et brukernavn";
$lang['User_prevent_email'] = "Dette medlemmet �nsker ikke � motta epost, pr�v � send en privat melding.";
$lang['User_not_exist'] = "Brukernavnet eksisterer ikke";
$lang['CC_email'] = "Send kopi av denne eposten til deg selv";
$lang['Email_message_desc'] = "Eposten blir sendt som ren tekst, du kan ikke benytte HTML eller BBCode. Din epostadreses blir satt som returadresse.";
$lang['Flood_email_limit'] = "Det er ikke mulig � sende epost n�, pr�ve igjen senere.";
$lang['Recipient'] = "Mottaker";
$lang['Email_sent'] = "Eposten er sendt";
$lang['Send_email'] = "Send epost";
$lang['Empty_subject_email'] = "Du m� spesifisere et emne for eposten";
$lang['Empty_message_email'] = "Du m� skrive en melding i eposten";


//
// Memberslist
//
$lang['Select_sort_method'] = "Sorter etter";
$lang['Sort'] = "Sorter";
$lang['Sort_Top_Ten'] = "10 mest aktive medlemmer";
$lang['Sort_Joined'] = "Ble medlem";
$lang['Sort_Username'] = "Brukernavn";
$lang['Sort_Location'] = "Bosted";
$lang['Sort_Posts'] = "Antall innlegg";
$lang['Sort_Email'] = "Epost";
$lang['Sort_Website'] = "Nettside";
$lang['Sort_Ascending'] = "Stigende";
$lang['Sort_Descending'] = "Synkende";
$lang['Order'] = "Sorter";


//
// Group control panel
//
$lang['Group_Control_Panel'] = "Gruppe Kontrollpanel";
$lang['Group_member_details'] = "Gruppe Medlemskap";
$lang['Group_member_join'] = "Bli Medlem i en Gruppe";

$lang['Group_Information'] = "Gruppe Informasjon";
$lang['Group_name'] = "Gruppe Navn";
$lang['Group_description'] = "Gruppe Beskrivelse";
$lang['Group_membership'] = "Gruppe Medlemskap";
$lang['Group_Members'] = "Gruppe Medlemmer";
$lang['Group_Moderator'] = "Gruppe Moderator";
$lang['Pending_members'] = "Medlemskandidater";

$lang['Group_type'] = "Gruppe Type";
$lang['Group_open'] = "�pen Gruppe";
$lang['Group_closed'] = "Lukket Gruppe";
$lang['Group_hidden'] = "Skjult Gruppe";

$lang['Current_memberships'] = "Du er medlem i";
$lang['Non_member_groups'] = "Du er ikke medlem i";
$lang['Memberships_pending'] = "Du har s�kt om medlemskap i";

$lang['No_groups_exist'] = "Det finnes ingen grupper";
$lang['Group_not_exist'] = "Denne gruppen finnes ikke";

$lang['Join_group'] = "Send S�knad";
$lang['No_group_members'] = "Det er ingen medlemmer i denne gruppen";
$lang['Group_hidden_members'] = "Denne gruppen er skjult, du har ikke rettigheter til � se medlemslisten.";
$lang['No_pending_group_members'] = "Denne gruppen har ingen ubehandlede s�knader om medlemsskap";
$lang["Group_joined"] = "S�knaden er levert<br />Du blir varslet n�r s�knaden er behandlet av en gruppe-modrator";
$lang['Group_request'] = "En s�knad om deltagelse i din gruppe er levert";
$lang['Group_approved'] = "Din s�knad er innvilget";
$lang['Group_added'] = "Du er n� lagt til i denne grupppen";
$lang['Already_member_group'] = "Du er allerede medlem av denne gruppen";
$lang['User_is_member_group'] = "Medlemmet du oppgav er allerede medlem av denne gruppen";
$lang['Group_type_updated'] = "Gruppe typen er oppdatert";

$lang['Could_not_add_user'] = "Den valgte brukeren finnes ikke";

$lang['Confirm_unsub'] = "Er du sikker p� at du �nsker � avbryte medlemsskapet i denne gruppen?";
$lang['Confirm_unsub_pending'] = "Din s�knad om medlemskap i denne gruppen er ikke behandlet enda, er du sikker p� at �nsker � avbryte medlemskapet n�?";

$lang['Unsub_success'] = "Medlemskapet ditt i denne er avsluttet.";

$lang['Approve_selected'] = "Godkjend merkede";
$lang['Deny_selected'] = "Avvis merkede";
$lang['Not_logged_in'] = "Du m� v�re p�logget for � s�ke om medlemssakp i en gruppe.";
$lang['Remove_selected'] = "Fjern merkede";
$lang['Add_member'] = "Legg til medlem";
$lang['Not_group_moderator'] = "Du er ikke gruppe moderator, og har ikke rettigheter til � utf�re denne handlingen.";

$lang['Login_to_join'] = "Du m� logge p� for � s�ke om medlemsskap eller administrere grupper";
$lang['This_open_group'] = "Dette er en �pen gruppe, klikk for � s�ke om medlemsskap";
$lang['This_closed_group'] = "Dette er en lukket gruppe, det er ikke lenger mulig � s�ke om medlemsskap";
$lang['This_hidden_group'] = "Dette er en skjult gruppe, og automatisk oppretting av medlemskap er ikke tillatt.";
$lang['Member_this_group'] = "Du er medlem av denne gruppen";
$lang['Pending_this_group'] = "Din s�knad om medlemskap er ikke behandlet.";
$lang['Are_group_moderator'] = "Du er gruppe-moderator";
$lang['None'] = "Ingen";

$lang['Subscribe'] = "S�k om Medlemskap";
$lang['Unsubscribe'] = "Avbryt Medlemsskap";
$lang['View_Information'] = "Vis Gruppe Informasjon";


//
// Search
//
$lang['Search_query'] = "S�ke-Kriterier";
$lang['Search_options'] = "S�ke-Instillinger";

$lang['Search_keywords'] = "S�k etter stikkord";
$lang['Search_keywords_explain'] = "Du kan benytte <u>AND</u> for � spesificere ord som skal gi treff, <u>OR</u> for � spesifisere ord som kan gi treff og <u>NOT</u> for � spesifisere ord som ikke skal gi treff. Bruk * som wildcard for � s�ke etter deler av ord.";
$lang['Search_author'] = "S�k etter medlem";
$lang['Search_author_explain'] = "Bruk * som wildcard for � s�ke etter deler av ord";

$lang['Search_for_any'] = "S�k etter enkelt ord eller hele s�kestrengen som angitt";
$lang['Search_for_all'] = "S�k etter alle ordene";

$lang['Return_first'] = "Vis de"; // followed by xxx characters in a select box
$lang['characters_posts'] = "f�rste tegnene i innlegget(ene)";

$lang['Search_previous'] = "Tidsbegrens s�ket"; // followed by days, weeks, months, year, all in a select box

$lang['Sort_by'] = "Sorter etter";
$lang['Sort_Time'] = "Dato";
$lang['Sort_Post_Subject'] = "Innlegg tittel";
$lang['Sort_Topic_Title'] = "Emne tittel";
$lang['Sort_Author'] = "Av";
$lang['Sort_Forum'] = "Forum";

$lang['Display_results'] = "Vis treff som";
$lang['All_available'] = "Alle tilgjengelige";
$lang['No_searchable_forums'] = "Du har ikke rettigheter til � s�ke i forumene";

$lang['No_search_match'] = "S�ket gav ikke treff";
$lang['Found_search_match'] = "S�ket gav %d treff"; // eg. Search found 1 match
$lang['Found_search_matches'] = "S�ket gav %d treff"; // eg. Search found 24 matches

$lang['Close_window'] = "Lukk vindu";


//
// Auth related entries
//
// Note the %s will be replaced with one of the following 'user' arrays
$lang['Sorry_auth_announce'] = "Det er bare %s som kan postere announcements i dette forumet";
$lang['Sorry_auth_sticky'] = "Det er bare %s som kan postere sticky messages i dette forumet";
$lang['Sorry_auth_read'] = "Det er bare %s som kan lese emner i dette forumet";
$lang['Sorry_auth_post'] = "Det er bare %s som kan postere nye emner i dette forumet";
$lang['Sorry_auth_reply'] = "Det er bare %s som kan svare p� innlegg";
$lang['Sorry_auth_edit'] = "Det er bare %s som kan endre innlegg i dette forumet";
$lang['Sorry_auth_delete'] = "Det er bare %s som kan slette innlegg i dette forumet";
$lang['Sorry_auth_vote'] = "Det er bare %s bare";

// These replace the %s in the above strings
$lang['Auth_Anonymous_Users'] = "<b>gjester</b>";
$lang['Auth_Registered_Users'] = "<b>medlemmer</b>";
$lang['Auth_Users_granted_access'] = "<b>medlemmer med spesielle rettigheter</b>";
$lang['Auth_Moderators'] = "<b>moderatorer</b>";
$lang['Auth_Administrators'] = "<b>administratorer</b>";

$lang['Not_Moderator'] = "Du er ikke moderator for dette forumet";
$lang['Not_Authorised'] = "Ikke autorisert";

$lang['You_been_banned'] = "Du er utestengt fra dette forumet<br />Kontakt webmaster eller forum administrator for hvis du �nsker mer informasjon.";


//
// Viewonline
//
$lang['Reg_users_zero_online'] = "Det er 0 medlemmer og "; // There ae 5 Registered and
$lang['Reg_user_online'] = "Det er %d medlem og "; // There ae 5 Registered and
$lang['Reg_users_online'] = "Det er %d medlemmer og "; // There ae 5 Registered and
$lang['Hidden_users_zero_online'] = "0 skjulte medlemmer online"; // 6 Hidden users online
$lang['Hidden_user_online'] = "%d skjult medlem online"; // 6 Hidden users online
$lang['Hidden_users_online'] = "%d skjulte medlemmer online"; // 6 Hidden users online
$lang['Guest_users_zero_online'] = "Det er 0 gjester online"; // There are 10 Guest users online 
$lang['Guest_users_online'] = "Det er %d gjester online"; // There are 10 Guest users online
$lang['Guest_user_online'] = "Det er %d gjest online"; // There is 1 Guest user online
$lang['No_users_browsing'] = "Det er ingen medlemmer eller gjester online";

$lang['Online_explain'] = "Denne informasjonen er basert p� aktiviteten de siste 5 minuttene.";

$lang['Forum_Location'] = "Lokalisering";
$lang['Last_updated'] = "Sist oppdatert";

$lang['Forum_index'] = "Forum oversikten";
$lang['Logging_on'] = "Logger p�";
$lang['Posting_message'] = "Posting a message";
$lang['Searching_forums'] = "S�ker";
$lang['Viewing_profile'] = "Ser p� profil";
$lang['Viewing_online'] = "Ser p� Hvem er online?";
$lang['Viewing_member_list'] = "Ser p� medlemslista";
$lang['Viewing_priv_msgs'] = "Leser private meldinger";
$lang['Viewing_FAQ'] = "Ser p� Hjelp";


//
// Moderator Control Panel
//
$lang['Mod_CP'] = "Moderator kontrollpanel";
$lang['Mod_CP_explain'] = "Du kan utf�re moderasjon p� dette forumet. Du kan stenge, �pne, flytte og slette flere emner samtidig.";

$lang['Select'] = "Velg";
$lang['Delete'] = "Slett";
$lang['Move'] = "Flytt";
$lang['Lock'] = "Steng";
$lang['Unlock'] = "�pne";

$lang['Topics_Removed'] = "De markerte emnene er slettet fra databasen.";
$lang['Topics_Locked'] = "De markerte emnene er stengt";
$lang['Topics_Moved'] = "De markerte emnene er flyttet";
$lang['Topics_Unlocked'] = "De markerte emnene er �pnet";
$lang['No_Topics_Moved'] = "Ingen emner er flyttet";

$lang['Confirm_delete_topic'] = "Er du sikker p� at du �nsker � slette alle merkede emner?";
$lang['Confirm_lock_topic'] = "Er du sikker p� at du �nsker � stenge alle merkede emner?";
$lang['Confirm_unlock_topic'] = "Er du sikker p� at du �nsker � �pne alle merkede emner?";
$lang['Confirm_move_topic'] = "Er du sikker p� at du �nsker � flytte alle merkede emner?";

$lang['Move_to_forum'] = "Flytt til forum";
$lang['Leave_shadow_topic'] = "Behold en speilet kopi i det opprinnelig forumet.";

$lang['Split_Topic'] = "Del emne kontrollpanel";
$lang['Split_Topic_explain'] = "Du kan dele et emne ved � markere innlegg manuelt eller ved � angi et innlegg emnet skal deles ved.";
$lang['Split_title'] = "Det nye emnets tittel";
$lang['Split_forum'] = "Flytt emne til";
$lang['Split_posts'] = "Skill ut markerte innlegg";
$lang['Split_after'] = "Del ved markert innlegg";
$lang['Topic_split'] = "Emnet er delt";

$lang['Too_many_error'] = "Du har markert flere innlegg, du kan bare angi 1 innlegg � dele emnet ved!";

$lang['None_selected'] = "Du har ikke markert innlegg som skal skilles ut, g� tilbake og marker minst 1.";
$lang['New_forum'] = "Nytt forum";

$lang['This_posts_IP'] = "IP for dette innlegget";
$lang['Other_IP_this_user'] = "Andre IP-er dette medlemmet har postert fra";
$lang['Users_this_IP'] = "Medlemmer som benytter denne IP-en";
$lang['IP_info'] = "IP Informasjon";
$lang['Lookup_IP'] = "S�k frem IP";


//
// Timezones ... for display on each page
//
$lang['All_times'] = "Alle klokkeslett er %s"; // eg. All times are GMT - 12 Hours (times from next block)

$lang['-12'] = "GMT - 12 timer";
$lang['-11'] = "GMT - 11 timer";
$lang['-10'] = "HST (Hawaii)";
$lang['-9'] = "GMT - 9 timer";
$lang['-8'] = "PST (USA/Kanada)";
$lang['-7'] = "MST (USA/Kanada)";
$lang['-6'] = "CST (USA/Kanada)";
$lang['-5'] = "EST (USA/Kanada)";
$lang['-4'] = "GMT - 4 timer";
$lang['-3.5'] = "GMT - 3.5 timer";
$lang['-3'] = "GMT - 3 timer";
$lang['-2'] = "Mid-Atlantic";
$lang['-1'] = "GMT - 1 time";
$lang['0'] = "GMT";
$lang['1'] = "CET (Europa)";
$lang['2'] = "EET (Europa)";
$lang['3'] = "GMT + 3 timer";
$lang['3.5'] = "GMT + 3.5 timer";
$lang['4'] = "GMT + 4 timer";
$lang['4.5'] = "GMT + 4.5 timer";
$lang['5'] = "GMT + 5 timer";
$lang['5.5'] = "GMT + 5.5 timer";
$lang['6'] = "GMT + 6 timer";
$lang['7'] = "GMT + 7 timer";
$lang['8'] = "WST (Australia)";
$lang['9'] = "GMT + 9 timer";
$lang['9.5'] = "CST (Australia)";
$lang['10'] = "EST (Australia)";
$lang['11'] = "GMT + 11 timer";
$lang['12'] = "GMT + 12 timer";

// These are displayed in the timezone select box
$lang['tz']['-12'] = "(GMT -12:00 timer) Eniwetok, Kwajalein";
$lang['tz']['-11'] = "(GMT -11:00 timer) Midway Island, Samoa";
$lang['tz']['-10'] = "(GMT -10:00 timer) Hawaii";
$lang['tz']['-9'] = "(GMT -9:00 timer) Alaska";
$lang['tz']['-8'] = "(GMT -8:00 timer) Pacific Time (US &amp; Canada), Tijuana";
$lang['tz']['-7'] = "(GMT -7:00 timer) Mountain Time (US &amp; Canada), Arizona";
$lang['tz']['-6'] = "(GMT -6:00 timer) Central Time (US &amp; Canada), Mexico City";
$lang['tz']['-5'] = "(GMT -5:00 timer) Eastern Time (US &amp; Canada), Bogota, Lima, Quito";
$lang['tz']['-4'] = "(GMT -4:00 timer) Atlantic Time (Canada), Caracas, La Paz";
$lang['tz']['-3.5'] = "(GMT -3:30 timer) Newfoundland";
$lang['tz']['-3'] = "(GMT -3:00 timer) Brassila, Buenos Aires, Georgetown, Falkland Is";
$lang['tz']['-2'] = "(GMT -2:00 timer) Mid-Atlantic, Ascension Is., St. Helena";
$lang['tz']['-1'] = "(GMT -1:00 time) Azores, Cape Verde Islands";
$lang['tz']['0'] = "(GMT) Casablanca, Dublin, Edinburgh, London, Lisbon, Monrovia";
$lang['tz']['1'] = "(GMT +1:00 time) Oslo, Amsterdam, Berlin, Brussels, Madrid, Paris, Rome";
$lang['tz']['2'] = "(GMT +2:00 timer) Cairo, Helsinki, Kaliningrad, South Africa, Warsaw";
$lang['tz']['3'] = "(GMT +3:00 timer) Baghdad, Riyadh, Moscow, Nairobi";
$lang['tz']['3.5'] = "(GMT +3:30 timer) Tehran";
$lang['tz']['4'] = "(GMT +4:00 timer) Abu Dhabi, Baku, Muscat, Tbilisi";
$lang['tz']['4.5'] = "(GMT +4:30 timer) Kabul";
$lang['tz']['5'] = "(GMT +5:00 timer) Ekaterinburg, Islamabad, Karachi, Tashkent";
$lang['tz']['5.5'] = "(GMT +5:30 timer) Bombay, Calcutta, Madras, New Delhi";
$lang['tz']['6'] = "(GMT +6:00 timer) Almaty, Colombo, Dhaka, Novosibirsk";
$lang['tz']['6.5'] = "(GMT +6:30 timer) Rangoon";
$lang['tz']['7'] = "(GMT +7:00 timer) Bangkok, Hanoi, Jakarta";
$lang['tz']['8'] = "(GMT +8:00 timer) Beijing, Hong Kong, Perth, Singapore, Taipei";
$lang['tz']['9'] = "(GMT +9:00 timer) Osaka, Sapporo, Seoul, Tokyo, Yakutsk";
$lang['tz']['9.5'] = "(GMT +9:30 timer) Adelaide, Darwin";
$lang['tz']['10'] = "(GMT +10:00 timer) Canberra, Guam, Melbourne, Sydney, Vladivostok";
$lang['tz']['11'] = "(GMT +11:00 timer) Magadan, New Caledonia, Solomon Islands";
$lang['tz']['12'] = "(GMT +12:00 timer) Auckland, Wellington, Fiji, Marshall Island";

$lang['days_long'][0] = "S�ndag";
$lang['days_long'][1] = "Mandag";
$lang['days_long'][2] = "Torsdag";
$lang['days_long'][3] = "Onsdag";
$lang['days_long'][4] = "Torsdag";
$lang['days_long'][5] = "Fredag";
$lang['days_long'][6] = "L�rdag";

$lang['days_short'][0] = "S�n";
$lang['days_short'][1] = "Man";
$lang['days_short'][2] = "Tir";
$lang['days_short'][3] = "Ons";
$lang['days_short'][4] = "Tor";
$lang['days_short'][5] = "Fre";
$lang['days_short'][6] = "L�r";

$lang['months_long'][0] = "Januar";
$lang['months_long'][1] = "Februar";
$lang['months_long'][2] = "Mars";
$lang['months_long'][3] = "April";
$lang['months_long'][4] = "Mai";
$lang['months_long'][5] = "Juni";
$lang['months_long'][6] = "Juli";
$lang['months_long'][7] = "August";
$lang['months_long'][8] = "September";
$lang['months_long'][9] = "Oktober";
$lang['months_long'][10] = "November";
$lang['months_long'][11] = "Desember";

$lang['months_short'][0] = "Jan";
$lang['months_short'][1] = "Feb";
$lang['months_short'][2] = "Mar";
$lang['months_short'][3] = "Apr";
$lang['months_short'][4] = "Mai";
$lang['months_short'][5] = "Jun";
$lang['months_short'][6] = "Jul";
$lang['months_short'][7] = "Aug";
$lang['months_short'][8] = "Sep";
$lang['months_short'][9] = "Okt";
$lang['months_short'][10] = "Nov";
$lang['months_short'][11] = "Des";

//
// Errors (not related to a
// specific failure on a page)
//
$lang['Information'] = "Informasjon";
$lang['Critical_Information'] = "Kritisk informasjon";

$lang['General_Error'] = "Generell feil";
$lang['Critical_Error'] = "Kritisk feil";
$lang['An_error_occured'] = "Det oppstod en feil";
$lang['A_critical_error'] = "Det oppstod en kritisk feil";

//
// That's all Folks!
// -------------------------------------------------

?>
