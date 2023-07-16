
    <?php
        include '../app/pages/includes/header.php';
    ?>
      <h2>Trending Stories</h2>
      <div class="row mb-2 justify-content-center">
        <?php
        $query = "select posts.*, categories.category from posts join categories on posts.category_id = categories.id order by id desc limit 6";
        $row = query($query);
        if($row){
          foreach($row as $row){
            include '../app/pages/includes/post-card.php';
          }
        }else{
          echo "No post found";
        }
        
        ?>
      </div>
    
        <?php
        include '../app/pages/includes/footer.php'
        ?>