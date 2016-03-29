$(document).ready(function()
{
	$('.message a').click(function(){
		$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
		//alert("teste");
	});
});

/*
//enviar formulario de cadastro
$(document).ready(function()
{
	$("#bt_cadastrar").click(function()
	{
		alert("carregou");
		
		var nome = $("#nome_usuario").val().trim();
		var email = $("#email_usuario").val().trim();
		var senha = $("#senha_usuario").val().trim();
		
		var dadosFormulario = $("#formulario_cadastro").serialize();
		
		$.ajax({
			type: "post",
			dataType: "json",
			url: "inserir_usuario.php",
			asyc: true,
			data: {n: nome, e:email, s: senha },
			encode: true,
			success: function(data)
			{
				if(data.status == 'success')
				{
     					alert("cadastro concluido");
					window.location='login.php';
    				}
				else if(data.status == 'error')
				{
        				alert("deu ruim! usuario noa inserido");
   		 		}	
			}, 
			error: function(x, e)
			{	
				if (x.status == 0)
				{
     					alert('You are offline!!\n Please Check Your Network.');
    				}
				else if(x.status==404)
				{
       					 alert('Requested URL not found.');
  				}
				else if(x.status==500)
				{
       	 				alert('Internel Server Error.');
    				}
				else if(e=='parsererror') 
				{
       	 				alert('Error.\nParsing JSON Request failed.');
    				}
				else if(e=='timeout')
				{
   					alert('Request Time out.');
    				}
				else
				{
        				alert('Erro desconhecido.\n'+x.responseText);
    				}
			}
		}).done(function(data){
			if(response.status)
			{
				alert('Registo bem Sucedido!');
        		}
			else
			{
            			alert('Uups! Ocorreu algum erro!');
        		}

    		}).fail(function(xhr, desc, err) {
        	        alert('Uups! Ocorreu algum erro!');
			alert(data);
		});
	});
});

//validar login
$(document).ready(function()
{
	$("#bt_login").click(function()
	{
		//alert("carregou");
		//$("#bt_login").hide();
		//$("#img_loading").show();
		//$("#img_loading").fadeIn(500);
		
		var login = $("#email_login").val().trim();
		var senha_login = $("#senha_login").val().trim();
		
		//alert(login);
		//alert(senha_login);

		$.ajax({

			type: "post",
			dataType: "json",
			url: "buscar_login.php",
			asyc: true,
			data: {l: login, s: senha_login},
			encode: true,
			success: function(data)
			{
				if(data.status == 'success')
				{
					//alert("ok");
     					$("#sucesso").show();
					//$("#sucesso").css("background-color", "green");
					//$("#sucess").text("Sucesso");
					$("#sucesso").fadeOut(3000);
					//$("#img_loading").hide();
                       	                //$("#bt_login").show();
				}
				else if(data.status == 'error')
				{
					//alert("fail");
					$("#error-div").show();
					//$("#sucesso").text("usuario e ou senha incorretos");
					//$("#sucesso").css("background-color", "red");
					$("#error-div").fadeOut(3000);
					//$("#img_loading").hide();
					//$("#bt_login").show();
   		 		}	
			}
			
		});
	});
});
*/
