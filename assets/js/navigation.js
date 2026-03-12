/**
 * File navigation.js.
 * Handles toggling the navigation menu for small screens and enhanced search.
 */

// Mobile navigation
(function () {
  const siteNavigation = document.getElementById("site-navigation");

  if (!siteNavigation) {
    return;
  }

  const button = siteNavigation.getElementsByTagName("button")[0];

  if ("undefined" === typeof button) {
    return;
  }

  const menu = siteNavigation.getElementsByTagName("ul")[0];

  if ("undefined" === typeof menu) {
    button.style.display = "none";
    return;
  }

  if (!menu.classList.contains("nav-menu")) {
    menu.classList.add("nav-menu");
  }

  button.addEventListener("click", function () {
    siteNavigation.classList.toggle("toggled");
    button.setAttribute(
      "aria-expanded",
      button.getAttribute("aria-expanded") === "true" ? "false" : "true",
    );
  });

  // Close mobile menu when clicking outside
  document.addEventListener("click", function (event) {
    if (
      !siteNavigation.contains(event.target) &&
      siteNavigation.classList.contains("toggled")
    ) {
      siteNavigation.classList.remove("toggled");
      button.setAttribute("aria-expanded", "false");
    }
  });

  // Close mobile menu on Escape key
  document.addEventListener("keydown", function (event) {
    if (
      event.key === "Escape" &&
      siteNavigation.classList.contains("toggled")
    ) {
      siteNavigation.classList.remove("toggled");
      button.setAttribute("aria-expanded", "false");
    }
  });

  // Handle dropdown toggles on touch devices
  const submenuToggles = siteNavigation.querySelectorAll(
    ".menu-item-has-children > a",
  );
  submenuToggles.forEach((toggle) => {
    toggle.addEventListener("click", function (e) {
      if (window.innerWidth < 768) {
        const parent = this.parentElement;
        parent.classList.toggle("toggled");
        e.preventDefault();
      }
    });
  });
})();

// Enhanced Search Functionality
(function () {
  const searchToggle = document.querySelector(".search-toggle");
  const headerSearch = document.querySelector(".header-search");
  const searchClose = document.querySelector(".search-close");
  const searchField = document.querySelector(".search-field");
  const searchForm = document.querySelector(".header-search .search-form");
  const body = document.body;

  if (searchToggle && headerSearch) {
    // Open search
    searchToggle.addEventListener("click", function (e) {
      e.preventDefault();
      openSearch();
    });

    // Close search with close button
    if (searchClose) {
      searchClose.addEventListener("click", function (e) {
        e.preventDefault();
        closeSearch();
      });
    }

    // Close search with Escape key
    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape" && headerSearch.classList.contains("active")) {
        closeSearch();
      }
    });

    // Close search when clicking outside the search container
    headerSearch.addEventListener("click", function (e) {
      if (e.target === headerSearch) {
        closeSearch();
      }
    });

    // Keyboard shortcut: Cmd/Ctrl + K to open search
    document.addEventListener("keydown", function (e) {
      if ((e.ctrlKey || e.metaKey) && e.key === "k") {
        e.preventDefault();
        openSearch();
      }
    });

    // Focus trap for accessibility
    headerSearch.addEventListener("keydown", function (e) {
      if (e.key === "Tab") {
        const focusableElements = headerSearch.querySelectorAll(
          "button, input, [href]",
        );
        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];

        if (e.shiftKey && document.activeElement === firstElement) {
          e.preventDefault();
          lastElement.focus();
        } else if (!e.shiftKey && document.activeElement === lastElement) {
          e.preventDefault();
          firstElement.focus();
        }
      }
    });

    // Add loading state on form submit
    if (searchForm) {
      searchForm.addEventListener("submit", function () {
        headerSearch.classList.add("search-loading");
      });
    }
  }

  function openSearch() {
    headerSearch.classList.add("active");
    body.style.overflow = "hidden";

    setTimeout(() => {
      if (searchField) {
        searchField.focus();
      }
    }, 100);
  }

  function closeSearch() {
    headerSearch.classList.remove("active");
    headerSearch.classList.remove("search-loading");
    body.style.overflow = "";

    if (searchField) {
      searchField.value = "";
    }
  }
})();
