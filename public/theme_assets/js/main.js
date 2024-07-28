function updateLabel(inputId, spanId) {
    var input = document.getElementById(inputId);
    var fileNameSpan = document.getElementById(spanId);
    if (input.files.length > 0) {
        fileNameSpan.textContent = input.files[0].name;
    } else {
        fileNameSpan.textContent = 'No file uploaded';
    }
}

// JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity() || !validateForm()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})();


function toggleAcademic(enable) {
    var academicRadios = document.querySelectorAll('input[name="category"][id^="academic_"]');
    academicRadios.forEach(function(radio) {
        radio.disabled = !enable;
    });
}

function toggleNonAcademic(enable) {
    var nonAcademicRadios = document.querySelectorAll('input[name="category"][id^="non_academic_"]');
    nonAcademicRadios.forEach(function(radio) {
        radio.disabled = !enable;
    });
}


function validateForm_() {
    const checkboxes = [
        document.querySelectorAll('input[name="academic[]"]'),
        // document.querySelectorAll('input[name="non_academic[]"]'),
        document.querySelectorAll('input[name="speciality[]"]'),
        document.querySelectorAll('input[name="expertise[]"]'),
        document.querySelectorAll('input[name="subjects[]"]')
    ];

    for (const checkboxGroup of checkboxes) {
        let checkedCount = 0;
        for (const checkbox of checkboxGroup) {
            if (checkbox.checked) {
                checkedCount++;
            }
        }
        if (checkedCount !== 1) {
            alert('Please select exactly one option in each category.');
            return false;
        }
    }

    return true;
}
