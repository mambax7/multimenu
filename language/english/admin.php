<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: multiMenu 2.x
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/
// 2.x

// Common values
$main_val_array =  array( 
// commons
                'IMAGE'        => 'Image',
                'ID'           => 'N°',
                'TITLE'        => 'Title',
                'ADMIN'        => 'Admin',
                'WEIGHT'       => 'Weight',
                'ONLINE'       => 'Online',
                'OFFLINE'      => 'Offline',
                'HIDDEN'       => 'Hidden',
                'HIDE'         => 'Hide',
                'OPTIONS'      => 'Options',
                'UPDATE'       => 'Update',
                'NODATA'       => 'No data to display !',
                'SITEMAP'      => 'Sitemap',
                'DESC'         => 'Description',
                'OFF'          => 'Off',
                'ON'           => 'On',

                'HELP'         => 'Help',
                'INDEX'        => 'Index',
                'INDEXDSC'     => 'Module main index',
                'CREDIT'       => '%s is an original creation of %s.',
                'QUERIES'      => 'Queries',
                'MENU'         => 'Menus',
                'LINK'         => 'Links',
                'URL'          => 'Url',
                'QUERY'        => 'Query',
                'BLOCKS'       => 'Blocks/Permissions',
                'IMAGES'       => 'Images',
                'SETTINGS'     => 'Settings',
                'UTILS'        => 'Utilities',
                'STATUS'       => 'Status',
                'EDIT'         => 'Edit',
                'CLONE'        => 'Duplicate',
                'CANCEL'       => 'Cancel',
                'SUBMIT'       => 'Submit',
                'DELETE'       => 'Delete',
                'OTHER'        => 'Other:',
                'CSS'          => 'Style Sheet',

// Admin tab menus
                'MENUDSC'      => '1. Create and manage menus',
                'LINKDSC'      => '2. Create and manage links',
                'QUERYDSC'     => '3. Create and manage data base queries',
                'IMAGESDSC'    => '4. Manage pictures',
                'TEMPLATESDSC' => '5. Manage templates, CSS and script datas',
                'BLOCKSDSC'    => '6. Manage blocs and group permissions',
                'SETTINGSDSC'  => '7. Manage module general settings',
                'UTILSDSC'     => '8. Modules utilities',
                'HELPDSC'      => '9. Help on the module use',

// SQL operations
                'INSERTED'     => 'Data successfully inserted.',
                'UPDATED'      => 'Data successfully updated.',
                'CONFIRM'      => 'Are you sure you want to delete:',
                'DELETED'      => 'Data successfully deleted!',
                'SUREDELETE'   => 'Are you sure you want to delete this link?',
                'NOTUPDATED'   => 'Impossible to update database!',


// Images
                'RESIZE'       => 'Resize',
                'UPLOAD'       => 'Upload',
                'NEWIMAGE'     => 'Upload a new picture',
                'SERVER_CONF'  => 'Server configuration infos',
                'XOOPS_VERSION'=> 'XOOPS version',
                'GRAPH_GD_LIB_VERSION' => 'GDLibrairie',

                'GIF_SUPPORT'  => 'GIF supported',
                'JPEG_SUPPORT' => 'JPG supported',
                'PNG_SUPPORT'  => 'PNG supported',

                'NORMAL'       => 'Normal',
                'ROUNDED'      => 'Rounded corners',
                'BW'           => 'Black & White',
                'SHADOW'       => 'Shadow',
                'GRAD'         => 'Gradient',
                'INFO'         => 'Text',
                'CHECK_ALL'    => 'Select all',

                'THUMBGEN'     => 'Thumb generator',
                'TEXT'         => 'Text',
                'WIDTH'        => 'Width',
                'HEIGHT'       => 'Height',
                'BCKCOLOR'     => 'Background color',
                'DIR'          => 'Directory',
                'UPLOADED'     => 'File successfully uploaded!',
                'NOTUPLOADED'  => 'An error occured while uploading file!',
                'NOT_CREATED'  => 'File directory does not exist!',

// Templates
                'TPL'          => 'Template',
                'SCRIPT'       => 'Script',
                'TEMPLATES'    => 'Templates',
                'TEMPLATE'     => 'Template',

// Queries
                'NEW_QUERY'    => 'Create a new database query',
                'EDIT_QUERY'   => 'Edit a query',
                'TABLE'        => '[BD] Table',
                'QID'          => '[BD] ID field',
                'QSUBJECT'     => '[BD] Subject field',
                'QDESCRIPTION' => '[BD] Alt field',
                'QIMAGE'       => '[BD] Image field',
                'QIMAGEURL'    => 'Image directory',
                'QURL'         => 'Link URL<br />
<font style="font-weight:normal;">{id}: ID value<br />
{urw}: url rewriting<br />
{alt}: ALT value</font>',
                'QWHERE'       => '[BD] Conditions<br />
<font style="font-weight:normal;">{date} : current time</font>',
                'QORDER'       => '[BD] Data display order',
                'QLIMIT'       => 'Maximum number of link to display',
                'TROUBLE'      => 'Error',
                'NEXT'         => 'Next...',
                'TABLE_CHECK'  => 'Check table',
                'FIELD'        => 'Field',
                'NULL'         => 'Null',
                'KEY'          => 'Key',
                'DEFAULT'      => 'Default',
                'EXTRA'        => 'Extra',
                'N'            => 'N°',
                'CLOSE'        => 'Close',

 // Menus
                'NEW_MENU'     => 'Creat menu',
                'EDIT_MENU'    => 'Edit menu',
                'ALT_TITLE'    => 'Alternative title',
                'IMAGEDIR'     => 'Image file directory',
// Links
                'NEW_LINK'     => 'Creat link',
                'EDIT_LINK'    => 'Edit link',
                'TYPE'         => 'Type',
                'WAITING'      => 'Waiting...',
                'INFOS'        => 'Infos',
                'INFOBULLE'    => 'Tooltip',
                'IMAGEURL'     => 'Distant picture',

                'LINKIN'       => 'Local page',
                'LINKOUT'      => 'Distant page',
                'PERMANENT'    => 'Permanent',
                'RELATIVE'     => 'Relative',
                'LINK_PERM'    => 'Permanent',
                'LINK_REL'     => 'Relative',
                'LINK_IN'      => 'Local',
                'LINK_OUT'     => 'Distant',

                'TOP'          => 'Top',
                'BOTTOM'       => 'Bottom',

                'TARG_AUTO'    => 'Auto (detect best target configuration)',
                '_SELF'        => 'Self (open in same window)',
                '_BLANK'       => 'Blank (open in a new window)',

                'SELF'         => 'Open in same window',
                'BLANK'        => 'Open in a new window',

                'LINKTO'       => 'Link to:',
                'NONE'         => 'None',

// Help

                'MENUCSSH'     => 'Help on menus\'s style sheet',
                'LINKCSSH'     => 'Help on links\' style sheet',
                'SAMPLE'       => 'Samples',
                'ARTICLE'      => 'Article',

                'MAIN'         => 'Main',
                'MAINDSC'      => 'General informations about this module.',
                'SMARTY'       => 'Smarty variables',
                'SMARTYDSC'    => 'Smarty variables liste',
                'HELPS'        => 'Help',
                'HELPSDSC'     => 'Help on this module\'s use',
                'TIPSDSC'      => 'Tips and tricks about this module.',
                'INTRODUCTION' => 'Intro',
                'KNOW'         => 'Did you know?',
                'TIPS'         => 'Tips',

                'DEVELOPPERS'  => 'Developpers',
                'INFORMATIONS' => 'Informations',
                'DISCLAIMER'   => 'Warning',
                'AUTHOR_WORD'  => 'Author\'s word',
                'VERSION_HISTORY' => 'Version historic',
                'LANGUAGE_DEFINE' => 'Language define',
                'FIXES_ITEM'   => 'General variables',
                'VARIABLES_ITEM' => 'Links variables',

// Utils
                'CLONEDSC'     => 'Module clone utility',
                'CLONE_NAME'   => 'Clone name<br /><i>
                                         <ul>
                                             <li>Not more than 16 caracters</li>
                                             <li>No special caracters</li>
                                             <li>No already existing module name</li>
                                             <li>Capital letters and spaces accepted</li>
                                         </ul></i>
                                         Sample : \'Mon Module 01\'. ',
                'CLEAR'        => 'Clear',

                'NEW'          => 'New',
                'SUBMENU'      => 'Type',

                'TARGET'       => 'Target',
                'GROUPS'       => 'Groups',
                'OPERATION'    => 'Operation',

                'clone_trouble' => 'Clone has been created in the "cache" file (see website root).<br />
                                   Move you clone from "cache" to "module" directory with your FTP client.<br />
                                   Change clone attributs in 644.<br />
                                   <br />
                                   Next install your clone alike any other module.',
                 'module_exists' => 'Error: this module already exists! Change clone name.',
                 'cloned'      => 'Module successfully cloned!',
                 'notcloned'   => 'Error: Clone settings are wrong!',

                 'import'      => 'Import SQL',
                 'importdsc'     => 'Import SQL datas directly in databade!',
                 'db_datas'      => 'SQL datas',
                 'imported'      => 'Data successfully imported!',
                 'notimported'   => 'Data refused!'
                 );

// Render defines

 	foreach ( $main_val_array as $item_lg=>$item_val ) {
                 define(strtoupper('_MD_MULTIMENU_'.$item_lg),$item_val);
	}
	
	

?>