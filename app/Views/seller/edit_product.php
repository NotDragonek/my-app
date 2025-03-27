<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>

<div class="container mt-5 mb-3">
    <h1>Edytuj Produkt</h1>
    <form method="post" action="<?= site_url('seller/update_product/' . $product['id']); ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Nazwa produktu</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= esc($product['nazwa']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Opis</label>
            <textarea class="form-control" id="description" name="description" required><?= esc($product['opis']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Cena</label>
            <input type="number" class="form-control" id="price" name="price" value="<?= esc($product['cena']); ?>" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
    </form>
</div>

<?= $this->include('partials/footer'); ?>
