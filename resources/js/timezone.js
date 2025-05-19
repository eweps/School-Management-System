document.addEventListener('DOMContentLoaded', function () {
    const timezoneInput = document.getElementById('timezone');
    if (timezoneInput) {
        timezoneInput.value = Intl.DateTimeFormat().resolvedOptions().timeZone;
    }
});