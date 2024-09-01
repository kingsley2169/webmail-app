const form = document.querySelector(".signup-details form"),
continueBtn = form.querySelector(".btn button");

form.onsubmit = (e)=>{
  e.preventDefault();
}

continueBtn.onclick = ()=>{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/login.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        if (data === "Success") {
          document.location.href = '../mail/inbox.php';
        }else{
          alert('Error: ' + xhr.status);
        }
      }
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}
