<?php

/**
 * Vercel Entry Point
 *
 * Vercel mengharuskan serverless functions ada di folder /api.
 * File ini membuat direktori writable yang diperlukan CI4 di /tmp
 * (karena Vercel punya read-only filesystem kecuali /tmp),
 * lalu meneruskan request ke CI4 entry point di /public/index.php.
 */

// ── Buat direktori writable di /tmp ──────────────────────────────
// CI4 memvalidasi keberadaan direktori ini sebelum boot.
// /tmp adalah satu-satunya path yang writable di Vercel serverless.
$writablePath = '/tmp/ci4-writable';
$subDirs = ['cache', 'logs', 'session', 'uploads', 'debugbar'];

if (!is_dir($writablePath)) {
    mkdir($writablePath, 0777, true);
}
foreach ($subDirs as $dir) {
    $path = $writablePath . '/' . $dir;
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
}

// ── Boot CI4 ──────────────────────────────────────────────────────
require __DIR__ . '/../public/index.php';
