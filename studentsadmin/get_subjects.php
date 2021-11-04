<?php
include('includes/config.php');
if(!empty($_POST["classid"])) 
{
 $cid=intval($_POST['classid']);
 if(!is_numeric($cid)){
 
 	echo htmlentities("invalid Class");exit;
 }
 else{
 $stmt = $dbh->prepare("SELECT SubjectCode FROM tblsubjects WHERE ClassId= :id ");
 $stmt->execute(array(':id' => $cid));
 ?><option value="">Select Class </option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
  <option value="<?php echo htmlentities($row['StudentId']); ?>"><?php echo htmlentities($row['StudentName']); ?></option>
  <?php
 }
}

}


?>



