<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>

<div class="container mt-5 mb-3">
    <h2>Twój koszyk</h2>

    <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>Produkt</th>
                <th>Cena</th>
                <th>Ilość</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= esc($product['nazwa']); ?></td>
                    <td><?= esc($product['cena']); ?> PLN</td>
                    <td><?= esc($product['quantity_in_cart']); ?></td>
                    <td>
                        <a href="<?= base_url('cart/remove_item/' . $product['id']); ?>" class="btn btn-danger">Usuń</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (!empty($products)) : ?>
        <a href="<?= base_url('cart/purchase'); ?>" class="btn btn-success">Kup teraz</a>
        <a href="<?= base_url('cart/clear_cart'); ?>" class="btn btn-warning">Wyczysc koszyk</a>
    <?php endif; ?>
</div>

<?= $this->include('partials/footer'); ?>
