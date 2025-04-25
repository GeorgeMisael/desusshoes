// Upload Image
const fileInput = document.getElementById("file-upload");
const uploadText = document.getElementById("upload");
fileInput.addEventListener("change", function () {
    if (fileInput.files.length > 0) {
        uploadText.classList.add("hidden");
        fileInput.classList.remove("opacity-0");
        fileInput.setAttribute("value", fileInput.files[0].name);
    } else {
        resetUpload();
    }
});
function resetUpload() {
    uploadText.classList.remove("hidden");
    fileInput.classList.add("opacity-0");
    fileInput.setAttribute("value", "");
}
fileInput.addEventListener("input", function () {
    if (!fileInput.files.length) resetUpload();
});
