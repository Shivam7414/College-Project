
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
var x = document.getElementById('login');
var y = document.getElementById('Teacher');
var z = document.getElementById('loginbtn');
function Teacher() {
  x.style.left = '-400px';
  y.style.left = '-20px';
  z.style.left = '143px';
}
function login() {
  x.style.left = '-12px';
  y.style.left = '450px';
  z.style.left = '0px';
}