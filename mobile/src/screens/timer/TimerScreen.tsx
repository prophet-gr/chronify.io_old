import React, { useEffect, useState, useRef, useCallback } from 'react';
import {
  View,
  Text,
  TouchableOpacity,
  StyleSheet,
  Alert,
  ActivityIndicator,
  ScrollView,
} from 'react-native';
import { getTimeEntries, startTimer, stopTimer } from '../../api/timeEntries';
import { getOrganizations, getProjects } from '../../api/projects';
import type { TimeEntry, Project, Organization } from '../../types';

function formatElapsed(seconds: number): string {
  const h = Math.floor(seconds / 3600);
  const m = Math.floor((seconds % 3600) / 60);
  const s = seconds % 60;
  return `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
}

export default function TimerScreen() {
  const [runningEntry, setRunningEntry] = useState<TimeEntry | null>(null);
  const [elapsed, setElapsed] = useState(0);
  const [loading, setLoading] = useState(true);
  const [actionLoading, setActionLoading] = useState(false);
  const [projects, setProjects] = useState<Project[]>([]);
  const [selectedProject, setSelectedProject] = useState<Project | null>(null);
  const intervalRef = useRef<ReturnType<typeof setInterval> | null>(null);

  const loadState = useCallback(async () => {
    try {
      const [entriesRes, orgsRes] = await Promise.all([
        getTimeEntries(),
        getOrganizations(),
      ]);

      const running = entriesRes.data.find((e) => !e.ended_at);
      setRunningEntry(running ?? null);

      // Load projects from first org
      if (orgsRes.data.length > 0) {
        const projectsRes = await getProjects(orgsRes.data[0].id);
        setProjects(projectsRes.data);
        if (!selectedProject && projectsRes.data.length > 0) {
          setSelectedProject(projectsRes.data[0]);
        }
      }
    } catch {
      // Will show idle state
    } finally {
      setLoading(false);
    }
  }, [selectedProject]);

  useEffect(() => {
    loadState();
  }, [loadState]);

  // Tick the elapsed timer
  useEffect(() => {
    if (runningEntry) {
      const start = new Date(runningEntry.started_at).getTime();
      const tick = () => setElapsed(Math.floor((Date.now() - start) / 1000));
      tick();
      intervalRef.current = setInterval(tick, 1000);
    } else {
      setElapsed(0);
    }
    return () => {
      if (intervalRef.current) clearInterval(intervalRef.current);
    };
  }, [runningEntry]);

  const handleStart = async () => {
    if (!selectedProject) {
      Alert.alert('Select Project', 'Please select a project before starting the timer.');
      return;
    }
    setActionLoading(true);
    try {
      const entry = await startTimer({ project_id: selectedProject.id });
      setRunningEntry(entry);
    } catch (error: any) {
      Alert.alert('Error', error.response?.data?.message || 'Could not start timer.');
    } finally {
      setActionLoading(false);
    }
  };

  const handleStop = async () => {
    if (!runningEntry) return;
    setActionLoading(true);
    try {
      await stopTimer(runningEntry.id);
      setRunningEntry(null);
    } catch (error: any) {
      Alert.alert('Error', error.response?.data?.message || 'Could not stop timer.');
    } finally {
      setActionLoading(false);
    }
  };

  if (loading) {
    return (
      <View style={styles.center}>
        <ActivityIndicator size="large" color="#3b82f6" />
      </View>
    );
  }

  return (
    <View style={styles.container}>
      <View style={styles.timerSection}>
        <Text style={[styles.timerDisplay, runningEntry && styles.timerActive]}>
          {formatElapsed(elapsed)}
        </Text>
        <Text style={styles.timerStatus}>
          {runningEntry ? 'Timer Running' : 'Timer Stopped'}
        </Text>
      </View>

      {!runningEntry && projects.length > 0 && (
        <ScrollView horizontal style={styles.projectPicker} showsHorizontalScrollIndicator={false}>
          {projects.map((p) => (
            <TouchableOpacity
              key={p.id}
              style={[
                styles.projectChip,
                selectedProject?.id === p.id && styles.projectChipSelected,
              ]}
              onPress={() => setSelectedProject(p)}
            >
              <Text
                style={[
                  styles.projectChipText,
                  selectedProject?.id === p.id && styles.projectChipTextSelected,
                ]}
              >
                {p.name}
              </Text>
            </TouchableOpacity>
          ))}
        </ScrollView>
      )}

      {runningEntry && runningEntry.project && (
        <Text style={styles.projectLabel}>
          Project: {runningEntry.project.name}
        </Text>
      )}

      <TouchableOpacity
        style={[
          styles.actionButton,
          runningEntry ? styles.stopButton : styles.startButton,
          actionLoading && styles.buttonDisabled,
        ]}
        onPress={runningEntry ? handleStop : handleStart}
        disabled={actionLoading}
      >
        {actionLoading ? (
          <ActivityIndicator color="#fff" />
        ) : (
          <Text style={styles.actionButtonText}>
            {runningEntry ? 'Stop' : 'Start'}
          </Text>
        )}
      </TouchableOpacity>
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: '#f8fafc', alignItems: 'center', paddingTop: 48 },
  center: { flex: 1, justifyContent: 'center', alignItems: 'center' },
  timerSection: { alignItems: 'center', marginBottom: 32 },
  timerDisplay: {
    fontSize: 56,
    fontWeight: '200',
    color: '#0f172a',
    fontVariant: ['tabular-nums'],
  },
  timerActive: { color: '#3b82f6' },
  timerStatus: { fontSize: 14, color: '#94a3b8', marginTop: 8 },
  projectPicker: { maxHeight: 48, marginBottom: 24, paddingHorizontal: 16 },
  projectChip: {
    backgroundColor: '#fff',
    borderWidth: 1,
    borderColor: '#e2e8f0',
    borderRadius: 20,
    paddingHorizontal: 16,
    paddingVertical: 10,
    marginRight: 8,
  },
  projectChipSelected: { backgroundColor: '#3b82f6', borderColor: '#3b82f6' },
  projectChipText: { fontSize: 14, color: '#64748b' },
  projectChipTextSelected: { color: '#fff', fontWeight: '600' },
  projectLabel: { fontSize: 14, color: '#64748b', marginBottom: 24 },
  actionButton: {
    width: 120,
    height: 120,
    borderRadius: 60,
    justifyContent: 'center',
    alignItems: 'center',
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 4 },
    shadowOpacity: 0.15,
    shadowRadius: 8,
    elevation: 4,
  },
  startButton: { backgroundColor: '#22c55e' },
  stopButton: { backgroundColor: '#ef4444' },
  buttonDisabled: { opacity: 0.6 },
  actionButtonText: { color: '#fff', fontSize: 20, fontWeight: '700' },
});
