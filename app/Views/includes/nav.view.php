<style type="text/css">

  nav ul li a {
    width: 110px;
    text-align: center;
    border-left: solid thin #eee;
    border-right: solid thin #fff;
  }

  nav ul li a:hover {
    background-color: grey;
    color: white !important;
  }
</style>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= ROOT ?>">
    <img src="<?= ROOT ?>/assets/logo.png" class=""  style="width: 80px;">
    <?= Auth::getSchool_name(); ?>
  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=ROOT?>">DASHBOARD</a>
        </li>
        <?php if (Auth::access('reception')): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=ROOT?>/schools">SCHOOL</a>
          </li>
        <?php endif ?>
        
        <?php if (Auth::access('reception')): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=ROOT?>/users">STAFF</a>
          </li>
        <?php endif ?>

        <?php if (Auth::access('reception')): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>/students">STUDENTS</a>
        </li>
        <?php endif ?>
        
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>/classes">CLASSES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>/tests">TESTS</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= Auth::getFirstname(); ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="<?=ROOT?>/profile">Profile</a></li>
            <li><a class="dropdown-item" href="<?=ROOT?>">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?=ROOT?>/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>