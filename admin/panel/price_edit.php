<?php


    if(ISSET($_POST['update_price'])){
        try{

            $price_id = $_POST['price_id'];
            $price_name = $_POST['price_name'];
            $price_amount = $_POST['price_amount'];
            $descr = $_POST['descr'];

            $profile=$_FILES['profile'];
            $file_name = $_FILES['profile']['name'];
            $ext = strtolower(substr(strrchr($file_name, '.'), 1));
            $file_location = $_FILES['profile']['tmp_name'];
            $new_file_name = $price_name . '.' . $ext;
            
            if(move_uploaded_file($file_location, "../img/price/" . $new_file_name)){
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = " UPDATE price set price_name='$price_name',amount='$price_amount',descr='$descr',photo='$new_file_name' where price_id='$price_id'  ";
                $conn->exec($sql);
                $lastId = $conn->lastInsertId();

                echo '<script language="javascript">
                    alert("  '.$price_name.' Is Successfully Updated");
                    window.location.href = "index.php?price";
                </script>';
                
            }else{
                echo '<script language="javascript">
                    alert(" Something Went Wrong ");
                    window.location.href = "index.php?price";
                </script>';
            }
                
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
        $conn = null;
        header('location: index.php?price');
    }

    $price_id = $_GET['price_id'];
    $sql = " SELECT * FROM `price` where price_id='$price_id' ";
    $query = $conn->prepare($sql);
    $query->execute();
        
        while($fetch = $query->fetch()){
            $price_id=$fetch['price_id'];
?>

<div class="content">
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"><B><?php echo $fetch['price_name']?></B> Price Details</h5>
                        </div>
                        <form id="form_validation" method="POST" action="" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <img class="align-self-center  mr-3" src="../img/price/<?php echo $fetch['photo']?>" alt="Blog Cover" id="blah" alt="Card image cap" width="500px" height="400px">
                                        <br><br>
                                        <input type='file' id="profile" name="profile" onchange="readURL(this);" />                         
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label"> Price Name</label>
                                        <input type="hidden" class="form-control" name="price_id" value="<?php echo $fetch['service_id']?>" required >
                                        <input type="text" class="form-control" name="price_name" value="<?php echo $fetch['price_name']?>" required >                            
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label"> Price Amount </label>
                                        <input type="number" class="form-control" name="price_amount" value="<?php echo $fetch['amount']?>" required >                            
                                    </div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Description</label>
                                        <textarea rows="7" class="form-control" name="descr" required>
                                            <?php echo $fetch['descr']?>
                                        </textarea>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button  type="submit" name="update_price" class="btn btn-primary">Confirm</button>
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