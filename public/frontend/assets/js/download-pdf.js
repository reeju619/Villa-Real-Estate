$(document).ready(function () {
    $("#showPdfIcon").click(function (event) {
        event.preventDefault(); // Prevent the default action of the anchor tag
        console.log("Download Brochure clicked"); // Log a message to the console
        $(this).fadeOut(300, function () {
            // Hide the "Download Brochure" link with a fade out effect
            $("#floatingPdfIcon").fadeIn(300); // Show the PDF icon with a fade in effect
        });
    });

    $("#floatingPdfIcon i").click(function (event) {
        event.preventDefault(); // Prevent the default action of the anchor tag
        console.log("PDF icon clicked"); // Log a message to the console
        // Create a hidden link with the PDF file URL
        var downloadLink = document.createElement('a');
        downloadLink.href =
            "http://127.0.0.1:8000/frontend/assets/files/blank.pdf"; // Replace with your PDF file URL
        downloadLink.download = "brochure.pdf"; // Set the filename for the downloaded file
        document.body.appendChild(downloadLink);
        downloadLink.click(); // Simulate a click event on the link to trigger the download
        document.body.removeChild(downloadLink); // Remove the link from the DOM after download
    });
});
