document.addEventListener('DOMContentLoaded', function () {
  // Check if the $userData variable is defined
  if (typeof $userData !== 'undefined') {
      // Update HTML elements with fetched data
      document.getElementById('firstName').innerText = $userData.firstName;
      document.getElementById('lastName').innerText = $userData.lastName;
      document.getElementById('email').innerText = $userData.email;
      document.getElementById('bio').innerText = $userData.bio;
  }
});

async function fetchUserProfile() {
  try {
      const response = await fetch('fetch_user_profile.php');
      
      if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
      }

      const data = await response.json();

      // Update HTML elements with fetched data
      document.getElementById('firstName').innerText = data.firstName;
      document.getElementById('lastName').innerText = data.lastName;
      document.getElementById('email').innerText = data.email;
      document.getElementById('bio').innerText = data.bio;
  } catch (error) {
      console.error('Error fetching user profile:', error);
  }
}

// Call the fetchUserProfile function when the page loads
document.addEventListener('DOMContentLoaded', function () {
  fetchUserProfile();
});



function togglePasswordVisibility() {
  const passwordParagraph = document.getElementById('password');
  const eyeIcon = document.querySelector('.eye-icon');

  if (passwordParagraph.style.visibility !== 'hidden') {
    passwordParagraph.style.visibility = 'hidden';
    eyeIcon.textContent = '👁️';
  } else {
    passwordParagraph.style.visibility = 'visible';
    eyeIcon.textContent = '👁️';
  }
}

let editingField;

function editInfo(field) {
    const valueElement = document.getElementById(field);
    const editForm = document.getElementById('edit-form');
    const editInput = document.getElementById('editInput');

    editingField = field;

    // Set the current value to the input field
    editInput.value = valueElement.innerText;

    // Show the edit form
    editForm.style.display = 'block';
}

function saveEdit() {
    const editInput = document.getElementById('editInput');
    const valueElement = document.getElementById(editingField);

    // Update the value in the profile
    valueElement.innerText = editInput.value;

    // Hide the edit form
    document.getElementById('edit-form').style.display = 'none';
}

function cancelEdit() {
    // Hide the edit form
    document.getElementById('edit-form').style.display = 'none';
}