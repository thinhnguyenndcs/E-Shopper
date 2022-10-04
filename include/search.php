<?php
    
    include_once('../database/connect.php');
    $value=$_POST['search'];
    $list_item=array();
    //$html as response ajax
    $html_show='';
    if (isset($$_POST['search_value'])) {    
        $value=$_POST['search_value'];         
        $query="SELECT * FROM clothes LEFT JOIN categories ON clothes.category = categories.id
                where ";
        $searchValue    = '^.*'.$value.'+.*$';
        $query 	= $query."      
                                title REGEXP '$searchValue' OR
						        sex REGEXP '$searchValue' OR                                
                                clothes.id REGEXP '$searchValue' OR
                                description REGEXP '$searchValue' OR
                                name REGEXP '$searchValue' OR  
                                status REGEXP '$searchValue'                                  
                                ";
        if(is_numeric($value)){
            $query 	= $query."  OR price <= '$searchValue'";
        }
        $result = mysqli_query($con, $query);        
        $rowcount=mysqli_num_rows($result);
        if($rowcount>0){            
            while($row=mysqli_fetch_array($result)){
                $img=$row['img'];
                $title=$row['title'];
                $price=$row['price'];
                $item = array('img'=>$img,'title'=>$title,'price'=>$price);
                array_push($list_item,$item);  
                                             
            }
        }else{
            //show not found
            $html_show = "<p>Not Found</p>";	//	
		    echo $html_show;
        }     
    }
    //what to do with html_show
    



    echo $html_show;
?>