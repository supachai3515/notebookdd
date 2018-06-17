<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url()?>">Home</a></li>
                <li class='active'> ดาวน์โหลดเอกสาร</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs" ng-controller="download_ctrl">
    <div class="container">
        <div class="row inner-bottom-sm">
            <div class=" row col-md-6 col-sm-12 col-md-offset-3">
                <div class="search-area">
                    <input class="search-field" placeholder="ค้นหาเอกสาร" ng-model="txtSearchDocs" />
                    <button type="button" class="search-button"></button>
                </div>
                <div ng-repeat="row in doc_list | filter : txtSearchDocs">
                  <h4> <span ng-bind="row.name"></span>
                     <span ng-if="row.type_name == 'bios'">
                          <span class="label label-success" ng-bind="row.type_name"></span>
                     </span>
                     <span ng-if="row.type_name == 'diagram'">
                          <span class="label label-info" ng-bind="row.type_name"></span>
                     </span>       
                    </h4>
                    <p><span ng-bind="row.description"></span></p>

                     <a href="{{row.link_1}}" class="btn btn-xs btn-primary" target="_blank"><span class="glyphicon glyphicon-cloud-download"></span> Download</a> <span> </span>

                    <span ng-if="row.link_2 != ''">
                          <a href="{{row.link_2}}" class="btn btn-xs btn-primary" target="_blank"><span class="glyphicon glyphicon-cloud-download"></span> Download 2</a>
                     </span>
                     <hr/>
              </div>
            </div>
        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <?php $this->load->view('template/footer_brand'); ?>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.body-content -->