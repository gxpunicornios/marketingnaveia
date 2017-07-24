$(document).ready(function(){



    function update(){
        if($(window).width() < 768){
            $('.navbar-default .navbar-nav li a').css('color','#512772');
            $('.navbar-default .navbar-nav li a:hover').css('color','#5c3f72');
            showCadastrarFullSection();
        }
        else{
            $('.navbar-default .navbar-nav li a').css('color','#6afac5');
            $('.navbar-default .navbar-nav li a:hover').css('color','#a1facb');
            showCadastrarBox();
        }
    }
    setInterval(update,60/1000);

    function showCadastrarBox(){
        $('#cadastro').css('display','block');
        $('#cadastro-full').css('display','none');
    }

    function showCadastrarFullSection(){
        $('#cadastro').css('display','none');
        $('#cadastro-full').css('display','block');
    }



    ///### EVENTS

    // Variable to hold request
  var request;

  // Bind to the submit event of our form
  $("#register").submit(function(event){

      // Prevent default posting of form - put here to work in case of errors
      event.preventDefault();

      // Abort any pending request
      if (request) {
          request.abort();
      }
      // setup some local variables
      var $form = $(this);

      // Let's select and cache all the fields
      var $inputs = $form.find("input, select, button, textarea");

      // Serialize the data in the form
      var serializedData = $form.serialize();

      // Let's disable the inputs for the duration of the Ajax request.
      // Note: we disable elements AFTER the form data has been serialized.
      // Disabled form elements will not be serialized.
      $inputs.prop("disabled", true);

      // Fire off the request to /form.php
      request = $.ajax({
          url: "/register.php",
          type: "post",
          data: serializedData
      });

      // Callback handler that will be called on success
      request.done(function (response, textStatus, jqXHR){
          // Log a message to the console
          var obj = JSON.parse(response);
          console.log(obj.result);
          
      });


      // Callback handler that will be called on failure
      request.fail(function (jqXHR, textStatus, errorThrown){
          // Log the error to the console
          console.error(
              "The following error occurred: "+
              textStatus, errorThrown
          );
      });

      // Callback handler that will be called regardless
      // if the request failed or succeeded
      request.always(function () {
          // Reenable the inputs
          $inputs.prop("disabled", false);
      });

  });
    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });
});