const TypeWriter = function(txtElement, words, wait = 3000) {
    this.txtElement = txtElement;
    this.words = words;
    this.txt = '';
    this.wordIndex = 0;
    this.wait = parseInt(wait, 10);
    this.type();
    this.isDeleting = false;
}
  
  // Type Method
  TypeWriter.prototype.type = function() {
    // Current index of word
    const current = this.wordIndex % this.words.length;
    // Get full text of current word
    const fullTxt = this.words[current];
  
    // Check if deleting
    if(this.isDeleting) {
      // Remove char
      this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
      // Add char
      this.txt = fullTxt.substring(0, this.txt.length + 1);
    }
  
    // Insert txt into element
    this.txtElement.innerHTML = `<span class="txt">${this.txt}</span>`;
  
    // Initial Type Speed
    let typeSpeed = 300;
  
    if(this.isDeleting) {
      typeSpeed /= 2;
    }
  
    // If word is complete
    if(!this.isDeleting && this.txt === fullTxt) {
      // Make pause at end
      typeSpeed = this.wait;
      // Set delete to true
      this.isDeleting = true;
    } else if(this.isDeleting && this.txt === '') {
      this.isDeleting = false;
      // Move to next word
      this.wordIndex++;
      // Pause before start typing
      typeSpeed = 500;
    }
  
    setTimeout(() => this.type(), typeSpeed);
}
  
  
  // Init On DOM Load
  document.addEventListener('DOMContentLoaded', init);
  
  // Init App
  function init() {
    const txtElement = document.querySelector('.txt-type');
    const words = JSON.parse(txtElement.getAttribute('data-words'));
    const wait = txtElement.getAttribute('data-wait');
    //Init TypeWriter
    new TypeWriter(txtElement, words, wait);
}

var receiver_id = '';
var my_id = "{{ Auth::id() }}";
$(document).ready(function(){
    // ajax setup form csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('f2dc213d12fc52e61e51', {
    cluster: 'mt1',
    forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
    // alert(JSON.stringify(data));
    if (my_id == data.from) {
        $('#' + data.to).click();
    } 
    else if (my_id == data.to) {
        if (receiver_id == data.from) {
            // if receiver is selected, reload the selected user ...
            $('#' + data.from).click();
        } 
        else {
            // if receiver is not seleted, add notification for that user
            var pending = parseInt($('#' + data.from).find('.pending').html());
            if (pending) {
                $('#' + data.from).find('.pending').html(pending + 1);
            } 
            else {
                $('#' + data.from).append('<span class="pending">1</span>');
            }
        }
    }
    }); 

    $('.user').click(function(){
        $('.user').removeClass('active');
        $(this).addClass('active');
        $(this).find('.pending').remove();
      
        receiver_id = $(this).attr('id');
        $.ajax({
            type: "get",
            url: "message/" + receiver_id, // need to create this route
            data: "",
            cache: false,
            success: function (data) {
                $('#messages').html(data);
                scrollToBottomFunc();
            }
        });
    });

    $(document).on('keyup', '.input-text input', function (e) {
        var message = $(this).val();
        // check if enter key is pressed and message is not null also receiver is selected
        if (e.keyCode == 13 && message != '' && receiver_id != '') {
            $(this).val(''); // while pressed enter text box will be empty
            var datastr = "receiver_id=" + receiver_id + "&message=" + message;
            $.ajax({
                type: "post",
                url: "message", // need to create this post route
                data: datastr,
                cache: false,
                success: function (data) {
                },
                error: function (jqXHR, status, err) {
                },
                complete: function () {
                    scrollToBottomFunc();
                }
            })
        }
    });
});

// make a function to scroll down auto
function scrollToBottomFunc() {
    $('.message-wrapper').animate({
        scrollTop: $('.message-wrapper').get(0).scrollHeight
    }, 50);
}



  


  
  
  



