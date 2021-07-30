<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link href="{{asset('css/message-style.css')}}" rel="stylesheet">
</head>

<body class="{{ $message['state']===1?'success':'faild' }}">
    <div class="card">
        @if($message['state']===1)
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
        @else
        <div style="border-radius:200px; height:200px; width:200px; background: #faf5f5; margin:0 auto;">
            <i class="checkmark">✘</i>
        </div>
        @endif
        <h1>وضعیت پرداخت</h1>
        <p>
            {{ $message['state']===0?'پرداخت با موفقیت انجام شد':'پرداخت با موفقیت انجام نشد' }}
        </p>
        <div>شما تا <span id="timer"></span> ثانیه دیگر به وبسایت اصلی منتقل خواهید شد.</div>
        <!-- <a onclick="redirect()" href="#">بازگشت</a> -->

    </div>
    <script>
        var androidURL = "";
        var timer = 10
        handleRedirection()

        function handleRedirection() {
            document.getElementById("timer").textContent = timer;
            setTimeout(function() {
                window.location.href = androidURL;
            }, timer * 1000);
            setInterval(() => {
                timer = timer - 1
                document.getElementById("timer").textContent = timer;
            }, 1000);
        }
    </script>
</body>

</html>