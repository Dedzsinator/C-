<?php

	putenv("PATH=C:\MinGW\bin"); //!!ENTER C++ Enviornment path
	$CC="g++ -std=c++11";
	$out="a.exe";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$file="main.cpp";
	$file_in="input.txt";
	$file_err="error.txt";
	$exe="a.exe";
	$cmd=$CC." -lm ".$file;	
	$cmd_err=$cmd." 2>".$file_err;
	
	$file_code=fopen($file,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($file_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("cacls  $exe /g everyone:f"); 
	exec("cacls  $file_err /g everyone:f");	

	shell_exec($cmd_err);
	$error=file_get_contents($file_err);

	if(trim($error)=="") {
		if(trim($input)=="") {
			$output=shell_exec($out);
		} else {
			$out=$out." < ".$file_in;
			$output=shell_exec($out);
		}
		echo "$output";
	} else if(!strpos($error,"error")) {
		echo "<pre>$error</pre>";
		if(trim($input)=="") {
			$output=shell_exec($out);
		} else {
			$out=$out." < ".$file_in;
			$output=shell_exec($out);
		}
		echo "$output";
	} else {
		echo "<pre>$error</pre>";
	}
	exec("del $file");
	exec("del *.o");
	exec("del *.txt");
	exec("del $exe");
?>
