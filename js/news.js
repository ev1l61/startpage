$(document).ready(function () {

    let n = 1;

    (function newsLoop() {    
        $(".article").removeClass("unvisible");
        $(".article").not(":nth-child(" + n + ")").toggleClass("unvisible");
        n++;
        if(n>4){
            n=1;
        };
        setTimeout(newsLoop, 30000);
    })();

});
