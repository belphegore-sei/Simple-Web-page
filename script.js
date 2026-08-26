// Mobile nav toggle
const navToggle = document.getElementById('navToggle');
const topbarNav = document.getElementById('topbarNav');

navToggle.addEventListener('click', () => {
  const isOpen = topbarNav.classList.toggle('is-open');
  navToggle.setAttribute('aria-expanded', String(isOpen));
});

// Close mobile nav after choosing a link
topbarNav.querySelectorAll('a').forEach((link) => {
  link.addEventListener('click', () => {
    topbarNav.classList.remove('is-open');
    navToggle.setAttribute('aria-expanded', 'false');
  });
});

// Persona flip card
const card = document.getElementById('personaCard');

function toggleCard() {
  const flipped = card.classList.toggle('is-flipped');
  card.setAttribute('aria-pressed', String(flipped));
}

card.addEventListener('click', toggleCard);
card.addEventListener('keydown', (e) => {
  if (e.key === 'Enter' || e.key === ' ') {
    e.preventDefault();
    toggleCard();
  }
});

// Lightweight client-side hint before PHP validates on submit
const form = document.querySelector('.form');
if (form) {
  form.addEventListener('submit', (e) => {
    const required = form.querySelectorAll('[required]');
    let hasEmpty = false;
    required.forEach((field) => {
      if (!field.value.trim()) hasEmpty = true;
    });
    if (hasEmpty) {
      // Let native browser validation handle the UX; PHP re-checks on the server regardless.
      return;
    }
  });
}
