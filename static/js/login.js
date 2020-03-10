let eye = document.querySelector('.fa-eye')
let eye_slash = document.querySelector('.fa-eye-slash')
let password = document.querySelector('.password')

console.log(password)
eye.addEventListener('click',showHide)
eye_slash.addEventListener('click',showHide)

function showHide() {
    let name = this.dataset.name;
    if(this.classList.contains('show')) {
        this.classList.add('hidden')
        this.classList.remove('show')
        check(name)
    }
    else {
        this.classList.remove('hidden')
        this.classList.add('show')
        check(name)
    }
}
function check(name) {
    if(name === 'eye'){
        eye_slash.classList.add('show')
        eye_slash.classList.remove('hidden')
        password.type = 'password'
    }else {
        eye.classList.add('show')
        eye.classList.remove('hidden')
        password.type = 'text'
    }
}
// password.addEventListener('input',()=>{
//     console.log(password.value)
// })