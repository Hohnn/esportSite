
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
    target.innerHTML = input.value;
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

function showPreviewTeamLogo(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("teamLogo");
        var preview2 = document.getElementById("backTeamLogo");
        preview.src = src;
        preview2.src = src;
    }
}

let allUserSelect = document.querySelectorAll('[data-user-select]');
let allPlayerName = document.querySelectorAll('[data-player-name]');

let playerCount = 1;
const plusPLayer = document.getElementById('plusPlayer');
const playersContainer = document.getElementById('playersContainer');
const playerCountInput = document.getElementById('playerCount');
//listen plus button
plusPLayer.addEventListener('click', function(){
    playerCount++; // increment player count
    // create div container
    let colSelect = document.createElement('div');
    colSelect.classList.add('col-6');
    //create select
    let select = document.createElement('select');
    select.classList.add('form-select');
    select.dataset.userSelect = playerCount;
    select.name = 'userId' + playerCount;
    // create options placeholder
    let optionDefault = document.createElement('option');
    optionDefault.innerHTML = 'Choisir un joueur';
    optionDefault.disabled = true;
    optionDefault.selected = true;
    optionDefault.hidden = true;
    select.appendChild(optionDefault);
    // create options other
    let optionOther = document.createElement('option');
    optionOther.innerHTML = 'Autre';
    optionOther.value = 0;
    select.appendChild(optionOther);
    // create option for each user
    allUsers.forEach(element => {
        let option = document.createElement('option');
        option.value = element.USER_ID;
        option.innerHTML = element.USER_USERNAME;
        select.appendChild(option);
    });
    // create div container
    let col = document.createElement('div');
    col.classList.add('col-6');
    // add input
    col.innerHTML = `                                        
    <input type="text" class="form-control d-none" name="playerName${playerCount}" data-player-name placeholder="Nom du joueur" required>
    <div class="invalid-feedback ">non valide</div>`;
    // build the row
    playersContainer.appendChild(colSelect);
    colSelect.appendChild(select);
    playersContainer.appendChild(col);
    // refresh elements
    allUserSelect = document.querySelectorAll('[data-user-select]');
    allPlayerName = document.querySelectorAll('[data-player-name]');
    // refresh listeners
    listen(allUserSelect);
    playerCountInput.value = playerCount;

    let defaultLogoBase64 = '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';

    let link = document.createElement('a');
    link.href = '#';
    link.innerHTML = `<img src="data:image/png;base64,${defaultLogoBase64}" class="memberLogo">
                        <h5 class="memberName">Joueur</h5>`;
    teamPlayerContainer.appendChild(link);

})

/* listen select user */
function listen(param){
    param.forEach(element => {
        element.addEventListener('change', function(){
            const user = element.value;
            let data = element.dataset.userSelect;
        if (user == 0){
            allPlayerName[data-1].classList.remove('d-none');
        } else {
            allPlayerName[data-1].classList.add('d-none');
        }

        fetch(`../controllers/ajax_controller.php?teamId=${teamId}`)
        .then(response => response.json())
        .then(data => {
            logoTeam2.src = `data:image/png;base64,${data.TEAM_LOGO}`;
            nameTeam2.innerHTML = data.TEAM_SHORTNAME;
        })
        .catch(error => console.error(error))
        
        })
    })
}

listen(allUserSelect);

previewText(teamName, teamNamePreview)
previewText(tag, teamTagPreview)

let oldLogoBase64 = oldLogo.value
teamLogo.src = 'data:image/png;base64,' + oldLogoBase64;
backTeamLogo.src = 'data:image/png;base64,' + oldLogoBase64;

let flag = flagSelect.value
teamCountryPreview.src = `https://www.countryflags.io/${flag}/flat/64.png`
flagSelect.addEventListener('change', function(){
    let flag = flagSelect.value
    teamCountryPreview.src = `https://www.countryflags.io/${flag}/flat/64.png`
}
)

