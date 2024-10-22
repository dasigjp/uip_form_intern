// THIS IS UNDER CONSTRUCTION



// Select the offboarding form
form = document.getElementById('myForm');

// Added submit event listener
form.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission
    testValidation();
});


function offboardingValidation() {
    // Get values from the form inputs
    let email = document.getElementById("email").value;
    let name = document.getElementById("name").value;
    let applicationID = document.getElementById("applicationID").value;
    let department = document.getElementById("department").value;
    let requiredHours = document.getElementById("requiredHours").value;
    let completedHours = document.getElementById("completedHours").value;
    let googleDriveLink = document.getElementById("googleDriveLink").value;
    let testimonialVideoLink = document.getElementById("testimonialVideoLink").value;
    let fbPageReviewLink = document.getElementById("fbPageReviewLink").value;
    let evalFormLink = document.getElementById("evalFormLink").value;
    let signatureDocsLink = document.getElementById("signatureDocsLink").value;
    let forwardEmailLink = document.getElementById("forwardEmailLink").value;
    let certification = document.querySelector('input[name="certification"]:checked') ? document.querySelector('input[name="certification"]:checked').value : null;

    // Check if jQuery is loaded
    if (typeof jQuery === 'undefined') {
        console.error('jQuery not loaded');
    } else {
        // Send AJAX request with the form data
        $.ajax({
            url: './api/offboarding.php', // Updated to point to the correct offboarding API
            type: 'POST',
            data: {
                'email': email,
                'name': name,
                'applicationID': applicationID,
                'department': department,
                'requiredHours': requiredHours,
                'completedHours': completedHours,
                'googleDriveLink': googleDriveLink,
                'testimonialVideoLink': testimonialVideoLink,
                'fbPageReviewLink': fbPageReviewLink,
                'evalFormLink': evalFormLink,
                'signatureDocsLink': signatureDocsLink,
                'forwardEmailLink': forwardEmailLink,
                'certification': certification
            },
            success: function (response) {
                console.log(response);
                // Handle successful form submission
                alert("Offboarding data submitted successfully!");
            },
            error: function (code, status, error) {
                if (code.status == 422) {
                    let error_array = JSON.parse(code.responseText);

                    if (error_array.errors) {
                        console.log('Validation Error');
                    } else if (error_array.database_error) {
                        console.log('Database Error');
                    } else {
                        console.log(error);
                    }
                } else {
                    console.log(error);
                }
            }
        });
    }
}
