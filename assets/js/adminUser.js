console.log('test');

/* const allUsersTr = document.querySelectorAll('tbody tr');
console.log(allUsersTr);
function listenTrClick(param) {
    param.forEach(function(tr) {
        tr.addEventListener('click', function(e) {
            let select = this.querySelector('.roleSelect')
            select.classList.toggle('d-none');
            let socials = this.querySelectorAll('.social div div');
            socials.forEach(function(social) {
                social.classList.toggle('d-none');
            });
            let social = this.querySelector('.social');
            social.classList.toggle('flex-column');
        }, { once: true });
    });
}

listenTrClick(allUsersTr); */

const allUsersSelect = document.querySelectorAll('tr select');
console.log(allUsersSelect);
allUsersSelect.forEach(function(select) {
    select.addEventListener('change', function(e) {
        select.parentElement.submit();
    });
});

const deleteBtnUser = document.querySelectorAll('[data-bs-target="#userModal"]');
const inputUserId = document.getElementById('userIdDelete');
console.log(inputUserId);
deleteBtnUser.forEach(btn => {
    btn.addEventListener('click', function() {
        let userId = this.value
        console.log(userId);
        inputUserId.value = userId;
    })
}
)

$('tr[data-href]').on("dblclick", function() {
    document.location = $(this).data('href');
});