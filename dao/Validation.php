<?php  

class Validation {
	
	public function validate($data, $conn) {
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		$data = mysqli_real_escape_string($conn,$data);
		return $data;
	}
	
}

?>