require('./bootstrap');

const deleteButtons = document.querySelectorAll('.deleteButton');
const valueId = document.getElementById('deleteId');

deleteButtons.forEach((elm) => {
    elm.addEventListener('click', function() {
        valueId.value = this.getAttribute('data-id');
    })
});