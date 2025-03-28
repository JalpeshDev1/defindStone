const verticalTabs = () => {
  document.addEventListener("DOMContentLoaded", function () {
    var tabTitles = document.querySelectorAll(".tab-title");

    if (tabTitles.length > 0) {
      tabTitles.forEach(function (tabTitle) {
        tabTitle.addEventListener("click", function (event) {
          event.preventDefault();

          this.classList.add("active");
          this.parentElement
            .querySelectorAll(".tab-title")
            .forEach(function (sibling) {
              if (sibling !== tabTitle) {
                sibling.classList.remove("active");
              }
            });

          var ph = this.parentElement.offsetHeight;
          var ch = this.nextElementSibling
            ? this.nextElementSibling.offsetHeight
            : 0;

          if (ch > ph) {
            this.parentElement.style.minHeight = ch + "px";
          } else {
            this.parentElement.style.height = "auto";
          }
        });
      });
    }

    function tabParentHeight() {
      var sectionTab = document.querySelector(".section-tab");
      var tabContent = document.querySelector(".tab-content");

      if (sectionTab && tabContent) {
        var ph = sectionTab.offsetHeight;
        var ch = tabContent.offsetHeight;

        if (ch > ph) {
          sectionTab.style.height = ch + "px";
        } else {
          sectionTab.style.height = "auto";
        }
      }
    }

    if (
      document.querySelector(".section-tab") &&
      document.querySelector(".tab-content")
    ) {
      window.addEventListener("resize", tabParentHeight);
      tabParentHeight();
    }
  });
};

export default verticalTabs;
