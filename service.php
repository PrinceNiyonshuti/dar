	<div class="page-title">
		<div class="container">
			<div class="padding-tb-120px">
				<h1>Services</h1>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Services</li>
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
						<div class="h2">Our Services</div>
					</div>
				</div>
			</div>
			<!-- // End Title -->

			<div class="row">

				<?php

                    $sql = " SELECT * FROM `service` order by service_id DESC LIMIT 4 ";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    $data = $query->rowCount();
                    while($fetch = $query->fetch()){
                ?>
                    
                    <div class="col-lg-6 sm-mb-45px">
						<div class="background-white thum-hover box-shadow hvr-float full-width wow fadeInUp">
							<div class="float-md-left margin-right-30px thum-xs">
								<img src="assets/img/cart-2.jpg" alt="">
							</div>
							<div class="padding-25px">
								<i class="fa fa-folder-open text-main-color"></i>Service
								<h3><a href="index.php?service_detail&data=<?php echo $fetch['service_id'];?>" class="d-block text-dark text-capitalize text-medium margin-tb-15px"><?php echo $fetch['tittle'];?></a></h3>
								<span class="margin-right-20px text-extra-small"><i class="fa fa-tasks text-grey-2"></i> <?php echo $fetch['details'];?></span>
								<span class="text-extra-small d-block d-sm-none"><i class="fa fa-clock text-grey-2"></i> Date :  <a href="#"><?php echo $fetch['gen_date'];?></a></span>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
                <?php
                    }
                ?>
				

			</div>
		</div>
	</div>