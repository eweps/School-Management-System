import ApexCharts from "apexcharts";

const getEffectiveTheme = () => {
    const local = localStorage.getItem("theme");
    if (local) return local;
    return window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
};

const isDark = getEffectiveTheme() === "dark";

let chart;
const options = {
    chart: {
        type: "pie",
        height: 400,
        background: isDark ? "#1f2937" : "#ffffff",
    },
    series: [45, 30, 15, 10], // % Usage: Chrome, Safari, Firefox, Edge
    labels: ["Chrome", "Safari", "Firefox", "Edge"],
    legend: {
        position: "bottom",
    },
};

chart = new ApexCharts(document.querySelector("#browserChart"), options);
chart.render();


window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", (e) => {
    const userTheme = localStorage.getItem("theme");
    if (!userTheme && chart) {
        chart.updateOptions({
            theme: { mode: e.matches ? "dark" : "light" },
        });
    }
});
