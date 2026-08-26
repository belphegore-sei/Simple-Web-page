<?php require __DIR__ . "/data.php"; ?>
<!DOCTYPE html>
<html lang="en" data-theme="<?php echo htmlspecialchars($theme); ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($copy["banner"]); ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IBM+Plex+Sans:wght@400;600&family=Orbitron:wght@700&family=Oswald:wght@500;700&family=Rajdhani:wght@600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="noise"></div>
  <main class="app">
    <header class="topbar">
      <div>
        <h1 class="banner"><?php echo htmlspecialchars($copy["banner"]); ?></h1>
        <p class="subtitle"><?php echo htmlspecialchars($copy["subtitle"]); ?></p>
      </div>
      <div class="date-chip">
        <strong><?php echo htmlspecialchars($date["month"] . "/" . $date["day"] . " " . $date["weekday"]); ?></strong>
        <span><?php echo htmlspecialchars($date["time"] . " / " . $date["weather"]); ?></span>
      </div>
    </header>
    <section class="layout">
      <nav class="menu" aria-label="Command menu">
        <?php foreach ($copy["menu"] as $item): ?>
          <button type="button" data-panel="<?php echo htmlspecialchars($item["id"]); ?>"><?php echo htmlspecialchars($item["label"]); ?></button>
        <?php endforeach; ?>
      </nav>
      <div class="panel">
        <section class="view" id="status">
          <h2>STATUS</h2>
          <div class="grid cards">
            <?php foreach ($stats as $stat): ?>
              <article class="stat">
                <h3><?php echo htmlspecialchars($stat["label"]); ?></h3>
                <p>RANK <?php echo htmlspecialchars($stat["rank"]); ?></p>
                <p class="meta"><?php echo htmlspecialchars($stat["title"]); ?></p>
                <div class="bar"><span style="width: <?php echo ((int) $stat["rank"]) * 10; ?>%"></span></div>
              </article>
            <?php endforeach; ?>
          </div>
          <p class="cta"><?php echo htmlspecialchars($copy["cta"]); ?></p>
        </section>
        <section class="view hidden" id="persona">
          <h2>PERSONA</h2>
          <div class="grid cards">
            <?php foreach ($thieves as $member): ?>
              <article class="card">
                <h3><?php echo htmlspecialchars($member["codename"]); ?></h3>
                <p><?php echo htmlspecialchars($member["persona"]); ?></p>
                <p class="meta"><?php echo htmlspecialchars($member["arcana"]); ?> / HP <?php echo (int) $member["hp"]; ?> / SP <?php echo (int) $member["sp"]; ?></p>
                <div class="bar"><span style="width: <?php echo min(100, (int) $member["hp"] / 5); ?>%"></span></div>
              </article>
            <?php endforeach; ?>
          </div>
        </section>
        <section class="view hidden" id="skill">
          <h2>CONFIDANTS</h2>
          <div class="grid">
            <?php foreach ($confidants as $bond): ?>
              <article class="row">
                <h3><?php echo htmlspecialchars($bond["arcana"]); ?></h3>
                <p><?php echo htmlspecialchars($bond["name"]); ?> — RANK <?php echo (int) $bond["rank"]; ?></p>
                <p class="meta"><?php echo htmlspecialchars($bond["location"]); ?></p>
              </article>
            <?php endforeach; ?>
          </div>
        </section>
        <section class="view hidden" id="item">
          <h2>ITEM</h2>
          <div class="grid">
            <article class="row"><h3>RECOVERY</h3><p>LIFE STONE x6 / SOUL DROP x4 / HIRANYA x2</p></article>
            <article class="row"><h3>BATTLE</h3><p>MOLOTOV x3 / FREEZE SPRAY x2 / PHYSICAL OINTMENT x1</p></article>
            <article class="row"><h3>KEY</h3><p>CALLING CARD / INFILTRATION TOOLS / METRO PASS</p></article>
          </div>
        </section>
        <section class="view hidden" id="equip">
          <h2>EQUIP</h2>
          <div class="grid">
            <article class="row"><h3>WEAPON</h3><p>REBEL KNIFE / GRAPPLING HOOK</p></article>
            <article class="row"><h3>ARMOR</h3><p>PHANTOM SUIT / DARK COAT</p></article>
            <article class="row"><h3>ACCESSORY</h3><p>REBELLION CHARM / LUCK RING</p></article>
          </div>
        </section>
        <section class="view hidden" id="system">
          <h2>SYSTEM</h2>
          <div class="log">
            <?php foreach ($log as $line): ?>
              <p><?php echo htmlspecialchars($line); ?></p>
            <?php endforeach; ?>
          </div>
        </section>
      </div>
    </section>
    <footer class="footer">
      <span>KEYS 1-6 SWITCH MENUS</span>
      <?php if ($theme === "p3"): ?>
        <a class="theme-switch" href="?theme=p5">SWITCH TO P5 ROYAL</a>
      <?php else: ?>
        <a class="theme-switch" href="?theme=p3">SWITCH TO P3 RELOAD</a>
      <?php endif; ?>
    </footer>
  </main>
  <script src="js/app.js"></script>
</body>
</html>
