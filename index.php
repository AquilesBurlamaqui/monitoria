<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<title>Login Page</title>

<link href="styles.css" rel="stylesheet" type="text/css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

</head>
<body id="b">

<form action="" method="post">
<div class="container text-center" id="cont">
    <br><br>
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary text-center">
            <div class="panel-heading text-center">Login Page</div>
            <div class="panel-body text-center">
              <fieldset>
		<br>
		<font id="sizes">
    		E-mail:<br>
    		<input type="text" name="email" id="email">
    		<br><br>
    		Password:<br>
    		<input type="password" name="pw" id="pw">
    		<br><br>
		<input type="submit" value="Entrar" class="btn btn-primary" role="button">
		<?php
		$_SESSION['login'] = "";
		?>
		<a class="btn btn-primary" href="register.php" role="button">Cadastre-se</a>
		<br><br></font>
  	     </fieldset>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>

</body>
</html>

<script>
$(document).ready(function(){
    $('form').submit(function(ev){
        var x = $('form').serialize();
        ev.preventDefault();
        $.ajax({
                url: 'log.php',
                type: 'POST',
		dataType: 'text',
                data: x,
        })
        .done(function(x) {
		var y = JSON.stringify(x);
		str = y.replace(/"/g, "");
		if (str.match(/erro/)){
			var n = str.split(":");
			alert(n[1]);
		}
                else {
			document.location.href = str;
		}
        })
	
    });
});

</script>