$(function() {
  // Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});
$("#show_hide_oldpassword a").on('click', function(event) {
    event.preventDefault();
    if($('#show_hide_oldpassword input').attr("type") == "text"){
        $('#show_hide_oldpassword input').attr('type', 'password');
        $('#show_hide_oldpassword i').addClass( "fa-eye-slash" );
        $('#show_hide_oldpassword i').removeClass( "fa-eye" );
    }else if($('#show_hide_oldpassword input').attr("type") == "password"){
        $('#show_hide_oldpassword input').attr('type', 'text');
        $('#show_hide_oldpassword i').removeClass( "fa-eye-slash" );
        $('#show_hide_oldpassword i').addClass( "fa-eye" );
    }
});

$("#show_hide_newpassword a").on('click', function(event) {
    event.preventDefault();
    if($('#show_hide_newpassword input').attr("type") == "text"){
        $('#show_hide_newpassword input').attr('type', 'password');
        $('#show_hide_newpassword i').addClass( "fa-eye-slash" );
        $('#show_hide_newpassword i').removeClass( "fa-eye" );
    }else if($('#show_hide_newpassword input').attr("type") == "password"){
        $('#show_hide_newpassword input').attr('type', 'text');
        $('#show_hide_newpassword i').removeClass( "fa-eye-slash" );
        $('#show_hide_newpassword i').addClass( "fa-eye" );
    }
});

$("#dropdownMenu1").on("click", function() {
   $('.dropdownLists').toggleClass('dropped');
});
$(document).on('click', '.allow-focus', function (e) {
  e.stopPropagation();
});

const elements = document.querySelectorAll('.editBtn');
elements.forEach( element =>{
  element.addEventListener('click', () =>{
    let command = element.dataset['element'];

    document.execCommand(command, false, null);

  });
});
