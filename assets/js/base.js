var w = window,
    d = document,
    e = d.documentElement,
    g = d.getElementsByTagName('body')[0],
    widthviewport = w.innerWidth || e.clientWidth || g.clientWidth,
    heightviewport = w.innerHeight || e.clientHeight || g.clientHeight;

$(document).ready(function(){
    
    masonry();
    gallery();

    var getHheader = $(".header").height();
    var getWsidemenu = $(".sidemenu").width();
    $(".main-section #about, .main-section #contact").css("height", heightviewport - getHheader);
    
    // masonry
    var masonry = new Macy({
        container: '.grid-masonry',
        trueOrder: false,
        waitForImages: true,
        useOwnImageLoader: true,
        debug: false,
        mobileFirst: true,
        columns: 0,
        margin: 0,
        breakAt: {
            1366: 5,
            1024: 4,
            767: 3,
            440: 2
        }
    });

    $(".sidemenu__ul li a, .link-to").click(function (e){
        e.preventDefault();
        var id = $(this).attr("href");
        if($(this).hasClass("active")){}else{
            if($(".main-section").hasClass("active")){
                $(".main-section").removeClass("active");
            }else{
                $(".main-section").addClass("active");
            }
        }                
        setTimeout(function(){
            $(".sidemenu__ul li a").removeClass("active");
            $(id+"-link").addClass("active");
            $(".main-section .section").removeClass("active");
            $(id).addClass("active");
            $("#close-button").click();
            masonry.recalculate(true);
        },300);
    });

    $(".grid-masonry li img").click(function (e){
        $("body").css('overflow', 'hidden');
        masonry.recalculate(true);
        $("#baguetteBox-overlay").css({
            "height":heightviewport - getHheader, 
            "width":widthviewport - getWsidemenu
        });
        if($(".sidemenu__minimize").hasClass("inactive")){
        }else{
            $("#baguetteBox-overlay").animate({'width' : "+=140px"},0);
        }
    });

    $("#close-button").click(function (e){
        $("body").css('overflow-y', 'auto');
        masonry.recalculate(true);
    });

    // gallery 
    function gallery(){
        baguetteBox.run('.grid-masonry', {});               
    }

    $(".grid-masonry li").mouseover(function(){
        $(".grid-masonry li").css("opacity", "0.5");
    });
    $(".grid-masonry li").mouseout(function(){
        $(".grid-masonry li").css("opacity", "1");
    });

    $("body").on("click",".button--info", function (e){
        if($(this).hasClass("active")){
            $(this).removeClass("active");
        }else{
            $(this).addClass("active");
        }
    });
    
    function masonry(){        
        setTimeout(function(){
            $(".grid-masonry img").css('opacity', '1');
            masonry.recalculate(true);
        },0);
    }

    // sidemenu
    $('.sidemenu__minimize').addClass('inactive');
    $('.sidemenu__minimize').click(function(){
        if($(this).hasClass('inactive')){ //this is the start of our condition //            
            $('.sidemenu__minimize').removeClass('inactive');
            $('.sidemenu, .main-section').animate({'marginLeft' : "-=140px"},500);
            $("#baguetteBox-overlay").animate({'width' : "+=140px"},500).css({"transition":"none"});
        }
        else{
            $('.sidemenu__minimize').addClass('inactive');
            $('.sidemenu, .main-section').animate({'marginLeft' : "+=140px"},500);
            $("#baguetteBox-overlay").animate({'width' : "-=140px"},500).css({"transition":"none"});
        }
        setTimeout(function(){
            masonry.recalculate(true);
            $("#baguetteBox-overlay").css({"transition":"all .3s"});
        },500);
    });    

    //if not hash# then put #home
    // if(document.location.hash === '') {
    //     document.location.hash = 'work';
    // }

    // if(document.location.hash) {        
    //     // call function
    //     searchcontacteffect();
    //     loadingeffectgrid();
    //     masonry();
    //     menulefteffect();

    //     var thehash = document.location.hash;
    //     if (thehash == "#work"){
    //         // alert(thehash); // returns "#work"            
    //         $(".sidemenu__ul li").removeClass("active");
    //         $('.sidemenu__ul li:nth-child(1) a').addClass('active');
    //         return false;
    //     } 
    //     else if (thehash == "#services"){
    //         // alert(thehash); // returns "#services"
    //         $(".sidemenu__ul li").removeClass("active");
    //         $('.sidemenu__ul li:nth-child(2) a').addClass('active');
    //         return false;
    //     } 
    //     else if (thehash == "#about"){
    //         // alert(thehash); // returns "#about"
    //         $(".sidemenu__ul li").removeClass("active");
    //         $('.sidemenu__ul li:nth-child(3) a').addClass('active');
    //         return false;
    //     }     
    // }
});