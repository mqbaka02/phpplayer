// console.log("hello scrbr");
var scrollbarheight= 100;
var maxScroll_value= 0;

function isOverflown(element) {
    return element.scrollHeight > element.clientHeight || element.scrollWidth > element.clientWidth;
}

var scrollable_el= document.querySelector(".inner:first-child");
// console.log(scrollable_el);
var scrollbar= document.querySelector(".scrollbar");
if(!isOverflown(scrollable_el)){
    scrollbar.classList.add("invisible");
    // console.log('overflown');
} else {
    scrollbar.classList.remove("invisible");
    // scrollbarheight= (scrollable_el.clientHeight / scrollable_el.scrollHeight) * 100;
    scrollbarheight= (scrollable_el.clientHeight * scrollable_el.clientHeight) / scrollable_el.scrollHeight;
    scrollbarheight= scrollbarheight.toFixed(2);
    console.log(scrollbarheight);
    scrollable_el.style.setProperty("--scrb-hgt", scrollbarheight + "px");
    maxScroll_value= scrollable_el.scrollHeight - scrollable_el.clientHeight;
}

scrollable_el.addEventListener('scroll', event => {
    event.stopPropagation();
    // console.log("scrolling");
    // console.log(event.target.scrollTop);
    var scrollbarPos= (event.target.scrollTop / maxScroll_value) * 100 * (scrollable_el.scrollHeight / scrollable_el.clientHeight);
    scrollbarPos= scrollbarPos.toFixed(2);
    console.log(scrollbarPos);
    event.target.style.setProperty('--scrb-top', scrollbarPos + "%");
});