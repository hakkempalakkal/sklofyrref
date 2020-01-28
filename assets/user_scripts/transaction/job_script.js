
    //add type
    function add($type)
    {
      var now = moment().format('YYYY-MM-DD h:mm:ss a');
  
      postData = {
            "type":$type
             
      };
      var request = $.ajax({
      url: 'transportation-store',
      type: 'POST',
      data: {postData:postData} ,
      dataType: 'JSON'
      });
      request.done( function ( data ) {
  //console.log(data);
  $('#id').val(data);
  $("#type").val($type);
  //console.log(postData); 
  return postData;
      });
    
  
    }
    //  function nextbutton()
    // {
    //   $(document).ready(function()
    //   {
    //     $( "#tabs" ).tabs( "select" , 3 ) ;
    //   });
    // }
    //$('#txtPropHPhone').val() + '<br/>' + $(txtPropWPhone').val();
  //  update
    function update()
    {
   
     var typevqal=$("#type").val();
    // alert( $('#id').val());
    // alert(typevqal);
      if(typevqal=="air")
      {
        var etd=$("#etd_air").val();  
        var eta=$("#eta_air").val();  
        var Origin=$("#origin_air").val();
        var Destination=$("#destination_air").val();
        var carrier=$("#Carrier_air").val();
        var PoNo=$("#PoNo_air").val();
        var Mawb=$("#Mawb_air").val()+'-'+$("#Mawb_code").val();
        var Nopcs=$("#Nopcs_air").val();
        var ActualWeight=$("#ActualWeight_air").val();
        var ChargeableWeight=$("#ChargeableWeight_air").val();
      
     }
      else if(typevqal=="sea")
      {
        var etd=$("#etd_sea").val();
        var eta=$("#eta_sea").val(); 
        var carrier=$("#Carrier_sea").val();
        var PoNo=$("#PoNo_sea").val(); 
        var Mbl=$("#Mbl_sea").val(); 
        var ActualWeight=$("#ActualWeight_sea").val();
       
      }
      else if(typevqal=="transportation")
      {
        var etd=$("#etd_transport").val();
        var eta=$("#eta_transport").val();
        var Origin=$("#Origin_transport").val();
        var Destination=$("#Destination_transport").val(); 
        var carrier=$("#Carrier_transport").val(); 
        var PoNo=$("#PoNo_transport").val();
        var Mbl=$("#Mbl_transport").val(); 
        var Nopcs=$("#Nopcs_transport").val(); 
        var ActualWeight=$("#ActualWeight_transport").val();
       
      }
      else if(typevqal=="land")
      {
        var etd=$("#etd_land").val();
        var eta=$("#eta_land").val();
        var Origin=$("#Origin_land").val();
        var Destination=$("#Destination_land").val(); 
        var carrier=$("#Carrier_land").val();
        var PoNo=$("#PoNo_land").val(); 
        var Nopcs=$("#Nopcs_land").val(); 
        var Mawb=$("#Mawb_land").val();
        var ChargeableWeight=$("#ChargeableWeight_land").val();
      
      }


      var now = moment().format('YYYY-MM-DD h:mm:ss a');
      Data = {
        "Number":$('#code').val(),
        "Date": $('#date').val(),
        "Shipper": $('#shippername').val(),
        "Consignee": $('#consigneename').val(),
        "client_name": $('#client_name').val(),
        "shipment_type": $('#shipment_type').val(),
        "ShipmentTerms": $('#Shipment_Terms').val(),
        "CargoDescription": $('#cargo_description').val(),
        "Origin":Origin,
        "Destination": Destination,        
        "Etd":etd,
        "Eta":eta,
        "Carrier":carrier,
        "PoNo":PoNo,
        "Mawb":Mawb,
        "Hawb": $('#Hawb').val(),
        "Nopcs": Nopcs,
        "ActualWeight": ActualWeight,
        "ChargeableWeight": ChargeableWeight,
        "Dimension": $('#Dimension').val(),
        "Pol": $('#Pol').val(),
        "Pod": $('#Pod').val(),
        "Mbl": Mbl,
        "Hbl": $('#Hbl').val(),
        "ContType": $('#ContType').val(),
        "NoContainers": $('#NoContainers').val(),
        "ContainerNo": $('#ContainerNo').val(),
        "TruckNo": $('#TruckNo').val(),
        "BayanNo": $('#BayanNo').val(),
        "BayanDate": $('#BayanDate').val(),
        "Status": $('#Status').val(),
        "JobStatus": $('#JobStatus').val(),
        "LabUndertaking": $('#LabUndertaking').val(),
        "DocsGuarantee": $('#DocsGuarantee').val(),
        "Description": $('#Description').val(),
        "PoP": $('#PoP').val(),
        "salesman": $('#salesman').val(),
        "consignor_id": $('#consignor_id').val(),
        "consignee_id": $('#shipperid').val(),
        "client_id": $('#client_name').find('option:selected').attr('id')

  };

      var postData = {
       postData1: Data,
        id: $('#id').val(),
  
    };
    console.log(postData);
      var request = $.ajax({
      url: 'transportation-update',
      type: 'POST',
      data: {postData:postData} ,
      dataType: 'JSON'
      });
      request.done( function ( data ) {
     
     
      });
      request.fail( function ( jqXHR, textStatus) {
       
      
       
      });

   }
//get description
 function getdata()
{
 
postData=$('#desc_code').val();
var request = $.ajax({
  url: 'transportation-description/'+postData,
  type: 'GET',
  dataType: 'JSON'
  });
  request.done( function (result) {
    console.log(result);
  var values=JSON.stringify(result);
  $("#description_job").val(result[0].description);
console.log(result[0].description);
  });

}

//get carrier
// function getcarriera()
// {
 
// postData=$('#Carrier_air').val();

// var request = $.ajax({
//   url: 'transportation-carrier/'+postData,
//   type: 'GET',
//   dataType: 'JSON'
//   });
//   request.done( function (result) {
//     console.log(result);
//   var values=JSON.stringify(result);
//   $('.mawbcarrier').val(result[0].code);
// console.log(result[0].code);
//   });

// }

//view job details
function jobdetails()
{
 
postData=$('#id').val();
var request = $.ajax({
  url: 'transportation-jobdetails/'+postData,
  type: 'GET',
  dataType: 'JSON'
  });
  request.done( function (result) {
    console.log(result);
  var values=JSON.stringify(result);
  $("#job_code").html(result[0].JobId);
  $("#shipper_name").html(result[0].Shipper);
  $("#consignee_name").html(result[0].Consignee);
  $("#company_name").html(result[0].client_name);
  $("#shpmnt_terms").html(result[0].ShipmentTerms);
  $("#consign_desc").html(result[0].CargoDescription);
  $("#consign_date").html(result[0].Date);
// console.log(result[0].JobId);
  });

}

//add estimate
function add_estimate()
{
  
  var id=$("#id").val();  
  
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();
  
  today = yyyy + '/' + mm + '/' + dd;
  // alert(today);
    estimate_master= {
  "estimate_no": $('#estimate_code').val(),
  "e_date":today,
  "job_id":id ,
  "total_amount": $('#total').val(),
  "tax_amount": $('#vat_total').val(),
  "grand_total": $('#grand_total').val(),
  "status": "drafted",
  "IsActive":1
};

console.log(estimate_master);

var estimate_master_details =[];
  $('.estmt_details').each(function()
  {
    var Data = {
      "description_id":$(this).find('.desc_id').text(),
        "unitprice": $(this).find('.price_val').text(),
        "unit_type": $(this).find('.unittype').text(),
        "conv_factor": $(this).find('.convfact').text(),
         "quantity":$(this).find('.quanty').text(),
         "vat": parseFloat($(this).find('.taxval_data').text()),
         "total": parseFloat($(this).find('.totalval_data').text())
    };
    estimate_master_details.push(Data);
  });
  var postData = {
   
    estimate_master: estimate_master,
     estimate_master_details: estimate_master_details
      };
  var request = $.ajax({
    url: 'transportation-estimate',
    type: 'POST',
    data: {postData:postData} ,
    dataType: 'JSON'
    });
    request.done( function ( data ) {
    
    if(!alert('estimate Created Successfully!')){window.location.href=""}
    });
    request.fail( function ( jqXHR, textStatus) {
      alert('estimate Created Successfully');
      // window.location.reload();
      if (jqXHR.responseText=="success")
      {
      
       if(!alert('estimate3 created Successfully!')){window.location.href=""}
   
      }
    });
}

//onchange carrier and mawb
$(document).ready(function()
{
  $( "#Carrier_air" ).change(function() {
    var element = $(this).find('option:selected'); 
    var myTag = element.attr("code"); 
    $("#Mawb_air").val(myTag);
    console.log($(this).attr("code"));
  });
});