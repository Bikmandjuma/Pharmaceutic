<?php
class pharmaceutic{
	//function of DBConnection
	public function DBConnection(){
		include '../Connect/connection.php';
	}

	public function Admin_id(){
		$id=$_SESSION['id'];
		return $id;
	}

	//Admin information
	public function admin_info(){
		include '../Connect/connection.php';
		$admin_id=self::Admin_id();
		$sql_user_info="SELECT * FROM admin where id=".$admin_id."";
		$query_user_info=mysqli_query($con,$sql_user_info);
		while ($row_user_info=mysqli_fetch_assoc($query_user_info)) {
		  $fname=$row_user_info['firstname'];
		  $lname=$row_user_info['lastname'];
		  $user_img=$row_user_info['image'];
		  $phone=$row_user_info['phone'];
		  $email=$row_user_info['email'];
		  $gender=$row_user_info['gender'];
		  $dob=$row_user_info['dob'];
		}

		return $fname;
	}

	public function CheckBooking_count(){
		include '../Connect/connection.php';

		$sql_check_booking_count="SELECT * FROM bookings where checking is null";
		$query_check_booking_count=mysqli_query($con,$sql_check_booking_count);
		
		$count=mysqli_num_rows($query_check_booking_count);

		echo $count;
	
	}

	public function Customers_count(){
		include '../Connect/connection.php';
		
		$sql_customers="SELECT * FROM customers";
		$query_customers=mysqli_query($con,$sql_customers);
		
		$count=mysqli_num_rows($query_customers);

		echo $count;
	
	}
}

?>