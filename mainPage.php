<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" href="styles.css">
		<title> PAGINA PRINCIPAL </title>
		<meta charset="UTF-8">
		
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<!-------AQUI EU BUSCO NO SITE ANTERIOR O LOGIN DO USUARIO----------->
		<?php
		session_start();

		$login = $_SESSION['login'];
		?>
		<!------AQUI É COMO EU DEVO UTILIZAR DAQUI EM DIANTE QUANDO QUISER SABER QUEM É O USUARIO   <p><?php echo $login;?></p><br> ---> 
		<!----------------->
		
		<div> <span style="float:left;"> Bem vindo, <?php echo $login;?> <a data-toggle="modal" data-target="#myModal">Alterar cadastro</a></span>
			<form method="post" style="text-align:right;">
				<input type="text" name="busca" value="">
				<button class="buttonPesquisa" type="submit"><img src="img/iconeBusca.png" alt="Busca" height="20" width="20"></button>
			</form>
		</div>
		
		<br>
		<div>
			<span style="float:left;">
			
			<fieldset>
			<legend><h2>QUESTÕES COMENTADAS</h2></legend>
			
				<table>
					<tr>
						<th><a onclick="abrirTabela('UFRN')"><img src="img/ufrnLogo.png" alt="UFRN" width="125" height="35" align="center"></a></th>
						<th><button type="button" onclick="abrirTabela('UERN')">UERN</button></th>
						<th><a onclick="abrirTabela('UFERSA')"><img src="img/ufersaLogo.png" alt="UFERSA" width="125" height="35" align="center"></a></th>
					</tr>
				
					<tr class="universidades" id="UFRN">
						<td>
							<a href="lopUfrn.php">ECT2203 - LÓGICA DE PROGRAMAÇÃO</a><br>
							<a href="lipUfrn.php">ECT2303 - LINGUAGEM DE PROGRAMAÇÃO</a><br>
							<a href="estDadoUfrn.php">DCA0204 - ESTRUTURAS DE DADOS</a><br>
							<a href="proAnaAlgoUfrn">DCA0434 - PROJETO E ANÁLISE DE ALGORITMOS</a><br>
						</td>
					</tr>
				</table>
			</fieldset>
			
			</span>
			
			<script>
				function abrirTabela(aux){
					var alvo = document.getElementById(aux);
					if (alvo.style.visibility == "visible"){
						alvo.style.visibility = "collapse";
					}
					else{
						alvo.style.visibility = "visible";
					}
				}
			</script>
			
			<span style="float:right;">
			<fieldset id="fieldSites">
				<legend>Sites para estudo de algoritmos</legend>
				<a href="http://www.codeforces.com" target="_blank"><img src="img/codeforcesLogo.png" alt="CODEFORCES" width="250" height="70" align="center"></a><br><br>
				<a href="http://www.urionlinejudge.com.br" target="_blank"><img src="img/uriLogo.png" alt="URIONLINEJUDGE" width="250" height="70" align="center"></a><br><br>
				<a href="http://br.spoj.com/" target="_blank"><img src="img/spojLogo.png" alt="SPOJBR" width="250" height="70" align="center"></a><br><br>
				<a href="https://uva.onlinejudge.org/" target="_blank"><img src="img/uvaLogo.jpeg" alt="UVAONLINEJUDGE" width="250" height="70" align="center"></a><br><br>
				<a href="https://topcoder.com/" target="_blank"><img src="img/topcoderLogo.png" alt="TOPCODER" width="250" height="70" align="center"></a><br><br>
			</fieldset>
			</span>
		</div>
	</body>
</html>
