 <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="#">Action 1</a>
                <a class="dropdown-item" href="#">Action 2</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav mt-2 mt-lg-0">
            <?php if (Session::exist('isLoggedIn')): ?>
               <li class="nav-item active">
              <a class="nav-link" href="logout">Logout <span class="sr-only">(current)</span></a>
            </li>
            <?php else: ?>
                <li class="nav-item active">
              <a class="nav-link" href="register">Signup <span class="sr-only">(current)</span></a>
            </li>
              <li class="nav-item active">
              <a class="nav-link" href="login">Sigin <span class="sr-only">(current)</span></a>
            </li>
            <?php endif;?>


          </ul>

        </div>
      </nav>
