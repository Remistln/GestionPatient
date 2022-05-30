import {Card, Text, Block, Button} from 'galio-framework';
import {StyleSheet, ScrollView, SafeAreaView} from 'react-native';
import {createNativeStackNavigator} from '@react-navigation/native-stack';
import {useEffect, useState} from "react";
import {useNavigation} from "@react-navigation/native";

// Page Consulter les rendez-vous, elle affiche les rendez du jours
// Un bouton ouvre la page de chargement
export default function PageConsulterRdv({route}) {

	const choosenDate = route.params.choosenDate;
	const annee = route.params.annee;
	const mois = route.params.mois;
	const jour = route.params.jour ;


	const [rdvList, letRdvList] = useState([]);

  	// ip de l'ordinateur où se trouve le serveur
	//const ip = "10.60.44.36:8000" //remi a epsi
	//const ip = "192.168.1.14:8000" //remi chez lui
	const ip = "192.168.42.96:8000" // ip gaëtan
	//const ip ="172.20.10.9:8000"; //ip aya
	//const ip ="192.168.42.96:8000"; //ip aya


	// Suppression d'un rendez-vous dans l'API
	function delete_rdv(ip, id){
		let requete = "http://" + ip + "/api/rendez_vouses/" + id

		fetch(requete, {
			method : 'DELETE',
		})
			.then(res => res.json())
			.then(res => console.log(res))
	}

	// reccupération des rendez-vous du jour
	function get_rdv(ip) 
	{
		let requete = "http://" + ip + "/api/rendez_vouses?Date=" + choosenDate

		fetch(requete, {
			headers: {
				'Accept': 'application/json'
			}
		})
			.then(response => {
				return response.json();
			})
			.then(res => {
				letRdvList(res);
		}).catch(error => console.log(error))
	}

	useEffect(() => {get_rdv(ip)},[]);
	

	const navigation = useNavigation()

	return (
		<SafeAreaView>
			<Block style={styles.titre}>
				<Text style={styles.TextTitre} h5>Rendez-vous le {choosenDate}</Text>
			</Block>
			<Block style={styles.btnBlock}>
				<Button round style={styles.button} color="primary"
						onPress={() => navigation.navigate('PageChargementRdv', {choosenDate : choosenDate , jour : jour, mois: mois, annee: annee}) }>Ajouter un RDV</Button>
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
									{}
									<Button color="warning" style={styles.btnCard} onPress= {() => {delete_rdv(ip, rdv.id)}}>Annuler le RDV</Button>
								</Card>
							</Block>
						)
					})}
				</ScrollView>
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
			height: 400,
		},
	titre:
		{
			textAlign: "center",
			height : "10%"
		},
	TextTitre:
		{
			fontWeight: "bold",
			marginTop: 10,
			height: 60,
			textAlign: "center",
			zIndex: 0,
			flex : 1,
		},
	cardBlock:
		{
			flex: 2,
			height: 150,
			zIndex: 0,
			marginTop: 10,
			fontSize: 20
		},
	card:
		{
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