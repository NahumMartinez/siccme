$(document).ready(function () {     
          $('#LoginSimpleIrwin2382').submit(function (event) {
        event.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();
        var data = "username="+username+"&password="+password;
  $.ajax({
        type: "POST",
              url: "ajax/login.php",
              data: data,
              timeout:3000,
              dataType: 'json',
               beforeSend: function () {
                $("#alert_error").slideUp("slow");
                // Efecto de Carga en Espera
                $("#div_carga").show();
            },
              success: function(response) {
                var status = response.status
                if (status == "si" ) {
              setTimeout(function () {
                    $("#alert_success").text(response.msg);
                    $("#alert_success").slideDown("slow");
					setTimeout(function () {
                    $(location).attr('href',"index.php");
	      }, 600);
              // Oculta el Loader
              $("#div_carga").hide();
              
          }, 600);              
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
                setTimeout(function () { $("#alert_error").slideUp("slow");
							// Efecto de Carga en Espera
							$("#div_carga").hide();}, 800);
				//alert('Error; Los Datos Introducidos no son los Correctos');
				$("#ver").css({"display":"inline"});
				$("#username").focus();
                        }

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); 
				// Efecto de Carga en Espera
                $("#div_carga").hide();}, 800);
              $("#alert_error").text("No se pudo procesar su solicitud");
            }

      });

    });


      });

