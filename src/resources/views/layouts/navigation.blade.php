<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Aplicação</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-2 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white text-xl">
                <a href="{{ url('/') }}">Minha Aplicação</a>
            </div>
           
            <div class="relative">
              
                @auth
                    <!-- Botão do usuário -->
                   
                    <button id="user-button" class="text-white focus:outline-none hover:bg-blue-700 p-2 rounded-md">
                        {{ Auth::user()->name }}
                        
                    </button>

                    <!-- Menu dropdown-->
                    <div id="dropdown-menu" class="absolute right-0 w-50 mt-1 bg-white shadow-lg rounded-lg hidden border ">
                        <ul class="list-none p-2">
                            <li>
                                @auth('user')
                                    <li>
                                        <a href="{{ route('users.edit', Auth::id()) }}"  class="block text-gray-800 px-4 py-2 hover:bg-blue-100 hover:rounded-md">
                                            Editar conta
                                        </a>
                                    </li>
                                @endauth
                                @auth('admin')
                                    <li>
                                        <a href="{{ route('users.index') }}"  class="block text-gray-800 px-4 py-2 hover:bg-blue-100 hover:rounded-md">
                                            Gerenciar canditados
                                        </a>
                                    </li>
                                @endauth
                                <a href="#" 
                                   class="block text-gray-800 px-4 py-2 hover:bg-blue-100 hover:rounded-md"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sair
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </li>
                            
                        </ul>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const dropdown = document.getElementById("dropdown-menu");
                            const button = document.getElementById("user-button");

                            button.addEventListener("click", function (event) {
                                event.stopPropagation(); // Impede que o clique no botão feche o menu
                                dropdown.classList.toggle("hidden");
                            });

                            document.addEventListener("click", function (event) {
                                if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                                    dropdown.classList.add("hidden");
                                }
                            });
                        });
                    </script>

                @else
                    <!-- Botão de login -->
                   

                    <button id="login-button" class="text-white focus:outline-none hover:bg-blue-700 p-2 rounded-md">
                        Login
                    </button>
                    
                    <div id="dropdown-menu-login" class="absolute right-0 w-[300px] mt-1 bg-white shadow-lg rounded-lg hidden border ">
                        <ul class="list-none p-2">
                            <li>
                                <a href="{{ route('login.candidate') }}"  class="block text-gray-800 px-4 py-2 hover:bg-blue-100 hover:rounded-md">
                                    Login para canditados
                                </a>
                                <a href="{{ route('login.recruiter') }}"  class="block text-gray-800 px-4 py-2 hover:bg-blue-100 hover:rounded-md">
                                    Login para recrutadores
                                </a>
                               
                            </li>
                        </ul>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const dropdown = document.getElementById("dropdown-menu-login");
                            const button = document.getElementById("login-button");

                            button.addEventListener("click", function (event) {
                                event.stopPropagation(); // Impede que o clique no botão feche o menu
                                dropdown.classList.toggle("hidden");
                            });

                            document.addEventListener("click", function (event) {
                                if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                                    dropdown.classList.add("hidden");
                                }
                            });
                        });
                    </script>
                @endauth
            </div>
        </div>
    </nav>
</body>
</html>
