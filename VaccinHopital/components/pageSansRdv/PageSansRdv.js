import {Text, Block, Button, Input, Radio} from 'galio-framework';
import {Alert, StyleSheet, View} from "react-native";
import DatePicker from "react-native-datepicker";
import {useEffect, useState} from "react";

// Page d'enregistrement des vaccinations sans rendez-vous
// Elle affiche la selection de la date de naissance, la selection du type de vaccin ainsi que le nombre de vaccin de ce type disponible (et périmant demain)
// Un bouton permet de valider la selection du vaccin, le supprime dans l'API et ouvre la page d'acceuil
export default function PageSansRdv({navigation}) {
	const [birthDate, setBirthDate] = useState("");
	const [age, setAge] = useState("");
	const [today, setToday] = useState(new Date);
	const [message, setMessage] = useState("")
	const [vaccinPeremptionList, letVaccinPeremptionList] = useState([]);
	const [status, setStatus] = useState(false)
	const [deleteItem, setDeleteItem] = useState()

  	// ip de l'ordinateur où se trouve le serveur
	//const ip = "10.60.44.36:8000" //remi a epsi
	//const ip = "192.168.1.14:8000" //remi chez lui
	const ip = "192.168.42.96:8000" // ip gaëtan
	//const ip ="172.20.10.9:8000"; //ip aya
	//const ip ="192.168.42.96:8000"; //ip aya

	// Recuppération de la liste des vaccins qui périme demain
	useEffect(() => {
		setStatus(true)
		// définition de demain
		let datemtn = new Date
		let formatted_date = datemtn.getFullYear() + "-" + (datemtn.getMonth() + 1) + "-" + datemtn.getDate()

		const tomorrow = new Date(datemtn)
		tomorrow.setDate(tomorrow.getDate() + 1)
		const formatted_tomorrow = tomorrow.getFullYear() + "-" + (tomorrow.getMonth() + 1) + "-" + tomorrow.getDate()

		getVaccinPeremtion(formatted_tomorrow, ip);
	}, []) ;

	
	async function getVaccinPeremtion(formatted_tomorrow, ip){
		// Appel API des vaccins qui périment demain
		let requete = "http://" + ip + "/api/vaccins?datePeremption=" + formatted_tomorrow

		fetch(requete, {
			headers: {
				'Accept': 'application/json'
			}
		})
			.then(response => {
				return response.json();
			}).then(res => {
				letVaccinPeremptionList(res)
		}).catch(error => console.log(error))
	}

	// Vérification qu'une date de naissance a été choisie
	function ckeckInfo(chosenVaccin, ip) {

		if (birthDate !== "") {
			getTypeVaccin(chosenVaccin, ip)
		}else{
			setStatus(true)
		}
	}

	// Appel API du type de vaccin choisit
	async function getTypeVaccin(chosenVaccin, ip) {

		fetch("http://" + ip + "/api/type_vaccins?label=" + chosenVaccin, {
				headers: { 'Accept': 'application/json' }
				})
			.then(response => {
				return response.json();
			}).then(res => {
			checkAge(res[0])
		}).catch(error => console.log("ERROR" + error))


	}

	// Vérification que le vaccin choisi est autorisé pour cette age
	function checkAge(Vaccin) {
		if (age >= Vaccin.ageMin && age <= Vaccin.ageMax) {
			getNumberVaccin(Vaccin.label, ip)
		} else {
			setMessage("Vous n'avez pas l'age pour utiliser ce vaccin (Entre " + Vaccin.ageMin + " et " + Vaccin.ageMax + " ans)")
			setStatus(true)
		}
	}

	// Affichage du nombre de vaccin disponible de ce type
	function getNumberVaccin(chosenVaccin){
		let numberVaccinsLeft = 0

		vaccinPeremptionList.map(item => {
			if (item.type.label === chosenVaccin && item.reserve === false)
			{
				numberVaccinsLeft++
				setDeleteItem(item.id)
			}
		} )

		if (numberVaccinsLeft > 0){
			setMessage("Vaccins restants : " + numberVaccinsLeft)
			setStatus(false)
		}else{
			setMessage("Il n'y a plus de vaccins")
			setStatus(true)
		}
	}

	// Supprime un vaccin dans l'API
	async function deleteVaccin(ip){
	    fetch('http://' + ip + '/api/vaccins/' + deleteItem, {
				method: 'DELETE',
			})
			.then(response => {
				response.json()
		    	alertRdvPris()
			})
	}


	let  alertRdvPris = () =>
		Alert.alert(
			"Status Rdv",
			"Prise de vaccin sans rendez-vous enregistrée! ",
			[
				{ text: "OK", onPress: () => navigation.navigate("PageAcceuil") }
			]
		);

	// Affichage
	return (
		<Block style={styles.block}>
			<Block flex row={false}>

				<Block style={styles.titre}>
					<Text style={styles.TextTitre} h4>Vaccins sans rendez-vous</Text>
				</Block>

				<Block style={styles.date}>
					<Text h5>Date de Naissance : </Text>
					<DatePicker
						style={styles.datePicker}
						date={birthDate}
						mode="date"
						locale="fr"
						placeholder="Date"
						format="YYYY-MM-DD"
						minDate="1900-01-01"
						confirmBtnText="Confirmer"
						cancelBtnText="Annuler"
						customStyles={{
							dateInput: {
								backgroundColor: 'white',
								borderWidth: 1,
								borderColor: 'black',
							},
						}}
						showIcon={false}
						onDateChange={(date) => {
							setBirthDate(date);
							setAge(today.getFullYear() - new Date(date).getFullYear())
						}}
					/>
				</Block>

				<Block>
					<Text style={styles.vaccins} h5>Vaccins : </Text>
					<Radio label="Pfizer" color="primary"
					       onChange={() => {
						       ckeckInfo("Pfizer", ip)
					       }}/>
					<Radio label="AstraZeneca" color="primary" checked="false"
					       onChange={() => {
						       ckeckInfo("AstraZeneca", ip)
					       }}/>
					<Radio label="Moderna" color="primary" checked="false"
						   onChange={() => {
							   ckeckInfo("Moderna", ip)
						   }}/>
				</Block>
			</Block>

			<Block style={styles.valider}>
				<Text>{message}</Text>
				<Text>{status}</Text>
				<Button disabled={status} onPress={() => {deleteVaccin(ip)}}>Valider</Button>
			</Block>

		</Block>


	);
}

// Style de l'affichage
const styles = StyleSheet.create({

	block:{
		flexDirection: "column",
		flex: 5,
		padding: 50,
	},
	titre: {
		justifyContent: 'space-evenly',
		textAlign: "center",
		fontWeight: 'bold'
	},
	TextTitre: {
		fontWeight: "bold",
		textAlign: "center"
	},
	date: {
		flex: 2,
		justifyContent: 'space-evenly',
		marginTop : 50

	},
	vaccins: {
		marginTop: 30
	},
	valider: {
		flex: 1,
		marginBottom: 10,
		justifyContent: 'space-evenly',
		alignItems: 'center',
	},
	datePicker: {
		flex: 1,
		alignItems: 'center',
		justifyContent: 'center',
		marginTop: 20,
		padding: 16,
		height: 20,
		width: 300,
	},
});