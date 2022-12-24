@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="waviy">
            <span style="--i:1">T</span>
            <span style="--i:2">A</span>
            <span style="--i:3">S</span>
            <span style="--i:4">K</span>
            <span style="--i:5">S</span>
        </div>
    </div>
    <div class="row justify-content-center">
    <div class="row align-items-center" style="padding:10px;">
            <p class="p">Portal internetowy TASKS to miejsce, w którym można skutecznie zarządzać swoim czasem i zadaniami. Dzięki niemu można stworzyć listę rzeczy do zrobienia, dodawać do niej kolejne zadania i ustalać terminy ich realizacji. Co więcej, portal umożliwia dodawanie znajomych. Można również wysyłać im indywidualne zadania i śledzić postępy ich wykonania. Dzięki temu wszystko jest uporządkowane i nic nie umknie naszej uwadze. Portal TASKS to idealne rozwiązanie dla osób ceniących sobie efektywność i porządek. Nie zwlekaj i już dziś załóz konto na portalu TASKS, a przekonasz się, jak wiele może Ci on dać!</p>
        </div>
        <div class="col-sm-6 col-md-6" style="padding:10px">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('img/1.png') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/2.png') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/3.png') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/4.png') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/5.png') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/6.png') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/7.png') }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        
    </div>
    <hr class="hr" />
    <h4 class="h">Mobilność</h4>
    <div class="row align-items-center">
        <div class="col-sm-6 col-md-6" style="padding:10px">
            <p class="p">Jeśli szukasz skutecznego narzędzia do zarządzania swoim czasem i zadaniami, które będzie dostępne na wszystkich urządzeniach mobilnych i systemach operacyjnych, to portal internetowy X jest idealnym rozwiązaniem dla Ciebie. Dzięki temu możesz korzystać z niego zawsze i wszędzie, bez względu na to, gdzie jesteś i na jakim urządzeniu pracujesz. </p>
        </div>
        <div class="col-sm-6 col-md-6" style="padding:10px">
            <img class="d-block w-100" src="{{ asset('img/device.png') }}" alt="First slide">
        </div>
    </div>
    <hr class="hr" />
    <h4 class="h">Technologia</h4>
    <div class="row align-items-center">
        <div class="col-sm-6 col-md-6" style="padding:10px">
            <img class="d-block w-100" src="{{ asset('img/a.png') }}" alt="First slide">
        </div>
        <div class="col-sm-6 col-md-6" style="padding:10px">
            <p class="p">Portal internetowy TASKS to narzędzie stworzone z dbałością o szczegóły i z wykorzystaniem najnowszych technologii. Jego kod został napisany przy pomocy języków HTML i CSS oraz PHP z wukorzystaniem frameworka Laravel, a do przechowywania danych wykorzystana została baza MySQL. W procesie tworzenia portalu wykorzystano także bibliotekę Bootstrap oraz jQuery, co sprawia, że jego interfejs jest przejrzysty i intuicyjny. Dzięki temu portal TASKS jest nie tylko skutecznym narzędziem do zarządzania czasem i zadaniami, ale również estetycznie i funkcjonalnie zaprojektowanym. </p>
        </div>
    </div>
    <hr class="hr" />
    <h4 class="h">Twórcy</h4>
    <div class="row align-items-center">
        <p class="p">Portal internetowy TASKS to miejsce, w którym można skutecznie zarządzać swoim czasem i zadaniami. Dzięki niemu można stworzyć listę rzeczy do zrobienia, dodawać do niej kolejne zadania i ustalać terminy ich realizacji. Co więcej, portal umożliwia dodawanie znajomych. Można również wysyłać im indywidualne zadania i śledzić postępy ich wykonania. Dzięki temu wszystko jest uporządkowane i nic nie umknie naszej uwadze. Portal TASKS to idealne rozwiązanie dla osób ceniących sobie efektywność i porządek."</p>
    </div>
    <hr class="hr" />
    <h4 class="h">Aktualizacje</h4>
    <div class="row align-items-center">
        <p class="z">Portal internetowy TASKS to narzędzie, które stale się rozwija i udoskonala, aby jeszcze lepiej służyć swoim użytkownikom. W przyszłości planujemy wprowadzenie nowych funkcjonalności, takich jak sortowanie i filtrowanie zadań, co pozwoli jeszcze lepiej zorganizować swoje obowiązki i skupić się na najważniejszych sprawach. Ponadto, chcemy także dodać możliwość otrzymywania mailowych powiadomień o nowych zadaniach od innych użytkowników, dzięki czemu nic nie umknie naszej uwadze i będziemy mogli szybko reagować na wszelkie zmiany. Jesteśmy przekonani, że te udoskonalenia pozwolą jeszcze lepiej wykorzystać możliwości portalu TASKS i sprawią, że jego użytkowanie stanie się jeszcze przyjemniejsze. </p>
    </div>
</div>


<footer class="text-center text-lg-start bg-light text-muted">
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); margin:auto;">
        <a target="_blank" href="https://github.com/olimpialewinska?tab=repositories"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
            </svg></a>
    </div>

</footer>



@endsection