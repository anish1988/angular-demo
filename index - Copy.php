 <!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Talkiedo</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
	 <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
	 <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> 
	 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>
	 <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-messages.js"></script>

	  <script src="myController.js"></script>

    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    \\\
    <![endif]-->
	 
    <style>
    .form-group.required .control-label:after {
      content:"*";
      color:red;
  }
  </style>
</head> 
<body ng-app="postApp" ng-controller="postController">
    <div class="navbar navbar-inverse navbar-fixed-top">           
		   <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">talkiedo</a>
				<p class="navbar-subbrand">for the love of movie!</p>
            </div>
	</div>
 <div id="page-wrapper" class="">
        
        <div class="container-fluid">
		    
			<div class="row " style="margin-top:-20px">
			   
			    <div class="col-md-offset-3 col-md-6 producer_well">
				<form name="userForm" ng-submit="submitForm()">
					  <input type="hidden" value="" name="producer_id"/> 
                    <div class="form-body">
                        <div class="form-group required">
                           
                            <div class="col-md-12">
                                <input name="producer_name" id="producer_name" placeholder="Name" class="form-control1" type="text" ng-model="user.producer_name" required ng-minlength="3" ng-maxlength="8">
                             <!--   <span class="help-block">
								<p ng-show="userForm.producer_name.$touched.minlength">Username is too short.</p>

    <!-- show an error if username is too long -->
  <!--  <p ng-show="userForm.producer_name.$touched.maxlength">Username is too long.</p>-->

    <!-- show an error if this isn't filled in -->
   <div class="help-block" ng-messages="userForm.producer_name.$error" ng-show="userForm.producer_name.$touched">

                                </span>
							<!--	<div ng-messages="userForm.producer_name.$error">
        <p ng-message="minlength">Your name is too short.</p>
        <p ng-message="maxlength">Your name is too long.</p>
        <p ng-message="required">Your name is required.</p>
    </div>-->
							</div>
                        </div>
					<!--	<div class="form-group">
                            
                            <div class="col-md-12">
                                <input id="company_logo" name="company_logo" type="file" class="file form-control1">
                                <span class="help-block"></span>
                            </div>
                        </div>-->
						 <div class="form-group required">
						
						<div class="col-md-12">
						<select class="form-control1 select" name="continent" id="continent" ng-model="user.continent" onChange="getCountry(this.value);">
						<option value="" >Select Continent </option>
						<option value="1" >Asia</option>
						<option value="2" >South Africa</option>
						<option value="3" >North Africa </option>
						<option value="4" >Antalitca </option>
						<option value="5" >Abc </option>
						      
					<!--     <option value="<?php //echo $continents['continent_id'];?>"><?php //echo $continents['continent_name'];?></option>-->
						
						</select>
						 <span class="help-block"></span>
						</div>
						</div>
						 <div class="form-group required countryHide">
						
						<div class="col-md-12">
						<select class="form-control1 select" name="country" id="country" ng-model="user.country" onChange="getState(this.value);">
						<option value=""> Select Country</option>
						
						</select>
						 <span class="help-block"></span>
						</div>
						</div>
						
						<div class="form-group required steteHide">
						
						<div class="col-md-12">
						<select class="form-control1 select" name="state" id="state" ng-model="user.state" onChange="getCity(this.value);">
						<option value=""> Select Country</option>
						
						</select>
						 <span class="help-block"></span>
						</div>
						</div>
						<div class="form-group required cityHide">
						
						<div class="col-md-12">
						<select class="form-control1 select" name="city" ng-model="user.state" id="city">
						<option value=""> Select City</option>
						
						</select>
						 <span class="help-block"></span>
						</div>
						</div>
						<div class="form-group required">
                           
                            <div class="col-md-12">
                                <input name="address1" id="address1" placeholder="Address1" class="form-control1" type="text" ng-model="user.address1"
								ng-class="{ 'has-error': userForm.name.$touched && userForm.name.$invalid }">
                                <span class="help-block"></span>
								 <p ng-show="form.userForm.address1.$invalid && !form.userForm.address1.$pristine" class="help-block"></p>
                            </div>
                        </div>
						<div class="form-group required">
                            
                            <div class="col-md-12">
                                <input name="address2" id="address2" placeholder="Address2" class="form-control1" type="text" ng-model="user.address2">
                                <span class="help-block"></span>
								 <p ng-show="form.userForm.address2.$invalid && !form.userForm.address2.$pristine" class="help-block"></p>
                            </div>
                        </div>
						<div class="form-group required">
                            
                            <div class="col-md-12">
                                <input name="address3" id="address3" placeholder="Address3" class="form-control1" type="text" ng-model="user.address3">
                                <span class="help-block"></span>
								 <p ng-show="form.userForm.address3.$invalid && !form.userForm.address3.$pristine" class="help-block"></p>
                            </div>
                        </div>
						<div class="form-group required">
                           
                            <div class="col-md-12">
                                <input name="pin_id" id="pin_id" placeholder="Enter a pin code" class="form-control1" type="text" ng-model="user.pin_id">
                                <span class="help-block"></span>
							 <p ng-show="form.userForm.pin_id.$invalid && !form.userForm.pin_id.$pristine" class="help-block"></p>	
                            </div>
                        </div>
                        <div class="form-group required">
                          
                            <div class="col-md-12">
                                <input name="contact_email" id="contact_email" placeholder="Enter Email Id" class="form-control1" type="text" ng-model="user.contact_email">
                                <span class="help-block"></span>
								 <p ng-show="form.userForm.contact_email.$invalid && !form.userForm.contact_email.$pristine" class="help-block"></p>
                            </div>
                        </div>
						<div class="form-group required">
                          
                            <div class="col-md-12">
                                <input name="password" id="password" placeholder="Enter Password" class="form-control1" type="password" ng-model="user.password">
                                <span class="help-block"></span>
								 <p ng-show="form.userForm.password.$invalid && !form.userForm.password.$pristine" class="help-block"></p>
                            </div>
                        </div>
						<div class="form-group required">
                          
                            <div class="col-md-12">
                                <input name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password" class="form-control1" type="password" ng-model="user.confirm_password">
                                <span class="help-block"></span>
								 <p ng-show="form.userForm.confirm_password.$invalid && !form.userForm.confirm_password.$pristine" class="help-block"></p>
                            </div>
                        </div>
						<div class="form-group required">
                           
                            <div class="col-md-12">
                                <input name="personal_email" id="personal_email" placeholder="Alternate Email Id" class="form-control1" type="text" ng-model="user.personal_email">
                                <span class="help-block"></span>
								 <p ng-show="form.userForm.personal_email.$invalid && !form.userForm.personal_email.$pristine" class="help-block"></p>
                            </div>
                        </div>
                      
                        <div class="form-group required">
                           
                            <div class="col-md-12">
                                <input name="contact_no1" id="contact_no1" placeholder="Contact Number" class="form-control1" type="text" ng-model="user.contact_no1">
                                <span class="help-block"></span>
								 <p ng-show="form.userForm.contact_no1.$invalid && !form.userForm.contact_no1.$pristine" class="help-block"></p>
                            </div>
                        </div>
						
						<div class="form-group">
						<div class="col-sm-6">
                         <button type="submit" id="btnSaveP" class="btn btn-producer"><i class="fa fa-pencil-square-o "></i>Submit</button>
						 </div>
						 <div class="col-sm-6">
                         <button type="button" class="btn btn-producer"><i class="fa fa-search" aria-hidden="true"></i>Cancel</button>
						 </div>
						</div>
                    </div>
                </form>
			    </div>
		    </div>	   
		</div>
</div>


     <script src="assets/jquery/jquery-2.1.4.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	 <script src="assets/js/bootstrapValidator.min.js"></script>
    <script src="assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/bootbox.min.js"></script>
	<script src="assets/js/custome.js"></script>
	
</body>
</html>