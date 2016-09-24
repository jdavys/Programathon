
<!DOCTYPE html>
<html lang="en">
  <head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="description" content="">
    <meta name="author" content="">   
    <title></title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script src="https://www.gstatic.com/charts/loader.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
  </head>
  <body>

  <div id="fb-root"></div>

	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.7";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
 </script>


  <div class="jumbotron"></div>
     <div class="container-fluid">
      <div class="row">
        <div class="col-md-push-4 col-xs-6 col-md-3" >
            <form>              
              <div class="form-group">
                <label for="nombreComercial">Nombre Comercial:</label>
                <input type="text" class="form-control" id="nombreComercial">
              </div>              
              <div class="form-group">
                <label for="nombreUsuario">Nombre de usuario</label>
                <input type="text" class="form-control" id="nombreUsuario">
              </div>
              <div class="form-group">
                <div class="dropdown">
				  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">País
				  <span class="caret"></span></button>
				  <ul class="dropdown-menu">
				    <li><a href="#">Costa Rica</a></li>
				    <li><a href="#">---</a></li>
				    <li><a href="#">---</a></li>
				  </ul>
				</div>
              </div>
              <div class="form-group">
                <label for="nombreUsuario">Contraseña</label>
                <input type="password" class="form-control" id="contraseña">
              </div>
              <div class="row">
              	<div class="col-xs-6 col-sm-6 col-md-3">
              		<button type="submit" class="btn btn-primary">Aceptar</button>	
              	</div>
              	<div class="col-xs-6 col-sm-6 col-md-3">
              		<button type="submit" class="btn btn-primary">Cancelar</button>	
              	</div>
              </div>              
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-12">
	                 <div class="form-group">
		               <a class="brand" href="">Olvidé la Contraseña</a> 
	                 </div>
	                 <div class="form-group">
		                 <a class="brand" href="">Registrarse</a> 
	                 </div>
                 </div>
               </div>
			 <div class="form-group">               	
               <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div>
             </div>  
            </form> 
        </div>
      </div>
     </div>      

    <script type="text/javascript">
        $( function() {
          $( "#datetimepicker1").datepicker();
          $( "#datetimepicker2").datepicker();
        });
    </script>


    	<script>
	  
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '1779020625716778',
	      xfbml      : true,
	      version    : 'v2.7'
	    });

	    FB.getLoginStatus(function(response){
	    	if(response.status==='connected'){
	    		document.getElementById('status').innerHTML="we are connected";
	    	} else if (response.status==='not_authorized'){
	    		document.getElementById('status').innerHTML="we are not logged in";
	    	}else{
	    		document.getElementById('status').innerHTML="we are not logged in facebook";
	    	}
	    });

	  }; 

	  
	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
		   
	   
	   function login(){
	    	FB.login(function(response){
	    		if(response.status==='connected'){
	    		document.getElementById('status').innerHTML="we are connected";
	    	} else if (response.status==='not_authorized'){
	    		document.getElementById('status').innerHTML="we are not logged in";
	    	}else{
	    		document.getElementById('status').innerHTML="we are not logged in facebook";
	    	}
	    	});
	    }

	    function getInfo(){
	    	FB.api('/me',
	    		   'GET',
	    		    {fields:'first_name, last_name,name,id'},
	    		    function(response){
	    		    	document.getElementById('status').innerHTML = response.id;	
	    		    });
	    	}

	</script>


  </body>
</html>
