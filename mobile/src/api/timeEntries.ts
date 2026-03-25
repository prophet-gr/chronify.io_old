import apiClient from './client';
import type { TimeEntry, PaginatedResponse } from '../types';

export async function getTimeEntries(page = 1): Promise<PaginatedResponse<TimeEntry>> {
  const { data } = await apiClient.get('/time-entries', { params: { page } });
  return data;
}

export async function startTimer(params: {
  project_id: number;
  task_id?: number;
  description?: string;
  is_billable?: boolean;
}): Promise<TimeEntry> {
  const { data } = await apiClient.post('/time-entries', params);
  return data.data ?? data;
}

export async function stopTimer(timeEntryId: number): Promise<TimeEntry> {
  const { data } = await apiClient.post(`/time-entries/${timeEntryId}/stop`);
  return data.data ?? data;
}

export async function updateTimeEntry(
  id: number,
  params: Partial<{
    description: string;
    project_id: number;
    task_id: number | null;
    is_billable: boolean;
    started_at: string;
    ended_at: string | null;
  }>
): Promise<TimeEntry> {
  const { data } = await apiClient.put(`/time-entries/${id}`, params);
  return data.data ?? data;
}

export async function deleteTimeEntry(id: number): Promise<void> {
  await apiClient.delete(`/time-entries/${id}`);
}
