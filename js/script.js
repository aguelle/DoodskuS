const navMobile = document.querySelector('#nav-mobile');

function initActionNavBar() {
  const btnOpenNavMobile = document.querySelector('#btnOpenNavMobile');
  const btnCloseNavMobile = document.querySelector('#btnCloseNavMobile');
  btnOpenNavMobile.addEventListener('click', handleManageNavMobile);
  btnCloseNavMobile.addEventListener('click', handleManageNavMobile);
}

function initActionWindow() {
  window.addEventListener('scroll', handleNavMobileOnScroll);
}

function handleManageNavMobile() {
  if (navMobile.classList.contains('active')) {
    return navMobile.classList.remove('active');
  }
  navMobile.classList.add('active');
}

function handleNavMobileOnScroll() {
  const navDesktop = document.querySelector('.nav-desktop')
  if(window.scrollY > 50) {
    console.log('HIDDEN MOBILE NAV');
      navDesktop.classList.add('hidden');
  }
}




// initialisations :
initActionNavBar();
initActionWindow();