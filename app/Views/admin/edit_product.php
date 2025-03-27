<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>

<div class="container mt-5 mb-3">
    <h2>Edycja produktu</h2>
    <form method="POST" action="<?= base_url('admin/update_product/' . $product['id']); ?>">
        <?= csrf_field(); ?>
        
        <div class="form-group">
            <label for="name">Nazwa produktu</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $product['nazwa']); ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Opis</label>
            <textarea class="form-control" id="description" name="description" required><?= old('description', $product['opis']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="price">Cena</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?= old('price', $product['cena']); ?>" required>
        </div>

        <div class="form-group">
            <label for="category">Kategoria</label>
            <input type="text" class="form-control" id="category" name="category" value="<?= old('category', $product['kategoria']); ?>" required>
        </div>

        <div class="form-group">
            <label for="quantity">Ilość</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="<?= old('quantity', $product['ilosc']); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
    </form>
</div>

<?= $this->include('partials/footer'); ?>
