<?php if($action == 'add'):?>
    <link rel="stylesheet" href="<?=ROOT?>/assets/summernote/summernote-lite.min.css">

    <div class="col-md-10 mx-auto">
        <form method="post" <?= htmlspecialchars($_SERVER["PHP_SELF"])?> enctype="multipart/form-data">
            <h1 class="h3 mb-3 fw-normal">Create Post</h1>
            <!-- Display errors -->
            <?php if(!empty($errors)):?>
                <div class="alert alert-danger mb-2">Please fix the errors below</div>
            <?php endif;?>
            <div class="my-2">
                <h4>Featured Image</h4><br>
                    <label class="d-block">
                        <img class="mx-auto d-block rounded-circle image-preview-edit"src="<?=get_image('')?>" alt="User's Profile" style="width: 150px;height: 150px;object-fit: cover">
                        <input class="mx-auto d-block" type="file" name="image" onchange="display_image_edit(this.files[0])">
                    </label>
                    <?php if(!empty($errors['image'])):?>
                        <div class="text-danger"><?=$errors['image']?></div>
                    <?php endif;?>
                    <script>
                        function display_image_edit(file){
                            document.querySelector(".image-preview-edit").src = URL.createObjectURL(file);
                        }
                    </script>
                </div>
            <div class="form-floating">
                <input value="<?=old_value('title')?>" name="title" type="text" class="form-control mb-2" id="floatingInput" placeholder="title">
                <label for="floatingInput">Title</label>
            </div>
            <!-- Display errors -->
            <?php if(!empty($errors['title'])):?>
                <div class="text-danger"><?=$errors['title']?></div>
            <?php endif;?>
            <div>
                <textarea id="summernote" name="content" class="form-control mb-2"  id="content" cols="10" rows="10" placeholder="Post Content"><?=old_value('content')?></textarea>
            </div>
            <?php if(!empty($errors['content'])):?>
            <div class="text-danger"><?=$errors['content']?></div>
            <?php endif;?>
            <div class="form-floating">
            <select id="floatingcategory" name="category_id" id="category" class= "form-select mb-2">
                <?php
                    $query = "select * from categories order by id desc";
                    $categories = query($query);
                ?>
                <option value=""> Select-- </option>
                <?php if (!empty($categories)):?> 
                    <?php foreach($categories as $cat):?> 
                        <option <?=old_select('category_id', $cat['id'])?> value="<?=$cat['id']?>"><?=$cat['category']?></option>
                    <?php endforeach;?>
                <?php endif;?>
            </select>
            <label for="floatingcategory">Choose category</label>
            </div>
            <?php if(!empty($errors['category'])):?>
            <div class="text-danger"><?=$errors['category']?></div>
            <?php endif;?>
            <script>
                    function goBack(){
                        window.history.back()
                    }
            </script>
            <button class="mt-4 btn btn-secondary w-40 py-2 btn-sm" type="button" onclick="goBack()">Back</button>
            <button class="mt-4 btn btn-primary w-40 py-2 btn-sm float-end" type="submit">Create</button>        </form>
    </div>
    <script src="<?=ROOT?>/assets/js/jquery.js"></script>
    <script src="<?=ROOT?>/assets/summernote/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Post Content',
            tabsive: 2,
            height: 400,
        });
    </script>
<?php elseif($action == 'edit'):?>

    <link rel="stylesheet" href="<?=ROOT?>/assets/summernote/summernote-lite.min.css">

    <div class="col-md-10 mx-auto">
        <form method="post" <?= htmlspecialchars($_SERVER["PHP_SELF"])?> enctype="multipart/form-data">
            <h1 class="h3 mb-3 fw-normal">Edit Post</h1>
            
            <?php if(!empty($row)):?>
                <!-- Display errors -->
                <?php if(!empty($errors)):?>
                    <div class="alert alert-danger mb-2">Please fix the errors below</div>
                <?php endif;?>
                <div class="my-2">
                    <label class="d-block">
                        <img class="mx-auto d-block rounded-circle image-preview-edit"src="<?=get_image($row['image'])?>" alt="User's Profile" style="width: 150px;height: 150px;object-fit: cover">
                        <input class="mx-auto d-block" type="file" name="image" onchange="display_image_edit(this.files[0])">
                    </label>
                    <?php if(!empty($errors['image'])):?>
                        <div class="text-danger"><?=$errors['image']?></div>
                    <?php endif;?>
                    <script>
                        function display_image_edit(file){
                            document.querySelector(".image-preview-edit").src = URL.createObjectURL(file);
                        }
                    </script>
                </div>

                <div class="form-floating">
                    <input value="<?=old_value('title'), $row['title']?>" name="title" type="text" class="form-control mb-2" id="floatingInput" placeholder="title">
                    <label for="floatingInput">Title</label>
                </div>
                <!-- Display errors -->
                <?php if(!empty($errors['title'])):?>
                    <div class="text-danger"><?=$errors['title']?></div>
                <?php endif;?>
                <div>
                <textarea id="summernote" name="content" class="form-control mb-2"  id="content" cols="10" rows="10" placeholder="Post Content"><?=old_value('content', add_root_to_images($row['content']))?></textarea>
            </div>
            <?php if(!empty($errors['content'])):?>
            <div class="text-danger"><?=$errors['content']?></div>
            <?php endif;?>
            <div class="form-floating">
            <select id="floatingcategory" name="category_id" id="category" class= "form-select mb-2">
                <?php
                    $query = "select * from categories order by id desc";
                    $categories = query($query);
                ?>
                <option value=""> Select-- </option>
                <?php if (!empty($categories)):?> 
                    <?php foreach($categories as $cat):?> 
                        <option <?=old_select('category_id', $cat['id'], $row['category_id'])?> value="<?=$cat['id']?>"><?=$cat['category']?></option>
                    <?php endforeach;?>
                <?php endif;?>
            </select>
            <label for="floatingcategory">Choose category</label>
            </div>
            <?php if(!empty($errors['category'])):?>
            <div class="text-danger"><?=$errors['category']?></div>
            <?php endif;?>
                <script>
                    function goBack(){
                        window.history.back()
                    }
                </script>
                <button class="mt-4 btn btn-secondary w-40 py-2 btn-sm" type="button" onclick="goBack()">Back</button>
                <button class="mt-4 btn btn-primary w-40 py-2 btn-sm float-end" type="submit">Save</button>
            <?php else:?>
                <div class="alert alert-danger text-center">Record not found</div>
                <div>
                    <a href="<?=ROOT?>/admin/posts">
                        <button class="mt-4 btn btn-secondary w-100 py-2 btn-sm" type="button">Back</button>
                    </a>
                </div>
            <?php endif;?>
        </form>
    </div>
    <script src="<?=ROOT?>/assets/js/jquery.js"></script>
    <script src="<?=ROOT?>/assets/summernote/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Post Content',
            tabsive: 2,
            height: 400,
        });
    </script>
    
<?php elseif($action == 'delete'):?>
    <div class="col-md-10 mx-auto">
        <form method="post" <?= htmlspecialchars($_SERVER["PHP_SELF"])?>>
            <h1 class="h3 mb-3 fw-normal">Delete Post</h1>
            
            <?php if(!empty($row)):?>
                <!-- Display errors -->
                <?php if(!empty($errors)):?>
                    <div class="alert alert-danger mb-2">Please fix the errors below</div>
                <?php endif;?>
                <div class="my-2">
                    <label class="d-block" for="">
                        <img class="mx-auto d-block rounded-circle image-preview-edit"src="<?=get_image($row['image'])?>" alt="User's Profile" style="width: 150px;height: 150px;object-fit: cover">
                </div>
                <div class="form-floating">
                    <div class="form-control mb-2"><?=old_value('title'), $row['title']?></div>
                    <label for="floatingInput">Title</label>
                </div>
                <!-- Display errors -->
                <?php if(!empty($errors['title'])):?>
                    <div class="text-danger"><?=$errors['title']?></div>
                <?php endif;?>
                <div class="form-floating">
                    <div class="form-control mb-2"><?=old_value('content'), $row['content']?></div>
                    <label for="floatingInput">Post content</label>
                </div>
                <?php if(!empty($errors['content'])):?>
                    <div class="text-danger"><?=$errors['content']?></div>
                <?php endif;?>
                <script>
                    function goBack(){
                        window.history.back()
                    }
                </script>
                <button class="mt-4 btn btn-secondary w-40 py-2 btn-sm" type="button" onclick="goBack()">Back</button>
                <button class="mt-4 btn btn-danger w-40 py-2 btn-sm float-end" type="submit">Delete</button>
            <?php else:?>
                <div class="alert alert-danger text-center">Record not found</div>
                <div>
                    <a href="<?=ROOT?>/admin/posts">
                        <button class="mt-4 btn btn-secondary w-100 py-2 btn-sm" type="button">Back</button>
                    </a>
                </div>
            <?php endif;?>
        </form>
    </div>
<?php else:?>

        <h4>
            Posts 
            <a href="<?= ROOT?>/admin/posts/add">
                <button class="btn btn-primary btn-sm">Add New</button>
                <svg class="bi"><use xlink:href="#plus-circle"/></svg>
            </a>
        </h4>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>content</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <?php

                $limit  = 5;
                $offset = ($PAGE['page_number'] - 1) * $limit;

                $query = "select * from posts order by id desc limit $limit offset $offset";
                $rows = query($query);
                ?>

                <?php if(!empty($rows)):?>
                    <?php foreach($rows as $row):?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=esc($row['title'])?></td>
                        <td><?=$row['content']?></td>
                        <td>
                            <img src="<?=get_image($row['image'])?>" alt="User's Profile" style="width: 50px;height: 50px;object-fit: cover">
                        </td>
                        <td><?=date("jS M, Y", strtotime($row['date']))?></td>
                        <td>
                            <a href="<?= ROOT?>/admin/posts/edit/<?=$row['id']?>">
                                <button class="btn btn-warning btn-sm text-white"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="<?= ROOT?>/admin/posts/delete/<?=$row['id']?>">
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                            </a>

                        </td>
                    </tr>
                    <?php endforeach;?>
                <?php endif;?>
            </table>
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
<?php endif;?>