<?php
   // Start the session
   session_start();
   if($_SESSION["login"]!=true) 
      echo "Usuário não logado";
   else {

?>
<!DOCTYPE html>
<html>
<head>
<title>Monitoria</title>
<meta charset="utf-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
		     $('#myModal').click(function(){
			$('#myModalDois').fadeIn('fast',1);
			});			
		
		});

		


	</script>

	<script type="text/javascript">
			 $(function(){
				$('.formulario').submit(function(){
					$.ajax({
						url: 'cadastrar_problema.php',
						type: 'POST',
						data: $('.formulario').serialize(),
						success: function(data){}
						
						});
					
					
					return false;
					});
		});
	</script>



</head>
<body>
<div class ="container">
	<a class="btn btn-info btn-lg" href="listar_usuarios.php">Listar Usuário</a>
	<a class="btn btn-info btn-lg" href="listar_problemas.php">Listar Problemas</a>
	<!-- <a href="form_problema.php">Cadastrar Problema</a> -->
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Cadastrar Problema</button>

	<a class="btn btn-info btn-lg" href="logout.php">Logout</a> 

</div>
<div class="container">

<h1>Esta é a página do nosso sistema de monitoria</h1>
<p>Bem vindo, <?php echo $_SESSION["nome"]?></p>
<p>A Monitoria interliga monitores e alunos em busca de soluções para problemas</p>

</div>

<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">CADASTRO DE PROBLEMA</h4>
        </div>
        <div class="modal-body">
	 
	<form id="formulario" method="POST" action="">
        	  Definição:</br>
          	<textarea name="definicao" rows="20" cols="40">
         	 </textarea>
         	 <input type="submit" class = "btn btn-success" value="submit"/>
	 </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>





</body>
</html> 

<?php
  }
?>
