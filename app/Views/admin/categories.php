<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>

<div class="container mt-5">
    <h1>Zarządzanie kategoriami</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa kategorii</th>
                <th>Opcje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $category->id; ?></td>
                    <td><?= $category->name; ?></td>
                    <td>
                        <a href="<?= site_url('admin/edit_category/' . $category->id); ?>" class="btn btn-warning">Edytuj</a>
                        <a href="<?= site_url('admin/delete_category/' . $category->id); ?>" class="btn btn-danger">Usuń</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('partials/footer'); ?>
