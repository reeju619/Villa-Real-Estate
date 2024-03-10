$(document).ready(function () {
    // Initialize the form to show only the first step
    function initializeFormSteps() {
        $('.form-step').hide();
        $('#formStep1').show();
    }

    initializeFormSteps(); // Call this when the page loads

    $('[data-toggle="modal"]').click(function () {
        $('#scheduleVisitModal').modal('show');
        initializeFormSteps();
    });

    // Navigation Handlers
    $('.toStep2').click(function () {
        if (validateStep1()) goToStep(2);
    });

    $('.toStep3').click(function () {
        if (validateStep2()) goToStep(3);
    });

    $('.backToStep1').click(function () {
        goToStep(1);
    });

    $('.backToStep2').click(function () {
        goToStep(2);
    });

    $('.close, .close-modal').click(function () {
        $('#scheduleVisitModal').modal('hide');
    });

    // Validation Logic
    function validateStep1() {
        // Reset validation messages
        $('.validation-message').text('');

        let isValid = true;
        let name = $('#visitorName').val().trim();
        let contact = $('#visitorContact').val().trim();
        let email = $('#visitorEmail').val().trim();
        let genderSelected = $('input[name="gender"]:checked').val();
        let detailsConfirmed = $('#detailsConfirmation').is(':checked');

        if (!name) {
            isValid = false;
            $('[data-for="visitorName"]').text('Please enter your name.');
        }

        if (!contact) {
            isValid = false;
            $('[data-for="visitorContact"]').text('Please enter your contact info.');
        }

        if (!email || !validateEmail(email)) {
            isValid = false;
            $('[data-for="visitorEmail"]').text('Please enter a valid email address.');
        }

        if (!genderSelected) {
            isValid = false;
            $('[data-for="gender"]').text('Please select your gender.');
        }

        if (!detailsConfirmed) {
            isValid = false;
            $('[data-for="detailsConfirmation"]').text('Please confirm the details are correct.');
        }

        return isValid;
    }

    function validateStep2() {
        let propertySelected = $('#propertySelect').val();
        let visitDate = $('#visitDate').val();
        let today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD

        $('.validation-message').text('');

        let isValid = true;
        if (!propertySelected) {
            isValid = false;
            $('[data-for="propertySelect"]').text('Please select a property.');
        }

        if (!visitDate || visitDate <= today) {
            isValid = false;
            $('[data-for="visitDate"]').text('Please select a future date for your visit.');
        }

        return isValid;
    }

    function validateStep3() {
        // No validation required for step 3 as per requirements
        return true;
    }

    function goToStep(step) {
        $('.form-step').hide();
        $('#formStep' + step).show();
    }

    // Helper function to validate email format
    function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    // AJAX form submission with validation
    $('.submitVisitRequest').click(function () {
        if (currentStep === 3 && validateStep3()) {
            submitForm();
        }
    });

    // Reset and reinitialize form when modal is closed
    $('#scheduleVisitModal').on('hidden.bs.modal', function () {
        $('#propertyInquiryForm')[0].reset();
        initializeFormSteps();
    });

    function submitForm() {
        let formData = $('#propertyInquiryForm').serialize();
        $.ajax({
            url: '/submit-visit-form',
            type: 'POST',
            data: formData,
            success: function (response) {
                alert(response.message);
                $('#scheduleVisitModal').modal('hide');
            },
            error: function (xhr) {
                alert('Error: ' + xhr.responseText);
            }
        });
    }
});
