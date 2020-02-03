
    //add bank 
    function store()
    {
      var now = moment().format('YYYY-MM-DD h:mm:ss a');
  
      postData = {
        "code": $('#code').val(),
            "bank_name": $('#name').val(),
            "acc_type": $('#acc_type').val(),
            "acc_number": $('#acc-no').val(),
            "iban": $('#iban').val(),
            "opening_bal": $('#opbal').val(),
            "other_info": $('#otherinfo').val(),
            "IsActive":1, 
            "created_date": now
      };

  
      var request = $.ajax({
      url: 'bank-store',
      type: 'POST',
      data: {postData:postData} ,
      dataType: 'JSON'
      });
      request.done( function ( data ) {
      console.log(data)
      
     alert('Bank Created Successfully!');
     window.location.href="bank"
      });
      request.fail( function ( jqXHR, textStatus) {
        // console.log("ghjgbjjh")
        alert('Bank Creation  Failed!');
     
      });
       
    
      }
    //update
    function update()
    {
     // alert("owajdojjse");
      var now = moment().format('YYYY-MM-DD h:mm:ss a');
  
      Data = {
            
        "bank_name": $('#name').val(),
        "acc_type": $('#acc_type').val(),
        "acc_number": $('#acc-no').val(),
        "iban": $('#iban').val(),
        "opening_bal": $('#opbal').val(),
        "other_info": $('#otherinfo').val(),
       
        "updated_at": now
      };
      var postData = {
       postData1: Data,
        id: $('#id').val()
    };
      var request = $.ajax({
      url: 'bank-update',
      type: 'POST',
      data: {postData:postData} ,
      dataType: 'JSON'
      });
      request.done( function ( data ) {
        console.log(data)

     alert('bank updated Successfully!');
     window.location.href="bank"
      });
      request.fail( function ( jqXHR, textStatus) {
        // console.log("ghjgbjjh")
        alert('bank updation failed!');
     
      });
  
    }
    //check already existing acc no

  function checkacc(){
    // alert("came");
var accno=$("#acc-no").val();// value in field acc no

$.ajax({
    type:'post',
        url:'check-account',// put your real file name 
        data:{acc_number: accno},
        success:function(data){
        if(data==1)
        {
         //  alert("cameftghfgh");
          document.getElementById('accmessage').style.color = 'red';
      document.getElementById('accmessage').innerHTML = 'account already existing';
      document.getElementById("acc-no").value = "";
         // alert("email already exists"); // your message will come here.     
        }
      //   else{
      //  //   alert("came");
      //  //   alert("email available"); // your message will come here.     
      //  document.getElementById('accmessage').style.color = 'green';
      //  document.getElementById('accmessage').innerHTML = 'account number available';  
      // }
      
        }
 });
}