<?php


    if(ISSET($_POST['update_team'])){
        try{

            $team_id = $_POST['team_id'];
            $f_name = $_POST['f_name'];            
            $tittle = $_POST['tittle'];
            $gmail = $_POST['gmail'];
            $linked_in = $_POST['linked_in'];
            $twitter = $_POST['twitter'];

            $profile=$_FILES['profile'];
            $file_name = $_FILES['profile']['name'];
            $ext = strtolower(substr(strrchr($file_name, '.'), 1));
            $file_location = $_FILES['profile']['tmp_name'];
            $new_file_name = $f_name . '.' . $ext;
            
            if(move_uploaded_file($file_location, "../img/team/" . $new_file_name)){
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = " UPDATE team set full_name='$f_name',tittle='$tittle',gmail='$gmail',linked_in='$linked_in',twitter='$twitter',profile='$new_file_name' where team_id='$team_id' ";
                $conn->exec($sql);
                $lastId = $conn->lastInsertId();

                echo '<script language="javascript">
                    alert("  '.$f_name.' Is Successfully Updated ");
                    window.location.href = "index.php?team";
                </script>';
                
            }else{
                echo '<script language="javascript">
                    alert(" Something Went Wrong ");
                    window.location.href = "index.php?team";
                </script>';
            }
                
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            
            $conn = null;
            header('location: index.php?team');
    }

    $team_id = $_GET['team_id'];
    $sql = " SELECT * FROM `team` where team_id='$team_id' ";
    $query = $conn->prepare($sql);
    $query->execute();
        
        while($fetch = $query->fetch()){
            $team_id=$fetch['team_id'];
?>

<div class="content">
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"><B><?php echo $fetch['full_name']?></B> Member Details</h5>
                        </div>
                        <form id="form_validation" method="POST" action="" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <img class="align-self-center  mr-3" src="../img/team/<?php echo $fetch['profile']?>" alt="Blog Cover" id="blah" alt="Card image cap" width="500px" height="400px">
                                        <br><br>
                                        <input type='file' id="profile" name="profile" onchange="readURL(this);" />                         
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Full Name</label>
                                        <input type="hidden" class="form-control" name="team_id" value="<?php echo $fetch['team_id']?>" required >
                                        <input type="text" class="form-control" name="f_name" value="<?php echo $fetch['full_name']?>" required >                            
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Job Tittle</label>
                                        <input type="text" class="form-control" name="tittle" value="<?php echo $fetch['tittle']?>" required >                            
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Gmail</label>
                                        <input type="text" class="form-control" name="gmail" value="<?php echo $fetch['gmail']?>" required >                            
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Linked In</label>
                                        <input type="text" class="form-control" name="linked_in" value="<?php echo $fetch['linked_in']?>" required >                            
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Twitter</label>
                                        <input type="text" class="form-control" name="twitter" value="<?php echo $fetch['twitter']?>" required >                            
                                    </div>
                                </div>

                                <?php
                                    }
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button  type="submit" name="update_team" class="btn btn-primary">Confirm</button>
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