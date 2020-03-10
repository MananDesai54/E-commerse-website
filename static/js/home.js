let menu = document.querySelector('.menu')
let nav = document.querySelector('.nav-section')
let close = document.querySelector('.close')
let n = document.querySelector('nav .d')
let follow = document.querySelector('.follow')
let nav_sec = document.querySelector('.nav-section-parent')


console.log(close,menu,nav,n)
menu.addEventListener('click',()=>{
    console.log('Show')
    nav.classList.add('nav-show')
    nav.classList.remove('nav-hide')
    menu.style.opacity = '0'
    nav_sec.classList.add('nav-section-parent-show')
})
close.addEventListener('click',()=> {
    console.log('Close')
    nav.classList.remove('nav-show')
    nav.classList.add('nav-hide')
    menu.style.opacity = '1'
    nav_sec.classList.remove('nav-section-parent-show')
})

//Intersection observer

let sec1 = document.querySelector('.introduction')
let nav1 = document.querySelector('nav')
let a = document.querySelectorAll('nav *')

let options = {
    root:null,
    threshold:0,
    rootMargin:"-50px"
}

let observer = new IntersectionObserver((entries,observer)=>{
    entries.forEach(entry => {
        console.log(entry)
        if(!entry.isIntersecting) {
            nav1.classList.add('inverse')
            follow.classList.add('enter')
            a.forEach(a => {
                a.classList.add('inversea')
            })
        }
        else {
            nav1.classList.remove('inverse')
            follow.classList.remove('enter')
            a.forEach(a => {
                a.classList.remove('inversea')
            })
        }
    })
},options)

observer.observe(sec1)