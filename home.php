<?php
session_start();
if (count($_FILES) > 0)
{
  if (is_uploaded_file($_FILES['userImage']['tmp_name']))
  {
    include "db.php";
    $Name = $_POST['Name'];
    $Regno = $_POST['RegistrationNumber'];
    $Branch = $_POST['Branch'];
    $Stream = $_POST['Stream'];
    $DOB = $_POST['DOB'];
    $BG = $_POST['BloodGroup'];
    $Address = $_POST['Address'];
    $Mobile = $_POST['Mobile'];
    $FM = $_POST['FatherMobile'];
    $MM = $_POST['MotherMobile'];
    $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
    $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

    $simple_string = $Regno;
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = $Name;
    $encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);

    $sql = "INSERT INTO student(Name,RegistrationNumber,Branch,Stream,DOB,BloodGroup,Address,Mobile,FatherMobile,MotherMobile,ImageData,ImageType,uniquekey) VALUES('$Name','$Regno','$Branch','$Stream','$DOB','$BG','$Address','$Mobile','$FM','$MM','{$imgData}','{$imageProperties['mime']}','$encryption')";
    $result = mysqli_query($con,$sql);
    $_SESSION['unique'] = $Regno;
    if(isset($result)){
      header("Location: actualhome.php");
    }else{
      header("Location: ok.php");
    }
  }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Document</title>
</head>
<body>
    <div class="login-box">
        <h2>ID-card Details</h2>
        <br>
        <form method="post" action="" enctype="multipart/form-data">
          <div class="user-box">
            <input type="text" name="Name" required="">
            <label for="Name">Name</label>
          </div>
          <div class="user-box">
            <input type="text" name="RegistrationNumber" required="">
            <label for="RegistrationNumber">RegistrationNumber</label>
          </div>
          <div class="user-box">
            <label for="Branch">Choose a Branch:</label>
            <br><br>
            <select name="Branch" id="Branch" required="">
                <option value="BE">B.E</option>
                <option value="BTech">B.Tech</option>
                <option value="BArch">B.Arch</option>
            </select>
          </div>
          <div class="user-box">
            <label for="Stream">Choose a Branch:</label>
            <br><br>
            <select name="Stream" id="Stream" required="">
                <option value="Aero">Aeronautical</option>
                <option value="Auto">Automobile</option>
                <option value="BioMed">Bio-Medical</option>
                <option value="Civil">Civil</option>
                <option value="CSC">Computer Science</option>
                <option value="CSCDesign">Computer Science and Design</option>
                <option value="EEE">Electrical and Electronics</option>
                <option value="ECE">Electronics and Communications</option>
                <option value="Mech">Mechanical</option>
                <option value="Mechatronics">Mechatronics</option>
                <option value="Robotics">Robotics</option>
                <option value="AIML">Artificial Intelligence & Machine Learning</option>
                <option value="BioTech">Bio Technology</option>
                <option value="Chem">Chemical Engineering</option>
                <option value="CSBS">Computer Science and Business Systems</option>
                <option value="FoodTech">Food Technology</option>
                <option value="IT">Information Technology</option>
                <option value="Arch">Architecture</option>
            </select>
          </div>
          <div class="user-box">
            <input type="date" name="DOB" required pattern="\d{4}-\d{2}-\d{2}">
            <label for="DOB">DOB</label>
          </div>
          <div class="user-box">
            <label for="BloodGroup">Choose BloodGroup:</label>
            <br><br>
            <select name="BloodGroup" id="BloodGroup" required="">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
          </div>
          <div class="user-box">
            <input type="text" name="Address" required="">
            <label for="Address">Address</label>
          </div>
          <div class="user-box">
            <input type="text" name="Mobile" required="">
            <label for="Mobile">Mobile</label>
          </div>
          <div class="user-box">
            <input type="text" name="FatherMobile" required="">
            <label for="FatherMobile">FatherMobile</label>
          </div>
          <div class="user-box">
            <input type="text" name="MotherMobile" required="">
            <label for="MotherMobile">MotherMobile</label>
          </div>
          <div class="user-box">
            <input type="file" name="userImage" class="inputFile">  
          </div>
          <button>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
          </button>
        </form>
    </div>
</body>
</html>
