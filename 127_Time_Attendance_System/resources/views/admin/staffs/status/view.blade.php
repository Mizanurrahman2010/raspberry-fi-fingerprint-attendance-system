@extends('layouts.admin')

@section('content')
<!-- begin #content -->
<div id="content" class="content staff_status">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Status <small>View Status</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-8 -->
        <div class="col-md-6">
            <!-- start: registration -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">View Status</h4>
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" name="" class="form-horizontal">
                        <div id="">

                            <!-- begin wizard step-1 -->
                            <div class="step-1">

                            </div>
                            <fieldset>
                                <legend class="pull-left width-full">View Status</legend>
                                <!-- begin row -->
                                <div class="row">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="name" class="col-md-4 control-label">Status Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{$staff_status->name}}" required disabled="disabled">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="col-md-4 control-label">Status</label>

                                        <div class="col-md-6">
                                            <select class="form-control" name="status" required disabled="disabled">
                                                <option value="1" <?php echo $staff_status->status ? "selected=selected" : ""; ?> >Enable</option>
                                                <option value="0" <?php echo !$staff_status->status ? "selected=selected" : ""; ?> >Disable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">
                                        <a href="{{ url("/admin/staffs/status/$staff_status->id/update") }}" class="btn btn-primary"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Update </a>
                                        <button type="button" class="btn btn-danger btn_delete" data-id="{{$staff_status->id}}"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Delete </button>
                                    </div>

                                </div>
                                <!-- end row -->
                            </fieldset>
                            <!-- end wizard step-1 -->

                            <!-- #modal-alert -->
                            <div class="modal fade" id="modal-alert">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Status View</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success m-b-0">
                                                <h4><i class="fa fa-info-circle"></i> Successfully Status View</h4>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="javascript:;" class="btn btn-sm btn-success" data-dismiss="modal">Done</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end: registration -->
        </div>


    </div>
    <!-- end row -->
</div>
<!-- end #content -->
<!-- start : Department update -->
<script>
    $(document).ready(function() {

        /*
         * Start : Delete
         *
         * */
        $(".staff_status").on('click','.btn_delete',function()
        {
            var _token                  = $("input[name=_token]").val();

            var info = {

                _token                  : _token,
            };

            request.method   = "POST"                                                     ;
            request.route    = 'admin/staffs/status/'+$(this).attr("data-id")+'/delete'   ;
            request.action   = ''                                                         ;
            request.data     = info                                                       ;
            request.sync     = true                                                       ;

            var response = ajaxapp.request('$("#modal-alert").modal("show");', '');
            //setTimeout(function(){ FPS_StatusGetCon = true; FPS_Status() },1000);
        });

        /*
         * end : Delete
         *
         * 
         * */
    });
</script>
<!-- end : Department update -->

@endsection
