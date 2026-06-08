<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Desarrollo Web Avanzado: POO+PDO+TryCatch+Namespaces+Autoload+Transacciones+MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { padding-top: 56px; }
        @media (max-width: 991.98px) {
            #navbarMain {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background-color: #212529;
                z-index: 1050;
                padding: 0.75rem 1rem;
                box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            }
        }
    </style>
</head>
<body class="d-flex flex-column" style="min-height: 100vh;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= BASE_URL ?>/catalogo">
            <i class="bi bi-shop"></i> Tienda MVC
        </a>

        <!-- Botón hamburguesa para móvil -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false"
                aria-label="Menú de navegación">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido colapsable -->
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>/catalogo">
                        <i class="bi bi-grid"></i> Catálogo
                    </a>
                </li>
                <?php if (isset($_SESSION['admin'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>/productos">
                        <i class="bi bi-box-seam"></i> Productos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>/logs">
                        <i class="bi bi-journal-text"></i> Bitácora
                    </a>
                </li>
                <?php endif; ?>
            </ul>

            <div class="d-flex align-items-center gap-2">
                <?php if (isset($_SESSION['admin'])): ?>
                    <span class="text-light">
                        <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['admin']['nombre_completo']); ?>
                    </span>
                    <a class="btn btn-danger btn-sm" href="<?= BASE_URL ?>/logout">
                        <i class="bi bi-box-arrow-right"></i> Salir
                    </a>
                <?php else: ?>
                    <a class="btn btn-warning btn-sm" href="<?= BASE_URL ?>/login">
                        <i class="bi bi-lock"></i> Administrador
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<main class="flex-grow-1">
<div class="container mt-4">
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle"></i>
            <?= htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-triangle"></i>
            <?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
