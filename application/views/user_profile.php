<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("includes/head") ?>	
</head>

<body>


    <?php $this->load->view("includes/topbar") ?> 

     <?php $this->load->view("includes/navbar") ?> 

     <div class="container-fluid">

                    

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">User Profile</h1>

                    <div class="container-fluid ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        User Details
                                    </div>
                                    <div class="card-body">
                                        <!-- <form class="user"> -->
                                        <div class="form-group ">

                                            <label>User Name</label>
                                            <input type="text" class="form-control form-control-user" id="name" placeholder="Please Enter Name" value="" disabled>


                                        </div>
                                        <div class="form-group row">

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>User Phone</label>

                                                <input type="text" class="form-control form-control-user" id="phone" placeholder="Please Enter Phone Number" value="">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label>User Email</label>

                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" value="" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>User Address</label>

                                            <textarea class="form-control form-control-user" placeholder="Address" id="address">
                                            
                                        </textarea>

                                        </div>
                                        <!-- <div class="form-group">
                                        <label>User Password</label>

                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="User Password">
                                    </div> -->

                                        <button class="btn btn-primary btn-user btn-block" >
                                            Update Profile
                                        </button>
                                        <hr>

                                        <!-- </form> -->
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="card mb-4">
                                    <div class="card-header">
                                        <center><img width="150px" class="img-profile rounded-circle" src="<?php echo base_url() ?>assets/img/undraw_profile.svg"></center>
                                    </div>
                                    <div class="card-body">
                                        <h4><b>Admin</b></h4>
                                        <p>Engineer</p>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h3>Password Reset</h3>
                                    </div>
                                    <div class="card-body">
                                        <form class="user" id="changeps">
                                            <div class="form-group ">
                                                <label>Old Password</label>
                                                <input type="text" class="form-control form-control-user" placeholder="Please Enter Old Password" id="oldpass" required>
                                            </div>
                                            <div class="form-group ">
                                                <label>New Password</label>
                                                <input type="text" class="form-control form-control-user" placeholder="Please Enter New Password" id="newpass" required>
                                            </div>
                                            <div class="form-group ">
                                                <label>Confirm Password</label>
                                                <input type="text" class="form-control form-control-user" placeholder="Please Enter New Password" id="conpass" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block"> Change Password </button>
                                        </form>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                </div>
    
    <?php $this->load->view("includes/footer") ?> 


    <?php $this->load->view("includes/js") ?>

</body>
</html>