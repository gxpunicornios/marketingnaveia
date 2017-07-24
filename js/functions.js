$(document).ready(function(){



    function update(){
        if($(window).width() < 768){
            $('.navbar-light .navbar-nav .nav-link').css('color','#512772');
            $('.navbar-light .navbar-nav .nav-link:hover').css('color','#5c3f72');
            showCadastrarFullSection();
        }
        else{
            $('.navbar-light .navbar-nav .nav-link').css('color','#6afac5');
            $('.navbar-light .navbar-nav .nav-link:hover').css('color','#a1facb');
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