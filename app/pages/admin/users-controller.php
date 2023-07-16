<?php
    if($action == 'add'){
        if(!empty($_POST)){
        // validations
        
            $errors = [];
            //  username validation
            if(empty($_POST['username'])){
            $errors['username'] = "A username is required";
            }else
            if(!preg_match("/^[a-zA-Z ]*$/", $_POST['username'])){
            $errors['username'] = "Username can only have letters and no spaces";
            }

            // role validation
            if(empty($_POST['role'])){
                $errors['role'] = "Role is required";
            }
        
            // password validation
            if(empty($_POST['password'])){
            $errors['password'] = "Password is required";
            }else
            if(strlen($_POST['password']) < 8){
            $errors['password'] = "Password cannot be less than 8 characters";
            }
            if(($_POST['password']) !== $_POST['retype_password']){
            $errors['password'] = "Passwords do not match";
            }
            // email validation
            $query = "select id from users where email = :email limit 1";
            $email = query($query, ['email'=>$_POST['email']]);
            if(empty($_POST['email'])){
            $errors['email'] = "Email is required";
            }else
            if($email){
            $errors['email'] = "That email is already in use";
            }else
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format"; 
            }else
            if(($_POST['email'] !== $_POST['retype_email'])){
            $errors['email'] = "Emails don't match";
            }

            //validate image
            $allowed = ['image/jpeg','image/png','image/webp'];
            if(!empty($_FILES['image']['name']))
            {
                $destination = "";
                if(!in_array($_FILES['image']['type'], $allowed))
                {
                $errors['image'] = "Image format not supported";
                }else
                {
                $folder = "uploads/";
                if(!file_exists($folder))
                {
                    mkdir($folder, 0777, true);
                }

                $destination = $folder . time() . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                resize_image($destination);
                }

            }
        
            // Insert into Users
            if(empty($errors)){
            $data = [];
            $data['username'] = $_POST['username'];
            $data['email']    = $_POST['email'];
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $data['role']     = $_POST['role'];
            
        
            $query = "insert into users (username,email,password,role) values (:username,:email,:password,:role)";

            if(!empty($destination))
            {
              $data['image']     = $destination;
              $query = "insert into users (username,email,password,role,image) values (:username,:email,:password,:role,:image)";
            }

            query($query, $data);
        
            redirect('admin/users');
            }
        }
        }else // edit 
        if($action == 'edit'){
            $query = "select * from users where id = :id limit 1";
            $row = query_row($query, ['id'=>$id]);
            if(!empty($_POST)){
            // validations
            if($row){
                $errors = [];
                //  username validation
                if(empty($_POST['username'])){
                $errors['username'] = "A username is required";
                }else
                if(!preg_match("/^[a-zA-Z ]*$/", $_POST['username'])){
                $errors['username'] = "Username can only have letters and no spaces";
                }
            
                // password validation
                if(empty($_POST['password'])){
                
                }else
                if(strlen($_POST['password']) < 8){
                $errors['password'] = "Password cannot be less than 8 characters";
                }
                if(($_POST['password']) !== $_POST['retype_password']){
                $errors['password'] = "Passwords do not match";
                }
                // email validation
                $query = "select id from users where email = :email && id != :id limit 1";
                $email = query($query, ['email'=>$_POST['email'], 'id'=> $id]);
                if(empty($_POST['email'])){
                $errors['email'] = "Email is required";
                }else
                if($email){
                $errors['email'] = "That email is already in use";
                }else
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email format"; 
                }else
                if(($_POST['email'] !== $_POST['retype_email'])){
                $errors['email'] = "Emails don't match";
                }
    
                // validate image file
                $allowed = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp'];
                if(!empty($_FILES['image']['name'])){
                    $destination = "";
                    if(!in_array($_FILES['image']['type'], $allowed)){
                        $errors['image'] = "Image format not supported";
                    }else{
                        $folder = "uploads/";
                        if(!file_exists($folder)){
                            mkdir($folder, 0777, true);
                        }
                        $destination = $folder . time() . $_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                        resize_image($destination);
                    }
                }
                // Update Users
                if(empty($errors)){
                $data = [];
                $data['username'] = $_POST['username'];
                $data['email']    = $_POST['email'];
                $data['role']     = $_POST['role'];
                $data['id']       = $id;

                $password_str     = "";
                $image_str         = "";
                if(!empty($_POST['password'])){
                    $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $password_str = "password = :password, ";
                }
                if(!empty($destination)){
                    $image_str = "image = :image, ";
                    $data['image'] = $destination;
                }

                $query = "update users set username = :username, email = :email, $password_str $image_str role = :role where id = :id limit 1";



                query($query, $data);
                redirect('admin/users');
                }
            }
            }
        }else // delete from database
        if($action == 'delete'){
            $query = "select * from users where id = :id limit 1";
            $row = query_row($query, ['id'=>$id]);
            if($_SERVER['REQUEST_METHOD'] == "POST"){
            // validations
            if($row){
                $errors = [];
                //  username validation
            
                // delete from users
                if(empty($errors)){
                $data = [];
                $data['id'] = $id;
                $query = "delete from users where id = :id limit 1";

                query($query, $data);
                
                if(file_exists($row['image'])){
                    unlink($row['image']);
                }

                redirect('admin/users'); 
                }
            }
            }
        }