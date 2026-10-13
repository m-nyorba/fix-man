/**
 * Handles the back-to-top button and same-page anchor links.
 */
(function () {
  "use strict";

  function init() {
    const header = document.querySelector("header.wp-block-template-part");
    const backToTop = document.querySelector(".back-to-top");
    const body = document.body;
    const root = document.documentElement;
    const threshold = 300;

    function getHeaderHeight() {
      return header ? header.offsetHeight : 0;
    }

    function updateBackToTop() {
      if (!backToTop) {
        return;
      }

      backToTop.setAttribute(
        "aria-hidden",
        String(window.scrollY <= threshold),
      );
    }

    function updateHeader() {
      const isScrolled = window.scrollY > 10;

      body.classList.toggle("is-scrolled", isScrolled);

      if (header) {
        header.classList.toggle("is-scrolled", isScrolled);
        root.style.setProperty("--header-height", `${header.offsetHeight}px`);
      }
    }

    function findAnchorTarget(hash) {
      const id = decodeURIComponent(hash.slice(1));
      const namedAnchor = Array.from(document.getElementsByName(id)).find(
        (element) => element.tagName === "A",
      );

      return document.getElementById(id) || namedAnchor;
    }

    function scrollToAnchor(target, updateHistory) {
      const headerHeight = getHeaderHeight();
      root.style.setProperty("--header-height", `${headerHeight}px`);
      const targetTop =
        target.getBoundingClientRect().top + window.scrollY - headerHeight;

      window.scrollTo({
        top: targetTop,
        behavior: window.matchMedia("(prefers-reduced-motion: reduce)").matches
          ? "auto"
          : "smooth",
      });

      if (updateHistory) {
        window.history.pushState(
          null,
          "",
          window.location.pathname + window.location.search,
        );
      }
    }

    window.addEventListener(
      "scroll",
      function () {
        updateHeader();
        updateBackToTop();
      },
      { passive: true },
    );
    window.addEventListener(
      "resize",
      function () {
        updateHeader();
        updateBackToTop();
      },
      { passive: true },
    );
    updateHeader();
    updateBackToTop();

    document.addEventListener("spectra:modal:closed", function () {
      if (!document.querySelector(".spectra-modal-popup.active")) {
        body.classList.remove("spectra-modal-active");
      }
    });

    if (window.location.hash) {
      const target = findAnchorTarget(window.location.hash);

      if (target) {
        window.history.replaceState(
          null,
          "",
          window.location.pathname + window.location.search,
        );
        window.requestAnimationFrame(function () {
          scrollToAnchor(target, false);
        });
      }
    }

    if (backToTop) {
      backToTop.addEventListener("click", function () {
        window.scrollTo({
          top: 0,
          behavior: window.matchMedia("(prefers-reduced-motion: reduce)")
            .matches
            ? "auto"
            : "smooth",
        });
      });
    }

    document.addEventListener("click", function (event) {
      const link = event.target.closest("a[href]");

      if (!link || !link.hash || link.hash === "#") {
        return;
      }

      const targetUrl = new URL(link.href, window.location.href);
      const isSamePage =
        targetUrl.origin === window.location.origin &&
        targetUrl.pathname.replace(/\/$/, "") ===
          window.location.pathname.replace(/\/$/, "");

      if (!isSamePage) {
        return;
      }

      const target = findAnchorTarget(link.hash);

      if (!target) {
        return;
      }

      event.preventDefault();
      scrollToAnchor(target, true);
    });

    // Prevent accordion links with a placeholder href from jumping to the top.
    document.addEventListener(
      "click",
      function (event) {
        const trigger = event.target.closest(
          '.uagb-accordion-item a[href="#"], .wp-block-uagb-accordion-child a[href="#"]',
        );

        if (trigger) {
          event.preventDefault();
        }
      },
      true,
    );

    // Keep mobile navigation submenus closed until the user opens one.
    function initializeClosedSubmenus(container) {
      const targetContainer = container || document;
      const toggles = targetContainer.querySelectorAll(
        ".wp-block-navigation-submenu__toggle",
      );

      toggles.forEach(function (toggle) {
        toggle.setAttribute("data-submenu-state", "closed");
        toggle.setAttribute("aria-expanded", "false");
      });
    }

    initializeClosedSubmenus();

    document
      .querySelectorAll(".wp-block-navigation__responsive-container")
      .forEach(function (overlay) {
        new MutationObserver(function (mutations) {
          mutations.forEach(function (mutation) {
            if (
              mutation.type === "attributes" &&
              mutation.attributeName === "class" &&
              mutation.target.classList.contains("is-menu-open")
            ) {
              initializeClosedSubmenus(mutation.target);
            }
          });
        }).observe(overlay, { attributes: true });
      });

    document.addEventListener(
      "click",
      function (event) {
        const openMenuButton = event.target.closest(
          ".wp-block-navigation__responsive-container-open",
        );

        if (openMenuButton) {
          const navigation = openMenuButton.closest(".wp-block-navigation");

          if (navigation) {
            initializeClosedSubmenus(navigation);
          }

          return;
        }

        const overlay = event.target.closest(
          ".wp-block-navigation__responsive-container.is-menu-open",
        );
        const toggle = event.target.closest(
          ".wp-block-navigation__responsive-container .wp-block-navigation-submenu__toggle",
        );

        if (toggle) {
          event.preventDefault();
          event.stopPropagation();

          const parentOverlay = toggle.closest(
            ".wp-block-navigation__responsive-container",
          );
          const currentState =
            toggle.getAttribute("data-submenu-state") || "closed";
          const nextState = currentState === "closed" ? "open" : "closed";

          if (nextState === "open" && parentOverlay) {
            initializeClosedSubmenus(parentOverlay);
          }

          toggle.setAttribute("data-submenu-state", nextState);
          toggle.setAttribute(
            "aria-expanded",
            nextState === "open" ? "true" : "false",
          );
          return;
        }

        if (
          overlay &&
          !event.target.closest(".wp-block-navigation-item.has-child")
        ) {
          initializeClosedSubmenus(overlay);
        }
      },
      true,
    );
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
