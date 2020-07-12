<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2008 <http://www.xoops.org/>
*
* Module: multiMenu 2.x
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/

// Common values
$main_val_array =  array(    'index'        => 'Index',
  	                         'admin'        => 'Admin',
  	                         'admins'       => 'Admin',
  	                         'sitemap'      => 'Sitemap',
  	                         'n'            => 'N°',
  	                         'image'        => 'Imagem',
  	                         'title'        => 'Titulo',
  	                         'close'        => 'Fechar',
  	                         'item'         => 'Item',
  	                         'description'  => 'Descrição',
  	                         'source_code'  => 'Código Fonte',
  	                         'edit'         => 'Editar',
  	                         'clone'        => 'Duplicar',
  	                         'alt_title'    => 'Aviso-Mouse',
  	                         'other'        => 'Outro ',
  	                         'menu'         => 'Menus',
  	                         'images'       => 'Imagens',
  	                         'templates'    => 'Modelos',
  	                         'blocks'       => 'Blocos',
  	                         'settings'     => 'Definições',
  	                         'utils'        => 'Utilitários',
  	                         'delete'       => 'Excluir',
  	                         'query'        => 'Query',
  	                         'link'         => 'Link',
  	                         'block'        => 'Bloco',
  	                         'template'     => 'Modelo',
  	                         'help'         => 'Ajuda',
  	                         'notactive'    => 'Esta página não está activa.'
                        );
                                 
// Settings values
$sett_val_array =  array( 
						  'thumb'                  => 'Thumb cor',
						  'button'                 => 'Admin links',
						  'meta'                   => 'Meta',
						  'num'                    => 'Número',
						  'name'                   => 'Itens nome',
						  'slideshow'              => 'Apresentação de slides',
						  'max_size'               => 'Tamanho máximo',
						  'keywords'               => 'Palavras-chave',
						  'count'                  => 'Número',
						  'title_lenght'           => 'Título do comprimento máximo',
						  'display_selectmode'     => 'Mostrar modelos disponíveis',
						  'banner'                 => 'Banner',
						  'background'             => 'Imagem de fundo',
						  'activation'             => 'Active páginas',
						  'desc'                   => 'Página Índice texto',
						  'display'                => 'Informações exibida',
						  'cols'                   => 'Colunas',
						  'list'                   => 'Páginas lista',
						  'perpage'                => 'Itens por página',
						  'thumbmw'                => 'Thumbs tamanhos',
						  'thumb_color'            => 'Thumbs cor',
						  'infobulle'              => 'Ferramenta de dicas',
						  'lenght'                 => 'Máximo tamanho do título',
						  'imagemw'                => 'Máximo tamanho de thumb',
						  'main'                   => 'Home page',
						  'template'               => 'Modelo',
						  'mode'                   => 'Modelo',
						  'dispsm'                 => 'Mostrar modelos disponíveis',
						  'edit_mode'              => 'Modo de edição',
						  'selectmode'             => 'Modelos disponíveis',
						  'item_name'              => 'Itens nome',
						  'metakeyword'            => 'Meta palavras-chave',
						  'metadesc'               => 'Meta Descrição',
						  'dir'                    => 'Arquivo padrão diretório',
						  'tip'                    => 'Dicas',
						  'buttons'                => 'Admin links',
						  'urw'                    => 'URL Reescrever',
						  'ss'                     => 'Apresentação de slides'
						);


                                 
// Render defines

        $item_val_array = array_merge( $main_val_array,
                                       $sett_val_array );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_MULTIMENU_'.$item_lg),$item_val);
	}

?>