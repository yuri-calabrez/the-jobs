@extends('layouts.app')

@section('content')
    <div class="site-header size-sm"></div>

    <div class="container">
       <div class="row">
           <div class="col-md-9 col-xs-12">
               <header class="section-reader">
                   <h2 class="text-center">Jobs recentes</h2>
               </header>
               <div class="item-blocks-connected">
                   <!-- Job item -->
                   <div class="col-xs-12">
                       <a class="item-block" href="#">
                           <header>
                               <img src="{{asset('images/logo-google.jpg')}}" alt="">
                               <div class="hgroup">
                                   <h4>Senior front-end developer</h4>
                                   <h5>Google</h5>
                               </div>
                               <div class="header-meta">
                                   <span class="location">Menlo park, CA</span>
                                   <span class="label label-success">Full-time</span>
                               </div>
                           </header>
                       </a>
                   </div>
                   <!-- END Job item -->
               </div>
           </div>

           <div class="col-md-3 col-xs-12">
               <div class="panel panel-default">
                   <div class="panel-header">
                       <p class="lead text-center text-bold">Candidatura</p>
                   </div>
                   <div class="panel-body">
                       <p class="lead">13</p>
                   </div>
               </div>

           </div>
       </div>
    </div>

@endsection