<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="flex flex-col gap-8">
    <div class="flex flex-col items-center gap-2">
        <h1>Edit Empanada</h1>  
    </div>

    <!-- listado -->
    <form action="submitForm()" class="list-item-card lg:w-[50%] lg:mx-auto flex flex-col gap-8 mb-[5%]">
        <div class="flex flex-col">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" required/>
        </div>
        <div class="flex flex-col">
            <label for="type">Type</label>
            <select id="type" name="type">
                <option selected disabled value="">-- Select type --</option>
                <option value="baked">Baked</option>
                <option value="fried">Fried</option>
            </select>
        </div>

        <div class="flex flex-col">
            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <div class="flex flex-col">
            <label for="price">Price (CLP)</label>
            <input id="price" name="price" type="number" min=0 max=999999 required/>
        </div>
        <div class="flex flex-col">
            <label for="price">Stock availablity</label>
            <div class="flex gap-2 items-center">
                <input id="has_stock" id="yes_stock" name="has_stock" type="radio" value="1"/>
                <label class="mt-1" for="yes_stock">Yes</label>
            </div>
            <div class="flex gap-2 items-center">
                <input id="has_stock" id="no_stock" name="has_stock" type="radio" value="0"/>
                <label class="mt-1" for="no_stock">No</label>
            </div>
        </div>

        <button type="submit" class="btn-primary w-fit mx-auto">Submit</button>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
    const submitForm = (event) => {
        console.log(event);
    }
</script>

<?= $this->endSection() ?>
