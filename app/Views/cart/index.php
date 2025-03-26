<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>

<div class="container mt-5">
    <h2>Twój koszyk</h2>

    <!-- Sprawdzenie, czy koszyk jest pusty -->
    <?php if (empty($cartItems)): ?>
        <div class="alert alert-info">Twój koszyk jest pusty.</div>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produkt</th>
                    <th>Cena</th>
                    <th>Ilość</th>
                    <th>Razem</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><?= esc($item['name']); ?></td>
                        <td><?= number_to_currency($item['price'], 'PLN'); ?></td>
                        <td>
                            <form method="POST" action="<?= site_url('cart/update/' . $item['id']); ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity']; ?>" min="1" class="form-control" style="width: 60px;">
                                <button type="submit" class="btn btn-sm btn-primary mt-2">Zaktualizuj</button>
                            </form>
                        </td>
                        <td><?= number_to_currency($item['price'] * $item['quantity'], 'PLN'); ?></td>
                        <td>
                            <a href="<?= site_url('cart/remove/' . $item['id']); ?>" class="btn btn-sm btn-danger">Usuń</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Podsumowanie -->
        <div class="text-right">
            <h4>Całkowita kwota: <?= number_to_currency($totalPrice, 'PLN'); ?></h4>
            <a href="<?= site_url('checkout'); ?>" class="btn btn-success">Przejdź do kasy</a>
        </div>
    <?php endif; ?>
</div>

<?= $this->include('partials/footer'); ?>
