document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm");
    const modal = document.getElementById("confirmation-modal");
    const content = document.querySelector(".w-full.min-h-screen");
    const footer = document.querySelector("footer");
    const closeModal = document.getElementById("modal-close");
    const applicationIdElement = document.getElementById("refference-id");

    // Validation function
    function validateForm() {
        let valid = true;

        const inputs = form.querySelectorAll("input[required]");
        inputs.forEach((input) => {
            if (!input.value.trim()) {
                showError(input.name, "This field is required");
                valid = false;
            } else {
                clearError(input.name);
            }
        });

        const email = form.querySelector('input[name="email"]');
        if (email && !email.validity.valid) {
            showError("email", "Please enter a valid email address");
            valid = false;
        } else {
            clearError("email");
        }

        return valid;
    }

    // Function to show error messages
    function showError(fieldName, message) {
        const field = form.querySelector(`[name="${fieldName}"]`);
        if (!field) return;

        let container = field.parentElement;
        let errorSpan = container.querySelector(".error-message");
        if (!errorSpan) {
            errorSpan = document.createElement("span");
            errorSpan.classList.add("error-message", "text-red-500", "text-sm");
            container.appendChild(errorSpan);
        }
        errorSpan.textContent = message;
        field.scrollIntoView({ behavior: "smooth", block: "center" });
    }

    // Function to clear error messages
    function clearError(fieldName) {
        const field = form.querySelector(`[name="${fieldName}"]`);
        if (field) {
            const errorSpan = field.parentElement.querySelector(".error-message");
            if (errorSpan) {
                errorSpan.remove();
            }
        }
    }

    // Submit form function for Offboarding inputs
    function submitForm() {
        let email = document.getElementById("email").value;
        let name = document.getElementById("name").value;
        let applicationID = document.getElementById("applicationID").value;
        let department = document.getElementById("department").value;
        let requiredHours = document.getElementById("requiredHours").value;
        let completedHours = document.getElementById("completedHours").value;
        let googleDriveLink = document.getElementById("googleDriveLink").value;
        let testimonialVideoLink = document.getElementById("testimonialVideoLink").value;
        let fbPageReviewLink = document.getElementById("fbPageReviewLink").value;
        //let certification = document.querySelector('input[name="certification"]:checked') ? document.querySelector('input[name="certification"]:checked').value : '';
        let evalFormLink = document.getElementById("evalFormLink").value;
        let signatureDocsLink = document.getElementById("signatureDocsLink").value;
        let forwardEmailLink = document.getElementById("forwardEmailLink").value;

        if (typeof jQuery === 'undefined') {
            console.error('jQuery not loaded');
        } else {
            $.ajax({
                url: './api/offboarding.php',
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
                    'certification': certification,
                    'evalFormLink': evalFormLink,
                    'signatureDocsLink': signatureDocsLink,
                    'forwardEmailLink': forwardEmailLink,
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

    // Form submission event listener
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        if (validateForm()) {
            submitForm(); // If validation passes, submit form via AJAX
        }
    });
});
