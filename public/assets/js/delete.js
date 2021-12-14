const Swal = require('sweetalert2');



function deleteButtonClick() {
  const deleteButton = document.querySelectorAll('.delete-button');

  deleteButton.forEach(function(button) {
    button.addEventListener('click', function(event) {
      event.preventDefault();
      const url = button.getAttribute('href');
      Swal.fire({
        title: 'Tem certeza?',
        text: "Você não poderá reverter essa ação!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, pode deletar!'
      }).then((result) => {
        if (result.value) {
          window.location.href = url;
        }
      })
    })
  });
}



export default deleteButtonClick;