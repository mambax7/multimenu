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
                'IMAGE'        => 'Imagem',
                'ID'           => 'N°',
                'TITLE'        => 'Titulo',
                'ADMIN'        => 'Admin',
                'WEIGHT'       => 'Peso',
                'ONLINE'       => 'Conectado',
                'OFFLINE'      => 'Desconectado',
                'HIDDEN'       => 'Ocultar',
                'HIDE'         => 'Oculto',
                'OPTIONS'      => 'Opcões',
                'UPDATE'       => 'Atualizar',
                'NODATA'       => 'Não há dados para exibir !',
                'SITEMAP'      => 'Sitemap',
                'DESC'         => 'Descrição',
                'OFF'          => 'Desligado',
                'ON'           => 'Ligado',
                                                          
                'HELP'         => 'Ajuda',
                'INDEX'        => 'Index',
                'INDEXDSC'     => 'Módulo principal índice',
                'CREDIT'       => '%s é uma criação original de %s.',
                'QUERIES'      => 'Consultas',
                'MENU'         => 'Menus',
                'LINK'         => 'Links',
                'URL'          => 'Url',
                'QUERY'        => 'Consulta',
                'BLOCKS'       => 'Blocos',
                'IMAGES'       => 'Imagens',
                'SETTINGS'     => 'Configurações',
                'UTILS'        => 'Utilitários',
                'STATUS'       => 'Situação',
                'EDIT'         => 'Editar',
                'CLONE'        => 'Duplicata',
                'CANCEL'       => 'Cancelar',
                'SUBMIT'       => 'Enviar',
                'DELETE'       => 'Excluir',
                'OTHER'        => 'Outras:',
                'CSS'          => 'Folha Estilo',
                                                          
// Admin tab menus                                                          
                'MENUDSC'      => '1. Criar e administrar menus',
                'LINKDSC'      => '2. Criar e administrar links',
                'QUERYDSC'     => '3. Criar e administrar base de dados de consultas',
                'IMAGESDSC'    => '4. Administrar imagens',
                'TEMPLATESDSC' => '5. Administrar templates, CSS and script datas',
                'BLOCKSDSC'    => '6. Administrar blocos e as permissões do grupo',
                'SETTINGSDSC'  => '7. Administrar módulo configurações gerais',
                'UTILSDSC'     => '8. Utilidades de módulos',
                'HELPDSC'      => '9. Ajuda no uso de módulo',
                                                          
// SQL operations                                                          
                'INSERTED'     => 'Dados inseridos corretamente.',
                'UPDATED'      => 'Dados atualizados corretamente.',
                'CONFIRM'      => 'Você está seguro que quer apagar:',
                'DELETED'      => 'Dados apagados corretamente!',
                'SUREDELETE'   => 'Você está seguro que quer apagar este link?',
                'NOTUPDATED'   => 'Impossível atualizar banco de dados!',
                                                          
                                                          
// Images                                                          
                'RESIZE'       => 'Redimensione',
                'UPLOAD'       => 'Carregar',
                'NEWIMAGE'     => 'Carregar uma nova imagem',
                'SERVER_CONF'  => 'servidor configuração infos',
                'XOOPS_VERSION'=> 'XOOPS versão',
                'GRAPH_GD_LIB_VERSION' => 'GDLibrairie',
                                                          
                'GIF_SUPPORT'  => 'GIF suportado',
                'JPEG_SUPPORT' => 'JPG suportado',
                'PNG_SUPPORT'  => 'PNG suportado',
                                                          
                'NORMAL'       => 'Normal',
                'ROUNDED'      => 'Cantos arredondados',
                'BW'           => 'Negro & Branco',
                'SHADOW'       => 'Sombra',
                'GRAD'         => 'Gradiente',
                'INFO'         => 'Texto',
                'CHECK_ALL'    => 'Selecione tudo',
                                                          
                'THUMBGEN'     => 'Gerador de Thumb',
                'TEXT'         => 'Texto',
                'WIDTH'        => 'Largura',
                'HEIGHT'       => 'Altura',
                'BCKCOLOR'     => 'Cor de fundo',
                'DIR'          => 'Diretório',
                'UPLOADED'     => 'Arquivo corretamente carregado!',
                'NOTUPLOADED'  => 'Um erro ocorreu enquanto o arquivo carregado!',
                'NOT_CREATED'  => 'Diretório de arquivo não existe!',
                                                          
// Templates                                                          
                'TPL'          => 'Template',
                'SCRIPT'       => 'Script',
                'TEMPLATES'    => 'Templates',
                'TEMPLATE'     => 'Template',
                                                          
// Queries                                                          
                'NEW_QUERY'    => 'Criar um nova query no banco de dados',
                'EDIT_QUERY'   => 'Editar query',
                'TABLE'        => '[BD] Tabela',
                'QID'          => '[BD] ID campo',
                'QSUBJECT'     => '[BD] Submeta campo',
                'QDESCRIPTION' => '[BD] Alt campo',
                'QIMAGE'       => '[BD] Image campo',
                'QIMAGEURL'    => 'Image diretório',
                'QURL'         => 'Link URL<br />
                                   <font style="font-weight:normal;">{id} : ID valor</font>',
                                   
                                   
                'QWHERE'       => '[BD] Condições<br />
                                   <font style="font-weight:normal;">{date} : tempo atual</font>',
                'QORDER'       => '[BD] Dados mostra ordem',
                'QLIMIT'       => 'Número máximo de links para exibição',
                'TROUBLE'      => 'Erro',
                'NEXT'         => 'Proximo...',
                'TABLE_CHECK'  => 'Confira tabela',
                'FIELD'        => 'Campo',
                'NULL'         => 'Nulo',
                'KEY'          => 'Chave',
                'DEFAULT'      => 'Padrão',
                'EXTRA'        => 'Extra',
                'N'            => 'N°',
                'CLOSE'        => 'Fechar',
                                                          
 // Menus                                                          
                'NEW_MENU'     => 'Criar menu',
                'EDIT_MENU'    => 'Editar menu',
                'ALT_TITLE'    => 'Título alternativo',
                'IMAGEDIR'     => 'Imagem arquivo de diretório',
// Links                                                          
                'NEW_LINK'     => 'Criar link',
                'EDIT_LINK'    => 'Editar link',
                'TYPE'         => 'Tipo',
                'WAITING'      => 'Esperando...',
                'INFOS'        => 'Infos',
                'INFOBULLE'    => 'Aviso-Mouse',
                'IMAGEURL'     => 'Imagem distante',
                                                          
                'LINKIN'       => 'Página locais',
                'LINKOUT'      => 'Página distante',
                'PERMANENT'    => 'Permanente',
                'RELATIVE'     => 'Relativo',
                'LINK_PERM'    => 'Permanente',
                'LINK_REL'     => 'Relativo',
                'LINK_IN'      => 'Local',
                'LINK_OUT'     => 'Distante',
                                                          
                'TOP'          => 'Topo',
                'BOTTOM'       => 'Fundo',
                                                          
                'TARG_AUTO'    => 'Auto (detectar melhor configuração alvo)',
                '_SELF'        => 'Self (abrir na mesma janela)',
                '_BLANK'       => 'Blank (abrir em uma nova janela)',
                                                          
                'SELF'         => 'Abrir na mesma janela',
                'BLANK'        => 'Abrir em uma nova janela',
                                                          
                'LINKTO'       => 'Link para:',
                'NONE'         => 'Nenhum',
                                                          
// Help                                                          

                'MENUCSSH'     => 'Ajuda nos menus - folha de estilo',
                'LINKCSSH'     => 'Ajuda nos links - folha de estilo',
                'SAMPLE'       => 'Exemplo',
                'ARTICLE'      => 'Artigo',
                                                          
                'MAIN'         => 'Principal',
                'MAINDSC'      => 'Informações gerais sobre este módulo.',
                'SMARTY'       => 'Smarty variáveis',
                'SMARTYDSC'    => 'Smarty variáveis liste',
                'HELPS'        => 'Ajuda',
                'HELPSDSC'     => 'Ajuda sobre a utilização deste módulo',
                'TIPSDSC'      => 'Dicas e truques sobre este módulo.',
                'INTRODUCTION' => 'Intro',
                'KNOW'         => 'Você sabia?',
                'TIPS'         => 'Dicas',
                                                          
                'DEVELOPPERS'  => 'Programadores',
                'INFORMATIONS' => 'Informações',
                'DISCLAIMER'   => 'Aviso',
                'AUTHOR_WORD'  => 'Autor do texto',
                'VERSION_HISTORY' => 'Versão histórica',
                'LANGUAGE_DEFINE' => 'Definir línguagem ',
                'FIXES_ITEM'     => 'Variáveis gerais',
                'VARIABLES_ITEM' => 'Variáveis de link',
                                                          
// Utils                                                          
                'CLONEDSC'       => 'Utilidade de clone de módulo',
                'CLONE_NAME'     => 'Nome de clone<br /><i>
                                     <ul>
										 <li>Não mais de 16 caracters</li>
										 <li>Nenhum caracters especial</li>
										 <li>Nome de módulo já existente</li>
										 <li>Letras maiúsculas e espaços aceitos</li>
									 </ul></i>
									 Exemplo : \'Mon Módulo 01\'. ',
                'CLEAR'          => 'Apagar',
                                                          
                'NEW'            => 'Novo',
                'SUBMENU'        => 'Tipo',
                                                          
                'TARGET'         => 'Destino',
                'GROUPS'         => 'Grupos',
                'OPERATION'      => 'Operação',
                                                          
                'clonetrouble'   => 'O Clone foi criado no arquivo de "cache" (veja raiz de website).<br />
                                   Mova o Clone do "cache" para o diretório do "módulo" com seu cliente de FTP.<br />
                                   Mude atributos do Clone para 644.<br />
                                   <br />
                                   Depois instale seu clone similar em qualquer outro módulo.',
                 'module_exists' => 'Erro: Este módulo já existe! Mudar o nome do clone.',
                 'cloned'        => 'Módulo clonado com sucesso!',
                 'notcloned'     => 'Erro: Clone configurações estão erradas!',
                                                          
                 'import'        => 'Importação SQL',
                 'importdsc'     => 'Importar dados SQL diretamente no databade!',
                 'db_datas'      => 'Dados SQL',
                 'imported'      => 'Dados importados com sucesso!',
                 'notimported'   => 'Dados recusada!'
                 );
                                                          
// Render defines                                                          
                                                          
 	foreach ( $main_val_array as $item_lg=>$item_val ) {
                 define(strtoupper('_MD_MULTIMENU_'.$item_lg),$item_val);
	}
	                                                          
	                                                          
                                                          
?>
