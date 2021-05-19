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
progressCirclePercentage(".rating", 20);

let activeBody;

$('.side-nav ul li a').click(function(event) {
    event.preventDefault();
    
    // Toggle active class on tab buttons
    $(this).parent().addClass("current-nav");
    $(this).parent().siblings().removeClass("current-nav");
    
    // display only active tab content
    var activeTab = $(this).attr("href");
    $('.body-container').not(activeTab).css("display","none");
    $(activeTab).fadeIn();
    activeBody = activeTab;
  });

let activeLink;

$('#Archive .body-container-bottom .tabs a').click(function(event) {
    event.preventDefault();
    
    // Toggle active class on tab buttons
    $(this).addClass("current-tab");
    $(this).siblings().removeClass("current-tab");
    
    // display only active tab content
    let activeTab = $(this).attr("href");
    if (activeTab !== activeLink) {
        createTableArchive(activeBody, activeTab.replace('#', ''), tableHeader, tableRows);
    }

    $('.info-table').not(activeTab).remove();
    $('#Archive .head h3').html(activeTab.replace('#', '') + activeBody.replace('#', ' '));
    $(activeTab).fadeIn();
    activeLink = activeTab;
  });

  const tableHeader = [
      "Full Name",
      "E-mail",
      "Role",
      "Phone number",
      "Address",
      "Gender",
      "Action",
  ];

  const tableRows = [
      [
        "Seif Ahmad",
        "Sauofa_ahmad@yahoo.com",
        "mo5 w a3sab",
        "01028877643",
        "Mokattam",
        'M',
        "Delete"
      ],
      [
        "Seif Ahmad",
        "Sauofa_ahmad@yahoo.com",
        "mo5 w a3sab",
        "01028877643",
        "Mokattam",
        'M',
        "Delete"
      ]
  ]; 

  let createTableArchive = (bodyID, id, th, tr) => {
      let tableDiv = $('<div></div>');
      tableDiv.addClass('info-table');
      tableDiv.attr('id', id);
      let table = $('<table></table>');
      let tableHead = $('<tr></tr>');

      for (let i of th) {
          tableHead.append($('<th>'+i+'</th>'));
      }
      table.append(tableHead);

      for (let i = 0; i < tr.length; i++) {
          let tableRow = $('<tr></tr>');
          for (let j = 0; j < tr[i].length; j++) {
              let tableD = $('<td>' +tr[i][j]+ '</td>');
              tableRow.append(tableD);
          }
          table.append(tableRow);
      }
      tableDiv.append(table);
      $( bodyID + ' .body-container-bottom').append(tableDiv);
  }

  $(document).ready(function(){
	$('#comment').click(function() {

		var input = $("#input").val(); // get the value from the input field
		$(".box").append(input+'<br>');// add to the box comment
		$("#input").val(' '); 
		$(".boxContainer").slideDown();
	});
		
	
	$("#cancel").click(function(){
		$("#input").val(' ');
	

	});
	$("#delete").click(function() {
		/* Act on the event */
		$(".box").text(' ');
		$(".boxContainer").slideUp();
	});
	});