import axios from 'axios'

// Criar instância base do Axios
const apiClient = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL || 'http://localhost:3000/api',
  timeout: 10000,
  headers: {
    'Content-Type': 'application/json',
    // Outros headers globais podem ser adicionados aqui
  }
})

export default apiClient
