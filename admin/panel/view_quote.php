<?php



    $quote_id = $_GET['quote_id'];
    $sql = " SELECT * FROM `quote` where quote_id='$quote_id' ";
    $query = $conn->prepare($sql);
    $query->execute();
        
        while($fetch = $query->fetch()){
            $quote_id=$fetch['quote_id'];
?>

<div class="content">
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="mediumModalLabel"> Client Request Quote </h4>
                        </div>
                        <form id="form_validation" method="POST" action="" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h5 class="modal-title" id="mediumModalLabel"> Client Name : <B><?php echo $fetch['full_name']?></B></h5>
                                        <h5 class="modal-title" id="mediumModalLabel"> Client E-mail : <B><?php echo $fetch['email']?></B></h5>
                                        <h5 class="modal-title" id="mediumModalLabel"> Client Contact : <B><?php echo $fetch['tel']?></B></h5>                       
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label"> <b> Details </b> </label>
                                        <input type="hidden" class="form-control" name="serv_id" value="<?php echo $fetch['quote_id']?>" required >
                                        <p style="color: black;"><?php echo $fetch['detail']?></p>                            
                                    </div>
                                </div>

                                <?php
                                    }
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?quote" style="color: white;"> Cancel </a></button>
                                <button  type="submit" name="update_service" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>