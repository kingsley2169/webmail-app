const passwordform = document.querySelector(".updatePassword form"),
passwordBtn = passwordform.querySelector(".btnP button");

passwordform.onsubmit = (e)=>{
  e.preventDefault();
}

passwordBtn.onclick = ()=>{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./php/passsettings.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        console.log(data);
        if (data == "Success") {
          alert("Password Successfully Updated")
          document.location.href = '../mail/settings.php';
        }else{
          alert("Sorry, something went wrong");
        }
      }
    }
  }
  let formData = new FormData(passwordform);
  xhr.send(formData);
}

const deptform = document.querySelector(".updateDepartment form"),
deptBtn = deptform.querySelector(".btnD button");

deptform.onsubmit = (e)=>{
  e.preventDefault();
}

deptBtn.onclick = () =>{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./php/deptsettings.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        console.log(data);
        if (data == "Success") {
          alert("Department Successfully Updated")
          document.location.href = '../mail/settings.php';
        }else{
          alert("Sorry, something went wrong");
        }
      }
    }
  }
  let formData = new FormData(deptform);
  xhr.send(formData);
}
