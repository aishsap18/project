<?php
if (isset($_POST['action'])) {

    $eventname = mysqli_real_escape_string($db,$_POST['submit']);
    //echo $eventname;

    $sql = "SELECT event_id FROM dms_event WHERE eventname='$eventname'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $event_id = $row['event_id'];
}
?>
   <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <form class='form-inline' action='' method='post' enctype='multipart/form-data'>
            <div class='form-group-sm'>
                <input type='file' name='fileToUpload' class='file hidden'>
                <div class='input-group-sm'>
                    <div class='col-lg-2 col-md-2 col-sm-2 col-xs-6'>
                        <input type='text' id='input_browse' class='form-control' disabled placeholder='Upload document' name='doc_name'>
                    </div>
                    <div class='col-lg-2 col-md-2 col-sm-2 col-xs-4'>
                        <button class='browse btn btn-default' id='browse_button' type='button'>Browse</button>
                    </div>
                    <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                        <input type='text' class='form-control' id='description' placeholder='Enter description' name='description'>
                    </div>
                    <div class='col-lg-2 col-md-2 col-sm-2 col-xs-4'>
                        <input class='btn btn-default' id='add_button' type='submit' value='Upload' name='submit'>
                    </div>
                </div>
            </div>
        </form>
        </div>


    <script type="text/javascript">
        $(document).on('click', '.browse', function(){
            var file = $(this).parent().parent().parent().find('.file');
            file.trigger('click');
        });
        $(document).on('change', '.file', function(){
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
    </script>

<?php
$user = $_SESSION['user_id'];

$_SESSION['event_id'] = $event_id;

if(!empty($_POST['description']) && !empty($_FILES['fileToUpload']['name'])) {

    $description = $_POST['description'];
    //echo $event_id;

    $sql2 = "SELECT * FROM dms_data_master";
    $retval2 = mysqli_query($db, $sql2);

    $dmid = "";
    while ($row = mysqli_fetch_assoc($retval2)) {
        if ($row['user_id'] == $user && $row['event_id'] == $event_id) {
            $dmid = $row['dm_id'];
            //echo $dmid." found";
            break;
        }
    }
    if ($dmid == "") {
        $sql1 = "INSERT INTO dms_data_master (user_id,event_id) VALUES ( '$user','$event_id' )";
        $retval1 = mysqli_query($db, $sql1);
        $sql3 = "SELECT dm_id FROM dms_data_master WHERE user_id='$user' AND event_id='$event_id'";
        $retval3 = mysqli_query($db, $sql3);
        $row = mysqli_fetch_array($retval3, MYSQLI_ASSOC);
        $dmid = $row['dm_id'];
        //echo $dmid." inserted and found";
    }

    //$info = pathinfo($_FILES['doc']['name']);
    //$ext = $info['extension']; // get the extension of the file
    //$newname = "newname.pdf";
    //$target = 'uploads/'.$newname;

    $file_path = "../uploads/";

    $name = basename($_FILES['fileToUpload']['name']);
    $filename = time().$name;
    $file_path = $file_path.$filename;

    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file_path);

    //$temp = $_FILES["fileToUpload"]["name"];

    $sql = "INSERT INTO dms_data (dm_id,displayname,filename,description) VALUES ( '$dmid','$name','$filename','$description' )";

    //mysql_select_db('dms');
    $retval = mysqli_query($db, $sql);

    if (!$retval) {
        die('Could not enter data: ' . mysql_error());
    }

    //echo "Entered data successfully\n";


    //echo "<h3 align='center'>Upload successful.</h3> <script>setTimeout(\"location.href = 'home.php';\",2500);</script>";
    echo "<div id=\"dialog-message\" title='Successful'>
   <p>
    Files successfully uploaded
  </p>
</div>";
}

?>

