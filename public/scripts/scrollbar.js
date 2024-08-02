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
    scrollbarheight= (scrollable_el.clientHeight * scrollable_el.clientHeight) / scrollable_el.scrollHeight;
    scrollbarheight= scrollbarheight.toFixed(2);
    // console.log(scrollbarheight);
    scrollable_el.style.setProperty("--scrb-hgt", scrollbarheight + "px");
    maxScroll_value= scrollable_el.scrollHeight - scrollable_el.clientHeight;
}

scrollable_el.addEventListener('scroll', event => {
    event.stopPropagation();
    var scrollable_el_instance= event.target;
    // console.log("scrolling");
    // console.log(event.target.scrollTop);
    var possible_scroll= scrollable_el_instance.scrollHeight - scrollable_el_instance.clientHeight;
    var possible_bar_scroll= scrollable_el_instance.scrollHeight - scrollbarheight;
    var bar_top= scrollable_el_instance.scrollTop * possible_bar_scroll / possible_scroll;
    scrollable_el_instance.style.setProperty("--scrb-top", bar_top + "px");
    /**
     * scroll_distance= scrollheight - clientheight
     * bar_scroll_dist= scrollheight - barheight
     * $scrolltop / scroll_dist = $bar_top / barscrolldist;
     * $bar_top= $scrolltop * barscrolldist / scroll_distance;
     */
});