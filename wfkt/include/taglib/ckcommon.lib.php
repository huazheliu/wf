<?php
if(!defined('DEDEINC'))
{
    exit("Request Error!");
}
function lib_ckcommon(&$ctag,&$refObj)
{
	
    global $dsql,$cfg_soft_lang;
    $attlist="type|textall,row|1,titlelen|500,linktype|1,typeid|0";
    FillAttsDefault($ctag->CAttribute->Items,$attlist);
    extract($ctag->CAttribute->Items, EXTR_SKIP);
    $totalrow = $row;
    $revalue = '';
    if (isset($GLOBALS['envs']['ckcommonid']))
    {
        $typeid = $GLOBALS['envs']['ckcommonid'];
    }

    $wsql = " where ischeck >= '$linktype' ";
	
    if($typeid == 0)
    {
        $wsql .= '';
    }
	else
    {
        $wsql .= "And typeid = '$typeid'";
    }
    if($type=='image')
    {
        $wsql .= " And logo<>'' ";
    }
    else if($type=='text')
    {
        $wsql .= " And logo='' ";
    }

    $equery = "SELECT * FROM #@__ckcommon $wsql order by sortrank asc limit 0,$totalrow";

    if(trim($ctag->GetInnerText())=='') $innertext = "[field:link /]";
    else $innertext = $ctag->GetInnerText();
    
    $dsql->SetQuery($equery);
    $dsql->Execute();
    
    while($dbrow=$dsql->GetObject())
    {
        if($type=='text'||$type=='textall')
        {
            $link = "l:'".$dbrow->adpre."',\r\n r:'".$dbrow->adpreurl."',\r\n t:'".$dbrow->adpretime."',\r\n d:'".$dbrow->adpau."',\r\n u:'".$dbrow->adpauurl."',\r\n e:'".$dbrow->motion."',\r\n p:'".$dbrow->ckpause."',\r\n v:'".$dbrow->volume."',\r\n z:'".$dbrow->adbuffer."',\r\n mad:'".$dbrow->admar."',\r\n madurl:'".$dbrow->admarurl."',";
        }
        $rbtext = preg_replace("/\[field:adpre([\/\s]{0,})\]/isU", $row['adpre'], $innertext);
		$rbtext = preg_replace("/\[field:adpreurl([\/\s]{0,})\]/isU", $row['adpreurl'], $innertext);
        $rbtext = preg_replace("/\[field:adpretime([\/\s]{0,})\]/isU", $row['adpretime'], $rbtext);
        $rbtext = preg_replace("/\[field:adpau([\/\s]{0,})\]/isU", $row['adpau'], $rbtext);
        $rbtext = preg_replace("/\[field:adpauurl([\/\s]{0,})\]/isU",$row['adpauurl'], $rbtext);
		$rbtext = preg_replace("/\[field:adbuffer([\/\s]{0,})\]/isU", $row['adbuffer'], $rbtext);
		$rbtext = preg_replace("/\[field:admar([\/\s]{0,})\]/isU", $row['admar'], $rbtext);
		$rbtext = preg_replace("/\[field:admarurl([\/\s]{0,})\]/isU", $row['admarurl'], $rbtext);
		$rbtext = preg_replace("/\[field:logo([\/\s]{0,})\]/isU", $row['logo'], $innertext);
		$rbtext = preg_replace("/\[field:motion([\/\s]{0,})\]/isU", $row['motion'], $innertext);
		$rbtext = preg_replace("/\[field:ckpause([\/\s]{0,})\]/isU", $row['ckpause'], $innertext);
		$rbtext = preg_replace("/\[field:volume([\/\s]{0,})\]/isU", $row['volume'], $innertext);
		
		$rbtext = preg_replace("/\[field:link([\/\s]{0,})\]/isU", $link, $rbtext);
        $revalue .= $rbtext;
    }
    return $revalue;
}