<div class="navbar-container">
    <div class="navigation">
        <ul>

            <li class="list" id="dashboard">
                <a href="{{ route('dashboard') }}">
                    <span class="icon"><ion-icon name="stats-chart-outline"></ion-icon></span>
                    <span class="text">Dashboard</span>
                </a>
            </li>   

            <li class="list" id="chart">
                <a href="{{ route('charts') }}">
                    <span class="icon"><ion-icon name="pie-chart-outline"></ion-icon></span>
                    <span class="text">Gráficos</span>
                </a>
            </li>

            <li class="list" id="manage">
                <a href="{{ route('manage') }}">
                    <span class="icon"><ion-icon name="settings-outline"></ion-icon></ion-icon></span>
                    <span class="text">Gerenciar</span>
                </a>
            </li>

            <li class="list">
                <a href="https://github.com/GuilhermeSchuch" target="_blank">
                    <span class="icon"><ion-icon name="logo-github"></ion-icon></ion-icon></span>
                    <span class="text">Contato</span>
                </a>
            </li>

            <li class="list">
                <a href="{{route('logout')}}">
                    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class="text">Logout</span>
                </a>
            </li>
            <div class="indicator"></div>
        </ul>
    </div>
</div>

<?php 
    if($navbar == "manage"){
        echo "<script>";
            echo "const item = document.querySelector('#manage');";
            echo "item.classList.add('active');";
        echo "</script>";
    }
    elseif ($navbar == "dashboard") {
        echo "<script>";
            echo "const item = document.querySelector('#dashboard');";
            echo "item.classList.add('active');";
        echo "</script>";
    }
    elseif ($navbar == "chart") {
        echo "<script>";
            echo "const item = document.querySelector('#chart');";
            echo "item.classList.add('active');";
        echo "</script>";
    }
?>


{{-- <script>
    const list = document.querySelectorAll(".list");

    function activeLink(){
        list.forEach((item) => 
            item.classList.remove("active"));
            this.classList.add("active");
        
    }

    list.forEach((item) => 
        item.addEventListener("click", activeLink));
    
</script> --}}