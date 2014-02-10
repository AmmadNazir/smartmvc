
<div class="ebooking">
<form class="form-horizontal" role="form" action="<?=URL;?>index/run" method="post">
  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">Number</label>
    <div class="col-sm-10">
     <input type="text" class="form-control" name="name" required="required" autocomplete="off">
    </div>
  </div>
        <input type="submit" class="btn btn-success bmine" value="Insert">
</form><br/>
<p>Echo data</p>
<table>
<?php
    foreach($this->userList as $key => $value) {
        echo '<tr>';
        echo '<td>' . $value['userid'] . '</td>';
        echo '<td>' . $value['login'] . '</td>';
        echo '<td>' . $value['role'] . '</td>';
        echo '<td>
                <a href="'.URL.'user/edit/'.$value['userid'].'">Edit</a> 
                <a href="'.URL.'user/delete/'.$value['userid'].'">Delete</a></td>';
        echo '</tr>';
    }
?>
</table>

    </div>