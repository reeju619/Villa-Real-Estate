// public/js/password-reset-success.js

document.addEventListener('DOMContentLoaded', function () {
    // Triggered once the DOM is fully loaded
    if (sessionStorage.getItem("passwordResetSuccess") === "true") {
        // Display alert message
        alert("Your password has been reset successfully. Please login.");

        // Clear the sessionStorage item to prevent the alert from showing again on refresh
        sessionStorage.removeItem("passwordResetSuccess");

        // Redirect to the login page
        window.location.href = "{{ route('admin.login') }}"; // Update this URL if necessary
    }
});
