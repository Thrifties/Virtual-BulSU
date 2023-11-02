document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("adminLogo").setAttribute('color','#ffd700')
});

document.getElementById("addFacultyId").addEventListener("input", validateForm);
document.getElementById("firstName").addEventListener("input", validateForm);
document.getElementById("lastName").addEventListener("input", validateForm);
document.getElementById("addEmail").addEventListener("input", validateForm);
document.getElementById("addPhone").addEventListener("input", validateForm);

document.getElementById("viewFirstName").addEventListener("input", validateUpdateForm);
document.getElementById("viewLastName").addEventListener("input", validateUpdateForm);
document.getElementById("viewEmail").addEventListener("input", validateUpdateForm);
document.getElementById("viewPhone").addEventListener("input", validateUpdateForm);

document.addEventListener("DOMContentLoaded", function () {

  document.getElementById("addPassword").addEventListener("onkeyup", function () {
      validatePassword();
  });

  addValidationListener("firstName");
  addValidationListener("lastName");
  addValidationListener("addEmail");
  addValidationListener("addPhone");
  addValidationListener("viewFirstName");
  addValidationListener("viewLastName");
  addValidationListener("viewEmail");
  addValidationListener("viewPhone");
  addValidationListener("addCampus");

});

function addValidationListener(elementId) {
  document.getElementById(elementId).addEventListener("keyup", function () {
      validateInput(elementId);
  });
}

function validateInput(elementId) {
  var inputValue = document.getElementById(elementId).value;
  var feedbackMessage = document.getElementById(elementId + "Feedback");

  if (elementId.value === "" && elementId !== "middleName") {
      elementId.classList.add("is-invalid");
      feedbackMessage.innerHTML = "This field is required.";
      document.getElementById("addBtn").disabled = true;
      return false;
  } else {
      var pattern;
      switch (elementId) {
          case "firstName":
              pattern = /^[a-zA-Z ]+$/;
              break;
          case "lastName":
              pattern = /^[a-zA-Z ]+$/;
              break;
          case "addEmail":
              pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              break;
          case "addPhone":
              pattern = /^\d{11}$/;
              break;
          case "viewFirstName":
              pattern = /^[a-zA-Z ]+$/;
              break;
          case "viewLastName":
              pattern = /^[a-zA-Z ]+$/;
              break;
          case "viewEmail":
              pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              break;
          case "viewPhone":
              pattern = /^\d{11}$/;
              break;
          default:
              pattern = /.*/;
      }

      if (!pattern.test(inputValue)) {
          document.getElementById(elementId).classList.add("is-invalid");
          feedbackMessage.innerHTML = "Invalid format.";
          document.getElementById("addBtn").disabled = true;
          return false;
      } else {
          document.getElementById(elementId).classList.remove("is-invalid");
          document.getElementById(elementId).classList.add("is-valid");
          feedbackMessage.innerHTML = "";
          // Enable or disable the button based on whether all required fields are filled
          var isFormValid = validateForm();
          document.getElementById("addBtn").disabled = !isFormValid;
          return true;
      }
  }

  /* if (inputValue.length > 0) {
      feedbackMessage.innerText = "";
      document.getElementById(elementId).classList.remove("is-invalid");
      document.getElementById(elementId).classList.add("is-valid");
  } else {
      feedbackMessage.innerText = "This field is required.";
      document.getElementById(elementId).classList.remove("is-valid");
      document.getElementById(elementId).classList.add("is-invalid");
  } */
}

function validateUpdateForm() {
    var firstName = document.getElementById("viewFirstName").value;
    var lastName = document.getElementById("viewLastName").value;
    var email = document.getElementById("viewEmail").value;
    var phone = document.getElementById("viewPhone").value;

    var isFormValid = firstName !== "" && lastName !== "" && email !== "" && phone !== "";

    document.getElementById("saveBtn").disabled = !isFormValid;
}

function validateForm() {
    var facultyId = document.getElementById("addFacultyId").value;
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var email = document.getElementById("addEmail").value;
    var phone = document.getElementById("addPhone").value;


    var isFormValid = facultyId !== "" && firstName !== "" && lastName !== "" && email !== "" && phone !== "";
    document.getElementById("addBtn").disabled = !isFormValid;
}

function validatePassword() {
  var password = document.getElementById("addPassword").value;
  var feedbackMessage = document.getElementById("passwordFeedback");

  if (password.length >= 8 && password.length <= 25) {
      feedbackMessage.innerText = "Looks good!";
      document.getElementById("addPassword").classList.remove("is-invalid");
      document.getElementById("addPassword").classList.add("is-valid");
      document.getElementById("addBtn").disabled = false;
  } else {
      feedbackMessage.innerText = "Password should be between 8 and 25 characters.";
      document.getElementById("addPassword").classList.remove("is-valid");
      document.getElementById("addPassword").classList.add("is-invalid");
      document.getElementById("addBtn").disabled = true;
  }
}

function confirmPass() {
  var password = document.getElementById("addPassword").value;
  var confirmPassword = document.getElementById("confirmPass").value;
  var feedbackMessage = document.getElementById("confirmPasswordFeedback");

  if (password === confirmPassword) {
      feedbackMessage.innerText = "Passwords match!";
      document.getElementById("confirmPass").classList.remove("is-invalid");
      document.getElementById("confirmPass").classList.add("is-valid");
      document.getElementById("addBtn").disabled = false;
  } else {
      feedbackMessage.innerText = "Passwords do not match.";
      document.getElementById("confirmPass").classList.remove("is-valid");
      document.getElementById("confirmPass").classList.add("is-invalid");
      document.getElementById("addBtn").disabled = true;
  }

}

function checkFacultyId() {
var facultyIdInput = document.getElementById("addFacultyId");
var facultyId = facultyIdInput.value;

// Check if facultyId contains only numbers
var numericRegex = /^\d+$/;
if (numericRegex.test(facultyId)) {
  // Check if the facultyId has 10 digits
  if (facultyId.length === 10) {
      var xhr = new XMLHttpRequest();

      xhr.open('GET', 'checkFacultyId.php?faculty_id=' + facultyId, true);

      xhr.send();

      xhr.onload = function () {
          if (xhr.status == 200) {
              var feedbackMessage = document.getElementById("feedbackMessage");
              if (xhr.responseText === "Faculty ID is already taken.") {
                  facultyIdInput.classList.remove("is-valid");
                  facultyIdInput.classList.add("is-invalid");
                  feedbackMessage.innerText = xhr.responseText;
              } else {
                  facultyIdInput.classList.remove("is-invalid");
                  facultyIdInput.classList.add("is-valid");
                  feedbackMessage.innerText = "";
              }
          } else {
              console.error('Request failed. Returned status of ' + xhr.status);
          }
      };
  } else {
      // If the faculty ID doesn't have 10 digits, mark it as invalid
      facultyIdInput.classList.remove("is-valid");
      facultyIdInput.classList.add("is-invalid");
      document.getElementById("feedbackMessage").innerText = "Faculty ID must have 10 digits.";
  }
} else {
  // If the faculty ID contains non-numeric characters, mark it as invalid
  facultyIdInput.classList.remove("is-valid");
  facultyIdInput.classList.add("is-invalid");
  document.getElementById("feedbackMessage").innerText = "Faculty ID must contain only numbers.";
}
}


function selectedRowAdmin (facultyId){ 

  console.log("View button clicked for faculty ID:", facultyId);
  
  document.getElementById("viewFirstName").disabled = true;
  document.getElementById("viewMiddleName").disabled = true;
  document.getElementById("viewLastName").disabled = true;
  document.getElementById("viewCampus").disabled = true;
  document.getElementById("viewCollege").disabled = true;
  document.getElementById("viewEmail").disabled = true;
  document.getElementById("viewPhone").disabled = true;

  var saveBtn = document.getElementById("saveBtn");
  document.getElementById("saveBtn").disabled = true;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "get_admin_details.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var facultyData = JSON.parse(xhr.responseText);

      document.getElementById("facultyId").value = facultyData.faculty_id;
      document.getElementById("viewFirstName").value = facultyData.first_name;
      document.getElementById("viewMiddleName").value = facultyData.middle_name;
      document.getElementById("viewLastName").value = facultyData.last_name;
      document.getElementById("viewCampus").value = facultyData.campus;
      document.getElementById("viewCollege").value = facultyData.college;
      document.getElementById("viewEmail").value = facultyData.email;
      document.getElementById("viewPhone").value = facultyData.contact_num;
    }
  };

  document.getElementById("facultyId").value = data;

  // Send the id to the server
  xhr.send("facultyId="+ facultyId);
}
function selectedRow (facultyId){
  
  document.getElementById("viewFirstName").disabled = true;
  document.getElementById("viewMiddleName").disabled = true;
  document.getElementById("viewLastName").disabled = true;
  document.getElementById("viewCampus").disabled = true;
  document.getElementById("viewEmail").disabled = true;
  document.getElementById("viewPhone").disabled = true;

  var saveBtn = document.getElementById("saveBtn");
  document.getElementById("saveBtn").disabled = true;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "get_admin_details.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var facultyData = JSON.parse(xhr.responseText);

      document.getElementById("facultyId").value = facultyData.faculty_id;
      document.getElementById("viewFirstName").value = facultyData.first_name;
      document.getElementById("viewMiddleName").value = facultyData.middle_name;
      document.getElementById("viewLastName").value = facultyData.last_name;
      document.getElementById("viewCampus").value = facultyData.campus;
      document.getElementById("viewEmail").value = facultyData.email;
      document.getElementById("viewPhone").value = facultyData.contact_num;
    }
  };

  document.getElementById("facultyId").value = facultyId;

  // Send the id to the server
  xhr.send("facultyId="+ facultyId);

}

function enableViewEdit(){
  enableEdit(document.getElementById("facultyId").value);
}

  function enableEditAdmin(facultyId) {
  console.log("Edit button clicked for faculty ID:", facultyId);
  // Enable form fields for editing
  document.getElementById("facultyId").disabled = true;
  document.getElementById("viewFirstName").disabled = false;
  document.getElementById("viewMiddleName").disabled = false;
  document.getElementById("viewLastName").disabled = false;
  document.getElementById("viewCampus").disabled = false;
  document.getElementById("viewCollege").disabled = false;
  document.getElementById("viewEmail").disabled = false;
  document.getElementById("viewPhone").disabled = false;

  document.getElementById("facultyId").value = facultyId;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "get_admin_details.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var facultyData = JSON.parse(xhr.responseText);

      // Populate form fields with the fetched faculty data
      document.getElementById("facultyId").value = facultyData.faculty_id;
      document.getElementById("viewFirstName").value = facultyData.first_name;
      document.getElementById("viewMiddleName").value = facultyData.middle_name;
      document.getElementById("viewLastName").value = facultyData.last_name;
      document.getElementById("viewCampus").value = facultyData.campus;
      document.getElementById("viewCollege").value = facultyData.college;
      document.getElementById("viewEmail").value = facultyData.email;
      document.getElementById("viewPhone").value = facultyData.contact_num;
    }
  };

  // Send the id to the server
  xhr.send("facultyId="+ facultyId);

  // Change the "Edit" button to a "Save" button
  document.getElementById("saveBtn").disabled = false;
  var saveBtn = document.getElementById("saveBtn");
  saveBtn.onclick = saveChangesAdmin;
}

function enableEdit(facultyId) {
  // Enable form fields for editing
  document.getElementById("facultyId").disabled = true;
  document.getElementById("viewFirstName").disabled = false;
  document.getElementById("viewMiddleName").disabled = false;
  document.getElementById("viewLastName").disabled = false;
  document.getElementById("viewCampus").disabled = false;
  document.getElementById("viewEmail").disabled = false;
  document.getElementById("viewPhone").disabled = false;

  document.getElementById("facultyId").value = facultyId;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "get_admin_details.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var facultyData = JSON.parse(xhr.responseText);

      // Populate form fields with the fetched faculty data
      document.getElementById("facultyId").value = facultyData.faculty_id;
      document.getElementById("viewFirstName").value = facultyData.first_name;
      document.getElementById("viewMiddleName").value = facultyData.middle_name;
      document.getElementById("viewLastName").value = facultyData.last_name;
      document.getElementById("viewCampus").value = facultyData.campus;
      document.getElementById("viewEmail").value = facultyData.email;
      document.getElementById("viewPhone").value = facultyData.contact_num;
    }
  };

  // Send the id to the server
  xhr.send("facultyId="+ facultyId);

  // Change the "Edit" button to a "Save" button
  document.getElementById("saveBtn").disabled = false;
  var saveBtn = document.getElementById("saveBtn");
  saveBtn.onclick = saveChanges;
}

function saveChanges() {
  
  var facultyId = document.getElementById("facultyId").value;
  var firstName = document.getElementById("viewFirstName").value;
  var middleName = document.getElementById("viewMiddleName").value;
  var lastName = document.getElementById("viewLastName").value;
  var campus = document.getElementById("viewCampus").value;
  var email = document.getElementById("viewEmail").value;
  var phone = document.getElementById("viewPhone").value;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "update_admin.php", true);
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

  // Send the updated admin data to the server
  xhr.send("facultyId=" + facultyId + "&firstName=" + firstName + "&middleName=" + middleName + "&lastName=" + lastName + "&campus=" + campus + "&email=" + email + "&phone=" + phone);

  // Disable form fields after saving
  document.getElementById("facultyId").disabled = true;
  document.getElementById("viewFirstName").disabled = true;
  document.getElementById("viewMiddleName").disabled = true;
  document.getElementById("viewLastName").disabled = true;
  document.getElementById("viewCampus").disabled = true;
  document.getElementById("viewEmail").disabled = true;
  document.getElementById("viewPhone").disabled = true;

  var saveBtn = document.getElementById("saveBtn");
  document.getElementById("saveBtn").disabled = true;
  document.getElementById("facultyId").disabled = true;

}

function saveChangesAdmin() {

  var facultyId = document.getElementById("facultyId").value;
  var firstName = document.getElementById("viewFirstName").value;
  var middleName = document.getElementById("viewMiddleName").value;
  var lastName = document.getElementById("viewLastName").value;
  var campus = document.getElementById("viewCampus").value;
  var college = document.getElementById("viewCollege").value;
  var email = document.getElementById("viewEmail").value;
  var phone = document.getElementById("viewPhone").value;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "update_admin_college.php", true);
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

  // Send the updated admin data to the server
  xhr.send("facultyId=" + facultyId + "&firstName=" + firstName + "&middleName=" + middleName + "&lastName=" + lastName + "&campus=" + campus + "&college=" + college + "&email=" + email + "&phone=" + phone);

  // Disable form fields after saving
  document.getElementById("facultyId").disabled = true;
  document.getElementById("viewFirstName").disabled = true;
  document.getElementById("viewMiddleName").disabled = true;
  document.getElementById("viewLastName").disabled = true;
  document.getElementById("viewCampus").disabled = true;
  document.getElementById("viewCollege").disabled = true;
  document.getElementById("viewEmail").disabled = true;
  document.getElementById("viewPhone").disabled = true;

  var saveBtn = document.getElementById("saveBtn");

  document.getElementById("saveBtn").disabled = true;
  document.getElementById("facultyId").disabled = true;
}

function deleteAdmin(facultyId) {
    var confirmation = confirm("Are you sure you want to delete this admin?");
    if (confirmation) {
        // Create an XMLHttpRequest object
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_admin.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Define a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                alert(response.success);
                // Find and remove the deleted admin's row from the table
                var rowToRemove = document.getElementById("row_" + facultyId);
                if (rowToRemove) {
                    rowToRemove.remove();
                }
              } else {
                  alert(response.error);
                }
            }
        };

        // Send the request with faculty_id parameter
        xhr.send("faculty_id=" + facultyId);
    }
}

function logout(){
  window.location.href = "logout.php";
}

$(document).ready(function () {
  $("#adminTable").DataTable({
    responsive: true,
    autoWidth: false,
    ajax: {
      url: "get_admins.php",
      dataSrc: "",
      error: function (xhr, error, thrown) {
      console.log("DataTables error:", error, thrown);
    }
    },
    columns: [
      { data: "faculty_id" },
      { data: null,
        render: function (data, type, row) {
          return row.first_name + " " + row.last_name;
        }
      },
      { data: "college" },
      { data: "faculty_id",
        render: function (data) {
          return (
            '<div class="btn-group" role="group">' +
            '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewAdminDetails" onclick="selectedRowAdmin(' +
            data +
            ')">View</button>' +
            '<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewAdminDetails" onclick="enableEditAdmin(' +
            data +
            ')">Edit</button>' +
            '<button type="button" class="btn btn-danger" onclick="deleteAdmin(' +
            data +
            ')">Delete</button>' +
            '</div>'
          );
        },
      },
    ],
  });
});

  $(document).ready(function () {
  $("#adminTableSuper").DataTable({
    responsive: true,
    autoWidth: true,
    searching: true,
    processing: true,
    ajax: {
      url: "get_admins.php",
      dataSrc: "",
      error: function (xhr, error, thrown) {
      console.log("DataTables error:", error, thrown);
    }
    },
    columns: [
      { data: "faculty_id" },
      { data: null,
        render: function (data, type, row) {
          return row.first_name + " " + row.last_name;
        }
      },
      { data: "campus" },
      { data: "faculty_id",
        render: function (data) {
          return (
            '<div class="btn-group" role="group">' +
            '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewAdminDetails" onclick="selectedRow(' +
            data +
            ')">View</button>' +
            '<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewAdminDetails" onclick="enableEdit(' +
            data +
            ')">Edit</button>' +
            '<button type="button" class="btn btn-danger" onclick="deleteAdmin(' +
            data +
            ')">Archive</button>' +
            '</div>'
          );
        },
      },
    ],
  });
});