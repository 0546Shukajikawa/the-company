<?php
    require_once 'Database.php';

    class User extends Database{
        public function store($request){

            //recive the registration details coming theregistration form
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $username = $request['username'];
            // $password = $request['password'];

            $password = password_hash($request['password'],PASSWORD_DEFAULT);

            #create the query string
            $sql = "INSERT INTO users(first_name, last_name, username, password) VALUES('$first_name','$last_name','$username','$password')";

            #Execute the query string
            if($this->conn->query($sql)){
                header('location:../Views');//go to index.php page
                exit;
            }else{
                die("Error creating user. " . $this->conn->error);
            }
        }


        public function login($request){
            $username = $request['username'];
            $password = $request['password'];

            #query string
            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = $this->conn->query($sql);

            #cheack if the username exists
            //1=true :user found
            if($result->num_rows == 1){
                #check if the password is correct as per record in the database
                $user = $result->fetch_assoc();
                //$password=enter from customer: $user['password']=password in database
                if(password_verify($password,$user['password'])){
                    #create the session variables
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fullname'] = $user['first_name']. " " . $user['last_name'];
    
                    header('location:../Views/dashboard.php');
                    exit;
                }else{
                    die("Password is incorrect. ");
                }
            }else{
                die("Username does not exists.");
            }
        }


        public function logout(){
            session_start();
            session_unset();
            session_destroy();

            header('location:../Views');
        }


        public function getAllUsers(){
            #query string
            $sql = "SELECT id, first_name, last_name, username, photo FROM users";

            if($result = $this->conn->query($sql)){
                return $result;
            }else{
                die('Error retriving all user data ' . $this->conn->error);
            }
        }


        public function getUser(){
            $id = $_SESSION['id'];

            $sql = "SELECT first_name, last_name, username, photo FROM users WHERE id='$id'";
            if($result = $this->conn->query($sql)){
                return $result->fetch_assoc();
            }else{
                die('Error retriving user. ' . $this->conn->error);
            }
        }


        public function updata($request, $files){
            session_start();
            $id = $_SESSION['id'];
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $username = $request['username'];
            $photo = $files['photo']['name'];
            $tmp_photo = $files['photo']['tmp_name'];
            
            #Query string
            $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', username='$username' WHERE id='$id'";
            if($this->conn->query($sql)){
                $_SESSION['username'] = $username;
                $_SESSION['fullname'] = "$first_name $last_name";

                #if there is photo uploaded, saved it to the database and also save the file to the images folder
                if($photo){
                    $sql = "UPDATE users SET photo='$photo' WHERE id='$id' ";
                    $destination = "../Assets/images/$photo";

                    //Execute query and mobe the photo to the Db
                    if($this->conn->query($sql)){
                        //move the photo to the distination
                        if(move_uploaded_file($tmp_photo, $destination)){
                            header("location:../Views/dashboard.php");
                            exit;
                        }else{
                            die("Error moving the photo");
                        }
                    }else{
                        die("Error uploading photo " . $this->conn->error);
                    }
                }
                header("location:../Views/dashboard.php");
                exit;
            }else{
                die("Error updating the user: " . $this->conn->error);
            }
        }


        public function delete(){
            session_start();
            $id = $_SESSION['id'];
            
            #Query string
            $sql = "DELETE FROM users WHERE id='$id'";
            if($this->conn->query($sql)){
                $this->logout();
            }else{
                die("Error".$this->conn->error);
            }
        }


    }//End of class
?>