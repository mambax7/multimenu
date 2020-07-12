<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: multiMenu 1.90
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*			- herve (http://www.herve-thouzard.com)
*			- blueteen (http://myxoops.romanais.info)
*			- DuGris (http://www.dugris.info)
*/

 $main_val_array['introduction']  =  array( ''      => 'Este módulo pode gerar vínculo listas ou menus manualmente ou automaticamente.

Aqui estão os modelos variáveis disponíveis para seus modelos personalizados.

2 tipos de variáveis : <ul>
<li><b>Variáveis fixos</b>
<i>Essas variáveis são na sua maioria definida por padrão, ou preferências do módulo.</i>
</li>
<li><b>Variáveis dinâmicas </b>
<i>Estas variáveis são definidas pelo conteúdo de cada menu, ou páginas criadas pelo usuário. 
Eles são válidos para ambas as páginas de conteúdo de blocos do módulo.</i></li>
</ul>' );

 $main_val_array['language_define'] =  array(
                                  '<{$index}>'        => 'Index',
                                  '<{$other}>'        => 'Outro',
                                  '<{$sourcecode}>'   => 'Código Fonte '
                                   );


 $main_val_array['fixes_item'] =  array(
                                  '<{$id}>'            => '[MENU] menu ID.|1',
                                  '<{$menu}>'          => '[MENU] menu ID.|1',
                                  '<{$css_link}>'      => '[MENU] URL do menu atual .CSS arquivo (se houver).|http:&#47;&#47;[..]/multimenu_my_menu.css',
                                  '<{$script_link}>'   => '[MENU] URL do menu atual .JS  arquivo (se houver)..|http:&#47;&#47;[..]/multimenu_my_menu.js',
                                  '<{$status}>'        => '[MENU] Status atual menu (0 : Deconectado, 1 : Conectado, 2 : Oculto).|1',
                                  '<{$title}>'         => '[MENU] Título do menu atual.|Usuário menu',
                                  '<{$css}>'           => '[MENU] Folha de estilos definições de menu atual.|multimenu_1 {color:Red;}',
                                  '<{$description}>'   => '[MENU] Descrição menu atual texto.|Aqui está o menu do usuário.',

                                  '<{$banner_url}>'    => '[PREF] URL dos módulos banners.|http:&#47;&#47;[..]/banner.gif',
                                  '<{$background}>'    => '[PREF] URL dos módulos fundo foto.|http:&#47;&#47;[..]/background_image.gif',
                                  '<{$image_width}>'   => '[PREF] Imagens padrão largura.|160',
                                  '<{$image_height}>'  => '[PREF] Imagens padrão de altura..|160',
                                  '<{$edit_mode}>'     => '[PREF] Ativar o "Editar" modo (exibição de menu atual código fonte na parte inferior da página).|1',
                                  '<{$cols}>'          => '[PREF] Número de colunas.|3',
                                  '<{$duration}>'      => '[PREF] Duração de uma animação em milissegundos.|1000',
                                  '<{$transition}>'    => '[PREF] Transição de uma animação em milissegundos.|1000',
                                  '<{$item_list}>'     => '[PREF] Mostrar menus disponíveis.|1',
                                  '<{$item}>'          => '[PREF] Default item nomes usados em páginas.|Menus',
                                  '<{$item_display_selectmode}>'   => '[PREF] Modo de exibição de todos os modelos disponíveis.|select.html',

                                  '<{$ii}>'            => 'Total de links no menu atual.|10',
                                  '<{$i}>'             => 'Total de ligações por coluna (número arredondado).|5',
                                  '<{$i_main}>'        => 'Total principal-links (sem qualquer sublinks) por colunas (número arredondado).|3',
                                  '<{$mode}>'          => 'A página atual do modelo (ou conjunto de configurações padrão no módulo).|include/multimenu_ul.html',
                                  '<{$module}>'        => 'Módulo do diretório (ie : multimenu)|multimenu',
                                  '<{$banner}>'        => 'Módulo do banner no código HTML.|&lt;img src="http:&#47;&#47;[..]/banner.gif" /&gt;',
                                  '<{$admin}>'         => 'Módulo admin links.|',
                                  '<{$data_list}>'     => 'Dados da lista gerada pelo menu atual. Encontre variáveis lista abaixo.|Array'
                                   );


 $main_val_array['variables_item'] =  array(
                                  '<{item.id}>'          => 'Link ID.|2',
                                  '<{$item.pid}>'        => 'Link mãe ID (link principal).|1',
                                  '<{$item.catid}>'      => 'Atual menu ID.|1',
                                  '<{$item.type}>'       => 'Tipo de link (permanente ou relativa).|permanent',
                                  '<{$item.status}>'     => 'Link status (0 : desconectado ou 1 : conectado).|1',
                                  '<{$item.weight}>'     => 'Link peso.|100',

                                  '<{$item.title}>'      => 'Link título.|Home',
                                  '<{$item.title|addslashes}>'=>'Protegido link título (códigos de javascript).|Home\\\'s',
                                  '<{$item.alt_title}>'  => 'Alternativa baliza (ou dica).|Este website home page',
                                  
                                  '<{$item.image}>'     => 'Url de imagem predefinido. Distantes imagem está hospedada Priore a foto.|http:&#47;&#47;[..]/image.gif',
                                  '<{$item.image_a}>'   => 'Distante url da imagem.|http:&#47;&#47;[..]/image.gif',
                                  '<{$item.image_b}>'   => 'Hospedado url da imagem.|http:&#47;&#47;[..]/image_b.gif',

                                  '<{$item.query}>'      => 'Atual link consulta (se houver).|news',
                                  '<{$item.target}>'     => 'Link\'s alvo (target = "_blank" ou código popgen se link aponte para uma foto).|_blank',
                                  '<{$item.css}>'        => 'CSS definições (sem classe, Nore ID).|color:Red;',
                                  '<{$item.link_status}>'=> 'Link tipo (topo, link or sublink).|link',
                                  '<{$item.num}>'        => 'Link número de ordem.|1',
                                  '<{$item.num_main}>'   => 'Link principal número de ordem.|1'
                                 );

$main_val_array['author word'] =  array( ''      => 'Para ativar o seu modelo personalizado :
 1. Copie o seu modelo personalizado no diretório "templates/include/" ;
 2. atualize o módulo ;
 3. ativar o modelo personalizado no módulo configurações.' );

?>