<div id="content">
    <div class="main-content content-contact">
        <div class="container" ng-init="getDoclist()">
            <div class="bread-crumb">
                <a href="#">Home</a> <span class="lnr lnr-chevron-right"></span> <span>Download เอกสาร</span>
            </div>

            <div class=" row col-md-8 col-md-offset-2">
                <form ng-submit="getOrderTracking()" >
                <div class="input-group" style="padding: 20px 0;">
                    <input type="text" class="form-control" placeholder="ค้นหาเอกสาร" ng-model="txtSearchTracking">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>


              <div ng-repeat="row in doc_list | filter : txtSearchTracking">

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

             
        </div>  
    </div>  
</div>
<!-- End Content -->
    
