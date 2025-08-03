import apiClient from './apiClient'

const movieService = {
  // Buscar todos os filmes
  getAllMovies() {
    return apiClient.get('/movies')
  },
  //Buscar Por nome
  getMovieByName(name) {
    return apiClient.get(`/movies/search?query=${name}`)
  },
  // Adicionar Favorito
  addToFavorites(id) {    
    return apiClient.post('/favorites', {id:id})
  },
  getAllFavorites() {
    return apiClient.get('/favorites')
  },
  // Remove favorito
  removeFavorites(id) { 
    return apiClient.delete(`/favorites/${id}`)
  },
  // Buscar generos filmes
  getGender() {
    return apiClient.get(`/favorites/genres`)
  }
}

export default movieService