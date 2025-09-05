document.addEventListener('DOMContentLoaded', () => {

    const letterHeadPreview = document.querySelector('#letterHeadPreview');
    const letterHeadFileInput = document.querySelector('#LETTER_HEAD');


    if(letterHeadFileInput !== null && letterHeadPreview !== null) {

        letterHeadFileInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    letterHeadPreview.src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

    }

});