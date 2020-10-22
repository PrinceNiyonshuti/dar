
   <?php



    if(ISSET($_POST['update_details'])){
        try {

            $tax_detail = $_POST['tax_detail']; 
                        
            //for new Schedule..
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = " UPDATE tax_calculation SET detail='$tax_detail' WHERE tax_id='1' ";
            $conn->exec($sql);
            $lastId = $conn->lastInsertId();
            
          // $message=" Worship Schedule Added Successfully";
             echo '<script language="javascript">
                  alert(" Tax Calculation Successfully Updated ");
                  window.location.href = "index.php?tax";
                  </script>';
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
                
        $conn = null;
        header('location: index.php?tax');
    }
        
    ?>
 
   


<?php
    $sql = " SELECT * FROM `tax_calculation` ";
    $query = $conn->prepare($sql);
    $query->execute();
    $data = $query->rowCount();
    while($fetch = $query->fetch()){
        $tax=$fetch['tax_id'];

    if ($data <= 0) {
        ?>
            <div class="content">
                <div class="breadcrumbs">
                    <div class="breadcrumbs-inner">
                        <div class="row m-0">
                            <div class="col-sm-4">
                                <div class="page-header float-left">
                                    <div class="page-title">
                                        <h1>You Have to Add New Tax Calculation</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="page-header float-right">
                                    <div class="page-title">
                                        <ol class="breadcrumb text-right">
                                            <li>

                                                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#mediumModal">
                                                    New Tax Calculation
                                                </button>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
    } else {
        ?>

            <div class="content">
                <div class="animated fadeIn">
                    <!-- Widgets  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">                                
                                <div class="card-body">
                                    <div class="row">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center"><strong>Tax Calculations</strong> </h3>
                                        </div>
                                            <hr>

                                        <form id="form_validation" method="POST" action="">
                                            <div class="modal-body">

                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">Tax Calculation Details</label>
                                                        <textarea rows="8" class="form-control" name="tax_detail"  required>
                                                            <?php echo $fetch['detail']?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button  type="submit" name="update_details" class="btn btn-primary">Confirm</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /# card -->
                </div><!-- /# column -->
            </div><!-- .animated -->
        </div>
            
        <?php
    }
    
?>


<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">New Tax Calculation </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_validation" method="POST" action="">
                <div class="modal-body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Tax Calculation Details</label>
                            <textarea rows="8" class="form-control" name="tax_detail" required></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button  type="submit" name="new_schedule" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>