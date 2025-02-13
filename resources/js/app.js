import 'preline'
document.addEventListener('livewire:update', () => {
    const dropdownTriggers = document.querySelectorAll('[data-dropdown-toggle]');
    dropdownTriggers.forEach(trigger => new Dropdown(trigger));
});
if (localStorage.getItem('theme') === 'dark') {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}
window.addEventListener('livewire:navigated', function () {
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
});

window.addEventListener('load', function () {
    setTimeout(() => {
        const loader = document.getElementById("global-loading");
        if (loader) {
            loader.style.display = "none";
        }
    }, 500);
});

window.addEventListener('livewire:navigated', () => {
    setTimeout(() => {
        const loader = document.getElementById("global-loading");
        if (loader) {
            loader.style.display = "none";
        }
    }, 500);
});
