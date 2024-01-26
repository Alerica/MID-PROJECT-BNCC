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