// Menangani scroll ke bagian tertentu saat menu dinavigasi diklik
document.querySelectorAll('.navbar-nav a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        targetElement.scrollIntoView({ behavior: 'smooth' });
    });
});

// Menangani klik tombol "Masukkan Keranjang"
const keranjangButtons = document.querySelectorAll('.btn-keranjang');

keranjangButtons.forEach(button => {
    button.addEventListener('click', function() {
        alert('Produk telah dimasukkan ke keranjang!');
    });
});

// Menangani klik tombol "Beli"
const beliButtons = document.querySelectorAll('.btn-primary');

beliButtons.forEach(button => {
    button.addEventListener('click', function() {
        alert('Terima kasih telah melakukan pembelian!');
    });
});

// Menangani pengalihan ke WhatsApp
const whatsappButton = document.querySelector('a[href*="wa.me"]');
whatsappButton.addEventListener('click', function() {
    alert('Anda akan diarahkan ke WhatsApp untuk melakukan pemesanan.');
});

// Menangani pengalihan ke media sosial
const socialMediaButtons = document.querySelectorAll('.btn-outline-primary, .btn-outline-danger, .btn-outline-info, .btn-outline-secondary');

socialMediaButtons.forEach(button => {
    button.addEventListener('click', function() {
        alert('Anda akan diarahkan ke media sosial.');
    });
});

