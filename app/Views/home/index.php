<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>

<div class="container mt-5">
    <h2>Nasze produkty</h2>
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($product['nazwa']); ?></h5>
                        <p class="card-text"><?= esc($product['opis']); ?></p>
                        <p class="card-text"><strong><?= esc($product['cena']); ?> zł</strong></p>
                        <a href="<?= site_url('product/details/' . $product['id']); ?>" class="btn btn-primary">Dodaj do koszyka</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->include('partials/footer'); ?>
