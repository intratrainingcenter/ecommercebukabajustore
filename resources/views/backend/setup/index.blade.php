@extends('backend.setup.master')
@extends('backend.setup.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <section id="cd-timeline" class="cd-container">
                                <div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-success">
                                        <i class="mdi mdi-adjust"></i>
                                    </div> <!-- cd-timeline-img -->
                                    <div class="cd-timeline-content">
                                        <h3>Welcome To Setup Application</h3>
                                        <p class="mb-0 text-muted font-14">Setup application before operating the application.</p>
                                    </div> <!-- cd-timeline-content -->
                                </div> <!-- cd-timeline-block -->
                                <div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-danger">
                                        <i class="mdi mdi-adjust"></i>
                                    </div> <!-- cd-timeline-img -->

                                    <div class="cd-timeline-content">
                                        <h3>Setting Data Application </h3>
                                      @include('backend.setup.formsetup')
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->
                        </section> <!-- cd-timeline -->
                    </div>
                </div><!-- Row -->
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
</div><!-- container-fluid -->
@endsection