        <div class="page-title">
        <div class="container">
            <div class="padding-tb-120px">
                <h1>Tax Calculation</h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Tax Calculation</li>
                </ol>
            </div>
        </div>
    </div>
    
    <!--============= About Us =============-->
    <div class="nile-about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 sm-mb-45px">

                    <div class="section-title-right text-main-color clearfix">
                        <div class="icon"><img src="assets/icons/title-icon-1.png" alt=""></div>
                        <h2 class="title-text">Our Tax Calculation</h2>
                    </div>
                    <div class="about-text margin-tb-25px">
                        <?php
                            $sql = " SELECT * FROM `tax_calculation` ";
                            $query = $conn->prepare($sql);
                            $query->execute();
                            $data = $query->rowCount();
                            while($fetch = $query->fetch()){
                                $detail=$fetch['detail'];
                            }
                            echo $detail;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============= //About Us =============-->
