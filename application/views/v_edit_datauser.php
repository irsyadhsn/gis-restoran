<div class="col-sm-7">
    <div class="panel panel-primary">
        <div class="panel-heading">
            EditData User
        </div>
        <div class="panel-body">
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
            echo form_open('user/edit/' . $user->id_user); ?>
            <div class="form-group">
                <label>Nama User</label>
                <input class="form-control" placeholder="Nama User" name="nama_user" value="<?= $user->nama_user ?>" />
            </div>

            <div class="form-group">
                <label>Username</label>
                <input class="form-control" placeholder="Username" name="username" value="<?= $user->username ?>" />
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" value="<?= $user->password ?>" />
            </div>

            <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a class="btn btn-warning btn-sm" href="<?= base_url('user/index') ?>">Back</a>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>