<?php 
include "Template/Header.php";
include "../Recursos/Conexion.php";
?>
<br> <br> <br>
<!-- Shoping Cart -->

<div class="container">
	<div class="col-sm-10 col-lg-7 col-xl-8 m-lr-auto m-b-50">
		<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
			<h4 class="mtext-109 cl2 p-b-30">
				Compra exitosa
			</h4>
			<br><hr>
			<div class="flex-w flex-t p-t-27 p-b-33">

				<div class="size-208">
					<span class="mtext-101 cl2">
						Wish on line
					</span>
				</div>

				<div class="size-209 p-t-1">
					<span class="mtext-110 cl2">
						Le agradece su compra
					</span>
				</div> 

				
			</div>
			<hr>
			<div id="paypal-button-container" class="btn btn-block"></div>

			<!-- <input type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" value="Pagar"> -->

			<!-- <a href="RegDireccion.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Pagar</a> -->

			<!-- <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
				Pagar
			</button>  -->

				
		</div>
	</div>
</div>	

<?php include "Template/Footer.php";?>