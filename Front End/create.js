// create.js
function displayImage(input) {
    var uploadedImage = document.getElementById('uploadedImage');
    uploadedImage.innerHTML = ''; // Clear previous content

    var img = document.createElement('img');
    img.src = 'default_image.jpg'; // Set the path to your default image
    img.style.width = '100%';
    img.style.height = 'auto';
    uploadedImage.appendChild(img);

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            img.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// Set a default blank image when the page loads
document.addEventListener('DOMContentLoaded', function() {
    displayImage({ files: [] });
});

function validateForm() {
    // Get form elements
    var firstName = document.getElementById('firstName').value;
    var lastName = document.getElementById('lastName').value;
    var email = document.getElementById('email').value;
    var photoInput = document.getElementById('photo');

    // Check if required fields are empty
    if (firstName.trim() === '' || lastName.trim() === '' || email.trim() === '') {
        alert('Please fill in all required fields.');
        return false; // Prevent form submission
    }

    // Check email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return false; // Prevent form submission
    }

    // Check if an image is uploaded
    if (photoInput.files.length === 0) {
        alert('Please upload an image.');
        return false; // Prevent form submission
    }

    // If all validations pass, allow form submission
    return true;
}