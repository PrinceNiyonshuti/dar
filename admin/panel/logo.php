   <?php
   //Starting Query...

    if(ISSET($_POST['new_logo'])){
        try{

            $logo=$_FILES['logo'];
            $file_name = $_FILES['logo']['name'];
            $ext = strtolower(substr(strrchr($file_name, '.'), 1));
            $logo_location = $_FILES['logo']['tmp_name'];
            $new_logo_name = "logo". '.' . $ext;


            $favicon=$_FILES['favicon'];
            $file_name = $_FILES['favicon']['name'];
            $ext = strtolower(substr(strrchr($file_name, '.'), 1));
            $favicon_location = $_FILES['favicon']['tmp_name'];
            $new_favicon_name = "favicon". '.' . $ext;
            
            if( move_uploaded_file($logo_location, "../img/logo/" . $new_logo_name) && move_uploaded_file($favicon_location, "../img/logo/" . $new_favicon_name)){
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = " INSERT INTO `favicon`(`logo`, `favicon`) 
                VALUES ('$new_logo_name','$new_favicon_name') ";
                $conn->exec($sql);
                $lastId = $conn->lastInsertId();

                echo '<script language="javascript">
                    alert(" Site Logo Successfully Added ");
                    window.location.href = "index.php?logo";
                </script>';
                
            }else{
                echo '<script language="javascript">
                    alert(" Something Went Wrong ");
                    window.location.href = "index.php?logo";
                </script>';
            }
                
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
        $conn = null;
        header('location: index.php?logo');
    }


    if(ISSET($_POST['update_details'])){
        try {

            $logo=$_FILES['logo'];
            $file_name = $_FILES['logo']['name'];
            $ext = strtolower(substr(strrchr($file_name, '.'), 1));
            $logo_location = $_FILES['logo']['tmp_name'];
            $new_logo_name = "logo". '.' . $ext;


            $favicon=$_FILES['favicon'];
            $file_name = $_FILES['favicon']['name'];
            $ext = strtolower(substr(strrchr($file_name, '.'), 1));
            $favicon_location = $_FILES['favicon']['tmp_name'];
            $new_favicon_name = "favicon". '.' . $ext;
            
            if( move_uploaded_file($logo_location, "../img/logo/" . $new_logo_name) && move_uploaded_file($favicon_location, "../img/logo/" . $new_favicon_name)){
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = " UPDATE favicon SET logo='$new_logo_name',favicon='$new_favicon_name' WHERE fav_id='1' ";
                $conn->exec($sql);
                $lastId = $conn->lastInsertId();

                echo '<script language="javascript">
                    alert(" Site Logo Successfully Updated ");
                    window.location.href = "index.php?logo";
                </script>';
                
            }else{
                echo '<script language="javascript">
                    alert(" Sorry You Have To Update Both At the Same Time  ");
                    window.location.href = "index.php?logo";
                </script>';
            }
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
                
        $conn = null;
        header('location: index.php?site_details');
    }
        
    ?>
 
   


<?php
    $sql = " SELECT COUNT(*) AS results,fav_id,logo,favicon FROM `favicon` ORDER BY fav_id ";
    $query = $conn->prepare($sql);
    $query->execute();
    $data = $query->rowCount();
    while($fetch = $query->fetch()){
        $fav_id=$fetch['fav_id'];
        $results=$fetch['results'];
        $favicon=$fetch['favicon'];
        $logo=$fetch['logo'];
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
                                        <h1>You Have to Add Site Logo </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="page-header float-right">
                                    <div class="page-title">
                                        <ol class="breadcrumb text-right">
                                            <li>

                                                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#smallmodal" >
                                                    New Site Logo
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
                                            <h3 class="text-center"><strong>Update Site Logo And Favicon</strong> </h3>
                                        </div>
                                        <hr>
                                        <form id="form_validation" method="POST" action="" enctype="multipart/form-data">
                                            <div class="modal-body">

                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">Favicon</label>
                                                        <img class="align-self-center  mr-3" src="../img/logo/<?php echo $favicon; ?>" alt="Blog Cover" id="favicon" alt="Card image cap" width="100px" height="100px">
                                                        <br><br>
                                                        <input type='file' id="profile" name="favicon" onchange="readURL_1(this);" />                         
                                                    </div>
                                                </div>

                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">Logo</label>
                                                        <img class="align-self-center  mr-3" src="../img/logo/<?php echo $logo; ?>" alt="Blog Cover" id="blah" alt="Card image cap" width="195px" height="91px">
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
                <h5 class="modal-title" id="smallmodalLabel">New Logo </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_validation" method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Favicon</label>
                            <img class="align-self-center  mr-3" src="../asset/images/blog.png" alt="Blog Cover" id="favicon" alt="Card image cap" width="100px" height="100px">
                            <br><br>
                            <input type='file' id="profile" name="favicon" onchange="readURL_1(this);" />                         
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Logo</label>
                            <img class="align-self-center  mr-3" src="../asset/images/blog.png" alt="Blog Cover" id="blah" alt="Card image cap" width="195px" height="91px">
                            <br><br>
                            <input type='file' id="profile" name="logo" onchange="readURL(this);" />                         
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
                    .width(100)
                    .height(100);
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
                    .width(195)
                    .height(91);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    

</script>