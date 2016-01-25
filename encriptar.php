<?php

	echo $_REQUEST['pass'] . "<br/><br/>";

	$pass_encriptada=md5($_REQUEST['pass']);

	echo $pass_encriptada . "<br/><br/>";



?>