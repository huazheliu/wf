<?php
require_once(dirname(__FILE__)."/../include/common.inc.php");
?>
    var newflashvars={
    <?php
		  $row = 180;
		  $titlelen = 50;
		  $dsql->SetQuery("Select * from `#@__ckcommon` where ischeck>0 order by sortrank asc");
		  $dsql->Execute();
		$revalue = "";
		for($i=1;$i<=$row;$i++)
		{
				if($dbrow=$dsql->GetObject())
				{
					$wtitle = cn_substr($dbrow->webname,$titlelen);
					if($dbrow->logo=="")
						$revalue.= "l:'".$dbrow->adpre."',r:'".$dbrow->adpreurl."',t:'".$dbrow->adpretime."',d:'".$dbrow->adpau."',u:'".$dbrow->adpauurl."',e:'".$dbrow->motion."',p:'".$dbrow->ckpause."',v:'".$dbrow->volume."',z:'".$dbrow->adbuffer."',mad:'".$dbrow->admar."',madurl:'".$dbrow->admarurl."'";
					
				}
			if(!$dbrow) break;
		}
		echo  $revalue;
?>}