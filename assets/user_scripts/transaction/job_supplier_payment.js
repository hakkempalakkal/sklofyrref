
$( document ).ready(function() {
    $('#chequeno').addClass("hidden");
    $('#chequedate').addClass("hidden");
    $('#bank').addClass("hidden");
    $('#transac_id').addClass("hidden");
  });

  function visible_paymode_details()
  {
     
     var selected_value = $('#type').val();
 // alert(selected_value);
     if(selected_value=="cheque")
     {
       $('#chequeno').removeClass("hidden");
       $('#chequedate').removeClass("hidden");
       $('#bank').removeClass("hidden");
       $('#transac_id').addClass("hidden");
     }
    else if(selected_value=="electronic")
     {
        $('#chequeno').addClass("hidden");
        $('#chequedate').addClass("hidden");
       $('#bank').removeClass("hidden");
       $('#transac_id').removeClass("hidden");
              
     }
     else{
        $('#chequeno').addClass("hidden");
        $('#chequedate').addClass("hidden");
        $('#bank').addClass("hidden");
        $('#transac_id').addClass("hidden");
     }
     
   }
   //to get cilent details
   function clientdetails()
  { 
  
  postData=$('#inv_id').val();
//    alert(postData);
  var request = $.ajax({
    url: '../job-supplier-payment-get-client-details/'+postData,
    type: 'GET',
    dataType: 'JSON'
    });
    request.done( function (result) {
      // console.log(result);
    var values=JSON.stringify(result);
    $("#details").val(result[0].client_name+'-'+result[0].JobId);
   $("#job_no").val(result[0].JobId);
$("#amount").val(result[0].GrandTotal);
  console.log(result[0].client_name);
  console.log(result[0].JobId);
    });
  
  }
  
  function insert_job_supplier_payment()
{
  if($('#inv_id,#unit_price,#conv_factor').val() == ''){
    alert('Insert all fields');
 }
else{
  insertRow();
}
}

$(document).on("click", '.rmvbutton', function() {
         
  $(this).closest("tr").remove();
  calculates();
return false;
});
function insertRow()
{
//   var descID=0;
    var invid= $("#inv_id").val();
    var details=$("#job_no").val();
    var amount=parseFloat($("#amount").val());
    var conv_factor=parseFloat($("#conv_factor").val());
     var price = amount *  conv_factor;
    var currency=$("#unit_price").val();
    
    // var vatAmount=parseFloat($("#vat").val());
   var SubTotal=price;
 var taxvalue=0;
 var total=SubTotal+taxvalue;
//  var currency=parseFloat($("#unit_price").val());
$(".dataadd").append( "<tr class='tbl_row'><td class='inv'>"+invid+" </td> <td class='details'>"+details+"</td><td class='amount'>"+amount+"</td> <td class='currency'>"+currency+"</td> <td class='cov_factor'>"+conv_factor+"</td>  <td class='job_quantity'>"+price+"</td> <td><a class='rmvbutton'><i class='fa fa-trash-o'></i></a></td></tr>" );
console.log(price);
calculates();
}
function calculates() {
  var totsub_val=0;
  $(".job_quantity").each(function(td) {
      var s = parseFloat($(this).html());
      totsub_val=parseFloat(totsub_val)+s;
  });

  $("#total").val(totsub_val.toFixed(2));

 $("#grand_total").val(totsub_val.toFixed(2));


}
//to insert job supplier payment details

function insert_supplier_payment() {
    // var Data;
    var JobSupplierPaymentData = {
                  
      "ID": $('#code').val(),
      "Date":$('#date').val(),
      "Status":"Paid",
      "SubTotal": parseFloat($('#total').val()),
      "vatTotal": parseFloat($('#vat_total').val()),
      "SuplierID":$('#sup_id').val(),
      "Mode":$('#type').val(),
      "ChequeNo":$('#cheque_no').val(),
      "ChequeDate":$('#cheque_date').val(),
      "BankId":$('#bank_id').val(),
      "TransactionId":$('#transaction_id').val()

    };
      var JobSupplierPaymentDetails = [];
              $(".tbl_row").each(function () {
                  var Data = {
                    "JobNo":$(this).find('.details').text(),
                      "Amount": $(this).find('.amount').text(),
                      "Currency": $(this).find('.currency').text(),
                      "ConvFactor": $(this).find('.cov_factor').text(),
                       "Total": parseFloat($(this).find('.job_quantity').text()),
                       "SupplierExpenseMasterID": $(this).find('.inv').text()
                      
                  };
                  JobSupplierPaymentDetails.push(Data);
                 console.log(JobSupplierPaymentDetails);
              });
        // var  inv_code=$('#inv_code').val();  
    
    var postData = {
        JobSupplierPaymentData: JobSupplierPaymentData,
        JobSupplierPaymentDetails: JobSupplierPaymentDetails
        };
        console.log(postData);
        var request = $.ajax({
          url: '../insert-job-supplier-payment-details',
          type: 'POST',
          data: {postData:postData} ,
          dataType: 'JSON'
          });
        request.done( function ( data ) {
          window.location.href='../print-supplier-payment/'+data

        });
        request.fail( function ( jqXHR, textStatus) {
      
        alert("Job supplier payment Creation failed");
     
          });
    
      }