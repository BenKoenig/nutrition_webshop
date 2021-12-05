//blank background
const navOverlay = document.querySelector('.nav__mobile__overlay');

//closes navigation overlay
navOverlay.addEventListener('click', () => {
  navOverlay.classList.add("sr-only");
})



//burger button
const openMenu = document.querySelector('.nav__mobile__a--open_menu');

//opens navigation overlay
openMenu.addEventListener('click', e => {
  e.preventDefault();
  navOverlay.classList.remove("sr-only");
});