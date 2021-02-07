     


    <div class="page-title">
        <div class="container">
            <div class="padding-tb-120px">
                <h1>Contact Us</h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Contact Us</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="padding-tb-100px">

        <div class="container">
            <div class="row">

                <div class="col-lg-6 sm-mb-45px">
                    <p> we'd love to hear from you ,whether you have a question about service,pricing or anything else, our team is ready to answer your question</p>
                    <h5>Phone :</h5>
                    <span class="d-block"><i class="fa fa-phone text-main-color margin-right-10px" aria-hidden="true"></i> +<?php echo $phone; ?></span>
                    <span class="d-block sm-mb-30px"><i class="fa fa-mobile text-main-color margin-right-10px" aria-hidden="true"></i> +<?php echo $mobile; ?></span>
                    <h5 class="margin-top-20px">Address :</h5>
                    <span class="d-block sm-mb-30px"><i class="fa fa-map text-main-color margin-right-10px" aria-hidden="true"></i><?php echo $address; ?> </span>
                    <h5 class="margin-top-20px">Email :</h5>
                    <span class="d-block sm-mb-30px"><i class="fa fa-envelope-open text-main-color margin-right-10px" aria-hidden="true"></i> <?php echo $email; ?> </span>
                </div>

                <div class="col-lg-6">
                    <div class="contact-modal">
                        <div class="background-main-color">
                            <div class="padding-30px">
                                <h3 class="padding-bottom-15px">Contact Us</h3>
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
        </div>

    </div>


    <div class="map-layout">
        <div class="map-embed">
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.4562098978577!2d30.10694580481216!3d-1.9716626021481962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca7cb464af60b%3A0x5ff34a70fabd6dab!2sKK%20345%20St%2C%20Kigali!5e0!3m2!1sen!2srw!4v1608850995861!5m2!1sen!2srw" width="100%" height="390" frameborder="0" style="border:0;" allowfullscreen="" ></iframe>

        </div>
        <!-- <div class="container">
            <div class="row">
                <div class="col-lg-8"></div>
                <div class="col-lg-4">
                    <div class="padding-tb-50px padding-lr-30px background-main-color pull-top-309px">
                        <div class="contact-info-map">
                            <div class="margin-bottom-30px">
                                <h2 class="title">Location</h2>
                                <div class="contact-info opacity-9">
                                    <div class="icon margin-top-5px"><span class="icon_pin_alt"></span></div>
                                    <div class="text">
                                        <span class="title-in">Location :</span> <br>
                                        <span class="font-weight-500 text-uppercase">KN 7 RD, KIGALI - RWANDA</span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="call_center margin-top-30px">
                                <h2 class="title">Call Center</h2>
                                <div class="contact-info opacity-9">
                                    <div class="icon  margin-top-5px"><span class="icon_phone"></span></div>
                                    <div class="text">
                                        <span class="title-in">Call Us :</span><br>
                                        <span class="font-weight-500 text-uppercase">+250780900900</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>