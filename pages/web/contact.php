<script type="text/javascript">
	$(document).ready(function(){
		$('#validate-contact').validate({
			rules:{
				nama:{
						required:true,
				},
				email:{
						required:true,
						email:true,
				},
				phone:{
						required :true,
						number:true,
				}
			},
			messages:{
				nama :"Nama anda tidak boleh kosong !!",
				email:{
						required:'Email anda tidak boleh kosong !!',
						email:'Email anda tidak valid !!',
				},
				phone:{
						required:"Nomor telepon anda tidak boleh kosong !!",
						number:"Nomor telepon anda tidak valid harus angka !!",
				},
				keterangan:"Pesan anda tidak boleh kosong !!",
			}

		});
	});
</script>
<section class="container">
	<ul class="nav-ul-breadcumb">
		<li class="nav-li-breadcumb"><i class="fa fa-home"></i> Home >> Contact Us</li>
	</ul>
	<div>
		<h3>CONTACT US</h3>
	</div>
	<div id="contact">
		<div class="map">
			<div class="box_wrapp">
				<div class="box_cont">
					<div class="head">
						<h2><i class="fa fa-phone"></i> Contact</h2>
					</div><!-- head -->
					<ul class="street">
						Email : admin@alrahma.id</br>
						Hp    : 081329542882
					</ul>
					<div class="head headbottom">
						<h2><i class="fa fa-home"></i> Head Office<h2>
					</div>
					Address: Jl. 
					<ul class="street"> Address: Jl. Linggamas No 8 Sokaraja Wetan - Banyumas 531812<br> Telp / fax :08132954288</ul>
				</div><!--box_cont -->
			</div><!-- box-wrap-->
	    <div class="form">
	        <div class="box main-contact">
	            <form action="pages/proses/proses_contact.php?act=addcontact" method="post" enctype="multipart/form-data" id="validate-contact">
	            	<div>
	        			<label>Nama<span class='required'>*</span></label>
	                	<input class="name form-control" type="text" autofocus required="" autocomplete="off" name="nama">
	            	</div>
	            	<div>
	        			<label>Email<span class='required'>*</span></label>
	                	<input class="mail form-control" type="text" autofocus required="" autocomplete="off" name="email">
	            	</div>
	            	<div>
	        			<label>Phone<span class='required'>*</span></label>
	                	<input class="phone form-control" type="text" autofocus required="" autocomplete="off" name="phone">
	            	</div>
	            	<div>
	        			<label>Messages<span class='required'>*</span></label>
	                	<textarea class="form-control" autofocus required="" autocomplete="off" name="keterangan"></textarea>
	            	</div>
					<!-- nagiation submit -->
					<div style="margin-top:10px;">
						<input type="submit" class="btn btn-primary" name="submit" value="Send your message">
					</div><!-- row submit -->
				</form>
			</div><!--box main-contact -->
		 </div><!-- map -->
	</div><!--contact -->
	<div class="clearfix"></div>
	<div style="margin-top:100px;"></div>
</section>
