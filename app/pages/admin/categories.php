<?php if($action == 'add'):?>
    <div class="col-md-6 mx-auto">
        <form method="post" <?= htmlspecialchars($_SERVER["PHP_SELF"])?> enctype="multipart/form-data">
            <h1 class="h3 mb-3 fw-normal">Create Category</h1>
            <!-- Display errors -->
            <?php if(!empty($errors)):?>
                <div class="alert alert-danger mb-2">Please fix the errors below</div>
            <?php endif;?>
            <div class="form-floating">
                <input value="<?=old_value('category')?>" name="category" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Category</label>
            </div>
            <!-- Display errors -->
            <?php if(!empty($errors['category'])):?>
                <div class="text-danger"><?=$errors['category']?></div>
            <?php endif;?>

            <div class="form-floating">
            <select id="floatingdisabled" name="disabled" id="disabled" class= "form-select mb-2">
                <option value="0">Yes</option>
                <option value="1">No</option>
            </select>
            <label for="floatingdisabled">Active</label>
            </div>
            <script>
                    function goBack(){
                        window.history.back()
                    }
            </script>
            <button class="mt-4 btn btn-secondary w-40 py-2 btn-sm" type="button" onclick="goBack()">Back</button>
            <button class="mt-4 btn btn-primary w-40 py-2 btn-sm float-end" type="submit">Create</button>        </form>
    </div>
<?php elseif($action == 'edit'):?>
    <div class="col-md-6 mx-auto">
        <form method="post" <?= htmlspecialchars($_SERVER["PHP_SELF"])?> enctype="multipart/form-data">
            <h1 class="h3 mb-3 fw-normal">Edit Category</h1>
            
            <?php if(!empty($row)):?>
                <!-- Display errors -->
                <?php if(!empty($errors)):?>
                    <div class="alert alert-danger mb-2">Please fix the errors below</div>
                <?php endif;?>

                <div class="form-floating">
                    <input value="<?=old_value('category'), $row['category']?>" name="category" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Category</label>
                </div>
                <!-- Display errors -->
                <?php if(!empty($errors['category'])):?>
                    <div class="text-danger"><?=$errors['category']?></div>
                <?php endif;?>

                <div class="form-floating">
                <select id="floatingdisabled" name="disabled" id="disabled" class= "form-select mb-2">
                    <option <?=old_select('disabled', '0', $row['disabled'])?> value="0">Yes</option>
                    <option <?=old_select('disabled', '1', $row['disabled'])?> value="1" >No</option>
                </select>
                <label for="floatingdisabled">Active</label>
                </div>
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
                    <a href="<?=ROOT?>/admin/categories">
                        <button class="mt-4 btn btn-secondary w-100 py-2 btn-sm" type="button">Back</button>
                    </a>
                </div>
            <?php endif;?>
        </form>
    </div>
    
<?php elseif($action == 'delete'):?>
    <div class="col-md-6 mx-auto">
        <form method="post" <?= htmlspecialchars($_SERVER["PHP_SELF"])?>>
            <h1 class="h3 mb-3 fw-normal">Delete Category</h1>
            
            <?php if(!empty($row)):?>
                <!-- Display errors -->
                <?php if(!empty($errors)):?>
                    <div class="alert alert-danger mb-2">Please fix the errors below</div>
                <?php endif;?>
                <div class="form-floating">
                    <div class="form-control mb-2"><?=old_value('category'), $row['category']?></div>
                    <label for="floatingInput">Category</label>
                </div>
                <!-- Display errors -->
                <?php if(!empty($errors['category'])):?>
                    <div class="text-danger"><?=$errors['category']?></div>
                <?php endif;?>
                <div class="form-floating">
                    <div class="form-control mb-2"><?=old_value('slug'), $row['slug']?></div>
                    <label for="floatingInput">Slug</label>
                </div>
                <?php if(!empty($errors['slug'])):?>
                    <div class="text-danger"><?=$errors['slug']?></div>
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
                    <a href="<?=ROOT?>/admin/categories">
                        <button class="mt-4 btn btn-secondary w-100 py-2 btn-sm" type="button">Back</button>
                    </a>
                </div>
            <?php endif;?>
        </form>
    </div>
<?php else:?>

        <h4>
            Categories 
            <a href="<?= ROOT?>/admin/categories/add">
                <button class="btn btn-primary btn-sm">Add New</button>
                <svg class="bi"><use xlink:href="#plus-circle"/></svg>
            </a>
        </h4>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
                <?php

                $limit  = 5;
                $offset = ($PAGE['page_number'] - 1) * $limit;

                $query = "select * from categories order by id desc limit $limit offset $offset";
                $rows = query($query);
                ?>

                <?php if(!empty($rows)):?>
                    <?php foreach($rows as $row):?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=esc($row['category'])?></td>
                        <td><?=$row['slug']?></td>
                        <td><?=$row['disabled'] ? 'No': 'Yes'?></td>
                        <td>
                            <a href="<?= ROOT?>/admin/categories/edit/<?=$row['id']?>">
                                <button class="btn btn-warning btn-sm text-white"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="<?= ROOT?>/admin/categories/delete/<?=$row['id']?>">
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