<div class="ebooking">
<form class="form-horizontal" role="form" action="<?=URL;?>index/run" method="post" enctype='multipart/form-data'>
  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">Number</label>
    <div class="col-sm-10">
     <input type="text" class="form-control" name="name" required="required" autocomplete="off">
    </div>
  </div>
    <div class="form-group">
    <label for="text" class="col-sm-2 control-label">Number</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="file">
    </div>
  </div>
        <input type="submit" class="btn btn-success bmine" value="Insert">
</form><br/>
<p>Echo data</p>
<table class="table table-bordered">
    <thead class="table table-striped">
<?php foreach($_GET as $key => $value ){
    echo  $value;
}
?>
        <tr>
            <td>ID</td>
            <td>Data</td>
            <td>Delete</td>
        </tr>
    </thead>
<?php
    foreach($this->show as $key => $value) 
        {
        
        echo '<tbody><tr>';
        echo '<td>' . $value['id'] . '</td>';
        echo '<td>' . $value['name'] . '</td>';
        echo '<td><a href="'.URL.'index/del/'.$value['id'].'">Delete</a></td>';
        echo '</tr></tbody>';
    }
?>
</table>
 </div>