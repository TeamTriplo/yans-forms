$(function () {

  required.add('First_Name','NOT_EMPTY','First Name');
  required.add('Last_Name','NOT_EMPTY','Last Name');
  required.add('Email_Address','EMAIL','Email Address');
  required.add('Message','NOT_EMPTY','Message');

  // Get the form.
  var form = $('#ajax-contact');

  // Set up an event listener for the contact form.
  $(form).submit(function (event) {
    // Stop the browser from submitting the form.
    event.preventDefault();

    var formData = $(form).serializeArray().reduce(function(obj, item) {
      obj[item.name] = item.value;
      return obj;
    }, {});

    if (formData['first_name'] && formData['last_name'] && formData['email'] && formData['comments']) {
      // Serialize the form data.
      formData = $(form).serialize();
      $.ajax({
        type: 'POST',
        url: '/contact-form-handler.php',
        data: formData
      }).done(function (response) {
        $('.error').hide();
        $('.modal').modal();
      }).fail(function (data) {
        $('.error').show();
      });
    }
  });
});

