<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>

<div class="container mt-5">
    <h2>Lista produktów</h2>

    <!-- Komunikat o błędzie -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <a href="<?= site_url('product/add'); ?>" class="btn btn-primary mb-3">Dodaj nowy produkt</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Cena</th>
                <th>Kategoria</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id']; ?></td>
                    <td><?= $product['nazwa']; ?></td>
                    <td><?= $product['opis']; ?></td>
                    <td><?= number_format($product['cena'], 2); ?> PLN</td>
                    <td><?= $product['kategoria']; ?></td>
                    <td>
                        <a href="<?= site_url('product/edit/'.$product['id']); ?>" class="btn btn-info">Dodaj do koszyka</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->include('partials/footer'); ?>
