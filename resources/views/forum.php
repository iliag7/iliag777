<!--suppress ALL -->
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>cogignator forum</title>
	<script src="angular/angular.js"></script>
	<script src="angular/angular-route.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></scrip>
	<script src="jquery/jquery-2.0.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body ng-app="myApp" >

<div class="row"  ng-controller="topicListCtr">
	<div class="col-xs-12 col-md-12">
		<h2>Forum</h2>
		<div  class="row">
		    <div  class="col-xs-12 col-sm-12 col-md-12">
				<ul class="list-group">
					<?php foreach ($topic as $row){ ?>
						<li class="list-group-item" ng-click='disableClick(<?=  $row->id ?>)'>
							<a id="hrefText<?= $row->id ?>" href="topic/<?= $row->id ?>"><?=  $row->header ?></a>
						</li>
					<?php }?>
				</ul>
			</div>
		</div>
		<div  class="row" style="margin-left: 1%;">		    
			<button id="addTopic" type="button" class="btn btn-success col-xs-12 col-sm-2 col-md-2" data-toggle="modal" data-target="#addModal">Add Topic</button>
			<button id="removeTopic" type="button" class="btn btn-success col-xs-12  col-sm-2 col-md-2" data-toggle="modal" data-target="#removeModal" ng-disabled="isDisabled"  >Remove Topic</button>
			<button id="editTopic" type="button" class="btn btn-success col-xs-12 col-sm-2 col-md-2" data-toggle="modal" data-target="#editModal" ng-disabled="isDisabled" >Edit Topic</button>			
		</div>
	</div>
</div>

<div id="addModal" class="modal fade" role="dialog" ng-controller="myCtrAdd">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Topic</h4>
      </div>
      <div class="modal-body">
		<form role="form">
			<div class="form-group">
				<label for="header">Header</label>
				<input type="text" class="form-control" id="header" placeholder="Enter header">
			</div>
			<div class="form-group">
				<label for="topic">Topic</label>
				<input type="text" class="form-control" id="topic" placeholder="Enter text">
			</div>
			<div class="form-group">
				<button  id="addTopics" type="submit" class="btn btn-success" ng-click='addTopic()'>Add</button>
			</div>
		</form>		       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="removeModal" class="modal fade" role="dialog" ng-controller="myCtrRemove">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Topic</h4>
      </div>
      <div class="modal-body">
		<p>Are you sure you want to delete this topic?</p>     
      </div>
      <div class="modal-footer">
		<button class="btn btn-primary" ng-click='removeTopic()'>Yas</button>
		<button type="button" class="btn" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<div id="editModal" class="modal fade" role="dialog" ng-controller="myCtrEdit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Topic</h4>
      </div>
      <div class="modal-body">
		<form role="form">
			<div class="form-group">
				<label for="header">Header</label>
				<input type="text" class="form-control" id="edit_header" ng-model="val">
			</div>
			<!--<div class="form-group">
				<label for="topic">Topic</label>
				<input type="text" class="form-control" id="topic">
			</div>-->
			<div class="form-group">
				<button  id="addTopics" type="submit" class="btn btn-success" ng-click='editTopic()'>Edit</button>
			</div>
		</form>		       
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="clockImg">
   <div id="clockArrow">
   </div>
</div>
<script src="js/index.js"></script>
</body>
</html>