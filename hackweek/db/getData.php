<?php
if(!empty($_POST["id"])){

//Include DB configuration file
require 'dbConfig.php';

//Get last ID
$lastID = $_POST['id'];

//Limit on data display
$showLimit = 5;

//Get all rows except already displayed
$queryAll = $db->query("SELECT COUNT(*) as num_rows FROM postInformation WHERE id < ".$lastID." ORDER BY id DESC");
$rowAll = $queryAll->fetch_assoc();
$allNumRows = $rowAll['num_rows'];

//Get rows by limit except already displayed
//$query = $db->query("SELECT * FROM postInformation WHERE id < ".$lastID." ORDER BY id DESC LIMIT ".$showLimit);
    $query = $db->query("SELECT * FROM postInformation WHERE id < ".$lastID." ORDER BY id DESC LIMIT ".$showLimit);

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
    $postID = $row["id"]; ?>
          <div class="listItemName"><h4><?php echo $row['username']; ?></h4></div>
          <div class="listItemBody"><h4><?php echo $row['postBody']; ?></h4></div>
          <div class="listItemStamp"><h4><?php echo $row['postTimeStamp']; ?></h4></div>
      <!-- <link rel="stylesheet" type="text/css" href="css/navbar.css"> -->

<?php } ?>

<?php if($allNumRows > $showLimit){ ?>
    <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
      <p>loading..</p>
<!-- //        <img src="loading.gif"/> -->
    </div>
<?php }else{ ?>
    <div class="load-more" lastID="0">
        That's All!
    </div>
<?php }
}else{ ?>
    <div class="load-more" lastID="0">
        That's All!
    </div>
<?php
    }
}
?>
