<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-8">
    <div class="flex justify-between">
        <h1 class="">Empanada</h1>
        <div class="flex gap-4">
            <button class="btn-primary" type="button" onclick="triggerSwal()">
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

<?= $this->section('scripts') ?>
<script>
    
    document.addEventListener('DOMContentLoaded', () => {
        console.log('Sup');
    })

    const triggerSwal = async () => {
        const result = await Swal.fire({
            icon: "warning",
            title: "Delete empanada",
            text: "Are you sure to remove this empanada?",
            showCancelButton: true,
            confirmButtonText: 'Delete',
        });

        if(result.isConfirmed){
            console.log('Yep')
        }
    }


</script>
<?= $this->endSection() ?>