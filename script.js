// Get all elements with the class "cl-delete"
let deleteButtons = document.querySelectorAll(".cl-delete");
// Loop through each delete button and attach a click event listener
deleteButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
        // Prevent the default action of the button (e.g., submitting a form or following a link)
        if (!(confirm("Do you really want to delete?"))) {
            event.preventDefault();
        }
    });
});

//this is for insert operation validation
let ljForm = document.querySelector(".lj-submit-form");
ljForm.addEventListener("submit", function (event) {
    // it will prevent from going to create.php file here
    event.preventDefault();
    let phone = document.querySelector("#lj-phone").value;
    //check number is 10 digit or not 
    if ((/^\d{10}$/.test(phone))) {
        ljForm.submit();
    }
    else {
        alert("Please enter a valid phone number");
    }

});

