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

 	$help_val_array =  array( 
'menuopth'        => '<h3>Opções de menus</h3>
         Aqui estão alguns complementário opções sobre os menus.<ul>
         <li><b>Manual do tradicional imagem :</b> Determinar o repertório em que serão armazenadas as imagens du menu.</li>
         <li><b>Template :</b> Determinar o estilo do menu (modelo) que serão aplicados por falha deste menu.</li>
         <li><b>Grupos :</b> Determinar quais grupos dos usuários têm acesso a este menu.</li>
         </ul>
         ',
         
'menucssh'        => '<h3>Estilo de menus</h3>
         Você pode atribuir um estilo específicas de cada menu.
         A informação indicada será reflectido em uma folha que aparecem no estilo o código fonte da página. 
		 Por esse motivo deverá escrever a sua definição de um estilo folha normal. 
		 A etiqueta {Id} especificarão exatamente em que categoria ou Id, as alterações são aplicáveis e permitir assim não interferir com outro menu.

         <b><u>Exemplo</u> :</b>
         <div style="border:1px Inset Black; padding:12px; margin:12px; width:360px; background:LightGrey;">#multimenu_{id} { 
   border: 2px Outset Red;
            }
#multimenu_{id} a { 
   color:Red;
   }
#multimenu_{id} a:hover { 
   color:Green;
   }</div>

         Nota que o estilo serão aplicados às ligações de todos os menu.
         
         As definições prioridade sobre qualquer definição declarado anteriormente (tema do local, o módulo de estilo folha ou do modelo no curso,...)
         ',

'linkopth'        => '<h3>Opções de ligações</h3>
         Aqui estão algumas opções sobre as links.<ul>
         <li><b>Texto alternativo :</b> Acrescentar texto descritivo que venha completar os dados relativos à ligação. Nota que este aspecto é importante para uma melhor referenciante de sua páginas, assim como acessibilidade de pessoas não vistoso.</li>
         <li><b>Pergunta :</b> Determina o que perguntar (Para gerar automaticamente uma lista de ligacões) Atribuir a essa ligação. 3 Casos de figura :
         <ol><li><b>O principal link com url</b> : Mostra o principal link com todas as ligações do pedido de sub-link.</li>
         <li><b>O principal link sem url</b> : Mascarar o principal link e apresenta todas as ligações do pedido de oprincipal link.</li>
         <li><b>Link secundário com url</b> : Apresenta o link principal e todas as ligações do pedido de ligação secundária.</li>
         <li><b>Link secundário sem url</b> : Mascarar o link principal e apresenta todos os links dos pedido de ligação secundária.</li></ol></li>
         <li><b>Menus :</b> selecionar qual menu será afetado o link.
         Atenção, Mudar uma sub-link do menu necessita reatribuir o link principal !
         Atenção, Se uma imagem é atribuído um link e o manual de armazenagem não é o mesmo para o novo menu, atribuir uma nova imagem.</li>
         <li><b>Tipo :</b> 2 tipos de links possivel :<ol>
         <li><b>permanente </b> : o link mostra como permanentemente.</li>
         <li><b>relative</b> : o link não vai mostrar que se endereço do link principal corresponde ao módulo em curso.</li></ol></li>
         <li><b>Alvo :</b> 3 Tipos de alvo :<ol>
         <li><b>Auto</b> : O módulo detectar se a melhor configuração segundo endereço (URL) utilizados.</li>
         <li><b>Self</b> : O link terá início na mesma página. Ideal para os links apontando para páginas <u>internas</u> do site.</li>
         <li><b>Blank</b> : O link será aberto em uma nova página. Ideal para os links a páginas  <u>externas</u> do site.</li></ol></li>
         <li><b>Groupes :</b> Determine quais grupos utilizadores terão acesso ao link.</li>
         </ul>
         ',
         
'linkcssh'        => '<h3>Estilo de links</h3>
         Você pode atribuir um estilo específico para cada link. 
          As informações dadas aqui será refletido em <i>style=""</i> 
          Você deve escrever sua definição como em uma folha de estilo, e não indicam classe ou id.

         <b><u>Exemplo</u> :</b>
         <div style="border:1px Inset Black; padding:12px; margin:12px; width:360px; background:LightGrey;">color:Red; font-weight:bold; border: 1px plain Red;</div>
         
         Note que o estilo será aplicado a ligação no admin lista de links para ajudá-lo a apresentar os resultados. 
         
          As definições dadas para cada ligação será elevado em qualquer definição anteriormente declarados (tema do site ou de estilo módulo atual menu ,...) 
          Se o estilo não, certifique-se que o modelo menu ativou inclui com o seguinte código <input style="border:1px Inset Black; background:LightGrey;" value=\'<{if $item.css}>style="<{$item.css}>"<{/if}>\' size="45" /> na definição da relação.
         
         <b><u>Exemplo</u> :</b>
         <textarea style="border:1px Inset Black; padding:12px; margin:12px; width:360px; background:LightGrey;"><a href="<{$item.link}>" <{if $item.css}>style="<{$item.css}>"<{/if}> > <{$item.title}> </a></textarea>
         ',
         
'query'        => '<h3>Consultas</h3>
         Você pode criar uma lista de links de dados armazenados no banco de dados, a partir de qualquer módulo. 
         
          Depois que selecionados na tabela, você pode visualizar o conteúdo, abrindo o painel <b> "[+][[BD] Tabela] "</b>. 
          A tabela mostra a composição da tabela selecionada. 
          Para ajudá-lo na configurações de sua mesa fará uma colorida seleção de dados que lhe interessam:
         <ul>
         <li style="color:Red;"><b>Em vermelho :</b> ID-chave</li>
         <li style="color:Green;"><b>Em verde :</b> indivíduos (campos para gerar os títulos dos links)</li>
         <li style="color:Blue;"><b>Em azul :</b> o conteúdo (campos para gerar alternativas tags)</li>
         <li style="color:Orange;"><b>Em laraja :</b> imagens (campos para gerar imagens miniatura ou links)</li>
         </ul>Uma vez analisado o quadro assim, você pode criar a consulta que irá gerar uma lista de relacionamento que você deseja. 2 etapas:
         <ul>
         <li><b><u>Etapa 1</u> : O essencial</b>
         <ol>
         <li><b>Título :</b> indicar um título significativo. Desta forma, você irá encontrar facilmente a aplicação que pretende gerar seus links.</li>
         <li><b>[BD] Tabela :</b> Nome da tabela selecionada.</li>
         <li><b>[BD] Identificação do campo :</b> Campo de identificação. Esta variável será na operadores do link.</li>
         <li><b>[BD] Campo tópico :</b> Campo contendo o nome ou título do link.</li>
         <li><b>Endereço do links :</b> URL utilizado para a geração de links. 
          Para encontrar a URL correta, selecionar e copiar a URL de uma página do módulo em causa. Substitua o id da tag url <b>{id}</b>. </li>
         </ol>
         </li><li><b><u>Etapa 2</u> : opções</b>
         <ol>
         <li><b>[BD] Alternando campo :</b> Campo contendo informações como alternativa para exibir texto.</li>
         <li><b>[BD] Image campo :</b> Campo contendo a imagem para criar um link para este link. Só se o módulo oferece uma imagem para cada entrada.</li>
         <li><b>Diretório armazenamento imagens. :</b> Usada somente se o <b>[BD] Image campo </b> foi preenchido. Digite o endereço da imagem módulo de armazenamento (se necessário). .</li>
         <li><b>[BD] Condições :</b> Corresponde a cláusula <b>WHERE</b> uma consulta.
          As ligações de qualquer tipo de condição ligada a um campo na tabela selecionada. 
          Várias condições podem ser separados por <b>AND</b> e/ou <b>OR</b>. 
          A tag <b>{data}</b> e <b>{uid}</b> pode ser utilizado para inserir a dinâmica dos valores a data ou o usuário atual. 
         (Exemplo : to_userid={uid} AND read_msg=0)</li>
         <li><b>[BD] Ordem exibição de dados:</b> Corresponde a cláusula <b>ORDER BY</b>uma consulta. 
         Utilizado para especificar a ordem pela qual pretende visualizar a lista de links. 
         Indicar um ou mais campos da tabela selecionada Acompanhamento <b>ASC</b> ou <b>DESC</b> e separadas por uma vírgula.
         (Exemplo : from_userid ASC, msg_time DESC ).</li>
         <li><b>O número máximo de links a apresentar:</b> Digite o número máximo de links para mostrar a essa consulta.</li>
         </ol>
         </li>
         </ul>
         ',

'image'        => '<h3>Gerenciar Imagem</h3>
         Aqui você pode gerenciar as images/vignettes/logos  usados para decorar a sua lista de links. 
          Cada menu pode ter a sua própria lista de imagens na sua própria seção. 

          Alguns recursos permitem a você padronizar a aparência de vinhetas <u>embora preservando a imagem original </u>! 
          Cada imagem é guardada alterada antes de ser capaz de restaurar as suas propriedades (tamanho, cor, tamanho) de origem.
         
         <b>Descrições de opções disponível :</b>
         <ol>
         <li><b>Generador Thumbnail:</b> Selecione o tipo de alterações que deseja fazer o seu miniaturas.
         <table width="100%"><tr>
         <td align="center"><img src="../images/sample/flag_normal.jpg" />
         Normal</td><td align="center"><img src="../images/sample/flag_rounded.jpg" />
         Borda arredondada</td><td align="center"><img src="../images/sample/flag_b-w.jpg" />
         Preto e branco</td><td align="center"><img src="../images/sample/flag_shadow.jpg" />
         Sombreado</td><td align="center"><img src="../images/sample/flag_deg.jpg" />
         Degrade</td><td align="center"><img src="../images/sample/flag_text.jpg" />
         Texto</td></tr></table>
         </li>
         <li><b>Texto :</b> Texto para exibir o modo de  <b>texto</b>.</li>
         <li><b>Largura :</b> Largura absoluta da imagem. Opcional.</li>
         <li><b>Altura :</b> Altura absoluta da imagem. Opcional.</li>
         <li><b>Cor de fundo:</b> Cor de fundo para criar a miniatura modo <b>borda arredondamento</b>, <b>Sombreado</b> e <b>Degrade</b>.</li></ol>
         ',

'css'        => '<h3>Folha de estilo ligada ao modelo</h3>
         Você pode atribuir uma folha de estilo modelo para cada menu. 
          Estas folhas de estilo pode ser: <ul>
         <li>pré-existentes e ligadas ao modelo.</li>
         <li>inexistente e criada por você. Ele será automaticamente ligada ao modelo e editados e atribuídos a todos os menus que irá utilizá-lo.</li></ul>

         Tal como as folhas de estilo menus, a tag {id} vai distinguir automaticamente uma característica relacionada com um menu específico.
         Exemplo :<div style="border:1px Inset Black; padding:12px; margin:12px; width:360px; background:LightGrey;">/* Sub links */
          #dropmenudiv_{id} {
            position:absolute;
            margin-left:10px;
            margin-top:-1px;
            border: 1px outset black;
            }
            </div>
         ',

'script'        => '<h3>Script Java</h3>
          Alguns modelos menu utilize um java script. 
          Algumas vezes, dependem de script parâmetros passados em variáveis. 
          Você pode editar esse script ou Variáveis nesta janela.
         ',

'tpl'        => '<h3>Templates de menu</h3>
         Os templates menu é o código html e Smarty usado para gerar menus. 
          Os modelos disponíveis são os propostos no gerenciador de templates XOOPS. 
          Apenas modelos criados usando um conjunto de modelos personalizados estão disponíveis. 
          Se a janela de edição aparece desactivado, é que ela não pode ser mudado para um dos seguintes motivos:
         <ul><li>não existe um conjunto de modelos personalizados ;</li>
         <li>Definir modelo personalizado não foi atualizado.</li></ul>
         '
                                  );



//        $item_val_array = $info_val_array + $tips_val_array;
//        $tips_count = count($item_val_array);

// Render defines
 	foreach ($help_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_HLP_MULTIMENU_'.$item_lg),$item_val);
	}
?>