import {Card, Text, Block, Button} from 'galio-framework';
import {StyleSheet, ScrollView, SafeAreaView} from 'react-native';
import {createNativeStackNavigator} from '@react-navigation/native-stack';
import {useEffect, useState} from "react";
import {useNavigation} from "@react-navigation/native";


export default function PageConsulterRdv({route}) {

	const { choosenDate} = route.params;

	const [rdvList, letRdvList] = useState([]);

	//Ip de l'ordi
	const ip =  "192.168.1.14:8000"; //remi chez lui
	//const ip = "172.20.10.4:8000"; //ip aya

	function delete_rdv(ip, id){
		let requete = "http://" + ip + "/api/rendez_vouses/" + id

		console.log("///////////////////////////////////////////////////////////////////")
		console.log(requete)

		fetch(requete, {
			method : 'DELETE',
		})
			.then(res => res.json())
			.then(res => console.log(res))
	}

	function get_rdv(ip) {



		let requete = "http://" + ip + "/api/rendez_vouses?Date=" + choosenDate

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

	get_rdv(ip)

	const navigation = useNavigation()

	return (
		<SafeAreaView>
			<Block style={styles.titre}>
				<Text style={styles.TextTitre} h5>Rendez-vous le {choosenDate}</Text>
			</Block>
			<Block style={styles.block}>
				<ScrollView>
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
								>
									{/*<Button color="warning" style={styles.btnCard} onPress={() => {navigation.navigate('SupprimerRdv', {rdvid: rdv.id})}}>Annuler le RDV</Button>*/}
									<Button color="warning" style={styles.btnCard} onPress= {() => {delete_rdv(ip, rdv.id)}}>Annuler le RDV</Button>

								</Card>

							</Block>
						)

					})}

				</ScrollView>
			</Block>
			<Block style={styles.btnBlock}>
				<Button round style={styles.button} color="primary"
				        onPress={() => navigation.navigate('PageChargementRdv')}>Ajouter un RDV</Button>
			</Block>
		</SafeAreaView>


	);
}

const styles = StyleSheet.create({
	block:
		{
			flexDirection: "column",
			marginTop: 70,
			width: 415,
			height: 700,


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
			marginTop: 10,
			height: 60,
			textAlign: "center",
			zIndex: 0,
			//backgroundColor: "green" ,
		},
	cardBlock:
		{
			//backgroundColor : "blue",
			flex: 2,
			height: 150,
			zIndex: 0,
			marginTop: 10,
			fontSize: 20


		},
	card:
		{
			//backgroundColor : "yellow",
			alignItems: "center",
			height: 10,
			marginLeft: 70,
			marginRight: 70,
			flex: 1,
			marginTop: 7,
			fontSize: 20
		},
	btnCard:
		{

			width: 100,
			height: 40
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