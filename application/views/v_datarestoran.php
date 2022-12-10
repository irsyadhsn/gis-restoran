 <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Restoran di Jakarta</h6>
</div>
<div class="card-body">
    
    <?php
    //notifikasi gagal input gambar
    if (isset($error_upload)) {
        echo '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' . $error_upload . '</div>';
    }

    echo validation_errors(
        '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
        '</div>'
    );
    //notifikasi pesan berhasil diinput
    if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo $this->session->flashdata('pesan');
        echo '</div>';
    }
    ?>
   <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <div class="col-sm-12">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama restoran</th>
                <th>Alamat</th>
                <th>Gambar</th>
                <?php // if ($this->session->userdata('username') != "") { ?>
                 <th>Action</th>
                <?php //} ?>
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
                    <?php //if ($this->session->userdata('username') != "") { ?>
                        <td><a class='btn btn-xs btn-warning' style='text-decoration:none; color:black;' href='<?= base_url('restoran/edit/' . $value->id_restoran) ?>'>Edit</a>
                            <a onclick='return confirm("Apakah ingin hapus data ?")' class='btn btn-xs btn-danger' style='text-decoration:none; color:black;' href='<?= base_url('restoran/delete/' . $value->id_restoran) ?>'>Delete</a>
                        </td>
                    <?php } ?>

                </tr>
            <?php //} ?>

        </tbody>
        </div>
    </table>
</div>


   