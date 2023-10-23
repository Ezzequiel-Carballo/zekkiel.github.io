var typed = new Typed(".multiple-text",{
    strings: ["Frontend Developer", "Backend Developer"],
    typeSpeed:100,
    backSpeed:100,
    backDelay:1000,
    loop:true
})

var openModal = document.getElementById('open'),
    overlay = document.getElementById('overlay'), 
    modal = document.getElementById('modal'),
    closeModal = document.getElementById('close');

openModal.addEventListener('click',function(){
    overlay.classList.add('active');
    modal.classList.add('active');
});

closeModal.addEventListener('click',function(){
    overlay.classList.remove('active');
    modal.classList.remove('active');
});