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
