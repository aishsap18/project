<?php
include("../include/config.php");
session_start();

$user = $_SESSION['user_id'];

//echo $_POST['user_select'];
//echo $_POST['event_select'];

$user_select = $_POST['user_select'];
$event_select = $_POST['event_select'];

$sql = "SELECT user_id FROM dms_users WHERE fullname = '$user_select'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

//echo $row['user_id'];

$sql1 = "SELECT event_id FROM dms_event WHERE eventname = '$event_select'";
$result1 = mysqli_query($db,$sql1);
$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);

//echo $row1['event_id'];
$user_select = $row['user_id'];
$event_select = $row1['event_id'];

$sql2 = "INSERT INTO dms_data_master (user_id,event_id) VALUES ( '$user_select','$event_select' )";
$result2 = mysqli_query( $db,$sql2 );

$sql = "SELECT * FROM dms_event WHERE parent_id = '$event_select' AND active = 0";

$r = mysqli_query($db,$sql);
$rows = array();

while($row = mysqli_fetch_array($r)){

    array_push($rows,array(
        'event_id'=>$row['event_id'],
        'parent_id'=>$row['parent_id'],
        'children'=>null
    ));

}

function buildTree(array $elements, $parentId, $db, $user_select) {
    $branch = array();

    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $event_select = $element['event_id'];
            $sql2 = "INSERT INTO dms_data_master (user_id,event_id) VALUES ( '$user_select','$event_select' )";
            $result2 = mysqli_query( $db,$sql2 );
            $children = buildTree($elements, $element['event_id'], $db, $user_select);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }

    return $branch;
}

$result = buildTree($rows,$event_select,$db,$user_select);

echo json_encode(array('result'=>$result));
/*
$count=0;
while($count==0){
    $sql4 = "SELECT * FROM dms_event WHERE parent_id = '$event_select' and active = 0";
    $result4 = mysqli_query( $db,$sql4 );

    $count1 = mysqli_num_rows($result4);
    if($count1!=0){
        while($row = mysqli_fetch_assoc($result4)){
            $event_select = $row['event_id'];
            $sql3 = "INSERT INTO dms_data_master (user_id,event_id) VALUES ( '$user_select','$event_select' )";
            $result3 = mysqli_query( $db,$sql3 );
        }
    }else{
        $count = 1;
    }
}
*/
//echo "<script>alert('User Assigned'); location.href=\"../admin/admin_userwise_events.php\"; </script>";
?>