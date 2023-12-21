
 <!DOCTYPE html>
<html>
<head>
	<title>Certificate</title>
</head>
<style type="text/css">
	@page{margin:0;}
@php
$backgroundImg =storage_path('app/background/nn.jpg');
@endphp
	@page first{
		background-image: url('{{ $backgroundImg }}');
       	background-repeat:no-repeat;
       	margin-top:0px;
       	margin-bottom:0px;
       	background-image-resize: 6;
   	} 
div.first{
	page:first;
} 

</style>
<body>
	
	<div class="first">  
		<div style="padding-top:380px;font-size: 30px;color:#f4971d; text-align: center;"><b>{{@$UserDetail[0]->name}}</b></div> 
	</div>
	
	
</body>
</html>