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
const deleteBtn = document.querySelectorAll('[data-bs-target="#matchModal"]');
const inputMatchId = document.getElementById('matchId');
deleteBtn.forEach(btn => {
    btn.addEventListener('click', function() {
    let matchId = this.value
    inputMatchId.value = matchId;

    })
}
)
const deleteBtnTour = document.querySelectorAll('[data-bs-target="#tournamentModal"]');
const inputTournamentId = document.getElementById('tournamentId');
deleteBtnTour.forEach(btn => {
    btn.addEventListener('click', function() {
    let TournamentId = this.value
    inputTournamentId.value = TournamentId;
    })
}
)

const deleteBtnTeam = document.querySelectorAll('[data-bs-target="#teamModal"]');
const inputTeamId = document.getElementById('teamId');
deleteBtnTeam.forEach(btn => {
    btn.addEventListener('click', function() {
        let teamId = this.value
        inputTeamId.value = teamId;
    })
}   )


