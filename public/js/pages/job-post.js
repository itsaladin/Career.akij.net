// Assigning active class onload for Gender labels if inputs are checked
$(document).ready(function() {
    $('.btn-toggle-s-1 .btn input[type="radio"]:checked').each(function() {
        $(this).parents('.btn').addClass('active');
    });
});

// Radio toggle button
$(document).on('click', '.radio-toggle .btn.active', function(event) {
    event.preventDefault();
    $(this).removeClass('active');
    $(this).parents('.btn').find('input').removeAttr('checked');
});



// Check Vacancy Null Or Given 
$(document).ready(function() {
    $('#chkVacancies').change(function() {
        val = $(this).prop('checked');

        if (val == true) {
            $("#txtVacancies").val('NA');
        } else {
            $("#txtVacancies").val('');
        }
    });
});


// Salary Negotiable 
$(document).on('click', '#SalaryNegotiable', function() {
    var min_salary = document.getElementById("MinSalary");
    var max_salary = document.getElementById("MaxSalary");
    var salary_type = document.getElementById("SalaryPaid");
    if ($('#SalaryNegotiable').is(":checked")) {
        min_salary.setAttribute("disabled", "disabled");
        max_salary.setAttribute("disabled", "disabled");
        salary_type.setAttribute("disabled", "disabled");
    } else {
        min_salary.removeAttribute("disabled", "disabled");
        max_salary.removeAttribute("disabled", "disabled");
        salary_type.removeAttribute("disabled", "disabled");
    }
});

// $(document).on('click', '#SalaryNegotiable.clicked', function() {
//     $('#SalaryHide').parent('.md-checkbox').removeClass('disabled');
//     $(this).removeClass('clicked');
// });

// Salary Negotiable  End

// Checkbox Disabled
$(document).on('click', 'input[type=checkbox]', function() {
    $(this).parents('div.checkbox-disabled').addClass('clicked');
    $(this).parents('div.checkbox-disabled').find('.on-click-disabled').attr('disabled', 'disabled');
});

$(document).on('click', '.checkbox-disabled.clicked input[type=checkbox]', function() {
    $(this).parents('div.checkbox-disabled.clicked').removeClass('clicked');
    $(this).parents('div.checkbox-disabled').find('.on-click-disabled').removeAttr('disabled', 'disabled');
});


$(document).ready(function() {
    $('.checkbox-toggle input').change(function() {
        if ($(this).prop('checked')) {
            $(this).parents('.checkbox-toggle').addClass('active');
        } else {
            $(this).parents('.checkbox-toggle').removeClass('active');
        }
    });
});
$(document).ready(function() {
    $('.checkbox-toggle input[type="checkbox"]:checked').each(function() {
        $(this).parent().addClass('active');
    });
});


// JOB LOCATION TOGGLE BUTTON INSIDE/ OUTSIDE BANGLADESH
$(document).on('click', '.job-location-toggle .outside-bd', function() {
    $(this).parents('div.job-location-toggle').find('input').removeClass('hidden');
});
$(document).on('click', '.job-location-toggle .inside-bd', function() {
    $(this).parents('div.job-location-toggle').find('input').addClass('hidden');
});


// COMPENSATION
$(document).on('click', '.compensation .btn-toggle-s-1 .all-options', function() {
    $(this).parents('div.compensation').find('.row-disabled').removeClass('row-disabled').addClass('row-enabled');
});
$(document).on('click', '.compensation .btn-toggle-s-1 .no-options', function() {
    $(this).parents('div.compensation').find('.row-enabled').addClass('row-disabled').removeClass('row-enabled');
    $(this).parents('div.compensation').find('.active').removeClass('active');
    $(this).parents('div.compensation').find('input').removeAttr('checked');
});


// Switch button toggle child showing and hiding
$(document).on('change', '.switch input', function() {
    $(this).parents('.form-group').find('.collapse').addClass('in');
    $(this).addClass('collapsed');
});

$(document).on('change', '.switch input.collapsed', function() {
    $(this).parents('.form-group').find('.collapse').removeClass('in');
    $(this).removeClass('collapsed');
});

//Start CV Receiving Option Controls
$(document).on('change', '.checkbox-toggle.HC.active', function() {
    $('.resume-receiving-fields').find('#collapseHC').find('textarea').val('');
});
$(document).on('change', '.checkbox-toggle.WI.active', function() {
    $('.resume-receiving-fields').find('#collapseWI').find('textarea').val('');
});
//End CV Receiving Option Controls