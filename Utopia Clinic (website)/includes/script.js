
$('.notification').click((event) => {
    event.stopPropagation();
    let displayProp = $('.notification-modal').css("display") === "none" ? "flex" : "none";
    $('.notification-modal').css("display", displayProp);
    $('.profile-modal').css("display", "none");
});

$('.profile').click(function (event) {
    event.stopPropagation();
    let displayProp = $('.profile-modal').css("display") === "none" ? "flex" : "none";
    $('.profile-modal').css("display", displayProp);
    $('.notification-modal').css("display", "none");
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


$('.read-more-btn').click(() => {
    if ($('.more-text').css("display") === "none") {
        $('.more-text').css("display", "block");
        $('.read-more-btn').html("Read Less");
    } else {
        $('.more-text').css("display", "none");
        $('.read-more-btn').html("Read More");
    }
});


let progressCirclePercentage = (className, percentage) => {
    let rotateDeg = percentage * 3.6;

    if (percentage > 50) {
        $(className).addClass('over50');
    }

    className = className + " .value-bar";

    $({ deg: 0 }).animate({ deg: rotateDeg }, {
        duration: 2000,
        step: function (now) {
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

$('.side-nav ul li a').not('.home-anker').click(function (event) {
    event.preventDefault();

    // Toggle active class on tab buttons
    $(this).parent().addClass("current-nav");
    $(this).parent().siblings().removeClass("current-nav");

    // display only active tab content
    let activeTab = $(this).attr("href");
    $('.body-container').not(activeTab).css("display", "none");
    $(activeTab).fadeIn();
    activeBody = activeTab;
});

let activeLink;

let tableInfoRequestAjax = (activeTab) => {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: "GET",
            url: "../Server/fetchTableData.php",
            dataType: "json",
            data: ({ activeTab: activeTab }),
            success: function (data) {
                resolve(data)
            },
            error: function (error) {
                reject(error)
            }
        })
    });
}

$('.body-container-bottom .tabs a').click(function (event) {
    event.preventDefault();
    // Toggle active class on tab buttons
    $(this).addClass("current-tab");
    $(this).siblings().removeClass("current-tab");

    // display only active tab content
    let activeTab = $(this).attr("href");
    let plusIcon;

    if (activeTab !== activeLink) {
        if (activeBody === "#Archive") {
            if (activeTab === "#Patients") {
                tableInfoRequestAjax(activeTab)
                    .then(data => createTableArchive(activeBody, activeTab, tableHeaderPatients, data))
                    .catch(error => console.log(error));
            } else if (activeTab === "#Doctors") {
                tableInfoRequestAjax(activeTab)
                    .then(data => createTableArchive(activeBody, activeTab, tableHeaderDoctors, data))
                    .catch(error => console.log(error));
            } else if (activeTab === "#Offers") {
                tableInfoRequestAjax(activeTab)
                    .then(data => createTableArchive(activeBody, activeTab, tableHeaderOffers, data))
                    .catch(error => console.log(error));
            }

        } else if (activeBody === "#Report") {
            if (activeTab === "#Daily") {
                tableInfoRequestAjax(activeTab)
                    .then(data => createTableArchive(activeBody, activeTab, tableHeaderDailyReport, data))
                    .catch(error => console.log(error));
            } else if (activeTab === "#Weekly") {
                tableInfoRequestAjax(activeTab)
                    .then(data => createTableArchive(activeBody, activeTab, tableHeaderDailyReport, data))
                    .catch(error => console.log(error));
            }
        } else if (activeBody === "#Tasks") {
            tableInfoRequestAjax(activeTab)
                .then(data => createTableArchive(activeBody, activeTab, tableHeaderDailyTask, data))
                .catch(error => console.log(error));
        }
        $(activeBody + ' .head').css('display', 'flex');
        $('.info-table').not(activeTab).remove();
        $(activeBody + ' .head h3').html(activeTab.replace('#', '') + activeBody.replace('#', ' '));
        activeLink = activeTab;
    }
});

$(".body-container-bottom .head input").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $(".info-table tr").not('.notForSearch').filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});

let editForm = (event) => {
    let tableHead = $(event.target).parent().parent().parent().children('.notForSearch').children();
    let idToEdit = $(event.target).parent().parent().children()[0].innerText;
    let form = $("<form> </form>");
    form.addClass('edit-form');
    form.append("<label> Select what to edit </label>");

    let select = $("<select id='" + idToEdit + "'> </select>");
    for (let i = 1; i < tableHead.length - 1; i++) {
        select.append("<option value='" + tableHead[i].outerText + "'>" + tableHead[i].outerText + "</option>");
    }

    form.append(select);
    form.append("<input type='text' name='newVal' placeholder='Enter the new value'>");
    form.append("<input type='button' value='Done' class='btn edit-btn' onClick='editFormOf(event)'>");
    $('#Archive .body-container-bottom .info-table .edit-form').remove();
    $('#Archive .body-container-bottom .info-table').append(form);
}

let editFromAjax = (tableName, id, valToEdit, newVal) => {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: "POST",
            url: "../Server/editData.php",
            dataType: "json",
            data: {
                tableName: tableName,
                id: id,
                valToEdit: valToEdit,
                newVal: newVal
            },
            success: function (data) {
                resolve(data)
            },
            error: function (error) {
                reject(error)
            }
        })
    });
}

let editFormOf = (event) => {
    let tableName = $(event.target).parent().parent().attr('id');
    let idToEdit = $(event.target).parent().children('select').attr('id');
    let valToEdit = $(event.target).parent().children('select').val();
    let newVal =  $(event.target).parent().children('input[name=newVal]').val();

    editFromAjax(tableName, idToEdit, valToEdit, newVal)
        .then(data => {
            location.reload();
        })
        .catch(error => console.log(error));
}

let deleteFromAjax = (tableName, id) => {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: "POST",
            url: "../Server/deleteData.php",
            dataType: "json",
            data: {
                tableName: tableName,
                id: id
            },
            success: function (data) {
                resolve(data)
            },
            error: function (error) {
                reject(error)
            }
        })
    });
}

let deleteForm = (event) => {
    let idToDelete = $(event.target).parent().parent().children()[0];
    let tableName = $(event.target).parent().parent().parent().parent().attr('id');
    let id = idToDelete.innerText;

    deleteFromAjax(tableName, id)
        .then(data => {
            $(event.target).parent().parent().remove();
        })
        .catch(error => console.log(error));
}

const tableHeaderPatients = [
    "National ID",
    "First Name",
    "Last Name",
    "DOB",
    "Phone Number",
    "Gender",
];

const tableHeaderDoctors = [
    "National ID",
    "First Name",
    "Last Name",
    "DOB",
    "Phone Number",
    "Gender",
    "MedicalSpecialist",
    "Address"
];

const tableHeaderOffers = [
    "Offer ID",
    "Offer Name",
    "Offer Descreption",
    "Offer Price",
    "Offer Date",
    "Clinic/Lab ID"
];

const tableHeaderDailyReport = [
    "Reservation ID",
    "Patient Name",
    "Specialty",
    "Date",
    "Time",
    "Price",
    "Doctor Name"
];

tableHeaderDailyTask = [
    "Reservation ID",
    "Patient NationalID",
    "Patient Name",
    "Syptoms",
    "Date",
    "Time"
];


let createTableArchive = (bodyID, id, th, tr) => {
    let tableDiv = $('<div></div>');
    tableDiv.addClass('info-table');
    tableDiv.attr('id', id.replace('#', ''));
    let table = $('<table></table>');
    let tableHead = $('<tr></tr>');
    tableHead.addClass('notForSearch');

    for (let i of th) {
        tableHead.append($('<th>' + i + '</th>'));
    }
    if (bodyID === "#Archive") {
        tableHead.append($('<th> Action </th>'));
    }
    table.append(tableHead);

    for (let i = 0; i < tr.length; i++) {
        let tableRow = $('<tr></tr>');
        for (const key in tr[i]) {
            let tableD = $('<td>' + tr[i][key] + '</td>');
            tableRow.append(tableD);
        }
        if (bodyID === "#Archive") {
            let tr = $("<td> </td>");
            let editIcon = $("<i class='fa fa-pencil'> </i>");
            let deleteIcon = $("<i class='fa fa-trash'> </i>");
            editIcon.attr("onclick", "editForm(event)");
            deleteIcon.attr("onclick", "deleteForm(event)");
            if (id !== "#Patients") {
                tr.append(editIcon);
            }
            tr.append(deleteIcon);
            tableRow.append(tr);
        }
        table.append(tableRow);
    }

    tableDiv.append(table);
    $(bodyID + ' .body-container-bottom').append(tableDiv);
    if (id !== "#Patients") {
        plusIcon = $('<i></i>');
        plusIcon.addClass('fa fa-plus fa-2x');
        plusIcon.attr('onclick', "formToggle('#form-" + id.replace('#', '') + "')");
        $('#Archive .info-table').append(plusIcon);
    }
    $(id).fadeIn();
}

let getDataAjax = (tableName) => {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: "GET",
            url: "../Server/getData.php",
            dataType: "json",
            data: ({ tableName: tableName }),
            success: function (data) {
                resolve(data)
            },
            error: function (error) {
                reject(error)
            }
        })
    });
}

let formToggle = (id) => {
    if (id == "#form-Offers") {
        getDataAjax("clinic").then(data => {
            for (let i = 0; i < data.length; i++) {
                let option = "<option value='" + data[i].Clinic_Lab_ID + "'> " + data[i].Specialty + "</option>";
                $('#form-Offers select').append(option);
            }
        });
    }
    $(id).show();
}

let closeForm = () => {
    $('.add-form').hide();
    $('#form-Offers select').empty();
}


$('form .validate').click(function (event) {
    event.preventDefault();
    let form = $(this).parent();
    let input = form.children('input');
    let submitCond = true;
    let numbers = /^[0-9]+$/;
    let letters = /^[a-zA-Z]+$/;
    let password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;

    for (let i = 0; i < input.length; i++) {
        if (input.eq(i).attr('class') !== "btn") {
            if (input.eq(i).val() !== "") {
                if (input.eq(i).attr('class') === "email") {
                    if (!input.eq(i).val().includes('@')) {
                        input.eq(i).val('');
                        input.eq(i).attr("placeholder", "Enter a valid mail");
                        input.eq(i).addClass('error');
                        submitCond = false;
                    }
                } else if (input.eq(i).attr('class') === "pass") {
                    if (!input.eq(i).val().match(password)) {
                        input.eq(i).val('');
                        input.eq(i).attr("placeholder", "Password must contains 8 letters, at least one capital and small letter");
                        input.eq(i).addClass('error');
                        submitCond = false;
                    }
                } else if (input.eq(i).attr('class') === "text") {
                    if (!input.eq(i).val().match(letters)) {
                        input.eq(i).val('');
                        input.eq(i).attr("placeholder", "no numbers allowed");
                        input.eq(i).addClass('error');
                        submitCond = false;
                    }
                } else if (input.eq(i).attr('class') === "num") {
                    if (!input.eq(i).val().match(numbers)) {
                        input.eq(i).val('');
                        input.eq(i).attr("placeholder", "no letters allowed");
                        input.eq(i).addClass('error');
                        submitCond = false;
                    }
                } else if (input.eq(i).attr('class') === "repeat-password") {
                    if (input.eq(i - 1).val() !== input.eq(i).val()) {
                        input.eq(i).val('');
                        input.eq(i).attr("placeholder", "Password doesnot match");
                        input.eq(i).addClass('error');
                        submitCond = false;
                    }
                } else if (input.eq(i).attr('class') === "checked") {
                    if (!input.eq(i).is(':checked')) {
                        submitCond = false;
                    }
                }
            } else {
                input.eq(i).attr("placeholder", "Required");
                input.eq(i).addClass('error');
                submitCond = false;
            }
        }
    }

    if (submitCond) {
        form.submit();
    }

});


$('#comment').click(function () {
    var input = $("#input").val(); // get the value from the input field
    $(".box").append(input + '<br>');// add to the box comment
    $("#input").val(' ');
    $(".boxContainer").slideDown();
});


$("#cancel").click(function () {
    $("#input").val(' ');
    $(".boxContainer").slideUp();

});
$("#delete").click(function () {
    $(".box").text(' ');
    $(".boxContainer").slideUp();
});

$("#Add").click(function () {
    if ($(".box").text() == "") {
        alert("Please write something in the specified field");
    } else
        $("#popup-1").show();
});
// for the two reservation pages, should open the pop up only when the fields are done
// $("#submit12").click(function () {


//     $("#popup-1").show();
// });
    /* $("#Submit2").click(function(){
$("#popup-1").hide();
});*/

