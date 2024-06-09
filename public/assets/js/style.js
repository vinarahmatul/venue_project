// JavaScript untuk mengaktifkan border-bottom saat nav-item aktif
$(document).ready(function() {
    $('.nav-item .nav-link').on('click', function() {
        $('.nav-item').removeClass('active');
        $(this).parent().addClass('active');
    });
});

// JavaScript untuk menghilangkan border-bottom saat di-scroll
window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar');
    if (window.scrollY > 0) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// JavaScript untuk menampilkan tombol "up" saat navbar tidak terlihat
window.addEventListener('scroll', function() {
    var btnUp = document.getElementById('btn-up');
    if (window.scrollY > 0) {
        btnUp.classList.add('show');
    } else {
        btnUp.classList.remove('show');
    }
});

// Fungsi untuk menggulir ke atas
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Setting sidebar admin
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});

// Setting overlay desc
document.addEventListener('DOMContentLoaded', function() {
    const descriptions = document.querySelectorAll('.description');
    const overlay = document.getElementById('descriptionOverlay');
    const overlayContent = document.getElementById('overlayContent');
    const overlayClose = document.getElementById('overlayClose');

    // Ensure overlay is hidden on page load
    overlay.style.display = 'none';
    document.body.style.overflow = 'auto';

    descriptions.forEach(description => {
        description.addEventListener('click', function() {
            const fullDescription = description.dataset.fullDescription;
            const imageUrl = description.parentElement.querySelector('img').src;
            const packageName = description.parentElement.querySelector('td:nth-child(2)').innerText;
            overlayContent.innerHTML = `<h2>${packageName}</h2><img src="${imageUrl}" alt="Gambar Paket"><p>${fullDescription}</p>`;
            overlay.style.display = 'flex';
            document.body.style.overflow = 'hidden'; 
        });
    });

    overlayClose.addEventListener('click', function() {
        overlay.style.display = 'none';
        document.body.style.overflow = 'auto'; 
    });

    overlay.addEventListener('click', function(event) {
        if (event.target === overlay) {
            overlay.style.display = 'none';
            document.body.style.overflow = 'auto'; 
        }
    });

    var alertBox = document.getElementById('alertBox');
        var alertContainer = document.getElementById('alertContainer');

        // Munculkan alert
        alertContainer.style.opacity = '1';
        alertContainer.style.transition = 'opacity 0.5s ease-in-out';

        // Hilangkan alert setelah 5 detik
        setTimeout(function() {
            alertContainer.style.opacity = '0';
            setTimeout(function() {
                alertContainer.remove();
            }, 500); 
        }, 5000); 
});