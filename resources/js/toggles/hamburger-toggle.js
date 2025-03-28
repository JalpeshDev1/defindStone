// Hamburger toggle

export function hamburgerToggle() {
    var linkToggle = document.querySelectorAll("#hamburger");
  
    var i;
  
    if (linkToggle) {
      for (i = 0; i < linkToggle.length; i++) {
        linkToggle[i].addEventListener("click", function (event) {
          event.preventDefault();
  
          var container = document.querySelector(".toggle-container");
          var heading = this;
  
          if (!container.classList.contains("active")) {
            container.classList.add("active");
            container.style.height = "auto";
            heading.classList.add("active");
  
            //var height = container.clientHeight + "px";
  
            container.style.height = "85vh";
  
          } else {
            container.style.height = "0px";
  
            container.addEventListener(
              "transitionend",
              function () {
                container.classList.remove("active");
                heading.classList.remove("active");
              },
              {
                once: true,
              }
            );
          }
        });
      }
    }
  
    document.addEventListener("DOMContentLoaded", function (event) {
      var element = document.querySelector(".toggle-container");
      var hamburger = document.querySelector(".c-hamburger");
  
      function resize() {
        if (window.innerWidth > 768) {
          element.classList.remove("active");
          hamburger.classList.remove("active");
        }
      }
  
      window.onresize = resize;
    });
  }
  