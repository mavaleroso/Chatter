$(document).ready(function() {
  fetch_recents();
});

var user_name = $('#user-name').val();
var user_id = $('#user-id').val();

$('#search').on('keypress', function() {
	let classN = $(this).attr('class');
	if (classN == 'recent') {
		fetch_recents();
	} else if (classN == 'new') {
		fetch_contacts();
	}
}).on('keydown', function(e) {
	if (e.keyCode==8) $(this).trigger('keypress');
})

function fetch_contacts() {
  let searchVal = $('#search').val();
  $.ajax({
    url: 'models/fetch_contacts.php',
    type: 'get',
    dataType: 'json',
    data: {searchVal: searchVal},
    success: function(data) {
      $('#user-contacts').empty();
      if (jQuery.isEmptyObject(data)) {
				$('#user-contacts').append('<div class="msg-error"><p>Results Not Found</p></div>');
			} else {
        $.each(data, function(k, v) {
          $('#user-contacts').append('<div class="user-contact" onclick="select_contact(this, '+null+', '+v.id+', \''+v.name+'\')"><i class="fas fa-user-circle"></i><p>'+ v.name +'</p></div>');
        });
      }
    },
    error: (xhr, ajaxOptions, thrownError) => {
      console.error('Error fetching contacts: ' + xhr.status + ' => ' + thrownError);
    }
  });
}

function fetch_recents() {
  let searchVal = $('#search').val();
  let name;
  let newID;
  $.ajax({
    url: 'models/fetch_recents.php',
    type: 'get',
    dataType: 'json',
    data: {searchVal: searchVal},
    success: function(data) {
      $('#user-contacts').empty();
      if (jQuery.isEmptyObject(data)) {
						$('#user-contacts').append('<div class="msg-error"><p>Results Not Found</p></div>');
			} else {
        $.each(data, function(k, v) {
          if (user_name == v.name2) {
  					name = v.name1;
  					newID = v.userID1;
  				} else {
  					name = v.name2;
  					newID = v.userID2;
  				}
          $('#user-contacts').append('<div class="user-contact" onclick="select_contact(this, \''+v.m_code+'\', '+newID+', \''+name+'\')"><i class="fas fa-user-circle"></i><p>'+ name +'</p></div>');
        });
      }

    },
    error: (xhr, ajaxOptions, thrownError) => {
      console.error('Error fetching recent contacts: ' + xhr.status + ' => ' + thrownError);
    }
  })
}


$('.contacts-option-type button').click(function() {
  if (!$(this).hasClass('active')) {
    $('.contacts-option-type button').removeClass('active');
    $(this).addClass('active');

    let id = $(this).attr('id');

    if (id == 'recent') {
      $('#search').removeClass('new');
      $('#search').addClass('recent');
      fetch_recents();
    } else if (id == 'new') {
      $('#search').removeClass('recent');
      $('#search').addClass('new');
      fetch_contacts();
    }


  }
});

function select_contact(THIS, code, id, name) {
  $('.user-contact').removeClass('active');
  $(THIS).addClass('active');
  $('#msg-convo-name').html(name);
  $('#msg-convo-area').empty();
  $('.msg-sender-box').attr('disabled', false);
  $('.msg-sender-btn').attr('disabled', false);
  if (code != null) {
    $.ajax({
      url: 'models/fetch_convo.php',
      method: 'get',
      dataType: 'json',
      data: {code: code},
      success: function(data) {
        $.each(data, function(k, v) {
          if (v.m_from == user_id) {
            $('#msg-convo-area').append('<div class="msg-from ml-auto msg-txt">'+v.m_message+'</div>');
          } else {
            $('#msg-convo-area').append('<div class="msg-to mr-auto msg-txt">'+v.m_message+'</div>');
          }
        });
        updateScroll();
      },
      error: (xhr, ajaxOptions, thrownError) => {
        console.error('Error fetching conversation: ' + xhr.status + ' => ' + thrownError);
      }
    })
  }

  $('#send-btn').off().on('click', function() {
    let message_content = $('.msg-sender-box').val();
    if (message_content.replace(/\s/g, '') != '') {
      $.ajax({
         url: 'models/send_message.php',
         type: 'post',
         data: {
           toID: id,
           msg: message_content
         },
         success: function(data) {
           $('.msg-sender-box').val(null);
         },
         error: (xhr, ajaxOptions, thrownError) => {
           console.error('Error sending message: ' + xhr.status + ' => ' + thrownError);
         }
      });
    }
  });
}

function updateScroll(){
    var element = document.getElementById("msg-convo-area");
    element.scrollTop = element.scrollHeight;
}

// Pusher channel

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('c0d7e24234709abeae18', {
    cluster: 'ap1',
    forceTLS: true
  });

  var channel = pusher.subscribe('chat-channel');

  var chatCallBack = function(data) {

    if (data.msg_from == user_id) {
      $('#msg-convo-area').append('<div class="msg-from ml-auto msg-txt">'+data.message+'</div>');
    } else {
      $('#msg-convo-area').append('<div class="msg-to mr-auto msg-txt">'+data.message+'</div>');
    }

    updateScroll();

    let classN = $('#search').attr('class');
    if (classN == 'recent') {
      fetch_recents();
    }

  }

  channel.bind('msg-event', chatCallBack);

  channel.bind('pusher:subscription_succeeded', function(members) {
    // console.log('Successfully subscribed');
  })

// Pusher Channel
