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
                    <th scope="col">Id</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($disease)):?>
                <?php foreach($disease as $row):?>
                    
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['disease'];?></td>
                    <td><?php echo anchor('disease/edit/'.$row['id'],'Edit',['class'=>'btn btn-primary']);?></td>
                    <td><?php echo anchor('disease/delete/'.$row['id'],'Delete',['class'=>'btn btn-danger']);?></td>
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