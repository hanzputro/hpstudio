
$(document).ready(function(){

    //if not hash# then put #home
    if(document.location.hash === '') {
        document.location.hash = 'work';
    }
    
    $(".menuleft__ul li a").click(function () {
        // e.preventDefault();        
        $(".menuleft__ul li a").removeClass("menuleft--active");
        $(this).addClass("menuleft--active");
        loadingeffectgrid();
    });

    if(document.location.hash) {        
        // call function
        searchcontacteffect();
        loadingeffectgrid();
        menulefteffect();

        var thehash = document.location.hash;
        if (thehash == "#work"){
            // alert(thehash); // returns "#work"            
            $(".menuleft__ul li").removeClass("menuleft--active");
            $('.menuleft__ul li:nth-child(1) a').addClass('menuleft--active');
            return false;
        } 
        else if (thehash == "#services"){
            // alert(thehash); // returns "#work"
            $(".menuleft__ul li").removeClass("menuleft--active");
            $('.menuleft__ul li:nth-child(2) a').addClass('menuleft--active');
            return false;
        } 
        else if (thehash == "#about"){
            // alert(thehash); // returns "#work"
            $(".menuleft__ul li").removeClass("menuleft--active");
            $('.menuleft__ul li:nth-child(3) a').addClass('menuleft--active');
            return false;
        }     
    }
    
    //slide updown search & contact
    function searchcontacteffect(){        
        $('.logo-search1').addClass('inactive');
        $('.logo-search1').click(function(){

            if($(this).hasClass('inactive')){ //this is the start of our condition //
                    if($('.logo-contact').hasClass('active')){
                        $('.logo-contact').addClass('inactive');
                        $('.logo-contact').removeClass('active');
                        $('.logo-contact').removeClass('listmenucontact__active');
                        $('.contactdiv').animate({'marginTop' : "-=180px"},500);
                        $('.logo-search1').removeClass('inactive');
                        $('.logo-search1').addClass('active');
                        $('.logo-search1').addClass('listmenusearch__active');    
                        $('.searchdiv').animate({'marginTop' : "+=130px"},500);
                    }else{
                        $('.logo-search1').removeClass('inactive');
                        $('.logo-search1').addClass('active');
                        $('.logo-search1').addClass('listmenusearch__active');    
                        $('.searchdiv').animate({'marginTop' : "+=130px"},500);
                    }
            }
            else{
                $('.logo-search1').addClass('inactive');
                $('.logo-search1').removeClass('active');
                $('.logo-search1').removeClass('listmenusearch__active');
                $('.searchdiv').animate({'marginTop' : "-=130px"},500);     
            }
        });
        
        $('.logo-contact').addClass('inactive');
        $('.logo-contact').click(function(){
            if($(this).hasClass('inactive')){ //this is the start of our condition //
                if($('.logo-search1').hasClass('active')){
                    $('.logo-search1').addClass('inactive');
                    $('.logo-search1').removeClass('active');
                    $('.logo-search1').removeClass('listmenusearch__active');
                    $('.searchdiv').animate({'marginTop' : "-=130px"},500);
                    $('.logo-contact').removeClass('inactive');
                    $('.logo-contact').addClass('active');
                    $('.logo-contact').addClass('listmenucontact__active');    
                    $('.contactdiv').animate({'marginTop' : "+=180px"},500);
                }else{
                    $('.logo-contact').removeClass('inactive');
                    $('.logo-contact').addClass('active');
                    $('.logo-contact').addClass('listmenucontact__active');    
                    $('.contactdiv').animate({'marginTop' : "+=180px"},500);
                }
            }
            else{
                $('.logo-contact').addClass('inactive');
                $('.logo-contact').removeClass('active');
                $('.logo-contact').removeClass('listmenucontact__active');
                $('.contactdiv').animate({'marginTop' : "-=180px"},500);     
            }
        });
    }
    
    // animate close left menu
    function menulefteffect(){
        $('.menuleft__minimize').addClass('inactive');
        $('.menuleft__minimize').click(function(){
            if($(this).hasClass('inactive')){ //this is the start of our condition //
                $('.menuleft__minimize').removeClass('inactive');
                $('.menuleft').animate({'marginLeft' : "-=140px"},500);
            }
            else{
                $('.menuleft__minimize').addClass('inactive');
                $('.menuleft').animate({'marginLeft' : "+=140px"},500);
            }
        });
    }

    //loading effect grid
    function loadingeffectgrid(){
        new AnimOnScroll( document.getElementById( 'work__masonry' ), {
            minDuration : 0.4,
            maxDuration : 0.7,
            viewportFactor : 0.2
        } );

        //gallery lightbox
        baguetteBox.run('#work__masonry', {
          
        });
    }

    //add menuleft--active in left menu 
    // $(".panel").hide().first().show();
    // $(".menuleft__ul li:first").addClass("menuleft--active");
    // $(".menuleft__ul li a").click(function () {
    //     // e.preventDefault();
    //     $(this).addClass("menuleft--active").siblings().removeClass("menuleft--active");
    //     // $($(this).attr('href')).slideDown(400).siblings('.panel').slideUp(400);
    //     //$($(this).attr('href')).animate({ height: 'show', opacity: 'show' }, 'slow').siblings('.panel').animate({ height: 'hide', opacity: 'hide' }, 'slow');
    //     //$($(this).attr('href')).show().siblings('.panel').hide();
    // });
    // var hash = $.trim( window.location.hash );
    // if (hash) $('.menuleft__ul li a[href$="'+hash+'"]').trigger('click');    
});


