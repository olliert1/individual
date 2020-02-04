<?php
/*
IMPORTANT:
	Read a file and change its content
	use it like read_file.php?id=0&dob=1981-03-31
*/
$input=fopen('data.csv','r'); // Open a file for input

echo '<pre>';
$row=0;
$temp=''; // Create a temporary variable that will store the content of the file
while(!feof($input)){ // while it is not the end of the file
	$line=fgets($input); // read a line from the file and put it into a variable
	if($row==$_GET['id']){ // if the line number is the record that we want to modify
		$line=explode(',',$line); // Split the line into an array
		$line[2]=$_GET['age']; // Change the date of birth
		$temp.=implode(',',$line); // Add the changes to a temporary variable
	}else $temp.=$line;  //Add the line to the temporary variable

	$row++; // increase the row counter, so that we know which row we are reading from
}
fclose($input); // Close the input file

$output=fopen('data.csv','w'); // Open the output file for writing
fwrite($output,$temp); // Write the content of the temporary variable into the file
fclose($output); // Close the output file. Important: this is where the changes are actually saved.