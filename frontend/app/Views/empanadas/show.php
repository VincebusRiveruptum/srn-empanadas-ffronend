<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-8">
    <div class="flex justify-between">
        <h1 class="">Empanada</h1>
        <div class="flex gap-4">
            <button class="btn-primary">
                <i data-lucide="trash"></i>
            </button>
            <button class="btn-primary">
                <i data-lucide="pencil"></i>
            </button>
        </div>
    </div>

    <!-- listado -->
    <ul class="grid grid-cols-1 gap-8">
        <div class="list-item-card gap-4 flex flex-col">
            <h3>Description</h3>
            <p>
                Hola mundo
            </p>
        </div>
    </ul>
</div>
<?= $this->endSection() ?>
