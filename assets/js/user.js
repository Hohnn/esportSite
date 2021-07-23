const edit = document.getElementById('edit')
const desc = document.getElementById('desc')
const descEdit = document.getElementById('descEdit')

edit.addEventListener('click', () => {
    desc.classList.add('d-none')
    descEdit.classList.remove('d-none')
})