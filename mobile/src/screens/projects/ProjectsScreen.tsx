import React, { useEffect, useState, useCallback } from 'react';
import {
  View,
  Text,
  StyleSheet,
  FlatList,
  RefreshControl,
  ActivityIndicator,
} from 'react-native';
import { getOrganizations, getProjects } from '../../api/projects';
import type { Project, Organization } from '../../types';

export default function ProjectsScreen() {
  const [organizations, setOrganizations] = useState<Organization[]>([]);
  const [projects, setProjects] = useState<Project[]>([]);
  const [loading, setLoading] = useState(true);
  const [refreshing, setRefreshing] = useState(false);

  const loadData = useCallback(async () => {
    try {
      const orgsRes = await getOrganizations();
      setOrganizations(orgsRes.data);

      const allProjects: Project[] = [];
      for (const org of orgsRes.data) {
        const projectsRes = await getProjects(org.id);
        allProjects.push(...projectsRes.data);
      }
      setProjects(allProjects);
    } catch {
      // Silent
    } finally {
      setLoading(false);
      setRefreshing(false);
    }
  }, []);

  useEffect(() => {
    loadData();
  }, [loadData]);

  const onRefresh = () => {
    setRefreshing(true);
    loadData();
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
      <FlatList
        data={projects}
        keyExtractor={(item) => item.id.toString()}
        contentContainerStyle={styles.list}
        refreshControl={
          <RefreshControl refreshing={refreshing} onRefresh={onRefresh} />
        }
        renderItem={({ item }) => (
          <View style={styles.card}>
            <View
              style={[
                styles.colorDot,
                { backgroundColor: item.color || '#94a3b8' },
              ]}
            />
            <View style={styles.cardContent}>
              <Text style={styles.projectName}>{item.name}</Text>
              {item.description ? (
                <Text style={styles.projectDesc} numberOfLines={2}>
                  {item.description}
                </Text>
              ) : null}
            </View>
            {item.is_archived && (
              <View style={styles.archivedBadge}>
                <Text style={styles.archivedText}>Archived</Text>
              </View>
            )}
          </View>
        )}
        ListEmptyComponent={
          <View style={styles.center}>
            <Text style={styles.emptyText}>
              No projects yet. Create one from the web dashboard.
            </Text>
          </View>
        }
      />
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: '#f8fafc' },
  center: { flex: 1, justifyContent: 'center', alignItems: 'center', padding: 24 },
  list: { padding: 20 },
  card: {
    flexDirection: 'row',
    alignItems: 'center',
    backgroundColor: '#fff',
    borderRadius: 10,
    padding: 16,
    marginBottom: 10,
    borderWidth: 1,
    borderColor: '#e2e8f0',
  },
  colorDot: { width: 12, height: 12, borderRadius: 6, marginRight: 12 },
  cardContent: { flex: 1 },
  projectName: { fontSize: 16, fontWeight: '600', color: '#0f172a' },
  projectDesc: { fontSize: 13, color: '#64748b', marginTop: 2 },
  archivedBadge: {
    backgroundColor: '#f1f5f9',
    paddingHorizontal: 8,
    paddingVertical: 4,
    borderRadius: 4,
  },
  archivedText: { fontSize: 11, color: '#94a3b8' },
  emptyText: { fontSize: 14, color: '#94a3b8', textAlign: 'center' },
});
