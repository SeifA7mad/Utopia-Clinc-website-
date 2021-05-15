let navToggle = () => {
    $('.side-nav').animate({
        width: "toggle"
    });
}

$('.notification').click(() => {
    let displayProp =  $('.notification-list').css("display") === "none" ? "flex" : "none";
    $('.notification-list').css("display", displayProp);
});
