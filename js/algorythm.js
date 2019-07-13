

var audioArr = [];


window.onload = function(){
    console.log("hello world");
}

function test(file, position){    
    if(audioArr[position] === undefined){                 
        audioArr[position] = new Audio(file);                        
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

    // 0 3 - 4 7 - 8 - 11
}


function pauseAll(){   
    for (let index = 0; index < audioArr.length; ++index) {        
        if(audioArr[index] !== undefined){
            audioArr[index].pause()            
        }                
    }
}