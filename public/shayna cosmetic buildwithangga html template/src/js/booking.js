document.querySelectorAll('input[type="tel"]').forEach((input) => {
    input.addEventListener("input", function (e) {
        this.value = this.value.replace(/[^0-9+]/g, "");
    });
});
