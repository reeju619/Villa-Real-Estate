$(document).ready(function () {
    // Hide all steps except the first one initially
    function initializeFormSteps() {
        $('.form-step').hide(); // Hide all steps
        $('#formStep1').show(); // Show only the first step
    }

    // Call the function to set the initial state of the form steps
    initializeFormSteps();

    // Function to navigate between steps
    function goToStep(step) {
        $('.form-step').hide(); // Hide all steps
        $(`#formStep${step}`).show(); // Show the current step
    }

    // Open the modal
    $('[data-toggle="modal"]').click(function () {
        $('#scheduleVisitModal').modal('show');
        initializeFormSteps(); // Ensure correct state when modal is opened
    });

    // Navigation between steps
    $('.toStep2').click(function () {
        if (validateStep1()) {
            goToStep(2);
        }
    });
    $('.toStep3').click(function () {
        if (validateStep2()) {
            goToStep(3);
        }
    });
    $('.backToStep1').click(function () {
        goToStep(1);
    });
    $('.backToStep2').click(function () {
        goToStep(2);
    });

    // Validation for Step 1
    function validateStep1() {
        let isValid = true;

        // Validate Name
        if ($('#visitorName').val().trim() === '') {
            alert('Please enter your name.');
            isValid = false;
        }
        //Validate Contact No.
        else if ($('#visitorContact').val().trim() === '') {
            alert('Please enter your contact number.');
            isValid = false;
        }
        // Validate Email
        else if ($('#visitorEmail').val().trim() === '') {
            alert('Please enter your email.');
            isValid = false;
        }
        // Validate Email format
        else if (!isValidEmail($('#visitorEmail').val().trim())) {
            alert('Please enter a valid email address.');
            isValid = false;
        }
        // Validate Gender
        else if (!$('input[name="gender"]:checked').val()) {
            alert('Please select your gender.');
            isValid = false;
        }
        // Validate Checkbox
        else if (!$('#detailsConfirmation').prop('checked')) {
            alert('Please confirm that all details are correct.');
            isValid = false;
        }

        return isValid;
    }

    // Validate Step 2
    function validateStep2() {
        let isValid = true;
        let propertySelected = $('#propertyId').val();
        let visitDate = $('#visitDate').val();
        let today = new Date().toISOString().split('T')[0];

        // Check if the default "none" option is selected for the property
        if (!propertySelected || propertySelected === "none") {
            alert('Please select a property.');
            isValid = false;
        }

        // Validate Visit Date is selected and is in the future
        else if (!visitDate || visitDate <= today) {
            alert('Please select a date after today.');
            isValid = false;
        }

        return isValid;
    }
    // Helper function to validate email format
    function isValidEmail(email) {
        // Regular expression for validating email format
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Final submission (no validation for Step 3)
    $('.submitVisitRequest').click(function () {
        submitForm();
    });

    // AJAX form submission
    function submitForm() {
        // Serialize form data
        let formData = $('#propertyInquiryForm').serialize();

        // Include visitorName, visitorEmail, visitorContact, additionalMessage, visitDate, and propertyId in formData
        formData += `&visitorName=${$('#visitorName').val()}&visitorEmail=${$('#visitorEmail').val()}&visitorContact=${$('#visitorContact').val()}&visitDate=${$('#visitDate').val()}&additionalMessage=${$('#additionalMessage').val()}&property_id=${$('#propertyId').val()}`;

        $.ajax({
            url: '/submit-visit-form',
            type: 'POST',
            data: formData,
            success: function (response) {
                alert(response.message);
                $('#scheduleVisitModal').modal('hide');
                $('#propertyInquiryForm')[0].reset();
            },
            error: function (xhr) {
                alert('Error submitting form. Please try again.');
            }
        });
    }




    // Close modal and reset form when modal is manually closed
    $('#scheduleVisitModal').on('hidden.bs.modal', function () {
        $('#propertyInquiryForm')[0].reset();
        goToStep(1); // Return to the first step
    });
});
