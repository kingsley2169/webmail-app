const messageListItem = document.querySelector(".messageList");
var table = document.getElementById("tableID");

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
        placement : 'bottom'
    });
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/important.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          messageListItem.innerHTML = data;
          ifImportant();
          ifTask();
        }
      }
    }
    xhr.send();
    getMessageId();
});


function getMessageId(){
  $('#tableID').on('click', function(e){
    var id = $(e.target).closest('tr').find(".messageIdNum").html();
    document.location.href = './message.php?sendMessageId='+id;

  });
}


function isImportant(e){
  var isImportant = $(e.target).closest('tr').find(".messageImportant").html();
  var id = $(e.target).closest('tr').find(".messageIdNum").html();
  var dataString = {msgId: id, importantValue: isImportant};
  $.ajax({
    type: "POST",
    url: './php/importantSettings.php',
    data: dataString,
    cache: false,
    success: function(data){
      if (data == "Made true") {
        $(e.target).removeClass("fa-regular fa-star");
        $(e.target).addClass("fa-solid fa-star");
        location.reload();
      }else {
        $(e.target).removeClass("fa-solid fa-star");
        $(e.target).addClass("fa-regular fa-star");
        location.reload();
      }
      console.log(data);
    },
    error: function(xhr, status, error){
      console.log(error);
    }
  });
}

function ifImportant(){
  var td = document.getElementsByClassName('messageImportant');
	var tdLength = td.length;
  var arr = [];
  for (var i = 0; i < tdLength; i++) {
    if (td[i].innerHTML.indexOf("False") !== -1) {
      document.querySelectorAll('#importantClick')[i].insertAdjacentHTML("beforeend", '<i onclick="isImportant(event)" class="fa-regular fa-star" aria-hidden="true"</i>');
    }else{
      document.querySelectorAll('#importantClick')[i].insertAdjacentHTML("beforeend", '<i onclick="isImportant(event)" class="fa-solid fa-star" aria-hidden="true"</i>');
    }
  }
}

function isTask(e){
  var isTask = $(e.target).closest('tr').find(".messageTask").html();
  var id = $(e.target).closest('tr').find(".messageIdNum").html();
  var dataString = {msgId: id, taskValue: isTask};
  $.ajax({
    type: "POST",
    url: './php/taskSettings.php',
    data: dataString,
    cache: false,
    success: function(data){
      if (data == "Made true") {
        $(e.target).removeClass("fa-regular fa-circle-check");
        $(e.target).addClass("fa-solid fa-circle-check");
        location.reload();
      }else {
        $(e.target).removeClass("fa-solid fa-circle-check");
        $(e.target).addClass("fa-regular fa-circle-check");
        location.reload();
      }
      console.log(data);
    },
    error: function(xhr, status, error){
      console.log(error);
    }
  });
}


function ifTask(){
  var td = document.getElementsByClassName('messageTask');
	var tdLength = td.length;
  var arr = [];
  for (var i = 0; i < tdLength; i++) {
    if (td[i].innerHTML.indexOf("False") !== -1) {
      document.querySelectorAll('#taskClick')[i].insertAdjacentHTML("beforeend", '<i onclick="isTask(event)" class="fa-regular fa-circle-check" aria-hidden="true"</i>');
    }else{
      document.querySelectorAll('#taskClick')[i].insertAdjacentHTML("beforeend", '<i onclick="isTask(event)" class="fa-solid fa-circle-check" aria-hidden="true"</i>');
    }
  }
}
