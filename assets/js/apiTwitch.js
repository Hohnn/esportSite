/* curl -H 'Accept: application/vnd.twitchtv.v5+json' \
-H 'Client-ID: uo6dggojyb8d6soh92zknwmi5ej1q2' \
-X GET 'https://api.twitch.tv/kraken/streams/44322889' */

$.ajax({
    url: 'https://api.twitch.tv/kraken/streams/?game=Battlefield%20V&language=fr&broadcast_platform=live',
    beforeSend: function(xhr) {
         xhr.setRequestHeader("Accept", "application/vnd.twitchtv.v5+json")
         xhr.setRequestHeader("Client-ID", "iguzmyofsjp2l6gru7d1q0kku4hg3e")
    }, success: function(data){
        console.log(data);                         
        //process the JSON data etc
        console.log(data.streams);
        createContent2(data);

    }
})

function createContent(param) {
    let array = param.streams;
    array.forEach(function(item) {
        let col = document.createElement('div');
        col.className = 'col';
        let card = document.createElement('a');
        card.className = 'card';
        card.setAttribute('href', item.channel.url);
        let img = document.createElement('img');
        img.src = item.preview.medium;
        img.className = 'preview';
        let footer = document.createElement('div');
        footer.className = 'footer';
        let logo = document.createElement('img');
        logo.className = 'logo';
        logo.src = item.channel.logo;
        let desc = document.createElement('div');
        desc.className = 'desc';
        let title = document.createElement('h2');
        title.className = 'title';
        title.innerHTML = item.channel.description;
        let name = document.createElement('div');
        name.className = 'name';
        name.innerHTML = item.channel.display_name;
        desc.appendChild(title);
        desc.appendChild(name);
        footer.appendChild(logo);
        footer.appendChild(desc);
        card.appendChild(img);
        card.appendChild(footer);
        col.appendChild(card);
        myscroll.appendChild(col);
    })
}

function createContent2(param) {
    let array = param.streams;

    array.forEach(function(item) {
        let col = document.createElement('div');
        col.className = 'col';
        col.innerHTML = `<a href="${item.channel.url}" class="card">
                            <img class="preview" src="${item.preview.medium}" alt="stream preview">
                            <div class="footer">
                                <img class="logo" src="${item.channel.logo}" alt="stream logo">
                                <div class="desc">
                                    <h2 class="title">${item.channel.description}</h2>
                                    <div class="name">${item.channel.display_name}</div>
                                </div>
                            </div>
                        </a>`
        myscroll.appendChild(col);
    })
}

const keyYoutube = 'AIzaSyDFkMEdzq2ghlMxMLFgXYLAzzMAqJKGWa0'