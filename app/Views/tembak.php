<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="description" content="Sebuah pesan kecil yang penuh arti — untuk kamu.">
<title>Untuk <?= esc($namaCewek) ?> ✨</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400;1,600&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">

<style>
  /* ─── Design Tokens ─────────────────────────────── */
  :root {
    --bg-deep:    #030711;
    --bg-mid:     #090d1f;
    --bg-soft:    #0f1635;
    --gold:       #e8b94f;
    --gold-bright:#f5d07a;
    --gold-glow:  rgba(232,185,79,.35);
    --blush:      #d4869a;
    --blush-glow: rgba(212,134,154,.25);
    --ink-light:  #eeeaf6;
    --ink-soft:   #8d9dc8;
    --ink-muted:  #545e7e;
    --glass-bg:   rgba(15,22,53,.55);
    --glass-border: rgba(232,185,79,.18);
    --line:       rgba(232,185,79,.22);
    --radius-card: 24px;
    --shadow-card: 0 24px 60px rgba(0,0,0,.55), 0 0 0 1px var(--glass-border);
    --font-serif: 'Cormorant Garamond', Georgia, serif;
    --font-sans:  'DM Sans', system-ui, sans-serif;
  }

  /* ─── Reset ─────────────────────────────────────── */
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  html {
    scroll-behavior: smooth;
    -webkit-text-size-adjust: 100%;
  }

  body {
    min-height: 100svh;
    height: 100%;
    background: var(--bg-deep);
    font-family: var(--font-sans);
    color: var(--ink-light);
    overflow: hidden;
    overscroll-behavior: none;
    -webkit-font-smoothing: antialiased;
  }

  /* ─── Canvas layers ──────────────────────────────── */
  #sky {
    position: fixed; inset: 0; z-index: 0; pointer-events: none;
    background: radial-gradient(ellipse 80% 60% at 50% 0%, #141d4a 0%, #07091a 55%, var(--bg-deep) 100%);
  }

  /* Nebula glow spots */
  #sky::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse 55% 35% at 25% 30%, rgba(90,60,180,.12) 0%, transparent 70%),
      radial-gradient(ellipse 45% 25% at 78% 65%, rgba(212,134,154,.08) 0%, transparent 70%),
      radial-gradient(ellipse 40% 30% at 60% 10%, rgba(232,185,79,.06) 0%, transparent 70%);
  }

  #constellation {
    position: fixed; inset: 0; z-index: 1; pointer-events: none;
    display: flex; align-items: center; justify-content: center;
  }
  #constellation svg {
    width: min(88vw, 480px);
    height: min(88vw, 480px);
    overflow: visible;
    opacity: .65;
  }
  .conline {
    fill: none; stroke: var(--gold); stroke-width: .9;
    stroke-dasharray: 4 5; opacity: .5;
  }
  .constar {
    fill: var(--gold-bright);
    filter: drop-shadow(0 0 5px rgba(232,185,79,.9)) drop-shadow(0 0 12px rgba(232,185,79,.4));
  }

  /* ─── Shooting Stars ─────────────────────────────── */
  .shoot {
    position: fixed;
    top: 0; left: 0;
    width: 2px; height: 2px;
    background: #fff;
    border-radius: 50%;
    z-index: 1;
    pointer-events: none;
    opacity: 0;
  }
  .shoot::after {
    content: '';
    position: absolute;
    top: 50%; left: 0;
    transform: translateY(-50%);
    width: 120px; height: 1px;
    background: linear-gradient(to left, rgba(255,255,255,.8), transparent);
  }
  @keyframes shootAnim {
    0%   { opacity: 0; transform: translate(0,0); }
    5%   { opacity: 1; }
    100% { opacity: 0; transform: translate(420px, 200px); }
  }

  /* ─── Starfield dots ─────────────────────────────── */
  .star-dot {
    position: absolute;
    background: #fff;
    border-radius: 50%;
    animation: twinkle var(--dur, 3.5s) ease-in-out infinite;
    animation-delay: var(--delay, 0s);
  }
  @keyframes twinkle {
    0%, 100% { opacity: .08; }
    50%       { opacity: var(--peak, .7); }
  }

  /* ─── Main layout ────────────────────────────────── */
  main {
    position: relative; z-index: 2;
    min-height: 100svh;
    display: flex; align-items: center; justify-content: center;
    padding: clamp(16px, 5vw, 32px);
    text-align: center;
  }

  /* ─── Stage cards ────────────────────────────────── */
  .stage {
    display: none;
    flex-direction: column;
    align-items: center;
    gap: clamp(18px, 3vh, 28px);
    width: 100%;
    max-width: 540px;
    background: var(--glass-bg);
    backdrop-filter: blur(22px) saturate(160%);
    -webkit-backdrop-filter: blur(22px) saturate(160%);
    border: 1px solid var(--glass-border);
    border-radius: var(--radius-card);
    box-shadow: var(--shadow-card);
    padding: clamp(28px, 6vw, 52px) clamp(20px, 5vw, 44px);
    animation: stageRise .75s cubic-bezier(.22,.85,.32,1) both;
  }
  .stage.active { display: flex; }

  @keyframes stageRise {
    from { opacity: 0; transform: translateY(24px) scale(.97); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
  }

  /* Card top shimmer line */
  .stage::before {
    content: '';
    position: absolute;
    top: 0; left: 20%; right: 20%;
    height: 1px;
    background: linear-gradient(to right, transparent, var(--gold-bright), transparent);
    border-radius: 1px;
    opacity: .5;
  }

  /* ─── Typography ─────────────────────────────────── */
  .eyebrow {
    font-size: clamp(10px, 2vw, 12px);
    letter-spacing: .28em;
    text-transform: uppercase;
    color: var(--gold);
    font-weight: 500;
    opacity: .8;
  }

  h1 {
    font-family: var(--font-serif);
    font-weight: 600;
    font-style: italic;
    font-size: clamp(24px, 5.5vw, 42px);
    line-height: 1.3;
    color: var(--ink-light);
    text-shadow: 0 0 40px rgba(232,185,79,.15);
  }

  p.body-text {
    font-size: clamp(14px, 3.5vw, 16px);
    line-height: 1.85;
    color: var(--ink-soft);
    max-width: 400px;
  }

  /* ─── Envelope ───────────────────────────────────── */
  .envelope-wrap {
    cursor: pointer;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    padding: 8px;
  }
  .envelope-wrap:focus-visible .envelope {
    outline: 2px solid var(--gold);
    outline-offset: 6px;
    border-radius: 8px;
  }

  .envelope {
    width: clamp(140px, 40vw, 192px);
    height: clamp(92px, 27vw, 128px);
    position: relative;
    filter: drop-shadow(0 8px 30px rgba(232,185,79,.25));
    transition: filter .3s ease, transform .3s ease;
  }
  .envelope-wrap:hover .envelope,
  .envelope-wrap:active .envelope {
    filter: drop-shadow(0 12px 40px rgba(232,185,79,.45));
    transform: translateY(-3px);
  }

  .env-body {
    position: absolute; inset: 0;
    background: linear-gradient(145deg, #1b2a5c, #0f1a3d);
    border: 1px solid rgba(232,185,79,.3);
    border-radius: 8px;
  }
  /* inner shadow lines */
  .env-body::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0; top: 40%;
    background: linear-gradient(135deg, transparent 45%, rgba(232,185,79,.06) 100%);
    border-radius: 0 0 8px 8px;
  }

  .env-flap {
    position: absolute; top: 0; left: 0;
    width: 100%; height: 55%;
    background: linear-gradient(145deg, #253470, #19255a);
    clip-path: polygon(0 0, 100% 0, 50% 70%);
    border-radius: 8px 8px 0 0;
    transform-origin: top center;
    transition: transform .55s cubic-bezier(.2,.8,.3,1);
    border-bottom: 1px solid rgba(232,185,79,.15);
  }
  .envelope-wrap:hover .env-flap { transform: rotateX(-32deg); }

  .env-seal {
    position: absolute;
    top: 36%; left: 50%;
    transform: translate(-50%, -50%);
    width: clamp(22px, 5vw, 28px);
    height: clamp(22px, 5vw, 28px);
    border-radius: 50%;
    background: radial-gradient(circle at 35% 30%, var(--gold-bright), var(--gold) 65%);
    box-shadow: 0 0 14px rgba(232,185,79,.7), 0 0 30px rgba(232,185,79,.3);
    animation: sealPulse 2.8s ease-in-out infinite;
  }
  @keyframes sealPulse {
    0%, 100% { box-shadow: 0 0 10px rgba(232,185,79,.6), 0 0 24px rgba(232,185,79,.2); }
    50%       { box-shadow: 0 0 18px rgba(232,185,79,.9), 0 0 40px rgba(232,185,79,.4); }
  }

  .env-hint {
    font-size: clamp(12px, 2.8vw, 13px);
    color: var(--ink-soft);
    letter-spacing: .06em;
    animation: hintFloat 2.5s ease-in-out infinite;
  }
  @keyframes hintFloat {
    0%, 100% { transform: translateY(0); opacity: .6; }
    50%       { transform: translateY(-3px); opacity: 1; }
  }

  /* ─── Letter ─────────────────────────────────────── */
  .letter-box {
    text-align: left;
    width: 100%;
    min-height: 140px;
  }

  .letter-line {
    font-size: clamp(14.5px, 3.5vw, 16.5px);
    line-height: 1.9;
    color: var(--ink-light);
    margin: 0 0 12px;
    opacity: 0;
  }
  .letter-line.show {
    animation: fadeUp .65s cubic-bezier(.22,.85,.32,1) both;
  }
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(10px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* ─── Buttons ────────────────────────────────────── */
  .btn {
    font-family: var(--font-sans);
    font-size: clamp(13px, 3.2vw, 15px);
    font-weight: 500;
    padding: clamp(11px, 2.5vw, 14px) clamp(22px, 5vw, 32px);
    border-radius: 999px;
    border: 1px solid var(--line);
    background: rgba(255,255,255,.05);
    color: var(--ink-light);
    cursor: pointer;
    letter-spacing: .04em;
    transition: background .25s, transform .2s, box-shadow .25s, color .25s;
    -webkit-tap-highlight-color: transparent;
    white-space: nowrap;
  }
  .btn:focus-visible { outline: 2px solid var(--gold); outline-offset: 3px; }
  .btn:active { transform: scale(.96) !important; }

  .btn-gold {
    background: linear-gradient(135deg, var(--gold-bright) 0%, var(--gold) 100%);
    color: #1c1005;
    border: none;
    font-weight: 600;
    box-shadow: 0 6px 22px rgba(232,185,79,.3), 0 1px 0 rgba(255,255,255,.25) inset;
  }
  .btn-gold:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(232,185,79,.5), 0 1px 0 rgba(255,255,255,.25) inset;
  }

  /* ─── Choice row ─────────────────────────────────── */
  .choice-row {
    display: flex;
    gap: clamp(12px, 3vw, 18px);
    align-items: center;
    justify-content: center;
    position: relative;
    width: 100%;
    /* cukup tinggi agar tombol No punya ruang kabur tanpa keluar card */
    min-height: clamp(160px, 26vh, 220px);
    /* kunci: tombol tidak bisa keluar dari area ini */
    overflow: hidden;
    border-radius: 12px;
    padding: 10px;
  }
  #btnNo  { transition: left .32s cubic-bezier(.2,.8,.4,1), top .32s cubic-bezier(.2,.8,.4,1); }
  #btnYes { transition: transform .3s cubic-bezier(.2,.8,.4,1); }

  /* ─── Final stage ────────────────────────────────── */
  .final-icon {
    font-size: clamp(38px, 9vw, 52px);
    line-height: 1;
    animation: iconBounce .8s ease both;
  }
  @keyframes iconBounce {
    0%   { transform: scale(0) rotate(-10deg); opacity: 0; }
    60%  { transform: scale(1.15) rotate(4deg); }
    100% { transform: scale(1) rotate(0); opacity: 1; }
  }

  .signature {
    font-size: clamp(11px, 2.5vw, 13px);
    color: var(--ink-muted);
    letter-spacing: .1em;
    margin-top: 4px;
  }

  /* ─── Divider ────────────────────────────────────── */
  .divider {
    width: 100%;
    height: 1px;
    background: linear-gradient(to right, transparent, var(--line), transparent);
    border: none;
  }

  /* ─── Particles ──────────────────────────────────── */
  #burst { position: fixed; inset: 0; z-index: 10; pointer-events: none; }
  .particle {
    position: absolute;
    font-size: clamp(16px, 4vw, 22px);
    opacity: 0;
    animation: burstUp 1.8s cubic-bezier(.22,.85,.32,1) forwards;
  }
  @keyframes burstUp {
    0%   { opacity: 0; transform: translateY(0) scale(.5) rotate(0deg); }
    12%  { opacity: 1; }
    100% { opacity: 0; transform: translateY(-160px) scale(1.2) rotate(20deg); }
  }

  /* ─── Mobile tweaks ──────────────────────────────── */
  @media (max-width: 420px) {
    .stage { border-radius: 20px; }
    .choice-row { min-height: 160px; }
    .env-flap { height: 52%; }
  }

  @media (max-height: 640px) {
    main { align-items: flex-start; padding-top: 16px; }
    .stage { gap: 14px; padding: 22px 18px; }
  }

  @media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
      animation-duration: .01ms !important;
      animation-iteration-count: 1 !important;
      transition-duration: .01ms !important;
    }
  }
</style>
</head>
<body>

<!-- Background layers -->
<div id="sky"></div>
<div id="constellation"><svg id="heartSvg" viewBox="0 0 300 300"></svg></div>
<div id="burst"></div>

<main>

  <!-- ░░ STAGE 1: ENVELOPE ░░ -->
  <section class="stage active" data-stage="1" style="position:relative">
    <span class="eyebrow">untuk <?= esc($namaCewek) ?>,</span>
    <h1>Ada satu hal yang<br>pengen aku sampein.</h1>
    <hr class="divider">
    <div class="envelope-wrap" id="envelope" role="button" tabindex="0" aria-label="Buka surat">
      <div class="envelope">
        <div class="env-body"></div>
        <div class="env-flap"></div>
        <div class="env-seal"></div>
      </div>
      <span class="env-hint">ketuk amplop ini ✧</span>
    </div>
  </section>

  <!-- ░░ STAGE 2: LETTER ░░ -->
  <section class="stage" data-stage="2" style="position:relative">
    <span class="eyebrow">sebuah cerita kecil</span>
    <div class="letter-box" id="letterBox"></div>
    <button class="btn btn-gold" id="btnLanjut" style="display:none; margin-top:4px">
      Lanjut &rarr;
    </button>
  </section>

  <!-- ░░ STAGE 3: THE QUESTION ░░ -->
  <section class="stage" data-stage="3" style="position:relative">
    <span class="eyebrow">jadi begini...</span>
    <h1><?= esc($pertanyaan) ?></h1>
    <hr class="divider">
    <div class="choice-row" id="choiceRow">
      <button class="btn btn-gold" id="btnYes">Iya, aku mau 💙</button>
      <button class="btn" id="btnNo">Pikir-pikir dulu</button>
    </div>
  </section>

  <!-- ░░ STAGE 4: CELEBRATION ░░ -->
  <section class="stage" data-stage="4" style="position:relative">
    <div class="final-icon">🌠</div>
    <h1>Yeay, akhirnya!</h1>
    <hr class="divider">
    <p class="body-text"><?= esc($pesanIya) ?></p>
    <p class="signature">— <?= esc($namaCowok) ?></p>
  </section>

</main>

<script>
(function () {
  /* ── Starfield ───────────────────────────────────── */
  const sky = document.getElementById('sky');
  const count = window.innerWidth < 480 ? 55 : 110;
  for (let i = 0; i < count; i++) {
    const s = document.createElement('div');
    s.className = 'star-dot';
    const size = Math.random() * 2.2 + .6;
    const peak = (.3 + Math.random() * .6).toFixed(2);
    const dur  = (2.5 + Math.random() * 4).toFixed(1);
    const delay = (Math.random() * 5).toFixed(1);
    s.style.cssText = `
      width:${size}px; height:${size}px;
      top:${Math.random()*100}vh; left:${Math.random()*100}vw;
      --peak:${peak}; --dur:${dur}s; --delay:${delay}s;
    `;
    sky.appendChild(s);
  }

  /* ── Shooting stars ──────────────────────────────── */
  function shootStar() {
    const el = document.createElement('div');
    el.className = 'shoot';
    el.style.cssText = `
      top:${Math.random()*45}vh;
      left:${Math.random()*60}vw;
      animation: shootAnim ${1.0 + Math.random()*.8}s linear forwards;
      transform: rotate(${15 + Math.random()*20}deg);
    `;
    document.body.appendChild(el);
    setTimeout(() => el.remove(), 2200);
    const next = 4000 + Math.random() * 9000;
    setTimeout(shootStar, next);
  }
  setTimeout(shootStar, 1800);

  /* ── Constellation heart ─────────────────────────── */
  const svg = document.getElementById('heartSvg');
  const NS = 'http://www.w3.org/2000/svg';
  const TOTAL = 18;
  const pts = [];
  for (let i = 0; i < TOTAL; i++) {
    const t = (i / TOTAL) * Math.PI * 2;
    const x = 16 * Math.pow(Math.sin(t), 3);
    const y = 13 * Math.cos(t) - 5 * Math.cos(2*t) - 2 * Math.cos(3*t) - Math.cos(4*t);
    pts.push({ x: 150 + x * 8.5, y: 145 - y * 8.5 });
  }
  const lineEls = pts.map((a, i) => {
    const b = pts[(i + 1) % TOTAL];
    const l = document.createElementNS(NS, 'line');
    l.setAttribute('x1', a.x); l.setAttribute('y1', a.y);
    l.setAttribute('x2', b.x); l.setAttribute('y2', b.y);
    l.setAttribute('class', 'conline');
    l.style.opacity = 0;
    svg.appendChild(l);
    return l;
  });
  const starEls = pts.map(p => {
    const c = document.createElementNS(NS, 'circle');
    c.setAttribute('cx', p.x); c.setAttribute('cy', p.y); c.setAttribute('r', 3.5);
    c.setAttribute('class', 'constar');
    c.style.opacity = 0;
    svg.appendChild(c);
    return c;
  });

  function revealConst(n) {
    starEls.forEach((el, i) => {
      el.style.transition = 'opacity .7s ease';
      el.style.opacity = i < n ? 1 : 0.1;
    });
    lineEls.forEach((el, i) => {
      el.style.transition = 'opacity .7s ease';
      el.style.opacity = i < n ? 0.5 : 0;
    });
  }
  revealConst(5);

  /* ── Stage navigation ────────────────────────────── */
  const stages = document.querySelectorAll('.stage');
  function goStage(n) {
    stages.forEach(s => s.classList.toggle('active', +s.dataset.stage === n));
    window.scrollTo(0, 0);
  }

  /* ── Envelope → Letter ───────────────────────────── */
  const envelope = document.getElementById('envelope');
  const letterBox = document.getElementById('letterBox');
  const btnLanjut = document.getElementById('btnLanjut');
  const ceritaKita = <?= json_encode($ceritaKita) ?>;

  function openLetter() {
    goStage(2);
    revealConst(10);
    letterBox.innerHTML = '';
    let delay = 250;
    ceritaKita.forEach((line, idx) => {
      setTimeout(() => {
        const p = document.createElement('p');
        p.className = 'letter-line';
        p.textContent = line;
        letterBox.appendChild(p);
        requestAnimationFrame(() => p.classList.add('show'));
        if (idx === ceritaKita.length - 1) {
          setTimeout(() => { btnLanjut.style.display = 'inline-block'; }, 800);
        }
      }, delay);
      delay += 1400;
    });
  }

  envelope.addEventListener('click', openLetter);
  envelope.addEventListener('keypress', e => {
    if (e.key === 'Enter' || e.key === ' ') openLetter();
  });

  btnLanjut.addEventListener('click', () => {
    goStage(3);
    revealConst(TOTAL);
  });

  /* ── Dodging "No" button ─────────────────────────── */
  const btnNo  = document.getElementById('btnNo');
  const btnYes = document.getElementById('btnYes');
  const choiceRow = document.getElementById('choiceRow');
  const noTexts = ['Pikir-pikir dulu', 'Yakin nih?', 'Hmm, coba lagi', 'Susah ya dikliknya?', 'Udahlah iya aja 😅'];
  let dodgeCount = 0;
  let isRoaming = false;

  // Ukuran tombol yang tersimpan saat pertama kali
  let noW = 0, noH = 0;
  // Posisi btnYes relatif terhadap choiceRow, disimpan sebelum btnNo jadi absolute
  let yesX = 0, yesY = 0, yesW = 0, yesH = 0;

  function overlaps(ax, ay, aw, ah, bx, by, bw, bh, margin) {
    return !(ax + aw + margin < bx || ax - margin > bx + bw || ay + ah + margin < by || ay - margin > by + bh);
  }

  function dodge() {
    const rowRect = choiceRow.getBoundingClientRect();

    if (!isRoaming) {
      // ⚠️ Snapshot posisi YES dan ukuran NO SEBELUM mengubah layout
      const noRect  = btnNo.getBoundingClientRect();
      const yesRect = btnYes.getBoundingClientRect();

      noW = noRect.width;
      noH = noRect.height;

      // Koordinat YES relatif terhadap row — disimpan sekali, tidak berubah
      yesX = yesRect.left - rowRect.left;
      yesY = yesRect.top  - rowRect.top;
      yesW = yesRect.width;
      yesH = yesRect.height;

      // Pindahkan btnNo ke absolute tepat di posisinya sekarang
      btnNo.style.position = 'absolute';
      btnNo.style.left = (noRect.left - rowRect.left) + 'px';
      btnNo.style.top  = (noRect.top  - rowRect.top)  + 'px';
      void btnNo.offsetHeight; // force reflow
      isRoaming = true;
    }

    // Batas gerak: dalam batas choiceRow (padding sudah di CSS)
    const maxX = Math.max(rowRect.width  - noW, 0);
    const maxY = Math.max(rowRect.height - noH, 0);

    let x, y, tries = 0;
    do {
      x = Math.random() * maxX;
      y = Math.random() * maxY;
      tries++;
    } while (
      overlaps(x, y, noW, noH, yesX, yesY, yesW, yesH, 28) &&
      tries < 30
    );

    btnNo.style.left = x + 'px';
    btnNo.style.top  = y + 'px';
    dodgeCount++;
    btnNo.textContent = noTexts[Math.min(dodgeCount, noTexts.length - 1)];
    const scale = Math.min(1 + dodgeCount * 0.07, 1.6);
    btnYes.style.transform = `scale(${scale})`;
  }

  btnNo.addEventListener('mouseenter', dodge);
  btnNo.addEventListener('touchstart', e => { e.preventDefault(); dodge(); }, { passive: false });

  /* ── Yes → Celebration ───────────────────────────── */
  const burst = document.getElementById('burst');
  const emojis = ['✨', '💫', '⭐', '🌠', '💙', '🌟', '💛'];

  function fireBurst() {
    for (let i = 0; i < 32; i++) {
      const p = document.createElement('div');
      p.className = 'particle';
      p.textContent = emojis[Math.floor(Math.random() * emojis.length)];
      p.style.left   = Math.random() * 100 + 'vw';
      p.style.bottom = (Math.random() * 25) + 'vh';
      p.style.animationDelay = (Math.random() * .6) + 's';
      burst.appendChild(p);
      setTimeout(() => p.remove(), 2500);
    }
  }

  btnYes.addEventListener('click', () => {
    goStage(4);
    fireBurst();
    setTimeout(fireBurst, 550);
    setTimeout(fireBurst, 1100);
  });
})();
</script>

</body>
</html>