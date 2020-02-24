@extends('frontend.layouts.app')

@section('title')
Contacts | {{ config('app.name') }}
@endsection


@section('styles')

@endsection

@section('content')

<!-- contact area -->
<section id="contact-area" class="">
    <div class="container-fluid">
        <div class="row ">
            <!-- form here -->
            <div class="col-xl-6 col-lg-6 p-0">
                <img src="{{ asset('public/img/building.png') }}" class="img img-fluid">
            </div>

            <!-- map here -->
            <div class="col-xl-6 col-lg-6 space bg-white p-0" >
                <div class="addres-box">
                    <div class="job-title-here myaddress">
                        <div class="single-job">
                            <div class="job-name-icon contact-location">
                                <span class="icon-location"></span>
                            </div>
                            <div class="job-name">
                                <h3 class="text-dark">Dhaka Office</h3>
                                <p class="text-dark">Akij House, 198 Bir Uttam, Mir Shawkat Sarak. Gulshan Link Road, Tejgaon, Dhaka-1208</p>
                                <p class="text-muted">
                                    Phone: +88 09613116609
                                    <br>
                                    Email: operation.asll@akij.net
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="map-area pl-2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3651.3773366429764!2d90.40815721498173!3d23.76957388457992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3755c778d94ba6d1%3A0x89051c19123ad2d4!2sAkij+House%2C+Bir+Uttam+Mir+Shawkat+Sarak%2C+Dhaka+1208!3m2!1d23.769573899999997!2d90.4103459!5e0!3m2!1sen!2sbd!4v1540664791567" width="90%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <!-- map here -->               
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-lg-6 p-5">
                <!-- Contact Form Start Here -->

                <div class="contact-form p-5 pb-2">
                    <div class="form-title">
                        <h5>Contact Form</h5>
                        <div id="form_result"></div>

                        <p class="text-muted">Send your message to us and get your query</p>
                        
                        <form method="post" action="{{ route('contacts.store') }}" id="sample_form" enctype="multipart/form-data" >
                                @csrf
                                <input type="text" name="name" class="form-control mb-2 mt-1" placeholder="Full Name">
                                <input type="text" name="email" class="form-control mb-2 mt-1" placeholder="Email">
                                <div class="row col-md-12">
                                    <input type="text" name="subject" class="form-control mb-2  col-md-6" placeholder="Subject">
                                    <input type="text" name="phone" class="form-control mb-2 col-md-6" placeholder="Phone no">                                  
                                </div>
                                <textarea name="message" id="" cols="30" rows="5" placeholder="Message" class="form-control"></textarea>

                                <button type="submit" class="btn btn-primary mt-3">
                                    Submit <i class="fa fa-check"></i>
                                </button>
                            </form>
                    </div>
                </div>
            
                
            </div>

            <div class="col-xs-6 col-lg-6">
                <div class="contact-hand pt-5 pb-2">
                    <img src="{{ asset('public/img/contact.png') }}" class="w-100">
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- contact area -->


@endsection

@section('scripts')
<script>
    $('#sample_form').on('submit', function(event){
        event.preventDefault();
        // return 
        var formAction = $(this).attr("action");

        $.ajax({
            url: formAction,
            method:"POST",
            data: new FormData(this),
            contentType: false,
            cache:false,
            processData: false,
            dataType:"json",
            success:function(data)
            {
                //console.log(data);

                var html = '';
                if(data.errors)
                {
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++){
                    html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                }
                if(data.success)
                {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#sample_form')[0].reset();
                   $('#sample_form').DataTable().ajax.reload();
                }
                $('#form_result').html(html);
            }
        });
    })
   </script>
@endsection

{{-- ---------------------------------------------------------------------------------------------------------------
Controller => method
--------------------------------------------------------------------------------------------------------------- --}}


{{-- public function store2(Request $request)
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $subscriber = Subscriber::where('email', $request->email)->first();
            if (is_null($subscriber)) {
                $subscriber = new Subscriber();
                $subscriber->email = $request->email;
                $subscriber->status = 1;
                if ($subscriber->save()) {
                    return json_encode(['status' => 'success', 'message' => 'Congratulation !! You are now subscribed to our job site !!', 'subscriber' => $subscriber]);
                }
            } else {
                return json_encode(['status' => 'error', 'message' => 'You are already a subscribed user !!']);
            }
        }
        return json_encode(['status' => 'error', 'message' => 'Sorry !! Invalid email address !!']);
    } --}}



{{-- ---------------------------------------------------------------------------------------------------------------
in the view
--------------------------------------------------------------------------------------------------------------- --}}
{{-- <div>
	<p>
	Are you willing to get notifications whenever a new job post added ?
	</p>
	<div class="mt-4">
	<input type="email" id="subscriber-email" class="form-control"
	placeholder="Enter your email address" />
	</div>
	<div id="subscriber-message"></div>
</div>
	<div class="mt-3 text-center">
	<button type="button" class="btn btn-success btn-lg" id="subscribe-button">
	<i class="fa fa-check"></i> Yes ! I'm In
	<span class="hidden">'</span>
	</button>
	</div>
	 --}}


{{-- ---------------------------------------------------------------------------------------------------------------
in the js
--------------------------------------------------------------------------------------------------------------- --}}


{{-- <script>
$("#subscribe-button").click(function(){

    let email_address = $("#subscriber-email").val();
    var url_subscribe = "{{ url('/') }}/get-subscribed";
    if(email_address.length == 0){
        $("#subscriber-message").html("<div class='text-danger'>Please write your email address !!</div>")
    }else{

    $.post( url_subscribe, { email: email_address, '_token': "{{ csrf_token() }}" })
    .done(function( data ) {
        data = JSON.parse(data);
        if(data.status === 'success'){
            $("#subscriber-message").html("<div class='text-success'></div>")
            new Noty({
            theme: 'sunset',
            type: 'success',
            layout: 'topCenter',
            text: data.message,
            timeout: 3000
            }).show();
            $("#subscriber-email").val('');
            $('#SubscriberModal').modal('toggle');
        }else{
            $("#subscriber-message").html("<div class='text-danger'>"+data.message+"</div>")
        }
    });
    }
    });
</script> --}}