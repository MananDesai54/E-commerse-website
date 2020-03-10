let quantity = document.querySelector('.num')
let plus = document.querySelector('.plus')
let minus = document.querySelector('.minus')

quantity.style.transition = 'opacity 0.2s ease-in-out'
function changeQuantity(event) {
    const sign = event.target.id
    console.log(sign)
    let value = +quantity.textContent
    quantity.style.opacity = '0'
    if(sign==='plus')
        value++
    else if(sign==='minus' && value>1)
        value--
    setTimeout(()=>{
        quantity.textContent = value
        quantity.style.opacity = '1'
    },200)
}
plus.addEventListener('click',changeQuantity)
minus.addEventListener('click',changeQuantity)

let star = document.querySelectorAll('.star')
let stars = []
star.forEach(star=>{
    stars.push(Array.from(star.children))
})

stars.forEach((star,index)=>{
    star.forEach((st,ind)=>{
        st.addEventListener('click',(event)=>{
            let i
            for(i=0;i<=ind;i++)
                stars[index][i].style.color = '#e0c00b'
            for(let j=i;j<star.length;j++)
                stars[index][j].style.color = '#ddd'
        })
    })
})

//

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
//

let more_img = document.querySelector('.sample-img')
const more_inside_img = Array.from(more_img.children)
let main_img = document.querySelector('.main-img img')

let active_index = 0
more_inside_img.forEach((img,index)=>{
    img.addEventListener('click',(event)=>{
        const img_path = event.target.src
        main_img.src = img_path
        more_inside_img[active_index].classList.remove('active')
        more_inside_img[index].classList.add('active')
        active_index = index
    })
})

console.log('{{ product.imagePath }}')