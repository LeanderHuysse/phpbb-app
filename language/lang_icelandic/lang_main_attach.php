<?php
/***************************************************************************
 *
 *	language/lang_icelandic/lang_main_attach.php   [icelandic]
 *	------------------------------------------------------------------------
 *
 *	Created     Mon,  9 Sep 2002 00:06:29 +0200
 *
 *	Copyright   (c) 2002 The phpBB Group
 *	Email       support@phpbb.com
 *
 *	Created by  C.O.L.T. v1.4.4 - The Cool Online Language Translation Tool
 *	            Fast like a bullet and available online!
 *	            (c) 2002 Matthias C. Hormann <matthias@hormann-online.net>
 *
 *	Visit       http://www.phpbb.kicks-ass.net/ to find out more!
 *
 ***************************************************************************/

/***************************************************************************
 *
 *	This program is free software; you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License as published by
 *	the Free Software Foundation; either version 2 of the License, or
 *	(at your option) any later version.
 *
 ***************************************************************************/





//
// Attachment Mod Main Language Variables
//

// Viewforum
$lang['Rules_attach_can'] = '�� <b>getur</b> sett vi�hengi inn � �essar umr��ur';
$lang['Rules_attach_cannot'] = '�� getur <b>ekki</b> sett vi�hengi inn � �essar umr��ur';
$lang['Rules_download_can'] = '�� <b>getur</b> hla�i� ni�ur skr�m � �essum umr��um';
$lang['Rules_download_cannot'] = '�� getur <b>ekki</b> hla�i� ni�ur skr�m � �essum umr��um';

// Viewtopic
$lang['Mime_type_disallowed_post'] = 'mime ger� %s var ger� �virk af umsj�narmanni umr��u bor�sins og �ess vegna er �etta vi�hengi ekki s�nt'; // used in Posts, replace %s with mime type

// Posting/Replying (Not private messaging!)
$lang['Disallowed_extension'] = 'Endingin %s er ekki heimil'; // replace %s with extension (e.g. .php) 
$lang['Disallowed_Mime_Type'] = 'Ekki heimil ger� Mime: %s<p>Heimilar ger�ir eru:<br />%s'; // mime type, allowed types 
$lang['Attachment_too_big'] = '�etta vi�hengi er of st�rt.<br />Mesta st�r� er: %d %s'; // replace %d with maximum file size, %s with size var
$lang['Attachment_php_size_overrun'] = '�etta vi�hengi er of st�rt.<br />Mesta st�r� uppgefin � PHP: %d MB'; // replace %d with ini_get('upload_max_filesize')
$lang['Attachment_php_size_na'] = '�etta vi�hengi er of st�rt.<br />Gat ekki fengi� upp mestu uppgefna st�r� fr� PHP.'; 
$lang['Invalid_filename'] = '%s er �gilt skr�arnafn'; // replace %s with given filename
$lang['General_upload_error'] = 'Villa vi� upphal: Gat ekki hala� upp vi�hengi vi� %s'; // replace %s with local path 
   
$lang['Add_attachment'] = 'B�ta vi� vi�hengi';
$lang['Add_attachment_title'] = 'B�ta vi� vi�hengi';
$lang['Add_attachment_explain'] = 'Ef �� vilt ekki b�ta vi� vi�hengi �� vi� innlegg �itt �� �ttu a� hafa �essa reiti t�ma';
$lang['File_name'] = 'Skr�arnafn';
$lang['File_comment'] = 'Athugasemd me� skr�';
$lang['Delete_attachments'] = 'Ey�a vi�hengjum';
$lang['Delete_attachment'] = 'Ey�a vi�hengi';
$lang['Posted_attachments'] = 'Innsend vi�hengi';
$lang['Update_comment'] = 'Uppf�ra athugasemd';

// Auth related entries
$lang['Sorry_auth_attach'] = '�v� mi�ur �� getur bara %s sent inn vi�hengi � �essum umr��um';

// Download Count functionality
$lang['Download_number'] = 'Skr� hla�i� ni�ur e�a sko�u� %d sinnum/sinni'; // replace %d with count

// Errors
$lang['Sorry_auth_view_attach'] = '�v� mi�ur �� hefur �� ekki heimild til a� sko�a e�a hla�a ni�ur �etta vi�hengi';
$lang['No_file_comment_available'] = 'Engin athugasemd';
$lang['Too_many_attachments'] = 'Ekki h�gt a� b�ta vi� vi�hengi, �ar sem �a� eru komin %d vi�hengi vi� �etta innlegg'; // replace %d with maximum number of attachments
$lang['Attach_quota_reached'] = '�v� mi�ur �� er mestu skr�arst�r� n�� fyrir �ll vi�hengi. Haf�u samband umsj�narmann umr��ubor�sins ef �� vilt meiri uppl�singar';

$lang['Error_no_attachment'] = 'Vali� vi�hengi er ekki lengur til';
$lang['No_attachment_selected'] = '�� hefur ekki vali� neitt vi�hengi til a� hla�a ni�ur e�a sko�a';
$lang['Attachment_feature_disabled'] = 'Vi�hengja m�guleiki er �virkur';

$lang['Directory_does_not_exist'] = 'Skr�armappan \'%s\' er ekki til e�a fannst ekki.'; // replace %s with directory
$lang['Directory_is_not_a_dir'] = 'Athuga�u hvort \'%s\' er skr�armappa.'; // replace %s with directory
$lang['Directory_not_writeable'] = 'Mappa \'%s\' er ekki skrifanleg. �� ver�ur a� b�a til upphle�slu sl�� og gera chmode 777 � henni (e�a breyta eiganda � httpd-vef�j�ninum) til a� hla�a upp skr�m.<br />Ef �� hefur bara venjulegan ftp-a�gang �� getur �� breytt \'Attribute\' � m�ppunni � rwxrwxrwx.'; // replace %s with directory

$lang['Ftp_error_connect'] = 'Gat ekki tengt vi�  FTP  vef�j�n: \'%s\'. Athuga�u stillingarnar � FTP.';
$lang['Ftp_error_login'] = 'Gat ekki skr�� mig inn � FTP vef�j�ninn. Notendanafn \'%s\' e�a a�gangsor�i� er rangt. Athuga�u stillingarnar � FTP.';
$lang['Ftp_error_path'] = 'Gat ekki tengt vi� ftp m�ppu: \'%s\'. Athuga�ur stillingar � FTP.';
$lang['Ftp_error_upload'] = 'Gat ekki hla�i� upp skr�m � ftp m�ppu: \'%s\'. Athuga�ur stillingar � FTP.';
$lang['Ftp_error_delete'] = 'Gat ekki eytt skr�m � ftp m�ppu: \'%s\'. Athuga�ur stillingar � FTP.<br />�nnur �st�� getur veri� fyrir �essari villu e�a �a� a� �etta vi�hengi er ekki til, athug�u �etta fyrst � skugga vi�hengjum.';

$lang['Attach_quota_sender_pm_reached'] = '�v� mi�ur �� hefur mestu skr�ar st�r� veri� n�� fyrir �ll vi�hengi � einkap�st h�lfi ��nu. Eyddu nokkrum af sendum/m�tteknum vi�hengjum.';
$lang['Attach_quota_receiver_pm_reached'] = '�v� mi�ur �� hefur mestu skr�ar st�r� veri� n�� fyrir �ll vi�hengi � einkap�st h�lfi \'%s\' veri� n��. Haf�u samband vi� vi�komandi e�a pr�fa�u aftur seinna �egar hann/h�n hefur eytt einhverju af vi�hengjum s�num.';

// Size related Variables
$lang['Bytes'] = 'Bytes';
$lang['KB'] = 'KB';
$lang['MB'] = 'MB';

$lang['Attach_search_query'] = 'Leita a� vi�hengjum';

// Private Messaging
$lang['Pm_delete_attachments'] = 'Ey�a vi�hengjum';

?>