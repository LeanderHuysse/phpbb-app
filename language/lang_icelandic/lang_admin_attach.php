<?php
/***************************************************************************
 *
 *	language/lang_icelandic/lang_admin_attach.php   [icelandic]
 *	------------------------------------------------------------------------
 *
 *	Created     Sat,  7 Sep 2002 01:47:14 +0200
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
// Attachment Mod Admin Language Variables
//

// Modules, this replaces the keys used
$lang['Attachments'] = 'Vi�hengi';
$lang['Attachment'] = 'Vi�hengi';

$lang['Extension_control'] = 'Vi�auka stj�rnun';

$lang['Extensions'] = 'Vi�aukar';
$lang['Extension'] = 'Vi�auki';
$lang['Mimetypes'] = 'MIME Ger�ir'; 
$lang['Mimetype'] = 'MIME Ger�'; 
$lang['Mimegroups'] = 'MIME H�par';
$lang['Mimegroup'] = 'MIME H�pur';

// Auth pages
$lang['Auth_attach'] = 'Senda inn skr�r';
$lang['Auth_download'] = 'Hla�a ni�ur';

// Attachments
$lang['Select_action'] = 'Hva� � a� gera';

// Attachments -> Management
$lang['Attach_settings'] = 'Stilling vi�hengis';
$lang['Manage_attachments_explain'] = 'H�rna getur �� stillt stillingar fyrir vi�hengi';
$lang['Attach_filesize_settings'] = 'St�r� � vi�hengi';
$lang['Attach_number_settings'] = 'Fj�ldi vi�hengja';
$lang['Attach_options_settings'] = 'Aukastillingar fyrir vi�hengi';

$lang['Upload_directory'] = 'Mappa fyrir vi�hengi';
$lang['Upload_directory_explain'] = 'Settu inn sl�� � m�ppu til a� vista vi�hengi � s�� fr� phpBB r�tarm�ppu. Til d�mis, settu \'files\' ef phpBB2 forriti� er: http://www.yourdomain.com/phpBB2 og vi�hengja mappan er h�r:  http://www.yourdomain.com/phpBB2/files.';
$lang['Attach_img_path'] = 'Sm�mynd fyrir innlegg';
$lang['Attach_img_path_explain'] = '�essi mynd kemur n�st vi� tengil � vi�hengi � vi�komandi innleggi.  Ekki setja neitt ef �� vilt ekki a� �a� s� nein mynd s�nd.';
$lang['Attach_topic_icon'] = 'Mynd fyrir spjall�r�� sem er me� vi�hengi';
$lang['Attach_topic_icon_explain'] = '�essi mynd er sett vi� spjall�r�� sem inniheldur vi�hengi.  Ekki setja neitt ef �� vilt ekki a� �a� s� nein mynd s�nd.';

$lang['Max_filesize_attach'] = 'Skr�arst�r�';
$lang['Max_filesize_attach_explain'] = 'Mesta skr�arst�r� fyrir vi�hengi (� bytes). 0 ���ir �takm�rku� st�r�.';
$lang['Attach_quota'] = 'Heildar st�r� vi�hengja ';
$lang['Attach_quota_explain'] = 'Mesta diskpl�ss sem �LL vi�hengi mega taka.';
$lang['Max_filesize_pm'] = 'Mesta skr�arst�r� � m�ppu fyrir einkap�st';
$lang['Max_filesize_pm_explain'] = 'Mesta diskpl�ss sem vi�hengi mega taka me� einkap�sti fyrir hvern og einn notanda.'; 

$lang['Max_attachments'] = 'Mesti fj�ldi vi�hengja';
$lang['Max_attachments_explain'] = 'Mesti fj�ldi vi�hengja sem heimill er � einu innleggi.';
$lang['Max_attachments_pm'] = 'Mesti fj�ldi vi�hengja � einni einkap�st sendingu';
$lang['Max_attachments_pm_explain'] = 'H�r setur �� fj�lda vi�hengja sem notandi m� setja me� inn me� einkap�sti.';

$lang['Disable_mod'] = 'Taka vi�hengja kerfi �r sambandi';
$lang['Disable_mod_explain'] = '�etta er a�allega til a� pr�fa n� sni� e�a �ema � umr��ubor�inu, �� h�ttir a� virka vi�hengja m�guleikinn en Stj�rnbor�i� virkar samt �fram.';
$lang['PM_Attachments'] = 'Heimila vi�hengi � einkap�sti';
$lang['PM_Attachments_explain'] = 'Heimilar/Bannar vi�hengi � einkap�stsendingum';
$lang['Ftp_upload'] = 'Gera FTP upphal virkt';
$lang['Ftp_upload_explain'] = 'Virkt/�virkt FTP upphals m�guleiki. Ef �� setur J�, �� ver�ur �� a� stilla FTP stillingar fyrir vi�hengi og �� er mappan fyrir vi�hengi ekki lengur notu�.';

$lang['Attach_ftp_path'] = 'Sl�� FTP a� upphals m�ppu';
$lang['Attach_ftp_path_explain'] = '�etta er mappan sem vi�hengi ver�a vistu�. �essi mappa �arf ekki a� vera chmodded. Ekki setja inn IP e�a FTP-Netfang h�r, sj�lfgefin IP tala er localhost, �essi kassi er bara fyrir FTP sl��.<br />Til d�mis: /home/web/uploads';
$lang['Ftp_download_path'] = 'Ni�urhals tengill a� FTP sl��';
$lang['Ftp_download_path_explain'] = 'Settu inn sl�� fyrir FTP fr� phpBB2 uppsetningunni �inni. Til d�mis, settu in \'ftpfiles\' ef phpBB2 uppsetningin er: http://www.yourdomain.com/phpBB2 og vi�hengja mappan er: http://www.yourdomain.com/phpBB2/ftpfiles.<br />Haf�u �ennan kassa t�man er �� ert me� sl�� utan vef-r�tar. Me� �essum kassa t�mum �� virkar ekki ni�urhali� me� FTP.';

$lang['Attach_config_updated'] = 'Vi�hengja stillingar t�kust';
$lang['Click_return_attach_config'] = '�ti� %sH�r%s til a� fara til baka til Vi�hengja stillingar';

// Attachments -> Extension Control
$lang['Manage_forbidden_extensions'] = 'Stj�rnun � b�nnu�um endingum';
$lang['Manage_forbidden_extensions_explain'] = 'H�r er h�gt a� b�ta vi� e�a ey�a endingum sem heimila�ar eru � vi�hengjum. Endingarnar php, php3 og php4 eru banna�ar, �� getur ekki eytt �eim.';
$lang['Extension_exist'] = 'Endingin %s er �egar til'; // replace %s with the extension

// Attachments -> Mime Types
$lang['Manage_mime_types'] = 'Stj�rnun MIME tegunda';
$lang['Manage_mime_types_explain'] = 'H�r er h�gt a� stj�rna MIME ger�um. Ef �� vilt heimila/banna �kve�nar ger�ir af MIME, nota�u �� MIME h�p stj�rnun.';
$lang['Explanation'] = 'Sk�ring';
$lang['Invalid_mimetype'] = 'B�nnu� MIME ger�';
$lang['Mimetype_exist'] = 'MIME ger� %s �egar til'; // replace %s with the mimetype

// Attachments -> Mime Groups
$lang['Manage_mime_groups'] = 'Stj�rnun MIME h�pa';
$lang['Manage_mime_groups_explain'] = 'H�r getur �� b�tt vi�, eytt e�a breytt MIME h�pum, �� getur banna� MIME h�pa og gert mynda h�p.';
$lang['Image_group'] = 'Mynda h�pur';
$lang['Allowed'] = 'Heimill';
$lang['Mimegroup_exist'] = 'MIME h�pur %s er �egar til'; // replace %s with the mimetype
$lang['Special_category'] = 'S�rstakur flokkur';
$lang['Category_images'] = 'myndir';
$lang['Category_wma_files'] = 'wma skr�r';
$lang['Category_swf_files'] = 'flash skr�r';

$lang['Download_mode'] = 'Ni�urhals hamur';
$lang['Upload_image'] = 'Hla�a upp mynd';
$lang['Max_groups_filesize'] = 'Mesta skr�arst�r�';

$lang['Collapse'] = 'Fella saman';
$lang['Decollapse'] = 'Taka sundur';

// Attachments -> Shadow Attachments
$lang['Shadow_attachments'] = 'Skugga vi�hengi';		// used in modules-list
$lang['Shadow_attachments_title'] = 'Skugga vi�hengi';
$lang['Shadow_attachments_explain'] = 'H�r getur �� eytt tenglum �r innleggjum sem v�sa a� vi�hengjum �egar vi�hengin vantar � diskinn og einnig getur �� eytt vi�hengjum �egar engin innlegg v�sa � �au. �� getur hla�i� ni�ur skr�m e�a sko�a� skr� sem �� klikkar �; ef enginn tengill er til a� klikka � �� er skr�in ekki til.';
$lang['Shadow_attachments_file_explain'] = 'Ey�a �llum vi�hengjum sem eru � skr�arsafni ��nu og eru ekki me� tengil � neinu innleggi.';
$lang['Shadow_attachments_row_explain'] = 'Ey�a tenglum �r innleggjum sem v�sa � vi�hengi sem ekki eru til � skr�arsafninu.';

// Attachments -> Control Panel
$lang['Control_Panel'] = 'Stj�rnbor�';
$lang['Control_panel_title'] = 'Stj�rnbor� fyrir vi�hengi';
$lang['Control_panel_explain'] = 'H�r getur �� sko�a� og stj�rna� vi�hengjum h�� Notendum, Vi�hengjum, hversu oft sko�a� o.fl....';
$lang['File_comment_cp'] = 'Athugasemd me� skr�';

// Sort Types
$lang['Sort_Attachments'] = 'Vi�hengi';
$lang['Sort_Size'] = 'St�r�';
$lang['Sort_Filename'] = 'Skr�arnafn';
$lang['Sort_Comment'] = 'Athugasemd';
$lang['Sort_Mimegroup'] = 'MIME h�pur';
$lang['Sort_Mimetype'] = 'MIME ger�';
$lang['Sort_Downloads'] = 'Hla�a ni�ur';
$lang['Sort_Posttime'] = 'Innlegg dags/kl.';
$lang['Sort_Posts'] = 'Innlegg';

// View Types
$lang['View_Statistic'] = 'T�lfr��i';
$lang['View_Search'] = 'Leita';
$lang['View_Username'] = 'Notendanafn';
$lang['View_Attachments'] = 'Vi�hengi';

// Control Panel -> Statistics
$lang['Number_of_attachments'] = 'Fj�ldi vi�hengja';
$lang['Total_filesize'] = 'Samtals skr�arst�r�';
$lang['Number_posts_attach'] = 'Fj�ldi innleggja me� vi�hengi';
$lang['Number_topics_attach'] = 'Fj�ldi spjall�r��a me� vi�hengi';
$lang['Number_users_attach'] = 'Innlegg me� vi�hengi hvers notanda ';
$lang['Number_pms_attach'] = 'Samtals fj�ldi vi�hengja � einkap�sti';

// Control Panel -> Search
$lang['Search_wildcard_explain'] = 'Nota�u * sem einhvern staf';
$lang['Size_smaller_than'] = 'Vi�hengi minna en (bytes)';
$lang['Size_greater_than'] = 'Vi�hengi st�rra en (bytes)';
$lang['Count_smaller_than'] = 'Fj�ldi ni�urhala minni en';
$lang['Count_greater_than'] = 'Fj�ldi ni�urhala meiri en';
$lang['More_days_old'] = 'Meira en �etta margra daga g�mul';
$lang['No_attach_search_match'] = 'Engin vi�hengi passa vi� leitarforsendur';

// Control Panel -> Attachments
$lang['Statistics_for_user'] = 'T�lfr��i vi�hengja fyrir %s'; // replace %s with username
$lang['Size_in_kb'] = 'St�r� (KB)';
$lang['Downloads'] = 'Ni�urh�l';
$lang['Post_time'] = 'Innlegg dags/kl';
$lang['Posted_in_topic'] = 'Innlegg � spjall�r��i';
$lang['Confirm_delete_attachments'] = 'Ertu viss um a� �� viljir ey�a v�ldum vi�hengjum?';
$lang['Deleted_attachments'] = 'V�ldum vi�hengjum hefur veri� eytt.';
$lang['Error_deleted_attachments'] = 'Get ekki eytt vi�hengjum.';

?>