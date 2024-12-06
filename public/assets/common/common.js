$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('submit', '.adminFrm', function (event) {
    event.preventDefault();

    // Disable submit button and show loading state
    $('#submitBtn').prop('disabled', true);
    $('#btnText').hide();
    $('#btnIcon').hide();
    $('#loadingText').show();

    let formdata = new FormData(this);
    $.ajax({
        type: "POST",
        url: $(this).data('action'),
        data: formdata,
        processData: false,
        contentType: false,
        dataType: "JSON",
        success: function (data) {
            // Hide loading state and enable button
            $('#submitBtn').prop('disabled', false);
            $('#loadingText').hide();
            $('#btnText').show();
            $('#btnIcon').show();
            if (data.status) {
                if (data.message != '') {
                    $.alert({
                        icon: 'fa fa-check',
                        title: 'Success!',
                        content: data.message,
                        type: 'green',
                        typeAnimated: true,
                    });
                }
                if (data.redirect != '') {
                    setTimeout(function () {
                        window.location.href = data.redirect
                    }, 1000);
                }
            } else {
                $.alert({
                    icon: 'fa fa-warning',
                    title: 'Warning!',
                    content: data.message,
                    type: 'orange',
                    typeAnimated: true,
                });
            }
        }
    });
});

$(document).on('click', '.change-status', function () {
    var id = $(this).data('id');
    var keyId = $(this).data('key');
    var table = $(this).data('table');
    var status = $(this).data('status');
    var url = $(this).data('action');
    var field = $(this).data('field');

    // alert(id + keyId + table + status + url);

    var dataJSON = {
        id: id,
        keyId: keyId,
        table: table,
        status: status,
        field: field,
        _token: _token
    };
    $.confirm({
        icon: 'fa fa-spinner fa-spin',
        title: 'Confirm!',
        // content: 'Do you really want to do this ?',
        content: field == 'deleted_at' ? 'Are you sure you want to proceed? This action will erase all data.' : 'Do you really want to do this ?',
        type: 'orange',
        typeAnimated: true,
        buttons: {
            confirm: function () {
                if (id && table) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: dataJSON,
                        dataType: "JSON",
                        success: function (data) {
                            if (data.status) {
                                if (data.postStatus == '2') {
                                    $.alert({
                                        icon: 'fa fa-check',
                                        title: 'Success!',
                                        content: 'Data has been deleted !',
                                        type: 'green',
                                        typeAnimated: true,
                                    });
                                    setTimeout(function () { location.reload() }, 1550);

                                } else if (data.postStatus == '1' || data.postStatus == '3') {
                                    $('#' + id).removeClass('badge-danger');
                                    $('#' + id).addClass('badge-primary');
                                    $('#' + id).html('Active');
                                    $('#' + id).data('status', '0');
                                    $.alert({
                                        icon: 'fa fa-check',
                                        title: 'Success!',
                                        content: data.message,
                                        type: 'green',
                                        typeAnimated: true,
                                    });
                                    setTimeout(function () { location.reload() }, 1550);
                                } else if (data.postStatus == '4' || data.postStatus == '9') {
                                    $('#' + id).removeClass('badge-danger');
                                    $('#' + id).addClass('badge-primary');
                                    $('#' + id).html('Active');
                                    $('#' + id).data('status', '0');
                                    $.alert({
                                        icon: 'fa fa-check',
                                        title: 'Success!',
                                        content: data.message,
                                        type: 'green',
                                        typeAnimated: true,
                                    });
                                    setTimeout(function () { location.reload() }, 1550);
                                } else if (data.postStatus == '0') {
                                    $('#' + id).removeClass('badge-primary');
                                    $('#' + id).addClass('badge-danger');
                                    $('#' + id).html('Inactive');
                                    $('#' + id).data('status', '1');

                                    $.alert({
                                        icon: 'fa fa-check',
                                        title: 'Success!',
                                        content: data.message,
                                        type: 'green',
                                        typeAnimated: true,
                                    });
                                    setTimeout(function () { location.reload() }, 1550);

                                } else if (data.postStatus == '5') {

                                    $('#' + id).removeClass('badge-primary');
                                    $('#' + id).addClass('badge-danger');
                                    $('#' + id).html('Inactive');
                                    $('#' + id).data('status', '1');

                                    $.alert({
                                        icon: 'fa fa-close',
                                        title: 'Warning !',
                                        content: data.message,
                                        type: 'orange',
                                        typeAnimated: true,
                                    });
                                    setTimeout(function () { location.reload() }, 7000);

                                } else {
                                    if (data.message != '') {
                                        $.alert({
                                            icon: 'fa fa-check',
                                            title: 'Success!',
                                            content: data.message,
                                            type: 'green',
                                            typeAnimated: true,
                                        });
                                    }
                                    if (data.redirect != '') {
                                        setTimeout(function () {
                                            window.location.href = data.redirect
                                        }, 1000);
                                    }
                                }
                            }
                        }
                    });
                }
            },
            cancel: function () {
                $.alert({
                    icon: 'fa fa-times',
                    title: 'Canceled!',
                    content: 'Process canceled',
                    type: 'purple',
                    typeAnimated: true,
                });
            }
        }
    });
});

$(document).on('keypress', '.float-number', function (event) {
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

$(document).ready(function () {
    // Handle "All" checkbox click event
    $('#allPermission').click(function () {
        // Check or uncheck all permission checkboxes based on "All" checkbox state
        $('.permission-checkbox').prop('checked', $(this).prop('checked'));
    });

    // Handle permission checkbox click event
    $('.permission-checkbox').click(function () {
        // If any permission checkbox is unchecked, uncheck the "All" checkbox
        if (!$(this).prop('checked')) {
            $('#allPermission').prop('checked', false);
        }
    });
});


function confirmSubmit() {
    return confirm("Are you sure you want to cancel?");
}


$(document).ready(function () {
    var $phoneInput = $('input[name="phone_number"]');
    var $errorMessage = $('#phone-error');
    var $submitButton = $('#login-submit-drvr');

    // Initially disable the button
    $submitButton.prop('disabled', true);

    $phoneInput.on('keyup', function () {
        var phoneNumber = $(this).val().trim(); // Get the trimmed value
        $errorMessage.hide();

        // Check if the phone number is empty
        if (phoneNumber === '') {
            $errorMessage.text('Mobile Number is required.').show();
            $submitButton.prop('disabled', true); // Disable button
            return; // Exit the function
        }

        // Check if the phone number is all zeros
        if (phoneNumber.replace(/\D/g, '') === '0000000000') {
            $errorMessage.text('Mobile Number cannot be all zeros.').show();
            $submitButton.prop('disabled', true); // Disable button
            return; // Exit the function
        }

        // Check if the phone number matches the desired format
        var phonePattern = /^(?:\(\d{3}\)\s?|\d{3}[-.\s]?)?\d{3}[-.\s]?\d{4}$/; // Matches (123) 456-7890 or 123-456-7890 or 1234567890
        if (!phonePattern.test(phoneNumber)) {
            $errorMessage.text('Mobile Number must be a valid 10-digit number in the format 914567890 or 1234567890.').show();
            $submitButton.prop('disabled', true); // Disable button
        } else {

            // Find the closest parent form-group
            var $formGroup = $(this).closest('.form-group');
            // Get the user_type value
            var userType = $formGroup.find('input[name="user_type"]').val();

            $.ajax({
                url: $(this).data('action'),
                method: 'POST',
                data: {
                    phone_number: phoneNumber,
                    user_type: userType,
                    _token: $('meta[name="csrf-token"]').attr('content') // CSRF token for security
                },
                success: function (response) {
                    if (!response.status) {
                        $errorMessage.text('This mobile number is already registered for other user.').show(); // Show error message
                        $submitButton.prop('disabled', true); // Disable submit button
                    } else {
                        $errorMessage.hide(); // Hide error if valid
                        $submitButton.prop('disabled', false); // Enable submit button
                    }
                },
                error: function (xhr) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });

            // $errorMessage.hide(); // Hide error if valid
            // $submitButton.prop('disabled', false);
        }
    });
});

$(document).on('click', '.close', function (event) {
    event.preventDefault(); // Prevent the default anchor click behavior
});
