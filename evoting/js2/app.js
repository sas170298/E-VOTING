$(document).ready(function(){
		$.ajax(
		{
			url:"http://localhost/evoting/data.php",
			method:"GET",
			success:function(data){
				console.log(data);
				var votes=[];
				var name=[];
				for(var i in data){
					name.push("Name: " + data[i].name);
					votes.push(data[i].votes);
				}
				var chartdata={
					labels:name,
					datasets:[
					{
						label: 'name ',
						backgroundColor: 'rgba(200,200,200,0.75)' ,
						borderColor: 'rgba(200,200,200,0.75)',
						hoverBackgroundColor:'rgba(200,200,200,0.75)',
						hoverBorderColor:'rgba(200,200,200,0.75)' ,
						data:votes
					}
					]
				};
				var ctx =$("#myCanvas");
				var barGraph =new Chart(ctx,{
					type: 'bar',
					data: chartdata
				});
			},
			error:function(data){
				console.log(data);
			}
		});
});