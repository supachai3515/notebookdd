<div id="content">
    <div class="main-content">
        <div class="container">
            <div class="bread-crumb">
                <a href="<?php echo base_url(); ?>">Home</a> <span class="lnr lnr-chevron-right"></span> <span>แจ้งชำระเงิน</span>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="col-sm-12">
                    <form ng-submit="sendPayment()" class="form-horizontal" role="form">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label for="textinput">ชื่อ</label>
                                <input id="textinput" ng-model="paymentMessage.txtName" name="txtName" type="text" placeholder="ชื่อ" class="form-control input-md" required="required">
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label for="textinput">เบอร์ติดต่อ</label>
                                <input id="textinput" ng-model="paymentMessage.txtTel"name="txtTel" type="text" placeholder="เบอร์ติดต่อ" class="form-control input-md" required="required">
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label for="textinput">เลขที่ใบสั่งซื้อ</label>
                                <input id="textinput" ng-model="paymentMessage.txtOrder"name="txtOrder" type="text" placeholder="เลขที่ใบสั่งซื้อ" class="form-control input-md" required="required">
                            </div>
                            <div class="form-group">
                                <label for="textinput">เลือกธนาคาร</label>
                                <select ng-model="paymentMessage.txtBank"name="txtBank" id="inputBank" class="form-control" required="required">
                                    <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                                    <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                    <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="textinput">จำนวนเงิน</label>
                                <input id="textinput" ng-model="paymentMessage.txtAmount"name="txtAmount" type="text" placeholder="จำนวนเงิน" class="form-control input-md" required="required">
                            </div>

                            <div class="form-group">
                                <label for="textinput">วันที่โอน ตัวอย่าง 01/04/2016</label>
                                <input id="textinput" ng-model="paymentMessage.txtDate"name="txtDate" type="text" placeholder="วันที่โอน" class="form-control input-md" required="required">
                            </div>

                            <div class="form-group">
                                <label for="textinput">เวลาโอน ตัวอย่าง 12:00</label>
                                <input id="textinput" ng-model="paymentMessage.txtTime"name="txtTime" type="text" placeholder="เวลาโอน" class="form-control input-md" required="required">
                            </div>
                         
                            <div class="form-group">
                                <label for="filebutton"></label>
                                <button type="submit" class="btn btn-primary">แจ้งชำระ</button>
                            </div>
                            <div class="form-group" ng-if="isProscess==true">
                            <hr>
                                <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:70%"></div>
                            </div>                  
                            </div>
                            <h4 class="text-success" ng-bind="message_prosecss"></h4>

                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row bank-payment">
                    <div class="col-sm-3">
                        <img src="<?php echo base_url('theme'); ?>/images/bb.jpg" class="img-responsive img-rounded" alt="Image">
                    </div>
                    <div class="col-sm-9">
                        <h4>ธนาคารกรุงเทพ</h4>
                        <p>เลขที่บัญชี : 0687-076-380<br>
                        ชื่อบัญชี นายสมิด ตรวจมรคา ธนาคารกรุงเทพ สาขาพาราไดซ์ พาร์ค<br>
                        </p>
                    </div>
                </div>
                <div class="row bank-payment">
                    <div class="col-sm-3" style=" margin:0 auto;">
                        <img src="<?php echo base_url('theme'); ?>/images/thaipanit.jpg" class="img-responsive img-rounded" alt="Image">
                    </div>
                    <div class="col-sm-9">
                        <h4>ธนาคารไทยพาณิชย์</h4>
                        <p>เลขที่บัญชี : 175-2203-837<br>
                        นายสมิด ตรวจมรคา ธนาคารไทยพาณิชย์ สาขาพาราไดซ์ พาร์ค<br>
                    </div>
                </div>
                <div class="row bank-payment">
                    <div class="col-sm-3" style=" margin:0 auto;">
                        <img src="<?php echo base_url('theme'); ?>/images/kban.jpg" class="img-responsive img-rounded" alt="Image">
                    </div>
                    <div class="col-sm-9">
                        <h4>ธนาคารกสิกรไทย</h4>
                        <p>เลขที่บัญชี : 628-2014-074<br>
                        นายสมิด ตรวจมรคา ธนาคารกสิกรไทย สาขาพาราไดซ์ พาร์ค<br>
                    </div>
                </div>

                <div class="" style="padding-top:30px;">
                <p><strong>จ้งชำระเงินผ่านทาง email</strong></p>
                    <div class="item-contact-box">
                            <a href="#"><span class="lnr lnr-envelope"></span></a>
                            <label>e-mail:</label>
                        </div>
                        <div class="mail-box">
                            <a href="mailto:simpleitnotebook@gmail.com">simpleitnotebook@gmail.com</a>
                        </div>
                </div>

                <div class="" >
                <p><strong>แจ้งชำระเงินผ่านทาง line</strong></p>

                         <div class="item-contact-box">
                            <a href="#"><span class="fa fa-comment"></span></a>
                            <label>Line id:</label>
                        </div>
                        <div class="mail-box">
                            <p><a href="http://line.me/ti/p/%40zlg9137d" target="_blank">@notebookdd</a></p>

                        </div>
                </div>
            </div>
          
        </div>         
        </div>
    </div>
    <!-- End Grid Product -->
</div>
<!-- End Content -->
