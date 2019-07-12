

var audioArr = [];


window.onload = function(){
    console.log("hello world");
}

function test(file, position){    
    if(audioArr[position] === undefined){                
        audioArr[position] = new Audio('http://www.largesound.com/ashborytour/sound/'+file);        

        pauseAll();
        audioArr[position].play();        
    } else {
        if(audioArr[position].paused){            
            pauseAll();
            audioArr[position].play()
        } else {            
            pauseAll();       
        }        
    }
    // const musicUlr = $("#music-1").data("music");    
}


function pauseAll(){   
    for (let index = 0; index < audioArr.length; ++index) {        
        if(audioArr[index] !== undefined){
            audioArr[index].pause()            
        }                
    }
}