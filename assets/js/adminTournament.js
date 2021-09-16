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
            check.parentElement.classList.add('checked');
        } else {
            check.parentElement.classList.remove('checked');
        }
    })
}
)