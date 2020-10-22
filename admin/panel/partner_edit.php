<?php


    if(ISSET($_POST['update_partner'])){
        try{

        $partner_id = $_POST['partner_id'];
        $p_name = $_POST['p_name'];

        $profile=$_FILES['profile'];
        $file_name = $_FILES['profile']['name'];
        $ext = strtolower(substr(strrchr($file_name, '.'), 1));
        $file_location = $_FILES['profile']['tmp_name'];
        $new_file_name = $p_name . '.' . $ext;
        
        if(move_uploaded_file($file_location, "../img/partner/" . $new_file_name)){
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = " UPDATE partner set p_name='$p_name',logo='$new_file_name' where partner_id='$partner_id' ";
            $conn->exec($sql);
            $lastId = $conn->lastInsertId();

            echo '<script language="javascript">
                alert(" '.$p_name.' Is Successfully Updated ");
                window.location.href = "index.php?partner";
            </script>';
            
        }else{
            echo '<script language="javascript">
                alert(" Something Went Wrong ");
                window.location.href = "index.php?partner";
            </script>';
        }
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
        $conn = null;
        header('location: index.php?partner');
    }

    $partner_id = $_GET['partner_id'];
    $sql = " SELECT * FROM `partner` where partner_id='$partner_id' ";
    $query = $conn->prepare($sql);
    $query->execute();
        
        while($fetch = $query->fetch()){
            $partner_id=$fetch['partner_id'];
?>

<div class="content">
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"><B><?php echo $fetch['p_name']?></B> Partner Details</h5>
                        </div>
                        <form id="form_validation" method="POST" action="" enctype="multipart/form-data">
                            <div class="modal-body">
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <img class="align-self-center  mr-3" src="../img/partner/<?php echo $fetch['logo']?>" alt="Blog Cover" id="blah" alt="Card image cap" width="300px" height="290px">
                                        <br><br>
                                        <input type='file' id="profile" name="profile" onchange="readURL(this);" />
                                        <input type="hidden" class="form-control" name="partner_id" value="<?php echo $fetch['partner_id']?>" required >                         
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Partner Name</label>
                                        <input type="text" class="form-control" value="<?php echo $fetch['p_name']?>" name="p_name" required >                            
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button  type="submit" name="update_partner" class="btn btn-primary">Confirm</button>
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
                    .width(250)
                    .height(300);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>