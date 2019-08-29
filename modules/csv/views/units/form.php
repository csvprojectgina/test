
<style media="screen">
/*body { padding-top:20px; }*/
.panel-body .btn:not(.btn-block) {margin-bottom:10px; }
.btn-group>.btn:last-child:not(:first-child), .btn-group>.dropdown-toggle:not(:first-child) {  font-size: 23px;}
.btn-default{padding: 5px;}
</style>


<?php
$id = isset($id) ? $id : 0;
?>
<form class="form-horizontal f_save" role="form" method="post" id="f_save" >
    <div class="panel panel-default ">
        <div class="panel-heading">
            <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/new.gif') ?>" />--> <?= t('បញ្ចូលអង្គភាពថ្មី') ?></h3>
            <input type="hidden" name="id" id="id" class="id" value="<?= $id ?>" />
        </div>
        <div class="panel-body ">

                <!-- personal info. -->
                <div class="col-sm-12">
                        <div class="modal-body">
                          <div class="bs-example">
                                <div class="form-group">
                                    <label for="inputEmail">បញ្ជូលអង្គភាព</label>
                                    <input type="text" class="form-control" name="unit" id="inputEmail" placeholder="បញ្ជូលអង្គភាព" value="<?php echo @$row->unit; ?>">
                                    <input type="hidden" name="id" value="<?php echo @$row->id; ?>">
                                </div>

                                <div class="row">
                                  <div class="col-md-9 col-sm-9">

                                  </div>
                                  <div class="col-md-3 text-right  col-sm-3" style="padding:0px;">
                                    <div class="btn-group  btn-group-lg">
                                      <button class="btn btn-default " id="btnsave" type="submit"> <i class="glyphicon glyphicon-save"></i> រក្សាទុក</button>
                                      <button type="button" class="btn btn-default" id="back"> <i class=" glyphicon glyphicon-arrow-left"></i> </button>
                                    </div>
                                  </div>
                                </div>
                        </div>
                        </div>
                    </div>

            </div><!-- tabs ------------------->
        </div><!-- f. body ------------------>

    </div>
</form>

<!-- js -->
<script type="text/javascript">
    $(function() {

        $('#back').on('click', function() {
            window.location = 'javascript:history.go(-1)';
            // window.location = 'javascript:history.back(-1)';
        });
        // save unit===============
        $("#f_save").on('submit', function(e) {
            e.preventDefault();
//            return false;
            $.ajax({
                url: "<?= site_url('csv/csv_units/insert_unit') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function() {
                    $('.xmodal').html('<div style="position: relative;top: 50%;left: 51%;font-family:khmer mef1;font-size:16px;color:red;">កំពុងតែបញ្ចូល......</div>');
                    $('.xmodal').show();
//                    $('.ximage').show();
                    window.location = 'javascript:history.go(-1)';
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    var id = data.id - 0;
                    var records_d = data.re_d;
                    var records_t = data.re_t;
                    if (id > 0) {
                        $('#id').val(id);
                    }
                    $('.xmodal').hide();
                },
                error: function() {
                }
            }); // ajax ========
        });


        list_salary();
    }); // ready f. =============

</script>
<style>
    .ui-tabs-vertical { width: 79.2em; }
    .ui-autocomplete {
        position: absolute;
        z-index: 1060;

    }

    .btncolor1{
        background-color: hsl(0, 0%, 80%) !important;
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#e5e5e5", endColorstr="#cccccc");
        background-image: -khtml-gradient(linear, left top, left bottom, from(#e5e5e5), to(#cccccc));
        background-image: -moz-linear-gradient(top, #e5e5e5, #cccccc);
        background-image: -ms-linear-gradient(top, #e5e5e5, #cccccc);
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #e5e5e5), color-stop(100%, #cccccc));
        background-image: -webkit-linear-gradient(top, #e5e5e5, #cccccc);
        background-image: -o-linear-gradient(top, #e5e5e5, #cccccc);
        background-image: linear-gradient(#e5e5e5, #cccccc);
        border-color: #cccccc #cccccc hsl(0, 0%, 77.5%);
        color: #333 !important;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.16);
        -webkit-font-smoothing: antialiased;
    }
    .btncolor{
        background-color: hsl(0, 0%, 78%) !important;
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#f9f9f9", endColorstr="#c6c6c6");
        background-image: -khtml-gradient(linear, left top, left bottom, from(#f9f9f9), to(#c6c6c6));
        background-image: -moz-linear-gradient(top, #f9f9f9, #c6c6c6);
        background-image: -ms-linear-gradient(top, #f9f9f9, #c6c6c6);
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f9f9f9), color-stop(100%, #c6c6c6));
        background-image: -webkit-linear-gradient(top, #f9f9f9, #c6c6c6);
        background-image: -o-linear-gradient(top, #f9f9f9, #c6c6c6);
        background-image: linear-gradient(#f9f9f9, #c6c6c6);
        border-color: #c6c6c6 #c6c6c6 hsl(0, 0%, 73%);
        color: #333 !important;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.33);
        -webkit-font-smoothing: antialiased;
    }
    #photo:hover{background: blue; position: absolute;}
</style>
