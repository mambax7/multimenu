CREATE TABLE multimenu_menu (
   catid 	  int(8) 	NOT NULL auto_increment,
   status 	  tinyint(1) 	unsigned default '0',

   title	  varchar(255)  default NULL,
   description	  varchar(255)  default NULL,
   template	  varchar(255) 	default NULL,
   image_dir	  varchar(255) 	default NULL,
   image	  varchar(255)  default NULL,
   groups 	  varchar(255) 	default NULL,

   css 	  	  text,
 
   PRIMARY KEY (catid)
);

CREATE TABLE multimenu_link (
   id 		  int(8) 	NOT NULL auto_increment,
   pid		  int(8) 	NOT NULL default 0,
   catid	  int(8) 	NOT NULL default 0,
   type		  varchar(255) 	default NULL,
   relative	  varchar(255)  default NULL,

   status 	  tinyint(1) 	unsigned default '0',
   weight 	  int(5) 	unsigned default '0',

   title	  varchar(255)  default NULL,
   alt_title	  varchar(255)  default NULL,
   link		  varchar(255)  default NULL,
   query	  varchar(255)  default NULL,
   target	  varchar(255)  default NULL,

   image	  varchar(255)  default NULL,
   groups 	  varchar(255) 	default NULL,

   css 	  	  text,

   PRIMARY KEY (id)
);

CREATE TABLE multimenu_query (
   id 	  	  int(8) 	NOT NULL auto_increment,
   title	  varchar(255)  default NULL,

   qtable	  varchar(255)  default NULL,
   qid	  	  varchar(255)  default NULL,
   qsubject	  varchar(255)  default NULL,
   qdescription	  varchar(255)  default NULL,
   qimage	  varchar(255)  default NULL,

   qurl	  	  varchar(255) 	default NULL,
   qimageurl	  varchar(255) 	default NULL,
   qwhere	  varchar(255) 	default NULL,
   qorder	  varchar(255) 	default NULL,
   qlimit	  varchar(255) 	default NULL,

   PRIMARY KEY (id)
);




INSERT INTO multimenu_link VALUES ( 1, 0, 1, 'permanent', '', 1, 10, 'Accueil', 'Page d\'accueil du site', '.', '', '_self', '|', '1 2 3', '');
INSERT INTO multimenu_link VALUES ( 2, 0, 1, 'permanent', '', 1, 20, 'News', '', 'modules/news/', '', '_self', '|', '1 2 3', '');
INSERT INTO multimenu_link VALUES ( 3, 2, 1, 'relative',  '', 1, 22, 'Submit', '', 'modules/news/submit.php', '', '_self', '|', '1 2', '');
INSERT INTO multimenu_link VALUES ( 4, 2, 1, 'relative',  '', 1, 23, 'Archives', '', 'modules/news/archives.php', '', '_self', '|', '1 2 3', '');
INSERT INTO multimenu_link VALUES ( 5, 1, 1, 'permanent', '', 1, 12, 'Plan du site', '', 'modules/multimenu/', '', '_self', '|', '1 2 3', '');
INSERT INTO multimenu_link VALUES ( 6, 0, 1, 'permanent', '', 1, 40, 'Edito', '', 'modules/edito/', '1', '_self', '|', '1 2 3', '');
INSERT INTO multimenu_link VALUES ( 7, 2, 1, 'relative',  '', 1, 21, 'Admin', '', 'modules/news/admin/', '', '_self', '|', '1', '');
INSERT INTO multimenu_link VALUES ( 8, 6, 1, 'relative',  '', 1, 42, 'Submit', '', 'modules/edito/submit.php', '', '_self', '|', '1 2', '');
INSERT INTO multimenu_link VALUES ( 9, 6, 1, 'relative',  '', 1, 41, 'Admin', '', 'modules/edito/admin/', '', '_self', '|', '1', '');
INSERT INTO multimenu_link VALUES (10, 0, 3, 'permanent', '', 1,  0, 'Administration', '', 'admin.php', '', '_self', '|', '1', '');
INSERT INTO multimenu_link VALUES (11, 0, 2, 'permanent', '', 1,  5, 'Voir son compte', '', 'user.php', '', '_self', '|', '1 2', '');
INSERT INTO multimenu_link VALUES (12, 0, 2, 'permanent', '', 1, 10, 'Editer son compte', '', 'edituser.php', '', '_self', '|', '1 2', '');
INSERT INTO multimenu_link VALUES (13, 0, 2, 'permanent', '', 1, 15, 'Notification', '', 'notifications.php', '', '_self', '|', '1 2', '');
INSERT INTO multimenu_link VALUES (14, 0, 2, 'permanent', '', 1, 20, 'Messages non-lus #', '', 'viewpmsg.php', '2', '_self', '|', '1 2', '');
INSERT INTO multimenu_link VALUES (15, 0, 2, 'permanent', '', 1, 25, 'Deconnexion', '', 'user.php?op=logout', '', '_self', '|', '1 2', '');



INSERT INTO multimenu_menu VALUES (1, 1, 'Menu Principal', 'Voici le menu principal de ce site.', 'multimenu_ul.html', 'uploads/multimenu/main/', '|', '1 2 3', '');
INSERT INTO multimenu_menu VALUES (2, 1, 'Menu Utilisateur', 'Voici le menu utilisateur.', 'multimenu_ul.html', 'uploads/multimenu/user/', '|', '1 2', '');
INSERT INTO multimenu_menu VALUES (3, 1, 'Menu Admin', 'Voici le menu admin.', 'multimenu_ul.html', 'uploads/multimenu/admin/', '|', '1', '');

 

INSERT INTO multimenu_query VALUES (1, 'Edito', 'content_edito', 'id', 'subject', 'block_text', 'image', 'modules/edito/content.php?id={id}', 'uploads/edito/images/', 'status>=1', 'subject ASC', '10');
INSERT INTO multimenu_query VALUES (2, 'Messages prives', 'priv_msgs', 'msg_id', 'subject', 'msg_text', '', 'readpmsg.php?start=0&total_messages=', '', 'to_userid={uid} AND read_msg=0', 'msg_time DESC', '10');
INSERT INTO multimenu_query VALUES (3, 'Modules admin', 'modules', 'dirname', 'name', 'version', '', 'modules/{id}/admin/', '', 'weight>0 AND isactive=1 AND hasadmin=1', 'weight ASC', '0');
INSERT INTO multimenu_query VALUES (4, 'Last user', 'users', 'uid', 'uname', 'name', 'user_avatar', 'userinfo.php?uid=', 'uploads/', 'user_mailok=""', 'last_login DESC', '10');
INSERT INTO multimenu_query VALUES (5, 'User online', 'online', 'online_uid', 'online_uname', 'online_module', '', 'modules/edito/content.php?id=', '', '', 'online_uname ASC', '10');
