
// Initialize show hide password buttons
(() => {
  "use strict";

  /**
   * Sets `eye` or `eye slash` icon for given element
   * @param {Element | null} element The element to switch bootstrap eye icon
   * @param {boolean} toEye Set `eye` icon if true otherwise set `eye slash` icon. Defaults to true if unspecified
   */
  function setEyeIcon(element, toEye = true) {
    if (!element) return;

    element.classList.remove("fa-eye", "fa-eye-slash");
    element.classList.add(toEye ? "fa-eye" : "fa-eye-slash");
  }

  document.querySelectorAll('[data-tm-toggle="password"]').forEach((button) => {
    const targetFieldId = button.getAttribute("data-tm-target") || "";
    if (targetFieldId.trim().length === 0) return;

    const fieldToToggle = document.querySelector(targetFieldId);
    if (!fieldToToggle) return;

    const iconField = button.querySelector("i");
    const textField = button.querySelector("span");

    button.addEventListener("click", function () {
      const type = fieldToToggle.getAttribute("type");

      if (type === "text") {
        fieldToToggle.setAttribute("type", "password");
        textField.innerText = "Show";
        setEyeIcon(iconField);
      } else if (type === "password") {
        fieldToToggle.setAttribute("type", "text");
        textField.textContent = "Hide";
        setEyeIcon(iconField, false);
      }
    });
  });
})();
