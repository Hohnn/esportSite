/* console.log('tttttt');
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
removeMenu(profilLogo) */


const twitchMenu = document.querySelectorAll('.twitch li')
twitchMenu.forEach(element => {
    element.addEventListener('click', function () {
        twitchMenu.forEach(element => {
            element.classList.remove('active')
        })
        this.classList.add('active')
    })
});

const newsDeleteBtn = document.querySelectorAll('[data-bs-target="#newsModal"]');
const inputNewsId = document.getElementById('newsId');
newsDeleteBtn.forEach(btn => {
    btn.addEventListener('click', function() {
        let teamId = this.value
        inputNewsId.value = teamId;
    })
})
