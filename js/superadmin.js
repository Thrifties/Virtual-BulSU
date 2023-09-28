
      function selectedRow (facultyId){
        document.getElementById("facultyId").readOnly = true;
        document.getElementById("viewFirstName").readOnly = true;
        document.getElementById("viewMiddleName").readOnly = true;
        document.getElementById("viewLastName").readOnly = true;
        document.getElementById("viewCampus").disabled = true;
        document.getElementById("viewEmail").readOnly = true;
        document.getElementById("viewPhone").readOnly = true;

        var saveBtn = document.getElementById("saveBtn");
        document.getElementById("saveBtn").disabled = true;
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

      }

      function enableViewEdit(){
        enableEdit(document.getElementById("facultyId").value);
      }

       function enableEdit(facultyId) {
        // Enable form fields for editing
        document.getElementById("facultyId").readOnly = true;
        document.getElementById("viewFirstName").readOnly = false;
        document.getElementById("viewMiddleName").readOnly = false;
        document.getElementById("viewLastName").readOnly = false;
        document.getElementById("viewCampus").disabled = false;
        document.getElementById("viewEmail").readOnly = false;
        document.getElementById("viewPhone").readOnly = false;

        /* var row = document.getElementById(facultyId);
        row.classList.add("table-active"); */

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
        // Get updated admin data
        var facultyId = document.getElementById("facultyId").value;
        var firstName = document.getElementById("viewFirstName").value;
        var middleName = document.getElementById("viewMiddleName").value;
        var lastName = document.getElementById("viewLastName").value;
        var campus = document.getElementById("viewCampus").value;
        var email = document.getElementById("viewEmail").value;
        var phone = document.getElementById("viewPhone").value;

        /* var row = document.getElementById(facultyId);
        row.classList.remove("table-active"); */

        // Send an AJAX request to update admin details
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_admin_details.php", true);
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
        document.getElementById("facultyId").readOnly = true;
        document.getElementById("viewFirstName").readOnly = true;
        document.getElementById("viewMiddleName").readOnly = true;
        document.getElementById("viewLastName").readOnly = true;
        document.getElementById("viewCampus").disabled = true;
        document.getElementById("viewEmail").readOnly = true;
        document.getElementById("viewPhone").readOnly = true;

        var saveBtn = document.getElementById("saveBtn");
        document.getElementById("saveBtn").disabled = true;
        document.getElementById("facultyId").readOnly = true;
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
