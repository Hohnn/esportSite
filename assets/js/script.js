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

const plusPhone = document.getElementById('plusPhone')
const userMenu = document.getElementById('userMenu')
plusPhone.addEventListener('click', () => {
    userMenu.classList.toggle('visible')
})

const plusSug = document.getElementById('plusSug')
const plusArticle = document.getElementById('plusArticle')
plusArticle.addEventListener('click', () => {
    plusSug.classList.toggle('d-none')
})