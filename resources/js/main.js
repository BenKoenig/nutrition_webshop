//displays loading animation when website is still loading
document.documentElement.onload = function () {
  document.querySelector('.loading').style.display = "block";
}

//hides loading animation once website has finisehd loading
window.onload = function () {
  document.querySelector('.loading').style.display = "none";
}
