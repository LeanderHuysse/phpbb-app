
<!-- BEGIN privmsg_extensions -->
<table width="90%" cellpadding="1" cellspacing="0" border="0" align="center">
	<tr>
		<td><span class="cattitle">{INBOX_IMG} {INBOX_LINK} &nbsp; {SENTBOX_IMG} {SENTBOX_LINK} &nbsp; {OUTBOX_IMG} {OUTBOX_LINK} &nbsp; {SAVEBOX_IMG} {SAVEBOX_LINK}</span></td>
	</tr>
</table>

<br clear="all" />
<!-- END privmsg_extensions -->

<form action="{S_POST_ACTION}" method="post" name="post"><table width="90%" cellspacing="0" cellpadding="4" border="0" align="center">
	<tr>
		<td align="left"><span class="gensmall"><a href="{U_INDEX}">{L_INDEX}</a> -> <a href="{U_VIEW_FORUM}">{FORUM_NAME}</a></span></td>
	</tr>
</table>

<script type="text/javascript" language="javascript" src="spellcheck/spch.js"></script>
<script language="JavaScript" type="text/javascript">
<!--
//
// This is 'borrowed' from subBlue's subSilver template
// coming soon to phpBB 2.0 !
//
function bbstyle(formObj, bbopen, bbclose) {
	if ((parseInt(navigator.appVersion) >= 4) && (navigator.appName == "Microsoft Internet Explorer")) {
		theSelection = document.selection.createRange().text;
		if (!theSelection) {
			formObj.message.value += bbopen + bbclose;
			formObj.message.focus();
			return;
		}
		document.selection.createRange().text = bbopen + theSelection + bbclose;
		formObj.message.focus();
		return;
	} else {
		formObj.message.value += bbopen + bbclose;
		formObj.message.focus();
		return;
	}
}

function emoticon(theSmilie) {
	document.post.message.value += ' ' + theSmilie + ' ';
	document.post.message.focus();
}

//-->
</script>

{POST_PREVIEW_BOX}

{ERROR_BOX}

<table width="90%" cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
		<td class="tablebg"><table border="0" cellpadding="4" cellspacing="1" width="100%">
			<tr>
				<td class="cat" colspan="2"><span class="cattitle"><b>{L_POST_A}</b></span></td>
	        </tr>
			<!-- BEGIN username_select -->
			<tr>
				<td class="row1"><span class="gen"><b>{L_USERNAME}</b></span></td>
				<td class="row2"><span class="courier"><input type="text" name="username" size="25" maxlength="25" value="{USERNAME}" /></span></td>
			</tr>
			<!-- END username_select -->
			<!-- This is for private messaging -->
			<!-- BEGIN privmsg_extensions -->
			<tr>
				<td class="row1"><span class="gen"><b>{L_USERNAME}</b></span></td>
				<td class="row2"><input type="text" name="username" maxlength="50" size="20" /> &nbsp; <input type="submit"  name="usersubmit" value="{L_FIND_USERNAME}" class="liteoption" onClick="window.open('privmsg.php?mode=searchuser', '_phpbbsearch', 'HEIGHT=155,resizable=yes,WIDTH=400');return false;" /></td>
			</tr>
			<!-- END privmsg_extensions -->
            <tr>
				<td class="row1"><span class="gen"><b>{L_SUBJECT}</b></span></td>
				<td class="row2"><span class="courier"><input type="text" name="subject" size="50" maxlength="100" value="{SUBJECT}" /></span></td>
			</tr>
			<tr>
				<td class="row1"><span class="gen"><b>{L_MESSAGE_BODY}</b></span><br /><br /><span class="gensmall">{HTML_STATUS}<br />{BBCODE_STATUS}<br />{SMILIES_STATUS}</span></td>
				<td class="row2" valign="middle"><table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td width="50%"><table border="0" cellspacing="0" cellpadding="2">
							<tr>
								<td align="center"><span class="courier"><input type="button" name="addbbcode1" value=" B " title="Bold" style="font-weight:bold" onClick="bbstyle(this.form,'[b]','[/b]');"> <input type="button" name="addbbcode2" value=" i " title="Italic" style="font-style:italic" onClick="bbstyle(this.form,'[i]','[/i]');"> <input type="button" name="addbbcode3" value="Quote" title="Quote"  onClick="bbstyle(this.form,'[quote]','[/quote]');"> <input type="button" name="addbbcode4" value="Code" title="Code"  onClick="bbstyle(this.form,'[code]','[/code]');"> <input type="button" name="addbbcode5" value="List" title="List"  onClick="bbstyle(this.form,'[list]','[/list]');"> <input type="button" name="addbbcode6" value="List=" title="Ordered list" onClick="bbstyle(this.form,'[list=]','[/list]');"> <input type="button" name="addbbcode7" value="Img" title="Image"  onClick="bbstyle(this.form,'[img]','[/img]');"> <input type="button" name="addbbcode8" value="URL" title="URL" style="text-decoration: underline" onClick="bbstyle(this.form,'[url]','[/url]');"></span></td>
							</tr>
							<tr>
								<td align="center"><span class="gensmall">Font color: </span><span class="courier"><select name="addbbcode9" onChange="bbstyle(this.form, '[color=' + this.form.addbbcode9.options[this.form.addbbcode9.selectedIndex].value + ']', '[/color]')"><option style="color:{T_FONTCOLOR1}" value="{T_FONTCOLOR1}">Default</option><option style="color:darkred" value="darkred">Dark Red</option><option style="color:red" value="darkred">Red</option><option style="color:orange" value="orange">Orange</option><option style="color:brown" value="brown">Brown</option><option style="color:yellow" value="yellow">Yellow</option><option style="color:green" value="green">Green</option><option style="color:olive" value="olive">Olive</option><option style="color:cyan" value="cyan">Cyan</option><option style="color:blue" value="blue">Blue</option><option style="color:darkblue" value="darkblue">Dark Blue</option><option style="color:indigo" value="indigo">Indigo</option><option style="color:violet" value="violet">Violet</option><option style="color:white" value="white">White</option><option style="color:black" value="black">Black</option></select> &nbsp; <span class="gensmall">Font size: </span><span class="courier"><select name="addbbcode10" onChange="bbstyle(this.form, '[size=' + this.form.addbbcode10.options[this.form.addbbcode10.selectedIndex].value + ']', '[/size]')"><option value="-3">Tiny</option><option value="-2">Smaller</option><option value="0" selected="selected">Normal</option><option value="+2">Larger</option><option  value="+3">Largest</option></select></td>
							</tr>
							<tr>
								<td><span class="courier"><textarea name="message" rows="12" cols="50" wrap="virtual" tabindex="2">{MESSAGE}</textarea></span></td>
							</tr>
						</table></td>
						<td width="50%" valign="middle"><table border="0" cellspacing="0" cellpadding="5" align="center">
							<tr	align="center">
								<td colspan="4"><span class="gensmall"><b>Emoticons</b></span></td>
							</tr>
							<tr align="center" valign="middle">
								<td><a href="javascript:emoticon(':)')"><img src="images/smiles/icon_smile.gif" width="15" height="15"	border="0" alt="Smile"></a></td>
								<td><a href="javascript:emoticon(':D')"><img src="images/smiles/icon_biggrin.gif" width="15" height="15"	border="0" alt="Big grin"></a></td>
								<td><a href="javascript:emoticon(':lol:')"> <img src="images/smiles/icon_lol.gif" width="15" height="15"	border="0" alt="Laugh"></a></td>
								<td><a href="javascript:emoticon(';)')"><img src="images/smiles/icon_wink.gif" width="15" height="15"	border="0" alt="Wink"></a></td>
							</tr>
							<tr align="center" valign="middle">
								<td><a href="javascript:emoticon(':|')"><img src="images/smiles/icon_neutral.gif" width="15" height="15"	border="0"></a></td>
								<td><a href="javascript:emoticon(':(')"><img src="images/smiles/icon_sad.gif" width="15" height="15"	border="0"></a></td>
								<td><a href="javascript:emoticon(':?')"><img src="images/smiles/icon_confused.gif" width="15" height="15"	border="0"></a></td>
								<td><a href="javascript:emoticon(':o')"><img src="images/smiles/icon_eek.gif" width="15" height="15"	border="0"></a></td>
							</tr>
							<tr align="center" valign="middle">
								<td><a href="javascript:emoticon(':roll:')"><img src="images/smiles/icon_rolleyes.gif" width="15" height="15"	border="0"></a></td>
								<td><a href="javascript:emoticon('8)')"><img src="images/smiles/icon_cool.gif" width="15" height="15"	border="0"></a></td>
								<td><a href="javascript:emoticon(':p')"><img src="images/smiles/icon_razz.gif" width="15" height="15"	border="0"></a></td>
								<td><a href="javascript:emoticon(':oops:')"><img src="images/smiles/icon_redface.gif" width="15" height="15"	border="0"></a></td>
							</tr>
							<tr align="center" valign="middle">
								<td><a href="javascript:emoticon(':evil:')"><img src="images/smiles/icon_evil.gif" width="15" height="15"	border="0"></a></td>
								<td><a href="javascript:emoticon(':x')"><img src="images/smiles/icon_mad.gif" width="15" height="15"	border="0"></a></td>
								<td><a href="javascript:emoticon(':cry:')"><img src="images/smiles/icon_cry.gif" width="15" height="15"	border="0"></a></td>
								<td><a href="javascript:emoticon(':o')"><img src="images/smiles/icon_surprised.gif" width="15" height="15"	border="0"></a></td>
							</tr>
							<tr align="center" valign="middle">
								<td><a href="javascript:emoticon(':idea:')"><img src="images/smiles/icon_idea.gif" width="15" height="15"	border="0"></a></td>
								<td><a href="javascript:emoticon(':?:')"><img src="images/smiles/icon_question.gif" width="15" height="15"	border="0"></a></td>
								<td><a href="javascript:emoticon(':!:')"><img src="images/smiles/icon_exclaim.gif" width="15" height="15"	border="0"></a></td>
								<td><a href="javascript:emoticon(':arrow:')"><img src="images/smiles/icon_arrow.gif" width="15" height="15"	border="0"></a></td>
							</tr>
						</table></td>
					</tr>
				</table></td>
			</tr>
			<tr>
				<td class="row1"><span class="gen"><b>{L_OPTIONS}</b></span></td>
				<td class="row2"><table cellspacing="0" cellpadding="1" border="0">
					<!-- BEGIN html_checkbox -->
					<tr>
						<td><input type="checkbox" name="disable_html" {S_HTML_CHECKED} /></td>
						<td><span class="gen">{L_DISABLE_HTML}</span></td>
					</tr>
					<!-- END html_checkbox -->
					<!-- BEGIN bbcode_checkbox -->
					<tr>
						<td><input type="checkbox" name="disable_bbcode" {S_BBCODE_CHECKED} /></td>
						<td><span class="gen">{L_DISABLE_BBCODE}</span></td>
					</tr>
					<!-- END bbcode_checkbox -->
					<!-- BEGIN smilies_checkbox -->
					<tr>
						<td><input type="checkbox" name="disable_smilies" {S_SMILIES_CHECKED} /></td>
						<td><span class="gen">{L_DISABLE_SMILIES}</span></td>
					</tr>
					<!-- END smilies_checkbox -->
					<!-- BEGIN signature_checkbox -->
					<tr>
						<td><input type="checkbox" name="attach_sig" {S_SIGNATURE_CHECKED} /></td>
						<td><span class="gen">{L_ATTACH_SIGNATURE}</span></td>
					</tr>
					<!-- END signature_checkbox -->
					<!-- BEGIN notify_checkbox -->
					<tr>
						<td><input type="checkbox" name="notify" {S_NOTIFY_CHECKED} /></td>
						<td><span class="gen">{L_NOTIFY_ON_REPLY}</span></td>
					</tr>
					<!-- END notify_checkbox -->
					<!-- BEGIN delete_checkbox -->
					<tr>
						<td><input type="checkbox" name="delete" /></td>
						<td><span class="gen">{L_DELETE_POST}</span></td>
					</tr>
					<!-- END delete_checkbox -->
					<!-- BEGIN type_toggle -->
					<tr>
						<td></td>
						<td><span class="gen">{S_TYPE_TOGGLE}</span></td>
					</tr>
					<!-- END type_toggle -->
				</table></td>
			</tr>
{POLLBOX}
			<tr>
				<td class="cat" colspan="2" align="center">{S_HIDDEN_FORM_FIELDS}<input type="button" tabindex="4" name="spellcheck" value="Spell Check" onclick= "doSpell ('uk', document.post.message, document.location.protocol + '//' + document.location.host + '/phpBB2/spellcheck/sproxy.php', true);" /> &nbsp;<input type="submit" name="preview" value="{L_PREVIEW}" /> &nbsp;<input type="submit" name="submit" value="{L_SUBMIT}" /> &nbsp;<input type="submit" name="cancel" value="{L_CANCEL}" /></td>
			</tr>
		</table></td>
	</tr>
</table></form>

<table width="90%" cellspacing="2" border="0" align="center">
	<tr>
		<td valign="top"><span class="gensmall"><b>{S_TIMEZONE}</b></span></td>
		<td align="right" valign="top" nowrap>{JUMPBOX}</td>
	</tr>
</table>

{TOPIC_REVIEW_BOX}
