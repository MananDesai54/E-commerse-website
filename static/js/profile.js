let inputs = document.querySelectorAll('input')
let button = document.querySelector('#update')
    //let success = document.querySelector('.success')
let form = document.querySelector('.sec2')
let save = document.querySelector('#save')
let bday = document.querySelector('#bday')

//console.log(input,button)
button.addEventListener('click', (event) => {
    inputs.forEach(input => {
        input.disabled = false
    })
    document.getElementById('save').removeAttribute('disabled')
        //success.classList.add('hide')
})