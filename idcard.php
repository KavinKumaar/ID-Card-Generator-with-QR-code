<?php
session_start();
include "db.php";

$sql = "SELECT Name,RegistrationNumber,Branch,Stream,DOB,BloodGroup,Address,Mobile,FatherMobile,MotherMobile,ImageData,ImageType,Id,uniquekey FROM student WHERE uniquekey = '{$_GET['Id']}'";
$result = mysqli_query($con,$sql);
$row = $result -> fetch_assoc();
$_SESSION["qr"] = $_GET['Id'];
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="idcard.css">
    <script src="https://use.fontawesome.com/a6170fbd9a.js"></script>
    <title>
        Identity Card Design
    </title>
</head>
  
<body>
    <div class="card">
    <img id = "logo" class="card-img-top" src="idcard.png" alt=""><br><br>
    <div id = "clg-address">
        <strong><p>Rajalakshmi Nagar, Thandalam, Cennai-602 105</p></strong>
        <strong><p><i class="fa fa-phone" aria-hidden="true"></i>044-37181111/12 <i class="fa fa-hourglass-half" aria-hidden="true"></i>admin@rajalakshmi.edu.in</p></strong>
        <hr class="solid">
    </div>

        <h1 id="identity">IDENTITY CARD</h1>
        <div id="pictures">
            <img id = "image" src="imageView.php?Id=<?php echo $row["Id"];?>">
            <img id="qr" src="http://localhost/idcard/qrcodegenerator.php?Id=<?php echo $row["uniquekey"];?>">
        </div>
        <br>
        <br>
        <table>
            <tr>
                <td><strong>Name</strong></td>
                <td><?php echo $row['Name']; ?></td>
            </tr>
            <tr>
                <td><strong>REG.NO</strong></td>
                <td><?php echo $row['RegistrationNumber']; ?></td>
            </tr>
            <tr>
                <td><strong>Branch</strong></td>
                <td><?php echo $row['Branch']; ?></td>
            </tr>
            <tr>
                <td><strong>Stream</strong></td>
                <td><?php echo $row['Stream']; ?></td>
            </tr>
            <tr>
                <td><strong>DOB</strong></td>
                <td><?php echo $row['DOB']; ?></td>
            </tr>
            <tr>
                <td><strong>Blood Group</strong></td>
                <td><?php echo $row['BloodGroup']; ?></td>
            </tr>
            <tr>
                <td><strong>Address</strong></td>
                <td><?php echo $row['Address']; ?></td>
            </tr>
            <tr>
                <td><strong>Mobile No</strong></td>
                <td><?php echo $row['Mobile']; ?></td>
            </tr>
            <tr>
                <td><strong>Mother Mobile No</strong></td>
                <td><?php echo $row['MotherMobile']; ?></td>
            </tr>
            <tr>
                <td><strong>Father Mobile No</strong></td>
                <td><?php echo $row['FatherMobile']; ?></td>
            </tr>
        </table>
    </div>
</body>
 
</html>