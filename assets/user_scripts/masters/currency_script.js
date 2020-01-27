
    //add permission
    function add()
    {
      var now = moment().format('YYYY-MM-DD h:mm:ss a');
  
      postData = {
            "currency":$('#currency').val(), 
                "created_at": now,
                "IsActive":1  
      };
  
  
      var request = $.ajax({
      url: 'currency-store',
      type: 'POST',
      data: {postData:postData} ,
      dataType: 'JSON'
      });
      request.done( function ( data ) {
  
      if(!alert('currency Created Successfully!')){window.location.href="currency"}
      });
      request.fail( function ( jqXHR, textStatus) {
        alert('Currency Created Successfully!');
        window.location.reload();
        if (jqXHR.responseText=="success")
        {
         if(!alert('currency created Successfully!')){window.location.href="currency"}
     
        }
      });
  
    }
    //update
    function update()
    {
      var now = moment().format('YYYY-MM-DD h:mm:ss a');
      Data = {
        "currency":$('#currency').val(),
          
        "updated_at": now
  };

      var postData = {
       postData1: Data,
        id: $('#id').val()
    };
      var request = $.ajax({
      url: 'currency-update',
      type: 'POST',
      data: {postData:postData} ,
      dataType: 'JSON'
      });
      request.done( function ( data ) {
     
      if(!alert('currency updated Successfully!')){window.location.href="currency"}
      });
      request.fail( function ( jqXHR, textStatus) {
       
       if (jqXHR.responseText=="success")
       {
        if(!alert('currency updated Successfully!')){window.location.href="currency"}
    
       }
      });
    }
