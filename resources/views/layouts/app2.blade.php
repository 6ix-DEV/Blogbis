<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trio Blog')</title>
    
    <!-- Styles et scripts communs à toutes les pages -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#028090',
                        secondary: '#2D3142',
                        tertiary: '#B8F3FF'
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #028090 0%, #2D3142 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .tag {
            transition: all 0.2s ease;
        }
        .tag:hover {
            background-color: #2D3142 !important;
            color: white;
        }
        .reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: #028090;
            z-index: 9999;
            transition: width 0.3s;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans min-h-screen flex flex-col">
    <!-- Barre de progression -->
    <div class="reading-progress" id="readingProgress"></div>

    <!-- En-tête moderne -->
    <header class="gradient-bg text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-2 mb-4 md:mb-0">
                    <div class="w-10 h-10 rounded-full bg-tertiary flex items-center justify-center">
                        <span class="text-primary font-bold text-xl"></span>
                    </div>
                    <h1 class="text-2xl font-bold">FGA - <span class="text-tertiary">Blog</span></h1>
                </div>
                
                <nav class="flex flex-wrap justify-center gap-4 md:gap-8">
                    <a href="{{ route('home') }}" class="nav-link font-medium hover:text-tertiary transition-colors flex items-center">
                        <i class="fas fa-home mr-2"></i> Accueil
                    </a>
                    <a href="{{ route('posts.index') }}" class="nav-link font-medium hover:text-tertiary transition-colors flex items-center">
                        <i class="fas fa-newspaper mr-2"></i> Articles
                    </a>
                    <a href="{{ route('posts.create') }}" class="nav-link font-medium hover:text-tertiary transition-colors flex items-center">
                        <i class="fas fa-pen mr-2"></i> Écrire
                    </a>
                    
                    <!-- Condition pour afficher connexion/déconnexion -->
                    @auth
                        <span class="font-medium flex items-center">
                            <i class="fas fa-user mr-2"></i> {{ Auth::user()->name }}
                        </span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="font-medium hover:text-tertiary transition-colors flex items-center">
                                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-medium hover:text-tertiary transition-colors flex items-center">
                            <i class="fas fa-user mr-2"></i> Connexion
                        </a>
                    @endauth
                </nav>
            </div>
        </div>
    </header>

    <!-- Contenu principal - Cette partie changera selon les pages -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Pied de page -->
    <footer class="bg-secondary text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 rounded-full bg-tertiary flex items-center justify-center">
                            <span class="text-primary font-bold text-xl"></span>
                        </div>
                        <h2 class="text-2xl font-bold">FGA - <span class="text-tertiary">Blog</span></h2>
                    </div>
                    <p class="text-gray-300 mb-4 max-w-md">
                        Une plateforme moderne pour partager vos idées, découvrir de nouveaux contenus et connecter avec une communauté de passionnés.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-tertiary transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-tertiary transition-colors">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-tertiary transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Navigation</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-tertiary transition-colors">Accueil</a></li>
                        <li><a href="{{ route('posts.index') }}" class="text-gray-300 hover:text-tertiary transition-colors">Articles</a></li>
                        <li><a href="{{ route('posts.create') }}" class="text-gray-300 hover:text-tertiary transition-colors">Écrire</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Catégories</h3>
                    <ul class="space-y-2">
                        <!-- Vous pouvez boucler sur les catégories ici plus tard -->
                        <li><a href="#" class="text-gray-300 hover:text-tertiary transition-colors">Développement Web</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-tertiary transition-colors">Design UI/UX</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-tertiary transition-colors">Productivité</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>© {{ date('Y') }} NexusBlog. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts JavaScript communs à toutes les pages -->
    {{-- <script>
        // Barre de progression de lecture
        function updateProgressBar() {
            const winHeight = window.innerHeight;
            const docHeight = document.documentElement.scrollHeight;
            const scrollTop = window.pageYOffset;
            const progress = (scrollTop / (docHeight - winHeight)) * 100;
            document.getElementById('readingProgress').style.width = progress + '%';
        }
        
        // Au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser la barre de progression
            window.addEventListener('scroll', updateProgressBar);
            updateProgressBar();
            
            // Animation d'entrée pour les articles
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('article').forEach(article => {
                article.style.opacity = '0';
                article.style.transform = 'translateY(20px)';
                article.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(article);
            });
        });
    </script>
    
    <!-- Section pour les scripts spécifiques à certaines pages -->
    @yield('scripts') --}}
</body>
</html>