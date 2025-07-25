import ClipboardJS from "clipboard";

const clipboard = new ClipboardJS('.clipBtn');

clipboard.on('success', function(e) {
    if(e.action == 'copy') {
        changeBtnIcon(e.trigger);
    }

    e.clearSelection();
});


function changeBtnIcon(btn) {
    const originalContent = btn.innerHTML;

    btn.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg mx-auto" viewBox="0 0 16 16">
        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
        </svg>
    `;

    setTimeout(() => {
        btn.innerHTML = originalContent;
    }, 5000);
}