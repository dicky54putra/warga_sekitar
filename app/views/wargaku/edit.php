<div class="container">
	
	<div class="row mt-3">
		<div class="col-md-6">
			
			<h3 class="mt-3">Form Tambah Data Wargaku</h3>
				<form method="post" action="<?= base_url; ?>/wargaku/tambah">
					 Nama <input type="text" name="nama" class="form-control" id="nama" value="<?= $data['wrg']['nama']; ?>">
					 Asal <input type="text" name="asal" class="form-control" id="asal" value="<?= $data['wrg']['asal']; ?>">
					 <button type="submit" name="tambah" class="btn btn-primary float-right mt-3">Tambah</button>
				</form>
		</div>
	</div>

</div>