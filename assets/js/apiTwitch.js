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
        let viewers
        if (item.viewers > 1) {
            viewers = item.viewers + ' spectateurs';
        } else {
            viewers = item.viewers + ' spectateur';
        }
        let col = document.createElement('div');
        col.className = 'col';
        col.innerHTML = `<a href="${item.channel.url}" class="card">
                            <div class="wrapPreview">
                                <img class="preview" src="${item.preview.medium}" alt="stream preview">
                                <span class="badge bg-danger">LIVE</span>
                                <span class="count">${viewers}</span>
                            </div>
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

$.ajax({
    url: `https://youtube.googleapis.com/youtube/v3/search?part=snippet&q=bf5&key=AIzaSyBLvgZi6dAuc5mbmGFitVzFwLAOz9jAciM`,
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Accept", "application/json")
   }, 
    success: function(data){
        console.log(data.items); 
        createContentYT(data)                        
    }
})


function monthDiff(d1, d2) {
    var months;
    months = (d2.getFullYear() - d1.getFullYear()) * 12;
    months -= d1.getMonth();
    months += d2.getMonth();
    return months <= 0 ? 0 : months;
}
function yearDiff(d1, d2) {
    var months;
    months = (d2.getFullYear() - d1.getFullYear());
    console.log('test');
    return months <= 0 ? 0 : months;
}

function createContentYT(param) {
    let array = param.items;
    array.forEach(function(item) {
        let viewers
        if (item.viewers > 1) {
            viewers = item.viewers + ' spectateurs';
        } else {
            viewers = item.viewers + ' spectateur';
        }
        let publish = item.snippet.publishedAt;
        let today = new Date()
        let videoDate = new Date(publish).getTime()
        let difference =  today.getTime() - videoDate
        let differenceDays = Math.floor(difference / (1000 * 60 * 60 * 24))
        let phrase = `il y a ${differenceDays} jours`
        if (differenceDays > 31) {
            differenceDays = monthDiff(new Date(publish), new Date())
            phrase = `il y a ${differenceDays} mois`
            if(differenceDays > 12) {
                differenceDays = yearDiff(new Date(publish), new Date())
                phrase = `il y a ${differenceDays} ans`
            }
        }
        let col = document.createElement('div');
        col.className = 'col';
        col.innerHTML = `<a href="https://www.youtube.com/watch?v=${item.id.videoId}" class="card">
                            <div class="wrapPreview">
                                <img class="preview" src="${item.snippet.thumbnails.medium.url}" alt="stream preview">
                                <span class="badge bg-danger"></span>
                                <span class="count">${phrase}</span>
                            </div>
                            <div class="footer">
                                <div class="desc">
                                    <h2 class="title">${item.snippet.title}</h2>
                                    <div class="name">${item.snippet.channelTitle}</div>
                                </div>
                            </div>
                        </a>`
        myscroll2.appendChild(col);
    })
}