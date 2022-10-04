

$(document).ready(function () {
    // showDataGioHang();

    function showDataGioHang() {
        // $.ajax({
        //     url:'./giohang_show.php',
        //     type:'POST',
        //     data:{
        //         test1:1
        //     },
        //     success:function(res){

        //         $('#cart_id').html(res);



        //     }
        // })
    }
    // function showTotal(){
    //     $.ajax({
    //         url:'./giohang_total.php',
    //         type:'POST',
    //         data:{
    //             test2:1
    //         },
    //         success:function(res){

    //             $('#total_cart').html(res);



    //         }
    //     })
    // }
    // $(document).on('input','#soluong_item_giohang',function(){
    // 	var id_giohang=$(this).attr('id_slgh');
    // 	var sl_gh=$(this).val();
    // 	$.ajax({
    // 			url:'./giohang_sl.php',
    // 			type:'POST',
    // 			data:{

    // 				id_giohang:id_giohang,
    // 				sl_gh:sl_gh
    // 			},
    // 			success:function(res){

    // 				showDataGioHang();
    // 				showTotal()
    // 			}
    // 		})
    // })

    // $(document).on('click','.update',function(){
    // 	var code_amount=document.getElementById("code_amount").value;
    //     var code_gift=document.getElementById("code_gift").value;
    // 	$.ajax({
    // 			url:'./giohang_total.php',
    // 			type:'POST',
    // 			data:{
    //                 test2:1,
    //                 code_amount:code_amount,
    // 				code_gift:code_gift
    // 			},
    // 			success:function(res){

    // 				showDataGioHang();
    //                 // $('#total_cart').html(res);

    // 			}
    // 		})
    // })
    $(document).on('click', '#add-to-cart', function () {
        var user_id = Number($('#session-value').val());
        var id = $(this).attr('product-id');
        var input_quantity = $('#input-quantity').val();
        var remain_quantity = Number($(this).attr('remain-quantity'));
        var num_item_on_cart = Number($(this).attr('num-item-on-cart'));
        if (user_id == '') { alert('Please Sign In First!\n If You Do Not Have Account, Please Sign Up!'); }
        else if ((input_quantity != undefined) && (Number(input_quantity) > remain_quantity)) {
            alert("You choose too must item ");
        }
        else if ((input_quantity != undefined) && (input_quantity == '' || input_quantity <= 0 )) {
            alert('Please choose at least one item to add to your cart!');
        }
        else {
            var quantity = 1;
            if (input_quantity == undefined) { quantity = 1; }
            else { quantity = Number(input_quantity); }
            if (num_item_on_cart != 0 && ((num_item_on_cart + quantity) > remain_quantity)) { alert('There is ' + num_item_on_cart + ' item on your cart\n' + 'There is ' + remain_quantity + ' item  on stock.\nYou choose to must item') }
            else {
                var new_quantity = quantity + num_item_on_cart;
                // new , set all button have same attr
                $("button").each(function(){
                    if  ($(this).attr('product-id') == id){
                            $(this).attr('num-item-on-cart',new_quantity);
                    }

                })
                //

                //$(this).attr('num-item-on-cart', new_quantity); 
                $.ajax({
                    url: 'include/add-to-cart.php',
                    method: 'POST',
                    data: { id: id, quantity: quantity, user_id: user_id, remain_quantity: remain_quantity },

                    success: function (data) {
                        // alert(data);
                        // alert('Insert đã thành công ' + id + " quantity is " + quantity + ' remain ' + remain_quantity + ' item ' + new_quantity);
                       alert('This item has been added to your cart\n' + new_quantity + ' of this is on your cart now!');
                    }
                })
            }
        }


    })

    $(document).on('click','#submit-review',function(){
        var user_id = Number($('#session-value').val());
        var id=$(this).attr('product-id');
        var review= $('#review').val();
        var d = new Date();  
        var date = d.getFullYear() +'/'+(d.getMonth() +1) + '/'+ d.getDate();
        var time = d.getHours() + ':' + d.getMinutes() ;
        if (user_id=='')
        {
            alert('You must login to send your review!');
        }
       // else if (name == ''){
           // alert('Please enter your name to send review');
        //}
        else if( review == '')
        {
            alert("Please enter your review. It's empty. ");
        }
        else {
           
            $.ajax({
                url: 'include/send-review.php',
                method: 'POST',
                data: {id:id, review:review, date:date, time:time},
                success: function(data) {
                    alert('Cảm ơn quý khách đã nhận xét.');
                    //alert('date '+ date + ' time' + time + ' ' + name +' với id' + id);
                    $('#form-review')[0].reset();
                }


            })
        }

    })

})