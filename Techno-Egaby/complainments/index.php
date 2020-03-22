<?php
  include '../components/header.php';
  if (isset($_POST['send'])) {
  $email      = $_POST['email'];
  $msg_title  = $_POST['msg_title'];
  $msg        = $_POST['msg'];
  $from='from: '.$email.'/r/n';
  $my_email="mahmoudhasan509@gmail.com";
  

  $err = array();
  if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)==false) {
    $err[]="email is invalid";
  }
  //validate  title msg 
  if (empty($msg_title)) {
   $err[]="Enter message title";
  }elseif (strlen($msg_title)<=3) {
    $err[]="Enter message more than 3 char";
  }elseif (strlen($msg_title)>70) {
    $err[]="Enter message less than 70 char";
  }
  //validate msg
  if(empty($msg)) {
   $err[]="Enter message title";
  }elseif (strlen($msg_title)<=3) {
    $err[]="Enter message more than 3 char";
  }elseif (strlen($msg_title)>900) {
    $err[]="Enter message less than 70 char";
  }

  if (!empty($err)) {
    foreach ($err as $msgError) {
      echo $msgError .'<br>';
    }
  }else{
    mail($my_email , $msg_title , $msg  , $from);
  }
}
?>
  <link rel="stylesheet" href="../public/style/main.css">
  <!-- <link rel="stylesheet" href="./style/complainment.css"> -->
</head>
<body>
  <?php
    include '../components/nav.php';
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center m-3 title line-bottom">كتابة شكوى او مقترح</h1>
      </div>
      <div class="col-md-12">
        <div class="form-container border rounded shadow p-5">
          <form class="" action="index.html" method="post">
            <div class="form-group">
              <label>البريد الالكتروني</label>
              <input name="email" type="email" required
                oninvalid="this.setCustomValidity('يجب ان يحتوي هذا الحقل على بريد الكتروني')"
                oninput="this.setCustomValidity('')"
                class="form-control" />
            </div>
            <div class="form-group">
              <label> عنوان الاشكوى او المفترح</label>
              <input name ="msg_title" type="text" maxlength="30" required
                oninvalid="this.setCustomValidity('يجب عليك ملءهذا الحقل')"
                oninput="this.setCustomValidity('')"
                class="form-control" />
            </div>
            <div class="form-group">
              <label>الشكوى او المقترح</label>
              <textarea name="msg" required
                oninvalid="this.setCustomValidity('يجب عليك ملءهذا الحقل')"
                oninput="this.setCustomValidity('')"
                class="form-control" ></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="إرسال" class="form-control btn btn-warning" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <?php
    include '../components/footer.php';
  ?>
  <!-- <script src="./script/complainment.js"></script> -->


</body>
</html>