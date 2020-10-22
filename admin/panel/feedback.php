
 
   
<?php
     // Delete package....
     if(ISSET($_GET['delete_worship'])){
        $sql = $conn->prepare("DELETE from `contact` WHERE `contact_id`='".$_GET['delete_worship']."' ");
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
                                        <div class="card-title">
                                            <h3 class="text-center"><strong>Contact Feedback</strong> </h3>
                                            
                                        </div>
                                        <hr>

                                        <div class="table-stats order-table ov-h">
                                            <table id="bootstrap-data-table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Names</th>
                                                        <th>E-mail</th>
                                                        <th>Details</th>
                                                        <th>Action</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $no=0;
                                                        $sql = " SELECT * FROM `contact` ORDER BY contact_id DESC ";
                                                        $query = $conn->prepare($sql);
                                                        $query->execute();
                                                            
                                                            while($fetch = $query->fetch()){
                                                                $contact_id=$fetch['contact_id'];
                                                                $no +=1;
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><?php echo $fetch['full_name']?></td>
                                                        <td><?php echo $fetch['email']?></td>
                                                        <td><?php echo $fetch['detail']?></td>
                                                        <td>

                                                            <a href="index.php?feedback&delete_worship=<?php echo $contact_id;?>" onclick="if(!confirm('Do you really want to delete This Contact Feedback ?'))return false;else return true;" title="Delete Feedback"><i class='menu-icon fa fa-trash'></i> Delete</a>
                                                           
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
