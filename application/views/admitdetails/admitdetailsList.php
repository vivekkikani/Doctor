<?php $this->load->view('templates/header.php');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-65">
    <h6 class="mb-4">Admit List</h6>
    <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Patients Name</th>
                    <th scope="col">Disease Name</th>
                    <th scope="col">Doctors Name</th>
                    <th scope="col">Admit Date</th>
                    <th scope="col">Dischar Date</th>
                    <th scope="col">Fee</th>
                    <th scope="col">Status</th>
                    <th scope="col">Pdf</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($admit_details)):?>
                <?php foreach($admit_details as $row):?>
                    
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['patientname'];?></td>
                    <td><?php echo $row['disease'];?></td>
                    <td><?php echo $row['doctorname'];?></td>
                    <td><?php echo date("d-m-Y", strtotime ($row['admitdate']));?></td>
                    <td><?php echo date("d-m-Y", strtotime ($row['dischardate']));?></td>
                    <td><?php echo $row['fee'];?></td>
                    <td><?php $status = $row['status']?>
                    <?php if($status == 0) { ?>
                        <a>Inactive</a>
                    <?php } else { ?>
                        <a>Active</a>
                    <?php }?> </td>
                    <td><?php echo anchor('admitdetails/download/'.$row['id'],'PDF',['class'=>'btn btn-primary']);?></td>
                    <td><?php echo anchor('admitdetails/view/'.$row['id'],'View',['class'=>'btn btn-primary']);?></td>
                    <td><?php echo anchor('admitdetails/edit/'.$row['id'],'Edit',['class'=>'btn btn-primary']);?></td>
                    <td><?php echo anchor('admitdetails/delete/'.$row['id'],'Delete',['class'=>'btn btn-danger delete']);?></td>

                    <?php endforeach ;?>
                    <?php endif;?>
                </tr> 

            </tbody>
        </table>
    </div>
    </div>
    
<script>
   $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<?php $this->load->view('templates/footer.php');?>