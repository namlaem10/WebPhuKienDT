<style>
.clear{
	clear:both;
}
.content{
	width:100%;
	height:auto;
	margin-top:2px;
}
.content a{
	text-decoration:none;
	font-size:18px;
	font-weight:700;
	color:#000;
}
.content a .list{
	line-height:50px;
	height:50px;
	width:299px;
	padding-left:10px;
	border-top:1px solid #CCC;
}
.content a .list:hover{
	background:#54BF83;
	color:#FFF;
}
.contentleft{
	height:auto;
	float:left;	
	margin-top:2px;
	margin-left:2px;
	border:solid 1px #CCC; 
	width:28%; 
	background-color:#FFF;
}
.contentright{
	min-height:960px;
	float:right;
	margin-top:2px;
	margin-right:2px;
	width:71%;
	border:solid 1px #CCC;
	background-color:#FFF;
}
</style>
<div class="content">
	<div class="contentleft">
    	<?php include('content/contentleft.php'); ?>
    </div>
    <div class="contentright" id="contentright">
    	<?php include('content/contentright.php'); ?>
    </div>
    <div class="clear"></div>
</div>
