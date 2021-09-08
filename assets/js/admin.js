
function previewImage(fileToUpload, backImage){
    fileToUpload.addEventListener("change", function () {
        let oFReader = new FileReader(); // on créé un nouvel objet FileReader
        oFReader.readAsDataURL(this.files[0]);
        oFReader.onload = function (oFREvent) {
            backImage.style.backgroundImage = `url('${oFREvent.target.result}')`;
        };
    })
} 

function previewImageMini(fileToUpload, backImage){
    fileToUpload.addEventListener("change", function () {
        let oFReader = new FileReader(); // on créé un nouvel objet FileReader
        oFReader.readAsDataURL(this.files[0]);
        oFReader.onload = function (oFREvent) {
            backImage.setAttribute('src', oFREvent.target.result);
        };
    })
} 

function previewText(input, target) {
    input.addEventListener('keyup', ( ) => {  
        let text = input.value;
        target.innerHTML = text;
    });
}
function previewSelect(input, target) {
    input.addEventListener('change', ( ) => {  
        let text = input.value;
        target.innerHTML = text;
    });
}
function previewDate(input, target) {
    input.addEventListener('change', ( ) => {  
        let text = input.value;
        let date = new Date(text);
        target.innerHTML = date.toLocaleDateString();
    });
}

function preview(fileToUpload, backImage, title, titlePreview, author, authorPreview, date, datePreview, type, typePreview,){
    previewImage(fileToUpload, backImage)
    previewText(title, titlePreview)
    previewText(author, authorPreview)
    previewText(date, datePreview)
    previewText(type, typePreview)
}

function previewMini(fileToUpload, backImage, title, titlePreview, author, authorPreview, date, datePreview, type, typePreview,){
    previewImageMini(fileToUpload, backImage)
    previewText(title, titlePreview)
    previewText(author, authorPreview)
    previewText(date, datePreview)
    previewText(type, typePreview)
}

/* preview(fileToUpload, backImage, title, titlePreview, author, authorPreview, date, datePreview, type, typePreview)
previewMini(fileToUpload2, backImage2, title2, titlePreview2, author2, authorPreview2, date2, datePreview2, type2, typePreview2)
previewMini(fileToUpload3, backImage3, title3, titlePreview3, author3, authorPreview3, date3, datePreview3, type3, typePreview3) */

function showPreview(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("tourLogo");
        preview.src = src;
       /*  preview.style.display = "block"; */
    }
}

/* previewText(tournamentName, orgName)
previewText(format, formatPreview)
previewSelect(statusSelect, statusPreview)
previewDate(tournamentDate, datePreview) */

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

previewText(score1Team1, score1map1)
previewText(score1Team2, score2map1)
previewText(score2Team1, score1map2)
previewText(score2Team2, score2map2)
previewText(score3Team1, score1map3)
previewText(score3Team2, score2map3)

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



