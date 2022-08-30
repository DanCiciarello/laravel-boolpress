// Wait for all the content to be loaded
window.addEventListener("DOMContentLoaded", function () {

    // Create an array with all the forms in the page with class 'form-delete'
    const forms = document.querySelectorAll(".form-delete");

    // For all the forms
    for (const form of forms) {

        // Add an eventListener on 'submit'
        form.addEventListener("submit", function (e) {

            // Add a preventDefault to cancel the default behavior
            e.preventDefault();

            // Create an alert and save it in a variable
            const result = confirm("Sei sicuro di voler cancellare questo elemento?")

            // If true, invoke the submit function
            if (result) {
                form.submit();
            }

        })

    }

})