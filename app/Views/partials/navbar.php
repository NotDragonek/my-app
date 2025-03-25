<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= site_url('home'); ?>">Sklep Online</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('product/list'); ?>">Produkty</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('category'); ?>">Kategorie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('cart'); ?>">Koszyk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('auth/login'); ?>">Logowanie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('auth/register'); ?>">Rejestracja</a>
      </li>
    </ul>
  </div>
</nav>
