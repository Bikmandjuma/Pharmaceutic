<!DOCTYPE html>
<html lang="en">
<?php include 'header_links.php';?>
<body>

  <div class="site-wrap">

    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.html" class="js-logo-clone"><strong class="text-primary">Pharma</strong>ceutic</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <?php include 'NavBar.php';?>
          </div>
          <?php include 'ShoppingBag.php'; ?>
        </div>
      </div>
    </div>

  <h1>Content</h1>
    
  <?php include 'footer.php';?>

  </div>

  <?php include 'bottom_script_links.php'; ?>

</body>

</html>