<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="m-0">Tambah Berita</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('konten/tambahberita') ?>" method="post">
                        <div class="form-group">
                            <label for="nama">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('judul') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Headline</label>
                            <input type="text" class="form-control" id="headline" name="headline" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('headline') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="myEditor">Deskripsi</label>
                            <textarea name="editor_content" id="myEditor"></textarea>
                        </div>
                        <small class="form-text text-danger"><?= form_error('editor_content') ?></small>
                        <button type="submit" class="btn btn-primary float-right">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->