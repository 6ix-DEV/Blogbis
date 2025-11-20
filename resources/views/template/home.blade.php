@extends('layouts.app2')

@section('title', 'Accueil - Nexus Blog')

@section('content')
<!-- Section Hero -->
<section class="gradient-bg text-white py-16 md:py-24">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Partagez vos idées avec le monde</h2>
        <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto text-gray-200">
            Une plateforme moderne pour publier, découvrir et discuter.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            @auth
                <a href="{{ route('posts.create') }}" class="bg-tertiary text-primary font-bold px-6 py-3 rounded-lg hover:bg-white transition-colors shadow-lg">
                    <i class="fas fa-pen mr-2"></i> Commencer à écrire
                </a>
            @else
                <a href="{{ route('posts.create') }}" class="bg-tertiary text-primary font-bold px-6 py-3 rounded-lg hover:bg-white transition-colors shadow-lg">
                    <i class="fas fa-user-plus mr-2"></i> Créer un Article
                </a>
            @endauth
            <a href="{{ route('posts.index') }}" class="bg-white text-secondary font-bold px-6 py-3 rounded-lg hover:bg-gray-100 transition-colors shadow-lg">
                <i class="fas fa-book-open mr-2"></i> Tous les Articles
            </a>
        </div>
    </div>
</section>



        <div class="text-center mt-12">
            <a href="{{ route('posts.index') }}" class="inline-flex items-center text-primary font-medium hover:text-secondary transition-colors">
                Voir tous les articles <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>
@endsection