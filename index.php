<?php
// ---------- Persona data (edit this to make the site yours) ----------
$persona = [
    'name'    => 'Alex Rivera',
    'title'   => 'Product Designer & Illustrator',
    'blurb'   => 'I design interfaces that feel like they were drawn by hand, then made to work at scale.',
    'email'   => 'hello@alexrivera.design',
    'social'  => [
        ['label' => 'Work',      'handle' => '@alexrivera',  'url' => '#'],
        ['label' => 'Sketches',  'handle' => '@alex.draws',  'url' => '#'],
        ['label' => 'Code',      'handle' => 'github.com/arivera', 'url' => '#'],
    ],
];

$skills = [
    ['no' => '01', 'name' => 'Interface Design',  'note' => 'Systems, components, flows'],
    ['no' => '02', 'name' => 'Illustration',       'note' => 'Editorial and product'],
    ['no' => '03', 'name' => 'Prototyping',        'note' => 'From sketch to click-through'],
    ['no' => '04', 'name' => 'Front-end Build',    'note' => 'HTML, CSS, light JS'],
];

$work = [
    ['title' => 'Ledger',    'year' => '2025', 'tag' => 'Fintech app redesign'],
    ['title' => 'Northwind', 'year' => '2024', 'tag' => 'Travel booking system'],
    ['title' => 'Plainware', 'year' => '2024', 'tag' => 'Design system & icon set'],
    ['title' => 'Cairn',     'year' => '2023', 'tag' => 'Editorial illustration series'],
];

// ---------- Time-aware greeting (server-side, real PHP logic) ----------
date_default_timezone_set('Asia/Manila');
$hour = (int) date('G');
if ($hour < 5)       { $greeting = 'Still up'; }
elseif ($hour < 12)  { $greeting = 'Good morning'; }
elseif ($hour < 17)  { $greeting = 'Good afternoon'; }
elseif ($hour < 21)  { $greeting = 'Good evening'; }
else                 { $greeting = 'Working late'; }

// ---------- Contact form handling ----------
$formStatus  = null; // 'success' | 'error' | null
$formErrors  = [];
$old         = ['name' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
    $old['name']    = trim($_POST['name'] ?? '');
    $old['email']   = trim($_POST['email'] ?? '');
    $old['message'] = trim($_POST['message'] ?? '');

    if ($old['name'] === '') {
        $formErrors[] = 'Add your name so I know who is writing.';
    }
    if ($old['email'] === '' || !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $formErrors[] = 'Add a valid email so I can reply.';
    }
    if ($old['message'] === '') {
        $formErrors[] = 'Say a little about what you need.';
    }
    // Basic spam trap: honeypot field must stay empty
    if (!empty($_POST['website'] ?? '')) {
        $formErrors[] = 'Submission blocked.';
    }

    if (empty($formErrors)) {
        // In production, send mail or store in a database here.
        // For this demo we log to a local file so it works with zero setup.
        $entry = sprintf(
            "[%s] %s <%s>\n%s\n---\n",
            date('Y-m-d H:i:s'),
            $old['name'],
            $old['email'],
            $old['message']
        );
        @file_put_contents(__DIR__ . '/messages.log', $entry, FILE_APPEND | LOCK_EX);

        $formStatus = 'success';
        $old = ['name' => '', 'email' => '', 'message' => '']; // clear on success
    } else {
        $formStatus = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($persona['name']) ?> — <?= htmlspecialchars($persona['title']) ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;1,9..144,500&family=Public+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>

<header class="topbar">
  <span class="topbar__mark">AR</span>
  <button class="topbar__toggle" id="navToggle" aria-label="Toggle menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
  <nav class="topbar__nav" id="topbarNav">
    <a href="#work">Work</a>
    <a href="#skills">Skills</a>
    <a href="#contact">Contact</a>
  </nav>
</header>

<main>

  <section class="hero">
    <p class="hero__eyebrow"><?= htmlspecialchars($greeting) ?>, it's <?= date('g:i A') ?> here.</p>
    <h1 class="hero__name"><?= htmlspecialchars($persona['name']) ?></h1>
    <p class="hero__title"><?= htmlspecialchars($persona['title']) ?></p>
    <p class="hero__blurb"><?= htmlspecialchars($persona['blurb']) ?></p>

    <!-- Signature element: a flip card, like a physical persona card -->
    <div class="card" id="personaCard" tabindex="0" role="button" aria-pressed="false"
         aria-label="Flip persona card for contact details">
      <div class="card__inner">
        <div class="card__face card__front">
          <span class="card__mono">PERSONA / 01</span>
          <span class="card__name"><?= htmlspecialchars($persona['name']) ?></span>
          <span class="card__title"><?= htmlspecialchars($persona['title']) ?></span>
          <span class="card__hint">Tap to flip ↻</span>
        </div>
        <div class="card__face card__back">
          <span class="card__mono">CONTACT</span>
          <a class="card__email" href="mailto:<?= htmlspecialchars($persona['email']) ?>">
            <?= htmlspecialchars($persona['email']) ?>
          </a>
          <ul class="card__social">
            <?php foreach ($persona['social'] as $s): ?>
              <li>
                <a href="<?= htmlspecialchars($s['url']) ?>">
                  <span><?= htmlspecialchars($s['label']) ?></span>
                  <span><?= htmlspecialchars($s['handle']) ?></span>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="skills" id="skills">
    <h2 class="section__label">Specimen — What I do</h2>
    <div class="skills__grid">
      <?php foreach ($skills as $skill): ?>
        <div class="skill">
          <span class="skill__no"><?= htmlspecialchars($skill['no']) ?></span>
          <span class="skill__name"><?= htmlspecialchars($skill['name']) ?></span>
          <span class="skill__note"><?= htmlspecialchars($skill['note']) ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="work" id="work">
    <h2 class="section__label">Selected Work</h2>
    <div class="work__grid">
      <?php foreach ($work as $item): ?>
        <article class="work__item">
          <span class="work__year"><?= htmlspecialchars($item['year']) ?></span>
          <h3 class="work__title"><?= htmlspecialchars($item['title']) ?></h3>
          <p class="work__tag"><?= htmlspecialchars($item['tag']) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="contact" id="contact">
    <h2 class="section__label">Get in touch</h2>

    <?php if ($formStatus === 'success'): ?>
      <p class="form__status form__status--ok">Message sent — I'll write back soon.</p>
    <?php elseif ($formStatus === 'error'): ?>
      <div class="form__status form__status--error">
        <p>Couldn't send that:</p>
        <ul>
          <?php foreach ($formErrors as $err): ?>
            <li><?= htmlspecialchars($err) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form class="form" method="POST" action="#contact" novalidate>
      <div class="form__row">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($old['name']) ?>" required>
      </div>
      <div class="form__row">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($old['email']) ?>" required>
      </div>
      <div class="form__row">
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="4" required><?= htmlspecialchars($old['message']) ?></textarea>
      </div>
      <!-- honeypot, hidden from real users via CSS -->
      <div class="form__honeypot" aria-hidden="true">
        <label for="website">Website</label>
        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
      </div>
      <button type="submit" name="contact_submit" value="1" class="form__submit">Send message</button>
    </form>
  </section>

</main>

<footer class="footer">
  <span>&copy; <?= date('Y') ?> <?= htmlspecialchars($persona['name']) ?></span>
  <span>Built with HTML, CSS, JS &amp; PHP</span>
</footer>

<script src="script.js"></script>
</body>
</html>inde
