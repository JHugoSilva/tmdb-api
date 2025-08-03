<?php

namespace App\Http\Controllers;

use App\Models\FavoriteMovie;
use Illuminate\Http\Request;

use App\Services\TmdbService;


class MovieControllerBKP extends Controller
{
    protected $tmdb;

    public function __construct(TmdbService $tmdb)
    {
        $this->tmdb = $tmdb;
    }

    /**
     * Busca todos os filmes
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $movies = $this->tmdb->getAllMovies();
        return response()->json($movies);
    }

    /**
     * Summary of searchTitle
     * Busca pelo nome do Filme|Título
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchTitle(Request $request)
    {
        $query = $request->input('query');
        
        if (empty($query)) {
            return response()->json([
                'success' => false,
                'message' => 'Por favor, digite um termo para busca',
                'results' => []
            ], 404); // Bad Request
        }

        $results = $this->tmdb->searchMoviesByTitle($query);

        if (empty($results)) {
            return response()->json([
                'success' => false,
                'message' => 'Nenhum filme encontrado',
                'query' => $query,
                'results' => []
            ], 404); // Not Found
        }

        return response()->json([
            'success' => true,
            'query' => $query,
            'results' => $results['results']
        ]);
    }

    /**
     * Summary of getDetails
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    // public function getDetails($id)
    // {
    //     $movie = $this->tmdb->getMovieDetails($id);
        
    //     if (empty($movie)) {
    //        return response()->json([
    //             'success' => false,
    //             'message' => 'Por favor, digite um termo para busca',
    //             'results' => []
    //         ], 404);
    //     }
        
    //     return response()->json($movie);
    // }

    public function getGender(){
      $geners =FavoriteMovie::pluck('genres')
        ->flatMap(function ($item) {
        return collect(explode(',', $item))
            ->map(fn($g) => trim($g));
        })
        ->unique()
        ->sort()
        ->values();
        return response()->json($geners);
    }

    // Método auxiliar para formatar os resultados
    // private function formatMovieResults($movies)
    // {
    //     return array_map(function($movie) {
    //         return [
    //             'id' => $movie['id'],
    //             'title' => $movie['title'],
    //             'overview' => $movie['overview'],
    //             'poster_path' => $movie['poster_path'] 
    //                 ? "https://image.tmdb.org/t/p/w500{$movie['poster_path']}" 
    //                 : null,
    //             'release_year' => isset($movie['release_date']) 
    //                 ? date('Y', strtotime($movie['release_date'])) 
    //                 : null,
    //             'vote_average' => $movie['vote_average']
    //         ];
    //     }, $movies);
    // }

}
