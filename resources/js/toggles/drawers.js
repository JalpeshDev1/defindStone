const drawers = () => {
  const drawer = document.getElementById("project-drawer");
  const drawerContent = document.getElementById("drawer-content");
  const closeDrawer = document.getElementById("close-drawer");
  const drawerOverlay = document.getElementById("drawer-overlay");

  if (!drawer || !drawerContent || !closeDrawer || !drawerOverlay) {
    return;
  }

  function openDrawer(content) {
    drawerContent.innerHTML = content;
    drawer.classList.remove("translate-x-full");
    drawer.classList.add("translate-x-0");
    drawerOverlay.classList.remove("hidden");

    const sliderEl = drawerContent.querySelector(".project-slider-alt");
    if (sliderEl && typeof Swiper !== "undefined") {
      new Swiper(sliderEl, {
        loop: true,
        slidesPerView: 1,
        centeredSlidesBounds: true,

        navigation: {
          nextEl: sliderEl.querySelector(".swiper-button-slide-next"),
          prevEl: sliderEl.querySelector(".swiper-button-slide-prev"),
        },
      });
    }
  }

  function closeSideDrawer() {
    drawer.classList.remove("translate-x-0");
    drawer.classList.add("translate-x-full");
    drawerOverlay.classList.add("hidden");
  }

  closeDrawer.addEventListener("click", closeSideDrawer);

  drawerOverlay.addEventListener("click", closeSideDrawer);

  document.querySelectorAll(".project-item").forEach((item) => {
    item.addEventListener("click", function () {
      const projectId = this.getAttribute("data-project-id");
      fetch(
        `${ajax_object.ajax_url}?action=get_project_details&project_id=${projectId}`
      )
        .then((response) => response.text())
        .then((data) => {
          openDrawer(data);
        })
        .catch((error) => {
          console.error("Error loading project details:", error);
        });
    });
  });
};

// if (typeof ajax_object === "undefined") {
//   console.error("ajax_object is not defined");
// }

export default drawers;
