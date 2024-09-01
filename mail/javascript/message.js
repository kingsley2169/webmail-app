$(document).ready(function(){

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/message.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          console.log(data);
        }
      }
    }
    xhr.send();
});
