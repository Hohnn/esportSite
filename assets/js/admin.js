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

preview(fileToUpload, backImage, title, titlePreview, author, authorPreview, date, datePreview, type, typePreview)
previewMini(fileToUpload2, backImage2, title2, titlePreview2, author2, authorPreview2, date2, datePreview2, type2, typePreview2)
previewMini(fileToUpload3, backImage3, title3, titlePreview3, author3, authorPreview3, date3, datePreview3, type3, typePreview3)



