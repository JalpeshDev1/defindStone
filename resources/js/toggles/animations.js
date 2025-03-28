// GSAP

import { gsap } from "gsap";

import { ScrollTrigger } from "gsap/ScrollTrigger";
import { TextPlugin } from "gsap/TextPlugin";

/* The following plugin is a Club GSAP perk */
import { SplitText } from "gsap/SplitText";

gsap.registerPlugin(ScrollTrigger, TextPlugin, SplitText);

const animations = () => {
  //Large hero Animation
  const headingTimeline = gsap.timeline();

  headingTimeline.from(".line span", 1.8, {
    y: 140,
    opacity: 0,
    ease: "power4.out",
    delay: 0.7,
    skewY: 17,
    stagger: {
      amount: 0.3,
    },
  });

  gsap.utils.toArray(".fade-section").forEach((section) => {
    gsap.from(section, {
      opacity: 0, // start fully transparent
      y: 20, // start 50px lower
      duration: 1, // animation lasts 1 second
      scrollTrigger: {
        trigger: section,
        start: "top 80%", // when the top of the section is at 80% of the viewport height
        toggleActions: "play reverse play reverse",
        // markers: true,  // Uncomment for debugging
      },
    });
  });
  // reveal text on scroll
  // const revealPara = document.querySelectorAll(".paragraph");

  // if (revealPara.length > 0) {
  //   revealPara.forEach((paragraph) => {
  //     const split = new SplitText(paragraph, {
  //       type: "chars,lines",
  //       charsClass: "char",
  //     });

  //     let textScrollReveal = gsap.timeline({
  //       scrollTrigger: {
  //         trigger: paragraph,
  //         start: "top center",
  //         end: "bottom center",
  //         scrub: 2,
  //         // markers: true
  //       },
  //     });

  //     // Adding the actual animation to reveal text
  //     textScrollReveal.to(split.chars, {
  //       autoAlpha: 1,
  //       stagger: 0.1,
  //     });
  //   });
  //   textScrollReveal.to(split.chars, { autoAlpha: 1, stagger: 0.3 });
  // }

  const quotes = document.querySelectorAll(".quote");

  if (quotes) {
    function setupSplits() {
      quotes.forEach((quote) => {
        // Reset if needed
        if (quote.anim) {
          quote.anim.progress(1).kill();
          quote.split.revert();
        }

        quote.split = new SplitText(quote, {
          type: "lines,words,chars",
          linesClass: "split-line",
        });

        // Set up the anim
        quote.anim = gsap.from(quote.split.chars, {
          scrollTrigger: {
            trigger: quote,
            toggleActions: "restart pause resume reverse",
            start: "top 70%",
          },
          duration: 0.5,
          ease: "circ.out",
          y: 80,
          stagger: 0.02,
        });
      });
    }

    ScrollTrigger.addEventListener("refresh", setupSplits);
    setupSplits();
  }

  //Portfolio boxes
  const boxes = gsap.utils.toArray(".box");

  if (boxes) {
    boxes.forEach((box, i) => {
      const anim = gsap.fromTo(
        box,
        { autoAlpha: 0, y: 70 },
        { duration: 1, autoAlpha: 1, y: 0 }
      );
      ScrollTrigger.create({
        trigger: box,
        animation: anim,
        toggleActions: "play none none none",
        once: true,
      });
    });
  }

  const items = document.querySelectorAll(".item");

  if (items) {
    gsap.utils.toArray(".item").forEach((element, i) => {
      gsap.set(element, { opacity: 0 });
      gsap.from(element, {
        y: 40,
        scrollTrigger: {
          trigger: element,
          start: "top 100%",
        },
      });
    });

    ScrollTrigger.batch(".item", {
      onEnter: (batch) =>
        gsap.to(batch, {
          opacity: 1,
          y: 0,
          stagger: { each: 0.15, grid: [1, 3] },
          overwrite: true,
        }),
      onLeaveBack: (batch) =>
        gsap.set(batch, { opacity: 0, y: 40, overwrite: true }),
    });

    ScrollTrigger.addEventListener("refreshInit", () =>
      gsap.set(".item", { y: 0 })
    );
  }

  let revealContainers = document.querySelectorAll(".reveal");

  if (revealContainers) {
    revealContainers.forEach((container) => {
      let image = container.querySelector("img");
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: container,
          toggleActions: "restart none none reset",
        },
      });

      tl.set(container, { autoAlpha: 1 });
      tl.from(container, 1.5, {
        xPercent: -100,
        //ease: Power2.out
      });
      tl.from(image, 1.5, {
        xPercent: 100,
        scale: 1.3,
        delay: -1.5,
        //ease: Power2.out
      });
    });
  }

  // document.querySelectorAll(".fade-section").forEach((section) => {
  //   gsap.to(section, {
  //     scrollTrigger: {
  //       trigger: section,
  //       start: "top 90%",
  //       end: "bottom 70%",
  //       toggleActions: "play none none none",
  //       scrub: 1,
  //     },
  //     backgroundColor: "black",
  //     duration: 0.3,
  //   });
  // });

  const horizontalSection = document.querySelector(".horizontal-section");
  const horizontalWrapper = document.querySelector(".horizontal-wrapper");

  function setSectionHeight() {
    const totalScrollWidth = horizontalWrapper.scrollWidth;
    const viewportWidth = window.innerWidth;
    const viewportHeight = window.innerHeight;
    const scrollDistance = totalScrollWidth - viewportWidth;
    const sectionHeight = scrollDistance + viewportHeight;
    horizontalSection.style.height = sectionHeight + "px";
    console.log(
      "Section height:",
      sectionHeight,
      "Scroll Distance:",
      scrollDistance,
      "Viewport Height:",
      viewportHeight
    );
  }

  function initHorizontalScroll() {
    if (!horizontalSection || !horizontalWrapper) return;

    // Set the dynamic height
    setSectionHeight();

    // Kill any existing triggers
    ScrollTrigger.getAll().forEach((trigger) => trigger.kill());

    gsap.to(horizontalWrapper, {
      x: () => -(horizontalWrapper.scrollWidth - window.innerWidth) + "px",
      ease: "none",
      scrollTrigger: {
        trigger: horizontalSection,
        start: "top top",
        end: () => "+=" + (horizontalWrapper.scrollWidth - window.innerWidth),
        scrub: true,
        pin: true,
        pinSpacing: false, // Try toggling this between true and false
        anticipatePin: 1,
        invalidateOnRefresh: true,
      },
    });

    ScrollTrigger.refresh();
  }

  initHorizontalScroll();
  window.addEventListener("resize", () => {
    initHorizontalScroll();
  });

  const lineEl = document.querySelector(".connecting-line line");
  if (lineEl) {
    gsap.fromTo(
      lineEl,
      { strokeDashoffset: 100 }, // start fully hidden (matches pathLength)
      {
        strokeDashoffset: 0, // drawn completely
        ease: "none",
        scrollTrigger: {
          trigger: ".hotspot-section",
          start: "top 90%",
          end: "bottom 60%",
          scrub: 2,
          indicators: true,
        },
      }
    );
  }

  document.querySelectorAll(".animate-number").forEach((el) => {
    const targetValue = parseFloat(el.getAttribute("data-target"));
    const suffix = el.getAttribute("data-suffix") || "";

    // Create an object to animate
    let counter = { value: 0 };

    gsap.to(counter, {
      value: targetValue,
      duration: 2,
      ease: "power1.out",
      scrollTrigger: {
        trigger: el,
        start: "top 95%", // Adjust the start position as needed
        toggleActions: "play none none none",
      },
      onUpdate: function () {
        // Update the element’s text as the value changes
        el.innerText = Math.round(counter.value) + suffix;
      },
    });
  });

  const rows = document.querySelectorAll(".project-list");

  rows.forEach((row) => {
    row.addEventListener("mouseenter", () => {
      // Kill any previous animation on this element
      gsap.killTweensOf(row);
      // Animate to gray quickly
      gsap.to(row, { backgroundColor: "#ccc", duration: 0.1 });
    });

    row.addEventListener("mouseleave", () => {
      // Animate back to white slowly
      gsap.to(row, { backgroundColor: "white", duration: 0.5 });
    });
  });
};

export default animations;
