<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-8">
    <div class="flex sm:flex-row sm:justify-between flex-col gap-8">
        <h1 class="">Empanadas</h1>
        <a href="empanadas/create" class="btn-primary">
            <i data-lucide="plus"></i>
            Add New Empanada
        </a>
    </div>

    <!-- listado -->
    <ul id="empanadas-list" class="grid grid-cols-1 gap-12 sm:gap-8"></ul>
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
            empanadaItem.className = "list-item-card flex flex-col items-center sm:flex-row gap-8"
            empanadaItem.innerHTML = 
            `            
                <div class="rounded-lg overflow-clip w-full h-full sm:w-32 sm:h-32 aspect-square bg-background">
                    <img src="/img/placeholder.jpg" alt="empanada-placeholder" class="object-cover w-full h-full" >
                    </div>
                    <div class="flex flex-col gap-2 justify-center w-full">
                        <h2>${empanada.name ?? '-'}</h2>
                        <p class="line-clamp-2">
                            ${empanada.description ?? '-'}
                        </p>
                        <p class="!font-semibold !text-black">
                            $${empanada.price ?? '-'}
                        </p>
                        <div>
                            <badge>
                            ${empanada.type}
                            </badge>
                        </div>
                    </div>
                    <div class="h-full hidden sm:flex ml-auto sm:m-auto sm:items-center">
                        <a href="empanadas/${empanada.id}" class="btn-chevron-right">
                            <i data-lucide="chevron-right" class=""></i>
                        </a>
                    </div>
                    <div class="h-full flex sm:hidden w-full items-center">
                        <a href="empanadas/${empanada.id}" class="btn-primary !bg-primary/60 w-full">
                        See details
                        <i data-lucide="chevron-right" class=""></i>
                        </a>
                    </div>
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