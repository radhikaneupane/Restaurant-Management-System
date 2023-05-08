$(document).ready(function() {
    // Hide the QR code popup initially
    $('#qr-popup').hide();
    
    // Show the QR code popup when user selects "eSewa"
    $('select[name="pay_method"]').change(function() {
      if ($(this).val() == 'eSewa') {
        // Generate the QR code image and show it in the popup
        var qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=';
        var qrCodeData = 'Scan this code to pay using eSewa.';
        var qrCodeImg = '<img src="' + qrCodeUrl + encodeURIComponent(qrCodeData) + '" />';
        $('#qr-popup').html(qrCodeImg).show();
      } else {
        // Hide the QR code popup
        $('#qr-popup').hide();
      }
    });
  });
  