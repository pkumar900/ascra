 <section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h2>Edit School</h2>
    </div>
     <?= $this->session->flashdata('msg'); ?>
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">

          <div class="body">
            <?= form_open('Schools/update',array('class' => 'form','id'=>'school')); ?>

            <div class="row clearfix">
              <div class="col-sm-4">
                <div class="form-group">
                  <div class="form-line">
                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?= $data[0]->name ?>" />
                  </div>
                  <?= form_error('name')?>
                </div>
              </div>
            </div>

            <div class="row clearfix">
             <div class="col-md-6">
              <input type="hidden" name="id" value="<?=base64_encode($data[0]->id)?>">
              <button type="submit" class="btn btn-primary waves-effect">Save</button>

              <a href="<?= base_url('Schools')?>" class="btn btn-primary waves-effect">Cancel</a>
            </div>

          </div>
          <?= form_close()?>
        </div>
      </div>
    </div>
  </div>


</div>
</section>