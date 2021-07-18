window.onscroll = function() {
    // back to top button
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("btnTop").style.display = "block";
    } else {
        document.getElementById("btnTop").style.display = "none";
    }

    //nav bar
    var btn = document.getElementsByClassName('btnnav');
    function changepadding(ele, padding){
        for(var i=0, len=ele.length; i<len; i++)
        {
            ele[i].style["padding"] = padding;
        }
    }
    var subnav = document.getElementsByClassName('sub-nav');
    function changeposition(ele, top, left){
        for(var i=0, len=ele.length; i<len; i++)
        {
            ele[i].style["top"] = top;
            ele[i].style["marginLeft"] = left;
        }
    }
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        //small
        changepadding(btn, "15px 15px");
        changeposition(subnav, "50px", "-55px")
        document.getElementById("logo").style.height = "30px";
        document.getElementById("logo").style.margin = "10px";

    } else {
        //big
        changepadding(btn, "34px 20px");
        changeposition(subnav, "87px", "-60px")
        document.getElementById("logo").style.height = "57px";
        document.getElementById("logo").style.margin = "15px";
        
    }

}

// go to top
function topFunction() {
document.body.scrollTop = 0; // For Safari
document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

$(window).on('load',function(){
    var width = $(window).width();
    //nav bar
    if (width > 1080){
        $(".header-mobile").hide();
        $(".header-large").show();

    }else{
        $(".header-mobile").show();
        $(".header-large").hide();
    }

    //change content padding
    if (width > 800){
        $("content").css({
            "padding":"50px 100px"
        });
        $(".emailform").css({
            "padding":"80px"
        });
    }else{
        $(".content").css({
            "padding":"50px 50px"
        });
        $(".emailform").css({
            "padding":"0px"
        });
    };
    
    //menu bar toggle
    $('#smmenu-bar').click(function(){
        $('.hid-bar').toggle(500, "swing");
    });

    //industry
    $('#btnsub-ind').click(function(){
        $('#sub-ind').toggle(500, "swing");
    });

    //solution
    $('#btnsub-sol').click(function(){
        $('#sub-sol').toggle(500, "swing");
    });

    //services
    $('#btnsub-ser').click(function(){
        $('#sub-ser').toggle(500, "swing");
    });

});


//product-b1&vms change padding-left
$(window).resize(function() {
    var width = $(window).width();
    if (width > 800){
        $("#features-b1").css({
            "padding-left":"110px"
            
        });
    }else{
        $("#features-b1").css({
            "padding-left":"0px"
            
        });
    };
    
    //change navbar
    if (width > 1080){
        $(".header-mobile").hide();
        $(".header-large").show();

    }else{
        $(".header-mobile").show();
        $(".header-large").hide();
    };

    //change content padding
    if (width > 800){
        $("content").css({
            "padding":"50px 100px"
        });
        $(".emailform").css({
            "padding":"80px"
        });
    }else{
        $(".content").css({
            "padding":"50px 50px"
        });
        $(".emailform").css({
            "padding":"0px"
        });
    };
  });

