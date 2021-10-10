previewText(newsTitle, previewNewstitle)
previewText(newsSubTitle, previewNewsSubtitle)

previewNewsType.innerHTML = '<i class="bi bi-bookmark-fill"></i> ' + type.value;
type.addEventListener('change', ( ) => {  
    let text = type.value;
    previewNewsType.innerHTML = '<i class="bi bi-bookmark-fill"></i> ' + text;
});

previewImageMini(fileToUpload, previewNewsMiniImage)
previewImageMini(fileToUpload, previewNewsBigImage)

const deleteBtnProposal = document.querySelectorAll('[data-bs-target="#proposalModal"]');
const inputProposalId = document.getElementById('proposalIdDelete');
deleteBtnProposal.forEach(btn => {
    btn.addEventListener('click', function() {
        let userId = this.value
        inputProposalId.value = userId;
    })
}
)

const allBtnAdd = document.querySelectorAll('[data-add]');
console.log(allBtnAdd);
allBtnAdd.forEach(btn => {
    btn.addEventListener('click', function() {
        let title = this.parentNode.parentNode.querySelector('.articleTitle');
        let subtitle = this.parentNode.parentNode.querySelector('.content');
        let link = this.parentNode.parentNode.querySelector('.link a');
        newsTitle.value = title.innerHTML;
        previewNewstitle.innerHTML = title.innerHTML;
        newsSubTitle.value = subtitle.innerHTML;
        previewNewsSubtitle.innerHTML = subtitle.innerHTML;
        newsSource.value = link.innerHTML;
    })
}
)
