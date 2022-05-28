import {StatusBar} from 'expo-status-bar';
import {StyleSheet, Text, View} from 'react-native';
import {NavigationContainer} from '@react-navigation/native';
import {createNativeStackNavigator} from '@react-navigation/native-stack';
import PageLogin from './components/pageLogin/PageLogin';
import PageAcceuil from './components/pageAcceuil/PageAcceuil';
import PageSansRdv from "./components/pageSansRdv/PageSansRdv";
import PageAgenda from './components/pageAgenda/PageAgenda';
import PageConsulterRdv from "./components/pageConsulterRdv/PageConsulterRdv";
import PagePriseRdv from "./components/pagePriseRdv/PagePriseRdv";
import PageChargementRdv from './components/pageChargementRdv/PageChargementRdv';


const Stack = createNativeStackNavigator();

export default function App() {


	return (
		<NavigationContainer>
			<Stack.Navigator initialRouteName="PageLogin">
				<Stack.Screen name="PageLogin" component={PageLogin}/>
				<Stack.Screen name="PageAcceuil" component={PageAcceuil}/>
				<Stack.Screen name="PageSansRdv" component={PageSansRdv}/>
				<Stack.Screen name="AgendaVaccinations" component={PageAgenda}/>
				<Stack.Screen name="PageConsulterRdv" component={PageConsulterRdv}/>
				<Stack.Screen name="PageChargementRdv" component={PageChargementRdv}/>
				<Stack.Screen name="PagePriseRdv" component={PagePriseRdv}/>
			</Stack.Navigator>
			<StatusBar style="auto"/>
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