
    //add permission
  function add()
  {
    var now = moment().format('YYYY-MM-DD h:mm:ss a');

    postData = {
          "name":$('#permission_code').val(),
          "display_name": $('#permission_name').val(),
          "description": $('#permission_description').val(),
          "created_at": now
    };


    var request = $.ajax({
    url: 'permission-store',
    type: 'POST',
    data: {postData:postData} ,
    dataType: 'JSON'
    });
    request.done( function ( data ) {
      alert('permission Created Successfully!');
   
    });
    request.fail( function ( jqXHR, textStatus) {
      alert('permission Created Successfully!');
    
    });

  }
  //update
  function update()
  {
    var now = moment().format('YYYY-MM-DD h:mm:ss a');

    Data = {
          
          "name":$('#permission_code').val(),
          "display_name": $('#permission_name').val(),
          "description": $('#permission_description').val(),
          "updated_at": now
    };
    var postData = {
     postData1: Data,
      id: $('#id').val()
  };
    var request = $.ajax({
    url: 'permission-update',
    type: 'POST',
    data: {postData:postData} ,
    dataType: 'JSON'
    });
    request.done( function ( data ) {
      // alert('permission updated Successfully!');

    });
    request.fail( function ( jqXHR, textStatus) {
      alert('permission updated Successfully!');
      window.location.href="permission";
  
    });
  }