<?php
/***************************************************************************
 *                        lang_bbcode.php [portuguese]
 *                            -------------------
 *   begin                : Wednesday Oct 3, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id$
 *
 *
 ***************************************************************************/

 /****************************************************************************
 * Translation by:
 * LuizCB (Pincel) LuizCB@pincel.net || http://pincel.net
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
// To add an entry to your BBCode guide simply add a line to this file in this format:
// $faq[] = array("question", "answer");
// If you want to separate a section enter $faq[] = array("--","Block heading goes here if wanted");
// Links will be created automatically
//
// DO NOT forget the ; at the end of the line.
// Do NOT put double quotes (") in your BBCode guide entries, if you absolutely must then escape them ie. \"something\"
//
// The BBCode guide items will appear on the BBCode guide page in the same order they are listed in this file
//
// If just translating this file please do not alter the actual HTML unless absolutely necessary, thanks :)
//
// In addition please do not translate the colours referenced in relation to BBCode any section, if you do
// users browsing in your language may be confused to find they're BBCode doesn't work :D You can change
// references which are 'in-line' within the text though.
//
  
$faq[] = array("--","Introdu��o");
$faq[] = array("O que � BBCode?", "BBCode � uma implementa��o especial de HTML. A possibilidade em poder usar BBCode nas suas mensagens � determinada pelo Administrador dos f�runs. Adicionalmente, voc� pode poder� desligar o BBCode em cada mensagem assinalando <b>Desactivar BBCode nesta mensagem</b> abaixo da caixa principal de cada mensagem. BBCode por si mesmo � similar em estilo ao HTML, as etiquetas (tags) s�o incluidas em par�ntesis rectos [ and ] em vez de &lt; e &gt; proporcionando um maior controle do que haja a controlar bem como a sua apresenta��o. A tarefa de adicionar BBCode �s suas mensagen � facilitada pelo uso de um painel colocado imediatamente acima � caixa principal das mensagens, dependendo do modelo de phpBB em uso, onde pode escolher e aplicar os v�rios itens consoante o c�digo que pretenda aplicar. Apesar da exist�ncia desse painel este decerto que este guia lhe vai ser �til.");

$faq[] = array("--","Formatos de Texto");
$faq[] = array("Como criar texto sobrecarregado, it�lico e sublinhado", "O BBCode incl�i etiquetas que lhe permitem mudar rapidamente o estilo b�sico do texto. Isto � poss�vel das seguintes formas: <ul><li>Para tornar uma parte de texto sobrecarregada inclu�-la entre <b>[b][/b]</b>, ou seja, <br /><br /><b>[b]</b>Ol�<b>[/b]</b><br /><br />passar� a ser <b>Ol�</b></li><li>. Para sublinhar use <b>[u][/u]</b>. Por exemplo:<br /><br /><b>[u]</b>Bom Dia<b>[/u]</b><br /><br />passa a ser <u>Bom Dia</u></li><li>. Para tornar o texo it�lico use <b>[i][/i]</b>, ou seja,<br /><br />Isto � <b>[i]</b>�ptimo!<b>[/i]</b><br /><br />, o que ir� resultar em Isto � <i>�ptimo!</i></li></ul>");
$faq[] = array("Como mudar a cor ou o tamanho do texto", "Para alterar a cor ou o tamanho do texto devem ser usadas as seguintes etiquetas. Ter em mente que a forma como aparecer� no monitor de cada visitante est� dependente do 'browser' ou do sistema do visitante: <ul><li> a mudan�a da cor do texto � atingida englobando-o em <b>[color=][/color]</b>. Tanto pode especificar o nome de uma cor conhecida (ter� que ser em ing�s) (por exempllo, red, blue, yellow, etc.) ou especificando o seu valor hexadecimal, ou seja, #FFFFFF, #000000. Por exemplo, para criar texto em vermelho poder� usar:<br /><br /><b>[color=red]</b>Ol�!<b>[/color]</b><br /><br />ou<br /><br /><b>[color=#FF0000]</b>Ol�!<b>[/color]</b><br /><br />. Ambos aparecer�o como <span style=\"color:red\">Ol�!</span></li><li>. A mudan�a do tamanho do texto pode ser feita de uma forma similar, usando <b>[size=][/size]</b>. Esta etiqueta est� dependente do Modelo de phpBB que voc� se encontra a usar mas o formato recomendado � um valor num�rico representando o tamanho de texto em pixels, come�ando em 1 (t�o pequeno que pr�ticamente n�o se v�) at� 29 (enorme). Por exemplo:<br /><br /><b>[size=9]</b>PEQUENO<b>[/size]</b><br /><br />, normalmente aparecer� como <span style=\"font-size:9px\">PEQUENO</span><br /><br />enquanto que <br /><br /><b>[size=24]</b>ENORME!<b>[/size]</b><br /><br />ser� <span style=\"font-size:24px\">ENORME!</span></li></ul>");
$faq[] = array("Posso combinar etiquetas de formato?", "Sim, claro que pode. Por exemplo, para cativar a aten��o de algu�m poder� escrever:<br /><br /><b>[size=18][color=red][b]</b>OLHE PARA MIM!<b>[/b][/color][/size]</b><br /><br />. Isto aparecer� como <span style=\"color:red;font-size:18px\"><b>OLHE PARA MIM!</b></span><br /><br />. No entanto, n�o recomendamos o uso de muito texto da forma que acab�mos de descrever! Lembre-se que depende de si, o autor da mensagem, assegurar que os c�digos sejam colocados correctamente. Por exemplo, isto est� incorrecto:<br /><br /><b>[b][u]</b>. Isto � errado<b>[/b][/u]</b>");

$faq[] = array("--","Citar e produzir texto de largura fixa");
$faq[] = array("Citar texto em respostas", "H� duas formas de reproduzir texto previamente feito (normalmente uma r�plica de uma mensagem anterior), com ou sem refer�ncia .<ul><li>Quando voc� utiliza a fun��o <b>Citar</b> para responder a uma mensagem no f�rum, note que o texto dessa mensagem � adicionado � sua janela de mensagem inluido num <b>[quote=\"\"][/quote]</b> bloco. Este m�todo permite-lhe citar com uma refer�ncia a uma pessoa ou o que voc� decida colocar! Por exemplo, para citar uma pe�a de texto que Mr. Blobby escreveu, voc� escrever�:<br /><br /><b>[quote=\"Mr. Blobby\"]</b>O texto que Mr. Blobby escreveu ir� aqui<b>[/quote]</b><br /><br />. O resultado adicionar� automaticamente, Mr. Blobby wrote: antes do texto citado. De notar que voc� <b>tem que</b> incluir aspas \"\" � volta do nome que est� a citar.</li><li>O segundo m�todo permite-lhe citar algo sem refer�ncia a algu�m ou algo. Para o fazer englobe o texto em etiquetas <b>[quote][/quote]</b>. Quando verificar a mensagem ver� que simplesmente surge, Cita��o: antes do texto.</li></ul>");
$faq[] = array("Produzir c�digo ou texto com uma largura fixa", "Se pretende reproduzir uma por��o de c�digo ou de facto algo que requeira uma largura fixa, ou seja, tipo de fonte Courier, englobe o texto em etiquetas <b>[code][/code]</b>, ou seja<br /><br /><b>[code]</b>echo \"Isto � algum c�digo\";<b>[/code]</b><br /><br />O formato usado entre as etiquetas <b>[code][/code]</b> � preservado, quando posteriormente o verificar.");

$faq[] = array("--","Gerando listas");
$faq[] = array("Criar uma lista sem ordem espec�fica", "O BBCode aceita dois tipos de listas, sem ordem e ordenada. Elas s�o basicamente o mesmo que em HTML. Uma lista sem ordem produz cada item de uma forma sequencial, um a seguir ao outro,  precedendo-o um caracter constante. Para a criar usar <b>[list][/list]</b> e colocar cada item entre essas etiquetas, usando <b>[*]</b> antes de cada um. Por exemplo, para listar as suas cores favoritas, pode escrever:<br /><br /><b>[list]</b><br /><b>[*]</b>Vermelho<br /><b>[*]</b>Azul<br /><b>[*]</b>Amarelo<br /><b>[/list]</b><br /><br />. Isto ir� aparecer como:<ul><li>Vermelho</li><li>Azul</li><li>Amarelo</li></ul>");
$faq[] = array("Criar uma lista ordenada", "O segundo tipo de listas, a ordenada, proporciona-lhe controle do que v� aparecer antes de cada item. Para criar uma lista ordenada voc� usar� <b>[list=1][/list]</b> de forma a criar uma lista num�rica ou, <b>[list=a][/list]</b>, para uma lista alfab�tica. Da mesma forma que para o tipo de lista sem ordem os itens s�o especificados usando <b>[*]</b>. Por exemplo:<br /><br /><b>[list=1]</b><br /><b>[*]</b>Ir �s compras<br /><b>[*]</b>Comprar um computador novo<br /><b>[*]</b>Insultar o computador quando fica bloqueado<br /><b>[/list]</b><br /><br />produzir� o seguinte:<ol type=\"1\"><li>Ir �s compras</li><li>Comprar um computador novo</li><li>Insultar o computador quando fica bloqueado</li></ol>. Enquanto que para uma lista alfab�tica voc� usar�:<br /><br /><b>[list=a]</b><br /><b>[*]</b>A primeira resposta<br /><b>[*]</b>A segunda resposta<br /><b>[*]</b>A terceira resposta<br /><b>[/list]</b><br /><br />,resultando em <ol type=\"a\"><li>A primeira resposta</li><li>A segunda resposta</li><li>A terceira resposta</li></ol>");

$faq[] = array("--", "Criar atalhos");
$faq[] = array("Criar um atalho para outra p�gina/site", "O phpBB BBCode aceita um n�mero vari�vel de formas para criar URIs, Uniform Resource Indicators, melhor conhecidos como URLs.<ul><li>A primeira dessas formas � usando a etiqueta <b>[url=][/url]</b>. O que quer que escreva depois do sinal = faz com que o conte�do dessa etiqueta aja como um URL. Por exemplo, para fazer uma liga��o-atalho � p�gina phpBB.com escreve:<br /><br /><b>[url=http://www.phpbb.com/]</b>Visite phpBB!<b>[/url]</b><br /><br />. Isto ir� resultar no atalho seguinte, <a href=\"http://www.phpbb.com/\" target=\"_blank\">Visite phpBB!</a>. Veja que a p�gina ir� abrir numa janela nova de forma a que o utilizador possa continuar nos f�runs.</li><li>. Se pretende que o URL esteja � vista simplesmente fa�a isto:<br /><br /><b>[url]</b>http://www.phpbb.com/<b>[/url]</b><br /><br />Isso produzir� o seguinte atalho, <a href=\"http://www.phpbb.com/\" target=\"_blank\">http://www.phpbb.com/</a></li><li>. Adicionalmente o phpBB possui algo chamado <i>Atalhos M�gicos</i>, fun��o que permite transformar automaticamente  qualquer URL escrito com um sintaxe correcto em um atalho sem ser necess�rio especificar quaisquer etiquetas ou mesmo o prefixo http://. Por exemplo, escrevendo www.phpbb.com na sua mensagem, automaticamente resultar� em <a href=\"http://www.phpbb.com/\" target=\"_blank\">www.phpbb.com</a> quando vir essa mensagem.</li><li>. A mesma coisa se aplica aos endere�os de email, podendo especificar explicitamente o endere�o, por exemplo:<br /><br /><b>[email]</b>ninguem@domain.adr<b>[/email]</b><br /><br />que resultar� em <a href=\"emailto:ninguem@domain.adr\">ninguem@domain.adr</a> ou pode apenas escrever ninguem@domain.adr na sua mensagem que ser� automaticamente convertido quando a mensagem for guardada.</li></ul>
Como em todas as etiquetas de BBCode pode misturar URLs com quaisquer outras etiquetas, como por exemplo <b>[img][/img]</b> (ver a pr�xima), <b>[b][/b]</b>, etc. Em rela��o ao formato das etiquetas est� totalmente dependente de si assegurar a ordem correcta de in�cio e fecho, por exemplo:<br /><br /><b>[url=http://www.phpbb.com/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/url][/img]</b><br /><br />isto <u>n�o �</u> correcto, o que pode conduzir � sua mensagem ser removida por algum moderador ou Administrador. Como tal tenha cuidado.");

$faq[] = array("--", "Mostrar imagens em mensagens");
$faq[] = array("Adicionar uma imagem a uma mensagem", "O phpBB BBCode incorpora uma etiqueta para incluir imagens nas suas mensagens. Dois factores muito importantes a recordar quando se usa estas etiquetas; a maioria dos utilizadores n�o gosta de ver muitas imagens em mensagens e, segundo, a imagem que voc� pretende mostrar deve exixtir na internet (por exemplo, n�o pode existir apenas no seu computador a menos que tenha um servidor de p�ginas na web, esteja sempre activo e seja publicamente acess�vel!). N�o h� presentemente qualquer forma de armazenar imagens localmente, com o phpBB (contamos dar especial aten��o a esse assunto na pr�xima publica��o do phpBB). Para mostrar uma imagem voc� ter� que envolver o URL da imagem com as etiquetas <b>[img][/img]</b>. Por exemplo:<br /><br /><b>[img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img]</b><br /><br />. Como deve ter notado na sec��o do URL acima, pode englobar uma imagem numa etiqueta <b>[url][/url]</b> se assim o desejar, ou seja, <br /><br /><b>[url=http://www.phpbb.com/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img][/url]</b><br /><br />ir� produzir:<br /><br /><a href=\"http://www.phpbb.com/\" target=\"_blank\"><img src=\"http://www.phpbb.com/images/phplogo.gif\" border=\"0\" alt=\"\" /></a><br />");

$faq[] = array("--", "Outros assuntos");
$faq[] = array("Posso adicionar as minhas pr�prias etiquetas?", "N�o, receio que n�o o possa fazer directamente no phpBB 2.0. Pensamos proporcionar na pr�xima vers�o do phpBB etiquetas de BBCode configur�veis");

//
// This ends the BBCode guide entries
//

?>