<?php $this->load->view('templates/header.php');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-65">
    <h6 class="mb-4">Doctors List</h6>
    <table id="mytable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Doctors Name</th>
                    <th scope="col">Doctors Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Moblie No</th>
                    <th scope="col">Doctors Fee</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Available Time Doctor</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($doctors)):?>
                <?php foreach($doctors as $row):?>
                    
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['moblieno'];?></td>
                    <td><?php echo $row['fee'];?></td>
                    <td><?php echo $row['specialization'];?></td>
                    <td><?php echo $row['availabletimedoctor'];?></td>
                    <td><?php echo anchor('doctors/edit/'.$row['id'],'Edit',['class'=>'btn btn-primary']);?></td>
                    <td><?php echo anchor('doctors/delete/'.$row['id'],'Delete',['class'=>'btn btn-danger']);?></td>

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