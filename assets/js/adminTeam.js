
function showPreviewTeamLogo(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("teamLogoPreview");
        var preview2 = document.getElementById("backTeamLogo");
        preview.src = src;
        preview2.src = src;
    }
}


let allUserSelect = document.querySelectorAll('[data-user-select]');
let allPlayerName = document.querySelectorAll('[data-player-name]');
let memberLogo = document.querySelectorAll('.memberLogo');
let memberName = document.querySelectorAll('.memberName');
let allDeleteButton = document.querySelectorAll('[data-delete]');
let defaultLogoBase64 = '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';

let playerCount = 0;

const plusPLayer = document.getElementById('plusPlayer');
const playersContainer = document.getElementById('playersContainer');
const playerCountInput = document.getElementById('playerCount');
playerCountInput.value = playerCount;
//listen plus button
plusPLayer.addEventListener('click', function(){
    addInputs();
})

function addInputs(){
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
    <div class="d-flex">
        <input type="text" class="form-control d-none me-1" name="playerName${playerCount}" data-player-name=${playerCount} placeholder="Nom du joueur" required>
        <button type="button" data-delete=${playerCount} value="player_1" class="btn btn-danger" ><i class="bi bi-x-square"></i></button>
    </div>                                        
    <div class="invalid-feedback ">non valide</div>`;
    // add preview logo
    let link = document.createElement('a');
    link.href = '#';
    link.dataset.avatarId = playerCount;
    link.innerHTML = `<img src="data:image/png;base64,${defaultLogoBase64}" class="memberLogo">
                        <h5 class="memberName">Joueur</h5>`;
    // build the row
    teamPlayerContainer.appendChild(link);
    playersContainer.appendChild(colSelect);
    colSelect.appendChild(select);
    playersContainer.appendChild(col);
    // refresh elements
    allUserSelect = document.querySelectorAll('[data-user-select]');
    allPlayerName = document.querySelectorAll('[data-player-name]');
    allDeleteButton = document.querySelectorAll('[data-delete]');
    memberLogo = document.querySelectorAll('.memberLogo');
    memberName = document.querySelectorAll('.memberName');
    // refresh listeners
    listen(allUserSelect);
    playerCountInput.value = playerCount;
    listenDeleteButton();


}
// listen at start
listen(allUserSelect);

/* listen select user */
function listen(param){
    param.forEach(element => {
        const user = element.value;
        let dataSelect = element.dataset.userSelect;
        let playerData = document.querySelector('[data-player-name="' + dataSelect + '"]');
        if (user == 0){
            playerData.classList.remove('d-none');
            memberLogo[dataSelect-1].src = `data:image/png;base64,${defaultLogoBase64}`;
        } else if (user > 0){
            playerData.classList.add('d-none');
            fetch(`../controllers/ajax_controller.php?userId=${user}`)
            .then(response => response.json())
            .then(data => {
                memberLogo[dataSelect-1].src = `../assets/images/user_logo/${data.USER_LOGO}`;
                memberName[dataSelect-1].innerHTML = data.USER_USERNAME;
            })
            .catch(error => console.error(error))
        }
        element.addEventListener('change', function(){
            const user = element.value;
            let dataSelect = element.dataset.userSelect;
            if (user == 0){
                playerData.classList.remove('d-none');
                memberLogo[dataSelect-1].src = `data:image/png;base64,${defaultLogoBase64}`;
            } else {
                playerData.classList.add('d-none');
                fetch(`../controllers/ajax_controller.php?userId=${user}`)
                .then(response => response.json())
                .then(data => {
                    memberLogo[dataSelect-1].src = `../assets/images/user_logo/${data.USER_LOGO}`;
                })
                .catch(error => console.error(error))
            }
        })
    })
}


previewText(teamName, teamNamePreview)
previewText(tag, teamTagPreview)

let oldLogoBase64 = oldLogo.value
teamLogoPreview.src = 'data:image/png;base64,' + oldLogoBase64;
backTeamLogo.src = 'data:image/png;base64,' + oldLogoBase64;

let flag = flagSelect.value
teamCountryPreview.src = `https://www.countryflags.io/${flag}/flat/64.png`
flagSelect.addEventListener('change', function(){
    let flag = flagSelect.value
    teamCountryPreview.src = `https://www.countryflags.io/${flag}/flat/64.png`
}
)

let teamId = document.getElementById('teamId').value;
fetch(`../controllers/ajax_controller.php?playerTeam=${teamId}`)
.then(response => response.json())
.then(data => {
    let count = 0;
    data.forEach(element => {
        if (count != data.length) {
            addInputs();
        }
        allUserSelect[count].value = element.USER_ID ?? 0;
        allPlayerName[count].value = element.PLAYER_NAME;
        count++;
        listen(allUserSelect);

    }
    
    )

})
.catch(error => console.error(error))
function listenDeleteButton(){
    allDeleteButton.forEach(element => {
        element.addEventListener('click', function(){
            let select = this.parentNode.parentNode.previousElementSibling;
            let playerName = this.parentNode.parentNode;
            select.remove();
            playerName.remove();
            playerCount--;
            let avatar = document.querySelector(`a[data-avatar-id="${this.dataset.delete}"]`);
            avatar.remove();
        })
    }
    )
}