

 $('#search').keypress(function(event) {
    if (event.keyCode == 13) {
        var search_value= document.getElementById("search").value;
        $.ajax({
            url: 'include/search.php',
            type: 'POST',
            data: {
                search_value: search_value            
            },
            success: function(response){         //response=$html_show   		       
                $('#search-result').html(response);	 //gan html show vao ele co id search result  
        }
        }); 
    }
});
        

    
