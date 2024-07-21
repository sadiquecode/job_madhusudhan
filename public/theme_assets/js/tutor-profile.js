
// Move intro card on small screens
(() => {
  "use strict";

  /**
   * Moves given element to target element in the specified position
   * @param {Element | null} element - Element to move
   * @param {Element | null} target - Element to move into
   * @param {"after" | "before" | "in"} position - Position to append element - Defaults to "after"
   */
  function moveElement(element, target, position = "after") {
    if (!element || !target) return;

    switch (position) {
      case "after":
        target.after(element);
      break;
      case "before":
        target.before(element);
      break;
      case "in":
        target.append(element);
      break;
    }
  }

  // Gets all elements to move and moves them.
  document.querySelectorAll('[data-tm-toggle="move"]').forEach((element) => {
    const targetContainerId = element.getAttribute("data-tm-target") || "";
    if (targetContainerId.trim().length === 0) return;

    const targetContainer = document.querySelector(targetContainerId);
    if (!targetContainer) return;

    const originalContainerId = element.getAttribute("data-tm-origin") || "";
    if (originalContainerId.trim().length === 0) return;

    const originalContainer = document.querySelector(originalContainerId);
    if (!originalContainer) return;

    const mediaQuery = element.getAttribute("data-tm-media") || "";
    if (mediaQuery.trim().length === 0) return;

    if (window.matchMedia(`(${mediaQuery})`).matches) {
      moveElement(element, targetContainer);
    }

    window.addEventListener("resize", function() {
      if (window.matchMedia(`(${mediaQuery})`).matches) {
        moveElement(element, targetContainer);
      } else {
        moveElement(element, originalContainer, "in");
      }
    })
  });
})();
