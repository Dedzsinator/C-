<?php
	$CC="python3";
	//$out="./a.out";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$file="main.py";
	$file_in="input.txt";
	$file_err="error.txt";
	$cmd=$CC." ".$file;
	$cmd_err=$cmd." 2>".$file_err;

	$arg=fopen($file,"w+");
	fwrite($arg,$code);
	fclose($arg);
	$file_in=fopen($file_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("chmod 777 $file_err");

	shell_exec($cmd_err);
	$error=file_get_contents($file_err);

	if(trim($error)=="") {
		if(trim($input)=="") {
			$output=shell_exec($cmd);
		} else {
			$cmd=$cmd." < ".$file_in;
			$output=shell_exec($cmd);
		}
		echo "<pre>$output</pre>";
	} else {
		echo "<pre>$error</pre>";
	}
	exec("rm $file");
	exec("rm *.txt");
?>
