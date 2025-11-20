@extends('layouts.app2')

@section('title', 'Accueil - Nexus Blog')

@section('content')

<!-- Formulaire d'ajout de commentaire -->
                            <!-- Afficher seulement si l'utilisateur est connecté -->
                            @auth
                            <form class="mt-8" action="{{ route('comments.store', $post) }}" method="POST">
                                @csrf 
                            
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