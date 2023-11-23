
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("managementLogo").setAttribute('color','#ffd700')
});

const campusModal = document.getElementById('campusCollegeList')
if (campusModal) {
  campusModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-campus')
    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    const modalTitle = campusModal.querySelector('.modal-title')
    const modalBodyInput = campusModal.querySelector('.modal-body input')

    modalTitle.textContent = `New message to ${recipient}`
    modalBodyInput.value = recipient
  })
}