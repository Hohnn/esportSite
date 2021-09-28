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

const refresh = document.getElementById('refresh')
refresh.addEventListener('click', () => {
    fetch(`../controllers/scraping_controller.php?action=refreshSingle`)
    .then(function(response) {
        return response.text().then(function (text) {
        console.log(text);
        });
    });
    refresh.classList.add('rotate')
    setTimeout(() => {
        location.reload();
    }, 2000);
})

const editMail = document.getElementById('editMail')
const editMdp = document.getElementById('editMdp')
const collapseMail = document.getElementById('collapseMail')
const collapseMdp = document.getElementById('collapseMdp')

editMail.addEventListener('click', () => {
    collapseMdp.classList.remove('show')
    collapseMdp.classList.replace('collapse', 'collapsing')
}   
)
editMdp.addEventListener('click', () => {
    collapseMail.classList.remove('show')
    collapseMail.classList.replace('collapse', 'collapsing')
}   
)