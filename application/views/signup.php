<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form  action="saved" method="post" name="reg_form" onsubmit="return validate()">

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="firstName" name="first_name" class="form-control form-control-lg" placeholder="first name"/>
                    <span id="fname"></span>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="lastName" name="last_name" class="form-control form-control-lg" placeholder="last name"/>
                    <span id="lname"></span>
               
                </div>

                </div>
              </div>


              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" id="emailAddress" name="email" class="form-control form-control-lg" placeholder="email" required/>
                    <span id="email_error"></span>
               
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="tel" id="phoneNumber" name="phone" class="form-control form-control-lg" placeholder="phone number"/>
                    <span id="phone_error"></span>
               
                  </div>

                </div>
              </div>

              <div class="form-outline">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="password"/>
                    <span id="pass_error"></span>
               
                  </div>

                </div>
              </div>

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>

<script>  
    function validate() {  
        var fname = document.reg_form.firstName;  
        var lname = document.reg_form.lastName;  
        var email = document.reg_form.emailAddress;  
        var password = document.reg_form.password;  
        var phone = document.reg_form.phoneNumber;  
        
        if (fname.value.length <= 0) {  
            document.getElementById("fname").innerHTML=  "First Name Can't be Empty";
            document.getElementById("fname").style.color=  "red";
            
            fname.focus();  
            return false;  
        }  
        if (lname.value.length <= 0) {  
            document.getElementById("lname").innerHTML=  "Last Name Can't be Empty";
            document.getElementById("lname").style.color=  "red";
            lname.focus();  
            return false;  
        }
        if (email.value.length <= 0) {  
            document.getElementById("email_error").innerHTML=  "email Can't be Empty";
            document.getElementById("email_error").style.color=  "red";
            email.focus();  
            return false;  
        }
        if (phone.value.length <= 0) {  
            document.getElementById("phone_error").innerHTML=  "phone no. Can't be Empty";
            document.getElementById("phone_error").style.color=  "red";
            lname.focus();  
            return false;  
        }
        if (phone.value.length != 10) {  
            document.getElementById("phone_error").innerHTML=  "phone no. must be of 10 digits";
            document.getElementById("phone_error").style.color=  "red";
            phone.focus();  
            return false;  
        }
        if (password.value.length <= 0) {  
            document.getElementById("pass_error").innerHTML=  "password Can't be Empty";
            document.getElementById("pass_error").style.color=  "red";
            password.focus();  
            return false;  
        }
        
        if (password.value.length < 6) {  
            document.getElementById("pass_error").innerHTML=  "password Can't be less than 6 digit";
            document.getElementById("pass_error").style.color=  "red";
            password.focus();  
            return false;  
        }
    }
</script>  