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

$('.side-nav ul li a').click(function(event) {
    event.preventDefault();
    
    // Toggle active class on tab buttons
    $(this).parent().addClass("current-nav");
    $(this).parent().siblings().removeClass("current-nav");
    
    // display only active tab content
    var activeTab = $(this).attr("href");
    $('.body-container').not(activeTab).css("display","none");
    $(activeTab).fadeIn();
    
  });

$('.body-container-bottom .tabs a').click(function(event) {
    event.preventDefault();
    
    // Toggle active class on tab buttons
    $(this).addClass("current-tab");
    $(this).siblings().removeClass("current-tab");
    
    // display only active tab content
    var activeTab = $(this).attr("href");
    createTable(activeTab.replace('#', ''), tableHeader);
    $('.info-table').not(activeTab).css("display","none");
    $('.body-container .head h3').html(activeTab.replace('#', ''));
    $(activeTab).fadeIn();
  });

  const tableHeader = [
      "Full Name",
      "E-mail",
      "Role",
      "Phone number",
      "Address",
      "Gender",
      "Action",
  ]

  let createTable = (id, th) => {
      let tableDiv = $('<div></div>');
      tableDiv.addClass('info-table');
      tableDiv.attr('id', id);
      let table = $('<table></table>');
      let tableHead = $('<tr></tr>');

      for (let i of th) {
          tableHead.append($('<th>'+i+'</th>'));
      }
      table.append(tableHead);
      tableDiv.append(table);
      $('.body-container-bottom').append(tableDiv);
  }