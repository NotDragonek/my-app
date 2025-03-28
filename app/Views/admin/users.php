<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>

<div class="container mt-5 mb-3">
        <h1>Użytkownicy</h1>
        <a href="<?= base_url('admin/dashboard'); ?>" class="btn btn-primary mb-3">Powrót do dashboardu</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Rola</th>
                    <th>Akcja</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['imie']); ?></td>
                        <td><?= esc($user['nazwisko']); ?></td>
                        <td><?= esc($user['username']); ?></td>
                        <td><?= esc($user['email']); ?></td>
                        <td><?= esc($user['rola']); ?></td>
                        <td>
                            <a href="<?= base_url('admin/delete_user/'.$user['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')">Usuń</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?= $this->include('partials/footer'); ?>