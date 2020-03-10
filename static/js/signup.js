let eyes = document.querySelectorAll('.fa-eye')
let eyes_slash = document.querySelectorAll('.fa-eye-slash')
let password = document.querySelectorAll('.password')

console.log(eyes,eyes_slash)
eyes.forEach(eye => eye.addEventListener('click',showHide))
eyes_slash.forEach(eye=>eye.addEventListener('click',showHide))

function showHide() {
    let name = this.dataset.name
    let index = this.dataset.index
    console.log(index)
    if(this.classList.contains('show')) {
        this.classList.add('hidden')
        this.classList.remove('show')
        check(name,index)
    }
    else {
        this.classList.remove('hidden')
        this.classList.add('show')
        check(name,index)
    }
}
function check(name,index) {
    if(name === 'eye'){
        eyes_slash[index].classList.add('show')
        eyes_slash[index].classList.remove('hidden')
        password[index].type = 'password'
    }else {
        eyes[index].classList.add('show')
        eyes[index].classList.remove('hidden')
        password[index].type = 'text'
    }
}
// password.addEventListener('input',()=>{
//     console.log(password.value)
// })