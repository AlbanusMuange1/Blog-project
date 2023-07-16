<div class="row justify-content-center">
    
    <div class="m-2 col-md-4 bg-light rounded shadow border text-center">
        <h1><i class="bi bi-person-video3"></i></h1>
        <a href="<?=ROOT?>/admin/users">
        <div>
            Admins
        </div>
                <?php
        $query = 'select count(id) as num from users where role = "admin"';
        $res = query_row($query)
        ?>
        <h1 class="text-secondary"><?=$res['num'] ?? 0?></h1>
        </a>
    </div>
    


    <div class="m-2 col-md-4 bg-light rounded shadow border text-center">
        <h1><i class="bi bi-person-circle"></i></h1>
        <a href="<?=ROOT?>/admin/users">
        <div>
            Users
        </div>
                <?php
        $query = 'select count(id) as num from users where role = "user"';
        $res = query_row($query)
        ?>
        <h1 class="text-secondary"><?=$res['num'] ?? 0?></h1>
        </a>
    </div>
    <div class="m-2 col-md-4 bg-light rounded shadow border text-center">
        <h1><i class="bi bi-tags"></i></h1>
    <a href="<?=ROOT?>/admin/categories">

        <div>
            Categories
        </div>
                <?php
        $query = 'select count(id) as num from categories';
        $res = query_row($query)
        ?>
        <h1 class="text-secondary"><?=$res['num'] ?? 0?></h1>
    </a>
    </div>
    <div class="m-2 col-md-4 bg-light rounded shadow border text-center">
        <h1><i class="bi bi-file-post"></i></h1>
        <a href="<?=ROOT?>/admin/posts">
        <div>
            Posts
        </div>
        <?php
        $query = 'select count(id) as num from posts';
        $res = query_row($query)
        ?>
        <h1 class="text-secondary"><?=$res['num'] ?? 0?></h1>
    </a>
    </div>

</div>