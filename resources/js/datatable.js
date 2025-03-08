import DataTable from 'datatables.net-dt'
import 'datatables.net-dt/css/dataTables.dataTables.min.css';


const selectors = document.querySelectorAll('.dt-table');

// Initialize datatable for all selectors
selectors.forEach(selector => {
    const table = new DataTable(selector);
})
