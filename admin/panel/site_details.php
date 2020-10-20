   <?php
   //Starting Query...

    if(ISSET($_POST['new_schedule'])){
        try {

            $s_descr = $_POST['s_descr']; 
            $s_phone = $_POST['s_phone'];
            $s_mob = $_POST['s_mob'];
            $s_address = $_POST['s_address'];
            $s_mail = $_POST['s_mail'];
            $s_about = $_POST['s_about'];
                        
            //for new Schedule..
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = " INSERT INTO `site_details`(`site_description`, `phone`, `mobile`, `address`, `email`, `about`) VALUES ('$s_descr','$s_phone','$s_mob','$s_address','$s_mail','$s_about') ";
            $conn->exec($sql);
            $lastId = $conn->lastInsertId();
            
          // $message=" Worship Schedule Added Successfully";
             echo '<script language="javascript">
                  alert(" Site Details Successfully Created ");
                  window.location.href = "index.php?site_details";
                  </script>';
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
                
        $conn = null;
        header('location: index.php?site_details');
    }


    if(ISSET($_POST['update_details'])){
        try {

            $s_descr = $_POST['s_descr']; 
            $s_phone = $_POST['s_phone'];
            $s_mob = $_POST['s_mob'];
            $s_address = $_POST['s_address'];
            $s_mail = $_POST['s_mail'];
            $s_about = $_POST['s_about'];
                        
            //for new Schedule..
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = " UPDATE site_details SET site_description='$s_descr',phone='$s_phone',mobile='$s_mob',address='$s_address',email='$s_mail',about='$s_about' WHERE detail_id='1' ";
            $conn->exec($sql);
            $lastId = $conn->lastInsertId();
            
          // $message=" Worship Schedule Added Successfully";
             echo '<script language="javascript">
                  alert(" Site Details Successfully Updated ");
                  window.location.href = "index.php?site_details";
                  </script>';
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
                
        $conn = null;
        header('location: index.php?site_details');
    }
        
    ?>
 
   


<?php
    $sql = " SELECT * FROM `site_details`  ";
    $query = $conn->prepare($sql);
    $query->execute();
    $data = $query->rowCount();
    while($fetch = $query->fetch()){
        $detail_id=$fetch['detail_id'];

    if ($data <= 0) {
        ?>
            <div class="content">
                <div class="breadcrumbs">
                    <div class="breadcrumbs-inner">
                        <div class="row m-0">
                            <div class="col-sm-4">
                                <div class="page-header float-left">
                                    <div class="page-title">
                                        <h1>You Have to Add Site Details <?php echo $data; ?></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="page-header float-right">
                                    <div class="page-title">
                                        <ol class="breadcrumb text-right">
                                            <li>

                                                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#mediumModal">
                                                    New Site Details
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
                                            <h3 class="text-center"><strong>General Details</strong> </h3>
                                        </div>
                                            <hr>

                                        <form id="form_validation" method="POST" action="">
                                            <div class="modal-body">

                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label"> Site Description</label>
                                                        <textarea style="text-align:left;" id="text-area" maxlength="200" rows="3" class="form-control" name="s_descr" required>
                                                            <?php echo $fetch['site_description']?>
                                                        </textarea>
                                                        <label id="characters-left"></label>                            
                                                    </div>
                                                </div>

                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label"> Site Phone Number</label>
                                                        <input type="Number" class="form-control" name="s_phone" value="<?php echo $fetch['phone']; ?>" required >                            
                                                    </div>
                                                </div>

                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label"> Site Second Phone Number</label>
                                                        <input type="Number" class="form-control" name="s_mob" value="<?php echo $fetch['mobile']; ?>" required >                            
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">Site Address</label>
                                                        <textarea rows="2" class="form-control" name="s_address"  required>
                                                            <?php echo $fetch['address']?>
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label"> Site E-mail</label>
                                                        <input type="email" class="form-control" name="s_mail" value="<?php echo $fetch['email']; ?>" required >                            
                                                    </div>
                                                </div>

                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">Who we are</label>
                                                        <textarea rows="8" class="form-control" name="s_about"  required>
                                                            <?php echo $fetch['about']?>
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
            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="false">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">General Site Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="form_validation" method="POST" action="">
                            <div class="modal-body">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label"> Site Description</label>
                                        <textarea rows="3" class="form-control" name="s_descr" required></textarea>                            
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label"> Site Phone Number</label>
                                        <input type="Number" class="form-control" name="s_phone" required >                            
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label"> Site Second Phone Number</label>
                                        <input type="Number" class="form-control" name="s_mob" required >                            
                                    </div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Site Address</label>
                                        <textarea rows="2" class="form-control" name="s_address" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label"> Site E-mail</label>
                                        <input type="email" class="form-control" name="s_mail" required >                            
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Who we are</label>
                                        <textarea rows="8" class="form-control" name="s_about" required></textarea>
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
        <?php
    }
    
?>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">General Site Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_validation" method="POST" action="">
                <div class="modal-body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label"> Site Description</label>
                            <textarea rows="3" class="form-control" name="s_descr" required></textarea>                            
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label"> Site Phone Number</label>
                            <input type="Number" class="form-control" name="s_phone" required >                            
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label"> Site Second Phone Number</label>
                            <input type="Number" class="form-control" name="s_mob" required >                            
                        </div>
                    </div>
                    
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Site Address</label>
                            <textarea rows="2" class="form-control" name="s_address" required></textarea>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label"> Site E-mail</label>
                            <input type="email" class="form-control" name="s_mail" required >                            
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Who we are</label>
                            <textarea rows="8" class="form-control" name="s_about" required></textarea>
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

<script type="text/javascript">
    var textarea = document.getElementById('text-area');

    window.onload = textareaLengthCheck();

    function textareaLengthCheck() {
        var textArea = textarea.value.length;
        var charactersLeft = 200 - textArea;
        var count = document.getElementById('characters-left');
        count.innerHTML = "Characters left: " + charactersLeft;
    }

    textarea.addEventListener('keyup', textareaLengthCheck, false);
    textarea.addEventListener('keydown', textareaLengthCheck, false);
</script>