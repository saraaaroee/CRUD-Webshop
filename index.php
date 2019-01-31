<?php
  session_start();

  $sShowProfile = "";
  $sShowLogin = "show";
  if (isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] = true )
  {
    // show the welcome page
    //echo "YES SIR";
    //echo $_SESSION['sUserRole'];
    $sShowLogin = "";
   $sShowProfile  = "show";
  }
  else
  {
    // show the login page
    //echo "NO WAY!";
    $sShowProfile  = "";
    $sShowLogin = "show";
    //$sLoggedInUser = $_SESSION['sUserName'];
  }
?>


<!DOCTYPE html>
<html>
<head>
<title>Assignment One</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

	<!-- NAVIGATION BAR -->
  <?php if($sShowLogin == "show"): ?>
  <nav id="nav" class="show">
    <?php require_once("nav.php");?>
  </nav>
  <?php endif; ?>

  <?php if($_SESSION['sUserRole']== 'admin'): ?>
  <!-- NAVIGATION BAR -->
	<nav id="navadmin" class="show">
    <?php require_once("navadmin.php");?>
	</nav>
<?php endif; ?>

<?php if( $_SESSION['sUserRole']== 'user'): ?>
  <nav id="navuser" class="show">
    <?php require_once("navuser.php");?>
  </nav>
<?php endif; ?> 


	<!-- WELCOME PAGE -->
	<div id="pageWelcome" class="page">
	<h1>Welcome</h1>
	</div>



	<!-- SIGN UP PAGE -->
	<div id="pageSignUp" class="page">
		<!-- <h1>SIGN UP</h1> -->
		<div id=boxSignUpForm>
			<h2>Sign Up</h2>
	      	<form id="frmUser">
		        <p>Name</p>
		        <input type="text" name="txtName">
		        <p>Lastame</p>
		        <input type="text" name="txtLastName">
		        <p>Email</p>
		        <input type="email" name="txtEmail">
		        <p>Phone Number</p>
		        <input type="number" name="txtPhoneNumber">
		        <p>Password</p>
		        <input type="password" name="txtPassword">
            <p>Nickname</p>
            <input type="text" name="txtNickName">
		        <p>choose profile image</p>
		        <input type="file" name="fileUserImage">
		        <button id="btnSaveUser" type="button">Save user</button>
		        <div id="boxSignUpMessage"></div>
	      	</form>
	    </div>
	</div>




	<!-- LOGIN PAGE -->
	<div id="pageLogIn" class="page  <?php echo $sShowLogin; ?> ">
		<div id=boxLogInForm>
			<h2>Log In</h2>
	      	<form id="frmLogIn">
		        <p>Name</p>
		        <input type="text" name="txtUserName">
		        <p>Password</p>
		        <input type="number" name="txtUserPassword">
		        <button id="btnUserLogIn" type="button">LOG In</button>
	      	</form>
          <div id="boxLogInMessage"></div>
	    </div>
	</div>




	<!-- PROFILE PAGE -->
	<div id="pageUserProfile" class="page <?php echo $sShowProfile; ?>">
  <div id=boxUserProfile>
  	<h2>THIS IS YOUR PROFILE</h2>
  	<div id="boxUserProfileHere"></div>
    <div id="boxEditProfile">
    <form id="frmNewUserInfo">
        <h3>Edit profile</h3>
        <p>New name</p>
        <input class="edit" type="text" name="txtMyNewName">
        <p>New email</p>
        <input class="edit" type="text" name="txtMyNewMail">
        <p>New phonenumber</p>
        <input class="edit" type="number" name="txtMyNewNumber"><br>
        <button class="smallbutton" id="btnSaveNewUserInfo" type="button">Update</button>
        <button class="smallbutton" id="btnDeleteMe" type="button">Delete me</button>
    </form>
    </div>
  </div>
	</div>




  <!-- USERS PAGE -->
  <div id="pageUsers" class="page">
    <div id="boxUserList">
      <div id="boxUsers">
      <h2>Users list</h2>
        <!-- <button id="btnShowAllUsers">SHOW USERS</button> -->
        <div id="boxUserContainer">
        </div>
      </div>
      <div id="boxEditUser">
      </div>
    </div>
  </div>




	<!-- PRODUCTS PAGE -->
	<div id="pageProducts" class="page">
		<div id="boxProducts">
		<h2>Products</h2>
			<div id="boxWebshopContainer">
			</div>
		</div>
	</div>





  <!-- CART PAGE -->
  <div id="pageCart" class="page">
    <div id="boxCart">
    <h2>YOUR ITEMS</h2>
      <!-- <button id="btnShowAllUsers">SHOW USERS</button> -->
      <div id="boxCartContainer">
      </div>
      <div id="boxCartBtns">
      <button id="btnClearCart" type="button">Clear Cart</button>
      <button id="btnBuyCart" type="button">Buy now</button>
    </div>
    </div>
  </div>




	<!-- ADD PRODUCTS PAGE -->
	<div id="pageAddProducts" class="page">
   <div class="left-side">

    <!-- ADD PRODUCT -->
    <div id="boxAddProduct">
      <h2>ADD PRODUCT</h2>
      <form id="frmAddProduct">
        <p>Product</p>
        <input type="text" name="txtProductName">
        <p>Price</p>
        <input type="number" name="txtPrice">
        <p>Product Image</p>
        <input type="file" name="fileProductImage">
        <button id="btnSaveProduct" type="button">Save Product</button>
      </form>
    </div>

  </div>
  <div class="right-side">

    
    <!-- SHOW ALL PRODCUCT -->
    <div class="show-all-products">
      <h2>Product list</h2>
      <!-- <button id="btnShowAllProducts">Load all</button> -->
      <div class="products" id="boxProductsHere"></div>
    </div>
    
    <!-- SHOW DETAILS ABOUT PRODCUTS HERE -->
    <div class="show-single-product">
      <h2 class="space">Product details</h2>    
      <div class="product-details" id="boxProductDetails">
        <!-- Product details -->
      </div>
    </div>
  </div> 
  </div>





  <!-- CONTACT PAGE -->
  <div id="pageContact" class="page">
    <div id="boxContactContent">
    <h2>Find us here</h2>
    <div id="map"></div>
    <form id="frmSubscribe">
        <h4>Subscribe</h4>
        <p>Enter your email address to recieve news and updates</p>
        <input type="text" name="txtSubscribeMail"><br>
        <button class="smallbutton" id="btnSubscribe" type="button">SUBSCRIBE</button>
        <div id="boxSubscribeMessage"></div>
    </form>
    </div>
  </div>



<script>

	//************************************  SHOW PAGES  ********************************************// 

  


    var aBtnShowPages = document.getElementsByClassName("btnShowPage");
    // this is an array
    for(var i = 0; i < aBtnShowPages.length; i++)
    {
        //console.log("x");
        aBtnShowPages[i].addEventListener("click",function(){
            // console.log("y");
            // Hide the pages
            var aPages = document.getElementsByClassName( "page" );
            for(var j = 0; j < aPages.length; j++)
            {
                //console.log("w");
                aPages[j].style.display = "none";
            }
            var sDataAttibute = this.getAttribute("data-showThisPage");
            // console.log(sDataAttibute);
            document.getElementById(sDataAttibute).style.display = "flex";
        });
    };

	//************************************  ADD NEW USER  ********************************************// 



    btnSaveUser.addEventListener("click", function(){

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var sDataFromServer = JSON.parse(this.responseText);
          console.log("Response: ",sDataFromServer);
          // boxSignUpMessage.innerHTML = sDataFromServer.name ", you are signed up!";
        }
      };
      request.open("POST", "api-save-user.php", true);
      var oFrmUser = new FormData(frmUser);
      request.send(oFrmUser);
      boxSignUpForm.innerHTML = '<p class="message">You are added!</p><br>\
                                <p class="subMessage">Log In and get started</p>';
      });
    

    //************************************  LOG IN  ********************************************// 

  

    btnUserLogIn.addEventListener( "click" , function(){
		
		  var ajax = new XMLHttpRequest();
		  ajax.onreadystatechange = function() 
		  {
		    if (this.readyState == 4 && this.status == 200) 
		    {
		    	//console.log(this.responseText);
		     	var jDataFromServer = JSON.parse( this.responseText );
          //console.log(jDataFromServer);
	   			if( jDataFromServer.login == "ok" )		   			
	   			{
            location.reload();
	   			}	
          else if( jDataFromServer.login == "admin" )           
          {
            location.reload();
          } 

					else
					{
					console.log("LOGIN FAIL - TRY AGAIN");	
					pageUserProfile.style.display = "none";
   				pageLogIn.style.display = "flex";	
          boxLogInMessage.innerHTML = "<p class='red'>Login failed - Try again</p>";
					}
	   		}
	    }			
		  ajax.open( "POST", "api-login.php", true );
		  var jFrmLogin = new FormData( frmLogIn );
		  ajax.send( jFrmLogin );		
			
		});

    //************************************  USER PROFILE  ********************************************// 
    
    var btnProfile = document.querySelector('#btnProfile');

    if(btnProfile){

      btnProfile.addEventListener ("click" , function(){
      //console.log("x")
      getUserInfo();
    });

    }

    var aSessionUser; 

    function getUserInfo(){
      console.log("this is your profile");
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          //console.log(this.responseText);
          aSessionUser = JSON.parse(this.responseText);
          showUserProfile();
        }
      }
      request.open("GET", "api-get-userinfo.php", true);
      request.send();
    }

    function showUserProfile() {
      boxUserProfileHere.innerHTML = '<img src="'+aSessionUser.image+'">\
                                      <div id="boxProfileText">\
                                      <h4>Hello</h4><p> '+aSessionUser.name+' '+aSessionUser.lastname+'</p><br>\
                                      <h4>Email: </h4><p>'+aSessionUser.email+'</p><br>\
                                      <h4>Phonenumber: </h4><p>'+aSessionUser.phonenumber+'</p>\
                                      </div>';
    }

    //************************************  UPDATE USER DETAILS  ********************************************// 


    
    btnSaveNewUserInfo.addEventListener("click", updateUserDetails);
    
    function updateUserDetails(e) {
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          //aProducts = JSON.parse(this.responseText);
          //console.log (this.responseText);
          console.log("update pleaseeeeee");
        }
      }
      request.open("POST", "api-update-userinfo.php", true );
      var oFrmNewUserInfo = new FormData(frmNewUserInfo);
      request.send(oFrmNewUserInfo);
    }


    //************************************  DELETE MY USER  ********************************************// 



    btnDeleteMe.addEventListener("click", deleteMe);
    
    function deleteMe(e) {

      console.log("delete me");
     var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        console.log (this.responseText);
        //console.log(aUsers);
        //deleteUser();
        }
      }
    request.open("GET", "api-delete-my-user.php?");
    request.send();
    }



    //************************************ LOG OUT  ********************************************// 


    
  document.addEventListener("click" , function(e){
      //console.log(e.target);
      if (e.target.classList.contains('btnLogOut')) {
        //console.log(e.target);
        var ajax = new XMLHttpRequest();
      ajax.onreadystatechange = function() 
      {
        window.location.reload();
        pageWelcome.style.display = "flex";
        navadmin.style.display = "none";
        navuser.style.display = "none";
        nav.style.display = "flex";

        console.log("Clicked log out");
      }     
      ajax.open( "GET", "api-logout.php" , true );
      ajax.send();  
      }
  });
    


  //************************************    SUBSCRIBE    ********************************************// 





    btnSubscribe.addEventListener("click", function(){
    console.log("subscribe");
    notifyMe(); 
    var oSound = new Audio('sound.mp3'); // function / constructor
    // play the sound
    oSound.play();
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var sDataFromServer = JSON.parse(this.responseText);
          //console.log("Response: ",sDataFromServer);
          // boxSignUpMessage.innerHTML = sDataFromServer.name ", you are signed up!";
        }
      };
      request.open("POST", "api-save-email.php", true);
      var oFrmSubscribe = new FormData(frmSubscribe);
      request.send(oFrmSubscribe);
      boxSubscribeMessage.innerHTML = '<p>Thank you</p>';
    });





    //************************************  SHOW LIST OF USERS  ********************************************// 



    showAllUsers(); 
    //btnShowAllUsers.addEventListener("click", showAllUsers);
    var aUsers = [];
    function showAllUsers() {
      //console.log("users clicked");
      
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          aUsers = JSON.parse(this.responseText);
          showUsers();
        }
      }
      request.open("GET", "api-show-users.php");
      request.send();
    }

    function showUsers() {
      var htmlUsers = "";
      for (var i = 0; i < aUsers.length; i++) {
        var htmlUser = '<div class="boxSingleUser">\
                          <p>'+aUsers[i].name+' '+aUsers[i].lastname+'</p>\
                          <div id="userBtns">\
                          <button class="smallbutton right" id="btnUpdateUserInfo" data-id="'+aUsers[i].id+'">Edit</button>\
                          <button class="btnDeleteUser" id="btnDeleteUser" data-id="'+aUsers[i].id+'">Delete User</button>\
                          </div>\
                          </div>';
        htmlUsers += htmlUser;
        // console.log(aUsers);
      }
      boxUserContainer.innerHTML = htmlUsers;

      updateUserButtons();
      updateUpdateUserButtons();
    }

    function updateUserButtons() {
      btnsDeleteUser = document.querySelectorAll("#btnDeleteUser");
      for (var i = 0; i < btnsDeleteUser.length; i++) {
        btnsDeleteUser[i].addEventListener("click", getUser);
      }
    }



    //************************************  DELETE USER ********************************************// 




    var btnsDeleteUser;
    var aUsers;
    function getUser(e) {
      var userId = e.target.getAttribute('data-id');
      console.log("Delete this user", e.target.getAttribute('data-id'));
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log (this.responseText);
          // location.reload();
        //console.log(aUsers);
        //deleteUser();
        }
      }
    request.open("GET", "api-delete-user.php?id="+userId);
    request.send();
    }
    

    //************************************  ADMIN -- SHOW USER DETAILS  ********************************************// 

    function updateUpdateUserButtons() {
      btnsUpdateUserInfo = document.querySelectorAll("#btnUpdateUserInfo");
      for (var i = 0; i < btnUpdateUserInfo.length; i++) {
        btnUpdateUserInfo[i].addEventListener("click", showEditUser);
      }
    }

    //var btnsGetUsers;
    //var aProducts;
    function showEditUser(e) {
      var userId = e.target.getAttribute('data-id');
      console.log("Show single user", e.target.getAttribute('data-id'));
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          aUsers = JSON.parse(this.responseText);
          console.log(this.responseText);
          showUserDetails();

        }
      }
      request.open("GET", "api-show-user.php?id="+userId);
      request.send();
    }

    function showUserDetails() {
      //console.log("yes");
      var userHtml = '<div id="userInfo">\
                      <h4>'+aUsers.name+' '+aUsers.lastname+'</h4>\
                      <p>'+aUsers.email+'</p>\
                      <p>'+aUsers.phonenumber+'</p><br>\
                      <div id="boxEditUserDetails">\
                      <form id="frmEditUserInfo">\
                                <h3>Edit profile</h3>\
                                <p>New name</p>\
                                <input type="hidden" name="txtUserId" value="'+aUsers.id+'">\
                                <input class="edit" type="text" name="txtNewName">\
                                <p>New email</p>\
                                <input class="edit" type="text" name="txtNewMail">\
                                <p>New phonenumber</p>\
                                <input class="edit" type="number" name="txtNewNumber"><br>\
                                <button class="smallbutton" id="btnSaveNewUserData" data-id="'+aUsers.id+'" type="button">Update</button>\
                      </form>\
                      </div>\
                      </div>'
      boxEditUser.innerHTML = userHtml;
      updateSaveInfoButtons();    
    }


//************************************  ADMIN -- UPDATE USER DETAILS  ********************************************// 


    function updateSaveInfoButtons() {
    btnsSaveNewUserData = document.querySelectorAll("#btnSaveNewUserData");
    for (var i = 0; i < btnsSaveNewUserData.length; i++) {
        btnsSaveNewUserData[i].addEventListener("click", saveNewUserInfo);
      }
    }
    
    
    //var btnsSaveNewUserData;
    function saveNewUserInfo(e) {
      var userId = e.target.getAttribute('data-id');
      console.log("Update user details on", e.target.getAttribute('data-id'));
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          //aProducts = JSON.parse(this.responseText);
          console.log("update please");


        }
      }
      request.open("POST", "api-admin-update-user.php", true );
      var oFrmEditUserInfo = new FormData(frmEditUserInfo);
      request.send(oFrmEditUserInfo);
    }

    //************************************  ADD NEW PRODUCT  ********************************************// 

    

    showAllProducts();

    btnSaveProduct.addEventListener("click", function(){

      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var sDataFromServer = JSON.parse(this.responseText);
          console.log("Response: ",sDataFromServer);
          showAllProducts();
        }
      };
      request.open("POST", "api-save-product.php", true);
      var oFrmProduct = new FormData(frmAddProduct);
      request.send(oFrmProduct);
    });



    //************************************  SHOW LIST OF PRODUCTS  ********************************************//  



    showAllProducts();
    var aProducts = [];
    function showAllProducts() {
      // console.log("clicked");
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          aProducts = JSON.parse(this.responseText);
          showProducts();
        }
      }
      request.open("GET", "api-show-products.php");
      request.send();
    }

    function showProducts() {
      var htmlProducts = "";
      var htmlWebshop = "";
      for (var i = 0; i < aProducts.length; i++) {
        var htmlProduct = '<div class="product">\
                          <p class="name">'+aProducts[i].name+'</p>\
                          <div id="productBtns">\
                          <button class="smallbutton btnDeleteProduct" id="btnDeleteProduct" data-id="'+aProducts[i].id+'">Delete</button>\
                          <button class="smallbutton right" id="btnGetProduct" data-id="'+aProducts[i].id+'">See more</button>\
                          </div>\
                        </div>';
        var htmlSingleProduct = '<div class="boxSingleProduct">\
                          <img src="'+aProducts[i].image+'">\
                          <h4>'+aProducts[i].name+'</h4>\
                          <p>'+aProducts[i].price+' DKK</p>\
                          <button class="smallbutton" id="btnBuyProduct" data-id="'+aProducts[i].id+'">ADD TO CART</button>\
                          </div>';
        htmlProducts += htmlProduct;
        htmlWebshop += htmlSingleProduct;
        // console.log(aProducts);
      }
      boxProductsHere.innerHTML = htmlProducts;
      boxWebshopContainer.innerHTML = htmlWebshop;

      updateButtons();
      updateProductButtons();
      updateBuyButtons();

      
    }




    //************************************  Update buttons  ********************************************// 


    
    function updateButtons() {
      btnsGetProduct = document.querySelectorAll("#btnGetProduct");
      for (var i = 0; i < btnsGetProduct.length; i++) {
        btnsGetProduct[i].addEventListener("click", getProductDetails);
      }
    }



    //************************************  DELETE PRODUCT  ********************************************// 




    function updateProductButtons() {
      btnsDeleteProduct = document.querySelectorAll("#btnDeleteProduct");
      for (var i = 0; i < btnsDeleteProduct.length; i++) {
        btnsDeleteProduct[i].addEventListener("click", getProduct);
      }
    }

    var btnsDeleteProduct;
    var aProducts = [];
    function getProduct(e) {
      var productId = e.target.getAttribute('data-id');
      console.log("Delete this product", e.target.getAttribute('data-id'));
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log (this.responseText);
          //window.location.reload();
          //console.log(aUsers);
        }
      }
    request.open("GET", "api-delete-product.php?id="+productId);
    request.send();
    }
    

    



    //************************************  SHOW PRODUCT DETAILS  ********************************************// 



    var btnsGetProduct;
    //var aProducts;
    function getProductDetails(e) {
      var productId = e.target.getAttribute('data-id');
      console.log("Show single product", e.target.getAttribute('data-id'));
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          aProducts = JSON.parse(this.responseText);
          showProductDetails();

        }
      }
      request.open("GET", "api-show-product.php?id="+productId);
      request.send();
    }

    function showProductDetails() {
      //console.log("yes");
      var productHtml = '<img src="'+aProducts.image+'">\
                      <div id="productInfo">\
                      <h4>'+aProducts.name+'</h4>\
                      <p>'+aProducts.price+' dkk</p>\
                      <div id="boxEditProduct">\
                      <form id="frmNewProductInfo">\
                          <input type="hidden" name="txtProductId" value="'+aProducts.id+'">\
                          <h4>Edit product info</h4>\
                          <p>New name</p>\
                          <input class="edit" type="text" name="txtNewName">\
                          <p>New price</p>\
                          <input class="edit" type="number" name="txtNewPrice"><br>\
                          <button class="btnUpdateInfo smallbutton" id="btnUpdateInfo" type="button" data-id="'+aProducts.id+'">Update</button>\
                      </form>\
                      </div>\
                      </div>'
      boxProductDetails.innerHTML = productHtml;
      updateUpdateButtons();     
    }


//************************************  UPDATE PRODUCT DETAILS  ********************************************// 


    function updateUpdateButtons() {
      btnsUpdateInfo = document.querySelectorAll("#btnUpdateInfo");
      for (var i = 0; i < btnsUpdateInfo.length; i++) {
        btnsUpdateInfo[i].addEventListener("click", updateProductDetails);
      }
    }
    
    
    var btnsUpdateInfo;

    function updateProductDetails(e) {
      var productId = e.target.getAttribute('data-id');
      console.log("Update product details on", e.target.getAttribute('data-id'));
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log("update please");


        }
      }
      request.open("POST", "api-update-productinfo.php", true );
      var oFrmNewInfo = new FormData(frmNewProductInfo);
      request.send(oFrmNewInfo);
    }

    //************************************  ADD TO CART  ********************************************// 


    function updateBuyButtons() {
      btnsBuyProduct = document.querySelectorAll("#btnBuyProduct");
      for (var i = 0; i < btnsBuyProduct.length; i++) {
        btnsBuyProduct[i].addEventListener("click", addProductToCart);
      }
    }
    

    var btnsBuyProduct;
    //var aProducts;
    function addProductToCart(e) {
      var productId = e.target.getAttribute('data-id');
      console.log("Add this product", e.target.getAttribute('data-id'));
      //localStorage.sCart = productId; 
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          //aProducts = JSON.parse(this.responseText);
          addToCart();
          console.log(this.responseText);
        }
      
      }
      request.open("GET", "api-add-to-cart.php?id="+productId);
      request.send();
    }

    aProducts = [];
    function addToCart(){
      console.log("products are added");
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          aProducts = JSON.parse(this.responseText);
          showInCart();
        }
      }
      request.open("GET", "api-show-cart.php");
      request.send();
    }

    function showInCart() {
      var htmlCart = "";
      for (var i = 0; i < aProducts.length; i++) {
        var htmlAddedProduct = '<div class="boxAddedProduct">\
                          <p>'+aProducts[i].name+'\
                           '+aProducts[i].price+'</p>\
                           <button class="smallbutton">Delete</button>\
                           </div>';
                    htmlCart += htmlAddedProduct;
        // console.log(aUsers);
      }
      boxCartContainer.innerHTML = htmlCart;

      //updateUserButtons();
    }
      

    /* CLEAR CART */

    btnClearCart.addEventListener("click" , function(){
      boxCartContainer.innerHTML = "";
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log("clear");
        }
      }
      request.open("GET", "api-clear-cart.php");
      request.send();
    });


    /* BUY CART */

    btnBuyCart.addEventListener("click" , function(){
      window.alert("You just bought some My Little Ponys");
    });

    //************************************  NOTIFICATION ********************************************// 

    function notifyMe() {

      // Let's check whether notification permissions have already been granted
        if (Notification.permission === "granted") {
        // If it's okay let's create a notification
        displayNotification();
      }

      // Otherwise, we need to ask the user for permission
      else if (Notification.permission !== 'denied') {
        Notification.requestPermission(function (permission) {
          // If the user accepts, let's create a notification
          if (permission === "granted") {
            displayNotification();
          }
        });
      }
    }

    
    function displayNotification(){ 
      var notification = new Notification("THANK YOU", {"icon":"welcome.jpg", "body":"You will recieve your newsletter soon!"});
    };


    // MAP 
    // JSONP // 
    function initMap() {

        var jLygten = {
        lat: 55.703935,
        lng: 12.537669
     };

     // on click, use this variable to set the lat lng
     var jMarkerPos = {};

     var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: jLygten
     });

     var marker = new google.maps.Marker({
        position: jLygten,
        map: map
     });
     
     map.addListener('click', function (e) {
        jMarkerPos.lng = e.latLng.lng();
        jMarkerPos.lat = e.latLng.lat();
        console.log(jMarkerPos); // INCREDIBLE
        marker.setPosition(jMarkerPos);
     });
  }

    
    
</script> 

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9lfP923a-nYJuce4JbZ6ti8FqrCTt9Is&callback=initMap">
</script>

</body>
</html>