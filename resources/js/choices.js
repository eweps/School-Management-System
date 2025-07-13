import "choices.js/public/assets/styles/choices.css";
import Choices from "choices.js";

document.addEventListener("DOMContentLoaded", () => {
    const element = document.querySelector(".searchable");
    if(element !== null) {
        const choices = new Choices(element);
    }
});
