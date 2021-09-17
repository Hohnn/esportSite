/* curl -H 'Accept: application/vnd.twitchtv.v5+json' \
-H 'Client-ID: uo6dggojyb8d6soh92zknwmi5ej1q2' \
-X GET 'https://api.twitch.tv/kraken/streams/44322889' */

$.ajax({
    url: 'https://api.twitch.tv/kraken/streams/?game=Battlefield%20V&language=fr&broadcast_platform=live',
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Accept", "application/vnd.twitchtv.v5+json")
        xhr.setRequestHeader("Client-ID", "iguzmyofsjp2l6gru7d1q0kku4hg3e")
    }, success: function(data){
        createContent(data);
    }
})



function createContent(param) {
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
        col.innerHTML = `<a target="_blank" href="${item.channel.url}" class="card">
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

/* items/snippet(publishedAt,title, thumbnails/medium, videoOwnerChannelTitle) */
let playlistId = 'PLjEqEe1rImKvYQEaq7IwKLK3oBKea7Cfg'
let filter = 'fields=items%2Fsnippet(publishedAt%2Ctitle%2C%20thumbnails%2Fmedium%2C%20resourceId%2C%20videoOwnerChannelTitle)'
$.ajax({
    url: `https://youtube.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=15&playlistId=${playlistId}&${filter}&key=AIzaSyBLvgZi6dAuc5mbmGFitVzFwLAOz9jAciM`,
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Accept", "application/json")
    },
    success: function(data){
        createContentYT(data)                        
    }
})


function monthDiff(d1, d2) {
    let months;
    months = (d2.getFullYear() - d1.getFullYear()) * 12;
    months -= d1.getMonth();
    months += d2.getMonth();
    return months <= 0 ? 0 : months;
}
function yearDiff(d1, d2) {
    let months;
    months = (d2.getFullYear() - d1.getFullYear());
    console.log('test');
    return months <= 0 ? 0 : months;
}

function createContentYT(param) {
    let array = param.items;
    array.forEach(function(item) {
        
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
                if (differenceDays == 1) {
                    phrase = `il y a ${differenceDays} an`
                } else {
                    phrase = `il y a ${differenceDays} ans`
                }
            }
        }
        let col = document.createElement('div');
        col.className = 'col';
        col.innerHTML = `<a target="_blank" href="https://www.youtube.com/watch?v=${item.snippet.resourceId.videoId}" class="card">
                            <div class="wrapPreview">
                                <img class="preview" src="${item.snippet.thumbnails.medium.url}" alt="stream preview">
                                <span class="badge bg-danger"></span>
                                <span class="count">${phrase}</span>
                            </div>
                            <div class="footer">
                                <div class="desc">
                                    <h2 class="title">${item.snippet.title}</h2>
                                    <div class="name">${item.snippet.videoOwnerChannelTitle}</div>
                                </div>
                            </div>
                        </a>`
        myscroll2.appendChild(col);
    })
}