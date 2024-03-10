// JavaScript for WhatsApp Icon functionality
function openWhatsApp() {
    var message = "Thank you for contacting Villa Agency. How can we help? Our WhatsApp number is 9748730090.";
    var whatsappURL = "https://wa.me/9748730090/?text=" + encodeURIComponent(message);
    window.open(whatsappURL, '_blank');
}
