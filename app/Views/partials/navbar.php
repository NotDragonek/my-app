<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= base_url(''); ?>">Sklep Online</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('product/list'); ?>">Produkty</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('cart'); ?>">Koszyk</a>
      </li>

      <!-- Jeśli użytkownik jest zalogowany -->
      <?php if (session()->get('user_id')): ?>
        <!-- Przycisk panelu sprzedawcy, jeśli użytkownik to seller -->
        <?php if (session()->get('rola') === 'seller'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('seller'); ?>">Panel Sprzedawcy</a>
          </li>
        <?php endif; ?>
        <?php if (session()->get('rola') === 'admin'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/admin/dashboard'); ?>">Panel administratora</a>
          </li>
        <?php endif; ?>
        
        <!-- Przycisk Wyloguj -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth/logout'); ?>">Wyloguj</a>
        </li>
      <?php else: ?>
        <!-- Jeśli użytkownik nie jest zalogowany -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth/login'); ?>">Logowanie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth/register'); ?>">Rejestracja</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
