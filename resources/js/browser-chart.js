import ApexCharts from "apexcharts";

const options = {
    chart: {
        type: "pie",
        height: 400,
    },
    series: [45, 30, 15, 10], // % Usage: Chrome, Safari, Firefox, Edge
    labels: ["Chrome", "Safari", "Firefox", "Edge"],
    legend: {
        position: "bottom",
    },
};

const chart = new ApexCharts(document.querySelector("#browserChart"), options);
chart.render();
