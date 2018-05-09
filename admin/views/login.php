<div class="container">
<div class="page-header">
  <h1>Login<small> ลงชื่อเข้าใช้</small></h1>
</div>

<form action="signin" method="POST" role="form">
<?php 
    if($this->session->flashdata('msg') != ''){
        echo '
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$this->session->flashdata('msg').'
        </div>';
    }
    if($this->session->flashdata('success') != ''){
        echo '
         <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$this->session->flashdata('success').'
        </div>';
    }    
?>   
    <div class="form-group">
        <label for="">Username</label>
        <input type="text" name="username" class="form-control" id="" placeholder="ชื่อผู้ใช้" required>
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" id="" placeholder="รหัสผ่าน" required>
    </div>
    <button type="submit" class="btn btn-primary">Signin</button>
</form>

</div>