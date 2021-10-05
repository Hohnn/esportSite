previewText(tournamentName, orgName)
previewText(format, formatPreview)
previewSelect(statusSelect, statusPreview)
previewDate(tournamentDate, datePreview)

function showPreview(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("tourLogo");
        preview.src = src;
    }
}

const checkButton = document.querySelectorAll('input[type="checkbox"]');
checkButton.forEach(function(check){
    check.addEventListener('change', function(){
        if(check.checked){
            let teamId = check.value;
            fetch(`../controllers/ajax_controller.php?teamId=${teamId}`)
            .then(response => response.json())
            .then(data => {
                const teamsWrap = document.querySelector('.teamsWrap');
                let img = document.createElement('img');
                img.src = 'data:image/png;base64,' + data.TEAM_LOGO;
                img.classList.add('teamLogo');
                img.dataset.teamId = teamId;
                teamsWrap.appendChild(img);
            })
            .catch(error => console.error(error))
        } else {
            let thisTeam = document.querySelector(`img[data-team-id="${check.value}"]`);
            thisTeam.remove();
        }
    })
}
)

