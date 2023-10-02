let navMobile = document.getElementById("nav-mobile");
let openBtn = document.getElementById("openBtn");
let closeBtn = document.getElementById("closeBtn");
let logoNav = document.getElementById("logo-nav");

/*Add function to display Nav Mobile*/
function openNav() {
  openBtn.addEventListener("click", function () {
    navMobile.classList.add("active");
  });
}

/* Add function to display off Nav Mobile*/
function closeNav() {
  closeBtn.addEventListener("click", function () {
    navMobile.classList.remove("active");
  });
}
openNav();
closeNav();

function displayNavMobileOnScroll(){
window.addEventListener('scroll',()=>{
  if(window.scrollY>50){
  openBtn.classList.add('scroll')
  }
  else {openBtn.classList.remove('scroll')}
});
window.addEventListener('scroll',()=>{
  if(window.scrollY>50){
  logoNav.classList.add('scroll')
  }
  else{logoNav.classList.remove('scroll')}
});
};
displayNavMobileOnScroll();