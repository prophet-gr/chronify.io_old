import apiClient from './client';
import type { Organization, Project, PaginatedResponse } from '../types';

export async function getOrganizations(): Promise<PaginatedResponse<Organization>> {
  const { data } = await apiClient.get('/organizations');
  return data;
}

export async function getProjects(organizationId: number): Promise<PaginatedResponse<Project>> {
  const { data } = await apiClient.get(`/organizations/${organizationId}/projects`);
  return data;
}

export async function getProject(projectId: number): Promise<Project> {
  const { data } = await apiClient.get(`/projects/${projectId}`);
  return data.data ?? data;
}
