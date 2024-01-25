<?php 

Session::pull('current_user');
Session::pull('isLoggedIn');
Session::destroy();

redirect("home");
