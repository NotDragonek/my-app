<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>

<div class="container mt-5">
    <h2>Rejestracja</h2>
    <!-- Komunikat o błędzie -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <!-- Formularz rejestracji -->
    <form method="POST" action="<?= base_url('auth/process_register'); ?>">
        <div class="form-group">
            <label for="username">Nazwa użytkownika</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Adres email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="imie">Imię</label>
            <input type="text" class="form-control" id="imie" name="imie" required>
        </div>
        <div class="form-group">
            <label for="nazwisko">Nazwisko</label>
            <input type="text" class="form-control" id="nazwisko" name="nazwisko" required>
        </div>
        <div class="form-group">
            <label for="adres">Adres</label>
            <input type="text" class="form-control" id="adres" name="adres" required>
        </div>
        <div class="form-group">
            <label for="role">Wybierz rolę</label>
            <select class="form-control" id="role" name="rola" required>
                <option value="user">User</option>
                <option value="seller">Seller</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Zarejestruj się</button>
    </form>

    <p>Masz już konto? <a href="<?= site_url('auth/login'); ?>">Zaloguj się</a></p>
</div>

<?= $this->include('partials/footer'); ?>
