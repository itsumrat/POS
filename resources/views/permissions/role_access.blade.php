@extends('layouts.app_back')
@section('styles')

<link rel="stylesheet" href="{{ asset('/assets/css/fontawesome-free/css/all.min.css') }}">


    <style>
        .parent_ul, .child_ul {
            margin-left: 15px;
        }

        .parent_ul li {
            float: left;
            width: 100%;
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

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Permission') }}</div>

            <div class="card-body">
                <form method="post" action="" id="access">
                    @csrf
                
                <div class="col-md-12">
                    <select name="role_id" id="role_id" class="role_id" required>
                        <option value="">Select Role</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                        
                    </select>
                </div>

                <hr>


                <div class="col-md-12">
                    <ul class="parent_ul">
                        @foreach ($menus as $menu)
                            <li><i class="fas fa-plus"></i></i> <input type="checkbox" id="" name="menu_id[]" value="{{ $menu->id }}" class="parant_id {{ $menu->id }}"> {{ $menu->name }}
                                <ul class="child_ul" style="display: none;">
                                    @foreach ($menu->roleActions as $action)
                                        <li><input type="checkbox" name="action[{{ $menu->id }}][]" value="{{ $action->actinonName->id }}" id="" class="child_id_{{ $menu->id }} child_id {{ $menu->id }}_{{ $action->actinonName->id }}" data-parant_id="{{ $menu->id }}"> {{ $action->actinonName->name }}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach


                       
                           
                        <li><input type="checkbox" checked name="exit" value="1" id=""> It will effect exits users</li>
                                
                    </ul>
                    
                </div>


                <button type="sumit" class="btn btn-primary btn-sm access">Update</button>

            </form>
                
            </div>
        </div>
    </div>
</div>

@section('scripts')

    <script>

        // All check function goes here
        $(document).on('click', '.parant_id', function(){
            if($(this).is(":checked")){
                $('.child_id_'+$(this).val()).prop("checked", true);
            }else{
                $('.child_id_'+$(this).val()).prop("checked", false);
            }
        })

        $(document).on('click', '.parent_ul .fa-plus', function(){
            $(this).addClass('fa-minus').removeClass('fa-plus');
            $(this).siblings('.child_ul').slideDown('slow');
        })

        $(document).on('click', '.parent_ul .fa-minus', function(){
            $(this).addClass('fa-plus').removeClass('fa-minus');
            $(this).siblings('.child_ul').slideUp('fast');
        })

        $("#access").submit(function(e) {

            $(".access").text('Processing...');

            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                dataType: "JSON",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data, status){
                    $(".access").text('Update');
                },
                error: function (xhr, desc, err){
                }

            })

            e.preventDefault();
        
        })


        $(".role_id").on('change', function(){

            $('.child_id').attr('checked', false);
            $('.parant_id').attr('checked', false);

            var url = "{{ url('getRole') }}/"+$(this).val();
             $.ajax({
                url: url,
                type: "get",
                success: function (data){
                    
                    $.each(data, function(index, menu){

                        $('.'+menu.menu_id+"_"+menu.action_id).attr('checked', true);
                        $('.'+menu.menu_id).attr('checked', true);
                        
                    })
                },
                error: function (xhr, desc, err){
                }

            });
        });



    </script>

@endsection
@endsection