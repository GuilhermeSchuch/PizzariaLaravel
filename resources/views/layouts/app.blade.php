<x-header />
<body>
    @yield('content')

    <script>
        let $msgContainer = document.querySelector(".msg-container");
        let $msg = document.querySelector(".msg");
    
        if($msg){
            $($msg).fadeOut(10000);
            
            setTimeout(function () {
                $($msgContainer).fadeOut(1);
            }, 9999);
        }
    </script>
</body>
    <x-footer />
</html>