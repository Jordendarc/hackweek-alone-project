<html>
<div id="home" class="tab-pane">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#createPostForm").submit(function(){
          var usr = $("#formUserName").val();
          var formBodyText = $("#formBodyText").val();
          var dataString = "username=" + usr + "&formBodyText=" + formBodyText;
          $.ajax({
            type: "POST",
            url: "createPost.php",
            data: dataString,
            success: function(){
              window.location.hash = "#/";
            }
          });
          History.pushState(null, null, "#/");
          return false;
        });
        $(window).scroll(function(){
            var lastID = $('.load-more').attr('lastID');
            if(($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)){
                $.ajax({
                    type:'POST',
                    url:'db/getData.php',
                    data:'id='+lastID,
                    beforeSend:function(){
                        $('.load-more').show();
                    },
                    success:function(html){
                        $('.load-more').remove();
                        $('.fullPost').append(html);
                        // $(".container").attr("height", "100vh;");
                    }
                });
            }
        });
    });
    </script>

    <div class="fullPost">
    <form name="createPostForm" id="createPostForm" action="" method="POST">
        <label for="formUserName">Username:</label><br>
        <input type="text" id="formUserName" name="formUserName" required><br>
        <label for="formBodyText">Body Text:</label><br>
        <textarea type="text" id="formBodyText" name="formBodyText" required></textarea><br>
      <input type="submit" id="sub" value="submit"></input>
    </form>
</div>

      <?php
      // Include the database configuration file
      require 'db/dbConfig.php';

      // Get records from the database
      $query = $db->query("SELECT * FROM postInformation ORDER BY id DESC LIMIT 5");
      if($query->num_rows > 0){
          while($row = $query->fetch_assoc()){
              $postID = $row["id"];
      ?>

      <div class="fullPost">
        <div class="listItemName"><h4>From user: <?php echo $row['username']; ?></h4></div>
        <div class="listItemBody"><h4><?php echo $row['postBody']; ?></h4></div>
        <div class="listItemStamp">Posted on: <?php echo $row['postTimeStamp']; ?></div>
    </div>
      <?php } ?>
          <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
          </div>
      <?php } ?>
    </div>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

</div>
</html>
