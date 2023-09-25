let navMobile = document.getElementById("nav-mobile");
let openBtn = document.getElementById("openBtn");
let closeBtn = document.getElementById("closeBtn");

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
