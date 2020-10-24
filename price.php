
	<div class="page-title">
		<div class="container">
			<div class="padding-tb-120px">
				<h1>Our Pricing</h1>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Our Pricing</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="section padding-tb-100px section-ba-2">
		<div class="container">
			<!-- Title -->
			<div class="section-title margin-bottom-40px">
				<div class="row justify-content-center">
					<div class="col-lg-7">
						<div class="h2">Our Pricing</div>
					</div>
				</div>
			</div>
			<!-- // End Title -->

			<div class="row">

				<?php

                    $sql = " SELECT * FROM `price` order by price_id DESC LIMIT 4 ";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    $data = $query->rowCount();
                    while($fetch = $query->fetch()){
                ?>

                	<!-- item -->
					<div class="col-lg-3 col-md-6">
						<div class="price-table active">
							<div class="title main-color"><?php echo $fetch['price_name'];?></div>
							<div class="price"><span>$</span><?php echo $fetch['amount'];?></div>
							<div class="per-mile">PER MILE</div>
							<div class="item-img"><img src="admin/img/price/<?php echo $fetch['photo']?>" alt=""></div>
							<ul class="elements">
								<li><?php echo $fetch['descr'];?></li>
							</ul>
							<div class="padding-25px">
								<a href="#" class="nile-bottom sm-block">Info</a>
							</div>
						</div>
					</div>
					<!-- // end item -->

				<?php
                    }
                ?>

			</div>

		</div>
	</div>
