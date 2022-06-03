<?php include "header.php";
include "config.php";?>
<a href="emptysession.php">SESSION EMPTY</a>
	<div id="main">
		<div id="products">
			
		    <?php foreach($store as $key => $value){?>
			
				<div id="<?php echo $value['id'];?>" class="product">
				  	<img src="<?php echo $value['img'];?>">
				 	 <h3 class="title"><a href="#">"<?php echo $value['name'];?>"</a></h3>
					<span>Price:"<?php echo $value['price']?>"</span>
					<a id="<?php echo $key;?>" class="add-to-cart" href="#">Add To Cart</a>
			</div>
			<?php }?>

		</div>
	</div>

	<table id="show"><tr><th class="thshow">ID</th><th class="showth">Name</th><th class="showth">Price</th><th class="showth">Quantity</th><th>Action</th></tr></table>

	<?php include "footer.php";?>

	
<script>
	$(document).ready(function(){
		$(".add-to-cart").click(function(){
           // alert($(this).parent().children().eq(2).text());
			//var price =$(this).parent().children().eq(2).text();
			//var id=$(this).closest('div')[0].id;
			var prodindex=$(this)[0].id;
			 
		   // console.log(prodindex);
			$.ajax({
				url:"server.php",
				method:"POST",
				data:{'info':prodindex},
				success:function(result){
			   // console.log(result);
				$("#show").html(result);					
				}
			});
		});

		$(document).on('click','.deleteitem',function(){
			let index_id =$(this).attr('id');
 			$.ajax({
				 url:"server.php",
				 method:"POST",
				 data:{'index':index_id},
				 success:function(res){
					 $("#show").html(res);
				 }
			});
			});		
	});

</script>
</body>
</html>