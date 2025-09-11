<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-8">
    <div class="flex flex-col items-center gap-2 text-center">
        <h1>Create a New Empanada</h1>  
        <P>Share your delicious empanada with the world</P>
    </div>

    <!-- listado -->
    <form onsubmit="event.preventDefault();return submitForm(event)" class="list-item-card lg:w-[50%] lg:mx-auto flex flex-col gap-8 mb-[5%]">
        <div class="flex flex-col">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" required/>
        </div>
        <div class="flex flex-col">
            <label for="type">Type</label>
            <select id="type" name="type">
                <option selected disabled value="">-- Select type --</option>
                <option value="Baked">Baked</option>
                <option value="Fried">Fried</option>
            </select>
        </div>

        <div class="flex flex-col">
            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <div class="flex flex-col">
            <label for="filling">Filling</label>
            <textarea id="filling" name="filling" required></textarea>
        </div>

        <div class="flex flex-col">
            <label for="price">Price (CLP)</label>
            <input id="price" name="price" type="number" min=0 max=999999 required/>
        </div>
        <div class="flex flex-col">
            <label for="price">Stock availablity</label>
            <div class="flex gap-2 items-center">
                <input id="is_sold_out" id="yes_stock" name="is_sold_out" type="radio" value="1"/>
                <label class="mt-1" for="yes_stock">Yes</label>
            </div>
            <div class="flex gap-2 items-center">
                <input id="is_sold_out" id="no_stock" name="is_sold_out" type="radio" value="0"/>
                <label class="mt-1" for="no_stock">No</label>
            </div>
        </div>

        <button type="submit" class="btn-primary w-fit mx-auto">Submit</button>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
    const submitForm = async (e) => {
        try{

            const form = e.target;
            const formData = new FormData(form);
            let body = Object.fromEntries(formData.entries())

            body.is_sold_out = body.is_sold_out == 1 ? true : false;
            body.price = +body.price
            
            // Validate body before

            // Send post
            const response = await fetch('http://localhost:3000/empanadas', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(body),
            })

            const { success } = await response.json();

            if(success){
                await Swal.fire({
                    icon:'success',
                    title: 'Create empanada',
                    text: 'Empanada created succesfully!'
                })

                window.location.href = "<?= site_url('empanadas') ?>";
            }else {
                throw Error('There was an error while creating the empanada, check all the values first.')
            }
        }catch(e){
            Swal.fire({
                icon:'error',
                title:'Error',
                text: e
            })
        }
    }
</script>

<?= $this->endSection() ?>
