var addFolder= document.querySelector("#add-folder");
var the_input= document.querySelector("#the-input");
var the_form= document.querySelector("#addfolderform");

the_form.addEventListener('submit', (e)=> {
    e.preventDefault();
    console.log("subed");
});

addFolder.addEventListener('click', (e)=>{
    e.preventDefault();
    e.stopPropagation();
    // console.log(the_input.value);
    // the_form.submit();
    var the_cookie= getCookie('added_folders');
    var folders= [];
    the_cookie= JSON.parse(the_cookie);
    if (the_cookie!== null){
        folders= [...the_cookie];
    }

    if(!folders.includes(encodeURIComponent(the_input.value))){
        folders.push(encodeURIComponent(the_input.value));
        setCookie('added_folders', JSON.stringify(folders));
        location.reload();
    }
});

function setCookie(name, value, days= 0) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}