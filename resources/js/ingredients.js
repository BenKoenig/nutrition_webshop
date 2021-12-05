//Show more btn
const ingredientsBtn = document.querySelector('.productDetail__container__item--a');

//ingredients text
const moreInfo = document.querySelector('.productDetail__container__item--moreInfo');

//displays no information by default
moreInfo.style.display = "none";

ingredientsBtn.addEventListener('click', (e) => {
    e.preventDefault();
    if (moreInfo.style.display === "block") {
        //hides text
        moreInfo.style.display = "none";
    } else {
        //displays text
        moreInfo.style.display = "block";
    }
})