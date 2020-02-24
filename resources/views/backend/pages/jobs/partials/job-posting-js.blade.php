<script>
    $( "#txtDeadline" ).datepicker({
        required: true,
    });

    // Experience tab enabled/ disabled
$(document).on('click', '.exp-tab .exp', function() {
    $('.experience-filter').removeClass('row-disabled');
});
$(document).on('click', '.exp-tab .no-exp', function() {
    $('.experience-filter').addClass('row-disabled');
    $('.experience-filter select').val('-1');
    $('.experience-filter .well').remove();
    $('#hidSelectedExperience,#hidSelectedExperienceName,#hidSelectedBusiness,#hidSelectedBusinessName').val('');
    //$('#hidSelectedExperience').val('');
    //$('#hidSelectedExperienceName').val('');
    $('.experience-filter').find('input').removeAttr('checked');

    //$('.area-of-experience-items .well').remove();
});


// Radio Salary and Lunch toggle button
$(document).on('click', '.checkbox-toggle-group .btn', function() {
    $(this).prevAll('.btn').find('input').removeAttr('checked');
    $(this).nextAll('.btn').find('input').removeAttr('checked');
    $(this).parents('.checkbox-toggle-group').find('.btn.active').removeClass('active');
});

var strConfimationMessage = "";
strConfimationMessage += "<div class=\"confirmation-message\">";
strConfimationMessage += "    <button type=\"button\" class=\"close\"><span aria-hidden=\"true\">&times;<\/span><\/button>";
strConfimationMessage += "    <span id=\"\">Job information has been saved.<\/span>";
strConfimationMessage += "<\/div>";

function blockNonNumbers(obj, e, allowDecimal, allowNegative, isDependent) {
    var key;
    var isCtrl = false;
    var keychar;
    var reg;

    if (isDependent == false) {
        if (window.event) {
            key = e.keyCode;
            isCtrl = window.event.ctrlKey;
        } else if (e.which) {
            key = e.which;
            isCtrl = e.ctrlKey;
        }

        if (isNaN(key)) return true;

        keychar = String.fromCharCode(key);

        // CHECK FOR BACKSPACE OR DELETE, Ctrl 
        if (key == 8 || isCtrl) {
            return true;
        }

        reg = /\d/;
        var isFirstN = allowNegative ? keychar == '-' && obj.value.indexOf('-') == -1 : false;
        var isFirstD = allowDecimal ? keychar == '.' && obj.value.indexOf('.') == -1 : false;

        return isFirstN || isFirstD || reg.test(keychar);
    }
}

function CheckNumber(svalue, isDependent) {

    var val = document.getElementById(svalue).value;
    var l = val.length;
    var blnState = false;
    //var isChkval = $('#chkVacancies').prop('checked');

    if (isDependent == false) {
        for (i = 0; i < l; i++) {
            if (!(val.charCodeAt(i) >= 48 && val.charCodeAt(i) <= 57))
                blnState = true;

        }
        if (blnState == true) {
            alert("Please enter numeric value only.");
            document.getElementById(svalue).value = "";
            document.getElementById(svalue).focus();
            return false;
        }
    }
}


/*$(document).on('click','#optExperienceNotRequired input[type=checkbox]', function(){
    $(this).parents('.card-content').find('.slider-container').toggleClass('disabled');
});*/
$(document).on('click', 'input#optExperienceNotRequired[type=checkbox]', function() {
    $(this).parents('.form-group').find('.slider-container').toggleClass('disabled');
    $(this).parents('.form-group').find('.salary-type').toggleClass('disabled');
    $(this).parents('.card-content').find('#areaExperiance').toggleClass('disabled');
    $(this).parents('.card-content').find('#areaBusiness').toggleClass('disabled');
});

function UpdateChangedFields(fieldNumber) {
    var previousFieldNumbers = document.getElementById("changedFields").value;
    var arrPreviousFieldNumbers = previousFieldNumbers.split(",");
    if (!inArray(arrPreviousFieldNumbers, fieldNumber))
        document.getElementById("changedFields").value = previousFieldNumbers + "," + fieldNumber;
    var input = document.querySelectorAll('input[type=text],textarea');
    for (var i = 0; i < input.length; i++) {

        (input[i]);
    }
}

function inArray(array, str) {
    var isExist = false;
    for (var i = 0; i < array.length; i++) {
        if (array[i] == str) {
            isExist = true;
            break;
        }
    }
    return isExist;
}

// Device control
$(document).on('click', '.btn-mobile', function() {
    $('.device-container').removeClass('desktop').addClass('mobile');
});

$(document).on('click', '.btn-desktop', function() {
    $('.device-container').removeClass('mobile').addClass('desktop');
});


// SEARCH VIEW AND DETAILS VIEW TOGGLE FOR DESKTOP VIEW
$(document).on('click', '.btn-details-view', function() {
    $('.device-container').find('.details-view').removeClass('hidden');
    $('.device-container').find('.search-view').addClass('hidden');
});

$(document).on('click', '.btn-search-view', function() {
    $('.device-container').find('.search-view').removeClass('hidden');
    $('.device-container').find('.details-view').addClass('hidden');
});
$('.popTips').popover({ html: true });

// End Device control
// DISABLING POPOVER IN MOBILE
$(document).ready(function() {
    var winWidth = window.innerWidth;
    if (winWidth <= 767) {
        $(".container").on("mouseenter", ".popTips", function() {
            $(this).popover('destroy');
        });
    }
});
// End DISABLING POPOVER IN MOBILE


// Resume Receiving options control
$("#chkCVReceiveOptionEmail").click(function(){
    if ($('#chkCVReceiveOptionEmail').is(':checked')) {
        $("#resume_receiving_option").val('1');
        // Hide other options
        $("#collapseHC").removeClass('show');
        $("#collapseWI").removeClass('show');
    }else{
        $("#chkCVReceiveOptionEmail").prop('checked', false); 
        $("#resume_receiving_option").val('0');
        
        $("#collapseCvEmail").removeClass('show');
        $("#collapseWI").removeClass('show');
        $("#collapseHC").removeClass('show');
    }
});

$("#chkCVReceiveOptionHard").click(function(){
    if ($('#chkCVReceiveOptionHard').is(':checked')) {
        $("#resume_receiving_option").val('2');
        // Hide other options
        $("#collapseCvEmail").removeClass('show');
        $("#collapseWI").removeClass('show');
    }else{
        $("#chkCVReceiveOptionHard").prop('checked', false); 
        $("#resume_receiving_option").val('0');

        $("#collapseCvEmail").removeClass('show');
        $("#collapseWI").removeClass('show');
        $("#collapseHC").removeClass('show');
    }
});

$("#chkCVReceiveOptionWalk").click(function(){
    if ($('#chkCVReceiveOptionWalk').is(':checked')) {
        $("#resume_receiving_option").val('3');
        // Hide other options
        $("#collapseCvEmail").removeClass('show');
        $("#collapseHC").removeClass('show');
    }else{
        $("#chkCVReceiveOptionWalk").prop('checked', false); 
        $("#resume_receiving_option").val('0');

        $("#collapseCvEmail").removeClass('show');
        $("#collapseWI").removeClass('show');
        $("#collapseHC").removeClass('show');
    }
});


// COMPENSATION
$(document).on('click', '.compensation .radio-toggle .all-options', function() {
    $(this).parents('div.compensation').find('.row-disabled').removeClass('row-disabled').addClass('row-enabled');
});
$(document).on('click', '.compensation .radio-toggle .no-options', function() {
    $(this).parents('div.compensation').find('.row-enabled').addClass('row-disabled').removeClass('row-enabled');
    $(this).parents('div.compensation').find('.active').removeClass('active');
    $(this).parents('div.compensation').find('input').removeAttr('checked');
});

</script>