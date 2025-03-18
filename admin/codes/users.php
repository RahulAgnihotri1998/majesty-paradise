<?php
function getUsers(){
    global $conn;
    $sql = "SELECT * FROM user ORDER BY ID DESC";
    $result = mysqli_query($conn, $sql);
    if($result){
        $getUser = array();
        while($row = mysqli_fetch_assoc($result)){
            $getUser[] = $row;
        }
        return $getUser;
    }
}
?>