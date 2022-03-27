<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <?php include('../../components/lib/lib.php')?>
     <?php include('../../access/access.php')?>
     <?php _active('.package')?>
</head>

<body ng-app="app" ng-controller="package"
     ng-init="_callPackage();_callProduct();pro_title='';st_date='<?php echo $_DATE ?>';end_date='<?php echo $_DATE ?>'">
     <!-- Page wrapper start -->
     <div class="page-wrapper pinned">
          <?php include('../../components/layout/side-bar.php') ?>
          <!-- Page content start  -->
          <div class="page-content">
               <?php include_once('../../components/layout/heading.php')?>
               <!-- Page header start -->
               <div class="page-header">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item" onclick="window.location='../settings/'">ຈັດການຂໍ້ມູນ</li>
                         <li class="breadcrumb-item active">ແພັກເກັຈ</li>
                    </ol>

                    <ul class="app-actions">

                    </ul>
               </div>
               <!-- Page header end -->
               <!-- Main container start -->
               <div class="main-container">
                    <div class="row">
                         <div class="col-md-3 col-12">
                              <div class="blog p-3">
                                   <h4><i class="fa fa-align-left"></i> <span ng-bind="form_title"></span></h4>
                                   <hr>
                                   <div class="form-group">
                                        <label for="">ປະເພດຄອສ໌ <?php isVal()?> </label>
                                        <input type="hidden" ng-model="_id">
                                        <input type="hidden" ng-model="old_qty">
                                        <select class="form-control" ng-model="package_id_fk">
                                             <option value="">ເລືອກປະເພດຄອສ໌</option>
                                             <?php 
                                             $callPackage=mysqli_query($con,"SELECT*FROM spa_package");
                                             foreach ($callPackage as $key) {?>
                                             <option value="<?php echo $key['_id']?>">
                                                  <?php echo $key['package_name']?></option>
                                             <?php } ?>
                                        </select>
                                   </div>
                                   <div class="form-group">
                                        <label for="">ຈຳນວນ <?php isVal()?></label>
                                        <input type="text" class="form-control text-right" id="add_package_qty"
                                             ng-model="add_package_qty" placeholder="00">
                                   </div>
                                   <div class="form-group">
                                        <label for="">ໝາຍເຫດ</label>
                                        <textarea rows="3" class="form-control" ng-model="package_note"></textarea>
                                   </div>

                                   <div class="form-group">
                                        <button type="button" ng-click="_onSave()" class="btn btn-outline-primary">
                                             <i class="fa fa-check-circle"></i>
                                             <span ng-bind='btnName'"></span>
                                        </button>
                                    <button type=" button" ng-click="_clear()" class="btn btn-outline-danger">
                                                  <i class="fa fa-times-circle"></i> ຍົກເລີກ
                                        </button>
                                   </div>
                              </div>
                         </div>
                         <div class="col-md-9 col-12">
                              <div class="blog p-3">
                                   <h4><i class="fa fa-list"></i> ລາຍການແພັກເກັຈ</h4>
                                   <hr>
                                   <div class="row mt-3 mb-3">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                             <label for="">ແຕ່ວັນທີ</label>
                                             <input type="text" class="form-control" id="start_date" ng-model="st_date"
                                                  data-toggle="datepicker">
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                             <label for="">ເຖິງວັນທີ</label>
                                             <input type="text" class="form-control" id="end_date" ng-model="end_date"
                                                  data-toggle="datepicker">
                                        </div>
                                        <div class="col-xs4 col-sm-4 col-md-4 col-lg-4 pt-2">
                                             <label for=""></label>
                                             <button type="button" ng-click="_onFilter()" class="btn btn-primary mt-4">
                                                  <i class="icon-search"></i> ຄົ້ນຫາ
                                             </button>
                                             <button type="button" onclick="_print()"
                                                  class="btn btn-outline-primary mt-4">
                                                  <i class="icon-print"></i> ພິມລາຍການເບີກ
                                             </button>
                                        </div>
                                   </div>
                                   <div class="table-responsice">
                                        <table datatable="ng" dt-option="vm.dtOption"
                                             class="table table-hover table-sm">
                                             <thead>
                                                  <tr>
                                                       <th>#</th>
                                                       <th>ຊື່ແພັກເກັຈ</th>
                                                       <th>ລາຄາ</th>
                                                       <th>ຈຳນວນ</th>
                                                       <th>ໝາຍເຫດ</th>
                                                       <th>ວັນທີ</th>
                                                       <th>ເພີ່ມໂດຍ</th>
                                                       <th></th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr ng-repeat="x in _package | filter:_filter">
                                                       <td ng-bind='$index+1'></td>
                                                       <td ng-bind='x.package_name'></td>
                                                       <td style="text-align:right"
                                                            ng-bind='x.add_package_price | number'>
                                                       </td>
                                                       <td style="text-align:right"
                                                            ng-bind='x.add_package_qty | number'>
                                                       </td>
                                                       <td ng-bind='x.note'></td>
                                                       <td ng-bind='x.createdAt'></td>
                                                       <td ng-bind="x.user_fname + ' ' + x.user_lname"></td>
                                                       <td>
                                                            <div class="btn-group float-right">
                                                                 <button type="button" ng-click="_onUpdate(x)"
                                                                      class="btn btn-outline-primary"><i
                                                                           class="fa fa-pencil"></i></button>
                                                                 <button type="button"
                                                                      ng-click="_onDelete(x.p_id,x.package_id_fk,x.add_package_qty)"
                                                                      class="btn btn-outline-danger"><i
                                                                           class="fa fa-trash"></i></button>
                                                            </div>
                                                       </td>
                                                  </tr>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- Row end -->
          </div>
          <!-- Main container end -->
     </div>
     <!-- Page content end -->
     </div>
     <!-- Page wrapper end -->
     <?php include('../../components/lib/script.php')?>
     <script src="app.js"></script>
     <script>
     $('#addPackage').addClass('active');
     $("#add_package_qty").on("keyup click change paste input", function(event) {
          $(this).val(function(index, value) {
               if (value != "") {
                    //return '$' + value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    var decimalCount;
                    value.match(/\./g) === null ?
                         (decimalCount = 0) :
                         (decimalCount = value.match(/\./g));

                    if (decimalCount.length > 1) {
                         value = value.slice(0, -1);
                    }

                    var components = value.toString().split(".");
                    if (components.length === 1) components[0] = value;
                    components[0] = components[0]
                         .replace(/\D/g, "")
                         .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    if (components.length === 2) {
                         components[1] = components[1].replace(/\D/g, "").replace(/^\d{3}$/,
                              "");
                    }

                    if (components.join(".") != "") return components.join(".");
                    else return "";
               }
          });
     });

     function _print() {
          var st_date = moment($('#start_date').val()).format("YYYY-MM-DD")
          var end_date = moment($('#end_date').val()).format("YYYY-MM-DD")
          window.open('print.php?st_date=' + st_date + '&end_date=' + end_date, '_blank');
     }
     </script>
</body>

</html>