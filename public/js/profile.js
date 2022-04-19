const fileInput = document.getElementById('images[]');
const imageContainer = document.getElementById('image-label');

fileInput.onchange = () => {
    const file = fileInput.files[0];
    const img = document.createElement("img");

    fileURL = window.URL.createObjectURL(file);

    imageContainer.removeChild(imageContainer.children.item(0))
    imageContainer.style.backgroundImage = `url(${fileURL})`;
}