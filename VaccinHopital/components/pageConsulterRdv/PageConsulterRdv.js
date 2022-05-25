import {Card, Text, Block, Button} from 'galio-framework';
import {StyleSheet, ScrollView, SafeAreaView} from 'react-native';
import {createNativeStackNavigator} from '@react-navigation/native-stack';
import {useEffect, useState} from "react";


export default function PageConsulterRdv({choosenDate = "2022-06-10", navigation})
{

	const [rdvList, letRdvList] = useState([]);


	function get_rdv() {

		//Ip de l'ordi
		//remi : 192.168.1.14:8000
		const ip ="172.20.10.4:8000"; //ip aya
		let requete = "http://"+ip+"/api/rendez_vouses?Date=" + choosenDate

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
			<Block style={styles.titre}>
				<Text style={styles.TextTitre} h5>Rendez-vous le {choosenDate}</Text>
			</Block>
			<Block style={styles.block}>
			<ScrollView>
					{rdvList.map((rdv) => {
						let cardTitle = rdv.nom + " " + rdv.prenom

						return (
							<Block  style={styles.cardBlock}>
								<Card 

									flex
									borderless={false}
									style={styles.card}
									title={cardTitle}
									caption={rdv.vaccin.type.label}
										>
									<Button  color="warning" style={styles.btnCard}  >Annuler le RDV</Button>

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
			marginTop: 10 ,
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
			height: 100,
			marginLeft: 70,
			marginRight: 70,
			flex: 1,
			marginTop: 7,
			fontSize: 20
		},
	btnCard :
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