$('document').ready(function(){
	setInterval(function(){
		var update = 'update';
		$.post('notforrep.php',{update:update},function (data){
			$('#countnotforrep').text(data);
		});
	},500);
});

