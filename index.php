<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
<style>
/*********************************************
    			Call Bootstrap
*********************************************/
@import url("bootstrap/bootstrap.min.css");
@import url("bootstrap-override.css");
@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
/*********************************************
        		Theme Elements
*********************************************/
.gold{
	color: #FFBF00;
}
/*********************************************
					PRODUCTS
*********************************************/
.product{
	border: 1px solid #dddddd;
	height: 321px;
}
.product>img{
	max-width: 230px;
}
.product-rating{
	font-size: 20px;
	margin-bottom: 25px;
}
.product-title{
	font-size: 20px;
}
.product-desc{
	font-size: 14px;
}
.product-price{
	font-size: 22px;
}
.product-stock{
	color: #74DF00;
	font-size: 20px;
	margin-top: 10px;
}
.product-info{
		margin-top: 50px;
}
/*********************************************
					VIEW
*********************************************/
.content-wrapper {
	max-width: 1140px;
	background: #fff;
	margin: 0 auto;
	margin-top: 25px;
	margin-bottom: 10px;
	border: 0px;
	border-radius: 0px;
}
.container-fluid{
	max-width: 1140px;
	margin: 0 auto;
}
.view-wrapper {
	float: right;
	max-width: 70%;
	margin-top: 25px;
}
.container {
	padding-left: 0px;
	padding-right: 0px;
	max-width: 100%;
}
/*********************************************
				ITEM 
*********************************************/
.service1-items {
	padding: 0px 0 0px 0;
	float: left;
	position: relative;
	overflow: hidden;
	max-width: 100%;
	height: 321px;
	width: 130px;
}
.service1-item {
	height: 107px;
	width: 120px;
	display: block;
	float: left;
	position: relative;
	padding-right: 20px;
	border-right: 1px solid #DDD;
	border-top: 1px solid #DDD;
	border-bottom: 1px solid #DDD;
}
.service1-item > img {
	max-height: 110px;
	max-width: 110px;
	opacity: 0.6;
	transition: all .2s ease-in;
	-o-transition: all .2s ease-in;
	-moz-transition: all .2s ease-in;
	-webkit-transition: all .2s ease-in;
}
.service1-item > img:hover {
	cursor: pointer;
	opacity: 1;
}
.service-image-left {
	padding-right: 50px;
}
.service-image-right {
	padding-left: 50px;
}
.service-image-left > center > img,.service-image-right > center > img{
	max-height: 155px;
}
</style>
<!------ Include the above in your HEAD tag ---------->

<div class="container-fluid">
    <div class="content-wrapper">	
		<div class="item-container">	
			<div class="container">	
				<div class="col-md-12">
					<div class="product col-md-3 service-image-left">
                    
						<center>
							<img id="item-display" src="https://mpics.mgronline.com/pics/Images/564000008846604.JPEG" alt=""></img>
						</center>
					</div>
					
					<div class="container service1-items col-sm-2 col-md-2 pull-left">
						<center>
							<a id="item-1" class="service1-item">
								<img src="https://cf.shopee.co.th/file/572035f0fdc8cec45b19e9f3e560fe0e" alt=""></img>
							</a>
							<a id="item-2" class="service1-item">
								<img src="https://cf.shopee.co.th/file/d3fb3103bf5f63125ccba32fbad79abe" alt=""></img>
							</a>
							<a id="item-3" class="service1-item">
								<img src="https://cf.shopee.co.th/file/31e705f2566f1f77c4f8e614ec5ea035" alt=""></img>
							</a>
						</center>
					</div>
				</div>
					
				<div class="col-md-7">
					<div class="product-title">LINE FRIENDS Official MONITOR FIGURE by LINEFRIENDS</div>
					<!-- <div class="product-desc">The Corsair Gaming Series GS600 is the ideal price/performance choice for mid-spec gaming PC</div> -->
					<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
					<hr>
					<div class="product-price">100.00</div>
					<div class="product-stock">In Stock</div>
					<hr>
					<div class="btn-group cart">
						<button type="button" class="btn btn-success" onclick="window.location.href='/paymentPage.php'">
							Buy
						</button>
					</div>
				</div>
			</div> 
		</div>
		<div class="container-fluid">		
			<div class="col-md-12 product-info">
				<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="service-one">
						 
							<section class="container product-info">
								LINE FRIENDS Official MONITOR FIGURE by LINEFRIENDS
								<h3>100% AUTHENTIC ORIGINAL LINE FRIENDS</h3>
								<li>Line Friends X Royche OFFICIA MONITOR FIGURE</li>
								<li>Condition : Brand New & Factory Sealed</li>
								<li>Ship From Korea</li>
								<li>Size : BROWN-27.7x40mm, CONY-26.5x44.3mm, SALLY-21x30.5mm</li>
								<li>Material: PVC(NON-TOXIC)</li>
							</section>
										  
						</div>
					<div class="tab-pane fade" id="service-two">
						
						<section class="container">
								
						</section>
						
					</div>
					<div class="tab-pane fade" id="service-three">
												
					</div>
				</div>
				<hr>
			</div>
		</div>
	</div>
</div>
<script>
	$( document ).ready(function() {
		liff.init({
			liffId: "<LIFF ID>"
		})
		.then(() => {
			if (liff.isLoggedIn()) {
				liff.getProfile().then(function(profile) {
				}).catch(function(error) {
					Swal.fire({
						type: 'error',
						title: 'พบข้อผิดพลาด',
						text: 'ไม่สามารถดึงข้อมูล LINE Profile ของท่านได้ กรุณาลองใหม่อีกครั้ง หรือติดต่อแอดมินผ่านทาง Facebook'
					});
				});
			}else{
				liff.login();
			}
		})
		.catch((err) => {
		
		});
	});
</script>