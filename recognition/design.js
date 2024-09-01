$(document).ready(function() {
    $('#passwordError').css('display', 'none');
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });

    $("#show_hide_conpassword a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_conpassword input').attr("type") == "text"){
            $('#show_hide_conpassword input').attr('type', 'password');
            $('#show_hide_conpassword i').addClass( "fa-eye-slash" );
            $('#show_hide_conpassword i').removeClass( "fa-eye" );
        }else if($('#show_hide_conpassword input').attr("type") == "password"){
            $('#show_hide_conpassword input').attr('type', 'text');
            $('#show_hide_conpassword i').removeClass( "fa-eye-slash" );
            $('#show_hide_conpassword i').addClass( "fa-eye" );
        }
    });
    $("#confirmpassword").keyup(validate);
});

function validate() {
  var password = $("#password").val();
  var confirmPassword = $("#confirmpassword").val();
  if (password != confirmPassword){
    $('#passwordError').show();
    return false;
  }else{
    $("#passwordError").hide();
    return true;
  }
}

function signUpUser(){
  var firstname = document.getElementById("firstname").value;
  var lastname = document.getElementById("lastname").value;
  var id = document.getElementById("idNo").value;
  var dept = document.getElementById("dept").value;
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirmPass").value;

}
