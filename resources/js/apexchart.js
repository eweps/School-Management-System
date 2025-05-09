import ApexCharts from "apexcharts";

const data = [
    { date: '2025-03-01', amount: 50000 },
    { date: '2025-03-02', amount: 30000 },
    { date: '2025-03-03', amount: 120000 },
    { date: '2025-03-04', amount: 45000 },
    { date: '2025-03-05', amount: 150000 },
    { date: '2025-03-06', amount: 70000 },
    { date: '2025-03-07', amount: 250000 },
    { date: '2025-03-08', amount: 20000 },
    { date: '2025-03-09', amount: 95000 },
    { date: '2025-03-10', amount: 40000 },
    { date: '2025-03-11', amount: 350000 },
    { date: '2025-03-12', amount: 25000 },
    { date: '2025-03-13', amount: 80000 },
    { date: '2025-03-14', amount: 60000 },
    { date: '2025-03-15', amount: 135000 },
    { date: '2025-03-16', amount: 90000 },
    { date: '2025-03-17', amount: 110000 },
    { date: '2025-03-18', amount: 120000 },
    { date: '2025-03-19', amount: 300000 },
    { date: '2025-03-20', amount: 150000 }
  ];

let amounts = [];
let dates = [];

data.forEach(item => {
    dates.push(item.date);
    amounts.push(item.amount);
});


const element = document.querySelector('#transactionChart');

let options = {

    chart: {
        type: 'area',
        width: '100%',
        height: 500,
        toolbar: {
            show: false
        }
    },

    markers: {
        size: 6
    },

    plotOptions:{
        bar: {
            horizontal: false,
            endingShape:'rounded'
        }
    },

    dataLabels: {
        enabled: false
    },

    colors: ['#fc712c'],

    series: [ {
        name: 'Transaction in FCFA',
        data: amounts
    }],

    xaxis: {
        categories: dates
    },

    yaxis: {
        title: {
            text: 'Amount FCFA'
        }
    },
};

if(element !== null) {
    let chart = new ApexCharts(element, options);
    chart.render();
}