<div class="page-title">
              <div class="title_left">
                <h3>User Form Add</h3>
              </div>
</div>
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah User </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="<?=site_url('user/add')?>" method="post" class="form-horizontal form-label-left">

                      <div class="form-group row ">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Username <span class="">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="username" class="form-control" value="<?=set_value('username')?>" required>
                        </div>
                        <span><?=form_error('username')?></span>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Password <span class="">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="password" name="password" class="form-control" value="<?=set_value('password')?>" required>
                        </div>
                        <span><?=form_error('password')?></span>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Confirm Password <span class="">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="password" name="confirmpass" class="form-control" value="<?=set_value('confirmpass')?>" required>
                        </div>
                        <span><?=form_error('confirmpass')?></span>
                      </div>
                      <div class="form-group row ">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Lengkap <span class="">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="fullname" class="form-control" value="<?=set_value('fullname')?>" required>
                        </div>
                        <span><?=form_error('fullname')?></span>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat <span class="">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea class="form-control" name="alamat" rows="3"  required><?=set_value('alamat')?></textarea>
                        </div>
                        <span><?=form_error('alamat')?></span>
                      </div>
                      <div class="form-group row ">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="email" class="form-control" value="<?=set_value('email')?>" required>
                        </div>
                        <span><?=form_error('email')?></span>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Level <span class="">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="level" class="form-control">
                            <option value="">- Pilih -</option>
                            <option value="1" <?=set_value('level') == 1 ? "selected" : null?>>Admin</option>
                            <option value="2" <?=set_value('level') == 2 ? "selected" : null?>>Kasir</option>
                          </select>
                          <span><?=form_error('level')?></span>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6  offset-md-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                          <a href="<?=site_url('user')?>" type="button" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                          <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>