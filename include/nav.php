<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand p-0" href="./">
      <img class="p-0" src="./assets/images/long.png" alt="Logo" width="135">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="./">ໜ້າຫຼັກ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./products.php">ລາຍການສິນຄ້າ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./service.php">ບໍລິການ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./about.php">ກ່ຽວກັບພວກເຮົາ</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">ເພີ່ມຕື່ມ</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./history.php">ປະຫວັດຄວາມເປັນມາ</a></li>
            <li><a class="dropdown-item" href="./organization.php">ໂຄງຮ່າງການຈັດຕັ້ງ</a></li>
            <li><a class="dropdown-item" href="./map.php">ແຜ່ນທີ່</a></li>
          </ul>
        </li>
      </ul>
      <div class="d-flex">
        <h3 class="text-secondary mt-1">
          ຍິນດີຕ້ອນຮັບທ່ານ: 
          <span class="text-info mx-2">
            <?php
              if(isset($_SESSION["Username"]))
              {
                echo $_SESSION["Username"];
              }
            ?>
          </span>
          <a href="./controllers/logout.control.php"><i class="fa-solid fa-right-from-bracket"></i></a>
        </h3>
      </div>
    </div>
  </div>
</nav>

