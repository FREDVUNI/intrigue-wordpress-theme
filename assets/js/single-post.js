/**
 * Generate table of contents from headings
 */
document.addEventListener("DOMContentLoaded", function () {
  const content = document.querySelector(".entry-content");
  const toc = document.querySelector(".toc"); 

  if (content && toc) {
    const headings = content.querySelectorAll("h2, h3");

    if (headings.length > 0) {
      const tocList = document.createElement("ul");

      headings.forEach((heading, index) => {
        // Add ID to heading if not present
        if (!heading.id) {
          heading.id = "section-" + index;
        } 

        const listItem = document.createElement("li");
        const link = document.createElement("a");
        link.href = "#" + heading.id;
        link.textContent = heading.textContent;

        if (heading.tagName === "H3") {
          listItem.style.paddingLeft = "20px";
        }

        listItem.appendChild(link);
        tocList.appendChild(listItem);
      });

      toc.appendChild(tocList);
    } else {
      toc.parentElement.style.display = "none";
    }
  }
});
