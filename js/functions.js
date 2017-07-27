$(document).ready(function(){

   
    $.getJSON("https://api.ipify.org?format=jsonp&callback=?", function(response) {
        //alert(response.ip);
        var ip = response.ip;
        $('#cadastro #register').append($('<input type="text" class="user-ip" name="ip" value="'+ip+'" hidden>'));
        $('#cadastro-full #register').append($('<input type="text" class="user-ip" name="ip" value="'+ip+'" hidden>'));
        $('#ebook-cbox #ebook').append($('<input type="text" class="user-ip" name="ip" value="'+ip+'" hidden>'));
        $('#cadastro-full #ebook').append($('<input type="text" class="user-ip" name="ip" value="'+ip+'" hidden>'));
        }, "jsonp");

    


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
        $('#ebook-cbox').css('display','block');
        $('#cadastro-full').css('display','none');
        $('#landing-content').css('margin-top','-200px');
    }

    function showCadastrarFullSection(){
        $('#cadastro').css('display','none');
        $('#cadastro-full').css('display','block');
        $('#ebook-cbox').css('display','none');
        $('#landing-content').css('margin-top','0px');
    }



    ///### EVENTS

    // Variable to hold request
  var request;

  function register(event){


    var regName = new RegExp("(\\w+)(\\s+)(\\w+)");
    if(!regName.test($(this).find('input[name="nome"]').val())){
      event.preventDefault();
      request.abort();
    }

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
          //var obj = JSON.parse(response);
          var result = response.result;
          console.log(response);
          if(result === 0){
              if(response.type === "ebook"){
                console.log("oi");
                    $('#ebook-cbox #ebook-agradecimento').css('display','block');
                    $('#ebook-cbox #ebook').css('display','none');
                    $('#cadastro-full #ebook-agradecimento').css('display','block');
                    $('#cadastro-full #ebook').css('display','none');
              }
              else{
                   $("#register .alert").attr( "class", "alert alert-success" );
                   $("#register .alert").html("<b>Sucesso!</b> Obrigado por se cadastrar");
              }
          }
          else if(result === 2){
              $("#register .alert").attr( "class", "alert alert-danger" );
              $("#register .alert").html("<b>Ops!</b> Seu email já está cadastrado em nosso sistema");
          }
          else{
              $("#register .alert").attr( "class", "alert alert-danger" );
              $("#register .alert").html("<b>Ops!</b> Houve algum problema com seu cadastro");
              
          }
      });


      // Callback handler that will be called on failure
      request.fail(function (jqXHR, textStatus, errorThrown){
          // Log the error to the console
          console.error("The following error occurred: "+textStatus +" " + errorThrown);
      });

      // Callback handler that will be called regardless
      // if the request failed or succeeded
      request.always(function () {
          // Reenable the inputs
          $inputs.prop("disabled", false);
      });

  }

  // Bind to the submit event of our form
  $("#cadastro #register").submit(register);
  $("#cadastro-full #register").submit(register);
  $("#cadastro-full #ebook").submit(register);
  $("#ebook-cbox #ebook").submit(register);


  $('input[name="nome"]').on('blur',function(event){
    var regName = new RegExp("(\\w+)(\\s+)(\\w+)");
    if(!regName.test($(this).val())){
      // $(this).prop({required : true});
      $(this).addClass('form-control-danger').css('border-color','red');
      $("#register .alert").attr( "class", "alert alert-danger" );
      $("#register .alert").html("<b>Ops!</b> Insira seu nome completo!");
      $("#ebook .alert").attr( "class", "alert alert-danger" );
      $("#ebook .alert").html("<b>Ops!</b> Insira seu nome completo!");
    }
    else{
      $(this).addClass('form-control-danger').css('border-color','#fff');
    }
  })
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