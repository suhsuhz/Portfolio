
<link href="<?php echo base_url()?>assets/css/post.css" rel="stylesheet">

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
				<form action="Post/insert" method="post" enctype="multipart/form-data">
					<?php if ($this->session->userdata('logged_in') == TRUE) { ?>
					<div class="diary-title">
						<label for="title">제목</label>
						<input type="text" name="title" placeholder="제목을 적어주세요">
					</div>
					<?php } else { ?>
					<div class="diary-title">
						<label for="title">제목</label>
						<input type="text" name="title" placeholder="로그인이 필요한 페이지입니다">
					</div>
					<?php } ?>
					<div class="diary-text">
						<label for="content">내용</label>
					<?php if ($this->session->userdata('logged_in') == TRUE) { ?>
						<textarea name="content" id="myTextarea" placeholder="내용을 적어주세요"></textarea>
					<?php }else { ?>
						<textarea name="content" id="myTextarea" placeholder="로그인이 필요한 페이지입니다"></textarea>
					<?php }?>
					</div>
					<div class="diary-file">
						<label for="file">업로드</label>
						<input type="file" id="file_button" name="upfile">
					</div>
					<?php if ($this->session->userdata('logged_in') == TRUE) { ?>
					<div class="diary-sub float-right">
						<input type="submit" value="보내기">	
					</div>
					<?php } ?>
				</form>
			</div>
			
			<div class="diary_list">
				<table>
					<colgroup>
    					<col style="width:10%;"/>
						<col style="width:50%;"/>
						<col style="width:20%;"/>
						<col style="width:20%;"/>
						<col />
		    	</colgroup>
					<tr id="title">
						<td class="center">No</td>
						<td>title</td>
						<td>name</td>
						<td class="center">date</td>
						<td class="center">hits</td>
					</tr>
					<?php foreach($dd as $i => $row) { ?>
					<tr id="list">
						<td class="center"><?=$i+1?></td>
						<td><a href="/CodeIgniter/bootstrap/Post/detail/<?=$row->id?>"><?=$row->title?></a></td>
						<td><?=$row->pname?></td>
						<td class="center"><?=substr($row->regdate,0,7)?></td>
						<td class="center"><?=$row->cnt?></td>	
					</tr>
					   <?php }?>
				</table>

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
