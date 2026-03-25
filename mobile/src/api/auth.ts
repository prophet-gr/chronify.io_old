import apiClient from './client';
import type { AuthResponse, LoginCredentials, RegisterData, User } from '../types';

export async function login(credentials: LoginCredentials): Promise<AuthResponse> {
  const { data } = await apiClient.post('/login', credentials);
  return data;
}

export async function register(userData: RegisterData): Promise<AuthResponse> {
  const { data } = await apiClient.post('/register', userData);
  return data;
}

export async function logout(): Promise<void> {
  await apiClient.post('/logout');
}

export async function getUser(): Promise<User> {
  const { data } = await apiClient.get('/user');
  return data;
}
