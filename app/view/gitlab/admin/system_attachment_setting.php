<!DOCTYPE html>
<html class="" lang="en">
<head  >

    <? require_once VIEW_PATH.'gitlab/common/header/include.php';?>
    <script src="<?=ROOT_URL?>dev/js/admin/setting.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?=ROOT_URL?>dev/lib/handlebars-v4.0.10.js" type="text/javascript" charset="utf-8"></script>

</head>
<body class="" data-group="" data-page="projects:issues:index" data-project="xphp">
<? require_once VIEW_PATH.'gitlab/common/body/script.php';?>

<section class="has-sidebar page-layout max-sidebar">
    <? require_once VIEW_PATH . 'gitlab/common/body/page-left.php'; ?>
    <div class="page-layout page-content-body system-page">
<? require_once VIEW_PATH.'gitlab/common/body/header-content.php';?>

<script>
    var findFileURL = "";
</script>
<div class="page-with-sidebar">

    <? require_once VIEW_PATH.'gitlab/admin/common-page-nav-admin.php';?>

    <div class="content-wrapper page-with-layout-nav page-with-sub-nav">
        <div class="alert-wrapper">

            <div class="flash-container flash-container-page">
            </div>

        </div>
        <div class="container-fluid">

            <div class="content" id="content-body">

                <?php include VIEW_PATH.'gitlab/admin/common_system_left_nav.php';?>
                <div class="row has-side-margin-left">
                    <div class="col-lg-12">
                        <div class="top-area">
                            <ul class="nav-links">
                                <li class="active">
                                    <a href="#">附件</a>
                                </li>
                                <li>
                                    <span class="hint">为了用户能够上传附件，确保其在该项目中有、添加附件、权限。</span>
                                </li>
                            </ul>
                            <div class="nav-controls">
                                <div class="btn-group" role="group">
                                    <a class="hidden-xs hidden-sm btn btn-grouped issuable-edit" data-target="#modal-edit_attachment" data-toggle="modal" href="#modal-edit_attachment">
                                        <i class="fa fa-edit"></i> 修改
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="content-list">
                            <div class="table-holder">
                            <table class="table">
                                <tbody id="tbody_id">

                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal" id="modal-edit_attachment">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal" href="#">×</a>
                            <h3 class="modal-header-title">修改附件设置</h3>
                        </div>
                        <div class="modal-body">
                            <form class="js-quick-submit js-upload-blob-form form-horizontal"   action="<?=ROOT_URL?>admin/system/basic_setting_update"   accept-charset="UTF-8" method="post">
                                <div id="form_id">

                                </div>

                                <div class="form-actions modal-footer">
                                <button name="submit" type="button" class="btn btn-save js-key-enter" id="submit-all">保存</button>
                                <a class="btn btn-cancel" data-dismiss="modal" href="#">取消</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

    </div>
</section>


<script type="text/html"  id="settings_tpl">
    {{#settings}}
    <tr class="commit">
        <td>
            <div class="branch-commit">
                <strong>
                    {{title}}:
                </strong>
                <span class="hint">{{description}}</span>
            </div>
        </td>
        <td> {{text}}  </td>
        <td> </td>
    </tr>
    {{/settings}}
</script>
<script type="text/html"  id="settings_form_tpl">
    {{#settings}}
    <div class="form-group">
        <label class="control-label" for="date_format">{{title}}:</label>
        <div class="col-sm-5">
            <div class="form-group">
                {{#if_eq form_input_type 'text'}}
                <input type="text" class="form-control" name="params[{{_key}}]" id="id_{{_key}}"  value="{{_value}}" />
                {{/if_eq}}
                {{#if_eq form_input_type 'radio'}}
                <div class="display-flex">
                    {{#each form_optional_value }}
                    <div class="radio prepend-left-10">
                        <label>
                            <input type="radio" value="{{@key}}" checked="checked" name="params[{{../_key}}]" id="id_{{../_key}}">
                            {{this}}
                        </label>
                    </div>
                    {{/each}}
                </div>
                {{/if_eq}}
            </div>
        </div>
    </div>

    {{/settings}}

</script>


<script type="text/javascript">

    $(function() {
        fetchSetting('/admin/system/setting_fetch','attachment','settings_tpl','tbody_id');
        fetchSetting('/admin/system/setting_fetch','attachment','settings_form_tpl', 'form_id');

    });

</script>



</body>
</html>


</div>