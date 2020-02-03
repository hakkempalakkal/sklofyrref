
    //add permission
    function add()
    {
      var now = moment().format('YYYY-MM-DD h:mm:ss a');
  
      postData = {
            "code":$('#supplier_code').val(),
            "supplier_name": $('#supplier_name').val(),
            "contact_person": $('#contact_person').val(),
            "address":$('#supplier_address').val(),
            "vat_no": $('#supplier_vat').val(),
            "country": $('#supplier_country').val(),
            "telephone":$('#supplier_telephone').val(),
            "mobile": $('#supplier_mobile').val(),
            "fax": $('#supplier_fax').val(),
            "email":$('#supplier_email').val(),
            "remarks": $('#supplier_remarks').val(),
            "IsActive":1,
            "created_at": now
      };
  
  
      var request = $.ajax({
      url: 'supplier-store',
      type: 'POST',
      data: {postData:postData} ,
      dataType: 'JSON'
      });
      request.done( function ( data ) {
      
        console.log(data)
      
        alert('Supplier Created Successfully!');
        window.location.href="supplier"
         });
         request.fail( function ( jqXHR, textStatus) {
           // console.log("ghjgbjjh")
           alert('Supplier Creation  Failed!');
        
         });
  
  
  
    }
    //update
    function update()
    {
      var now = moment().format('YYYY-MM-DD h:mm:ss a');
      Data = {
        "code":$('#supplier_code').val(),
            "supplier_name": $('#supplier_name').val(),
            "contact_person": $('#contact_person').val(),
            "address":$('#supplier_address').val(),
            "vat_no": $('#supplier_vat').val(),
            "country": $('#supplier_country').val(),
            "telephone":$('#supplier_telephone').val(),
            "mobile": $('#supplier_mobile').val(),
            "fax": $('#supplier_fax').val(),
            "email":$('#supplier_email').val(),
            "remarks": $('#supplier_remarks').val(),
           
        "updated_at": now
  };

      var postData = {
       postData1: Data,
        id: $('#id').val()
    };
      var request = $.ajax({
      url: 'supplier-update',
      type: 'POST',
      data: {postData:postData} ,
      dataType: 'JSON'
      });
      request.done( function ( data ) {
     
        console.log(data)
      
        alert('Supplier Updated Successfully!');
        window.location.href="supplier"
         });
         request.fail( function ( jqXHR, textStatus) {
           // console.log("ghjgbjjh")
           alert('Supplier Updation  Failed!');
        
         });
  
      
    }
  