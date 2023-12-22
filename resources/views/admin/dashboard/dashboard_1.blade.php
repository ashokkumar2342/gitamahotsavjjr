@extends('admin.layout.base')
@section('body')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><strong>Dashboard</strong></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><h1><strong style="color:red"></strong></h1></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card card-info"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('admin.send.question') }}" title=""><button type="" class="btn btn-success">Send Question</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 
@push('scripts')
<script type="text/javascript">
    
</script>

@endpush