#
# phpbb - MySQL schema
#
# $Id$
#

# --------------------------------------------------------
#
# Table structure for table `phpbb_attachments`
#
CREATE TABLE phpbb_attachments (
  attach_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL, 
  post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL, 
  privmsgs_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  user_id_from mediumint(8) NOT NULL,
  user_id_to mediumint(8) NOT NULL,
  KEY attach_id (attach_id)
); 


# --------------------------------------------------------
#
# Table structure for table `phpbb_attachments_desc`
#
CREATE TABLE phpbb_attach_desc (
  attach_id mediumint(8) UNSIGNED NOT NULL auto_increment,
  physical_filename varchar(255) NOT NULL,
  real_filename varchar(255) NOT NULL,
  download_count mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  comment varchar(255),
  extension varchar(100),
  mimetype varchar(100),
  filesize int(20) NOT NULL,
  filetime int(11) DEFAULT '0' NOT NULL,
  thumbnail tinyint(1) DEFAULT '0' NOT NULL,
  PRIMARY KEY (attach_id),
  KEY filetime (filetime),
  KEY physical_filename (physical_filename(10)),
  KEY filesize (filesize)
);


# --------------------------------------------------------
#
# Table structure for table `phpbb_auth_groups`
#
CREATE TABLE phpbb_auth_groups (
  group_id mediumint(8) unsigned NOT NULL default '0',
  forum_id mediumint(8) unsigned NOT NULL default '0',
  auth_option_id smallint(5) unsigned NOT NULL default '0',
  auth_setting tinyint(4) NOT NULL default '1',
  KEY group_id (group_id),
  KEY auth_option_id (auth_option_id)
);


# --------------------------------------------------------
#
# Table structure for table `phpbb_auth_options`
#
CREATE TABLE phpbb_auth_options (
  auth_option_id tinyint(4) NOT NULL auto_increment,
  auth_option char(20) NOT NULL,
  is_global tinyint(1) DEFAULT '0' NOT NULL,
  is_local tinyint(1) DEFAULT '0' NOT NULL,
  founder_only tinyint(1) DEFAULT '0' NOT NULL,
  PRIMARY KEY (auth_option_id),
  KEY auth_option (auth_option)
);


# --------------------------------------------------------
#
# Table structure for table phpbb_auth_presets
#
CREATE TABLE phpbb_auth_presets (
  preset_id tinyint(4) NOT NULL auto_increment, 
  preset_name varchar(50) DEFAULT '' NOT NULL, 
  preset_user_id mediumint(5) UNSIGNED DEFAULT '0' NOT NULL, 
  preset_type varchar(2) DEFAULT '' NOT NULL, 
  preset_data text DEFAULT '' NOT NULL,
  PRIMARY KEY (preset_id),
  KEY preset_type (preset_type)
);


# --------------------------------------------------------
#
# Table structure for table `phpbb_auth_users`
#
CREATE TABLE phpbb_auth_users (
  user_id mediumint(8) UNSIGNED NOT NULL default '0',
  forum_id mediumint(8) UNSIGNED NOT NULL default '0',
  auth_option_id smallint(5) UNSIGNED NOT NULL default '0',
  auth_setting tinyint(4) NOT NULL default '1',
  KEY user_id (user_id),
  KEY auth_option_id (auth_option_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_banlist'
#
CREATE TABLE phpbb_banlist (
   ban_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   ban_userid mediumint(8) UNSIGNED DEFAULT 0 NOT NULL,
   ban_ip varchar(40) DEFAULT '' NOT NULL,
   ban_email varchar(50) DEFAULT '' NOT NULL,
   ban_start int(11) DEFAULT '0' NOT NULL,
   ban_end int(11) DEFAULT '0' NOT NULL,
   ban_exclude tinyint(1) DEFAULT '0' NOT NULL, 
   ban_reason varchar(255) DEFAULT '' NOT NULL, 
   ban_give_reason varchar(255) DEFAULT '' NOT NULL, 
   PRIMARY KEY (ban_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_config'
#
CREATE TABLE phpbb_config (
    config_name varchar(255) NOT NULL,
    config_value varchar(255) NOT NULL,
    is_dynamic tinyint(1) DEFAULT '0' NOT NULL,
    PRIMARY KEY (config_name),
    KEY is_dynamic (is_dynamic)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_confirm'
#
CREATE TABLE phpbb_confirm (
  confirm_id char(32) DEFAULT '' NOT NULL,
  session_id char(32) DEFAULT '' NOT NULL,
  code char(6) DEFAULT '' NOT NULL, 
  time int(11) DEFAULT '0' NOT NULL, 
  PRIMARY KEY  (session_id,confirm_id),
  KEY time (time)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_disallow'
#
CREATE TABLE phpbb_disallow (
   disallow_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   disallow_username varchar(30) DEFAULT '' NOT NULL,
   PRIMARY KEY (disallow_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_extensions'
#
CREATE TABLE phpbb_extensions (
  extension_id mediumint(8) UNSIGNED NOT NULL auto_increment,
  group_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  extension varchar(100) DEFAULT '' NOT NULL,
  comment varchar(100) DEFAULT '' NOT NULL,
  PRIMARY KEY (extension_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_extension_groups'
#
CREATE TABLE phpbb_extension_groups (
  group_id mediumint(8) NOT NULL auto_increment,
  group_name char(20) NOT NULL,
  cat_id tinyint(2) DEFAULT '0' NOT NULL, 
  allow_group tinyint(1) DEFAULT '0' NOT NULL,
  download_mode tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
  upload_icon varchar(100) DEFAULT '' NOT NULL,
  max_filesize int(20) DEFAULT '0' NOT NULL,
  PRIMARY KEY (group_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_forbidden_extensions'
#
CREATE TABLE phpbb_forbidden_extensions (
  extension_id mediumint(8) UNSIGNED NOT NULL auto_increment, 
  extension varchar(100) NOT NULL, 
  PRIMARY KEY (extension_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_forums'
#
CREATE TABLE phpbb_forums (
   forum_id smallint(5) UNSIGNED NOT NULL auto_increment,
   parent_id smallint(5) UNSIGNED NOT NULL,
   left_id smallint(5) UNSIGNED NOT NULL,
   right_id smallint(5) UNSIGNED NOT NULL,
   forum_parents text,
   forum_name varchar(150) NOT NULL,
   forum_desc text,
   forum_link varchar(200) DEFAULT '' NOT NULL, 
   forum_password varchar(32) DEFAULT '' NOT NULL, 
   forum_style tinyint(4) UNSIGNED,
   forum_image varchar(50) DEFAULT '' NOT NULL,
   forum_topics_per_page tinyint(4) UNSIGNED DEFAULT '0' NOT NULL,
   forum_type tinyint(4) DEFAULT '0' NOT NULL,
   forum_status tinyint(4) DEFAULT '0' NOT NULL,
   forum_posts mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   forum_topics mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   forum_topics_real mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   forum_last_post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   forum_last_poster_id mediumint(8) DEFAULT '0' NOT NULL,
   forum_last_post_time int(11) DEFAULT '0' NOT NULL,
   forum_last_poster_name varchar(30),
   forum_flags tinyint(4) DEFAULT '0' NOT NULL, 
   display_on_index tinyint(1) DEFAULT '1' NOT NULL,
   enable_icons tinyint(1) DEFAULT '1' NOT NULL, 
   enable_prune tinyint(1) DEFAULT '0' NOT NULL, 
   prune_next int(11) UNSIGNED,
   prune_days tinyint(4) UNSIGNED NOT NULL,
   prune_freq tinyint(4) UNSIGNED DEFAULT '0' NOT NULL,
   PRIMARY KEY (forum_id),
   KEY left_id (left_id),
   KEY forum_last_post_id (forum_last_post_id)
);


# --------------------------------------------------------
#
# Table structure for table `phpbb_forum_access`
#
CREATE TABLE phpbb_forum_access (
  forum_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  session_id char(32) DEFAULT '' NOT NULL,
  PRIMARY KEY  (forum_id,user_id,session_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_forums_marking'
#
CREATE TABLE phpbb_forums_marking (
   user_id mediumint(9) UNSIGNED DEFAULT '0' NOT NULL,
   forum_id mediumint(9) UNSIGNED DEFAULT '0' NOT NULL,
   mark_time int(11) DEFAULT '0' NOT NULL,
   PRIMARY KEY (user_id, forum_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_forums_watch'
#
CREATE TABLE phpbb_forums_watch (
  forum_id smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  user_id mediumint(8) NOT NULL DEFAULT '0',
  notify_status tinyint(1) NOT NULL default '0',
  KEY forum_id (forum_id),
  KEY user_id (user_id),
  KEY notify_status (notify_status)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_groups'
#
CREATE TABLE phpbb_groups (
   group_id mediumint(8) NOT NULL auto_increment,
   group_type tinyint(4) DEFAULT '1' NOT NULL,
   group_name varchar(40) NOT NULL,
   group_display tinyint(1) DEFAULT '0' NOT NULL, 
   group_avatar varchar(100),
   group_avatar_type tinyint(4),
   group_rank int(11) DEFAULT '0',
   group_colour varchar(6) DEFAULT '' NOT NULL,
   group_description varchar(255) NOT NULL,
   PRIMARY KEY (group_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_groups_moderator'
#
CREATE TABLE phpbb_groups_moderator (
   group_id mediumint(8) NOT NULL,
   user_id mediumint(8) NOT NULL
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_icons'
#
CREATE TABLE phpbb_icons (
   icons_id tinyint(4) UNSIGNED NOT NULL auto_increment,
   icons_url varchar(50),
   icons_width tinyint(4) UNSIGNED NOT NULL,
   icons_height tinyint(4) UNSIGNED NOT NULL,
   icons_order tinyint(4) UNSIGNED NOT NULL,
   display_on_posting tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
   PRIMARY KEY (icons_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_lang'
#
CREATE TABLE phpbb_lang (
   lang_id tinyint(4) UNSIGNED NOT NULL auto_increment,
   lang_iso varchar(5) NOT NULL, 
   lang_dir varchar(30) NOT NULL, 
   lang_english_name varchar(30), 
   lang_local_name varchar(100), 
   lang_author varchar(100), 
   PRIMARY KEY (lang_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_log_moderator'
#
CREATE TABLE phpbb_log_moderator (
  log_id mediumint(5) UNSIGNED NOT NULL DEFAULT '0' auto_increment,
  user_id mediumint(8) NOT NULL DEFAULT '0',
  forum_id mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  topic_id mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  log_ip varchar(40) NOT NULL,
  log_time int(11) NOT NULL,
  log_operation text,
  log_data text,
  PRIMARY KEY (log_id),
  KEY forum_id (forum_id),
  KEY topic_id (topic_id),
  KEY user_id (user_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_log_admin'
#
CREATE TABLE phpbb_log_admin (
  log_id mediumint(5) UNSIGNED NOT NULL DEFAULT '0' auto_increment,
  user_id mediumint(8) NOT NULL DEFAULT '0',
  log_ip varchar(40) NOT NULL,
  log_time int(11) NOT NULL,
  log_operation text,
  log_data text,
  PRIMARY KEY (log_id),
  KEY user_id (user_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_moderator_cache'
#
CREATE TABLE phpbb_moderator_cache (
  forum_id mediumint(8) unsigned NOT NULL,
  user_id mediumint(8) unsigned default NULL,
  username char(30) default NULL,
  group_id mediumint(8) unsigned default NULL,
  groupname char(30) default NULL,
  display_on_index tinyint(4) NOT NULL default '1',
  KEY display_on_index (display_on_index),
  KEY forum_id (forum_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_vote_results'
#
CREATE TABLE phpbb_poll_results (
  poll_option_id tinyint(4) unsigned NOT NULL DEFAULT '0',
  topic_id mediumint(8) UNSIGNED NOT NULL,
  poll_option_text varchar(255) NOT NULL,
  poll_option_total mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  KEY poll_option_id (poll_option_id),
  KEY topic_id (topic_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_vote_voters'
#
CREATE TABLE phpbb_poll_voters (
  topic_id mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  poll_option_id tinyint(4) UNSIGNED NOT NULL DEFAULT '0',
  vote_user_id mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  vote_user_ip varchar(40) NOT NULL,
  KEY topic_id (topic_id),
  KEY vote_user_id (vote_user_id),
  KEY vote_user_ip (vote_user_ip)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_posts'
#
CREATE TABLE phpbb_posts (
   post_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   topic_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   forum_id smallint(5) UNSIGNED DEFAULT '0' NOT NULL,
   poster_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   icon_id tinyint(4) UNSIGNED DEFAULT '1' NOT NULL,
   poster_ip varchar(40) NOT NULL,
   post_time int(11) DEFAULT '0' NOT NULL,
   post_approved tinyint(1) DEFAULT '1' NOT NULL,
   post_reported tinyint(1) DEFAULT '0' NOT NULL,
   enable_bbcode tinyint(1) DEFAULT '1' NOT NULL,
   enable_html tinyint(1) DEFAULT '0' NOT NULL,
   enable_smilies tinyint(1) DEFAULT '1' NOT NULL,
   enable_magic_url tinyint(1) DEFAULT '1' NOT NULL,
   enable_sig tinyint(1) DEFAULT '1' NOT NULL,
   post_username varchar(30),
   post_subject varchar(60),
   post_text text,
   post_checksum varchar(32) NOT NULL,
   post_encoding varchar(11) DEFAULT 'iso-8859-15' NOT NULL, 
   post_attachment tinyint(1) DEFAULT '0' NOT NULL,
   bbcode_bitfield int(11) UNSIGNED DEFAULT '0' NOT NULL,
   bbcode_uid varchar(10) NOT NULL,
   post_edit_time int(11),
   post_edit_count smallint(5) UNSIGNED DEFAULT '0' NOT NULL,
   post_edit_locked tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
   PRIMARY KEY (post_id),
   KEY forum_id (forum_id),
   KEY topic_id (topic_id),
   KEY poster_ip (poster_ip),
   KEY poster_id (poster_id),
   KEY post_approved (post_approved)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_privmsgs'
#
CREATE TABLE phpbb_privmsgs (
   privmsgs_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   privmsgs_attachment tinyint(1) DEFAULT '0' NOT NULL,
   privmsgs_type tinyint(4) DEFAULT '0' NOT NULL,
   privmsgs_subject varchar(60) DEFAULT '0' NOT NULL,
   privmsgs_from_userid mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   privmsgs_to_userid mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   privmsgs_date int(11) DEFAULT '0' NOT NULL,
   privmsgs_ip varchar(40) NOT NULL,
   privmsgs_enable_bbcode tinyint(1) DEFAULT '1' NOT NULL,
   privmsgs_enable_html tinyint(1) DEFAULT '0' NOT NULL,
   privmsgs_enable_smilies tinyint(1) DEFAULT '1' NOT NULL,
   privmsgs_attach_sig tinyint(1) DEFAULT '1' NOT NULL,
   privmsgs_text text,
   privmsgs_bbcode_uid varchar(10) DEFAULT '0' NOT NULL,
   PRIMARY KEY (privmsgs_id),
   KEY privmsgs_from_userid (privmsgs_from_userid),
   KEY privmsgs_to_userid (privmsgs_to_userid)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_ranks'
#
CREATE TABLE phpbb_ranks (
   rank_id smallint(5) UNSIGNED NOT NULL auto_increment,
   rank_title varchar(50) NOT NULL,
   rank_min mediumint(8) DEFAULT '0' NOT NULL,
   rank_special tinyint(1) DEFAULT '0',
   rank_image varchar(100),
   rank_colour varchar(6),
   PRIMARY KEY (rank_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_ratings'
#
CREATE TABLE phpbb_ratings (
  post_id mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  user_id tinyint(4) UNSIGNED UNSIGNED NOT NULL DEFAULT '0',
  rating tinyint(4) NOT NULL,  
  PRIMARY KEY (post_id, user_id), 
  KEY user_id (user_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_reports_reasons'
#
CREATE TABLE phpbb_reports_reasons (
  reason_id smallint(6) NOT NULL auto_increment,
  reason_priority tinyint(4) NOT NULL default '0',
  reason_name varchar(255) NOT NULL default '',
  reason_description text NOT NULL,
  PRIMARY KEY  (reason_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_reports'
#
CREATE TABLE phpbb_reports (
  report_id smallint(5) unsigned NOT NULL auto_increment,
  reason_id smallint(5) unsigned NOT NULL default '0',
  post_id mediumint(8) unsigned NOT NULL default '0',
  user_id mediumint(8) unsigned NOT NULL default '0',
  user_notify tinyint(1) NOT NULL default '0',
  report_time int(10) unsigned NOT NULL default '0',
  report_text text NOT NULL,
  PRIMARY KEY  (report_id)
);


# --------------------------------------------------------
#
# Table structure for table `phpbb_search_results`
#
CREATE TABLE phpbb_search_results (
  search_id int(11) UNSIGNED NOT NULL default '0',
  session_id varchar(32) NOT NULL default '',
  search_array text NOT NULL,
  PRIMARY KEY  (search_id),
  KEY session_id (session_id)
);


# --------------------------------------------------------
#
# Table structure for table `phpbb_search_wordlist`
#
CREATE TABLE phpbb_search_wordlist (
  word_text varchar(50) binary NOT NULL default '',
  word_id mediumint(8) UNSIGNED NOT NULL auto_increment,
  word_common tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY (word_text),
  KEY word_id (word_id)
);


# --------------------------------------------------------
#
# Table structure for table `phpbb_search_wordmatch`
#
CREATE TABLE phpbb_search_wordmatch (
  post_id mediumint(8) UNSIGNED NOT NULL default '0',
  word_id mediumint(8) UNSIGNED NOT NULL default '0',
  title_match tinyint(1) NOT NULL default '0',
  KEY word_id (word_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_sessions'
#
CREATE TABLE phpbb_sessions (
   session_id varchar(32) DEFAULT '' NOT NULL,
   session_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   session_last_visit int(11) DEFAULT '0' NOT NULL,
   session_start int(11) DEFAULT '0' NOT NULL,
   session_time int(11) DEFAULT '0' NOT NULL,
   session_ip varchar(40) DEFAULT '0' NOT NULL,
   session_browser varchar(100) DEFAULT '' NULL,
   session_page varchar(100) DEFAULT '' NOT NULL,
   session_allow_viewonline tinyint(1) DEFAULT '1' NOT NULL, 
   PRIMARY KEY (session_id),
   KEY session_time (session_time)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_smilies'
#
CREATE TABLE phpbb_smilies (
   smile_id tinyint(4) UNSIGNED NOT NULL auto_increment,
   code char(10),
   emoticon char(50),
   smile_url char(50),
   smile_width tinyint(4) UNSIGNED NOT NULL,
   smile_height tinyint(4) UNSIGNED NOT NULL,
   smile_order tinyint(4) UNSIGNED NOT NULL,
   display_on_posting tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
   PRIMARY KEY (smile_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_styles'
#
CREATE TABLE phpbb_styles (
   style_id tinyint(4) UNSIGNED NOT NULL auto_increment,
   template_id char(50) NOT NULL,
   theme_id tinyint(4) UNSIGNED NOT NULL,
   imageset_id tinyint(4) UNSIGNED NOT NULL,
   style_name char(30) NOT NULL,
   PRIMARY KEY (style_id),
   KEY (template_id),
   KEY (theme_id),
   KEY (imageset_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_styles_template'
#
CREATE TABLE phpbb_styles_template (
   template_id tinyint(4) UNSIGNED NOT NULL auto_increment,
   template_name varchar(30) NOT NULL,
   template_path varchar(50) NOT NULL,
   poll_length smallint(5) UNSIGNED NOT NULL, 
   pm_box_length smallint(5) UNSIGNED NOT NULL, 
   PRIMARY KEY (template_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_styles_theme'
#
CREATE TABLE phpbb_styles_theme (
   theme_id tinyint(4) UNSIGNED NOT NULL auto_increment,
   theme_name varchar(60),
   css_external varchar(100),
   css_data text,
   PRIMARY KEY (theme_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_styles_imageset'
#
CREATE TABLE phpbb_styles_imageset (
  imageset_id tinyint(4) unsigned NOT NULL auto_increment,
  imageset_name varchar(100) default NULL,
  imageset_path varchar(30) default NULL,
  btn_post varchar(200) default NULL,
  btn_post_pm varchar(200) default NULL,
  btn_reply varchar(200) default NULL,
  btn_reply_pm varchar(200) default NULL,
  btn_locked varchar(200) default NULL,
  btn_profile varchar(200) default NULL,
  btn_pm varchar(200) default NULL,
  btn_delete varchar(200) default NULL,
  btn_ip varchar(200) default NULL,
  btn_quote varchar(200) default NULL,
  btn_search varchar(200) default NULL,
  btn_edit varchar(200) default NULL,
  btn_report varchar(200) default NULL,
  btn_email varchar(200) default NULL,
  btn_www varchar(200) default NULL,
  btn_icq varchar(200) default NULL,
  btn_aim varchar(200) default NULL,
  btn_yim varchar(200) default NULL,
  btn_msnm varchar(200) default NULL,
  btn_no_email varchar(200) default '',
  btn_no_www varchar(200) default '',
  btn_no_icq varchar(200) default '',
  btn_no_aim varchar(200) default '',
  btn_no_yim varchar(200) default '',
  btn_no_msnm varchar(200) default '',
  btn_online varchar(200) default '',
  btn_offline varchar(200) default '', 
  btn_topic_watch varchar(200) default NULL,
  btn_topic_unwatch varchar(200) default NULL,
  icon_unapproved varchar(200) NOT NULL default '',
  icon_reported varchar(200) NOT NULL default '',
  icon_attach varchar(200) default '', 
  icon_post varchar(200) default NULL,
  icon_post_new varchar(200) default NULL,
  icon_post_latest varchar(200) default NULL,
  icon_post_newest varchar(200) default NULL,
  forum varchar(200) default NULL,
  forum_new varchar(200) default NULL,
  forum_locked varchar(200) default NULL,
  sub_forum varchar(200) default NULL,
  sub_forum_new varchar(200) default NULL,
  folder varchar(200) default NULL,
  folder_posted varchar(200) NOT NULL default '',
  folder_new varchar(200) default NULL,
  folder_new_posted varchar(200) NOT NULL default '',
  folder_hot varchar(200) default NULL,
  folder_hot_posted varchar(200) NOT NULL default '',
  folder_hot_new varchar(200) default NULL,
  folder_hot_new_posted varchar(200) NOT NULL default '',
  folder_locked varchar(200) default NULL,
  folder_locked_posted varchar(200) NOT NULL default '',
  folder_locked_new varchar(200) default NULL,
  folder_locked_new_posted varchar(200) NOT NULL default '',
  folder_sticky varchar(200) default NULL,
  folder_sticky_posted varchar(200) NOT NULL default '',
  folder_sticky_new varchar(200) default NULL,
  folder_sticky_new_posted varchar(200) NOT NULL default '',
  folder_announce varchar(200) default NULL,
  folder_announce_posted  varchar(200) NOT NULL default '',
  folder_announce_new varchar(200) default NULL,
  folder_announce_new_posted varchar(200) NOT NULL default '',
  poll_left varchar(200) default NULL,
  poll_center varchar(200) default NULL,
  poll_right varchar(200) default NULL,
  PRIMARY KEY  (imageset_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_topics'
#
CREATE TABLE phpbb_topics (
   topic_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   forum_id smallint(8) UNSIGNED DEFAULT '0' NOT NULL,
   icon_id tinyint(4) UNSIGNED DEFAULT '1' NOT NULL,
   topic_attachment tinyint(1) DEFAULT '0' NOT NULL,
   topic_approved tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
   topic_reported tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
   topic_title varchar(60) NOT NULL,
   topic_poster mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   topic_time int(11) DEFAULT '0' NOT NULL,
   topic_rating tinyint(4) DEFAULT '0' NOT NULL,
   topic_views mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   topic_replies mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   topic_replies_real mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   topic_status tinyint(3) DEFAULT '0' NOT NULL,
   topic_type tinyint(3) DEFAULT '0' NOT NULL,
   topic_first_post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   topic_first_poster_name varchar(30),
   topic_last_post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   topic_last_poster_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   topic_last_poster_name varchar(30),
   topic_last_post_time int(11) DEFAULT '0' NOT NULL,
   topic_moved_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   poll_title varchar(255) NOT NULL,
   poll_start int(11) NOT NULL DEFAULT '0',
   poll_length int(11) NOT NULL DEFAULT '0', 
   poll_max_options tinyint(4) UNSIGNED NOT NULL DEFAULT '1', 
   poll_last_vote int(11),
   PRIMARY KEY (topic_id),
   KEY forum_id (forum_id),
   KEY topic_moved_id (topic_moved_id),
   KEY topic_last_post_time (topic_last_post_time),
   KEY poll_last_vote (poll_last_vote),
   KEY topic_type (topic_type)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_topic_marking'
#
CREATE TABLE phpbb_topics_marking (
   user_id mediumint(9) UNSIGNED DEFAULT '0' NOT NULL,
   topic_id mediumint(9) UNSIGNED DEFAULT '0' NOT NULL,
   mark_type tinyint(4) DEFAULT '0' NOT NULL,
   mark_time int(11) DEFAULT '0' NOT NULL,
   PRIMARY KEY (user_id, topic_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_topics_watch'
#
CREATE TABLE phpbb_topics_watch (
  topic_id mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  user_id mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  notify_status tinyint(1) NOT NULL default '0',
  KEY topic_id (topic_id),
  KEY user_id (user_id),
  KEY notify_status (notify_status)
);

# --------------------------------------------------------
#
# Table structure for table 'phpbb_ucp_modules'
#
CREATE TABLE phpbb_ucp_modules (
	module_id mediumint(8) DEFAULT '0' AUTO_INCREMENT NOT NULL,
	module_name varchar(50) NOT NULL,
	module_filename varchar(50) NOT NULL,
	module_order mediumint(4) DEFAULT '0' NOT NULL,
	KEY module_order (module_order),
	PRIMARY KEY (module_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_user_group'
#
CREATE TABLE phpbb_user_group (
   group_id mediumint(8) DEFAULT '0' NOT NULL,
   user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   user_pending tinyint(1),
   KEY group_id (group_id),
   KEY user_id (user_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_users'
#
CREATE TABLE phpbb_users (
   user_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   user_active tinyint(1) DEFAULT '1' NOT NULL,
   user_founder tinyint(1) DEFAULT '0' NOT NULL,
   group_id mediumint(8) DEFAULT '3' NOT NULL,
   user_permissions text DEFAULT '' NOT NULL,
   user_ip varchar(40) DEFAULT '' NOT NULL,
   user_regdate int(11) DEFAULT '0' NOT NULL,
   username varchar(30) DEFAULT '' NOT NULL,
   user_password varchar(32) DEFAULT '' NOT NULL,
   user_email varchar(60) DEFAULT '' NOT NULL,
   user_lastvisit int(11) DEFAULT '0' NOT NULL,
   user_lastpage varchar(100) DEFAULT '' NOT NULL,
   user_karma tinyint(1) DEFAULT '3' NOT NULL, 
   user_min_karma tinyint(1) DEFAULT '3' NOT NULL, 
   user_startpage varchar(100) DEFAULT '',
   user_colour varchar(6) DEFAULT '' NOT NULL,
   user_posts mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
   user_lang varchar(30) DEFAULT '' NOT NULL,
   user_timezone decimal(5,2) DEFAULT '0.0' NOT NULL,
   user_dst tinyint(1) DEFAULT '0' NOT NULL,
   user_dateformat varchar(15) DEFAULT 'd M Y H:i' NOT NULL,
   user_style tinyint(4) DEFAULT '0' NOT NULL,
   user_rank int(11) DEFAULT '0',
   user_new_privmsg smallint(5) UNSIGNED DEFAULT '0' NOT NULL,
   user_unread_privmsg smallint(5) UNSIGNED DEFAULT '0' NOT NULL,
   user_last_privmsg int(11) DEFAULT '0' NOT NULL,
   user_emailtime int(11) DEFAULT '0' NOT NULL,
   user_sortby_type varchar(1) DEFAULT 'l' NOT NULL,
   user_sortby_dir varchar(1) DEFAULT 'd' NOT NULL,
   user_show_days tinyint(1) DEFAULT '0' NOT NULL,
   user_viewemail tinyint(1) DEFAULT '1' NOT NULL,
   user_viewsigs tinyint(1) DEFAULT '1' NOT NULL,
   user_viewavatars tinyint(1) DEFAULT '1' NOT NULL,
   user_viewimg tinyint(1) DEFAULT '1' NOT NULL,
   user_attachsig tinyint(1) DEFAULT '1' NOT NULL,
   user_allowhtml tinyint(1) DEFAULT '1' NOT NULL,
   user_allowbbcode tinyint(1) DEFAULT '1' NOT NULL,
   user_allowsmile tinyint(1) DEFAULT '1' NOT NULL,
   user_allowavatar tinyint(1) DEFAULT '1' NOT NULL,
   user_allow_pm tinyint(1) DEFAULT '1' NOT NULL,
   user_allow_email tinyint(1) DEFAULT '1' NOT NULL,
   user_allow_viewonline tinyint(1) DEFAULT '1' NOT NULL,
   user_notify tinyint(1) DEFAULT '1' NOT NULL,
   user_notify_pm tinyint(1) DEFAULT '1' NOT NULL,
   user_popup_pm tinyint(1) DEFAULT '0' NOT NULL,
   user_avatar varchar(100) DEFAULT '' NOT NULL,
   user_avatar_type tinyint(4) DEFAULT '0' NOT NULL,
   user_avatar_width tinyint(4) UNSIGNED DEFAULT '0' NOT NULL,
   user_avatar_height tinyint(4) UNSIGNED DEFAULT '0' NOT NULL,
   user_sig text DEFAULT '' NOT NULL,
   user_sig_bbcode_uid varchar(10) DEFAULT '' NOT NULL,
   user_sig_bbcode_bitfield int(11) DEFAULT '0' NOT NULL,
   user_from varchar(100) DEFAULT '' NOT NULL,
   user_icq varchar(15) DEFAULT '' NOT NULL,
   user_aim varchar(255) DEFAULT '' NOT NULL,
   user_yim varchar(255) DEFAULT '' NOT NULL,
   user_msnm varchar(255) DEFAULT '' NOT NULL,
   user_website varchar(100) DEFAULT '' NOT NULL,
   user_actkey varchar(32) DEFAULT '' NOT NULL,
   user_newpasswd varchar(32) DEFAULT '' NOT NULL,
   user_occ varchar(100) DEFAULT '' NOT NULL,
   user_interests varchar(255) DEFAULT '' NOT NULL,
   PRIMARY KEY (user_id)
);


# --------------------------------------------------------
#
# Table structure for table 'phpbb_words'
#
CREATE TABLE phpbb_words (
   word_id mediumint(8) UNSIGNED NOT NULL auto_increment,
   word char(100) NOT NULL,
   replacement char(100) NOT NULL,
   PRIMARY KEY (word_id)
);
