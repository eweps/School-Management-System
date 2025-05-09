// Run js code after html has loaded
document.addEventListener('DOMContentLoaded', () => {

    // Selects the sidebar html element
    const sidebar = document.querySelector('#sidebar');

    // Selects the sidebar toggle button
    const sidebarToggle = document.querySelector('#sidebarToggle');

    // Select the content section
    const contentSection = document.querySelector('#content');

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


        // On click of the button toggle the sidebar

        sidebarToggle.addEventListener('click', function(){

            let sidebarState = sidebarToggle.getAttribute('data-sidebar-state');

            // If sidebar is open close it else open it
            if(sidebarState === 'open'){
                sidebar.classList.remove('w-60', 'px-5');
                sidebar.classList.add('w-0', 'px-0');
                sidebarToggle.setAttribute('data-sidebar-state', 'closed');
                contentSection.classList.remove('ml-60');
            }
            else {
                sidebar.classList.add('w-60', 'px-5');
                sidebar.classList.remove('w-0', 'px-0');
                sidebarToggle.setAttribute('data-sidebar-state', 'open');
                contentSection.classList.add('ml-60');
            }

        });

        

    }


});