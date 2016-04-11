//User object to hold user information
var user = {
    name: "",
    login: "", //email
    logged: false,
    populate: function (data) {
        console.log("in user populate () ");
        console.log(data);
        user.name = data.name;
        user.login = data.email;
        user.logged = true;
        //alert("User initialized!");
        $("#loginContent").hide();
        startMainPage();
    },
    update: function (data) {
        //try {
            user.name = data.name;
            startMainPage();
            setProfileEditingAlert();
            if (alertID !== "profileEditing") {
                setProfileEditingAlert(data.error, data.errorMessage);
            }
            $("#alertModal").modal('show');
        //} catch (e) { alert(e); }
    },
    clear: function () {
        user.name = "";
        user.login = "";
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
                dateObject.getFullYear()
                ];

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
    $("#homeContent").show();
    window.location.href = "#home"
}
//----------------------------------------------------------------

//-------------- Validate Registration Fields --------------------
function verifyRegistrationFields() {
    var errors = false;
    var formContent = document.getElementById("registerModalContent").elements;
    console.log(formContent);
    for (var i = 0; i < formContent.length - 2; i++) {
        var visible = $(formContent[i]).is(":visible");
        if ((visible) && (formContent[i].value === "" )) {
            console.log(formContent[i].id);
            console.log(formContent[i].style.visibility !== "hidden" ? "visible" : "hidden");
            formContent[i].style = "border-color: #ff4d4d";
            errors = true;
        } else {
            formContent[i].style = "border-color: ";
        }
    }
    console.log(errors);
    return errors;
}
//----------------------------------------------------------------

//------------------ Setting Logout Alert ------------------------
function setLogOutAlert() {
    $("#alertTitle").text("Alerta!");
    $("#alertBody").text("Você realmente deseja sair?");
    $("#confirmAlertBtn").text(" Sim");
    $("#closeAlertBtn").text(" Não");
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
    alertID = "logOut";
}
//----------------------------------------------------------------

//------------------ Setting Goodbye Alert ------------------------
function setUpGoodByeAlert() {
    $("#confirmAlertBtn").hide();
    $("#closeAlertBtn").show();

    $("#alertTitle").text("Foi bom ter você conosco!");
    $("#alertBody").html("Esperamos que você volte em breve...");

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
    $("#alertTitle").text("Atenção!");
    var confirmationHtml = "Você realmente quer excluir definitivamente sua conta? <br/>" +
                           "Toda sua informação será perdida e não poderá ser recuperada em possíveis futuras tentativas...";
    $("#alertBody").html(confirmationHtml);
    $("#confirmAlertBtn").text(" Sim");
    $("#closeAlertBtn").text(" Não");
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

    alertID = "delete";
}
//----------------------------------------------------------------

//-------------- Setting Editing Confirmation Alert ---------------
function setProfileEditingAlert(error, errorMessage) {
    try {
        $("#closeAlertBtn").removeClass();
        if (error !== true) {
            $("#alertTitle").text("Alerta!");
            $("#alertBody").text("Suas informações pessoais foram atualizadas com sucesso!");
            $("#closeAlertBtn").addClass("btn btn-primary fa fa-smile-o");
        } else {
            $("#alertTitle").text("Pedimos desculpas...");
            $("#alertBody").text("Infelizmente houve um erro ao tentarmos atualizar seus dados pessoas." +
                                 "Informações sobre o erro: \n" + errorMessage);
            $("#closeAlertBtn").addClass("btn btn-primary fa fa-frown-o");
        }

        $("#closeAlertBtn").text(" OK");
        $("#confirmAlertBtn").hide();
        $("#closeAlertBtn").show();
        alertID = "profileEditing";
    } catch (e) {
        alert(e);
    }
}
//----------------------------------------------------------------

//--------- Changing Register Modal for Profile Editing ----------
function setRegisterModalToEditing() {
    if (registerModalID !== "editing") {
        $("#registrationTitle").text("Edite seu perfil");
        $("#registerName").val(user.name);
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

function setErrorInRegistrationAlert(errorMsg) {
    try {
        $("#alertTitle").text("Alerta!"); 
        $("#alertBody").html(errorMsg);
        $("#confirmAlertBtn").text(" OK"); 
        $("#confirmAlertBtn").removeClass(); 
        $("#confirmAlertBtn").addClass("btn btn-primary fa fa-frown-o"); 

        $("#confirmAlertBtn").unbind("click");
        $("#confirmAlertBtn").on("click", function () {
            try {
                $("#alertModal").modal('hide');
                $("#registerModal").modal('show');
            } catch (e) { console.log("inner error -> "); }
        });

        $("#confirmAlertBtn").show();
        $("#closeAlertBtn").hide();
        alertID = "registrationError";
    } catch (e) { console.log("erro: " + e);}
}

function bind() {
    //---------------------- Default Settings ------------------------
    //Disable autocompletes
    $(":input").attr("autocomplete", "off");
    $(":input").attr("autocapitalize", "off");

    //Setting up register modal
    $("#registerModal").on("shown.bs.modal", function () {
        $("#registerModalContent").focus()
    });
    //Setting up alert modal
    $("#alertModal").on("shown.bs.modal", function () {
        $("#alertModalContent").focus();
    });
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

    //----------------- Opens the Registration modal -----------------
    $("#linkToRegister").on("click", function () {
        $("#registerModal").modal('show');
    });
    //----------------------------------------------------------------

    //------------------- Opens the Logout modal ---------------------
    $("#logOut").on("click", function () {
        if (alertID !== "logOut") {
            setLogOutAlert();
        }
        $("#alertModal").modal('show');
    });
    //----------------------------------------------------------------

    //------------------- Opens Delete modal ---------------------
    $("#deleteAcc").on("click", function () {
        if (alertID !== "delete") {
            setDeleteAlert();
        }
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
        var loginData = $("#loginForm").serialize();
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
            if (registerModalID === "registration") { //Registrando usuário
                function onSuccess(data) {
                    console.log("ajax retornou os seguintes dados dados: ");
                    console.log(data);
                    if (data.output === true) {
                        var login = $("#registerEmail").val();
                        var senha = $("#registerPassword").val();
                        $("#loginEmail").val(login);
                        $("#loginPassword").val(senha);
                        $("#loginForm").trigger("submit");
                        $("#registerModal").modal('hide');
                    } else if (data.output === false) {
                        $("#registerPassword").val("");
                        $("#confirmPassword").val("");
                        if (alertID !== "registrationError") {
                            setErrorInRegistrationAlert(data.message);
                        }
                        try {
                            $("#registerModal").modal('hide');
                            $("#alertModal").modal('show');
                        } catch (e) { alert("aff: "+e);}
                    }
                }
                console.log("chamando ajax");
                ajaxCall("register.php", registerData, onSuccess);
            } else {
                if (registerModalID === "editing") { //Editando dados do usuário
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
    window.location.href = "#login";
    $("#loginAlert").hide();
    $("#homeContent").hide();
    bind(); //Bind functions to body elements
});