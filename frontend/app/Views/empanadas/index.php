<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-8">
    <div class="flex justify-between">
        <h1 class="">Empanadas</h1>
        <a href="empanadas/create" class="btn-primary">
            <i data-lucide="plus"></i>
            Add New Empanada
        </a>
    </div>

    <!-- listado -->
    <ul id="empanadas-list" class="grid grid-cols-1 gap-8"></ul>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
    const fetchEmpanadas = async () => {
        const response = await fetch('http://localhost:3000/empanadas', { 
            method: 'GET',
        })

        const data = await response.json();
        return data;
    }

    const setEmpanadaList = async(container, data) => {
        
        if(!data.data || data?.data.length == 0){
            console.log('no elements')
            let empanadaItem = document.createElement('li');
            empanadaItem.className = "flex flex-row justify-center p-8 gap-8"
            empanadaItem.innerHTML = `            
            <div class="flex flex-col items-center gap-4 text-center w-full text-black/40">
                <i data-lucide="info"></i>
                <h5>There are no empandas available!</h5>
            </div>
             `  
            container.appendChild(empanadaItem);
            return;
        }

        
        for(const empanada of data.data){
            let empanadaItem = document.createElement('li');
            empanadaItem.className = "list-item-card flex flex-row gap-8"
            empanadaItem.innerHTML = 
            `            
                <div class="rounded-md overflow-clip w-32 h-32 aspect-square bg-background">
                    <img alt="empanada-placeholder" class="object-cover w-full h-full" >
                    </div>
                    <div class="flex flex-col justify-center w-full">
                        <h2>${empanada.name ?? '-'}</h2>
                        <p>
                            ${empanada.description ?? '-'}
                        </p>
                    </div>
                    <div class="h-full flex items-center">
                        <a href="empanadas/${empanada.id}" class="btn-chevron-right">
                        <i data-lucide="chevron-right" class=""></i>
                    </a>
                </div>
            `       
            container.appendChild(empanadaItem);
        }
        return;
    }

    // INIT

    document.addEventListener('DOMContentLoaded', async () => {
        const empandasData = await fetchEmpanadas();
        const empanadaListEl = document.getElementById("empanadas-list");

        setEmpanadaList(empanadaListEl, empandasData);
        lucide.createIcons();
    })

</script>

<?= $this->endSection() ?>