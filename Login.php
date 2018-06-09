<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-messages.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <script src="angular-dragdrop.min.js"></script>
</head>
<style type="text/css">
	#editmessage{
		display: none;
}
.option{
	display: flex;
	flex-direction: row;
}
.option div{
	background-color:#37C563; 
	padding: 5px;
}
.option div h1{
	font-weight: bolder;
	color: white;
	font-family: Ubuntu;
}
.option div:hover{
	cursor: pointer;
}
.list {
	width: 100%;
}
.inlist{
	margin-top: 2px;
	display: flex;
	flex-direction: row;
	border: 2px solid black;
}
.inlist:hover{
	cursor: pointer;
}
.inlist div{
	width: 50%;
	padding: 5px;
}
.active{
	background-color: red;
}
</style>
<body>
	<div ng-app="myapp" ng-controller="myctrl">
<div>
	<form name="myform" novalidate>

		<label>Username</label>
        <br>
		<input type="text" name="user" ng-model="user" maxlength="10" minlength="5" required>
		<br>
		<div ng-messages="myform.user.$error" ng-if="myform.user.$invalid && !myform.user.$pristine">
				
				<div class="error" ng-messages-include="messages.html"></div>
     
        </div>
		
		<label>Password</label>
		<br>
		<input id="pass" type="password" name="pass" ng-model="pass" required>
		<br>
		<div ng-messages="myform.pass.$error" ng-if="myform.pass.$invalid && !myform.pass.$pristine">
		
				<p ng-message="required">Password is required</p>
		
		</div>
		
		<input type="checkbox" onclick="password()"> Show password
		<br>
		<input type="submit" ng-click="submitquery()" ng-disabled="myform.$invalid">
	
		
	</form>

</div>
<div >
	
	<input id="editmessage" type="text" name="text" ng-model="message" ng-blur="hide()">
	
	<p onclick="editme()">Hello {{message}}</p>

</div>
<div>
	<div class="option">
		<div ng-click="dmsg1()" id="home">
			<h1>HOME</h1>
		</div>
		<div ng-click="dmsg2()" id="about">
			<h1>ABOUT</h1>
		</div>
		<div ng-click="dmsg3()" id="more">
			<h1>MORE</h1>
		</div>
	</div>
	<div class="display">
		<span ng-bind-template="{{displaymsg}}"></span>
	</div>
</div>
<div>
	<div class="list">
		<div class="inlist" id="hpa" ng-click="hpa()">
			<div>
				<h1>Hotstar Premium Account</h1>
			</div>
			<div>
				<h1>$100/year</h1>
			</div>
		</div>
		<div class="inlist" id="npa" ng-click="npa()">
			<div>
				<h1>Netflix Premium Account</h1>
			</div>
			<div>
				<h1>$1000/year</h1>
			</div>
		</div>
		<div class="inlist" id="apa" ng-click="apa()">
			<div>
				<h1>Amazon Prime Account</h1>
			</div>
			<div>
				<h1>$200/year</h1>
			</div>
		</div>
		<div class="inlist" id="jtv" ng-click="jtv()">
			<div>
				<h1>Jio TV</h1>
			</div>
			<div>
				<h1>$10/year</h1>
			</div>
		</div>
		<hr>
		<div class="inlist">
			<div>
				<h1>Total</h1>
			</div>
			<div>
				<h1>${{totalamount}}</h1>
			</div>
		</div>
	</div>
</div>
<div ng-init="placesVisited = ['Delhi','Mumbai','Banglore','Indore','Bhopal']">
	<input type="text" ng-model="curPlace" name="search">
	<ul>  
            <li ng-repeat="place in placesVisited | filter:curPlace">  
                <a ng-href="https://www.google.co.in/webhp?q={{place}}">{{place}} </a>  
            </li>  
        </ul>  
</div>
<div>
	<form id="labnol" method="get" action="https://www.google.com/search">
  <div class="speech">
    <input type="text" name="q" id="transcript" placeholder="Speak" />
    <img onclick="startDictation()" src="//i.imgur.com/cHidSVu.gif" />
  </div>
</form>
<div class="speech">
    <input type="text" name="q" id="transcript" placeholder="Speak" ng-model="searchString" />
    <i class="fa fa-microphone" onclick="startDictation()"></i>
  </div>
<div>
	<script src="https://use.fontawesome.com/6df7273418.js"></script>
</div>
</div>
<script type="text/javascript">
	function editme(){
			document.getElementById('editmessage').style.display="block";
	}

	function password(){
		var x=document.getElementById('pass');
		
		if (x.type =="password") {
           x.type="text";
		}
		else{
			x.type="password";
		}
	}
	var firstapp= angular.module("myapp",['ngMessages']);
	firstapp.controller("myctrl",function($scope){

		$scope.message = "Edit Me";
		$scope.displaymsg = " ";
        $scope.dmsg1 = function(){
        	$scope.displaymsg="You selected Home.";
        	document.getElementById('home').classList.add("active");
        }
         $scope.dmsg2 = function(){
        	$scope.displaymsg="You selected About.";

        }
         $scope.dmsg3 = function(){
        	$scope.displaymsg="You selected More.";
     
        }
        $scope.hide = function (){
        	document.getElementById('editmessage').style.display = 'none';
        }
        $scope.submitquery=function (){
        	return alert("You are successfully logged in!");
        }
        $scope.totalamount = 0;
        $scope.count1=0;
        $scope.hpa =function(){
        	$scope.count1++;
        	if($scope.count1 == 1)
        		{        	document.getElementById('hpa').classList.add('active');	
        	$scope.totalamount +=100 ;
        }
        else{
        	$scope.count1=0;
        	document.getElementById('hpa').classList.remove('active');
        	$scope.totalamount -=100;
        }


}
 $scope.count2=0;
        $scope.npa =function(){
        	$scope.count2++;
        	if($scope.count2 == 1)
        		{        	document.getElementById('npa').classList.add('active');	
        	$scope.totalamount +=1000 ;
        }
        else{
        	$scope.count2=0;
        	document.getElementById('npa').classList.remove('active');
        	$scope.totalamount -=1000;
        }


}
 $scope.count3=0;
        $scope.apa =function(){
        	$scope.count3++;
        	if($scope.count3 == 1)
        		{        	document.getElementById('apa').classList.add('active');	
        	$scope.totalamount +=200 ;
        }
        else{
        	$scope.count3=0;
        	document.getElementById('apa').classList.remove('active');
        	$scope.totalamount -=200;
        }


}
 $scope.count4=0;
        $scope.jtv =function(){
        	$scope.count4++;
        	if($scope.count4 == 1)
        		{        	document.getElementById('jtv').classList.add('active');	
        	$scope.totalamount +=10 ;
        }
        else{
        	$scope.count4=0;
        	document.getElementById('jtv').classList.remove('active');
        	$scope.totalamount -=10;
        }


}
	})
</script>
</body>
</html>