<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>

<div class="container mt-5">
    <h1>Zarządzanie produktami</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa produktu</th>
                <th>Cena</th>
                <th>Opcje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product->id; ?></td>
                    <td><?= $product->name; ?></td>
                    <td><?= $product->price; ?> zł</td>
                    <td>
                        <a href="<?= site_url('admin/edit_product/' . $product->id); ?>" class="btn btn-warning">Edytuj</a>
                        <a href="<?= site_url('admin/delete_product/' . $product->id); ?>" class="btn btn-danger">Usuń</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('partials/footer'); ?>
