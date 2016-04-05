$(document).ready(function(){
	$("#nome_usuario").blur(function(){
		var nome = $("#nome_usuario").val().trim();
		var email = "";
		var senha = "";
		var codigo = 3;

		$.ajax({
			type: "post",
			dataType: "json",
			url: "inserir_usuario.php",
			asyc: true,
			data: {post_nome: nome, post_email:email, post_senha: senha, post_codigo: codigo},
			encode: true,
			success: function(data)
			{
				if(data.status == 'success')
				{
					//alert("ja cadastrado");
   				}
				else if(data.status == 'error')
				{
					$("#email_usuario").removeAttr('disabled');
					$("#senha_usuario").removeAttr('disabled');
  				}	
			} 
		});
	});
});

/*=============================================================================*/

$(document).ready(function(){
	$('.message a').click(function(){
		$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
	});
});

/*=============================================================================*/

$(document).ready(function(){
        $("#editar_perfil").click(function(){
		$("#nome_login_atualizar").val('');
		$("#email_login_atualizar").val('');
		$("#senha_login_atualizar").val('');

		$("#nome_login_atualizar").fadeIn("fast");
		$("#email_login_atualizar").fadeIn("fast");
		$("#senha_login_atualizar").fadeIn("fast");
		$("#bt_atualizar").fadeIn("slow");
        });
});

/*=============================================================================*/

$(document).ready(function(){
	$("#sair").click(function(){
		$.ajax({
                        type: "post",
                        dataType: "json",
                        url: "logout.php",
                        asyc: true,
                        encode: true,
			success: function(data)
                        {
                                if(data.status == 'success')
                                {
                                        window.location.href= "index.php";
                                }
                        }
		});

	});
});

/*=============================================================================*/

$(document).ready(function() {
	$("#formulario_atualizacao").validate({
		rules:{
			nome_login_atualizar:{
        			required: false, minlength: 2
    	  		},
			email_login_atualizar:{
				required: false, email: true
      			},
      			senha_login_atualizar:{
				required: false, minlength: 2
      			}
   	 	},
   		messages:{
			nome_login_atualizar:{
       		 		required: "O campo nome é obrigatório"
      			},
			email_login_atualizar: {
        			required: "O campo email é obrigatório.",
         			email_usuario: "Digite um email válido."
        		},
      		  	senha_login_atualizar: {
                		required: "O campo senha é obrigatório."
       		 	}
		}
	});
});

/*=============================================================================*/

$(document).ready(function() {
	$("#formulario_cadastro").validate({
		rules:{
			nome_usuario:{
        			required: true, minlength: 3
    	  		},
			email_usuario:{
				required: true, email: true
      			},
      			senha_usuario:{
				required: true, minlength: 6
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
			var senha = $("#senha_usuario").val().trim();
			var codigo = 1;
		
			$.ajax({
				type: "post",
				dataType: "json",
				url: "inserir_usuario.php",
				asyc: true,
				data: {post_nome: nome, post_email:email, post_senha: senha, post_codigo: codigo},
				encode: true,
				success: function(data)
				{
					if(data.status == 'success')
					{
     						$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
						$('#nome_usuario').val('');
	               	 			$('#email_usuario').val('');
	               	 			$('#senha_usuario').val('');
						$("#nome_login").val(nome);
						$("#senha_login").val(senha);
						$('#email_usuario').attr("disabled", "disabled");
						$('#senha_usuario').attr("disabled", "disabled");
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
				//alert(data);
			});
		}
	});
});

//atualizar cadastro
$(document).ready(function(){
	$("#bt_atualizar").click(function(){
		if( $("#formulario_atualizacao").valid() )
		{
		var nome = $("#nome_login_atualizar").val().trim();
		var email = $("#email_login_atualizar").val().trim();
		var senha = $("#senha_login_atualizar").val().trim();
		var codigo = 2;
		
			$.ajax({
				type: "post",
				dataType: "json",
				url: "inserir_usuario.php",
				asyc: true,
				data: {post_nome: nome, post_email:email, post_senha: senha, post_codigo: codigo},
				encode: true,
				success: function(data)
				{
					if(data.status == 'success')
					{
						$("#nome_login_atualizar").fadeOut("fast");	
						$("#email_login_atualizar").fadeOut("fast");	
						$("#senha_login_atualizar").fadeOut("fast");	
						$("#bt_atualizar").fadeOut("slow");

						$("#nome_login_atualizar").val('');
                                                $("#email_login_atualizar").val('');
                                                $("#senha_login_atualizar").val('');
						
						$("#nome_login_atualizar").val('');
                                                $("#email_login_atualizar").val('');
                                                $("#senha_login_atualizar").val('');	

						window.location.reload();
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
		var nome_login = $("#nome_login").val().trim();
		var senha_login = $("#senha_login").val().trim();
		
		$.ajax({

			type: "post",
			dataType: "json",
			url: "buscar_login.php",
			asyc: true,
			data: {post_nome: nome_login, post_senha: senha_login},
			encode: true,
			success: function(data)
			{
				if(data.status == 'success')
				{
					window.location.href= "perfil.php";
				}
				else if(data.status == 'error')
				{
					$("#error-div").show();
					$("#error-div").fadeOut(3000);
   		 		}	
			}
			
		});
	});
});

/*=============================================================================*/
