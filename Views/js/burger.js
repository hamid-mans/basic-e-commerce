let burger = document.querySelector('.burger')
let menu = document.querySelector('.menu')
let body = document.querySelector('body')

$(menu).hide()
$('.burger').click(() => {
    burger.classList.toggle('active')
    $(menu).animate({width: 'toggle'});

})