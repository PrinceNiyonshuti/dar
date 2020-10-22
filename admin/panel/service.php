   <?php
   //Starting Query...

    if(ISSET($_POST['new_schedule'])){
        try {
            $serv_tittle = $_POST['serv_tittle'];
            $serv_descr = $_POST['serv_descr'];
                        
                //for new Schedule..
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = " INSERT INTO `service`(`tittle`, `details`) VALUES ('$serv_tittle','$serv_descr') ";
                $conn->exec($sql);
                $lastId = $conn->lastInsertId();
                
              // $message=" Worship Schedule Added Successfully";
                 echo '<script language="javascript">
                      alert(" New Service Successfully Created ");
                      window.location.href = "index.php?service";
                      </script>';
                
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
                
                $conn = null;
                header('location: index.php?service');
             }
        
    ?>
 
   
<?php
     // Delete package....
     if(ISSET($_GET['delete_worship'])){
        $sql = $conn->prepare("DELETE from `service` WHERE `service_id`='".$_GET['delete_worship']."' ");
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
                                    <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#mediumModal" >
                                        New Service
                                    </button>
                                        <div class="card-title">
                                            <h3 class="text-center"><strong>Service</strong> </h3>
                                            
                                        </div>
                                        <hr>

                                        <div class="table-stats order-table ov-h">
                                            <table id="bootstrap-data-table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tittle</th>
                                                        <th>Details</th>
                                                        <th>Action</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $no=0;
                                                        $sql = " SELECT * FROM `service` ORDER BY service_id DESC ";
                                                        $query = $conn->prepare($sql);
                                                        $query->execute();
                                                            
                                                            while($fetch = $query->fetch()){
                                                                $service_id=$fetch['service_id'];
                                                                $no +=1;
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><?php echo $fetch['tittle']?></td>
                                                        <td><?php echo $fetch['details']?></td>
                                                        <td>
                                                            <a href="index.php?edit_service&service_id=<?php echo $service_id;?>" title="Edit Service" onclick="if(!confirm('Do you really want to Edit This Service ?'))return false;else return true;"><i class='menu-icon fa fa-file'></i> Edit</a>

                                                                -

                                                            <a href="index.php?service&delete_worship=<?php echo $service_id;?>" onclick="if(!confirm('Do you really want to delete This Service ?'))return false;else return true;" title="Delete Service"><i class='menu-icon fa fa-trash'></i> Delete</a>
                                                           
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

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel"> Service Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_validation" method="POST" action="">
                <div class="modal-body">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <img class="align-self-center  mr-3" src="../asset/images/blog.png" alt="Blog Cover" id="blah" alt="Card image cap" width="300px" height="290px">
                            <br><br>
                            <input type='file' id="profile" name="profile" onchange="readURL(this);" multiple="" />                         
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label"> Tittle</label>
                            <input type="text" class="form-control" name="serv_tittle" required >                            
                        </div>
                    </div>
                    
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Description</label>
                            <textarea rows="7" class="form-control" name="serv_descr" required></textarea>
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
