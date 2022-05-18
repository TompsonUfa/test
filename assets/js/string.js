let cartDesc = document.querySelectorAll(".cart__descriptions");
var lengthStr = 72;
let result = [];
for (let i = 0; i < cartDesc.length; i++) {
  if (cartDesc[i].textContent.length > lengthStr) {
    result[i] = cartDesc[i].textContent;
    cartDesc[i].textContent =
      cartDesc[i].innerText.substr(0, lengthStr) + "...";
  }
}
