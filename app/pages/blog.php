<?php
        include '../app/pages/includes/header.php';
?>
<div class="mx-auto col-md-10">
      <h2>Trending Stories</h2>
      <div class="row mb-2 justify-content-center">
        <?php
        $limit  = 6;
        $offset = ($PAGE['page_number'] - 1) * $limit;


        $query = "select posts.*, categories.category from posts join categories on posts.category_id = categories.id order by id desc limit $limit offset $offset";
        $rows = query($query);
        if($rows){
          foreach($rows as $row){
            include '../app/pages/includes/post-card.php';
          }
        }else{
          echo "No post found";
        }
        
        ?>
      </div>
        <div class="col-md-12 mt-2">
                <a href="<?=$PAGE['first_link']?>">
                    <button class="btn btn-primary btn-sm">First Page</button>
                </a>
                <a href="<?=$PAGE['prev_link']?>">
                    <button class="btn btn-info btn-sm">Prev Page</button>
                </a>
                <a href="<?=$PAGE['next_link']?>">
                    <button class="btn btn-success float-end btn-sm next">Next Page</button>
                </a>
        </div>
</div>
    
<?php
include '../app/pages/includes/footer.php'
?>