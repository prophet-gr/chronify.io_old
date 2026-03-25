import axios from 'axios';
import * as SecureStore from 'expo-secure-store';

const TOKEN_KEY = 'chronify_auth_token';

// TODO: Update with production API URL or use env config
const API_BASE_URL = __DEV__
  ? 'http://localhost:8000/api'
  : 'https://chronify.io/api';

const apiClient = axios.create({
  baseURL: API_BASE_URL,
  headers: {
    'Content-Type': 'application/json',
    Accept: 'application/json',
  },
  timeout: 15000,
});

// Request interceptor — attach auth token
apiClient.interceptors.request.use(async (config) => {
  const token = await SecureStore.getItemAsync(TOKEN_KEY);
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
});

// Response interceptor — handle 401
apiClient.interceptors.response.use(
  (response) => response,
  async (error) => {
    if (error.response?.status === 401) {
      await SecureStore.deleteItemAsync(TOKEN_KEY);
    }
    return Promise.reject(error);
  }
);

export { TOKEN_KEY };
export default apiClient;
