const burger = document.querySelector('.burger')
const headerMenu = document.querySelector('.header__menu')
const headerMenuLink = document.querySelectorAll('.header__menu-link')
const body = document.querySelector('body')
const bur = document.querySelector('.bur')
burger.addEventListener('click', () => {
    headerMenu.classList.toggle('active')
    body.classList.toggle('active')
    bur.classList.toggle('active')
})


headerMenuLink.forEach(el => {
    el.addEventListener('click', () => {
        headerMenu.classList.remove('active');
        body.classList.remove('active');
        bur.classList.remove('active');
    });
})
