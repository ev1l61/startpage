$(function(){

    const curTi = new Date();
    let lastWater = new Date (localStorage.getItem("lastW")) || new Date(); 
    let nextWater = new Date (localStorage.getItem("nextW")) || new Date();
    let thirsty = new Date (localStorage.getItem("thirstW")) || new Date();

    let happyMood = ["&#128512;", "&#128516;", "&#128522;", "&#128525;", "&#128526;"];      
    let happyMoodRand = Math.floor(Math.random() * happyMood.length);
    let neutralMood = "&#128528;";                                                         
    let unHappyMood = ["&#128531;", "&#128534;", "&#128542;", "&#128544;", "&#128127;"];    
    let unHappyMoodRand = Math.floor(Math.random() * unHappyMood.length);

    $("#lastWater").append(lastWater.toLocaleDateString());
    $("#nextWater").append(nextWater.toLocaleDateString());

    $("#waterCan").on("click", function()   {
        let lastWater = new Date();                                                                     
        let nextWater = new Date(lastWater.getTime() + 7*24*60*60*1000);    
        let thirsty = new Date(lastWater.getTime() + 9*24*60*60*1000);  
        localStorage.setItem("lastW", lastWater);
        localStorage.setItem("nextW", nextWater);
        localStorage.setItem("thirstW", thirsty);
        location.reload();                                                                              
    })

    function plantMood() {
        if (curTi.getTime() >= thirsty.getTime()) {
            $("#mood").html(unHappyMood[unHappyMoodRand]);
        }        
        else if (curTi.getTime() > nextWater.getTime()) {
            $("#mood").html(neutralMood);
        }        
        else if (curTi.getTime() < nextWater.getTime()) {
            $("#mood").html(happyMood[happyMoodRand]);
        }
        else {
            $("#mood").html("Sorry, es sind leider keine Daten vorhanden");
        }
    }

    plantMood();

    // ----------------Begrüßung----------------
    
    var hours = new Date().getHours();
	var message;
	var morning = ('Guten Morgen ');
    var noon = ('Mahlzeit ');
	var afternoon = ('Grüß dich ');
	var evening = ('Guten Abend ');
    var night = ('Gute Nacht ');

	if (hours >= 04 && hours < 11) {
		message = morning; 
    } 
    else if (hours >= 11 && hours < 14) {
		message = noon;
	} 
    else if (hours >= 14 && hours < 17) {
    message = afternoon;
    }
    else if (hours >= 17 && hours < 21) {
		message = evening;
	}
    else if (hours > 02 && hours >= 21) {
		message = night;
	}

    console.log(message);
	$(".greeting").prepend(message);
});