import {Card, Text, Block, Button} from 'galio-framework';
import {StyleSheet, ScrollView, SafeAreaView} from 'react-native';
import {useNavigation, NavigationContainer} from '@react-navigation/native';
import {createNativeStackNavigator} from '@react-navigation/native-stack';
import {useEffect, useState} from "react";

export default function PageConsulterRdv({
	                                         choosenDate = "2001-12-25"
                                         }) {

	const [rdvList, letRdvList] = useState([]);


	function get_rdv() {
		let requete = "http://192.168.1.14:8000/api/rendez_vouses?Date=" + choosenDate

		fetch(requete, {
			headers: {
				'Accept': 'application/json'
			}
		})
			.then(response => {
				return response.json();
			}).then(res => {
			letRdvList(res)

			console.log("le resultat")
			console.log(rdvList)
		}).catch(error => console.log(error))
	}

	get_rdv()

	return (
		<SafeAreaView>
			<ScrollView>
				<Block style={styles.block}>
					<Block style={styles.titre}>
						<Text style={styles.TextTitre} h5>Rendez-vous le {choosenDate}</Text>
					</Block>
					<Block style={styles.btnBlock}>
						<Button round style={styles.button} color="primary">Ajouter un RDV</Button>
					</Block>

					{rdvList.map((rdv) => {
						let cardTitle = rdv.nom + " " + rdv.prenom

						return (
							<Block style={styles.cardBlock}>
								<Card
									flex
									borderless={false}
									style={styles.card}
									title={cardTitle}
									caption={rdv.vaccin.type.label}
								/>
							</Block>
						)

					})}
				</Block>
			</ScrollView>
		</SafeAreaView>


	);
}
/*

//onPress={() => navigation.navigate('PriseDeRDV')}
*/
const styles = StyleSheet.create({
	block:
		{
			flexDirection: "column",
			marginTop: 50,
			width: 415,
			height: 800,
			// backgroundColor: "red"

		},
	titre:
		{
			flex: 1,
			textAlign: "center",
			//  backgroundColor: "yellow" ,

		},
	TextTitre:
		{
			fontWeight: "bold",
			marginTop: 60,
			textAlign: "center",
			//  backgroundColor: "green" ,
		},
	cardBlock:
		{
			//  backgroundColor : "blue",
			flex: 2,
			height: 2,

		},
	card:
		{
			// backgroundColor : "green",
			alignItems: "center",
			height: 100,
			marginLeft: 70,
			marginRight: 70,
			flex: 1,
			marginTop: 7
		},
	btnBlock:
		{
			flex: 1,
			justifyContent: 'space-evenly',
			alignItems: "center",
			marginTop: 3,

		},
	button:
		{
			justifyContent: 'space-evenly',
			alignItems: "center",
		}
});