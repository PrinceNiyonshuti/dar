   <?php
   //Starting Query...

    if(ISSET($_POST['new_logo'])){
        try{

            $slide_1=$_FILES['slide_1'];
            $file_name = $_FILES['slide_1']['name'];
            $ext = strtolower(substr(strrchr($file_name, '.'), 1));
            $slide_1_location = $_FILES['slide_1']['tmp_name'];
            $new_slide_1_name = "slide_1". '.' . $ext;


            $slide_2=$_FILES['slide_2'];
            $file_name = $_FILES['slide_2']['name'];
            $ext = strtolower(substr(strrchr($file_name, '.'), 1));
            $slide_2_location = $_FILES['slide_2']['tmp_name'];
            $new_slide_2_name = "slide_2". '.' . $ext;
            
            if( move_uploaded_file($slide_1_location, "../img/slide/" . $new_slide_1_name) && move_uploaded_file($slide_2_location, "../img/slide/" . $new_slide_2_name)){
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = " INSERT INTO `slider`(`slide_1`, `slide_2`) 
                VALUES ('$new_slide_1_name','$new_slide_2_name') ";
                $conn->exec($sql);
                $lastId = $conn->lastInsertId();

                echo '<script language="javascript">
                    alert(" Site Land Marks Successfully Added ");
                    window.location.href = "index.php?land";
                </script>';
                
            }else{
                echo '<script language="javascript">
                    alert(" Something Went Wrong ");
                    window.location.href = "index.php?land";
                </script>';
            }
                
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
        $conn = null;
        header('location: index.php?land');
    }


    if(ISSET($_POST['update_details'])){
        try {

            $slide_1=$_FILES['slide_1'];
            $file_name = $_FILES['slide_1']['name'];
            $ext = strtolower(substr(strrchr($file_name, '.'), 1));
            $slide_1_location = $_FILES['slide_1']['tmp_name'];
            $new_slide_1_name = "slide_1". '.' . $ext;


            $slide_2=$_FILES['slide_2'];
            $file_name = $_FILES['slide_2']['name'];
            $ext = strtolower(substr(strrchr($file_name, '.'), 1));
            $slide_2_location = $_FILES['slide_2']['tmp_name'];
            $new_slide_2_name = "slide_2". '.' . $ext;
            
            if( move_uploaded_file($slide_1_location, "../img/slide/" . $new_slide_1_name) && move_uploaded_file($slide_2_location, "../img/slide/" . $new_slide_2_name)){
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = " UPDATE slider SET slide_1='$new_slide_1_name',slide_2='$new_slide_2_name' WHERE slide_id='1' ";
                $conn->exec($sql);
                $lastId = $conn->lastInsertId();

                echo '<script language="javascript">
                    alert(" Land Marks Successfully Updated ");
                    window.location.href = "index.php?land";
                </script>';
                
            }else{
                echo '<script language="javascript">
                    alert(" Sorry You Have To Update Both At the Same Time  ");
                    window.location.href = "index.php?land";
                </script>';
            }
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
                
        $conn = null;
        header('location: index.php?land');
    }
        
    ?>
 
   


<?php
    $sql = " SELECT COUNT(*) AS results,slide_id,slide_1,slide_2 FROM `slider` ORDER BY slide_id ";
    $query = $conn->prepare($sql);
    $query->execute();
    $data = $query->rowCount();
    while($fetch = $query->fetch()){
        $fav_id=$fetch['slide_id'];
        $results=$fetch['results'];
        $favicon=$fetch['slide_1'];
        $logo=$fetch['slide_2'];
    }

    if ($results <= 0) {
        ?>
            <div class="content">
                <div class="breadcrumbs">
                    <div class="breadcrumbs-inner">
                        <div class="row m-0">
                            <div class="col-sm-4">
                                <div class="page-header float-left">
                                    <div class="page-title">
                                        <h1>You Have to Add Land Marks </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="page-header float-right">
                                    <div class="page-title">
                                        <ol class="breadcrumb text-right">
                                            <li>

                                                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#smallmodal" >
                                                    New Land Marks
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
                                            <h3 class="text-center"><strong>Update Land Marks</strong> </h3>
                                        </div>
                                        <hr>
                                        <form id="form_validation" method="POST" action="" enctype="multipart/form-data">
                                            <div class="modal-body">

                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">First Land Mark</label>
                                                        <img class="align-self-center  mr-3" src="../img/slide/<?php echo $favicon; ?>" alt="Blog Cover" id="favicon" alt="Card image cap" width="400px" height="200px">
                                                        <br><br>
                                                        <input type='file' id="profile" name="favicon" onchange="readURL_1(this);" />                         
                                                    </div>
                                                </div>

                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">Second Land Mark</label>
                                                        <img class="align-self-center  mr-3" src="../img/slide/<?php echo $logo; ?>" alt="Blog Cover" id="blah" alt="Card image cap" width="400px" height="200px">
                                                        <br><br>
                                                        <input type='file' id="profile" name="logo" onchange="readURL(this);" />                         
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" name="update_details" class="btn btn-primary">Confirm</button>
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

<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">New Land Marks </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_validation" method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">First Land Mark</label>
                            <img class="align-self-center  mr-3" src="../asset/images/blog.png" alt="Blog Cover" id="favicon" alt="Card image cap" width="400px" height="200px">
                            <br><br>
                            <input type='file' id="profile" name="slide_1" onchange="readURL_1(this);" />                         
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Second Land Mark</label>
                            <img class="align-self-center  mr-3" src="../asset/images/blog.png" alt="Blog Cover" id="blah" alt="Card image cap" width="400px" height="200px">
                            <br><br>
                            <input type='file' id="profile" name="slide_2" onchange="readURL(this);" />                         
                        </div>
                    </div>

                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="new_logo" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    function readURL_1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#favicon')
                    .attr('src', e.target.result)
                    .width(400)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(400)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    

</script>