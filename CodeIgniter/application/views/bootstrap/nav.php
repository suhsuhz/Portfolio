  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url()?>/bootstrap/Controll">Portfolio</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>/bootstrap/Controll">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>/bootstrap/About">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>/bootstrap/Post">Board</a>
          </li>
          <li class="nav-item">
			  <?php
			      if ($this->session->userdata('logged_in') == TRUE) { 
			  ?>
			  <a class="nav-link" href="<?php echo base_url()?>/bootstrap/Mypage">Logout</a>
			  <?php 
				} else { 
			  ?>
            <a class="nav-link" href="<?php echo base_url()?>/bootstrap/Contact">Login/Join</a>
			  <?php 
				  } 
			  ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>