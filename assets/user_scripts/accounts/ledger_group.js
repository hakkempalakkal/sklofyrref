//add ledger group
function store()
{
 
// alert("ivdethi");

  postData = {
   
        "Type": $('#ledger_type').val(),
        "GroupName": $('#ledger_name').val()
       
  };


  var request = $.ajax({
  url: 'ledger-group',
  type: 'POST',
  data: {postData:postData} ,
  dataType: 'JSON'
  });
  request.done( function ( data ) {
  
    if(!alert('Ledger group Created Successfully!')){window.location.href="create-ledger-group"}
    });
    request.fail( function ( jqXHR, textStatus) {
      window.location.reload()
      alert('Ledger group Created Successfully!');

 
      if (jqXHR.responseText=="success")
      {
       if(!alert('Ledger group Created Successfully!')){window.location.href="create-ledger-group"}
   
      }
    });

  }
function getdata()
{
 // alert(0);
postData=$('#ledger_type').val();
var request = $.ajax({
  url: 'list-ledger-group/'+postData,
  type: 'GET',
  dataType: 'JSON'
  });
  request.done( function ( data ) {
    console.log(data);
  
  $("#listvalue").html("");
  
  $.each(data, function(index, value,data){
    $("#listvalue").append('<tr><td>'+value.GroupName+'</td></tr>');
});
 
  });

   

}
function listdebit()
{
 // alert(0);
postData=$('#ledger_type').val();
var request = $.ajax({
  url: 'list-ledger-group/'+postData,
  type: 'GET',
  dataType: 'JSON'
  });
  request.done( function ( data ) {
    console.log(data);
  
  $("#listvalue").html("");
  
  $.each(data, function(index, value,data){
    $("#listvalue").append('<tr><td>'+value.GroupName+'</td></tr>');
});
 
  });

   

}
