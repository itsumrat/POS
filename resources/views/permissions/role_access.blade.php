@extends('layouts.app_back')
@section('styles')

<link rel="stylesheet" href="{{ asset('/assets/css/fontawesome-free/css/all.min.css') }}">


    <style>
        .parent_ul, .child_ul {
            margin-left: 15px;
        }

        .child_ul {
            margin-left: 35px;
        }

        .parent_ul .fas, .child_ul .fas {
            float: left;
            padding: 4px;
        }

        

        .child_ul li{
            margin-bottom: 5px;
        }

        .child_ul .action, .parent_ul .action {
            margin-bottom: 0;
            float: left;
            margin-right: 6px;
        }



        
    </style>
  
@endsection
@section('scripts')

@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                <div class="col-md-12">
                    <select name="" id="">
                        <option value=""></option>
                    </select>
                </div>

                <hr>


                <div class="col-md-12">
                    <ul class="parent_ul">
                         <li><i class="fas fa-plus"></i></i> <input type="checkbox" id="" class="action"> Menu
                            <ul class="child_ul">
                                <li><input type="checkbox" id="" class="action"> View</li>
                                <li><input type="checkbox" id="" class="action"> Add</li>
                                <li><input type="checkbox" id="" class="action"> Edit</li>
                                <li><input type="checkbox" id="" class="action"> Delete</li>
                            </ul>
                        </li>

                         <li><i class="fas fa-minus"></i> <input type="checkbox" id="" class="action"> Permission
                            <ul class="child_ul">
                                <li><input type="checkbox" id="" class="action"> View</li>
                                <li><input type="checkbox" id="" class="action"> Add</li>
                                <li><input type="checkbox" id="" class="action"> Edit</li>
                                <li><input type="checkbox" id="" class="action"> Delete</li>
                            </ul>
                        </li>
                    </ul>
                    
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection