	<div class="page-title">
		<div class="container">
			<div class="padding-tb-120px">
				<h1>FAQS</h1>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Faqs</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="padding-tb-100px">

		<div class="container">
			<div class="row">
				<div class="col-lg-8">


					<div id="accordion" class="nile-accordion sm-mb-45px">

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

				<div class="col-lg-4">
					<div class="contact-modal">
						<div class="background-main-color">
							<div class="padding-30px">
								<h3 class="padding-bottom-15px">Contact US</h3>

                            	<div id="contact_data"></div>
                                <form method="post" action="#/" onsubmit="contact();return false;">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" id="full_name" name="f_name" placeholder="Name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="email" name="mail" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" name="send_message" class="btn btn-primary text-center  text-uppercase rounded-0 padding-15px ">SEND MESSAGE</button>
                                </form>

							</div>
						</div>
					</div>
				</div>


			</div>
			<!-- // row -->
		</div>
		<!-- // container -->

	</div>