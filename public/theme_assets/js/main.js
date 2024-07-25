function updateLabel(inputId, spanId) {
    var input = document.getElementById(inputId);
    var fileNameSpan = document.getElementById(spanId);
    if (input.files.length > 0) {
        fileNameSpan.textContent = input.files[0].name;
    } else {
        fileNameSpan.textContent = 'No file uploaded';
    }
}