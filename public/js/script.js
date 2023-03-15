document.querySelector('.dropdown-button').addEventListener('click', () => {
    document.querySelector('.dropdown-container').classList.toggle('hidden')
})

document.getElementById('button-collapse-nav').addEventListener('click', () => {
    document.getElementById('nav').style.left = '-16rem'
})
document.getElementById('button-reveal-nav').addEventListener('click', () => {
    document.getElementById('nav').style.left = '0'
})