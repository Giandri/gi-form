<div class="col-lg-3">
  <nav class="navbar navbar-expand-lg bg-light rounded border mt-2">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-start w-20" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 250px;">
        <div class="offcanvas-header">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1 ">
            <li class="nav-item">
              <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'home') ? 'active link-light' : 'link dark'; ?>" aria-current="page" href="index.php?x=home"> <i class="fa-solid fa-house"></i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'form') ? 'active link-light' : 'link dark'; ?>" href="index.php?x=form"><i class="fa-solid fa-file-lines"></i> Form</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'datasave') ? 'active link-light' : 'link dark'; ?>" href="index.php?x=datasave"><i class="fa-solid fa-database"></i> Datasave</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'report') ? 'active link-light' : 'link dark'; ?>" href="index.php?x=report"><i class="fa-solid fa-flag"></i> Report</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>