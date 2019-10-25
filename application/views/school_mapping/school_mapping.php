
<section class="content">
  <div class="container-fluid">

    <?=$this->session->flashdata('msg')?>
    <!-- Basic Examples -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <div class="row clearfix">
              <div class="col-md-1" >
               <h2>
                 School Mapping
               </h2>
             </div>
             <?= form_open('School_to_course',array('class' => 'form','name'=>'mapping')); ?>
             <div class="row" style="width:500px; margin:0 auto;">
              <div class="col-md-6" >
                <select class="form-control"  name="course_id" onchange="mapping.submit()">
                  <option value="">Select Course</option>
                  <?php foreach ($all_course as $key => $value) { ?>
                   <option value="<?= $value->id?>" <?= (set_value('course_id')==$value->id)?'selected':''?>><?= $value->name ?></option>
                 <?php } ?>
               </select>

             </div>

           </div>
           <?= form_close()?>
           <ul class="header-dropdown m-r--5">
            <div class="col-md-12">
              <a href="<?= base_url('School_to_course/create')?>" class="btn btn-primary waves-effect">Add Mapping</a>
           </div>

         </ul>
       </div>

     </div>

     <div class="body">
      <div class="table-responsive">
       <table class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
          <tr>
            <th>Sr.</th>
            <th>School</th>
            <th>Course</th>
            <th>Added date</th>
          </tr>
        </thead>

        <tbody>
         <?php $count=1; foreach($all_mapping as $key=>$value) {

          ?>
          <tr id="row<?= $value->id ?>">
            <td><?= $count++; ?></td>
            <td><?= $value->school ?></td>
            <td><?= $value->course ?></td>
            <td><?= $value->added_date ?></td>
          </tr>

        <?php  } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>

</div>
</section>