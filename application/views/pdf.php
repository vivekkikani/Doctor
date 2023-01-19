<html>
    <head>
    <title>Hospital Bille</title>
    <style type="text/css">
		table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			}

			tr:nth-child(even) {
			  background-color: #dddddd;
			}
			img{
				max-width: 50px; height: auto; display: block;
			}
	</style>
</head>
<body>
    <div>
        <h1>Hospital Bill</h1>
    </div>
    <table>
        <thead>
            <tr>
                <td scope="col">Patients Name</td>
                <td scope="col"><?=$admit_details ['patientname']?></td>
            </tr>

            <tr>
                <td scope="col">Age</td>
                <td scope="col"><?=$admit_details ['age']?></td>
            </tr>

            <tr>
                <td scope="col">Gender</td>
                <td scope="col"><?php $gender = $admit_details['gender']?>
                    <?php if($gender == 1) { ?>
                        <a>Male</a>
                    <?php } else if($gender == 2) { ?>
                        <a>Female</a>
                    <?php } else { ?>
                        <a>Other</a>
                    <?php }?> 
                </td>
            </tr>

            <tr>
                <td scope="col">Patients Phone No</td>
                <td scope="col"><?=$admit_details ['phoneno']?></td>
            </tr>

            <tr>
                <td scope="col">Disease Name</td>
                <td scope="col"><?=$admit_details ['disease']?></td>
            </tr>

            <tr>
                <td scope="col">Doctors Name</td>
                <td scope="col"><?=$admit_details ['doctorname']?></td>
            </tr>

            <tr>
                <td scope="col">Doctors Specialization</td>
                <td scope="col"><?=$admit_details ['specialization']?></td>
            </tr>

            <tr>
                <td scope="col">Admit Date</td>
                <td scope="col"><?=date("d-m-Y", strtotime ($admit_details['admitdate']));?></td>
            </tr>

            <tr>
                <td scope="col">Dischar Date</td>
                <td scope="col"><?= date("d-m-Y", strtotime ($admit_details['dischardate']));?></td>
            </tr>

            <tr>
                <td scope="col">Fee</td>
                <td scope="col"><?=$admit_details ['fee']?></td>
            </tr>

        </thead>
    </table>
</body>
</html> 