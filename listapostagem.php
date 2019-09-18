<?php
session_start();
require_once'settings/conexao.php';

if (!isset($_SESSION['email']) && !isset($_SESSION['senha'])) {
	header("location: Login.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Index</title>
	</head>

	<body>
		Usuario: <?php echo $_SESSION['username'];  ?>
		<a href="Logout.php">SAIR</a>
		<h1>Olá, estou na Index!</h1>
		<!-- inicio dos seguidores-->
		<h1>Seguidores</h1>
		<?php
				$sql = "SELECT * FROM amigos";
				$sqlprep = $conexao->query($sql);
				$vetorSolicitacao = $sqlprep->fetch_all(MYSQLI_ASSOC);

				$sql2 = "SELECT * FROM usuario";
				$sqlprep = $conexao->query($sql2);
				$vetorUsuario = $sqlprep->fetch_all(MYSQLI_ASSOC);
				
				$contator = 0;

			
			foreach ($vetorSolicitacao as $key) {
				foreach ($vetorUsuario as  $value) {
				
					if ($key['ativo'] == 1) {
						if ($key['id_de'] == $value['id']) {
						
							if ($key['id_para'] == $_SESSION['id']) {

								//echo $value["username"];
	?>
								<table>
									<tr>
										<td><?=$value['username']?></td>
										<td>
											<form action=".php" method="POST">	  
												<input hidden="true" type='number' name='id_de' value='<?=$value['id']?>'>
												<button type='submit'>EXCLUIR</button>
											</form>
										</td>
									</tr>
								</table>
	<?php 
								$contator = $contator + 1;
								
							}

						}
					}
				}

			}
			
    ?>
	<h4>Seguidores <?=$contator ?><br></h4> <!--fim dos seguidores-->
		
		<!--Inicio das postagens-->
		<form action="SalvarPoste.php" method="POST">
			<input hidden="true" type="number" name="id"><br>
			<textarea name="poste" cols="50" rows="3" placeholder="Fale alguma coisa">
				
			</textarea>
			<button type="submit">POSTAR</button>
		</form>
<br><br>

		<!--fim dos postagens-->
			<!--Inicio da listagem-->
			<?php

				$sql = "SELECT * FROM amigos";
				$sqlprep = $conexao->query($sql);
				$vetorSeguindo = $sqlprep->fetch_all(MYSQLI_ASSOC);
			
				$sql = "SELECT * FROM usuario";
				$sqlprep = $conexao->query($sql);
				$vetorRegistros = $sqlprep->fetch_all(MYSQLI_ASSOC);

				$sql2 = "SELECT * FROM publicacao";
				$sqlpreparado = $conexao->query($sql2);
				$vetorPoste = $sqlpreparado->fetch_all(MYSQLI_ASSOC);

				foreach ($vetorPoste as $poste ) {
					foreach ($vetorRegistros  as $value) {					  	
						  	foreach ($vetorSolicitacao as $key) {
				foreach ($vetorUsuario as  $usuario) {  
						if ($poste['id_usuario'] == $_SESSION['id'] ) {
							if ($poste['id_usuario'] == $usuario['id']) {	
							if ($key['ativo'] == 1) {
						if ($key['id_de'] == $value['id']) {
						
							if ($key['id_para'] == $_SESSION['id']) {					
								
					?>

								<?=$usuario['username'];?><br>
								<?=$poste['poste'];?><br>
					<?php	
				}
			}
		}
	}
}
							}
						}
					}
				}
			?>
			<!--fim da listagem-->
			
		<!--Inicio dos usuarios onine -->
	<div style="border: 2px solid red; 
				text-align: left;
			    background-color: lightblue;
	  			padding-left: 80%;
	  			 margin-left: 10%;
	  			 height: auto;
	  			 float:right;">

		<h1>Usuarios Online</h1>

			<?php
				
				foreach ($vetorRegistros  as $value) {
					if ($value['ativo'] == 1) {
						if ($value['id'] != $_SESSION['id'] ) {
							
						
			?>
							<table>
								<tr>
									<td>
										<?=$value['username']?>
									</td>
									<td>
										<form action="EnviarSolicitacao.php" method="POST">
											<input  hidden="true" type="number" name="id_para" value="<?=$value['id']?>"> 
											<button type="submit">Enviar</button>
										</form>
									</td>	
								</tr>	
							</table>
			<?php
						}
					}
				} //fim dos usuarios onine
			?>
	</div>

	<div style="border: 2px solid red; background-color: lightgreen; float:right;padding-left: 80%">

		<h1>Usuarios Ofline</h1>

			<?php
				//Inicio Usuarios ofline
				
				foreach ($vetorRegistros  as $value) {
					if ($value['ativo'] == 0) {
			
			?>
					<table>
						<tr>
							<td>
								<?=$value['username']?>
							</td>
							<td>
								<form action="EnviarSolicitacao.php" method="POST">
								<input  hidden="true" type="number" name="id_para"> 
								<button type="submit">Enviar</button>
								</form>
							</td>
							
						</tr>	
					</table>	
			<?php
					}
				} // Fim do usuarios ofline foreach

			?>
	</div>
	<!--Inicio das sugestões -->
	<div style="border: 2px solid red; 
				text-align: left;
			    background-color: lightblue;
	  			padding-left: 80%;
	  			 margin-left: 10%;
	  			 height: auto;
	  			 float:right;">

		<h1>Sugestões para seguir</h1>

			<?php
				
				foreach ($vetorRegistros  as $value) {
					
						if ($value['id'] != $_SESSION['id'] ) {
							
						
			?>
							<table>
								<tr>
									<td>
										<?=$value['username']?>
									</td>
									<td>
										<form action="EnviarSolicitacao.php" method="POST">
											<input  hidden="true" type="number" name="id_para" value="<?=$value['id']?>"> 
											<button type="submit">Enviar</button>
										</form>
									</td>	
								</tr>	
							</table>
			<?php
						
					}
				} //fim das sugestões
			?>
		</div>
<h1>Solicitações</h1>
	<?php
				$sql = "SELECT * FROM solicitacao";
				$sqlprep = $conexao->query($sql);
				$vetorSolicitacao = $sqlprep->fetch_all(MYSQLI_ASSOC);

				$sql2 = "SELECT * FROM usuario";
				$sqlprep = $conexao->query($sql2);
				$vetorUsuario = $sqlprep->fetch_all(MYSQLI_ASSOC);
				
				$contator = 0;

			// aceitar solicitação foreach
			foreach ($vetorSolicitacao as $key) {
				foreach ($vetorUsuario as  $value) {
				
					if ($key['ativo'] == 1) {
						if ($key['id_de'] == $value['id']) {
						
							if ($key['id_para'] == $_SESSION['id']) {

								//echo $value["username"];
	?>
								<table>
									<tr>
										<td><?=$value['username']?></td>
										<td>
											<form action="Aceitar.php" method="POST">	  
												<input hidden="true" type='number' name='id_de' value='<?=$value['id']?>'>
												<button type='submit'>ACEITAR</button>
											</form>
										</td>
									</tr>
								</table>
	<?php 
								$contator = $contator + 1;
								
							}

						}
					}
				}

			}
			// se o amigo aceitar se seguindo, a solicitaçõe é ecluida  nesse codifo e decrementa o contador;
				//$sql5 = "SELECT * FROM amigos";
				//$sqlprep = $conexao->query($sql5);
				//$vetorAmigos = $sqlprep->fetch_all(MYSQLI_ASSOC);

				//foreach ($vetorAmigos as  $teste) {
				//	if ($teste['ativo'] == 1) {
				//		$ativo = $teste['ativo'];
				//		$sql = $conexao->prepare("DELETE  FROM solicitacao where ativo = ?");
				//		$sql->bind_param("i", $ativo);
				//		$sql->execute();
//
//					}
//				}
			
    ?>
<h4>Solicitações <?=$contator ?><br></h4>
	</body>

</html>