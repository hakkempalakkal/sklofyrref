var baseurl=$('#baseurl').val();
$( document ).ready(function() {
    $('#description').addClass("hidden");
    $('#title').addClass("hidden");
    
  
  });
  function search_job()
{
    var jobid = $('#q').val();
    // alert(jobid);
    if($.isNumeric(jobid))
    {
       visiblejobdescription();
    }
    else{
        alert("please enter valid job id");
    }

}  
  
function visiblejobdescription()
{
   
  
     $('#description').removeClass("hidden");
     $('#title').removeClass("hidden");
     postData=$('#q').val();
//  alert(postData);
var request = $.ajax({
  url: 'job-description/'+postData,
  type: 'GET',
  dataType: 'JSON'
  });
  request.done( function (result) {
    // console.log(result);
  
   var values=JSON.stringify(result);
//    alert(values[0].JobId);
  $("#job_id").text(result["jobdata"][0].JobId);
  $("#client_id").text(result["jobdata"][0].client_id);
  $("#shipper").text(result["jobdata"][0].consignor);
  $("#consignee").text(result["jobdata"][0].consignee);
  $("#client").text(result["jobdata"][0].clientenglish);
  $("#terms").text(result["jobdata"][0].ShipmentTerms);
 //to print invoice total
 
$("#invctotal").text(result["invoicetotal"][0].sumvalue);
//invoice
var Invsum=0;
    var slno=0;
    $(".dataadd").html("");
    $.each(result["invoicedata"], function(index, value){
      
         slno=slno+1;
        var inv=value.Inv;
        var date=value.Date;
        // var particulars="";
        var mode=value.InvoiceType;
        var subtotal=value.Total;
        var vattotal=value.VatTotal;
        var grandtotal=parseFloat(value.GrandTotal).toFixed(2);
        var status=value.Status;
        
        var invmasterid=value.InvoiceMasterId;
        Invsum=parseFloat(Invsum)+parseFloat(grandtotal);

       var stringval='<ul class="nav"><li class="dropdown"> <a class="btn btn-sm dropdown-toggle" style="width: 50px;" data-toggle="dropdown" href="#"><i class="fa fa-ellipsis-v"></i></a><ul class="dropdown-menu">';          
         if(status=='Drafted')
         {
           stringval=stringval+'<li role="presentation"><a role="menuitem" tabindex="-1" href="'+baseurl+'edit-job-invoice/'+invmasterid+'">Edit</a></li>';
           stringval=stringval+'<li role="presentation"><a role="menuitem" tabindex="-1" href="'+baseurl+'change-invoice-status/'+invmasterid+'">Post invoice and print</a></li>';
         }
        //  else{

         stringval=stringval+'<li role="presentation"><a role="menuitem" tabindex="-1" href="'+baseurl+'invoice-print/'+invmasterid+'">View invoice</a></li>';
        //  }
         stringval=stringval+'</ul> </li>  </ul>';

         $(".dataadd").append( "<tr class='tbl_row'><td class='sl'>"+slno+" </td> <td class='inv'>"+inv+"</td><td class='date'>"+date+"</td>  <td class='mode'>"+mode+"</td>  <td class='subtotal'>"+subtotal+"</td> <td class='vattotal'>"+vattotal+"</td><td class='grandtotal' style='text-align:right;'>"+grandtotal+"</td><td>"+stringval+" </td></tr>" );

                

    });
    Invsum=parseFloat(Invsum).toFixed(2);
    $(".dataadd").append( "<tr class='tbl_row' style='background-color: #e6e6ff;'><td colspan='6' > Total Invoice </td><td style='text-align: right;'>"+Invsum+"</td></tr>"); 

   console.log(Invsum);
    //credit note 
    var slno=0;
    var Creditsum=0;
    $(".creditdata").html("");
    $.each(result["creditnotedata"], function(index, value){
    
      slno=slno+1;
        var code=value.Code_Id;
        var date=value.Date;
      
        var cunstomer=value.name;
       
      var amount=parseFloat(value.GrandTotal).toFixed(2);
      Creditsum=parseFloat(Creditsum)+parseFloat(amount);
        $(".creditdata").append( "<tr class='tbl_row'><td class='sl'>"+slno+" </td> <td class='code'>"+code+"</td><td class='date'>"+date+"</td> <td class='cunstomer'>"+cunstomer+"</td> <td class='amount' style='text-align: right;' colspan='2'>"+amount+"</td> </tr>" );

    });
    Creditsum=parseFloat(Creditsum).toFixed(2);
    $(".creditdata").append( "<tr class='tbl_row' style='background-color: #e6e6ff;'><td colspan='5' > Total Amount </td><td style='text-align: right;'>"+Creditsum+"</td></tr>"); 

    //payment receipt
    var slno=0;
    var receipt=0;
    $(".paymentreceipt").html("");
    $.each(result["receiptdata"], function(index, value){
    
      slno=slno+1;
       var date=value.Date;
       var doc=value.ID;
       var particulars="";
       var invoice="value.Date";
      //  var amount=value.SubTotal;
       var amount=parseFloat(value.SubTotal).toFixed(2);

       receipt=parseFloat(receipt)+parseFloat(amount);

        $(".paymentreceipt").append( "<tr class='tbl_row'><td class='sl'>"+slno+" </td> <td class='date'>"+date+"</td> <td class='doc'>"+doc+"</td> <td class='particulars'>"+particulars+"</td> <td class='invoice'>"+invoice+"</td>  <td class='amount' style='text-align:right;'>"+amount+"</td> </tr>" );

    });
    receipt=parseFloat(receipt).toFixed(2);
    $(".paymentreceipt").append( "<tr class='tbl_row' style='background-color: #e6e6ff;'><td colspan='5' > Total Receipt </td><td style='text-align: right;'>"+receipt+"</td></tr>"); 


    var slno=0;
    var Expense=0;
    $(".postedexpense").html("");
    $.each(result["expense"], function(index, value){
        // console.log(value.Inv);
      slno=slno+1;
     
        var date=value.InvDate;
        
        var doc=value.PostId;
        var particulars=value.Description;;
        var status=value.Status;
        var invoice=value.OurInv;
        var supplier=value.supplier_name;
         var expensemasterid=value.ExpenseMasterId;
      var amount=parseFloat(value.GrandTotal).toFixed(2);
      Expense=parseFloat(Expense)+parseFloat(amount);
      var stringval='<ul class="nav"><li class="dropdown"> <a class="btn btn-sm dropdown-toggle" style="width: 50px;" data-toggle="dropdown" href="#"><i class="fa fa-ellipsis-v"></i></a><ul class="dropdown-menu">';          
      if(status=='Drafted')
      {
        stringval=stringval+'<li role="presentation"><a role="menuitem" tabindex="-1" href="'+baseurl+'edit-supplier-expense/'+expensemasterid+'">Edit</a></li>';
        stringval=stringval+'<li role="presentation"><a role="menuitem" tabindex="-1" href="'+baseurl+'change-supplier-expense-status/'+expensemasterid+'">Post expense and print</a></li>';
      }
     //  else{

      stringval=stringval+'<li role="presentation"><a role="menuitem" tabindex="-1" href="'+baseurl+'supplier-expense-print/'+expensemasterid+'">View expense</a></li>';
     //  }
      stringval=stringval+'</ul> </li>  </ul>';
        $(".postedexpense").append( "<tr class='tbl_row'><td class='sl'>"+slno+" </td> <td class='date'>"+date+"</td> <td class='doc'>"+doc+"</td><td class='particulars'>"+particulars+"</td>  <td class='invoice'>"+invoice+"</td> <td class='supplier'>"+supplier+"</td> <td class='amount' style='text-align: right;'>"+amount+"</td><td>"+stringval+" </td></tr>" );

    });
    Expense=parseFloat(Expense).toFixed(2);
    $(".postedexpense").append( "<tr class='tbl_row' style='background-color: #e6e6ff;'><td colspan='6' > Total Expense</td><td style='text-align: right;'>"+Expense+"</td></tr>"); 

    var debitnote=0;
    var slno=0;
    $(".debitnote").html("");
    $.each(result["debitnotedata"], function(index, value){
        // console.log(value.Inv);
      slno=slno+1;
     
        var date=value.InvDate;
      
        var doc=value.Code_Id;
        // var particulars="";
        var invoice=value.OurInv;
        var supplier=value.supplier_name;
   
      var amount=parseFloat(value.GrandTotal).toFixed(2);
      debitnote=parseFloat(debitnote)+parseFloat(amount);
      // total=total+amount;
        $(".debitnote").append( "<tr class='tbl_row'><td class='sl'>"+slno+" </td> <td class='date'>"+date+"</td> <td class='doc'>"+doc+"</td> <td class='invoice'>"+invoice+"</td> <td class='supplier'>"+supplier+"</td> <td class='amount' style='text-align: right;'>"+amount+"</td> </tr>" );

    });
    debitnote=parseFloat(debitnote).toFixed(2);
    $(".debitnote").append( "<tr class='tbl_row' style='background-color: #e6e6ff;'><td colspan='5' > Total Debitnote </td><td style='text-align: right;'>"+debitnote+"</td></tr>"); 
    //  console.log(total)
    var suppayment=0;
    var slno=0;
    $(".payment").html("");
    $.each(result["supplierpayment"], function(index, value){
        // console.log(value.Inv);
      slno=slno+1;
     
        var date=value.Date;
      
        var doc=value.ID;
        var particulars=value.Description;
        // var invoice="";
        var supplier=value.supplier_name;
    
      var amount=parseFloat(value.SubTotal).toFixed(2);
      suppayment=parseFloat(suppayment)+parseFloat(amount);
        $(".payment").append( "<tr class='tbl_row'><td class='sl'>"+slno+" </td> <td class='date'>"+date+"</td> <td class='doc'>"+doc+"</td> <td class='supplier'>"+supplier+"</td> <td class='amount' style='text-align: right;'>"+amount+"</td> </tr>" );

    });
    suppayment=parseFloat(suppayment).toFixed(2);
    $(".payment").append( "<tr class='tbl_row' style='background-color: #e6e6ff;'><td colspan='4' > Total Supplier Payment </td><td style='text-align: right;'>"+suppayment+"</td></tr>"); 
  
    var slno=0;
    var credittotal=0;
    var debittotal=0;
    $(".ledger").html("");
    $.each(result["jobledger"], function(index, value){
        console.log(value.Dates);
      slno=slno+1;
        var date=value.Dates;
        var type=value.types;
        var description=value.Descriptions;
        var credit=parseFloat(value.Debit).toFixed(2);
        var debit=parseFloat(value.Credit).toFixed(2);
        credittotal=parseFloat(credittotal)+parseFloat(credit);
        debittotal=parseFloat(debittotal)+parseFloat(debit);
        $(".ledger").append( "<tr class='tbl_row'><td class='sl'>"+slno+" </td> <td class='date'>"+date+"</td> <td class='type'>"+type+"</td> <td class='description'>"+description+"</td> <td class='credit'>"+credit+"</td> <td class='debit'>"+debit+"</td>  </tr>" );

    });
    credittotal=parseFloat(credittotal).toFixed(2);
    debittotal=parseFloat(debittotal).toFixed(2);

    $(".ledger").append( "<tr class='tbl_row' style='background-color: #e6e6ff;'><td colspan='4' > Total: </td><td style='text-align: left;'>"+credittotal+"</td><td style='text-align: left;'>"+debittotal+"</td></tr>"); 
    $("#invtotal").text(Invsum);
   $("#expensetotal").text(Expense);
  //  var invpaid=Invsum-Expense;
  //  invoicepaid=parseFloat(invpaid);
 var invpaid=result["invoicepaid"][0].sumvalue;
 console.log(invpaid)
  $("#invpaid").text(invpaid);
  var amountdue=Invsum-invpaid;
  amountdue=parseFloat(amountdue);
  $("#amountdue").text(amountdue);
});

request.fail( function ( jqXHR, textStatus) {
      
  console.log("dfgvbcf");

    });



 }
   

//to edit invoice using invoicenumber
function editinvoice(inv)
{
  var inv= inv;   
  window.location = 'edit-job-invoice/' + inv;
}
//to edit supplier expense m
function editexpense(masterid)
{
  var ID= masterid;   
  window.location = 'edit-supplier-expense/' + ID;
}
//to create new job invoice
function createnewinvoice()
{
  var jobid = $('#q').val();
  window.location = 'job-invoice/' + jobid;
  // alert(jobid);
}

function createcreditnote()
{
  var jobid = $('#q').val();
  window.location = 'credit-note/' + jobid;
 
}
function createpaymentreceipt()
{
  var clientid = $('#client_id').text();
  // alert(clientid);
  window.location = 'payment-receipt/' + clientid;
 
}
function createexpense()
{
  var jobid = $('#q').val();
  window.location = 'supplier-expense/' + jobid;
 
}
function createdebitnote()
{
  var jobid = $('#q').val();
  window.location = 'debit-note/' + jobid;
 
}
