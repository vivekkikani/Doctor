<?php $this->load->view('templates/header.php');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-65">
    <h6 class="mb-4">Covid Country List</h6>
    <table id="mytable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Country</th>
                    <th scope="col">Country Code </th>
                    <th scope="col">New Confirmed</th>
                    <th scope="col">Total Confirmed</th>
                    <th scope="col">New Deaths </th>
                    <th scope="col">Total Deaths</th>
                    <th scope="col">New Recovered</th>
                    <th scope="col">Total Recovered</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($Countries as $row):?>   
                <tr>
                    <td><?php echo $row['Country'];?></td>
                    <td><?php echo $row['CountryCode'];?></td>
                    <td><?php echo $row['NewConfirmed'];?></td>
                    <td><?php echo $row['TotalConfirmed'];?></td>
                    <td><?php echo $row['NewDeaths'];?></td>
                    <td><?php echo $row['TotalDeaths'];?></td>
                    <td><?php echo $row['NewRecovered'];?></td>
                    <td><?php echo $row['TotalRecovered'];?></td>
                <?php endforeach ;?>
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