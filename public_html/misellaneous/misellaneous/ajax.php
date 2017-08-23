<!DOCTYPE html>
<html>
<head>
	<script src="jquery-3.2.1.min.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('#btn').click(function(event){
				$('#division').load('ajax.html')
			});
			// body...
		});
	</script>
</head>
<body>
<div id="division">This is practise</div>
<input type="button" id="btn" value="submit" />

</body>
</html>