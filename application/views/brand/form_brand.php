<section class="content-header">
    <h1>Brand
        <small></small>
    </h1>
   
</section>

<!-- Main content -->
<section class="content">      

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Data Brand</h3>
            <div class="pull-right">
                <a href="<?=site_url('brand')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Kembali 
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <?//=validation_errors() ?>
                    <form action="<?=site_url('brand/proses')?>" method="post">
                        <input type="hidden" name="id" value="<?=$row->id?>" class="form-control" required> 
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" value="<?=$row->nama_brand?>" class="form-control" required>   
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">Simpan</button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>        
                </div>
            </div>
        </div>

    </div>
</section>