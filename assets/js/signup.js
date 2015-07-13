$(document).ready(function () {     
          $('#SignupSimpleIrwin2382').submit(function (event) {
        event.preventDefault();
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        var data = "username="+username+"&email="+email+"&password="+password+"&cpassword="+cpassword;
  $.ajax({
        type: "POST",
              url: "ajax/signup.php",
              data: data,
              timeout:5000,
              dataType: 'json',
               beforeSend: function () {
                $("#alert_error").slideUp("slow");
            },
              success: function(response) {
                var status = response.status
                if (status == "si" ) {
              setTimeout(function () {
              $("#alert_success").text(response.msg);
              $("#alert_success").slideDown("slow");
              setTimeout(function () {
              $(location).attr('href',"index.php"); 
              }, 2000);
          }, 600);              
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
                setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
                        }

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo procesar su solicitud");
            }

      });

    });


      });


