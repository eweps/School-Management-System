import "choices.js/public/assets/styles/choices.css";
import Choices from "choices.js";

document.addEventListener("DOMContentLoaded", () => {
    const element = document.querySelector(".searchable");
    const choices = new Choices(element);
});
