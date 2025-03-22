document.addEventListener("DOMContentLoaded", () => {
    // select the sidebar html
    const sidebar = document.querySelector("#sidebar");

    //select the sidebar toggle button
    const sidebarToggle = document.querySelector("#sidebarToggle");

	// select the content selection
	const contentSection = document.querySelector('#content');

    // check if sidebar element exist
    if (sidebar !== null) {
        const sidebarNav = sidebar.querySelector("#sidebar-nav");
        const navDropDownItems = sidebarNav.querySelectorAll(".nav-dropdown");

        navDropDownItems.forEach((dropdownItem) => {
            const toggleEl = dropdownItem.querySelector("a");
            const subNavItem = dropdownItem.querySelector(".dropdown");

            // check for the click event on the toggle Element
            toggleEl.addEventListener("click", (event) => {
                event.preventDefault();
                subNavItem.classList.toggle("hidden");
                dropdownItem.classList.toggle("selected");
            });
        });

        // on click of he button toggle the sidebar
        sidebarToggle.addEventListener("click", function () {
            let sidebarState = sidebarToggle.getAttribute("data-sidebar-state");
            if (sidebarState === "open") {
                sidebar.classList.remove("w-72", "px-5");
                sidebar.classList.add("w-0", "px-0");
                sidebarToggle.setAttribute("data-sidebar-state", "closed");
				contentSection.classList.remove('ml-72');
            } else {
                sidebar.classList.add("w-72", "px-5");
                sidebar.classList.remove("w-0", "px-0");
                sidebarToggle.setAttribute("data-sidebar-state", "open");
				contentSection.classList.add('ml-72');
            }
        });
    }
});
