<?php
/***************************************************************************
 *                          lang_faq.php [asturian]
 *                            -------------------
 *   begin                : Wednesday Oct 3, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *   
 *   traduci�n al asturianu : Mikel Gonz�lez (mikelglez@iespana.es)
 *
 *   $Id: lang_faq.php,v 0.9 2002/03/05 16:42:08 Pato[100%Q]
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   Esta ye una aplicaci�n de software llibre, pue re-distribuila y/o modificala
 *   enbaxu los terminos de la GNU (Llicencia P�blica Xeneral), la cual foy public�
 *   per la Free Software Foundation (Fundaci�n del Software Llibre). Esto en la llicencia
 *   de la versi�n 2 o posterior.
 *
 ***************************************************************************/
 
// 
// Pa enxertar una entrada a les Entrugues Frecuentes nam�s meta una llinea col siguiente formatu:
// $faq[] = array("entruga", "rempuesta");
// Si quier separar una secion plumie $faq[] = array("--","Un testu de separtaci�n pue dir equ� si quier");
// Los enllaces creanse automaticamente :)
//
// NUN OLVIDE poner ; al final de cada llinia.
// NUN PONGA dobles comilles (") enes entraes de sus Entrugues Frecuentes, si ye absolutamente necesariu entos plumielo asi: \"testu\"
//
// Los temas ya entraes de les Entrugues Frecuentes apaecer�n nel mesmu orden nel que tean n'esti archivu.
//

  
$faq[] = array("--","Acerca del ingresu (login) y rexistru");
$faq[] = array("�Por qu� nun pueo conectame?", "�Ya se rexistr�? Tien que rexistrase nel sistema enantes de poer acceder a �l. �Foy bloqueau nel foru? (si ye asi un aparecer�-y un mensaxe). Si esto pasa unvie un mensaxe al alministraor del foru pa alcontrar la causa. Si rexistrose y nun foy bloqueau compruebe que'l so nome d'usuariu y contrase�a coinciden, ye'l problema mas com�n. Si ta seguru de que tean correutos los datos, unvie un mensaxe al alministraor, ye posible que'l foru te mal configurau y/o tea fallos ena programaci�n.");
$faq[] = array("�Por qu� teo que registrame pa too?", "Nun ta obligau a facelu, la decisi�n tomenla los alministraores y moderaores. Ensin embargu tar rexistrau y-da munches ventaxes que como usuariu invitau nun esfrutar�a, como tener el su gr�ficu personalizau (avatar), mensaxes privaos, suscrici�n a grupos d'usuarios, etc.... Nam�s y-tomar� unos segundinos, Ye mui recomendable.");
$faq[] = array("�Por qu� la mio sesi�n d'usuariu expira automaticamente?", "Si nun activa la casilla <i>Ingresar autom�ticamente</i> cuandu se coneuta'l foru, los sus datos guardanse nuna cookie que eliminase al salir de la p�xina o en ciertu tiempu. Esto previen que la su cuenta puea ser usada por dalguien m�s. Pa que'l sistema y-reconoza autom�ticamente nam�s tien que activar la casilla al conectase. NUN ye recomendable si coneutase al foru dende una computaora compartia (ciber-chigre, biblioteca, facult� ...)");
$faq[] = array("�Como evito apaecer enes llistes d'usuarios coneutaos?", "Nel so perfil, atopar� la opci�n <i>Ocultar el mio estau de conexi�n</i>, si activa esta opci�n apaecer� nam�s pa los alministraores, moderaores y pa ust� mesmu, pa los demas ser� un usuariu ocultu.");
$faq[] = array("�Perdiera la mio contrase�a!", "Calma, si la su contrase�a no pue recuperase pue desautivala o cambiala. Pa facer esto dirixase a la p�xina de rexistru y calque en <u>Olvid� la mio contrase�a</u>, siga les instruciones y tar� dientru en mui pocu tiempu");
$faq[] = array("�Rexistreme y nun pueo coneutame!", "Primeru verifique los sus datos (usuariu y contrase�a). Si too ye correutu hay dos posibles razones. Si'l Sistema de Proteci�n Infantil (COPPA) ta activau y cuandu rexistrose elixi� la opci�n <u>Soi menor de 13 a�os</u> entos tendr� que seguir dalgunes instruciones que se-y dar�n pa activar la cuenta. N'otros casos l'alministraor pide que les cuentas  activense mediante un correu lletr�nico, asi que revise'l so correu y confirme la suscrici�n. Dalgunos foros necesiten confirmaci�n de rexistru. Si nun sucede na d'esto contaute col alministraor del foru.");
$faq[] = array("Fay tiempu ya que me rexistrara, pero agora nun pueo coneutame", "Les posibles razones son: enxertara un nome d'usuariu o contrase�a incorreutos (verifique'l mensaxe que se-y unvia al rexistrase). Yes posible que'l alministraor haya esborriau la su cuenta, esto ye mui frecuente, pues si nun escribiera neng�n mensaxe en ciertu tiempu l'alministraor pue esborriar l'usuariu pa que la base datos nun se-y sature de rexistros. Si ye asi rexistrese de nueu y participe :)");


$faq[] = array("--","Preferencies d'usuariu y configuraciones");
$faq[] = array("�C�mu pueo camudar la mio configuraci�n?", "Tolos sus datos y configuraciones (si ta rexistrau) t�n archivaes ena nuesa base datos. Pa camudalos calque'l enllaz <u>Perfil</u>, xeneralmente alcuentrase no cimero de cada p�xina.");
$faq[] = array("El tiempu enos foros no ye correuto (hores)!", "Les horas son correutas, pue que te g�eyando les hores correspondientes a otra zuna horaria, si ye'l casu, entre al so perfil y elixa la su zona horaria d'alcuerdu a la so ubicaci�n (ex. Llondres, Paris, Nuea York, Sydney, etc.) En camudando esto les horas deben apaecer d'alcuerdu a la su zona y tiempu. Si nun ta rexistrau ye tiempu de facelu :)");
$faq[] = array("Camudra la zuna horarian nel mio perfil, pero el tiempu sigue siendu incorreuto", "Si ta seguru de que la zuna horaria ye correuta ye posible que seya polos horarios de branu implementaos por dalgunos paises.");
$faq[] = array("El mio idioma nun t� ena llista!", "Esto pue ser porque l'alministraor nun instalara'l paquete del so idioma pa'l foru o naide ficiera una traduci�n :(  si ye asi, sientase llibre de facer una traduci�n (miles de personas agradecer�n-ylo), la informaci�n encuentrase nel phpBB Group website (Calque'l enllaz que s'alcuentra nel pie de la p�xina)");
$faq[] = array("C�mu pueo poner una imaxen enbaxu del mio nome d'usuariu?", "Hay dos tipos d'im�xenes enbaxu'l so nome d'usuariu, la primera ye'l RANK, que t� asociada col n�mberu de mensaxes que plumiara nel foru (xeneralmente son estrelles o bloques), la segunda ye l'AVATAR, que ye un gr�ficu xeneralmente �nicu y personal, l'alministraor decide si pueden usase o non, si ta permitiu usalos pue introducilo nel su perfil. En casu de que nun exista esa opci�n, contaute col alministraor y pida-y qu'autive esa opci�n :)");
$faq[] = array("�Comu pueo camudar el mio RANK?", "No pue camudar el so RANK direutamente, ya qu'esti ta asociau col n�mberu de mensaxes plumiaos o el so estau de moderaor, alministraor o RANKs especiales. Por favor, nun abuse de plumiar innecesariamente pa aumentar el so RANK.");
$faq[] = array("Cuandu calco sobre'l enllaz de correu pideme rexistru", "Pa poer unviar correu a un usuariu via formulariu (si l'alministraor tienlo activau) necesita tar rexistrau, esto ye pa evitar SPAM o mensaxes maliciosos d'usuarios anonimos.");


$faq[] = array("--","Publicaci�n de mensaxes");
$faq[] = array("�Comu pueo publicar un mensaxe nel foru?", "Facil, rexistrese comu miembru del foru (calcando nel enllaz de rexistru, xeneralmente no cimero de cada p�xina), depues del rexistru calque'n <i>Unviar nueu mensaxe<i>, se-y presentar� un panel col que facilmente espublizar� un mensaxe :)");
$faq[] = array("�C�mu pueo editar o esborriar un mensaxe?", "Si nun ye l'alministraor o moderaor del foru, nam�s pue'sborriar los mensaxes qu'hubiere unviau ust� mesmu. Pue editar un mensaxe calcando n'<i>editar</i> si d'aquien ya respondiera al so mensaxe, alcontr� un pique�u testu nel mesmu diciendo que foy modificau y les vegaes que lo ficiere, nun apaez si foy un moderaor o l'administraor el que lu editara (la mayoria les vegaes dexen un mensaxe aclaratoriu).");
$faq[] = array("�Comu pueo axuntar una firma al mio mensaxe?", "Pa enxertar una firma nel so mensaxe primeru ha facer una, esto faise modificando'l so perfil. Una vez creada active la opci�n <i>Axuntar firma</i> cuando plumie un mensaxe. Tami�n pue facer que tolos sus mensaxes tean la so firma, autivando la opci�n nel su perfil.");
$faq[] = array("�C�mu faigo una encuesta?", "Facer una encuesta ye cenciellu, encuantes entame un nueu tema notar� la opci�n <i>Facer una encuesta</i>, introduz los datos de la encuesta, como titulu y opciones, tien la posibilid� de poner llimite al numberu de participantes (0 ye infinitu)");
$faq[] = array("�C�mu edito o esborrio una encuesta?", "Si ye ust�'l que'ntam� la encuesta pues editala de la mesma mena que'l su mensaxe, pero esto nam�s funcionar� si la encuesta ent� nun tien rempuestes, si les toviere nam�s l'alministraor o moderaores podr�n editala o esborriala");
$faq[] = array("�Por qu� nun pueo aceder a dalg�n foru?", "Dalgunos foros t�n llimitaos a ciertos grupos d'usuarios, pa velos, plumiar, editar, etc, necesita tener ciertes autorizaciones, que nam�s pue da-ylas un moderaor o alministraor del foru.");
$faq[] = array("�Por qu� nun pueo votar nes encuestes?", "Nam�s miembros rexistraos puen votar enes encuestes (pa prevenir resultaos trucaos), si tubiere rexistrau pero nun pue votar, ye posible que nun tea autorizaci�n pa votar nesa encuesta :(.");



$faq[] = array("--","Dando-y forma a los mensaxes y tipos de temes");
$faq[] = array("�Qu� ye'l c�digu BBCode?", "BBCode ye una implementaci�n especial del HTML, la mena ena que'l BBCode s'emplega ye determin� po'l alministraor, ye mui paeciu al HTML, les etiquetes van entre corchetes [ y ] pa mas informaci�n pues char un q�eyu el manual de BBCode, l'enllaz apaez ca veg� que publiques un mensaxe.");
$faq[] = array("�Pueo usar HTML?", "Depende de que l'alministraor tea autivada la oci�n y de cuales etiquetes HTML t�n autivaes, ya que munches etiquetes HTML podrien da�ar severamente la estrutura del mensaxe.");
$faq[] = array("�Qu� son los smileys?", "Smileys, emot�conos o icionos xestuales son peque�os gr�ficos que puen ser usaos pa'spresar emociones, apaecen enxertando un pequenu c�digu, por exemplu:  :) significa feliz, :( significa atristayau. La llista completa de'smileys despliegase cuandu unvies un mensaxe.");
$faq[] = array("�Pueo unviar imaxenes?", "Les imaxenes puen ser xuntaes al mensaxe, enxertandolas al momentu de redatalu. Nun pue haber imaxenes de sitios de correu, busquea o cualisquier autentificacion (Yahoo, Hotmail...).");
$faq[] = array("�Qu� son los anuncios?", "Los anuncios caltienen informaci�n importante pa los usuarios.");
$faq[] = array("�Qu� son los Temes Importantes?", "Los Temes Importantes apaecen embaxu de los anuncios y nam�s ena primera p�xina, ye informaci�n perimportante que deber�a lleer :)");
$faq[] = array("�Qu� son los temes trancaos o bloqueaos?", "Los temes trancaos o bloqueaos son eso mesmo, temes enos que ya nun se puen plumiar mensaxes, esto decidilo l'alministraor o moderaores.");


$faq[] = array("--","Niveles d'usuariu y grupos");
$faq[] = array("�Qu� son los alministraores?", "Los alministraores son xente con altu nivel de control sobre'l foru enteru, puen controlar permisos, moderaores y tou tipu de configuraciones.");
$faq[] = array("�Qu� son los moderaores?", "Moderaores son persones que tienen el poer d'editar o esborriar foros, trancalos o abrirlos. Son designaos po'l alministraor  tienen menos opciones qu'esti.");
$faq[] = array("�Qu� son los grupos d'usuarios?", "los Grupos d'usuarios ye una de les formes enas que'l alministraor del foru pue agrupar usuarios. Un usuario pue pertenecer a varios grupos. Esto faise cola fin de conceder permisos coleutivos sobre'l foru (como volver a tou un grupu moderaores).");
$faq[] = array("�comu puedo pertenecer a un Grupu d'usuarios?", "Calque en Grupos d'usuarios y pida-y la so inscripcion, recibir� un correu si ye aceptau. Nun tolos grupos son abiertos.");
$faq[] = array("�C�mu conviertome nel moderador d'un grupu d'usuarios?", "Solo l'alministraor pue asignar esi permisu, contaute con el :)");


$faq[] = array("--","Mensaxer�a privada");
$faq[] = array("Nun pueo unviar mensaxes privaos!", "Hay tres posibles razones: Nun ta rexistrau o nun ta coneutau, l'alministraor tranc� el sistema de mensaxes privaos o l'alministraor nun-y parmiti a ust� l'usu de la mensaxer�a.");
$faq[] = array("Quiero evitar mensaxes privaos nun deseaos!", "N'un futuru agregarase la carauter�stica d'ignorar mensaxes, por agora nam�s unvie un mensaxe al alministraor si recibe mensaxes nun deseaos :(.");
$faq[] = array("Recibiera spam o correos maliciosos d'alguien n'esti foru!", "Sentimoslo muncho, la carauteristica de mandar correos tien amplios conceutos de segurid� y privacid�. Unvie el correu al alministraor, tal comu vinia, incluyendu headers y demas, el tomar� aciones.");

//
// These entries should remain in all languages and for all modifications
//
$faq[] = array("--","Acerca de phpBB2");
$faq[] = array("�Quien program� esti foru??", "Esta aplicaci�n (ena so forma orixinal) ye producia, lliberada y con drechos d'autor pertenecientes al <a href=\"http://www.phpbb.com/\" target=\"_blank\">phpBB Group</a>. T� fechu embaxu la GNU (Llicencia P�blica Xeneral) y ye de llibre distribuci�n (calque nel enllace pa conocer mas detalles)");
$faq[] = array("�Por qu� esti foru nun tien X cosa?", "Esti foru foy escritu y llicenciau a travi�s de phpBB Group. Si cree que deberia tener dalguna otra opci�n o carauter�stica visite phpbb.com y mire lo que'l phpBB Group tien que decir. Por favor, nun publique mensaxes d'ese tipu enos foros de phpBB.com, los miembros de Sourceforge tan enllenos d'idegues y en constante innovaci�n pa agrega-y meyores a esti foru.");
$faq[] = array("�A quien pueo contautar acerca d'abusos o usos illegales rellacionaos con esti foru?", "Pue contautar al alministraor del foru, si nun alcuentra mena de facelo intente contautando a cualisquier de los moderaores. Si nun recibe rempuesta deberia ponese en contautu col propietariu del dominiu (faiga una busca whois) o, si ta corriendo en serviores gratuitos (ex. yahoo, free.fr, f2s.com, etc.), contaute col departamentu d'abusos d'esi serviciu. Entienda que phpBB Group nun tien control algunu sobre'l foru y nun pue facese responsable sobre esti foru y los sus contenios. It is absolutely pointless contacting phpBB Group in relation to any legal (cease and desist, liable, defamatory comment, etc.) matter not directly related to the phpbb.com website or the discrete software of phpBB itself. If you do email phpBB Group about any third party use of this software then you should expect a terse response or no response at all.");

//
// Equ� finen les FAQ :)
//

?>