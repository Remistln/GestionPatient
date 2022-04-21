import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View } from 'react-native';
import PageLogin from './components/pageLogin/PageLogin';
import PageAcceuil from './components/pageAcceuil/PageAcceuil';
import PageSansRdv from "./components/pageSansRdv/PageSansRdv";

export default function App() {
  return (
    <View style={styles.container}>
      <PageSansRdv></PageSansRdv>
      <StatusBar style="auto" />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
});
