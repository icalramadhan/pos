<div class="page-title">
              <div class="title_left">
                <h3>List Data Suppliers <i class="fa fa-truck"></i></h3>
              </div>

<!-- <div class="container"> -->
    <div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash')?>"></div>

<!-- </div> -->


<!-- Main Content  -->
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Suppliers </h2>
            <div class="pull-right">
                <a href="<?=site_url('supplier/add')?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus"></i> Create
                </a>
            </div>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                <tr>
                    <th><?=$no++?>.</th>
                    <td><?=$data->nama_supplier?></td>
                    <td><?=$data->alamat?></td>
                    <td><?=$data->telp?></td>
                    <td><?=$data->email?></td>
                    <td><?=$data->keterangan?></td>
                    <td>
                        <a href="<?=site_url('supplier/edit/'.$data->id_supplier)?>" class="btn btn-info btn-xs" >
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <!-- <a href="<?=site_url('supplier/delete/'.$data->id_supplier)?>" onclick="return confirm('Apakah anda yakin untuk menghapus?')"  class="btn btn-danger btn-xs" > -->
                        <a href="<?=site_url('supplier/delete/'.$data->id_supplier)?>" class="btn btn-danger btn-xs btnhapus" >
                            <i class="fa fa-trash"></i> Delete
                        </a>
                    </td>
                </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
        </div>
</div>