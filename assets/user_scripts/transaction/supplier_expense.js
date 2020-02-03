
$( document ).ready(function() {
    $('#receipt').addClass("hidden");
    $('#description').addClass("hidden");
    $('#amnt').addClass("hidden");
  });
   function visible_cash()
   {
      
      var selected_value = $('#type').val();
  // alert(selected_value);
      if(selected_value!="credit")
      {
        $('#receipt').removeClass("hidden");
        $('#description').removeClass("hidden");
        $('#amnt').removeClass("hidden");
         
      }
      else{
        $('#receipt').addClass("hidden");
        $('#description').addClass("hidden");
        $('#amnt').addClass("hidden");
      }
      
    }
  
  
    function getdata()
  {
  
  postData=$('#desc_code').val();
  //  alert(postData);
  var request = $.ajax({
    url: 'supplier-expense-description/'+postData,
    type: 'GET',
    dataType: 'JSON'
    });
    request.done( function (result) {
      console.log(result);
    var values=JSON.stringify(result);
    $("#description_job").val(result[0].description);
    $("#description_id").val(result[0].id);
  console.log(result[0].id);
    });
  
  }
  function insert_supplier_expense()
  {
    if($('#unitprice,#unit_price,#conv_factor,#quantity,#vat').val() == ''){
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
    var descID=0;
      var desc= $("#description_job").val();
      var price=parseFloat($("#unitprice").val());
      var currency=$("#unit_price").val(); 
      var price1=parseFloat($("#unitprice").val());
      var conv_factor=parseFloat($("#conv_factor").val());
      var mode=$("#mode").val();
       var price = price *  conv_factor;
  
    //   var quantity=$("#quantity").val();
     
      var code=$("#desc_code").val();
      var vatAmount=parseFloat($("#vat").val());
     var SubTotal=1*price;
   var taxvalue=((SubTotal * vatAmount) / 100);
   var total=SubTotal+taxvalue;
  //  var currency=parseFloat($("#unit_price").val());
  $(".dataadd").append( "<tr class='tbl_row'><td class='job_desc'>"+desc+" </td> <td class='job_price'>"+price1+"</td> <td class='subtotalval_data'>"+SubTotal+"</td> <td class='taxval_data'>"+taxvalue+"</td>  <td class='totalval_data'>"+total+"</td> <td><a class='rmvbutton'><i class='fa fa-trash-o'></i></a><input type='hidden' class='currency' value='"+currency+"'/><input type='hidden' class='cov_factor' value='"+conv_factor+"'/><input type='hidden' class='desc_code' value='"+code+"'/> </td></tr>" );
  calculates();
  }
  function calculates() {
    var totsub_val=0;
    $(".subtotalval_data").each(function(td) {
        var s = parseFloat($(this).html());
        totsub_val=parseFloat(totsub_val)+s;
    });
  
    var taxval_data_val=0;
    $(".taxval_data").each(function(td) {
        var s = parseFloat($(this).html());
        taxval_data_val=parseFloat(taxval_data_val)+s;
    });
  
    var totalval_data_val=0;
    $(".totalval_data").each(function(td) {
        var s = parseFloat($(this).html());
        totalval_data_val=parseFloat(totalval_data_val)+s;
    });
   
  
    $("#total").val(totsub_val.toFixed(2));
  
   $("#vat_total").val(taxval_data_val.toFixed(2));
   $("#grand_total").val(totalval_data_val.toFixed(2));
  
  
  }
  //insert data to job-details table
  





  function insert_expense_details() {
  // var Data;
  // var id=$('#jobid').val();
  // alert(id);
  var ExpenseData = {
    "PostId": $('#post_code').val(), 
    "PostingDate":$('#post_date').val(),
    "InvDate":$('#inv_date').val(),
    "SupplierID": $('#supplier_id').val(),
    "Reference": $('#invoice').val(),
    "OurInv": $('#invoice_id').val(),
    "Mode":$('#mode').val(),
    "Status":"Drafted",
    "JobId":$('#jobid').val(),
    "SupplierInvoiceNo":1,
    "SubTotal":$('#total').val(),
    "VatTotal":$('#vat_total').val(),
    "GrandTotal":$('#grand_total').val()  
  
  };
    var ExpenseDetails = [];
            $(".tbl_row").each(function () {
                var Data = {
                  "Description":$(this).find('.job_desc').text(),
                  "Amount":$(this).find('.job_price').text(),
                  "ConvFactor": $(this).find('.cov_factor').val(),
                  "Vat": parseFloat($(this).find('.taxval_data').text()),
                  "Total": parseFloat($(this).find('.totalval_data').text()),
                    "Currency": $(this).find('.currency').val(),
                    "Code": $(this).find('.desc_code').val()    
                };
                ExpenseDetails.push(Data);
               // console.log(JobDetails);
            });
            var  exp_code=$('#post_code').val(); 
  
  var postData = {
    ExpenseDetails: ExpenseDetails,
    ExpenseData: ExpenseData
      };
      console.log(postData);
      var request = $.ajax({
        url: '../insert-expense-details',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
      request.done( function ( data ) {
        console.log(data);
       
        window.location.href='../supplier-expense-print/'+data

      });
      request.fail( function ( jqXHR, textStatus) {
      //   console.log(jqXHR)
      // alert(0);
        });
  
    }
  
  
  
  