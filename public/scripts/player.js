window.onload= ()=> {
    var play_pause_btn= document.querySelector("#pp");
    var vol_up= document.querySelector("#vp");
    var vol_dw= document.querySelector("#vm");
    var vol_slider= document.querySelector('.volume .volume-value');

    if(getCookieFromKey("audioVolume") != null){
        console.log(getCookieFromKey("audioVolume"));
        setVolume(getCookieFromKey("audioVolume"));
    }

    var the_player= document.querySelector("#audio");
    if(isPlaying(the_player)){
        play_pause_btn.innerHTML= "Pause";
    } else {
        play_pause_btn.innerHTML= "Play";
    }

    set_width(vol_slider, the_player.volume);

    vol_slider.addEventListener('click', handleVolume);

    the_player.addEventListener('volumechange', (e)=>{
        set_width(vol_slider, the_player.volume);
        addCookie("audioVolume", the_player.volume);
    });
    
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
            the_player.volume= 1;
            return;
        }
        the_player.volume+= .05;
    });

    vol_dw.addEventListener('click', ()=>{
        if(the_player.volume< (.05)){
            the_player.volume= 0;
            return;
        }
        the_player.volume-= .05;
    });
};

function isPlaying(theplayer){
    return !theplayer.paused;
}

function set_width(element, value){
    element.style.setProperty("--volume", (100 * value) + "%");
}

function handleVolume(event){
    const mouseRelativePos= {x: event.clientX - event.target.getBoundingClientRect().x, y: event.clientY - event.target.getBoundingClientRect().y}
    event.target.style.setProperty("--volume", mouseRelativePos.x + "%");
    var audio_player= document.querySelector("#audio");
    audio_player.volume= mouseRelativePos.x / 100;
    addCookie("audioVolume", audio_player.volume);
}

function addCookie(key, value){
    localStorage.setItem(key, value);
}

function getCookieFromKey(key){
    return localStorage.getItem(key);
}

function setVolume(somevalue){
    var audio_player= document.querySelector("#audio");
    var vol_slider= document.querySelector(".volume .volume-value");
    set_width(vol_slider, parseFloat(somevalue));
    audio_player.volume= parseFloat(somevalue);
}