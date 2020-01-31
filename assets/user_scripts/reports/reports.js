function createinvoice()
{
  var jobid= $("#jobid").val();   
  console.log(jobid);
  window.location = 'job-invoice/' + jobid;
}
function get_invoicereport()
{
client_id=$('#client').val();
  fromdate=$('#fromdate').val();
  todate=$('#todate').val();
   
    var postData={
      id:client_id,
      fromdate:fromdate,
      todate:todate
    }
//  alert(fromdate);
//  alert(to);
    var request = $.ajax({
        url: 'invoice-report-data/',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function (result) {
       console.log(result);
        var values=JSON.stringify(result);
        $(".invoicereport").html("");
     
        var total=0;
$.each(result["invoicereportdata"],function(index,value) {
    date=value.Date;
    mode=value.InvoiceType;
  invoice=value.Inv
  job=value.JobId;
  customer=value.name;
  subtotal=value.Total;
  vattotal=value.VatTotal;
  grandtotal=parseFloat(value.GrandTotal).toFixed(2);
  status=value.Status;
  total=parseFloat(total)+parseFloat(grandtotal);
   console.log(total);
    $(".invoicereport").append( "<tr class='tbl_row'> <td class='invoice'>"+invoice+"</td> <td class='date'>"+date+"</td> <td class='mode'>"+mode+"</td><td class='job'>"+job+"</td>  <td class='customer'>"+customer+"</td><td class='subtotal'>"+subtotal+"</td><td class='vattotal'>"+vattotal+"</td> <td class='grandtotal'>"+grandtotal+"</td><td class='status'>"+status+"</td>  </tr>" );
});
total=parseFloat(total).toFixed(2);
$(".invoicereport").append( "<tr class='tbl_row' style='background-color: #e6e6ff;'><td colspan='8' > Total  </td><td style='text-align: left;'>"+total+"</td></tr>"); 

console.log(total)
      
        request.fail( function ( jqXHR, textStatus) {
      
          alert(0);
           
              });
        
});
}

function get_bill_report()
{

  supplier_id=$('#supplier').val();
    from=$('#fromdate').val();
    to=$('#todate').val();
       var postData={
      id:supplier_id,
    from:from,
    to:to
    }
  //  alert(to);
    var request = $.ajax({
        url: 'bill-report-data/',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function (result) {
       console.log(result);
        var values=JSON.stringify(result);
     
        $(".billreports").html("");

        var total=0;
$.each(result["billreportdata"],function(index,value) {
  code=value.PostId;
  date=value.PostingDate;
    mode=value.Mode;
  invoice=value.inv;
  // ref=value.Reference;
  job=value.JobID;
  supplier=value.supplier_name;
  currency=value.Currency;
  description=value.Description;
  amount=value.Amount;
status=value.Status;
  // grandtotal=parseFloat(value.GrandTotal).toFixed(2);
  status=value.Status;
  // total=parseFloat(total)+parseFloat(grandtotal);
   
    $(".billreports").append( "<tr class='tbl_row'> <td class='code'>"+code+"</td> <td class='date'>"+date+"</td> <td class='description'>"+description+"</td><td class='invoice'>"+invoice+"</td><td class='job'>"+job+"</td>  <td class='supplier'>"+supplier+"</td><td class='mode'>"+mode+"</td><td class='currency'>"+currency+"</td> <td class='amount'>"+amount+"</td><td class='status'>"+status+"</td>  </tr>" );
});
// total=parseFloat(total).toFixed(2);
// $(".invoicereport").append( "<tr class='tbl_row' style='background-color: #e6e6ff;'><td colspan='8' > Total  </td><td style='text-align: left;'>"+total+"</td></tr>"); 


      
        request.fail( function ( jqXHR, textStatus) {
      
          alert(0);
           
              });
        
});
}

//to get pending bills
function get_pendingbill_data()
{

  supplier_id=$('#supplier').val();
    from=$('#fromdate').val();
    to=$('#todate').val();
       var postData={
      id:supplier_id,
    from:from,
    to:to
    }
  //  alert(to);
    var request = $.ajax({
        url: 'bill-report-data/',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function (result) {
       console.log(result);
        var values=JSON.stringify(result);
     
        $(".billreports").html("");

        var total=0;
$.each(result["billreportdata"],function(index,value) {
  code=value.PostId;
  date=value.PostingDate;
    mode=value.Mode;
  invoice=value.OurInv;
  // ref=value.Reference;
  job=value.JobID;
  supplier=value.supplier_name;
  currency=value.Currency;
  description=value.Description;
  amount=value.GrandTotal;
status=value.Status;
  // grandtotal=parseFloat(value.GrandTotal).toFixed(2);
  status=value.Status;
  // total=parseFloat(total)+parseFloat(grandtotal);
   
    $(".billreports").append( "<tr class='tbl_row'> <td class='code'>"+code+"</td> <td class='date'>"+date+"</td> <td class='description'>"+description+"</td><td class='invoice'>"+invoice+"</td><td class='job'>"+job+"</td>  <td class='supplier'>"+supplier+"</td><td class='mode'>"+mode+"</td><td class='currency'>"+currency+"</td> <td class='amount'>"+amount+"</td><td class='status'>"+status+"</td>  </tr>" );
});
// total=parseFloat(total).toFixed(2);
// $(".invoicereport").append( "<tr class='tbl_row' style='background-color: #e6e6ff;'><td colspan='8' > Total  </td><td style='text-align: left;'>"+total+"</td></tr>"); 


      
        request.fail( function ( jqXHR, textStatus) {
      
          alert(0);
           
              });
        
});
}
//to get pending bills
function pending_invoice_report_data()
{
  client_id=$('#client').val();
  fromdate=$('#fromdate').val();
  todate=$('#todate').val();
   
    var postData={
      id:client_id,
      fromdate:fromdate,
      todate:todate
    }
//  alert(fromdate);
//  alert(to);
    var request = $.ajax({
        url: 'pending-invoice-report-data/',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function (result) {
       console.log(result);
        var values=JSON.stringify(result);
     
        $(".pendinginvoicereport").html("");

        var total=0;
$.each(result["pendinginvoicereportdata"],function(index,value) {
    date=value.Date;
    mode=value.InvoiceType;
  invoice=value.Inv
  job=value.JobId;
  customer=value.name;
  subtotal=value.Total;
  vattotal=value.VatTotal;
  grandtotal=parseFloat(value.GrandTotal).toFixed(2);
  status=value.Status;
  total=parseFloat(total)+parseFloat(grandtotal);
   console.log(total);
    $(".pendinginvoicereport").append( "<tr class='tbl_row'> <td class='invoice'>"+invoice+"</td> <td class='date'>"+date+"</td> <td class='mode'>"+mode+"</td><td class='job'>"+job+"</td>  <td class='customer'>"+customer+"</td><td class='subtotal'>"+subtotal+"</td><td class='vattotal'>"+vattotal+"</td> <td class='grandtotal'>"+grandtotal+"</td><td class='status'>"+status+"</td>  </tr>" );
});
total=parseFloat(total).toFixed(2);
$(".pendinginvoicereport").append( "<tr class='tbl_row' style='background-color: #e6e6ff;'><td colspan='8' > Total  </td><td style='text-align: left;'>"+total+"</td></tr>"); 

console.log(total)
      
        request.fail( function ( jqXHR, textStatus) {
      
          alert(0);
           
              });
        
});
}
