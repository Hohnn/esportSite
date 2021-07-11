console.log('tttttt');
const userName = document.getElementById('userName')
const profilLogo = document.getElementById('profilLogo')
const profilMenu = document.querySelector('.profilMenu')

function toggleMenu (target) {
    target.addEventListener('click', () => {
        profilMenu.classList.toggle('focused')
    })
}
function removeMenu (target) {
    target.addEventListener('focusout', () => {
        profilMenu.classList.remove('focused')
    })
}

toggleMenu(userName)
removeMenu(userName)
toggleMenu(profilLogo)
removeMenu(profilLogo)
