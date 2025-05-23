document.addEventListener('DOMContentLoaded', function () {
    const addRoomBtn = document.getElementById('add-room-btn');
    const createRoomModal = document.getElementById('create-room-modal');
    const closeRoomModalBtn = document.getElementById('close-room-modal');
    const cancelRoomBtn = document.getElementById('cancel-room-btn');
    const createRoomForm = document.getElementById('create-room-form');
    const isAvailableToggle = document.getElementById('is_available');
    const toggleDot = createRoomModal.querySelector('.toggle-dot');
    const toggleBg = createRoomModal.querySelector('.toggle-bg');
    const body = document.body; // Get the body element

    // Optionally remove these if they are not in the DOM
    const formErrorMessage = document.getElementById('form-error-message');
    const formSuccessMessage = document.getElementById('form-success-message');

    // Function to open the modal
    function openModal() {
        createRoomModal.classList.remove('hidden');
        createRoomModal.classList.add('flex'); // Ensure flex for centering
        body.classList.add('blur-background'); // Add blur class to body
        // Reset form on open
        createRoomForm.reset();
        isAvailableToggle.checked = true; // Ensure available is checked by default
        updateToggleStyle(); // Update toggle visual
        hideMessages(); // Hide any previous messages
    }

    // Function to close the modal
    function closeModal() {
        createRoomModal.classList.add('hidden');
        createRoomModal.classList.remove('flex');
        body.classList.remove('blur-background'); // Remove blur class from body
    }

    // Function to update toggle switch visual
    function updateToggleStyle() {
        if (isAvailableToggle.checked) {
            toggleDot.classList.add('translate-x-5');
            toggleDot.classList.remove('translate-x-1');
            toggleBg.classList.add('bg-blue-500');
            toggleBg.classList.remove('bg-gray-200');
        } else {
            toggleDot.classList.remove('translate-x-5');
            toggleDot.classList.add('translate-x-1');
            toggleBg.classList.remove('bg-blue-500');
            toggleBg.classList.add('bg-gray-200');
        }
        if (isAvailableToggle.value == 1) {
            isAvailableToggle.value = 0;
        } else {
            isAvailableToggle.value = 1;
        }
    }

    // Function to show error message
    function showErrorMessage(message) {
        if (formErrorMessage) {
            formErrorMessage.classList.remove('hidden');
            formErrorMessage.textContent = message; // Or you can add error text content
        }
        if (formSuccessMessage) {
            formSuccessMessage.classList.add('hidden');
        }
    }

    // Function to show success message
    function showSuccessMessage(message) {
        if (formSuccessMessage) {
            formSuccessMessage.classList.remove('hidden');
            formSuccessMessage.textContent = message; // Or success text content
        }
        if (formErrorMessage) {
            formErrorMessage.classList.add('hidden');
        }
    }

    // Function to hide all messages
    function hideMessages() {
        if (formErrorMessage) {
            formErrorMessage.classList.add('hidden');
        }
        if (formSuccessMessage) {
            formSuccessMessage.classList.add('hidden');
        }
    }

    // Event Listeners
    if (addRoomBtn) {
        addRoomBtn.addEventListener('click', openModal);
    }

    if (closeRoomModalBtn) {
        closeRoomModalBtn.addEventListener('click', closeModal);
    }

    if (cancelRoomBtn) {
        cancelRoomBtn.addEventListener('click', closeModal);
    }

    // Close modal when clicking outside (on the overlay)
    if (createRoomModal) {
        createRoomModal.addEventListener('click', function (e) {
            if (e.target === createRoomModal) {
                closeModal();
            }
        });
    }

    // Toggle switch functionality
    if (isAvailableToggle) {
        isAvailableToggle.addEventListener('change', updateToggleStyle);
        // Initial style update
        updateToggleStyle();


    }
});


// UPDATE SELECTION 
