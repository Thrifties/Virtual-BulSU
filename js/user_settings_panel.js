 document.addEventListener("DOMContentLoaded", function () {
            addValidationListener("firstName");
            addValidationListener("lastName");
            addValidationListener("email");
            addValidationListener("phone");
        });

        function addValidationListener(elementId) {
            document.getElementById(elementId).addEventListener("keyup", function () {
                validate(elementId);
            });
        }

    function validate(elementId) {
    var element = document.getElementById(elementId);
    var feedbackElement = document.getElementById(elementId + "Feedback");

    if (element.value === "" && elementId !== "middleName") {
        element.classList.add("is-invalid");
        feedbackElement.innerHTML = "This field is required.";
        document.getElementById("editBtn").disabled = true;
        return false;
    } else {
        var pattern;
        switch (elementId) {
            case "firstName":
                pattern = /^[a-zA-Z]+$/;
                break;
            case "lastName":
                pattern = /^[a-zA-Z]+$/;
                break;
            case "email":
                pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                break;
            case "phone":
                pattern = /^\d{11}$/;
                break;
            default:
                pattern = /.*/;
        }

        if (!pattern.test(element.value)) {
            element.classList.add("is-invalid");
            feedbackElement.innerHTML = "Invalid format.";
            document.getElementById("editBtn").disabled = true;
            return false;
        } else {
            element.classList.remove("is-invalid");
            feedbackElement.innerHTML = "";
            // Enable or disable the button based on whether all required fields are filled
            var isFormValid = validateForm();
            document.getElementById("editBtn").disabled = !isFormValid;
            return true;
        }
    }
}

function validateForm() {
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;

    // Check if all required fields are filled
    var isFormValid = firstName !== "" && lastName !== "" && email !== "" && phone !== "";
    return isFormValid;
}


        function enableEdit() {

            // Enable form fields for editing
            document.getElementById("facultyId").readOnly = true;
            document.getElementById("firstName").readOnly = false;
            document.getElementById("middleName").readOnly = false;
            document.getElementById("lastName").readOnly = false;
            document.getElementById("email").readOnly = false;
            document.getElementById("phone").readOnly = false;

            // Change the "Edit" button to a "Save" button
            var editBtn = document.getElementById("editBtn");
            editBtn.innerHTML = "Save";
            editBtn.className = "btn btn-success";
            editBtn.onclick = saveChanges;
        }

        function saveChanges() {

            // Get updated admin data
            var facultyId = document.getElementById("facultyId").value;
            var firstName = document.getElementById("firstName").value;
            var middleName = document.getElementById("middleName").value;
            var lastName = document.getElementById("lastName").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;

            // Send an AJAX request to update admin details
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_user_details.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                        alert(response.success);
                        } else {
                        alert(response.error);
                        }
                    } else {
                        alert("Error updating admin details. Please try again later.");
                    }
                }
            };

            xhr.send("facultyId=" + facultyId + "&firstName=" + firstName + "&middleName=" + middleName + "&lastName=" + lastName + "&email=" + email + "&phone=" + phone);

            document.getElementById("facultyId").readOnly = true;
            document.getElementById("firstName").readOnly = true;
            document.getElementById("middleName").readOnly = true;
            document.getElementById("lastName").readOnly = true;
            document.getElementById("email").readOnly = true;
            document.getElementById("phone").readOnly = true;

            var editBtn = document.getElementById("editBtn");
            editBtn.innerHTML = "Edit";
            editBtn.className = "btn btn-primary";
            editBtn.onclick = enableEdit;
        }

        function logout() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "logout.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                window.location.href = "VirtualBulsu_Login.php";
            }
            };

            // Send the id to the server
            xhr.send();
        }