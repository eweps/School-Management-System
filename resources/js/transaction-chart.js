import ApexCharts from "apexcharts";

const data = [
    { date: "2025-03-01", amount: 50000 },
    { date: "2025-03-02", amount: 30000 },
    { date: "2025-03-03", amount: 120000 },
    { date: "2025-03-04", amount: 45000 },
    { date: "2025-03-05", amount: 150000 },
    { date: "2025-03-06", amount: 70000 },
    { date: "2025-03-07", amount: 250000 },
    { date: "2025-03-08", amount: 20000 },
    { date: "2025-03-09", amount: 95000 },
    { date: "2025-03-10", amount: 40000 },
    { date: "2025-03-11", amount: 350000 },
    { date: "2025-03-12", amount: 25000 },
    { date: "2025-03-13", amount: 80000 },
    { date: "2025-03-14", amount: 60000 },
    { date: "2025-03-15", amount: 135000 },
    { date: "2025-03-16", amount: 90000 },
    { date: "2025-03-17", amount: 110000 },
    { date: "2025-03-18", amount: 120000 },
    { date: "2025-03-19", amount: 300000 },
    { date: "2025-03-20", amount: 150000 },
];

const amounts = data.map(item => item.amount);
const dates = data.map(item => item.date);

const getEffectiveTheme = () => {
    const local = localStorage.getItem("theme");
    if (local) return local;
    return window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
};

const element = document.querySelector("#transactionChart");
let chart;

const isDark = getEffectiveTheme() === "dark";

const options = {
    chart: {
        type: "area",
        width: "100%",
        height: 400,
        toolbar: { show: false },
        background: isDark ? "#1f2937" : "#ffffff",
    },

    grid: {
        show: false,
    },
    markers: { size: 6 },
    dataLabels: { enabled: false },
    colors: ["#fc712c"],
    series: [
        {
            name: "Transaction in FCFA",
            data: amounts,
        },
    ],
    xaxis: {
        categories: dates,
        labels: {
            formatter: function (value) {
                const dateObj = new Date(value);
                const dateValue = dateObj.getDate();
                if ([1, 21, 31].includes(dateValue)) return `${dateValue}st`;
                if ([2, 22].includes(dateValue)) return `${dateValue}nd`;
                if ([3, 23].includes(dateValue)) return `${dateValue}rd`;
                return `${dateValue}th`;
            },
        },
    },
    yaxis: {
        title: { text: "Amount FCFA" },
    },
    theme: {
        mode: getEffectiveTheme(),
    },
};

if (element) {
    chart = new ApexCharts(element, options);
    chart.render();
}

// 🌙 Listen for system theme changes (only if no user override)
window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", (e) => {
    const userTheme = localStorage.getItem("theme");
    if (!userTheme && chart) {
        chart.updateOptions({
            theme: { mode: e.matches ? "dark" : "light" },
        });
    }
});

// // 🖱 Manual theme toggle example
// document.querySelector("#theme")?.addEventListener("click", () => {
//     const current = localStorage.getItem("theme") || getEffectiveTheme();
//     const newTheme = current === "dark" ? "light" : "dark";
//     localStorage.setItem("theme", newTheme);
//     if (chart) {
//         chart.updateOptions({ theme: { mode: newTheme } });
//     }
// });
