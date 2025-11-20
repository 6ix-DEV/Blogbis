@extends('layouts.app2')

@section('title', 'Accueil - Trio Blog')

@section('content')
<!-- Section Hero -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto max-w-4xl">
        <article class="bg-white rounded-2xl shadow-lg p-8">
            
                                    
                    <div>
           <!-- Titre de l'article -->
                        <h2 class="text-3xl font-bold text-secondary mb-4">{{ $post->title }}</h2>
                        
                        <!-- Informations sur l'auteur et la date -->
                        <div class="flex items-center text-gray-600 mb-8">
                            <div class="flex items-center mr-6">
                                <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold mr-3">
                                    {{$post->title}}
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">{{ $post->user->name }}</p>
                                    <p class="text-sm"> {{ $post->created_at->format('d M Y')  }} </p>
                                </div>
                            </div>
                            <div class="flex space-x-4">
                                
                                    <i class="far fa-comment"></i> <span class="ml-1"></span>
                                </button>
                                <button class="text-gray-500 hover:text-primary transition-colors">
                                    <i class="fas fa-share"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Contenu de l'article -->
                        <div class="prose max-w-none text-gray-700 mb-8">
                            {!! $post->content !!}
                        </div>
                        
                        <!-- Section des commentaires -->
                        <div class="border-t border-gray-200 pt-8 mb-8">
                            <h3 class="text-xl font-bold text-secondary mb-6">Commentaires ({{ $post->comments->count() }})</h3>
                            
                            <!-- 
                            BOUCLE POUR LES COMMENTAIRES
                            Remplacer par :
                            @foreach($post->comments as $comment)
                            -->
                            
                            <!-- Commentaire 1 - EXEMPLE STATIQUE -->
                            <div class="bg-gray-50 rounded-xl p-6 mb-6">
                                <div class="flex justify-between items-center mb-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-secondary flex items-center justify-center text-white text-sm font-bold mr-3">
                                            {{ substr($comment->user->name, 0, 2) }}
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $comment->user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $comment->created_at->format('d M Y') }}</p>
                                        </div>
                                    </div>
                                    <button class="text-gray-500 hover:text-primary transition-colors">
                                        <i class="far fa-heart"></i> <span class="ml-1">{{ $comment->likes_count }}</span>
                                    </button>
                                </div>
                                <p class="text-gray-700">{{ $comment->content }}</p>
                            </div>
                            
                            <!-- 
                            @endforeach
                            
                            Si aucun commentaire :
                            @if($post->comments->isEmpty())
                            <p class="text-gray-500 text-center py-4">Aucun commentaire pour le moment. Soyez le premier à réagir !</p>
                            @endif
                            -->
                            
                            <!-- Formulaire d'ajout de commentaire -->
                            <!-- Afficher seulement si l'utilisateur est connecté -->
                            @auth
                            <form class="mt-8" action="{{ route('comments.store',$post)}}" method="POST">
                                @csrf   
                                @method('POST')
                                <h4 class="text-lg font-medium text-secondary mb-4">Ajouter un commentaire</h4>
                                <div class="mb-4">
                                    <label for="comment-content" class="block text-gray-700 mb-2 font-medium">Votre commentaire</label>
                                    <textarea id="comment-content" name="content" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Partagez votre opinion..."></textarea>
                                    @error('content')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-secondary transition-colors font-medium">
                                    Publier le commentaire
                                </button>
                            </form>
                            @else
                            <div class="mt-8 text-center">
                                <p class="text-gray-600 mb-4">Vous devez être connecté pour poster un commentaire.</p>
                                <a href="{{ route('login') }}" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-secondary transition-colors">
                                    Se connecter
                                </a>
                            </div>
                            @endauth
                        </div>
                    </div>
                </article>
                
                <div class="text-center mt-8">
                    <a href="{{ route('posts.index') }}" class="inline-flex items-center text-primary font-medium hover:text-secondary transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i> Retour aux articles
                    </a>
                </div>
            </div>
        </section>
@endsection