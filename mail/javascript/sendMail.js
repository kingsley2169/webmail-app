const messageForm = document.querySelector(".messageForm"),
sendMsgBtn = messageForm.querySelector(".sendMailBtn");

sendMsgBtn.onsubmit = (e)=>{
  e.preventDefault();
}

sendMsgBtn.onclick = ()=>{

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./php/sendMail.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        console.log(data);
        if (data == "Success") {
          alert("Password Successfully Updated")
          document.location.href = '../mail/inbox.php';
        }else{
          alert("Sorry, something went wrong");
        }
      }
    }
  }

  let formData = new FormData(messageForm);
  formData.append('textContent', $('#messageField').html());
  xhr.send(formData);
}

var openImageFile = function(file) {
    var input = file.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var parentI = document.getElementById("messageField");
      parentI.insertAdjacentHTML("beforeend", "<img id='selectedImage' style='width: 100px; height:100px; display:none;'> ");
      var output = document.getElementById('selectedImage');
      output.src = dataURL;
      output.style.display = "block";
    };
    reader.readAsDataURL(input.files[0]);
    console.log(input.files[0].size);
};
