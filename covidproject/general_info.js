$( document ).ready(function() {
    
	$.ajax({
                url:'number_of_cases.php',

                type:'post',
                
                success:function(response){
                   

                    $("#div1").html(response);
				   

                }
            });
			
			
	$.ajax({
                url:'number_of_checkins.php',

                type:'post',
                
                success:function(response){
                   

                    $("#div2").html(response);
				   

                }
            });		
			
		$.ajax({
                url:'checkins_energa.php',

                type:'post',
                
                success:function(response){
                   

                    $("#div3").html(response);
				   

                }
            });


        $.ajax({
                url:'types_total.php',

                type:'post',
                
                success:function(response){
                   

                    $("#div4").html(response);
				   

                }
            });
			
		$.ajax({
                url:'types_total_covid.php',

                type:'post',
                
                success:function(response){
                   

                    $("#div5").html(response);
				   

                }
            });	

});
