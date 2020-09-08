
<?php

/*<script>
    function redirect(){
        window.location = "final.php";
    }
</script>*/
session_start();
//ob_start();
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'config.php';
$error = '';

/////////
$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$college = trim($_POST["college"]);
$dept = trim($_POST["dept"]);
$yr = trim($_POST["year"]);
$accomodation = trim($_POST["accomodation"]);
$mobile = trim($_POST["mobile"]);

/////////
$i=0;
foreach($_POST['TechEvent'] as $selected){
   $i++; 
}
$j=0;
foreach($_POST['NonTechEvent'] as $selected){
   $j++; 
}
if($i == 0 && $j == 0 ){
    require_once("errorpages/506.html");
}elseif($i > 3 || $j > 2 ){
    require_once("errorpages/505.html");
}else{
////////

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}
function create_file($path,$name,$email,$dept,$college,$yr,$mobile,$accomodation,$regtime)
{
  $objPHPExcel = new PHPExcel();
  if(file_exists($path))
  {
    $objPHPExcel = PHPExcel_IOFactory::load($path);
  }
    $objPHPExcel->setActiveSheetIndex(0);
  $row = $objPHPExcel->getActiveSheet()->getHighestRow();
  if($row == 1)
  {
    $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(15);
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, 'ID');
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, 'Name');
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, 'College');
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, 'Department');
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, 'Year');
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, 'Email');
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, 'Mobile');
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$row, 'Accomodation');
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$row, 'RegTime');
  }
  $id = $row;
  $row = $row+1;
  $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $id);
  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $name);
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
  $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $college);
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
  $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $dept);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $yr);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $email);
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
  $objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, $mobile);
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
  $objPHPExcel->getActiveSheet()->SetCellValue('H'.$row, $accomodation);
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
  $objPHPExcel->getActiveSheet()->SetCellValue('I'.$row, $regtime);
  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(40);
  $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
  $objWriter->save($path);
  return $id;
}
function create_specific_file($path,$id,$name,$email,$dept,$college,$yr,$mobile,$accomodation,$regtime)
{
  $objPHPExcel = new PHPExcel();
  if(file_exists($path))
  {
    $objPHPExcel = PHPExcel_IOFactory::load($path);
  }
  $objPHPExcel->setActiveSheetIndex(0);
  $row = $objPHPExcel->getActiveSheet()->getHighestRow();
  if($row == 1)
  {
    $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(15);
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, 'ID');
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, 'Name');
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, 'College');
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, 'Department');
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, 'Year');
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, 'Email');
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, 'Mobile');
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$row, 'Accomodation');
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$row, 'RegTime');
  }
  $row = $row+1;
  $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $id);
  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $name);
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
  $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $college);
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
  $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $dept);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $yr);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $email);
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
  $objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, $mobile);
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
  $objPHPExcel->getActiveSheet()->SetCellValue('H'.$row, $accomodation);
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
  $objPHPExcel->getActiveSheet()->SetCellValue('I'.$row, $regtime);
  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(40);
  $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
  $objWriter->save($path);
  return $row-1;
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $regtime=$_POST["regtime"];
  $sql = "SELECT * FROM details WHERE email = ?";
  if($stmt = mysqli_prepare($link, $sql))
  {
    mysqli_stmt_bind_param($stmt, "s", $email);           
    if(mysqli_stmt_execute($stmt))
    {
      mysqli_stmt_store_result($stmt);                
      if(mysqli_stmt_num_rows($stmt) >= 1)
      {
        require_once("errorpages/500.html");
        //header("location: errorpages/500.html");            
      }
      else
      {
        $path = "downloads//total.xlsx";
        $id = create_file($path,$name,$email,$dept,$college,$yr,$mobile,$accomodation,$regtime);
        $te_1 = "";
        $te_2 = "";
        $te_3 = "";
        $te_4 = "";
        //$te_5 = "";
        $nte_1 = "";
        $nte_2 = "";
        $nte_3 = "";
        if(!empty($_POST['TechEvent']))
        {
          foreach($_POST['TechEvent'] as $selected)
          {
            $path = "downloads//".$selected.".xlsx";
            $row = create_specific_file($path,$id,$name,$email,$dept,$college,$yr,$mobile,$accomodation,$regtime);
            if($selected == "humblefoolz"){
                $te_1 = "yes";
            }//else if($selected == "Code Relley"){
               // $te_2 = "yes";
            //}
            else if($selected == "webuiduo"){
                $te_2 = "yes";
            }else if($selected == "inovate"){
                $te_3 = "yes";
            }else if($selected == "trickytrail"){
                $te_4 = "yes";
            } 
          }
        }
        if(!empty($_POST['NonTechEvent']))
        {
          foreach($_POST['NonTechEvent'] as $selected)
          {
            $path = "downloads//".$selected.".xlsx";
            $row = create_specific_file($path,$id,$name,$email,$dept,$college,$yr,$mobile,$accomodation,$regtime);
            if($selected == "cricbidd"){
                $nte_1 = "yes";
            }else if($selected == "blitzbrigade"){
                $nte_2 = "yes";
            }else if($selected == "shuttersnap"){
                $nte_3 = "yes";
            }
          }
        }
        $sql = "INSERT INTO details (excel_id, email, mobile, name, dept, clg, year, accomodation, regtime, te_1, te_2, te_3, te_4, nte_1, nte_2, nte_3) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
        //echo "-----------------thiru 111111111111";
        if($stmt1 = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt1,"ssssssssssssssss", $id, $email, $mobile, $name, $dept, $college, $yr, $accomodation, $regtime, $te_1, $te_2, $te_3, $te_4, $nte_1, $nte_2, $nte_3);            
            if($res = mysqli_stmt_execute($stmt1))
            {
               mysqli_stmt_close($stmt1);
               mysqli_stmt_close($stmt);
               mysqli_close($link);
              //header("Location: final.php");
             // echo "-----------------thiru 22222222";
             
             //to display final message.
             require_once("final.php");
             
             $_SESSION['reg_id']=$id;
             $_SESSION['techEvent']=$_POST['TechEvent'];
             $_SESSION['nonTechEvent']=$_POST['NonTechEvent'];
             //to send email
             //$email_sent_boolean = false;
             include('mail.php');
            
            } 
            else
            {
                echo "ERROR in Insert stt: Something went wrong. Please try again later : ".mysqli_stmt_error($stmt1);
                    mysqli_stmt_close($stmt1);
                    mysqli_stmt_close($stmt);
                    mysqli_close($link);
                    require_once("final_error.php");
                    
                    //header("Location: 404.html");
                    //echo "-----------------thiru 333333333333333333";
            }
           // echo "-----------------thiru 44444444444444444444";
        }
        //echo "-----------------thiru 555555555555555555";
      }
    }
  }
}
}

//ob_end_clean();
?>