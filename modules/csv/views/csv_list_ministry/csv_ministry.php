<div class="panel panel-default">    <div class="panel-heading thumbnail btn-group">        <h3 class="panel-title">បញ្ជីរាយនាមឈ្មោះក្រសួង</h3>    </div>    <div class="panel-body">        <!--            <SPAN ID="BTN-POST" CLASS="BTN BTN-INFO">TEST</SPAN>-->        <table cellpadding="0" cellspacing="0" border="1"               class="table table-hover table-striped table-bordered dt-responsive nowrap" id="my_gr"               data-name="cool-table">            <thead>            <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">                <th style="text-align: center; width: 1000px; vertical-align: middle;">ឈ្មោះក្រសួង</th>                <th style="text-align: center; width: 130px; vertical-align: middle;">សកម្មភាព</th>            </tr>            </thead>            <tbody>            </tbody>            <tfoot>            </tfoot>        </table>    </div></div><form class="form-horizontal"  role="form" id="frm-ministry">    <div class="panel-group" style=" margin-bottom: 30px">        <div class="panel panel-info">            <div class="panel-heading">                <h3 class="panel-title">                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseone" style="color: #797979 !important; margin-left: -13px; margin-top: 3px;" class="collapsed">ទំរង់ការបញ្ចូលឈ្មោះក្រសួង</a>                </h3>            </div>            <div class="panel-collapse collapse" id="collapseone">                <div class="panel panel-default">                    <div class="panel-body">                        <form method="post" id="frm-dignitaries" role="form" enctype="multipart/form-data">                            <div class="col-lg-12 col-md-12 form-horizontal">                                <div class="form-group">                                    <label class="col-lg-2 col-md-2 text-right">បញ្ចូលឈ្មោះក្រសួង</label>                                    <div class="col-sm-6 col-md-6">                                        <input type="text" class="form-control" id="name" name="name"/>                                    </div>                                </div>                                <div class="form-group">                                    <label class="col-lg-2 col-md-2 text-right"></label>                                    <div class="col-lg-10 col-md-10">                                        <button class="btn btn-primary" id="btn-submit" type="submit">រក្សាទុក</button>                                    </div>                                </div>                            </div>                        </form>                    </div>                </div>            </div>        </div>    </div></form><script>        $('#frm-ministry').on('submit', function () {            // var name = $('#name').val();            //e.preventDefault();            $.ajax({                type: 'post',                url: '<?= site_url('csv/csv_list_ministry/save_ministry') ?>',                datatype: 'json',                data: new FormData(this),                processData: false,                contentType: false,                cache: false,                async: false,                beforeSend: function () {                    // alert($('#frm-ministry').serialize());                    $('.xmodal').show();                },                success: function (data) {                    $('.xmodal').hide();                    if (data.status === 'success') {                        swal({                            text: "ការបញ្ចូលឈ្មោះក្រសួង ត្រូវបានរក្សាទុកដោយជោគជ័យ",                            type: 'success',                            showCancelButton: false,                            showConfirmButton: false,                            allowOutsideClick: false,                            closeOnClickOutside: false                        });                        setTimeout(function () {                            window.location.href = "<?php echo site_url('csv/csv_units_dignitaries/csv_ministry/')   ?>";                        }, 2500);                    }                }            });        });        $(function () {            $.ajax({                url: '<?= site_url('csv/csv_list_ministry/get_ministry') ?>',                type: 'post',                datatype: 'json',                beforeSend: function () {                    $('.xmodal').show();                },                data: {},                success: function (data) {                    var record = data;                    var tr = '';                    if (record.length > 0) {                        $.each(record, function (i, row) {                            tr += "<tr data-id='" + row.id + "'class='editor' target='_parent' >" +                                //"<td>" <?php //echo $item [?>//"+ row.parent + "<?php //] ?>//"</td>" +                                "<td>" + row.name_ministry + "</td>" +                                "<td style='text-align: center;'>" +                                "<a href='javascript: void(0)' data-id=" + row.id +                                " class='delete'>លុប/</a>" +                                "<a href='javascript: void(0)' data-id=" + row.id +                                " class='edit'>កែរបន្ថែម</a>" +                                "</td>" +                                "</tr>";                        });                        $('#my_gr tbody').html(tr);                    }                    else {                        tr += "<tr>" +                            "<td colspan='9' style='text-align: center;'>អត់មានទិន្ន័យ!</td>" +                            "</tr>";                        $('#my_gr tbody').html(tr);                    }                    $('.xmodal').hide();                }            });        });        //edit ==========        $("body").delegate("#my_gr tbody tr", "click", function () {            var id = $(this).data('id');            // alert(id);            if (id > 0){                window.location = "<?= site_url('csv/csv_list_ministry/edit')  ?>/" + id;            }        });        // delete ==========        $('body').delegate(".delete", "click", function (e) {            var id = $(this).data('id');            // alert(id)            var tr = $(this).parent().parent();            if(id>0){                swal({                    title: 'តើពិតជាប្រាកដ រឺ អត់ ?',                    text: "តើលោក អ្នកពិតជាលុបឈ្មោះក្រសួងនេះមែនទេ?",                    type: 'warning',                    showCancelButton: true,                    confirmButtonText: 'យល់ព្រម',                    cancelButtonText: 'ទេ',                    showLoaderOnConfirm: true,                    preConfirm: function () {                        return new Promise(function (resolve) {                            $.ajax({                                url: '<?= site_url('csv/csv_list_ministry/delete')?>',                                type: "post",                                dataType: "json",                                datatype: 'html',                                data: {id: id},                                cache: false                            }).done(function (data) {                                if (data.status) {                                    swal({                                        title: 'ដោយជោគជ័យ ',                                        text: 'ការលុបឈ្មោះក្រសួង ត្រូវបានដោយជោគជ័យ',                                        type: 'success',                                        allowOutsideClick: false                                    });                                    setTimeout(function () {                                        window.location.href = "<?php echo site_url('csv/csv_list_ministry/csv_ministry/') ?>/";                                    }, 2000);                                }                            }).fail(function () {                                swal('វោហ៍...', 'មានអ្វីខុស សូមឆែកម្តងទៀត', 'error');                            });                        });                    },                    allowOutsideClick: false                });            }            return false;        });</script>