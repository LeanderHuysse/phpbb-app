<?php
/** 
*
* acp_permissions [English]
*
* @package language
* @version $Id$
* @copyright (c) 2005 phpBB Group 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE 
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACL_NO'				=> 'No',
	'ACL_SET'				=> 'Setting Permissions',
	'ACL_SET_EXPLAIN'		=> 'Permissions are based on a simple YES/NO system. Setting an option to NO for a user or usergroup overrides any other value assigned to it. If you do not wish to assign a value for an option for this user or group select UNSET. If values are assigned for this option elsewhere they will be used in preference, else NO is assumed. All objects marked (with the checkbox in front of them) will inherit the permission set you defined.',
	'ACL_SETTING'			=> 'Setting',

	'ACL_TYPE_A_'			=> 'Administrative Permissions',
	'ACL_TYPE_F_'			=> 'Forum Permissions',
	'ACL_TYPE_M_'			=> 'Moderative Permissions',
	'ACL_TYPE_U_'			=> 'User Permissions',

	'ACL_TYPE_GLOBAL_A_'	=> 'Administrative Permissions',
	'ACL_TYPE_GLOBAL_U_'	=> 'User Permissions',
	'ACL_TYPE_GLOBAL_M_'	=> 'Global Moderator Permissions',
	'ACL_TYPE_LOCAL_M_'		=> 'Forum Moderator Permissions',
	'ACL_TYPE_LOCAL_F_'		=> 'Forum Permissions',
	
	'ACL_UNSET'				=> 'Unset',
	'ACL_VIEW'				=> 'Viewing Permissions',
	'ACL_VIEW_EXPLAIN'		=> 'Here you can see the effective permissions the user/group is having. A red square indicates that the user/group does not have the permission, a green square indicates that the user/group does have the permission.',
	'ACL_YES'				=> 'Yes',

	'ACP_ADMINISTRATORS_EXPLAIN'				=> 'Here you can assign administrator rights to users or groups. All users with admin permissions can view the administration panel.',
	'ACP_FORUM_MODERATORS_EXPLAIN'				=> 'Here you can assign users and groups as forum moderators. To assign users access to forums, to define global moderative rights or administrators please use the appropriate page.',
	'ACP_FORUM_PERMISSIONS_EXPLAIN'				=> 'Here you can alter which users and groups can access which forums. To assign moderators or define administrators please use the appropriate page.',
	'ACP_GLOBAL_MODERATORS_EXPLAIN'				=> 'Here you can assign global moderator rights to users or groups. These moderators are like ordinary moderators except they have access to every forum on your board.',
	'ACP_GROUPS_FORUM_PERMISSIONS_EXPLAIN'		=> 'Here you can assign forum permissions to groups.',
	'ACP_GROUPS_PERMISSIONS_EXPLAIN'			=> 'Here you can assign global permissions to groups - user permissions, global moderator permissions and admin permissions. User permissions include capabilities such as the use of avatars, sending private messages, etc. Global moderator permissions are blabla, administrative permissions blabla. Individual users permissions should only be changed in rare occassions, the preferred method is putting users in groups and assigning the groups permissions.',
	'ACP_PRESET_ADMIN_EXPLAIN'					=> 'Here you are able to manage the presets for administrative permissions. Presets are effective permissions, if you change a preset the items having this preset assigned will change it\'s permissions too.',
	'ACP_PRESET_FORUM_EXPLAIN'					=> 'Here you are able to manage the presets for forum permissions. Presets are effective permissions, if you change a preset the items having this preset assigned will change it\'s permissions too.',
	'ACP_PRESET_MOD_EXPLAIN'					=> 'Here you are able to manage the presets for moderative permissions. Presets are effective permissions, if you change a preset the items having this preset assigned will change it\'s permissions too.',
	'ACP_PRESET_USER_EXPLAIN'					=> 'Here you are able to manage the presets for user permissions. Presets are effective permissions, if you change a preset the items having this preset assigned will change it\'s permissions too.',
	'ACP_USERS_FORUM_PERMISSIONS_EXPLAIN'		=> 'Here you can assign forum permissions to users.',
	'ACP_USERS_PERMISSIONS_EXPLAIN'				=> 'Here you can assign global permissions to users - user permissions, global moderator permissions and admin permissions. User permissions include capabilities such as the use of avatars, sending private messages, etc. Global moderator permissions are blabla, administrative permissions blabla. To alter these settings for large numbers of users the Group permissions system is the prefered method. Users permissions should only be changed in rare occassions, the preferred method is putting users in groups and assigning the groups permissions.',
	'ACP_VIEW_ADMIN_PERMISSIONS_EXPLAIN'		=> 'Here you can view the effective administrative permissions assigned to the selected users/groups',
	'ACP_VIEW_GLOBAL_MOD_PERMISSIONS_EXPLAIN'	=> 'Here you can view the global moderative permissions assigned to the selected users/groups',
	'ACP_VIEW_FORUM_PERMISSIONS_EXPLAIN'		=> 'Here you can view the forum permissions assigned to the selected users/groups and forums',
	'ACP_VIEW_FORUM_MOD_PERMISSIONS_EXPLAIN'	=> 'Here you can view the forum moderator permissions assigned to the selected users/groups and forums',
	'ACP_VIEW_USER_PERMISSIONS_EXPLAIN'			=> 'Here you can view the effective user permissions assigned to the selected users/groups',

	'ADD_GROUPS'				=> 'Add Groups',
	'ADD_USERS'					=> 'Add Users',
	'ALL_NO'					=> 'All No',
	'ALL_UNSET'					=> 'All Unset',
	'ALL_YES'					=> 'All Yes',
	'APPLY_ALL_PERMISSIONS'		=> 'Apply all Permissions',
	'APPLY_PERMISSIONS'			=> 'Apply Permissions',
	'APPLY_PERMISSIONS_EXPLAIN'	=> 'The Permissions and Preset defined for this item will only be applied to this item and all checked items.',
	'AUTH_UPDATED'				=> 'Permissions have been updated',

	'CREATE_PRESET'				=> 'Create Preset',
	'CREATE_PRESET_FROM'		=> 'Use settings from...',
	
	'EDIT_PRESET'				=> 'Edit Preset',
	'EVERY_USER_GROUP'			=> 'Every user/group',

	'GROUP_BINDING'				=> 'Group Binding',
	'GROUP_BINDING_EXPLAIN'		=> 'If a group is selected here the preset only shows up for the selected group. This is helpful if you set options only meant for administrators for example.',

	'LOOK_UP_FORUMS_EXPLAIN'	=> 'You are able to select more than one forum',
	'LOOK_UP_GROUP'				=> 'Look up Usergroup',
	'LOOK_UP_USER'				=> 'Look up User',

	'MANAGE_GROUPS'		=> 'Manage Groups',
	'MANAGE_USERS'		=> 'Manage Users',

	'NO_AUTH_SETTING_FOUND'		=> 'Permission settings not defined.',
	'NO_PRESET_NAME_SPECIFIED'	=> 'Please give the preset a name.',
	'NO_PRESET_SELECTED'		=> 'Preset could not be found.',

	'ONLY_FORUM_DEFINED'	=> 'You only defined forums in your selection. Please also select at least one user or one group.',

	'PERM_PRESET_APPLIED_TO_ALL'	=> 'Permissions and Preset will also be applied to all checked objects',
	'PRESET'						=> 'Preset',
	'PRESET_ADD_SUCCESS'			=> 'Preset successfully added.',
	'PRESET_DETAILS'				=> 'Preset Details',
	'PRESET_EDIT_SUCCESS'			=> 'Preset successfully edited.',
	'PRESET_NAME'					=> 'Preset Name',
	'PRESET_NAME_ALREADY_EXIST'		=> 'A preset named <strong>%s</strong> already exist for the specified settings.',

	'SELECTED_FORUM_NOT_EXIST'		=> 'The selected forum(s) do not exist',
	'SELECTED_GROUP_NOT_EXIST'		=> 'The selected group(s) do not exist',
	'SELECTED_USER_NOT_EXIST'		=> 'The selected user(s) do not exist',
	'SELECT_TYPE'					=> 'Select type',
	'SET_PERMISSIONS'				=> 'Set permissions',
	'SET_USERS_PERMISSIONS'			=> 'Set users permissions',
	'SET_USERS_FORUM_PERMISSIONS'	=> 'Set users forum permissions',

	'USER_IS_MEMBER_OF_DEFAULT'		=> 'is a member of the following default groups',
	'USER_IS_MEMBER_OF_CUSTOM'		=> 'is a member of the following custom groups',

	'VIEW_PERMISSIONS'		=> 'View permissions',

	'WRONG_PERMISSION_TYPE'	=> 'Wrong permission type selected',
));

?>