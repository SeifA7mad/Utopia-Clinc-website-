let isSigned = false;

let signIn = () => {
    isSigned = true;
    diplayProfileModal();
}

$('.notification').click(() => {
    let displayProp =  $('.notification-modal').css("display") === "none" ? "flex" : "none";
    $('.notification-modal').css("display", displayProp);
    $('.profile-modal').css("display", "none");
});

$('.read-more-btn').click(() => {
    if ($('.more-text').css("display") === "none") {
        $('.more-text').css("display", "block");
        $('.read-more-btn').html("Read Less");
    } else {
        $('.more-text').css("display", "none");
        $('.read-more-btn').html("Read More");
    }
});

let diplayProfileModal = () => {
    let displayProp = $('.profile-modal').css("display") === "none" ? "flex" : "none";

    if (displayProp === "flex") {
        if (isSigned) {
            $('.profile-modal-content').css("display", displayProp);
            $('.sign-in-form').css("display", "none");
        } else {
            $('.sign-in-form').css("display", displayProp);
            $('.profile-modal-content').css("display", "none");
        }
    }

    $('.profile-modal').css("display", displayProp);
    $('.notification-modal').css("display", "none");
}

let progressCirclePercentage = (className, percentage) => {
    let rotateDeg = percentage * 3.6;

    if (percentage > 50) {
        $(className).addClass('over50');
    }

    className = className + " .value-bar";   

    $({deg: 0}).animate({deg: rotateDeg}, {
        duration: 2000,
        step: function(now) {
            $(className).css({
                transform: 'rotate(' + now + 'deg)'
            });
        }
    });
}

progressCirclePercentage(".rating-clinic", 80);
progressCirclePercentage(".rating-doctor", 60);