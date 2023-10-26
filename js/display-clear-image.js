const imageUpload = document.getElementById('imageUpload');
const imgPreview = document.getElementById('img');
const clearImage = document.getElementById('clearImage');

clearImage.addEventListener('click', () => {
    imgPreview.src = '../../images/placeholder.png';
    imageUpload.value = null; // Clear the file input
    imageUpload.classList.remove('is-valid');
    imageUpload.classList.remove('is-invalid');
    clearImage.classList.add('d-none'); // Hide the clear button again
});

imageUpload.addEventListener('change', (event) => {
    const file = event.target.files[0];

    // Check if a file was selected
    if (file) {
        const validExtensions = ['image/jpeg', 'image/png'];
        const maxSize = 0.5 * 1024 * 1024; // 0.5 MB in bytes

        // Check if the file type is valid
        if (validExtensions.includes(file.type)) {
            // Check if the file size is within the limit
            if (file.size <= maxSize) {
                // Display the selected image in the img element
                const reader = new FileReader();
                reader.onload = (e) => {
                    imgPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
                clearImage.classList.remove('d-none'); // Show the clear button
                // Reset the validation feedback
                imageUpload.setCustomValidity('');
                imageUpload.classList.add('is-valid');
                imageUpload.classList.remove('is-invalid');
            } else {
                // File size is too large
                imageUpload.value = null; // Clear the file input
                imgPreview.src = '../../images/placeholder.png';
                imageUpload.setCustomValidity('File size must be less than 0.5 MB');
                imageUpload.classList.remove('is-valid');
                imageUpload.classList.add('is-invalid');
            }
        } else {
            // Invalid file type
            imageUpload.value = null; // Clear the file input
            imgPreview.src = '../../images/placeholder.png';
            imageUpload.setCustomValidity('Only JPG and PNG images are allowed.');
            imageUpload.classList.remove('is-valid');
            imageUpload.classList.add('is-invalid');
        }
    } else {
        // No file selected
        imgPreview.src = '../../images/placeholder.png';
        imageUpload.setCustomValidity('');
        imageUpload.classList.remove('is-valid');
        imageUpload.classList.remove('is-invalid');
        clearImage.classList.add('d-none'); // Hide the clear button
    }
});