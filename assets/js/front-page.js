/**
 * Front page animations and interactions
 */
(function () {
  "use strict";

  // Animated counters
  const counters = document.querySelectorAll(".stat-number");

  if (counters.length > 0) {
    const animateCounter = (counter) => {
      const target = parseInt(counter.getAttribute("data-target"));
      const current = parseInt(counter.innerText);
      const increment = target / 50; // Smooth animation

      if (current < target) {
        counter.innerText = Math.ceil(current + increment);
        setTimeout(() => animateCounter(counter), 20);
      } else {
        counter.innerText = target;
      }
    };

    // Intersection Observer for counters
    const observerOptions = {
      threshold: 0.5,
      rootMargin: "0px",
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const counter = entry.target;
          counter.innerText = "0";
          animateCounter(counter);
          observer.unobserve(counter);
        }
      });
    }, observerOptions);

    counters.forEach((counter) => observer.observe(counter));
  }

  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });

  // Parallax effect for hero section
  const hero = document.querySelector(".hero-section");
  if (hero) {
    window.addEventListener("scroll", () => {
      const scrolled = window.pageYOffset;
      const rate = scrolled * 0.5;
      hero.style.backgroundPositionY = `${rate}px`;
    });
  }
})();
