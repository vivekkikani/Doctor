<?php $this->load->view('templates/header.php');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-65">
    <h6 class="mb-4">Medicine List</h6>
    <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Medicine Name</th>
                    <th scope="col">Medicine Price</th>
                    <th scope="col">Medicine Stock</th>
                    <th scope="col">Manufacturar Date</th>
                    <th scope="col">Expiry Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($medicine)):?>
                    <?php $date_now = time();?>
                <?php foreach($medicine as $row):?>
                  <?php  $date_convert = strtotime($row['expdate']);?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['mname'];?></td>
                    <td><?php echo $row['mprice'];?></td>
                    <td><?php echo $row['mstock'];?></td>
                    <td><?php echo date("d-m-Y", strtotime ($row['manufacturardate']));?></td>
                    
                    <td <?php if ($date_now > $date_convert){ echo 'style="color: red;"';}?>>
                        <?php echo date("d-m-Y", strtotime ($row['expdate']));?>
                    </td>
                    
                    <td><?php $status = $row['status']?>
                    <?php if($status == 0) { ?>
                        <a>Inactive</a>
                    <?php } else { ?>
                        <a>Active</a>
                    <?php }?> </td>
                    <td><?php echo anchor('medicine/edit/'.$row['id'],'Edit',['class'=>'btn btn-primary']);?></td>
                    <td><?php echo anchor('medicine/delete/'.$row['id'],'Delete',['class'=>'btn btn-danger delete']);?></td>

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

$(document).ready(function(){

    $('.delete').click(function (e) {
        e.preventDefault();
        confirmDialog = confirm('Are you sure ? you want to delete this data ?');
        if(confirmDialog)
        {
            var id = $(this).val();
            alert(id);
        }
    })
})
</script>
<?php $this->load->view('templates/footer.php');?>