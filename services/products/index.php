<!doctype html>
<html lang="en" ng-app="app" ng-controller="controller" ng-init="_callProducts();_callCategory();">

<head>
     <!-- Required meta tags -->
     <?php include('../../components/lib/lib.php')?>
     <?php include('../../access/access.php')?>
     <?php _active('.settings')?>
</head>

<body>
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
                         <li class="breadcrumb-item active">ຂໍ້ມູນຄອສ໌</li>
                    </ol>
               </div>
               <!-- Page header end -->
               <!-- Main container start -->
               <div class="main-container">
                    <div class="row">
                         <div class="col-md-3 col-12">
                              <div class="blog p-3">
                                   <form action="#" id="insert_data" method="post" enctype="multipart/form-data">
                                        <h4><i class="fa fa-align-left"></i> <span ng-bind="form_title"></span></h4>
                                        <hr>
                                        <div class="form-group">
                                             <div class="user-profile text-center">
                                                  <div class="image">
                                                       <div class="dropbox">
                                                            <input type="file" name="pro_img" ng-model="por_img"
                                                                 onchange="readURL(this);" id="file-5"
                                                                 class="hidden inputfile inputfile-4"
                                                                 data-multiple-caption="{count} files selected" multiple
                                                                 style="display: none!important" />
                                                            <label for="file-5">
                                                                 <img src="../../img/{{pro_img ? pro_img :'photo.jpg'}}"
                                                                      id="preview"
                                                                      style="width:150px;height:130px;margin-bottom:15px" />
                                                                 <span class="btn btn-success btn-block btn-sm">
                                                                      <i class="icon-link1"></i>
                                                                      ເລືອກຮູບ</span>
                                                            </label>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="">ປະເພດຄອສ໌ <?php isVal()?></label>
                                             <select ng-model="pro_cate_id" name="pro_cate_id" id="pro_cate_id"
                                                  class="form-control">
                                                  <option value="">-- ເລືອກ --</option>
                                                  <option value={{i.cate_id}} ng-repeat="i in _categorys">
                                                       {{i.cate_title}}
                                                  </option>
                                             </select>
                                        </div>

                                        <div class="form-group">
                                             <label for="">ຊື່ຄອສ໌ <?php isVal()?></label>
                                             <input type="text" class="form-control" name="pro_id" ng-model="pro_id"
                                                  style="display:none">
                                             <input type="text" class="form-control" name="pro_title"
                                                  ng-model="pro_title" id="pro_title" placeholder="ກະລຸນາປ້ອນຊື່ຄອສ໌">
                                        </div>
                                        <div class="form-group">
                                             <label for="">ລາຄາ/ຄອສ໌ <?php isVal()?></label>
                                             <input type="text" class="form-control text-right"
                                                  ng-model="price_for_course" id="price_for_course"
                                                  name="price_for_course" placeholder="00">
                                        </div>
                                        <div class="form-group">
                                             <label for="">ຈຳນວນຄັ້ງ/ຄອສ໌ <?php isVal()?></label>
                                             <input type="text" class="form-control text-right" name="pro_qty"
                                                  id="pro_qty" ng-model="pro_qty" placeholder="0">
                                        </div>
                                        <div class="form-group">
                                             <label for="">ລາຄາ/ຄັ້ງ <?php isVal()?></label>
                                             <input type="text" class="form-control  text-right" id="price_for_time"
                                                  name="price_for_time" ng-model="price_for_time" placeholder="00">
                                        </div>
                                        <div class="form-group">
                                             <label for="">ໝາຍເຫດ</label>
                                             <textarea rows="3" class="form-control" id="pro_note" name="pro_note"
                                                  ng-model="pro_note" placeholder="ກະລຸນາປ້ອນໝາຍເຫດ"></textarea>
                                        </div>
                                        <div class="form-group">
                                             <button type="submit" class="btn btn-outline-primary">
                                                  <i class="fa fa-check-circle"></i>
                                                  <span ng-bind='btnName'"></span>
                                                </button>
                                         <button type=" button" ng-click="_clear()" class="btn btn-outline-danger">
                                                       <i class="fa fa-times-circle"></i> ຍົກເລີກ
                                             </button>
                                        </div>
                              </div>
                              </form>
                         </div>
                         <div class="col-md-9 col-12">
                              <div class="blog p-3">
                                   <h4><i class="fa fa-list"></i> ລາຍການຄອສ໌</h4>
                                   <hr>
                                   <div class="table-responsice">
                                        <table datatable="ng" dt-option="vm.dtOption"
                                             class="table table-hover table-sm">
                                             <thead>
                                                  <tr>
                                                       <th>#</th>
                                                       <th>ລາຍການ</th>
                                                       <th>ລາຄາ/ຄອສ໌</th>
                                                       <th>ຈຳນວນຄັ້ງ/ຄອສ໌</th>
                                                       <th>ລາຄາ/ຄັ້ງ</th>
                                                       <th>ໝາຍເຫດ</th>
                                                       <th>ລົງວັນທີ</th>
                                                       <th>ລົງໂດຍ</th>
                                                       <th></th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr ng-repeat="x in _products" ng-click="_onUpdate(x)"
                                                       style="cursor:pointer">
                                                       <td ng-bind='$index+1'></td>
                                                       <td ng-bind='x.pro_title'></td>
                                                       <td class="text-right" ng-bind='x.price_for_course | number'>
                                                       </td>
                                                       <td class="text-right" ng-bind='x.pro_qty | number'></td>
                                                       <td class="text-right" ng-bind='x.price_for_time | number'></td>
                                                       <td ng-bind='x.pro_note'></td>
                                                       <td ng-bind='x.pro_createdAt'></td>
                                                       <td ng-bind='x.user_fname'></td>
                                                       <td>
                                                            <div class="btn-group float-right">
                                                                 <button type="button" ng-click="_onUpdate(x)"
                                                                      class="btn btn-outline-primary"><i
                                                                           class="fa fa-pencil"></i></button>
                                                                 <button type="button" ng-click="_onDelete(x.pro_id)"
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
     $("#price_for_course,#pro_qty,#price_for_time").on("keyup click change paste input", function(event) {
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
     </script>
</body>

</html>