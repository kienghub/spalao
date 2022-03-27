<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <?php include('../../components/lib/lib.php') ?>
     <?php include('../../access/access.php') ?>
</head>

<body ng-app="app" ng-controller="package" ng-init="_callPackage();_callProduct();pro_title=''">
     <div class="row">
          <div class="col-md-12">
               <div class="blog p-3">
                    <div class="form-group">
                         <label for="">ປະເພດຄອສ໌ <?php isVal() ?> </label>
                         <select class="form-control" ng-model="cate_id" ng-change="_cateSelected()">
                              <option value="">ເລືອກປະເພດຄອສ໌</option>
                              <?php
                              $callCategory = mysqli_query($con, "SELECT*FROM spa_category");
                              foreach ($callCategory as $key) { ?>
                                   <option value="<?php echo $key['cate_id'] ?>">
                                        <?php echo $key['cate_title'] ?></option>
                              <?php } ?>
                         </select>
                    </div>
                    <div class="form-group">
                         <label for="">ລາຍການຄອສ໌ <?php isVal() ?> </label>
                         <input type="hidden" ng-model="_id">
                         <select class="form-control" ng-model="pro_id">
                              <option value="{{pro_id}}">{{pro_title?pro_title:'ເລືອກລາຍການຄອສ໌'}}
                              </option>
                              <option ng-repeat="x in _product" value={{x.pro_id}} ng-bind="x.pro_title">
                              </option>
                         </select>
                    </div>
                    <div class="form-group">
                         <label for="">ຊື່ແພັກເກັຈ <?php isVal() ?></label>
                         <input type="text" class="form-control" ng-model="package_name" placeholder="ກະລຸນາປ້ອນຊື່ແພັກເກັຈ">
                    </div>
                    <div class="form-group">
                         <label for="">ປະເພດ <?php isVal() ?></label>
                         <select class="form-control" ng-model="package_type">
                              <option value="">ເລືອກປະເພດ</option>
                              <option value="0">ເປັນຄອສ໌</option>
                              <option value="1">ເປັນລາຍການ</option>
                         </select>
                    </div>
                    <div class="form-group">
                         <label for="">ລາຄາແພັກເກັຈ <?php isVal() ?></label>
                         <input type="text" class="form-control text-right" ng-model="package_price" id="package_price" placeholder="00">
                    </div>
                    <div class="form-group">
                         <label for="">ຈຳນວນຄັ້ງ <?php isVal() ?></label>
                         <input type="text" class="form-control text-right" ng-model="package_qty" id="package_qty" placeholder="00">
                    </div>
                    <div class="form-group">
                         <label for="">ລາຍລະອຽດ</label>
                         <textarea rows="3" class="form-control" ng-model="note" placeholder="ກະລຸນາປ້ອນລາຍລະອຽດ"></textarea>
                    </div>
                    <div class="form-group">
<?php echo $_GET['id'] ?>
                         <button type="button" ng-click="_onSave()" class="btn btn-outline-primary">
                              <i class="fa fa-check-circle"></i>
                              <span ng-bind='btnName'"></span>
                                        </button>
                                    <button type=" button" ng-click="_reset()" class="btn btn-outline-danger">
                                   <i class="fa fa-times-circle"></i> ຍົກເລີກ
                         </button>
                    </div>
               </div>
          </div>

     </div>
     <!-- Page wrapper end -->
     <?php include('../../components/lib/script.php') ?>
     <script src="app.js"></script>
     <script>
          $("#package_price,#package_qty").on("keyup click change paste input", function(event) {
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

          // setTimeout(() => {
          //      var index = parent.layer.getFrameIndex(window.name);
          //      parent.layer.close(index);
          // }, 5000);
     </script>
</body>

</html>