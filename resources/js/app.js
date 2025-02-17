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
// Giả sử currentTheme lấy từ localStorage, mặc định là "light"
const currentTheme = localStorage.getItem('theme');

if (currentTheme === 'dark') {
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = 'https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css';
    document.head.appendChild(link);
} else {
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css';
    document.head.appendChild(link);
}

flatpickr(".date-picker", {
    dateFormat: "d/m/Y",
    minDate: "today",
    locale: "vn",
    disableMobile: true
});

(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports) :
        typeof define === 'function' && define.amd ? define(['exports'], factory) :
            (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.vn = {}));
}(this, (function (exports) {
    'use strict';

    var fp = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Vietnamese = {
        weekdays: {
            shorthand: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
            longhand: [
                "Chủ nhật",
                "Thứ hai",
                "Thứ ba",
                "Thứ tư",
                "Thứ năm",
                "Thứ sáu",
                "Thứ bảy",
            ],
        },
        months: {
            shorthand: [
                "Th1",
                "Th2",
                "Th3",
                "Th4",
                "Th5",
                "Th6",
                "Th7",
                "Th8",
                "Th9",
                "Th10",
                "Th11",
                "Th12",
            ],
            longhand: [
                "Tháng một",
                "Tháng hai",
                "Tháng ba",
                "Tháng tư",
                "Tháng năm",
                "Tháng sáu",
                "Tháng bảy",
                "Tháng tám",
                "Tháng chín",
                "Tháng mười",
                "Tháng mười một",
                "Tháng mười hai",
            ],
        },
        firstDayOfWeek: 1,
        rangeSeparator: " đến ",
    };
    fp.l10ns.vn = Vietnamese;
    var vn = fp.l10ns;

    exports.Vietnamese = Vietnamese;
    exports.default = vn;

    Object.defineProperty(exports, '__esModule', { value: true });

})));