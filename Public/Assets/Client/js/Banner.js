
var index = 1;
var flag = false;
var interval;

$(function () {
    startSlide();
});


function startSlide() {
    interval = setInterval(() => {
        if (index < 3) {
            $(`.slider-item-${index}`).hide();
            $(`.dot-${index}`).removeClass('dot-active');
            index++;
            $(`.slider-item-${index}`).fadeIn(1000);
            $(`.dot-${index}`).addClass('dot-active');
        } else if (index === 3) {
            $(`.slider-item-${index}`).hide();
            $(`.dot-${index}`).removeClass('dot-active');
            index = 1;
            $(`.slider-item-${index}`).fadeIn(1000);
            $(`.dot-${index}`).addClass('dot-active');
        } else if (index > 3 || index < 0) {
            index = 1;
            $(`.slider-item-${index}`).fadeIn(1000);
            $(`.dot-${index}`).addClass('dot-active');
        }
    }, 6000);
}
function chooseBanner(id) {
    if (id > 0 && id <= 3) {
        clearInterval(interval);
        $(`.dot`).removeClass('dot-active');
        $(`.dot-${id}`).addClass('dot-active');
        $(`.slider-item`).hide();
        $(`.slider-item-${id}`).fadeIn(1000);
        startSlide();
    }
}
