<div class="modal fade" id="firstLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="firstLogin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Default Password</h5>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="changePassForm" action="password_change_campus.php" onsubmit="submitChangePassForm(event)">
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $user_id ?>" hidden>
                    <div class="form-group">
                        <label for="newPass">New Password: </label>
                        <input type="password" class="form-control" id="newPass" name="newPass" oninput="newPassValidation()" required>
                        <div id="newPassFeedback" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPass">Confirm Password: </label>
                        <input type="password" class="form-control" id="confirmPass" oninput="confirmPassValidation(this)" required>
                        <div id="confirmPassFeedback" class="invalid-feedback"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="changePassBtn" disabled>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function submitChangePassForm(event) {
        event.preventDefault();

        var newPass = document.getElementById("newPass").value;
        var confirmPass = document.getElementById("confirmPass").value;

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            customClass: {
                popup: 'colored-toast'
            },
            timer: 2000,
        })

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "password_change_campus.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Set content type here
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                Toast.fire({
                    icon: 'success',
                    title: 'Password changed successfully!'
                })
                $('#firstLogin').modal('hide');
            } else {
                Toast.fire({
                    icon: 'error',
                    title: 'Error: ' + xhr.status
                })
            }
        }
        var params = "username=" + encodeURIComponent(<?php echo $user_id ?>) + "&newPass=" + encodeURIComponent(newPass) + "&confirmPass=" + encodeURIComponent(confirmPass);
        xhr.send(params);
    }

  function newPassValidation() {
    var newPass = document.getElementById("newPass").value;
    var newPassFeedback = document.getElementById("newPassFeedback");

    // Validate password requirements
    var lengthRequirement = /^(?=.{8,})/;
    var uppercaseRequirement = /^(?=.*[A-Z])/;
    var lowercaseRequirement = /^(?=.*[a-z])/;
    var numberRequirement = /^(?=.*\d)/;

    // Define individual error messages
    var errorMessages = {
        length: "Password must be at least 8 characters long.",
        uppercase: "Password must contain at least 1 uppercase letter.",
        lowercase: "Password must contain at least 1 lowercase letter.",
        number: "Password must contain at least 1 number."
    };

    // Collect error messages
    var errors = [];

    if (!lengthRequirement.test(newPass)) {
        errors.push(errorMessages.length);
    }

    if (!uppercaseRequirement.test(newPass)) {
        errors.push(errorMessages.uppercase);
    }

    if (!lowercaseRequirement.test(newPass)) {
        errors.push(errorMessages.lowercase);
    }

    if (!numberRequirement.test(newPass)) {
        errors.push(errorMessages.number);
    }

    // Display errors or clear feedback
    if (errors.length > 0) {
        displayErrors(errors);
        return false;
    } else {
        newPassFeedback.innerHTML = "";
        document.getElementById("newPass").classList.remove("is-invalid");
        document.getElementById("newPass").classList.add("is-valid");
        document.getElementById("changePassBtn").disabled = false;
        return true;
    }

    // Function to display errors
    function displayErrors(errors) {
        newPassFeedback.innerHTML = ""; // Clear previous feedback
        var errorList = document.createElement("ul");

        errors.forEach(function (error) {
            var errorItem = document.createElement("li");
            errorItem.textContent = error;
            errorList.appendChild(errorItem);
        });

        newPassFeedback.appendChild(errorList);
        document.getElementById("newPass").classList.remove("is-valid");
        document.getElementById("newPass").classList.add("is-invalid");
        document.getElementById("changePassBtn").disabled = true;
    }
}

  function confirmPassValidation(input) {
    var confirmPass = input.value;
    var newPass = document.getElementById("newPass").value;
    var confirmPassFeedback = document.getElementById("confirmPassFeedback");

    console.log(confirmPass);

    if (confirmPass !== newPass) {
        confirmPassFeedback.innerText = "Passwords do not match.";
        document.getElementById("confirmPass").classList.remove("is-valid");
        document.getElementById("confirmPass").classList.add("is-invalid");
        document.getElementById("changePassBtn").disabled = true;
        return false;
    } else {
        confirmPassFeedback.innerText = "";
        document.getElementById("confirmPass").classList.remove("is-invalid");
        document.getElementById("confirmPass").classList.add("is-valid");
        document.getElementById("changePassBtn").disabled = false;
        return true;
    }
}
</script>