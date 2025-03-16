const menuToggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('.nav');

menuToggle.addEventListener('click', () => {
    nav.classList.toggle('active');
    menuToggle.classList.toggle('active'); // ເພີ່ມ class active ໃຫ້กับ menu-toggle
});

const languageButton = document.querySelector('.language-button');
let currentLang = localStorage.getItem('lang') || 'la'; // ໂຫຼດພາສາຈາກ localStorage ຫຼືຕັ້ງເປັນລາວ

// ຕັ້ງເນື້ອຫາຂອງປຸ່ມຕາມພາສາທີ່ເລືອກ
if (currentLang === 'en') {
    languageButton.innerHTML = '<img src="../th/images/english.png" alt="ພາສາອັງກິດ" class="flag-icon"><span class="language-text">English</span>';
    languageButton.dataset.lang = 'en';
} else {
    languageButton.innerHTML = '<img src="../th/images/lao.png" alt="ພາສາລາວ" class="flag-icon"><span class="language-text">ລາວ</span>';
    languageButton.dataset.lang = 'la';
}

languageButton.addEventListener('click', function() {
    if (currentLang === 'la') {
        window.location.href = 'lao.html'; // ລິ້ງໄປຫາໜ້າພາສາອັງກິດ
        localStorage.setItem('lang', 'en'); // ເກັບພາສາໃນ localStorage
    } else {
        window.location.href = 'index.html'; // ລິ້ງໄປຫາໜ້າພາສາລາວ
        localStorage.setItem('lang', 'la'); // ເກັບພາສາໃນ localStorage
    }
});
