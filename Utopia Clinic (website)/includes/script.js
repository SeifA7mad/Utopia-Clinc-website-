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
    let activeTab = $(this).attr("href");
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
    let plusIcon;

    if (activeTab !== activeLink) {
        createTableArchive(activeBody, activeTab.replace('#', ''), tableHeader, tableRows);
        $('#Archive .head').css('display', 'flex');
        if (activeTab != "#Patients") {
            plusIcon = $('<i></i>');
            plusIcon.addClass('fa fa-plus fa-2x');
            plusIcon.attr('onclick', "formToggle('#form-" +activeTab.replace('#', '')+ "')");
        }
    }
    $('.info-table').not(activeTab).remove();
    $('#Archive .head h3').html(activeTab.replace('#', '') + activeBody.replace('#', ' '));
    $('#Archive .info-table').append(plusIcon);
    $(activeTab).fadeIn();
    activeLink = activeTab;
  });

  $(".body-container-bottom .head input").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".info-table tr").not('.notForSearch').filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
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
        "karim Rafaat",
        "karim@yahoo.com",
        "mo5 w a3sab",
        "01028877643",
        "shorouk",
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
      tableHead.addClass('notForSearch');
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

let formToggle = (id) => {
    $(id).show();
}

let closeForm = () => {
    $('.add-form').hide();
}

$('form .validate').click(function(event) {
    event.preventDefault();
    let form = $(this).parent();
    let input = form.children('input');
    let submitCond = true;
    let numbers = /^[0-9]+$/;
    let letters = /^[a-zA-Z]+$/;
    let password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;

    for (let i = 0; i < input.length; i++) {
        if (input.eq(i).attr('name') !== "button") {
            if (input.eq(i).val() !== "") {
                if (input.eq(i).attr('name') === "email") {
                    if (!input.eq(i).val().includes('@')) {
                        input.eq(i).val("Not Email");
                        submitCond = false;
                    }
                } else if (input.eq(i).attr('name') === "password") {
                    if (!input.eq(i).val().match(password)) {
                        input.eq(i).val("Not password");
                        submitCond = false;
                    }
                } else if (input.eq(i).attr('name') === "text") {
                    if (!input.eq(i).val().match(letters)) {
                        input.eq(i).val("Not text");
                        submitCond = false;
                    }
                } else if (input.eq(i).attr('name') === "num") {
                    if (!input.eq(i).val().match(numbers)) {
                        input.eq(i).val("Not num");
                        submitCond = false;
                    }
                } 
            } else {
                input.eq(i).val("Empty");
                submitCond = false;
            }
        }
    }

    if (submitCond) {
        form.submit();
    }
})


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