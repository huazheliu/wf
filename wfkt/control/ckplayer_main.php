<?php
/**
 * CKplayer插件调用代码
 *
 * @version        $Id: ckplayer_main.php 1 15:30 2012年4月27日 by 土匪 $
 * @package        IT736.Taglib
 * @copyright      Copyright (c) 2012, IT736, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.it736.com
 */

/*>>dede>>


>>dede>>*/
require_once(dirname(__FILE__)."/config.php");
require_once(DEDEADMIN.'/inc/inc_archives_functions.php');
if($action==""){
	require_once(DEDEADMIN."/templets/ckplayer_main.htm");
}