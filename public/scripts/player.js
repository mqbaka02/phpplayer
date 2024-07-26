window.onload= ()=> {
    var play_pause_btn= document.querySelector("#pp");
    var vol_up= document.querySelector("#vp");
    var vol_dw= document.querySelector("#vm");

    var the_player= document.querySelector("#audio");
    if(isPlaying(the_player)){
        play_pause_btn.innerHTML= "Pause";
    } else {
        play_pause_btn.innerHTML= "Play";
    }
    
    the_player.addEventListener('pause', (e) => {
        // console.log('pause');
        play_pause_btn.innerHTML= "Play";
    });
    the_player.addEventListener('play', (e) => {
        // console.log('play');
        play_pause_btn.innerHTML= "Pause";
    });

    play_pause_btn.addEventListener('click', (e)=> {
        if(isPlaying(the_player)){
            the_player.pause();
        } else {
            the_player.play();
        }
        // console.log(isPlaying(the_player));
    });

    vol_up.addEventListener('click', ()=>{
        if(the_player.volume> (1-.05)){
            return;
        }
        the_player.volume+= .05;
    });
    vol_dw.addEventListener('click', ()=>{
        if(the_player.volume< (.05)){
            return;
        }
        the_player.volume-= .05;
    });
};

// function isPlaying(plr) {
//     let atStart = plr.currentTime == 0 ? true : false
//     if ((atStart && plr.paused) || (plr.ended && plr.readyState == 0))
//         return false
//     return true
// }

function isPlaying(theplayer){
    return !theplayer.paused;
}