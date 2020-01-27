
    //add permission
    function add()
    {
      var now = moment().format('YYYY-MM-DD h:mm:ss a');
  
      postData = {
        "code": $('#description_code').val(),
            "description": $('#description_name').val(),
            "description_arabic": $('#description_arabic').val(),
            "created_at": now,
            "IsActive":1
      };
  
  
      var request = $.ajax({
      url: 'description-store',
      type: 'POST',
      data: {postData:postData} ,
      dataType: 'JSON'
      });
      request.done( function ( data ) {
      
      if(!alert('description Created Successfully!')){window.location.href="description"}
      });
      request.fail( function ( jqXHR, textStatus) {
        alert('description Created Successfully!');
        window.location.reload();
        if (jqXHR.responseText=="success")
        {
        
         if(!alert('description created Successfully!')){window.location.href="description"}
     
        }
      });
  
    }
    //update
    function update()
    {
      var now = moment().format('YYYY-MM-DD h:mm:ss a');
  
      Data = {
            
            "code":$('#description_code').val(),
            "description": $('#description_name').val(),
            "description_arabic": $('#description_arabic').val(),
            "updated_at": now
      };
      var postData = {
       postData1: Data,
        id: $('#id').val()
    };
      var request = $.ajax({
      url: 'description-update',
      type: 'POST',
      data: {postData:postData} ,
      dataType: 'JSON'
      });
      request.done( function ( data ) {
     
      if(!alert('description updated Successfully!')){window.location.href="description"}
      });
      request.fail( function ( jqXHR, textStatus) {
       
       if (jqXHR.responseText=="success")
       {
        if(!alert('description updated Successfully!')){window.location.href="description"}
    
       }
      });
    }
 