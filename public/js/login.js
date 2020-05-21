$(document).ready(function() {
    $('#btn').click(function() {
      var user = $('#user').val();
      var password = $('#password').val();
      var error =true;
      var url = base_url("api.php/login");
      var data = new Object();
      data.user = $('#user').val();
      data.password = $('#password').val();
      console.log("1111");
      $.getJSON(url, {
        format: "json",
      })
        .done (function(data){
          $.each(data, function(key, value){
            if(user == value.username && password == value.password){
              error = false ;
            }
          });
          if(error == false){
            alert("success");
            location.replace(base_url('page/table.html?user_login=')+user);
          }else {
            alert("fail");
            $('#user').val('');
            $('#password').val('');
            }
          })
      return false;
    });
  });
  function base_url(path){
    var host = window.location.origin;
    // "http://localhost"
    var pathArray = window.location.pathname.split( '/' );
    // split path
    return host+"/"+pathArray[1]+"/"+path;
    // return http://localhost/hermes/+path
  }

  