
<link href="<?php echo base_url()?>assets/css/detail.css" rel="stylesheet">

<body>


  <!-- Page Header -->
  <header class="masthead" style="background-image: url('<?php echo base_url()?>assets/img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Board with CodeIgniter</h1>
            <h2 class="subheading">자유롭게 글을 작성해 보세요<br>
			오늘 하루는 어떠셨나요?
			</h2>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p></p>

          <h2 class="section-heading">별에 담아 보내는 오늘의 일기</h2>
			
			<div class="diary">
				<div id="title"><?=$dd->title?></div>
				<div id="info">
					<div class="ib" id="name">작성자 : <?=$dd->pname?></div>
					<div class="ib"><?=substr($dd->regdate,0,7)?></div>
					<div class="ib right">조회수 : <?=$dd->cnt?></div>
				</div>
				<hr>
				<div id="content"><?=$dd->content?></div>
				<?php if($dd->upfile!=null) { ?>
				<div id="img"><img src='../../../imgup/<?=$dd->upfile?>'/></div>
				<?php } ?>
				<div class="golist right">
					<a href="../../Post">목록으로</a>
				<?php  
					if($dd->pname == $this->session->userdata('pname')) { ?>
					|<a href="../../Post/modify/<?=$dd->id?>
">수정</a>|
					<a href="../../Post/delete/<?=$dd->id?>">삭제</a>
				<?php } ?>
				</div>
            <img class="img-fluid" src="<?php echo base_url()?>assets/img/post-galaxy.jpg" alt="">
          <span class="caption text-muted">If tou come at four in the afternoon, I'll begin to be happy by three.</span>
        </div>
      </div>
    </div>
  </article>

  <hr>


  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url()?>assets/js/clean-blog.min.js"></script>

</body>

</html>
