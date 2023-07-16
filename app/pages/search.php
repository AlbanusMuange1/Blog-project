<?php
        include '../app/pages/includes/header.php';
?>
<div class="mx-auto col-md-10">
      <h2>Search</h2>
      <div class="row mb-2 justify-content-center">
        <?php
        $limit  = 6;
        $offset = ($PAGE['page_number'] - 1) * $limit;

        $find = $_GET['find'] ?? '';

        if($find){
            $find = "%$find%";
           $query = "select posts.*, categories.category from posts join categories on posts.category_id = categories.id where posts.title like :find order by id desc limit $limit offset $offset";
            $row = query($query, ['find'=>$find]); 
        }
        
        if(!empty($row)){
          foreach($row as $row){
            include '../app/pages/includes/post-card.php';
          }
        }else{
          echo "No post found";
        }
        
        ?>
      </div>
        <div class="col-md-12 mt-2">               
                <a>
                    <button class="btn btn-danger justify-content-center btn-sm next" onclick="goBack()">Back</button>
                </a>
                <script>
                  function goBack(){
                    window.history.back()
                  }
                </script>
                <a href="<?=$PAGE['next_link']?>">
                    <button class="btn btn-success float-end btn-sm next">Next Page</button>
                </a>

        </div>
</div>
    
<?php
include '../app/pages/includes/footer.php'
?>