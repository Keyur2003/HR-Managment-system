<?php
    include_once('connect.php');
    // error_reporting(0);
    session_start();
$session_id = $_SESSION['admin_id'];
if($_SESSION['admin_id']=='') {
    header("Location:login.php");
    exit;
}
    $session_user = $_SESSION['user'];
    
  //   stores the last row of database into variable named query
      
    if($_SESSION['admin_id']=='') {
	header("Location:login.php");
	exit;
}
    $query = "select * from userprofile where uid = '$session_id'";
    $result = mysqli_query($con, $query) or die( mysqli_error($con));

    
    if (isset($_POST['submit'])) {

        // defining variables
		
        // $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $dateofbirth = $_POST['dateofbirth'];   
        $status = $_POST['status'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $curaddress = $_POST['curaddress'];
        $peraddress = $_POST['peraddress'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];
        $contact = $_POST['contact'];
        $state = $_POST['state'];
        $emergency_no = $_POST['emergency_no'];
        $new_img = $_FILES['profile_img']['name'];
        $old_img = $_POST['old_img'];
        $bank_name = $_POST['bank_name'];
        $account_number = $_POST['account_number'];
        $holder_name = $_POST['holder_name'];
        $ifsc = $_POST['ifsc'];
        $identity_pdf = $_FILES['identity']['name'];
        $old_identity_pdf = $_POST['old_identity_pdf'];
        $pan_pdf = $_FILES['pan']['name'];
        $old_pan_pdf = $_POST['old_pan_pdf'];
        
        
        

        $target_dir = "../assets/uploadimage/$session_user/";
        $target_dir1 = "../assets/uploaddocument/identity/$session_user/";
        $target_dir2 = "../assets/uploaddocument/pan/$session_user/";
        
        $target_file = $target_dir.basename($_FILES["profile_img"]["name"]);
        $target_file1 = $target_dir1.basename($_FILES["identity"]["name"]);
        $target_file2 = $target_dir2.basename($_FILES["pan"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $pdfFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        $pdfFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));


        $extensions_arr = array("jpg","jpeg","png","gif");
        $extensions_arr1 = array("pdf");
        
        if ($new_img!=''){
            $update_filename = $_FILES['profile_img']['name'];
        }
        else{
            $update_filename = $old_img;
        }
        if ($identity_pdf!=''){
            $update_pdf = $_FILES['identity']['name'];
        }
        else{
            $update_pdf = $old_identity_pdf;
        }
        if ($pan_pdf!=''){
            $update_pan_pdf = $_FILES['pan']['name'];
        }
        else{
            $update_pan_pdf = $old_pan_pdf;
        }
        
        
            // Insert record
            
            $query = "INSERT INTO `userprofile`( `uid`,`profile_img`, `firstname`, `dateofbirth`, `status`, `lastname`, `age`, `curaddress`, `peraddress`, `city`, `pincode`, `contact`, `state`, `emergency_no`) VALUES ('$session_id','$update_filename','$firstname','$dateofbirth','$status','$lastname','$age','$curaddress','$peraddress','$city','$pincode','$contact','$state','$emergency_no') on duplicate key UPDATE profile_img='$update_filename', firstname='$firstname', dateofbirth='$dateofbirth', status='$status', lastname='$lastname', age='$age', curaddress='$curaddress', peraddress='$peraddress', city='$city', pincode='$pincode', contact='$contact', state='$state', emergency_no='$emergency_no' ";

            $query1 = "INSERT INTO `documents`(`emp_id`,`identity`, `pan`) VALUES ('$session_id','$update_pdf','$update_pan_pdf') ON DUPLICATE KEY UPDATE identity='$update_pdf',pan='$update_pan_pdf'";
            
            $query2 = "INSERT INTO `bank_details`(`emp_id`,`bank_name`, `ifsc`, `account_number`, `holder_name`) VALUES ('$session_id','$bank_name','$ifsc','$account_number','$holder_name') ON DUPLICATE KEY UPDATE bank_name='$bank_name',account_number='$account_number',ifsc='$ifsc',holder_name = '$holder_name'";

           
            $query_run = mysqli_query($con,$query) or die( mysqli_error($con));
            $query_run1 = mysqli_query($con,$query1) or die( mysqli_error($con));
            $query_run2 = mysqli_query($con,$query2) or die( mysqli_error($con));
            

            if($query_run && $query_run1 && $query_run2)
            {
                $new_img = str_replace(' ', '', $new_img);
                if ($_FILES['profile_img']['name']!=''){
                    move_uploaded_file($_FILES['profile_img']['tmp_name'],$target_dir.$new_img);
                    $old_img = str_replace(' ', '', $old_img);
                    unlink("../assets/uploadimage/$session_user/$old_img");
                }
                else{
                    move_uploaded_file($_FILES['old_img']['tmp_name'],$target_dir.$old_img);
                }
                if ($_FILES['identity']['name']!=''){
                    move_uploaded_file($_FILES['identity']['tmp_name'],$target_dir1.$identity_pdf);
                    $old_identity_pdf = str_replace(' ', '', $old_identity_pdf);
                    unlink("../assets/uploaddocument/identity/$session_user/$old_identity_pdf");
                }
                
                if ($_FILES['pan']['name']!=''){
                    move_uploaded_file($_FILES['pan']['tmp_name'],$target_dir2.$pan_pdf);
                    $old_pan_pdf = str_replace(' ', '', $old_pan_pdf);
                    unlink("../assets/uploaddocument/pan/$session_user/$old_pan_pdf");
                }
                
                // echo "<pre>";
                // print_r($_POST);
                // echo "</pre>";
                // exit('aaa');
                header("Location: profile.php");
                echo '<script>alert("Profile Updated!")</script>';
            }
            else {
                echo '<script>alert("Profile Not Updated!")</script>';
            }
        }
    



    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayur Polymers HRM</title>
    <link rel="stylesheet" href="../assets/css/userprofile.css">
    <?php include '../core/header.php';?>
    <script src="../assets/js/justprogress.js"></script>
</head>
<script src="https://surveybaba.com/new/public/assets/js/jquery-1.11.1.min.js"></script>
<script type='text/javascript' src='https://surveybaba.com/new/public/assets/js/jquery.validate.min.js'></script>
<script type="text/javascript">
    
    (function($, W, D)
    {
        var JQUERY4U = {};

        JQUERY4U.UTIL =
                {
                    setupFormValidation: function()
                    {
                        //form validation rules
                        $("#msform").validate({
                            rules: {
                                dateofbirth: "required",
                                status: "required",
                                age: "required",
                                curaddress: "required",
                                peraddress: "required",
                                city: "required",
                                state: "required",
                                emergency_no: "required",
                                contact: "required",
                            },
                            messages: {
                                dateofbirth: "<p style='color:red;font-weight:100; font-size:14px'>Please Enter date of birth!</p>",
                                status:  "<p style='color:red;font-weight:100; font-size:14px'>Please Enter Password!</p>",
                                age:  "<p style='color:red;font-weight:100; font-size:14px'>Please Enter Password!</p>",
                                curaddress:  "<p style='color:red;font-weight:100; font-size:14px'>Please Enter Password!</p>",
                                peraddress:  "<p style='color:red;font-weight:100; font-size:14px'>Please Enter Password!</p>",
                                state:  "<p style='color:red;font-weight:100; font-size:14px'>Please Enter Password!</p>",
                                emergency_no:  "<p style='color:red;font-weight:100; font-size:14px'>Please Enter Password!</p>",
                                contact:  "<p style='color:red;font-weight:100; font-size:14px'>Please Enter Password!</p>",
                                city:  "<p style='color:red;font-weight:100; font-size:14px'>Please Enter Password!</p>",
								},
                            submitHandler: function(form) {
                                form.submit();
                            }
                        });
                    }
                }

        //when the dom has loaded setup form validation rules
        $(D).ready(function($) {
            JQUERY4U.UTIL.setupFormValidation();
        });

    })(jQuery, window, document);
</script>
<body>
    <div class="container-fluid">
        <div class="row ">
        <?php include '../core/sidenav.php'; include '../core/functions.php'?>
            <script src="../assets/js/sidenav.js"></script>
            <div class="col-9 col9">
           
                <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-11 text-center mt-3 mb-2 cd">
                    <div class="card">
                        <div class="-div">
                            <p class="card-title">Profile</p>
                        </div>
                        <form method="POST" enctype="multipart/form-data" id="msform" class="px-3" >
                            <!-- progressbar -->
                            <?php
                             
                           //   stores the last row of database into variable named query
                            $query = "select * from userprofile where uid = '$session_id'";
                            $result = mysqli_query($con, $query) or die( mysqli_error($con));
                            while($a=mysqli_fetch_array($result) ){
                                $que = "select * from bank_details where  emp_id= '$session_id'";
                                $res = mysqli_query($con, $que) or die( mysqli_error($con));
                                $b = mysqli_fetch_assoc($res);
                                $query1 = "select * from documents where emp_id = '$session_id'";
                                $result1 = mysqli_query($con, $query1) or die( mysqli_error($con));
                                $c = mysqli_fetch_assoc($result1);
                                
                                
                            ?>
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Profile Builder</strong></li>
                                <li id="personal"><strong>Documents</strong></li>
                                <li id="payment"><strong>Bank Details</strong></li>
                                <li id="confirm"><strong>Completed</strong></li>
                            </ul>
                            <fieldset>
                                <div class="form-card">
                                <p class="prof">Profile Builder:</p>
                                <img src="../assets/uploadimage/<?=$session_user?>/<?=$a['profile_img']?>" class="profile-img img-fluid" width="100px" onerror="this.src='../assets/images/dummy.png'"><br><br>
                                <input type="file" name="profile_img" accept="image/*">
                                <input type="hidden" value="<?php echo $a['profile_img'];?>" name="old_img">
                                    <div class="row">
                                        <div class="col-6">
                                            <br>
                                            <label class="fieldlabels">Username</label>
                                            <input type="text" name="username" id="" placeholder="Username" value="<?php echo $a['username']?>"; class="body-input" disabled>
                                            <label class="fieldlabels">Firstname</label>
                                            <input type="text" name="firstname" id="" placeholder="First name" value="<?php echo $a['firstname']?>"; class="body-input">
                                            <label class="fieldlabels">Date Of Birth</label>
                                            <input type="date" name="dateofbirth" id="" placeholder="dd-mm-yy" value="<?php echo $a['dateofbirth']?>"; class="body-input">
                                        </div>
                                        <div class="col-6">
                                            <br>
                                            <label class="fieldlabels">Status</label>
                                            <select name="status" id="">
                                                <?php if($a['status']==''){
                                                ?>
                                                <option value="" hidden>Select Your Current Status</option>
                                                <?php }else{?>
                                                <option value="<?php echo $a['status']?>" hidden><?php echo $a['status']?></option>
                                                <?php }?>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                            <label class="fieldlabels">Lastname</label>
                                            <input type="text" name="lastname" id="" placeholder="Last name" value="<?php echo $a['lastname']?>"; class="body-input">
                                            <label class="fieldlabels">Age</label>
                                            <input type="number" name="age" id="" placeholder="Age" value="<?php echo $a['age']?>"; class="body-input">
                                        </div>

                                    </div>
                                    <label class="fieldlabels">Current Address</label>
                                    <textarea name="curaddress" rows="4" class="body-text"><?php echo $a['curaddress']?></textarea>
                                    <label class="fieldlabels">Permanant Address</label>
                                    <textarea name="peraddress" rows="4"  class="body-text"><?php echo $a['peraddress']?></textarea>
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="fieldlabels">City</label>
                                            <select name="city" id="">
                                            <?php if($a['city']==''){
                                            ?>
                                            <option value="" hidden>Select City</option>
                                            <?php }else{?>
                                            <option value="<?php echo $a['city']?>" hidden><?php echo $a['city']?></option>
                                            <?php }?>
                                                <option value="Ahemdabad">Ahemdabad</option>
                                                <option value="Vadodara">Vadodara</option>
                                                <option value="Rajkot">Rajkot</option>
                                                <option value="Surat">Surat</option>
                                            </select>
                                            <label class="fieldlabels">Pincode</label>
                                            <input type="number" name="pincode" id="" placeholder="Pincode" value="<?php echo $a['pincode']?>"; class="body-input">
                                            <label class="fieldlabels">Contact</label>
                                            <input type="number " name="contact" id="" placeholder="Contact Number" value="<?php echo $a['contact']?>"; class="body-input">
                                        </div>
                                        <div class="col-6">
                                            <label class="fieldlabels">State</label>
                                            <select name="state" id="">
                                            <?php if($a['state']==''){
                                                ?>
                                                <option value="" hidden>Select State</option>
                                                <?php }else{?>
                                                    <option value="<?php echo $a['state']?>" hidden><?php echo $a['state']?></option>
                                                <?php }?>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                            </select>
                                            

                                            <label class="fieldlabels">Emergency Number</label>
                                            <input type="number" name="emergency_no" id="" placeholder="Emergency Number" value="<?php echo $a['emergency_no']?>"; class="body-input">
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <p class="prof">Documents</p>
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="fieldlabels">Upload Your Aadhar Card</label>
                                            <br>
                                            <input type="file" name="identity" accept="application/pdf">
                                            <input type="hidden" value=" <?php echo $c['identity'];?>" name="old_identity_pdf">
                                            <br>
                                        </div>
                                        <div class="col-6">
                                            <label class="fieldlabels">Upload Your Pan Card</label>
                                            <br>
                                            <input type="file" name="pan" accept="application/pdf">
                                            <input type="hidden" value=" <?php echo $c['pan'];?>" name="old_pan_pdf">
                                            <br>
                                        </div>
                                        
                                    </div>
                                </div> 
                                <br>
                                <input type="button" name="next" class="next action-button" value="Next" />
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <p class="prof">Bank Details</p>
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="fieldlabels">Bank Name</label>
                                            <input type="text " name="bank_name" id="" placeholder="Bank Name" value="<?php echo $b['bank_name']?>" class="body-input">
                                        </div>
                                        <div class="col-6">
                                            <label class="fieldlabels">Account Number</label>
                                            <input type="number " name="account_number" id="" placeholder="Account Number" value="<?php echo $b['account_number']?>" class="body-input">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="fieldlabels">IFSC Code</label>
                                            <input type="text " name="ifsc" id="" placeholder="IFSC Code" value="<?php echo $b['ifsc']?>" class="body-input">
                                        </div>
                                        <div class="col-6">
                                            <label class="fieldlabels">Account Holder Name</label>
                                            <input type="number " name="holder_name" id="" placeholder="Account Holder Name" value="<?php echo $b['holder_name']?>" class="body-input">
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" name="submit" id ="add-btn"class="next action-button" value="Submit" />
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card" id="add_form">
                                <p class="prof">Successfully Submitted!</p>
                                    <br>
                                    
                                </div>
                                <div>
                                
                                
                                
                            </div>
                            </fieldset>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>

