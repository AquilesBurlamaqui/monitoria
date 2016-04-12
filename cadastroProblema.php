<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="third-party/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="third-party/font-awesome-4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
</head>
<body>
    <!-- Login Div -->
    <!-- End of Login Div -->

    <!-- Regiter Div -->
  


    <!-- Home Page Content-->
    <div id="homeContent" style="padding-top: 1rem;">
        <!-- Main Page Content -->
        <!-- Nav Tabs -->
        <ul id="contentTabs" class="nav nav-tabs">
            <li role="presentation" class="active"><a href="index.html" aria-controls="home" role="tab" data-toggle="tab">  Home</a></li>
	    <li role="presentation" class="active"><a href="cadastroProblema.php" aria-controls="home" role="tab" data-toggle="tab">  Cadastro de Problemas</a></li>

        </ul>
        <!-- End of Nav Tabs -->
        <!-- Tab panes -->
            <!-- End of Home Content -->
        </div>
        <!-- End of Tab Panes -->
        <!-- Footer navbar navbar-inverse navbar-fixed-bottom-->
        <table class="homeFooter navbar-fixed-bottom">
            <tr>
                <td align="right" class="copyrightContainer">© 2016 RQueiroz</td>
            </tr>
        </table>
        <!-- End of Footer -->
        <!-- End of Main Page's Content --> 

        <!-- Alert Pop Up -->
        <!-- Modal -->

 		     <form method="post" action="form.php">
            <legend><h1>  Cadastre um problema:</h1></legend>
            <textarea class="input input-xlarge" name="ncode" id="icode" rows=20 cols=60></textarea>
            <input type="submit" value="Enviar">


        </form>

</body>
</html>
