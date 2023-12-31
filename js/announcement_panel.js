
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

        <?php if ($firstLogin == true): ?>
          var changePass = new bootstrap.Modal(document.getElementById('firstLogin'));
          changePass.show();
        <?php endif; ?>
      });

      function addValidationListener(elementId){
        document.getElementById(elementId).addEventListener("input", function(){
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
            var description = data.description;
            document.getElementById("announcementId").value = data.announcement_id;
            document.getElementById("viewCampusAssignment").value = data.campus_assignment;
            document.getElementById("viewCollegeAssignment").value = data.college_assignment;
            document.getElementById("viewHeadline").value = data.headline;
            document.getElementById("viewDescription").value = description.replace("<br />", /\n/g);
            document.getElementById("viewAnnouncementImage").src = "uploads/" + data.file_input;
            document.getElementById("viewAuthor").innerHTML = "<small class='text-body-secondary'>Author: </small>" + data.author;
          }
        };

        xhr.send("announcementId=" + announcementId);

        document.getElementById("saveBtn").hidden = true;
        document.getElementById("editViewBtn").hidden = false;

        id = announcementId;

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
            document.getElementById("viewDescription").textContent = data.description;
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
            console.log("Success: " + xhr.responseText);
            $('#announcementTbl').DataTable().ajax.reload();
          } else {
            console.log("Error: " + xhr.status);
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

        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          customClass: {
            popup: 'colored-toast'
          },
          timer: 2000,
        })
        if (confirm("Are you sure you want to delete this announcement?")) {
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "delete_announcement.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
              Toast.fire({
                icon: 'success',
                title: "Announcement deleted successfully!"
              })
              $('#announcementTbl').DataTable().ajax.reload();
            } else {
              Toast.fire({
                icon: 'error',
                title: "Error: " + xhr.status
              })
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

      document.addEventListener("DOMContentLoaded", function(){
        document.getElementById("announcementLogo").setAttribute("color", "#ffd700");
      })

      $(document).ready(function () {
      $('#announcementTbl').DataTable({
        paging: false,
        scrollCollapse: true,
        scrollY: '50vh',
        responsive: true,
        autoWidth: false,
        ajax: {
          url: 'get_announcement_list.php',
          dataSrc: '',
          error: function (xhr, error, code) {
            console.log(xhr);
            console.log(error);
            console.log(code);
          },
        },
        columns: [
          { data: 'headline',
            render: function (data, type, row) {
              if (type === 'display') {
                // Set the maximum length for the headline
                var maxLength = 30;
                if (data.length > maxLength) {
                  // If the headline is longer than maxLength, add an ellipsis
                  return data.substr(0, maxLength) + '...';
                } else {
                  return data;
                }
              }
              return data; // For sorting, filtering, etc.
            },
          },
          { data: 'campus_assignment' },
          { data: 'college_assignment' },
          { data: 'author' },
          { data: 'faculty_id' },
          { data: "announcement_id",
            render: function (data) {
              return (
                '<div class="btn-group" role="group">' +
                '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewAnnouncementModal" onclick="viewAnnouncementModal(' +
                data +
                ')">View</button>' +
                '<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewAnnouncementModal" onclick="editAnnouncement(' +
                data +
                ')">Edit</button>' +
                '<button type="button" class="btn btn-danger" onclick="deleteAnnouncement(' +
                data +
                ')">Archive</button>' +
                '</div>'
              );
            },
          },
        ],
      });
    });
    // Get references to the campus and college select elements
    const campusSelect = document.getElementById('campusAssignment');
    const viewCampusSelect = document.getElementById('viewCampusAssignment');
    const collegeSelect = document.getElementById('collegeAssignment');
    const viewCollegeSelect = document.getElementById('viewCollegeAssignment');

    // Define the available colleges for each campus
    const campusColleges = {
        'Malolos Campus': [
            '-- Select College --',
            'College of Industrial Technology',
            'College of Information and Communications Technology',
            'College of Nursing',
            'College of Hospitality and Tourism Management',
            'College of Education',
            'College of Law',
            'College of Engineering',
            'College of Business Administration',
            'College of Sports, Exercise and Recreation',
            'College of Arts and Letters',
            'College of Science',
            'College of Architecture and Fine Arts',
            'Graduate School',
            'College of Social Sciences and Philosophy',
            'College of Criminal Justice Education'
        ],
        'Meneses Campus': [
          '-- Select College --',
            'College of Education',
            'College of Hospitality Management',
            'College of Engineering',
            'College of Business Administration',
            'College of Information and Communications Technology',
            'College of Industrial Technology'
        ],
        'Hagonoy Campus': [
            'College of Industrial Technology',
            'College of Hospitality and Tourism Management',
            'College of Education',
            'College of Information and Communications Technology'
        ],
        'Bustos Campus': [
            '-- Select College --',
            'College of Engineering',
            'College of Business Administration',
            'College of Information and Communication Technology'
        ],
        'San Rafael Campus': [
            '-- Select College --',
            'College of Nursing',
            'College of Science',
            'College of Social Science and Philosophy'
        ],
        'Sarmiento Campus': [
            '-- Select College --',
            'College of Science',
            'College of Industrial Technology',
            'College of Education',
            'College of Business Administration',
            'College of Hotel and Tourism Management'
        ]
    };

    // Function to update the college options based on the selected campus
    function updateCollegeOptions() {
        const selectedCampus = campusSelect.value;
        const selectedViewCampus = viewCampusSelect.value;
        viewCollegeSelect.innerHTML = ''; // Clear current options
        collegeSelect.innerHTML = ''; // Clear current options

        if (selectedViewCampus in campusColleges) {
            const colleges = campusColleges[selectedViewCampus];
            for (const college of colleges) {
                const option = document.createElement('option');
                option.value = college;
                option.textContent = college;
                viewCollegeSelect.appendChild(option);
            }
        }

        if (selectedCampus in campusColleges) {
            const colleges = campusColleges[selectedCampus];
            for (const college of colleges) {
                const option = document.createElement('option');
                option.value = college;
                option.textContent = college;
                collegeSelect.appendChild(option);
            }
        }
    }

    // Add an event listener to the campus select element
    viewCampusSelect.addEventListener('change', updateCollegeOptions);
    campusSelect.addEventListener('change', updateCollegeOptions);

    // Initial update when the page loads
    updateCollegeOptions();

    function submitAnnouncementForm (event) {
      event.preventDefault();
      var formData = new FormData(document.getElementById("announcementForm"));
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
      xhr.open("POST", "add_announcement.php", true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {

            Toast.fire({
              icon: 'success',
              title: xhr.responseText
            })
            
            $('#announcementTbl').DataTable().ajax.reload();

            document.getElementById("headline").classList.remove("is-valid");
            document.getElementById("description").classList.remove("is-valid");
            document.getElementById("fileInput").classList.remove("is-valid");


          } else {
            Toast.fire({
              icon: 'error',
              title: "Error: " + xhr.status
            })
          }
        }
      }

      xhr.send(formData);

      document.getElementById("announcementForm").reset();
      document.getElementById("addBtn").disabled = true;

    }
