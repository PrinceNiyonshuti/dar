   <?php
   //Starting Query...

    if(ISSET($_POST['new_price'])){
        try{

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
                $sql = " INSERT INTO `team`(`full_name`, `tittle`, `gmail`,`linked_in`,`twitter`, `profile`) 
                VALUES ('$f_name','$tittle','$gmail','$linked_in','$twitter','$new_file_name') ";
                $conn->exec($sql);
                $lastId = $conn->lastInsertId();

                echo '<script language="javascript">
                    alert(" New Team Member Successfully Added ");
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
        
    ?>
 
   
<?php
     // Delete package....
     if(ISSET($_GET['delete_worship'])){
        $sql = $conn->prepare("DELETE from `price` WHERE `price_id`='".$_GET['delete_worship']."' ");
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
                                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#smallmodal">
                                            New Team Member
                                        </button>
                                        <div class="card-title">
                                            <h3 class="text-center"><strong>Team Members</strong>
                                            </h3>
                                            
                                        </div>
                                        <hr>

                                        <div class="table-stats order-table ov-h">
                                            <table id="bootstrap-data-table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Avatar</th>
                                                        <th>Name</th>
                                                        <th>Tittle</th>
                                                        <th>Social Medias</th>
                                                        <th>Action</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $no=0;
                                                        $sql = " SELECT * FROM `team` ORDER BY team_id DESC ";
                                                        $query = $conn->prepare($sql);
                                                        $query->execute();
                                                            
                                                            while($fetch = $query->fetch()){
                                                                $team_id=$fetch['team_id'];
                                                                $no +=1;
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><img src="../img/team/<?php echo $fetch['profile']?>" style="width: 160px;height: 76px;" ></td>
                                                        <td><?php echo $fetch['full_name']?></td>
                                                        <td><?php echo $fetch['tittle']?></td>
                                                        <td><?php echo $fetch['gmail']?></td>
                                                        <td>
                                                            <a href="index.php?edit_team&team_id=<?php echo $team_id;?>" title="Edit Team Member" onclick="if(!confirm('Do you really want to Edit This Team Member ?'))return false;else return true;"><i class='menu-icon fa fa-file'></i> Edit</a>

                                                                -

                                                            <a href="index.php?team&delete_worship=<?php echo $team_id;?>" onclick="if(!confirm('Do you really want to delete This Team Member ?'))return false;else return true;" title="Delete Partner"><i class='menu-icon fa fa-trash'></i> Delete</a>
                                                           
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
                <h5 class="modal-title" id="smallmodalLabel">New Team Member </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_validation" method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <img class="align-self-center  mr-3" src="../asset/images/blog.png" alt="Blog Cover" id="blah" alt="Card image cap" width="300px" height="290px">
                            <br><br>
                            <input type='file' id="profile" name="profile" onchange="readURL(this);" />                         
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="f_name" required >                            
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Job Tittle</label>
                            <input type="text" class="form-control" name="tittle" required >                            
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Gmail</label>
                            <input type="text" class="form-control" name="gmail" required >                            
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Linked In</label>
                            <input type="text" class="form-control" name="linked_in" required >                            
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Twitter</label>
                            <input type="text" class="form-control" name="twitter" required >                            
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="new_price" class="btn btn-primary">Confirm</button>
                </div>
            </form>
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