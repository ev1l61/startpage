$(function(){
    
    $("#signUp").on("click", function(){
        $(".anmeldeForm").css("display", "flex");
        $(".loginSite").css('filter',"blur(4px)");
    });

    $("#close").on("click", function(){
        $(".anmeldeForm").css("display", "none");
        $(".loginSite").css('filter',"blur(0)");
    });

});