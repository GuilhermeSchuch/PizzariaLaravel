<div class="navbar-container">
    <div class="navigation">
        <ul>
            <li class="list active">
                <a href="{{ route('dashboard') }}">
                    <span class="icon"><ion-icon name="stats-chart-outline"></ion-icon></span>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <li class="list">
                <a href="{{ route('charts') }}">
                    <span class="icon"><ion-icon name="pie-chart-outline"></ion-icon></span>
                    <span class="text">Gráficos</span>
                </a>
            </li>

            <li class="list">
                <a href="{{ route('manage') }}">
                    <span class="icon"><ion-icon name="settings-outline"></ion-icon></ion-icon></span>
                    <span class="text">Gerenciar</span>
                </a>
            </li>

            <li class="list">
                <a href="#">
                    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class="text">Logout</span>
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

<script>
    const list = document.querySelectorAll(".list");

    function activeLink(){
        list.forEach((item) => 
            item.classList.remove("active"));
            this.classList.add("active");
        
    }

    list.forEach((item) => 
        item.addEventListener("click", activeLink));
    
</script>