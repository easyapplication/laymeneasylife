<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL,"http://nts.org.pk/Test&Products/Results/112016/ESED_KPK_Adhock_20112015_Result/Result.php");
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS,
//            "RollNo=1633000162&captcha=7777");
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
//
//
//// receive server response ...
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$result = curl_exec($ch);
//
//$server_output = curl_exec ($ch);
//
//curl_close ($ch);

$startroll=1633000001;

for($startroll=1633000001;$startroll<=1634000000;$startroll++){
    curldata($startroll);
}



function curldata($rollnumber) {


    $post_data = "RollNo=$rollnumber&captcha=7777";
    $url = "http://nts.org.pk/Test&Products/Results/112016/ESED_KPK_Adhock_20112015_Result/Result.php";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);

//var_dump($result);
//echo $result;
    curl_close($ch);
    preg_match_all('~(<td><div align="center"><span class="style48 style35 style40"><span class="style23">(.*?)</span></span></div></td>)~', $result, $rolnumber);
    preg_match_all('~(<td height="35" class="gfffffff"><div align="left"><span class="style41">(.*?)</span> </div></td>)~', $result, $name);
    preg_match_all('~(<td class="gfffffff"><div align="left"><span class="style41">(.*?)</span> </div></td>)~', $result, $fname);
    preg_match_all('~(<td nowrap class="gfffffff"><div align="center"><span class="style41">(.*?)</span> </div></td>)~', $result, $cnic);
    preg_match_all('~(<div align="left"><span class="style47"> <span class="style48"><span class="style23"> <span class="style35 style17 style38 style39"><strong></strong></span> <span class="style40">(.*?)</span> </span></span> </span></div>)~', $result, $post);
    preg_match_all('~(<div align="center"><span class="style47"> <span class="style48"><span class="style23"> <span class="style35 style17 style38 style39"><strong></strong></span> <span class="style40"> (.*?)</span> </span></span> </span></div>)~', $result, $marks);

    $resp = explode('<span class="style48 style35 style40">', $result)[1];
//echo $rolnumber[2][0];
    savetodb($rolnumber[2][0], $name[2][0], $fname[2][0], $cnic[2][0], $post[2][0], $marks[2][0]);
}

function savetodb($rolnumber, $name, $fname, $cnic, $post, $marks) {
    $servername = "23.99.107.76";
    $username = "root";
    $password = "exr3uZg9";
    $dbname = "raw-nts";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tblrawdata (rolnumber,name,fname,cnic,post,marks) VALUES ('$rolnumber','$name','$fname','$cnic','$post','$marks')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// further processing ....
//if ($server_output == "OK") { ... } else { ... }
?>

