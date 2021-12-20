var closeButton = document.querySelector('.close');
var modal = document.querySelector('.modal');
var body = document.querySelector('body');
var click = new Event('click');

body.style.overflow = 'hidden';

closeButton.addEventListener('click', function (event) {
    body.style.overflow = 'scroll';
    modal.parentNode.removeChild(modal);
});

var hideModal = localStorage.getItem("hideModal");

if (hideModal) {
    closeButton.dispatchEvent(click);
}

localStorage.setItem("hideModal", true);