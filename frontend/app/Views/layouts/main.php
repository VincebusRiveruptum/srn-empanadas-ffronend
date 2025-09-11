<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title : 'My App' ?></title>
    <link rel="stylesheet" href="/css/main.css?v=<?= time() ?>">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="flex flex-col h-screen overflow-clip">
    <header class="flex flex-row justify-center gap-4 p-6 shadow-sm z-25">
        <div class="flex flex-row w-full sm:w-[90%] justify-between gap-4 items-center">
            <div class="flex flex-row gap-4 items-center">
                <i data-lucide="sparkles" class="text-primary"></i>
                <h3 class="hidden md:flex">Empanada Manager</h3>
            </div>
            
            <!-- web  nav -->
            <nav class="hidden sm:flex gap-8 text-primary">
                <a href="<?= site_url('/') ?>">Home</a> 
                <a href="<?= site_url('empanadas') ?>">Empanadas</a>
                <a href="<?= site_url('empanadas') ?>">Recipes</a>
                <a href="<?= site_url('empanadas') ?>">Ingredients</a>
            </nav>

            <!-- hamburger -->
             <div id="hamburger-dropdown" class="relative sm:hidden">
                <button type="button" class="flex items-center" onclick="showDropdown()">
                    <i data-lucide="menu"></i>
                </button>
                <ul id="dropdown-content" class="bg-white shadow-lg rounded-lg absolute top-8 right-0">
                    <a  href="<?= site_url('/') ?>">
                        <li class="py-2 px-4">Home</li>
                    </a>
                    <a  href="<?= site_url('empanadas') ?>">
                        <li class="py-2 px-4">Empanadas</li>
                    </a>
                    <li class="py-2 px-4">Recipes</li>
                    <li class="py-2 px-4">Ingredients</li>
                </ul>
            </div>
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
        let hamburgerEl;
        let dropdownContentEl;

        lucide.createIcons();

        const showDropdown = async () => {
            dropdownContentEl.hidden = !dropdownContentEl.hidden
        }

        document.addEventListener('DOMContentLoaded', async () => {
            hamburgerEl = document.getElementById('hamburger-dropdown');
            dropdownContentEl = document.getElementById('dropdown-content');

            dropdownContentEl.hidden = true;
        })

         document.addEventListener('click', (e) => {
            if (!hamburgerEl.contains(e.target)) {
                dropdownContentEl.hidden = true;
            }
        });
        
    </script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>