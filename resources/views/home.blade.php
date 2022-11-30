@extends('layouts.app_back')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="top-action">
                <div class="tv-tabs">
                  <label class="tv-tab" for="tv-tab-1">Open Register</label>
                  <label class="tv-tab" for="tv-tab-2">Activities</label>
                </div>
                <input class="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked="checked"/>
                <div class="tv-content">
                  <h3>POS Dashboard</h3>
                  <p><i>Fill up. *marks are mandatory field!</i></p>
                  <div class="entry-form">
                      <form id="register_submit" action="{{ route('pos.dashboard') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-2">
                                    <select name="register_no" class="register" id="register">
                                        <option value="">Select Register</option>
                                        @foreach ($registers as $register)
                                            <option value="{{ $register->name }}">{{ $register->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <input type="text" name="status" class="form-control status" placeholder="Register Status">
                                </div>
                            </div>
                          <br>
                          <!-- If register is close then first opening balance then open button -->
                          <div class="row">
                              <div class="col-3">
                                  <input type="text" id="openning_balance" class="openning_balance" name="openning_balance" placeholder="Today Opening Balance">
                              </div>
                          </div>
                          <!-- If register is open then direct open button -->
                          <br>
                          <div class="row">
                              <div class="col-12">
                                  <button class="save-btn">Open Register</button>
                              </div>
                          </div>
                      </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')

    <script>
        $(".register").on('change', function(){
            $(".save-btn").text('Processing...');

            var url = "{{ url('get/register') }}/"+$(this).val();
             $.ajax({
                url: url,
                type: "get",
                success: function (data){
                    if(data.status !== undefined){
                        $('.status').val(data.status);
                        $('.openning_balance').val(data.openning_balance);
                        $(".save-btn").text('Close Register');
                    }else{
                        $('.status').val("");
                        $('.openning_balance').val("");
                        $(".save-btn").text('Open Register');
                    }
                    

                },
                error: function (xhr, desc, err){
                }
            });
        });


        $("#register_submit").submit(function(e) {

            $(".save-btn").text('Processing...');

            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                dataType: "JSON",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data, status){
                    var userInfo = "{{ Auth::user()->id }}";
                    if(data == "Open"){
                        
                        localStorage.setItem('posWindowStatus_'+userInfo, data);

                        return window.location.href = "home/standard_pos";


                    }
                    
                },
                error: function (xhr, desc, err){
                }
            })
            e.preventDefault();

        })
    </script>

@endsection
@endsection