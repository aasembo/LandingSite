// DataRatiba - Contact Form Validation JavaScript

// Client-side form validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.needs-validation');
    const workEmailField = document.querySelector('input[name="work_email"]');
    const personalEmailField = document.querySelector('input[name="email"]');
    
    // Custom validation for work email
    function validateWorkEmail() {
        const workEmail = workEmailField.value.trim();
        const personalEmail = personalEmailField.value.trim();
        
        if (workEmail && personalEmail && workEmail === personalEmail) {
            workEmailField.setCustomValidity('Work email must be different from personal email');
            return false;
        } else if (workEmail && !isValidEmail(workEmail)) {
            workEmailField.setCustomValidity('Please enter a valid email address');
            return false;
        } else {
            workEmailField.setCustomValidity('');
            return true;
        }
    }
    
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Validate on input change
    if (workEmailField && personalEmailField) {
        workEmailField.addEventListener('input', validateWorkEmail);
        personalEmailField.addEventListener('input', validateWorkEmail);
    }
    
    // Form submission validation
    if (form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity() || !validateWorkEmail()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    }
});