
<table width="98%" cellspacing="0" cellpadding="4" border="0" align="center">
	<tr>
		<td align="left" valign="bottom"><span class="gensmall"><a href="{U_INDEX}">{L_INDEX}</a></span></td>
		<td align="right"><span class="gensmall"><a href="{U_SEARCH_UNANSWERED}" class="gensmall">{L_SEARCH_UNANSWERED}</a>
		<!-- BEGIN switch_user_logged_in -->
		 :: <a href="{U_SEARCH_SELF}" class="gensmall">{L_SEARCH_SELF}</a>
		<!-- END switch_user_logged_in -->
		</span></td>
	</tr>
</table>

<table width="98%" cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
		<td class="tablebg"><table width="100%" cellpadding="4" cellspacing="1" border="0">
			<tr>
				<th height="25">&nbsp;</th>
				<th height="25">{L_FORUM}</th>
				<th height="25">{L_TOPICS}</th>
				<th height="25">{L_POSTS}</th>
				<th height="25">{L_LASTPOST}</th>
			</tr>
			<!-- BEGIN catrow -->
			<tr>
				<td class="cat" colspan="5" height="30"><span class="cattitle"><b><a class="forumlinks"  href="{catrow.U_VIEWCAT}">{catrow.CAT_DESC}</a></b>&nbsp;</span></td>
			</tr>
			<!-- BEGIN forumrow -->
			<tr>
				<td class="row1" align="center" valign="middle" width="7%">{catrow.forumrow.FOLDER}</td>
				<td class="row2"><span class="gen"><a class="forumlinks" href="{catrow.forumrow.U_VIEWFORUM}">{catrow.forumrow.FORUM_NAME}</a></span><br /><span class="gensmall">{catrow.forumrow.FORUM_DESC}<br /><i>{L_MODERATOR}: </i> {catrow.forumrow.MODERATORS}</span></td>
				<td class="row1" width="5%" align="center" valign="middle"><span class="gen">{catrow.forumrow.TOPICS}</span></td>
				<td class="row2" width="5%" align="center" valign="middle"><span class="gen">{catrow.forumrow.POSTS}</span></td>
				<td class="row1" width="15%" align="center" valign="middle" nowrap="nowrap"><span class="gensmall">{catrow.forumrow.LAST_POST}</span></td>
			</tr>
			<!-- END forumrow -->
			<!-- END catrow -->
			<tr>
				<td class="cat" colspan="5"><span class="cattitle"><b><a href="{U_PRIVATEMSGS}">{L_PRIVATEMSGS}</a></b></span></td>
			</tr>
			<tr>
				<td class="row1" width="7%" align="center" valign="middle"><img src="templates/Euclid/images/mailbox.gif" alt="{L_PRIVATEMSGS}" /></td>
				<td class="row2" colspan="4" align="left"><span class="gen">{PRIVATE_MESSAGE_INFO}. {PRIVATE_MESSAGE_INFO_UNREAD}</span></td>
			</tr>
			<tr>
				<td class="cat" colspan="5"><span class="cattitle"><b><a href="{U_VIEWONLINE}">{L_WHO_IS_ONLINE}</a></b></span></td>
			</tr>
			<tr>
				<td class="row1" width="7%" align="center" valign="middle"><img src="templates/Euclid/images/whosonline.gif" alt="{L_WHO_IS_ONLINE}" /></td>
				<td class="row2" colspan="4" align="left"><span class="gensmall">{TOTAL_USERS_ONLINE}</span><br /><span class="gen">{LOGGED_IN_USER_LIST}</span></td>
			</tr>
		</table></td>
	</tr>
</table>

<br clear="all" />

<table width="98%" cellspacing="2" border="0" align="center">
	<tr>
		<td align="left" valign="top"><table cellspacing="0" border="0">
			<tr>
				<td colspan="8"" valign="top"><span class="gensmall"><a href="{U_MARK_READ}">{L_MARK_FORUMS_READ}</a></span><br /><br /></td>
			</tr>
			<tr>
				<td width="20" align="center"><img src="{FORUM_NEW_IMG}" alt="{L_NEWPOSTS}" /></td>
				<td><span class="gensmall">{L_NEW_POSTS}</span></td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FORUM_IMG}" alt="{L_NONEWPOSTS}" /></td>
				<td><span class="gensmall">{L_NO_NEW_POSTS}</span></td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FORUM_LOCKED_IMG}" alt="{L_FORUM_LOCKED}" /></td>
				<td><span class="gensmall">{L_FORUM_LOCKED}</span></td>
			</tr>
		</table></td>
		<td align="right" valign="top"><span class="gensmall"><b>{S_TIMEZONE}</b></span></td>
	</tr>
</table>
