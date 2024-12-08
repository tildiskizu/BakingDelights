<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" href="assets/icon.png" />
	<title>Home</title>
	<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
		.popup-container {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.5);
			justify-content: center;
			align-items: center;
			z-index: 1000;
		}

		.popup-box {
			background: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
			text-align: center;
			width: 300px;
		}

		.popup-header {
			font-size: 18px;
			margin-bottom: 10px;
			color: #333;
		}

		.popup-body {
			font-size: 16px;
			margin-bottom: 20px;
			color: #555;
		}

		.popup-close {
			background-color: #ff5722;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 14px;
		}

		.popup-close:hover {
			background-color: #e64a19;
		}
	</style>
<body>
	<div class="container">
		<header>
			<nav >
				<div class="logo">
					<img src="assets/logo.png" alt="" />
				</div>
				<input type="checkbox" id="click" />
				<label for="click" class="menu-btn">
					<i class="fas fa-bars"></i>
				</label>
				<ul >
					<li ><a href="#">Home</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="login.php" class="btn_login">Login</a></li>
				</ul>
			</nav>
		</header>
		<main>
			<div class="jumbotron">
					<img src="assets/img/logo.png" alt="" style="width">
				<div class="jumbotron-text">
					<h1 style="color :#6b4227">Baking Delights</h1>
				</div>
				<div class="jumbotron-img">
					<img src="assets/jumbotron.png" alt="" />
				</div>
			</div>
			<div class="cards-categories">
				<h2 style="color :#6b4227">Discover Delicious Recipes</h2>
				<p style="color :#6b4227">Join us to explore and bake delightful creations!</p>
				<div><img src="assets/img/jumbotron.png" alt=""></div>
				<div class=""><button onclick="showPopup()" class="btn_login">Show Popup</button></div>
				<div class="card-categories">
					<?php
					include 'koneksi.php';
					$sql = "SELECT * FROM tb_categories";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "
						<h3 style='text-align: center; color: red;'>Data Kosong</h3>
				";
					}
					while ($data = mysqli_fetch_assoc($result)) {
						echo "
						<div class='card'>
							<div class='card-image'>
								<img src='img_categories/$data[photo]' alt='tidak ada gambar' />
							</div>
							<div class='card-content'>
								<h5>$data[categories]</h5>
								<p class='description'>$data[description]</p>
								<p class='price'> $data[price] </p>
								<button class='btn_belanja' type='submit' onclick='bukaModal(\"id=$data[id]\")'>Beli</button>
							</div>
					</div>
                  ";
					}
					?>
					
				</div>
			</div>
			<!-- Popup Box -->
	<div class="popup-container" id="popup">
		<div class="popup-box">
			<div class="popup-header">Information</div>
			<div class="popup-body"><p>Baking Delights adalah sebuah website yang didedikasikan untuk para pecinta baking, baik pemula maupun profesional. Website ini menyediakan berbagai resep kue, roti, dan dessert yang mudah diikuti, mulai dari kreasi klasik seperti brownies dan tart hingga dessert modern seperti mousse dan macaron. Setiap resep dirancang untuk memberikan panduan langkah-demi-langkah yang jelas, sehingga siapa pun dapat menciptakan hasil yang memuaskan di dapur mereka. Selain itu, Baking Delights menawarkan berbagai opsi resep sehat, seperti bebas gluten, rendah gula, atau berbasis bahan vegan, yang cocok untuk kebutuhan khusus atau gaya hidup tertentu.</p></div>
			<button class="btn_login" onclick="closePopup()">Close</button>
		</div>
	</div>

			<!--  Modal -->
			<div id="myModal" class="modal-container" onclick="tutupModal()">
				<div class="modal-dialog" onclick="event.stopPropagation()">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title " style="color:  #ffb72b;">Formulit Pembayaran</h1>
							<button type="button" class="btn-close" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form>
								<input type="hidden" name="category_id" id="category_id" value="">
								<input type="hidden" name="category_name" id="category_name" value="">
								<input type="hidden" name="price" id="price" value="">
								<div class="form-group">
									<label class="labelmodal" for="recipient-name" class="col-form-label">Nama :</label>
									<input class="inputdata" type="text" class="form-control" id="recipient-name">
								</div>
								<div class="form-group">
									<label class="labelmodal" for="handphone" class="col-form-label">No. Hp :</label>
									<input class="inputdata" type="text" class="form-control" id="handphone">
								</div>
								<div class="form-group">
									<label class="labelmodal" for="alamat-text" class="col-form-label">Alamat:</label>
									<textarea class="inputalamat" class="form-control" id="alamat-text"></textarea>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" onclick="tutupModal()">Keluar</button>
							<button type="button" class="btn btn-yellow" onclick="bukaModal2()">Lanjutkan</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal 2 -->
			<div id="myModal2" class="modal-container" onclick="tutupModal2()">
				<div class="modal-dialog" onclick="event.stopPropagation()">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title" style="color:  #ffb72b;">Data Transaksi</h1>
							<button type="button" class="btn-close" aria-label="Close" onclick="tutupModal2()"></button>
						</div>
						<form action="transaction/transaction-proses.php" method="post">
							<div class="modal-body">
								<h4> Kategori</h4>
								<div class="form-group">
									<label class="labelmodal" for="detail-kategori" class="col-form-label">Kategori
										:</label>
									<input class="inputdata" type="text" name="detail-kategori" class="form-control" id="detail-kategori" readonly>
								</div>
								<div class="form-group">
									<label class="labelmodal" for="detail-harga" class="col-form-label">Harga :</label>
									<input class="inputdata" type="text" name="detail-harga" class="form-control" id="detail-harga" readonly>
								</div>
								<h4>Pembeli</h4>
								<div class="form-group">
									<label class="labelmodal" for="detail-nama" class="col-form-label">Nama :</label>
									<input class="inputdata" name="detail-nama" type="text" class="form-control" id="detail-nama" readonly>
								</div>
								<div class="form-group">
									<label class="labelmodal" for="detail-nomorhp" class="col-form-label">No. Hp
										:</label>
									<input class="inputdata" name="detail-nomor" type="text" class="form-control" id="detail-nomorhp" readonly>
								</div>
								<div class="form-group">
									<label class="labelmodal" for="detail-alamat" class="col-form-label">Alamat:</label>
									<textarea class="inputalamat" name="detail-alamat" class="form-control" id="detail-alamat" readonly></textarea>
								</div>
								<input type="hidden" name="detail-status" value="succes">

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="kembaliKeModalPertama()">Kembali</button>
								<button name="simpan" type="submit" class="btn btn-yellow" onclick="lakukanPembayaran()">Lakukan
									Pembayaran</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		</main>
		<footer>
			<h4>&copy;Praktikum Pemweb 2024 - Mechtildis</h4>
		</footer>
	</div>
	<script>
		var selectedCategoryId;
		// Fungsi Modal
		function bukaModal(categoryId) {
			console.log('categoryId:', categoryId);
			selectedCategoryId = categoryId;
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					var categoryData = JSON.parse(xhr.responseText);

					// Perbarui input tersembunyi
					document.getElementById('category_id').value = categoryId;
					document.getElementById('category_name').value = categoryData.categories;
					document.getElementById('price').value = categoryData.price;
					document.getElementById("myModal").style.display = "flex";
				}
			};
			xhr.open("GET", "get_kategori.php?" + categoryId, true);
			xhr.send();
		}

		function tutupModal() {
			document.getElementById("myModal").style.display = "none";
		}

		function tutupModal2() {
			document.getElementById("myModal2").style.display = "none";
		}

		function bukaModal2() {
			tutupModal(); // Tutup modal pertama
			document.getElementById("myModal2").style.display = "flex";

			var nama = document.getElementById("recipient-name").value;
			var nomorhp = document.getElementById("handphone").value;
			var alamat = document.getElementById("alamat-text").value;
			// kategori
			var kategori = document.getElementById("category_name").value;
			var harga = document.getElementById("price").value;

			document.getElementById("detail-nama").value = nama;
			document.getElementById("detail-nomorhp").value = nomorhp;
			document.getElementById("detail-alamat").value = alamat;
			document.getElementById("detail-kategori").value = kategori;
			document.getElementById("detail-harga").value = harga;

		}

		function kembaliKeModalPertama() {
			tutupModal2();
			bukaModal();
		}

		function lakukanPembayaran() {
			alert("Pembayaran berhasil!");
			tutupModal2();
			document.getElementById("recipient-name").value = "";
			document.getElementById("handphone").value = "";
			document.getElementById("alamat-text").value = "";
		}

		// fungsi popup box
		// Show the popup
		function showPopup() {
			document.getElementById('popup').style.display = 'flex';
		}

		// Close the popup
		function closePopup() {
			document.getElementById('popup').style.display = 'none';
		}
	</script>
</body>

</html>
