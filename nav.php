<?php if( !isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) :?>
  <nav class="navbar navbar-expand-lg navbar-dark navbar-default">
    <a class="navbar-brand" href="home.php">GuestChef</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div class="dropdown">
            <button class="btn btn-secondary btn-warning dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sign In/Up!
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <button OnClick="location.href='signIn.php'" class="dropdown-item" type="button">Sign In</button>
              <button OnClick="location.href='signUp.php'" class="dropdown-item" type="button">Sign Up</button>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tryIt.php">Try it!</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
<?php else: ?>
  <nav class="navbar navbar-expand-lg navbar-dark navbar-default">
    <a class="navbar-brand" href="home.php">GuestChef</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div class="dropdown">
              <button class="btn btn-secondary btn-warning dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION["user"]; ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button OnClick="location.href='profile.php'" class="dropdown-item" type="button">Profile</button>
                <button OnClick="location.href='logout.php'" class="dropdown-item" type="button">Log Out</button>
              </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tryIt.php">Try it!</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php endif;?>
