import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import PageLogin from './components/pageLogin/PageLogin';
import PageAcceuil from './components/pageAcceuil/PageAcceuil';
import PageSansRdv from "./components/pageSansRdv/PageSansRdv";
import PageAgenda from './components/pageAgenda/PageAgenda';

/*
Aya's Notes :
- Pass data to the screens --> {props => <HomeScreen {...props} extraData={someData} />}
*/

const Stack = createNativeStackNavigator();
export default function App() {

  return (
    <NavigationContainer>
<<<<<<< HEAD
    <Stack.Navigator>
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
      <Stack.Screen 
        name="Agenda Vaccinations"
        component={PageAgenda}
      />
=======
    <Stack.Navigator initialRouteName="PageLogin">
      <Stack.Screen name="PageLogin" component={PageLogin}/>
      <Stack.Screen name="PageAcceuil" component={PageAcceuil}/>
      <Stack.Screen  name="PageSansRdv" component={PageSansRdv}/>
>>>>>>> feature/NavigateLoginAcceuil
    </Stack.Navigator>
    <StatusBar style="auto" />
  </NavigationContainer>

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

/*

*/