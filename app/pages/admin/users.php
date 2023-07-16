<?php if($action == 'add'):?>
    <div class="col-md-6 mx-auto">
        <form method="post" enctype="multipart/form-data" <?= htmlspecialchars($_SERVER["PHP_SELF"])?>>
            <h1 class="h3 mb-3 fw-normal">Create Account</h1>
            <!-- Display errors -->
            <?php if(!empty($errors)):?>
                <div class="alert alert-danger mb-2">Please fix the errors below</div>
            <?php endif;?>
                <div class="my-2">
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
                <input value="<?=old_value('username')?>" name="username" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>
            <!-- Display errors -->
            <?php if(!empty($errors['username'])):?>
                <div class="text-danger"><?=$errors['username']?></div>
            <?php endif;?>
            <div class="form-floating">
                <input value="<?=old_value('email')?>" name="email" type="email" class="form-control mb-2"  id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Enter Email Address</label>
            </div>
            <?php if(!empty($errors['email'])):?>
                <div class="text-danger"><?=$errors['email']?></div>
            <?php endif;?>
            <div class="form-floating">
            <input value="<?=old_value('retype_email')?>" name="retype_email" type="email" class="form-control mb-2"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Confirm Email Address</label>
            </div>
            <?php if(!empty($errors['email'])):?>
            <div class="text-danger"><?=$errors['email']?></div>
            <?php endif;?>
            <div class="form-floating">
            <select id="floatingRole" name="role" id="role" class= "form-select mb-2">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <label for="floatingRole">Choose Role</label>
            </div>
            <?php if(!empty($errors['role'])):?>
            <div class="text-danger"><?=$errors['role']?></div>
            <?php endif;?>
            <div class="form-floating">
            <input value="<?=old_value('password')?>" name="password" type="password" class="form-control mb-2" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            </div>
            <?php if(!empty($errors['password'])):?>
            <div class="text-danger"><?=$errors['password']?></div>
            <?php endif;?>
            <div class="form-floating">
            <input value="<?=old_value('retype_password')?>" name="retype_password" type="password" class="form-control mb-2" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Confirm Password</label>
            </div>
            <!-- Display errors -->
            <?php if(!empty($errors['password'])):?>
            <div class="text-danger"><?=$errors['password']?></div>
            <?php endif;?>
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
            <h1 class="h3 mb-3 fw-normal">Edit Account</h1>
            
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
                    <input value="<?=old_value('username'), $row['username']?>" name="username" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <!-- Display errors -->
                <?php if(!empty($errors['username'])):?>
                    <div class="text-danger"><?=$errors['username']?></div>
                <?php endif;?>
                <div class="form-floating">
                    <input value="<?=old_value('email'), $row['email']?>" name="email" type="email" class="form-control mb-2"  id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Enter Email Address</label>
                </div>
                <?php if(!empty($errors['email'])):?>
                    <div class="text-danger"><?=$errors['email']?></div>
                <?php endif;?>
                <div class="form-floating">
                <input value="<?=old_value('retype_email'), $row['email']?>" name="retype_email" type="email" class="form-control mb-2"  id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Confirm Email Address</label>
                </div>
                <?php if(!empty($errors['email'])):?>
                <div class="text-danger"><?=$errors['email']?></div>
                <?php endif;?>
                <div class="form-floating">
                <select id="floatingRole" name="role" id="role" class= "form-select mb-2">
                    <option <?=old_select('role', 'user', $row['role'])?> value="user">User</option>
                    <option <?=old_select('role', 'admin', $row['role'])?> value="admin" >Admin</option>
                </select>
                <label for="floatingRole">Choose Role</label>
                </div>
                <?php if(!empty($errors['role'])):?>
                <div class="text-danger"><?=$errors['role']?></div>
                <?php endif;?>
                <div class="form-floating">
                <input value="<?=old_value('password')?>" name="password" type="password" class="form-control mb-2" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password (Leave Empty To Keep Old One)</label>
                </div>
                <?php if(!empty($errors['password'])):?>
                <div class="text-danger"><?=$errors['password']?></div>
                <?php endif;?>
                <div class="form-floating">
                <input value="<?=old_value('retype_password')?>" name="retype_password" type="password" class="form-control mb-2" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Confirm Password</label>
                </div>
                <!-- Display errors -->
                <?php if(!empty($errors['password'])):?>
                <div class="text-danger"><?=$errors['password']?></div>
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
                    <a href="<?=ROOT?>/admin/users">
                        <button class="mt-4 btn btn-secondary w-100 py-2 btn-sm" type="button">Back</button>
                    </a>
                </div>
            <?php endif;?>
        </form>
    </div>
    
<?php elseif($action == 'delete'):?>
    <div class="col-md-6 mx-auto">
        <form method="post" <?= htmlspecialchars($_SERVER["PHP_SELF"])?>>
            <h1 class="h3 mb-3 fw-normal">Delete Account</h1>
            
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
                    <div class="form-control mb-2"><?=old_value('username'), $row['username']?></div>
                    <label for="floatingInput">Username</label>
                </div>
                <!-- Display errors -->
                <?php if(!empty($errors['username'])):?>
                    <div class="text-danger"><?=$errors['username']?></div>
                <?php endif;?>
                <div class="form-floating">
                    <div class="form-control mb-2"><?=old_value('email'), $row['email']?></div>
                    <label for="floatingInput">Email Address</label>
                </div>
                <?php if(!empty($errors['email'])):?>
                    <div class="text-danger"><?=$errors['email']?></div>
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
                    <a href="<?=ROOT?>/admin/users">
                        <button class="mt-4 btn btn-secondary w-100 py-2 btn-sm" type="button">Back</button>
                    </a>
                </div>
            <?php endif;?>
        </form>
    </div>
<?php else:?>

        <h4>
            Users 
            <a href="<?= ROOT?>/admin/users/add">
                <button class="btn btn-primary btn-sm">Add New</button>
                <svg class="bi"><use xlink:href="#plus-circle"/></svg>
            </a>
        </h4>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <?php

                $limit  = 5;
                $offset = ($PAGE['page_number'] - 1) * $limit;

                $query = "select * from users order by id desc limit $limit offset $offset";
                $rows = query($query);
                ?>

                <?php if(!empty($rows)):?>
                    <?php foreach($rows as $row):?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=esc($row['username'])?></td>
                        <td><?=$row['email']?></td>
                        <td><?=$row['role']?></td>
                        <td>
                            <img src="<?=get_image($row['image'])?>" alt="User's Profile" style="width: 50px;height: 50px;object-fit: cover">
                        </td>
                        <td><?=date("jS M, Y", strtotime($row['date']))?></td>
                        <td>
                            <a href="<?= ROOT?>/admin/users/edit/<?=$row['id']?>">
                                <button class="btn btn-warning btn-sm text-white"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="<?= ROOT?>/admin/users/delete/<?=$row['id']?>">
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