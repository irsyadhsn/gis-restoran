<div class="col-sm-7">
    <div class="card mb-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data User</h6>
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
            echo form_open('user/input'); ?>
            <div class="form-group">
                <label>Nama User</label>
                <input class="form-control" placeholder="Nama User" name="nama_user" value="<?= set_value('nama_user') ?>" />
            </div>

            <div class="form-group">
                <label>Username</label>
                <input class="form-control" placeholder="Username" name="username" value="<?= set_value('username') ?>" />
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password') ?>" />
            </div>

            <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <button type="reset" class="btn btn-warning btn-sm">Reset</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>