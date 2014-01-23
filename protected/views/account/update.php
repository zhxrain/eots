<h2><?php echo 'Update User'; ?></h2>

<form class="form-horizontal" role="form" action="/index.php?r=account/update&id=<?= $model->id?>" method="post">
  <div class="form-group">
    <label for="inputText" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" id="inputText" name="username" placeholder="Username" value="<?php echo $model->username?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" value="<?= $model->password?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-sm-2 control-label">Password again</label>
    <div class="col-sm-4">
    <input type="password" class="form-control" id="inputPassword1" name="repeatpassword" placeholder="Password again" value="<?= $model->password?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-4">
    <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" value="<?php echo $model->email?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
