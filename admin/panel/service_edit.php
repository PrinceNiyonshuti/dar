<?php


    if(ISSET($_POST['update_service'])){
    try {
        $serv_id = $_POST['serv_id'];
        $serv_tittle = $_POST['serv_tittle'];
        $serv_descr = $_POST['serv_descr'];

        $profile=$_FILES['profile'];
        $file_name = $_FILES['profile']['name'];
        $ext = strtolower(substr(strrchr($file_name, '.'), 1));
        $file_location = $_FILES['profile']['tmp_name'];
        $new_file_name = $serv_tittle . '.' . $ext;
        
        if(move_uploaded_file($file_location, "../img/service/" . $new_file_name)){
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = " UPDATE Service set tittle='$serv_tittle',details='$serv_descr',photo='$new_file_name' where service_id='$serv_id' ";
            $conn->exec($sql);
            $lastId = $conn->lastInsertId();

            echo '<script language="javascript">
                alert(" '.$serv_tittle.' Is Successfully Updated ");
                window.location.href = "index.php?service";
            </script>';
            
        }else{
            echo '<script language="javascript">
                alert(" Something Went Wrong ");
                window.location.href = "index.php?service";
            </script>';
        }
            
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
                        <form id="form_validation" method="POST" action="" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <img class="align-self-center  mr-3" src="../img/service/<?php echo $fetch['photo']?>" alt="Blog Cover" id="blah" alt="Card image cap" width="500px" height="400px">
                                        <br><br>
                                        <input type='file' id="profile" name="profile" onchange="readURL(this);" />                         
                                    </div>
                                </div>

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
<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(500)
                    .height(400);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>