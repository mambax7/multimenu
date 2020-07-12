<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System    		             //
//                    Copyright (c) 2004 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//                   						                                 //
//                  Authors :						                         //
//						- solo (www.wolfpackclan.com)                        //
//                  Multimenu v1.0						                     //
//  ------------------------------------------------------------------------ //

// Common values
 	$com_val_array =  array( 'name'          => 'Multimenu',
  	                         'dsc'           => 'Menu e navegação que administram módulo',
  	                         'clone'         => 'Duplicata',
  	                         'submit'        => 'Enviar',
  	                         'menu'          => 'Menu',
  	                         'link'          => 'Link',
  	                         'query'         => 'Query',
  	                         'block'         => 'Blocos',
  	                         'utils'         => 'Utilidades',
  	                         
  	                         'index'         => 'Index',
  	                         'sitemap'       => 'Sitemap',
  	                         'edit'          => 'Editar',
  	                         'help'          => 'Ajuda',
  	                         'settings'      => 'Configurações',
  	                         'item'          => 'Item',
  	                         'meta'          => 'Meta',
  	                         'slideshow'     => 'Apresentação de slides',
  	                         
  	                         'indexdsc'      => 'Módulo index páginas configurações (lado de Usuário).',
  	                         'editdsc'       => 'Módulo edição páginas configurações (lado de Admin).',
  	                         'helpdsc'       => 'Ajude em módulo',
  	                         'settingsdsc'   => 'Módulo geral lista de configurações',
  	                         'itemdsc'       => 'Módulo configurações de itens.',
  	                         'metadsc'       => 'Módulo configurações de meta.',
  	                         'slideshowdsc'  => 'Slide configurações.',
  	                         
  	                         'index_dsc'     => 'Volte para módulo página de index (lado de Usuário).',
  	                         'menu_dsc'      => 'Adicione, apague, duplique, edite um menu.',
  	                         'link_dsc'      => 'Adicione, apague, duplique, edite um link.',
  	                         'query_dsc'     => 'Adicione, apague, duplique, edite uma query de banco de dados.',
  	                         'image_dsc'     => 'Adicione, apague, edite uma imagem.',
  	                         'template_dsc'  => 'Personalize template, folha de style e script.',
  	                         'block_dsc'     => 'Monte um bloco.',
  	                         'settings_dsc'  => 'Monte preferências de módulos gerais.',
  	                         'utils_dsc'     => 'Módulo duplicado.',
                             'help_dsc'      => 'Ajuda sobre o módulo.'
                                 );

// Modinfo values
 	$pref_val_array =  array(
 	                          'mode_test'              => 'Valores',
 	                          
 	                          'mode_item_thumb'        => 'Thumb',
 	                          'mode_item_slideshow'    => 'Slide',
 	                          
 	                          'mode_list_image'        => 'Imagens',
 	                          'mode_list_select'       => 'Selecione caixa',
 	                          'mode_list_ul'           => 'Não Encomendado lista',
 	                          
 	                          'welcome'                => '',
 	                          'metakeywords'           => '',
 	                          'metadescription'        => '',
 	                          
 	                          
 	                          'deactivated'            => 'Desativado',
 	                          'all'                    => 'Todos'
                            );

// Settings values
 	$sett_val_array =  array( 'banner'                    => 'Banner',
 	                          'bannerdsc'                 => 'Banner url exibida no módulo.',
 	                          'bannerhlp'                 => 'Deixar vazios para não expor. Formato apenas imagens (.jpg, .gif, etc.).',
 	                          
 	                          'background'                => 'Visão de fundo',
 	                          'backgrounddsc'             => 'O url de imagem de fundo mostrada no módulo.',
 	                          'backgroundhlp'             => 'Deixar vazios para não expor. Formato apenas imagens (.jpg, .gif, etc.).',
 	                          
 	                          'activation'                => 'Páginas ativas',
 	                          'activationdsc'             => 'Lista de página ativa.',
                              'activationhlp'             => 'Permite determinar quais páginas de módulos são parte ativa em público.',
                              
 	                          'desc'                      => 'Texto de página de índice',
 	                          'descdsc'                   => 'Texto mostrado na página de índice do módulo.',
 	                          'deschlp'                   => 'Suporte dos códigos hmtl e Xoops (smilies e balises). Deixar vazios para não expor.',
 	                          
 	                          'display'                   => 'Mostrar informações',
 	                          'displaydsc'                => 'Lista de informação mostrada na página de índice.',
 	                          'displayhlp'                => 'Seleção de tipos de informações a exibição em público páginas do módulo.',
 	                          'display_thumb'             => 'Vinheta',
 	                          'display_description'       => 'Descrição',
 	                          'display_admin'             => 'Links admin',
 	                          
 	                          'cols'                      => 'Colunas',
 	                          'colsdsc'                   => 'Número de colunas.',
 	                          'colshlp'                   => 'Este valor aplica tanto a exibir dados em forma de quadro no público e administrativo (ex : as imagens).',

 	                          'item_list'                 => 'Lista página',
 	                          'item_listdsc'              => 'Mostrar módulo lista da página.',
 	                          'item_listhlp'              => 'Ativa e selecciona a lista de outras páginas públicas no Módulo.',
 	                          'display_none'              => '- Nenhum -',
 	                          'display_images'            => 'Thumb',
 	                          'display_select'            => 'Selecionar caixa',
 	                          'display_ul'                => 'lista desordenada',
 	                          
 	                          'perpage'                   =>  'Itens por página',
 	                          'perpagedsc'                => 'Número de itens exibidos por página.',
 	                          'perpagehlp'                => 'Determine o número informações a par exibir páginas do módulo (lista de menus, de link, imagens, etc.) em público e administrativo.',

 	                          'thumbmw'                   => 'Thumb tamanho',
 	                          'thumbmwdsc'                => 'Padrão de altura e largura de imagens de thumb.',
                              'thumbmwhlp'                => '',
                              
 	                          'color'                     => 'Thumb cores',
 	                          'colordsc'                  => 'Cores padrão usada para gerar thumbs.',
 	                          'colorhlp'                  => '',
 	                          
                              'infobulle'                 => 'Dicas',
 	                          'infobulledsc'              => 'Força dicas exibição em links.',
 	                          'infobullehlp'              => '',
 	                          
 	                          'lenght'                    =>  'Max tamanho título',
 	                          'lenghtdsc'                 =>  'Máximo caracter usado em links.',
 	                          'lenghthlp'                 =>  '',
 	                          
 	                          'blocks'                    => 'Número de Blocos',
 	                          'blocksdsc'                 => 'Número de blocos gerada pelo módulo. Se valor alterou-se, atualizar módulo de geração de blocos requeridos.',
 	                          'blockshlp'                 => '',
 	                          
 	                          'main'                      => 'Índice redireccionamento',
 	                          'maindsc'                   => 'Defina uma reorientação sobre os principais índices página. <br />
                                                              Pode ser uma URL relativa ou absoluta.',
 	                          'mainhlp'                   => '',
 	                          
 	                          'template'                  => 'Modelo',
 	                          'mode'                      => 'Modelo',
                              'modedsc'                   => 'Modo de exibição padrão.',
                              'modehlp'                   => '',
                              
 	                          'dispsm'                    => 'Exibir Modelo',
 	                          'dispsmdsc'                 => 'Exibir modelos seletor nas páginas de item (lado usuário).',
 	                          'dispsmdhlp'                => '',
 	                          
 	                          'selectmode'                => 'Ative modelos visível',
 	                          'selectmodedsc'             => 'Selecione ativa modelos para uso no módulo (usuário e admin).',
                              'selectmodehlp'             => 'Atenção: todos os modos permanecerão disponíveis !Este parâmetro apenas define os métodos disponíveis na caixa de seleção de modos disponíveis lado do utilizador. ',

 	                          'edit_mode'                 => 'Modelo edição',
 	                          'edit_modedsc'              => 'Mostrar modelo código nas páginas de item (Admin só!).',
 	                          'edit_modehlp'              => '',

 	                          'item_name'                 => 'Itens nome',
 	                          'item_namedsc'              => 'Substituição nome do item.',
 	                          'item_namehlp'              => '',
 	                          
 	                          'metakeyword'               => 'Meta palavras-chave',
 	                          'metakeyworddsc'            => 'Meta palavras-chave usadas no módulo.',
 	                          'metakeywordhlp'            => '',
 	                          
 	                          'metadesc'                  => 'Meta Descrição',
                              'metadescdsc'               => 'Padrão meta descrição sobre o módulo utilizado (substituído pelo menu descrição se houver).',
 	                          'metadeschlp'               => '',
 	                          
 	                          'dir'                       => 'Image diretório',
                              'dirdsc'                    => 'Image módulo diretório onde as imagens são armazenadas.',
                              'dirhlp'                    => '',
                              
                              'tip'                       => 'Dicas',
                              'tipdsc'                    => 'Mostrar dicas e truques em uma caixa (lado Admin).',
                              'tiphlp'                    => '',
                              
 	                          'buttons'                   => 'Admin links',
 	                          'buttonsdsc'                => 'Selecione o modo de exibição dos links admin (só Admin)',
 	                          'buttonshlp'                => '',
                              'image'                     => 'Icones',
 	                          'text'                      => 'Texto',
 	                          'button'                    => 'Botão',
                              'select'                    => 'Selecionar caixa',
                              
 	                          'urw'                       => 'URL Reescrever',
 	                          'urwdsc'                    => 'Módulos Url reescrever as configurações.
                                                                  Definir número de caracteres usada para gerar endereços reescrever URW (baseado no menu título). ',
 	                          'urwhlp'                    => '',
 	                          
 	                          'ss'                        => 'Slide configurações',
                              'ssdsc'                     => 'Slide definições gerais em milisegundos. [Duração &#124; Transição]',
                              'sshlp'                     => ''
                              
                            );


// Render defines
        $item_val_array = array_merge( $com_val_array,
                                       $pref_val_array,
                                       $sett_val_array );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_MI_MULTIMENU_'.$item_lg),$item_val);
	}
?>

