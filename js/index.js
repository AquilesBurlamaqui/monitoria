$("#cadastra_problema").on("click", function () {
        $("#cadastro_problema").modal('show');
    });

$(document).ready(function(){
	$("#bt_cadastrar").click(function(){
		var post_problema = $("#input_problema").val().trim();
		var nome_usuario = user.name;
		$.ajax({
                        type: "post",
                        dataType: "json",
                        url: "cadastraproblema.php",
                        asyc: true,
			data: {problema: post_problema, nomeUsuario: nome_usuario},
			encode: true,
			success: function(data)
                        {
                                if(data.status == 'success')
                                {
					$("#cadastro_problema").modal('hide');
					alert("cadastrado");
					//alert(user.name);
                         	}
				else
				{
					alert("erro " + data.error);
				}
                        }
		});

	});
});


//User object to hold user information
var user = {
    name: "",
    login: "", //email
    about: "",
    location: "",
    logged: false,
    populate: function (data) {
        console.log("in user populate () ");
        console.log(data);
        user.name = data.name;
        user.login = data.email;
        user.about = data.about;
        user.location = data.location;
        user.logged = true;
        //alert("User initialized!");
        $("#loginContent").hide();
        startMainPage();
    },
    update: function (data) {
        //try {
            user.name = data.name;
            user.about = data.about;
            user.location = data.location;
            startMainPage();
            setProfileEditingAlert();
            if (alertID !== "profileEditing") {
                setProfileEditingAlert(data.error, data.errorMessage);
            }
            alertID = "profileEditing";
            $("#alertModal").modal('show');
        //} catch (e) { alert(e); }
    },
    clear: function () {
        user.name = "";
        user.login = "";
        user.about = "";
        user.location = "";
        user.logged = false;
    }
}

var alertID = "";
var registerModalID = "registration";

//------------- General function for an Ajax request -------------
function readableDate(dateObject) {

    var time = [dateObject.getHours(),
                dateObject.getMinutes(),
                dateObject.getSeconds(),
                dateObject.getDate(),
                dateObject.getMonth(),
                dateObject.getFullYear()];

    for (var i = 0; i < time.length - 1; i++) {
        if (time[i] < 10) {
            time[i] = "0" + time[i];
        }
    }

    //hh:mm:ss - day/month/year
    return time[0] + ":" + time[1] + ":" + time[2] + " - " + time[3] + "/" + time[4] + "/" + time[5];
}
//----------------------------------------------------------------

//------------- General function for an Ajax request -------------
function ajaxCall(link, dataToBeUsed, successFunc) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: link,
        data: dataToBeUsed,
        success: function (dataRetrieved) {
            successFunc(dataRetrieved);
        }
    });
}
//----------------------------------------------------------------

//------------------ Populate Main Page divs ---------------------
function startMainPage() {
    var welcomeText = "Welcome " + user.name + "!";
    $("#welcomeDiv").text(welcomeText);
    $("#fromDiv").text(user.location);
    $("#aboutDiv").text(user.about);
    $("#homeContent").show();
    window.location.href = "#home"
}
//----------------------------------------------------------------

//-------------- Validate Registration Fields --------------------
function verifyRegistrationFields() {
    var errors = false;
    var formContent = document.getElementById("registerModalContent").elements;
    console.log(formContent);
    for (var i = 0; i < formContent.length - 3; i++) {
        var visible = $(formContent[i]).is(":visible");
        if ((visible) && (formContent[i].value === "" || formContent[i].value == "-1")) {
            console.log(formContent[i].id);
            console.log(formContent[i].style.visibility !== "hidden" ? "visible" : "hidden");
            formContent[i].style = "border-color: #ff4d4d";
            errors = true;
        }else{
       	 formContent[i].style = "border-color: ";
        }
    }
    console.log(errors);
    return errors;
}
//----------------------------------------------------------------

//------------------ Setting Logout Alert ------------------------
function setLogOutAlert() {
    $("#alertTitle").text("Alert");
    $("#alertBody").text("Do you really want to leave?");
    $("#confirmAlertBtn").text(" Yes");
    $("#closeAlertBtn").text(" No");
    $("#confirmAlertBtn").removeClass();
    $("#closeAlertBtn").removeClass();
    $("#confirmAlertBtn").addClass("btn btn-primary fa fa-frown-o");
    $("#closeAlertBtn").addClass("btn btn-default fa fa-smile-o");

    $("#confirmAlertBtn").unbind("click");
    $("#confirmAlertBtn").on("click", function () {
        user.clear();
        window.location.reload();
    });

    $("#confirmAlertBtn").show();
    $("#closeAlertBtn").show();
}
//----------------------------------------------------------------

//------------------ Setting Goodbye Alert ------------------------
function setUpGoodByeAlert() {
    $("#confirmAlertBtn").hide();
    $("#closeAlertBtn").show();

    $("#alertTitle").text("It was good having you with us!");
    $("#alertBody").html("We hope you're back soon.");

    $("#closeAlertBtn").text(" OK");
    $("#closeAlertBtn").removeClass();
    $("#closeAlertBtn").addClass("btn btn-default fa fa-smile-o");

    $("#closeAlertBtn").unbind("click");
    $("#closeAlertBtn").on("click", function () {
        user.clear();
        window.location.reload();
    });
}
//----------------------------------------------------------------

//------------------ Setting Delete Alert ------------------------
function setDeleteAlert() {
    $("#alertTitle").text("Careful...");
    var confirmationHtml = "Do you really want to delete your account? <br/>" +
                           "You should have in mind that ALL your information will be gone from our servers :/";
    $("#alertBody").html(confirmationHtml);
    $("#confirmAlertBtn").text(" Yes");
    $("#closeAlertBtn").text(" No");
    $("#confirmAlertBtn").removeClass();
    $("#closeAlertBtn").removeClass();
    $("#confirmAlertBtn").addClass("btn btn-primary fa fa-frown-o");
    $("#closeAlertBtn").addClass("btn btn-default fa fa-smile-o");

    $("#confirmAlertBtn").unbind("click");
    $("#confirmAlertBtn").on("click", function () {
        var onSuccess = function (data) {
            setUpGoodByeAlert();
            console.log(data);
        }

        var deleteData = encodeURI("user=" + user.login);
        
        ajaxCall("delete.php", deleteData, onSuccess);
    });

    $("#confirmAlertBtn").show();
    $("#closeAlertBtn").show();
}
//----------------------------------------------------------------

//-------------- Setting Editing Confirmation Alert ---------------
function setProfileEditingAlert(error, errorMessage) {
    try {
        $("#closeAlertBtn").removeClass();
        if (error !== true) {
            $("#alertTitle").text("Alert");
            $("#alertBody").text("Your personal information has been successfully updated!");
            $("#closeAlertBtn").addClass("btn btn-primary fa fa-smile-o");
        } else {
            $("#alertTitle").text("We're Sorry!");
            $("#alertBody").text("There was an error while updating your information: " + errorMessage);
            $("#closeAlertBtn").addClass("btn btn-primary fa fa-frown-o");
        }

        $("#closeAlertBtn").text(" OK");
        $("#confirmAlertBtn").hide();
        $("#closeAlertBtn").show();
    } catch (e) {
        alert(e);
    }
}
//----------------------------------------------------------------

//--------- Changing Register Modal for Profile Editing ----------
function setRegisterModalToEditing() {
    if (registerModalID !== "editing") {
        $("#registrationTitle").text("Profile Editing");
        $("#registerName").val(user.name);
        $("#registerAbout").val(user.about);
        $("#registerBtn").text("Submit");
        $("#registerEmail").val(user.login);

        $("#emailGroup").hide();
        $("#passwordGroup").hide();
        $("#confirmPasswordGroup").hide();

        registerModalID = "editing";
        console.log("here");
    }
}
//----------------------------------------------------------------


function bind() {
    //---------------------- Default Settings ------------------------
    //Disable autocompletes
    $(":input").attr("autocomplete", "off");
    $(":input").attr("autocapitalize", "off");

    //Initialize location dropdowns
    populateCountries("registerCountry", "registerState");
    //----------------------------------------------------------------

    //-------- Bind function on checkbox to see the password ---------
    $("#seePass").on("change", function () {
        var pass = $("#loginPassword");
        if ($("#seePass").is(":checked")) {
            pass.attr("type","text");
        } else {
            pass.attr("type", "password");
        }
    });
    //----------------------------------------------------------------

    //------ Bind function on edit button for profile editing --------
    $("#editProfile").on("click", function () {
        setRegisterModalToEditing();
        $("#registerModal").modal('show');
    });
    //----------------------------------------------------------------

    //----------------- Setting up register modal --------------------
    $("#registerModal").on("shown.bs.modal", function () {
        $("#registerModalContent").focus()
    });

    $("#linkToRegister").on("click", function () {
        $("#registerModal").modal('show');
    });
    //----------------------------------------------------------------

    //------------------- Setting up LogOut modal ---------------------
    $("#alertModal").on("shown.bs.modal", function () {
        $("#alertModalContent").focus()
    });

    $("#logOut").on("click", function () {
        if (alertID !== "logOut") {
            setLogOutAlert();
        }
        alertID = "logOut";
        $("#alertModal").modal('show');
    });
    //----------------------------------------------------------------

    //------------------- Setting up Delete modal ---------------------
    $("#deleteAcc").on("click", function () {
        if (alertID !== "delete") {
            setDeleteAlert();
        }
        alertID = "delete";
        $("#alertModal").modal('show');
    });
    //----------------------------------------------------------------

    //------------------- Ajax call to perform login -----------------
    var successFulLogin = function (data) {
        $("#loginPassword").val("");
        if (data !== null) {
            $("#loginEmail").val("");
            user.populate(data);
        } else {
            $("#loginAlert").show();
            $("#loginAlert").fadeOut(3500);
        }
    }
    $("#loginForm").submit(function () {
        var loginData = $(this).serialize();
        console.log(loginData);

        ajaxCall("login.php", loginData, successFulLogin);
        return false;
    });
    //----------------------------------------------------------------

    //------------- Ajax call to performe registration ---------------
    $("#registerModalContent").submit(function () {
        var isValid = !verifyRegistrationFields();
        if (isValid) {
            var registerData = $(this).serialize();
            console.log(registerData);
            if (registerModalID === "registration") {
                function onSuccess(data) {
                    var login = $("#registerEmail").val();
                    var senha = $("#registerPassword").val();
                    $("#loginEmail").val(login);
                    $("#loginPassword").val(senha);
                    $("#loginForm").trigger("submit");
                    $("#registerModal").modal('hide');
                }
                
                ajaxCall("register.php", registerData, onSuccess);
            } else {
                if (registerModalID === "editing") {
                    function onSuccess(data) {
                        try {
                            $("#registerModal").modal('hide');
                            if (data.error === false) {
                                user.update(data);
                            } else {
                                setProfileEditingAlert(data.error, data.errorMessage);
                            }
                        } catch (e) { alert(e); }
                    }

                    ajaxCall("edit.php", registerData, onSuccess);
                }
            }
        } else {
            alert("Please fill the empty fields!");
        }
        return false;
    });
    //----------------------------------------------------------------

    //----------------------------------------------------------------
    
    $("#publishBtn").on("click", function () {
        try {
            var thinking = $("#thinkingArea").val();
            //console.log(thinking);
            if (thinking !== "") {
                $("#thinkingArea").val("");
                //var date = readableDate(new Date());
                //console.log(date);
                var htmlString = "<table class='thought'>" +
                                    "<tr>" +
                                        "<td align='right' style='padding-top: 0.3rem;'>" +
                                            readableDate(new Date()) +
                                        "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td class='thinkingText'>" +
                                            thinking +
                                        "</td>" +
                                    "</tr>" +
                                 "</table>";
                var previousHtml = $("#thinkingsList").html();
                console.log(htmlString + previousHtml)
                $("#thinkingsList").html(htmlString + previousHtml);
            }
        } catch (e) {
            alert(e);
        }
    });
    //----------------------------------------------------------------
}

$(function () {
    //$("#homeContent").hide();

    //Bind functions to body elements
    window.location.href = "#login";
    $("#loginAlert").hide();
    $("#homeContent").hide();
    bind();
});
