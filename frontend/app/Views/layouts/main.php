<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title : 'My App' ?></title>
    <link rel="stylesheet" href="/css/main.css?v=<?= time() ?>">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="flex flex-col h-screen ">

    <header class="flex flex-row justify-center gap-4 p-6 shadow-sm z-25">
        <div class="flex flex-row w-full sm:w-[90%] justify-between gap-4 items-center">
            <div class="flex flex-row gap-4 items-center">
                <i data-lucide="sparkles" class="text-primary"></i>
                <h3>Empanada Manager</h3>
            </div>
            <nav class="flex gap-8 text-primary">
                <a href="<?= site_url('/') ?>">Home</a> 
                <a href="<?= site_url('empanadas') ?>">Empanadas</a>
                <a href="<?= site_url('empanadas') ?>">Recipes</a>
                <a href="<?= site_url('empanadas') ?>">Ingredients</a>
            </nav>
        </div>
    </header>

    <div class="grow overflow-auto bg-gradient-to-b from-background to-primary/10 ">
        <main class="flex flex-col h-full p-8 mx-auto sm:w-[90%]">
            <!-- This is where each view will be injected -->
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <!---
    <footer class="bg-footer flex flex-col gap-8 p-4 ">
        <div class="sm:w-[90%] mx-auto">

            <p>&copy; <?= date('Y') ?> Vicente Riveros Garay</p>
        </div>
    </footer>
    -->
    <script>
        lucide.createIcons();
    </script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>