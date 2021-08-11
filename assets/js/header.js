const plusPhone = document.getElementById('plusPhone')
const userMenu = document.getElementById('userMenu')
plusPhone.addEventListener('click', () => {
    userMenu.classList.toggle('visible')
})

const asideMenu = document.querySelectorAll('aside nav a')
asideMenu.forEach(element => {
    element.addEventListener('click', function () {
        asideMenu.forEach(element => {
            element.classList.remove('active')
        })
        this.classList.add('active')
    })
});