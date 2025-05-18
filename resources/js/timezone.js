document.addEventListener('DOMContentLoaded', () => {
    const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    const timezoneField = document.getElementById('timezone');

    if(timezoneField !== null) {
        timezoneField.value = timezone;
    }
});