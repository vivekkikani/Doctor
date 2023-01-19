<?php $this->load->view('templates/header.php');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-65">
    <h6 class="mb-4">Patients List</h6>
    <table id="mytable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Patients Name</th>
                    <th scope="col">Patients Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">Status</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($patients)):?>
                <?php foreach($patients as $row):?>
                    
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['age'];?></td>
                    <td><?php $gender = $row['gender']?>
                    <?php if($gender == 1) { ?>
                        <a>Male</a>
                    <?php } else if($gender == 2) { ?>
                        <a>Female</a>
                    <?php } else { ?>
                        <a>Other</a>
                    <?php }?> </td>

                    <td><?php echo $row['phoneno'];?></td>
                    <td><?php $status = $row['status']?>
                    <?php if($status == 0) { ?>
                        <a>Inactive</a>
                    <?php } else { ?>
                        <a>Active</a>
                    <?php }?> </td>

                    <td><?php echo anchor('patients/view/'.$row['id'],'View',['class'=>'btn btn-primary']);?></td>
                    <td><?php echo anchor('patients/edit/'.$row['id'],'Edit',['class'=>'btn btn-primary']);?></td>
                    <td><?php echo anchor('patients/delete/'.$row['id'],'Delete',['class'=>'btn btn-danger']);?></td>
                    <?php endforeach ;?>
                    <?php endif;?>
                </tr> 

            </tbody>
        </table>
    </div>
    </div>
    
<script>
   $(document).ready(function () {
    $('#mytable').DataTable();
});
</script>
<?php $this->load->view('templates/footer.php');?>