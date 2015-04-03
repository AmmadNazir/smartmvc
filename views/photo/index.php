<div class="ebooking">
<form class="form-horizontal" role="form" action="<?=URL;?>photo/upload" method="post" enctype='multipart/form-data'>
    <div class="form-group">
    <label for="text" class="col-sm-2 control-label">File</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" name="file" required>
    </div>
  </div>
        <input type="submit" class="btn btn-success bmine" value="Insert">
</form><br/>
<br/>
<p>Echo data</p>
<table class="table table-bordered">
    <thead class="table table-striped">
        <tr>
            <td>ID</td>
            <td>File</td>
            <td>FIle Name</td>
            <td>Delete</td>
        </tr>
    </thead>
<?php
    foreach($this->showimg as $key => $value) 
    {
        echo '<tbody><tr>';
        echo '<td>'.$value['id'].'</td>';
        echo '<td><img class="img img-rounded" src='.URL.'upload/'.$value['file'].'></td>';
        echo '<td>' . $value['file'] . '</td>';
        echo '<td><a href="'.URL.'photo/delphoto/'.$value['id'].'">Delete</a></td>';
        echo '</tr></tbody>';
    }
?>
</table>
 </div>