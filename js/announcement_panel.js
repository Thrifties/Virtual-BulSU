    
    let id;
    
    document.getElementById("headline").addEventListener("input", validateForm);
    document.getElementById("description").addEventListener("input", validateForm);
    document.getElementById("fileInput").addEventListener("input", validateForm);
    document.getElementById("campusAssignment").addEventListener("input", validateForm);
    document.getElementById("collegeAssignment").addEventListener("input", validateForm);
    document.getElementById("viewHeadline").addEventListener("input", validateUpdateForm);
    document.getElementById("viewDescription").addEventListener("input", validateUpdateForm);
    document.getElementById("viewCampusAssignment").addEventListener("input", validateUpdateForm);
    document.getElementById("viewCollegeAssignment").addEventListener("input", validateUpdateForm);

    function validateUpdateForm() {
      var headline = document.getElementById("viewHeadline").value;
      var description = document.getElementById("viewDescription").value;
      var fileInput = document.getElementById("viewFileInput").value;
      var campusAssignment = document.getElementById("viewCampusAssignment").value;
      var collegeAssignment = document.getElementById("viewCollegeAssignment").value;

      var isFormValid = headline != "" && description != "" && campusAssignment != "" && collegeAssignment != "";

      document.getElementById("saveBtn").disabled = !isFormValid;
    }

    function validateForm() {
      var headline = document.getElementById("headline").value;
      var description = document.getElementById("description").value;
      var fileInput = document.getElementById("fileInput").value;
      var campusAssignment = document.getElementById("campusAssignment").value;
      var collegeAssignment = document.getElementById("collegeAssignment").value;

      var isFormValid = headline != "" && description != "" && fileInput != "" && campusAssignment != "" && collegeAssignment != "";

      document.getElementById("addBtn").disabled = !isFormValid;
    }

    document.addEventListener("DOMContentLoaded", function () {

        addValidationListener("headline");
        addValidationListener("description");
        addValidationListener("fileInput");

      });

      function addValidationListener(elementId){
        document.getElementById(elementId).addEventListener("keyup", function(){
          validateInput(elementId);
        })
      }

      function validateInput(elementId) {
        var inputValue = document.getElementById
        var feedbackMessage = document.getElementById(elementId + "Feedback");

        if (inputValue.length > 0) {
            feedbackMessage.innerText = "";
            document.getElementById(elementId).classList.remove("is-invalid");
            document.getElementById(elementId).classList.add("is-valid");
        } else {
            feedbackMessage.innerText = "This field is required.";
            document.getElementById(elementId).classList.remove("is-valid");
            document.getElementById(elementId).classList.add("is-invalid");
        }

      }

      function viewAnnouncementModal(announcementId) {
        document.getElementById("viewCampusAssignment").disabled = true;
        document.getElementById("viewCollegeAssignment").disabled = true;
        document.getElementById("viewHeadline").disabled = true;
        document.getElementById("viewDescription").disabled = true;
        document.getElementById("viewFileInput").hidden = true;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "get_announcement.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            var data = JSON.parse(this.responseText);
            var ImageURL = data.file_input;
            document.getElementById("announcementId").value = data.announcement_id;
            document.getElementById("viewCampusAssignment").value = data.campus_assignment;
            document.getElementById("viewCollegeAssignment").value = data.college_assignment;
            document.getElementById("viewHeadline").value = data.headline;
            document.getElementById("viewDescription").value = data.description;
            document.getElementById("viewAnnouncementImage").src = "uploads/" + data.file_input;
            document.getElementById("viewAuthor").innerHTML = "<small class='text-body-secondary'>Author: </small>" + data.author;
          }
        };

        xhr.send("announcementId=" + announcementId);

        document.getElementById("saveBtn").hidden = true;
        document.getElementById("editViewBtn").hidden = false;

        id = announcementId;

      }

      function enableViewEdit() {
        console.log(id);
        editAnnouncement(id);
      }

      function editAnnouncement(announcementId) {
        document.getElementById("announcementId").value = announcementId;
        document.getElementById("viewCampusAssignment").disabled = false;
        document.getElementById("viewCollegeAssignment").disabled = false;
        document.getElementById("viewHeadline").disabled = false;
        document.getElementById("viewDescription").disabled = false;
        document.getElementById("viewFileInput").hidden = false;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "get_announcement.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("announcementId").value = data.announcement_id;
            document.getElementById("viewCampusAssignment").value = data.campus_assignment;
            document.getElementById("viewCollegeAssignment").value = data.college_assignment;
            document.getElementById("viewHeadline").value = data.headline;
            document.getElementById("viewDescription").value = data.description;
            document.getElementById("viewAnnouncementImage").src = "uploads/" + data.file_input;
          }
        };
        xhr.send("announcementId=" + announcementId);

        document.getElementById("saveBtn").hidden = false;
        document.getElementById("editViewBtn").hidden = true;
      }

      function saveChanges() {
        var announcementId = document.getElementById("announcementId").value;
        var campusAssignment = document.getElementById("viewCampusAssignment").value;
        var collegeAssignment = document.getElementById("viewCollegeAssignment").value;
        var headline = document.getElementById("viewHeadline").value;
        var description = document.getElementById("viewDescription").value;

        var file = document.getElementById("viewFileInput").files[0];

        var formData = new FormData();

        formData.append("announcementId", announcementId);
        formData.append("campusAssignment", campusAssignment);
        formData.append("collegeAssignment", collegeAssignment);
        formData.append("headline", headline);
        formData.append("description", description);

        if (file != null) {
          formData.append("fileInput", file);
        }

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_announcement_details.php", true);
        xhr.onreadystatechange = function () {
          if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            var response = JSON.parse(this.responseText);
            if (response.success) {
              alert(response.success);
            } else {
              alert(response.error);
            }
          }
        };

        xhr.send(formData);

        document.getElementById("viewCampusAssignment").disabled = true;
        document.getElementById("viewCollegeAssignment").disabled = true;
        document.getElementById("viewHeadline").readOnly = true;
        document.getElementById("viewDescription").readOnly = true;
        document.getElementById("viewFileInput").disabled = true;

        document.getElementById("saveBtn").hidden = true;
        document.getElementById("editViewBtn").hidden = false;
      }


      function deleteAnnouncement(announcementId) {
        console.log(announcementId);
        if (confirm("Are you sure you want to delete this announcement?")) {
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "delete_announcement.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
              var response = JSON.parse(this.responseText);
              if (response.success) {
                // Remove the deleted row from the table
                var row = document.getElementById(announcementId);
                row.parentNode.removeChild(row);
                alert(response.success);
              } else {
                alert(response.error);
              }
            }
          };
          xhr.send("announcementId=" + announcementId);
        }
      }

      function logout() {
        var choice = confirm("Do you really want to log out?");
        if (choice == true)
          window.location = "logout.php";
      }

      function test(announcement_id) {
        console.log("test output: ", announcement_id);
      }
