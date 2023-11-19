import * as utils from './functions';


const navMobile = document.querySelector("#nav-mobile");

function initActionNavBar() {
  const btnOpenNavMobile = document.querySelector("#btnOpenNavMobile");
  const btnCloseNavMobile = document.querySelector("#btnCloseNavMobile");
  btnOpenNavMobile.addEventListener("click", handleManageNavMobile);
  btnCloseNavMobile.addEventListener("click", handleManageNavMobile);
}

function initActionWindow() {
  window.addEventListener("scroll", handleNavMobileOnScroll);
}

function handleManageNavMobile() {
  if (navMobile.classList.contains("active")) {
    return navMobile.classList.remove("active");
  }
  navMobile.classList.add("active");
}

function handleNavMobileOnScroll() {
  const navDesktop = document.querySelector(".nav-desktop");
  if (window.scrollY > 50) {
    console.log("HIDDEN MOBILE NAV");
    navDesktop.classList.add("hidden");
  }
}

// initialisations :
initActionNavBar();
initActionWindow();

//Add subscription
document.getElementById("new_sub").addEventListener("submit", function (event) {
  event.preventDefault();
  // Check and validate data
  const data = {
    action: "add",
    token: utils.getToken(),
    text: this.querySelector('input[name="new_sub"]').value,
  };

  if (data.text.length < 1) {
    utils.displayError("Merci de saisir une adresse email valide.");
    return;
  }
  if (data.token.length < 1) {
    utils.displayError("Sécu !? HELP !!!!");
    return;
  }
  
  utils.fetchApi("POST", data).then((responseApi) => {
    // An error occurs, dispay error message
    if (!responseApi.result) {
      utils.displayError(responseApi.error);
      return;
    }
    utils.displayError("adresse email enregistrée.");

  });
});
