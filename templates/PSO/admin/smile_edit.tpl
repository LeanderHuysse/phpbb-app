
<br clear="all" />

<h1>{L_SMILEY_TITLE}</h1>

<P>{L_SMILEY_INSTR}</p>

<form method="post" action="{S_SMILEY_ACTION}">
<input type="hidden" name="mode" value="{S_HIDDEN_VAR}">
<input type="hidden" name="id" value="{SMILEY_ID_VAL}">
<table cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<th colspan="2">{L_SMILEY_CONFIG}</th>
	</tr>
	<tr>
		<td class="row2">{L_SMILEY_CODE_LBL}</td>
		<td class="row2"><input type="text" name="code" value="{SMILEY_CODE_VAL}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_SMILEY_URL_LBL}</td>
		<td class="row1"><input type="text" name="url" value="{SMILEY_URL_VAL}" /></td>
	</tr>
	<tr>
		<td class="row2">{L_SMILEY_EMOTION_LBL}</td>
		<td class="row2"><input type="text" name="emotion" value="{SMILEY_EMOTION}" /></td>
	</tr>
	<tr>
		<td class="cat" colspan="2" align="center"><input type="submit" value="{L_SUBMIT}" /></td>
	</tr>
</table></form>
