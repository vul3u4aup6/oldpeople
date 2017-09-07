<?php 
include_once('./database.php');
if(isset($_POST['token']) && $_POST['token'] == 'insertscore'){
		insertscore($conn,$_POST['name'],$_POST['sum'],$_POST['sans'],$_POST['dans'],$_POST['dans1'],$_POST['dans2']);
  }
  
 if(isset($_POST['token']) && $_POST['token'] == 'readscore'){
		readscore($conn);
  }

 if(isset($_POST['token']) && $_POST['token'] == 'read'){
		readmap($conn,$_POST['areas']);
  }
  if(isset($_POST['token']) && $_POST['token'] == 'readpark'){ 
	  $areas=$_POST['areas'];
	  readpark($conn,$areas);
  }
  if(isset($_POST['token']) && $_POST['token'] == 'readmap'){
	  
	  readmapall($conn);
  }
  if(isset($_POST['token']) && $_POST['token'] == 'back'){
	  
	  back($conn);
  }
  if(isset($_POST['token']) && $_POST['token'] == 'backarea'){
	  $area=$_POST['areas'];
	  backarea($conn,$area);
  }
  if(isset($_POST['token']) && $_POST['token'] == 'distance'){
	  distance($conn);
  }
    if(isset($_POST['token']) && $_POST['token'] == 'distancehouse'){
	  distancehouse($conn);
  }
 if(isset($_POST['token']) && $_POST['token'] == 'distanceschool'){
	  distanceschool($conn);
  }
   if(isset($_POST['token']) && $_POST['token'] == 'distanceaids'){
	  distanceaids($conn);
  }
   if(isset($_POST['token']) && $_POST['token'] == 'distancehospital'){
	  distancehospital($conn);
  }
  if(isset($_POST['token']) && $_POST['token'] == 'sickandhospital'){
	  sickandhospital($conn,$_POST['id']);
  }
   if(isset($_POST['token']) && $_POST['token'] == 'allbed'){
	  allbed($conn);
  }
  if(isset($_POST['token']) && $_POST['token'] == 'allbed1'){
	  allbed1($conn,$_POST['area']);
  }
    if(isset($_POST['token']) && $_POST['token'] == 'selectstaybed'){
	  selectstaybed($conn,$_POST['areas']);
  }
      if(isset($_POST['token']) && $_POST['token'] == 'selecthomebed'){
	  selecthomebed($conn,$_POST['areas']);
  }
        if(isset($_POST['token']) && $_POST['token'] == 'selectareabed'){
	  selectareabed($conn,$_POST['areas']);
  }
  if(isset($_POST['token']) && $_POST['token'] == 'dbscan'){
	 dbscan($conn);
  }
   if(isset($_POST['token']) && $_POST['token'] == 'dbscanarea'){
	 dbscanarea($conn,$_POST['center'],$_POST['orginalcenter'],$_POST['orginalla'],$_POST['orginallo']);
  }
   if(isset($_POST['token']) && $_POST['token'] == 'dbscaninsert'){
	 dbscaninsert($conn,$_POST['name'],$_POST['lat'],$_POST['lon'],$_POST['rad'],$_POST['center']);
  }
   if(isset($_POST['token']) && $_POST['token'] == 'dbscaninsert2'){
	 dbscaninsert2($conn,$_POST['name'],$_POST['lat'],$_POST['lon'],$_POST['rad'],$_POST['center'],$_POST['orgila'],$_POST['orgilo']);
  }
   if(isset($_POST['token']) && $_POST['token'] == 'dbscanmap'){
	 dbscanmap($conn);
  }
   if(isset($_POST['token']) && $_POST['token'] == 'dbscanmap2'){
	 dbscanmap2($conn);
  }
   if(isset($_POST['token']) && $_POST['token'] == 'insertcenter'){
	 insertcenter($conn,$_POST['center']);
  }
  if(isset($_POST['token']) && $_POST['token'] == 'selectstay'){
	 selectstay($conn);
  }
    if(isset($_POST['token']) && $_POST['token'] == 'selecthome'){
	 selecthome($conn);
  }
      if(isset($_POST['token']) && $_POST['token'] == 'selectarea'){
	 selectarea($conn);
  }
      if(isset($_POST['token']) && $_POST['token'] == 'selectstay1'){
	 selectstay1($conn,$_POST['area']);
  }
  if(isset($_POST['token']) && $_POST['token'] == 'distancepands'){
	 distancepands($conn);
  }
        if(isset($_POST['token']) && $_POST['token'] == 'selecthome1'){
	 selecthome1($conn,$_POST['area']);
  }
  if(isset($_POST['token']) && $_POST['token'] == 'selectarea1'){
	 selectarea1($conn,$_POST['area']);
  }
        if(isset($_POST['token']) && $_POST['token'] == 'onehome'){
	 onehome($conn,$_POST['category']);
  }
         if(isset($_POST['token']) && $_POST['token'] == 'selectstay2'){
	 selectstay2($conn);
  }
           if(isset($_POST['token']) && $_POST['token'] == 'selecthome2'){
	 selecthome2($conn);
  }
             if(isset($_POST['token']) && $_POST['token'] == 'selectarea2'){
	 selectarea2($conn);
  }
function distancepands($conn){
	$data2 = array();
	  $data3 = array();
	  $data4 = array();
	  $data5 = array();
	$sql4 = "Select * From  park";
				$result4 = mysqli_query($conn,$sql4) or die('MySQL query error') ;
				while($row4 = mysqli_fetch_assoc($result4)){
		
				
			
				$tmp['p_name']=$row4['p_name'];
				$tmp['p_latitude'] = $row4['p_lititude'];
				$tmp['p_longitude'] = $row4['p_longitude'];
				
				
				$data2[] = $tmp;
				
				
			
				}
				$sql5 = "Select * From school";
				$result5 = mysqli_query($conn,$sql5) or die('MySQL query error') ;
				while($row5 = mysqli_fetch_assoc($result5)){
		
				
			
				$tmp['p_name']=$row5['sc_name'];
				$tmp['p_latitude'] = $row5['sc_lititude'];
				$tmp['p_longitude'] = $row5['sc_longitude'];
				
				
				$data3[] = $tmp;
				
				
			
				}
				$data5=array_merge($data2,$data3);
				
	  echo json_encode($data5);
	
}
  function onehome($conn,$category){
	  $tmp=array();
	  $data=array();
	  $sql="Select * from hospiceindex where c_name='$category'";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){
		  $tmp['c_latitude']=$row[6];
		  $tmp['c_longitude']=$row[7];
		  $tmp['hospicename']=$row[1];
		  $data[]=$tmp;
	  }
	  echo json_encode($data);
  }
    function selectarea($conn){
	  $tmp=array();
	  $data = array();
	  $data1 = array();
	  $data2 = array();
	  $data3 = array();
	  $data4 = array();
	  $data5 = array();
	  /*$sql="Select * from hospiccontent3 where s3_home=1";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){*/
		 
		  $sql1='Select * From hospiceindex,hospiccontent3 where hospiceindex.c_difhome=2 AND hospiceindex.c_id=hospiccontent3.s3_id';
		  $result1=mysqli_query($conn,$sql1);
		  
		  while($row2=mysqli_fetch_assoc($result1)){
			  $tmp['hospicename']=$row2['c_name'];
					$tmp['c_latitude'] = $row2['c_latitude'];
					$tmp['c_longitude'] = $row2['c_longitude'];
					$tmp['score1']=$row2['c_score1'];
					$tmp['score2']=$row2['c_score2'];
					$tmp['score3']=$row2['c_score3'];
					$tmp['totalscore']=$row2['c_totalscore'];
					$tmp['schoolscore']=$row2['c_schoolscore'];
					$tmp['parkscore']=$row2['c_parkscore'];
					$tmp['hospitalscore']=$row2['c_hospitalscore'];
					  
					$tmp['servicescore']=$row2['c_servicescore'];
					  
					$tmp['carescore']=$row2['c_carescore'];
					$tmp['takescore']=$row2['c_takescore'];
					$tmp['carscore']=$row2['c_carscore'];
					$tmp['mainscore']=$row2['c_mainscore'];
					$tmp['bed']=$row2['s3_bed'];
					
					
				
				$data[] = $tmp;
			  
		 // }
		  
	  }
	  $sql3 = "Select * From  hospital";
				$result3 = mysqli_query($conn,$sql3) or die('MySQL query error') ;
				while($row3 = mysqli_fetch_assoc($result3)){
		
				
			
				$tmp['h_name']=$row3['h_name'];
				$tmp['h_latitude'] = $row3['h_lititude'];
				$tmp['h_longitude'] = $row3['h_longitude'];
				
				
				$data1[] = $tmp;
				
				
			
				}
				$sql4 = "Select * From  park";
				$result4 = mysqli_query($conn,$sql4) or die('MySQL query error') ;
				while($row4 = mysqli_fetch_assoc($result4)){
		
				
			
				$tmp['p_name']=$row4['p_name'];
				$tmp['p_latitude'] = $row4['p_lititude'];
				$tmp['p_longitude'] = $row4['p_longitude'];
				
				
				$data2[] = $tmp;
				
				
			
				}
				$sql5 = "Select * From school";
				$result5 = mysqli_query($conn,$sql5) or die('MySQL query error') ;
				while($row5 = mysqli_fetch_assoc($result5)){
		
				
			
				$tmp['sc_name']=$row5['sc_name'];
				$tmp['sc_latitude'] = $row5['sc_lititude'];
				$tmp['sc_longitude'] = $row5['sc_longitude'];
				
				
				$data3[] = $tmp;
				
				
			
				}
				$sql6 = "Select * From aids";
				$result6 = mysqli_query($conn,$sql6) or die('MySQL query error') ;
				while($row6 = mysqli_fetch_assoc($result6)){
		
				
			
				$tmp['a_name']=$row6['a_name'];
				$tmp['a_latitude'] = $row6['a_latitude'];
				$tmp['a_longitude'] = $row6['a_longitude'];
				
				
				$data4[] = $tmp;
				
				
			
				}
				
		$data5=array_merge($data,$data1,$data2,$data3,$data4);
		if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	  echo json_encode($data5);
  }
    function selecthome($conn){
	  $tmp=array();
	  $data = array();
	  $data1 = array();
	  $data2 = array();
	  $data3 = array();
	  $data4 = array();
	  $data5 = array();
	  /*$sql="Select * from hospiccontent3 where s3_home=1";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){*/
		 
		  $sql1='Select * From hospiceindex,hospiccontent3 where hospiceindex.c_difhome=3 AND hospiceindex.c_id=hospiccontent3.s3_id';
		  $result1=mysqli_query($conn,$sql1);
		  
		  while($row2=mysqli_fetch_assoc($result1)){
			  $tmp['hospicename']=$row2['c_name'];
					$tmp['c_latitude'] = $row2['c_latitude'];
					$tmp['c_longitude'] = $row2['c_longitude'];
					$tmp['score1']=$row2['c_score1'];
					$tmp['score2']=$row2['c_score2'];
					$tmp['score3']=$row2['c_score3'];
					$tmp['totalscore']=$row2['c_totalscore'];
					$tmp['schoolscore']=$row2['c_schoolscore'];
					$tmp['parkscore']=$row2['c_parkscore'];
					$tmp['hospitalscore']=$row2['c_hospitalscore'];
					  
					$tmp['servicescore']=$row2['c_servicescore'];
					  
					$tmp['carescore']=$row2['c_carescore'];
					$tmp['takescore']=$row2['c_takescore'];
					$tmp['carscore']=$row2['c_carscore'];
					$tmp['mainscore']=$row2['c_mainscore'];
					$tmp['bed']=$row2['s3_bed'];
					
					
				
				$data[] = $tmp;
			  
		 // }
		  
	  }
	  $sql3 = "Select * From  hospital";
				$result3 = mysqli_query($conn,$sql3) or die('MySQL query error') ;
				while($row3 = mysqli_fetch_assoc($result3)){
		
				
			
				$tmp['h_name']=$row3['h_name'];
				$tmp['h_latitude'] = $row3['h_lititude'];
				$tmp['h_longitude'] = $row3['h_longitude'];
				
				
				$data1[] = $tmp;
				
				
			
				}
				$sql4 = "Select * From  park";
				$result4 = mysqli_query($conn,$sql4) or die('MySQL query error') ;
				while($row4 = mysqli_fetch_assoc($result4)){
		
				
			
				$tmp['p_name']=$row4['p_name'];
				$tmp['p_latitude'] = $row4['p_lititude'];
				$tmp['p_longitude'] = $row4['p_longitude'];
				
				
				$data2[] = $tmp;
				
				
			
				}
				$sql5 = "Select * From school";
				$result5 = mysqli_query($conn,$sql5) or die('MySQL query error') ;
				while($row5 = mysqli_fetch_assoc($result5)){
		
				
			
				$tmp['sc_name']=$row5['sc_name'];
				$tmp['sc_latitude'] = $row5['sc_lititude'];
				$tmp['sc_longitude'] = $row5['sc_longitude'];
				
				
				$data3[] = $tmp;
				
				
			
				}
				$sql6 = "Select * From aids";
				$result6 = mysqli_query($conn,$sql6) or die('MySQL query error') ;
				while($row6 = mysqli_fetch_assoc($result6)){
		
				
			
				$tmp['a_name']=$row6['a_name'];
				$tmp['a_latitude'] = $row6['a_latitude'];
				$tmp['a_longitude'] = $row6['a_longitude'];
				
				
				$data4[] = $tmp;
				
				
			
				}
		$data5=array_merge($data,$data1,$data2,$data3,$data4);
		if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	  echo json_encode($data5);
  }
  
     function selecthome2($conn){
	 /* $sql="Select * from hospiccontent3 where s3_stay=0";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){*/
		 
		  $sql1='Select * From hospiceindex,hospiccontent3 where hospiceindex.c_difhome=3 AND hospiceindex.c_id=hospiccontent3.s3_bed';
		  $result1=mysqli_query($conn,$sql1);
		  
		  while($row2=mysqli_fetch_assoc($result1)){
			  $tmp['hospicename']=$row2['c_name'];
					$tmp['c_latitude'] = $row2['c_latitude'];
					$tmp['c_longitude'] = $row2['c_longitude'];
					$tmp['score1']=$row2['c_score1'];
					$tmp['score2']=$row2['c_score2'];
					$tmp['score3']=$row2['c_score3'];
					$tmp['totalscore']=$row2['c_totalscore'];
					$tmp['schoolscore']=$row2['c_schoolscore'];
					$tmp['parkscore']=$row2['c_parkscore'];
					$tmp['hospitalscore']=$row2['c_hospitalscore'];
					  
					$tmp['servicescore']=$row2['c_servicescore'];
					  
					$tmp['carescore']=$row2['c_carescore'];
					$tmp['takescore']=$row2['c_takescore'];
					$tmp['carscore']=$row2['c_carscore'];
					$tmp['mainscore']=$row2['c_mainscore'];
					$tmp['bed']=$row2['s3_bed'];
					
					
				
				$data[] = $tmp;
			  
		 // }
		  
	  }
	  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	  echo json_encode($data);
  }
    function selectarea2($conn){
	 /* $sql="Select * from hospiccontent3 where s3_stay=0";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){*/
		 
		  $sql1='Select * From hospiceindex,hospiccontent3 where hospiceindex.c_difhome=2 AND hospiceindex.c_id=hospiccontent3.s3_bed';
		  $result1=mysqli_query($conn,$sql1);
		  
		  while($row2=mysqli_fetch_assoc($result1)){
			  $tmp['hospicename']=$row2['c_name'];
					$tmp['c_latitude'] = $row2['c_latitude'];
					$tmp['c_longitude'] = $row2['c_longitude'];
					$tmp['score1']=$row2['c_score1'];
					$tmp['score2']=$row2['c_score2'];
					$tmp['score3']=$row2['c_score3'];
					$tmp['totalscore']=$row2['c_totalscore'];
					$tmp['schoolscore']=$row2['c_schoolscore'];
					$tmp['parkscore']=$row2['c_parkscore'];
					$tmp['hospitalscore']=$row2['c_hospitalscore'];
					  
					$tmp['servicescore']=$row2['c_servicescore'];
					  
					$tmp['carescore']=$row2['c_carescore'];
					$tmp['takescore']=$row2['c_takescore'];
					$tmp['carscore']=$row2['c_carscore'];
					$tmp['mainscore']=$row2['c_mainscore'];
					$tmp['bed']=$row2['s3_bed'];
					
					
				
				$data[] = $tmp;
			  
		 // }
		  
	  }
	  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	  echo json_encode($data);
  }
    function selectstay2($conn){
	/*  $sql="Select * from hospiccontent3 where s3_stay=1";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){*/
		 
		  $sql1='Select * From hospiceindex,hospiccontent3 where hospiceindex.c_difhome=1 AND hospiceindex.c_id=hospiccontent3.s3_id';
		  $result1=mysqli_query($conn,$sql1);
		  
		  while($row2=mysqli_fetch_assoc($result1)){
			  $tmp['hospicename']=$row2['c_name'];
					$tmp['c_latitude'] = $row2['c_latitude'];
					$tmp['c_longitude'] = $row2['c_longitude'];
					$tmp['score1']=$row2['c_score1'];
					$tmp['score2']=$row2['c_score2'];
					$tmp['score3']=$row2['c_score3'];
					$tmp['totalscore']=$row2['c_totalscore'];
					$tmp['schoolscore']=$row2['c_schoolscore'];
					$tmp['parkscore']=$row2['c_parkscore'];
					$tmp['hospitalscore']=$row2['c_hospitalscore'];
					  
					$tmp['servicescore']=$row2['c_servicescore'];
					  
					$tmp['carescore']=$row2['c_carescore'];
					$tmp['takescore']=$row2['c_takescore'];
					$tmp['carscore']=$row2['c_carscore'];
					$tmp['mainscore']=$row2['c_mainscore'];
					$tmp['bed']=$row2['s3_bed'];
					
					
				
				$data[] = $tmp;
			  
		//  }
		  
	  }
	  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	  echo json_encode($data);
  }
  function selectstay1($conn,$area){
	 /* $sql="Select * from hospiccontent3 where s3_stay=1";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){*/
		 $data=array();
		 $tmp=array();
		  $sql1='Select * From hospiceindex,hospiccontent3 where hospiceindex.c_difhome=1 and hospiceindex.c_postal="'.$area.'" AND hospiceindex.c_id=hospiccontent3.s3_id';
		  $result1=mysqli_query($conn,$sql1);
		  
		  while($row2=mysqli_fetch_assoc($result1)){
			  $tmp['hospicename']=$row2['c_name'];
					$tmp['c_latitude'] = $row2['c_latitude'];
					$tmp['c_longitude'] = $row2['c_longitude'];
					$tmp['score1']=$row2['c_score1'];
					$tmp['score2']=$row2['c_score2'];
					$tmp['score3']=$row2['c_score3'];
					$tmp['totalscore']=$row2['c_totalscore'];
					$tmp['schoolscore']=$row2['c_schoolscore'];
					$tmp['parkscore']=$row2['c_parkscore'];
					$tmp['hospitalscore']=$row2['c_hospitalscore'];
					  
					$tmp['servicescore']=$row2['c_servicescore'];
					  
					$tmp['carescore']=$row2['c_carescore'];
					$tmp['takescore']=$row2['c_takescore'];
					$tmp['carscore']=$row2['c_carscore'];
					$tmp['mainscore']=$row2['c_mainscore'];
					$tmp['bed']=$row2['s3_bed'];
					
					
				
				$data[] = $tmp;
			  
		 // }
		  
	  }
	  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	  echo json_encode($data);
  }
  function selectarea1($conn,$area){
	 /* $sql="Select * from hospiccontent3 where s3_stay=1";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){*/
		 $data=array();
		 $tmp=array();
		  $sql1='Select * From hospiceindex,hospiccontent3 where hospiceindex.c_difhome=2 and hospiceindex.c_postal="'.$area.'" AND hospiceindex.c_id=hospiccontent3.s3_id';
		  $result1=mysqli_query($conn,$sql1);
		  
		  while($row2=mysqli_fetch_assoc($result1)){
			  $tmp['hospicename']=$row2['c_name'];
					$tmp['c_latitude'] = $row2['c_latitude'];
					$tmp['c_longitude'] = $row2['c_longitude'];
					$tmp['score1']=$row2['c_score1'];
					$tmp['score2']=$row2['c_score2'];
					$tmp['score3']=$row2['c_score3'];
					$tmp['totalscore']=$row2['c_totalscore'];
					$tmp['schoolscore']=$row2['c_schoolscore'];
					$tmp['parkscore']=$row2['c_parkscore'];
					$tmp['hospitalscore']=$row2['c_hospitalscore'];
					  
					$tmp['servicescore']=$row2['c_servicescore'];
					  
					$tmp['carescore']=$row2['c_carescore'];
					$tmp['takescore']=$row2['c_takescore'];
					$tmp['carscore']=$row2['c_carscore'];
					$tmp['mainscore']=$row2['c_mainscore'];
					$tmp['bed']=$row2['s3_bed'];
					
					
				
				$data[] = $tmp;
			  
		 // }
		  
	  }
	  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	  echo json_encode($data);
  }
    function selecthome1($conn,$area){
		$data=array();
		$tmp=array();
	 /* $sql="Select * from hospiccontent3 where s3_home=1";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){*/
		 
		  $sql1='Select * From hospiceindex,hospiccontent3 where hospiceindex.c_difhome=3 and hospiceindex.c_postal="'.$area.'" AND hospiceindex.c_id=hospiccontent3.s3_id';
		  $result1=mysqli_query($conn,$sql1);
		  
		  while($row2=mysqli_fetch_assoc($result1)){
			  $tmp['hospicename']=$row2['c_name'];
					$tmp['c_latitude'] = $row2['c_latitude'];
					$tmp['c_longitude'] = $row2['c_longitude'];
					$tmp['score1']=$row2['c_score1'];
					$tmp['score2']=$row2['c_score2'];
					$tmp['score3']=$row2['c_score3'];
					$tmp['totalscore']=$row2['c_totalscore'];
					$tmp['schoolscore']=$row2['c_schoolscore'];
					$tmp['parkscore']=$row2['c_parkscore'];
					$tmp['hospitalscore']=$row2['c_hospitalscore'];
					  
					$tmp['servicescore']=$row2['c_servicescore'];
					  
					$tmp['carescore']=$row2['c_carescore'];
					$tmp['takescore']=$row2['c_takescore'];
					$tmp['carscore']=$row2['c_carscore'];
					$tmp['mainscore']=$row2['c_mainscore'];
					$tmp['bed']=$row2['s3_bed'];
					
					
				
				$data[] = $tmp;
			  
		 // }
		  
	  }
	  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	  echo json_encode($data);
  }
   function selectstaybed($conn,$area){
	   $tmp=array();
	  $data = array();
	  $data1 = array();
	  $data2 = array();
	  $data3 = array();
	  $data4 = array();
	  $data5 = array();
	 /* $sql="Select * from hospiccontent3 where s3_stay=1";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){*/
		 
		  $sql1='Select * From hospiceindex,hospiccontent3 where hospiceindex.c_difhome=1 and hospiceindex.c_postal="'.$area.'" AND hospiceindex.c_id=hospiccontent3.s3_id';
		  $result1=mysqli_query($conn,$sql1);
		  
		  while($row2=mysqli_fetch_assoc($result1)){
			  $tmp['hospicename']=$row2['c_name'];
					$tmp['c_latitude'] = $row2['c_latitude'];
					$tmp['c_longitude'] = $row2['c_longitude'];
					$tmp['score1']=$row2['c_score1'];
					$tmp['score2']=$row2['c_score2'];
					$tmp['score3']=$row2['c_score3'];
					$tmp['totalscore']=$row2['c_totalscore'];
					$tmp['schoolscore']=$row2['c_schoolscore'];
					$tmp['parkscore']=$row2['c_parkscore'];
					$tmp['hospitalscore']=$row2['c_hospitalscore'];
					  
					$tmp['servicescore']=$row2['c_servicescore'];
					  
					$tmp['carescore']=$row2['c_carescore'];
					$tmp['takescore']=$row2['c_takescore'];
					$tmp['carscore']=$row2['c_carscore'];
					$tmp['mainscore']=$row2['c_mainscore'];
					$tmp['bed']=$row2['s3_bed'];
					
					
				
				$data[] = $tmp;
			  
		 // }
		  
	  }
	  $sql3 = "Select * From  hospital where h_postal='$area'";
				$result3 = mysqli_query($conn,$sql3) or die('MySQL query error') ;
				while($row3 = mysqli_fetch_assoc($result3)){
		
				
			
				$tmp['h_name']=$row3['h_name'];
				$tmp['h_latitude'] = $row3['h_lititude'];
				$tmp['h_longitude'] = $row3['h_longitude'];
				
				
				$data1[] = $tmp;
				
				
			
				}
				$sql4 = "Select * From  park where p_postal='$area'";
				$result4 = mysqli_query($conn,$sql4) or die('MySQL query error') ;
				while($row4 = mysqli_fetch_assoc($result4)){
		
				
			
				$tmp['p_name']=$row4['p_name'];
				$tmp['p_latitude'] = $row4['p_lititude'];
				$tmp['p_longitude'] = $row4['p_longitude'];
				
				
				$data2[] = $tmp;
				
				
			
				}
				$sql5 = "Select * From school where sc_postal='$area'";
				$result5 = mysqli_query($conn,$sql5) or die('MySQL query error') ;
				while($row5 = mysqli_fetch_assoc($result5)){
		
				
			
				$tmp['sc_name']=$row5['sc_name'];
				$tmp['sc_latitude'] = $row5['sc_lititude'];
				$tmp['sc_longitude'] = $row5['sc_longitude'];
				
				
				$data3[] = $tmp;
				
				
			
				}
				$sql6 = "Select * From aids where a_postal='$area'";
				$result6 = mysqli_query($conn,$sql6) or die('MySQL query error') ;
				while($row6 = mysqli_fetch_assoc($result6)){
		
				
			
				$tmp['a_name']=$row6['a_name'];
				$tmp['a_latitude'] = $row6['a_latitude'];
				$tmp['a_longitude'] = $row6['a_longitude'];
				
				
				$data4[] = $tmp;
				
				
			
				}
		$data5=array_merge($data,$data1,$data2,$data3,$data4);
		if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	  echo json_encode($data5);
   }
     function selecthomebed($conn,$area){
	   $tmp=array();
	  $data = array();
	  $data1 = array();
	  $data2 = array();
	  $data3 = array();
	  $data4 = array();
	  $data5 = array();
	 /* $sql="Select * from hospiccontent3 where s3_home=1";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){*/
		 
		  $sql1='Select * From hospiceindex,hospiccontent3 where hospiceindex.c_difhome=3 and hospiceindex.c_postal="'.$area.'" AND hospiceindex.c_id=hospiccontent3.s3_id';
		  $result1=mysqli_query($conn,$sql1);
		  
		  while($row2=mysqli_fetch_assoc($result1)){
			  $tmp['hospicename']=$row2['c_name'];
					$tmp['c_latitude'] = $row2['c_latitude'];
					$tmp['c_longitude'] = $row2['c_longitude'];
					$tmp['score1']=$row2['c_score1'];
					$tmp['score2']=$row2['c_score2'];
					$tmp['score3']=$row2['c_score3'];
					$tmp['totalscore']=$row2['c_totalscore'];
					$tmp['schoolscore']=$row2['c_schoolscore'];
					$tmp['parkscore']=$row2['c_parkscore'];
					$tmp['hospitalscore']=$row2['c_hospitalscore'];
					  
					$tmp['servicescore']=$row2['c_servicescore'];
					  
					$tmp['carescore']=$row2['c_carescore'];
					$tmp['takescore']=$row2['c_takescore'];
					$tmp['carscore']=$row2['c_carscore'];
					$tmp['mainscore']=$row2['c_mainscore'];
					$tmp['bed']=$row2['s3_bed'];
					
					
				
				$data[] = $tmp;
			  
		 // }
		  
	  }
	  $sql3 = "Select * From  hospital where h_postal='$area'";
				$result3 = mysqli_query($conn,$sql3) or die('MySQL query error') ;
				while($row3 = mysqli_fetch_assoc($result3)){
		
				
			
				$tmp['h_name']=$row3['h_name'];
				$tmp['h_latitude'] = $row3['h_lititude'];
				$tmp['h_longitude'] = $row3['h_longitude'];
				
				
				$data1[] = $tmp;
				
				
			
				}
				$sql4 = "Select * From  park where p_postal='$area'";
				$result4 = mysqli_query($conn,$sql4) or die('MySQL query error') ;
				while($row4 = mysqli_fetch_assoc($result4)){
		
				
			
				$tmp['p_name']=$row4['p_name'];
				$tmp['p_latitude'] = $row4['p_lititude'];
				$tmp['p_longitude'] = $row4['p_longitude'];
				
				
				$data2[] = $tmp;
				
				
			
				}
				$sql5 = "Select * From school where sc_postal='$area'";
				$result5 = mysqli_query($conn,$sql5) or die('MySQL query error') ;
				while($row5 = mysqli_fetch_assoc($result5)){
		
				
			
				$tmp['sc_name']=$row5['sc_name'];
				$tmp['sc_latitude'] = $row5['sc_lititude'];
				$tmp['sc_longitude'] = $row5['sc_longitude'];
				
				
				$data3[] = $tmp;
				
				
			
				}
		$sql6 = "Select * From aids where a_postal='$area'";
				$result6 = mysqli_query($conn,$sql6) or die('MySQL query error') ;
				while($row6 = mysqli_fetch_assoc($result6)){
		
				
			
				$tmp['a_name']=$row6['a_name'];
				$tmp['a_latitude'] = $row6['a_latitude'];
				$tmp['a_longitude'] = $row6['a_longitude'];
				
				
				$data4[] = $tmp;
				
				
			
				}
		$data5=array_merge($data,$data1,$data2,$data3,$data4);
		if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	  echo json_encode($data5);
   }
    function selectareabed($conn,$area){
	   $tmp=array();
	  $data = array();
	  $data1 = array();
	  $data2 = array();
	  $data3 = array();
	  $data4 = array();
	   $data5 = array();
	 /* $sql="Select * from hospiccontent3 where s3_home=1";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){*/
		 
		  $sql1='Select * From hospiceindex,hospiccontent3 where hospiceindex.c_difhome=2 and hospiceindex.c_postal="'.$area.'" AND hospiceindex.c_id=hospiccontent3.s3_id';
		  $result1=mysqli_query($conn,$sql1);
		  
		  while($row2=mysqli_fetch_assoc($result1)){
			  $tmp['hospicename']=$row2['c_name'];
					$tmp['c_latitude'] = $row2['c_latitude'];
					$tmp['c_longitude'] = $row2['c_longitude'];
					$tmp['score1']=$row2['c_score1'];
					$tmp['score2']=$row2['c_score2'];
					$tmp['score3']=$row2['c_score3'];
					$tmp['totalscore']=$row2['c_totalscore'];
					$tmp['schoolscore']=$row2['c_schoolscore'];
					$tmp['parkscore']=$row2['c_parkscore'];
					$tmp['hospitalscore']=$row2['c_hospitalscore'];
					  
					$tmp['servicescore']=$row2['c_servicescore'];
					  
					$tmp['carescore']=$row2['c_carescore'];
					$tmp['takescore']=$row2['c_takescore'];
					$tmp['carscore']=$row2['c_carscore'];
					$tmp['mainscore']=$row2['c_mainscore'];
					$tmp['bed']=$row2['s3_bed'];
					
					
				
				$data[] = $tmp;
			  
		 // }
		  
	  }
	  $sql3 = "Select * From  hospital where h_postal='$area'";
				$result3 = mysqli_query($conn,$sql3) or die('MySQL query error') ;
				while($row3 = mysqli_fetch_assoc($result3)){
		
				
			
				$tmp['h_name']=$row3['h_name'];
				$tmp['h_latitude'] = $row3['h_lititude'];
				$tmp['h_longitude'] = $row3['h_longitude'];
				
				
				$data1[] = $tmp;
				
				
			
				}
				$sql4 = "Select * From  park where p_postal='$area'";
				$result4 = mysqli_query($conn,$sql4) or die('MySQL query error') ;
				while($row4 = mysqli_fetch_assoc($result4)){
		
				
			
				$tmp['p_name']=$row4['p_name'];
				$tmp['p_latitude'] = $row4['p_lititude'];
				$tmp['p_longitude'] = $row4['p_longitude'];
				
				
				$data2[] = $tmp;
				
				
			
				}
				$sql5 = "Select * From school where sc_postal='$area'";
				$result5 = mysqli_query($conn,$sql5) or die('MySQL query error') ;
				while($row5 = mysqli_fetch_assoc($result5)){
		
				
			
				$tmp['sc_name']=$row5['sc_name'];
				$tmp['sc_latitude'] = $row5['sc_lititude'];
				$tmp['sc_longitude'] = $row5['sc_longitude'];
				
				
				$data3[] = $tmp;
				
				
			
				}
		$sql6 = "Select * From aids where a_postal='$area'";
				$result6 = mysqli_query($conn,$sql6) or die('MySQL query error') ;
				while($row6 = mysqli_fetch_assoc($result6)){
		
				
			
				$tmp['a_name']=$row6['a_name'];
				$tmp['a_latitude'] = $row6['a_latitude'];
				$tmp['a_longitude'] = $row6['a_longitude'];
				
				
				$data4[] = $tmp;
				
				
			
				}
		$data5=array_merge($data,$data1,$data2,$data3,$data4);
		if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	  echo json_encode($data5);
   }
  function selectstay($conn){
	  $tmp=array();
	  $data = array();
	  $data1 = array();
	  $data2 = array();
	  $data3 = array();
	  $data4 = array();
	   $data5 = array();
	  /*$sql="Select * from hospiccontent3 where s3_stay=1";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){
		 */
		  $sql1='Select * From hospiceindex,hospiccontent3 where hospiceindex.c_difhome=1 AND hospiceindex.c_id=hospiccontent3.s3_id';
		  $result1=mysqli_query($conn,$sql1);
		  
		  while($row2=mysqli_fetch_assoc($result1)){
			  $tmp['hospicename']=$row2['c_name'];
					$tmp['c_latitude'] = $row2['c_latitude'];
					$tmp['c_longitude'] = $row2['c_longitude'];
					$tmp['score1']=$row2['c_score1'];
					$tmp['score2']=$row2['c_score2'];
					$tmp['score3']=$row2['c_score3'];
					$tmp['totalscore']=$row2['c_totalscore'];
					$tmp['schoolscore']=$row2['c_schoolscore'];
					$tmp['parkscore']=$row2['c_parkscore'];
					$tmp['hospitalscore']=$row2['c_hospitalscore'];
					  
					$tmp['servicescore']=$row2['c_servicescore'];
					  
					$tmp['carescore']=$row2['c_carescore'];
					$tmp['takescore']=$row2['c_takescore'];
					$tmp['carscore']=$row2['c_carscore'];
					$tmp['mainscore']=$row2['c_mainscore'];
					$tmp['bed']=$row2['s3_bed'];
					
					
				
				$data[] = $tmp;
			  
		 // }
		  
	  }
	  $sql3 = "Select * From  hospital";
				$result3 = mysqli_query($conn,$sql3) or die('MySQL query error') ;
				while($row3 = mysqli_fetch_assoc($result3)){
		
				
			
				$tmp['h_name']=$row3['h_name'];
				$tmp['h_latitude'] = $row3['h_lititude'];
				$tmp['h_longitude'] = $row3['h_longitude'];
				
				
				$data1[] = $tmp;
				
				
			
				}
				$sql4 = "Select * From  park";
				$result4 = mysqli_query($conn,$sql4) or die('MySQL query error') ;
				while($row4 = mysqli_fetch_assoc($result4)){
		
				
			
				$tmp['p_name']=$row4['p_name'];
				$tmp['p_latitude'] = $row4['p_lititude'];
				$tmp['p_longitude'] = $row4['p_longitude'];
				
				
				$data2[] = $tmp;
				
				
			
				}
				$sql5 = "Select * From school";
				$result5 = mysqli_query($conn,$sql5) or die('MySQL query error') ;
				while($row5 = mysqli_fetch_assoc($result5)){
		
				
			
				$tmp['sc_name']=$row5['sc_name'];
				$tmp['sc_latitude'] = $row5['sc_lititude'];
				$tmp['sc_longitude'] = $row5['sc_longitude'];
				
				
				$data3[] = $tmp;
				
				
			
				}
		$sql6 = "Select * From aids ";
				$result6 = mysqli_query($conn,$sql6) or die('MySQL query error') ;
				while($row6 = mysqli_fetch_assoc($result6)){
		
				
			
				$tmp['a_name']=$row6['a_name'];
				$tmp['a_latitude'] = $row6['a_latitude'];
				$tmp['a_longitude'] = $row6['a_longitude'];
				
				
				$data4[] = $tmp;
				
				
			
				}
		$data5=array_merge($data,$data1,$data2,$data3,$data4);
		if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	  echo json_encode($data5);
  }

  function insertcenter($conn,$center){
	  $sql = 'INSERT INTO center(ce_name) VALUES ("'.$center.'")';
	  $result=mysqli_query($conn,$sql);
	  if($result){
		  echo 'success';
		  }else{
			  echo 'error'; 
			  
			  
			  }
		  
	  }
	  
   function dbscanarea($conn,$center,$orginalcenter,$orginalla,$orginallo){
	  $tmp=array();
	  $data=array();
	  $sql2='Select *from center';
	  $result2=mysqli_query($conn,$sql2);
	  $row2=mysqli_fetch_row($result2);
	  $tmp['center']=$row2[1];
	  $sql='Select * from hospiceindex where c_name="'.$center.'"';
	  $result1=mysqli_query($conn,$sql);
	  $row1=mysqli_fetch_row($result1);
	  $tmp['orginalcenter']=$orginalcenter;
	  $tmp['centername']=$row1[1];
	  $la=2*(double)$row1[6]-(double)$orginalla;
	  $lo=2*(double)$row1[7]-(double)$orginallo;
	 $sql2='INSERT INTO center(ce_name,ce_latatude,ce_longitude) VALUES ("'.$orginalcenter.'","'.$orginalla.'","'.$orginallo.'")';
	   $result2=mysqli_query($conn,$sql2);
	  $sql2='INSERT INTO center(ce_name,ce_latatude,ce_longitude) VALUES ("'.$orginalcenter.'","'.$la.'","'.$lo.'")';
	   $result2=mysqli_query($conn,$sql2);
	  $tmp['c_latitude']=$row1[6];
	  $tmp['c_longitude']=$row1[7];
	  $tmp['c_orgila']=$orginalla;
	  $tmp['c_orgilo']=$orginallo;
	  
	  
	  $sql1='Select * from hospiceindex';
	  $result=mysqli_query($conn,$sql1);
	  while($row=mysqli_fetch_assoc($result)){
		  $tmp['name']=$row['c_name'];
		  $tmp['latitude']=$row['c_latitude'];
		  $tmp['longitude']=$row['c_longitude'];
		  
		  $data[]=$tmp;
		  }
		  echo json_encode($data);
	  }
	    function dbscanmap2($conn){
	  $tmp=array();
	  $data=array();
	  $sql='Select * From center';
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_assoc($result)){
		  $tmp['latitude']=$row['ce_latatude'];
		  $tmp['longitude']=$row['ce_longitude'];
		  $tmp['center']=$row['ce_name'];
		  $data[]=$tmp;
		  }
		  echo json_encode($data);
	  }
  function dbscanmap($conn){
	  $tmp=array();
	  $data=array();
	  $sql='Select * From dbscan2';
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_assoc($result)){
		  $sql1='Select * From hospiceindex where c_name="'.$row['d2_center'].'"';
		  $result1=mysqli_query($conn,$sql1);
		  $row1=mysqli_fetch_row($result1);
		  $tmp['centerla']=$row1[6];
		  $tmp['centerlo']=$row1[7];
		  $tmp['name']=$row['d2_name'];
		  $tmp['latitude']=$row['d2_latatude'];
		  $tmp['longitude']=$row['d2_longitude'];
		  $tmp['center']=$row['d2_center'];
		  $data[]=$tmp;
		  }
		  echo json_encode($data);
	  }
  function dbscaninsert($conn,$name,$lat,$lon,$rad,$center){
	  $sql = 'INSERT INTO dbscan(d_name, d_latatude,d_longitude,d_center,d_radius) VALUES ("'.$name.'", "'.$lat.'", "'.$lon.'", "'.$center.'", "'.$rad.'")';
	  $result=mysqli_query($conn,$sql);
	  if($result){
		  echo 'success';
		  }else{
			  echo 'error'; 
			  
			  
			  }
		  
	  }
	  
function dbscaninsert2($conn,$name,$lat,$lon,$rad,$center,$orgila,$orgilo){
			
	
	   
	  $sql = 'INSERT INTO dbscan2(d2_name, d2_latatude,d2_longitude,d2_center,d2_radius) VALUES ("'.$name.'", "'.$lat.'", "'.$lon.'", "'.$center.'", "'.$rad.'")';
	  $result=mysqli_query($conn,$sql);
	  if($result){
		  echo 'success';
		  }else{
			  echo 'error'; 
			  
			  
			  }
		  
	  }
  function dbscan($conn){
	  $tmp=array();
	  $data=array();
	  $sql='Select * from hospiceindex';
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_assoc($result)){
		  $tmp['name']=$row['c_name'];
		  $tmp['latitude']=$row['c_latitude'];
		  $tmp['longitude']=$row['c_longitude'];
		  $data[]=$tmp;
		  }
		  echo json_encode($data);
	  }
  function allbed1($conn,$area){
	  $data=array();
	  $tmp=array();
	  
	  $sql='Select * from hospiceindex where c_postal="'.$area.'"';
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_assoc($result)){
		  $tmp['name']=$row['c_name'];
		  
		  
	  
	  $sql2='Select * from hospiccontent3 where s3_id="'.$row['c_id'].'"';
	  $result2=mysqli_query($conn,$sql2);
	  $row2=mysqli_fetch_assoc($result2);
		  $tmp['bed']=$row2['s3_bed'];
		  $data[]=$tmp;
		  }
		if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
		  echo json_encode($data);
	  }
	  
  function allbed($conn){
	  $data=array();
	  $tmp=array();
	  
	  $sql='Select * from hospiceindex';
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_assoc($result)){
		  $tmp['name']=$row['c_name'];
		  
		  $data[]=$tmp;
	  }
	  $sql2='Select * from hospiccontent3';
	  $result2=mysqli_query($conn,$sql2);
	  while($row2=mysqli_fetch_assoc($result2)){
		  $tmp['bed']=$row2['s3_bed'];
		  $data[]=$tmp;
		  }
		  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
		  echo json_encode($data);
	  }
  function readscore($conn){
	  $sql='Select * from hospiceindex';
	  $result=mysqli_query($conn,$sql);
	  $tmp=array();
	  $data=array();
	  while($row=mysqli_fetch_assoc($result)){
		  $tmp['name']=$row['c_name'];
		  $tmp['score1']=$row['c_score1'];
		  $tmp['score2']=$row['c_score2'];
		  $tmp['score3']=$row['c_score3'];
		  $tmp['totalscore']=$row['c_totalscore'];
		  $tmp['schoolscore']=$row['c_schoolscore'];
		  $tmp['parkscore']=$row['c_parkscore'];
		  $tmp['hospitalscore']=$row['c_hospitalscore'];
		  
		  $tmp['servicescore']=$row['c_servicescore'];
		  
		  $tmp['carescore']=$row['c_carescore'];
		  $tmp['takescore']=$row['c_takescore'];
		  $tmp['carscore']=$row['c_carscore'];
		  $tmp['mainscore']=$row['c_mainscore'];
		  
		  
		  $data[]=$tmp;
	  }
	  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	  echo json_encode($data);
	  }
  function insertscore($conn,$name,$sum,$sans,$dans,$dans1,$dans2){
	  $sql='UPDATE hospiceindex SET c_servicescore="'.$sum.'", c_carescore="'.$sans.'", c_takescore="'.$dans.'", c_carscore="'.$dans1.'", c_mainscore="'.$dans2.'" where c_name="'.$name.'"';
	  $result=mysqli_query($conn,$sql);
	  if($result)
            {
                    //echo '新增成功!';
                    echo 'success';
            }
            else
            {
                    //echo '新增失敗!';
                 echo 'error';
             }
	  $conn->close();
	  }
  
  function sickandhospital($conn,$id){
	  $id=$_POST['id'];
	  $tmp=array();
	  $te=array();
	  $i=0;
	  $data=array();
	  $sqlna="Select * From hospital where h_id = '$id'";
	  $resultna=mysqli_query($conn,$sqlna);
	  $rowid=mysqli_fetch_assoc($resultna);
	  
	 // while($rowna=mysqli_fetch_assoc($resultna)){
	//	  $tmp['name']=$rowna['h_name'];
		  $tmp['id']=$rowid['h_id'];
	  $sql="Select * From mainsick";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){
		  $sql1='Select '.$row[1].' From '.$row[3].' ';
		 // echo $row[1];
		 //echo $sql1;
		  $result1=mysqli_query($conn,$sql1);
		  if (mysqli_num_rows($result1) > 0) {
			  while($row1=mysqli_fetch_array($result1)){
				  
				  $te[$i++]=$row1[0];
				  
				  //echo $row1[0];
				  }
				  
			  }else{
				  echo "te";
				  }
		 }
		 $i=0;
		 for($j=0;$j<count($te)/10;$j++){
		 $i+=$te[$j]+$te[$j+61]+$te[$j+122]+$te[$j+183]+$te[$j+244]+$te[$j+305]+$te[$j+366]+$te[$j+427]+$te[$j+488]+$te[$j+549];
		 $tmp['number1']=$i;
		 $data[]=$tmp;
		 $i=0;
		 }
		
	  
	// }
	  $conn->close();
	  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	echo json_encode($data);
	  
  }
  function readmapall($conn){
	  $data = array();
	  $data1 = array();
	  $data2 = array();
	  $data3 = array();
	  $data4 = array();
	  $data5 = array();
		$tmp = array();
		//$areas=(integer)$areas;
	//	if (mysqli_num_rows($result) > 0) {
		//	while($row = mysqli_fetch_assoc($result)) {
				$sql2 = "Select * From  hospiceindex";
				$result2 = mysqli_query($conn,$sql2) or die('MySQL query error') ;
				while($row = mysqli_fetch_assoc($result2)){
		
				
			
				$tmp['name']=$row['c_name'];
				$tmp['latitude'] = $row['c_latitude'];
				$tmp['longitude'] = $row['c_longitude'];
				
				
				$data[] = $tmp;
				
				
			
				}
				$sql = "Select * From  hospital";
				$result = mysqli_query($conn,$sql) or die('MySQL query error') ;
				while($row = mysqli_fetch_assoc($result)){
		
				
			
				$tmp['h_name']=$row['h_name'];
				$tmp['h_latitude'] = $row['h_lititude'];
				$tmp['h_longitude'] = $row['h_longitude'];
				
				
				$data1[] = $tmp;
				
				
			
				}
				$sql1 = "Select * From  park";
				$result1 = mysqli_query($conn,$sql1) or die('MySQL query error') ;
				while($row = mysqli_fetch_assoc($result1)){
		
				
			
				$tmp['p_name']=$row['p_name'];
				$tmp['p_latitude'] = $row['p_lititude'];
				$tmp['p_longitude'] = $row['p_longitude'];
				
				
				$data2[] = $tmp;
				
				
			
				}
				$sql3 = "Select * From school";
				$result3 = mysqli_query($conn,$sql3) or die('MySQL query error') ;
				while($row = mysqli_fetch_assoc($result3)){
		
				
			
				$tmp['sc_name']=$row['sc_name'];
				$tmp['sc_latitude'] = $row['sc_lititude'];
				$tmp['sc_longitude'] = $row['sc_longitude'];
				
				
				$data3[] = $tmp;
				
				
			
				}
					$sql6 = "Select * From aids ";
				$result6 = mysqli_query($conn,$sql6) or die('MySQL query error') ;
				while($row6 = mysqli_fetch_assoc($result6)){
		
				
			
				$tmp['a_name']=$row6['a_name'];
				$tmp['a_latitude'] = $row6['a_latitude'];
				$tmp['a_longitude'] = $row6['a_longitude'];
				
				
				$data4[] = $tmp;
				
				
			
				}
				$data5=array_merge($data,$data1,$data2,$data3,$data4);
				
	//	}
	//}
	
	$conn->close();
	if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	echo json_encode($data5);
	  
	  }
  function back($conn){
	  $ans=array();
	  $ans1=array();
	  $ans2=array();
	  $ans3=array();
	  $ans4=array();
	  $all=array();
	  $data=array();
	  $tmp=array();
	  $allnum=0;
	  $num4=0;
	  
	  $num3=0;
	  
	  $num2=0;
	  $num1=0;
	  $num=0;
	 
	  $sql='Select * From hospiceindex';
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){
		  $tmp['latitude']=$row[6];
		  $tmp['longitude']=$row[7];
		  $sql1='Select * From hospiccontent where s_id="'.$row[0].'"';
		  $result1=mysqli_query($conn,$sql1);
		  while($row1=mysqli_fetch_row($result1)){
			  $sum=0;
			  if($row1[1]==1){
				  $sum+=$row1[1]*10;
				  }
				 if($row1[2]==1){
				  $sum+=$row1[2]*20;
				  }
				  if($row1[3]==1){
				  $sum+=$row1[3]*5;
				  }
				 if($row1[4]==1){
				  $sum+=$row1[4]*5;
				  }
				 if($row1[5]==1){
				  $sum+=$row1[5]*20;
				  }
				 if($row1[6]==1){
				  $sum+=$row1[6]*20;
				  }
				 if($row1[7]==1){
				  $sum+=$row1[7]*5;
				  }
				 if($row1[8]==1){
				  $sum+=$row1[8]*5;
				  }
				 if($row1[9]==1){
				  $sum+=$row1[9]*8;
				  }
				 if($row1[10]==1){
				  $sum+=$row1[10]*2;
				  }
				  $tmp['name']=$row[1];
				  $tmp['score']=$sum;
				/*  $sum=$sum*0.1;
				  $sql8='UPDATE hospiceindex SET c_servicescore="'.$sum.'" where c_id="'.$row1[0].'"';
				  $result8=mysqli_query($conn,$sql8);
				  if($result8){
					  echo '1';
					  
				  }else{
					  
					  echo '0';
				  }*/
				  
				 
			  }
			  $sql2='Select * From hospiccontent2 where s2_id="'.$row[0].'"';
		  $result2=mysqli_query($conn,$sql2);
		  while($row2=mysqli_fetch_row($result2)){
			   $sum=0;
			  if($row2[1]==1){
				  $sum+=$row2[1]*10;
				  }
				 if($row2[2]==1){
				  $sum+=$row2[2]*5;
				  }
				  if($row2[3]==1){
				  $sum+=$row2[3]*15;
				  }
				 if($row2[4]==1){
				  $sum+=$row2[4]*10;
				  }
				 if($row2[5]==1){
				  $sum+=$row2[5]*7;
				  }
				 if($row2[6]==1){
				  $sum+=$row2[6]*10;
				  }
				 if($row2[7]==1){
				  $sum+=$row2[7]*10;
				  }
				 if($row2[8]==1){
				  $sum+=$row2[8]*10;
				  }
				 if($row2[9]==1){
				  $sum+=$row2[9]*3;
				  }
				 if($row2[10]==1){
				  $sum+=$row2[10]*10;
				  }
				  if($row2[11]==1){
				  $sum+=$row2[11]*10;
				  }
				  $tmp['score1']=$sum;
				 /* $sum=$sum*0.1;
				  $sql8='UPDATE hospiceindex SET c_carescore="'.$sum.'" where c_id="'.$row2[0].'"';
				  $result8=mysqli_query($conn,$sql8);
				  if($result8){
					  echo '1';
					  
				  }else{
					  
					  echo '0';
				  }*/
			  }
			  $sql3='Select * From hospiccontent3 where s3_id="'.$row[0].'"';
			  $result3=mysqli_query($conn,$sql3);
			  while($row3=mysqli_fetch_row($result3)){
				  $sum=0;
				   if($row3[1]==1){
				  $sum+=$row3[1]*30;
				  }
				 if($row3[2]==1){
				  $sum+=$row3[2]*35;
				  }
				  if($row3[3]==1){
				  $sum+=$row3[3]*35;
				  }
				  $tmp['score2']=$sum;
				 /* $sum=$sum*0.08;
				  $sql8='UPDATE hospiceindex SET c_takescore="'.$sum.'" where c_id="'.$row3[0].'"';
				  $result8=mysqli_query($conn,$sql8);
				  if($result8){
					  echo '1';
					  
				  }else{
					  
					  echo '0';
				  }*/
				  $sum=0;
				 if($row3[4]=='y'){
				  $sum+=100;
				  }
				  $tmp['score3']=$sum;
				 /* $sum=$sum*0.04;
				  $sql8='UPDATE hospiceindex SET c_carscore="'.$sum.'" where c_id="'.$row3[0].'"';
				  $result8=mysqli_query($conn,$sql8);
				  if($result8){
					  echo '1';
					  
				  }else{
					  
					  echo '0';
				  }*/
				  $sum=0;
				 if($row3[6]>=60){
				 $sum+=$row3[6];
				  }else{
					  $sum+=60;
					  }
				   $tmp['score4']=$sum;
				   /*$sum=$sum*0.08;
				   $sql8='UPDATE hospiceindex SET c_mainscore="'.$sum.'" where c_id="'.$row3[0].'"';
				  $result8=mysqli_query($conn,$sql8);
				  if($result8){
					  echo '1';
					  
				  }else{
					  
					  echo '0';
				  }*/
				  $sum=0;
				 
				  }
				  
			  
			  $data[]=$tmp;
	
	  }
	  for($i=0;$i<count($ans)-1;$i++){
				  echo round($ans[$i]*0.25+$ans1[$i]*0.25+$ans2[$i]*0.1+$ans3[$i]*0.2+$ans4[$i]*0.2);
				  }
	  $conn->close();
	  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	    echo json_encode($data);
	  }
	  
	   function backarea($conn,$area){
	  $ans=array();
	  $ans1=array();
	  $ans2=array();
	  $ans3=array();
	  $ans4=array();
	  $all=array();
	  $data=array();
	  $tmp=array();
	  $allnum=0;
	  $num4=0;
	  
	  $num3=0;
	  
	  $num2=0;
	  $num1=0;
	  $num=0;
	  $sql='Select * From hospiceindex where c_postal="'.$area.'"';
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_assoc($result)){
		  $tmp['name']=$row['c_name'];
		  $tmp['score1']=$row['c_score1'];
		  $tmp['score2']=$row['c_score2'];
		  $tmp['score3']=$row['c_score3'];
		  $tmp['totalscore']=$row['c_totalscore'];
		  $tmp['schoolscore']=$row['c_schoolscore'];
		  $tmp['parkscore']=$row['c_parkscore'];
		  $tmp['hospitalscore']=$row['c_hospitalscore'];
		  
		  $tmp['servicescore']=$row['c_servicescore'];
		  
		  $tmp['carescore']=$row['c_carescore'];
		  $tmp['takescore']=$row['c_takescore'];
		  $tmp['carscore']=$row['c_carscore'];
		  $tmp['mainscore']=$row['c_mainscore'];
		  /*$tmp['latitude']=$row[6];
		  $tmp['longitude']=$row[7];
		  
		  $sql1='Select * From hospiccontent where s_id="'.$row[0].'"';
		  $result1=mysqli_query($conn,$sql1);
		  while($row1=mysqli_fetch_row($result1)){
			  $sum=0;
			  if($row1[1]==1){
				  $sum+=$row1[1]*10;
				  }
				 if($row1[2]==1){
				  $sum+=$row1[2]*20;
				  }
				  if($row1[3]==1){
				  $sum+=$row1[3]*5;
				  }
				 if($row1[4]==1){
				  $sum+=$row1[4]*5;
				  }
				 if($row1[5]==1){
				  $sum+=$row1[5]*20;
				  }
				 if($row1[6]==1){
				  $sum+=$row1[6]*20;
				  }
				 if($row1[7]==1){
				  $sum+=$row1[7]*5;
				  }
				 if($row1[8]==1){
				  $sum+=$row1[8]*5;
				  }
				 if($row1[9]==1){
				  $sum+=$row1[9]*8;
				  }
				 if($row1[10]==1){
				  $sum+=$row1[10]*2;
				  }
				  $tmp['name']=$row[1];
				  $tmp['score']=$sum;
				  
				 
			  }
			  $sql2='Select * From hospiccontent2 where s2_id="'.$row[0].'"';
		  $result2=mysqli_query($conn,$sql2);
		  while($row2=mysqli_fetch_row($result2)){
			   $sum=0;
			  if($row2[1]==1){
				  $sum+=$row2[1]*10;
				  }
				 if($row2[2]==1){
				  $sum+=$row2[2]*5;
				  }
				  if($row2[3]==1){
				  $sum+=$row2[3]*15;
				  }
				 if($row2[4]==1){
				  $sum+=$row2[4]*10;
				  }
				 if($row2[5]==1){
				  $sum+=$row2[5]*7;
				  }
				 if($row2[6]==1){
				  $sum+=$row2[6]*10;
				  }
				 if($row2[7]==1){
				  $sum+=$row2[7]*10;
				  }
				 if($row2[8]==1){
				  $sum+=$row2[8]*10;
				  }
				 if($row2[9]==1){
				  $sum+=$row2[9]*3;
				  }
				 if($row2[10]==1){
				  $sum+=$row2[10]*10;
				  }
				  if($row2[11]==1){
				  $sum+=$row2[11]*10;
				  }
				  $tmp['score1']=$sum;
			  }
			  $sql3='Select * From hospiccontent3 where s3_id="'.$row[0].'"';
			  $result3=mysqli_query($conn,$sql3);
			  while($row3=mysqli_fetch_row($result3)){
				  $sum=0;
				   if($row3[1]==1){
				  $sum+=$row3[1]*30;
				  }
				 if($row3[2]==1){
				  $sum+=$row3[2]*35;
				  }
				  if($row3[3]==1){
				  $sum+=$row3[3]*35;
				  }
				  $tmp['score2']=$sum;
				  $sum=0;
				 if($row3[4]=='y'){
				  $sum+=100;
				  }
				  $tmp['score3']=$sum;
				  $sum=0;
				 if($row3[6]>=60){
				 $sum+=$row3[6];
				  }else{
					  $sum+=60;
					  }
				   $tmp['score4']=$sum;
				  $sum=0;
				 
				  }
			  
			  $data[]=$tmp;
	
	  }
	  for($i=0;$i<count($ans)-1;$i++){
				  echo round($ans[$i]*0.25+$ans1[$i]*0.25+$ans2[$i]*0.1+$ans3[$i]*0.2+$ans4[$i]*0.2);
				  }*/
				   $data[]=$tmp;
	   }
	  $conn->close();
	  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	    echo json_encode($data);
	  }
	  
	  function distancehospital($conn){
		   $data = array();
		$tmp = array();
		$te=array();
		$i=0;
		$sql="Select * From mainsick";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_row($result)){
		  $sql1='Select '.$row[1].' From '.$row[3].' ';
		 // echo $row[1];
		 //echo $sql1;
		  $result1=mysqli_query($conn,$sql1);
		  if (mysqli_num_rows($result1) > 0) {
			  while($row1=mysqli_fetch_array($result1)){
				  
				  $te[$i++]=$row1[0];
				  
				  //echo $row1[0];
				  }
				  
			  }else{
				  echo "te";
				  }
		 }
		
		 $i=0;
		 for($j=0;$j<61;$j++){
		 $i+=$te[$j]+$te[$j+61]+$te[$j+122]+$te[$j+183]+$te[$j+244]+$te[$j+305]+$te[$j+366]+$te[$j+427]+$te[$j+488]+$te[$j+549]+$te[$j+610]+$te[$j+671];
		 $tmp['number1']=$i;
		 $data[]=$tmp;
		 $i=0;
		 }
		  $sql4 = "Select * From  hospital ";
				$result4 = mysqli_query($conn,$sql4) or die('MySQL query error') ;
				while($row4 = mysqli_fetch_assoc($result4)){
				$tmp['id']=$row4['h_id'];
				$tmp['hospitalname']=$row4['h_name'];
				$tmp['h_latitude'] = $row4['h_lititude'];
				$tmp['h_longitude'] = $row4['h_longitude'];
				
				$data[] = $tmp;	
				}
				 $conn->close();
				 if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	echo json_encode($data);
	  }
	  
	  function distanceschool($conn){
		   $data = array();
		$tmp = array();
		  $sql3 = "Select * From  school ";
				$result3 = mysqli_query($conn,$sql3) or die('MySQL query error') ;
				while($row3 = mysqli_fetch_assoc($result3)){
					$tmp['schoolname']=$row3['sc_name'];
				$tmp['s_latitude'] = $row3['sc_lititude'];
				$tmp['s_longitude'] = $row3['sc_longitude'];
				
				$data[] = $tmp;
				}
				 $conn->close();
				 if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	echo json_encode($data);
	  }
	   function distancehouse($conn){
		  $data = array();
		$tmp = array();
	//	if (mysqli_num_rows($result) > 0) {
		//	while($row = mysqli_fetch_assoc($result)) {
				
				
				$sql2 = "Select * From hospiceindex,hospiccontent3 where hospiceindex.c_id = hospiccontent3.s3_id";
				$result2 = mysqli_query($conn,$sql2) or die('MySQL query error') ;
				while($row2 = mysqli_fetch_assoc($result2)){
					$tmp['hospicename']=$row2['c_name'];
					$tmp['c_latitude'] = $row2['c_latitude'];
					$tmp['c_longitude'] = $row2['c_longitude'];
					$tmp['score1']=$row2['c_score1'];
					$tmp['score2']=$row2['c_score2'];
					$tmp['score3']=$row2['c_score3'];
					$tmp['totalscore']=$row2['c_totalscore'];
					$tmp['schoolscore']=$row2['c_schoolscore'];
					$tmp['parkscore']=$row2['c_parkscore'];
					$tmp['hospitalscore']=$row2['c_hospitalscore'];
					  
					$tmp['servicescore']=$row2['c_servicescore'];
					  
					$tmp['carescore']=$row2['c_carescore'];
					$tmp['takescore']=$row2['c_takescore'];
					$tmp['carscore']=$row2['c_carscore'];
					$tmp['mainscore']=$row2['c_mainscore'];
					$tmp['bed']=$row2['s3_bed'];
					
					
				
				$data[] = $tmp;
				}
				/*$sql3 = "Select * From  school ";
				$result3 = mysqli_query($conn,$sql3) or die('MySQL query error') ;
				while($row3 = mysqli_fetch_assoc($result3)){
					$tmp['schoolname']=$row3['sc_name'];
				$tmp['s_latitude'] = $row3['sc_lititude'];
				$tmp['s_longitude'] = $row3['sc_longitude'];
				
				$data[] = $tmp;
				}/*
				$sql4 = "Select * From  hospital ";
				$result4 = mysqli_query($conn,$sql4) or die('MySQL query error') ;
				while($row4 = mysqli_fetch_assoc($result4)){
			
				$tmp['hospitalname']=$row4['h_name'];
				$tmp['h_latitude'] = $row4['h_lititude'];
				$tmp['h_longitude'] = $row4['h_longitude'];
				
				$data[] = $tmp;	
				}*/
		  $conn->close();
		  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	echo json_encode($data);
	  }
	  function distance($conn){
		  $data = array();
		$tmp = array();
	//	if (mysqli_num_rows($result) > 0) {
		//	while($row = mysqli_fetch_assoc($result)) {
			
				
				$sql2 = "Select * From  park ";
				$result2 = mysqli_query($conn,$sql2) or die('MySQL query error') ;
				while($row2 = mysqli_fetch_assoc($result2)){
					$tmp['parkname']=$row2['p_name'];
				$tmp['p_latitude'] = $row2['p_lititude'];
				$tmp['p_longitude'] = $row2['p_longitude'];
				
				$data[] = $tmp;
				}
				/*$sql3 = "Select * From  school ";
				$result3 = mysqli_query($conn,$sql3) or die('MySQL query error') ;
				while($row3 = mysqli_fetch_assoc($result3)){
					$tmp['schoolname']=$row3['sc_name'];
				$tmp['s_latitude'] = $row3['sc_lititude'];
				$tmp['s_longitude'] = $row3['sc_longitude'];
				
				$data[] = $tmp;
				}/*
				$sql4 = "Select * From  hospital ";
				$result4 = mysqli_query($conn,$sql4) or die('MySQL query error') ;
				while($row4 = mysqli_fetch_assoc($result4)){
			
				$tmp['hospitalname']=$row4['h_name'];
				$tmp['h_latitude'] = $row4['h_lititude'];
				$tmp['h_longitude'] = $row4['h_longitude'];
				
				$data[] = $tmp;	
				}*/
		  $conn->close();
		  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	echo json_encode($data);
	  }
	  function distanceaids($conn){
		  $data = array();
		$tmp = array();
		  	$sql6 = "Select * From aids ";
				$result6 = mysqli_query($conn,$sql6) or die('MySQL query error') ;
				while($row6 = mysqli_fetch_assoc($result6)){
		
				
			
				$tmp['a_name']=$row6['a_name'];
				$tmp['a_latitude'] = $row6['a_latitude'];
				$tmp['a_longitude'] = $row6['a_longitude'];
				
				
				$data[] = $tmp;
				
				
			
				}
		    $conn->close();
		  if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	echo json_encode($data);
	  }
  
  function readmap($conn,$areas){
		
		$data = array();
		$tmp = array();
		$areas=(integer)$areas;
	//	if (mysqli_num_rows($result) > 0) {
		//	while($row = mysqli_fetch_assoc($result)) {
			
				$sql = "Select * From  hospiceindex where c_postal='$areas'";
				$result = mysqli_query($conn,$sql) or die('MySQL query error') ;
				while($row = mysqli_fetch_assoc($result)){
					$tmp['name']=$row['c_name'];
				$tmp['latitude'] = $row['c_latitude'];
				$tmp['longitude'] = $row['c_longitude'];
				
				
				$data[] = $tmp;
				}
				$sql2 = "Select * From  park where p_postal='$areas'";
				$result2 = mysqli_query($conn,$sql2) or die('MySQL query error') ;
				while($row2 = mysqli_fetch_assoc($result2)){
					$tmp['parkname']=$row2['p_name'];
				$tmp['p_latitude'] = $row2['p_lititude'];
				$tmp['p_longitude'] = $row2['p_longitude'];
				
				$data[] = $tmp;
				}
				$sql3 = "Select * From  school where sc_postal='$areas'";
				$result3 = mysqli_query($conn,$sql3) or die('MySQL query error') ;
				while($row3 = mysqli_fetch_assoc($result3)){
				$tmp['schoolname']=$row3['sc_name'];
				$tmp['s_latitude'] = $row3['sc_lititude'];
				$tmp['s_longitude'] = $row3['sc_longitude'];
				
				$data[] = $tmp;
				}
				$sql4 = "Select * From  hospital where h_postal='$areas'";
				$result4 = mysqli_query($conn,$sql4) or die('MySQL query error') ;
				while($row4 = mysqli_fetch_assoc($result4)){
			
				$tmp['hospitalname']=$row4['h_name'];
				$tmp['h_latitude'] = $row4['h_lititude'];
				$tmp['h_longitude'] = $row4['h_longitude'];
				
				$data[] = $tmp;	
				
				}
				$sql6 = "Select * From aids where a_postal='$areas'";
				$result6 = mysqli_query($conn,$sql6) or die('MySQL query error') ;
				while($row6 = mysqli_fetch_assoc($result6)){
		
				
			
				$tmp['a_name']=$row6['a_name'];
				$tmp['a_latitude'] = $row6['a_latitude'];
				$tmp['a_longitude'] = $row6['a_longitude'];
				
				
				$data[] = $tmp;
				
				
			
				}
				
	//	}
	//}
	
	$conn->close();
	if($data==null){
		  $tmp['error']='error';
		  $data[]='error';
	  }
	echo json_encode($data);
}
	
?>