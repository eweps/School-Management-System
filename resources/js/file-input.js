document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.querySelectorAll("input[type='file']");

    if(fileInput.length !== 0) {

        fileInput.forEach(input => {
            const id = input.id;
            const fileName = document.querySelector(`label[for=${id}] > #fileName`);

            input.addEventListener('change', (event) => {
                const files = event.target.files; // FileList object
                if (files.length > 0) {
                    fileName.innerText = files[0].name;
                }          
            })
        });
    }
  
});