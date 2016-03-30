/*=============================================================================*/

$(document).ready(function()
{
	$('.message a').click(function(){
		$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
	});
});

/*=============================================================================*/

$(document).ready(function() {
	$("#formulario_cadastro").validate({
		rules:{
			nome_usuario:{
        			required: true, minlength: 2
    	  		},
			email_usuario:{
				required: true, email: true
      			},
      			senha_usuario:{
				required: true, minlength: 2
      			}
   	 	},
   		messages:{
			nome_usuario:{
       		 		required: "O campo nome é obrigatório"
      			},
			email_usuario: {
        			required: "O campo email é obrigatório.",
         			email_usuario: "Digite um email válido."
        		},
      		  	senha_usuario: {
                		required: "O campo senha é obrigatório."
       		 	}
		}
	});
});

/*=============================================================================*/

//enviar formulario de cadastro
$(document).ready(function()
{
	$("#bt_cadastrar").click(function()
	{
		if( $("#formulario_cadastro").valid() )
		{
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
     					$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
					$('#nome_usuario').val('');
	                		$('#email_usuario').val('');
	                		$('#senha_usuario').val('');
					$("#email_login").val(email);
					$("#senha_login").val(senha);
    				}
				else if(data.status == 'error')
				{
        				alert("usuario não inserido");
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
		}
	});
});


/*=============================================================================*/

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

/*=============================================================================*/
