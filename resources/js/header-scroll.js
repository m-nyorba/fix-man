/**
 * Sets up a scroll event listener on the window object to toggle a class on the template-part header.
 * The class is toggled when the vertical scroll position is greater than a specified threshold.
 */
(function () {
  "use strict";

  const SCROLLED_CLASS = "is-scrolled";
  const THRESHOLD = 50;

  const header = document.querySelector("header.wp-block-template-part");

  if (!header) {
    return;
  }

  function onScroll() {
    header.classList.toggle(SCROLLED_CLASS, window.scrollY > THRESHOLD);
  }

  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();
})();
