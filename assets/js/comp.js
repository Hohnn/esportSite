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
// select all delete buttons
const deleteBtnTeam = document.querySelectorAll('[data-bs-target="#teamModal"]');
const inputTeamId = document.getElementById('teamId'); // hidden input with the team id to be deleted
deleteBtnTeam.forEach(btn => { // for each delete button
    btn.addEventListener('click', function() { // add event listener
        let teamId = this.value // get the team id
        inputTeamId.value = teamId; // set the value of the hidden input
    })
})

//rezise text to fit in parent
const isOverflown = ({ clientWidth, clientHeight, scrollWidth, scrollHeight }) => (scrollWidth > clientWidth) || (scrollHeight > clientHeight)
const resizeText = ({ element, elements, minSize = 5, maxSize = 30, step = 1, unit = 'px' }) => {
  (elements || [element]).forEach(el => {
    let i = minSize
    let overflow = false
    const parent = el.parentNode
    while (!overflow && i < maxSize) {
        el.style.fontSize = `${i}${unit}`
        overflow = isOverflown(parent)
      if (!overflow) i += step
    }
    // revert to last state where no overflow happened
    el.style.fontSize = `${i - step}${unit}`
  })
}
resizeText({
    elements: document.querySelectorAll('.teamName'),
    step: 0.5
  })
