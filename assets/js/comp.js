const toggleBtn = document.querySelectorAll('.toggle');

toggleBtn.forEach(btn => {
    btn.addEventListener('click', function() {
        let target = this.nextElementSibling.nextElementSibling;
        target.classList.toggle('small');
        this.children[0].classList.toggle('bi-dash-circle');
        this.children[0].classList.toggle('bi-plus-circle');
        let card = this.parentNode;
        card.classList.toggle('active');
    });
})
