<?php
/***************************************************************************
 *                          lang_faq.php [Galician]
 *                            -------------------
 *   begin                : Wednesday Oct 3, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: lang_faq.php,v 0.9 2002/03/05 16:42:08 Pato[100%Q]
 *
 ***************************************************************************/

  /****************************************************************************
 * Translation by:
 * Sergio Ares Chao :: sergio@ciberagendas.com
 ****************************************************************************/

/***************************************************************************
 *
 *   Esta es una aplicaci�n de software libre, puede re-distribuirla e/o modificarla
 *   bajo los terminos de la GNU (Licencia P�blica General), la cual fue publicada
 *   por la Free Software Foundation (Fundaci�n del Software Libre). Esto en la licencia
 *   de la versi�n 2 o posterior.
 *
 ***************************************************************************/
 
// 
// Para engadir unha entrada �s FAQ s� engada unha li�a co seguinte formato:
// $faq[] = array("pregunta", "resposta");
// Se queres separar unha secci�n escribe $faq[] = array("--","Un texto de separaci�n pode ir aqui se o desexas");
// Os enlaces creanse automaticamente :)
//
// NON ESQUZA po�er ; � final de cada li�a.
// NON PONGA dobres comi�as (") nas entradas das s�as FAQ, se � absolutamente necesario ent�n escribao asi: \"texto\"
//
// Os temas e entradas das FAQ aparecer�n na mesma orde na que est�n neste archivo.
//

  
$faq[] = array("--","Acerca do ingreso (login) e rexistro");
$faq[] = array("�Por que non podo ingresar?", "�Xa se rexistrou? Debe rexistrarse no sistema antes de poder acceder a el. �Foi bloquedado no foro? (se � asi unha mensaxe aparecer�). Se isto sucede envie unha mensaxe � administrador do foro para co�ece-la causa. Se rexistrouse e non foi bloquedado verifique que o seu nome de usuario e contrasinal coincidan, � o problema m�is com�n. Se esta seguro de que est�n correctos os datos, envie unha mensaje � administrador, � posible que o foro est� mal configurado e/ou te�a fallos na programaci�n.");
$faq[] = array("�Por que te�ome que rexistrar para todo?", "Non est� obrigado a facelo, a decisi�n a toman os administradores e moderadores. Sen embargo estar rexistrado dalle moitas avantaxes que como usuario invitado non difrutar�a, como te-lo seu gr�fico personalizado (avatar), mensaxes privadas, suscrici�n a grupos de usuarios, etc.... S� lle tomar� uns segundos, � moi recomendable.");
$faq[] = array("�Por que a mi�a sesi�n de usuario expira automaticamente?", "Se non activa a casilla <i>Ingresar autom�ticamente</i> cando ingresa � foro, os seus datos g�rdanse nunha cookie que se elimina � sair da p�xina ou en certo tiempo. Esto prev�n que a s�a conta poda ser usada por algu�n m�is. Para que o sistema lle reco�eza autom�ticamente s� active a casi�la � ingresar. NON � recomendable se accede � foro desde unha computadora compartida (caf�-internet, biblioteca, colexio ...)");
$faq[] = array("�Como evito aparecer nas listas de usuarios conectados?", "No seu perfil, encontrara a opci�n <i>Oculta-lo meu estado de conexi�n</i>, se activa esta opci�n aparecer� s� para os administradores, moderadores e para si mesmo, para os demais ser� un usuario oculto.");
$faq[] = array("�Perd�n o meu contrasinal!", "Calma, a�nda que o seu contrasinal non poda ser recuperado pode desactiva-lo ou cambialo. Para facer isto dir�xase � p�xina de rexistro e faga click en <u>Olvidei o meu contrasinal</u>, siga as instrucci�ns e estar� dentro en moi pouco tempo");
$faq[] = array("�Rexistreime e non podo ingresar!", "Primeiramente verifique os seus datos (usuario e contrasinal). Se todo � correcto hai d�as posibles raz�ns. Se o Sistema de Protecci�n Infantil (COPPA) est� activado e cando se rexistro elixiu a opci�n <u>Son menor de 13 anos</u> ent�n ter� que seguir algunhas instrucci�ns que se lle dar�n para activa-la conta. Noutros casos o administrador pide que as contas activense mediante un correo electr�nico, asi que revise o seu correo e confirme a s�a suscrici�n. Alg�ns foros necesitan confirmaci�n de rexistro. Se non sucede nada disto contacte � administrador d� foro.");
$faq[] = array("Fai un tempo rexistreime, pero agora non podo ingresar", "As posibles raz�ns son: ingresou un nome de usuario ou contrasinal incorrectos (verifique a mensaxe que se lle enviou � rexistrarse). � posible que o administrador borrara a s�a conta, isto � moi frecuente, pois se non escribiu ningunha mensaxe en certo tempo o administrador pode borra-lo seu usuario para que a base de datos non se sature de rexistros. Se � asi rexistrese de novo e participe :)");


$faq[] = array("--","Preferencias de usuario e configuraci�ns");
$faq[] = array("�Como podo cambia-la mi�a configuraci�n?", "T�dolos seus datos e configuraci�ns (se esta rexistrado) est�n arquivados na nosa base de datos. Para modificalos prema no link <u>Perfil</u>, xeralmente enc�ntrase enriba de cada p�xina.");
$faq[] = array("�A hora nos foros non � correcta!", "As horas son correctas, � posible que est� vendo as horas correspondentes a outra zona horaria, se este � o caso, ingrese � seu perfil e defina a s�a zona horaria dacordo � s�a ubicaci�n (ej. Londres, Paris, New York, Sydney, etc.) Cambiando esto as horas deben aparecer dacordo � s�a zona horaria. Se non se rexistrou � tempo de facelo :)");
$faq[] = array("Cambiei a zona horaria no meu perfil, pero o tiempo segue a ser incorrecto", "Se est� segur@ de que a zona horaria � correcta � posible que se deba �s horarios de verano implementados por alg�ns paises.");
$faq[] = array("O meu idioma non est� na lista!", "Esto p�dese deber a que o administrador non instalou o paquete da s�a linguaxe para o foro ou ningu�n creou unha traducci�n :(  se � asi, sintase libre de facer unha traducci�n (miles de personas agradeceranllo), a informaci�n a encontrar� na p�xina web do phpBB Group (Prema no enlace que se encontra � final da p�xina)");
$faq[] = array("�Como podo po�er unha imaxe debaixo do meu nome de usuario?", "Hai dous tipos de imaxes debaixo do seu nome de usuario, a primeira � o RANGO, que est� asociada co n�mero de mensaxes que escribiu no foro (xeralmente son estrelas ou bloques), a segunda � o AVATAR, que � un gr�fico xeralmente �nico e personal, o administrador decide se p�dense usar ou non, se � posible usalos podes introducilo no teu perfil. En caso de que non exista esa opci�n, contacta � administrador e pide que sexa activada esa opci�n :)");
$faq[] = array("�Como podo cambia-lo meu RANGO?", "Non podes cambia-lo teu RANGO directamente, xa que este � asociado directamente co n�mero de mensaxes posteados ou � teu estado de moderador, administrador ou RANGOS especiais. Por favor, non abuses de postear innecesariamente para incrementa-lo teu RANGO.");
$faq[] = array("Cando fago click sobre o link de e-mail p�deme que me rexistre", "Para poder envia-lo e-mail a un usuario via formulario (se o administrador o ten activado) necesitas estar rexistrado, esto para evitar SPAM ou mensaxes maliciosas de usuarios anonimos.");


$faq[] = array("--","Publicaci�n de mensaxes");
$faq[] = array("�Como podo publicar unha mensaxe no foro?", "F�cil, rex�strese como membro do foro (premendo no enlace de rexistro, xeralmente enriba de cada p�xina), despois do rexistro prema en <i>Enviar nova mensaxe</i>, ahi se lle presentar� un panel co que facilmente publicar� unha mensaxe :)");
$faq[] = array("�Como podo editar ou borrar unha mensaxe?", "Se non � o administrador ou moderador do foro, s� pode borra-las mensaxes que enviou vostede mesmo. Pode editar unha mensaxe facendo click en <i>editar</i>. Se algu�n xa respostou � s�a mensaje, encontrar� un pequeno texto no seu dicindo que foi modificado e as veces que o fixo, non aparece se foi un moderador ou o administrador quen o editou (a maioria das veces deixan unha mensaxe aclaratoria).");
$faq[] = array("�Como podo engadir unha sinatura � mi�a mensaxe?", "Para insertar unha sinatura na s�a mensaxe primeiro debe crear unha, isto faise modificando-lo seu perfil. Unha vez creada, active a opci�n <i>Engadir Sinatura</i> cando postees unha mensaxe. Tam�n pode facer que t�dalas s�as mensaxes te�an a s�a firma, activando a opci�n no teu perfil.");
$faq[] = array("�Como creo unha enquisa?", "Crear unha enquisa � f�cil, cando inicie un novo tema notar� a opci�n <i>Crear unha enquisa</i>, introduza os datos da enquisa, como t�tulo e opci�ns, ten a posibilidade de po�er l�mite � n�mero de participantes (0 � infinito)");
$faq[] = array("�Como edito ou borro unha enquisa?", "Se � quen iniciou a enquisa pode editala do mesmo xeito que a s�a mensaxe, sen embargo esto s� funcionar� se a enquisa a�nda non ten respostas, pois de telas s� o administrador ou moderadores poder�n editala o borrala");
$faq[] = array("�Por que non podo acceder a alg�n foro?", "Alg�ns foros est�n limitados a certos grupos de usuarios, para velos, postear, editar, etc, necesita ter certas autorizaci�ns, que s� p�delle dar un moderador ou administrador do foro.");
$faq[] = array("�Por que non podo votar nas enquisas?", "S� os membros rexistrados poden votar nas enquisas (para previr resultados trucados), se rexistrouse pero non pode votar, �s posible que non te�a autorizaci�n para votar nesa enquisa :( .");


$faq[] = array("--","Formateo de mensaxes e tipos de temas");
$faq[] = array("�Que � o c�digo BBCode?", "BBCode � unha implementaci�n especial do HTM, a forma na que o BBCode se usa � determinada polo administrador, � moi similar � HTML, as etiquetas van entre corchetes [ e ] para m�is informaci�n pode ve-lo manual de BBCode, o enlace aparece cada vez que vai publicar unha mensaxe.");
$faq[] = array("�Podo usar HTML?", "Depende de que o administrador te�a habilitada a opci�n e de que etiquetas HTML est�n activadas, xa que moitas etiquetas HTML poder�an da�ar severamente a estructura da mensaxe.");
$faq[] = array("�Que son os smileis?", "Smileis ou emot�conos son pequenos gr�ficos que poden usarse para expresar emoci�ns, aparecen introducindo un pequeno c�digo, por exemplo:  :) significa feliz, :( significa triste. A lista compreta de smileis desplegase cando env�a unha mensaxe.");
$faq[] = array("�Podo postear imaxes?", "As imaxes poden ser introducidas na mensaxe, insertandoas no momento de redactala. Non pode haber im�xes de sitios de correo, busqueda ou cualquera que precise autentificaci�n (Yahoo, Hotmail...).");
$faq[] = array("�Que son os anuncios?", "Os anuncios conte�en informaci�n importante para os usuarios.");
$faq[] = array("�Que son os Temas Importantes?", "Os Temas Importantes aparecen debaixo dos anuncios e s� na primeira p�xina, � informaci�n moi importante que deber�a ler :)");
$faq[] = array("�Que son os temas pechados ou bloquedados?", "Os temas pechados ou bloqueados son precisamente iso, temas nos que xa non se poden postear, isto o decide o administrador ou moderadores.");


$faq[] = array("--","Niveis de usuario e grupos");
$faq[] = array("�Que son os administradores?", "Os administradores son xente asignada con alto nivel de control sobre o foro enteiro, poden controlar permisos, moderadores e todo tipo de configuraci�ns.");
$faq[] = array("�Que son os moderadores?", "Moderadores son persoas que te�en o poder de editar ou borrar foros, cerralos ou abrilos. Son designados polo administrador e te�en menos opci�ns que este.");
$faq[] = array("�Que son os grupos de usuarios?", "Os Grupos de usuarios � unha das formas nas que o administrador do foro pode agrupar usuarios. Un usuario pode pertencer a varios grupos. Esto faise co fin de conceder permisos selectivos sobre o foro (como facer a todo un grupo moderadores).");
$faq[] = array("�Como podo pertencer a un Grupo de usuarios?", "Fai click en Grupos de usuarios e pide a t�a inscrici�n, recibir�s un mail se eres aceptado. Non t�dolos grupos son abertos.");
$faq[] = array("�Como me fago moderador dun grupo de usuarios?", "S� o administrador pode asignar ese permiso, contacta con el :)");


$faq[] = array("--","Mensaxer�a privada");
$faq[] = array("�Non podo enviar mensaxes privadas!", "Hai tres posibles raz�ns: Non esta rexistrado ou non ingresou, o administrador deshabilitou o sistema de mensaxes privadas ou o administrador deshabilitou para vostede a mensaxer�a.");
$faq[] = array("�Quero evitar mensaxes privadas non deseados!", "Nun futuro ser� engadida a caracter�stica de ignorar mensaxes, por agora s� env�e unha mensaxe � administrador se recibe mensaxes non deseadas :(.");
$faq[] = array("�Recib�n spam ou correos maliciosos de algu�n neste foro!", "Sent�molo moito, a caracter�stica de mandar mails ten amplios conceptos de seguridade e privacidade. Envie o mail � administrador, tal coma vi�a, incluindo headers e demais, el tomar� acci�ns.");

//
// These entries should remain in all languages and for all modifications
//
$faq[] = array("--","Acerca de phpBB2");
$faq[] = array("�Quen programou este foro??", "Esta aplicaci�n (na s�a forma orixinal) � producida, liberada e con dereitos de autor pertencentes a <a href=\"http://www.phpbb.com/\" target=\"_blank\">phpBB Group</a>. Est� feito baixo a GNU (Licencia P�brica Xeral) e � de libre distribuci�n (click no enlace para co�ecer m�is detalles)");
$faq[] = array("�Por que este foro non ten X cousa?", "Este foro foi escrito e licenciado a trav�s de phpBB Group. Se cree que deberia ter algunha outra opci�n ou caracter�stica visite phpbb.com e mire o que o phpBB Group ten que decir. Por favor, non pubrique mensaxes de ese tipo nos foros de phpBB.com, os membros de Sourceforge estan cheos de ideas e en constante innovaci�n para engadirlle melloras a este foro.");
$faq[] = array("�A quen podo contactar acerca de abusos ou usos ilegais relacionados con este foro?", "Pode contactar � administrador do foro, se non encontra a forma de contactalo intente contactando a cualquera dos moderadores. Se a�nda non recibe resposta contacte � dono do dominio (faga un whois lookup) ou, se esta nun servicio gratuito (e.g. yahoo, free.fr, f2s.com, etc.), a direcci�n ou departamento de abusos dese servicio.Por favor, te�a en conta que phpBB Group non ten ning�n control e non pode de ning�n modo ser culpado de como, donde ou por quen este foro se usa. Non ten ning�n sentido contacta-lo phpBB Group en relaci�n con calquer asunto legal non directamente relacionado co sitio phpbb.com ou o sofware concreto do phpBB. Se manda un email � phpBB Group sobre calquera uso dunha terceira parte de este software recibir� unha resposta pouco amable ou non recibir� resposta algunha.");

//
// Acab�ronse as FAQ :)
//

?>
