function validateForm() {
    console.log('validating');
    // document.getElementById('status').innerHTML = "Sending...";
    formData = {
        'firstName': $('input[name=firstNameInput]').val(),
        'surname': $('input[name=surNameInput]').val(),
        'email': $('input[name=emailInput]').val(),
        'phone': $('input[name=phoneInput]').val(),
        'business': $('input[name=businessInput]').val(),
        'message': $('textarea[name=message]').val()
    };
    console.log(formData);


    $.ajax({
        url: "mail.php",
        type: "POST",
        data: formData,
        success: function (data, textStatus, jqXHR) {

            $('#status').text(data.message);
            if (data.code) // If mail was sent successfully, reset the form.
                $('#contact-form').closest('form').find("input[type=text], input").val("");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#status').text(jqXHR);  
            }  
    });
}