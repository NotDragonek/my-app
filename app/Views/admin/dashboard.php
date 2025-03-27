<?= $this->include('partials/header'); ?>
<?= $this->include('partials/navbar'); ?>
<div class="container mt-5 mb-3">
        <h1 class="mb-4">Witaj w panelu administratora!</h1>
        <div class="list-group">
            <a href="<?= base_url('admin/products'); ?>" class="list-group-item list-group-item-action">Zarządzaj produktami</a>
            <a href="<?= base_url('admin/users'); ?>" class="list-group-item list-group-item-action">Zarządzaj użytkownikami</a>
        </div>
    </div>
<?= $this->include('partials/footer'); ?>