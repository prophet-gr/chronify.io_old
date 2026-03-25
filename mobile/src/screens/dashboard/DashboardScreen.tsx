import React, { useEffect, useState, useCallback } from 'react';
import {
  View,
  Text,
  StyleSheet,
  FlatList,
  RefreshControl,
  ActivityIndicator,
} from 'react-native';
import { useAuth } from '../../auth/AuthContext';
import { getTimeEntries } from '../../api/timeEntries';
import type { TimeEntry } from '../../types';

function formatDuration(seconds: number | null): string {
  if (!seconds) return '--:--:--';
  const h = Math.floor(seconds / 3600);
  const m = Math.floor((seconds % 3600) / 60);
  const s = seconds % 60;
  return `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
}

function formatDate(dateStr: string): string {
  const d = new Date(dateStr);
  return d.toLocaleDateString(undefined, { month: 'short', day: 'numeric' });
}

export default function DashboardScreen() {
  const { user } = useAuth();
  const [entries, setEntries] = useState<TimeEntry[]>([]);
  const [loading, setLoading] = useState(true);
  const [refreshing, setRefreshing] = useState(false);

  const loadEntries = useCallback(async () => {
    try {
      const response = await getTimeEntries();
      setEntries(response.data);
    } catch {
      // Silent fail — user will see empty state
    } finally {
      setLoading(false);
      setRefreshing(false);
    }
  }, []);

  useEffect(() => {
    loadEntries();
  }, [loadEntries]);

  const onRefresh = () => {
    setRefreshing(true);
    loadEntries();
  };

  const todayTotal = entries
    .filter((e) => {
      const today = new Date().toDateString();
      return new Date(e.started_at).toDateString() === today;
    })
    .reduce((sum, e) => sum + (e.duration ?? 0), 0);

  const runningEntry = entries.find((e) => !e.ended_at);

  if (loading) {
    return (
      <View style={styles.center}>
        <ActivityIndicator size="large" color="#3b82f6" />
      </View>
    );
  }

  return (
    <View style={styles.container}>
      <View style={styles.header}>
        <Text style={styles.greeting}>Hello, {user?.name?.split(' ')[0]}</Text>
        <Text style={styles.dateText}>
          {new Date().toLocaleDateString(undefined, {
            weekday: 'long',
            month: 'long',
            day: 'numeric',
          })}
        </Text>
      </View>

      <View style={styles.statsRow}>
        <View style={styles.statCard}>
          <Text style={styles.statLabel}>Today</Text>
          <Text style={styles.statValue}>{formatDuration(todayTotal)}</Text>
        </View>
        <View style={[styles.statCard, runningEntry && styles.statCardActive]}>
          <Text style={styles.statLabel}>Status</Text>
          <Text style={[styles.statValue, runningEntry && styles.activeText]}>
            {runningEntry ? 'Tracking' : 'Idle'}
          </Text>
        </View>
      </View>

      <Text style={styles.sectionTitle}>Recent Entries</Text>
      <FlatList
        data={entries}
        keyExtractor={(item) => item.id.toString()}
        refreshControl={
          <RefreshControl refreshing={refreshing} onRefresh={onRefresh} />
        }
        renderItem={({ item }) => (
          <View style={styles.entryCard}>
            <View style={styles.entryLeft}>
              <Text style={styles.entryDesc} numberOfLines={1}>
                {item.description || 'No description'}
              </Text>
              <Text style={styles.entryMeta}>
                {formatDate(item.started_at)}
                {item.project ? ` - ${item.project.name}` : ''}
              </Text>
            </View>
            <Text style={[styles.entryDuration, !item.ended_at && styles.activeText]}>
              {!item.ended_at ? 'Running' : formatDuration(item.duration)}
            </Text>
          </View>
        )}
        ListEmptyComponent={
          <View style={styles.center}>
            <Text style={styles.emptyText}>No time entries yet. Start tracking!</Text>
          </View>
        }
      />
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: '#f8fafc' },
  center: { flex: 1, justifyContent: 'center', alignItems: 'center', padding: 24 },
  header: { paddingHorizontal: 20, paddingTop: 16, paddingBottom: 8 },
  greeting: { fontSize: 24, fontWeight: '700', color: '#0f172a' },
  dateText: { fontSize: 14, color: '#64748b', marginTop: 2 },
  statsRow: {
    flexDirection: 'row',
    paddingHorizontal: 20,
    gap: 12,
    marginVertical: 16,
  },
  statCard: {
    flex: 1,
    backgroundColor: '#fff',
    borderRadius: 12,
    padding: 16,
    borderWidth: 1,
    borderColor: '#e2e8f0',
  },
  statCardActive: { borderColor: '#3b82f6', backgroundColor: '#eff6ff' },
  statLabel: { fontSize: 12, color: '#64748b', marginBottom: 4 },
  statValue: { fontSize: 20, fontWeight: '700', color: '#0f172a' },
  activeText: { color: '#3b82f6' },
  sectionTitle: {
    fontSize: 16,
    fontWeight: '600',
    color: '#0f172a',
    paddingHorizontal: 20,
    marginBottom: 8,
  },
  entryCard: {
    flexDirection: 'row',
    alignItems: 'center',
    backgroundColor: '#fff',
    marginHorizontal: 20,
    marginBottom: 8,
    padding: 14,
    borderRadius: 10,
    borderWidth: 1,
    borderColor: '#e2e8f0',
  },
  entryLeft: { flex: 1, marginRight: 12 },
  entryDesc: { fontSize: 15, fontWeight: '500', color: '#0f172a' },
  entryMeta: { fontSize: 12, color: '#94a3b8', marginTop: 2 },
  entryDuration: { fontSize: 15, fontWeight: '600', color: '#0f172a' },
  emptyText: { fontSize: 14, color: '#94a3b8' },
});
