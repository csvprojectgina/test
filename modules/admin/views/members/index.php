<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" /> <?= t('ស្វែងរកព័ត៌មានសមាជិក') ?></h3>
        </div>

        <div class="panel-body">        
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th  style="text-align: center;"><?= t('អ្នក​ប្រើប្រាស់') ?></th>
                        <th width="25%"  style="text-align: center;"><?= t('នាម និង​គោត្ត​នាម') ?></th>
                        <th width="25%"  style="text-align: center;"><?= t('អ៊ីមែល') ?></th>
                        <th width="25%"  style="text-align: center;"><?= t('លេខ​ទូរ​ស័ព្ទ') ?></th>
                        <th width="120"  style="text-align: center;"><a href="<?= site_url('admin/members/form') ?>"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូលថ្មី') ?></a></th>            
                    </tr>
                </thead>
                <tbody>
                <td colspan="5" class="dataTables_empty"><?= t('កំពុងទាញព័ត៌មានពី server !') ?></td>
                </tbody>
            </table>
        </div>
    </div>
</form>

<script>
    /* Table initialisation */
    var oTable;
    $(document).ready(function() {
        /* Init the table */
        oTable = $('#example').dataTable({
            "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ កំណត់ត្រាក្នុងមួយទំព័រ"
            },
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?= site_url('admin/members/grid') ?>"
        });

        $("body").delegate(".editor_edit", 'click', function(e) {
            var tr = $(this).parent().parent();
            var id = tr.attr('id') - 0;
            var eid = simple_encrypt(id);
            window.location = '<?= site_url('admin/members/edit') ?>/' + encodeURIComponent(eid);
        });

        $("body").delegate(".editor_remove", 'click', function(e) {
            if (confirm('<?= t('Are you sure?') ?>')) {
                var tr = $(this).parent().parent();
                var id = tr.attr('id') - 0;
                var eid = simple_encrypt(id);
                window.location = '<?= site_url('admin/members/delete') ?>/' + encodeURIComponent(eid);
            }
        });

    });

    /* Get the rows which are currently selected */
    function fnGetSelected(oTableLocal)
    {
        return oTableLocal.$('tr.row_selected');
    }
</script>