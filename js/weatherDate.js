$(function(){

    $.getJSON("https://api.openweathermap.org/data/2.5/weather?lat=LATITUDE&lon=LONGITUDEappid=OWM_API-KEY&units=metric&lang=de", function(data){
        let sunRise = new Date(data.sys.sunrise).toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" });
        let sunSet = new Date(data.sys.sunset).toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" });
        console.log(data.sys.sunrise);
        console.log(data.sys.sunset);
        
        $(".weatherSymbol").html("<i class='wi wi-owm-" + data.weather[0].id + "'></i>");
        $(".temperature").html(data.main.temp + "°C");
        $(".description").html(data.weather[0].description);
        $(".highLow").html((data.main.temp_min).toFixed(1) +"<i class='wi wi-direction-down'></i>" + " | " + "<i class='wi wi-direction-up'></i>"+ (data.main.temp_max).toFixed(1));
        $(".sunrise").append(sunRise);  
        $(".sunset").append(sunSet);
        }
    );

    (function timeDate() {
       let time = new Date($.now()).toLocaleTimeString();
       let date = new Date($.now()).toLocaleDateString([], { weekday: "long",  year: "numeric", month: "long", day: "numeric", });
        $(".time").html(time);
        $(".date").html(date);
        setTimeout(timeDate, 1000);
    })();

}); 