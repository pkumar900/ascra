 <section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h2>Add School Mapping</h2>
    </div>
    <?= $this->session->flashdata('msg') ?>
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">

          <div class="body">
            <?= form_open('School_to_course/store',array('class' => 'form','id'=>'school_course')); ?>

            <div class="row clearfix">
              <div class="col-sm-3">
                <div class="form-group">
                  <div class="form-line">
                    <select class="form-control" name="course_id" >
                      <option value="">Select Course</option>
                      <?php foreach ($all_course as $key => $value) { ?>
                        <option value="<?= $value->id ?>" <?= (set_value('course_id')==$value->id)?'selected':''?>><?= $value->name?></option>
                     <?php  } ?>

                    </select>
                  </div>
                   <?= form_error('course_id')?>
                  <!-- <span></span> -->
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <div class="form-line">
                    <select class="form-control" name="school_id">
                      <option value="">Select School</option>
                      <?php foreach ($all_school as $key => $value) { ?>
                        <option value="<?= $value->id ?>" <?= (set_value('school_id')==$value->id)?'selected':''?>><?= $value->name?></option>
                     <?php  } ?>
                     

                    </select>
                  </div>
                   <?= form_error('school_id')?>
                  <!-- <span></span> -->
                </div>
              </div>
            </div>

            <div class="row clearfix">
              <div class="col-md-6">
                <button type="submit" class="btn btn-primary waves-effect">Save</button>

                <a href="<?= base_url('School_to_course')?>" class="btn btn-primary waves-effect">Cancel</a>
              </div>


            </div>
            <?= form_close()?>
          </div>
        </div>
      </div>
    </div>


  </div>
</section>
