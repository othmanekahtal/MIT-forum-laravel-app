let image = document.querySelector('.avatar-image');
let input = document.querySelector('.avatar-input');
input.addEventListener('change', function (e) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            image.setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
})
