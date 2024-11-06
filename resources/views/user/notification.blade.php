@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Send Notification</h1> 
        <h3 style="color: grey" id="notification"></h3>
        <form action="" id="notificationForm">
            @csrf
            <div class="mb-3">
                <label for="scheduled_at" class="form-label">Message</label>
                <input type="text" name="message" placeholder="Enter Text" id="notification-text" required>
            </div>
            <button type="submit" class="btn btn-primary">Send Notification</button>
            <p style="color:green" id="notificationSend"></p>
        </form>
    </div>

    <script>

    var userId = "{{auth()->user()->id}}";
    $(document).ready(function()
    {

        $('#notificationForm').submit(function(e)
        {
            e.preventDefault();
            var formData = $(this).serialize();
            
            $(this)[0].reset();
            $.ajax({
                url:"{{ route('send-notification') }}",
                type:"POST",
                data:formData,
                success:function(res)
                {
                    if(res.success)
                    {
                        $('#notificationSend').text(res.msg);
                        console.log("test",res.msg);
                    }
                    else
                    {
                        alert(res.msg);
                    }

                    setTimeout(() => {
                        $('#notificationSend').text('');
                    }, 2000);
                }
            });
        });

    });


    Echo.channel('notify-channel')
    .listen('SendNotification', (e) => {
        console.log("in broadcast");
            $('#notification').text(e.message);
        
    });

</script>
@endsection
