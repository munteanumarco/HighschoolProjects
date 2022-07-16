const navbarSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.navbar-links');
    const navbarLinks = document.querySelectorAll('.navbar-links li');

    burger.addEventListener('click',()=>{
        nav.classList.toggle('navbar-activate');

        navbarLinks.forEach((link,index) =>{
            if(link.style.animation){
                link.style.animation = '';
            }
            else{
                link.style.animation = `navbarLinkFade 0.5s ease forwards ${index/7 + 0.5 }s`;
            }
        });
    
    });

}

navbarSlide();