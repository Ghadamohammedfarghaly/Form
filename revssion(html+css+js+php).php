        <!-- بسم الله الرحمن الرحيم-->
               <!--php-->
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   $data_name=" ";
   $data_email=" ";
   $data_password=" ";
   $data_picture=" ";
   if(isset($_POST['name'])){
        if(!preg_match('/^[A-Z][a-z]+(\s[a-z]+)*$/',$_POST['name'])){
            $data_name=$_POST['name'];
        }
        else{
            $data_name ="error in matching the name";
        } 
   }
   if(isset($_POST['email'])){
        if(preg_match('/^[a-z]+\d{3}@gmail\.com$/',$_POST['email'])){
            $data_email=$_POST['email'];
        }
        else{
            $data_email ="error in matching the email";
        } 
   }
   if(isset($_POST['password'])){
        if(preg_match('/^.+$/',$_POST['password'])){
            $data_password=strip_tags($_POST['password']);    //for security
        }
        else{
            $data_password="error in matching the password";
        }
   }
   if(isset($_FILES['picture'])){
        $data_picture=$_FILES['picture'];
        copy($data_picture['tmp_name'],$data_picture['name']);
   }

   $all_user_data=$data_name."<br/>".$data_email."<br/>".$data_password."<br/>".$data_picture['tmp_name'];
   $file_data=fopen('userdata.txt','w');
   fwrite($file_data,$all_user_data);
   fclose($file_data);
   echo $all_user_data;
}
?>