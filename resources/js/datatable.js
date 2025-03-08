import DataTable from 'datatables.net-dt'
const selectors=document.querySelectorAll('.dt-table');
import 'dataTables.net-dt/css/dataTables.dataTables.min.css';


//initialize datatable for all selectors
selectors.forEach(selector=>{
    const table = new DataTable(selector);
})