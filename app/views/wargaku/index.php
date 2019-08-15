<div class="container">


	<div class="row mt-4">
		<div class="col-6">

			<div class="row mt-3">
				<div class="col-md-6">
					<!-- <a href="<?= base_url; ?>/wargaku/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a> -->
					<button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
          Tambah Data Mahasiswa
        </button>
				</div>
			</div>

			<div class="row mb-3 mt-2">
		      <div class="col-lg-6">
		        <form action="<?= base_url; ?>/wargaku/cari" method="post">
		          <div class="input-group">
		            <input type="text" class="form-control" placeholder="cari mahasiswa.." name="keyword" id="keyword" autocomplete="off">
		            <div class="input-group-append">
		              <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
		            </div>
		          </div>
		        </form>
		      </div>
		    </div>

			<h3 class="mt-3">Daftar Wargaku</h3>

			<?php foreach ($data['wrg'] as $wrg) :?>
			<!-- <ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<?= $wrg['nama']; ?>
							<a href="<?= base_url; ?>/wargaku/detail/<?= $wrg['id']; ?>" class="badge badge-primary "> Detail</a>
						</li>
			</ul> -->

			<table class="table">
				<tr>
					<td><?= $wrg['nama']; ?> 
					<a href="<?= base_url; ?>/wargaku/hapus/<?= $wrg['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?');"> Hapus</a>
					<a href="<?= base_url; ?>/wargaku/detail/<?= $wrg['id']; ?>" class="badge badge-primary float-right ml-1"> Detail</a>	
					<a href="<?= base_url; ?>/wargaku/edit/<?= $wrg['id']; ?>" class="badge badge-success float-right edit" data-toggle="modal"  data-target="#formModal" data-id="<?= $wrg['id']; ?>"> Edit</a>	
				</td>
				</tr>
			</table>
			<?php endforeach; ?>
		</div>
	</div>
	
</div>


<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       </div>

       <div class="modal-body">
       		<form method="post" action="<?= base_url; ?>/wargaku/tambah">
       				 <input type="hidden" name="id" id="id">
					 Nama <input type="text" name="nama" class="form-control" id="nama" autocomplete="off" required="">
					 Asal <input type="text" name="asal" class="form-control" id="asal" autocomplete="off" required="">
	   </div>

	   <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
      </div>