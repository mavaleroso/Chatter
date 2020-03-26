$('.create-account').click(function() {
  $(".login-form").hide("slide", { direction: "right" }, 1500);
  setTimeout(function () {
    $(".registration-form").show("slide", { direction: "left" }, 1500);
  }, 1000);
});

$('.exist-account').click(function() {
  $(".registration-form").hide("slide", { direction: "right" }, 1500);
  setTimeout(function () {
    $(".login-form").show("slide", { direction: "left" }, 1500);
  }, 1000);
});


$('.login-btn').click(function() {
  let uname = $('#log-uname').val();
  let pass = $('#log-pass').val();

  if(uname != "" && pass != "") {
    $.ajax({
      url: 'models/login.php',
      type: 'post',
      data: {
        uname: uname,
        pass: pass
      },
      success: function(data) {
        $('#login-log').removeClass('text-danger');
        $('#login-log').addClass('text-success');
        $('#login-log').text(data);
        setTimeout(function () {
          window.location.href = "http://localhost/Chatter/chatbox.php";
        }, 1000);
      },
      error: (xhr, ajaxOptions, thrownError) => {
        console.error('Error login: ' + xhr.status + ' => ' + thrownError);
      }
    })
  } else {
    $('#login-log').removeClass('text-success');
    $('#login-log').addClass('text-danger');
    $('#login-log').text("All fields are required!");
  }
});


$('.register-btn').click(function() {
  let name = $('#reg-name').val();
  let uname = $('#reg-uname').val();
  let pass = $('#reg-pass').val();

  if (name != "" && uname != "" && pass != "") {
    $.ajax({
      url: 'register.php',
      type: 'post',
      data: {
       name: name,
       username: uname,
       password: pass
      },
      success: function(data) {
        $('#reg-log').removeClass('text-danger');
        $('#reg-log').addClass('text-success');
        $('#reg-log').text(data);
        $('#reg-name').val("");
        $('#reg-uname').val("");
        $('#reg-pass').val("");
        setTimeout(function () {
          $('.exist-account').click();
        }, 1000);
      },
      error: (xhr, ajaxOptions, thrownError) => {
        console.error('Error registration: ' + xhr.status + ' => ' + thrownError);
      }
    });
  } else {
    $('#reg-log').removeClass('text-success');
    $('#reg-log').addClass('text-danger');
    $('#reg-log').text("Form is not complete!");
  }

});
