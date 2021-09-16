previewText(newsTitle, previewNewstitle)
previewText(newsSubTitle, previewNewsSubtitle)

previewNewsType.innerHTML = '<i class="bi bi-bookmark-fill"></i> ' + type.value;
type.addEventListener('change', ( ) => {  
    let text = type.value;
    previewNewsType.innerHTML = '<i class="bi bi-bookmark-fill"></i> ' + text;
});

previewImageMini(fileToUpload, previewNewsMiniImage)
previewImageMini(fileToUpload, previewNewsBigImage)