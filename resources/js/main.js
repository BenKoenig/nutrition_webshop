document.documentElement.onload = function() {
  document.querySelector('.loading').style.display = "block";
}

window.onload = function() {
  document.querySelector('.loading').style.display = "none";
}

// const menu = document.querySelector('.nav__container__menu');
// const mobileBtn = document.querySelector('.nav__container__mobilebtn');
// const black = document.querySelector('.nav__container__menu--mobile');
// mobileBtn.addEventListener("click", () =>  {
//   if(menu.style.display === "block") {
//     menu.style.display = "none";
//   } else {
//     menu.style.display = "block";
//   }
// })

// black.addEventListener('click', () => {
//   menu.style.display = "none";
// })

const ingredientsBtn = document.querySelector('.productDetail__container__item--a');
const moreInfo = document.querySelector('.productDetail__container__item--moreInfo');


moreInfo.style.display = "none";
ingredientsBtn.addEventListener('click', (e) => {
  e.preventDefault();
  if(moreInfo.style.display === "block") {
    moreInfo.style.display = "none";
  } else {
    moreInfo.style.display = "block";
  }
})




// let lastY = window.scrollY;
// const update_sticky_nav_position = e => {
//     const nav = document.querySelector('.nav__dekstop');
//     const nav_height = nav.getBoundingClientRect().height;

//     if(lastY < window.scrollY) {
//         // nav.classList.add('main-nav--hidden');
//         nav.style.display = "none";
//     } else {
//         // nav.classList.remove('main-nav--hidden');
//         nav.style.display = "flex";
        
//     }
//     lastY = window.scrollY;
// }

// window.addEventListener('scroll', update_sticky_nav_position);
// update_sticky_nav_position();


// const navOverlay = document.querySelector('.nav');
// navOverlay.addEventListener('click', () => {
//   navOverlay.style.background = "white";
// })
