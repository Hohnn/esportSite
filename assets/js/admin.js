
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



