document.addEventListener('DOMContentLoaded', () => {
    const themeSelect = document.getElementById('theme');

    if(themeSelect !== null) {

        themeSelect.addEventListener('change', (e) => {
            const selected = e.target.value;
    
            if (selected === 'light') {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else if (selected === 'dark') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                // System preference
                localStorage.removeItem('theme');
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            }
        });
    
        // Load theme on page load
        const savedTheme = localStorage.getItem('theme');
        
        if (savedTheme === 'dark') {
            document.documentElement.classList.add('dark');
            themeSelect.value = 'dark';
        } else if (savedTheme === 'light') {
            document.documentElement.classList.remove('dark');
            themeSelect.value = 'light';
        } else {
            // System default
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.add('dark');
            }
            themeSelect.value = 'system';
        }

    }

});