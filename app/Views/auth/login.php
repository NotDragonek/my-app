<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>

<div class="container mt-5">
    <h2>Logowanie</h2>
    <!-- Komunikat o błędzie -->
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <!-- Formularz logowania -->
    <form method="POST" action="<?= site_url('auth/process_login'); ?>">
        <div class="form-group">
            <label for="username">Nazwa użytkownika</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Zaloguj się</button>
    </form>

    <p>Nie masz konta? <a href="<?= site_url('auth/register'); ?>">Zarejestruj się</a></p>
</div>

<?php $this->load->view('partials/footer'); ?>
