<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>

<div class="container mt-5">
    <h2>Lista produktów</h2>

    <!-- Komunikat o błędzie -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>
    <?php if(session()->get('rola') == 'seller'): ?>
    <a href="<?= base_url('product/add'); ?>" class="btn btn-primary mb-3">Dodaj nowy produkt</a>
        <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Lp</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Cena</th>
                <th>Ilość</th>
                <th>Kategoria</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php $lp = 0 ?>
            <?php foreach ($products as $product): ?>
                <?php $lp++ ?>
                <tr>
                    <td><?= $lp ?></td>
                    <td><?= $product['nazwa']; ?></td>
                    <td><?= $product['opis']; ?></td>
                    <td><?= number_format($product['cena'], 2); ?> PLN</td>
                    <td><?= $product['ilosc']; ?></td>
                    <td><?= $product['kategoria']; ?></td>
                    <td>
                        <!-- Formularz do dodania produktu do koszyka -->
                        <form method="POST" action="<?= base_url('cart/add/' . $product['id']); ?>">
                            <input type="number" name="quantity" value="1" min="1" class="form-control mb-2" style="width: 80px;">
                            <button type="submit" class="btn btn-success">Dodaj do koszyka</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->include('partials/footer'); ?>
