<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  Multimenu v1.0								//
//  ------------------------------------------------------------------------ 	//

// Common values
 	$com_val_array =  array( 'option'     => 'Opções',
  	                         'settings'   => 'Definições',
  	                         'item'       => 'Item',

  	                         'admin'      => 'Admin',
  	                         'edit'       => 'Editar',
  	                         'clone'      => 'Duplicatar'
                            );

// This block menu values
 	$block_val_array =  array( 'tpl'             => 'Template',
  	                           'tpldsc'          => 'Modo de exibição.',
  	                           'ul'              => 'lista desordenada',
  	                           'menu'            => 'XOOPS menu principal',
  	                           'image'           => 'Imagem',
  	                           'extended'        => 'Extensão',
                                                          
        	                   'display'         => 'Exibir',
        	                   'displaydsc'      => 'Informações para exibir',
        	                   'title'           => 'Titulo',
        	                   'logo'            => 'Logo',
                                                          
  	                           'status'          => 'Estatuto',
  	                           'statusdsc'       => 'Exibido páginas estatuto.',
  	                           'online'          => 'Conectado',
  	                           'hidden'          => 'Oculto',
  	                           'offline'         => 'Desconectado',
                                                          
  	                           'description'     => 'Descrição',
  	                           'descriptiondsc'  => 'Descrição texto a ser exibido no bloco.',
                                                          
  	                           'max'             => 'Máxima',
  	                           'maxdsc'          => 'Máximo de links para exibir.<br />
                                                     Aviso: esta função desactivar todas sublinks exceto query sublinks !',
                                                          
                                                    
                               'order'           => 'Ordenar por',
                               'orderdsc'        => 'Aviso: mainlinks e sublinks seria misturado.',
                               'weight'          => 'Peso',
  	                           'titleasc'        => 'Ordem alfabética',
                               'titledesc'       => 'Inverteu ordem alfabética',
                                                                                             
                                                          
  	                           'relative'        => 'Mostre link parentes',
                                                          
  	                           'cols'            => 'Colunas',
  	                           'colsdsc'         => 'Número de colunas.',
                                                          
  	                           'maxwidth'        => 'Tamanhos de Thumbs',
  	                           'maxwidthdsc'     => 'Definir o tamanho da foto.<br />
                                                     (W-H).',
                               'pix'             => 'pixels',
                                                          
  	                           'maxtitle'        => 'Título comprimento',
  	                           'maxtitledsc'     => 'Definir máximo comprimento do caracteres do título do link.',
                               'char'            => 'caracteres'
                              );
                                 
// This item values
 	$block_item_array =  array('link'            => 'Links',
 	                           'random'          => 'Aleatório',
 	                           'latest'          => 'Últimas',
 	                           'popular'         => 'Populares',
 	                           'slideshow'       => 'Apresentação de slides',
 	                           'select'          => 'Menu',
 	                           'selectdsc'       => 'Definir qual menu para exibir.',
 	                           'list'            => 'Menus lista',
 	                           'all'             => '[TODOS]',
 	                           'alt_title'       => 'Aviso-Mouse'
                              );

// Render defines
        $item_val_array = array_merge( $com_val_array,
                                       $block_val_array,
                                       $block_item_array
                                      );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_MB_MULTIMENU_'.$item_lg),$item_val);
	}
?>