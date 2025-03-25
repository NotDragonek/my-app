<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>

<div class="container mt-5">
    <h1>Panel Administratora</h1>

    <h3>Użytkownicy</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Rola</th>
                <th>Email</th>
                <th>Opcje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id; ?></td>
                    <td><?= $user->imie . ' ' . $user->nazwisko; ?></td>
                    <td><?= $user->rola; ?></td>
                    <td><?= $user->email; ?></td>
                    <td>
                        <a href="<?= site_url('admin/delete_user/' . $user->id); ?>" class="btn btn-danger">Usuń</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php $this->load->view('partials/footer'); ?>
