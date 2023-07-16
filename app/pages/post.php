<?php
        include '../app/pages/includes/header.php';
?>
<div class="mx-auto col-md-10">
      <div class="row mb-2 justify-content-center">
        <?php

        $slug = $url[1] ?? null;
        if($slug){
            $query = "select posts.*, categories.category from posts join categories on posts.category_id = categories.id where posts.slug  = :slug limit 1";
            $row = query_row($query, ['slug'=> $slug]);
        }
        if($row){
        
            ?>
            <div class="col-md-12">
            <h3 class="mb-0 text-danger"><?=esc($row['title'])?></h3>
                <div class="col g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"> 
                    <div class="col-12 d-lg-block">
                        <img src="<?=get_image($row['image'])?>" alt="" class="bd-placeholder-img" width="100%" style="object-fit: cover;" height="600">
                </div>
                <br>
                <div class="col p-4 d-flex flex-column position-static">
                    <div class="mb-1 text-body-secondary"><?=date("jS M, Y", strtotime($row['date']))?></div>
                    <p class="card-text mb-auto"><?=nl2br(add_root_to_images($row['content']))?></p>
                </div>
                <div>
                    <button class="btn btn-success float-end" onclick="goBack()">More stories</button>
                    <script>
                        function goBack(){
                            window.history.back()
                        }
                    </script>
                </div>
            </div>
        <?php
         
        }else{
          echo "No post found";
        }
        
        ?>
    
<?php
include '../app/pages/includes/footer.php'
?>