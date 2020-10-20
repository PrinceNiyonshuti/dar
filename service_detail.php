	<div class="page-title">
		<div class="container">
			<div class="padding-tb-120px">
				<h1>Cargo Transportation</h1>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Cargo Transportation</li>
				</ol>
			</div>
		</div>
	</div>


	<div class="padding-tb-100px">
		<div class="container">
			<div class="row">

				<div class="col-lg-9">
					<div class="service-slider-img margin-bottom-30px">
						<ul class="slider-1">
							<li><img src="assets/img/service_1.jpg" alt=""></li>
							<li><img src="assets/img/service_2.jpg" alt=""></li>
							<li><img src="assets/img/service_3.jpg" alt=""></li>
						</ul>
					</div>

					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>

					<h2>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</h2>

					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
					</p>


					<div id="accordion" class="nile-accordion margin-top-30px sm-mb-45px">
						<?php
							$no=1;
							$check=1;
                            $sql = " SELECT * FROM `faq` order by faq_id DESC  ";
                            $query = $conn->prepare($sql);
                            $query->execute();
                            $data = $query->rowCount();
                            while($fetch = $query->fetch()){
                            	$no +=1;
                            	$check +=1;
                        ?>

                        	<div class="card">
								<div class="card-header" id="<?php echo $no; ?>">
									<h5 class="mb-0">
										<button class="btn btn-block btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $no; ?>" aria-expanded="false" aria-controls="collapse<?php echo $no; ?>"><i class="fa fa-info"></i> <?php echo $fetch['tittle']; ?></button>
									</h5>
								</div>
								<div id="collapse<?php echo $no; ?>" class="collapse" aria-labelledby="<?php echo $no; ?>" data-parent="#accordion">
									<div class="card-body">
										<?php echo $fetch['details']; ?>
									</div>
								</div>
							</div>
                        <?php
                            }
                        ?>
					</div>



				</div>

				<div class="col-lg-3">

					<div class="background-main-color margin-bottom-40px">
						<div class="services-list">
							<ul>
								<li><a href="service-single.html">Air Freight</a></li>
								<li><a href="service-single.html">Ocean Freight</a></li>
								<li><a href="service-single.html">Packaging and Storage</a></li>
								<li class="active"><a href="service-single.html">Cargo Transportation </a></li>
								<li><a href="service-single.html">Fast Delivery</a></li>
								<li><a href="service-single.html">Railroad Transportation</a></li>
							</ul>
						</div>
					</div>




					<div class="background-white margin-bottom-40px">
						<div class="nile-widget contact-widget">
							<div class="padding-30px">
								<div class="margin-bottom-60px">
									<h2 class="title">Location</h2>
									<div class="contact-info opacity-9">
										<div class="icon margin-top-5px"><span class="icon_pin_alt"></span></div>
										<div class="text">
											<span class="title-in">Location :</span> <br>
											<span class="font-weight-500 text-uppercase"><?php echo $address; ?></span>
										</div>
									</div>
								</div>
								<div class="call_center">
									<h2 class="title">Call Center</h2>
									<div class="contact-info opacity-9">
										<div class="icon  margin-top-5px"><span class="icon_phone"></span></div>
										<div class="text">
											<span class="title-in">Call Us :</span><br>
											<span class="font-weight-500 text-uppercase">+<?php echo $phone; ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="contact-modal">
						<div class="background-grey-4 text-white">
							<div class="padding-30px">
								<h3 class="padding-bottom-15px">Contact Us</h3>

								<div id="contact_data"></div>
                                <form method="post" action="#/" onsubmit="contact();return false;">
									<div class="form-row">
										<div class="form-group col-md-12">
											<label>Full Name</label>
											<input type="text" class="form-control" id="full_name" placeholder="Name" required>
										</div>
										<div class="form-group col-md-12">
											<label>Email</label>
											<input type="email" class="form-control" id="email" placeholder="Email" required>
										</div>
									</div>
									<div class="form-group">
										<label>Message</label>
										<textarea class="form-control" id="message" rows="3" required></textarea>
									</div>
									<button type="submit" name="send_message" class="btn background-main-color text-white text-center  text-uppercase rounded-0 padding-15px ">SEND MESSAGE</button>
								</form>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>


	<div class="call-action ba-1">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 padding-tb-15px">
					<h2>Unbeatable Trucking and Transport Services</h2>
					<div class="text">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</div>
				</div>
				<div class="col-lg-5">
					<div class="row">
						<div class="col-lg-4 col-md-4 sm-mb-45px">
							<a href="#" class="action-bottom layout-1">
								<img src="assets/icons/small-icon-1.png" alt=""> 
								<h4>Tell Friend</h4>
							</a>
						</div>
						<div class="col-lg-4 col-md-4 sm-mb-45px">
							<a href="#" class="action-bottom layout-1">
								<img src="assets/icons/small-icon-2.png" alt=""> 
								<h4>Read More</h4>
							</a>
						</div>
						<div class="col-lg-4 col-md-4">
							<a href="#" class="action-bottom layout-1">
								<img src="assets/icons/small-icon-3.png" alt=""> 
								<h4>Contact Us</h4>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	