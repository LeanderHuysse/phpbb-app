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
  
$faq[] = array("--","Introduction");
$faq[] = array("O que � BBCode?", "BBCode � uma implementa��o especial de HTML. A possibilidade em poder usar BBCode nas suas mensagens � determinada pelo Administrador dos f�runs. Em adi��o, voc� pode poder� desligar os BBCode em cada mensagem via 'Desactivar BBCode nesta mensagem' abixo do corpo principal de cada mensagem. BBCode por si mesmo � similar em estilo a HTML, as etiquetas s�o englobadas por par�ntesis rectos [ and ] em vez de &lt; e &gt; TML, as etiquetas sao introduzidas entre per�ntesis rectos [ and ] em vez de &lt; e &gt; e proporciona um maior controle do que e como algo � apresentado. Dependendo do modelo de phpBB em uso ver� que adicionar BBCode �s suas mensagens � tornado mais f�cil atrav�s de um painel acima do corpo principal de mensagem onde pode carregar nos v�rios itens consoante o c�digo que pretenda aplicar. Apesar disso voc� talvez ir� encarar este guia como �til.");

$faq[] = array("--","Formatos de Texto");
$faq[] = array("Como criar texto sobrecarregado, it�lico e sublinhado", "O BBCode incl�i etiquetas que lhe permitem mudar rapidamente o estilo b�sico do seu texto. Isto � poss�vel das seguintes formas: <ul><li>Para tornar uma parte de texto sobrecarregada inlu�[la entre <b>[b][/b]</b>, ou seja, <br /><br /><b>[b]</b>Ol�<b>[/b]</b><br /><br />passar� a ser <b>Ol�</b></li><li>Para sublinhar use <b>[u][/u]</b>, por exemplo:<br /><br /><b>[u]</b>Bom Dia<b>[/u]</b><br /><br />passa a ser <u>Bom Dia</u></li><li>Para tornar texo it�lico use <b>[i][/i]</b>, ou seja,<br /><br />Isto � <b>[i]</b>�ptimo!<b>[/i]</b><br /><br />resultar� nisto <i>�ptimo!</i></li></ul>");
$faq[] = array("Como mudar a cor ou o tamanho do texto", "Para alterar a cor ou o tamanho do texto devem ser usadas as seguintes etiquetas. Ter em mente que a forma como aparecer� no monitor de cada visitante est� dependente do seu 'browser' ou sistema: <ul><li>A mudan�a da cor do texto � atingida englobando-o em <b>[color=][/color]</b>. Tanto pode especificar o nome de uma cor conhecida (ter� que ser em ing�s) (por exempllo, red, blue, yellow, etc.) ou na sua forma hexadecimal, ou seja, #FFFFFF, #000000. Por exemplo, para criar texto em vermelho poder� usar:<br /><br /><b>[color=red]</b>Ol�!<b>[/color]</b><br /><br />ou<br /><br /><b>[color=#FF0000]</b>Ol�!<b>[/color]</b><br /><br />ambos aparecer�o como <span style=\"color:red\">Ol�!</span></li><li>A mudan�a do tamanho do texto pode ser feita de uma forma similar, usando <b>[size=][/size]</b>. Esta etiqueta est� dependente do Modelo de phpBB que voc� se encontra a usar mas o formato recomendado � um valor num�rico representando o tamanho de texto em pixels, come�ando em 1 (t�o pequeno que pr�ticamente n�o se v�) ate 29 (muito grande). Por exemplo:<br /><br /><b>[size=9]</b>PEQUENO<b>[/size]</b><br /><br />normalmente aparecer� como <span style=\"font-size:9px\">PEQUENO</span><br /><br />enquanto que:<br /><br /><b>[size=24]</b>ENORME!<b>[/size]</b><br /><br />ser� <span style=\"font-size:24px\">ENORME!</span></li></ul>");
$faq[] = array("Posso combinar etiquetas de formato?", "Sim, claro que pode. Por exemplo, para cativar a aten��o de algu�m poder� escrever:<br /><br /><b>[size=18][color=red][b]</b>OLHE PARA MIM!<b>[/b][/color][/size]</b><br /><br />isto surgir� como <span style=\"color:red;font-size:18px\"><b>OLHE PARA MIM!</b></span><br /><br />No entanto, n�o recomendamos o uso de muito texto como acabamos de descrever! Lembre-se que depende de si, o autor da mensagem, de assegurar que os c�digos s�o colocados correctamente. Por exemplo, isto est� incorrecto:<br /><br /><b>[b][u]</b>Isto � errado<b>[/b][/u]</b>");

$faq[] = array("--","Citar e produzir texto de largura fixa");
$faq[] = array("Citar texto em respostas", "H� duas formas de reproduzir texto previamente feito (normalmente uma r�plica de uma mensagem anterior), com ou sem refer�ncia.<ul><li>Quando voc� utiliza a fun��o Citar para responder a uma mensagem no f�rum note que o texto dessa mensagem � adicionado � sua janela de mensagem englobado num bloco <b>[quote=\"\"][/quote]</b>. Este m�todo permite-lhe citar com uma refer�ncia a uma pessoa ou o que quer que seja voc� decida colocar! Por exemplo, para citar uma pe�a de texto que Mr. Blobby escreveu, voc� escrever�:<br /><br /><b>[quote=\"Mr. Blobby\"]</b>O texto que Mr. Blobby escreveu ir� aqui<b>[/quote]</b><br /><br />O resultado adicionar� automaticamente, Mr. Blobby wrote: antes do texto actual. De lembrar que voc� <b>deve</b> incluir os par�ntesis \"\" � volta do nome que est� a citar, n�o sendo opcional.</li><li>O segundo m�todo permite-lhe citar algo �s cegas. Para utilizar isto englobe o texto em etiquetas <b>[quote][/quote]</b>. Quando verificar a mensagem simplesmente mostrar�, Cita��o: antes do texto.</li></ul>");
$faq[] = array("Produzir c�digo ou texto com uma largura fixa", "Se pretende reproduzir uma por��o de c�digo ou ude facto algo que requeira uma largura fixa, ou seja, typo de fonte Courier, englobe o texto em etiquetas <b>[code][/code]</b>, ou seja<br /><br /><b>[code]</b>echo \"Isto � algum c�digo\";<b>[/code]</b><br /><br />O formato usado entre as etiquetas <b>[code][/code]</b> � preservado quando posteriormente o verificar.");

$faq[] = array("--","Gerando listas");
$faq[] = array("Criando uma lista sem ordem", "O BBCode aceita dois tipos de listas, sem ordem e ordenada. Elas s�o basicamente o mesmo que em HTML. Uma lista sem ordem produz cada item na sua lista de uma forma sequencial, uma a seguir � outra,  precedendo cada uma com um caracter constante. Para a criar escrever <b>[list][/list]</b> e definir cada item entre essas etiquetas usando <b>[*]</b>. Por exemplo, para listar as suas cores favoritaspoder� escrever:<br /><br /><b>[list]</b><br /><b>[*]</b>Vermelho<br /><b>[*]</b>Azul<br /><b>[*]</b>Amarelo<br /><b>[/list]</b><br /><br />Isto ir� resultar em :<ul><li>Vermelho</li><li>Azul</li><li>Amarelo</li></ul>");
$faq[] = array("Criar uma lista ordenada", "O segundo tipo de listas, uma ordenada, d�-lhe controle do que aparecer� antes de cada item. Para criar uma lista ordenada voc� usar� <b>[list=1][/list]</b> de forma a criar uma lista num�rica ou, alternativamente, <b>[list=a][/list]</b> para uma lista alfab�tica. Como para o tipo de lista sem ordem os itens s�o especificados usando <b>[*]</b>. Por exemplo:<br /><br /><b>[list=1]</b><br /><b>[*]</b>Ir �s compras<br /><b>[*]</b>Comprar um computador novo<br /><b>[*]</b>Insultar o computador quando bloqueia<br /><b>[/list]</b><br /><br />produzir� o seguinte:<ol type=\"1\"><li>Ir �s compras</li><li>Comprar um computador novo</li><li>Insultar o computador quando bloqueia</li></ol>Enquanto que para uma lista alfab�tica voc� usar�:<br /><br /><b>[list=a]</b><br /><b>[*]</b>A primaira resposta<br /><b>[*]</b>A segunda resposta<br /><b>[*]</b>A terceira resposta<br /><b>[/list]</b><br /><br />resultando em <ol type=\"a\"><li>A primeira resposta</li><li>A segunda resposta</li><li>A terceira resposta</li></ol>");

$faq[] = array("--", "Criar atalhos");
$faq[] = array("Criar um atalho para outra p�gina/site", "O phpBB BBCode aceita um n�mero vari�vel de formas para criar URIs, Uniform Resource Indicators, melhor conhecidos como URLs.<ul><li>A primeira dessas formas usa a etiqueta <b>[url=][/url]</b>, o que quer que seja que escreva depois do sinal = fazem com que o conte�do dessa etiqueta aja como um URL. Por exemplo, para fazer uma liga��o-atalho a phpBB.com voc� escrever�:<br /><br /><b>[url=http://www.phpbb.com/]</b>Visite phpBB!<b>[/url]</b><br /><br />Isto ir� resultar no atalho seguinte, <a href=\"http://www.phpbb.com/\" target=\"_blank\">Visite phpBB!</a> Veja que a p�gina ir� abrir numa janela nova de forma a que o utilizador possa continuar nos f�runs caso queira.</li><li>Se pretende que o URL esteja � vista simplesmente fa�a isto:<br /><br /><b>[url]</b>http://www.phpbb.com/<b>[/url]</b><br /><br />Isso produzir� o seguinte atalho, <a href=\"http://www.phpbb.com/\" target=\"_blank\">http://www.phpbb.com/</a></li><li>Adicionalmente o phpBB possui algo chamado <i>Atalhos M�gicos</i>, que automaticamente transforma qualquer URL escrito com um sintaxe correcto num atalho sem ser necess�rio especificar quaisquer etiquetas ou mesmo o prefixo http://. Por exemplo, escrevendo typing, www.phpbb.com na sua mensagem, automaticamente produzir� <a href=\"http://www.phpbb.com/\" target=\"_blank\">www.phpbb.com</a> quando verificar essa mensagem.</li><li>A mesma coisa se aplica aos endere�os de email, pode especificar explicitamente o endere�o, por exemplo:<br /><br /><b>[email]</b>ninguem@domain.adr<b>[/email]</b><br /><br />que resultar� em <a href=\"emailto:ninguem@domain.adr\">ninguem@domain.adr</a> ou pode apenas escrever ninguem@domain.adr na sua mensagem que ser� automaticamente convertido quando a vir.</li></ul>Como em todas as etiquetas de BBCode pode misturar URLs com quaisquer outras etiquetas como por exemplo <b>[img][/img]</b> (ver a pr�xima), <b>[b][/b]</b>, etc. Em rela��o ao formato das etiquetas est� totalmente dependente de si assegurar a ordem correcta de in�cio e fecho, por exemplo:<br /><br /><b>[url=http://www.phpbb.com/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/url][/img]</b><br /><br />isto <u>n�o �</u> correcto, o que pode conduzir � sua mensagem ser removida, como tal tenha cuidado.");

$faq[] = array("--", "Mostrar imagens em mensagens");
$faq[] = array("Adicionar uma imagem a uma mensagem", "O phpBB BBCode incorpora uma etiqueta para incluir imagens nas suas mensagens. Duas coisas muito importantes a lembrar quandoo se usa estas etiquetas s�o; muitos utilizadores n�o gostam de ver muitas imagens em mensagens e, segundo, a imagem que voc� pretende mostrar deve exixtir na internet (n�o pode existir apenas no seu computador, por exemplo, a menos que tenha um servidor de p�ginas na web e seja publicamente acess�vel!). N�o h� presentemente qualquer forma de armazenar imagens localmente com o phpBB (contamos debru�ar-nos nesses assuntos na pr�xima publica��o do phpBB). Para mostrar uma imagem voc� ter� que rodear o URL apontando para a imagem com as etiquetas <b>[img][/img]</b>. Por exemplo:<br /><br /><b>[img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img]</b><br /><br />Como deve ter notado na sec��o do URL acima, voc� pode englobar uma imagem numa etiqueta <b>[url][/url]</b> se assim o desejar, ou seja, <br /><br /><b>[url=http://www.phpbb.com/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img][/url]</b><br /><br />ir� produzir:<br /><br /><a href=\"http://www.phpbb.com/\" target=\"_blank\"><img src=\"http://www.phpbb.com/images/phplogo.gif\" border=\"0\" alt=\"\" /></a><br />");

$faq[] = array("--", "Outros assuntos");
$faq[] = array("Posso adicionar as minhas pr�prias etiquetas?", "N�o, receio que n�o o possa fazer directamente no phpBB 2.0. Pensamos oferecer para a pr�xima vers�o etiquetas configur�veis de BBCode");

//
// This ends the BBCode guide entries
//

?>