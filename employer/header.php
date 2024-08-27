<?php
  if (session_status() == PHP_SESSION_NONE) 
  {
    // If the session is not already started, start the session
    session_start();
  }

  if(!isset($_SESSION["user_id"]))
  {
      header("Location:../employer_login.php");
  }
?>
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <h5>Hi, Welcome to you Our Website !</h5>
      </form>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg"> 
    </li>
    <li class="nav-item dropdown-lg">
    </li>
    <li class="nav-item language">
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="<?php echo "../employerImg/".$_SESSION["image"]; ?>" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="<?php echo "../employerImg/".$_SESSION["image"]; ?>" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?php echo $_SESSION["name"]; ?></h6>
            <p class="user-subtitle"><?php echo $_SESSION["username"]; ?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i> <a href="logout.php"><b>Logout</b></a> </li>
      </ul>
    </li>
  </ul>
</nav>
</header>