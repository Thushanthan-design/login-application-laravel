<div>
    <div>
        <h3>
            You are successfully to the system
        </h3>

        @if(isset(Auth::user()->email))
        <div>
            <strong>Welcome {{ Auth::user()->email}}</strong><br>
            <a href="{{url('/logout')}}">Logout</a>
        </div>
        @else
        <script>
            window.location = "/";
        </script>
        @endif

    </div>
</div>