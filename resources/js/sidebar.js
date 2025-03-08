// Run js code after html has loaded
document.addEventListener('DOMContentLoaded', () => {

    // Selects the sidebar html element
    const sidebar = document.querySelector('#sidebar');

    // Check if sidebar element exists
    if(sidebar !== null) {

        const sidebarNav = sidebar.querySelector('#sidebar-nav');
        const navDropDownItems = sidebarNav.querySelectorAll('.nav-dropdown');
        
        
        navDropDownItems.forEach((dropdownItem) => {

            const toggleEl = dropdownItem.querySelector('a');
            const subNavItem = dropdownItem.querySelector('.dropdown');

            // Check for the click event on the toggle element
            toggleEl.addEventListener('click', (event) => {
                event.preventDefault();
                subNavItem.classList.toggle('hidden');
                dropdownItem.classList.toggle('selected');
            });

        });

        

    }


});