<div class="page-title">
              <div class="title_left">
                <h3>Supplier Form <?=ucfirst($page)?></h3>
              </div>
</div>
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=ucfirst($page)?> Form Data</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="<?=site_url('supplier/proses')?>" method="post" class="form-horizontal form-label-left ">
                      <div class="form-group row ">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Supplier <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="hidden" name="id" value="<?=$row->id_supplier?>">
                        <input type="text" name="namasupplier" class="form-control" value="<?=$row->nama_supplier?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea class="form-control" name="alamat" rows="3"  required><?=$row->alamat?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">No. Telepon  <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="telpon" class="form-control" value="<?=$row->telp?>" required>
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="email" class="form-control" value="<?=$row->email?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea class="form-control" name="ket" rows="3"  required><?=$row->keterangan?></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6  offset-md-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                          <a href="<?=site_url('supplier')?>" type="button" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                          <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>