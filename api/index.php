<?php

/**
 * Vercel Entry Point
 *
 * Vercel mengharuskan serverless functions ada di folder /api.
 * File ini hanya meneruskan semua request ke CI4 entry point
 * yang ada di /public/index.php.
 *
 * __DIR__ di dalam public/index.php tetap resolve ke folder /public,
 * sehingga FCPATH dan semua path CI4 tetap benar.
 */

require __DIR__ . '/../public/index.php';
