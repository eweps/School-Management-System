document.addEventListener('DOMContentLoaded',()=>{
	const sidebar = document.querySelector('#sidebar');
	if(sidebar!== null){
		const sidebarNav = sidebar.querySelector('#sidebar-nav');
		const navDropDownItems=sidebarNav.querySelectorAll('.nav-dropdown');
		
		navDropDownItems.forEach((dropdownItem) => {
			const toggleEl = dropdownItem.querySelector('a');
			const subNavItem = dropdownItem.querySelector('.dropdown');
			
			// check for the click event on the toggle Element
			toggleEl.addEventListener('click', (event) => {
				event.preventDefault();
				subNavItem.classList.toggle('hidden');
				dropdownItem.classList.toggle('selected');
			});
		});
		
		
	}
});