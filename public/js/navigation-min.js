const navOverlay=document.querySelector(".nav__mobile__overlay");navOverlay.addEventListener("click",(()=>{navOverlay.classList.add("sr-only")}));const openMenu=document.querySelector(".nav__mobile__a--open_menu");openMenu.addEventListener("click",(e=>{e.preventDefault(),navOverlay.classList.remove("sr-only")}));