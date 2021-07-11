const prev = document.getElementById('prev')
const myscroll = document.getElementById('myscroll')
console.log(myscroll);
console.log(prev);

function scroll(el, target, dir) {
    el.addEventListener('click', () => {
        target.scroll({
            top: 0, 
            left: dir, 
            behavior: 'smooth'
          });
    })
}

scroll(prev, myscroll, -2500);
scroll(next, myscroll, 2500);
scroll(prev2,myscroll2, -2500);
scroll(next2,myscroll2, 2500);
scroll(prev3,myscroll3, -2500);
scroll(next3,myscroll3, 2500);
