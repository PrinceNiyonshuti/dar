<?php


    if(ISSET($_POST['update_faq'])){
    try {
        $serv_id = $_POST['serv_id'];
        $serv_tittle = $_POST['serv_tittle'];
        $serv_descr = $_POST['serv_descr'];
                    
            //for new Schedule..
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = " UPDATE faq set tittle='$serv_tittle',details='$serv_descr' where faq_id='$serv_id' ";
            $conn->exec($sql);
            $lastId = $conn->lastInsertId();
            
          // $message=" Worship Schedule Added Successfully";
             echo '<script language="javascript">
                  alert(" '.$serv_tittle.' Is Successfully Updated ");
                  window.location.href = "index.php?faq";
                  </script>';
            
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            
            $conn = null;
            header('location: index.php?faq');
         }

    $faq_id = $_GET['faq_id'];
    $sql = " SELECT * FROM `faq` where faq_id='$faq_id' ";
    $query = $conn->prepare($sql);
    $query->execute();
        
        while($fetch = $query->fetch()){
            $faq_id=$fetch['faq_id'];
?>

<div class="content">
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"><B><?php echo $fetch['tittle']?></B> FAQ Details</h5>
                        </div>
                        <form id="form_validation" method="POST" action="">
                            <div class="modal-body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label"> Tittle</label>
                                        <input type="hidden" class="form-control" name="serv_id" value="<?php echo $fetch['faq_id']?>" required >
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
                                <button  type="submit" name="update_faq" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>