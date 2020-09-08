<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Registration | SYNSARA 2K19</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#cd2929">
        <meta name="mobile-web-app-capable" content="yes"/>

        <link rel="apple-touch-icon" href="img/plogo2k15.png">
        <link rel="shortcut icon" href="img/plogo2k15.png" type="image/x-icon" />
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/styler.css">
    </head>
    <body>
<?php
$name = trim($_GET["name"]);
$email = trim($_GET["email"]);
$college = trim($_GET["college"]);
$dept = trim($_GET["dept"]);
$yr = trim($_GET["year"]);
$accomodation = trim($_GET["accomodation"]);
$mobile = trim($_GET["mobile"]);

//echo  $name.$email.$college.$dept.$yr.$mobile;
/*if($_SERVER["REQUEST_METHOD"] == "POST")
{
	///// updating in excel files..........
	require_once 'upload.php';
}
*/
$date = new DateTime(); 
$dt=$date->format('Y-m-d H:i:s');
?>		

<script language="javascript" type="text/javascript">
        function TEOnClick() {
            var selectedRows = document.getElementsByName('TechEvent[]');
            var data = "";
            j=0;
            for (i=0; i<=3; i++){
                if (selectedRows[i].checked){
                    j++;
                    data=data+" - "+selectedRows[i].value;
                }
            }
            if(j>3){
                alert("In Technical Events : Please select only 3 events..");
                document.getElementsByName('TechEvent[]')[3].checked = false;
            }
        }
        
        function NTEOnClick() {
            var selectedRows = document.getElementsByName('NonTechEvent[]');
            var data = "";
            j=0;
            for (i=0; i<=2; i++){
                if (selectedRows[i].checked){
                    j++;
                    data=data+" - "+selectedRows[i].value;
                }
            }
            if(j>2){
                alert("In Non-Technical Events : Please select only 2 events..");
                document.getElementsByName('NonTechEvent[]')[2].checked = false;
            }
        }
    </script>
<form id="reg" method="post" action="upload.php">
    <!-- <div class="floating-logo">
        <a href="index.html"><img src="img/plogo2k15.png" alt="paradigm-logo" width="100%"/></a>
    </div> -->
    <div class="hide">
	<div class="top_bar" ></div>
    <div class="h_register">
      <div class= "reg-title">EVENT REGISTRATION<br><p>&diams; &diams; &diams;</p></div><br />
	  <div class="form" >
        <table width="100%"><td style="color:red">
		Name: </td><td><?php echo $name; ?></td></tr>
        <tr><td style="color:red">College: </td><td><?php echo $college; ?></td><td style="color:red">Department: </td><td><?php echo $dept; ?> &nbsp&nbsp&nbsp&nbsp&nbsp <span style="color:red">Year:</span> &nbsp <?php echo $yr; ?></td></tr>
        <tr><td style="color:red">E-mail: </td><td><?php echo $email; ?></td><td style="color:red">Mobile: </td><td><?php echo $mobile; ?></td></tr>
      </table>
	  </div>
	  <hr style="height:1px;border:none;color:#333;background-color:#333;" />
	  <marquee behavior="scroll" direction="left" class="form2">on participating in Hack-Una-Matata, you cannot participate in other events.</marquee>
	  <div id="techblock">
	  <div class="form3"><b>Technical Events(can participate only in any three)<br /> </b></div>
	  <div class="form2"><input type="checkbox" name="TechEvent[]" value="humblefoolz" onclick="TEOnClick()"/>&nbsp HumbleFoolz <br />
	  <!--<input type="checkbox" name="TechEvent[]" value="Code Relley" onclick="checkTE()" />&nbsp Code Relley <br />-->
	  <input type="checkbox" name="TechEvent[]" value="webuiduo" onclick="TEOnClick()"/>&nbsp Web UI Duo <br />
	  <!--&nbsp need to add fileupload for onselect...<br />-->
	  <input type="checkbox" name="TechEvent[]" value="inovate" onclick="TEOnClick()"/>&nbsp iNovate <br />
	  <input type="checkbox" name="TechEvent[]" value="trickytrail" onclick="TEOnClick()"/>&nbsp Tricky Trail <br /><br /></div></div>
	  <div id="nontechblock">
	  <div class="form3"><b>Non-Technical Events(can participate only in any two)<br /></b></div>
	  <div class="form2"><input type="checkbox" name="NonTechEvent[]" value="cricbidd" onclick="NTEOnClick()"/>&nbsp Cric Bidd <br />
	  <input type="checkbox" name="NonTechEvent[]" value="blitzbrigade" onclick="NTEOnClick()"/>&nbsp Blitz Brigade<br />
	  <input type="checkbox" name="NonTechEvent[]" value="shuttersnap" onclick="NTEOnClick()"/>&nbsp Shutter Snap <br /></div></div>
	  <!--echo  $name.$email.$college.$dept.$yr.$mobile;-->
	  <input type="hidden" name="name" value="<?php echo $name ?>" />
	  <input type="hidden" name="email" value="<?php echo $email ?>" />
	  <input type="hidden" name="college" value="<?php echo $college ?>" />
	  <input type="hidden" name="dept" value="<?php echo $dept ?>" />
	  <input type="hidden" name="year" value="<?php echo $yr ?>" />
	  <input type="hidden" name="mobile" value="<?php echo $mobile ?>" />
	  <input type="hidden" name="accomodation" value="<?php echo $accomodation ?>" />
	  <input type="hidden" name="regtime" value="<?php echo $dt ?>" />
      <div class="submit_block">
          <input type="submit" value="REGISTER" class="submit" name="submit" />
      </div>
	  </div>
	  </div>
    </div>
</form>		
</body>
</html>
