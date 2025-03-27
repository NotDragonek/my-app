<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>
<div class="container mt-5 mb-3">
        <h1>Produkty</h1>
        <a href="<?= base_url('admin/dashboard'); ?>" class="btn btn-primary mb-3">Powrót do dashboardu</a>
        <a href="<?= base_url('admin/add_product'); ?>" class="btn btn-success mb-3">Dodaj nowy produkt</a>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Cena</th>
                    <th>Kategoria</th>
                    <th>Akcja</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= esc($product['nazwa']); ?></td>
                        <td><?= esc($product['opis']); ?></td>
                        <td><?= esc($product['cena']); ?> zł</td>
                        <td><?= esc($product['kategoria']); ?></td>
                        <td>
                            <a href="<?= base_url('admin/edit_product/'.$product['id']); ?>" class="btn btn-warning btn-sm">Edytuj</a>
                            <a href="<?= base_url('admin/delete_product/'.$product['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?')">Usuń</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?= $this->include('partials/footer'); ?>