document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll(".animate-in");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const delay = entry.target.dataset.delay || 0;

          setTimeout(() => {
            entry.target.classList.add("visible");
          }, delay);

          observer.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.2,
    },
  );

  elements.forEach((el) => observer.observe(el));
});
