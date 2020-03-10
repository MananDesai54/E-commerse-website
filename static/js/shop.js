let images_p = document.querySelectorAll('.image_p')
let hover_shows = document.querySelectorAll('.hover-show')
let products = document.querySelectorAll('.product')

//to show add to cart and more detail option on hover
products.forEach(product => {
    let image_p,hover_show
    product.addEventListener('mouseover',()=>{
        let id = product.id
        image_p = document.querySelector(`#${id}_image`)
        hover_show = document.querySelector(`#${id}_hover`)
        image_p.classList.add('image_p_hover')
        hover_show.classList.remove('hide')
        hover_show.classList.add('show')
    })
    product.addEventListener('mouseleave',()=>{
        image_p.classList.remove('image_p_hover')
        hover_show.classList.remove('show')
        hover_show.classList.add('hide')
    })
})

//carousel

let prev_arrow = document.querySelector('.arrow-left')
let next_arrow = document.querySelector('.arrow-right')
let dot = document.querySelector('.dots')
let dots = Array.from(dot.children)
let c_image = document.querySelector('.images')
let c_images = Array.from(c_image.children)
//console.log(c_images,dots)

let image_width = c_images[0].getBoundingClientRect().width
//console.table({width:image_width})

//if don't want flex to place images side by side then do below 5-6 lines
// const setImagePosition = (image,index) => {
//     image.style.left = image_width * index + 'px' // position:absolute; required  
// }
// c_images.forEach(setImagePosition)

const moveImg = function(current,target,amountMove) {
    c_image.style.transform = `translateX(-${amountMove}px)`
    current.classList.remove('current')
    target.classList.add('current')
}
const updateDots = function(current,target){
    current.classList.remove('active')
    target.classList.add('active')
}
const showHideArrow = (prev_arrow,next_arrow,index)=>{
    if(index===0){
        prev_arrow.classList.add('is_hide')
        next_arrow.classList.remove('is_hide')
    }else if(index===dots.length-1) {
        prev_arrow.classList.remove('is_hide')
        next_arrow.classList.add('is_hide')
    }else{
        prev_arrow.classList.remove('is_hide')
        next_arrow.classList.remove('is_hide')
    }
}
let i = 0
next_arrow.addEventListener('click',event=>{ 
    i++
    const currentImg = c_image.querySelector('.current') //getting current slide
    //console.log(currentImg)
    const nextImg = currentImg.nextElementSibling //getting next sibling
    //console.log(nextImg)
    console.log(i)
    const amountMove = image_width*i
    //console.log(amountMove)
    moveImg(currentImg,nextImg,amountMove)
    const currentDot = dot.querySelector('.active')
    const nextDot = currentDot.nextElementSibling
    const index = c_images.findIndex(i => i === nextImg)
    updateDots(currentDot,nextDot)
    showHideArrow(prev_arrow,next_arrow,index)
})
prev_arrow.addEventListener('click',(event)=>{
    i--
    const currentImg = c_image.querySelector('.current')
    //console.log(currentImg)
    const previousImg = currentImg.previousElementSibling
    //console.log(previousImg)
    console.log(i)
    const amountMove = image_width*i
    //console.log(amountMove)
    moveImg(currentImg,previousImg,amountMove)
    const currentDot = dot.querySelector('.active')
    const previousDot = currentDot.previousElementSibling
    const index = c_images.findIndex(i => i === previousImg)
    updateDots(currentDot,previousDot)
    showHideArrow(prev_arrow,next_arrow,index)
})

//complecated way for dots

// dots.forEach((dot,index)=>{
//     dot.addEventListener('click',()=>{
//         c_image.style.transform = `translateX(-${index*image_width}px)`
//         dots.forEach((d,ind)=>{
//             if(ind===index){
//                 dots[ind].classList.add('active')
//                 if(ind+1<i){
//                     i--
//                 }else if (ind+1>i){
//                     i++
//                 }
//             }else {
//                 dots[ind].classList.remove('active')
//             }
//         })
//     })
// })

//dots simple
//also can use forEach to add event listener to all dot
dots.forEach(dot => {
    dot.addEventListener('click',(event)=>{
        //const targetDot = event.target.closest('.dot')
        const targetDot = event.target
        //console.log(targetDot)

        const index = dots.findIndex(d => d === targetDot)
        const currentImg = document.querySelector('.current')
        const currentDot = document.querySelector('.active')
        //console.log(currentImg,currentDot)
        const targetImg = c_images[index]    
        i = c_images.findIndex(img => img === targetImg)
        console.log(i,index)
        const amountMove = image_width*index

        moveImg(currentImg,targetImg,amountMove)

        updateDots(currentDot,targetDot)

        showHideArrow(prev_arrow,next_arrow,index)

    })
})


//Intersection observer
let sec1 = document.querySelector('.shop')
let nav1 = document.querySelector('nav')
let a = document.querySelectorAll('nav *')

let options = {
    root:null,
    threshold:0,
    rootMargin:"-350px"
}

let observer = new IntersectionObserver((entries,observer)=>{
    entries.forEach(entry => {
        console.log(entry)
        if(!entry.isIntersecting) {
            nav1.classList.remove('inverse')
            a.forEach(a => {
                a.classList.remove('inversea')
            })
        }
        else {
            nav1.classList.add('inverse')
            a.forEach(a => {
                a.classList.add('inversea')
            })
        }
    })
},options)

observer.observe(sec1)

//nav

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