<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ; ?></title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= base_url() ; ?>assets/cdn/normalize.min.css">
    <link rel="stylesheet" href="<?= base_url() ; ?>assets/cdn/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ; ?>assets/cdn/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ; ?>assets/cdn/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ; ?>assets/cdn/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="<?= base_url() ; ?>assets/cdn/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url() ; ?>assets/admin/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?= base_url() ; ?>assets/admin/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">
    
    <div class="flash-sukses" data-flashdata="<?= $this->session->flashdata('flash-sukses') ; ?>"></div>
    <div class="flash-error" data-flashdata="<?= $this->session->flashdata('flash-error') ; ?>"></div>

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <h3 class="mb-5 text-white"><?= $title ; ?></h3>
                    </a>
                </div>
                <div class="login-form">
                  <form action="" onsubmit="ajax_login(); return false">
                      <div class="form-group">
                          <label>Email address</label>
                          <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                      </div>
                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                      </div>
                      
                      <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Login</button>
                      
                  </form>
              </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ; ?>assets/cdn/jquery.min.js"></script>
    <script src="<?= base_url('assets/sweetalert/sweetalert2.js') ; ?> "></script>
    <script src="<?= base_url('assets/sweetalert/new_script.js') ; ?> "></script>
    <script src="<?= base_url() ; ?>assets/cdn/popper.min.js"></script>
    <script src="<?= base_url() ; ?>assets/cdn/bootstrap.min.js"></script>
    <script src="<?= base_url() ; ?>assets/cdn/jquery.matchHeight.min.js"></script>

</body>
</html>

<script>

  function ajax_login(){
    let email = $("#email").val();
    let password = $("#password").val();
    $.ajax({
        url: "<?= base_url('Auth/login') ; ?>",
        type: "POST",
        data: {
          email: email,
          password: password
        },
        success:function(result){
            if (result == 'Valid')
            {
              
              Swal.fire({
                title: 'Success',
                text: 'Login Sukses',
                icon: 'success'
              }).then((result) => {
                if (result.value) {
                  setTimeout(function ()
                  {
                    document.location.href = "<?= base_url('Dashboard') ; ?>";
                  }, 500)
                }
              });
            }
            else
            {
              Swal.fire({
                title: 'Sorry !!',
                text: result,
                icon: 'warning'
              });

              $('#email').val("");
              $('#password').val("");
            }
        }
    });
  }
  
</script>
