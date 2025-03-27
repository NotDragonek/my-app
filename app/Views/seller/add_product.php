<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>
<div class="container mt-5 mb-3">
    <h1>Dodaj Produkt</h1>
    <form method="post" action="<?= site_url('seller/save_product'); ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Nazwa produktu</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Opis</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategoria</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">ilosc</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Cena</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">Dodaj Produkt</button>
    </form>
</div>

<?= $this->include('partials/footer'); ?>
