// Function to initialize voice recognition
function initializeVoiceSearch() {
    const recognition = new webkitSpeechRecognition();
    recognition.lang = 'en-US';
    let isListening = false;
    let timeoutId;

    // Event listener for when speech is recognized
    recognition.onresult = function (event) {
        const speechResult = event.results[0][0].transcript.toLowerCase();

        // Check if speech contains property name or category name
        // Search the database for matching properties or categories
        searchProperty(speechResult);
    };

    // Event listener for when speech recognition ends
    recognition.onend = function () {
        // Display "Please try again" message if no speech is captured
        if (isListening) {
            console.log("No speech detected. Please try again.");
            clearTimeout(timeoutId);
        }
    };

    // Event listener for voice search button click
    document.getElementById('voiceSearchButton').addEventListener('click', function () {
        if (!isListening) {
            // Start voice recognition
            recognition.start();
            isListening = true;

            // Set timeout to display "Sorry, cannot find" message after 20 seconds
            timeoutId = setTimeout(function () {
                console.log("Sorry, cannot find your desired results. Please try again.");
                recognition.stop();
                isListening = false;
            }, 20000); // 20 seconds
        }
    });
}

// Function to search for property details
function searchProperty(speech) {
    // Send an AJAX request to search for property details
    $.ajax({
        url: '/search-property',
        method: 'GET',
        data: { query: speech },
        success: function (response) {
            if (response.success) {
                // Display property details in a table below the voice button
                const propertyDetails = response.property_details; // Assuming the response contains property details
                displayPropertyDetails(propertyDetails);
            } else {
                // Display "Sorry, cannot find. Please try again."
                console.log("Sorry, cannot find. Please try again.");
            }
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        }
    });
}

// Function to display property details in a table
function displayPropertyDetails(propertyDetails) {
    // Clear previous results
    const propertyDetailsContainer = document.getElementById('propertyDetails');
    propertyDetailsContainer.innerHTML = '';

    // Create a table to display property details
    const table = document.createElement('table');
    table.classList.add('property-table');

    // Create table header
    const headerRow = table.insertRow();
    for (const key in propertyDetails[0]) {
        if (Object.hasOwnProperty.call(propertyDetails[0], key)) {
            const th = document.createElement('th');
            th.textContent = key.replace(/_/g, ' ').toUpperCase(); // Convert snake case to title case
            headerRow.appendChild(th);
        }
    }

    // Create table body
    propertyDetails.forEach(property => {
        const row = table.insertRow();
        for (const key in property) {
            if (Object.hasOwnProperty.call(property, key)) {
                const cell = row.insertCell();
                cell.textContent = property[key];
            }
        }
    });

    // Append table to container
    propertyDetailsContainer.appendChild(table);
}

// Call the initializeVoiceSearch function when the page is loaded
window.onload = function () {
    initializeVoiceSearch();
};
