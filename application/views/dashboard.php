    

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>


        <!-- Widgets -->
        <div class="row clearfix">

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">SCHOOLS</div>
                        <div class="number count-to" data-from="0" data-to="<?= count($all_branch)?>" data-speed="1000" data-fresh-interval="20"><?= count($all_school)?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">forum</i>
                    </div>
                    <div class="content">
                        <div class="text">COURSES</div>
                        <div class="number count-to" data-from="0" data-to="<?= count($all_employee)?>" data-speed="1000" data-fresh-interval="20"><?= count($all_course)?></div>
                    </div>
                </div>
            </div>

        </div>

    </script>