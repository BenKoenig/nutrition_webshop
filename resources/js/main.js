
document.documentElement.onload = function() {
  document.querySelector('.loading').style.display = "block";
}

window.onload = function() {
  document.querySelector('.loading').style.display = "none";
}

const menu = document.querySelector('.nav__container__menu');
const mobileBtn = document.querySelector('.nav__container__mobilebtn');
const black = document.querySelector('.nav__container__menu--mobile');
mobileBtn.addEventListener("click", () =>  {
  if(menu.style.display === "block") {
    menu.style.display = "none";
  } else {
    menu.style.display = "block";
  }
})

black.addEventListener('click', () => {
  menu.style.display = "none";
})