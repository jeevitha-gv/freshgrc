<?php
require_once "../../php/common/config.php";
//check if form is submitted
if (isset($_POST['submit']))
{
    $filename = $_FILES['file1']['name'];
    $m_no = $_POST['m_no'];

    // echo $m_no;

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif', 'csv'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from tbl_files';
            $result = mysqli_query($link, $sql);
            if (count($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['id']+1) . '-' . $filename;
            }
            else
                $filename = '1' . '-' . $filename;

            //set target directory
            $path = 'boarduploads/';

            if ( ! is_dir($path)) {
               mkdir($path);
            }
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
            
            // insert file details into database
            $sql = "INSERT INTO boardtbl_files(m_no, filename, created) VALUES('$m_no', '$filename', '$created')";
            mysqli_query($link, $sql);
            header("Location: boardagenda.php?userid=$m_no");
        }
        else
        {
            // header("Location: index.php?st=error");
        }
    }
    // else
        // header("Location: index.php");
}
?>