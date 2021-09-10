
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
console.log(allPlayerName);

let playerCount = 1;
const plusPLayer = document.getElementById('plusPlayer');
const playersContainer = document.getElementById('playersContainer');
plusPLayer.addEventListener('click', function(){
    playerCount++;
    let colSelect = document.createElement('div');
    colSelect.classList.add('col-6');
    let select = document.createElement('select');
    select.classList.add('form-select');
    select.dataset.userSelect = playerCount;
    select.name = 'userId' + playerCount;
    
    let optionDefault = document.createElement('option');
    optionDefault.innerHTML = 'Choisir un joueur';
    optionDefault.disabled = true;
    optionDefault.selected = true;
    optionDefault.hidden = true;
    select.appendChild(optionDefault);
    let optionOther = document.createElement('option');
    optionOther.innerHTML = 'Autre';
    optionOther.value = 0;
    select.appendChild(optionOther);

    console.log('ok');
    allUsers.forEach(element => {
        let username = element.USER_USERNAME;
        let userId = element.USER_ID;
        let option = document.createElement('option');
        option.value = userId;
        option.innerHTML = username;
        select.appendChild(option);
    });

    let col = document.createElement('div');
    col.classList.add('col-6');
    col.innerHTML = `                                        
    <input type="text" class="form-control d-none" name="playerName${playerCount}" data-player-name placeholder="Nom du joueur" required>
    <div class="invalid-feedback ">non valide</div>`;





    playersContainer.appendChild(colSelect);
    colSelect.appendChild(select);
    playersContainer.appendChild(col);
    allUserSelect = document.querySelectorAll('[data-user-select]');
    allPlayerName = document.querySelectorAll('[data-player-name]');

    

console.log(allUserSelect);

listen(allUserSelect);

})


function listen(param){
    param.forEach(element => {
        element.addEventListener('change', function(){
            let parent = element.parentElement;
            console.log(parent);
            const user = element.value;
            let data = element.dataset.userSelect;
            console.log(data);
        if (user == 0){
            allPlayerName[data-1].classList.remove('d-none');
        } else {
            allPlayerName[data-1].classList.add('d-none');
        }
        })
    })
}

listen(allUserSelect);