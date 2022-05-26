@extends('layout.app')
@section('content')

<div class="card card-rounded">
    <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-start">
          <div>
           <h4 class="card-title card-title-dash">Performance Line Chart</h4>
           <h5 class="card-subtitle card-subtitle-dash">Lorem Ipsum is simply dummy text of the printing</h5>
          </div>
          <div id="performance-line-legend"><div class="chartjs-legend"><ul><li><span style="background-color:#1F3BB3"></span>This week</li><li><span style="background-color:#52CDFF"></span>Last week</li></ul></div></div>
        </div>
        <div class="chartjs-wrapper mt-5"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <canvas id="performaneLine" style="display: block; width: 1003px; height: 150px;" width="1003" height="150" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
      <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>

@endsection
