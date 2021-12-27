$(document).ready(function(){

  $("#login").on('click', function(){
    var username = $("#username").val();
    var password = $("#password").val();
    
    if(username == "" || password == ""){
      alert("username or password shouldn't be empty");
    } else {
      $.ajax(
        {
          url: 'index.php',
          method: 'POST',
          data: {
            login: 1,
            usernamePHP: username,
            passwordPHP: password
          },
          success: function (response){
            $("#response").html(response);

            if(response.indexOf('success') >= 0) {
              window.location = 'crud.php'
            }
          },
          datatype: 'text'
        }
      )
    }
  });

  $(document).on('click', '#regist', function(){
    var fullname = $("#create_fullname").val();
    var username = $("#create_username").val();
    var password = $("#create_password").val();

    if(fullname == '' || username == '' || password == ''){
      alert("Instance cannot be empty!")
    } else {
      var message = 'createaccount';
      console.log('yess')
      $.ajax({
        url: 'ajax.php',
        method: 'POST',
        datatype: 'text',
        data: {
          key: message,
          name: fullname,
          username: username,
          password: password
        }, success: function(response){
          alert(response);
          $('#createaccount').modal('toggle');
        }
      });
    }
  })
})