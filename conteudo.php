<?
					$pagina = $_GET['acessando'];
					if($pagina=='')
					  include ('adm_mensagem_listar.php');
					elseif(file_exists($pagina.'.html')){
					  include ($pagina.'.html');
					}		
					elseif(file_exists($pagina.'.php')){
					  include ($pagina.'.php');
					}
					else 
					  include ('principal.html');
				?>