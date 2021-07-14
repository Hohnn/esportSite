const prev = document.getElementById('prev')
const myscroll = document.getElementById('myscroll')

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

function showArrow(event, target, dir, target2){
    setTimeout(() => {
        if (event.scrollWidth > event.clientWidth) {
        } else {
            target2.classList.add('d-none');
        }
    }, 1000)
    event.addEventListener('scroll', () => {

        let maxScrollLeft = event.scrollWidth - event.clientWidth;
        if (event.scrollLeft < dir) {
            target.classList.add('d-none')
        } else {
            target.classList.remove('d-none')
        }
        if (event.scrollLeft == maxScrollLeft) {
            target2.classList.add('d-none')
        } else {
            target2.classList.remove('d-none')
        }
    })
}

showArrow(myscroll, prev, 10, next);
showArrow(myscroll2, prev2, 10, next2);
showArrow(myscroll3, prev3, 10, next3);
console.log('ttttttttttttttttttt');
