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
    
    grid: {
        show: false,
    },

    series: [45, 30, 15, 10], // % Usage: Chrome, Safari, Firefox, Edge
    labels: ["Chrome", "Safari", "Firefox", "Edge"],
    legend: {
        position: "bottom",
        labels: {
            colors: undefined,
            useSeriesColors: true
        },
    },
    
    dataLabels: {
        style: {
            fontSize: '14px',
            fontFamily: 'Helvetica, Arial, sans-serif',
            fontWeight: 'bold',
            colors: undefined
        },
        background: {
            enabled: true,
            foreColor: '#fff',
            padding: 4,
            borderRadius: 2,
            borderWidth: 1,
            borderColor: '#fff',
            opacity: 0.9,
            dropShadow: {
            enabled: false,
            top: 1,
            left: 1,
            blur: 1,
            color: '#000',
            opacity: 0.45
            }
        },
    }

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

