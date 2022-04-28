$('document').ready(function(){
	setInterval(function(){
		var update = 'update';
		$.post('updnotits.php',{update:update},function (data){
			$('#countnotits').text(data);
		});
	},500); 
});

 