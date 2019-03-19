
<link href="<?php echo base_url()?>assets/css/contact.css" rel="stylesheet">
	
<body>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('<?php echo base_url()?>assets/img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Login</h1>
            <span class="subheading"></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p class="form-messeage">아직 아이디가 없으신가요?<br>
				  <a href="<?php echo base_url()?>bootstrap/Contact/join">여기를 눌러 가입해 주세요</a></p>
		<div class="contact-form">
			<form method="post">
				<table>
					<tr>
						<!-- set_value는 이 전에 입력했던 값을 그대로 다시 가져올 수 있게 함 -->
						<td><input type="text" name="pid" placeholder="아이디" value="<?=set_value('pid')?>">
						<br>
						<!--form_error은 에러 메세지를 가지고 옴-->
							<div class="error"><?=form_error('pid')?></div>
						</td>
					</tr>
					<tr>
						<td><input type="password" placeholder="비밀번호" name="pw1">
						<br>
							<div class="error"><?=form_error('pw1')?></div>
						</td>
					</tr>
					<tr>
						<td align="center">
							<input class="btn btn-primary float-right" type="submit" value="Login">
						</td>
					</tr>
				</table>
			</form>
		  </div>
      </div>
    </div>
  </div>

  <hr>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="<?php echo base_url()?>assets/js/jqBootstrapValidation.js"></script>
  <script src="<?php echo base_url()?>assets/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url()?>assets/js/clean-blog.min.js"></script>

</body>

</html>
