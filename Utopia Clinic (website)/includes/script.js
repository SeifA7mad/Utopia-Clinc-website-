let navToggle = () => {
    $('.side-nav').animate({
        width: "toggle"
    });
}

$('.notification').click(() => {
    let displayProp =  $('.notification-list').css("display") === "none" ? "flex" : "none";
    $('.notification-list').css("display", displayProp);
});

$('.read-more-btn').click(() => {
    if ($('.more-text').css("display") === "none") {
        $('.more-text').css("display", "block");
        $('.read-more-btn').html("Read Less");
    } else {
        $('.more-text').css("display", "none");
        $('.read-more-btn').html("Read More");
    }
})
