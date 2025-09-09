// main.js — interaktivitas ringan
document.addEventListener('DOMContentLoaded', function () {
  // mobile menu toggle
  const btnMobile = document.getElementById('btn-mobile');
  const mobileMenu = document.getElementById('mobile-menu');
  if (btnMobile) {
    btnMobile.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  }

  // filter katalog by category
  const filter = document.getElementById('filterCategory');
  if (filter) {
    filter.addEventListener('change', function () {
      const val = this.value;
      const cards = document.querySelectorAll('#productGrid .card-product');
      cards.forEach(c => {
        if (val === 'all' || c.dataset.category === val) c.style.display = '';
        else c.style.display = 'none';
      });
    });
  }

  // org modal
  const orgButtons = document.querySelectorAll('.btn-open-detail');
  const orgModal = document.getElementById('orgModal');
  const orgModalTitle = document.getElementById('orgModalTitle');
  const orgModalDesc = document.getElementById('orgModalDesc');
  const orgModalClose = document.getElementById('orgModalClose');

  orgButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      orgModalTitle.textContent = btn.dataset.name || 'Detail';
      orgModalDesc.textContent = btn.dataset.desc || '';
      orgModal.classList.add('show');
    });
  });

  if (orgModalClose) {
    orgModalClose.addEventListener('click', () => {
      orgModal.classList.remove('show');
    });
  }
  // close modal on backdrop click
  if (orgModal) {
    orgModal.addEventListener('click', (e) => {
      if (e.target === orgModal) orgModal.classList.remove('show');
    });
  }

  // simple subscribe/contact stub
  const contactForm = document.getElementById('contactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert('Terima kasih — pesan Anda telah terkirim (demo).');
      contactForm.reset();
    });
  }

  const subscribeForm = document.getElementById('subscribeForm');
  if (subscribeForm) {
    subscribeForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert('Terima kasih! Email Anda telah didaftarkan (demo).');
      subscribeForm.reset();
    });
  }
});
