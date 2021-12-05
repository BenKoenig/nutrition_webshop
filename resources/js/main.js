document.documentElement.onload = function () {
  document.querySelector('.loading').style.display = "block";
}

window.onload = function () {
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
  if (moreInfo.style.display === "block") {
    moreInfo.style.display = "none";
  } else {
    moreInfo.style.display = "block";
  }
})


//next image button
const productImageNextBtn = document.querySelector('.productDetail__container__imgs--next');
//previous image button
const productImageBackBtn = document.querySelector('.productDetail__container__imgs--back');
//image list
const productList = document.querySelector('.productDetail__container__imgs__list');
//amount of images that are displayed
const productImgs = document.querySelectorAll('.productDetail__container__imgs__list__img').length;

let count = 0;
productImageNextBtn.addEventListener('click', (e) => {
  e.preventDefault();
  if (count < productImgs - 1) {
    //as long as the count is under the amount if images it will add 1
    count++;
  }
  //displays next image
  productList.style.transform = `translatex(-${count}00%)`;
});

productImageBackBtn.addEventListener('click', (e) => {
  e.preventDefault();
  //as long as coint is above 0 it will subtract 1 
  if(count > 0) {
    count--;
  }
  //dislays previous image
  productList.style.transform = `translatex(-${count}00%)`;
});


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
