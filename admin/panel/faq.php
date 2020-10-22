   <?php
   //Starting Query...

    if(ISSET($_POST['new_schedule'])){
        try {
            $f_tittle = $_POST['f_tittle'];
            $f_descr = $_POST['f_descr'];
                        
                //for new Schedule..
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = " INSERT INTO `faq`(`tittle`, `details`) VALUES ('$f_tittle','$f_descr') ";
                $conn->exec($sql);
                $lastId = $conn->lastInsertId();
                
              // $message=" Worship Schedule Added Successfully";
                 echo '<script language="javascript">
                      alert(" New FAQ Successfully Created ");
                      window.location.href = "index.php?faq";
                      </script>';
                
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
                
                $conn = null;
                header('location: index.php?faq');
             }
        
    ?>
 
   
<?php
     // Delete package....
     if(ISSET($_GET['delete_worship'])){
        $sql = $conn->prepare("DELETE from `faq` WHERE `faq_id`='".$_GET['delete_worship']."' ");
        $sql->execute();
     }
    
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
                                    <button type="button" class="btn btn-primary mb-1 " data-toggle="modal" data-target="#smallmodal">
                                        New FAQ
                                    </button>
                                        <div class="card-title">
                                            <h3 class="text-center"><strong>Frequently Asked Questions (FAQ's)</strong> </h3>
                                            
                                        </div>
                                        <hr>

                                        <div class="table-stats order-table ov-h">
                                            <table id="bootstrap-data-table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tittle</th>
                                                        <th>Details</th>
                                                        <th>date</th>
                                                        <th>Action</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $no=0;
                                                        $sql = " SELECT * FROM `faq` ORDER BY faq_id DESC ";
                                                        $query = $conn->prepare($sql);
                                                        $query->execute();
                                                            
                                                            while($fetch = $query->fetch()){
                                                                $faq_id=$fetch['faq_id'];
                                                                $no +=1;
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><?php echo $fetch['tittle']?></td>
                                                        <td><?php echo $fetch['details']?></td>
                                                        <td><?php echo $fetch['date']?></td>
                                                        <td>
                                                            <a href="index.php?edit_faq&faq_id=<?php echo $faq_id;?>" title="Edit FAQ" onclick="if(!confirm('Do you really want to Edit This FAQ ?'))return false;else return true;"><i class='menu-icon fa fa-file'></i> Edit</a>

                                                                -

                                                            <a href="index.php?faq&delete_worship=<?php echo $sched_id;?>" onclick="if(!confirm('Do you really want to delete This FAQ ?'))return false;else return true;" title="Delete Schedule"><i class='menu-icon fa fa-trash'></i> Delete</a>
                                                           
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                           </table>
                                        </div>
                                        

                            <hr>


                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /# card -->
            </div><!-- /# column -->
        </div><!-- .animated -->
    </div>

<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">New FAQ </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_validation" method="POST" action="">
                <div class="modal-body">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">FAQ Tittle</label>
                            <input type="text" class="form-control" name="f_tittle" required >                            
                        </div>
                    </div>
                    
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Description</label>
                            <textarea rows="5" class="form-control" name="f_descr" required></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="new_schedule" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>