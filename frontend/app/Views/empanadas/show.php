<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-8">
    <div class="flex justify-between">
        <div class="flex flex-col gap-4 w-full">
            <h1 id="name" class=""></h1>
            <div class="flex flex-row gap-4">
                <badge id="type"></badge>
                <h4 id="price"></h4>
                <badge id="stock"></badge>
            </div>
        </div>
        <div>
            <div class="flex gap-4">
                <button class="btn-primary" type="button" onclick="triggerSwal()">
                    <i data-lucide="trash"></i>
                </button>
                <a class="btn-primary" href="/empanadas/<?= json_encode($empanadaId) ?>/edit">
                    <i data-lucide="pencil"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- listado -->
    <ul class="grid grid-cols-1 gap-8">
        <div class="list-item-card gap-4 flex flex-col">
            <h3>Description</h3>
            <p id="description">
            </p>
        </div>
        <div class="list-item-card gap-4 flex flex-col">
            <h3>Filling</h3>
            <p id="filling"></p>
        </div>
    </ul>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    let nameEl;
    let descriptionEl;
    let typeEl;
    let fillingEl;
    let priceEl;
    let stockEl;
    // Fetching the empanada
    const fetchEmpanada = async (empanadaId) => {
        try{
            if(!empanadaId) throw Error('Invalid Empanada ID');

            const response = await fetch(`http://localhost:3000/empanadas/${empanadaId}`, {
                method: 'GET',
            })

            const { data } = await response.json()

            if(!data) throw Error('Invalid empanada data');

            nameEl.innerHTML = `${data.name} Empanada`;
            descriptionEl.innerHTML = data.description;
            priceEl.innerHTML = `$${data.price}`
            typeEl.innerHTML = data.type;
            fillingEl.innerHTML = data.filling;
            stockEl.innerHTML = !data.is_sold_out ? 'Available' : 'Not Available';
            stockEl.className = data.is_sold_out ? "not-available" : 'available';
            
                 
        }catch(e){
            console.error(e);
            Swal.fire({
                icon:'error',
                title:'Error',
                text:'There was a problem trying to fetch the empanada\'s data.'
            })
        }
    }

    // Deletig empanda
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


    /// INIT
    document.addEventListener('DOMContentLoaded', async () => {
        try{
            nameEl = document.getElementById('name')
            descriptionEl = document.getElementById('description');
            typeEl = document.getElementById('type');
            fillingEl = document.getElementById('filling');
            priceEl = document.getElementById('price');
            stockEl = document.getElementById('stock');
            
            const empanadaId = +<?= json_encode($empanadaId) ?>;
            
            if(nameEl && descriptionEl && typeEl && fillingEl && priceEl && stockEl){
                await fetchEmpanada(empanadaId);
            }else{
                throw Error('Elements on browser not found!')
            }
        }catch(e){
            Swal.fire({
                icon:'error',
                title:'Error',
                text: e
            })
        }
    })

</script>
<?= $this->endSection() ?>