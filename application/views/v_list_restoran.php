 
 <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <center>
             <h1 class="mb-10">List Restoran di Jakarta</h1>
        </center>
  
</div>
<div class="card-body">
    
   <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <div class="col-sm-12">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama restoran</th>
                <th>Alamat</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($restoran as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->nama_restoran ?></td>
                    <td width=550px;><?= $value->alamat ?></td>
                    <td><img src="<?= base_url('gambar/') . $value->gambar ?>" alt="" width="200px"></td>
                    <?php } ?>
                </tr>

        </tbody>
        </div>
    </table>
</div>


   