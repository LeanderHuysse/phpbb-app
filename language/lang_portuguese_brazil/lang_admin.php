<?php
/***************************************************************************
 *                          lang_admin.php [portuguese_br]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id$
 *
 ****************************************************************************/

 /****************************************************************************
 * Traduzido por:
 * JuniorZ rs_junior@hotmail.com || http://www.phpbrasil.rg3.net
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
// Modules, this replaces the keys used
// in the modules[][] arrays in each module file
//
$lang['General'] = "Admin Geral";
$lang['Users'] = "Admin de Usu�rios";
$lang['Groups'] = "Admin de Grupo";
$lang['Forums'] = "Admin do F�rum";
$lang['Styles'] = "Admin de Estilos";

$lang['Configuration'] = "Configura��o";
$lang['Permissions'] = "Permiss�es";
$lang['Manage'] = "Ger�ncia";
$lang['Disallow'] = "Proibi��o de Nomes";
$lang['Prune'] = "Desbastar";
$lang['Mass_Email'] = "Email em Massa";
$lang['Ranks'] = "Escal�es";
$lang['Smilies'] = "Smileys";
$lang['Ban_Management'] = "Controle de Expuls�es";
$lang['Word_Censor'] = "Palavras Censuradas";
$lang['Export'] = "Exportar";
$lang['Create_new'] = "Criar";
$lang['Add_new'] = "Adicionar";
$lang['Backup_DB'] = "Copiar Banco de Dados";
$lang['Restore_DB'] = "Repor Banco de Dados";


//
// Index
//
$lang['Admin'] = "Administra��o";
$lang['Not_admin'] = "Voc� n�o est� autorizado a administrar este painel";
$lang['Welcome_phpBB'] = "Bem-vindo ao phpBB";
$lang['Admin_intro'] = "Obrigado por escolher phpBB como seu f�rum. Este painel lhe d� uma visualiza��o glogal das estat�sticas dos seus f�runs. Poder� voltar aqui clicando em <u>�ndice de Admin</u> no painel esquerdo. Para voltar ao �ndice global dos f�runs clique no logo phpBB. Os outros atalhos d�o-lhe acesso aos diversos paineis de controle dos f�runs, cada um com instru��es de uso.";
$lang['Main_index'] = "�ndice do F�rum";
$lang['Forum_stats'] = "Estat�sticas do F�rum";
$lang['Admin_Index'] = "�ndice de Admin";
$lang['Preview_forum'] = "Prever F�rum";

$lang['Click_return_admin_index'] = "Clique %sAqui%s para voltar ao �ndice de Admin";

$lang['Statistic'] = "Estat�stica";
$lang['Value'] = "Valor";
$lang['Number_posts'] = "N�mero de Mensagens";
$lang['Posts_per_day'] = "Mensagens por Dia";
$lang['Number_topics'] = "N�mero de T�picos";
$lang['Topics_per_day'] = "T�picos por Dia";
$lang['Number_users'] = "N�mero de Usu�rios";
$lang['Users_per_day'] = "Usu�rios por Dia";
$lang['Board_started'] = "In�cio dos F�runs";
$lang['Avatar_dir_size'] = "Pasta de Avatars";
$lang['Database_size'] = "Tamanho do Banco de Dados";
$lang['Gzip_compression'] ="Compress�o Gzip";
$lang['Not_available'] = "N�o Dispon�vel";

$lang['ON'] = "Habilitado"; // This is for GZip compression
$lang['OFF'] = "Desabilitado";


//
// DB Utils
//
$lang['Database_Utilities'] = "Utilit�rios de Banco de Dados";

$lang['Restore'] = "Restaurar";
$lang['Backup'] = "Copiar";
$lang['Restore_explain'] = "Pode ser feita a partir deste painel a restaura��o de um arquivo de tabelas do phpBB previamente guardado. Caso o seu servidor permita poder� usar o arquivo compactado em Gzip que ser� automaticamente descompactado. <b>ATEN��O</b> Esta opera��o rep�e a informa��o existente. Dependendo do tamanho de seu Banco de Dados este processo poder� levar algum tempo- n�o mude esta p�gina para outra.";
$lang['Backup_explain'] = "Pode ser feita a partir deste painel uma c�pia de toda a informa��o do seu phpBB. Se pretender copiar tabelas adicionais que contenha no Banco de Dados escreva na caixa de texto de Tabelas Adicionais abaixo os seus nomes separados por v�rgulas. Caso o seu servidor permita pode compactar o arquivo em gzip de forma a reduzir o seu tamanho antes de o copiar.";

$lang['Backup_options'] = "Op��es de C�pia";
$lang['Start_backup'] = "Iniciar a C�pia";
$lang['Full_backup'] = "C�pia Total";
$lang['Structure_backup'] = "Copiar apenas a Estrutura";
$lang['Data_backup'] = "Copiar apenas os Dados";
$lang['Additional_tables'] = "Tabelas Adicionais";
$lang['Gzip_compress'] = "Compactar arquivo em Gzip";
$lang['Select_file'] = "Selecione um arquivo";
$lang['Start_Restore'] = "Iniciar a Restaura��o";

$lang['Restore_success'] = "O  Banco de Dados foi restaurado com sucesso.<br /><br />Os seus f�runs dever�o voltar agora ao estado em que se encontravam na �poca da c�pia.";
$lang['Backup_download'] = "A c�pia dever� iniciar em breve. Por favor aguarde at� que comece.";
$lang['Backups_not_supported'] = "O seu sistema de Banco de Dados n�o permite efetuar c�pias de Dados";

$lang['Restore_Error_uploading'] = "Erro ao Enviar o arquivo";
$lang['Restore_Error_filename'] = "Problema no nome do arquivo, por favor tente outro nome";
$lang['Restore_Error_decompress'] = "N�o � poss�vel descompactar um arquivo gzip, por favor restaurar uma vers�o em texto";
$lang['Restore_Error_no_file'] = "Nenhum arquivo foi restaurado";


//
// Auth pages
//
$lang['Select_a_User'] = "Seleccione um Usu�rio";
$lang['Select_a_Group'] = "Seleccione um Grupo";
$lang['Select_a_Forum'] = "Seleccione um F�rum";
$lang['Auth_Control_User'] = "Controle de Permiss�es de Usu�rio";
$lang['Auth_Control_Group'] = "Controle de Permiss�es de Grupo";
$lang['Auth_Control_Forum'] = "Controle de Permiss�es de F�rum";
$lang['Look_up_User'] = "Verificar";
$lang['Look_up_Group'] = "Verificar";
$lang['Look_up_Forum'] = "Verificar";

$lang['Group_auth_explain'] = "Aqui voc� pode alterar as permiss�es e status de moderador de Grupos de Usu�rios. N�o esque�a que quando as alterar, essas permiss�es em particular n�o poder�o invalidar que o Usu�rio entre nos f�runs, etc. Caso isso aconte�a ser� devidamente avisado.";
$lang['User_auth_explain'] = "Pode alterar aqui as permiss�es e status de moderador de cada Usu�rio individualmente. N�o esque�a que quando mudar as permiss�es de um Usu�rio essas permiss�es de grupo n�o poder�o invalidar que o Usu�rio entre nos f�runs, etc.  Caso isso aconte�a ser� devidamente avisado.";
$lang['Forum_auth_explain'] = "Os n�veis de permiss�es em cada f�rum s�o configurados neste painel . Ap�s selecionar um f�rum poder� escolher entre um m�todo simples e um avan�ado, proporcionando este �ltimo um maior controle de configura��o. Ter em mente que a forma em como cada Usu�rio possa efectuar as v�rias opera��es nos f�runs pode ser afectada com qualquer mudan�a nos n�veis de permiss�es.";

$lang['Simple_mode'] = "Modo Simples";
$lang['Advanced_mode'] = "Modo Avan�ado";
$lang['Moderator_status'] = "Status do Moderador";

$lang['Allowed_Access'] = "Acesso Permitido";
$lang['Disallowed_Access'] = "Acesso Impedido";
$lang['Is_Moderator'] = "� Moderador";
$lang['Not_Moderator'] = "N�o � Moderador";

$lang['Conflict_warning'] = "Aviso de Conflito de Autoriza��o";
$lang['Conflict_access_userauth'] = "Este Usu�rio ainda possui direitos de acesso a este f�rum atrav�s do seu registo no Grupo. Voc� talvez queira alterar as permiss�es de Grupo ou remover este Usu�rio desse Grupo para bloquear por completo os seus direitos de acesso. As permiss�es dos Grupos (e os f�runs envolvidos) est�o indicados abaixo.";
$lang['Conflict_mod_userauth'] = "Este Usu�rio ainda possui direitos de modrador a este f�rum atrav�s do seu registo no Grupo. Voc� talvez queira alterar as permiss�es de Grupo ou remover este Usu�rio desse Grupo para bloquear por completo os seus direitos de acesso. As permiss�es dos Grupos (e os f�runs envolvidos) est�o indicados abaixo.";

$lang['Conflict_access_groupauth'] = "O Usu�rio seguinte (ou Usu�rios) ainda possuem direitos de acesso a este f�rum via a sua configura��o de permiss�es individuais. Voc� talvez queira alterar as permiss�es de Usu�rio para bloquear por completo os seus direitos de acesso. As permiss�es dos Usu�rios (e os f�runs envolvidos) est�o indicados abaixo.";

$lang['Conflict_mod_groupauth'] = "O Usu�rio seguinte (ou Usu�rios) ainda possuem direitos de moderador a este f�rum via a sua configura��o de permiss�es individuais. Voc� talvez queira alterar as permiss�es de Usu�rio para bloquear por completo os seus direitos de acesso. As permiss�es dos Usu�rios (e os f�runs envolvidos) est�o indicados abaixo.";

$lang['Public'] = "P�blico";
$lang['Private'] = "Particular";
$lang['Registered'] = "Registado";
$lang['Administrators'] = "Administradores";
$lang['Hidden'] = "Invis�vel";

// These are displayed in the drop down boxes
// mode forum auth, try and keep them short!
$lang['Forum_ALL'] = "TODOS";
$lang['Forum_REG'] = "REGIST";
$lang['Forum_PRIVATE'] = "PRIVADO";
$lang['Forum_MOD'] = "MODERAD";
$lang['Forum_ADMIN'] = "ADMIN";

$lang['View'] = "Verificar";
$lang['Read'] = "Ler";
$lang['Post'] = "Enviar";
$lang['Reply'] = "Responder";
$lang['Edit'] = "Editar";
$lang['Delete'] = "Remover";
$lang['Sticky'] = "Fixo";
$lang['Announce'] = "An�nciar";
$lang['Vote'] = "Votar";
$lang['Pollcreate'] = "Criar Enquete";

$lang['Permissions'] = "Permiss�es";
$lang['Simple_Permission'] = "Permiss�o Simples";

$lang['User_Level'] = "N�vel de Usu�rio";
$lang['Auth_User'] = "Usu�rio";
$lang['Auth_Admin'] = "Administrador";
$lang['Group_memberships'] = "Membros de Grupos de Usu�rios";
$lang['Usergroup_members'] = "Este Grupo tem os seguintes membros";

$lang['Forum_auth_updated'] = "Permiss�es do F�rum atualizadas";
$lang['User_auth_updated'] = "Permiss�es de Usu�rio atualizadas";
$lang['Group_auth_updated'] = "Permiss�es de Grupo atualizadas";

$lang['Auth_updated'] = "As permiss�es foram atualizadas";
$lang['Click_return_userauth'] = "Clique %sAqui%s para voltar a Permiss�es de Usu�rio";
$lang['Click_return_groupauth'] = "Clique %sAqui%s para voltar a Permiss�es de Grupo";
$lang['Click_return_forumauth'] = "Clique %sAqui%s para voltar a Permiss�es de F�rum";


//
// Banning
//
$lang['Ban_control'] = "Controle de Expuls�es";
$lang['Ban_explain'] = "a partir desse painel voc� pode expulsar um Usu�rio espec�fico ou um grupo de endere�os de IP ou 'hostnames'. Estes m�todos impedem Usu�rios de alcan�ar sequer a p�gina inicial dos f�runs. Para evitar que um Usu�rio se registe com um nome diferente pode ser tamb�m banido um endere�o de email. Note que ao banir um email s� por si n�o impede um Usu�rio de se ligar ou colocar mensagens nos f�runs. Para que isso aconte�a empregue um dos m�todos descritos inicialmente.";
$lang['Ban_explain_warn'] = "Nota que ao especificar um grupo de endere�os de IP resulta em TODOS os endere�os incluidos nessa sele��o, ou seja desde o primeiro IP at� ao �ltimo, sejam adicionados � lista de IPs banidos. O sistema de phpBB tenta minimizar o n�mero de endere�os a adicionar ao Banco de Dados empregando automaticamente filtros de sele��o sempre que seja aplic�vel. Se voc� realmente tenha que mencionar um grupo de IPs tente faz�-lo de forma a abranger uma quantidade reduzida de endere�os ou, melhor ainda, use endere�os espec�f�cos.";

$lang['Select_username'] = "Selecionar um Usu�rio";
$lang['Select_ip'] = "Selecionar um IP";
$lang['Select_email'] = "Selecionar um endere�o de Email";

$lang['Ban_username'] = "Banir um ou mais Usu�rios espec�ficos";
$lang['Ban_username_explain'] = "Pode banir v�rios Usu�rios de uma vez usando a combina��o apropriada de teclas do mouse no seu computador ou browser.";

$lang['Ban_IP'] = "Banir um ou mais endere�os de IP ou hostnames";
$lang['IP_hostname'] = "Endere�os de IP ou hostnames";
$lang['Ban_IP_explain'] = "Quando usar mais que um IP e 'hostname' separar cada item com uma v�rgula. Para especificar um grupo de endere�os de IP separar o in�cio do fim com um tra�o (-). Pode tamb�m usar asteriscos (*)";

$lang['Ban_email'] = "Banir um ou mais endere�os de email";
$lang['Ban_email_explain'] = "Quando usar mais que um email separar cada item com uma v�rgula. Para abranger um n�mero mais vasto de possibilidades na sec��o do 'username' do email use asteriscos '*', por exemplo, *@hotmail.com";

$lang['Unban_username'] = "Remover a expuls�o de um ou mais Usu�rios";
$lang['Unban_username_explain'] = "Pode remover a expuls�o de v�rios Usu�rios simultaneamente usando a combina��o apropriada de teclas e rato no seu computador ou browser.";

$lang['Unban_IP'] = "Remover a expuls�o de um ou mais endere�os de IP";
$lang['Unban_IP_explain'] = "Pode remover a expuls�o de v�rios endere�os de IP simultaneamente usando a combina��o apropriada de teclas e rato no seu computador ou browser.";

$lang['Unban_email'] = "Remover a expuls�o de um ou mais endere�os de email";
$lang['Unban_email_explain'] = "Pode remover a expuls�o de v�rios endere�os de email simultaneamente usando a combina��o apropriada de teclas e rato no seu computador ou browser.";

$lang['No_banned_users'] = "N�o h� Nomes de Usu�rios banidos";
$lang['No_banned_ip'] = "N�o h� endere�os de IP banidos";
$lang['No_banned_email'] = "N�o h� endere�os de email banidos";

$lang['Ban_update_sucessful'] = "A lista de expuls�es foi actualizada com sucesso";
$lang['Click_return_banadmin'] = "Clique %sAqui%s para voltar ao Painel de Controle de Expuls�es";


//
// Configuration
//
$lang['General_Config'] = "Configura��o Geral";
$lang['Config_explain'] = "Usar este formul�rio para ajustar todas as op��es gerais do seu phpBB. Para configura��o espec�fica de f�runs ou Usu�rios use os respectivos atalhos no painel esquerdo.";

$lang['Click_return_config'] = "Clique %sAqui%s para voltar � Configura��o Geral";

$lang['General_settings'] = "Configura��o geral do phpBB";
$lang['Server_name'] = "Nome do Dom�nio";
$lang['Server_name_explain'] = "O nome do Dom�nio de onde este f�rum reside";
$lang['Script_path'] = "O 'path' do programa";
$lang['Script_path_explain'] = "O 'path' onde se encontra o phpBB2 em rela��o ao Dominio";
$lang['Server_port'] = "Porta do Servidor";
$lang['Server_port_explain'] = "A porta que o servidor usa, normalmente 80 - mudar apenas se diferente";
$lang['Site_name'] = "Nome do local do F�rum";
$lang['Site_desc'] = "Descri��o";
$lang['Board_disable'] = "Desativar";
$lang['Board_disable_explain'] = "Isto torna os f�runs inacess�veis a Usu�rios. N�O SE DESLIGUE - ap�s Desativar os f�runs neste local n�o conseguir� voltar a entrar!";
$lang['Acct_activation'] = "Usar a fun��o de ativa��o de registo";
$lang['Acc_None'] = "Nunca"; // These three entries are the type of activation
$lang['Acc_User'] = "Usu�rios";
$lang['Acc_Admin'] = "Administradores";

$lang['Abilities_settings'] = "Configura��o padr�o de Usu�rios e f�runs";
$lang['Max_poll_options'] = "N�mero m�ximo de op��es nas Enquetes";
$lang['Flood_Interval'] = "Intervalo de 'Flood'";
$lang['Flood_Interval_explain'] = "Tempo em segundos que um Usu�rio deva aguardar entre o envio de mensagens";
$lang['Board_email_form'] = "Email de Usu�rios via f�rum";
$lang['Board_email_form_explain'] = "Fun��o que permite Usu�rios enviar email a outros via phpBB";
$lang['Topics_per_page'] = "M�x. n�mero de T�picos por p�gina";
$lang['Posts_per_page'] = "M�x. n�mero de Mensagens por p�gina";
$lang['Hot_threshold'] = "M�x. n�mero de Mensagens por assunto popular";
$lang['Default_style'] = "Estilo padr�o";
$lang['Override_style'] = "Repor estilo do Usu�rio";
$lang['Override_style_explain'] = "For�a o uso do estilo b�sico em vez do escolhido pelos Usu�rios";
$lang['Default_language'] = "Idioma padr�o";
$lang['Date_format'] = "Formato da Data";
$lang['System_timezone'] = "Fuso Hor�rio do sistema";
$lang['Enable_gzip'] = "Ativar compress�o por GZip";
$lang['Enable_prune'] = "Ativar Desbastar F�rum";
$lang['Allow_HTML'] = "Permitir HTML";
$lang['Allow_BBCode'] = "Permitir BBCode";
$lang['Allowed_tags'] = "C�digos de HTML permitidos";
$lang['Allowed_tags_explain'] = "Separar os c�digos com v�rgulas";
$lang['Allow_smilies'] = "Permitir Smileys";
$lang['Smilies_path'] = "'Path' dos Smileys";
$lang['Smilies_path_explain'] = "'Path'para a o local onde se encontram os Smileys na directoria do phpBB, ou seja, images/smileys";
$lang['Allow_sig'] = "Permitir Assinaturas";
$lang['Max_sig_length'] = "Tamanho m�ximo da assinatura";
$lang['Max_sig_length_explain'] = "N�mero m�ximo de caracteres permitidos na assinatura do Usu�rio";
$lang['Allow_name_change'] = "Permitir mudan�a de Nome de Usu�rio";

$lang['Avatar_settings'] = "Configura��o de Avatars";
$lang['Allow_local'] = "Ativar galeria de Avatars";
$lang['Allow_remote'] = "Permitir Avatars remotos";
$lang['Allow_remote_explain'] = "Avatars ligados a partir de outro local no WWW";
$lang['Allow_upload'] = "Permitir carregar Avatars";
$lang['Max_filesize'] = "Tamanho m�ximo do arquivo de Avatars";
$lang['Max_filesize_explain'] = "Para Avatars carregados";
$lang['Max_avatar_size'] = "Dimens�es m�ximas dos Avatars";
$lang['Max_avatar_size_explain'] = "(Altura x Largura em pixels)";
$lang['Avatar_storage_path'] = "'Path' de armazenamento dos Avatars";
$lang['Avatar_storage_path_explain'] = "'Path' para o local onde se ir�o guardar os Avatars na directoria do phpBB, ou seja, images/avatars";
$lang['Avatar_gallery_path'] = "'Path' a Galeria dos Avatars";
$lang['Avatar_gallery_path_explain'] = "'Path' para o local onde se encontram as imagens previamente guardadas na directoria do phpBB, ou seja, images/avatars/gallery";

$lang['COPPA_settings'] = "Configura��o de COPPA";
$lang['COPPA_fax'] = "Fax para COPPA";
$lang['COPPA_mail'] = "Endere�o de email para COPPA";
$lang['COPPA_mail_explain'] = "Este � um endere�o da lista de correspond�ncia para o qual os pais enviam os formul�rios de registo de COPPA";

$lang['Email_settings'] = "Configura��o de Email";
$lang['Admin_email'] = "Endere�o de Email Administrativo";
$lang['Email_sig'] = "Assinatura do Email";
$lang['Email_sig_explain'] = "Este texto ser� anexo a todos os emails enviados pelo f�rum";
$lang['Use_SMTP'] = "Usar Servidor de SMTP para o email";
$lang['Use_SMTP_explain'] = "Caso queira ou tenha que enviar Email via um dado server em vez da fun��o do phpBB para esse efeito";
$lang['SMTP_server'] = "Endere�o do servidor de SMTP";
$lang['SMTP_username'] = "Nome de Usu�rio do SMTP";
$lang['SMTP_username_explain'] = "Apenas escrever o nome de Usu�rio se o seu servidor de smtp assim o requeira";
$lang['SMTP_password'] = "Senha para o SMTP";
$lang['SMTP_password_explain'] = "Apenas escrever a senha caso o seu servidor de smtp assim o requeira";

$lang['Disable_privmsg'] = "Mensagens Privadas";
$lang['Inbox_limits'] = "N�mero total de mensagens permitidas na Caixa de Entrada";
$lang['Sentbox_limits'] = "N�mero total de mensagens permitidas na Caixa de Sa�da";
$lang['Savebox_limits'] = "N�mero total de mensagens permitidas na Caixa de Reserva";

$lang['Cookie_settings'] = "Configura��o dos 'Cookies'";
$lang['Cookie_settings_explain'] = "Estas especifica��es definem como os 'cookies' s�o enviados aos 'browsers' dos seus Usu�rios. Na maioria dos casos os valores b�sicos para a configura��o dos 'cookies' dever�o ser suficientes mas caso os necessite mudar fa�a-o com cuidado porque uma configura��o incorrecta poder� impedir os Usu�rios de se ligar.";
$lang['Cookie_domain'] = "Dom�nio do Cookie";
$lang['Cookie_name'] = "Nome do Cookie";
$lang['Cookie_path'] = "'Path' do Cookie";
$lang['Cookie_secure'] = "'Cookie secure' [https]";
$lang['Cookie_secure_explain'] = "Se o seu uservidor se encontra a funcionar via SSL active isto, caso negativo deixe desligado";
$lang['Session_length'] = "Tempo da sess�o [segundos]";

//
// Forum Management
//
$lang['Forum_admin'] = "Ger�ncia dos F�runs";
$lang['Forum_admin_explain'] = "Usar este painel para adicionar, remover, editar, reordenar e sincronizar categorias e f�runs.";
$lang['Edit_forum'] = "Editar f�rum";
$lang['Create_forum'] = "Criar f�rum";
$lang['Create_category'] = "Criar categoria";
$lang['Remove'] = "Remover";
$lang['Action'] = "A��o";
$lang['Update_order'] = "Atualizar a Ordem";
$lang['Config_updated'] = "Configura��o do F�rum atualizada com sucesso";
$lang['Edit'] = "Editar";
$lang['Delete'] = "Remover";
$lang['Move_up'] = "Mover - Cima";
$lang['Move_down'] = "Mover - Baixo";
$lang['Resync'] = "Sincronizar";
$lang['No_mode'] = "N�o foi configurado nenhum modo";
$lang['Forum_edit_delete_explain'] = "O formul�rio abaixo permite-lhe especificar todas as op��es globais do f�rum. Usar os atalhos no painel do lado esquerdo para configura��es espec�ficas de Usu�rios ou f�runs.";

$lang['Move_contents'] = "Mover todo o conte�do";
$lang['Forum_delete'] = "Remover F�rum";
$lang['Forum_delete_explain'] = "O formul�rio abaixo permite-lhe remover um f�rum (ou categoria) e decidir onde pretende colocar todos os t�picos (ou f�runs) existentes.";

$lang['Forum_settings'] = "Configura��o Geral dos F�runs";
$lang['Forum_name'] = "Nome do F�rum";
$lang['Forum_desc'] = "Descri��o";
$lang['Forum_status'] = "Estado";
$lang['Forum_pruning'] = "Auto-desbastar";

$lang['prune_freq'] = 'Verificar o tempo dos t�picos a cada';
$lang['prune_days'] = "Remover t�picos que n�o tenham tido respostas em";
$lang['Set_prune_data'] = "Voc� ativou a fun��o para desbastar o f�rum automaticamente mas n�o especificou a frequ�ncia ou n�mero de dias em que o mesmo deve ser feito. Voltar atr�s e especificar esse valor";

$lang['Move_and_Delete'] = "Mover e Remover";

$lang['Delete_all_posts'] = "Remover todas as mensagens";
$lang['Nowhere_to_move'] = "N�o h� local para onde mover";

$lang['Edit_Category'] = "Editar Categoria";
$lang['Edit_Category_explain'] = "Usar este formul�rio para mudar o nome da categoria.";

$lang['Forums_updated'] = "Informa��o de F�rum e Categoria atualizada com sucesso ";

$lang['Must_delete_forums'] = "Necessita remover todos os f�runs antes de remover esta categoria";

$lang['Click_return_forumadmin'] = "Clique %sAqui%s para voltar a Ger�ncia dos F�runs";


//
// Smiley Management
//
$lang['smiley_title'] = "Painel de Ger�ncia de Smileys";
$lang['smile_desc'] = "Pode adicionar, remover e editar neste painel as emo��es ou smileys que os Usu�rios poder�o usar nas suas mensagens, tanto p�blicas como privadas. Podem ser igualmente importados a partir daqui pacotes de Smileys.";

$lang['smiley_config'] = "Ger�ncia de Smileys";
$lang['smiley_code'] = "C�digo para o Smiley";
$lang['smiley_url'] = "Arquivo da imagem do Smiley";
$lang['smiley_emot'] = "Emo��o do Smiley";
$lang['smile_add'] = "Adicionar um Smiley";
$lang['Smile'] = "Smiley";
$lang['Emotion'] = "Emo��o";

$lang['Select_pak'] = "Selecionar um arquivo com o 'pacote' (.pak)";
$lang['replace_existing'] = "Repor o Smiley existente";
$lang['keep_existing'] = "Conservar o Smiley existente";
$lang['smiley_import_inst'] = "Dever� descomprimir o pacote dos Smileys e colocar todos os arquivos na pasta respectiva na instala��o do phpBB 2.  Especificar depois a informa��o correcta neste formul�rio para importar o pacote.";
$lang['smiley_import'] = "Importar pacote";
$lang['choose_smile_pak'] = "Escolher arquivo do pacote de Smileys (.pak)";
$lang['import'] = "Importar";
$lang['smile_conflicts'] = "Em caso de conflitos:";
$lang['del_existing_smileys'] = "Remover os Smileys existentes antes de importar o pacote";
$lang['import_smile_pack'] = "Importar pacote de Smiley";
$lang['export_smile_pack'] = "Criar pacote";
$lang['export_smiles'] = "Para criar um pacote de Smileys a partir dos correntemente instalados, primeiro clique %sAqui%s para fazer o 'download' do pacote smiles.pak. Dar o nome a este arquivo apropriadamente, mantendo a extens�o .pak.  Criar depois um arquivo zip contendo todos as suas imagens de Smiley mais este arquivo de configura��o (.pak).";

$lang['smiley_add_success'] = "O Smiley foi adicionado com sucesso";
$lang['smiley_edit_success'] = "O Smiley foi actualizado com sucesso";
$lang['smiley_import_success'] = "O pacote de Smiley foi importado com sucesso!";
$lang['smiley_del_success'] = "O Smiley foi removido com sucesso";
$lang['Click_return_smileadmin'] = "clique %sAqui%s para voltar a <b>Ger�ncia de Smileys</b>";


//
// User Management
//
$lang['User_admin'] = "Ger�ncia de Usu�rios";
$lang['User_admin_explain'] = "Poder� mudar aqui a informa��o dos seus Usu�rios al�m de algumas op��es espec�ficas. Para modificar as permiss�es de Usu�rios usar o painel de <b>Permiss�es</b> para Usu�rios e Grupos.";

$lang['Look_up_user'] = "Verificar";

$lang['Admin_user_fail'] = "N�o foi poss�vel Atualizar o perfil de Usu�rios.";
$lang['Admin_user_updated'] = "O perfil de Usu�rios foi atualizado com sucesso.";
$lang['Click_return_useradmin'] = "clique %sAqui%s Para voltar a Ger�ncia de Usu�rios";

$lang['User_delete'] = "Remover este Usu�rio";
$lang['User_delete_explain'] = "Assinalar para remover o Usu�rio. Esta opera��o tem efeitos permanentes.";
$lang['User_deleted'] = "Usu�rio removido com sucesso.";

$lang['User_status'] = "Usu�rio est� ativo";
$lang['User_allowpm'] = "Pode enviar Mensagens Privadas";
$lang['User_allowavatar'] = "Pode mostrar Avatar";

$lang['Admin_avatar_explain'] = "Aqui poder� ver e remover o Avatar corrente do Usu�rio.";

$lang['User_special'] = "Configura��o especial apenas para administradores";
$lang['User_special_explain'] = "Estes par�metors n�o podem ser modificados por Usu�rios. Pode especificar aqui o seu estado bem como outras op��es que n�o s�o dadas aos Usu�rios.";


//
// Group Management
//
$lang['Group_administration'] = "Ger�ncia de Grupos";
$lang['Group_admin_explain'] = "Usar este painel para criar, editar e remover Grupos de Usu�rios. Poder� aqui tamb�m escolher moderadores, abrir ou encerrar grupos, estipular os seus nomes e respectivas descri��es";
$lang['Error_updating_groups'] = "Houve um erro ao Atualizar os grupos";
$lang['Updated_group'] = "O grupo foi actualizado com sucesso";
$lang['Added_new_group'] = "O novo grupo foi criado com sucesso";
$lang['Deleted_group'] = "O grupo foi removido com sucesso";
$lang['New_group'] = "Criar um Grupo";
$lang['Edit_group'] = "Editar o Grupo";
$lang['group_name'] = "Nome do Grupo";
$lang['group_description'] = "Descri��o do Grupo";
$lang['group_moderator'] = "Moderador do Grupo";
$lang['group_status'] = "Estado do Grupo";
$lang['group_open'] = "Aberto";
$lang['group_closed'] = "Encerrado";
$lang['group_hidden'] = "Invis�vel";
$lang['group_delete'] = "Remover grupo";
$lang['group_delete_check'] = "Remover este grupo";
$lang['submit_group_changes'] = "Submeter as mudan�as";
$lang['reset_group_changes'] = "Voltar as mudan�as aos seus valores iniciais";
$lang['No_group_name'] = "Deve ser especificado um nome para este grupo";
$lang['No_group_moderator'] = "Deve ser especificado um moderador para este grupo";
$lang['No_group_mode'] = "Deve ser especificado um modo para este grupo, aberto ou encerrado";
$lang['delete_group_moderator'] = "Remover o moderador antigo do grupo?";
$lang['delete_moderator_explain'] = "Se est� a mudar o moderador do grupo assinale aqui para remover o moderador anterior.  Caso contr�rio nao assinale e o Usu�rio passar� a ser um membro normal do grupo.";
$lang['Click_return_groupsadmin'] = "clique %sAqui%s para voltar � Ger�ncia de Grupos.";
$lang['Select_group'] = "selecionar um Grupo";
$lang['Look_up_group'] = "Verificar";


//
// Prune Administration
//
$lang['Forum_Prune'] = "Desbastar F�rum";
$lang['Forum_Prune_explain'] = "Esta opera��o remover� qualquer t�pico que n�o possua resposta dentro do limite de dias especificado. Se n�o for mencionado um n�mero de dias todos os t�picos ser�o removidos. Isto n�o remove t�picos com uma vota��o activa nem an�ncios. Ter� que os remover manualmente.";
$lang['Do_Prune'] = "Desbastar";
$lang['All_Forums'] = "Todos os F�runs";
$lang['Prune_topics_not_posted'] = "Remover todos os t�picos sem resposta durante um per�odo de ";
$lang['Topics_pruned'] = "T�picos Removidos";
$lang['Posts_pruned'] = "Mensagens Removidas";
$lang['Prune_success'] = "Desbaste de f�runs conclu�do com sucesso";


//
// Word censor
//
$lang['Words_title'] = "Ger�ncia de Censura de Palavras";
$lang['Words_explain'] = "Usar este painel para adicionar, editar e remover palavras que ser�o automaticamente censuradas nos f�runs. O uso dessas palavras ser� tamb�m interdito no registo de Nomes de Usu�rios. Podem ser usados asteriscos (*) aumentando as possibilidades de abranger variantes da mesma palavra. Por exemplo, *testa* abranger� detest�vel, testa* abranger� testando, *testa abranger� detesta. Pode ser escolhido em <b>Substitui��o</b> o que v� repor automaticamente essas palavras quando escritas.";
$lang['Word'] = "Palavra";
$lang['Edit_word_censor'] = "Editar a palavra a censurar";
$lang['Replacement'] = "Substitui��o";
$lang['Add_new_word'] = "Adicionar nova palavra";
$lang['Update_word'] = "Atualizar palavra a censurar";

$lang['Must_enter_word'] = "Dever� escrever a palavra e o que a v� substituir";
$lang['No_word_selected'] = "N�o foi escolhida palavra para editar";

$lang['Word_updated'] = "A palavra censurada foi actualizada com sucesso";
$lang['Word_added'] = "A palavra a censurar foi adicionada com sucesso";
$lang['Word_removed'] = "A palavra censurada foi removida com sucesso";

$lang['Click_return_wordadmin'] = "clique %sAqui%s para voltar � Ger�ncia de Censura de Palavras";


//
// Mass Email
//
$lang['Mass_email_explain'] = "Pode ser a partir daqui enviada uma mensagem de email para todos os Usu�rios dos f�runs ou Usu�rios membros de um dado grupo, sendo empregue para o efeito o endere�o de <b>Email Administrativo</b> pr�viamente configurado. Caso seja enviado um email para n�mero elevado de pessoas aguardar um pouco ap�s clique abaixo em <b>Email</b> e n�o parar a p�gina a meio - � normal o envio de um email em massa demorar um pouco, mas voc� ser� avisado quando o processo estiver conclu�do.";
$lang['Compose'] = "Compor";

$lang['Recipients'] = "Destinat�rios";
$lang['All_users'] = "Todos os Usu�rios";

$lang['Email_successfull'] = "A sua mensagem foi enviada";
$lang['Click_return_massemail'] = "clique %sAqui%s para voltar ao formul�rio de email maci�o";


//
// Ranks admin
//
$lang['Ranks_title'] = "Ger�ncia de Rank";
$lang['Ranks_explain'] = "Usando este painel poder� adicionar, editar, ver e remover Ranks de Usu�rios. Poder� tamb�m criar Ranks espec�ficos podendo os mesmos ser aplicados a um Usu�rio via painel de <b>Admin de Usu�rios</b>";

$lang['Add_new_rank'] = "Adicionar um Rank novo";

$lang['Rank_title'] = "T�tulo do Rank";
$lang['Rank_special'] = "Rank Especial";
$lang['Rank_minimum'] = "N�mero M�nimo de Mensagens";
$lang['Rank_maximum'] = "N�mero M�ximo de Mensagens";
$lang['Rank_image'] = "Imagem do Rank (Relativamente ao path do phpBB2)";
$lang['Rank_image_explain'] = "Usar isto para definir uma pequena imagem associada ao Rank";

$lang['Must_select_rank'] = "Deve escolher um Rank";
$lang['No_assigned_rank'] = "N�o foi especificado nenhum Rank Especial";

$lang['Rank_updated'] = "O rank foi atualizado com sucesso";
$lang['Rank_added'] = "O rank foi adicionado com sucesso";
$lang['Rank_removed'] = "O rank foi removido com sucesso";

$lang['Click_return_rankadmin'] = "clique %sAqui%s para voltar a Ger�ncia de Escal�es";


//
// Disallow Username Admin
//
$lang['Disallow_control'] = "Controle de Nomes de Usu�rios Proibidos";
$lang['Disallow_explain'] = "Poder� controlar aqui nomes de Usu�rios cujo uso seja proibido nos f�runs.  De notar que n�o podem ser especificados Nomes de Usu�rios que j� se encontrem registados, devendo primeiro ser removidos e ent�o especific�-los aqui para n�o mais serem usados. Podem ser empregues asteriscos '*' para abranger um maior n�mero de variantes na palavra.";

$lang['Delete_disallow'] = "Remover";
$lang['Delete_disallow_title'] = "Remover um Nome de Usu�rio Proibido";
$lang['Delete_disallow_explain'] = "Escolher um Nome de Usu�rio na lista e carregar em <b>Remover</b>";

$lang['Add_disallow'] = "Adicionar";
$lang['Add_disallow_title'] = "Adicionar um Nome de Usu�rio Proibido";
$lang['Add_disallow_explain'] = "Usar asteriscos '*' se necess�rio";

$lang['No_disallowed'] = "N�o h� Nomes de Usu�rios Proibidos";

$lang['Disallowed_deleted'] = "O Nome de Usu�rio Proibido foi removido com sucesso";
$lang['Disallow_successful'] = "O Nome de Usu�rio Proibido foi adicionado com sucesso";
$lang['Disallowed_already'] = "O nome que especificou n�o pode ser proibido. Pode acontecer j� existir na lista de Nomes Proibidos, na lista de Palavras Censuradas ou encontrar-se presentemente em uso por algum Usu�rio registado";

$lang['Click_return_disallowadmin'] = "clique %sAqui%s para voltar a Painel de Controle de Nomes de Usu�rios Proibidos";


//
// Styles Admin
//
$lang['Styles_admin'] = "Ger�ncia de Estilos";
$lang['Styles_explain'] = "Usando este painel poder� adicionar, remover e administrar estilos (Modelos e Temas) dispon�veis aos Usu�rios.";
$lang['Styles_addnew_explain'] = "Este painel � destinado � listagem dos Temas de f�rum para os Modelos que presentemente possui e ainda n�o se encontram instalados na base de dados do phpBB. Para instalar um tema espec�fico clique em <b>Instalar</b> ao lado desse item.";

$lang['Select_template'] = "selecionar um Modelo";

$lang['Style'] = "Estilo";
$lang['Template'] = "Modelo";
$lang['Install'] = "Instalar";
$lang['Download'] = "Download";

$lang['Edit_theme'] = "Editar Tema";
$lang['Edit_theme_explain'] = "Configurar o tema seleccionado no formul�rio abaixo";

$lang['Create_theme'] = "Criar Tema";
$lang['Create_theme_explain'] = "Use o formul�rio abaixo para criar um Tema novo para o Modelo existente. Quando aplicar cores (que devem ser escritas num formato hexadecimal) n�o deve ser incluido o # inicial, ou seja, CCCCCC � a forma correcta de escrever, #CCCCCC � incorrecto.";

$lang['Export_themes'] = "Exportar Temas";
$lang['Export_explain'] = "Usar este painel para exportar informa��o de um Tema para um dado Modelo. Escolha um Modelo na lista e ser� automaticamente criado um arquivo de configura��o do tema que ir� ser guardado e instalado na pasta do Modelo seleccionado. Caso n�o for poss�vel guardar o arquivo por si pr�prio ser� dada a op��o para ser feito o seu 'download'. Deve haver ou ser dada permiss�o de escrita ao servidor de WEB para a pasta do Modelo seleccionado de forma que que o arquivo seja guardado. Para mais informa��o sobre esta opera��o ver o <b>phpBB 2 users guide</b>.";

$lang['Theme_installed'] = "O tema seleccionado foi instalado com sucesso";
$lang['Style_removed'] = "O estilo seleccionado foi removido da base de dados. Para remover completamente este estilo do seu sistema deve apagar o estilo apropriado na pasta dos Modelos.";
$lang['Theme_info_saved'] = "A informa��o do tema para o Modelo seleccionado foi guardada. Voc� deve agora mudar as permiss�es para 'read-only'mo arquivo theme_info.cfg (e caso aplic�vel na pasta de Modelos)";
$lang['Theme_updated'] = "O tema seleccionado foi actualizado. Voc� deve agora exportar a nova configura��o do tema";
$lang['Theme_created'] = "Tema criado. Voc� deve agora exportar o tema para o arquivo de configura��o do tema como seguran�a ou usar noutro local";

$lang['Confirm_delete_style'] = "Tem a certeza que quer remover este estilo?";

$lang['Download_theme_cfg'] = "N�o foi poss�vel escrever o arquivo de informa��o do tema. clique o bot�o abaixo para fazer o 'download' deste arquivo com o seu 'browser'. Logo que termine o download poder� trasferir o arquivo para a pasta contendo os arquivos do Modelo. Pode depois arrumar os arquivos para distribui��o ou usar noutro local, se assim o pretender";
$lang['No_themes'] = "O Modelo que seleccionou nao poss�i temas anexos. Para criar um tema novo clique em Criar no painel do lado esquerdo";
$lang['No_template_dir'] = "N�o foi poss�vel abrir a pasta de Modelos. Pode ser que n�o haja possibilidade de ser lido pelo servidor de Web ou a pasta n�o exista";
$lang['Cannot_remove_style'] = "N�o pode remover o estilo seleccionado porque � presentemente o estilo b�sico do f�rum. Mudar o estilo b�sico e tentar novamente.";
$lang['Style_exists'] = "O nome para o estilo que seleccionou j� existe, voltar atr�s e escolher um nome diferente.";

$lang['Click_return_styleadmin'] = "clique %sAqui%s para voltar � Ger�ncia de Estilos";

$lang['Theme_settings'] = "Configura��o de Temas";
$lang['Theme_element'] = "Elemento de Tema";
$lang['Simple_name'] = "Nome Simples";
$lang['Value'] = "Valor";
$lang['Save_Settings'] = "Guardar Configura��o";

$lang['Stylesheet'] = "CSS Stylesheet";
$lang['Background_image'] = "Imagem de Background";
$lang['Background_color'] = "Cor de Background";
$lang['Theme_name'] = "Nome do Tema";
$lang['Link_color'] = "Cor de Atalho";
$lang['Text_color'] = "Cor de Texto";
$lang['VLink_color'] = "Cor de Atalho Visitado";
$lang['ALink_color'] = "Cor de Atalho Activo";
$lang['HLink_color'] = "Cor de Atalho Hover";
$lang['Tr_color1'] = "Cor 1 de Coluna de Tabela";
$lang['Tr_color2'] = "Cor 2 de Coluna de Tabela";
$lang['Tr_color3'] = "Cor 3 de Coluna de Tabela";
$lang['Tr_class1'] = "Classe 1 de Coluna de Tabela";
$lang['Tr_class2'] = "Classe 2 de Coluna de Tabela";
$lang['Tr_class3'] = "Classe 3 de Coluna de Tabela";
$lang['Th_color1'] = "Cor 1 de Cabe�a de Tabela";
$lang['Th_color2'] = "Cor 2 de Cabe�a de Tabela";
$lang['Th_color3'] = "Cor 3 de Cabe�a de Tabela";
$lang['Th_class1'] = "Classe 1 de Cabe�a de Tabela";
$lang['Th_class2'] = "Classe 2 de Cabe�a de Tabela";
$lang['Th_class3'] = "Classe 3 de Cabe�a de Tabela";
$lang['Td_color1'] = "Cor 1 de C�lula de Tabela";
$lang['Td_color2'] = "Cor 2 de C�lula de Tabela";
$lang['Td_color3'] = "Cor 3 de C�lula de Tabela";
$lang['Td_class1'] = "Classe 1 de C�lula de Tabela";
$lang['Td_class2'] = "Classe 2 de C�lula de Tabela";
$lang['Td_class3'] = "Classe 3 de C�lula de Tabela";
$lang['fontface1'] = "Fonte Face 1";
$lang['fontface2'] = "Fonte Face 2";
$lang['fontface3'] = "Fonte Face 3";
$lang['fontsize1'] = "Tamanho 1 de Fonte";
$lang['fontsize2'] = "Tamanho 2 de Fonte";
$lang['fontsize3'] = "Tamanho 3 de Fonte";
$lang['fontcolor1'] = "Cor 1 de Fonte";
$lang['fontcolor2'] = "Cor 2 de Fonte";
$lang['fontcolor3'] = "Cor 3 de Fonte";
$lang['span_class1'] = "Classe 1 - Extens�o";
$lang['span_class2'] = "Classe 2 - Extens�o";
$lang['span_class3'] = "Classe 3 - Extens�o";
$lang['img_poll_size'] = "Tamanho da Imagem da Vota��o [px]";
$lang['img_pm_size'] = "Tamanho de Estado de Mensagem Privada [px]";


//
// Install Process
//
$lang['Welcome_install'] = "Bem-vindo � Instala��o do phpBB 2";
$lang['Initial_config'] = "Configura��o B�sica";
$lang['DB_config'] = "Configura��o de Base de Dados";
$lang['Admin_config'] = "Configura��o de Admin";
$lang['continue_upgrade'] = "Logo que tenha terminado o 'download' do arquivo de configura��o para o computador poder� clique \"Continuar a Actualiza��o\" abaixo para continuar o processo.  Aguardar que seja feito o 'upload' do arquivo de configura��o ate que o processo de actualiza��o esteja completo.";
$lang['upgrade_submit'] = "Continuar a Atualiza��o";

$lang['Installer_Error'] = "Ocorreu um erro durante a instala��o";
$lang['Previous_Install'] = "Foi detectada uma instala��o anterior";
$lang['Install_db_error'] = "Ocorreu um erro ao tentar Atualizar o banco de dados";

$lang['Re_install'] = "A sua instala��o anterior ainda se encontra ativa. <br /><br />Se pretende reinstalar phpBB 2 dever� clicar no bot�o Sim abaixo. Ter em aten��o que ao faz�-lo ir� destruir toda a informa��o existente, n�o sendo feitas c�pias de seguran�a! O Nome de Usu�rio e Senha de administrador que tem usado para ligar ao f�rum ser� recriada ap�s esta reinstala��o, nao sendo qualquer outros dados de configura��o ser�o guardados. <br /><br />Pense cautelosamente antes de carregar em Sim!";

$lang['Inst_Step_0'] = "Obrigado por ter escolhido phpBB 2. De modo a completar esta instala��o preencha os detalhes pedidos abaixo. De notar que a base de dados onde a informa��o do f�rum ser� instalada deve existir j�. Caso se encontre a instalar numa base de dados que use ODBC, ou seja, MS Access, deve primeiro ser criado um DSN.";

$lang['Start_Install'] = "Come�ar a Instala��o";
$lang['Finish_Install'] = "Terminar a Instala��o";

$lang['Default_lang'] = "Idioma padr�o do F�rum";
$lang['DB_Host'] = "Hostname do Sevidor da Base de Dados / DSN";
$lang['DB_Name'] = "Nome do Banco de Dados";
$lang['DB_Username'] = "Nome de Usu�rio no Banco de Dados";
$lang['DB_Password'] = "Senha no Banco de Dados";
$lang['Database'] = "Seu Banco de Dados";
$lang['Install_lang'] = "Escolher o Idioma para a Instala��o";
$lang['dbms'] = "Tipo de Banco de Dados";
$lang['Table_Prefix'] = "Prefixo para as tabelas no Banco de Dados";
$lang['Admin_Username'] = "Nome de Usu�rio do Administrador";
$lang['Admin_Password'] = "Senha do Administrador";
$lang['Admin_Password_confirm'] = "Senha do Administrador [Confirmar]";

$lang['Inst_Step_2'] = "O seu Nome de Usu�rio para Administrador foi criado.  Neste momento a Instala��o B�sica est� conclu�da. Ir� ser conduzido agora a um painel onde poder� administrar a sua nova instala��o. Verificar os detalhes de Configura��o Geral e proceder as mudan�as necess�rias. Obrigado por usar phpBB 2.";

$lang['Unwriteable_config'] = "O seu arquivo de configura��o n�o pode ser escrito neste momento. Ser� feita uma c�pia do arquivo quando carregar no bot�o abaixo. Dever� colocar este arquivo na mesma pasta que o phpBB 2. Uma vez concluido, voc� dever� ligar-se usando o Nome de Usu�rio de administrador e respectiva senha que forneceu anteriormente visitando de seguida o Painel de Administra��o (um atalho ir� surgir na parte iferior de cada janela) para verificar a configura��o geral. Obrigado por escolher phpBB 2.";
$lang['Download_config'] = "Download a Configura��o";

$lang['ftp_choose'] = "Escolher um m�todo para Download";
$lang['ftp_option'] = "<br />Visto as extens�es de FTP se encontrarem ativas nesta vers�o de PHP deve-lhe ter sido tamb�m dada a op��o para primeiro tentar automaticamente FTP o arquivo de configura��o para o local certo.";
$lang['ftp_instructs'] = "Escolheu para FTP automaticamente o arquivo para a conta contendo phpBB 2.  Por favor forne�a a informa��o abaixo para facilitar o processo. De notar que o 'path' do FTP dever� ser exactamente o mesmo via ftp para a instala��o do seu phpBB 2 como se estivesse a efectuar ftp usando um cliente normal.";
$lang['ftp_info'] = "Escrever a informa��o do FTP";
$lang['Attempt_ftp'] = "Tentando FTP o arquivo de configura��o para o local corecto";
$lang['Send_file'] = "Apenas enviar o arquivo para mim e eu farei o FTP manualmente";
$lang['ftp_path'] = "Path de FTP para o phpBB 2";
$lang['ftp_username'] = "O seu nome de Usu�rio para o FTP";
$lang['ftp_password'] = "A sua senha para o FTP";
$lang['Transfer_config'] = "Iniciar a Transfer�ncia";
$lang['NoFTP_config'] = "A tentativa de FTP o arquivo de configura��o para o local correcto falhou.  Por favor fazer o download do mesmo e efectuar o FTP manualmente.";

$lang['Install'] = "Instalar";
$lang['Upgrade'] = "Atualizar";


$lang['Install_Method'] = "Escolher o seu m�todo de instala��o";

$lang['Install_No_Ext'] = "A configura��o de php no seu server n�o aceita o tipo de base de dados que escolheu";

$lang['Install_No_PCRE'] = "O phpBB2 requer o m�dulo para php 'Perl-Compatible Regular Expressions' cuja configura��o do seu php parece n�o aceitar!";

//
// That's all Folks!
// -------------------------------------------------

?>
