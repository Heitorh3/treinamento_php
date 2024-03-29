import Swal from 'sweetalert2';

function deleteButtonClick() {
  const deleteButton = document.querySelectorAll('.delete-button');

  deleteButton.forEach(function (button) {
    button.addEventListener('click', function (event) {
      event.preventDefault();
      const url = button.getAttribute('href');
      Swal.fire({
        title: 'Tem certeza?',
        text: "Essa ação não poderá ser revertida!",
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