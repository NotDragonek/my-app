<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>
<div class="container mt-5">
    <h1>Panel Sprzedawcy</h1>
    <a href="<?= site_url('seller/add_product'); ?>" class="btn btn-success mb-3">Dodaj Produkt</a>
    
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Ilość</th>
                <th>Cena</th>
                <th>Opcje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= esc($product['nazwa']); ?></td>
                    <td><?= esc($product['opis']); ?></td>
                    <td><?= esc($product['ilosc']); ?></td>
                    <td><?= number_format($product['cena'], 2); ?> PLN</td>
                    <td>
                        <a href="<?= site_url('seller/edit_product/' . $product['id']); ?>" class="btn btn-primary btn-sm">Edytuj</a>
                        <a href="<?= site_url('seller/delete_product/' . $product['id']); ?>" class="btn btn-danger btn-sm">Usuń</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->include('partials/footer'); ?>
<?php 
    echo '<pre>';
    print_r($products);
    $session = session();
    print_r($session->get());
    echo '</pre>';
    
?>
