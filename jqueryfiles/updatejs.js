$('document').ready(function(){
	setInterval(function(){
		var update = 'update';
		$.post('updatenot.php',{update:update},function (data){
			$('#countnot').html(data);
		});
	},6000);
});

