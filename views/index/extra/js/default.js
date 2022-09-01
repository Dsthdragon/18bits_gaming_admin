$(document).ready(function(){
    $('#send').click(function(){

    	var data = {send: $('#desc').val(), age: $('#age').val()};
		
		var link = 'http://localhost/template/index/send/';
		
		$.post(link,data, function(o){
			$('#desc').val("");
			$('#correct').html("Data Sent");
			$('.blah').html(o);
		})
    })
 });
