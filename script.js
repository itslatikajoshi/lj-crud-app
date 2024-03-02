// Get all elements with the class "cl-delete"
var deleteButtons = document.querySelectorAll(".cl-delete");
// Loop through each delete button and attach a click event listener
deleteButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
        // Prevent the default action of the button (e.g., submitting a form or following a link)
        if (!(confirm("Do you really want to delete?"))) {
            event.preventDefault();
        }
    });
});