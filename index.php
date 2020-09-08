<?php

// Make Changes to the DB name
$connect = new PDO("mysql:host=localhost;dbname=mediadb", "root", "");

function fetch_email_track_data($connect)
{
	$query = "SELECT * FROM tbl_inaccuracy ORDER BY issue_id";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th>SI No.</th>
				<th>Title</th>
                <th>Date</th>
                <th>Type</th>
                <th>Link</th>
                <th>Status</th>
                <th>Updated By</th>
			</tr>
	';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '
                <tr>
                    <td>'.$row["issue_id"].'</td>
					<td><a href="issue.php?id=' . $row['issue_id'] . '">'.$row["issue_title"].'</td>
                    <td>'.$row["date_created"].'</td>
                    <td>'.$row["issue_for"].'</td>
                    <td>'.$row["reporter_id"].'</td> 
                    <td>'.$row["status"].'</td>
                    <td>'.$row["updated_by"].'</td>
				</tr>
			';
		}
	}
	else
	{
		$output .= '
		<tr>
			<td colspan="4" align="center">No Email Send Data Found</td>
		</tr>
		';
	}
	$output .= '</table>';
	return $output;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Email Feature using PHP</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<h3 style="text-align:center">CMI EMAIL THREAD MANAGEMENT</h3>
			<br />	
			<?php 
			
			echo fetch_email_track_data($connect);

			?>
		</div>
		<br />
		<br />
	</body>
</html>