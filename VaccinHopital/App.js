import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import PageLogin from './components/pageLogin/PageLogin';
import PageAcceuil from './components/pageAcceuil/PageAcceuil';
import PageSansRdv from "./components/pageSansRdv/PageSansRdv";
import PageAgenda from './components/pageAgenda/PageAgenda';



export default function App() {
  const Stack = createNativeStackNavigator();
  return (
    <NavigationContainer>
    <Stack.Navigator>
      <Stack.Screen 
        name="Agenda"
        component={PageAgenda}
      />
      <Stack.Screen
        name="Login"
        component={PageLogin}
      />
      <Stack.Screen 
        name="Acceuil"
        component={PageAcceuil}
      />
      <Stack.Screen 
        name="SansRdv"
        component={PageSansRdv}
      />
      
    </Stack.Navigator>
    <StatusBar style="auto" />
  </NavigationContainer>
  );
}// 

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
});
