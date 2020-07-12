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

include('../xoops_version.php');

        $i=1; $ii=0;

 	$settings_val_array =  array();
                               foreach( $modversion['config'] as $x => $datas ) {
        $settings_val_array[$i++] = 'Definições : ' . constant($datas['title']) . '|<ul><li>' . constant($datas['description']) . '</li><li style="font-style:italic;">' . constant($datas['help']) . '</li></ul>|index.php?admin=settings&num='.$ii++;
                               }


  	 $tips_val_array =  array(
								$i++        => 'Sugestão: Volte! | Quando você cria um link externo, atribuir-lhe um alvo "em branco", para que seus visitantes retornam mais facilmente! ',
								$i++        => 'Dica: O modo auto | No modo automático, o "target" definido para aprovar automaticamente se você criar um link interno ou externo. ',
								$i++        => 'Dica: direito no alvo! | A meta "blank" abre o link em uma nova página. Utilizá-lo se quiser que seus visitantes a encontrar mais facilmente o seu caminho. ',
								$i++        => 'Dica: Fique conosco! | A meta "self" abre o link na mesma página. O modo de navegação ideal para ficar dentro do site. ',
								$i++        => 'Dica: Crie os seus próprios modelos! | ... Em seguida, arraste-os no "templates/include/", ponha o módulo de dias, e depois ativar o novo modelo nas preferências do módulo. ',
								$i++        => 'Dica: Use a cache! | Especialmente se o seu não uso Menus de links dinâmicos (consultas, links, grupos de acesso), otimizar o tempo de acesso ativando o cache blocos. ',
								$i++        => 'Dica: CSS | As folhas de estilo permitem-lhe personalizar a exibição de links e/ou menus. Para mais informações visite <a href="http://www.w3.org/Style/CSS/" target="_blank"> W3C </ a>. ',
								$i++        => 'Dica: Ocultar menu | Um menu escondido não aparecerá no índice de páginas do módulo. Mas também é ativa acessíveis e um menu \'on\'.',
								$i++        => 'Dica: Modelos idênticos | Os modelos dos índice páginas e blocos são idênticos. Chipote precisa de mais dois lugares para mudá-los.',
								$i++        => 'Dica: Tab imagem | O gerenciador de imagens que você pode gerenciar seus links e ilustrações de seus menus. Padronizar o formato em alguns cliques ...',
								$i++        => 'Dica: Guia modelo | O modelo gerente permite facilmente editar templates, folhas de estilo e scripts menus.',
								$i++        => 'Dica: Aba pedido | O gerente pode gerar pedidos listas dinamicamente a partir de link no site banco de dados. Escolha a tabela que você deseja e clique <b> [-][[ BD] Tabela] </ b> para saber mais sobre o assunto. ',
								$i++        => 'Sugestão: Excluir | Quando elimina um menu, você remove todos os links apensa juntamente com ele! ',
								$i++        => 'Dica: Auto-correção | Quando você inserir um link com o nome de domínio do seu site, Multimenu reescrever endereço automaticamente a ser um link interno. ',
								$i++        => 'Dica: Imagens | Use apenas imagens formato. Jpg,. Jpeg,. Gif ou. Png. Os outros são os formatos de imagem inaceitável na web. ',
								$i++        => 'Dica: Imagens | Atenção às imagens demasiado grandes! Vá até o gerenciador de redimensionar as imagens no formato certo na mosca. ',
								$i++        => 'Sugestão: Façam suas apostas! | Faça um tour pelas preferências do módulo. Definir parâmetros de acordo com a sua escolha, e lá tocar. ',
								$i++        => 'Dica: Tenha "robô simpático". | Usar textos alternativos (pontas), em seus links e colocar suas próprias palavras-chave. ',
								$i++        => 'Dica: Permalink | Um link permanente será exibido em qualquer circunstância ... se é apenas dar-lhe permissão. ',
								$i++        => 'Sugestão: Link sobre | Um parente link só aparece quando o módulo indicado no vínculo é o módulo principal da página atual. ',
								$i++        => 'Dica: Permissões | Grupos permitem-lhe definir quem tem acesso ao que menu e / ou aquilo conexão. Ser coerentes na sua escolha! ',
								$i++        => 'Dica: Necessidade extra blocos | De preferência geral módulo, especificar o número exato para você e para colocar seu módulo dia! ',
								$i++        => 'Dica: Necessidade de clonar o módulo | Vá ver <a href="index.php?admin=utils"> "utilitária" </ a>, e duplicar o seu módulo em dois cliques do mouse. ',
								$i++        => 'Dica: Pedido | Para criar uma nova consulta no banco de dados, você inalar consultas fornecidas por omissão. ',
								$i++        => 'Dica: Faça com que o (id). | Seja para consultas, scripts ou folhas de estilo, a tag (id) é referenciado para o menu actual. ',
								$i++        => 'Dica: Clonagem | É possível clonar um módulo com todas as suas ligações com um único clique. Não se esqueça de alterar o título! ',
								$i++        => 'Dica: A imagem remoto ou local? | Prefira imagens armazenadas no seu servidor. Estes são os únicos sobre os quais você tem um controle total! ',
								$i++        => 'Dica: A imagem remota | A imagem remota também pode ser hospedada em seu site. Mas atenção à pequena cruz vermelha quando se trata de mudar o nome, mover ou excluir! ',
								$i++        => 'Dica: A imagem local | As imagens são locais em seu próprio servidor. Você também pode usar a imagem redimenssionner gestor do módulo. ',
								$i++        => 'Dica: Faça o navegação! | Experimente a respeitar a "regra dos 3 cliques" que afirma que qualquer informação deve ser acessível em menos de 3 cliques ',
								$i++        => 'Dica: Faça a navegação! | A lista de itens de preferência deve conter menos de 7 elementos. Evite menus "muito tempo". ',
								$i++        => 'Dica: Optimize suas imagens! | Foi máxima deve otimizar o tamanho da imagem, escolha um formato e número de cores tão pequena quanto possível. Recomenda-se a não ultrapassarem 30 a 40 kb por imagem ',
								$i++        => 'Dica: Ao projetar o menu principal! | A qualquer momento visitante deve ser capaz de localizar o site (e encontrar a página inicial). ',
								$i++        => 'Sugestão: Padronizar o seu menu! | Os elementos de navegação devem estar localizadas no mesmo lugar em todas as páginas, se possível com um uniforme de uma página para outra. ',
								$i++        => 'Dica: Boa títulos! | Criar laços favorecendo o texto, lido para limpar, sem "adivinhar" ou mensagens ocultas, com um padrão. ',
								$i++        => 'Dica: Mapa do Site! | Fornecer pistas para toda a informação disponível na página inicial ',
								$i++        => 'Dica: Vá ao essencial! | As ligações mais importantes devem ser altamente desenvolvidas (Loja para uma loja local, sobre o novo site, etc.) Mas ele não exige a página Home é muito mais rica. ',
								$i++        => 'Dica: Evite textos imagem! | O texto em imagens, mesmo que ele permite um melhor controlo da apresentação não só é inaceitável em termos de tempo, mas também para os motores de busca. ',
								$i++        => 'Dica: "Mantenha-o simples!" | O sistema de navegação deverá ser simples e intuitiva. Nem é preciso oferecer todos os links na página inicial. Uma barra de navegação para as principais posições suficiente (que não, porém, de propor uma forma rápida, por exemplo, no menu drop-down em JavaScript). ',
								$i++        => 'Dica: Dois são melhores do que uma! | Multiply alternativas de sistemas de navegação (Ex: uma barra de menu gráfico forma, com efeitos "rollovers" simples, uma barra de navegação texto, etc) Desde que estes sistemas são bem visualmente distintas. Não agrupá-los todos em um lugar e tendo em conta a organizar o itinerário da Internet. ',
								$i++        => 'Dica: HELP! | Clique no link "[+][ Ajuda] "para exibir a ajuda on-line nas formas de publicação. ',
								$i++        => 'Dica: Vire-me! | Não há necessidade de volumosos essas dicas? Desabilite <a href="index.php?admin=settings&sub=edit"> módulo preferências </ a>. ',
								$i++        => 'Dica: Faça a sua escolha! | Escolha o seu favorito templates e desativar outros <a href="index.php?admin=settings&sub=item"> módulo preferências </ a>. ',
								$i++        => 'Dica: Veja o código | Quando você criar ou modificar um modelo, ver o código gerado diretamente por ativadoras <b> Vire sobre o "modelo Editon" </ b> na <a href = "index.php? Admin Configurações = & sub = índice "> preferências módulo </ a>. ',
								$i++        => 'Dica: Tome o caminho certo | Ao criar um menu, você pode determinar o diretório para armazenar imagens. Verifique se ele está aberto para escrever! ',
								$i++        => 'Sugestão: Mudança de Endereço | Quando você move um link com uma imagem de uma tela para outra, certifique-se que a nova seção do menu oferece a imagem. ',
								$i++        => 'Dica: Cada menu repertório | Ao criar um novo menu, adicione ao seu próprio diretório de armazenamento (criado automaticamente pelo módulo) para evitar novos conflitos. ',
								$i++        => 'Sugestão: No menu bloco | Escolha o bloco irá mostrar o seu menu em <a href="index.php?admin=blocks"> blocos guia </ a> e utilizá-lo para verificar as configurações Grupos do módulo. " '
                                  );

 	$info_val_array =  array( 
							$i++        => 'Você sabia? | Multimenu O original foi uma versão melhorada do imenu, desenvolvido por outra belga Linthuin. ',
							$i++        => 'Você sabia? | Na versão 1, sabe-Multimenu mais de 9 versões. A última a ser de 1,9. ',
							$i++        => 'Você sabia? | Para a maioria das pessoas que contribuiu para a realização dos módulos não são profissionais desenvolvedores! ',
							$i++        => 'Você sabia? | Multimenu foi desenvolvido com o software editor <a href="http://www.contexteditor.org/" target="_blank"> CONTEXTO </ a>. ',
							$i++        => 'Você sabia? | Em sua primeira versão, está escrito Multimenu "Multimenu." A M ficou reduzida a minúsculas para facilitar a clonagem do módulo. Sobre a tela, ela faz toda a diferença! ',
							$i++        => 'Você sabia? | O número de horas dedicadas ao desenvolvimento deste módulo é incalculável. Desde suas primeiras versões, milhares de horas foram gastas ... ',
							$i++        => 'Você sabia? | Ao sair do Multimenu 1,8, mais de 600 postos foram publicadas sobre ele nos fóruns e www.frxoops.org www.xoops.org. ',
							$i++        => 'Você sabia? | Os desenvolvedores que têm contribuído para Multimenu não acertar um único franco. Isso é open source! ',
							$i++        => 'Você sabia? | Multimenu foi desenvolvido para XOOPS 2.x só. Não foram semelhantes em outras módulo CMS. ',
							$i++        => 'Você sabia? | Multimenu desenvolvedores são na sua maioria franceses e membros activos da <a href="http://www.frxoops.org" target="_blank"> FRXoops </ a>. ',
							$i++        => 'Sabia? | Lei de Murphy: empírica princípio afirmando que, se existe a possibilidade de inépcia de um produto ou método que alguém irá atualizar esse erro. Esta lei presidiu à conclusão deste módulo, mas os recursos continuam impenetráveis Murphy. ;-) " '                                  );

if(!isset($only_data)) {
        $item_val_array = $info_val_array + $settings_val_array + $tips_val_array;
        $tips_count = count($item_val_array);

// Render defines
        $i=1;
 	foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_TI_MULTIMENU_'.$item_lg),$item_val);
	}
}
?>
