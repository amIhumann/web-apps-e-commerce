<nav class="navbar navbar-default">
  <div class="nav navbar-nav">
    <div class="container">
      <ul class="nav navbar-nav">
        <li>
          <a href="profile.php">Profile</a>
        </li>
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>
          <a href="keranjang.php">Keranjang</a>
        </li>
        <!-- jika sudah login (ada session pelanggan ) -->
       <?php if (isset($_SESSION["pelanggan"])): ?>
         <li><a href="riwayat.php">History</a></li>
         <li><a href="logout.php">Logout</a> </li>
        <!-- selain itu jika belum login | blm ada session pelanggan -->
       <?php else : ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="daftar.php">Daftar</a></li>
       <?php endif  ?>
        <li>
          <a href="checkout.php">Checkout</a>
        </li>
      </ul>
      <form action="pencarian.php" method="get" class="navbar-form navbar-right">
        <input type="text" class="form-control" name="keyword">
        <button class="btn btn-primary">Search</button>
      </form>
      
    </div>
    </div>
  </div>
</nav>