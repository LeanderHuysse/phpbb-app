<?php

/***************************************************************************
 *                            lang_main.php [German]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
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
 *
 * German Translation by:
 * Joel Ricardo Zick (Rici) webmaster@forcena-inn.de || http://www.sdc-forum.de
 ***************************************************************************/

setlocale(LC_ALL, "de_DE");
$lang['DATE_FORMAT'] =  "d.m.Y"; // This should be changed to the default date format for your language, php date() format
$lang['ENCODING'] = "iso-8859-1";
$lang['DIRECTION'] = "LTR";
$lang['LEFT'] = "LEFT";
$lang['RIGHT'] = "RIGHT";


//
// Common, these terms are used
// extensively on several pages
//
$lang['Forum'] = "Forum";
$lang['Category'] = "Kategorie";
$lang['Topic'] = "Thema";
$lang['Topics'] = "Themen";
$lang['Reply'] = "Antwort";
$lang['Replies'] = "Antworten";
$lang['sp_Replies'] = "Antwort(en)";
$lang['Views'] = "Aufrufe";
$lang['sp_Views'] = "Aufruf(e)";
$lang['Post'] = "Beitrag";
$lang['Posts'] = "Beitr�ge";
$lang['Posted'] = "Verfasst am";
$lang['Username'] = "Benutzername";
$lang['Password'] = "Passwort";
$lang['Email'] = "E-Mail";
$lang['Poster'] = "Poster";
$lang['Author'] = "Autor";
$lang['Time'] = "Zeit";
$lang['Hours'] = "Stunden";
$lang['Message'] = "Nachricht";

$lang['1_Day'] = "1 Tag";
$lang['7_Days'] = "7 Tage";
$lang['2_Weeks'] = "2 Wochen";
$lang['1_Month'] = "1 Monat";
$lang['3_Months'] = "3 Monate";
$lang['6_Months'] = "6 Monate";
$lang['1_Year'] = "1 Jahr";

$lang['Go'] = "Go";
$lang['Jump_to'] = "Gehe zu";
$lang['Submit'] = "Absenden";
$lang['Reset'] = "Zur�cksetzen";
$lang['Cancel'] = "Abbrechen";
$lang['Preview'] = "Vorschau"; 
$lang['Confirm'] = "best�tigen"; 
$lang['Spellcheck'] = "Rechtschreibpr�fung";
$lang['Yes'] = "Ja";
$lang['No'] = "Nein";
$lang['Enabled'] = "Aktiviert";
$lang['Disabled'] = "Deaktiviert";
$lang['Error'] = "Fehler";

$lang['Next'] = "Weiter";
$lang['Previous'] = "Zur�ck";
$lang['Goto_page'] = "Gehe zu Seite";
$lang['Joined'] = "Anmeldungsdatum";
$lang['IP_Address'] = "IP-Adresse";

$lang['Select_forum'] = "Forum ausw�hlen";
$lang['View_latest_post'] = "Letzten Beitrag anzeigen";
$lang['View_newest_post'] = "Neuesten Beitrag anzeigen";
$lang['Page_of'] = "Seite <b>%d</b> von <b>%d</b>"; // Replaces with: Page 1 of 2 for example

$lang['ICQ'] = "ICQ-Nummer";
$lang['AIM'] = "AIM-Name";
$lang['MSNM'] = "MSN Messenger";
$lang['YIM'] = "Yahoo Messenger";

$lang['Forum_Index'] = "%s Foren-�bersicht";  // eg. sitename Forum Index, %s can be removed if you prefer

$lang['Post_new_topic'] = "Neuen Beitrag schreiben";
$lang['Reply_to_topic'] = "Auf Beitrag antworten";
$lang['Reply_with_quote'] = "Antworten mit Zitat";

$lang['Click_return_topic'] = "%sHier klicken%s, um zum Thema zur�ckzukehren"; // %s's here are for uris, do not remove!
$lang['Click_return_login'] = "%sHier klicken%s, um es noch einmal zu versuchen";
$lang['Click_return_forum'] = "%sHier klicken%s, um zum Forum zur�ckzukehren";
$lang['Click_view_message'] = "%sHier klicken%s, um Deine Nachricht anzuzeigen";
$lang['Click_return_modcp'] = "%sHier klicken%s, um zur Moderatorenkontrolle zur�ckzukehren";
$lang['Click_return_group'] = "%sHier klicken%s, um zur Gruppeninfo zur�ckzukehren";

$lang['Admin_panel'] = "Administrations-Bereich";
$lang['Board_disable'] = "Sorry, aber dieses Board ist im Moment nicht verf�gbar! Probier es bitte sp�ter wieder!";

//
// Global Header strings
//
$lang['Registered_users'] = "Registrierte Benutzer:";
$lang['Browsing_forum'] = "Benutzer in diesem Forum:";
$lang['Online_users_zero_total'] = "Insgesamt sind <b>null</b> Benutzer online :: ";
$lang['Online_users_total'] = "Insgesamt sind %d Benutzer online: ";
$lang['Online_user_total'] = "Insgesamt ist %d Benutzer online: ";
$lang['Reg_users_zero_total'] = "kein registrierter, ";
$lang['Reg_users_total'] = "%d registrierte, ";
$lang['Reg_user_total'] = "%d registrierter, ";
$lang['Hidden_users_zero_total'] = "kein versteckter und ";
$lang['Hidden_users_total'] = "%d versteckte und ";
$lang['Hidden_user_total'] = "%d versteckter und ";
$lang['Guest_users_zero_total'] = "kein Gast.";
$lang['Guest_users_total'] = "%d G�ste.";
$lang['Guest_user_total'] = "%d Gast.";
$lang['Record_online_users'] = "Der Rekord liegt bei <b>%s</b> Benutzern am %s."; // first %s = number of users, second %s is the date.

$lang['Admin_online_color'] = "%sAdministrator%s";
$lang['Mod_online_color'] = "%sModerator%s";

$lang['You_last_visit'] = "Dein letzter Besuch war am: %s"; // %s replaced by date/time
$lang['Current_time'] = "Aktuelles Datum und Uhrzeit: %s"; // %s replaced by time

$lang['Search_new'] = "Beitr�ge seit dem letzten Besuch anzeigen";
$lang['Search_your_posts'] = "Eigene Beitr�ge anzeigen";
$lang['Search_unanswered'] = "Unbeantwortete Beitr�ge anzeigen";
$lang['Register'] = "Registrieren";
$lang['Profile'] = "Profil";
$lang['Edit_profile'] = "Profil bearbeiten";
$lang['Search'] = "Suchen";
$lang['Memberlist'] = "Mitgliederliste";
$lang['FAQ'] = "FAQ";
$lang['BBCode_guide'] = "BBCode-Hilfe";
$lang['Usergroups'] = "Benutzergruppen";
$lang['Last_Post'] = "Letzter&nbsp;Beitrag";
$lang['Moderator'] = "<b>Moderator</b>";
$lang['Moderators'] = "<b>Moderatoren</b>";


//
// Stats block text
//
$lang['Posted_articles_zero_total'] = "Unsere Benutzer haben <b>noch keine</b> Artikel geschrieben."; // Number of posts
$lang['Posted_article_total'] = "Unsere Benutzer haben insgesamt <b>%d</b> Artikel geschrieben."; // Number of posts
$lang['Posted_articles_total'] = "Unsere Benutzer haben insgesamt <b>%d</b> Artikel geschrieben."; // Number of posts
$lang['Registered_users_zero_total'] = "Wir haben keine registrierten Benutzer."; // # registered users
$lang['Registered_user_total'] = "Wir haben <b>%d</b> registrierten Benutzer."; // # registered users
$lang['Registered_users_total'] = "Wir haben <b>%d</b> registrierte Benutzer."; // # registered users
$lang['Newest_user'] = "Der neueste Benutzer ist <b>%s%s%s</b>."; // a href, username, /a 

$lang['No_new_posts_last_visit'] = "Keine neuen Beitr�ge seit Deinem letzten Besuch";
$lang['No_new_posts'] = "Keine neuen Beitr�ge";
$lang['New_posts'] = "Neue Beitr�ge";
$lang['New_post'] = "Neuer Beitrag";
$lang['No_new_posts_hot'] = "Keine neuen Beitr�ge [ Top-Thema ]";
$lang['New_posts_hot'] = "Neue Beitr�ge [ Top-Thema ]";
$lang['No_new_posts_locked'] = "Keine neuen Beitr�ge [ Gesperrt ]";
$lang['New_posts_locked'] = "Neue Beitr�ge [ Gesperrt ]";
$lang['Forum_is_locked'] = "Forum ist gesperrt";


//
// Login
//
$lang['Enter_password'] = "Gib bitte Deinen Benutzernamen und Dein Passwort ein, um Dich einzuloggen!";
$lang['Login'] = "Login";
$lang['Logout'] = "Logout";

$lang['Forgotten_password'] = "Ich habe mein Passwort vergessen!";

$lang['Log_me_in'] = "Bei jedem Besuch automatisch einloggen";


//
// Index page
//
$lang['Index'] = "Index";
$lang['No_Posts'] = "Keine Beitr�ge";
$lang['No_forums'] = "Dieses Board hat keine Foren.";

$lang['Private_Message'] = "Private Nachricht";
$lang['Private_Messages'] = "Private Nachrichten";
$lang['Who_is_Online'] = "Wer ist online?";

$lang['Mark_all_forums'] = "Alle Foren als gelesen markieren";
$lang['Forums_marked_read'] = "Alle Foren wurden als gelesen markiert.";


//
// Viewforum
//
$lang['View_forum'] = "Forum anzeigen";

$lang['Forum_not_exist'] = "Das ausgew�hlte Forum existiert nicht";
$lang['Reached_on_error'] = "Fehler auf dieser Seite!";

$lang['Display_topics'] = "Siehe Beitr�ge der letzten";
$lang['All_Topics'] = "Alle Themen anzeigen";

$lang['Topic_Announcement'] = "<b>Ank�ndigungen:</b>";
$lang['Topic_Sticky'] = "<b>Wichtig:</b>";
$lang['Topic_Moved'] = "<b>Verschoben:</b>";
$lang['Topic_Poll'] = "<b>[Umfrage]</b>";

$lang['Mark_all_topics'] = "Alle Themen als gelesen markieren";
$lang['Topics_marked_read'] = "Alle Themen wurden als gelesen markiert.";

$lang['Rules_post_can'] = "Du <b>kannst</b> Beitr�ge in dieses Forum schreiben.";
$lang['Rules_post_cannot'] = "Du <b>kannst keine</b> Beitr�ge in dieses Forum schreiben.";
$lang['Rules_reply_can'] = "Du <b>kannst</b> auf Beitr�ge in diesem Forum antworten.";
$lang['Rules_reply_cannot'] = "Du <b>kannst</b> auf Beitr�ge in diesem Forum <b>nicht</b> antworten.";
$lang['Rules_edit_can'] = "Du <b>kannst</b> Deine Beitr�ge in diesem Forum bearbeiten.";
$lang['Rules_edit_cannot'] = "Du <b>kannst</b> Deine Beitr�ge in diesem Forum <b>nicht</b> bearbeiten.";
$lang['Rules_delete_can'] = "Du <b>kannst</b> Deine Beitr�ge in diesem Forum l�schen.";
$lang['Rules_delete_cannot'] = "Du <b>kannst</b> Deine Beitr�ge in diesem Forum <b>nicht</b> l�schen.";
$lang['Rules_vote_can'] = "Du <b>kannst</b> an Umfragen in diesem Forum mitmachen.";
$lang['Rules_vote_cannot'] = "Du <b>kannst</b> an Umfragen in diesem Forum <b>nicht</b> mitmachen.";
$lang['Rules_moderate'] = "Du <b>kannst</b> %sdieses Forum moderieren%s."; // %s replaced by a href links, do not remove! 

$lang['No_topics_post_one'] = "In diesem Forum sind keine Beitr�ge vorhanden.<br />Klicke auf <b>Neues Thema</b>, um den ersten Beitrag zu erstellen.";

//
// Viewtopic
//
$lang['View_topic'] = "Thema anzeigen";

$lang['Guest'] = 'Gast';
$lang['Post_subject'] = "Titel";
$lang['View_next_topic'] = "N�chstes Thema anzeigen";
$lang['View_previous_topic'] = "Vorheriges Thema anzeigen";
$lang['Submit_vote'] = "Stimme absenden";
$lang['View_results'] = "Ergebnis anzeigen";

$lang['No_newer_topics'] = "Es gibt keine neueren Themen in diesem Forum.";
$lang['No_older_topics'] = "Es gibt keine �lteren Themen in diesem Forum.";
$lang['Topic_post_not_exist'] = "Das gew�hlte Thema oder der Beitrag existiert nicht.";
$lang['No_posts_topic'] = "Es existieren keine Beitr�ge zu diesem Thema.";

$lang['Display_posts'] = "Beitr�ge vom vorherigen Thema anzeigen";
$lang['All_Posts'] = "Alle Beitr�ge";
$lang['Newest_First'] = "Die neusten zuerst";
$lang['Oldest_First'] = "Die �ltesten zuerst";

$lang['Back_to_top'] = "Nach oben";

$lang['Read_profile'] = "Benutzer-Profile anzeigen"; 
$lang['Send_email'] = "E-Mail an diesen Benutzer senden";
$lang['Visit_website'] = "Website dieses Benutzers besuchen";
$lang['ICQ_status'] = "ICQ-Status";
$lang['Edit_delete_post'] = "Beitrag bearbeiten oder l�schen";
$lang['View_IP'] = "IP zeigen";
$lang['Delete_post'] = "Beitrag l�schen";

$lang['wrote'] = "hat folgendes geschrieben:"; // proceeds the username and is followed by the quoted text
$lang['Quote'] = "Zitat"; // comes before bbcode quote output.
$lang['Code'] = "Code"; // comes before bbcode code output.

$lang['Edited_time_total'] = "Zuletzt bearbeitet von %s am %s, insgesamt %d-mal bearbeitet"; // Last edited by me on 12 Oct 2001, edited 1 time in total
$lang['Edited_times_total'] = "Zuletzt bearbeitet von %s am %s, insgesamt %d-mal bearbeitet"; // Last edited by me on 12 Oct 2001, edited 2 times in total

$lang['Lock_topic'] = "Thema sperren";
$lang['Unlock_topic'] = "Thema entsperren";
$lang['Move_topic'] = "Thema verschieben";
$lang['Delete_topic'] = "Thema l�schen";
$lang['Split_topic'] = "Thema teilen";

$lang['Stop_watching_topic'] = "Bei Antworten zu diesem Thema nicht mehr benachrichtigen";
$lang['Start_watching_topic'] = "Bei Antworten zu diesem Thema benachrichtigen";
$lang['No_longer_watching'] = "Das Thema wird nicht mehr von Dir beobachtet.";
$lang['You_are_watching'] = "Du beobachtest nun das Thema.";

$lang['Total_votes'] = "Stimmen insgesamt";


//
// Posting/Replying (Not private messaging!)
//
$lang['Message_body'] = "Nachrichtentext";
$lang['Topic_review'] = "Thema-�berblick";

$lang['No_post_mode'] = "Kein Eintrags-Modus ausgew�hlt";

$lang['Post_a_new_topic'] = "Neues Thema schreiben";

$lang['Post_a_reply'] = "Antwort schreiben";
$lang['Post_topic_as'] = "Thema schreiben als";
$lang['Edit_Post'] = "Beitrag editieren";
$lang['Options'] = "Optionen";

$lang['Post_Announcement'] = "Ank�ndigung";
$lang['Post_Sticky'] = "Wichtig";
$lang['Post_Normal'] = "Normal";

$lang['Confirm_delete'] = "Sicher, dass dieser Beitrag gel�scht werden soll?";
$lang['Confirm_delete_poll'] = "Sicher, dass diese Umfrage gel�scht werden soll?";

$lang['Flood_Error'] = "Du kannst einen Beitrag nicht so schnell nach Deinem letzten absenden, bitte warte einen Augenblick.";
$lang['Empty_subject'] = "Bei einem neuen Thema musst Du einen Titel angeben.";
$lang['Empty_message'] = "Du musst zu Deinem Beitrag einen Text eingeben.";

$lang['Forum_locked'] = "Dieses Forum ist gesperrt, Du kannst keine Beitr�ge editieren, schreiben oder beantworten.";
$lang['Topic_locked'] = "Dieses Thema ist gesperrt, Du kannst keine Beitr�ge editieren oder beantworten.";
$lang['No_post_id'] = "Du musst einen Beitrag zum editieren ausw�hlen.";
$lang['No_topic_id'] = "Du musst ein Thema f�r Deine Antwort angeben.";
$lang['No_valid_mode'] = "Du kannst nur Beitr�ge schreiben, bearbeiten, beantworten und zitieren. Versuch es noch einmal.";
$lang['No_such_post'] = "Es existiert kein solcher Beitrag. Versuch es noch einmal.";
$lang['Edit_own_posts'] = "Du kannst nur Deine eigenen Beitr�ge bearbeiten.";
$lang['Delete_own_posts'] = "Du kannst nur Deine eigenen Beitr�ge l�schen.";
$lang['Cannot_delete_replied'] = "Du kannst keine Beitr�ge l�schen, die schon beantwortet wurden.";
$lang['Cannot_delete_poll'] = "Du kannst keine aktiven Umfrage l�schen.";
$lang['Empty_poll_title'] = "Du musst einen Titel f�r die Umfrage eingeben.";
$lang['To_few_poll_options'] = "Du musst mindestens zwei Antworten f�r die Umfrage angeben.";
$lang['To_many_poll_options'] = "Du hast zu viele Antworten f�r die Umfrage angegeben";
$lang['Post_has_no_poll'] = "Dieser Beitrag hat keine Umfrage.";

$lang['Add_poll'] = "Umfrage hinzuf�gen";
$lang['Add_poll_explain'] = "Wenn Du keine Umfrage zum Thema hinzuf�gen willst, lass die Felder leer.";
$lang['Poll_question'] = "Frage";
$lang['Poll_option'] = "Antwort";
$lang['Add_option'] = "Antwort hinzuf�gen";
$lang['Update'] = "Aktualisieren";
$lang['Delete'] = "L�schen";
$lang['Poll_for'] = "Dauer der Umfrage:";
$lang['Days'] = "Tage"; // This is used for the Run poll for ... Days + in admin_forums for pruning
$lang['Poll_for_explain'] = "[ Gib 0 ein oder lass dieses Feld leer, um die Umfrage auf unbeschr�nkte Zeit durchzuf�hren ]";
$lang['Delete_poll'] = "Umfrage l�schen";

$lang['Disable_HTML_post'] = "HTML in diesem Beitrag deaktivieren";
$lang['Disable_BBCode_post'] = "BBCode in diesem Beitrag deaktivieren";
$lang['Disable_Smilies_post'] = "Smilies in diesem Beitrag deaktivieren";

$lang['HTML_is_ON'] = "HTML ist <u>an</u>";
$lang['HTML_is_OFF'] = "HTML ist <u>aus</u>";
$lang['BBCode_is_ON'] = "BBCode ist <u>an</u>";
$lang['BBCode_is_OFF'] = "BBCode ist <u>aus</u>";
$lang['Smilies_are_ON'] = "Smilies sind <u>an</u>";
$lang['Smilies_are_OFF'] = "Smilies sind <u>aus</u>";

$lang['Attach_signature'] = "Signatur anh�ngen (Signatur kann im Profil ge�ndert werden)";
$lang['Notify'] = "Benachrichtigt mich, wenn eine Antwort geschrieben wurde";
$lang['Delete_post'] = "Diesen Beitrag l�schen";

$lang['Stored'] = "Deine Nachricht wurde erfolgreich eingetragen.";
$lang['Deleted'] = "Deine Nachricht wurde erfolgreich gel�scht.";
$lang['Poll_delete'] = "Deine Umfrage wurde erfolgreich gel�scht.";
$lang['Vote_cast'] = "Deine Stimme wurde gez�hlt.";

$lang['Topic_reply_notification'] = "Benachrichtigen bei Antworten";

$lang['bbcode_b_help'] = "Text in fett: [b]Text[/b]  (alt+b)";
$lang['bbcode_i_help'] = "Text in kursiv: [i]Text[/i]  (alt+i)";
$lang['bbcode_u_help'] = "Unterstrichener Text: [u]Text[/u]  (alt+u)";
$lang['bbcode_q_help'] = "Zitat: [quote]Text[/quote]  (alt+q)";
$lang['bbcode_c_help'] = "Code anzeigen: [code]Code[/code]  (alt+c)";
$lang['bbcode_l_help'] = "Liste: [list]Text[/list] (alt+l)";
$lang['bbcode_o_help'] = "Geordnete Liste: [list=]Text[/list]  (alt+o)";
$lang['bbcode_p_help'] = "Bild einf�gen: [img]http://URL_des_Bildes[/img]  (alt+p)";
$lang['bbcode_w_help'] = "URL einf�gen: [url]http://URL[/url] oder [url=http://url]URL Text[/url]  (alt+w)";
$lang['bbcode_a_help'] = "Alle offenen BBCodes schlie�en";
$lang['bbcode_s_help'] = "Schriftfarbe: [color=red]Text[/color]  Tip: Du kannst ebenfalls color=#FF0000 benutzen";
$lang['bbcode_f_help'] = "Schriftgr��e: [size=x-small]Kleiner Text[/size]";

$lang['Emoticons'] = "Smilies";
$lang['More_emoticons'] = "Weitere Smilies ansehen";

$lang['Font_color'] = "Schriftfarbe";
$lang['color_default'] = "Standard";
$lang['color_dark_red'] = "Dunkelrot";
$lang['color_red'] = "Rot";
$lang['color_orange'] = "Orange";
$lang['color_brown'] = "Braun";
$lang['color_yellow'] = "Gelb";
$lang['color_green'] = "Gr�n";
$lang['color_olive'] = "Oliv";
$lang['color_cyan'] = "Cyan";
$lang['color_blue'] = "Blau";
$lang['color_dark_blue'] = "Dunkelblau";
$lang['color_indigo'] = "Indigo";
$lang['color_violet'] = "Violett";
$lang['color_white'] = "Wei�";
$lang['color_black'] = "Schwarz";

$lang['Font_size'] = "Schriftgr��e";
$lang['font_tiny'] = "Winzig";
$lang['font_small'] = "Klein";
$lang['font_normal'] = "Normal";
$lang['font_large'] = "Gro�";
$lang['font_huge'] = "Riesig";

$lang['Close_Tags'] = "Tags schlie�en";
$lang['Styles_tip'] = "Tip: Styles k�nnen schnell zum markierten Text hinzugef�gt werden";

//
// Private Messaging
//
$lang['Private_Messaging'] = "Private Nachrichten";

$lang['Login_check_pm'] = "Einloggen, um private Nachrichten zu lesen";
$lang['New_pms'] = "Du hast %d neue Nachrichten."; // You have 2 new messages
$lang['New_pm'] = "Du hast %d neue Nachricht."; // You have 1 new message
$lang['No_new_pm'] = "Du hast keine neuen Nachrichten.";
$lang['Unread_pms'] = "Du hast %d ungelesene Nachrichten.";
$lang['Unread_pm'] = "Du hast %d ungelesene Nachricht.";
$lang['No_unread_pm'] = "Du hast keine ungelesenen Nachrichten.";
$lang['You_new_pm'] = "Eine neue private Nachricht befindet sich in Deinem Posteingang.";
$lang['You_new_pms'] = "Es befinden sich neue private Nachrichten in Deinem Posteingang.";
$lang['You_no_new_pm'] = "Es sind keine neuen privaten Nachrichten vorhanden.";

$lang['Inbox'] = "Posteingang";
$lang['Outbox'] = "Postausgang";
$lang['Savebox'] = "Archiv";
$lang['Sentbox'] = "Gesendete Nachrichten";
$lang['Flag'] = "Flag";
$lang['Subject'] = "Titel";
$lang['From'] = "Von";
$lang['To'] = "An";
$lang['Date'] = "Datum";
$lang['Mark'] = "Markiert";
$lang['Sent'] = "Gesendet";
$lang['Saved'] = "Gespeichert";
$lang['Delete_marked'] = "Markierte l�schen";
$lang['Delete_all'] = "Alle l�schen";
$lang['Save_marked'] = "Markierte speichern"; 
$lang['Save_message'] = "Nachrichten speichern";
$lang['Delete_message'] = "Nachrichten l�schen";

$lang['Display_messages'] = "Nachrichten anzeigen der letzten"; // Followed by number of days/weeks/months
$lang['All_Messages'] = "Alle Nachrichten";

$lang['No_messages_folder'] = "Es sind keine weiteren Nachrichten in diesem Ordner.";

$lang['PM_disabled'] = "Private Nachrichten wurden in diesem Board deaktiviert.";
$lang['Cannot_send_privmsg'] = "Der Administrator hat private Nachrichten f�r Dich gesperrt.";
$lang['No_to_user'] = "Du musst einen Benutzernamen angeben, um diese Nachricht zu senden.";
$lang['No_such_user'] = "Es existiert kein Benutzer mit diesem Namen.";

$lang['Disable_HTML_pm'] = "HTML in dieser Nachricht deaktivieren";
$lang['Disable_BBCode_pm'] = "BBCode in dieser Nachricht deaktivieren";
$lang['Disable_Smilies_pm'] = "Smilies in dieser Nachricht deaktivieren";

$lang['Message_sent'] = "Deine Nachricht wurde gesendet.";

$lang['Click_return_inbox'] = "Klick %shier%s um zum Posteingang zur�ckzukehren";
$lang['Click_return_index'] = "Klick %shier%s um zum Index zur�ckzukehren";

$lang['Send_a_new_message'] = "Neue Nachricht senden";
$lang['Send_a_reply'] = "Auf private Nachricht antworten";
$lang['Edit_message'] = "Private Nachricht bearbeiten";

$lang['Notification_subject'] = "Eine neue private Nachricht ist eingetroffen.";

$lang['Find_username'] = "Benutzernamen finden";
$lang['Find'] = "Finden";
$lang['No_match'] = "Keine Ergebnisse gefunden";

$lang['No_post_id'] = "Es wurde keine Beitrags-ID angegeben.";
$lang['No_such_folder'] = "Es existiert kein solcher Ordner.";
$lang['No_folder'] = "Kein Ordner ausgew�hlt";

$lang['Mark_all'] = "Alle Markieren";
$lang['Unmark_all'] = "Markierungen aufheben";

$lang['Confirm_delete_pm'] = "Diese Nachricht wirklich l�schen?";
$lang['Confirm_delete_pms'] = "Diese Nachrichten wirklich l�schen?";

$lang['Inbox_size'] = "Dein Posteingang ist %d%% voll"; // eg. Your Inbox is 50% full
$lang['Sentbox_size'] = "Deine Gesendeten Nachrichten sind %d%% voll"; 
$lang['Savebox_size'] = "Dein Archiv ist %d%% voll"; 

$lang['Click_view_privmsg'] = "Klick %shier%s, um Deinen Posteingang aufzurufen";


//
// Profiles/Registration
//
$lang['Viewing_user_profile'] = "Profil anzeigen : %s"; // %s is username 
$lang['About_user'] = "Alles �ber %s";

$lang['Preferences'] = "Einstellungen";
$lang['Items_required'] = "Mit * markierte Felder sind erforderlich";
$lang['Registration_info'] = "Registrierungs-Informationen";
$lang['Profile_info'] = "Profil-Informationen";
$lang['Profile_info_warn'] = "Diese Informationen sind �ffentlich abrufbar!";
$lang['Avatar_panel'] = "Avatar-Steuerung";
$lang['Avatar_gallery'] = "Avatar-Galerie";

$lang['Website'] = "Website";
$lang['Location'] = "Wohnort";
$lang['Contact'] = "Kontakt";
$lang['Email_address'] = "E-Mail-Adresse";
$lang['Email'] = "E-Mail";
$lang['Send_private_message'] = "Private Nachricht senden";
$lang['Hidden_email'] = "[ Versteckt ]";
$lang['Search_user_posts'] = "Nachrichten von diesem Benutzer anzeigen";
$lang['Interests'] = "Interessen";
$lang['Occupation'] = "Beruf"; 
$lang['Poster_rank'] = "Rang";

$lang['Total_posts'] = "Beitr�ge insgesamt";
$lang['User_post_pct_stats'] = "%.2f%% aller Beitr�ge"; // 1.25% of total
$lang['User_post_day_stats'] = "%.2f Beitr�ge pro Tag"; // 1.5 posts per day
$lang['Search_user_posts'] = "Alle Beitr�ge von %s anzeigen"; // Find all posts by username

$lang['No_user_id_specified'] = "Dieser Benutzer existiert nicht.";
$lang['Wrong_Profile'] = "Du kannst nur Dein eigenes Profil bearbeiten.";
$lang['Only_one_avatar'] = "Es kann nur ein Avatar ausgew�hlt werden.";
$lang['File_no_data'] = "Die angegebene Datei enth�lt keine Daten.";
$lang['No_connection_URL'] = "Es konnte keine Verbindung zur angegebenen Datei hergestellt werden.";
$lang['Incomplete_URL'] = "Die angegebene URL ist unvollst�ndig.";
$lang['Wrong_remote_avatar_format'] = "Das Format des Avatars ist nicht g�ltig.";
$lang['No_send_account_inactive'] = "Sorry, aber ein neues Passwort kann im Moment nicht gesendet werden, da Dein Account derzeit noch inaktiv ist. Bitte kontaktiere den Administrator f�r weitere Informationen.";

$lang['Always_smile'] = "Smilies immer aktivieren";
$lang['Always_html'] = "HTML immer aktivieren";
$lang['Always_bbcode'] = "BBCode immer aktivieren";
$lang['Always_add_sig'] = "Signatur immer anh�ngen";
$lang['Always_notify'] = "Bei Antworten immer benachrichtigen";
$lang['Always_notify_explain'] = "Sendet Dir eine E-Mail, wenn jemand auf einen Deiner Beitr�ge antwortet. Kann f�r jeden Beitrag ge�ndert werden.";

$lang['Board_style'] = "Board-Style";
$lang['Board_lang'] = "Board-Sprache";
$lang['No_themes'] = "Keine Themes in der Datenbank";
$lang['Timezone'] = "Zeitzone";
$lang['Date_format'] = "Datums-Format";
$lang['Date_format_explain'] = "Die Syntax ist identisch mit der PHP-Funktion <a href=\"http://www.php.net/date\" target=\"_other\">date()</a>";
$lang['Signature'] = "Signatur";
$lang['Signature_explain'] = "Dies ist ein Text, der an jeden Beitrag von Dir angeh�ngt werden kann. Es besteht eine Limit von %d Buchstaben.";
$lang['Public_view_email'] = "Zeige meine E-Mail-Adresse immer an";

$lang['Current_password'] = "Altes Passwort";
$lang['New_password'] = "Neues Passwort";
$lang['Confirm_password'] = "Passwort best�tigen";
$lang['Confirm_password_explain'] = "Du musst Dein Passwort angeben, wenn Du Dein Passwort oder Deine Mailadresse �ndern m�chtest.";

$lang['password_if_changed'] = "Du musst nur dann ein neues Passwort angeben, wenn Du es �ndern willst.";
$lang['password_confirm_if_changed'] = "Du musst Dein neues Passwort best�tigen, wenn Du es �ndern willst.";

$lang['Avatar'] = "Avatar";
$lang['Avatar_explain'] = "Zeigt eine kleine Grafik neben Deinen Details zu jedem Deiner Beitr�ge an. Es kann immer nur ein Avatar angezeigt werden, seine Breite darf nicht gr�sser als %d Pixel sein, die H�he nicht gr�sser als %d  Pixel, und die Dateigr�sse darf maximal %d KB betragen."; $lang['Upload_Avatar_file'] = "Avatar von Deinem Computer hochladen";
$lang['Upload_Avatar_URL'] = "Avatar von URL hochladen";
$lang['Upload_Avatar_URL_explain'] = "Gib die URL des gew�nschten Avatars an, dieser wird dann kopiert";
$lang['Pick_local_Avatar'] = "Avatar aus der Galerie ausw�hlen";
$lang['Link_remote_Avatar'] = "Zu einem externen Avatar linken";
$lang['Link_remote_Avatar_explain'] = "Gib die URL des Avatars ein, der gelinkt werden soll";
$lang['Avatar_URL'] = "URL des Avatars";
$lang['Select_from_gallery'] = "Avatar aus der Galerie ausw�hlen";
$lang['View_avatar_gallery'] = "Galerie anzeigen";

$lang['Select_avatar'] = "Avatar ausw�hlen";
$lang['Return_profile'] = "Avatar abbrechen";
$lang['Select_category'] = "Kategorie ausw�hlen";

$lang['Delete_Image'] = "Bild l�schen";
$lang['Current_Image'] = "Aktuelles Bild";

$lang['Notify_on_privmsg'] = "Bei neuen Privaten Nachrichten benachrichtigen";
$lang['Popup_on_privmsg'] = "PopUp-Fenster bei neuen Privaten Nachrichten"; 
$lang['Popup_on_privmsg_explain'] = "Einige Templates �ffnen neue Fenster, um Dich �ber neue private Nachrichten zu benachrichtigen."; 
$lang['Hide_user'] = "Online-Status verstecken";

$lang['Profile_updated'] = "Dein Profil wurde aktualisiert";
$lang['Profile_updated_inactive'] = "Dein Profil wurde aktualisiert. Du hast jedoch essentielle Details ge�ndert, weswegen Dein Account jetzt inaktiv ist. Du wurdest per Mail dar�ber informiert, wie Du Deinen Account reaktivieren kannst. Falls eine Aktivierung durch den Administrator erforderlich ist, warte bitte, bis die Reaktivierung statt gefunden hat.";

$lang['Password_mismatch'] = "Du musst zweimal das gleiche Passwort eingeben.";
$lang['Current_password_mismatch'] = "Das aktuelle Passwort stimmt nicht mit dem in der Datenbank �berein.";
$lang['Password_long'] = "Dein Passwort kann nicht l�nger als 32 Zeichen sein.";
$lang['Username_taken'] = "Der gew�nschte Benutzername ist leider bereits belegt.";
$lang['Username_invalid'] = "Der gew�nschte Benutzername enth�lt ein ung�ltiges Sonderzeichen (z.B. \").";
$lang['Username_disallowed'] = "Der gew�nschte Benutzername wurde vom Administrator gesperrt.";
$lang['Email_taken'] = "Die angegebene Mailadresse wird bereits von einem anderen Benutzer verwendet.";
$lang['Email_banned'] = "Die angegebene Mailadresse wurde vom Administrator gesperrt.";
$lang['Email_invalid'] = "Die angegebene Mailadresse ist ung�ltig.";
$lang['Signature_too_long'] = "Deine Signatur ist zu lang.";
$lang['Fields_empty'] = "Du musst alle ben�tigten Felder ausf�llen.";
$lang['Avatar_filetype'] = "Der Avatar muss im GIF-, JPG- oder PNG-Format sein.";
$lang['Avatar_filesize'] = "Die Dateigr�sse muss kleiner als %d kB sein."; // followed by xx kB, xx being the size
$lang['Avatar_imagesize'] = "Der Avatar muss weniger als " . $board_config['avatar_max_width'] . " Pixel breit und " . $board_config['avatar_max_height'] . " Pixel hoch sein."; 

$lang['Welcome_subject'] = "Willkommen auf %s";
$lang['New_account_subject'] = "Neuer Benutzeraccount";
$lang['Account_activated_subject'] = "Account aktiviert";
$lang['Account_added'] = "Danke f�r die Registrierung, Dein Account wurde erstellt. Du kannst Dich jetzt mit Deinem Benutzernamen und Deinem Passwort einloggen.";
$lang['Account_inactive'] = "Dein Account wurde erstellt. Dieses Forum ben�tigt aber eine Aktivierungs-Best�tigung, daher wurde ein Activation-Key an Deine E-Mail-Adresse gesendet. Bitte �berpr�fe jetzt Deine Mailbox f�r weitere Informationen.";
$lang['Account_inactive_admin'] = "Dein Account wurde erstellt. Dieser muss noch durch den Administrator freigeschaltet werden. Du wirst benachrichtigt, wenn dies geschehen ist.";
$lang['Account_active'] = "Dein Account wurde aktiviert. Danke f�r die Registrierung.";
$lang['Account_active_admin'] = "Dein Account wurde jetzt aktiviert.";
$lang['Reactivate'] = "Account wieder aktivieren!";
$lang['COPPA'] = "Dein Account wurde erstellt, muss aber zuerst �berpr�ft werden. Mehr Details dazu wurden Dir per E-Mail gesendet.";

$lang['Wrong_activation'] = "Der Aktivierungsschl�ssel aus dem Link stimmt nicht mit dem in der Datenbank �berein. Bitte �berpr�fe die URL und versuche es erneut.";
$lang['Send_password'] = "Schickt mir ein neues Passwort."; 
$lang['Password_updated'] = "Ein neues Passwort wurde erstellt, es wurde eine E-Mail mit weiteren Anweisungen verschickt.";
$lang['No_email_match'] = "Die angegebene E-Mail-Adresse stimmt nicht mit dem Benutzernamen �berein.";
$lang['New_password_activation'] = "Aktivierung des neuen Passwortes";
$lang['Password_activated'] = "Dein Account wurde wieder aktiviert. Um Dich einzuloggen, benutze das Passwort, welches Du per E-Mail erhalten hast.";

$lang['Send_email_msg'] = "E-Mail senden";
$lang['No_user_specified'] = "Es wurde kein Benutzer ausgew�hlt";
$lang['User_prevent_email'] = "Dieser Benutzer hat den E-Mail-Empfang deaktiviert. Bitte versuche es mit einer privaten Nachricht.";
$lang['User_not_exist'] = "Dieser Benutzer existiert nicht.";
$lang['CC_email'] = "Eine Kopie dieser E-Mail an Dich senden";
$lang['Email_message_desc'] = "Diese Nachricht wird als Text ohne HTML und BBCode verschickt. Als Antwort-Adresse wird Deine angegeben.";
$lang['Flood_email_limit'] = "Im Moment kannst Du keine weiteren E-Mails versenden. Versuch es sp�ter noch einmal.";
$lang['Recipient'] = "Empf�nger";
$lang['Email_sent'] = "E-Mail wurde gesendet";
$lang['Send_email'] = "E-Mail senden";
$lang['Empty_subject_email'] = "Du musst einen Titel f�r diese E-Mail angeben.";
$lang['Empty_message_email'] = "Du musst einen Text zur E-Mail angeben.";

$lang['Registration'] = "Einverst�ndniserkl�rung";
$lang['Reg_agreement'] = "Die Administratoren und Moderatoren dieses Forums bem�hen sich, Beitr�ge mit fragw�rdigem Inhalt so schnell wie m�glich zu bearbeiten oder ganz zu l�schen, aber es ist nicht m�glich, jede einzelne Nachricht zu �berpr�fen. Du best�tigst mit Absenden dieser Einverst�ndniserkl�rung, dass Du akzeptierst, dass jeder Beitrag in diesem Forum die Meinung des Urhebers wiedergibt und dass die Administratoren, Moderatoren und Betreiber dieses Forums nur f�r ihre eigenen Beitr�ge verantwortlich sind.<br /><br />Du verpflichtest Dich, keine beleidigenden, obsz�nen, vulg�ren, verleumdenden, gewaltverherrlichenden oder aus anderen Gr�nden strafbaren Inhalte in diesem Forum zu ver�ffentlichen. Verst��e gegen diese Regel f�hren zu sofortiger und permanenter Sperrung, wir behalten uns vor Verbindungsdaten u.�. an die strafverfolgenden Beh�rden weiter zu geben. Du r�umst den Betreibern, Administratoren und Moderatoren dieses Forums das Recht ein, Beitr�ge nach eigenem Ermessen zu entfernen, zu bearbeiten, zu verschieben oder zu sperren. Du stimmst zu, dass die im Rahmen der Registrierung erhobenen Daten in einer Datenbank gespeichert werden.<br /><br />Dieses System verwendet Cookies, um Informationen auf Deinem Computer zu speichern. Diese Cookies enthalten keine der oben angegebenen Informationen, sondern dienen ausschlie�lich Deinem Komfort. Deine Mail-Adresse wird nur zur Best�tigung der Registrierung und ggf. zum Versand eines neuen Passwortes verwandt.<br /><br />Durch das Abschlie�en der Registrierung stimmst Du diesen Nutzungsbedingungen zu.";

$lang['Agree_under_13'] = "Ich bin mit den Konditionen dieses Forums einverstanden und <b>unter</b> 12 Jahre alt.";
$lang['Agree_over_13'] = "Ich bin mit den Konditionen dieses Forums einverstanden und <b>�ber</b> 12 Jahre alt.";
$lang['Agree_not'] = "Ich bin mit den Konditionen nicht einverstanden.";


//
// Memberslist
//
$lang['Select_sort_method'] = "Sortierungs-Methode ausw�hlen";
$lang['Sort'] = "Sortieren";
$lang['Sort_Top_Ten'] = "Top-Ten-Autoren";
$lang['Sort_Joined'] = "Anmeldungsdatum";
$lang['Sort_Username'] = "Benutzername";
$lang['Sort_Location'] = "Ort";
$lang['Sort_Posts'] = "Beitr�ge total";
$lang['Sort_Email'] = "E-Mail";
$lang['Sort_Website'] = "Website";
$lang['Sort_Ascending'] = "Aufsteigend";
$lang['Sort_Descending'] = "Absteigend";
$lang['Order'] = "Ordnung";


//
// Group control panel
//
$lang['Group_Control_Panel'] = "Gruppen-Kontrolle";
$lang['Group_member_details'] = "Details zur Gruppen-Mitgliedschaft";
$lang['Group_member_join'] = "Gruppe beitreten";

$lang['Group_Information'] = "Information";
$lang['Group_name'] = "Name";
$lang['Group_description'] = "Beschreibung";
$lang['Group_membership'] = "Gruppen-Mitgliedschaft";
$lang['Group_Members'] = "Gruppen-Mitglieder";
$lang['Group_Moderator'] = "Gruppen-Moderatoren";
$lang['Pending_members'] = "Wartende Mitglieder";

$lang['Group_type'] = "Gruppentyp";
$lang['Group_open'] = "Offene Gruppe";
$lang['Group_closed'] = "Geschlossene Gruppe";
$lang['Group_hidden'] = "Versteckte Gruppe";

$lang['Current_memberships'] = "Aktuelle Mitgliedschaften";
$lang['Non_member_groups'] = "Gruppen ohne Deine Mitgliedschaft";
$lang['Memberships_pending'] = "Warten auf Mitgliedschaft";

$lang['No_groups_exist'] = "Es existieren keine Gruppen";
$lang['Group_not_exist'] = "Diese Gruppe existiert nicht";

$lang['Join_group'] = "Gruppe beitreten";
$lang['No_group_members'] = "Diese Gruppe hat keine Mitglieder.";
$lang['Group_hidden_members'] = "Diese Gruppe ist versteckt, Du kannst keine Mitgliedschaften anzeigen.";
$lang['No_pending_group_members'] = "Diese Gruppe hat keine wartenden Mitglieder.";
$lang["Group_joined"] = "Du wurdest erfolgreich bei dieser Gruppe angemeldet.<br />Du wirst benachrichtigt, wenn der Gruppenmoderator Deine Mitgliedschaft akzeptiert hat.";
$lang['Group_request'] = "Eine Anfrage zum Beitritt in diese Gruppe wurde erstellt.";
$lang['Group_approved'] = "Deine Anfrage wurde akzeptiert.";
$lang['Group_added'] = "Du bist dieser Gruppe beigetreten."; 
$lang['Already_member_group'] = "Du bist bereits ein Mitglied dieser Gruppe.";
$lang['User_is_member_group'] = "Dieser Benutzer ist bereits ein Mitglied dieser Gruppe.";
$lang['Group_type_updated'] = "Gruppentyp wurde erfolgreich aktualisiert.";

$lang['Could_not_add_user'] = "Die gew�hlte Gruppe existiert nicht.";
$lang['Could_not_anon_user'] = "Ein anonymer Benutzer kann kein Gruppenmitglied werden.";

$lang['Confirm_unsub'] = "Bist Du sicher, dass Du die Mitgliedschaft in dieser Gruppe beenden m�chtest?";
$lang['Confirm_unsub_pending'] = "Deine Anmeldung bei der Gruppe wurde noch nicht best�tigt, m�chtest Du wirklich austreten?";

$lang['Unsub_success'] = "Du wurdest aus dieser Gruppe abgemeldet.";

$lang['Approve_selected'] = "Akzeptierte ausgew�hlt";
$lang['Deny_selected'] = "Gew�hlte l�schen";
$lang['Not_logged_in'] = "Du musst eingeloggt sein, um einer Gruppe beizutreten.";
$lang['Remove_selected'] = "Ausgew�hlte entfernen";
$lang['Add_member'] = "Mitglied hinzuf�gen";
$lang['Not_group_moderator'] = "Du bist nicht der Gruppenmoderator, daher kannst Du diese Aktion auch nicht durchf�hren.";

$lang['Login_to_join'] = "Einloggen, um Gruppe zu managen";
$lang['This_open_group'] = "Dies ist eine offene Gruppe. Klick, um eine Mitgliedschaft zu beantragen.";
$lang['This_closed_group'] = "Dies ist eine geschlossene Gruppe, keine weiteren Mitglieder werden akzeptiert.";
$lang['This_hidden_group'] = "Dies ist eine geschlossene Gruppe, automatische Anmeldungen werden nicht akzeptiert.";
$lang['Member_this_group'] = "Du bist ein Mitglied dieser Gruppe.";
$lang['Pending_this_group'] = "Du wartest auf eine Mitgliedschaft in dieser Gruppe.";
$lang['Are_group_moderator'] = "Du bist der Moderator dieser Gruppe.";
$lang['None'] = "Keine";

$lang['Subscribe'] = "Anmelden";
$lang['Unsubscribe'] = "Abmelden";
$lang['View_Information'] = "Information anzeigen";


//
// Search
//
$lang['Search_query'] = "Suchabfrage";
$lang['Search_options'] = "Suchoptionen";

$lang['Search_keywords'] = "Nach Begriffen suchen";
$lang['Search_keywords_explain'] = "Du kannst <u>AND</u> benutzen, um W�rter zu definieren, die vorkommen m�ssen, <u>OR</u> kannst Du benutzen f�r W�rter, die im Resultat sein k�nnen und <u>NOT</u> verbietet das nachfolgende Wort im Resultat. Das *-Zeichen kannst Du als Joker benutzen.";
$lang['Search_author'] = "Nach Autor suchen";
$lang['Search_author_explain'] = "Benutze das *-Zeichen als Joker";

$lang['Search_for_any'] = "Nach irgendeinem Wort suchen";
$lang['Search_for_all'] = "Nach allen W�rtern suchen";
$lang['Search_title_msg'] = "Titel und Text durchsuchen";
$lang['Search_msg_only'] = "Nur Nachrichtentext durchsuchen";

$lang['Return_first'] = "Die ersten "; // followed by xxx characters in a select box
$lang['characters_posts'] = "Zeichen des Beitrags anzeigen";

$lang['Search_previous'] = "Durchsuchen"; // followed by days, weeks, months, year, all in a select box

$lang['Sort_by'] = "Sortieren nach";
$lang['Sort_Time'] = "Zeit";
$lang['Sort_Post_Subject'] = "Titel des Beitrags";
$lang['Sort_Topic_Title'] = "Titel des Themas";
$lang['Sort_Author'] = "Autor";
$lang['Sort_Forum'] = "Forum";

$lang['Display_results'] = "Ergebnis anzeigen als";
$lang['All_available'] = "Alle";
$lang['No_searchable_forums'] = "Du hast nicht die Berechtigung, dieses Forum zu durchsuchen.";

$lang['No_search_match'] = "Keine Beitr�ge entsprechen Deinen Kriterien.";
$lang['Found_search_match'] = "Die Suche hat %d Ergebnis ergeben."; // eg. Search found 1 match
$lang['Found_search_matches'] = "Die Suche hat %d Ergebnisse ergeben."; // eg. Search found 24 matches

$lang['Close_window'] = "Fenster schliessen";

//
// Auth related entries
//
// Note the %s will be replaced with one of the following 'user' arrays 
$lang['Sorry_auth_announce'] = "Ank�ndigungen k�nnen in diesem Forum nur von %s erstellt werden.";
$lang['Sorry_auth_sticky'] = "Wichtige Nachrichten k�nnen in diesem Forum nur von %s erstellt werden.";
$lang['Sorry_auth_read'] = "Nur %s haben die Berechtigung, in diesem Forum Beitr�ge zu lesen.";
$lang['Sorry_auth_post'] = "Nur %s haben die Berechtigung, in diesem Forum Beitr�ge zu erstellen.";
$lang['Sorry_auth_reply'] = "Nur %s haben die Berechtigung, in diesem Forum auf Beitr�ge zu antworten.";
$lang['Sorry_auth_edit'] = "Nur %s haben die Berechtigung, in diesem Forum Beitr�ge zu bearbeiten.";
$lang['Sorry_auth_delete'] = "nur %s haben die Berechtigung, in diesem Forum Beitr�ge zu l�schen.";
$lang['Sorry_auth_vote'] = "In diesem Forum k�nnen sich %s an Abstimmungen beteiligen.";


$lang['Auth_Anonymous_Users'] = "<b>anonyme Benutzer</b>";
$lang['Auth_Registered_Users'] = "<b>registrierte Benutzer</b>";
$lang['Auth_Users_granted_access'] = "<b>Benutzer mit speziellen Rechten</b>";
$lang['Auth_Moderators'] = "<b>Moderatoren</b>";
$lang['Auth_Administrators'] = "<b>Administratoren</b>";


//
// Viewonline
//
$lang['Reg_users_zero_online'] = "Es sind kein registrierter und "; // There ae 5 Registered and
$lang['Reg_users_online'] = "Es sind %d registrierte und ";
$lang['Reg_user_online'] = "Es sind %d registrierter "; // There ae 5 Registered and
$lang['Hidden_users_zero_online'] = "kein versteckter Benutzer online."; // 6 Hidden users online
$lang['Hidden_users_online'] = "%d versteckte Benutzer online."; // 6 Hidden users online
$lang['Hidden_user_online'] = "%d versteckter Benutzer online."; // 6 Hidden users online
$lang['Guest_users_online'] = "Es sind %d G�ste online.";
$lang['Guest_users_zero_online'] = "Es sind keine G�ste online."; // There are 10 Guest users online
$lang['Guest_user_online'] = "Es ist %d Gast online.";
$lang['No_users_browsing'] = "Im Moment sind keine Benutzer im Forum.";

$lang['Online_explain'] = "Diese Daten zeigen an, wer in den letzten 5 Minuten online war.";

$lang['Forum_Location'] = "Welche Seite";
$lang['Last_updated'] = "Zuletzt aktualisiert";

$lang['Forum_index'] = "Forum-Index";
$lang['Logging_on'] = "Einloggen";
$lang['Posting_message'] = "Nachricht schreiben";
$lang['Searching_forums'] = "Foren durchsuchen";
$lang['Viewing_profile'] = "Profil anzeigen";
$lang['Viewing_online'] = "Anzeigen, wer online ist";
$lang['Viewing_member_list'] = "Mitgliederliste anzeigen";
$lang['Viewing_priv_msgs'] = "Private Nachrichten anzeigen";
$lang['Viewing_FAQ'] = "FAQ anzeigen";


//
// Moderator Control Panel
//
$lang['Mod_CP'] = "Moderator Control Panel";
$lang['Mod_CP_explain'] = "Mit dem unteren Men� kannst Du mehrere Moderatoren-Operationen gleichzeitig ausf�hren. Du kannst Beitr�ge �ffnen, schlie�en, l�schen oder verschieben.";

$lang['Select'] = "Ausw�hlen";
$lang['Delete'] = "L�schen";
$lang['Move'] = "Verschieben";
$lang['Lock'] = "Sperren";
$lang['Unlock'] = "Entsperren";

$lang['Topics_Removed'] = "Die gew�hlten Themen wurden erfolgreich gel�scht.";
$lang['Topics_Locked'] = "Die gew�hlten Themen wurden erfolgreich gesperrt.";
$lang['Topics_Moved'] = "Die gew�hlten Themen wurden verschoben.";
$lang['Topics_Unlocked'] = "Die gew�hlten Themen wurden entsperrt.";
$lang['No_Topics_Moved'] = "Es wurden keine Themen verschoben.";

$lang['Confirm_delete_topic'] = "Bist Du sicher, dass die gew�hlten Themen entfernt werden sollen?";
$lang['Confirm_lock_topic'] = "Bist Du sicher, dass die gew�hlten Themen gesperrt werden sollen?";
$lang['Confirm_unlock_topic'] = "Bist Du sicher, dass die gew�hlten Themen entsperrt werden sollen?";
$lang['Confirm_move_topic'] = "Bist Du sicher, dass die gew�hlten Themen verschoben werden sollen?";

$lang['Move_to_forum'] = "Verschieben nach";
$lang['Leave_shadow_topic'] = "Shadow Topic im alten Forum lassen";

$lang['Split_Topic'] = "Split Topic Control Panel";
$lang['Split_Topic_explain'] = "Mit den Eingabefeldern unten kannst Du ein Thema in mehrere teilen.";
$lang['Split_title'] = "Titel des neuen Themas";
$lang['Split_forum'] = "Forum des neuen Themas";
$lang['Split_posts'] = "Gew�hlte Beitr�ge teilen";
$lang['Split_after'] = "Von gew�hltem Beitrag teilen";
$lang['Topic_split'] = "Das gew�hlte Thema wurde erfolgreich geteilt";

$lang['Too_many_error'] = "Du hast zu viele Beitr�ge gew�hlt. Du kannst nur einen Beitrag ausw�hlen, nach dem geteilt werden soll!";

$lang['None_selected'] = "Du hast keine Themen ausgew�hlt, auf die diese Aktion ausgef�hrt werden soll. Bitte w�hle mindestens eins aus.";
$lang['New_forum'] = "Neues Forum";

$lang['This_posts_IP'] = "IP-Adresse f�r diesen Beitrag";
$lang['Other_IP_this_user'] = "Andere IP-Adressen, von denen dieser Benutzer geschrieben hat";
$lang['Users_this_IP'] = "Beitr�ge von dieser IP-Adresse";
$lang['IP_info'] = "IP-Information";
$lang['Lookup_IP'] = "IP nachschlagen";


//
// Timezones ... for display on each page
//
$lang['All_times'] = "Alle Zeiten sind %s"; // eg. All times are GMT - 12 Hours (times from next block)

$lang['-12'] = "GMT - 12 Stunden";
$lang['-11'] = "GMT - 11 Stunden";
$lang['-10'] = "HST (Hawaii)";
$lang['-9'] = "GMT - 9 Stunden";
$lang['-8'] = "PST (USA/Kanada)";
$lang['-7'] = "MST (USA/Kanada)";
$lang['-6'] = "CST (USA/Kanada)";
$lang['-5'] = "EST (USA/Kanada)";
$lang['-4'] = "GMT - 4 Stunden";
$lang['-3.5'] = "GMT - 3.5 Stunden";
$lang['-3'] = "GMT - 3 Stunden";
$lang['-2'] = "Mittelatlantisch";
$lang['-1'] = "GMT - 1 Stunde";
$lang['0'] = "GMT";
$lang['1'] = "MESZ (Westeuropa)";
$lang['2'] = "EET (Osteuropa)";
$lang['3'] = "GMT + 3 Stunden";
$lang['3.5'] = "GMT + 3.5 Stunden";
$lang['4'] = "GMT + 4 Stunden";
$lang['4.5'] = "GMT + 4.5 Stunden";
$lang['5'] = "GMT + 5 Stunden";
$lang['5.5'] = "GMT + 5.5 Stunden";
$lang['6'] = "GMT + 6 Stunden";
$lang['7'] = "GMT + 7 Stunden";
$lang['8'] = "WST (Australien)";
$lang['9'] = "GMT + 9 Stunden";
$lang['9.5'] = "CST (Australien)";
$lang['10'] = "EST (Australien)";
$lang['11'] = "GMT + 11 Stunden";
$lang['12'] = "GMT + 12 Stunden";

// These are displayed in the timezone select box
$lang['tz']['-12'] = "(GMT -12:00 Stunden) Eniwetok, Kwajalein";
$lang['tz']['-11'] = "(GMT -11:00 Stunden) Midway Island, Samoa";
$lang['tz']['-10'] = "(GMT -10:00 Stunden) Hawaii";
$lang['tz']['-9'] = "(GMT -9:00 Stunden) Alaska";
$lang['tz']['-8'] = "(GMT -8:00 Stunden) Pacific Time (US &amp; Canada)";
$lang['tz']['-7'] = "(GMT -7:00 Stunden) Mountain Time (US &amp; Canada)";
$lang['tz']['-6'] = "(GMT -6:00 Stunden) Central Time (US &amp; Canada), Mexico City";
$lang['tz']['-5'] = "(GMT -5:00 Stunden) Eastern Time (US &amp; Canada), Bogota, Lima, Quito";
$lang['tz']['-4'] = "(GMT -4:00 Stunden) Atlantic Time (Canada), Caracas, La Paz";
$lang['tz']['-3.5'] = "(GMT -3:30 Stunden) Neufundland";
$lang['tz']['-3'] = "(GMT -3:00 Stunden) Brasilien, Buenos Aires, Georgetown, Falkland-Inseln";
$lang['tz']['-2'] = "(GMT -2:00 Stunden) Mid-Atlantic, Ascension, St. Helena";
$lang['tz']['-1'] = "(GMT -1:00 Stunden) Azoren, Cap Verde";
$lang['tz']['0'] = "(GMT) Casablanca, Dublin, Edinburgh, London, Lissabon, Monrovia";
$lang['tz']['1'] = "(GMT +1:00 Stunden) Berlin, Br�ssel, Kopenhagen, Madrid, Paris, Rom";
$lang['tz']['2'] = "(GMT +2:00 Stunden) Kaliningrad, S�dafrika";
$lang['tz']['3'] = "(GMT +3:00 Stunden) Baghdad, Riyadh, Moskau, Nairobi";
$lang['tz']['3.5'] = "(GMT +3:30 Stunden) Teheran";
$lang['tz']['4'] = "(GMT +4:00 Stunden) Abu Dhabi, Baku, Muscat, Tbilisi";
$lang['tz']['4.5'] = "(GMT +4:30 Stunden) Kabul";
$lang['tz']['5'] = "(GMT +5:00 Stunden) Ekaterinburg, Islamabad, Karachi, Tashkent";
$lang['tz']['5.5'] = "(GMT +5:30 Stunden) Bombay, Calcutta, Madras, Neu Delhi";
$lang['tz']['6'] = "(GMT +6:00 Stunden) Almaty, Colombo, Dhaka";
$lang['tz']['6.5'] = "(GMT +6:30 hours) Rangun";
$lang['tz']['7'] = "(GMT +7:00 Stunden) Bangkok, Hanoi, Jakarta";
$lang['tz']['8'] = "(GMT +8:00 Stunden) Peking, Hong Kong, Perth, Singapur, Taipeh";
$lang['tz']['9'] = "(GMT +9:00 Stunden) Osaka, Sapporo, Seoul, Tokio, Yakutsk";
$lang['tz']['9.5'] = "(GMT +9:30 Stunden) Adelaide, Darwin";
$lang['tz']['10'] = "(GMT +10:00 Stunden) Melbourne, Papua Neu Guinea, Sydney, Wladiwostok";
$lang['tz']['11'] = "(GMT +11:00 Stunden) Magadan, Neu Kaledonien, Solomon-Inseln";
$lang['tz']['12'] = "(GMT +12:00 Stunden) Auckland, Wellington, Fidji, Marshall-Insel";

$lang['days_long'][0] = "Sonntag"; 
$lang['days_long'][1] = "Montag"; 
$lang['days_long'][2] = "Dienstag"; 
$lang['days_long'][3] = "Mittwoch"; 
$lang['days_long'][4] = "Donnerstag"; 
$lang['days_long'][5] = "Freitag"; 
$lang['days_long'][6] = "Samstag"; 
 
$lang['days_short'][0] = "So"; 
$lang['days_short'][1] = "Mo"; 
$lang['days_short'][2] = "Di"; 
$lang['days_short'][3] = "Mi"; 
$lang['days_short'][4] = "Do"; 
$lang['days_short'][5] = "Fr"; 
$lang['days_short'][6] = "Sa"; 
 
$lang['months_long'][0] = "Januar"; 
$lang['months_long'][1] = "Februar"; 
$lang['months_long'][2] = "M�rz"; 
$lang['months_long'][3] = "April"; 
$lang['months_long'][4] = "Mai"; 
$lang['months_long'][5] = "Juni"; 
$lang['months_long'][6] = "Juli"; 
$lang['months_long'][7] = "August"; 
$lang['months_long'][8] = "September"; 
$lang['months_long'][9] = "Oktober"; 
$lang['months_long'][10] = "November"; 
$lang['months_long'][11] = "Dezember"; 
 
$lang['months_short'][0] = "Jan."; 
$lang['months_short'][1] = "Feb."; 
$lang['months_short'][2] = "M�rz"; 
$lang['months_short'][3] = "Apr."; 
$lang['months_short'][4] = "Mai"; 
$lang['months_short'][5] = "Jun."; 
$lang['months_short'][6] = "Jul."; 
$lang['months_short'][7] = "Aug."; 
$lang['months_short'][8] = "Sep."; 
$lang['months_short'][9] = "Okt."; 
$lang['months_short'][10] = "Nov."; 
$lang['months_short'][11] = "Dez."; 

//
// Errors (not related to a
// specific failure on a page)
//
$lang['Information'] = "Information";
$lang['Critical_Information'] = "Kritische Information";

$lang['You_been_banned'] = "Du wurdest von diesem Forum verbannt.<br />Kontaktiere den Administrator, um mehr Informationen zu erhalten.";
$lang['General_Error'] = "Allgemeiner Fehler";
$lang['Critical_Error'] = "Kritischer Fehler";
$lang['An_error_occured'] = "Ein Fehler ist aufgetreten.";
$lang['A_critical_error'] = "Ein kritischer Fehler ist aufgetreten.";

$lang['Error_login'] = "Du hast einen ung�ltigen Benutzernamen eingegeben.";

$lang['Not_Moderator'] = "Du bist nicht Moderator dieses Forums.";
$lang['Not_Authorised'] = "Nicht berechtigt";

//
// That's all Folks!
// -------------------------------------------------

?>
