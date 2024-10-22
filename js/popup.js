document.addEventListener('DOMContentLoaded', function () {
    const triggerDiv = document.getElementById('triggerDiv');
    const popupMenu = document.getElementById('popupMenu');

    function showMenu() {
        const rect = triggerDiv.getBoundingClientRect();
        popupMenu.style.top = `${rect.bottom}px`;
        popupMenu.style.left = `${rect.left}px`;
        popupMenu.classList.remove('hidden');
        setTimeout(() => {
            popupMenu.classList.remove('opacity-0');
            popupMenu.classList.add('opacity-100');
        }, 10);
    }

    function hideMenu() {
        popupMenu.classList.remove('opacity-100');
        popupMenu.classList.add('opacity-0');
        setTimeout(() => {
            popupMenu.classList.add('hidden');
        }, 300);
    }

    triggerDiv.addEventListener('click', function () {
        if (popupMenu.classList.contains('hidden')) {
            showMenu();
        } else {
            hideMenu();
        }
    });

    document.addEventListener('click', function (e) {
        if (!popupMenu.contains(e.target) && !triggerDiv.contains(e.target)) {
            hideMenu();
        }
    });
});

