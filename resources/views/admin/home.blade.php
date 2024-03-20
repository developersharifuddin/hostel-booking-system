 @extends('layouts.admin')

 @section('title', 'Dashboard')
 @section('page-headder')
 {{-- Categories --}}
 @endsection
 @section('content')
 <div class="row">

     <div class="col-lg-3 col-6">
         <div class="info-box bg-white">
             <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

             <div class="info-box-content">
                 <span class="info-box-text">Bookmarks</span>
                 <span class="info-box-number">41,410</span>

                 <div class="progress">
                     <div class="progress-bar" style="width: 70%"></div>
                 </div>
                 <span class="progress-description">
                     70% Increase in 30 Days
                 </span>
             </div>
             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
     <!-- /.col -->
     <div class="col-lg-3 col-6">
         <div class="info-box bg-white">
             <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

             <div class="info-box-content">
                 <span class="info-box-text">Likes</span>
                 <span class="info-box-number">41,410</span>

                 <div class="progress">
                     <div class="progress-bar" style="width: 70%"></div>
                 </div>
                 <span class="progress-description">
                     70% Increase in 30 Days
                 </span>
             </div>
             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
     <!-- /.col -->
     <div class="col-lg-3 col-6">
         <div class="info-box bg-white">
             <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

             <div class="info-box-content">
                 <span class="info-box-text">Events</span>
                 <span class="info-box-number">41,410</span>

                 <div class="progress">
                     <div class="progress-bar" style="width: 70%"></div>
                 </div>
                 <span class="progress-description">
                     70% Increase in 30 Days
                 </span>
             </div>
             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
     <!-- /.col -->
     <div class="col-lg-3 col-6">
         <div class="info-box bg-white">
             <span class="info-box-icon"><i class="fas fa-comments"></i></span>

             <div class="info-box-content">
                 <span class="info-box-text">Comments</span>
                 <span class="info-box-number">41,410</span>

                 <div class="progress">
                     <div class="progress-bar" style="width: 70%"></div>
                 </div>
                 <span class="progress-description">
                     70% Increase in 30 Days
                 </span>
             </div>
             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
     <!-- /.col -->

     <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-white">
             <div class="inner">
                 <h3>150</h3>

                 <p>New Orders</p>
             </div>
             <div class="icon">
                 <i class="ion ion-bag"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-white">
             <div class="inner">
                 <h3>53<sup style="font-size: 20px">%</sup></h3>

                 <p>Bounce Rate</p>
             </div>
             <div class="icon">
                 <i class="ion ion-stats-bars"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-white">
             <div class="inner">
                 <h3>44</h3>

                 <p>User Registrations</p>
             </div>
             <div class="icon">
                 <i class="ion ion-person-add"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-white">
             <div class="inner">
                 <h3>65</h3>

                 <p>Unique Visitors</p>
             </div>
             <div class="icon">
                 <i class="ion ion-pie-graph"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
     </div>
     <!-- ./col -->
 </div>
 <!-- /.row -->

 <!-- /.row (main row) -->
 @endsection


 @push('.js')

 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <!-- ChartJS -->
 <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script>
 <script src="{{ asset('backend/dist/js/pages/dashboard3.js') }}"></script>
 @endpush
