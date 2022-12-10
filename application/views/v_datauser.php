<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">User WEBGIS Restoran</h6>
</div>
<div class="card-body">
    

    <?php
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
    <table class="table table-responsive table-bordered" id="dataTable" width="200%" cellspacing="0">
     <div class="col-sm-12">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($user as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->nama_user ?></td>
                    <td><?= $value->username ?></td>
                    <td><?= $value->password ?></td>
                    <td><a class='btn btn-sm btn-warning' style='text-decoration:none; color:black;' href='<?= base_url('user/edit/' . $value->id_user) ?>'>Edit</a>
                        <a onclick='return confirm("Apakah ingin hapus data ?")' class='btn btn-sm btn-danger' style='text-decoration:none; color:black;' href='<?= base_url('user/delete/' . $value->id_user) ?>'>Delete</a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
     </div>
    </table>  
</div>