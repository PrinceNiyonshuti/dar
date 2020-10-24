	<div class="page-title">
		<div class="container">
			<div class="padding-tb-120px">
				<h1>Our Team</h1>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Our Team</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="nile-about-section">
		<div class="container">
			<!-- Title -->
			<div class="section-title margin-bottom-40px">
				<div class="row justify-content-center">
					<div class="col-lg-7">
						<div class="h2">Team</div>
					</div>
				</div>
			</div>
			<!-- // End Title -->



			<div class="row">

				<?php

                    $sql = " SELECT * FROM `team` order by team_id DESC LIMIT 4 ";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    $data = $query->rowCount();
                    while($fetch = $query->fetch()){
                ?>

					<div class="col-lg-3 col-md-6">
						<div class="team layout-2">
							<div class="img-team">
								<img src="admin/img/team/<?php echo $fetch['profile']?>" alt="">
							</div>
							<div class="padding-20px">
								<h3><?php echo $fetch['full_name'];?></h3>
								<div class="jop"><?php echo $fetch['tittle'];?></div>
								<ul class="social-list">
									<li><a class="linkedin" href="<?php echo $fetch['linked_in'];?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									<li><a class="google" href="<?php echo $fetch['gmail'];?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
									<li><a class="twitter" href="<?php echo $fetch['twitter'];?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>

				<?php
                    }
                ?>

			</div>

		</div>
	</div>
