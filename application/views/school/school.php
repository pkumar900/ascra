
<section class="content">
    <div class="container-fluid">
       
    <?php if($this->session->flashdata('msg')==1)
      {
          echo '<div class="alert alert-success"> Added successfully.</div>';
      }
      else if($this->session->flashdata('msg')==2) {
         echo '<div class="alert alert-success">Updated successfully.</div>';
      }
      else if($this->session->flashdata('msg')==3) {
        echo '<div class="alert alert-danger"><strong>Oops!</strong>Something Went Wrong.</div>';
     }
       ?>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                          Schools
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <div class="col-md-1">
                             <a href="<?= base_url('Schools/create')?>" class="btn btn-primary waves-effect">Add School</a>
                         </div>
                     </ul>
                 </div>
                 <div class="body">
                    <div class="table-responsive">
                     <table >
                        <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>Courses</th>
                                <th>Added date</th>
                                <th>Updated Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                         <?php $count=1; foreach($all_school as $key=>$value) {?>
                           <tr id="row<?=$value->id?>">
                            <td><?= $count++; ?></td>
                            <td><?= $value->name ?></td>
                            <td><?= !empty($value->course)?$value->course:'N/A'; ?></td>
                            <td><?= $value->added_date ?></td>
                            <td><?= $value->updated_date ?></td>
                            <td><a href="<?= base_url('Schools/edit/'.base64_encode($value->id))?>" class="btn btn-primary waves-effect">Edit</a>
                               <a class="btn btn-danger"  data-toggle="tooltip" data-original-title="Delete School" onclick="delete_data('<?=base_url('Schools/delete') ?>','<?= base64_encode($value->id); ?>')">
                                  <i class="material-icons">delete_forever</i>
                              </a>
                              <a href="<?= base_url('Schools/view/'.base64_encode($value->id))?>" class="btn btn-primary waves-effect">view</a>

                            </tr>

                        <?php   } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</section>