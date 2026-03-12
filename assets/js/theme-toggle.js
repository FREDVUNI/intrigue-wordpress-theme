/**
 * Theme toggle functionality for dark/light mode
 */
(function () {
  // Wait for DOM to be fully loaded
  document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("theme-toggle");

    // Return early if the toggle button doesn't exist
    if (!toggleButton) {
      return;
    }

    const body = document.body;

    // Check for saved theme preference or system preference
    const getCurrentTheme = () => {
      const savedTheme = localStorage.getItem("intrigueTheme");
      if (savedTheme) {
        return savedTheme;
      }

      // Check system preference
      if (
        window.matchMedia &&
        window.matchMedia("(prefers-color-scheme: dark)").matches
      ) {
        return "dark";
      }

      return "light";
    };

    // Apply theme based on preference
    const applyTheme = (theme) => {
      if (theme === "dark") {
        body.classList.add("theme-dark");
        toggleButton.setAttribute("aria-label", "Switch to light mode");
      } else {
        body.classList.remove("theme-dark");
        toggleButton.setAttribute("aria-label", "Switch to dark mode");
      }

      // Dispatch event for other scripts
      document.dispatchEvent(
        new CustomEvent("themeChanged", { detail: { theme } }),
      );
    };

    // Set initial theme
    const initialTheme = getCurrentTheme();
    applyTheme(initialTheme);

    // Toggle theme on button click
    toggleButton.addEventListener("click", function () {
      const isDark = body.classList.contains("theme-dark");
      const newTheme = isDark ? "light" : "dark";

      applyTheme(newTheme);
      localStorage.setItem("intrigueTheme", newTheme);
    });

    // Listen for system theme changes
    if (window.matchMedia) {
      const darkModeMediaQuery = window.matchMedia(
        "(prefers-color-scheme: dark)",
      );

      const handleSystemThemeChange = (e) => {
        // Only change if user hasn't manually set a preference
        if (!localStorage.getItem("intrigueTheme")) {
          const newTheme = e.matches ? "dark" : "light";
          applyTheme(newTheme);
        }
      };

      // Modern way to listen to media query changes
      if (darkModeMediaQuery.addEventListener) {
        darkModeMediaQuery.addEventListener("change", handleSystemThemeChange);
      } else if (darkModeMediaQuery.addListener) {
        // Fallback for older browsers
        darkModeMediaQuery.addListener(handleSystemThemeChange);
      }
    }
  });
})();
