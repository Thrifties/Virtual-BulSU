
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("managementLogo").setAttribute('color','#ffd700')
});

const campusModal = document.getElementById('campusCollegeList')
if (campusModal) {
  campusModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    const campus = button.getAttribute('data-bs-campus');
    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    const modalTitle = campusModal.querySelector('.modal-title');

    modalTitle.textContent = `Manage ${campus} Colleges`;

      $(document).ready(function(){
      $('#collegeListTbl').DataTable({
        paging: false,
        scrollCollapse: true,
        scrollY: '50vh',
        responsive: true,
        autoWidth: true,
        ajax: {
          url: 'includes/collegeList.php?',
          type: 'POST',
          data: {campus: campus},
          dataSrc: '',
          error: function (xhr, error, code) {
            console.log(xhr);
            console.log(error);
            console.log(code);
          },
        },
        columns: [
          { data: 'college_name' },
          { data: 'college_code' },
          { data: 'college_dean'},
        ]
      });
    });
  })
}

campusModal.addEventListener('hide.bs.modal', event => {
  const modalTitle = campusModal.querySelector('.modal-title');
  modalTitle.textContent = '';
  $('#collegeListTbl').DataTable().destroy();
})



function logout(){
  window.location.href = "logout.php";
}