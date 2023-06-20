<?php
function verifyAdmin(){
    $role = $_SESSION['role'];
    if($role!='admin' && $role!='subadmin'  ){
        header('Location: ../blog.php');
    }
}
function  insert_category()
{
    global $conn;
    if (isset($_POST['submit'])) {

        $cat_name = $_POST['cat_name'];
        if ($cat_name == "" || empty($cat_name)) {
            echo "dfjdfdf";
        } else {
            $query = "INSERT INTO category(cat_name) VALUE ('{$cat_name}') ";
            $create_cat_query = mysqli_query($conn, $query);
            if (!$create_cat_query) {
                die('QUERY FAILED' . mysqli_error($conn));
            }
        }
    }
}

function findeAllCat()
{

    global $conn;
    $query = "SELECT * FROM category";
    $select_all_category_query = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($select_all_category_query)) {
        $cat_id =  $row['cat_id'];
        $cat_name = $row['cat_name'];
        echo "<tr>";
        echo " <td> $cat_id</td>";
        echo " <td> $cat_name </td>";
        echo " <td><a href='category.php?delete={$cat_id}'>Delete</td>";
        echo " <td><a href='category.php?edit={$cat_id}'>Edit</td>";
        echo "</tr>";
    }
}

function findeAllSub()
{
    global $conn;
    $query = "SELECT * FROM subcategory";
    $select_all_subcategory_query = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($select_all_subcategory_query)) {
        $sub_id =  $row['sub_id'];
        $sub_name = $row['sub_name'];
        echo "<tr>";
        echo " <td> $sub_id</td>";
        echo " <td> $sub_name </td>";
        echo " <td><a href='subcategory.php?delete={$sub_id}'>Delete</td>";
        echo " <td><a href='subcategory.php?edit={$sub_id}'>Edit</td>";
        echo "</tr>";
    }
}

function insert_Sub()
{
    global $conn;
    if (isset($_POST['submit'])) {

        $sub_name = $_POST['sub_name'];
        if ($sub_name == "" || empty($sub_name)) {
            echo "dfjdfdf";
        } else {
            $query = "INSERT INTO subcategory(sub_name) VALUE ('{$sub_name}') ";
            $create_cat_query = mysqli_query($conn, $query);
            if (!$create_cat_query) {
                die('QUERY FAILED' . mysqli_error($conn));
            }
        }
    }
}

function insert_subadmins()
{
    global $conn;
    if (isset($_POST['adduser'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $role = $_POST['role'];
        if (($username == "" || empty($username)) || ($email == "" || empty($email)) ||
            ($password == "" || empty($password)) ||($role == "" || empty($role))
        ) {
            echo " these shouldnt be empty ";
        } else {
            $query = "INSERT INTO user (username , email , password , role) VALUES ('{$username}' , '{$email}', '{$password}' , '{$role}')";
            $create_query_user = mysqli_query($conn, $query);

            if (!$create_query_user) {
                die('QUERY FAILED' . mysqli_error($conn));
            }
        }
    }
}
function findAllSubadmins()
{

    global $conn;
    $query = "SELECT * FROM user";
    $select_all_user_query = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($select_all_user_query)) {
        $id = $row['id'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
        $role = $row['role'];

        echo "<tr>";
        echo " <td>  $username </td>";
        echo " <td>  $email</td>";
        // echo " <td>  $password </td>";
        echo " <td>  $role </td>";
        echo " <td><a href='subadmins.php?delete={$id}'>Delete</td>";
        echo " <td><a href='subadmins.php?edit={$id}'>Edit</td>";
        echo "</tr>";
    }
}

function insertPost()
{
    global $conn;
    if (isset($_POST['submit'])) {
        $post_title = $_POST['post_title'];
        $post_date = date('d-m-y');
        $cat_id = $_POST['cat_id'];
        $sub_id = $_POST['sub_id'];
        $post_details = $_POST['post_details'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        move_uploaded_file($post_image_temp, "../images1/$post_image");
        $query = "INSERT INTO post (post_title , post_date , cat_id , sub_id , post_details , post_image) VALUES ('{$post_title}' , now(), '{$cat_id}' , '{$sub_id}' , '{$post_details}' ,'$post_image'])";
        $create_query_post = mysqli_query($conn, $query);
    }
}

function findAllPost()
{
    global $conn;
    $query = "SELECT * FROM post ";
    $select_all_post_query = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($select_all_post_query)) {
        $post_id =  $row['post_id'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $cat_id = $row['cat_id'];
        $sub_id = $row['sub_id'];
        $post_details = $row['post_details'];
        $post_image = $row['post_image'];
        $user_id = $row['user_id'];

        echo "<tr>";
        echo " <td>  $post_id</td>";
        echo " <td>   $post_title </td>";
        echo " <td>   $post_date </td>";
        $query = "SELECT * FROM  category WHERE cat_id = $cat_id ";
        $select_all_category_query = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($select_all_category_query)) {
            $cat_id =  $row['cat_id'];
            $cat_name = $row['cat_name'];
            echo " <td>   $cat_name </td>";
        }
        $query = "SELECT * FROM  subcategory WHERE sub_id = $sub_id ";
        $select_all_category_query = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($select_all_category_query)) {
            $sub_id =  $row['sub_id'];
            $sub_name = $row['sub_name'];
            echo " <td>   $sub_name </td>";
        }
        echo " <td>   $post_details</td>";
        echo " <td>   <img src='../images1/$post_image'  alt='' style='width: 50px;'></td>";
        echo " <td>   $user_id </td>";
        echo " <td><a href='view_post.php?delete={$post_id}'>Delete</td>";
        echo " <td><a href='view_post.php?edit={$post_id}'>Edit</td>";
        echo "</tr>";
    }
}
function findAllCom()
{
    global $conn;
    $query = "SELECT * FROM comments ";
    $select_comm_query = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($select_comm_query)) {
        $comment_id =  $row['comment_id'];
        $comment_date =  $row['comment_date'];
        $comment_name =  $row['comment_name'];
        $comment_email = $row['comment_email'];
        $comment_message = $row['comment_message'];
        $comment_status = $row['comment_status'];

        echo "<tr>";
        echo " <td>  $comment_id</td>";
        echo " <td>   $comment_date </td>";
        echo " <td>   $comment_name </td>";
        echo " <td>   $comment_email</td>";
        echo " <td>   $comment_message</td>";
        echo " <td>    $comment_status </td>";
        echo " <td><a href='comments.php?approve={$comment_id}'>Approve</td>";
        echo " <td><a href='comments.php?delete={$comment_id}'>Unapprove</td>";
        echo "</tr>";
    }
}
function findAllSubs(){
    global $conn;
    $query = "SELECT * FROM subscribers ";
    $select_Subs = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_Subs) ){
        $subscribers_id = $row['subscribers_id'];
        $subscribers_email =  $row['subscribers_email'];

        echo "<tr>";
        echo " <td> $subscribers_id</td>";
        echo " <td> $subscribers_email</td>";
        echo "<tr>";
    }
}
function handleRequstesComment()
{

    if (isset($_GET['approve'])) {
        approveCom($_GET['approve']);
    } else if (isset($_GET['delete'])) {
        unapproveCom($_GET['delete']);
    }
}
function approveCom($comment_id)
{
    global $conn;
    $query = "UPDATE comments SET comment_status = 'APPROVED' WHERE comment_id = {$comment_id}";
    mysqli_query($conn, $query);
}
function unapproveCom($comment_id)
{
    global $conn;
    $query = "DELETE FROM  comments   WHERE  comment_id = {$comment_id}";
    mysqli_query($conn, $query);
}

function handleRequstesRegister(){
    global $conn;

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $useremail = $_POST['email'];
    $userpass = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $query = "INSERT INTO user (username , email , password ,role) VALUES ('$username','  $useremail','$userpass','reader')";
    mysqli_query($conn, $query);
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'reader';
    header('Location: blog.php');
  }
  
}

function displayAbout(){
    global $conn;
    $query = "SELECT * FROM aboutus ";
    $select_about = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_about) ){
        $about_id = $row['about_id'];
        $about_info=  $row['about_info'];

        echo "<tr>";
        echo " <td> $about_id</td>";
        echo " <td> $about_info</td>";
        echo " <td><a href='edit_about.php?edit={$about_id}'>Edit</td>";
        echo "<tr>";
    }
}
function displayCon(){
    global $conn;
    $query = "SELECT * FROM contact ";
    $select_contact = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_contact) ){
        $cont_id = $row['cont_id'];
        $cont_add=  $row['cont_add'];
        $cont_nr=  $row['cont_nr'];
        $cont_email=  $row['cont_email'];


        echo "<tr>";
        echo " <td> $cont_id</td>";
        echo " <td> $cont_add </td>";
        echo " <td> $cont_nr  </td>";
        echo " <td> $cont_email </td>";
        echo " <td><a href='edit_contact.php?edit={$cont_id}'>Edit</td>";
        echo "<tr>";
    }
}
?>