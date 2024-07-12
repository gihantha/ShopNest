<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/common/head") ?>
</head>

<body>
    <div class="container mt-10">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img class="img-fluid w-100" src="<?php echo base_url() ?>assets/img/logo.jpg" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" id="loginForm">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter User Name..." id="inputusername" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" placeholder="Password" id="inputpassword" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url(); ?>forget_password">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url(); ?>register">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <?php $this->load->view("admin/common/footer") ?>  -->

    <?php $this->load->view("admin/common/js") ?>

    <script>
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();

            var uname  = $('#inputusername').val();
            var upass = $('#inputpassword').val();

            $.ajax({
                type: 'POST',
                url: "<?=base_url()?>user_login",
                data: 'username='+uname+'&password='+upass,
                success: function(result) {

                    var resdata = $.parseJSON(result);

                    if(resdata.status == 'success'){
                        Swal.fire({
                            title: 'Login!',
                            text: resdata.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });

                        window.location.replace("<?php echo base_url() ?>home")
                    }else{
                        Swal.fire({
                            title: 'Login!',
                            text: resdata.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    }
                    
                },
                error:function(result){
                    alert('error');
                }
            })



        });

        // function user_login() {


            // swal({
            //     title: "Good job!",
            //     text: "You clicked the button!",
            //     type: "error",
            //     buttonsStyling: false,
            //     confirmButtonClass: "btn btn-danger"
            // });
            // Swal.fire({
            //                   title: 'Login!',
            //                 text: "resdata.message",
            //                 icon: 'error',
            //                 confirmButtonText: 'OK'
            //             });
            // alert('User logged In');
        // }
    </script>

</body>

</html>