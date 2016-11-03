<!DOCTYPE html>
<html>

<head>
  <title>Our Company</title>
  
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></scrip>
	<script src="jquery/jquery-2.0.3.min.js"></script>
</head>

<body>

<div class="topicText">
  <table id="tableTopic" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th style="text-align: center;">Topic: <?= $data['topic'][0]->header ?></th>
      </tr>
    </thead>
    <tbody>
		<tr>
			<td style="text-align: center;">
				<b>text:</b> <?= $data['topic'][0]->content ?>
			</td>
		</tr>
		<tr>
			<td style="text-align: center;">
				<b>comments</b>
			</td>
		</tr>
	   <?php foreach ($data['comments'] as $row){ ?>
			<tr>
				<td style="text-align: center;">
					<?= $row->content ?>
				</td>
			</tr>
	   <?php }?>
    </tbody>
  </table>
</div>

</body>
</html>