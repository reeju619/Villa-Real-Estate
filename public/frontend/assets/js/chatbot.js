jQuery(document).ready(function ($) {
    var greetingDisplayed = false; // Flag to track if greeting message has been displayed

    // Function to display a message in the chat
    function appendMsg(msg) {
        $('.Messages_list').append('<div class="msg"><span class="avtr"><figure style="background-image: url(https://mrseankumar25.github.io/Sandeep-Kumar-Frontend-Developer-UI-Specialist/images/avatar.png)"></figure></span><span class="responsText">' + msg + '</span></div>');
        $("[name='msg']").val("");
    };

    // Function to display loader animation
    function displayLoader() {
        $('.Messages_list').append(`<div class="loader"><span class='loader__dot'></span><span class='loader__dot'></span><span class='loader__dot'></span></div>`);
    }

    // Modify the handleUserMsg() function to handle user input
    function handleUserMsg(msg) {
        var val = msg.toLowerCase();
        if (val.includes("apartment") || val.includes("luxury villa") || val.includes("house")) {
            var category = val.includes("apartment") ? "Apartment" : val.includes("luxury villa") ? "Luxury Villa" : "House";
            fetchPropertiesByCategory(category);
        } else {
            appendMsg("Sorry, we do not understand what you are saying. Please enter a property category.");
        }
    }

    // Modify the fetchCategoryNames() function to display loader animation
    function fetchCategoryNames() {
        displayLoader(); // Display loader animation
        $.ajax({
            url: '/category-names', // Modify the URL according to your route
            method: 'GET',
            success: function (response) {
                $('.loader').remove(); // Remove loader animation
                if (response.success) {
                    appendMsg("Please select a property category:");
                    response.categories.forEach(function (category) {
                        appendMsg(category);
                    });
                } else {
                    appendMsg("Failed to fetch category names.");
                }
            },
            error: function () {
                $('.loader').remove(); // Remove loader animation
                appendMsg("Failed to fetch category names.");
            }
        });
    }

    // Modify the fetchPropertiesByCategory() function to display loader animation
    function fetchPropertiesByCategory(category) {
        displayLoader(); // Display loader animation
        $.ajax({
            url: '/properties/' + category,
            method: 'GET',
            success: function (response) {
                $('.loader').remove(); // Remove loader animation
                if (response.success) {
                    appendMsg("Properties in the category '" + category + "':");
                    response.properties.forEach(function (property) {
                        appendMsg(property);
                    });
                    appendMsg("Please choose your desired property and see its details.");
                } else {
                    appendMsg("Failed to fetch properties.");
                }
            },
            error: function () {
                $('.loader').remove(); // Remove loader animation
                appendMsg("Failed to fetch properties.");
            }
        });
    }

    // Function to display greeting message and category names
    function displayGreeting() {
        if (!greetingDisplayed) {
            var nowtime = new Date();
            var nowhour = nowtime.getHours();
            var greetingMsg = '';
            if (nowhour >= 12 && nowhour <= 16) {
                greetingMsg = 'Good afternoon!';
            } else if (nowhour >= 10 && nowhour <= 12) {
                greetingMsg = 'Hi!';
            } else if (nowhour >= 0 && nowhour <= 10) {
                greetingMsg = 'Good morning!';
            } else {
                greetingMsg = 'Good evening!';
            }
            appendMsg(greetingMsg + ' What kind of property are you looking for?');
            setTimeout(fetchCategoryNames, 5000); // Fetch and display category names after 5 seconds
            greetingDisplayed = true; // Set flag to true after displaying greeting message
        }
    }

    // Event listener for form submission
    $(document).on("submit", "#messenger", function (e) {
        e.preventDefault();
        var msg = $("[name=msg]").val();
        appendMsg(msg); // Display user message
        handleUserMsg(msg); // Handle user message
    });

    // Event listener for opening the chatbot
    jQuery(document).on('click', '.iconInner', function (e) {
        jQuery(this).parents('.botIcon').addClass('showBotSubject');
        $("[name='msg']").focus();
        displayGreeting(); // Display greeting message
    });

    // Add click event listener for close button
    jQuery(document).on('click', '.closeBtn, .chat_close_icon', function (e) {
        jQuery(this).parents('.botIcon').removeClass('showBotSubject');
        jQuery(this).parents('.botIcon').removeClass('showMessenger');
    });

    // Add submit event listener for bot subject form
    jQuery(document).on('submit', '#botSubject', function (e) {
        e.preventDefault();
        jQuery(this).parents('.botIcon').removeClass('showBotSubject');
        jQuery(this).parents('.botIcon').addClass('showMessenger');
    });
});
