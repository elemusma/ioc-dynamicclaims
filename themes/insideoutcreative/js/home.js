let colLeft = document.querySelector('.col-img.text-left .col-img-link');
let colRight = document.querySelector('.col-img.text-right .col-img-link');

let mouseLeave = (elem) => {
    setTimeout(function () {
        elem.parentNode.style.zIndex = '1';
    }, 500);
}

colLeft.addEventListener('mouseenter', mouseEnterFunction);
colLeft.addEventListener('mouseleave', mouseLeaveFunction);
colRight.addEventListener('mouseenter', mouseEnterFunction);
colRight.addEventListener('mouseleave', mouseLeaveFunction);

function mouseEnterFunction() {
    this.parentNode.classList.add('active');
    this.parentNode.style.zIndex = '2';

}
function mouseLeaveFunction() {
    this.parentNode.classList.remove('active');
    mouseLeave(this);
}
