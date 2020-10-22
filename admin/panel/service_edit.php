<?php


    if(ISSET($_POST['update_service'])){
    try {
        $serv_id = $_POST['serv_id'];
        $serv_tittle = $_POST['serv_tittle'];
        $serv_descr = $_POST['serv_descr'];
                    
            //for new Schedule..
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = " UPDATE Service set tittle='$serv_tittle',details='$serv_descr' where service_id='$serv_id' ";
            $conn->exec($sql);
            $lastId = $conn->lastInsertId();
            
          // $message=" Worship Schedule Added Successfully";
             echo '<script language="javascript">
                  alert(" '.$serv_tittle.' Is Successfully Updated ");
                  window.location.href = "index.php?service";
                  </script>';
            
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            
            $conn = null;
            header('location: index.php?service');
         }

    $serv_id = $_GET['service_id'];
    $sql = " SELECT * FROM `service` where service_id='$serv_id' ";
    $query = $conn->prepare($sql);
    $query->execute();
        
        while($fetch = $query->fetch()){
            $service_id=$fetch['service_id'];
?>

<div class="content">
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"><B><?php echo $fetch['tittle']?></B> Service Details</h5>
                        </div>
                        <form id="form_validation" method="POST" action="">
                            <div class="modal-body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label"> Tittle</label>
                                        <input type="hidden" class="form-control" name="serv_id" value="<?php echo $fetch['service_id']?>" required >
                                        <input type="text" class="form-control" name="serv_tittle" value="<?php echo $fetch['tittle']?>" required >                            
                                    </div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Description</label>
                                        <textarea rows="7" class="form-control" name="serv_descr" required>
                                            <?php echo $fetch['details']?>
                                        </textarea>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button  type="submit" name="update_service" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>