<div>
<?php

//Now select all from table
$query = “select * from student”;
$result = mysqli_query($con, $query);

// Count the total records
$total_records = mysqli_num_rows($result);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);

//Going to first page
echo “<center><a href=’pagination.php?page=1′>”.’First Page’.”</a> “;

for ($i=1; $i<=$total_pages; $i++) {

echo “<a href=’pagination.php?page=”.$i.”‘>”.$i.”</a> “;
};
// Going to last page
echo “<a href=’pagination.php?page=$total_pages’>”.’Last Page’.”</a></center> “;
?>

</div>



#########



<?php

$per_page=6;
if(!empty($_GET)){
if (isset($_GET[“page”])) {

$page = $_GET[“page”];

}}

else {

$page=1;

}

$start_from = ($page-1) * $per_page;



	if($stmt = $mysqli->prepare("SELECT * FROM products LIMIT ? , ? ")) {
		 $stmt->bind_param('ss', $start_from, $per_page);

                                    //$stmt->execute();
                                    mysqli_stmt_execute( $stmt );
                                    mysqli_stmt_store_result( $stmt );


                                    //$stmt->bind_result($brand);
                                }

                                $total_records = mysqli_num_rows($stmt);

echo $total_records;

?>

