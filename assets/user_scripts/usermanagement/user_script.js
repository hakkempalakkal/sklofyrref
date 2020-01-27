
    
  //password matching
  var check = function() {
    if (document.getElementById('password').value ==
      document.getElementById('cpassword').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'password matching';
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'password not matching';
    }
  }
//alert box for user add
function useradd() {

  alert('users added successfully');
}
//alert box for user update
function userupdate() {

  alert('users updated successfully');
  
}
  //email check

  function checkMailStatus(){
    //alert("came");
var email=$("#email").val();// value in field email
$.ajax({
    type:'post',
        url:'checkMail',// put your real file name 
        data:{email: email},
        success:function(data){
        if(data==1)
        {
          document.getElementById('emailmessage').style.color = 'red';
      document.getElementById('emailmessage').innerHTML = 'email already existing';
      //document.getElementById("email").value = "";
         // alert("email already exists"); // your message will come here.     
        }
        else{
       //   alert("email available"); // your message will come here.     
       document.getElementById('emailmessage').style.color = 'green';
       document.getElementById('emailmessage').innerHTML = 'email available';  
      }
      
        }
 });
}

 