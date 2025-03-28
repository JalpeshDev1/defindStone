const menuScripts = () => {
  // New navigation scripts
  const menu = document.querySelector(".menu");
  const menuMain = menu.querySelector(".menu-main");
  const menuTrigger = document.querySelector(".mobile-menu-trigger");
  const goBack = menu.querySelector(".go-back");
  const closeMenu = menu.querySelector(".mobile-menu-close");
  const menuOverlay = document.querySelector(".menu-overlay");

  let subMenu;

  menuMain.addEventListener("click", (e) => {
      if (e.target.closest(".menu-item-has-children")) {
          const hasChildren = e.target.closest(".menu-item-has-children");
          showSubMenu(hasChildren);
      }
  });

  goBack.addEventListener("click", () => {
      hideSubMenu();
  });

  menuTrigger.addEventListener("click", () => {
      toggleMenu();
  });

  closeMenu.addEventListener("click", () => {
      toggleMenu();
  });

  menuOverlay.addEventListener("click", () => {
      toggleMenu();
  });

  function toggleMenu() {
      menu.classList.toggle("active");
      menuOverlay.classList.toggle("active");
  }

  function showSubMenu(hasChildren) {
      subMenu = hasChildren.querySelector(".sub-menu");
      subMenu.classList.add("active");
      subMenu.style.animation = "slideLeft 0.5s ease forwards";
      const menuTitle = hasChildren.querySelector(".sub-menu-container a span").textContent.trim();
      menu.querySelector(".current-menu-title").innerHTML = menuTitle;
      menu.querySelector(".mobile-menu-head").classList.add("active");
  }

  function hideSubMenu() {
      subMenu.style.animation = "slideRight 0.5s ease forwards";
      setTimeout(() => {
          subMenu.classList.remove("active");
      }, 300);
      menu.querySelector(".current-menu-title").innerHTML = "";
      menu.querySelector(".mobile-menu-head").classList.remove("active");
  }

  window.onresize = function () {
      if (this.innerWidth > 991) {
          if (menu.classList.contains("active")) {
              toggleMenu();
          }
      }
  };

  const mainHeader = document.querySelector(".main-header");
  window.addEventListener('scroll', function() {
    if (window.scrollY > 0) {
        mainHeader.classList.add('bg-primary', 'scrolled');
    } else {
        mainHeader.classList.remove('bg-primary', 'scrolled');
    }
  });
}

export default menuScripts;
