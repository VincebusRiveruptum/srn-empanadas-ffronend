<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-8">
    <div class="flex justify-between">
            <h1 class="">Empanadas</h1>
            <button class="btn-primary">
                <i data-lucide="plus"></i>
            Add New Empanada
        </button>
    </div>

    <!-- listado -->
    <ul class="grid grid-cols-1 gap-8">
        <li class="list-item-card flex flex-row gap-8">
            <div class="rounded-md overflow-clip w-32 h-32 aspect-square bg-background">
                <img alt="empanada-placeholder" class="object-cover w-full h-full" >
            </div>
            <div class="flex flex-col justify-center w-full">
                <h2>Pino empanada</h2>
                <p>
                    Traditional Chilean empanada with a savory beef fillig, onion, olives and a hard-boiled egg.
                </p>
            </div>
            <div class="h-full flex items-center">
                <a href="empanadas/1" class="btn-chevron-right">
                    <i data-lucide="chevron-right" class=""></i>
                </a>
            </div>
        </li>
    </ul>
</div>
<?= $this->endSection() ?>
