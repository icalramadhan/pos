<div class="page-title">
              <div class="title_left">
                <h3>List Data Users <i class="fa fa-user"></i></h3>
              </div>

<!-- Main Content  -->
    <div class="box-body table responsive">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Users </h2>
            <div class="pull-right">
                <a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
                <i class="fa fa-user-plus"></i> Create
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
                    <th>Username</th>
                    <th>Name</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Action</th>
                    <th>Active</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                <tr>
                    <th><?=$no++?>.</th>
                    <td><?=$data->username?></td>
                    <td><?=$data->nama_lengkap?></td>
                    <td><?=$data->alamat?></td>
                    <td><?=$data->email?></td>
                    <td><?=$data->level == 1 ? "Admin" : "Kasir"?></td>
                    <td>
                        <form action="<?=site_url('user/delete')?>" method="post">
                            <a href="<?=site_url('user/edit/'.$data->id_user)?>" class="btn btn-info btn-xs" >
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <input type="hidden" name="id_user" value="<?=$data->id_user?>">
                            <button onclick="return confirm('Apakah anda yakin untuk menghapus?')" class="btn btn-danger btn-xs" >
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                    <td>
                        <label class="container">
                            <input type="checkbox" <?=$data->is_active == 1 ? 'checked="checked"' : '' ?> class="checkbox" data="<?=$data->id_user?>" active="<?=$data->is_active?>">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>