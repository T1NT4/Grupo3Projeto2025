let menuList = document.getElementById("menuList");
let hamburger = document.getElementById("hamburger");
menuList.style.maxHeight = "0px";

function toggleMenu() {
  if (menuList.style.maxHeight == "0px") {
    hamburger.style.rotate = "180deg";
    menuList.style.maxHeight = "300px";
  } else {
    hamburger.style.rotate = "0deg";
    menuList.style.maxHeight = "0px";
  }
}
