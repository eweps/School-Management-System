import DataTable from "datatables.net-dt";
import "datatables.net-dt/css/dataTables.dataTables.min.css";
import Swal from "sweetalert2";
import { Modal } from "flowbite";

const tables = document.querySelectorAll(".dt-table");

tables.forEach((tableEl) => {
    // Initialize the DataTable
    const table = new DataTable(tableEl, {
        columnDefs: [{ targets: 0, orderable: false }],
    });

    //Delegate submit events for delete forms inside the table
    tableEl.addEventListener("submit", function (e) {
        const form = e.target.closest(".delete-form");

        if (!form) return;

        e.preventDefault();

        Swal.fire({
            title: "Are you sure?",
            text: "This action cannot be undone.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#dc2626",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
    

    table.on("draw", function () {
        const modalTriggers = document.querySelectorAll("[data-modal-toggle]");

        modalTriggers.forEach((trigger) => {
            const targetId = trigger.getAttribute("data-modal-target");
            const modalEl = document.getElementById(targetId);

            if (!trigger.dataset.initialized) {
                 const modal = new Modal(modalEl, { closable: true });

                trigger.addEventListener("click", (e) => {
                    if (modal.isHidden()) {
                        modal.show();
                    }
                });

                 // Find and attach listeners to all close buttons
                const closeButtons = modalEl.querySelectorAll('[data-modal-hide]');

                closeButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        modal.hide();
                    });
                });


                trigger.dataset.initialized = "true"; // Prevent rebinding
            }

           
        });
    });
});
