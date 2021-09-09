
const team1 = document.getElementById('team1')
const team2 = document.getElementById('team2')

team1.addEventListener('change', ( ) => {
    let teamId = team1.value;
    fetch(`../controllers/ajax_controller.php?teamId=${teamId}`)
    .then(response => response.json())
    .then(data => {
        logoTeam1.src = `data:image/png;base64,${data.TEAM_LOGO}`;
        nameTeam1.innerHTML = data.TEAM_SHORTNAME;
})
.catch(error => console.error(error))
})
team2.addEventListener('change', ( ) => {
    let teamId = team2.value;
    fetch(`../controllers/ajax_controller.php?teamId=${teamId}`)
    .then(response => response.json())
    .then(data => {
        logoTeam2.src = `data:image/png;base64,${data.TEAM_LOGO}`;
        nameTeam2.innerHTML = data.TEAM_SHORTNAME;
})
.catch(error => console.error(error))
})

const score3 = document.getElementById('score3')

previewText(score1Team1, score1map1)
previewText(score1Team2, score2map1)
previewText(score2Team1, score1map2)
previewText(score2Team2, score2map2)


score3Team1.addEventListener('input', ( ) => {
    let text = score3Team1.value;
    score1map3.innerHTML = text;
    if (text.length > 0) {
        map3Preview.classList.remove('d-none');
        score3.classList.remove('d-none');
        map1Preview.className = "maps";
        map2Preview.className = "maps";
    } else {
        map3Preview.classList.add('d-none');
        map1Preview.className = "maps2";
        map2Preview.className = "maps2"
        score3.classList.add('d-none');
    }
});


map1.addEventListener('change', ( ) => {
    let mapId = map1.value;
    fetch(`../controllers/ajax_controller.php?mapId=${mapId}`)
    .then(response => response.json())
    .then(data => {
        map1Preview.src = `../assets/images/maps/${data.MAPS_IMAGE}`;
})
.catch(error => console.error(error))
})

map2.addEventListener('change', ( ) => {
    let mapId = map2.value;
    fetch(`../controllers/ajax_controller.php?mapId=${mapId}`)
    .then(response => response.json())
    .then(data => {
        map2Preview.src = `../assets/images/maps/${data.MAPS_IMAGE}`;
})
.catch(error => console.error(error))
})

map3.addEventListener('change', ( ) => {
    let mapId = map3.value;
    fetch(`../controllers/ajax_controller.php?mapId=${mapId}`)
    .then(response => response.json())
    .then(data => {
        map3Preview.src = `../assets/images/maps/${data.MAPS_IMAGE}`;
})
.catch(error => console.error(error))
})

selectTournament.addEventListener('change', ( ) => {
    const selectTournament = document.getElementById('selectTournament')
    const options = selectTournament.getElementsByTagName("option")
    const id = selectTournament.selectedIndex
    const selectedOptionInnerHTML = options[id].innerHTML
    const event = document.getElementById('event')
    event.innerHTML = selectedOptionInnerHTML
})

const matchDate = document.getElementById('match_date')
matchDate.addEventListener('change', ( ) => {
    let dateValue = matchDate.value;
    let date = new Date(dateValue);
    datePreview.innerHTML = date.toLocaleDateString('fr-FR', {day: 'numeric',month: 'long'});
})

link.addEventListener('change', ( ) => {
    let linkValue = link.value;
    let twitch = linkValue.includes('twitch.tv');
    let youtube = linkValue.includes('youtube.com');
    if (twitch) {
        vod.innerHTML = 'VOD TWITCH'
        vodColor.classList.add('bgTwitch')
    } else if (youtube) {
        vod.innerHTML = 'VOD YOUTUBE'
        vodColor.classList.add('bgYoutube')
    } else {
        vod.innerHTML = ''
        vodColor.classList.remove('bgYoutube')
        vodColor.classList.remove('bgTwitch')
    }
}
)