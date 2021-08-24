const edit = document.getElementById('edit')
const desc = document.getElementById('desc')
const descEdit = document.getElementById('descEdit')

edit.addEventListener('click', () => {
    desc.classList.toggle('d-none')
    descEdit.classList.toggle('d-none')
    if (descEdit.classList.contains('d-none')) {
        edit.style.color = 'white'        
    } else {
        edit.style.color = '#fca311'
    }
})

function previewImage(fileToUpload, backImage){
    fileToUpload.addEventListener("change", function () {
        let oFReader = new FileReader(); // on créé un nouvel objet FileReader
        oFReader.readAsDataURL(this.files[0]);
        oFReader.onload = function (oFREvent) {
            backImage.src = oFREvent.target.result;
        };
    })
}

previewImage(fileToUpload, profilLogoDesc)

cancel.addEventListener('click', () => {
    desc.classList.remove('d-none')
    descEdit.classList.add('d-none')
    edit.style.color = 'white'
})