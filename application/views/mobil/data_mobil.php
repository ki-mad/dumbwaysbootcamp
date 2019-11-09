<section class="content-header">
    <h1>Mobil
        <small></small>
    </h1>
    
</section>

<!-- Main content -->
<section class="content">      

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Mobil</h3>
            <div class="pull-right">
                <a href="<?=site_url('mobil/tambah')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Tambah 
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="mytable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Brand</th>
                        <th>Gambar</th>
                        <th>Warna</th>
                        <th>Deskripsi</th>
                        <th>Waktu Ditambahkan</th>
                        <th>Terakhir Di update</th>
                        <th>stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                    foreach($row->result() as $key => $data ) { ?>                    
                    <tr>
                        <td><?=$data->id?></td>
                        <td><?=$data->nama?></td>
                        <td><?=$data->nama_brand?></td>
                        <td><?=$data->gambar?></td>
                        <td><?=$data->warna?></td>
                        <td><?=$data->deskripsi?></td>
                        <td><?=$data->create_time?></td>
                        <td><?=$data->update_time?></td>
                        <td><?=$data->stock?></td>
                        <td class="text-center" width="160px">
                            <a href="<?=site_url('mobil/ubah/'.$data->id)?>"  class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Ubah
                            </a>
                            <a href="<?=site_url('mobil/delete/'.$data->id)?>" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</section>