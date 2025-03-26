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
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/login'); ?>">Logowanie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/register'); ?>">Rejestracja</a>
      </li>
    </ul>
  </div>
</nav>
