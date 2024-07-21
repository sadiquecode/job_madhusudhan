import "./dist/bootstrap.bundle.min.js";

(() => {
  "use strict";

  // Disable empty links
  document.querySelectorAll('[href="#"]').forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
    });
  });

  // Enable tooltips
  document
    .querySelectorAll('[data-bs-toggle="tooltip"]')
    .forEach((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl));
})();
