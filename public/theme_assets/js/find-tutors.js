(() => {
  "use strict";

  const searchForm = document.querySelector('form[name="search-tutors"]');

  searchForm.querySelectorAll("input").forEach((input) => {
    input.addEventListener("change", function () {
      this.form.submit();
    });
  });

  // INITIALIZE FILTER FIELDS ACCORDING TO QUERY PARAMETERS

  // Get query parameters from the URL
  const urlParams = new URLSearchParams(window.location.search);

  urlParams.forEach((filterValue, filterName) => {
    // Find the input element with the matching filter name and value
    const inputElement = searchForm.querySelector(`input[name="${filterName}"][value="${filterValue}"]`);

    if (!inputElement) return;

    // Uncheck all inputs with the filter name
    document.querySelectorAll(`input[name="${filterName}"]`).forEach((element) => (element.checked = false));

    // Check the selected input.
    inputElement.checked = true;

    // Get the associated label
    const associatedLabel = searchForm.querySelector(`label[for="${inputElement.id}"]`);

    if (!associatedLabel) return;

    // Get the associated button
    const button = searchForm.querySelector(`button[data-tm-target="${filterName}"]`);

    if (!button) return;

    const buttonText = button.querySelector("span");

    // Update the button with the text and optionally the image
    buttonText.innerText = (associatedLabel.getAttribute("data-tm-label") || associatedLabel.textContent).trim();

    const imageSrc = associatedLabel.querySelector("img")?.src;

    if (!imageSrc) return;

    const btnImg = button.querySelector("img");

    if (!btnImg) return;

    btnImg.src = imageSrc;
    btnImg.classList.remove("d-none");

    const btnIcon = button.querySelector("i");

    if (!btnIcon) return;

    btnIcon.classList.add("d-none");
  });
})();
