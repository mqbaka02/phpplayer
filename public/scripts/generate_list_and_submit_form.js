/**
 * Generates a set of event listener tied to each element representing a song so
 * that everytime a song is clicked on the path of the song is retrieved and
 * the form is submited.
 */

var the_form= document.querySelector("#player-form");

var all_clickable_songs= document.querySelectorAll(".clickable-name");

var the_input= document.querySelector("input#filename");

all_clickable_songs.forEach(el=>{

    el.addEventListener('click', event=> {

        event.preventDefault();

        the_input.value= event.target.getAttribute('theattr');

        the_form.submit();

    });
});