<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>

<div class="container mt-5">
    <h2><?= esc($product['name']); ?></h2>

    <div class="row">
        <div class="col-md-6">
            <img src="<?= base_url('uploads/' . $product['image']); ?>" class="img-fluid" alt="<?= esc($product['name']); ?>">
        </div>
        <div class="col-md-6">
            <p><strong>Cena:</strong> <?= number_to_currency($product['price'], 'PLN'); ?></p>
            <p><strong>Opis:</strong> <?= esc($product['description']); ?></p>
            <form method="POST" action="<?= site_url('cart/add/' . $product['id']); ?>">
                <button type="submit" class="btn btn-success">Dodaj do koszyka</button>
            </form>
        </div>
    </div>
</div>

<?= $this->include('partials/footer'); ?>
